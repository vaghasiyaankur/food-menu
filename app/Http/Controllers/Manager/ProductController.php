<?php

namespace App\Http\Controllers\Manager;

use App\Helper\CustomerHelper;
use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\IngredientRestaurantLanguage;
use App\Models\Language;
use App\Models\Product;
use App\Models\ProductIngredient;
use App\Models\ProductLanguage;
use App\Models\ProductRestaurantLanguage;
use App\Models\ProductVariation;
use App\Models\RestaurantLanguage;
use App\Models\SubCategory;
use App\Models\SubcategoryRestaurantLanguage;
use App\Models\VariationRestaurantLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function getProducts(Request $req)
    {

        $langId = SettingHelper::managerLanguage();
        $restaurantId = CustomerHelper::getRestaurantId();
        $restaurantLanguageId = RestaurantLanguage::where('language_id', $langId)
                                ->where('restaurant_id', $restaurantId)
                                ->value('id');

        $products = Product::with(['productRestaurantLanguages' => function ($query) use ($restaurantLanguageId, $req) {
            $query->where('restaurant_language_id', $restaurantLanguageId);
            $query->where('name', 'LIKE', '%' . $req->search . '%');
        }, 'subCategory'])->whereHas('productRestaurantLanguages',function($q) use ($req,$restaurantLanguageId){
            $q->where('restaurant_language_id',$restaurantLanguageId);
            $q->where('name','LIKE','%'.$req->search.'%');
        });

        if($req->subCategory){
            $products = $products->where('sub_category_id', $req->subCategory);
        }
        
        if($req->category){
            $products = $products->whereHas('subCategory',function($q) use ($req){
                $q->where('category_id', $req->category);
            });
        }
        
        $products = $products->where('restaurant_id', $restaurantId)->get();

        $products->transform(function ($category) use ($req) {
            $name = $category->productRestaurantLanguages->isEmpty() ? null : $category->productRestaurantLanguages->first()->name;
            return [
                'id' => $category->id,
                'image' => $category->image,
                'status' => $category->status,
                'type' => $category->type,
                'name' => $name,
                'price' => $category->price,
            ];
        });

        return response()->json(['products' => $products, 'count' => $products->count()]);
    }

    public function addProduct(Request $req)
    {
        $ingredients = $req->ingredients;
        $variations = $req->variations;
        $variationPrices = $req->variationPrices;

        $rules = [];
        $languages = $req->language; 

        foreach ($languages as $language) {
            $rules["names.$language"] = 'required';
        }
        $rules['status'] = 'required';
        $rules['image'] = 'required|image|mimes:jpg,png,jpeg,gif,svg';

        $customMessages = [];
        foreach ($languages as $language) {
            $customMessages["names.$language.required"] = ucfirst($language) . " name is required.";
        }
        $validator = Validator::make($req->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $image_name = '';
        if($req->file('image')){
            $directory = storage_path('app/public/product/');

            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            $imageFile = $req->file('image');
            $image_name = '/product/'.rand(10000000,99999999).".".$imageFile->GetClientOriginalExtension();
            $imageFile->move(storage_path('app/public/product/'),$image_name);
        }

        $restaurantId = CustomerHelper::getRestaurantId();
        $resLangs = RestaurantLanguage::where('restaurant_id', $restaurantId)
        ->get();

        $pro = new Product();
        $pro->image = $image_name;
        $pro->price = $req->price;
        $pro->sub_category_id = $req->sub_category_id;
        $pro->restaurant_id = $restaurantId;
        $pro->added_by = Auth::user()->role;
        $pro->added_by_id = Auth::user()->id;
        $pro->description = $req->description;
        $pro->status = $req->status;
        $pro->food_type = $req->food_type;
        if($pro->save()){
            $names = $req->names;
            foreach($resLangs as $key=>$resLang){
                $language = Language::where('id', $resLang->language_id)->first();
                $proResLang = new ProductRestaurantLanguage();
                $proResLang->slug = Str::slug($names[$language->name]).'-'.$restaurantId.'-'.$key+1;
                $proResLang->name = $names[$language->name];
                $proResLang->product_id = $pro->id;
                $proResLang->restaurant_language_id = $resLang->id;
                $proResLang->save();
            }
        }

        if (is_array($ingredients)) {
            foreach($ingredients as $ingredient){
                $productIngredient = new ProductIngredient();
                $productIngredient->ingredient_id = $ingredient;
                $productIngredient->product_id = $pro->id;
                $productIngredient->save();
            }
        }

        if (is_array($variations)) {
            foreach($variations as $key => $variation){
                $productVariation = new ProductVariation();
                $productVariation->variation_id = $variation;
                $productVariation->product_id = $pro->id;
                $productVariation->price = $variationPrices[$key];
                $productVariation->save();
            }
        }

        return response()->json(['success'=>'Product Added Successfully.']);
    }

    public function getProduct($id)
    {
        $langId = SettingHelper::managerLanguage();
        $restaurantId = CustomerHelper::getRestaurantId();

        $product = Product::with(
                    [
                        'productRestaurantLanguages.restaurantLanguage',
                        'productIngredients.ingredient',
                        'productVariations.variation'
                    ]
                )
                ->select('id', 'image', 'price', 'food_type', 'sub_category_id', 'status', 'description')
                ->find($id);

        if ($product) {
            $transformedProduct = [
                'id' => $product->id,
                'image' => $product->image,
                'price' => $product->price,
                'food_type' => $product->food_type,
                'status' => $product->status,
                'description' => $product->description,
                'sub_category_id' => $product->sub_category_id,
                'proRestLang' => $product->productRestaurantLanguages->map(function ($proRestLang) {
                    return [
                        'name' => $proRestLang->name,
                        'language_id' => $proRestLang->restaurantLanguage->language_id
                    ];
                }),
                'ingredients' => $product->productIngredients->map(function ($proIng) use($restaurantId, $langId) {
                    $name = IngredientRestaurantLanguage::whereHas('restaurantLanguage', function ($query) use($restaurantId, $langId) {
                        $query->where('restaurant_id', $restaurantId)->where('language_id', $langId);
                    })->where('ingredient_id', $proIng->ingredient->id)
                    ->value('name');

                    return [
                        'id' => $proIng->ingredient->id,
                        'name' => $name,
                        'image' => $proIng->ingredient->image,
                        'type' => $proIng->ingredient->type,
                        'price' => $proIng->ingredient->price,
                        'status' => $proIng->ingredient->status,
                    ];
                }),
                'variations' => $product->productVariations->map(function ($proVar) use($restaurantId, $langId) {
                    $name = VariationRestaurantLanguage::whereHas('restaurantLanguage', function ($query) use($restaurantId, $langId) {
                        $query->where('restaurant_id', $restaurantId)->where('language_id', $langId);
                    })->where('variation_id', $proVar->variation->id)
                    ->value('name');

                    return [
                        'id' => $proVar->variation->id,
                        'name' => $name,
                        'image' => $proVar->variation->image,
                        'price' => $proVar->price,
                        'status' => $proVar->variation->status,
                    ];
                })
            ];

            return response()->json($transformedProduct);
        }
    }

    public function updateProduct(Request $req)
    {
        $rules = [];
        $languages = $req->language; 
        foreach ($languages as $language) {
            $rules["names.$language"] = 'required';
        }
        $rules['status'] = 'required';
        if($req->file('image')){
            $rules['image'] = 'required|image|mimes:jpg,png,jpeg,gif,svg';
        }

        $customMessages = [];
        foreach ($languages as $language) {
            $customMessages["names.$language.required"] = ucfirst($language) . " name is required.";
        }

        $validator = Validator::make($req->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = Product::find($req->id);
        $imageName = '';
        if($req->file('image')){
            $path = storage_path()."/app/public/" .@$product->image;
            $result = File::exists($path);
            if($result)
            {
                File::delete($path);
            }

            $imageFile = $req->file('image');
            $imageName = '/product/'.rand(10000000,99999999).".".$imageFile->GetClientOriginalExtension();
            $imageFile->move(storage_path('app/public/product/'),$imageName);
        }else{
            $imageName = $product->image;
        }

        $restaurantId = CustomerHelper::getRestaurantId();
        $resLangs = RestaurantLanguage::where('restaurant_id', $restaurantId)
        ->get();

        Product::where('id', $req->id)->update([
            'image' => $imageName,
            'food_type' => $req->food_type,
            'price' => $req->price,
            'status' => $req->status,
            'sub_category_id' => $req->sub_category_id,
            'description' => $req->description
        ]);

        $names = $req->names;
        foreach($resLangs as $resLang){
            $language = Language::where('id', $resLang->language_id)->first();
            ProductRestaurantLanguage::where('product_id', $product->id)
                                        ->where('restaurant_language_id', $resLang->id)
                                        ->update([
                                            'name' => $names[$language->name]
                                        ]);
        }

        $availableIngIds = ProductIngredient::where('product_id', $req->id)->pluck('ingredient_id')->toArray();
        $ingredients = [];
        if (is_array($req->ingredients)) {
            $ingredients = $req->ingredients;
            foreach($ingredients as $ingredient){
                if (!in_array($ingredient, $availableIngIds)) {
                    ProductIngredient::create([
                        'product_id' => $req->id,
                        'ingredient_id' => $ingredient,
                    ]);
                }
            }
        }

        ProductIngredient::where('product_id', $req->id)
            ->whereNotIn('ingredient_id', $ingredients)
            ->delete();

        $availableVarIds = ProductVariation::where('product_id', $req->id)->pluck('variation_id')->toArray();
        $variations = [];
        if (is_array($req->variations)) {
            $variations = $req->variations;
            $variationPrices = $req->variationPrices;
            foreach($variations as $key => $variation){
                if (!in_array($variation, $availableVarIds)) {
                    ProductVariation::create([
                        'product_id' => $req->id,
                        'variation_id' => $variation,
                        'price' => $variationPrices[$key],
                    ]);
                }else{
                    ProductVariation::where('variation_id', $variation)
                                        ->where('product_id', $req->id)
                                        ->update(['price' => $variationPrices[$key]]);
                }
            }
        }

        ProductVariation::where('product_id', $req->id)
            ->whereNotIn('variation_id', $variations)
            ->delete();

        return response()->json(['success'=>'Product Updated Successfully.']);
    }

    public function getCategoryProduct($id)
    {
        $lang_id = SettingHelper::getlanguage();
        $restaurant_id = SettingHelper::getUserIdUsingQrcode();
        $restaurant_id = $restaurant_id ? $restaurant_id : Auth::user()->restaurant_id;
        $products = Category::with(['subCategory' => function($q) use($restaurant_id){
            $q->where('restaurant_id', $restaurant_id)->whereHas('products');
        },
        'subCategory.products' => function($q) use($restaurant_id){
            $q->where('restaurant_id', $restaurant_id)->whereHas('productLanguage');
        },
        'subCategory.subCategoryLanguage' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        },
        'subCategory.products.productLanguage' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        },
        'categoryLanguages' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->whereRestaurantId($restaurant_id)->find($id);

        return response()->json($products);
    }

    public function getProductss(Request $req)
    {
        $lang_id = SettingHelper::managerLanguage();
        $restaurantId = CustomerHelper::getRestaurantId();

        $categoryId = $req->categoryId != 0 ? intval($req->categoryId) : '';
        $subcategoryId = $req->subcategoryId != 0 ? intval($req->subcategoryId) : '';

        $category_name = Category::with(['categoryLanguages' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->find($req->categoryId);

        $subCategories = SubCategory::with(['subCategoryLanguage' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->where('category_id',$req->categoryId)->get();
        $subCategory = [];
        foreach ($subCategories as $key => $sub_category) {
            $subCategory[$sub_category->id] = $sub_category->subCategoryLanguage[0]->name;
        }

        $sub_product = SubCategory::with(['subCategoryLanguage' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        },
        'products' => function($q) use ($req,$lang_id) {
            $q->whereHas('productLanguage',function($q) use ($req,$lang_id){
                $q->where('language_id',$lang_id);
                $q->where('name','LIKE','%'.$req->search.'%');
            });
        },'products.productLanguage'])
        ->whereHas('products.productLanguage',function($q) use ($req,$lang_id){
            $q->where('language_id',$lang_id);
            $q->where('name','LIKE','%'.$req->search.'%');
        })
        ->whereHas('subCategoryLanguage')->whereHas('products');

        if ($categoryId) {
            $sub_product = $sub_product->whereCategoryId($categoryId);
        }

        if ($subcategoryId) {
            $sub_product = $sub_product->whereId($subcategoryId);
        }

        $sub_product = $sub_product->whereRestaurantId($restaurantId)->paginate(6);

        return response()->json(['sub_category_product' => $sub_product,'sub_category' => $subCategory,'category_name' =>  $category_name]);
    }

    public function editProduct($id)
    {
        $products = Product::with('productLanguage')->find($id);
        return response()->json($products);
    }

    public function deleteProduct(Request $req)
    {
        $product = Product::find($req->id);
        $product->delete();
        return response()->json(['success'=>'Product Deleted Successfully.']);
    }

    public function getSubCategoryProduct($id)
    {
        $lang_id = SettingHelper::managerLanguage();
        $subCategories = SubCategory::with(['subCategoryLanguage' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->whereCategoryId($id)->whereUserId(Auth::id())->get();
        $subCategory = [];
        foreach ($subCategories as $key => $sub_category) {
            $subCategory[$sub_category->id] = $sub_category->subCategoryLanguage[0]->name;
        }

        $products = Product::with('productLanguage')->get();

        return response()->json(['sub_category' => $subCategory]);
    }

    public function getCategoryWiseProduct($id)
    {
        $lang_id = SettingHelper::managerLanguage();
        $products = Category::with(['categoryLanguages' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->whereRestaurantId(Auth::user()->restaurant_id)->find($id);
        return response()->json($products);
    }

    public function getSubcategoryWiseProduct($subCatId)
    {
        $restaurant_id = CustomerHelper::getRestaurantId();
        
        $lang_id = SettingHelper::managerLanguage();

        $products = Product::with(['productLanguage' => function ($query) use ($lang_id) {
            $query->where('language_id', $lang_id);
        }]);
        
        if($subCatId){
            $products = $products->where('sub_category_id', $subCatId);
        }

        $products = $products->where('restaurant_id', $restaurant_id)->get();
        $products->transform(function ($product) {
            $name = $product->productLanguage->isEmpty() ? null : $product->productLanguage->first()->name;
            return [
                'id' => $product->id,
                'price' => number_format($product->price, 2),
                'food_type' => $product->food_type,
                'name' => $name,
                'image' => $product->image,
            ];
        });
        $productCount = $products->count();
        return response()->json(['products' => $products, 'count'=>$productCount]);
    }

    public function getDigitalProductList($categoryId)
    {
        $langId = SettingHelper::managerLanguage();
        $restaurantId = CustomerHelper::getRestaurantId();

        $subCategories = SubCategory::with(
                            [
                                'subCategoryRestaurantLanguages',
                                'products.productRestaurantLanguages'
                            ]
                        )->where('category_id', $categoryId)->get();

        $transformedSubCategories = $subCategories->map(function ($subCategory) use($restaurantId, $langId){

            $name = SubcategoryRestaurantLanguage::whereHas('restaurantLanguage', function ($query) use($restaurantId, $langId) {
                $query->where('restaurant_id', $restaurantId)->where('language_id', $langId);
            })->where('sub_category_id', $subCategory->id)
            ->value('name');

            return [
                'id' => $subCategory->id,
                'name' => $name,
                'products' => $subCategory->products->map(function ($product) use($restaurantId, $langId){
                    $productId = $product->id;
                    $productName = ProductRestaurantLanguage::whereHas('restaurantLanguage', function ($query) use($restaurantId, $langId, $productId) {
                        $query->where('restaurant_id', $restaurantId)->where('language_id', $langId);
                    })->where('product_id', $productId)
                    ->value('name');
                    return [
                        'id' => $product->id,
                        'name' => $productName,
                        'image' => $product->image,
                        'price' => $product->price
                    ];
                }),
            ];
        });

        return response()->json($transformedSubCategories);
    }
}
