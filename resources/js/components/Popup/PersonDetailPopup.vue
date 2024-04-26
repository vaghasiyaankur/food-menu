<template>
    <div class="popup person_details" id="person_details">
        <div class="data-form add_table_view-data-form">
            <div class="text-align-center table_view-popup_title">
                Person Details</div>
            <hr class="popup_title_divider">
            <label class="due_mobile-text">Mobile</label>
            <div class="add_due_mobile-text text-align-left">
                <input type="number" class="due_mobile-text-update-data" v-model="personNumber" placeholder="Enter mobile number">
            </div>
            <label class="due_customer-name">Name</label>
            <div class="add_due_customer-name text-align-left">
                <input type="text" class="due_customer-name-data" v-model="personName" placeholder="Enter your name">
            </div>
            <label class="due_customer-address">Address</label>
            <div class="add_due_customer-address text-align-left">
                <input type="text" class="due_customer-address-data" v-model="personAddress" placeholder="Enter your address">
            </div>
            <label class="due_customer-locality">Locality</label>
            <div class="add_due_customer-locality text-align-left">
                <input type="text" class="due_customer-locality-data" v-model="personLocality" placeholder="Enter your locality">
            </div>
            <div class="display-flex justify-content-center popup_button">
                <button type="button" 
                    class="button button-raised button-large popup-close popup-cancel-button"
                >
                    Cancel
                </button>
                <button type="button" class="button button-raised button-large popup-ok-button" @click="setPersonDetails()">Ok</button>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>
</template>
<script setup>
import { f7 } from 'framework7-vue';
import { inject }  from 'vue';

const personNumber = inject('personNumber');
const personName = inject('personName');
const personAddress = inject('personAddress');
const personLocality = inject('personLocality');

const setPersonDetails = () => {
    f7.popup.close(`.person_details`);
}

</script>