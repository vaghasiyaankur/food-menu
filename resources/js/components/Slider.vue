<template>
     <div class="position-relative category-slider-content">
        <div data-navigation='{"prevEl":".swiper-button-prev", "nextEl":".swiper-button-next"}' data-space-between="15" data-slides-per-view="4" class="swiper demo-swiper-multiple swiper-init demo-swiper margin-top-half margin-bottom-half">
            <div class="swiper-wrapper">
                <div class="swiper-slide active">
                    <div class="category-image-slider col">
                        <img src="/images/dish.png" alt="">
                    </div>
                    <p class="slider-category-name margin-left-half text-align-center">All Items</p>
                </div>
                
                <div class="swiper-slide" 
                    v-for="(category, index) of categories"
                    :key="index"
                >
                    <div class="category-image-slider col">
                        <img src="/images/dish.png" :alt="category.name">
                    </div>
                    <p class="slider-category-name margin-left-half text-align-center">{{ `${category.name.substr(0, 5)} ${category.name.length > 5? '..' : ''}`}}</p>
                    <span class="category-item">{{ category.product_count }}</span>
                </div>
                <!-- <div class="swiper-slide">
                    <div class="category-image-slider col">
                        <img src="/images/dish.png" alt="">
                    </div>
                    <p class="slider-category-name margin-left-half text-align-center">Burger</p>
                </div>
                <div class="swiper-slide">
                    <div class="category-image-slider col">
                        <img src="/images/dish.png" alt="">
                    </div>
                    <p class="slider-category-name margin-left-half text-align-center">Soup</p>
                </div>
                <div class="swiper-slide">
                    <div class="category-image-slider col">
                        <img src="/images/dish.png" alt="">
                    </div>
                    <p class="slider-category-name margin-left-half text-align-center">Indian Food</p>
                </div>
                <div class="swiper-slide">
                    <div class="category-image-slider col">
                        <img src="/images/dish.png" alt="">
                    </div>
                    <p class="slider-category-name margin-left-half text-align-center">Rolls</p>
                </div>
                <div class="swiper-slide">
                    <div class="category-image-slider col">
                        <img src="/images/dish.png" alt="">
                    </div>
                    <p class="slider-category-name margin-left-half text-align-center">French Fries</p>
                </div>
                <div class="swiper-slide">
                    <div class="category-image-slider col">
                        <img src="/images/dish.png" alt="">
                    </div>
                    <p class="slider-category-name margin-left-half text-align-center">Drinks</p>
                </div>
                <div class="swiper-slide">
                    <div class="category-image-slider col">
                        <img src="/images/dish.png" alt="">
                    </div>
                    <p class="slider-category-name margin-left-half text-align-center">Sandwich</p>
                </div> -->
            </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</template>

<script setup>
    import { f7Page, f7 } from 'framework7-vue';
    import { onMounted } from 'vue'
    const props = defineProps({
        categories: Object,
        productFetch: Function
    });

    // onMounted(() => {
    //     props.productFetch();
    // });


</script>