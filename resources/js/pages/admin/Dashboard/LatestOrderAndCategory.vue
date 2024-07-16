<template>
    <div class="orders-category_tables">
        <div class="latest_orders_table">
            <div class="table_header">
                <h3 class="no-margin">Latest Orders</h3>
                <a href="" class="no-margin">
                    <h5 class="no-margin">View All</h5>
                </a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(latestOrder, index) in latestOrders" :key="index">
                        <td>{{ index+1 }}</td>
                        <td>
                            <div class="customer_img">
                                <img src="/images/user.png">
                            </div>
                            <div class="customer_name">{{ latestOrder.customer?.name }}</div>
                        </td>
                        <td>{{ currencySymbol+ "" +latestOrder.total_price }}</td>
                        <td>
                            <div class="status_indicator" v-if="latestOrder.cancelled_by">
                                <div class="cancelled_order">
                                    <p class="no-margin">Cancelled</p>
                                </div>
                            </div>
                            <div class="status_indicator" v-if="latestOrder.finished == 0">
                                <div class="processing_order">
                                    <p class="no-margin">Processing</p>
                                </div>
                            </div>
                            <div class="status_indicator" v-if="latestOrder.finished == 1">
                                <div class="completed_order">
                                    <p class="no-margin">Completed</p>
                                </div>
                            </div>
                        </td>
                        <td>{{ formateDateAndTime(latestOrder.created_at) }}</td>
                    </tr>
                    <tr v-if="latestOrders.length == 0">
                        <td colspan="5">No Data Found !!</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="latest_category_table">
            <div class="table_header">
                <h3 class="no-margin">Latest Category</h3>
                <a href="" class="no-margin">
                    <h5 class="no-margin">View All</h5>
                </a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Item</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(category, index) in latestCategory" :key="index">
                        <td>{{ index+1 }}</td>
                        <td>
                            <div class="product_image">
                                <img :src="'storage/'+category?.image" height="50px" width="50px">
                            </div>
                            <div class="product_name">{{ category.sub_category_restaurant_languages_first?.name }}</div>
                        </td>
                        <td>{{ category.products_count }} Item</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
    import dayjs from 'dayjs';
    import { defineProps } from 'vue';
    import customParseFormat from 'dayjs/plugin/customParseFormat';
    dayjs.extend(customParseFormat);

    const props = defineProps({
        latestOrders : {
            type : Array,
            default: () => []
        },
        latestCategory : {
            type : Array,
            default: () => []
        },
        currencySymbol : {
            type : String,
            default : ""
        }
    });

    const formateDateAndTime = (dateAndTime) => {
        if(dateAndTime) {
            return dayjs(dateAndTime).format('DD, MMM YYYY / hh:mm a');
        }
    }
</script>