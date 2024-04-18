<template>
    <div class="user_setting-tab">
        <div class="settings_page-tab_listing">
            <div class="toolbar toolbar-top tabbar">
                <div class="toolbar-inner">
                    <div class="display-flex justify-content-space-between align-items-center w-70">
                        <a href="#AllUsers" class="tab-link tab-link-active"><Icon name="multiUserIcon" /> All Users</a>
                        <a href="#KitchenManager" class="tab-link"><Icon name="ManagerIcon" /> Kitchen Manager</a>
                        <a href="#Waiter" class="tab-link"><Icon name="waiterIcon" /> Waiter</a>
                    </div>

                    <div class="no-padding no-margin">
                        <button class="button button-raised button-raise text-color-white bg-pink height-40 padding-horizontal padding-vertical-half text-transform-capitalize" data-popup="#addEditUserPopup" @click="f7.popup.open(`.addEditUserPopup`);"><Icon name="plusCircleIcon" class="margin-right-half" /> Add User</button>
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
    <div class="popup addEditUserPopup" id="addEditUserPopup">
        <AddUpdatePopup :title="'Add User'" :form-data-format="addUpdateFormDataFormat" @store:update="saveUserData" />
    </div>
</template>
<script setup>
import Icon from '../../../components/Icon.vue';
import UserTable from '../../../components/UserTable.vue';
import { ref } from 'vue';
import axios from 'axios';
import { f7 } from 'framework7-vue';
import AddUpdatePopup from '../../../components/common/AddUpdatePopup.vue';
import { successNotification, errorNotification } from '../../../commonFunction.js';

const addUpdateFormDataFormat = ref([
    { label: 'Id', name: 'id', type: 'hidden', placeHolder: 'User Id', value: ''},
    { label: 'Name', name: 'name', type: 'text', placeHolder: 'Enter Name', value: ''},
    { label: 'Email', name: 'email', type: 'email', placeHolder: 'Enter Email', value: ''},
    { label: 'Password', name: 'password', type: 'password', placeHolder: 'Enter Password', value: ''},
    { label: 'Confirm Password', name: 'confirm_password', type: 'password', placeHolder: 'Enter Confirm Password', value: ''},
    {
        label: 'Role',
        multipleLang: false,
        type: 'drop-down',
        name: 'role',
        options: [
            { label: 'Manager', value: 'manager'},
            { label: 'Waiter', value: 'waiter'}
        ],
        placeHolder: 'Select Role',
        value: 1
    },
    { label: 'Lock pin', name: 'lock_pin', type: 'password', placeHolder: 'Enter Lock pin', value: ''},
    { label: 'Lock Status', name: 'lock_enable', type: 'switch', value: 1 },
]);

const userData = ref([]);

const getUser = () => {
    axios.get('/api/get-users')
    .then((res) => {
        userData.value = res.data.users;
    })                                                                                                                                                                      
}

getUser();

const saveUserData = () => {
    var formData = new FormData(event.target);
    axios.post('/api/save-user-data', formData)
    .then((res) => {
        successNotification(res.data.success);
        event.target.reset();
    })
}
</script>