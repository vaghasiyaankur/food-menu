<template>
    <div class="user_setting-tab">
        <div class="settings_page-tab_listing">
            <div class="toolbar toolbar-top tabbar">
                <div class="toolbar-inner">
                    <div class="display-flex justify-content-space-between align-items-center w-70">
                        <a class="tab-link" :class="{ 'tab-link-active' : dataType == 'all'}" @click="dataType = 'all'"><Icon name="multiUserIcon" /> All Users</a>
                        <a class="tab-link" :class="{ 'tab-link-active' : dataType == 'manager'}" @click="dataType = 'manager'"><Icon name="ManagerIcon" /> Kitchen Manager</a>
                        <a class="tab-link" :class="{ 'tab-link-active' : dataType == 'waiter'}" @click="dataType = 'waiter'"><Icon name="waiterIcon" :color=" dataType == 'waiter' ? '#f33e3e' : '#38373d'" /> Waiter</a>
                    </div>

                    <div class="no-padding no-margin">
                        <button class="button button-raised button-raise text-color-white bg-pink height-40 padding-horizontal padding-vertical-half text-transform-capitalize" data-popup="#addEditUserPopup" @click="showUserPopup();"><Icon name="plusCircleIcon" class="margin-right-half" /> Add User</button>
                    </div>
                </div>
                <div class="tabs margin-bottom">
                    <div id="AllUsers" class="tab tab-active"><UserTable :items="userData[dataType]" :dataType="dataType" @open:edit-popup="showUserPopup" @delete:user="deleteUserData" /></div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup addEditUserPopup" id="addEditUserPopup">
        <AddUpdatePopup :title="addUpdateTitle" :form-data-format="addUpdateFormDataFormat" @store:update="saveUserData" />
    </div>
    <!-- ========= DELETE USER POPUP ========= -->
    <div class="popup removeUserPopup">
        <RemovePopup :title="'Are you sure delete this user?'" @remove="removeData" />
    </div>
</template>
<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { f7 } from 'framework7-vue';
import { successNotification, errorNotification, getErrorMessage } from '../../../commonFunction.js';
import UserTable from '../../../components/UserTable.vue';
import AddUpdatePopup from '../../../components/common/AddUpdatePopup.vue'
import RemovePopup from '../../../components/common/RemovePopup.vue'
import Icon from '../../../components/Icon.vue';

const addUpdateTitle = ref('Add User');

const addUpdateFormDataFormat = ref([
    { label: 'Id', name: 'id', type: 'hidden', placeHolder: 'User Id', value: ''},
    { label: 'Name', name: 'name', type: 'text', placeHolder: 'Enter Name', value: ''},
    { label: 'Email', name: 'email', type: 'email', placeHolder: 'Enter Email', value: ''},
    { label: 'Password', name: 'password', type: 'password', placeHolder: 'Enter Password', value: ''},
    { label: 'Confirm Password', name: 'confirm_password', type: 'password', placeHolder: 'Enter Confirm Password', value: ''},
    { label: 'Role', multipleLang: false, type: 'drop-down', name: 'role', options: [{ label: 'Manager', id: 'manager'}, { label: 'Waiter', id: 'waiter'}], placeHolder: 'Select Role', value: 1 },
    { label: 'Lock pin', name: 'lock_pin', type: 'password', placeHolder: 'Enter Lock pin', value: ''},
    { label: 'Lock Status', name: 'lock_enable', type: 'switch', value: 1, changeStatus: 1 },
]);

const userData = ref([]);
const deleteId = ref('');
const dataType = ref('all');

const getUser = () => {
    axios.get('/api/get-users')
    .then((res) => {
        userData.value = res.data.users;
    });                                                                                                                                                      
}

const saveUserData = () => {    
    var formData = new FormData(event.target);
    axios.post('/api/save-user-data', formData)
    .then((res) => {
        successNotification(res.data.success);
        f7.popup.close(`#addEditUserPopup`);
        resetFormData();
        getUser();
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
}

const manipulateField = (formData, label, value = null) => {
    const index = formData.findIndex(item => item.label === label);
    if (index !== -1) {
        formData[index].value = (label === 'Lock Status') ? value !== null ? value : formData[index].default : value !== null ? value : formData[index].default;
    }
};

const showUserPopup = (id = null) => {
    if(id){
        const user = userData.value.all.find(item => item.id === id);
        updateFormData(user);
    }else{
        resetFormData();
    }
    addUpdateTitle.value = id ? 'Edit User' : 'Add User';
    f7.popup.open(`#addEditUserPopup`);
};

const updateFormData = (user) => {
    const formData = addUpdateFormDataFormat.value;
    manipulateField(formData, 'Id', user.id);
    manipulateField(formData, 'Name', user.name);
    manipulateField(formData, 'Email', user.email);
    manipulateField(formData, 'Password', user.password);
    
    manipulateField(formData, 'Confirm Password', user.password);
    manipulateField(formData, 'Role', user.role);
    manipulateField(formData, 'Lock pin', parseInt(user.lock_pin));
    manipulateField(formData, 'Lock Status', parseInt(user.lock_enable));
};

const resetFormData = () => {
    addUpdateFormDataFormat.value.forEach((item) => {
        manipulateField(addUpdateFormDataFormat.value, item.label, '');
    });
}

const deleteUserData = (id) => {
    deleteId.value = id;
    f7.popup.open(`.removeUserPopup`);
}

const removeData = () => {
    axios.delete('/api/delete-user-data/'+deleteId.value)
    .then((res) => {
        successNotification(res.data.success);
        f7.popup.close(`.removeUserPopup`);
        getUser();
    })
}

getUser();
</script>
