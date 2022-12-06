<template>
<f7-page>
        <div class="nav-bar">
            <f7-navbar class="navbar-menu bg-color-white" large transparent back-link="Back">
                <div class="header-links display-flex align-items-center padding-right">
                    <div class="row header-link justify-content-flex-end align-items-center">
                        <div class=" padding-left-half padding-right-half height-40 nav-button">
                            <a href="/Reservation/" class="col link nav-link button button-raised bg-dark text-color-white padding">
                                Reservation</a>
                        </div>
                        <div class="nav-button col-25">
                            <div class="menu-item menu-item-dropdown">
                                <div class="menu-item-content button button-raised bg-pink text-color-white padding-left-half padding-right-half">Menu management
                                    <i class="f7-icons">chevron_down</i>
                                </div>
                                <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                                    <div class="menu-dropdown-content bg-color-white no-padding">
                                        <a href="#" class="menu-dropdown-link menu-close margin-horizontal no-padding"></a>
                                        <a href="/food-category/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food Category</a>
                                        <a href="/food-product/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food Menu</a>
                                        <a href="/food-subcategory/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food subCategory</a>
                                        <a href="/digital-menu/" class="menu-dropdown-link menu-close text-color-pink margin-horizontal no-padding">Digital Menu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" padding-left-half padding-right-half height-40 nav-button"><a href="/Reporting/" class="link nav-link button button-raised bg-dark text-color-white padding">Reporting</a></div>
                        <div class="padding-left-half padding-right-half height-40"><button class="nav-botton button button-raised bg-dark text-color-white padding closeReservation" @click="$root.closeReservation()">Close reservation</button></div>
                        <div class="padding-left-half padding-right-half height-40"><a href="/settings/" class="nav-link button button-raised bg-dark text-color-white padding">Settings</a></div>
                    </div>
                </div>
            </f7-navbar>
        </div>
        <div class="card digital_menu_card elevation-2">
            <div class="row padding-horizontal no-padding-vertical">
                <div class="col">
                    <h3 class="card-title margin-bottom-half">Food Menu</h3>
                    <p class="no-margin"> Select your favourite food and enjoy with family</p>
                </div>
            </div>
            <div class="digital_menu_swiper padding">
                <div data-pagination='{"el":".swiper-pagination"}' data-space-between="20" data-slides-per-view="11"
                class="swiper swiper-init demo-swiper margin-top margin-bottom" style="height : 135px">
                    <div class="swiper-pagination"></div>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide margin-right" :class="{ 'slide-active': category.id == sliderActive}" v-for="category in product_category" :key="category" @click="getProducts(category.id)">
                            <div class="menu-image">
                                <img :src="'/storage'+category.image" alt="">
                            </div>
                            <p class="font-13 no-margin text-align-center margin-top-half">{{ category.name }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu_list">
                <div class="position-relative">
                    <div class="menu-title"><span>{{ categoryName }} Menu</span></div>
                </div>
                    <div class="menu-details margin-top">
                        <div class="menu-lists">
                            <div class="row" v-if="product_subcategory.length">
                                <div class="col-50" v-for="subcate in product_subcategory" :key="subcate">
                                    <div class="menu-list">
                                        <div class="font-18 text-align-center menu-list-title text-color-black"><u>{{ subcate.name }}</u></div>
                                        <div class="list row margin-half align-items-center" v-for="product in subcate.products" :key="product">
                                            <div class="col-80 display-flex">{{ product.name }} <span class="dots"></span></div>
                                            <div class="col-20">{{ product.price.toFixed(2) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
</f7-page>
</template>

<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input,f7Sheet,f7PageContent} from 'framework7-vue';
import $ from 'jquery';
import axios from 'axios';

export default {
    name: 'FoodSubCategory',
    components: {
        f7Page,
        f7Navbar,
        f7BlockTitle,
        f7Block,
        f7,
        f7Input,
        f7Sheet,
        f7PageContent
    },
    data() {
        return{
            product_category: [],
            sliderActive: 0,
            categoryName: '',
            product_subcategory : [],
        }
    },
    created() {
        $('.page-content').css('background', '#FFF');
        this.getCategories();
    },
    methods: {
        getCategories() {
            axios.post('/api/get-categories')
            .then((res) => {
                this.product_category = res.data;
                this.getProducts(this.product_category[0].id);
            })
        },
        getProducts(id) {
            this.sliderActive = id;
            axios.get('/api/get-category-products/'+id)
            .then((res) => {
                this.categoryName = res.data.name;
                this.product_subcategory = res.data.sub_category;
            })
        }
    },
}
</script>

<style scoped>
    .menu-item-dropdown .menu-item-content .f7-icons{
        font-size: 15px;
        margin-left: 10px;
    }
    .page-content{
        background-color: #fff !important;
    }
    .nav-bar{
        position: fixed;
        width: 100%;
        z-index: 100;
    }
    .digital_menu_card{
        margin-top: 77px;
        height: calc(100vh - 100px);
    }
    .card-title{
        font-weight: 600;
        font-size: 20px;
        line-height: 24px;
        color: #38373D;
    }
    .navbar-menu {
        box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.15);
        height: 60px !important;
        position: relative;
        z-index: 99;
    }
    .font-13{
        font-size: 13px;
        font-weight: 500;
        font-size: 13px;
        line-height: 18px;
    }
    .height-40 {
        height: 40px;
    }
    .nav-botton {
        height: 100%;
    }

    .menu-item-content {
        position: relative;
        z-index: 9;
    }

    .menu-dropdown-content {
        box-shadow: 0px 0.5px 12px rgba(0, 0, 0, 0.2);
        min-width: 100% !important;
        top: -30px;
    }

    .header-links {
        width: 75%;
    }

    .menu-dropdown-center:before,
    .menu-dropdown-center:after {
        content: none;
    }

    .bg-dark {
        background: #38373D;
    }

    .menu-item-dropdown-opened .menu-item-content {
        background: #F33E3E;
    }

    .menu-dropdown-link:nth-child(2) {
        border-bottom: 1px solid #EFEFEF;
    }
    .menu-dropdown-link{
        border-bottom: 1px solid #EFEFEF;
    }
    .bg-pink {
        background: #F33E3E;
    }

    .text-color-pink {
        color: #F33E3E;
    }

    .font-22 {
        font-size: 22px;
    }

    .nav-bar {
        border-radius: 8px 8px 0px 0px;
    }
    .nav-link,
    .menu-item-content {
        height: 100% !important;
        text-transform: capitalize !important;
    }

    /*<!-- =======MENU CSS ========== -->*/
    .demo-swiper .swiper-slide {
        font-size: 25px;
        font-weight: 300;
        display: block;
        background: #fff;
        color: #000;
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
        left: 10%;
        width: 80%;
        height: 0px;
        top: 11px;
        z-index: 1;
      }
      .menu-title span{
        background: white;
        padding: 0 10px;
        position: relative;
        z-index: 2;
      }
      /*.add-favlist i{
        box-shadow: 1px 1px 8px rgba(0, 0, 0, 0.15);
        border-radius: 32px;
        height: 30px;
        width: 30px;
      }*/
      .dots{
        flex: 1;
        border-bottom: 2px dotted #000;
        height: 1em;
      }
      .swiper-slide{
        width: 67px;
        height: 67px;
      }
      .menu-lists{
        height: 100%;
        max-height: 390px;
        overflow: auto;
      }
      .swiper-horizontal>.swiper-pagination-bullets, .swiper-pagination-bullets.swiper-pagination-horizontal, .swiper-pagination-custom, .swiper-pagination-fraction{
        bottom: 0;
      }
      .digital_menu_card .menu-details{
        width: 82%;
        margin: 0 auto;
      }
    @media screen and (max-width:820px) {
        .header-links {
            width: 100%;
        }
    }
    </style>

<style>
    .slide-active .menu-image{
        background: #f33e3e59 !important;
        box-shadow: 0px 1px 3px #f33e3e59;
        border-radius: 7px;
      }
    .left {
        width: 20%;
        margin-left: 20px;
    }

    .swiper-pagination-bullet-active{
        background:#F33E3E !important;
      }
    @media screen and (max-width:820px) {
        .left {
            width: 5%;
        }
    }
</style>
