<template>
    <div class="complete_order-product_tables">
        <div class="latest_completed_orders_table">
            <div class="table_header">
                <h3 class="no-margin">Latest Completed Orders</h3>
                <a href="/orders/" class="no-margin">
                    <h5 class="no-margin">View All</h5>
                </a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(latestCompletedOrder, index) in latestCompletedOrders" :key="index">
                        <td>{{ index+1 }}</td>
                        <td>
                            <div class="customer_img">
                                <img src="/images/user.png">
                            </div>
                            <div class="customer_name">{{ latestCompletedOrder.customer?.name }}</div>
                        </td>
                        <td>{{ currencySymbol+""+latestCompletedOrder.total_price }}</td>
                        <td>{{ formateDateAndTime(latestCompletedOrder.created_at) }}</td>
                    </tr>
                    <tr v-if="latestCompletedOrders.length == 0">
                        <td colspan="4">
                            <NoValueFound title="No Data Found !!"></NoValueFound>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="latest_product_table">
            <div class="table_header">
                <h3 class="no-margin">Latest Product</h3>
                <a href="" class="no-margin">
                    <h5 class="no-margin">View All</h5>
                </a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(latestProduct, index) in latestProducts" :key="index">
                        <td>{{ index+1 }}</td>
                        <td>
                            <div class="product_image">
                                <img :src="'storage/'+latestProduct?.image" height="50px" width="50px">
                            </div>
                            <div class="product_online_status">
                                <div class="product_name">{{ latestProduct.product_restaurant_languages_first?.name }}</div>
                                <p class="no-margin">{{ timeFormat(latestProduct.created_at) }}</p>
                            </div>
                        </td>
                        <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_386_1152)">
                                    <path
                                        d="M2.00001 12C3.10459 12 4.00003 11.1046 4.00003 9.99998C4.00003 8.89541 3.10459 7.99997 2.00001 7.99997C0.895437 7.99997 0 8.89541 0 9.99998C0 11.1046 0.895437 12 2.00001 12Z"
                                        fill="#555555" />
                                    <path
                                        d="M10 12C11.1046 12 12 11.1046 12 9.99998C12 8.89541 11.1046 7.99997 10 7.99997C8.89544 7.99997 8 8.89541 8 9.99998C8 11.1046 8.89544 12 10 12Z"
                                        fill="#555555" />
                                    <path
                                        d="M18 12C19.1046 12 20 11.1046 20 9.99998C20 8.89541 19.1046 7.99997 18 7.99997C16.8954 7.99997 16 8.89541 16 9.99998C16 11.1046 16.8954 12 18 12Z"
                                        fill="#555555" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_386_1152">
                                        <rect width="20" height="20" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </td>
                    </tr>
                    <tr v-if="latestProducts.length == 0">
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
    import { defineProps } from 'vue';
    import dayjs from 'dayjs';
    import relativeTime from 'dayjs/plugin/relativeTime';
    import customParseFormat from 'dayjs/plugin/customParseFormat';
    import NoValueFound from '../../../components/NoValueFound.vue';
    dayjs.extend(relativeTime);
    dayjs.extend(customParseFormat);

    defineProps({
        latestCompletedOrders : {
            type : Array,
            default : () => []
        },
        latestProducts : {
            type : Array,
            default : () => []
        },
        currencySymbol : {
            type : String,
            default : ""
        }
    });

    const timeFormat = (time) => {
        if (time) return dayjs().to(dayjs(time));
    }

    const formateDateAndTime = (dateAndTime) => {
        if(dateAndTime) {
            return dayjs(dateAndTime).format('DD, MMM YYYY / hh:mm a');
        }
    }
</script>