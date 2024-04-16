<template>
    <f7-page>

        <div class="data-list-section">
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
                                <h5 class="no-padding no-margin">Product Name</h5>
                                <input type="text" placeholder="Enter Product Name">
                            </div>
                            <div class="add-product_price">
                                <h5 class="no-padding no-margin">Price</h5>
                                <input type="number" placeholder="Enter Product Price">
                            </div>
                        </div>
                        <div class="add-product_category display-flex">
                            <div class="add-product_category-name">
                                <h5 class="no-padding no-margin">Category</h5>
                                <select name="select_category" id="select_category">
                                    <option value="Pizza">Pizza</option>
                                </select>
                            </div>
                            <div class="add-product_image-select-wrapper">
                                <h5></h5>
                                <div class="add-product_image-select display-flex">
                                    <div class="add-product-image">
                                        <img src="/images/add-image.png" />
                                    </div>
                                    <div class="add-product-image-text">
                                        <span class="add-image-text">Select Image</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add-product_type display-flex">
                            <div class="add-product_food-type">
                                <h5 class="no-padding no-margin">Food Type</h5>
                                <div class="add-product_food-type-radio-btn display-flex">
                                    <div class="add-product_veg-type display-flex">
                                        <input type="radio" id="food-type" name="food-type" value="veg" checked>
                                        <label for="veg-type">Veg</label>
                                    </div>
                                    <div class="add-product_non-veg-type">
                                        <input type="radio" id="food-type" name="food-type" value="non-veg">
                                        <label for="non-veg-type">Non - Veg</label>
                                    </div>
                                </div>
                            </div>
                            <div class="add-product_status">
                                <h5 class="no-padding no-margin">Status</h5>
                                <div class="add-product_food-status-radio-btn display-flex">
                                    <div class="add-product_active-status">
                                        <input type="radio" id="food-status" name="food-status" value="active" checked>
                                        <label for="food-status">Active</label>
                                    </div>
                                    <div class="add-product_deactive-status">
                                        <input type="radio" id="food-status" name="food-status" value="deactive">
                                        <label for="non-veg-type">Deactive</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add-product_discription">
                            <h5 class="no-padding no-margin">Discription</h5>
                            <div class="add-product_discr">
                                <textarea id="add-product-discr" name="add_discription" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="add-product_size-select">
                            <h5 class="no-padding no-margin">Size</h5>
                            <div class="add-product_size-selector-btns display-flex">
                                <div><input type="radio" name="select_size" value="small" id="small" checked><label
                                        for="small" checked>S</label></div>
                                <div><input type="radio" name="select_size" value="medium" id="medium"><label
                                        for="medium">M</label></div>
                                <div><input type="radio" name="select_size" value="large" id="large"><label
                                        for="large">L</label></div>
                                <div><input type="radio" name="select_size" value="extraLarge" id="extraLarge"><label
                                        for="extraLarge">X</label></div>
                            </div>
                        </div>
                        <div class="add-product_product_select">
                            <h5 class="no-padding no-margin">Products</h5>
                            <div class="add-product_product-select display-flex">
                                <div class="bg-color-white select-product-card selected-card">
                                    <div class="combo-image"><img
                                            src="\assets\images\seederImages\combo\French_Fries.png">
                                    </div>
                                    <div class="text-align-center add-combo-product-name">
                                        <h4 class="no-margin no-padding">French fries</h4>
                                        <p class="selected-product-price no-margin no-padding">$19.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type1.png">
                                </div>
                                <div class="bg-color-white select-product-card selected-card">
                                    <div class="combo-image"><img src="\assets\images\seederImages\combo\Coca_Cola.png">
                                    </div>
                                    <div class="text-align-center add-combo-product-name">
                                        <h4 class="no-margin no-padding">Coca-Cola</h4>
                                        <p class="selected-product-price no-margin no-padding">$19.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type1.png">
                                </div>
                                <div class="add-product-card display-flex">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.4 19.708C10.0707 19.708 9.81733 19.6193 9.64 19.442C9.488 19.2647 9.412 19.024 9.412 18.72V11.044H1.888C1.584 11.044 1.34333 10.968 1.166 10.816C0.988667 10.6387 0.9 10.398 0.9 10.094C0.9 9.79 0.988667 9.562 1.166 9.41C1.34333 9.23267 1.584 9.144 1.888 9.144H9.412V1.696C9.412 1.392 9.488 1.15133 9.64 0.974C9.81733 0.796666 10.0707 0.707999 10.4 0.707999C10.7293 0.707999 10.97 0.796666 11.122 0.974C11.2993 1.15133 11.388 1.392 11.388 1.696V9.144H18.912C19.2413 9.144 19.482 9.23267 19.634 9.41C19.8113 9.562 19.9 9.79 19.9 10.094C19.9 10.4233 19.8113 10.664 19.634 10.816C19.482 10.968 19.2413 11.044 18.912 11.044H11.388V18.72C11.388 19.024 11.2993 19.2647 11.122 19.442C10.97 19.6193 10.7293 19.708 10.4 19.708Z"
                                            fill="#999999" />
                                    </svg>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="add-product_search-wrapper">
                    <div class="add-product_search">
                        <div class="add-product-search-bar">
                            <!-- put searchbar here -->

                            <div class="toolbar tabbar added-product-list-bar">
                                <div class="toolbar-inner added-product-list-bar-inner">
                                    <a href="#tab-1" class="tab-link tab-link-active dine-in-btn">Dine In</a>
                                    <a href="#tab-2" class="tab-link takeaway-btn">Takeaway</a>
                                </div>
                            </div>
                            <div class="tabs added-product-list">
                                <ul id="tab-1" class="tab tab-active added-product_list no-margin no-padding">

                                    <li class="added-product_list-item display-flex">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.5 0C5.15871 0 0 5.15871 0 11.5C0 17.8413 5.15871 23 11.5 23C17.8413 23 23 17.8413 23 11.5C23 5.15871 17.8413 0 11.5 0ZM16.5312 12.4583H6.46875C5.93975 12.4583 5.51042 12.029 5.51042 11.5C5.51042 10.971 5.93975 10.5417 6.46875 10.5417H16.5312C17.0602 10.5417 17.4896 10.971 17.4896 11.5C17.4896 12.029 17.0602 12.4583 16.5312 12.4583Z"
                                                fill="#F33E3E" />
                                        </svg>
                                        <div class="added-list-item-preview">
                                            <img src="/assets/images/seederImages/add-combo/Burger.png">
                                        </div>
                                        <p>Burger</p>
                                        <input type="checkbox" id="burger" name="burger" value="burger" checked>
                                    </li>
                                    <hr class="no-padding">

                                    <li class="added-product_list-item display-flex">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.5 0C5.15871 0 0 5.15871 0 11.5C0 17.8413 5.15871 23 11.5 23C17.8413 23 23 17.8413 23 11.5C23 5.15871 17.8413 0 11.5 0ZM16.5312 12.4583H6.46875C5.93975 12.4583 5.51042 12.029 5.51042 11.5C5.51042 10.971 5.93975 10.5417 6.46875 10.5417H16.5312C17.0602 10.5417 17.4896 10.971 17.4896 11.5C17.4896 12.029 17.0602 12.4583 16.5312 12.4583Z"
                                                fill="#F33E3E" />
                                        </svg>
                                        <div class="added-list-item-preview">
                                            <img src="/assets/images/seederImages/add-combo/Sandwich.png">
                                        </div>
                                        <p>Sandwich</p>
                                        <input type="checkbox" id="sandwich" name="sandwich" value="sandwich">
                                    </li>
                                    <hr class="no-padding">

                                    <li class="added-product_list-item display-flex">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.5 0C5.15871 0 0 5.15871 0 11.5C0 17.8413 5.15871 23 11.5 23C17.8413 23 23 17.8413 23 11.5C23 5.15871 17.8413 0 11.5 0ZM16.5312 12.4583H6.46875C5.93975 12.4583 5.51042 12.029 5.51042 11.5C5.51042 10.971 5.93975 10.5417 6.46875 10.5417H16.5312C17.0602 10.5417 17.4896 10.971 17.4896 11.5C17.4896 12.029 17.0602 12.4583 16.5312 12.4583Z"
                                                fill="#F33E3E" />
                                        </svg>
                                        <div class="added-list-item-preview">
                                            <img src="/assets/images/seederImages/add-combo/Noodles.png">
                                        </div>
                                        <p>Noodles</p>
                                        <input type="checkbox" id="noodles" name="noodles" value="Bike" checked>
                                    </li>
                                    <hr class="no-padding">

                                    <li class="added-product_list-item display-flex">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.5 0C5.15871 0 0 5.15871 0 11.5C0 17.8413 5.15871 23 11.5 23C17.8413 23 23 17.8413 23 11.5C23 5.15871 17.8413 0 11.5 0ZM16.5312 12.4583H6.46875C5.93975 12.4583 5.51042 12.029 5.51042 11.5C5.51042 10.971 5.93975 10.5417 6.46875 10.5417H16.5312C17.0602 10.5417 17.4896 10.971 17.4896 11.5C17.4896 12.029 17.0602 12.4583 16.5312 12.4583Z"
                                                fill="#F33E3E" />
                                        </svg>
                                        <div class="added-list-item-preview">
                                            <img src="/assets/images/seederImages/add-combo/French_Fries.png">
                                        </div>
                                        <p>French fries</p>
                                        <input type="checkbox" id="french_fries" name="french_fries"
                                            value="french-fries">
                                    </li>
                                    <hr class="no-padding">

                                    <li class="added-product_list-item display-flex">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.5 0C5.15871 0 0 5.15871 0 11.5C0 17.8413 5.15871 23 11.5 23C17.8413 23 23 17.8413 23 11.5C23 5.15871 17.8413 0 11.5 0ZM16.5312 12.4583H6.46875C5.93975 12.4583 5.51042 12.029 5.51042 11.5C5.51042 10.971 5.93975 10.5417 6.46875 10.5417H16.5312C17.0602 10.5417 17.4896 10.971 17.4896 11.5C17.4896 12.029 17.0602 12.4583 16.5312 12.4583Z"
                                                fill="#F33E3E" />
                                        </svg>
                                        <div class="added-list-item-preview">
                                            <img src="/assets/images/seederImages/add-combo/French_Fries.png">
                                        </div>
                                        <p>French fries</p>
                                        <input type="checkbox" id="french_fries" name="french_fries"
                                            value="french-fries">
                                    </li>
                                </ul>
                                <ul id="tab-2" class="tab added-product_list-size-select no-margin no-padding">

                                    <li class="added-product_list-item display-flex">
                                        <div class="takeaway-icons">S</div>
                                        <p>Small</p>
                                        <input type="checkbox" id="small" name="Small" value="Small" checked>
                                    </li>
                                    <hr class="no-padding">

                                    <li class="added-product_list-item display-flex">
                                        <div class="takeaway-icons">M</div>
                                        <p>Medium</p>
                                        <input type="checkbox" id="medium" name="Medium" value="Medium">
                                    </li>
                                    <hr class="no-padding">

                                    <li class="added-product_list-item display-flex">
                                        <div class="takeaway-icons">L</div>
                                        <p>Large</p>
                                        <input type="checkbox" id="large" name="Large" value="Large">
                                    </li>
                                    <hr class="no-padding">

                                    <li class="added-product_list-item display-flex">
                                        <div class="takeaway-icons">X</div>
                                        <p>Extra Large</p>
                                        <input type="checkbox" id="extra-large" name="extra-large" value="extra-large">
                                    </li>
                                </ul>
                            </div>
                            <div class="added-product-combo-btns display-flex">
                                <div class="clear-all-products-btn">
                                    <a href="#" class="bg-color-white">Clear All</a>
                                </div>
                                <div class="submit-products-btn">
                                    <a href="#" class="text-color-white">Submit Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
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