<template>
    <f7-page>
        <div class="setting-tabs">
            <div class="col-100 large-50 medium-40 margin-left">
                <h3>
                    <span class="page_heading settings-banner">Settings</span>
                </h3>
            </div>
            <div class="card elevation-2 settings_tabs">
                <div class="card-content setting_tab_card">
                    <SettingTab />
                </div>
            </div>
        </div>
    </f7-page>
</template>

<script setup>
import {
    f7Page,
    f7Navbar,
    f7BlockTitle,
    f7Block,
    f7,
    f7Input
} from 'framework7-vue';
import Icon from '../../components/Icon.vue';
import SettingTab from './settings/SettingTab.vue';


</script>
