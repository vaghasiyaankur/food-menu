<template>
    <div class="grid" v-if="items?.length > 0">
        <div class="current_order_table_card" :class="{ 'additional_orders' : item?.kots?.length > 1 }" v-for="(item,index) in items" :key="item.id">
            <div class="current_order_table_details" data-popup="#current_orders_popup" @click="item?.kots?.length > 1 ? emit('get:item', index) : ''">
                <div class="table_detail text-align-center">
                    <h4 class="dine-in-number-text margin-bottom-half no-margin">Table</h4>
                    <h4 class="dine-in-number no-margin">{{ item?.table?.table_number }}</h4>
                </div>
                <div class="table_detail text-align-center">
                    <h4 class="dine-in-number-text margin-bottom-half no-margin">John Doe</h4>
                    <h4 class="dine-in-number no-margin">₹ {{item?.total_price?.toFixed(2)}}</h4>
                </div>
            </div>
            <div class="ordered-items-full-details">
                <div class="current_table-bill-details" v-for="kot in item?.kots" :key="kot.id">
                    <div class="customer-detail">
                        <h5 class="no-margin">KOT - {{ kot.number }} Time - {{ timeFormat(kot?.created_at) }}</h5>
                    </div>
                    <div class="ordered-items-details">
                        <ol class="ordered-item-list no-margin">
                            <li v-for="k_product in kot?.kot_products" :key="k_product.id">
                                <div class="ordered-item">
                                    <h6 class="no-margin">{{k_product?.product?.product_restaurant_languages[0]?.name}}</h6>
                                    <h6 class="no-margin">₹ {{k_product?.price?.toFixed(2)}}</h6>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="bill-pay-details">
                <button class="server_btn" :disabled="item.is_serve ? true : false" @click="emit('save:serve',item.id,'order')">
                    <h5 class="no-margin">{{item.is_serve ? 'Served' : 'Serve'}}</h5>
                </button>
                <button class="pay_btn" data-popup="#current_order_paybill_popup" @click="f7.popup.open(`.current_order_paybill_popup`);">
                    <h5 class="no-margin">Pay</h5>
                </button>
            </div>
        </div>
    </div>
    <template v-else>
        <div class="current_order_table_card" v-for="sItem in item?.kots" :key="sItem.id">
            <div class="current_order_table_details">
                <h4 class="current_order_table_no no-margin no-margin">Table {{item?.table?.table_number}}</h4>
                <h5 class="dine-in-number-text no-margin">₹ {{sItem?.price?.toFixed(2)}}</h5>
            </div>
            <div class="current_table-bill-details">
                <div class="customer-detail">
                    <h5 class="no-margin">John Doe</h5>
                    <h5 class="no-margin">{{ timeFormat(sItem?.created_at) }}</h5>
                </div>
                <div class="ordered-kot-items-details">
                    <ol class="ordered-item-list no-margin">
                        <li v-for="k_product in sItem?.kot_products" :key="k_product.id">
                            <div class="ordered-item">
                                <h6 class="no-margin">{{k_product?.product?.product_restaurant_languages[0]?.name}}</h6>
                                <h6 class="no-margin">₹ {{k_product?.price?.toFixed(2)}}</h6>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="bill-pay-details">
                <button class="server_btn" :disabled="sItem.is_serve ? true : false" @click="emit('save:serve',sItem.id,'single')">
                    <h5 class="no-margin">{{sItem.is_serve ? 'Served' : 'Serve'}}</h5>
                </button>
            </div>
        </div>
    </template>
</template>
<script setup>
import { f7 } from "framework7-vue";
import dayjs from 'dayjs';
import axios from 'axios';
import relativeTime from 'dayjs/plugin/relativeTime';
// Extend dayjs with the relativeTime plugin
dayjs.extend(relativeTime);

const props = defineProps({
    items : Object,
    item : Object,
});
const emit = defineEmits(['get:item', 'save:serve']);

const timeFormat = (time) => {
    if (time) return dayjs().to(dayjs(time));
}
</script>