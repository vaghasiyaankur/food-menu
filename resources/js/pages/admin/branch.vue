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
                                <input type="search" placeholder="Search Branch" @input="searchBranch()" v-model="searchQuery"/>
                                <i class="searchbar-icon"></i>
                                <span class="input-clear-button"></span>
                            </form>
                        </div>
                        <select @change="searchBranch()" v-model="restaurantType" name="restaurant" id="select_filter" placeholder="User Filter">
                            <option selected value="">All</option>
                            <option v-for="restaurant in filterRestaurant" :key="restaurant.id" :value="restaurant.id">{{ restaurant.name }}</option>
                        </select>
                    </div>
                    <div class="no-padding no-margin">
                        <button @click="showBranchModal()" class="button button-raised button-raise text-color-white bg-pink height-40 padding-horizontal padding-vertical-half text-transform-capitalize" data-popup="#addEditBranchPopup">
                            <Icon name="plusCircleIcon" class="margin-right-half" /> Add Branch
                        </button>
                    </div>
                </div>
                <div class="user_table_wrapper">
                    <table class="user_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Logo</th>
                                <th>Branch Name</th>
                                <th>Owner Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Mobile Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(branch, index) in branchDetails" :key="index">
                                <td>{{ (paginateData.per_page * (pageCount - 1)) + (index + 1) }}</td>
                                <td>
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img :src="'/storage/'+branch.logo" width="40px" height="40px">
                                        </div>
                                    </div>
                                </td>
                                <td>{{ branch.branch_name }}</td>
                                <td>{{ branch.owner_name }}</td>
                                <td>{{ branch.email }}</td>
                                <td>{{ branch.address }}</td>
                                <td>{{ branch.mobile_number }}</td>
                                <td>
                                    <div class="flex gap-4 items-center">
                                        <svg @click="setEditDelete(branch.id, 'delete')" width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3 6H5H21V8H19.3628L18.2794 20.5561C18.2152 21.3541 17.5408 22 16.7397 22H7.26028C6.45924 22 5.78483 21.3541 5.72057 20.5561L4.63716 8H3V6ZM8 10V19H10V10H8ZM14 
                                            10V19H16V10H14ZM5.93682 8L6.86142 20H17.1386L18.0632 8H5.93682ZM14 2H10V4H4V6H20V4H14V2Z" fill="#F33E3E"/>
                                        </svg>
                                        <svg @click="setEditDelete(branch.id, 'edit')" width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.5 6.53573V11.1786C13.5 12.4585 12.4585 13.5 11.1785 13.5H2.82142C1.54151 13.5 0.5 12.4585 0.5 11.1786V2.82145C0.5 1.54154 1.54151 0.500029 2.82142 0.500029H7.46427C7.72067 0.500029 7.92855 0.707912 
                                            7.92855 0.964314C7.92855 1.22071 7.72067 1.4286 7.46427 1.4286H2.82142C2.05338 1.4286 1.42857 2.05341 1.42857 2.82145V11.1786C1.42857 11.9466 2.05338 12.5714 2.82142 12.5714H11.1785C11.9466 12.5714 12.5714 11.9466 
                                            12.5714 11.1786V6.53573C12.5714 6.27933 12.7793 6.07144 13.0357 6.07144C13.2921 6.07144 13.5 6.27933 13.5 6.53573ZM3.88603 7.13605L10.386 0.636064C10.5674 0.454645 10.8612 0.454645 11.0425 0.636064L13.3639 2.95749C13.5454 
                                            3.13891 13.5454 3.43268 13.3639 3.61399L6.86395 10.114C6.7769 10.201 6.65885 10.25 6.5357 10.25H4.21428C3.95788 10.25 3.74999 10.0421 3.74999 9.78572V7.4643C3.74999 7.34115 3.79897 7.2231 3.88603 7.13605ZM9.97791 2.35717L11.6428 
                                            4.02209L12.3792 3.28574L10.7143 1.62081L9.97791 2.35717ZM4.67856 9.32144H6.34349L10.9863 4.67859L9.32141 3.01367L4.67856 7.65651V9.32144Z" fill="#F33E3E" stroke="#F33E3E" stroke-width="0.7"></path>
                                        </svg>
                                    </div>
                                </td>
                            </tr>
                            <tr v-if="branchDetails.length == 0">
                                <td colspan="8">No Data Found !!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination_wrapper">
                    <p class="no-margin">Showing {{ paginateData.to }} of {{ paginateData.total }} Results</p>
                    <div class="pagination">
                        <Pagination :function-name="getBranchList" :data="paginateData" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Update Branch Popup -->
        <div class="popup addEditBranchPopup" id="addEditBranchPopup">
            <AddUpdateBranch ref="branchRef" :modal-title="modalTitle" :branch-details="currentBranchDetails" @save-branch="saveBranch" />
        </div>
        <!-- ========= DELETE Branch POPUP ========= -->
        <div class="popup removeBranchPopup">
            <RemovePopup :title="'Are you sure delete this branch ?'" @remove="deleteBranch" />
        </div>
    </f7-page>
</template>

<script setup>
    import axios from 'axios';
    import { ref, onMounted } from 'vue';
    import Icon from '../../components/Icon.vue';
    import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Breadcrumbs, f7BreadcrumbsItem, f7BreadcrumbsSeparator, f7BreadcrumbsCollapsed } from 'framework7-vue';
    import Pagination from '../../components/Pagination.vue';
    import AddUpdateBranch from './Modal/AddUpdateBranch.vue';
    import RemovePopup from '../../components/common/RemovePopup.vue';
    import { errorNotification, successNotification } from '../../commonFunction';

    onMounted(() => {
        getBranchList();
    });

    const branchDetails = ref([]);
    const paginateData = ref([]);
    const filterRestaurant = ref([]);

    const restaurantType = ref("");
    const searchQuery = ref("");

    const pageNumber = ref(1);
    const pageCount = ref(1);

    const modalTitle = ref(null);
    const editDeleteId = ref(null);

    const currentBranchDetails = ref(null);
    const originalBranchDetails = ref(null);

    const branchRef = ref(null);

    const debounce = (func, delay) => {
        let timeoutId;
        return function (...args) {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => {
                func.apply(this, args);
            }, delay);
        };
    }

    const searchBranch = debounce(() => {
        const currentSearchQuery = searchQuery.value;
        const currentRestaurantType = restaurantType.value;
        getBranchList(currentSearchQuery, currentRestaurantType);
    }, 300);

    const getBranchList = async (searchQuery = '', restaurantType = '', pageNum) => {
        
        if (pageNum == undefined || pageNum == 1) {
            pageNum = 1
        } else if (pageNum.includes('page')) {        
                pageNum = pageNum.split('page=')[1];
        }
        pageNumber.value = pageNum;
        pageCount.value = pageNum;

        var page = '/api/branch-list' + '?page=' + pageNum + '&search=' + searchQuery + '&filter='+ restaurantType;

        axios.get(page)
        .then(response => {
            branchDetails.value = response.data.branch.data;
            paginateData.value = response.data.branch;
            filterRestaurant.value = response.data.restaurant;
        }).catch((error) => {
            console.error("Error fetching branch :", error);
        });
    }

    const showBranchModal = () => {
        branchRef.value.logo = '';
        modalTitle.value = "Add Branch";
        currentBranchDetails.value = {};
        originalBranchDetails.value = {};
        f7.popup.open(`#addEditBranchPopup`);
    }

    const saveBranch = (branch) => {
        axios.post('/api/add-update-branch', branch)
        .then(response => {
            successNotification(response.data.success);
            f7.popup.close(`#addEditBranchPopup`);
            getBranchList('', '', 1);
        })
        .catch(error => {
            if (error.response && error.response.status === 422) {
                const errors = error.response.data.error;
                for (const messages of Object.entries(errors)) {
                    messages.forEach(message => errorNotification(`${message}`));
                }
            } else {
                errorNotification('An unexpected error occurred.');
            }
        });
    }

    const setEditDelete = (id, type) => {
        editDeleteId.value = id;
        if (type == 'edit') {
            modalTitle.value = 'Edit Branch';
            const branch = branchDetails.value.find(branch => branch.id === id);
            currentBranchDetails.value = { ...branch }; 
            originalBranchDetails.value = { ...branch };
        }
        f7.popup.open(type == 'edit' ? '#addEditBranchPopup' :'.removeBranchPopup');
    }

    const deleteBranch = () => {
        axios.delete('/api/delete-branch/'+editDeleteId.value)
        .then(response => {
            if(response.status) {
                f7.popup.close(`.removeBranchPopup`);
                successNotification(response.data.success);
                getBranchList('', '', 1);
            }
        }).catch((error) => {
            if(error.response || error.response.status == 404) {
                errorNotification(error.response.data.message);
            }
        })
    }
</script>