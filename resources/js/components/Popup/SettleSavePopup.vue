<template>
    <div class="popup settle-save-popup" id="settle-save-popup">
        <div class="data-form add_table_view-data-form">
            <div class="text-align-center table_view-popup_title">
                Settle & Save</div>
            <hr class="popup_title_divider">
            <label class="custom-disc-text">Payment Type</label>
            <div class="payment-method display-block">
                <div class="grid">
                    <div class="payment-option" 
                        v-for="(payType, index) in paymentTypes" :key="index"
                    >
                        <input type="radio" :id="'payment-type-'+index" name="payment_type" :value="payType.value" :checked="payType.value = paymentType">
                        <label :for="'payment-type-'+index">{{ payType.label }}</label>
                    </div>
                </div>
            </div>
            <label class="settle_save-heading-text">Customer Paid</label>
            <div class="settle_save-text text-align-left">
                <input type="number" v-model="customerPaid" name="customer_paid" class="customer-paid-update-data settle_save-input" placeholder="2000">
            </div>
            <label class="settle_save-heading-text">Return to customer</label>
            <div class="settle_save-text text-align-left">
                <input type="number" v-model="returnMoney" name="return_money" class="return-customer-update-data settle_save-input" placeholder="0">
            </div>
            <label class="settle_save-heading-text">Tip</label>
            <div class="settle_save-text text-align-left">
                <input type="number" v-model="tip" name="tip" class="tip-update-data settle_save-input" placeholder="0">
            </div>
            <label class="settle_save-heading-text">Settlement Amount</label>
            <div class="settle_save-text text-align-left">
                <input type="number" v-model="settlementAmount" name="settlement_amount" class="settlement-amount-update-data settle_save-input" placeholder="0">
            </div>
            <div class="display-flex justify-content-center popup_button">
                <button type="button"
                    class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                <button type="button"
                    class="button button-raised button-large popup-ok-button popup-save-settle-button"
                    @click="settleSave()">
                    Save & Settle
                </button>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>
</template>
<script setup>
import { inject, ref }  from 'vue';

const paymentType = inject('paymentType');
const customerPaid = inject('customerPaid');
const returnMoney = inject('returnMoney');
const tip = inject('tip');
const settlementAmount = inject('settlementAmount');
const settleSavePayment = inject('settleSavePayment');

const paymentTypes = ref([
    { label: 'Cash', value: 'cash'},
    { label: 'Card', value: 'card'},
    { label: 'Split', value: 'split'},
    { label: 'Parts', value: 'parts'},
    { label: 'UPI', value: 'upi'},
    { label: 'Due', value: 'due'},
    { label: 'Other', value: 'other'}
]);

const settleSave = () => {
    settleSavePayment();
}

</script>