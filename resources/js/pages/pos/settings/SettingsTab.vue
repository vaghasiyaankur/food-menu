<template>
    <f7-page>
        <div class="product-list-section">
            <div class="card elevation-2">
                <div class="card-content card-content-header padding-top">
                    <div class="toolbar tabbar toolbar-top">
                        <div class="toolbar-inner">
                            <NavigationTab :tableShow="tableShow" :floorlistShow="floorlistShow" :language="language" />
                        </div>
                    </div>
                    <div class="tabs">
                        <div id="tab-1" class="tab tab-active">
                            <GeneralSetting />
                        </div>
                        <div id="tab-2" class="tab">
                            <TablePlan v-if="tableShow" @tablehide="addEditTableShow" :tablehide="addEditTableShow" :page="page"/>
                            <AddTable v-if="!tableShow" @tableshow="tableShow = true" :tableId="tableId"/>
                        </div>
                        <div id="tab-3" class="tab">
                            <FloorList v-if="floorlistShow" @floorlisthide="addEditFloorShow" :page="floorpage" :floorlisthide="addEditFloorShow" />
                            <FloorPlan v-if="!floorlistShow"  @floorlistshow="floorlistShow = true" :floorId="floorId" />
                        </div>
                        <div id="tab-4" class="tab">
                            <Language v-if="language" @languagelisthide="languagelisthide"/>
                            <LanguageTraslation  v-if="!language" @languagelistshow="language = true" :langId="langId" />
                        </div>
                        <div id="tab-5" class="tab">
                            <QrCodeGenerate />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>
<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input } from 'framework7-vue';
import NavigationTab from './Tab.vue';
import GeneralSetting from './GeneralSetting.vue';
import TablePlan from './TablePlan.vue';
import FloorList from './FloorList.vue';
import Language from './Language.vue';
import AddTable from './AddTable.vue';
import FloorPlan from '../../restaurant-manager/settings/FloorPlan.vue';
import LanguageTraslation from '../../restaurant-manager/settings/EditTranslations.vue';
import QrCodeGenerate from '../../restaurant-manager/settings/QrCodeGenerate.vue';
import { ref } from 'vue';
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
        NavigationTab,
        GeneralSetting,
        TablePlan,
        AddTable,
        FloorPlan,
        FloorList,
        Language,
        LanguageTraslation,
        QrCodeGenerate
    },
    data(){
        return {
            tableShow : true,
            floorlistShow : true,
            tableId : 0,
            page: 1,
            floorId: 0,
            floorpage : 1,
            language: true,
            langId : 1,
        }
    },
    beforeCreate() {
        this.$root.addLoader();
    },
    mounted() {
        $('.page-content').css({'background': '#F7F7F7', 'overflow-y': 'auto','overflow-x': 'hidden'});
        this.$root.activationMenu('setting', '');
        this.$root.removeLoader();
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
        languagelisthide(id) {
            this.langId = id;
            this.language = false;
        }
    }
}
</script>

<style scoped>

.product-list-section .card{
    box-shadow: none !important;

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
.tabbar .tab-link, .tabbar-labels .tab-link, .tabbar .link, .tabbar-labels .link{
	position: relative;
	width: auto;
	display: flex;
	justify-content: center;
	align-items: center;
	background-color:  #E1E1E1;
	margin: 0 auto;
	border-top-right-radius: 15px;
	border-top-left-radius: 15px;
	padding: 12px;
    overflow: inherit;
    flex: 1;
    margin: 15px;
    color: #555555;
}
.tabbar .tab-link-active, .tabbar-labels .tab-link-active{
    background-color:  #F33E3E;
    color: #ffffff;
}

.toolbar-inner{
    overflow: inherit !important;
}
.tab-link::after {
	content: "";
	position: absolute;
	right: -17px;
	bottom: 0px;
	background: none;
    width: 1.125rem;
    height: 1.125rem;
    background: radial-gradient(circle at 100% 0, transparent 1.125rem, #e1e1e1 1.25rem);
}
.tab-link::before {
	content: "";
	position: absolute;
	left: -17px;
	bottom: 0px;
	background: none;
    width: 1.125rem;
    height: 1.125rem;
    background: radial-gradient(circle at 0 0, transparent 1.125rem, #e1e1e1 1.25rem);
}
.tab-link.tab-link-active::after{
    background: radial-gradient(circle at 100% 0, transparent 1.125rem, #F33E3E 1.25rem);
}
.tab-link.tab-link-active::before{
    background: radial-gradient(circle at 0 0, transparent 1.125rem, #F33E3E 1.25rem);
}
.toolbar{
    background-color: transparent !important;
    z-index: 98;
}

.toolbar-inner{
    width:85%;
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

