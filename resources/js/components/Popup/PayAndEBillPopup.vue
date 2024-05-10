<template>
    <!-- ========= SETTLE & SAVE POPUP ========= -->
    <SettleSavePopup @open:split-popup="openSplitPopup" @open:upi-popup="openUPIPopup" />

    <!-- ========= SPLIT BILL POPUP ========= -->
    <SplitPaymentPopup />

    <!-- ========= PART PAYMENT POPUP ========= -->
    <UpiPaymentPopup />
</template>
<script setup>
import { f7 } from 'framework7-vue';
import { inject, ref, provide, defineExpose }  from 'vue';
import axios from 'axios';
import { successNotification } from '../../commonFunction.js'
import SettleSavePopup from './SettleSavePopup.vue';
import SplitPaymentPopup from './SplitPaymentPopup.vue';
import UpiPaymentPopup from './UpiPaymentPopup.vue';

const paymentType = ref('cash');
const customerPaid = ref('');
const returnMoney = ref('');
const tip = ref('');
const settlementAmount = ref('');

const payableAmount = inject('payableAmount');
const orderId = inject('orderId');
const tableIdNumber = inject('tableIdNumber');

// Split Payment Popup
const splitType = ref('portion');
const splitPortionData = ref({
    portion : ''
});
const splitPercentageData = ref({
    percentage1 : '',
    percentage2 : '',
});
// UPI Payment Popup
const upiData = ref({
    selectedItem : ''
});


const emit = defineEmits([
    'success-payment'
]);

const openSplitPopup = () => {
    f7.popup.open(".split-payment-popup");
}

const openUPIPopup = () => {
    f7.popup.open(".upi-payment-popup");
}

const settleSavePayment = () => {
    const formData = new FormData();
    formData.append('orderId', orderId.value);
    formData.append('tableId', tableIdNumber.value);
    formData.append('paymentType', paymentType.value);
    formData.append('customerPaid', customerPaid.value);
    formData.append('returnMoney', returnMoney.value);
    formData.append('tip', tip.value);
    formData.append('settlementAmount', settlementAmount.value);
    if(paymentType.value == 'split'){
        if(splitType.value == 'portion'){
            formData.append('subPaymentData', JSON.stringify(splitPortionData.value));
        }else if(splitType.value == 'percentage'){
            formData.append('subPaymentData', JSON.stringify(splitPercentageData.value));
        }
    }else if(paymentType.value == 'upi'){
        formData.append('subPaymentData', JSON.stringify(upiData.value));
    }
    axios.post('/api/save-settle-bill', formData)
    .then((response) => {
        successNotification(response.data.success);
        f7.popup.close(".settle-save-popup");
        emit('success-payment');
    })
}

const blankSubPaymentForm = () => {
    splitPortionData.value.portion = '';
    upiData.value.selectedItem = '';
}

const defaultFillUpSettleMentData = () => {
    customerPaid.value = payableAmount.value;
    console.log(payableAmount.value);
    returnMoney.value = 0;
    tip.value = 0;
    settlementAmount.value = 0;
}

provide('paymentType', paymentType);
provide('customerPaid', customerPaid);
provide('returnMoney', returnMoney);
provide('tip', tip);
provide('settlementAmount', settlementAmount);
provide('payableAmount', payableAmount);
provide('blankSubPaymentForm', blankSubPaymentForm);
provide('defaultFillUpSettleMentData', defaultFillUpSettleMentData);
provide('settleSavePayment', settleSavePayment);

// Split Payment Popup
provide('splitType', splitType)
provide('splitPortionData', splitPortionData)
provide('splitPercentageData', splitPercentageData)

// UPI Payment Popup
provide('upiData', upiData);

defineExpose({
    defaultFillUpSettleMentData
})
</script>