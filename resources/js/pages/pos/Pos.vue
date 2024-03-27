<template>
    <f7-page color="bg-color-white pos-page">
        <div class="grid grid-cols-2 grid-gap">
            <div>
                <div data-navigation='{"el":".swiper-navigation"}' data-space-between="25" data-slides-per-view="6" class="swiper swiper-init demo-swiper margin-top margin-bottom" style="height: 120px;">
                    <div class="swiper-navigation"></div>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="menu-image col">
                                <img alt="">
                            </div>
                            <p class="font-13 no-margin text-align-center margin-top-half">fjsdkjf</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="menu-image col">
                                <img alt="">
                            </div>
                            <p class="font-13 no-margin text-align-center margin-top-half">90876543</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="menu-image col">
                                <img alt="">
                            </div>
                            <p class="font-13 no-margin text-align-center margin-top-half">fjsdkjf</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="menu-image col">
                                <img alt="">
                            </div>
                            <p class="font-13 no-margin text-align-center margin-top-half">90876543</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="menu-image col">
                                <img alt="">
                            </div>
                            <p class="font-13 no-margin text-align-center margin-top-half">fjsdkjf</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="menu-image col">
                                <img alt="">
                            </div>
                            <p class="font-13 no-margin text-align-center margin-top-half">90876543</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="menu-image col">
                                <img alt="">
                            </div>
                            <p class="font-13 no-margin text-align-center margin-top-half">90876543</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="menu-image col">
                                <img alt="">
                            </div>
                            <p class="font-13 no-margin text-align-center margin-top-half">fjsdkjf</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="menu-image col">
                                <img alt="">
                            </div>
                            <p class="font-13 no-margin text-align-center margin-top-half">90876543</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col add-to-cart">
                <div class="display-flex justify-content-space-between align-items-flex-start">
                    <div class="flex-shrink-0">Item 1</div>
                    <div class="align-self-center">Item 2</div>
                    <div class="align-self-flex-end">Item 3</div>
                </div>
            </div>
        </div>
    </f7-page>
</template>

<script>
import {
    f7Page,
    f7
} from 'framework7-vue';
export default {
    name : "POS",
    components: {
        f7Page,
        f7,
    },
}
</script>

<style>
    .add-to-cart{
        box-shadow: -1px 1px 15px 0px #3333330D;
    }
</style>