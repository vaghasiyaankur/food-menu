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
                    <!-- <div class="payment-option">
                        <input type="radio" id="Card" name="payment_type" value="card">
                        <label for="Card">Card</label>
                    </div>
                    <div class="payment-option">
                        <input type="radio" id="Split" name="payment_type" value="split">
                        <label for="Split">Split</label>
                    </div>
                    <div class="payment-option">
                        <input type="radio" id="Other" name="payment_type" value="other">
                        <label for="Other">Other</label>
                    </div>
                    <div class="payment-option">
                        <input type="radio" id="UPI" name="payment_type" value="upi">
                        <label for="UPI">UPI</label>
                    </div>
                    <div class="payment-option">
                        <input type="radio" id="Due" name="payment_type" value="due">
                        <label for="Due">Due</label>
                    </div>
                    <div class="payment-option">
                        <input type="radio" id="Parts" name="payment_type" value="parts">
                        <label for="Parts">Parts</label>
                    </div> -->
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
        <!-- <AddUpdatePopup
            :title="'Settle & Save'"
            :form-data-format="addUpdateFormDataFormat" 
            :type="'add'" :data-type="'settle-save'"
            @store:update="storeUpdateData"
        /> -->
    </div>
</template>
<script setup>
import { f7 } from 'framework7-vue';
import { inject, ref }  from 'vue';
import AddUpdatePopup from '../../components/common/AddUpdatePopup.vue'

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
// const addUpdateFormDataFormat = ref([
//     {
//         label: 'Payment Type',
//         multipleLang: false,
//         type: 'radio',
//         name: 'payment_type',
//         options: [
//             { label: 'Cash', value: 'cash'},
//             { label: 'Card', value: 'card'},
//             { label: 'Split', value: 'split'},
//             { label: 'Parts', value: 'parts'},
//             { label: 'UPI', value: 'upi'},
//             { label: 'Due', value: 'due'},
//             { label: 'Other', value: 'other'}
//         ],
//         placeHolder: 'Payment Type',
//         value: 'cash'
//     },
//     { label: 'Customer Paid', multipleLang: false, type: 'number', name: 'customer_paid', placeHolder: 'Customer Paid', value: ''},
//     { label: 'Return Money', multipleLang: false, type: 'number', name: 'return_money', placeHolder: 'Return Money', value: ''},
//     { label: 'Tip', multipleLang: false, type: 'number', name: 'tip', placeHolder: 'Tip', value: ''},
//     { label: 'Settlement Amount', multipleLang: false, type: 'number', name: 'settlement_amount', placeHolder: 'Settlement Amount', value: ''}
// ]);

const storeUpdateData = () => {
    // f7.popup.close(`.waiter_popup`);
}


</script>