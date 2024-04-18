<template>
    <f7-page>
        <div class="data-list-section">
            <div class="add-product-page display-flex">
                <div class="add-product_details">
                    <div class="add-product_heading">
                        <h4 class="no-margin no-padding">
                            <Icon name="back" />
                            Add Products</h4>
                    </div>
                    <LeftSideProductForm 
                        :select-ingredients="selectIngredients" 
                        :select-variations="selectVariations" 
                        :form-data-format="productData"
                    />
                </div>

                <div class="add-product_search-wrapper">
                    <div class="add-product_search">
                        <div class="add-product-search-bar">
                            <RightSideProductForm 
                                :ingredients="ingredients" 
                                :variations="variations"
                                :select-ingredients="selectIngredients"
                                :select-variations="selectVariations"
                                @add:select-ingredient="addIngredient"
                                @remove:select-ingredient="removeIngredient"
                                @open:variation-popup="openVariationPopup"
                                @remove:select-variation="removeVariation"
                                />
                            <div class="added-product-combo-btns display-flex">
                                <div class="clear-all-products-btn">
                                    <a href="#" class="bg-color-white" @click="clearAllData">Clear All</a>
                                </div>
                                <div class="submit-products-btn">
                                    <a href="#" class="text-color-white" @click="submitProduct">Submit Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========= ADD VARIATION PRICE POPUP ========= -->
        <div class="popup variationPricePopup">
            <AddUpdatePopup
                :title="'Select Variation'"
                :form-data-format="variationDataFormat" 
                :data-type="'category'"
                @store:update="variationAddUpdateData"
                />
        </div>
    </f7-page>
</template>

<script setup>
import {
    f7Page, f7
} from 'framework7-vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';
import Icon from './../../../components/Icon.vue'
import LeftSideProductForm from './../../../components/Product/LeftSideProductForm.vue'
import RightSideProductForm from './../../../components/Product/RightSideProductForm.vue'
import AddUpdatePopup from './../../../components/common/AddUpdatePopup.vue';
import { successNotification, errorNotification, getErrorMessage } from '../../../commonFunction.js';

const ingredients = ref([]);
const variations = ref([]);
const selectIngredients = ref([]);
const selectVariations = ref([]);

const variationDataFormat = ref([
    { label: 'Id', multipleLang: false, type: 'hidden', placeHolder: 'Variation Id', value: ''},
    { label: 'Price', multipleLang: false, type: 'number', placeHolder: 'Variation Price', value: ''}
]);

const productData = ref([
    {  label: 'Price', multipleLang: false, type: 'number', name: 'price', placeHolder: 'Product Price', value: ''},
    {
        label: 'Food Type',
        multipleLang: false,
        type: 'radio',  
        name: 'type',
        options: [
            { label: 'Veg', value: 1},
            { label: 'Non-veg', value: 2},
            { label: 'Egg Type', value: 3}
        ],
        placeHolder: 'Add Category Type',
        value: 1
    },
    {
        label: 'Status',
        multipleLang: false,
        type: 'radio',
        name: 'status',
        options: [
            { label: 'Active', value: 1},
            { label: 'Deactive', value: 2}
        ],
        placeHolder: 'Category Status',
        value: 1
    },
    { label: 'Image', multipleLang: false, type: 'image', name: 'image', placeHolder: 'Product Image', value: {}, preview: ''},
    { label: 'Description', multipleLang: false, type: 'text-area', name: 'description', placeHolder: 'Product Description', value: ''},
    {  label: 'Id', multipleLang: false, type: 'hidden', name: 'id', placeHolder: 'Product Id', value: ''},
]);

onMounted(() => {
    getIngredientList();
    getVariationList();
    getLanguages();
    getSubCategories();
});



const getLanguages = () => {
    axios.get('/api/get-languages')
    .then((response) => {
        let optionsData = [];
        
        Object.keys(response.data.langs).forEach(langKey => {
            const lang = response.data.langs[langKey];
            optionsData.push({
                language_id: lang.id,
                language: lang.name,
                value: ''
            });
        });
        
        productData.value.unshift({
            label: 'Name',
            multipleLang: true,
            type: 'text',
            placeHolder: 'Add Product Name',
            value: '',
            options: optionsData
        });
    });
};

const getIngredientList = () => {
    axios.post('/api/get-ingredients')
    .then((response) => {
        ingredients.value = response.data.ingredients;
    });
};

const getVariationList = () => {
    axios.post('/api/get-variations')
    .then((response) => {
        variations.value = response.data.variations;
    });
};

const addIngredient = (id) => {
    const allIngredients = ingredients.value;
    const index = allIngredients.findIndex(item => item.id === id);
    if (index !== -1) {
        selectIngredients.value.push({
            id: allIngredients[index].id,
            image: allIngredients[index].image,
            name: allIngredients[index].name,
            price: allIngredients[index].price,
            type: allIngredients[index].type
        });
    }
}

const getSubCategories = () => {
    axios.post('/api/get-sub-categories')
    .then((response) => {
        let optionsData = [];
        
        Object.keys(response.data.subCategories).forEach(catKey => {
            const cat = response.data.subCategories[catKey];
            optionsData.push({
                id: cat.id,
                label: cat.name,
            });
        });

        // defaultSelectCatId.value = response.data.categories[0]?.id ?? ''
        const priceIndex = productData.value.findIndex(item => item.name === 'price');

        productData.value.splice(priceIndex + 1, 0, {
            label: 'Category',
            multipleLang: false,
            type: 'drop-down',
            name: 'sub_category_id',
            placeHolder: 'Select Category Name',
            value: response.data.subCategories[0]?.id ?? '',
            options: optionsData
        });
    });
};

const removeIngredient = (id) => {
    const allIngredients = selectIngredients.value;
    const index = allIngredients.findIndex(item => item.id === id);
    if (index !== -1) {
        selectIngredients.value.splice(index, 1);
    }
}

const openVariationPopup = (id) => {
    const allSelectVariations = selectVariations.value;
    const index = allSelectVariations.findIndex(item => item.id === id);
    const formData = variationDataFormat.value;
    manipulateField(formData, 'Id', id);
    if (index !== -1) {
        manipulateField(formData, 'Price', allSelectVariations[index].price);
    }else{
        manipulateField(formData, 'Price', '');
    }
    f7.popup.open(`.variationPricePopup`);
}

const removeVariation = (id) => {
    const allVariations = selectVariations.value;
    const index = allVariations.findIndex(item => item.id === id);
    if (index !== -1) {
        selectVariations.value.splice(index, 1);
    }
}

const variationAddUpdateData = () => {
    const formData = variationDataFormat.value;
    const id = formData.find(item => item.label === 'Id').value;
    const price = formData.find(item => item.label === 'Price').value;


    const allVariations = variations.value;
    const index = allVariations.findIndex(item => item.id === id);
    if (index !== -1) {
        selectVariations.value.push({
            id: id,
            image: allVariations[index].image,
            name: allVariations[index].name,
            price: price,
            status: allVariations[index].status
        });
    }
    f7.popup.close(`.variationPricePopup`);
}

const manipulateField = (formData, label, value = null) => {
    const index = formData.findIndex(item => item.label === label);
    if (index !== -1) {
        if(label == 'Image'){
            formData[index].preview = value !== null ? value : formData[index].default;
            formData[index].value = {};
        }else{
            formData[index].value = value !== null ? value : formData[index].default;
        }
    }
};

const clearAllData = () => {
    const formData = productData.value;
    manipulateField(formData, 'Id', '');
    manipulateField(formData, 'Image', '');
    manipulateField(formData, 'Price', '');
    manipulateField(formData, 'Description', '');
    manipulateField(formData, 'Food Type', 1);
    manipulateField(formData, 'Status', 1);

    const nameIndex = formData.findIndex(item => item.label === 'Name');
    if (nameIndex !== -1) {
        formData[nameIndex].options.forEach(option => option.value = '');
    }

    selectIngredients.value = [];
    selectVariations.value = [];
}

const submitProduct = () => {
    const formData = new FormData();
    const id = productData.value.find(item => item.label === 'Id').value;

    productData.value.forEach(item => {
        if(item.label == 'Name'){
            item.options.forEach(option => {
                formData.append('names['+ option.language +']', option.value);
                formData.append('language[]', option.language);
            });
        }else{
            formData.append(item.name, item.value);
        }
    });
    selectIngredients.value.forEach(ingredient => {
        formData.append('ingredient[]', ingredient.id);
    });
    selectVariations.value.forEach(variation => {
        formData.append('variation[]', variation.id);
        formData.append('variationPrice[]', variation.price);
    });


    const endpoint = id ? '/api/update-product' : '/api/add-product';

    axios.post(endpoint, formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then((response) => {
        successNotification(response.data.success);
        f7.view.main.router.navigate({ url: "/food-product/" });
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });


    console.log(formData);
}

</script>