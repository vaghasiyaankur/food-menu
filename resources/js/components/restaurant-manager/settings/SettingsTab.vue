<template>
    <f7-page>
        <div class="nav-bar">
            <f7-navbar class="navbar-menu bg-color-white" large transparent back-link="Back">
                <div class="header-links display-flex align-items-center padding-right">
                    <div class="row header-link justify-content-flex-end align-items-center">
                        <div class="col">
                            <div class="menu-item menu-item-dropdown">
                                <div class="menu-item-content button button-raised bg-dark text-color-white padding-left-half padding-right-half">Menu management</div>
                                <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                                    <div class="menu-dropdown-content bg-color-white padding-left padding-right">
                                        <a href="#" class="menu-dropdown-link menu-close"></a>
                                        <a href="/food-category/" class="menu-dropdown-link menu-close text-color-pink">Food Category</a>
                                        <a href="/food-product/" class="menu-dropdown-link menu-close text-color-black">Food Menu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col padding-left-half padding-right-half height-40"><button class="col nav-link button button-raised bg-dark text-color-white padding closeReservation" @click="$root.closeReservation()">Close reservation</button></div>
                        <div class="col padding-left-half padding-right-half height-40"><a href="/settings/" class="col nav-link button button-raised bg-pink text-color-white padding">Settings</a></div>
                    </div>
                </div>
            </f7-navbar>
        </div>
        <div class="product-list-section">
            <div class="card">
                <div class="card_header">
                    <div class="row padding-left padding-right align-items-center">
                        <div class="col-50">
                            <h3 class="card-title">Settings</h3>
                        </div>
                    </div>
                </div>
                <div class="card-content card-content-header">
                    <div class="toolbar tabbar toolbar-top">
                        <div class="toolbar-inner">
                            <a href="#tab-1" class="tab-link tab-link-active">General</a>
                            <a href="#tab-2" class="tab-link">Add floor plan</a>
                            <a href="#tab-3" class="tab-link">Next</a>
                        </div>
                    </div>
                    <div class="tabs-animated-wrap">
                        <div class="tabs">
                            <div id="tab-1" class="tab tab-active">
                                <GeneralSetting />
                            </div>
                            <div id="tab-2" class="tab">
                                <AddFloorPlan />
                            </div>
                            <div id="tab-3" class="tab">
                                <h2>tab 3</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>
<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input } from 'framework7-vue';
import GeneralSetting from './GeneralSetting.vue';
import AddFloorPlan from './AddFloorPlan.vue';
import $ from 'jquery';
export default {
    name : 'SettingsTab',
    components: {
        f7Page,
        f7Navbar,
        f7BlockTitle,
        f7Block,
        f7,
        f7Input,
        GeneralSetting,
        AddFloorPlan
    },
    mounted() {
        $('.page-content').css('background', '#F0F0F0');
    },
}
</script>

<style scoped>

.product-list-section .tabs-animated-wrap .card{
    box-shadow:none;
}
    .page-food-category {
        background: #f1f1f1;
    }

    .navbar-menu {
        box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.15);
        height: 60px !important;
        position: relative;
        z-index: 99;
    }

    .height-40 {
        height: 40px;
    }

    .nav-link,.menu-item-content {
        height: 100%;
        text-transform: capitalize;
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

    .color-pink {
        background: #F33E3E;
    }

    .nav-bar {
        border-radius: 8px 8px 0px 0px;
    }

    .page-content {
        padding-top: 0px !important;
    }

    .icon-only {
        width: 100% !important;
        height: 100% !important;
    }

    .border-bottom {
        border-bottom: 1px solid #EAEAEA;
    }

    .padding-icon {
        padding: 3px;
    }

    .border-right {
        border-right: 1px solid #F3F3F3 !important;
    }

    .header-links {
        width: 50%;
    }

    .bg-pink {
        background: #F33E3E;
    }

    .bg-karaka-orange{
        background: #EE4925;
    }

    .text-color-pink {
        color: #F33E3E;
    }

    .font-22 {
        font-size: 22px;
    }
    .card-title{
        font-weight: 600;
        font-size: 20px;
        line-height: 24px;
        color: #38373D;
    }
    .tabs-animated-wrap,.tabs-animated-wrap > .tabs{
        height: auto;
    }

    .tab-link{
        background-image: url('/images/tab_bg.png');
        background-color: transparent;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        margin: 5px;
    }
    .tab-link-active{
        background-image: url('/images/active_tab_bg.png');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        color:#fff !important;
        background-color: transparent;
    }

    .toolbar{
        background-color: transparent !important;
    }

    .toolbar-inner{
        width:50%;
    }

    @media screen and (max-width:820px) {
        .header-links {
            width: 100%;
        }
    }
</style>

<style>
    .left {
        width: 50%;
        margin-left: 20px;
    }
    @media screen and (max-width:820px) {
        .left {
            width: 30%;
        }
    }
</style>
