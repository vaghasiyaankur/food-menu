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
            <div class="margin">
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
                                    <span class="add-favlist" @click="toggleWishlist(product.id)">
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
import NoValueFound from '../restaurant-manager/NoValueFound.vue'
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
            product_subcategory: {
                product_language : [],
            },
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
                this.product_category = res.data;
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

<style scoped>
.border-popup{
    width: 40px;
    height: 5px;
    background: #F3F3F3;
    margin: 12px auto 0;
}
.close-menu{
    position: absolute;
    top: 10px;
    right: 10px;
  }
  .demo-swiper .swiper-slide {
    font-size: 25px;
    font-weight: 300;
    display: block;
    background: #fff;
    color: #000;
  }

  .slide-active .menu-image{
    background: #f33e3e59;
    box-shadow: 0px 1px 3px rgba(255, 127, 87, 0.7);
    border-radius: 7px;
  }

  .menu-image {
    box-sizing: border-box;
    background: #FAF5F2;
    border-radius: 7px;
    display: flex;
    width: 100%;
    height: 100%;
    justify-content: center;
    align-items: center;
  }
  .position-relative{
    position: relative;
  }
  .menu-title,.menu-list-title{
    text-align: center;
    font-size: 18px;
    padding: 0 10px;
  }
  .menu-title::before{
    position: absolute;
    content: '';
    border: 1px dashed #000;
    left: 0;
    width: 100%;
    height: 0px;
    top: 11px;
    z-index: -1;
  }
  .menu-title span{
    background: white;
    padding: 0 10px;
  }
  .add-favlist i{
    box-shadow: 1px 1px 8px rgba(0, 0, 0, 0.15);
    border-radius: 32px;
  }
  .dots{
    flex: 1;
    border-bottom: 2px dotted #000;
    height: 1em;
  }
  .swiper-slide{
    width: 67px;
    height: 67px;
  }
  .menu-lists {
      height:calc(100vh - 430px);
      overflow-y : scroll;
  }
  .no_order {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: calc(100% - 110px);
  }

  .no_order_text p {
      font-size: 20px;
      line-height: 24px;
      font-weight: 600;
      color: #38373D;
  }

  .search__img img {
      width: 100%;
      max-height: 320px;
      height: 100%;
      object-fit: cover;
  }
</style>
