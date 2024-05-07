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
            <f7-block-title class="text-align-center font-18 text-color-black margin-top-half padding-vertical-half">{{ $root.trans.food_menu }}</f7-block-title>
            <div class="margin" v-if="product_category.length != 0">
                <div data-pagination='{"el":".swiper-pagination"}' data-space-between="10" data-slides-per-view="5" class="swiper swiper-init demo-swiper margin-top margin-bottom" style="height : 100px">
                    <div class="swiper-pagination"></div>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" :class="{ 'slide-active': category.id == sliderActive}" v-for="category in product_category" :key="category" @click="getProducts(category.id)">
                            <div class="menu-image col">
                                <img :src="'/storage'+category.image" alt="">
                            </div>
                            <p class="font-13 no-margin text-align-center margin-top-half">{{ category.category_languages[0].name }}</p>
                        </div>
                    </div>
                </div>
                <div class="position-relative">
                    <div class="menu-title"><span>{{ categoryName }} {{ $root.trans.menu }}</span></div>
                </div>
                <div class="menu-details margin-top">
                    <div class="menu-lists" v-if="product_subcategory.length">
                        <div class="menu-list" v-for="subcate in product_subcategory" :key="subcate">
                            <div class="font-18 text-align-center menu-list-title text-color-black"><u>{{ subcate.sub_category_language[0].name }}</u></div>
                            <div class="list row margin-half align-items-center" v-for="product in subcate.products" :key="product">
                                <div class="col-10">
                                    <span class="add-fav-list" @click="toggleWishlist(product.id)">
                                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">{{ this.wishlist && this.wishlist.includes(product.id) ? 'heart_fill' : 'heart' }}</i>
                                    </span>
                                    </div>
                                <div class="col-70 display-flex">{{ product.product_language[0].name }}&nbsp; <span class="dots"></span></div>
                                <div class="col-20">{{ product.price.toFixed(2) }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-lists" v-else>
                        <div class="no_order">
                            <div class="search__img text-align-center">
                                <img src="/images/Empty-pana 1.png" alt="serach">
                            </div>
                            <div class="no_order_text text-align-center">
                                <p class="no-margin">{{ $root.trans.empty_menu }}</p>
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
                        <p class="no-margin">{{ $root.trans.empty_menu }}</p>
                    </div>
                </div>
            </div>
        </f7-page-content>
    </f7-sheet>
</template>
<script>
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

export default {
    components : {
        f7BlockTitle,
        f7Block,
        f7Sheet,f7PageContent,
        VueCountdown,
        NoValueFound
    },
    data() {
        return {
            product_category: [],
            product_subcategory: [],
            wishlistProducts: [],
            wishlist: [],
        }
    },
    setup() {
        const { cookies } = useCookies();
        return { cookies };
    },
    created() {
        this.getCategories();
        if (this.cookies.get('wishlist')) {
            this.wishlist = JSON.parse(this.cookies.get('wishlist'));
        }
    },
    methods: {
        wishlistData() {
            if (this.cookies.get('wishlist')) {
                this.wishlist = JSON.parse(this.cookies.get('wishlist'));
            } else {
                this.wishlist = [];
            }
        },
        closePopup(){
            f7.popup.close('.demo-sheet-swipe-to-close');
            this.$emit('textChange');
        },
        getCategories() {
            axios.post('/api/get-categories-list')
            .then((res) => {
                this.product_category = res.data.category;
                this.getProducts(this.product_category[0].id);
            })
        },
        getProducts(id) {
            this.sliderActive = id;
            axios.get('/api/get-category-products/' + id)
            .then((res) => {
                this.categoryName = res.data.category_languages[0].name;
                this.product_subcategory = res.data.sub_category;
            })
        },
        toggleWishlist(id) {
            if (this.wishlist && this.wishlist.includes(id)) {
                var data = [];
                this.wishlist.forEach(ele => {
                    if (ele != id) {
                        data.push(ele);
                    }
                });
                this.wishlist = data;
            } else {
                this.wishlist.push(id);
            }
            this.cookies.set("wishlist", JSON.stringify(this.wishlist), 60 * 60 * 24);
            this.wishlist = JSON.parse(this.cookies.get('wishlist'));
        }
    }
}
</script>
