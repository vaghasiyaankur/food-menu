<template>   
    <div v-show="!showSearchBar">
        <div class="display-flex justify-content-space-between align-items-center">
            <Slider 
                :categories="categories"
                :productFetch="productFetch"
                :activeCategory="activeCategory"
                :productsCount="productsCount"
            />

            <div class="search-content text-align-center">
                <i class="f7-icons text-red" @click="showSearchBar = true">search</i>
            </div>
        </div>
    </div>
    <div v-show="showSearchBar">
        <div class="padding-horizontal padding-vertical-half display-flex justify-content-space-between align-items-center">
            <div class="search-content text-align-center">
                <i class="f7-icons text-red" @click="showSearchBar = false">search</i>
            </div>
        </div>
    </div>
</template>

<script setup>
import Slider from "./Slider.vue"
import { ref } from 'vue'

const props = defineProps({
    categories: Object,
    productFetch: Function,
    activeCategory: Number,
    productsCount: Number
});
const showSearchBar = ref(false);
</script>