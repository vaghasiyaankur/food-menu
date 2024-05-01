<template>
<div class="toolbar tabbar vertical-setting-tabs">
    <div class="toolbar-inner">
        <SettingTabLink :tabs="allTabs" :active-tab="currentTab" @update:activeTab="setCurrentTab"/>
    </div>
</div>
<div class="tabs">
    <div id="tab-general-setting" class="tab tab-active">
        <GeneralSetting />
    </div>
    <div id="tab-currency" class="tab">
        <CurrencySetting />
    </div>
    <div id="tab-taxes" class="tab">
        <TaxSetting />
    </div>
    <div id="tab-user-management" class="tab">
        <UserManagement />
    </div>
    <div id="tab-language" class="tab">
        <Language @change:langTrans="langTrans" :showLangs="showLangs" v-if="showLangs" />
        <LanguageTranslate @change:langTrans="langTrans" :langId="langId" v-else />
    </div>
    <div id="tab-floor-plan" class="tab">
        <FloorList />
    </div>
    <div id="tab-qr-code-generator" class="tab">
        <QrCodeGenerate />
    </div>
    <div id="tab-Coupon-Code" class="tab">
        <CouponCode />
    </div>
</div>
</template>

<script setup>
import SettingTabLink from './SettingTabLink.vue';
import GeneralSetting from './GeneralSetting.vue';
import CurrencySetting from './CurrencySetting.vue';
import TaxSetting from './TaxSetting.vue';
import UserManagement from './UserManagement.vue';
import Language from './Language.vue';
import LanguageTranslate from './LanguageTranslate.vue';
import FloorList from './FloorList.vue'
import { ref, onMounted } from 'vue';
import QrCodeGenerate from './QrCodeGenerate.vue';
import CouponCode from './CouponCode.vue';

const allTabs = [
    { label: 'General Setting', slug: 'general-setting', icon: 'generalSetting'},
    { label: 'Currency', slug: 'currency', icon: 'currency'},
    { label: 'Taxes', slug: 'taxes', icon: 'taxes'},
    { label: 'User Management', slug: 'user-management', icon: 'userManagement'},
    { label: 'Language', slug: 'language', icon: 'language'},
    { label: 'Floor Plan', slug: 'floor-plan', icon: 'floorPlan'},
    { label: 'QR Code Generator', slug: 'qr-code-generator', icon: 'qrCodeScanner'},
    { label: 'Coupon Code', slug: 'Coupon-Code', icon: 'CouponCode'}
];

const componentInstance = ref(null);

const props = defineProps({
    tabs: Object,
});

const showLangs = ref(true);
const langId = ref(0);

const currentTab = ref('general-setting');

const setCurrentTab = (tab) => {
    currentTab.value = tab;
    if (tab == "language") {
        showLangs.value = true;
    }
};

const langTrans = (isLang, newLangId) => {
    showLangs.value = isLang; // Assuming showLangs is defined elsewhere as a reactive variable
    langId.value = newLangId; // Assigning the newLangId to the reactive ref
}

onMounted(() => {
    componentInstance.value = this;
});
</script>
