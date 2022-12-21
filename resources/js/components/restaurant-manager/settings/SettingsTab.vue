<template>
    <f7-page>
        <!-- <div class="nav-bar">
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
                                        <a href="/" class="menu-dropdown-link menu-close text-color-pink">Table</a>
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
        </div> -->
        <div class="product-list-section">
            <div class="card elevation-2">
                <!-- <div class="card_header">
                    <div class="row padding-left padding-right align-items-center">
                        <div class="col-50">
                            <h3 class="card-title"><a href="javscript:;" class="text-color-black"><i class="f7-icons font-22" style="vertical-align: bottom;">arrow_left</i></a> Settings</h3>
                        </div>
                    </div>
                </div> -->
                <div class="card-content card-content-header padding-top">
                    <div class="toolbar tabbar toolbar-top">
                        <div class="toolbar-inner">
                            <a href="#tab-1" class="tab-link tab-link-active">General</a>
                            <a href="#tab-2" class="tab-link" @click="tableShow = true">Table Management</a>
                            <a href="#tab-3" class="tab-link" @click="floorlistShow = true">Floor Plan</a>
                            <a href="#tab-4" class="tab-link" @click="floorlistShow = true">Language</a>
                        </div>
                    </div>
                    <div class="tabs-animated-wrap">
                        <div class="tabs">
                            <div id="tab-1" class="tab tab-active">
                                <GeneralSetting />
                            </div>
                            <div id="tab-2" class="tab">
                                <TablePlan v-if="tableShow" @tablehide="addEditTableShow" :page="page"/>
                                <AddTable v-if="!tableShow" @tableshow="tableShow = true" :tableId="tableId"/>
                            </div>
                            <div id="tab-3" class="tab">
                                <FloorList v-if="floorlistShow" @floorlisthide="addEditFloorShow" :page="floorpage" />
                                <FloorPlan v-if="!floorlistShow"  @floorlistshow="floorlistShow = true" :floorId="floorId" />
                            </div>
                            <div id="tab-4" class="tab tab-active">
                                <Language v-if="language" @languagelisthide="language = false" />
                                <LanguageTraslation  v-if="!language" @languagelistshow="language = true" />
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
import TablePlan from './TablePlan.vue';
import FloorPlan from './FloorPlan.vue';
import AddTable from './AddTable.vue';
import FloorList from './FloorList.vue';
import Language from './Language.vue';
import LanguageTraslation from './EditTranslations.vue';
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
        TablePlan,
        AddTable,
        FloorPlan,
        FloorList,
        Language,
        LanguageTraslation
    },
    data(){
        return {
            tableShow : true,
            floorlistShow : true,
            tableId : 0,
            page: 1,
            floorId: 0,
            floorpage : 1,
            language : 1,
        }
    },
    mounted() {
        $('.page-content').css('background', '#F7F7F7');
        this.$root.activationMenu('setting');
    },
    methods: {
        addEditTableShow(id, page) {
            this.tableId = id;
            this.page = page;
            this.tableShow = false;
        },
        addEditFloorShow(id, page) {
            this.floorId = id;
            this.floorpage = page;
            this.floorlistShow = false;
        },
    }
}
</script>

<style scoped>

.product-list-section{
    margin-top:70px;
}
.product-list-section .tabs-animated-wrap .card{
    box-shadow:none;
}
.page-food-category {
    background: #f1f1f1;
}

.height-40 {
    height: 40px;
}

.bg-dark {
    background: #38373D;
}

.color-pink {
    background: #F33E3E;
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
    width:70%;
}

@media screen and (max-width:820px) {
    .header-links {
        width: 100%;
    }
    .toolbar-inner{
        width:100%;
    }
}
</style>

<style>
.text-underline{
    text-decoration: underline;
}
.data-table thead th:not(.sortable-cell-active), .data-table thead td:not(.sortable-cell-active){
    font-weight: 600;
    font-size: 15px;
    line-height: 18px;
    color: #555555;
    background-color: #F4F4F4;
}
.icon-checkbox, .checkbox i{
    border-radius: 3px !important;
}
label.item-checkbox input[type="checkbox"]:checked ~ .icon-checkbox{
    background-color: #F33E3E;
    border-color: #F33E3E;
  }
.data-table tbody td::before, .data-table tbody th::before {
	background-color: transparent !important;
}
.card-content .data-table td{
	padding-top: 15px;
	padding-bottom: 15px;
	white-space: nowrap;
}
.data-table tbody tr:nth-child(even) {
	background-color: #FAFAFA;
}
.card-title{
    font-weight: 600;
    font-size: 20px;
    line-height: 24px;
    color: #38373D;

}
.data-table{
    overflow-y: hidden;
}
</style>
