<template>
    <f7-page>
        <div class="completed_orders_wrapper">
            <div class="card_header completed_orders-header">
                <div class="completed_orders_banner">
                    <h2 class="banner_text no-margin">Completed Orders</h2>
                </div>
                <div class="order_by_dates_filter_box">
                    <div class="input_dates_for_filter">
                        <input type="text" placeholder="Select date range" readonly="readonly" id="demo-calendar-range" />
                        <!-- <input type="date" name="from_date" id="from_date" v-model="startDate" @change="getCompletedOrders()">
                        <p class="no-margin">To</p>
                        <input type="date" name="to_date" id="to_date" v-model="endDate" @change="getCompletedOrders()"> -->
                    </div>
                    <!-- <div class="filter_by_date_button">
                        <button class="filter_btn" data-popup="#order_filter_popup" @click="f7.popup.open(`.order_filter_popup`);">
                            <Icon name="filterIcon" />
                            <span>Filter</span>
                        </button>
                    </div> -->
                    <div class="filter_by_date_button">
                        <button @click="resetFilter()" class="filter_btn">
                            <Icon name="filterIcon" />
                            <span>Reset</span>
                        </button>
                    </div>
                    
                </div>
            </div>
            <div class="card-content completed_order_content">
                <template v-if="orders.length">
                    <div class="completed_orders_list">
                        <ol class="filtered_list no-margin" id="filtered_list">
                            <li class="filtered_order_item" :class="{ 'select' : activeOrder == order?.id }" v-for="order in orders" :key="order?.id" @click="getOrder(order?.id)">
                                <div class="filtered_order_detail">
                                    <div class="order_user-info">
                                        <img class="selected_user_image display-none" src="\assets\images\seederImages\completedOrders\selected_user.png">
                                        <img class="user_image" src="\assets\images\seederImages\completedOrders\user.png">
                                        <div class="order_number_time">
                                            <h3 class="order_number no-margin">Order #{{order?.id}}</h3>
                                            <div class="order_timing">
                                                <Icon name="timeIcon" />
                                                <span class="order_date">{{ formattedDateTime(order?.created_at) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filtered_order_payment-info">
                                        <h3 class="total-amount no-margin">{{ currency.currency_symbol }}{{ order?.total_price.toFixed(2) }}</h3>
                                        <p class="total-items no-margin text-align-right">{{order?.total_products}} items</p>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>
                    <div class="selected_order_details_wrapper selected_order_details">
                        <div class="selected_order_details_header">
                            <h4 class="no-margin">Order #{{order?.id}}</h4>
                            <a class="selected_order-customer_email" href="#">{{order?.email}}</a>
                        </div>
                        <ol class="order_items_full_list no-margin">
                            <template v-for="kot in order?.kots" :key="kot?.id">
                                <li class="ordered_list_item no-padding" v-for="kot_pro in kot?.kot_products" :key="kot_pro?.id">
                                    <div class="order_list_item_detail">
                                        <div class="item_name">
                                            <h5 class="no-margin">
                                                {{kot_pro?.product?.product_restaurant_languages[0]?.name}}
                                                <span class="number_of_items">
                                                    <span class="no-margin">X {{kot_pro?.quantity}}</span>
                                                </span>
                                            </h5>
                                        </div>
                                        <div class="item_size-number">
                                            <div class="item_size">
                                                <p class="no-margin">Size: S</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ordered_list_item_price">
                                        <h5 class="no-margin">{{ currency.currency_symbol }}{{kot_pro?.total_price?.toFixed(2)}}</h5>
                                    </div>
                                </li>
                            </template>
                        </ol>
                        <div class="pullUp_total_menu-wrapper">
                            <div class="pullUp_total_menu">
                                <div class="sub_total">
                                    <h5 class="no-margin">Sub Total : </h5>
                                    <h5 class="no-margin">{{ currency.currency_symbol }}{{order?.total_price?.toFixed(2)}}</h5>
                                </div>
                                <div class="discount_provided">
                                    <h5 class="no-margin">Discount 
                                        {{ order.discount_type == 'percentage' ? (`(${order.discount_amount}%)`) : "" }} : 
                                    </h5>
                                    <h5 class="no-margin" v-if="order.discount_type != 'percentage'">
                                        {{ currency.currency_symbol }}{{order?.discount_amount?.toFixed(2)}}
                                    </h5>
                                    <h5 class="no-margin" v-else>
                                        {{ calculatePercentage(currency.currency_symbol, order?.discount_amount, order?.total_price) }}
                                    </h5>
                                </div>
                                <hr class="divider">
                                <div class="total_amount">
                                    <h5 class="no-margin">Total Amount : </h5>
                                    <h5 class="no-margin">{{ currency.currency_symbol }}{{order?.payable_amount?.toFixed(2)}}</h5>
                                </div>
                                <button class="print_invoice_btn" @click="printOrder(order?.id)">
                                    <span class="no-margin">Print Invoice</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
                <div class="w-100 display-flex justify-content-center" v-else>
                    <div class="no_order">
                        <NoValueFound title="Empty Order List" />
                    </div>
                </div>
            </div>
        </div>

        <!-- ========= ORDER FILTER POPUP ========= -->
        <!-- <div class="popup order_filter_popup" id="order_filter_popup">
            <div class="data-form order_filter-data-form">
                <select name="order_detail_select" id="order_detail_select" placeholder="Select Column">
                    <option value="id" selected>Order ID</option>
                    <option value="email">Customer email</option>
                    <option value="name">Customer name</option>
                </select>
                <select name="order_condition_select" id="order_condition_select" placeholder="Select Condition">
                    <option value="contains" selected>Contains</option>
                    <option value="doesnt_contain">Does not contain</option>
                    <option value="equal">Is Equals to</option>
                    <option value="not_equal">Is Not equal to</option>
                </select>
                <input type="text" name="" id="" placeholder="Value here">
                <button class="apply_btn">
                    <span>Apply</span>
                </button>
            </div>
        </div> -->

        <input type="hidden" id="fromDate">
        <input type="hidden" id="toDate">
        <button @click="getCompletedOrders" style="opacity: 0" id="date-set"></button>

    </f7-page>
</template>
<script setup>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input, f7ListItem, f7AccordionContent, f7List, f7AccordionToggle, f7AccordionItem } from 'framework7-vue';
import axios from 'axios';
import { ref, onMounted } from 'vue';
import Icon from "../../components/Icon.vue";
import NoValueFound from "../../components/NoValueFound.vue";
import $ from 'jquery';
import { calculatePercentage, successNotification } from '../../commonFunction';

const orders = ref([]);
const currency = ref([]);
const order = ref({});
const activeOrder = ref(0);
const picker = ref(null);

const getCompletedOrders = () => {
    const fromDate = $('#fromDate').val() || '';
    const toDate = $('#toDate').val() || '';

    const filterOption = {
        start_date : fromDate,
        end_date   : toDate
    };
    axios.post('/api/get-complete-orders', filterOption)
    .then(response => {
        orders.value = response.data.data;
        if (response.data.data.length) {
            getOrder(orders.value[0]?.id);
        }
    });
}

const resetFilter = () => {
    $('#fromDate').val('');
    $('#toDate').val('');
    picker.value.setValue([]);
    getCompletedOrders();
}

const getOrder = (id) => {
    activeOrder.value = id;
    axios.get('/api/orders/'+ id)
    .then(response => {
        order.value = response.data;
    });
}

// Computed property to format the date and time
const formattedDateTime = (dateTime) => {
    const originalDateTime = ref(new Date(dateTime));
    // Format options for date and time
    const options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        hour12: true // Use 12-hour format
    };

    // Format the date and time using toLocaleString() with specified options
    return originalDateTime.value.toLocaleString('en-US', options);
};

const getCurrency = async () => {
    await axios.get('/api/get-currency')
    .then((res) => {
        currency.value = res.data.setting;
    })
}

const printOrder = async (id) => {
    await axios.get('/api/print-order/'+ id)
    .then(response => {
        if(response.status) {
            successNotification(response.data.success);
        }
    });
}

onMounted(() => {
    getCompletedOrders();
    getCurrency();
    picker.value = f7.calendar.create({
        inputEl: '#demo-calendar-range',
        rangePicker: true,
        numbers:true,
        footer: true,
        on: {
            open() {
                setTimeout(() => {
                    $('.popover-angle').css({ 'left': '147px' });
                    if($('body').width() > $('body').height())  $('.calendar-popover').css({ 'top': '144px', 'left': '787.406px' });
                    else $('.calendar-popover').css({ 'top': '144px', 'left': '493.406px' });
                }, 1);
            },
            close(daterange) {
                var dates = daterange.getValue();
                if(dates){
                    var from_date = new Date(dates[0]).toLocaleDateString('sv-SE');
                    var to_date = dates[1] ? new Date(dates[1]).toLocaleDateString('sv-SE') : '';

                    $('#fromDate').val(from_date);
                    $('#toDate').val(to_date);

                    $("#date-set").trigger('click');
                }
            }
        }
    });
})
</script>