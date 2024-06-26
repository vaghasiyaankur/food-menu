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
                    @remove:cart-product="removeProductIntoCart" 
                />
            </div>
            <div class="add-to-cart">
                <AddToCart 
                    :cart-products="cartProducts"
                    @increase:quantity="increaseQuantity"
                    @decrease:quantity="decreaseQuantity"
                    @open:note-popup="openNotePopup"
                    :total-amount="totalAmount"
                />
            </div>
        </div>
        <Modal 
            :note-product-id="noteProductId"
            :note-product-description="noteProductDescription"
            @submit:product-note="submitProductNote"
        />
    </f7-page>
</template>

<script setup>
import { f7Page, f7 } from 'framework7-vue';
import CategorySearch from "../../components/CategorySearch.vue"
import { ref, watchEffect } from 'vue'
import Product from '../../components/Pos/Product.vue'
import AddToCart from '../../components/Pos/AddToCart.vue'
import axios from 'axios'
import $ from 'jquery';
import Modal from '../../components/PosModal.vue';

const categories =  ref({});
const activeCategory =  ref(0);
const products =  ref({});
const productsCount =  ref(0);
const cartProducts = ref([]);
const noteProductId = ref(0);
const noteProductDescription = ref('');

const totalAmount = ref(0);

const currentRoute = ref('');

// const onMounted = () => {
//     this.$root.activationMenu('pos', '');
//     this.$root.removeLoader();
// }

const categoryFetch = axios.get('/api/get-sub-categories-list').then(response => {
    const subCategories = response.data.sub_category;
    subCategories.length > 0 && fetchProductsBySubcategory(subCategories[0].id); // Fetch First category product data
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
    const available = cartProducts.value.findIndex(item => item.id === id);
    if(available !== -1){

    }else{
        const allProduct = products.value;
        const index = allProduct.findIndex(item => item.id === id);
        if (index !== -1) {
            cartProducts.value.push({
                id: allProduct[index].id,
                image: allProduct[index].image,
                name: allProduct[index].name,
                price: allProduct[index].price,
                food_type: allProduct[index].food_type,
                quantity: 1,
                note: ''
            });
        }
    }
    getTotalAmount();
}

const removeProductIntoCart = (id) => {
    const index = cartProducts.value.findIndex(item => item.id === id);
    if(index !== -1){
        cartProducts.value.splice(index, 1);
    }
    getTotalAmount();
}

const increaseQuantity = (id) => {
    const productIndex = cartProducts.value.findIndex(product => product.id === id);
    if (productIndex !== -1) {
        cartProducts.value[productIndex].quantity++;
    }
    getTotalAmount();
}

const decreaseQuantity = (id) => {
    const productIndex = cartProducts.value.findIndex(product => product.id === id);
    if (productIndex !== -1 && cartProducts.value[productIndex].quantity > 1) {
        cartProducts.value[productIndex].quantity--;
    }
    getTotalAmount();
}

const openNotePopup = (id) => {
    noteProductId.value = id;
    const productIndex = cartProducts.value.findIndex(product => product.id === id);
    if (productIndex !== -1) {
        $("#product-note").val(cartProducts.value[productIndex].note);
        noteProductDescription.value = cartProducts.value[productIndex].note;
    }
    f7.popup.open(`.notePopup`);
}

const submitProductNote = (note) => {
    noteProductDescription.value = note;
    const productIndex = cartProducts.value.findIndex(product => product.id === noteProductId.value);
    if (productIndex !== -1) {
        cartProducts.value[productIndex].note = noteProductDescription.value;
    }
    f7.popup.close(`.notePopup`);
}

const getTotalAmount = () => {
    let total = 0;
    for (const product of cartProducts.value) {
        total += product.price * product.quantity;
    }
    totalAmount.value = total;
}

</script>