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
    <div class="padding-vertical-half" v-show="showSearchBar">
        <div class="padding-horizontal padding-vertical display-flex justify-content-space-between align-items-center">
            <div class="text-align-center display-flex justify-content-space-between align-items-center w-100">
                <div class="display-flex justify-content-space-between align-items-center product_search w-100">
                    <div style="width:10%">
                        <i class="f7-icons text-gray">search</i>
                    </div>
                    <div class="item-content item-input no-padding-left" style="width:90%">
                        <div class="item-inner">
                            <div class="item-input-wrap w-100">
                                <input type="search" class="padding w-100" placeholder="Search Food...">
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <i class="f7-icons text-gray" @click="showSearchBar = false">xmark</i>
                </div>
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
const showSearchBar = ref(true);
setTimeout(() => {  
    showSearchBar.value = false;    
}, 10);
</script>