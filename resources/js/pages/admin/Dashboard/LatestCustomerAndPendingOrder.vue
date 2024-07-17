<template>
    <div class="customer-info_pending-order_table">
        <div class="latest_customer_info">
            <div class="table_header">
                <h3 class="no-margin">Latest Customer</h3>
                <a href="" class="no-margin">
                    <h5 class="no-margin">View All</h5>
                </a>
            </div>
            <div v-if="latestCustomers.length > 0" class="customer_card_holder">
                <div class="customer_card" v-for="latest_customer in latestCustomers" :key="latest_customer.id">
                    <div class="customer_image">
                        <img src="/images/user.png" width="100px">
                    </div>
                    <div class="card_customer_name">
                        <h5 class="no-margin">{{latest_customer.name}}</h5>
                    </div>
                    <div class="customer_online_status">
                        <p class="no-margin">{{ timeFormat(latest_customer.created_at) }}</p>
                    </div>
                </div>
            </div>
            <div v-else class="customer_card_holder">
                <NoValueFound title="No Data Found !!"></NoValueFound>
            </div>
        </div>
        <div class="pending_order_table">
            <div class="table_header">
                <h3 class="no-margin">Latest Pending Orders</h3>
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
                    <tr v-for="(latestPendingOrder, index) in latestPendingOrders" :key="index">
                        <td>{{ index+1 }}</td>
                        <td>
                            <div class="customer_img">
                                <img src="/images/user.png">
                            </div>
                            <div class="customer_name">{{ latestPendingOrder?.customer?.name }}</div>
                        </td>
                        <td>{{ currencySymbol+""+latestPendingOrder?.total_price }}</td>
                        <td>{{ formateDateAndTime(latestPendingOrder.created_at) }}</td>
                    </tr>
                    <tr v-if="latestPendingOrders.length == 0">
                        <td colspan="5">
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
    import NoValueFound from '../../../components/NoValueFound.vue';
    import relativeTime from 'dayjs/plugin/relativeTime';
    import customParseFormat from 'dayjs/plugin/customParseFormat';
    dayjs.extend(relativeTime);
    dayjs.extend(customParseFormat);

    defineProps({
        latestCustomers: {
            type : Array,
            default : () => []
        },
        latestPendingOrders: {
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