<template>
    <div data-navigation='{"prevEl":".swiper-button-prev", "nextEl":".swiper-button-next"}' data-space-between="20" data-slides-per-view="4" class="swiper demo-swiper-multiple swiper-init demo-swiper margin-top margin-bottom">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="category-image-slider col">
                    <img src="/images/dish.png" alt="">
                </div>
                <p class="slider-category-name margin-left-half text-align-center">All Items</p>
            </div>
            <div class="swiper-slide active">
                <div class="category-image-slider col">
                    <img src="/images/dish.png" alt="">
                </div>
                <p class="slider-category-name margin-left-half text-align-center">Pizza</p>
            </div>
            <div class="swiper-slide">
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
            </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</template>

<script>
import { f7Page, f7 } from 'framework7-vue';
export default {
    name : "Slider",
    components: {
        f7Page,
        f7,
    },
}
</script>