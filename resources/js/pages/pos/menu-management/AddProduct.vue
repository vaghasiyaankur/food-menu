<template>
    <f7-page>

        <div class="category-list-section">
            <MenuManagementHeader title="Ingradient" @blank:action="blankForm" @add:popup="showCategoryPopup"
                @update:search="updateSearch" @update:PopupTitle="updatePopupTitle" />

                <div class="card-content add-combo">
                <div
                    class="grid grid-cols-5 medium-grid-cols-4 grid-gap-25 grid-gap-20 align-items-center add-combo-list food-ingradient-list">
                    <div class="bg-color-white add-combo-product-card">
                        <div class="combo-image"><img
                                src="\assets\images\seederImages\Ingradients\Onion.png">
                        </div>
                        <div class="text-align-center add-combo-product-name">
                            <h4 class="no-margin no-padding">Kathiyavadi Thali</h4>
                        </div>
                        <div class="text-align-center combo-name">
                                <h4 class="no-margin no-padding">Combo 1</h4>
                                <p class="combo-price no-margin no-padding">$8.00</p>
                            </div>
                        <div class="grid grid-cols-2 grid-gap-5 combo-change">
                            <a class="edit-combo col-100 large-45 medium-50">
                                <Icon name="editIcon" />Edit
                            </a>
                            <a class="delete-combo col-100 large-50 medium-50">
                                <Icon name="deleteIcon" />Delete
                            </a>
                        </div>
                        <img class="food-category" src="/assets/images/seederImages/combo/type1.png">
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- ========= ADD INGRADIENT POPUP ========= -->
        <div class="ingradientPopup display-none">
            <div class="category-form">
                <div class="text-align-center popup_title">
                    Add Ingradient Category</div>
                <div class="category-add">
                    <label class="add_ingradient_name">Ingradient name</label>
                    <div class="ingradientName text-align-left">
                        <input type="text" class="ingradient-name" placeholder="Enter Ingradient name">
                    </div>
                    <div class="add_ingradient_image">
                        <label>Profile Image</label>
                    </div>
                    <div class="ingradient-image-selection">
                        <div class="category-add-image">
                            <img src="/images/add-image.png" />
                        </div>
                        <div class="category-add-image-text">
                            <span class="add-image-text">Select Image</span>
                        </div>
                    </div>
                    <div class="display-flex justify-content-center popup_button">
                        <button type="button"
                            class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                        <button type="button" class="button button-raised button-large popup-ok-button">Ok</button>
                    </div>
                </div>
            </div>
            <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
        </div>
        <!-- ========= EDIT INGRADIENT POPUP ========= -->
        <div class="EditCategoryPopup">
            <div class="category-form">
                <div class="text-align-center popup_title">
                    edit Category</div>
                <div class="category-add">
                    <label class="add_category_name">Ingradient name</label>
                    <div class="categoryName text-align-left">
                        <input type="text" class="category-name" placeholder="Kathiyavadi thali">
                    </div>
                    <div class="ingradient_price">
                        <label>Price</label>
                        <div class="ingradientPrice text-align-left">
                        <input type="text" class="ingradient-price" placeholder="₹ 70.00">
                    </div>
                    </div>
                    <div class="display-flex justify-content-center popup_button">
                        <button type="button"
                            class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                        <button type="button" class="button button-raised button-large popup-ok-button">Ok</button>
                    </div>
                </div>
            </div>
            <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
        </div>
        <!-- ========= DELETE INGRADIENT POPUP ========= -->
        <div class="DeleteIngradientPopup display-none">
            <div class="delete-ingradient-form">
                <div class="delete-category-WarningSign">
                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.5 0C6.05663 0 0 6.05663 0 13.5C0 20.9434 6.05663 27 13.5 27C20.9434 27 27 20.9434 27 13.5C27 6.05663 20.9434 0 13.5 0ZM18.4715 16.8816C18.9102 17.3204 18.9102 18.0327 18.4715 18.4731C18.2519 18.6923 17.9635 18.8023 17.6767 18.8023C17.3896 18.8023 17.1012 18.6923 16.8816 18.4731L13.5 15.0915L10.1184 18.4731C9.89882 18.6923 9.61043 18.8023 9.32327 18.8023C9.03488 18.8023 8.74814 18.6923 8.52855 18.4731C8.08978 18.0343 8.08978 17.322 8.52855 16.8816L11.9085 13.5L8.5269 10.1184C8.08813 9.67964 8.08813 8.96732 8.5269 8.5269C8.96567 8.08649 9.67799 8.08813 10.1184 8.5269L13.5 11.9085L16.8816 8.5269C17.3204 8.08813 18.0327 8.08813 18.4731 8.5269C18.9135 8.96567 18.9119 9.67799 18.4731 10.1184L15.0915 13.5L18.4715 16.8816Z"
                            fill="#F33E3E" />
                    </svg>
                </div>
                <h4 class=" no-margin delete-category-warning-text">Are you sure delete the Ingradient?</h4>
                <div class="display-flex justify-content-center popup_button">
                    <button type="button"
                        class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                    <button type="button" class="button button-raised button-large popup-ok-button">Ok</button>
                </div>
            </div>
            <div class="wave-image-content"><img src="/images/flow.png"></div>
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