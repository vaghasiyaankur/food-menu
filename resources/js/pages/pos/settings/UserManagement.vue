<template>
    <div class="user_setting-tab">
        <div class="settings_page-tab_listing">
            <div class="toolbar toolbar-top tabbar">
                <div class="toolbar-inner">
                    <div class="display-flex justify-content-space-around align-items-center w-100">
                        <a href="#AllUsers" class="tab-link tab-link-active"><Icon name="multiUserIcon" /> All Users</a>
                        <a href="#KitchenManager" class="tab-link"><Icon name="ManagerIcon" /> Kitchen Manager</a>
                        <a href="#Waiter" class="tab-link"><Icon name="waiterIcon" /> Waiter</a>
                    </div>

                    <div class="no-padding no-margin">
                        <button class="button button-raised button-raise text-color-white bg-pink height-40 padding-horizontal padding-vertical-half text-transform-capitalize"><Icon name="plusCircleIcon" class="margin-right-half" /> Add User</button>
                    </div>
                </div>
                <div class="tabs margin-bottom">
                    <div id="AllUsers" class="tab tab-active"><UserTable :items="userData" :dataType="''" /></div>
                    <div id="KitchenManager" class="tab"><UserTable :items="userData" :dataType="'manager'" /></div>
                    <div id="Waiter" class="tab"><UserTable :items="userData" :dataType="'waiter'" /></div>
                </div>
            </div>
        </div>
    </div>

</template>
<script setup>
import Icon from '../../../components/Icon.vue';
import UserTable from '../../../components/UserTable.vue';
import { ref } from 'vue';
import axios from 'axios';

const userData = ref([]);

const getUser = () => {
    axios.get('/api/get-users')
    .then((res) => {
        userData.value = res.data.users;
    })                                                                                                                                                                      
}

getUser();
</script>