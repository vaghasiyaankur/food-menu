<template>
    <f7-page>

        <div class="category-list-section">
            <div class="add-product-page display-flex">
                <div class="add-product_details">
                    <div class="add-product_heading">
                        <h4 class="no-margin no-padding"><svg width="16" height="13" viewBox="0 0 16 13" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.0415 5.55139H2.70258L6.89287 1.3611C6.96848 1.28807 7.0288 1.20072 7.07029 1.10413C7.11178 1.00755 7.13362 0.903663 7.13453 0.798546C7.13544 0.693429 7.11541 0.589182 7.07561 0.49189C7.0358 0.394597 6.97702 0.306205 6.90269 0.231874C6.82835 0.157542 6.73996 0.0987582 6.64267 0.0589525C6.54538 0.0191468 6.44113 -0.000883547 6.33601 2.9891e-05C6.2309 0.000943329 6.12701 0.0227825 6.03043 0.0642729C5.93384 0.105763 5.84649 0.166074 5.77346 0.241687L0.231789 5.78335C0.0833746 5.93181 0 6.13314 0 6.34306C0 6.55298 0.0833746 6.75431 0.231789 6.90277L5.77346 12.4444C5.92277 12.5886 6.12274 12.6684 6.33032 12.6666C6.53789 12.6648 6.73645 12.5816 6.88323 12.4348C7.03001 12.288 7.11327 12.0895 7.11507 11.8819C7.11688 11.6743 7.03708 11.4743 6.89287 11.325L2.70258 7.13473H15.0415C15.2515 7.13473 15.4528 7.05132 15.6013 6.90285C15.7498 6.75439 15.8332 6.55302 15.8332 6.34306C15.8332 6.1331 15.7498 5.93174 15.6013 5.78327C15.4528 5.6348 15.2515 5.55139 15.0415 5.55139Z"
                                    fill="#38373D" />
                            </svg>
                            Add Products</h4>
                    </div>
                    <div class="add-product_form">
                        <div class="add-product_name-price display-flex">
                            <div class="add-product_name">
                                <label>Product Name</label>
                                <input type="text" placeholder="Enter Product Name">
                            </div>
                            <div class="add-product_price">
                                <label>Price</label>
                                <input type="number" placeholder="Enter Product Price">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-product_search-wrapper">
                    <div class="add-product_search"></div>
                </div>
            </div>
        </div>
    </f7-page>
</template>

<script setup>
import {
    f7Page,
    f7Navbar,
    f7BlockTitle,
    f7Block,
    f7,
    f7Input
} from 'framework7-vue';
import $ from 'jquery';
import axios from "axios";
import NoValueFound from '../../../components/NoValueFound.vue'
import MenuManagementHeader from './MenuManagementHeader.vue'
import Icon from "../../../components/Icon.vue"
</script>