<template>
    <div class="popup no-of-person-popup" id="no-of-person-popup">
        <div class="data-form add-table-view-data-form">
            <div class="text-align-center table_view-popup_title">
                Number of Person</div>
            <hr class="popup_title_divider">
            <label class="no_of_person-text">Please enter No. of Person</label>
            <div class="add_no_of_person text-align-left">
                <input type="number" class="no_of_person-update-data" v-model="numberOfPerson" placeholder="Please enter No. of Person">
            </div>
            <div class="display-flex justify-content-center popup_button">
                <button type="button"
                    class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                <button type="button" class="button button-raised button-large  popup-ok-button" @click="setNumberOfPerson()">Ok</button>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>
</template>
<script setup>

import { f7 } from 'framework7-vue';
import { inject }  from 'vue';

const numberOfPerson = inject('numberOfPerson');
const saveData = inject('saveData');
const table = inject('table');

const setNumberOfPerson = () => {
    saveData(table.value.id);
    // f7.popup.close(`.no-of-person-popup`);
}
</script>