<template>
    <f7-page class="page-food-category">
        <div class="nav-bar">
            <f7-navbar
            class="navbar-menu bg-color-white"
            large
            transparent
            back-link="Back"
            >
                <div class="header-links display-flex align-items-center padding-right">
                <div class="row header-link justify-content-flex-end align-items-center">
                    <div class="col">
                        <div class="menu-item menu-item-dropdown">
                        <div class="menu-item-content button button-raised bg-pink text-color-white padding-left-half padding-right-half">Menu management</div>
                        <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                            <div class="menu-dropdown-content bg-color-white padding-left padding-right">
                                <a href="#" class="menu-dropdown-link menu-close"></a>
                                <a href="/food-category/" class="menu-dropdown-link menu-close text-color-pink">Food Category</a>
                                <a href="#" class="menu-dropdown-link menu-close text-color-black">Food Menu</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col padding-left-half padding-right-half height-40"><button class="col nav-botton button button-raised bg-dark text-color-white padding">Close reservation</button></div>
                    <div class="col padding-left-half padding-right-half height-40"><button class="col nav-botton button button-raised bg-dark text-color-white padding">Settings</button></div>
                </div>
            </div>
            </f7-navbar>
        </div>
    </f7-page>
</template>

<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block } from 'framework7-vue';
import $ from 'jquery';

export default {
    name : 'Favourite',
  components: {
    f7Page,
    f7Navbar,
    f7BlockTitle,
    f7Block,
  },
};
</script>

<style scoped>
    .page-food-category{
        background: #f1f1f1;
    }
    .navbar-menu{
        box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.15);
        height: 60px !important;
        position: relative;
        z-index: 99;
    }
    .height-40{
        height: 40px;
    }
    .nav-botton{
        height: 100%;
    }
    .menu-item-content{
        position: relative;
        z-index: 9;
    }
    .menu-dropdown-content{
        box-shadow: 0px 0.5px 12px rgba(0, 0, 0, 0.2);
        min-width: 100% !important;
        top:-30px;
    }

    .menu-dropdown-center:before, .menu-dropdown-center:after {
        content : none;
    }
    .bg-dark{
        background: #38373D;
    }
    .menu-item-dropdown-opened .menu-item-content{
        background: #F33E3E;
    }
    .menu-dropdown-link:nth-child(2){
        border-bottom: 1px solid #EFEFEF;
    }
    .color-pink{
        background: #F33E3E;
    }
    .nav-bar{
        border-radius: 8px 8px 0px 0px;
    }
    .page-content {
        padding-top: 0px !important;
    }
    .favourites-card{
        width: 30px;
        height: 30px;
    }
    .icon-only{
        width :100% !important;
        height: 100% !important;
    }
    .border-bottom{
        border-bottom: 1px solid #EAEAEA;
    }
    .padding-icon{
        padding : 3px;
    }
    .border-right{
        border-right: 1px solid #F3F3F3 !important;
    }

    .header-links{
        width: 50%;
    }
    .bg-pink{
        background: #F33E3E;
    }
    .text-color-pink{
        color: #F33E3E;
    }
</style>

<style>
    .left{
        width : 50%;
    }
    .cart-list{
        box-shadow: 1px 2px 5px 2px rgb(0 0 0 / 20%);
    }
    .padding-top-page-content{
        padding-top : 50px !important;
    }
    .navbar-large .title{
        opacity : 1 !important;
        left :0 !important;
    }
    .title-large{
        display: none !important;
    }
    .fav-list-remove-icon{
        border-radius: 50%;
    }
</style>
