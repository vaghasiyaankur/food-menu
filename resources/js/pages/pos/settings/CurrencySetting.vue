<template>
    <div class="form-title currency_settings-banner">
        <h3 class="no-margin">                                    
            <span class="page_heading no-margin currency_settings"> Add New Currency </span> 
        </h3>
    </div>
    <div class="currency_form">
        <form class="list" id="my-form" @submit.prevent="saveCurrency">
            <div class="item-content item-input currency_form-currency-name no-margin no-padding">
                <Input type="text" name="currency_name" class="" :value="currency?.currency_name" placeholder="Enter currency name" label="Name" />
            </div>
            <div class="item-content item-input currency_form-currency-code no-margin no-padding">
                <Input type="text" name="currency_code" class="" :value="currency?.currency_code" placeholder="Enter Code" label="Code" />
            </div>
            <div class="item-content item-input currency_form-currency-symbol no-margin no-padding">
                <Input type="text" name="currency_symbol" class="" :value="currency?.currency_symbol" placeholder="Enter Symbol" label="Symbol" />
            </div>
            <div class="form-submit no-margin-bottom display-flex justify-content-right padding-top popup_button">
                <button type="button" class="button button-raised text-color-red button-large popup-close popup-button">Cancel</button>
                <button type="submit" class="button button-raised text-color-white bg-color-red button-large popup-button">Save Changes</button>
            </div>
        </form>
    </div>
</template>

<script setup> 
import axios from "axios"
import Input from "../../../components/Form/Input.vue"
import { ref } from "vue"
import { successNotification, errorNotification } from '../../../commonFunction.js';

const currency = ref([]);

const getCurrency = async () => {
    await axios.get('/api/get-currency')
    .then((res) => {
        currency.value = res.data.setting;
    })
}

const saveCurrency = () => {
    var formData = new FormData(event.target);
    axios.post('/api/save-currency', formData)
    .then((res) => {
        successNotification(res.data.success);
    })
}

getCurrency();

</script>