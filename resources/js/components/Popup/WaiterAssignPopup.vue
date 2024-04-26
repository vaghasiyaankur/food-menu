<template>
    <div class="popup waiter_popup" id="waiter_popup">
        <div class="data-form add_table_view-data-form">
            <div class="text-align-center table_view-popup_title">
                Assign Waiter</div>
            <hr class="popup_title_divider">
            <label class="waiter-text">Select Waiter</label>
            <div class="add_waiter-selector text-align-left">
                <div class="waiter-data display-flex align-items-center">
                    <input type="radio" id="waiter-list-1" name="waiter-list" value="1"  v-model="selectWaiter">
                    <label for="waiter-list-1">Krishna</label>
                </div>
                <div class="waiter-data display-flex align-items-center">
                    <input type="radio" id="waiter-list-2" name="waiter-list" value="2" v-model="selectWaiter">
                    <label for="waiter-list-2">Jemisha</label>
                </div>
                <div class="waiter-data display-flex align-items-center">
                    <input type="radio" id="waiter-list-3" name="waiter-list" value="3" v-model="selectWaiter">
                    <label for="waiter-list-3">Khushi</label>
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

const setOrderNote = () => {
    f7.popup.close(`.waiter_popup`);
}
</script>