<template>
    <f7-page>
        <div class="user_admin_page">
            <div class="user_header">
                <h2 class="no-margin">User</h2>
                <f7-breadcrumbs>
                    <f7-breadcrumbs-item class="f7-link" active>
                        <f7-link>Dashboard</f7-link>
                    </f7-breadcrumbs-item>
                    <f7-breadcrumbs-separator />
                    <f7-breadcrumbs-item class="f7-link">
                        <f7-link>Customers</f7-link>
                    </f7-breadcrumbs-item>
                </f7-breadcrumbs>
            </div>
            <div class="user_info">
                <div class="table_search_filter">
                    <div class="search_bar_left">
                        <div class="search_bar">
                            <form data-search-container=".search-list" data-search-in=".item-title" class="searchbar">
                                <input type="search" placeholder="Search User" @input="getUserList()" v-model="searchQuery" />
                                <i class="searchbar-icon"></i>
                                <span class="input-clear-button"></span>
                            </form>
                        </div>
                        <select name="" id="select_filter" placeholder="User Filter" @change="getUserList()" v-model="userType">
                            <option value="">All</option>
                            <option value="manager">Manager</option>
                            <option value="waiter">Waiter</option>
                        </select>
                    </div>
                    <div class="no-padding no-margin">
                        <button class="button button-raised button-raise text-color-white bg-pink height-40 padding-horizontal padding-vertical-half text-transform-capitalize" data-popup="#addEditPopup" @click="showUserPopup();"><Icon name="plusCircleIcon" class="margin-right-half" /> Add User</button>
                    </div>
                </div>
                <div class="user_table_wrapper">
                    <table class="user_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Mobile Number</th>
                                <th>Role</th>
                                <th>Simulation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in users" :key="user.id">
                                <td>{{ (paginateData.per_page * (pageCount - 1)) + (index + 1) }}</td>
                                <td>
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="/images/user.png" width="40px" height="40px">
                                        </div>
                                        <div class="customer-name">{{ user.name }}</div>
                                    </div>
                                </td>
                                <td>{{ user.mobile_number ? user.mobile_number : '' }}</td>
                                <td>{{ roleLabel(user.role) }}</td>
                                <td>
                                    <div class="flex gap-4 items-center">
                                        <svg @click="handleSimulation(user.id)" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11 9.57143C11.8351 9.57143 12.6514 9.32008 13.3457 8.84916C14.0401 8.37824 14.5813 7.7089 14.9008 6.92579C15.2204 6.14268 15.304 5.28096 15.1411 4.44961C14.9782 3.61827 14.5761 
                                                2.85463 13.9856 2.25526C13.3951 1.65589 12.6427 1.24772 11.8237 1.08235C11.0047 0.916985 10.1557 1.00186 9.38423 1.32623C8.61272 1.65061 7.95329 2.19992 7.48935 2.9047C7.02541 3.60948 
                                                6.77778 4.43808 6.77778 5.28572C6.77778 6.42236 7.22262 7.51245 8.01444 8.31617C8.80626 9.1199 9.8802 9.57143 11 9.57143ZM11 2.42857C11.5567 2.42857 12.1009 2.59614 12.5638 2.91009C13.0267 
                                                3.22404 13.3875 3.67026 13.6005 4.19233C13.8136 4.71441 13.8693 5.28889 13.7607 5.84312C13.6521 6.39735 13.384 6.90644 12.9904 7.30602C12.5967 7.7056 12.0952 7.97772 11.5491 8.08796C11.0031 
                                                8.1982 10.4372 8.14162 9.92282 7.92537C9.40848 7.70912 8.96886 7.34291 8.65957 6.87306C8.35027 6.4032 8.18518 5.85081 8.18518 5.28572C8.18518 4.52795 8.48175 3.80123 9.00963 3.26541C9.53751 
                                                2.72959 10.2535 2.42857 11 2.42857ZM11 11C5.88407 11 1.5 14.5714 1.5 17.4286C1.5 20.5786 6.29926 21 11 21C15.7007 21 20.5 20.5786 20.5 17.4286C20.5 14.5714 16.1159 11 11 11ZM11 19.5714C9.00148 
                                                19.5714 2.90741 19.5714 2.90741 17.4286C2.90741 15.4571 6.53148 12.4286 11 12.4286C15.4685 12.4286 19.0926 15.4571 19.0926 17.4286C19.0926 19.5714 12.9985 19.5714 11 19.5714Z"
                                                fill="#F33E3E" />
                                        </svg>
                                        <svg @click="setEditDeleteId(user.id, 'delete', '')" width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3 6H5H21V8H19.3628L18.2794 20.5561C18.2152 21.3541 17.5408 22 16.7397 22H7.26028C6.45924 22 5.78483 21.3541 5.72057 20.5561L4.63716 8H3V6ZM8 10V19H10V10H8ZM14 
                                            10V19H16V10H14ZM5.93682 8L6.86142 20H17.1386L18.0632 8H5.93682ZM14 2H10V4H4V6H20V4H14V2Z" fill="#F33E3E"/>
                                        </svg>
                                        <svg @click="setEditDeleteId(user.id, 'edit', user)" width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.5 6.53573V11.1786C13.5 12.4585 12.4585 13.5 11.1785 13.5H2.82142C1.54151 13.5 0.5 12.4585 0.5 11.1786V2.82145C0.5 1.54154 1.54151 0.500029 2.82142 0.500029H7.46427C7.72067 0.500029 7.92855 0.707912 
                                            7.92855 0.964314C7.92855 1.22071 7.72067 1.4286 7.46427 1.4286H2.82142C2.05338 1.4286 1.42857 2.05341 1.42857 2.82145V11.1786C1.42857 11.9466 2.05338 12.5714 2.82142 12.5714H11.1785C11.9466 12.5714 12.5714 11.9466 
                                            12.5714 11.1786V6.53573C12.5714 6.27933 12.7793 6.07144 13.0357 6.07144C13.2921 6.07144 13.5 6.27933 13.5 6.53573ZM3.88603 7.13605L10.386 0.636064C10.5674 0.454645 10.8612 0.454645 11.0425 0.636064L13.3639 2.95749C13.5454 
                                            3.13891 13.5454 3.43268 13.3639 3.61399L6.86395 10.114C6.7769 10.201 6.65885 10.25 6.5357 10.25H4.21428C3.95788 10.25 3.74999 10.0421 3.74999 9.78572V7.4643C3.74999 7.34115 3.79897 7.2231 3.88603 7.13605ZM9.97791 2.35717L11.6428 
                                            4.02209L12.3792 3.28574L10.7143 1.62081L9.97791 2.35717ZM4.67856 9.32144H6.34349L10.9863 4.67859L9.32141 3.01367L4.67856 7.65651V9.32144Z" fill="#F33E3E" stroke="#F33E3E" stroke-width="0.7"></path>
                                        </svg>
                                    </div>
                                </td>
                            </tr>
                            <tr v-if="users.length == 0">
                                <td colspan="5">No Data Found !!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination_wrapper" v-if="users.length != 0">
                    <p class="no-margin">Showing {{ paginateData.to }} of {{paginateData.total}} Results</p>
                    <div class="pagination">
                        <Pagination :function-name="getUserList" :data="paginateData" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Update User Popup -->
        <div class="popup addEditPopup" id="addEditPopup">
            <AddUpdatePopup  :title="addUpdateTitle"  :form-data-format="addUpdateFormDataFormat"  @store:update="saveUserData" />
        </div>
        <!-- ========= DELETE USER POPUP ========= -->
        <div class="popup removeUserPopup">
            <RemovePopup :title="'Are you sure delete this user?'" @remove="deleteUser" />
        </div>
    </f7-page>
</template>

<script setup>
    import axios from 'axios';
    import { ref, onMounted } from 'vue';
    import {
        f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Breadcrumbs,
        f7BreadcrumbsItem, f7BreadcrumbsSeparator, f7BreadcrumbsCollapsed,
    } from 'framework7-vue';
    import Pagination from '../../components/Pagination.vue';
    import { errorNotification, successNotification } from '../../commonFunction';
    import RemovePopup from '../../components/common/RemovePopup.vue';
    import Icon from '../../components/Icon.vue';
    import AddUpdatePopup from '../../components/common/AddUpdatePopup.vue';

    const addUpdateFormDataFormat = ref([
        { label: 'Id', name: 'id', type: 'hidden', placeHolder: 'User Id', value: ''},
        { label: 'Name', name: 'name', type: 'text', placeHolder: 'Enter Name', value: ''},
        { label: 'Email', name: 'email', type: 'email', placeHolder: 'Enter Email', value: ''},
        { label: 'Mobile Number', name: 'mobile_number', type: 'number', placeHolder: 'Enter Mobile Number', value: ''},
        { label: 'Password', name: 'password', type: 'password', placeHolder: 'Enter Password', value: ''},
        { label: 'Confirm Password', name: 'confirm_password', type: 'password', placeHolder: 'Enter Confirm Password', value: ''},
        { label: 'Role', multipleLang: false, type: 'drop-down', name: 'role', options: [{ label: 'Manager', id: 'manager'}, { label: 'Waiter', id: 'waiter'}], placeHolder: 'Select Role', value: 1 },
        { label: 'Lock pin', name: 'lock_pin', type: 'password', placeHolder: 'Enter Lock pin', value: ''},
        { label: 'Lock Status', name: 'lock_enable', type: 'switch', value: 1, changeStatus: 1 },
    ]);

    const users = ref([]);
    const paginateData = ref([]);

    const userType = ref("");
    const searchQuery = ref("");

    const pageNumber = ref(1);
    const pageCount = ref(1);

    const editDeleteId = ref(null);
    const editUser = ref(null);

    const addUpdateTitle = ref("Add User");

    onMounted(() => {
        getUserList();
    });

    const showUserPopup = () => {
        resetFormData();
        f7.popup.open(`#addEditPopup`);
    }

    const getUserList = async (pageNum) => {
        if (pageNum == undefined || pageNum == 1) {
            pageNum = 1
        } else if (pageNum.includes('page')) {        
                pageNum = pageNum.split('page=')[1];
        }
        pageNumber.value = pageNum;
        pageCount.value = pageNum;

        var page = '/api/get-users' + '?page=' + pageNum + '&type=admin-user' + '&search=' + searchQuery.value + '&filter='+ userType.value;
        await axios.get(page)
            .then(response => {
                users.value = response.data.users.all.data;
                paginateData.value = response.data.users.all;
            }).catch((error) => {
                console.error("Error fetching users:", error);
            });
    }

    const roleLabel = (role) => {
        var roleType = '';
        if(role == 'manager') {
            roleType = 'Manager';
        }
        if(role == 'waiter') {
            roleType = 'Waiter';
        }
        return roleType;
    }

    const handleSimulation = async (userID) => {
        await axios.get(`/api/user-simulation/${userID}`)
            .then(response => {
                if(response.status) {
                    successNotification(response.data.success);
                }
            }).catch((error) => {
                console.error('An Error Ocurred When Change User Simulation : ', error)
            });
    }

    const saveUserData = () => {
        const formData = new FormData(event.target);
        !editDeleteId.value ? formData.append('id', "") : formData.append('id', editDeleteId.value);
        
        axios.post('/api/save-user-data', formData)
            .then(response => {
                successNotification(response.data.success);
                f7.popup.close(`#addEditPopup`);
                getUserList(1);
                event.target.reset();
            }).catch((error) => {
                if(error.response && error.response.status == 422) {
                    errorNotification(error.response.data.message);
                }
            });
    }

    const updateFormData = (user) => {
        const formData = addUpdateFormDataFormat.value;
        manipulateField(formData, 'Id', user.id);
        manipulateField(formData, 'Name', user.name);
        manipulateField(formData, 'Email', user.email);
        manipulateField(formData, 'Mobile Number', user.mobile_number);
        manipulateField(formData, 'Password', user.password);
        manipulateField(formData, 'Confirm Password', user.password);
        manipulateField(formData, 'Role', user.role);
        manipulateField(formData, 'Lock pin', parseInt(user.lock_pin));
        manipulateField(formData, 'Lock Status', parseInt(user.lock_enable));
    }

    const manipulateField = (formData, label, value = null) => {
        const index = formData.findIndex(item => item.label === label);
        if (index !== -1) {
            formData[index].value = value !== null ? value : formData[index].default;
        }
    }

    const resetFormData = () => {
        addUpdateFormDataFormat.value.forEach(field => {
            field.value = ''; 
        });
    }

    const setEditDeleteId = (id, type, user) => {
        editDeleteId.value = id;
        if(type == 'edit') {
            editUser.value = user;
            updateFormData(editUser.value);
            addUpdateTitle.value = 'Edit User';
        } else {
            editUser.value = null;
            addUpdateTitle.value = 'Add User';
        }
        f7.popup.open(type == 'edit' ? `#addEditPopup` : `.removeUserPopup`);
    }

    const deleteUser = async () => {
        axios.delete('api/delete-user-data/'+editDeleteId.value)
            .then(response => {
                successNotification(response.data.success);
                f7.popup.close(`.removeUserPopup`);
                getUserList(1);
            }).catch((error) => {
                errorNotification(error);
            })
    }
</script>