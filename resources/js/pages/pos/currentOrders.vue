<template>
    <f7-page>
        <div class="current_orders_page">
            <div class="card_header">
                <div class="current_orders-header_inner">
                    <div class="current_orders-banner">
                        <h3 class="no-margin no-padding">Current Orders</h3>
                    </div>
                    <!-- <div class="kot_view_navbar"> -->
                        <!-- <div class="kot_view-sorter">
                            <div class="display-flex align-items-center" @click="dineType = 'delivery';getKotList()">
                                <div class="kot_status-represent-delivery"></div>
                                <p class="kot_status-represent-type no-margin no-padding">Delivery</p>
                            </div>
                            <div class="display-flex align-items-center" @click="dineType = 'takeaway';getKotList()">
                                <div class="kot_status-represent-pickUp"></div>
                                <p class="kot_status-represent-type no-margin no-padding">Pick Up</p>
                            </div>
                            <div class="display-flex align-items-center" @click="dineType = 'dine_in';getKotList()">
                                <div class="kot_status-represent-dineIn"></div>
                                <p class="kot_status-represent-type no-margin no-padding">Dine In</p>
                            </div>
                        </div> -->
                        <div class="current_orders-floor_select">
                            <select class="floor_selector" name="floor_selector" v-model="floor" id="floor_selector" @change="getKotList">
                                <option value="">Select Floor</option>
                                <option :value="key" v-for="(floor,key) in floorList" :key="floor">{{ floor }}</option>
                            </select>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
            <div class="card-content current_order_table_list" v-if="paginateData.data?.length > 0">
                <OrderCard :items="paginateData.data" @get:item="getSingleOrder" @save:serve="serveOrder" />
            </div>
            <div v-else>
                <div class="no_order">
                    <NoValueFound title="Empty Order List" />
                </div>
            </div>
        </div>

        <!-- ========= CURRENT ORDERS POPUP ========= -->
        <div class="popup current_orders_popup" id="current_orders_popup">
            <div class="popup-close text-align-right padding">
                <i class="f7-icons font-50 text-color-white">xmark_circle</i>
            </div>
            <div class="table_card_outer">
                <OrderCard :item="singleOrder" @save:serve="serveOrder" />
            </div>
        </div>
    </f7-page>
</template>
<script setup>
import { f7Page, f7 } from 'framework7-vue';
import axios from 'axios';
import { ref } from 'vue';
import OrderCard from '../../components/OrderCard.vue';
import NoValueFound from '../../components/NoValueFound.vue';
import { successNotification } from '../../commonFunction.js';

const paginateData = ref({});
const singleOrder = ref({});
const floorList = ref({});
const floor = ref('');
const dineType = ref('');

const getKotList = async () => {
    const formData = { 'floor': floor.value, 'dineType': dineType.value };
    const res = await axios.post("/api/kot-list", formData);
    paginateData.value = res.data
}

const getFloor = async () => {
    const res = await axios.get("/api/get-floors-data");
    floorList.value = res.data;
}

const getSingleOrder = (id) => {
    singleOrder.value = paginateData.value.data[id];
    f7.popup.open(`.current_orders_popup`)
}

const serveOrder = async (id, type) => {
    var fromData = { 'id': id, 'type': type };
    const res = await axios.post("/api/order-serve", fromData);
    successNotification(res.data.success);
    f7.popup.close(`.current_orders_popup`)
    getKotList();
}

getFloor();
getKotList();
</script>