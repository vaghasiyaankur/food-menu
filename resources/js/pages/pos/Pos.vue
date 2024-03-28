<template>
    <f7-page color="bg-color-white pos-page">
        <div class="display-flex justify-content-space-between align-items-flex-start">
            <div class="product-section flex-shrink-0">
                <div class="category-search padding">
                    <CategorySearch 
                        :categories="categories"
                        :productFetch="productFetch"
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
const products =  ref({});

const categoryFetch = axios.get('/api/get-sub-categories-list').then(response => {
    categories.value = response.data.sub_category;
    productFetch();
})

const productFetch = () => {
    console.log('123');
    // const categoryFetch = axios.get('/api/get-sub-categories-list').then(response => {
    //     categories.value = response.data.sub_category;
    // })
}
</script>