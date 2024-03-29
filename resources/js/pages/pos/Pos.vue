<template>
    <f7-page color="bg-color-white pos-page">
        <div class="display-flex justify-content-space-between align-items-flex-start">
            <div class="product-section flex-shrink-0">
                <div class="category-search padding">
                    <CategorySearch 
                        :categories="categories"
                        :productFetch="productFetch"
                        :activeCategory="activeCategory"
                        :productsCount="productsCount"
                    />
                </div>
            </div>
            <div class="add-to-cart padding">
                <div class="display-flex justify-content-space-between align-items-flex-start">
                    <div class="flex-shrink-0">Item 1</div>
                    <div class="align-self-center">Item 2</div>
                    <div class="align-self-flex-end">Item 3</div>
                </div>
            </div>
            <product :categories="categories"/>
        </div>
    </f7-page>
</template>

<script setup>
import { f7Page, f7 } from 'framework7-vue';
import CategorySearch from "../../components/CategorySearch.vue"
import { ref } from 'vue'
import axios from 'axios'

const categories =  ref({});
const activeCategory =  ref(0);
const products =  ref({});
const productsCount =  ref(0);

const categoryFetch = axios.get('/api/get-sub-categories-list').then(response => {
    const subCategories = response.data.sub_category;
    subCategories.length > 0 && productFetch(subCategories[0].id); // Fetch First category product data
    categories.value = subCategories;
})

const productFetch = (id) => {
    activeCategory.value = id;
    const categoryFetch = axios.get('/api/get-subcategory-wise-products/'+id).then(response => {
        products.value = response.data.products;
        productsCount.value = response.data.count;
    })
}
</script>