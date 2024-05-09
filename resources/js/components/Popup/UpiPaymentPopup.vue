<template>
    <div class="popup upi-payment-popup" id="upi-payment-popup">
        <div class="data-form add_table_view-data-form margin-horizontal">
            <div class="text-align-center table_view-popup_title">UPI Payment</div>
            <hr class="popup_title_divider">
            <div class="upi-payment-methods">
                <ol class="payment_list no-margin" id="payment_list">
                    <li class="upi-payment-method" :class="{ 'select' : formattedUpiSelection == upi.id}" v-for="(upi, index) in upiList" :key="index">
                        <label class="upi-payment-detail" :for="'upi_'+upi.id">
                            <div class="upi-payment-info">
                                <input type="radio" name="upi" class="upi_payment_radio" :id="'upi_'+upi.id" :value="upi.id" v-model="formattedUpiSelection" :checked="formattedUpiSelection == upi.id" />
                                <img :src="'/storage/'+upi.image" width="50" height="50" />
                                <div class="order_number_time">
                                    <h3 class="order_number no-margin">{{ upi.name }}</h3>
                                    <div class="order_timing">
                                        <span class="order_date">{{ upi.mode }}</span>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </li>
                </ol>
            </div>

            <div class="display-flex justify-content-center popup_button margin-horizontal">
                <button type="button" class="button button-raised button-large popup-close text-white popup-cancel-button">Cancel</button>
                <button type="submit" class="button button-raised button-large popup-ok-button popup-save-settle-button" @click="upiSelectSubmit"> Save </button>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>
</template>
<script setup>
import { f7 } from 'framework7-vue';
import { inject, ref, onMounted, computed }  from 'vue';
import axios from 'axios';
import { errorNotification } from '../../commonFunction.js'

const upiList = ref([]);
const upiData = inject('upiData');

onMounted(() => {
    axios.get('/api/get-upi-list')
    .then((response) => {
        upiList.value = response.data.upiList
    });
});

const formattedUpiSelection = computed({
    get: () => upiData.value.selectedItem,
    set: (newValue) => {
        upiData.value.selectedItem = newValue; 
    }
});

const upiSelectSubmit = () => {
    const upiSelectValue = upiData.value.selectedItem;
    if (!upiSelectValue) {
        errorNotification('Please select a upi.');
    } else {
        f7.popup.close(".upi-payment-popup");
        f7.popup.open(".settle-save-popup");
    }
}
</script>
<style scoped>
table, th, td {
    border: 1px solid #000;
}
</style>