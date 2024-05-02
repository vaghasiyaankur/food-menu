<template>
    <f7-page>
        <div class="current_orders_page">
            <div class="card_header current_orders-banner">
                <h2 class="no-margin">Current Orders</h2>
            </div>
            <div class="card-content current_order_table_list">
                <OrderCard :items="paginateData.data" @get:item="getSingleOrder" />
            </div>
        </div>

        <!-- ========= CURRENT ORDERS POPUP ========= -->
        <div class="popup current_orders_popup" id="current_orders_popup">
            <div class="popup-close text-align-right padding">
                <i class="f7-icons font-50 text-color-white">xmark_circle</i>
            </div>
            <div class="table_card_outer">
                <OrderCard :item="singleOrder" />
            </div>
        </div>
    </f7-page>
</template>
<script setup>
import { f7Page, f7 } from 'framework7-vue';
import axios from 'axios';
import { ref } from 'vue';
import OrderCard from '../../components/OrderCard.vue';

const paginateData = ref({});
const singleOrder = ref({});

const getKotList = async () => {
    const res = await axios.post("/api/kot-list");
    paginateData.value = res.data
}

const getSingleOrder = (id) => {
    singleOrder.value = paginateData.value.data[id];
    f7.popup.open(`.current_orders_popup`)
}

getKotList();
</script>