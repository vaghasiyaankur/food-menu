<template>
    <f7-page>
        <div class="card_header kot_view-header">
            <div class="kot_view-header_inner">
                <div class="kot_view-banner">
                    <h3 class="no-margin no-padding">KOT View</h3>
                </div>
                <div class="kot_view_navbar">
                    <div class="kot_view-sorter">
                        <div class="display-flex align-items-center">
                            <div class="kot_status-represent-delivery"></div>
                            <p class="kot_status-represent-type no-margin no-padding">Delivery</p>
                        </div>
                        <div class="display-flex align-items-center">
                            <div class="kot_status-represent-pickUp"></div>
                            <p class="kot_status-represent-type no-margin no-padding">Pick Up</p>
                        </div>
                        <div class="display-flex align-items-center">
                            <div class="kot_status-represent-dineIn"></div>
                            <p class="kot_status-represent-type no-margin no-padding">Dine In</p>
                        </div>
                    </div>
                    <div class="kot_view-floor_select">
                        <select class="floor_selector" name="floor_selector" v-model="floor" id="floor_selector" @change="getKotList">
                            <option value="">Select Floor</option>
                            <option :value="key" v-for="(floor,key) in floorList" :key="floor">{{ floor }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-content kot_view_list">
            <template v-if="paginateData?.data?.length > 0">
                <div class="grid">
                    <div class="kot_view_table_card" v-for="item in paginateData.data" :key="item">
                        <div class="card-type table_card">
                            <div class="table_card-margin-padding">
                                <div class="kot_table_details">
                                    <div class="table_detail text-align-center">
                                        <h4 class="dine-in-number-text no-margin">Table</h4>
                                        <h4 class="dine-in-number no-margin">{{ item?.table?.table_number }}</h4>
                                    </div>
                                    <div class="table_detail text-align-center">
                                        <h4 class="kot-time-text no-margin">Time</h4>
                                        <h4 class="kot-time-number no-margin">{{ item?.kots[0]?.time }}</h4>
                                    </div>
                                </div>
                                <div class="kot_table-bill-details">
                                    <div class="ordered-items-details" :style="!item?.note ? 'height:240px' : ''">
                                        <template v-for="kot in item?.kots" :key="kot">
                                            <div class="customer-detail">
                                                <h5 class="no-margin">KOT - {{kot.number}} Time - {{kot.time}}</h5>
                                            </div>
                                            <ol class="ordered-item-details-list no-margin">
                                                <li v-for="kot_product in kot?.kot_products" :key="kot_product">
                                                    <div class="ordered-item">
                                                        <h6 class="no-margin">{{kot_product?.product?.product_restaurant_languages[0]?.name}} <span v-if="kot_product.note">[Note : {{kot_product.note}}]</span></h6>
                                                        <h6 class="no-margin">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }}  {{kot_product?.total_price?.toFixed(2)}}</h6>
                                                    </div>
                                                </li>
                                            </ol>
                                        </template>
                                    </div>
                                </div>
                                <div class="bill-pay-details">
                                    <div class="total-bill">
                                        <hr class="horizontal-divider">
                                        <div class="ordered_items-total">
                                            <h4 class="ordered_items-total-text no-margin">Total Amount</h4>
                                            <h4 class="ordered_items-total-number no-margin">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }} {{item?.total_price?.toFixed(2)}}</h4>
                                        </div>
                                    </div>
                                    <div class="order-user-comment" v-if="item?.note">
                                        <p class="no-margin">{{item?.note}}</p>
                                    </div>
                                    <div class="bill_buttons">
                                        <div class="server_btn-outer">
                                            <button class="server_btn">Serve</button>
                                        </div>
                                        <div class="pay_btn-outer">
                                            <button class="pay_btn bg-pink text-color-white" data-popup="#kot_paybill_popup" @click="f7.popup.open(`.kot_paybill_popup`);">Pay</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
            <template v-else>
                <div>
                    <div class="no_order">
                        <NoValueFound title="Empty KOT List" />
                    </div>
                </div>
            </template>
        </div>

        <!-- ========= KOT-VIEW POPUP ========= -->
        <div class="popup kot_paybill_popup" id="kot_paybill_popup">
            <div class="data-form add_table-data-form">
                <div class="kot_paybill-popup_header">
                    <div class="text-align-center kot_paybill-popup_title">
                        Table No. 4</div>
                    <div class="kot_paybill-popup_edit_btn">
                        <button class="kot_paybill_edit_btn">Edit</button>
                    </div>
                </div>
                <div class="kot_paybill_data">
                    <div class="customer_order_datails">
                        <div class="order_heading">
                            <h5 class="no-margin">Order #1321</h5>
                            <h5 class="no-margin">John Doe</h5>
                        </div>
                    </div>
                    <div class="billed_items">
                        <ol class="billed-order-items">
                            <li>
                                <div class="display-flex align-items-center justify-content-space-between">
                                    <h6 class="no-margin">Margherita Pizza</h6>
                                    <h6 class="no-margin">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }} 146.00</h6>
                                </div>
                            </li>
                            <li>
                                <div class="display-flex align-items-center justify-content-space-between">
                                    <h6 class="no-margin">Vegetarian Hakka Noodles</h6>
                                    <h6 class="no-margin">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }} 256.00</h6>
                                </div>
                            </li>
                            <li>
                                <div class="display-flex align-items-center justify-content-space-between">
                                    <h6 class="no-margin">Supreme Veggie Burger</h6>
                                    <h6 class="no-margin">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }} 100.00</h6>
                                </div>
                            </li>
                            <li>
                                <div class="display-flex align-items-center justify-content-space-between">
                                    <h6 class="no-margin">Biryani Rice</h6>
                                    <h6 class="no-margin">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }} 100.00</h6>
                                </div>
                            </li>
                        </ol>
                    </div>
                    <hr class="horizontal-divider">
                    <div class="pay_bill_total_outer">
                        <div class="pay_bill_subtotal">
                            <h5 class="no-margin">Sub Total</h5>
                            <h5 class="no-margin">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }} 38.00</h5>
                        </div>
                        <hr class="horizontal-divider">
                        <div class="pay_bill_total">
                            <h5 class="no-margin">Total Amount</h5>
                            <h5 class="no-margin">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }} 38.00</h5>
                        </div>
                    </div>
                    <div class="popup_button">
                        <div class="new_order_button">
                            <button class="new_order_btn">New Order</button>
                        </div>
                        <div class="kot_pay_bill_btns">
                            <div class="cancel_pay_button">
                                <button type="button" class="cancel_pay_btn">Cancel</button>
                            </div>
                            <div class="online_pay_button">
                                <button type="button" class="online_pay_btn">Online Pay</button>
                            </div>
                            <div class="cash_pay_button">
                                <button type="button" class="cash_pay_btn">Cash</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wave-image-content"><img src="/images/flow.png" style="width:100%;height:43px"></div>
            </div>
        </div>
    </f7-page>
</template>
<script setup>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7 } from 'framework7-vue';
import axios from 'axios';
import { ref, inject } from 'vue';
import Icon from '../../components/Icon.vue';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import NoValueFound from '../../components/NoValueFound.vue';
// Extend dayjs with the relativeTime plugin
dayjs.extend(relativeTime);

const paginateData = ref({});
const floorList = ref({});
const floor = ref('');
const kotSearch = ref('');
const currentCurrencyData = inject('currentCurrencyData');

const getKotList = async () => {
    const formData = {};
    formData.floor = floor.value;
    formData.kotSearch = kotSearch.value;
    const res = await axios.post("/api/kot-list",formData);
    paginateData.value = res.data
}

const getFloor = async () => {
    const res = await axios.get("/api/get-floors-data");
    floorList.value = res.data;
}

const timeFormat = (time) => {
    if (time) return dayjs().to(dayjs(time));
}

getKotList();
getFloor();
</script>