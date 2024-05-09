<template>
    <div class="popup upi-payment-popup" id="upi-payment-popup">
        <div class="data-form add_table_view-data-form">
            <div class="text-align-center table_view-popup_title">
                UPI Payment</div>
            <hr class="popup_title_divider">
            <table>
                <tr>
                    <th>Select</th>
                    <th>Name</th>
                    <th>Mode</th>
                    <th>Qr Code</th>
                </tr>
                <tr v-for="(upi, index) in upiList" :key="index">
                    <td><input type="radio" name="upi" v-model="formattedUpiSelection"/></td>
                    <td>{{ upi.name }}</td>
                    <td>{{ upi.mode }}</td>
                    <td><img :src="'/storage/'+upi.image" width="50" height="50" /></td>
                </tr>
            </table>

            <div class="popup_button">
                <div class="bill-btn">
                    <div class="print-btn">
                        <button type="button" class="popup-print-button popup-close">Cancel</button>
                    </div>
                    <div class="e-bill-btn">
                        <button type="button" class="popup-e-bill-button" @click="upiSelectSubmit">Save</button>
                    </div>
                </div>
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