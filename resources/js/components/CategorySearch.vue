<template>
    <div>        
        <div class="category-search padding-horizontal padding-vertical-half display-flex justify-content-space-between align-items-center">
            <Slider 
                :categories="categories"
                :productFetch="productFetch"
                :activeCategory="activeCategory"
                :productsCount="productsCount"
            />

            <div class="search-content text-align-center">
                <i class="f7-icons text-red">search</i>
            </div>
        </div>
    </div>
</template>

<script setup>
import Slider from "./Slider.vue"

    const props = defineProps({
        categories: Object,
        productFetch: Function,
        activeCategory: Number,
        productsCount: Number
    });
</script>