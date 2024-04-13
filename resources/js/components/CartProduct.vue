<template>
    <div class="cart-products">
        <div class="kot-time-wrapper">
            <div class="kot-time">
                <div class="kot-time-heading">
                    <h5 class="no-margin">KOT - 1 Time - 01:10</h5>
                </div>
                <div class="product_detail">
                    <div class="product-detail-inner">
                        <div class="delete-product">
                            <span data-popup="#deleteCartItem_popup"
                                @click="f7.popup.open(`.deleteCartItemPopup`);"><f7-icon f7="minus"
                                    class="font-16 delete-product-button"></f7-icon></span>
                        </div>
                        <div class="product-summary">
                            <p class="no-margin">Margherita Pizza</p>
                            <span class="no-margin display-flex align-items-center">Size: S<p
                                    class="text-red no-margin">
                                    $10.00</p></span>
                        </div>
                    </div>
                    <div class="product-detail-inner">
                        <div class="quantity-section">
                            <div class="quantity-content">
                                <span class="quantity-minus"><f7-icon f7="minus"
                                        class="font-16 quantity-icon"></f7-icon></span>
                                <span class="quantity-count">1</span>
                                <span class="quantity-plus"><f7-icon f7="plus"
                                        class="font-16 quantity-icon"></f7-icon></span>
                            </div>
                        </div>
                        <div class="product-note-content">
                            <div class="product-note" data-popup="#note_popup" @click="f7.popup.open(`.notePopup`);">
                                <Icon name="note" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_detail">
                    <div class="product-detail-inner">
                        <div class="delete-product">
                            <span data-popup="#deleteCartItem_popup"
                                @click="f7.popup.open(`.deleteCartItemPopup`);"><f7-icon f7="minus"
                                    class="font-16 delete-product-button"></f7-icon></span>
                        </div>
                        <div class="product-summary">
                            <p class="no-margin">Romana Pizza</p>
                            <span class="no-margin display-flex align-items-center">Size: M<p
                                    class="text-red no-margin">
                                    $15.00</p></span>
                        </div>
                    </div>
                    <div class="product-detail-inner">
                        <div class="quantity-section">
                            <div class="quantity-content">
                                <span class="quantity-minus"><f7-icon f7="minus"
                                        class="font-16 quantity-icon"></f7-icon></span>
                                <span class="quantity-count">1</span>
                                <span class="quantity-plus"><f7-icon f7="plus"
                                        class="font-16 quantity-icon"></f7-icon></span>
                            </div>
                        </div>
                        <div class="product-note-content">
                            <div class="product-note" data-popup="#note_popup" @click="f7.popup.open(`.notePopup`);">
                                <Icon name="note" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_detail">
                    <div class="product-detail-inner">
                        <div class="delete-product">
                            <span data-popup="#deleteCartItem_popup"
                                @click="f7.popup.open(`.deleteCartItemPopup`);"><f7-icon f7="minus"
                                    class="font-16 delete-product-button"></f7-icon></span>
                        </div>
                        <div class="product-summary">
                            <p class="no-margin">California Style Pizza</p>
                            <span class="no-margin display-flex align-items-center">Size: L<p
                                    class="text-red no-margin">
                                    $15.00</p></span>
                        </div>
                    </div>
                    <div class="product-detail-inner">
                        <div class="quantity-section">
                            <div class="quantity-content">
                                <span class="quantity-minus"><f7-icon f7="minus"
                                        class="font-16 quantity-icon"></f7-icon></span>
                                <span class="quantity-count">1</span>
                                <span class="quantity-plus"><f7-icon f7="plus"
                                        class="font-16 quantity-icon"></f7-icon></span>
                            </div>
                        </div>
                        <div class="product-note-content">
                            <div class="product-note" data-popup="#note_popup" @click="f7.popup.open(`.notePopup`);">
                                <Icon name="note" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_detail">
                    <div class="product-detail-inner">
                        <div class="delete-product">
                            <span data-popup="#deleteCartItem_popup"
                                @click="f7.popup.open(`.deleteCartItemPopup`);"><f7-icon f7="minus"
                                    class="font-16 delete-product-button"></f7-icon></span>
                        </div>
                        <div class="product-summary">
                            <p class="no-margin">New York-Style Pizza
                                Vegetarian</p>
                            <span class="no-margin display-flex align-items-center">Size: S<p
                                    class="text-red no-margin">
                                    $10.00</p></span>
                        </div>
                    </div>
                    <div class="product-detail-inner">
                        <div class="quantity-section">
                            <div class="quantity-content">
                                <span class="quantity-minus"><f7-icon f7="minus"
                                        class="font-16 quantity-icon"></f7-icon></span>
                                <span class="quantity-count">1</span>
                                <span class="quantity-plus"><f7-icon f7="plus"
                                        class="font-16 quantity-icon"></f7-icon></span>
                            </div>
                        </div>
                        <div class="product-note-content">
                            <div class="product-note" data-popup="#note_popup" @click="f7.popup.open(`.notePopup`);">
                                <Icon name="note" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kot-time">
                <div class="kot-time-heading">
                    <h5 class="no-margin">KOT - 2 Time - 01:20</h5>
                </div>
                <div class="product_detail">
                    <div class="product-detail-inner">
                        <div class="delete-product">
                            <span data-popup="#deleteCartItem_popup"
                                @click="f7.popup.open(`.deleteCartItemPopup`);"><f7-icon f7="minus"
                                    class="font-16 delete-product-button"></f7-icon></span>
                        </div>
                        <div class="product-summary">
                            <p class="no-margin">New York-Style Pizza
                                Vegetarian</p>
                            <span class="no-margin display-flex align-items-center">Size: S<p
                                    class="text-red no-margin">
                                    $10.00</p></span>
                        </div>
                    </div>
                    <div class="product-detail-inner">
                        <div class="quantity-section">
                            <div class="quantity-content">
                                <span class="quantity-minus"><f7-icon f7="minus"
                                        class="font-16 quantity-icon"></f7-icon></span>
                                <span class="quantity-count">1</span>
                                <span class="quantity-plus"><f7-icon f7="plus"
                                        class="font-16 quantity-icon"></f7-icon></span>
                            </div>
                        </div>
                        <div class="product-note-content">
                            <div class="product-note" data-popup="#note_popup" @click="f7.popup.open(`.notePopup`);">
                                <Icon name="note" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_detail">
                    <div class="product-detail-inner">
                        <div class="delete-product">
                            <span data-popup="#deleteCartItem_popup"
                                @click="f7.popup.open(`.deleteCartItemPopup`);"><f7-icon f7="minus"
                                    class="font-16 delete-product-button"></f7-icon></span>
                        </div>
                        <div class="product-summary">
                            <p class="no-margin">California Style Pizza</p>
                            <span class="no-margin display-flex align-items-center">Size: L<p
                                    class="text-red no-margin">
                                    $15.00</p></span>
                        </div>
                    </div>
                    <div class="product-detail-inner">
                        <div class="quantity-section">
                            <div class="quantity-content">
                                <span class="quantity-minus"><f7-icon f7="minus"
                                        class="font-16 quantity-icon"></f7-icon></span>
                                <span class="quantity-count">1</span>
                                <span class="quantity-plus"><f7-icon f7="plus"
                                        class="font-16 quantity-icon"></f7-icon></span>
                            </div>
                        </div>
                        <div class="product-note-content">
                            <div class="product-note" data-popup="#note_popup" @click="f7.popup.open(`.notePopup`);">
                                <Icon name="note" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_detail">
                    <div class="product-detail-inner">
                        <div class="delete-product">
                            <span data-popup="#deleteCartItem_popup"
                                @click="f7.popup.open(`.deleteCartItemPopup`);"><f7-icon f7="minus"
                                    class="font-16 delete-product-button"></f7-icon></span>
                        </div>
                        <div class="product-summary">
                            <p class="no-margin">Romana Pizza</p>
                            <span class="no-margin display-flex align-items-center">Size: M<p
                                    class="text-red no-margin">
                                    $15.00</p></span>
                        </div>
                    </div>
                    <div class="product-detail-inner">
                        <div class="quantity-section">
                            <div class="quantity-content">
                                <span class="quantity-minus"><f7-icon f7="minus"
                                        class="font-16 quantity-icon"></f7-icon></span>
                                <span class="quantity-count">1</span>
                                <span class="quantity-plus"><f7-icon f7="plus"
                                        class="font-16 quantity-icon"></f7-icon></span>
                            </div>
                        </div>
                        <div class="product-note-content">
                            <div class="product-note" data-popup="#note_popup" @click="f7.popup.open(`.notePopup`);">
                                <Icon name="note" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_detail">
                    <div class="product-detail-inner">
                        <div class="delete-product">
                            <span data-popup="#deleteCartItem_popup"
                                @click="f7.popup.open(`.deleteCartItemPopup`);"><f7-icon f7="minus"
                                    class="font-16 delete-product-button"></f7-icon></span>
                        </div>
                        <div class="product-summary">
                            <p class="no-margin">California Style Pizza</p>
                            <span class="no-margin display-flex align-items-center">Size: L<p
                                    class="text-red no-margin">
                                    $15.00</p></span>
                        </div>
                    </div>
                    <div class="product-detail-inner">
                        <div class="quantity-section">
                            <div class="quantity-content">
                                <span class="quantity-minus"><f7-icon f7="minus"
                                        class="font-16 quantity-icon"></f7-icon></span>
                                <span class="quantity-count">1</span>
                                <span class="quantity-plus"><f7-icon f7="plus"
                                        class="font-16 quantity-icon"></f7-icon></span>
                            </div>
                        </div>
                        <div class="product-note-content">
                            <div class="product-note" data-popup="#note_popup" @click="f7.popup.open(`.notePopup`);">
                                <Icon name="note" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>
<script setup>
import { f7, f7Icon } from 'framework7-vue';
import Icon from "./Icon.vue"
</script>