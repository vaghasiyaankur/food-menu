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
                                <div class="menu-item-content button button-raised bg-dark text-color-white padding-left-half padding-right-half">Menu management
                                    <i class="f7-icons">chevron_down</i>
                                </div>
                                <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                                    <div class="menu-dropdown-content bg-color-white no-padding">
                                        <a href="#" class="menu-dropdown-link menu-close margin-horizontal no-padding"></a>
                                        <a href="/food-category/" class="menu-dropdown-link menu-close text-color-pink margin-horizontal no-padding">Food Category</a>
                                        <a href="/food-product/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food Menu                                            
                                        </a>                                            
                                        <a href="/food-subcategory/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food SubCategory</a>
                                        <a href="/digital-menu/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Digital Menu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" padding-left-half padding-right-half height-40 nav-button"><a href="/Reporting/" class="col link nav-link button button-raised bg-dark text-color-white padding">Reporting</a></div>
                        <div class="padding-left-half padding-right-half height-40"><button class="nav-link button button-raised bg-dark text-color-white padding closeReservation" @click="$root.closeReservation()">Close reservation</button></div>
                        <div class="padding-left-half padding-right-half height-40"><a href="/settings/" class="nav-link button button-raised bg-pink text-color-white padding">Settings</a></div>
                    </div>
                </div>
            </f7-navbar>
        </div>
        <div class="product-list-section">
            <div class="card elevation-2">
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
                            <a href="#tab-2" class="tab-link">Table Management</a>
                            <!-- <a href="#tab-3" class="tab-link">Next</a> -->
                        </div>
                    </div>
                    <div class="tabs-animated-wrap">
                        <div class="tabs">
                            <div id="tab-1" class="tab tab-active">
                                <GeneralSetting />
                            </div>
                            <div id="tab-2" class="tab">
                                <TableFloorPlan v-if="tableShow" @tablehide="addEditTableShow" :page="page"/>
                                <AddTable v-if="!tableShow" @tableshow="tableShow = true" :tableId="tableId"/>
                            </div>
                            <!-- <div id="tab-3" class="tab">
                                <h2>Tab 3</h2>
                            </div> -->
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
import TableFloorPlan from './TableFloorPlan.vue';
import AddTable from './AddTable.vue';
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
        TableFloorPlan,
        AddTable,
    },
    data(){
        return {
            tableShow : true,
            tableId : 0,
            page : 1,
        }
    },
    mounted() {
        $('.page-content').css('background', '#FFF');
    },
    methods: {
        addEditTableShow(id, page) {
            this.tableId = id;
            this.page = page;
            this.tableShow = false;
        }
    }
}
</script>

<style scoped>
.menu-item-dropdown .menu-item-content .f7-icons{
    font-size: 15px;
    margin-left: 10px;
}
.product-list-section{
    margin-top:70px;
}
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
.menu-dropdown-link{
    border-bottom: 1px solid #EFEFEF;
}


.color-pink {
    background: #F33E3E;
}

.nav-bar {
    border-radius: 8px 8px 0px 0px;
    position:fixed;
    width:100%;
    z-index: 99;
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
    width: 75%;
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
    z-index: 98;
}

.toolbar-inner{
    width:40%;
}

@media screen and (max-width:820px) {
    .header-links {
        width: 100%;
    }
    .toolbar-inner{
        width:50%;
    }
}
</style>

<style>
.left {
    width: 20%;
    margin-left: 20px;
}
@media screen and (max-width:820px) {
    .left {
        width: 5%;
    }
}
</style>
