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
</div>
</template>

<script setup>
import SettingTabLink from './SettingTabLink.vue';
import GeneralSetting from './GeneralSetting.vue';
import CurrencySetting from './CurrencySetting.vue';
import TaxSetting from './TaxSetting.vue';
import UserManagement from './UserManagement.vue';
import { ref } from 'vue';

const allTabs = [
    { label: 'General Setting', slug: 'general-setting', icon: 'generalSetting'},
    { label: 'Currency', slug: 'currency', icon: 'currency'},
    { label: 'Taxes', slug: 'taxes', icon: 'taxes'},
    { label: 'User Management', slug: 'user-management', icon: 'userManagement'},
];

const props = defineProps({
    tabs: Object,
});

const currentTab = ref('general-setting');

const setCurrentTab = (tab) => {
    currentTab.value = tab;
};
</script>
