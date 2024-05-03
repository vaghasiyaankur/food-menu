<template>
    <f7-page color="bg-color-white pos-page">
        <div class="pos-page-content">
            <div class="product-section flex-shrink-0">
                <div class="flex-shrink-0 category-search padding-horizontal padding-vertical-half">
                    <CategorySearch
                        :categories="categories"
                        :fetchProductsBySubcategory="fetchProductsBySubcategory"
                        :fetchProductsBySearch="fetchProductsBySearch"
                        :activeCategory="activeCategory"
                        :productsCount="productsCount"
                    />
                </div>
                <Product
                    :products="products"
                    :cart-products="cartProducts"
                    @add:cart-product="addProductIntoCart"
                />
            </div>
            <div class="add-to-cart">
                <AddToCart 
                    :cart-products="cartProducts"
                    @increase:quantity="increaseQuantity"
                    @decrease:quantity="decreaseQuantity"
                    @open:note-popup="openNotePopup"
                    :total-amount="totalAmount"
                    :sub-total="subTotal"
                    :discount="discount"
                    :floor-name="floorName"
                    :table="table"
                    :old-order="oldOrder"
                    @remove:cart-product="removeProductIntoCart"
                    @create:kot="createKOT"
                    @hold:kot="holdKOT"
                />
            </div>
        </div>
        <Modal 
            :note-product-id="noteProductIndex"
            :note-product-description="noteProductDescription"
            @submit:product-note="submitProductNote"
            :note-product-status="noteProductStatus"

            :add-ingredient-list="addIngredientList"
            :add-variation-list="addVariationList"
            @submit:ingredient-variation="submitIngVar"
        />
    </f7-page>
</template>

<script setup>
import { f7Page, f7 } from 'framework7-vue';
import CategorySearch from "../../components/CategorySearch.vue"
import { ref, watchEffect, onMounted, provide } from 'vue'
import Product from '../../components/Pos/Product.vue'
import AddToCart from '../../components/Pos/AddToCart.vue'
import axios from 'axios'
import $ from 'jquery';
import Modal from '../../components/PosModal.vue';
import { successNotification, errorNotification, getErrorMessage } from '../../commonFunction.js';

const categories =  ref({});
const activeCategory =  ref(0);
const products =  ref({});
const productsCount =  ref(0);
const cartProducts = ref([]);
const noteProductIndex = ref(0);
const noteOldKotIndex = ref(0);
const noteOldKotProductIndex = ref(0);
const noteProductDescription = ref('');
const noteProductStatus = ref('new');
const totalAmount = ref(0);
const subTotal = ref(0);
const discount = ref(0);
const currentRoute = ref('');
const floorName = ref('');
const table = ref({});
const oldOrder = ref([]);
const foodReceivedType = ref('dine_in')

const addIngVarId = ref([]);
const addIngredientList = ref([]);
const addVariationList = ref([]);
const selectIngredient = ref([]);
const selectVariation = ref([]);
const extraAmount = ref(0);

// Person Detail Popup
const personNumber = ref('');
const personName = ref('');
const personAddress = ref('');
const personLocality = ref('');

// No Of Person Popup
const numberOfPerson = ref(0);

// Order Note Popup
const orderNote = ref('');

// Select Waiter Popup
const selectWaiter = ref('');

// Applied Discount Popup
const discountCategory = ref(0);
const discountReason = ref('');
const discountType = ref('fixed');
const discountPrice = ref('');
const discountCoupon = ref('');

// Settle & Save Popup
const paymentType = ref('cash');
const customerPaid = ref('');
const returnMoney = ref('');
const tip = ref('');
const settlementAmount = ref('');

const personDetailFillUp = ref(false);
const noOfPersonFillUp = ref(false);
const assignDeliveryFillUp = ref(false);
const orderNoteFillUp = ref(false);
const discountFillUp = ref(false);


onMounted(() => {
    setTimeout(() => {
        if(f7.view.main.router.currentRoute.params.id){
            const id = f7.view.main.router.currentRoute.params.id;
            getTableCurrentDetail(id);
        }
    });
});

const getTableCurrentDetail = (tableId) => {
    axios.post('/api/get-current-table-details', { tableId: tableId })
    .then((response) => {
        floorName.value = response.data.floor ? response.data.floor.name : '';
        table.value = response.data;
        oldOrder.value = response.data.order;
        if(response.data.hold_kot_data){
            const productsArray = JSON.parse(response.data.hold_kot_data.products);

            productsArray.forEach(product => {
                if (Array.isArray(product.variation) && product.variation.length === 0) {
                    product.variation = {};
                }
            });

            cartProducts.value = productsArray;
            let holdKotOtherData = response.data.hold_kot_data;
            let personDetails = JSON.parse(holdKotOtherData.person_details);

            foodReceivedType.value = holdKotOtherData.food_received_type;
            numberOfPerson.value = personDetails.person ? personDetails.person : 0;
            personNumber.value = personDetails.number ? personDetails.number : '';
            personName.value = personDetails.name ? personDetails.name : '';
            personAddress.value = personDetails.address ? personDetails.address : '';
            personLocality.value = personDetails.locality ? personDetails.locality : '';
            orderNote.value = holdKotOtherData.order_note ? holdKotOtherData.order_note : '';
            selectWaiter.value = holdKotOtherData.waiter_id ? holdKotOtherData.waiter_id : '';

        }else{
            foodReceivedType.value = response.data.received_type;
            numberOfPerson.value = response.data.order ? response.data.order.person : 0;
            personNumber.value = response.data.order ? response.data.order.phone : '';
            personName.value = response.data.order ? response.data.order.name : '';
            personAddress.value = response.data.order ? response.data.order.address : '';
            personLocality.value = response.data.order ? response.data.order.locality : '';
            orderNote.value = response.data.order ? response.data.order.note : '';
            selectWaiter.value = response.data.order ? response.data.order.waiter : '';
        }
        calculateDiscount();
        checkFillUpDate();
    })
}

const categoryFetch = axios.get('/api/get-sub-categories-list').then(response => {
    const subCategories = response.data.sub_category;
    subCategories.length > 0 && fetchProductsBySubcategory(subCategories[0].id);
    categories.value = subCategories;
})

const fetchProductsBySubcategory = (id) => {
    activeCategory.value = id;
    axios.post('/api/get-products', { subCategory: id })
    .then((response) => {
        products.value = response.data.products;
        productsCount.value = response.data.count;
    })
}

const fetchProductsBySearch = (search) => {
    if(search){
        axios.post('/api/get-products', { search: search })
        .then((response) => {
            products.value = response.data.products;
        })
    }else{
        fetchProductsBySubcategory(activeCategory.value);
    }
}

const addProductIntoCart = (id) => {
    axios.post('/api/get-variations-and-ingredients', { id: id })
    .then((response) => {
        addIngredientList.value = response.data.ingredients;
        addVariationList.value = response.data.variations;

        if (addIngredientList.value.length > 0 || addVariationList.value.length > 0) { 
            addIngVarId.value = id;
            selectVariation.value = [];
            selectIngredient.value = [];
            if(addVariationList.value.length > 0){
                const firstVariation = addVariationList.value[0];
                selectVariation.value.push({
                    id: firstVariation.id,
                    image: firstVariation.image,
                    name: firstVariation.name,
                    price: firstVariation.price,
                });
                extraAmount.value = firstVariation.price;
            }
            f7.popup.open(`.add_ingredient_variation_popup`);
        } else {
            const allProduct = products.value;
            const index = allProduct.findIndex(item => item.id === id);

            if (index !== -1) {
                const existingProductIndex = cartProducts.value.findIndex(item => item.id === allProduct[index].id);
                if (existingProductIndex !== -1) {
                    cartProducts.value[existingProductIndex].quantity++;
                } else {
                    cartProducts.value.push({
                        id: allProduct[index].id,
                        image: allProduct[index].image,
                        name: allProduct[index].name,   
                        price: allProduct[index].price,
                        food_type: allProduct[index].food_type,
                        subCategoryId: allProduct[index].sub_category_id,
                        quantity: 1,
                        note: '',
                        ingredient: [],
                        variation: {},
                        extraAmount: 0,
                    });
                }
                calculateDiscount();
            }
        }   
    })
    
}

const removeProductIntoCart = (index, kot, kotIndex, kotProductIndex) => {
    if(kot == 'old'){
        oldOrder.value['kots'][kotIndex]['kot_products'].splice(kotProductIndex, 1);
    }else{
        cartProducts.value.splice(index, 1);
    }
    calculateDiscount();
}

const increaseQuantity = (index, kot, kotIndex, kotProductIndex) => {
    if(kot == 'old'){
        oldOrder.value['kots'][kotIndex]['kot_products'][kotProductIndex].quantity++;
    }else{
        cartProducts.value[index].quantity++;
    }
    calculateDiscount();
}

const decreaseQuantity = (index, kot, kotIndex, kotProductIndex) => {
    if(kot == 'old'){
        oldOrder.value['kots'][kotIndex]['kot_products'][kotProductIndex].quantity--;
    }else{
        cartProducts.value[index].quantity--;
    }
    calculateDiscount();
}

const openNotePopup = (index, kot, kotIndex, kotProductIndex) => {
    if(kot == 'old'){
        let noteDescribe = oldOrder.value['kots'][kotIndex]['kot_products'][kotProductIndex].note;
        $("#product-note").val(noteDescribe);
        noteProductDescription.value = noteDescribe;
        noteOldKotIndex.value = kotIndex;
        noteOldKotProductIndex.value = kotProductIndex;

    }else{
        noteProductIndex.value = index;
        // const productIndex = cartProducts.value.findIndex(product => product.id === id);
        // if (productIndex !== -1) {
            $("#product-note").val(cartProducts.value[index].note);
            noteProductDescription.value = cartProducts.value[index].note;
        // }
    }
    noteProductStatus.value = kot;
    f7.popup.open(`.notePopup`);
}

const submitProductNote = (note, npStatus) => {
    noteProductDescription.value = note;
    if(npStatus == 'old'){
        let kI = noteOldKotIndex.value;
        let kPI = noteOldKotProductIndex.value;
        oldOrder.value['kots'][kI]['kot_products'][kPI].note = note;
    }else{
        cartProducts.value[noteProductIndex.value].note = noteProductDescription.value;
        // const productIndex = cartProducts.value.findIndex(product => product.id === noteProductIndex.value);
        // if (productIndex !== -1) {
        //     cartProducts.value[productIndex].note = noteProductDescription.value;
        // }
    }
    f7.popup.close(`.notePopup`);
}

const submitIngVar = () => {
    const allProduct = products.value;

    const index = allProduct.findIndex(item => item.id === addIngVarId.value);

    const selectedProduct = allProduct[index];

    const selectedVariation = selectVariation.value[0];;

    let extraAmt = extraAmount.value;

    if (selectedVariation && selectedVariation.price) {
        var price = selectedVariation.price;
        extraAmt = extraAmt - selectedVariation.price;
    }else{
        var price = selectedProduct.price;
    }

    const productToAdd = {
        id: selectedProduct.id,
        image: selectedProduct.image,
        name: selectedProduct.name,   
        price: price,
        food_type: selectedProduct.food_type,
        quantity: 1,
        note: '',
        ingredient: selectIngredient.value,
        variation: selectedVariation,
        extraAmount: extraAmt,
    };

    cartProducts.value.push(productToAdd);
    selectVariation.value = [];
    selectIngredient.value = [];
    extraAmount.value = 0;
    calculateDiscount();
    f7.popup.close(`.add_ingredient_variation_popup`);
}

const createKOT = (tableId) => {

    if(cartProducts.value.length){
        axios.post('/api/add-kot', 
            { 
                cart: cartProducts.value,
                tableId: tableId, 
                foodReceivedType : foodReceivedType.value, 
                numberOfPerson : numberOfPerson.value,
                personNumber : personNumber.value,
                personName : personName.value,
                personAddress : personAddress.value,
                personLocality : personLocality.value,
                orderNote : orderNote.value,
                selectWaiter : selectWaiter.value,
            })
        .then((response) => {
            successNotification(response.data.success);
            f7.view.main.router.navigate({ url: "/" });
        })
        .catch((error) => {
            const errorMessage = getErrorMessage(error);
            errorNotification(errorMessage);
        });
    }
}

const saveData = (tableId) => {
    checkFillUpDate();
    axios.post('/api/save-data', 
    { 
        tableId: tableId,
        foodReceivedType : foodReceivedType.value, 
        numberOfPerson : numberOfPerson.value,
        personNumber : personNumber.value,
        personName : personName.value,
        personAddress : personAddress.value,
        personLocality : personLocality.value,
        orderNote : orderNote.value,
        selectWaiter : selectWaiter.value
    })
    .then((response) => {
        f7.popup.close(`.popup`);
    })
    .catch((error) => {
            const errorMessage = getErrorMessage(error);
            errorNotification(errorMessage);
        });
}

const checkFillUpDate = () => {
    if(numberOfPerson.value)
        noOfPersonFillUp.value = true;
    else
        noOfPersonFillUp.value = false;

    if(personNumber.value && personName.value && personAddress.value && personLocality.value)
        personDetailFillUp.value = true;
    else
        personDetailFillUp.value = false;

    if(orderNote.value)
        orderNoteFillUp.value = true;
    else
        orderNoteFillUp.value = false;

    if(selectWaiter.value)
        assignDeliveryFillUp.value = true;
    else
        assignDeliveryFillUp.value = false;
    
}

const holdKOT = (tableId) => {
    if(cartProducts.value.length){
        axios.post('/api/hold-kot', 
            { 
                cart: cartProducts.value,
                tableId: tableId, 
                foodReceivedType : foodReceivedType.value, 
                numberOfPerson : numberOfPerson.value,
                personNumber : personNumber.value,
                personName : personName.value,
                personAddress : personAddress.value,
                personLocality : personLocality.value,
                orderNote : orderNote.value,
                selectWaiter : selectWaiter.value,
            })
        .then((response) => {
            successNotification(response.data.success);
            f7.view.main.router.navigate({ url: "/" });
        })
        .catch((error) => {
            const errorMessage = getErrorMessage(error);
            errorNotification(errorMessage);
        });
    }
}

const calculateDiscount = () => {
    if(discountPrice.value){
        if(discountPrice.value < 0 || (discountType.value == 'percentage' && discountPrice.value > 100)){
            errorNotification('Please Enter Valid Percentage Value');
            return;
        }

        let discountValue = discountPrice.value ? discountPrice.value : 0;
        let priceTotal = 0;

            if(oldOrder.value){
                oldOrder.value.kots.forEach(kot => {
                    kot.kot_products.forEach(kotProduct => {
                        if(parseInt(discountCategory.value) === 0){
                            const totalValue = kotProduct.quantity * (kotProduct.price + kotProduct.extra_amount);
                            priceTotal += totalValue;
                        }else{
                            if (kotProduct.subCategoryId === parseInt(discountCategory.value)) {
                                const totalValue = kotProduct.quantity * (kotProduct.price + kotProduct.extra_amount);
                                priceTotal += totalValue;
                            }
                        }
                    })
                });
            }

            for (const product of cartProducts.value) {
                if(discountCategory.value === 0){
                    const totalValue = product.quantity * (product.price + product.extraAmount);
                    priceTotal += totalValue;
                }else{
                    if (product.subCategoryId === discountCategory.value) {
                        const totalValue = product.quantity * (product.price + product.extraAmount);
                        priceTotal += totalValue;
                    }
                }
            }

        
        let discountCount  = 0;
        if(discountType.value == 'percentage'){
            discountCount = (Math.round(parseFloat(discountValue)) / 100) * Math.round(parseFloat(priceTotal));
        }else{
            if(parseFloat(discountValue) > parseFloat(priceTotal) && parseFloat(priceTotal) > 0){
                errorNotification('Add Maximum price of discount is : '+priceTotal);
                return;
            }
            discountCount = parseFloat(priceTotal) > 0 ? discountValue : 0;
        }
    
        discount.value = Math.round(parseFloat(discountCount) * 100) / 100;
        discountFillUp.value = true;
        f7.popup.close(`.applied-discount-popup`);
    }
    getTotalAmount();
}

const getTotalAmount = () => {
    let total = 0;
    if(oldOrder.value){
        oldOrder.value.kots.forEach(kot => {
            kot.kot_products.forEach(kotProduct => {
                const totalValue = kotProduct.quantity * (kotProduct.price + kotProduct.extra_amount);
                total += totalValue;
            })
        });
    }   
    for (const product of cartProducts.value) {
        const totalValue = product.quantity * (product.price + product.extraAmount);
        total += totalValue;
    }
    subTotal.value = total.toFixed(2); 
    totalAmount.value = (Math.round((total - discount.value) * 100) / 100).toFixed(2);

}

const settleSavePayment = () => {
    
}

provide('table',table);

provide('selectIngredient',selectIngredient);
provide('selectVariation',selectVariation);
provide('extraAmount',extraAmount);
provide('foodReceivedType', foodReceivedType)

// Cart Header Component Pass Data
provide('personDetailFillUp', personDetailFillUp);
provide('noOfPersonFillUp', noOfPersonFillUp);
provide('assignDeliveryFillUp', assignDeliveryFillUp);
provide('orderNoteFillUp', orderNoteFillUp);
provide('discountFillUp', discountFillUp);

// Person Detail Popup
provide('personNumber', personNumber);
provide('personName', personName);
provide('personAddress', personAddress);
provide('personLocality', personLocality);

// No Of Person Popup
provide('numberOfPerson', numberOfPerson);

// Order Note Popup
provide('orderNote', orderNote);

// Select Waiter Popup
provide('selectWaiter', selectWaiter);

// Applied Discount Popup
provide('discountCategory', discountCategory);
provide('discountReason', discountReason);
provide('discountType', discountType);
provide('discountCoupon', discountCoupon);
provide('discountPrice', discountPrice);
provide('calculateDiscount', calculateDiscount);


provide('saveData', saveData);

// Settle & Save Popup
provide('paymentType', paymentType);
provide('customerPaid', customerPaid);
provide('returnMoney', returnMoney);
provide('tip', tip);
provide('settlementAmount', settlementAmount);
provide('settleSavePayment', settleSavePayment);

provide('cartProducts', cartProducts)
provide('oldOrder', oldOrder)

</script>