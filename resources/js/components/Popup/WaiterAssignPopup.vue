<template>
    <div class="popup waiter-popup" id="waiter-popup">
        <div class="data-form add-table-view-data-form">
            <div class="text-align-center table_view-popup_title">
                Assign Waiter</div>
            <hr class="popup_title_divider">
            <label class="waiter-text">Select Waiter</label>
            <div class="add_waiter-selector text-align-left">
                <div class="waiter-data display-flex align-items-center" v-for="waiter in waiters" :key="waiter.id">
                    <input type="radio" :id="'waiter-list-'+waiter.id" name="waiter-list" :value="waiter.id" v-model="selectWaiter">
                    <label :for="'waiter-list-'+waiter.id">{{ waiter.name }}</label>
                </div>
            </div>
            <div class="display-flex justify-content-center popup_button">
                <button type="button"
                    class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                <button type="button" class="button button-raised button-large popup-ok-button" @click="setOrderNote()">Ok</button>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>
</template>
<script setup>

import { f7 } from 'framework7-vue';
import { inject }  from 'vue';

const selectWaiter = inject('selectWaiter');
const saveData = inject('saveData');
const table = inject('table');
const waiters = inject('waiters');

const setOrderNote = () => {
    saveData(table.value.id);
    // f7.popup.close(`.waiter-popup`);
}
</script>