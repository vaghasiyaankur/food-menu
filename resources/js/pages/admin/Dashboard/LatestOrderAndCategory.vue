<template>
    <div class="orders-category_tables">
        <div class="latest_orders_table">
            <div class="table_header">
                <h3 class="no-margin">Latest Orders</h3>
                <a href="/orders/" class="no-margin">
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
                    <template v-if="latestOrders.length > 0">
                        <tr v-for="(latestOrder, index) in latestOrders" :key="index">
                            <td>{{ index+1 }}</td>
                            <td>
                                <div class="customer_img">
                                    <img src="/images/user.png">
                                </div>
                                <div class="customer_name">{{ latestOrder.customer?.name }}</div>
                            </td>
                            <td>{{ currencySymbol+ "" +formattedPrice(latestOrder.total_price) }}</td>
                            <td>
                                <div class="status_indicator" v-if="latestOrder.cancelled_by">
                                    <div class="cancelled_order">
                                        <p class="no-margin">Cancelled</p>
                                    </div>
                                </div>
                                <div class="status_indicator" v-else-if="latestOrder.finished == 0 && latestOrder.start_at == null">
                                    <div class="pending_order">
                                        <p class="no-margin">Pending</p>
                                    </div>
                                </div>
                                <div class="status_indicator" v-else-if="latestOrder.finished == 0 && latestOrder.start_at != null">
                                    <div class="processing_order">
                                        <p class="no-margin">Processing</p>
                                    </div>
                                </div>
                                <div class="status_indicator" v-else-if="latestOrder.finished == 1 && latestOrder.start_at != null">
                                    <div class="completed_order">
                                        <p class="no-margin">Completed</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{ formateDateAndTime(latestOrder.created_at) }}</td>
                        </tr>
                        <tr v-if="latestOrders.length < 8">
                            <td colspan="5"></td>
                        </tr>
                    </template>
                    <tr v-if="latestOrders.length == 0">
                        <td colspan="5">
                            <NoValueFound title="No Data Found !!"></NoValueFound>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="latest_category_table">
            <div class="table_header">
                <h3 class="no-margin">Latest Category</h3>
                <a href="/food-category/" class="no-margin">
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
                    <template v-if="latestCategory.length > 0">
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
                        <tr v-if="latestCategory.length < 8"><td colspan="3"></td></tr>
                    </template>
                    <tr v-if="latestCategory.length == 0">
                        <td colspan="3">
                            <NoValueFound title="No Data Found !!"></NoValueFound>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
    import dayjs from 'dayjs';
    import { defineProps } from 'vue';
    import { formattedPrice } from '../../../commonFunction.js';
    import customParseFormat from 'dayjs/plugin/customParseFormat';
    import NoValueFound from '../../../components/NoValueFound.vue';
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