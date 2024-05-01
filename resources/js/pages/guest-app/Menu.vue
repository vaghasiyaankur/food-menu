<template>
    <f7-sheet class="demo-sheet-swipe-to-close" style="height:auto; --f7-sheet-bg-color: #fff;" backdrop>
        <f7-page-content>
            <div class="row">
                <div class="col">
                    <div class="border-popup"></div>
                </div>
            </div>
            <div @click="closePopup" class="close-menu">
                <i class="f7-icons font-30">xmark</i>
            </div>
            <f7-block-title class="font-18">{{ trans.food_menu }}</f7-block-title>
            <p class="no-margin title-text">Select your favourite food
                and enjoy with family</p>
            <div class="margin" v-if="productCategory.length != 0">
                <div data-pagination='{"el":".swiper-pagination"}' data-space-between="10" data-slides-per-view="5"
                    class="swiper swiper-init demo-swiper" style="height : 75px">
                    <div class="swiper-pagination"></div>
                    <div class="swiper-wrapper" id="dynamic-img">
                        <div class="swiper-slide" :class="{ 'slide-active': category.id == sliderActive }"
                            v-for="category in productCategory" :key="category" @click="getProducts(category.id)">
                            <div class="menu-image">
                                <img :src="'/storage' + category.image" alt="">
                            </div>
                            <p class="font-13 no-margin">{{ category.category_languages[0].name }}</p>
                        </div>
                    </div>
                </div>
                <div class="position-relative">
                    <div class="menu-title"><span>{{ categoryName }} {{ trans.menu }}</span></div>
                </div>
                <div class="menu-details">
                    <div class="menu-lists" v-if="productSubcategory.length">
                        <div class='faq'>
                            <input id='faq-a' type='checkbox'>
                            <label for='faq-a'>
                                <p class="no-margin faq-heading">Sabji</p>
                                <div class='faq-arrow'></div>
                                <div class="faq-list">
                                    <div class="product">
                                        <div class="product-detail-left">
                                            <div class="product-img">
                                                <img src="#">
                                            </div>
                                            <div class="product-detail">
                                                <div class="product-name">Undhiyu</div>
                                                <div class="product-price">110.00</div>
                                            </div>
                                        </div>
                                        <span class="add-favlist" @click="toggleWishlist(product.id)">
                                            <i
                                                class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">{{
                                                    this.wishlist && this.wishlist.includes(product.id) ? 'heart_fill' :
                                                'heart' }}</i>
                                        </span>
                                    </div>
                                </div>
                            </label>
                            <input id='faq-b' type='checkbox'>
                            <label for='faq-b'>
                                <p class="no-margin faq-heading">Roti</p>
                                <div class='faq-arrow'></div>
                                <div class="faq-list"></div>
                            </label>
                            <input id='faq-c' type='checkbox'>
                            <label for='faq-c'>
                                <p class="no-margin faq-heading">nothing</p>
                                <div class='faq-arrow'></div>
                                <div class="faq-list"></div>
                            </label>
                        </div>
                        <!-- <div class="menu-list" v-for="subcate in productSubcategory" :key="subcate">
                            <div class="font-18 menu-list-title">{{ subcate.sub_category_language[0].name }}</div>
                            <div class="list row margin-half align-items-center" v-for="product in subcate.products" :key="product">
                                <div class="col-10">
                                    <span class="add-favlist" @click="toggleWishlist(product.id)">
                                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">{{ this.wishlist && this.wishlist.includes(product.id) ? 'heart_fill' : 'heart' }}</i>
                                    </span>
                                    </div>
                                <div class="col-70 display-flex">{{ product.product_language[0].name }}&nbsp; <span class="dots"></span></div>
                                <div class="col-20">{{ product.price.toFixed(2) }}</div>
                            </div>
                        </div> -->
                    </div>
                    <div class="menu-lists" v-else>
                        <div class="no_order">
                            <div class="search__img text-align-center">
                                <img src="/images/Empty-pana 1.png" alt="serach">
                            </div>
                            <div class="no_order_text text-align-center">
                                <p class="no-margin">{{ trans.empty_menu }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-lists" v-else>
                <div class="no_order">
                    <div class="search__img text-align-center">
                        <img src="/images/Empty-pana 1.png" alt="serach">
                    </div>
                    <div class="no_order_text text-align-center">
                        <p class="no-margin">{{ trans.empty_menu }}</p>
                    </div>
                </div>
            </div>
        </f7-page-content>
    </f7-sheet>
</template>
<script setup>
import {
    f7BlockTitle,
    f7PageContent,
    f7,
    f7Block,
    f7Sheet
} from 'framework7-vue';
import VueCountdown from '@chenfengyuan/vue-countdown';
import $ from 'jquery';
import axios from "axios";
import NoValueFound from '../../components/NoValueFound.vue'
import { useCookies } from "vue3-cookies";
import { ref, onMounted, inject, defineExpose } from 'vue';

const productCategory = ref([]);
const productSubcategory = ref([]);
const wishlistProducts = ref([]);
const wishlist = ref([]);
const { cookies } = useCookies();
const sliderActive = ref(0);
const categoryName = ref('');

const trans = inject('trans');

onMounted(() => {
    getCategories();
    if (cookies.get('wishlist')) {
        wishlist.value = JSON.parse(cookies.get('wishlist'));
    }
});

const wishlistData = () => {
    if (cookies.get('wishlist')) {
        wishlist.value = JSON.parse(cookies.get('wishlist'));
    } else {
        wishlist.value = [];
    }
}

const closePopup = () => {
    f7.popup.close('.demo-sheet-swipe-to-close');
    // this.$emit('textChange');
}

const getCategories = () => {
    axios.post('/api/get-categories-list')
        .then((res) => {
            productCategory.value = res.data.category;
            getProducts(productCategory.value[0].id);
        })
}

const getProducts = (id) => {
    sliderActive.value = id;
    axios.get('/api/get-category-products/' + id)
        .then((res) => {
            categoryName.value = res.data.category_languages[0].name;
            productSubcategory.value = res.data.sub_category;
        })
}

const toggleWishlist = (id) => {
    if (wishlist.value && wishlist.value.includes(id)) {
        var data = [];
        wishlist.value.forEach(ele => {
            if (ele != id) {
                data.push(ele);
            }
        });
        wishlist.value = data;
    } else {
        wishlist.value.push(id);
    }
    cookies.set("wishlist", JSON.stringify(wishlist.value), 60 * 60 * 24);
    wishlist.value = JSON.parse(cookies.get('wishlist'));
}

defineExpose({
    getCategories,
    wishlistData
})
</script>
