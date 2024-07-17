<template>
    <f7-page>
        <div class="orders_admin_page">
            <div class="orders_header">
                <h2 class="no-margin">Orders</h2>
                <f7-breadcrumbs>
                    <f7-breadcrumbs-item class="f7-link" active>
                        <f7-link>Dashboard</f7-link>
                    </f7-breadcrumbs-item>
                    <f7-breadcrumbs-separator />
                    <f7-breadcrumbs-item class="f7-link">
                        <f7-link>Orders</f7-link>
                    </f7-breadcrumbs-item>
                </f7-breadcrumbs>
            </div>
            <div class="order_info">
                <div class="table_search_filter">
                    <div class="search_bar_left">
                        <div class="search_bar">
                            <form data-search-container=".search-list" data-search-in=".item-title" class="searchbar">
                                <input type="search" placeholder="Search Food..." v-model="searchQuery" @input="getOrders()" />
                                <i class="searchbar-icon"></i>
                                <span class="input-clear-button"></span>
                            </form>
                        </div>
                        <select @change="getOrders()" v-model="orderStatus" name="" id="select_filter">
                            <option value="" selected>All</option>
                            <option value="0">Pending</option>
                            <option value="1">Completed</option>
                            <option value="2">Cancelled</option>
                            <option value="3">Processing</option>
                        </select>
                    </div>
                    
                </div>
                <div class="order_table_wrapper">
                    <table class="order_table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Payment Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(order, index) in orders" :key="index">
                                <td>{{ (paginateData.per_page * (pageCount - 1)) + (index + 1) }}</td>
                                <td>
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="/images/user.png">
                                        </div>
                                        <div class="customer-name">{{ order.customer?.name }}</div>
                                    </div>
                                </td>
                                <td>{{ currency+""+formattedPrice(order.total_price) }}</td>
                                <td>
                                    <div v-if="order.cancelled_by" class="order_status cancelled_status">
                                        <p class="no-margin">Cancelled</p>
                                    </div>
                                    <div v-else-if="order.finished == 0 && order.start_at != null" class="order_status processing_status">
                                        <p class="no-margin">Processing</p>
                                    </div>
                                    <div v-else-if="order.finished == 1 && order.start_at != null" class="order_status completed_status">
                                        <p class="no-margin">Completed</p>
                                    </div>
                                    <div v-else-if="order.finished == 0 && order.start_at == null" class="order_status pending_status">
                                        <p class="no-margin">Pending</p>
                                    </div>
                                </td>
                                <td>{{ order.cancelled_by ? 'Payment Cancelled' : (order.finished == 1 ? 'Payment Received' : 'Payment Pending') }}</td>
                                <td>{{ formateDateAndTime(order.created_at) }}</td>
                                <td>
                                    <div class="menu-item-dropdown">
                                        <div class=""><i class="f7-icons">ellipsis</i></div>
                                        <div class="menu-dropdown menu-dropdown-right">
                                            <div class="menu-dropdown-content padding-vertical">
                                                <a class="menu-dropdown-link menu-close button padding-bottom height_40" :href="'/ordersdetail/'+order.id"><i class="f7-icons margin-right-half">eye</i>View </a>
                                                <a class="menu-dropdown-link menu-close padding-top button height_40" @click="setRemoveOrderId(order.id)"><i class="f7-icons margin-right-half">trash</i>Delete </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr v-if="orders.length == 0">
                                <td colspan="8">
                                    No Data Found !!
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination_wrapper" v-if="orders.length != 0">
                    <p class="no-margin">Showing {{ paginateData?.to }} of {{ paginateData?.total }} Results</p>
                    <div class="pagination">
                        <Pagination :function-name="getOrders" :data="paginateData" />
                    </div>
                </div>
            </div>
        </div>
        <!-- ========= DELETE ORDER POPUP ========= -->
        <div class="popup removePopup">
            <RemovePopup :title="'Are you sure delete this Order?'" @remove="deleteOrder" />
        </div>
    </f7-page>
</template>

<script setup>
    import dayjs from 'dayjs';
    import axios from 'axios';
    import { ref, onMounted } from 'vue';
    import Icon from '../../components/Icon.vue';
    import Pagination from '../../components/Pagination.vue';
    import RemovePopup from '../../components/common/RemovePopup.vue';
    import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Breadcrumbs, f7BreadcrumbsItem, f7BreadcrumbsSeparator, f7BreadcrumbsCollapsed} from 'framework7-vue';
    import { formattedPrice, successNotification } from '../../commonFunction.js'

    const orders = ref([]);
    const paginateData = ref([]);

    const searchQuery = ref("");
    const orderStatus = ref("");

    const pageNumber = ref(1);
    const pageCount = ref(1);

    const currency = ref(null);
    const deleteId = ref(null);

    onMounted(() => {
        getOrders();
    });

    const getOrders = async (pageNum) => {
        if (pageNum == undefined || pageNum == 1) {
            pageNum = 1
        } else if (pageNum.includes('page')) {        
                pageNum = pageNum.split('page=')[1];
        }
        pageNumber.value = pageNum;
        pageCount.value = pageNum;
        var page = '/api/orders' + '?page=' + pageNum + '&search=' + searchQuery.value + '&status='+ orderStatus.value;
        
        await axios.get(page)
            .then(response => {
                currency.value = response.data.setting;
                orders.value = response.data?.orders?.data;
                paginateData.value = response.data?.orders;
            }).catch((error) => {
                console.error('Error Ocurred While Fetch Order Data ', error);
            });
    }

    const formateDateAndTime = (dateAndTime) => {
        if(dateAndTime) {
            return dayjs(dateAndTime).format('DD, MMM YYYY / hh:mm a');
        }
    }

    const setRemoveOrderId = async (id) => {
        deleteId.value = id;
        f7.popup.open(`.removePopup`);
    }

    const deleteOrder = async () => {
        await axios.get('/api/delete-order/'+deleteId.value)
        .then(response => {
            successNotification(response.data.message);
            deleteId.value = null;
            f7.popup.close(`.removePopup`);
            getOrders(pageNumber.value);
        }).catch((error) => {
            console.error('Error Ocurred While Fetch Order Data ', error);
        });
    }
</script>