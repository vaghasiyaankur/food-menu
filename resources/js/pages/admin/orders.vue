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
                                <input type="search" placeholder="Search Food..." />
                                <i class="searchbar-icon"></i>
                                <span class="input-clear-button"></span>
                            </form>
                        </div>
                        <select name="" id="select_filter">
                            <option value="all" selected>All</option>
                        </select>
                        <select name="" id="select_filter">
                            <option value="all" select>All</option>
                        </select>
                    </div>
                    <button class="filter_table">
                        <Icon name='filterIcon' />
                        <h4 class="no-margin">Filter</h4>
                    </button>
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
                                <th>Updated</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#10663</td>
                                <td>
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_1.png">
                                        </div>
                                        <div class="customer-name">Jannson Wasley</div>
                                    </div>
                                </td>
                                <td>$109.00</td>
                                <td>
                                    <div class="order_status cancelled_status">
                                        <p class="no-margin">Cancelled</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>17 hours ago</td>
                                <td>24, Sep 2022 / 10:00 am</td>
                                <td><i class="f7-icons">ellipsis</i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination_wrapper">
                    <p class="no-margin">Showing 15 of 220 Results</p>
                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>

<script setup>
import {
    f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Breadcrumbs,
    f7BreadcrumbsItem, f7BreadcrumbsSeparator, f7BreadcrumbsCollapsed,
} from 'framework7-vue';
import Icon from '../../components/Icon.vue'
import axios from 'axios'

const getOrders = () => {
    axios.get('/api/order/1')
    .then((res) => {
        console.log(res.data);
    });
}

getOrders();
</script>