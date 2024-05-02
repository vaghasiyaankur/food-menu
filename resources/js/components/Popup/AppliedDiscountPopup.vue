<template>
    <div class="popup applied-discount-popup" id="applied-discount-popup">
        <div class="data-form add_table_view-data-form">
            <div class="text-align-center table_view-popup_title">
                Applied Discount</div>
            <hr class="popup_title_divider">
            <label class="custom-disc-text">Custom Discount</label>
            <div class="apply-custom-disc-selector text-align-left">
                <select name="apply-custom-disc" 
                    v-model="discountCategory" 
                    class="add-custom-disc" 
                    id="add-custom-disc"
                >
                    <option value="0" class="custom-disc-value">All</option>
                    <option 
                        v-for="subCat in discountSubCategoryList" 
                        :key="subCat.id" 
                        :value="subCat.id"
                        class="custom-disc-value"
                    >
                        {{ subCat.name }}
                    </option>
                </select>
                <div class="reason-for-adding-custom-disc-outer">
                    <input type="text" v-model="discountReason" class="reason-for-adding-custom-disc" placeholder="Reason">
                </div>
            </div>
            <div class="discount-type-selector text-align-left">
                <div class="display-flex">
                    <div class="disc-data display-flex align-items-center">
                        <input type="radio" id="discount_percentage-select" name="discount_type"
                            value="percentage" v-model="discountType">
                        <label for="discount_percentage-select">Percentage</label>
                    </div>
                    <div class="disc-data display-flex align-items-center">
                        <input type="radio" id="discount_fixed" name="discount_type" 
                            v-model="discountType" value="fixed" >
                        <label for="discount_fixed">Fixed</label>
                    </div>
                </div>
                <input type="number" class="selected-disc-data-input" v-model="discountPrice" placeholder="Price / Percentage">
            </div>
            <label class="apply_disc-coupon-code-text">Coupon Code</label>
            <div class="apply_disc-coupon-code text-align-left">
                <input type="text" v-model="discountCoupon" class="apply-discount-coupon-code-data" placeholder="Enter coupon code">
                <div class="apply-btn-outer">
                    <button class="button apply-btn" @click="appliedCoupon">Apply</button>
                </div>
            </div>
            <div class="display-flex justify-content-center popup_button">
                <button type="button"
                    class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                <button type="button"
                    class="button button-raised button-large popup-ok-button popup-save-button"
                    @click="applyDiscount"
                    >Save</button>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>
</template>
<script setup>

import { f7 } from 'framework7-vue';
import { ref, inject, onMounted }  from 'vue';
import { successNotification, errorNotification, getErrorMessage } from '../../commonFunction.js';
import axios from 'axios'

const discountSubCategoryList = ref([]);
const discountCategory = inject('discountCategory');
const discountReason = inject('discountReason');
const discountType = inject('discountType');
const discountCoupon = inject('discountCoupon');
const discountPrice = inject('discountPrice');
const calculateDiscount = inject('calculateDiscount');

onMounted(() => {
    getSubCategoryList();
});

const getSubCategoryList = () => {
    axios.get('/api/get-sub-categories-list')
    .then((response) => {
        discountSubCategoryList.value = response.data.sub_category;
    });
}
const applyDiscount = () => {
    calculateDiscount();
}

const appliedCoupon = () => {
    const formData = new FormData();
    formData.append('discountCoupon', discountCoupon.value);

    axios.post('/api/apply-coupon', formData)
    .then((response) => {
        if (response.status === 200) {
            if(response.data.coupon){
                const coupon = response.data.coupon;
                discountType.value = coupon.discount_type;
                discountPrice
                
                
                
                
                
                
                
                
                
                .value = coupon.discount_value;
            }
            successNotification(response.data.message);
        }
    })
    .catch((error) => {
        errorNotification(error.response.data.message);
    });
}
</script>