<template>
    <f7-page>
        <div class="setting-tabs">
            <div class="col-100 large-50 medium-40 setting-tabs-banner display-none">
                <h3 class="no-padding no-margin">
                    <span class="page_heading settings-banner">Settings</span>
                </h3>
            </div>
            <div class="setting-tabs-banner">
                <h3 class="no-padding no-margin">
                    <span class="page_heading settings-banner">User Management</span>
                </h3>
                <div class="settings_page-tab_listing">
                    <div class="toolbar toolbar-top tabbar">
                        <div class="toolbar-inner">
                            <a href="#AllUsers" class="tab-link tab-link-active">All Users</a>
                            <a href="#SuperAdmin" class="tab-link">Super Admin</a>
                            <a href="#SubAdmin" class="tab-link">Sub Admin</a>
                            <a href="#KitchenManager" class="tab-link">Kitchen Manager</a>
                            <a href="#Waiter" class="tab-link">Waiter</a>
                        </div>
                        <div class="tabs">
                            <div id="AllUsers" class="tab tab-active"></div>
                            <div id="SuperAdmin" class="tab"></div>
                            <div id="SubAdmin" class="tab"></div>
                            <div id="KitchenManager" class="tab"></div>
                            <div id="Waiter" class="tab"></div>
                        </div>
                    </div>
                </div>
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
