<template>
    <f7-page>
        <div class="transaction_admin_page">
            <div class="transaction_header">
                <h2 class="no-margin">Transactions</h2>
                <f7-breadcrumbs>
                    <f7-breadcrumbs-item class="f7-link" active>
                        <f7-link>Dashboard</f7-link>
                    </f7-breadcrumbs-item>
                    <f7-breadcrumbs-separator />
                    <f7-breadcrumbs-item class="f7-link">
                        <f7-link>Transactions</f7-link>
                    </f7-breadcrumbs-item>
                </f7-breadcrumbs>
            </div>
            <div class="transaction_info">
                <div class="table_search_filter">
                    <div class="search_bar_left">
                        <div class="search_bar">
                            <form data-search-container=".search-list" data-search-in=".item-title" class="searchbar">
                                <input type="search" placeholder="Search Order ID" v-model="searchQuery" @input="getTransactionList()"/>
                                <i class="searchbar-icon"></i>
                                <span class="input-clear-button"></span>
                            </form>
                        </div>
                        <select @change="getTransactionList()" v-model="transactionStatus" name="" id="select_filter">
                            <option value="" selected>All</option>
                            <option value="cash">Cash</option>
                            <option value="card">Card</option>
                            <option value="upi">Upi</option>
                            <option value="split">Split</option>
                        </select>
                    </div>
                </div>
                <div class="transaction_table_wrapper">
                    <table class="transaction_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order ID</th>
                                <th>Payment Method</th>
                                <th>User</th>
                                <th>Payment Amount</th>
                                <th>Payment Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(transaction, index) in transactions" :key="transaction.id">
                                <td>{{ (paginateData.per_page * (pageCount - 1)) + (index + 1) }}</td>
                                <td>{{ transaction.order_id }}</td>
                                <td>{{ transaction.payment_type }}</td>
                                <td>{{ transaction.order?.customer?.name }}</td>
                                <td>{{ currency+""+formattedPrice(transaction.customer_paid) }}</td>
                                <td>Payment Received</td>
                                <td>{{ formateDateAndTime(transaction.created_at) }}</td>
                                <td>
                                    <a href="javascript:void(0)" class="delete_btn" @click="setRemoveTransactionId(transaction.id)">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.1868 4.36328C12.9903 4.36328 12.8019 4.4399 12.663 4.57628C12.5241 4.71267 12.4461 4.89764 12.4461 5.09052V13.229C12.4248 13.5968 12.2564 13.9414 11.9775 14.1878C11.6987 14.4342 11.3319 14.5624 10.9572 14.5446H5.04605C4.67131 14.5624 4.30456 14.4342 4.02569 14.1878C3.74682 13.9414 3.57841 13.5968 3.55717 13.229V5.09052C3.55717 4.89764 3.47912 4.71267 3.34021 4.57628C3.20129 4.4399 3.01288 4.36328 2.81642 4.36328C2.61997 4.36328 2.43156 4.4399 2.29264 4.57628C2.15373 4.71267 2.07568 4.89764 2.07568 5.09052V13.229C2.09683 13.9826 2.4213 14.6972 2.97804 15.2164C3.53478 15.7356 4.2784 16.017 5.04605 15.9991H10.9572C11.7248 16.017 12.4684 15.7356 13.0252 15.2164C13.5819 14.6972 13.9064 13.9826 13.9275 13.229V5.09052C13.9275 4.89764 13.8495 4.71267 13.7106 4.57628C13.5717 4.4399 13.3833 4.36328 13.1868 4.36328Z"
                                                fill="#F33E3E" />
                                            <path
                                                d="M13.9261 2.18171H10.9631V0.727236C10.9631 0.534361 10.8851 0.349386 10.7462 0.213002C10.6073 0.0766192 10.4188 0 10.2224 0H5.77794C5.58148 0 5.39307 0.0766192 5.25416 0.213002C5.11524 0.349386 5.0372 0.534361 5.0372 0.727236V2.18171H2.07424C1.87778 2.18171 1.68937 2.25833 1.55045 2.39471C1.41154 2.53109 1.3335 2.71607 1.3335 2.90894C1.3335 3.10182 1.41154 3.28679 1.55045 3.42318C1.68937 3.55956 1.87778 3.63618 2.07424 3.63618H13.9261C14.1225 3.63618 14.311 3.55956 14.4499 3.42318C14.5888 3.28679 14.6668 3.10182 14.6668 2.90894C14.6668 2.71607 14.5888 2.53109 14.4499 2.39471C14.311 2.25833 14.1225 2.18171 13.9261 2.18171ZM6.51868 2.18171V1.45447H9.48164V2.18171H6.51868Z"
                                                fill="#F33E3E" />
                                            <path
                                                d="M7.26029 11.6358V6.54511C7.26029 6.35223 7.18225 6.16726 7.04333 6.03087C6.90442 5.89449 6.71601 5.81787 6.51955 5.81787C6.32309 5.81787 6.13468 5.89449 5.99577 6.03087C5.85685 6.16726 5.77881 6.35223 5.77881 6.54511V11.6358C5.77881 11.8286 5.85685 12.0136 5.99577 12.15C6.13468 12.2864 6.32309 12.363 6.51955 12.363C6.71601 12.363 6.90442 12.2864 7.04333 12.15C7.18225 12.0136 7.26029 11.8286 7.26029 11.6358Z"
                                                fill="#F33E3E" />
                                            <path
                                                d="M10.2237 11.6358V6.54511C10.2237 6.35223 10.1456 6.16726 10.0067 6.03087C9.8678 5.89449 9.67938 5.81787 9.48293 5.81787C9.28647 5.81787 9.09806 5.89449 8.95915 6.03087C8.82023 6.16726 8.74219 6.35223 8.74219 6.54511V11.6358C8.74219 11.8286 8.82023 12.0136 8.95915 12.15C9.09806 12.2864 9.28647 12.363 9.48293 12.363C9.67938 12.363 9.8678 12.2864 10.0067 12.15C10.1456 12.0136 10.2237 11.8286 10.2237 11.6358Z"
                                                fill="#F33E3E" />
                                        </svg>
                                        <p class="no-margin">Delete</p>
                                    </a>
                                </td>
                            </tr>
                            <tr v-if="transactions.length == 0">
                                <td colspan="8" class="text-align-center">No Data Found !!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination_wrapper" v-if="transactions.length != 0">
                    <p class="no-margin">Showing {{ paginateData?.to }} of {{ paginateData?.total }} Results</p>
                    <div class="pagination">
                        <Pagination :function-name="getTransactionList" :data="paginateData"/>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========= DELETE TRANSACTION POPUP ========= -->
        <div class="popup removePopup">
            <RemovePopup :title="'Are you sure delete this Transaction ?'" @remove="deleteTransaction" />
        </div>
    </f7-page>
</template>

<script setup>
    import dayjs from 'dayjs';
    import axios from 'axios';
    import { ref, onMounted } from 'vue';
    import Pagination from '../../components/Pagination.vue';
    import RemovePopup from '../../components/common/RemovePopup.vue';
    import { formattedPrice, successNotification } from '../../commonFunction.js';
    import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Breadcrumbs, f7BreadcrumbsItem, f7BreadcrumbsSeparator, f7BreadcrumbsCollapsed, } from 'framework7-vue';

    onMounted(() => {
        getTransactionList();
    }); 

    const transactions = ref([]);
    const paginateData = ref([]);

    const searchQuery = ref("");
    const transactionStatus = ref("");

    const pageNumber = ref(1);
    const pageCount = ref(1);

    const currency = ref("");
    const deleteId = ref("");

    const getTransactionList = async (pageNum) => {

        if (pageNum == undefined || pageNum == 1) {
            pageNum = 1
        } else if (pageNum.includes('page')) {        
            pageNum = pageNum.split('page=')[1];
        }
        pageNumber.value = pageNum;
        pageCount.value = pageNum;

        var page = '/api/get-transactions' + '?page=' + pageNum + '&search=' + searchQuery.value + '&status='+ transactionStatus.value;

        await axios.get(page)
        .then(response => {
            if(response.data) {
                currency.value = response.data?.setting;
                paginateData.value = response.data?.transaction;
                transactions.value = response.data?.transaction?.data;
            }
        }).catch((error) => {
            console.error("An Error Ocurred While Fetch Transaction Detail ", error);
        });
    }

    const formateDateAndTime = (dateAndTime) => {
        if(dateAndTime) {
            return dayjs(dateAndTime).format('DD, MMM YYYY / hh:mm a');
        }
    }

    const setRemoveTransactionId = (id) => {
        deleteId.value = id;
        f7.popup.open(`.removePopup`);
    }

    const deleteTransaction = async () => {
        await axios.get('/api/delete-transaction/'+deleteId.value)
        .then(response => {
            if(response.data.success) {
                successNotification(response.data.message);
                deleteId.value = null;
                f7.popup.close(`.removePopup`);
                getTransactionList(pageNumber.value);
            }
        }).catch((error) => {
            console.error("Error Ocurred While Delete Transaction ", error);
        });
    }
</script>