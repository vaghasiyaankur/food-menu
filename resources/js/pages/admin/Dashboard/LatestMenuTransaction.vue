<template>
    <div class="menu_transactions_tables">
        <div class="latest_transactions_table">
            <div class="table_header">
                <h3 class="no-margin">Latest Transactions</h3>
                <a href="" class="no-margin">
                    <h5 class="no-margin">View All</h5>
                </a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Payment Method</th>
                        <th>Payment Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(latestTransaction, index)   in latestTransactions" :key="index">
                        <td>{{ index+1 }}</td>
                        <td>{{ latestTransaction.payment_type }}</td>
                        <td>{{ currencySymbol+""+latestTransaction.customer_paid }}</td>
                        <td>{{ formateDateAndTime(latestTransaction.created_at) }}</td>
                    </tr>
                    <tr v-if="latestTransactions.length == 0">
                        <td colspan="5">No Data Found !!</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
    import { defineProps } from 'vue';
    import dayjs from 'dayjs';
    import customParseFormat from 'dayjs/plugin/customParseFormat';
    dayjs.extend(customParseFormat);

    defineProps({
        latestTransactions : {
            type : Array,
            default : () => []
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