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
                    <div id="AllUsers" class="tab tab-active"><UserTable :items="userData?.all" :dataType="'all'" @open:edit-popup="showUserPopup" @delete:user="deleteUserData" /></div>
                    <div id="KitchenManager" class="tab"><UserTable :items="userData?.manager" :dataType="'manager'" @open:edit-popup="showUserPopup" @delete:user="deleteUserData" /></div>
                    <div id="Waiter" class="tab"><UserTable :items="userData?.waiter" :dataType="'waiter'" @open:edit-popup="showUserPopup" @delete:user="deleteUserData" /></div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup addEditUserPopup" id="addEditUserPopup">
        <AddUpdatePopup :title="addUpdateTitle" :form-data-format="addUpdateFormDataFormat" @store:update="saveUserData" />
    </div>
    <!-- ========= DELETE USER POPUP ========= -->
    <div class="popup removePopup">
        <RemovePopup :title="'Are you sure delete this user?'" @remove="removeData"
        />
    </div>
</template>
<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { f7 } from 'framework7-vue';
import { successNotification, errorNotification } from '../../../commonFunction.js';
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
    { label: 'Role', multipleLang: false, type: 'drop-down', name: 'role', options: [ { label: 'Manager', id: 'manager'}, { label: 'Waiter', id: 'waiter'} ], placeHolder: 'Select Role', value: 1 },
    { label: 'Lock pin', name: 'lock_pin', type: 'password', placeHolder: 'Enter Lock pin', value: ''},
    { label: 'Lock Status', name: 'lock_enable', type: 'switch', value: 1, changeStatus: 1 },
]);

const userData = ref([]);
const deleteId = ref('');

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
        f7.popup.open(`#addEditUserPopup`);
    }else{
        resetFormData();
    }
    addUpdateTitle.value = id ? 'Edit User' : 'Add User';
    f7.popup.open(`.addUpdatePopup`);
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
    f7.popup.open(`.removePopup`);
}

const removeData = () => {
    axios.delete('/api/delete-user-data/'+deleteId.value)
    .then((res) => {
        successNotification(res.data.success);
        f7.popup.close(`.removePopup`);
        getUser();
    })
}

getUser();
</script>
