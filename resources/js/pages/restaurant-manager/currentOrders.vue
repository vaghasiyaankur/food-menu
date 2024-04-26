<template>
    <f7-page>
        <div class="current_orders_page">
            <div class="card_header current_orders-banner">
                <h2 class="no-margin">Current Orders</h2>
            </div>
            <div class="card-content current_order_table_list">
                <div class="grid">
                    <div class="current_order_table_card additional_orders">
                        <div class="current_order_table_details" data-popup="#current_orders_popup"
                            @click="f7.popup.open(`.current_orders_popup`);">
                            <h4 class="current_order_table_no no-margin no-margin">Table 1</h4>
                            <h5 class="dine-in-number-text no-margin">₹ 696.00</h5>
                        </div>
                        <div class="current_table-bill-details">
                            <div class="customer-detail">
                                <h5 class="no-margin">John Doe</h5>
                                <h5 class="no-margin">25 min ago</h5>
                            </div>
                            <div class="ordered-items-details">
                                <ol class="ordered-item-list no-margin">
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Margherita Pizza</h6>
                                            <h6 class="no-margin">₹ 146.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Vegetarian Hakka Noodles</h6>
                                            <h6 class="no-margin">₹ 256.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Supreme Veggie Burger
                                            </h6>
                                            <h6 class="no-margin">₹ 100.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Biryani Rice</h6>
                                            <h6 class="no-margin">₹ 100.00</h6>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="bill-pay-details">
                            <button class="server_btn">
                                <h5 class="no-margin">Serve</h5>
                            </button>
                            <button class="pay_btn" data-popup="#current_order_paybill_popup"
                                @click="f7.popup.open(`.current_order_paybill_popup`);">
                                <h5 class="no-margin">Pay</h5>
                            </button>
                        </div>
                    </div>
                    <div class="current_order_table_card">
                        <div class="current_order_table_details">
                            <h4 class="current_order_table_no no-margin no-margin">Table 2</h4>
                            <h5 class="dine-in-number-text no-margin">₹ 236.00</h5>
                        </div>
                        <div class="current_table-bill-details">
                            <div class="customer-detail">
                                <h5 class="no-margin">John Doe</h5>
                                <h5 class="no-margin">25 min ago</h5>
                            </div>
                            <div class="ordered-items-details">
                                <ol class="ordered-item-list no-margin">
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Margherita Pizza</h6>
                                            <h6 class="no-margin">₹ 146.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Vegetarian Hakka Noodles</h6>
                                            <h6 class="no-margin">₹ 256.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Supreme Veggie Burger
                                            </h6>
                                            <h6 class="no-margin">₹ 100.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Biryani Rice</h6>
                                            <h6 class="no-margin">₹ 100.00</h6>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="bill-pay-details">
                            <button class="server_btn">
                                <h5 class="no-margin">Serve</h5>
                            </button>
                            <button class="pay_btn" data-popup="#current_order_paybill_popup"
                                @click="f7.popup.open(`.kot_paybill_popup`);">
                                <h5 class="no-margin">Pay</h5>
                            </button>
                        </div>
                    </div>
                    <div class="current_order_table_card">
                        <div class="current_order_table_details">
                            <h4 class="current_order_table_no no-margin no-margin">Table 3</h4>
                            <h5 class="dine-in-number-text no-margin">₹ 362.00</h5>
                        </div>
                        <div class="current_table-bill-details">
                            <div class="customer-detail">
                                <h5 class="no-margin">John Doe</h5>
                                <h5 class="no-margin">25 min ago</h5>
                            </div>
                            <div class="ordered-items-details">
                                <ol class="ordered-item-list no-margin">
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Margherita Pizza</h6>
                                            <h6 class="no-margin">₹ 146.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Vegetarian Hakka Noodles</h6>
                                            <h6 class="no-margin">₹ 256.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Supreme Veggie Burger
                                            </h6>
                                            <h6 class="no-margin">₹ 100.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Biryani Rice</h6>
                                            <h6 class="no-margin">₹ 100.00</h6>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="bill-pay-details">
                            <button class="server_btn">
                                <h5 class="no-margin">Serve</h5>
                            </button>
                            <button class="pay_btn" data-popup="#current_order_paybill_popup"
                                @click="f7.popup.open(`.kot_paybill_popup`);">
                                <h5 class="no-margin">Pay</h5>
                            </button>
                        </div>
                    </div>
                    <div class="current_order_table_card">
                        <div class="current_order_table_details">
                            <h4 class="current_order_table_no no-margin no-margin">Table 4</h4>
                            <h5 class="dine-in-number-text no-margin">₹ 163.00</h5>
                        </div>
                        <div class="current_table-bill-details">
                            <div class="customer-detail">
                                <h5 class="no-margin">John Doe</h5>
                                <h5 class="no-margin">25 min ago</h5>
                            </div>
                            <div class="ordered-items-details">
                                <ol class="ordered-item-list no-margin">
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Margherita Pizza</h6>
                                            <h6 class="no-margin">₹ 146.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Vegetarian Hakka Noodles</h6>
                                            <h6 class="no-margin">₹ 256.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Supreme Veggie Burger
                                            </h6>
                                            <h6 class="no-margin">₹ 100.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Biryani Rice</h6>
                                            <h6 class="no-margin">₹ 100.00</h6>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="bill-pay-details">
                            <button class="server_btn">
                                <h5 class="no-margin">Serve</h5>
                            </button>
                            <button class="pay_btn" data-popup="#current_order_paybill_popup"
                                @click="f7.popup.open(`.kot_paybill_popup`);">
                                <h5 class="no-margin">Pay</h5>
                            </button>
                        </div>
                    </div>
                    <div class="current_order_table_card">
                        <div class="current_order_table_details">
                            <h4 class="current_order_table_no no-margin no-margin">Table 5</h4>
                            <h5 class="dine-in-number-text no-margin">₹ 140.00</h5>
                        </div>
                        <div class="current_table-bill-details">
                            <div class="customer-detail">
                                <h5 class="no-margin">John Doe</h5>
                                <h5 class="no-margin">25 min ago</h5>
                            </div>
                            <div class="ordered-items-details">
                                <ol class="ordered-item-list no-margin">
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Margherita Pizza</h6>
                                            <h6 class="no-margin">₹ 146.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Vegetarian Hakka Noodles</h6>
                                            <h6 class="no-margin">₹ 256.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Supreme Veggie Burger
                                            </h6>
                                            <h6 class="no-margin">₹ 100.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Biryani Rice</h6>
                                            <h6 class="no-margin">₹ 100.00</h6>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="bill-pay-details">
                            <button class="server_btn">
                                <h5 class="no-margin">Serve</h5>
                            </button>
                            <button class="pay_btn" data-popup="#current_order_paybill_popup"
                                @click="f7.popup.open(`.kot_paybill_popup`);">
                                <h5 class="no-margin">Pay</h5>
                            </button>
                        </div>
                    </div>
                    <div class="current_order_table_card">
                        <div class="current_order_table_details">
                            <h4 class="current_order_table_no no-margin no-margin">Table 6</h4>
                            <h5 class="dine-in-number-text no-margin">₹ 453.00</h5>
                        </div>
                        <div class="current_table-bill-details">
                            <div class="customer-detail">
                                <h5 class="no-margin">John Doe</h5>
                                <h5 class="no-margin">25 min ago</h5>
                            </div>
                            <div class="ordered-items-details">
                                <ol class="ordered-item-list no-margin">
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Margherita Pizza</h6>
                                            <h6 class="no-margin">₹ 146.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Vegetarian Hakka Noodles</h6>
                                            <h6 class="no-margin">₹ 256.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Supreme Veggie Burger
                                            </h6>
                                            <h6 class="no-margin">₹ 100.00</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ordered-item">
                                            <h6 class="no-margin">Biryani Rice</h6>
                                            <h6 class="no-margin">₹ 100.00</h6>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="bill-pay-details">
                            <button class="server_btn">
                                <h5 class="no-margin">Serve</h5>
                            </button>
                            <button class="pay_btn" data-popup="#current_order_paybill_popup"
                                @click="f7.popup.open(`.kot_paybill_popup`);">
                                <h5 class="no-margin">Pay</h5>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========= CURRENT ORDERS POPUP ========= -->
        <div class="popup current_orders_popup" id="current_orders_popup">
            <div class="table_card_outer">
                <div class="current_order_table_card">
                    <div class="current_order_table_details">
                        <h4 class="current_order_table_no no-margin no-margin">Table 2</h4>
                        <h5 class="dine-in-number-text no-margin">₹ 236.00</h5>
                    </div>
                    <div class="current_table-bill-details">
                        <div class="customer-detail">
                            <h5 class="no-margin">John Doe</h5>
                            <h5 class="no-margin">25 min ago</h5>
                        </div>
                        <div class="ordered-items-details">
                            <ol class="ordered-item-list no-margin">
                                <li>
                                    <div class="ordered-item">
                                        <h6 class="no-margin">Margherita Pizza</h6>
                                        <h6 class="no-margin">₹ 146.00</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="ordered-item">
                                        <h6 class="no-margin">Vegetarian Hakka Noodles</h6>
                                        <h6 class="no-margin">₹ 256.00</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="ordered-item">
                                        <h6 class="no-margin">Supreme Veggie Burger
                                        </h6>
                                        <h6 class="no-margin">₹ 100.00</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="ordered-item">
                                        <h6 class="no-margin">Biryani Rice</h6>
                                        <h6 class="no-margin">₹ 100.00</h6>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="bill-pay-details">
                        <button class="server_btn">
                            <h5 class="no-margin">Serve</h5>
                        </button>
                        <button class="pay_btn" data-popup="#current_order_paybill_popup"
                            @click="f7.popup.open(`.kot_paybill_popup`);">
                            <h5 class="no-margin">Pay</h5>
                        </button>
                    </div>
                </div>
                <div class="current_order_table_card">
                    <div class="current_order_table_details">
                        <h4 class="current_order_table_no no-margin no-margin">Table 2</h4>
                        <h5 class="dine-in-number-text no-margin">₹ 236.00</h5>
                    </div>
                    <div class="current_table-bill-details">
                        <div class="customer-detail">
                            <h5 class="no-margin">John Doe</h5>
                            <h5 class="no-margin">25 min ago</h5>
                        </div>
                        <div class="ordered-items-details">
                            <ol class="ordered-item-list no-margin">
                                <li>
                                    <div class="ordered-item">
                                        <h6 class="no-margin">Margherita Pizza</h6>
                                        <h6 class="no-margin">₹ 146.00</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="ordered-item">
                                        <h6 class="no-margin">Vegetarian Hakka Noodles</h6>
                                        <h6 class="no-margin">₹ 256.00</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="ordered-item">
                                        <h6 class="no-margin">Supreme Veggie Burger
                                        </h6>
                                        <h6 class="no-margin">₹ 100.00</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="ordered-item">
                                        <h6 class="no-margin">Biryani Rice</h6>
                                        <h6 class="no-margin">₹ 100.00</h6>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="bill-pay-details">
                        <button class="server_btn">
                            <h5 class="no-margin">Serve</h5>
                        </button>
                        <button class="pay_btn" data-popup="#current_order_paybill_popup"
                            @click="f7.popup.open(`.kot_paybill_popup`);">
                            <h5 class="no-margin">Pay</h5>
                        </button>
                    </div>
                </div>
                <div class="current_order_table_card">
                    <div class="current_order_table_details">
                        <h4 class="current_order_table_no no-margin no-margin">Table 2</h4>
                        <h5 class="dine-in-number-text no-margin">₹ 236.00</h5>
                    </div>
                    <div class="current_table-bill-details">
                        <div class="customer-detail">
                            <h5 class="no-margin">John Doe</h5>
                            <h5 class="no-margin">25 min ago</h5>
                        </div>
                        <div class="ordered-items-details">
                            <ol class="ordered-item-list no-margin">
                                <li>
                                    <div class="ordered-item">
                                        <h6 class="no-margin">Margherita Pizza</h6>
                                        <h6 class="no-margin">₹ 146.00</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="ordered-item">
                                        <h6 class="no-margin">Vegetarian Hakka Noodles</h6>
                                        <h6 class="no-margin">₹ 256.00</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="ordered-item">
                                        <h6 class="no-margin">Supreme Veggie Burger
                                        </h6>
                                        <h6 class="no-margin">₹ 100.00</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="ordered-item">
                                        <h6 class="no-margin">Biryani Rice</h6>
                                        <h6 class="no-margin">₹ 100.00</h6>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="bill-pay-details">
                        <button class="server_btn">
                            <h5 class="no-margin">Serve</h5>
                        </button>
                        <button class="pay_btn" data-popup="#current_order_paybill_popup"
                            @click="f7.popup.open(`.kot_paybill_popup`);">
                            <h5 class="no-margin">Pay</h5>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>
<script setup>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input, f7ListItem, f7AccordionContent, f7List, f7AccordionToggle, f7AccordionItem } from 'framework7-vue';
import axios from 'axios';
import { ref } from 'vue';
</script>