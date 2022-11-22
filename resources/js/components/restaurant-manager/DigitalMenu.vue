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
                            <div class="nav-button">
                                <div class="menu-item menu-item-dropdown">
                                    <div class="menu-item-content button button-raised bg-pink text-color-white padding-left-half padding-right-half">Menu management</div>
                                    <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                                        <div class="menu-dropdown-content bg-color-white padding-left padding-right">
                                            <a href="#" class="menu-dropdown-link menu-close"></a>
                                            <a href="/food-category/" class="menu-dropdown-link menu-close text-color-pink">Food Category</a>
                                            <a href="/food-product/" class="menu-dropdown-link menu-close text-color-black">Food Menu</a>
                                            <a href="/food-subcategory/" class="menu-dropdown-link menu-close text-color-black">Food subCategory</a>
                                            <a href="/digital-menu/" class="menu-dropdown-link menu-close text-color-black">Digital Menu</a>
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
                            <div class="swiper-slide slide-active">
                                <div class="menu-image col">
                                    <img src="/images/indian_dish.png" alt="">
                                </div>
                                <p class="font-13 no-margin text-align-center margin-top-half">Indian</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="menu-image">
                                    <img src="/images/chinese_dish.png" alt="">
                                </div>
                                <p class="font-13 no-margin text-align-center margin-top-half">Chinese</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="menu-image">
                                    <img src="/images/panjabi_dish.png" alt="">
                                </div>
                                <p class="font-13 no-margin text-align-center margin-top-half">Panjabi</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="menu-image">
                                    <img src="/images/dessert_dish.png" alt="">
                                </div>
                                <p class="font-13 no-margin text-align-center margin-top-half">Dessert</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="menu-image">
                                    <img src="/images/fast_food_dish.png" alt="">
                                </div>
                                <p class="font-13 no-margin text-align-center margin-top-half">Fast Food</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="menu-image">
                                    <img src="/images/indian_dish.png" alt="">
                                </div>
                                <p class="font-13 no-margin text-align-center margin-top-half">Indian</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="menu-image">
                                    <img src="/images/chinese_dish.png" alt="">
                                </div>
                                <p class="font-13 no-margin text-align-center margin-top-half">Chinese</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="menu-image">
                                    <img src="/images/panjabi_dish.png" alt="">
                                </div>
                                <p class="font-13 no-margin text-align-center margin-top-half">Panjabi</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="menu-image">
                                    <img src="/images/dessert_dish.png" alt="">
                                </div>
                                <p class="font-13 no-margin text-align-center margin-top-half">Dessert</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="menu-image">
                                    <img src="/images/fast_food_dish.png" alt="">
                                </div>
                                <p class="font-13 no-margin text-align-center margin-top-half">Fast Food</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="menu-image">
                                    <img src="/images/fast_food_dish.png" alt="">
                                </div>
                                <p class="font-13 no-margin text-align-center margin-top-half">Fast Food</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="menu-image">
                                    <img src="/images/fast_food_dish.png" alt="">
                                </div>
                                <p class="font-13 no-margin text-align-center margin-top-half">Fast Food</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="menu-image">
                                    <img src="/images/fast_food_dish.png" alt="">
                                </div>
                                <p class="font-13 no-margin text-align-center margin-top-half">Fast Food</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="menu-image">
                                    <img src="/images/fast_food_dish.png" alt="">
                                </div>
                                <p class="font-13 no-margin text-align-center margin-top-half">Fast Food</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu_list">
                    <div class="position-relative">
                        <div class="menu-title"><span>Indian Menu</span></div>
                    </div>
                        <div class="menu-details margin-top">
                            <div class="menu-lists">
                                <div class="row">
                                    <div class="col-50">
                                        <div class="menu-list">
                                            <div class="font-18 text-align-center menu-list-title text-color-black"><u>Dosa</u></div>
                                            <div class="list row margin-half align-items-center">
                                                <div class="col-10">
                                                    <!-- <span class="add-favlist">
                                                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                                                    </span> -->
                                                </div>
                                                <div class="col-70 display-flex">Jini Dosa <span class="dots"></span></div>
                                                <div class="col-20">110.00</div>
                                            </div>
                                            <div class="list row margin-half align-items-center">
                                                <div class="col-10">
                                                    <!-- <span class="add-favlist">
                                                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart_fill</i>
                                                    </span> -->
                                                </div>
                                                <div class="col-70 display-flex">Cheese Paneer Chilli Dosa <span class="dots"></span></div>
                                                <div class="col-20">110.00</div>
                                            </div>
                                            <div class="list row margin-half align-items-center">
                                                <div class="col-10">
                                                <!-- <span class="add-favlist">
                                                    <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                                                </span> -->
                                                </div>
                                                <div class="col-70 display-flex">Paneer jini Dosa <span class="dots"></span></div>
                                                <div class="col-20">110.00</div>
                                            </div>
                                            <div class="list row margin-half align-items-center">
                                                <div class="col-10">
                                                    <!-- <span class="add-favlist">
                                                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart_fill</i>
                                                    </span> -->
                                                </div>
                                                <div class="col-70 display-flex">Pav Bhaji Dosa <span class="dots"></span></div>
                                                <div class="col-20">110.00</div>
                                            </div>
                                            <div class="list row margin-half align-items-center">
                                                <div class="col-10">
                                                    <!-- <span class="add-favlist">
                                                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart_fill</i>
                                                    </span> -->
                                                </div>
                                                <div class="col-70 display-flex">Pizza Dosa <span class="dots"></span></div>
                                                <div class="col-20">110.00</div>
                                            </div>
                                            <div class="list row margin-half align-items-center">
                                                <div class="col-10">
                                                    <!-- <span class="add-favlist">
                                                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                                                    </span> -->
                                                </div>
                                                <div class="col-70 display-flex">Masala Dosa <span class="dots"></span></div>
                                                <div class="col-20">110.00</div>
                                            </div>
                                            <div class="list row margin-half align-items-center">
                                                <div class="col-10">
                                                    <!-- <span class="add-favlist">
                                                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                                                    </span> -->
                                                </div>
                                                <div class="col-70 display-flex">Sada Dosa <span class="dots"></span></div>
                                                <div class="col-20">110.00</div>
                                            </div>
                                            <div class="list row margin-half align-items-center">
                                                <div class="col-10">
                                                    <!-- <span class="add-favlist">
                                                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                                                    </span> -->
                                                </div>
                                                <div class="col-70 display-flex">Mysore Dosa <span class="dots"></span></div>
                                                <div class="col-20">110.00</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-50">
                                        <div class="menu-list">
                                            <div class="font-18 text-align-center menu-list-title text-black"><u>Gujrati Dish</u></div>
                                            <div class="list row margin-half align-items-center">
                                                <div class="col-10">
                                                    <!-- <span class="add-favlist">
                                                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart_fill</i>
                                                    </span> -->
                                                </div>
                                                <div class="col-70 display-flex">Rice <span class="dots"></span></div>
                                                <div class="col-20">110.00</div>
                                            </div>
                                            <div class="list row margin-half align-items-center">
                                                <div class="col-10">
                                                    <!-- <span class="add-favlist">
                                                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                                                    </span> -->
                                                </div>
                                                <div class="col-70 display-flex">Dal <span class="dots"></span></div>
                                                <div class="col-20">110.00</div>
                                            </div>
                                            <div class="list row margin-half align-items-center">
                                                <div class="col-10">
                                                    <!-- <span class="add-favlist">
                                                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                                                    </span> -->
                                                </div>
                                                <div class="col-70 display-flex">Roti <span class="dots"></span></div>
                                                <div class="col-20">110.00</div>
                                            </div>
                                            <div class="list row margin-half align-items-center">
                                                <div class="col-10">
                                                    <!-- <span class="add-favlist">
                                                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                                                    </span> -->
                                                </div>
                                                <div class="col-70 display-flex">Pavbhaji <span class="dots"></span></div>
                                                <div class="col-20">110.00</div>
                                            </div>
                                            <div class="list row margin-half align-items-center">
                                                <div class="col-10">
                                                    <!-- <span class="add-favlist">
                                                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                                                    </span> -->
                                                </div>
                                                <div class="col-70 display-flex">Samosa <span class="dots"></span></div>
                                                <div class="col-20">110.00</div>
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
        mounted() {
            $('.page-content').css('background', '#FFF');
        },
    }
    </script>
    
    <style scoped>
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
        width: 90%;
        margin: 0 auto;
      }
    @media screen and (max-width:820px) {
        .header-links {
            width: 100%;
        }
    }
    </style>
    
    <style>
    .left {
        width: 20%;
        margin-left: 20px;
    }
    
    .swiper-pagination-bullet-active{
        background:#F33E3E !important;
      }
    @media screen and (max-width:820px) {
        .left {
            width: 30%;
        }
    }
    </style>
