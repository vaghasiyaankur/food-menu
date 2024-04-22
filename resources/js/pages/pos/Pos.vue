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
                <Product :products="products"/>
            </div>
            <div class="add-to-cart">
                <AddToCart />
            </div>
        </div>
        <Modal />
    </f7-page>
</template>

<script setup>
import { f7Page, f7 } from 'framework7-vue';
import CategorySearch from "../../components/CategorySearch.vue"
import { ref, watchEffect } from 'vue'
import Product from '../../components/Product.vue'
import AddToCart from '../../components/AddToCart.vue'
import axios from 'axios'
import Modal from '../../components/PosModal.vue';

const categories =  ref({});
const activeCategory =  ref(0);
const products =  ref({});
const productsCount =  ref(0);


// Use ref to make currentRoute reactive
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
    console.log(search);
    if(search){
        console.log(search);
        axios.post('/api/get-products', { search: search })
        .then((response) => {
            products.value = response.data.products;
        })
    }else{
        fetchProductsBySubcategory(activeCategory.value);
    }
}

</script>