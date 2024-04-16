<template>
    <div class="form-title tax_settings-banner">
        <h3 class="no-margin no-padding">                                    
            <span class="page_heading tax_settings"> Add Taxes </span> 
        </h3>
    </div>
    <div class="taxsetting_form">
        <form class="list no-margin tax-setting-form" id="tax-setting-form" @submit.prevent="saveTaxSetting">
            <input name="id" type="hidden" :value="tax.id" />
            <div class="item-content item-input taxsetting_form-name no-margin no-padding">
                <Input name="tax_name" type="text" placeholder="Enter tax name" label="Tax Name" :value="tax.tax_name" />
            </div>
            <div class="item-content item-input taxsetting_form-type-charge no-margin no-padding">
                <div class="item-inner no-padding">
                    <div class="block-title no-margin display-flex">
                        <span class="block-title no-margin"> Type Charge</span>
                        <Radio :options="taxTypeOption" name="tax_charge_type" :value="tax.tax_charge_type ?? 'percentage'" />
                    </div>
                    <div class="item-input-wrap taxsetting_form-input">
                        <Input name="tax_charge_amount" type="text" placeholder="Enter tax rate" :value="tax.tax_charge_amount" />
                    </div>
                </div>
            </div>
            <div class="form-submit no-margin no-padding display-flex justify-content-right popup_button">
                <button type="submit" class="button button-raised text-color-white bg-color-red button-large popup-button">Save Changes</button>
            </div>
        </form>
        <hr class="tax-divider no-padding">
        <form class="list no-margin tax-setting-form" id="tax-setting-form">
            <h3 class="no-margin no-padding"> <span class="page_heading tax_settings"> Taxes </span></h3>
            <div v-for="(tax,index) in taxes" :key="tax" class="item-content item-input taxsetting_form-gst no-padding-left">
                <div class="item-inner no-padding">
                    <div class="w-100 display-flex justify-content-space-between">
                        <div class="block-title no-margin"> {{ tax.tax_name }}</div>
                        <Radio :options="statusOption" :name="'status_'+tax.id" :value="tax.status" />
                    </div>
                    <div class="w-100 display-flex justify-content-space-between align-tems-center note_details gst-details">
                        <div class="block-title no-margin">{{ tax.tax_charge_amount }} {{ tax.tax_charge_type == 'percentage' ? '%' : currency.currency_code }}</div>
                        <div class="tax-btns">
                            <span class="edit_tax_button"><Icon name="editIcon" @click="editTax(index)" /></span>
                            <span class="delete_tax_button"><Icon name="deleteIcon" @click="deleteTax(tax.id)" /></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-submit no-margin no-padding display-flex justify-content-right popup_button">
                <button type="button" class="button button-raised text-color-white bg-color-red button-large popup-button">Save Changes</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import Icon from '../../../components/Icon.vue'
import Input from '../../../components/Form/Input.vue'
import Radio from '../../../components/Form/Radio.vue'
import { ref } from 'vue'
import axios from 'axios'
import { successNotification, errorNotification } from '../../../commonFunction.js';

const taxes = ref([]);
const tax = ref({});
const taxTypeOption = ref([{
                        value: 'percentage',label: 'Percentage'
                    },{
                        value: 'flat',label: 'Flat'
                    }]);

const statusOption = ref([{
                        value: '1',label: 'On'
                    },{
                        value: '0',label: 'Off'
                    }]);

const currency = ref([]);

const saveTaxSetting = (event) => {
    var formData = new FormData(event.target);
    axios.post('/api/save-tax-detail', formData)
    .then((res) => {
        successNotification(res.data.success);
        getTaxSetting();
        event.target.reset();
    })
}

const getCurrency = async () => {
    await axios.get('/api/get-currency')
    .then((res) => {
        currency.value = res.data.setting;
    })
}

const getTaxSetting = () => {
    axios.get('/api/get-tax-detail')
    .then((res) => {
        taxes.value = res.data.taxes;
    })
}

const editTax = (id) => {
    tax.value = taxes.value[id];
}

const deleteTax = (id) => {
    axios.delete(`/api/delete-tax-detail/${id}`)
    .then((res) => {
        successNotification(res.data.success);
        getTaxSetting();
    })
    .catch(error => {
        console.error('Error deleting tax detail:', error);
    });
}

getCurrency();
getTaxSetting();

</script>