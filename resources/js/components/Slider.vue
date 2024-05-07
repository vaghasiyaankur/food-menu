<template>
    <div class="category-slider-content">
        <div data-navigation='{"prevEl":".swiper-button-prev", "nextEl":".swiper-button-next"}' data-space-between="15" data-slides-per-view="4" class="swiper demo-swiper-multiple swiper-init demo-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide" 
                    :class="activeCategory === 0 && 'active'"
                    @click="selectCategory(0)"
                    >
                    <div class="category-image-slider">
                        <img src="/images/dish.png" alt="">
                    </div>
                    <p class="slider-category-name">All Items</p>
                    <span class="category-item" v-if="activeCategory === 0">{{  productsCount }}</span>
                </div>
                <div class="swiper-slide" 
                    v-for="(category, index) of categories"
                    :key="index"
                    :class="activeCategory === category.id && 'active'"
                    @click="selectCategory(category.id)"
                >
                    <div class="category-image-slider">
                        <img :src="'/storage/' + category.image" :alt="category.name" width="33" height="33"/>
                    </div>
                    <p class="slider-category-name">{{ category?.name }}</p>
                    <span class="category-item" v-if="activeCategory === category.id">{{ category.product_count }}</span>
                </div>
            </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</template>

<script setup>
    import { f7Page, f7 } from 'framework7-vue';

    const props = defineProps({
        categories: Object,
        fetchProductsBySubcategory: Function,
        activeCategory: Number,
        productsCount: Number
    });

    const selectCategory = (id) => {
        props.fetchProductsBySubcategory(id);
    }


</script>