<template>
    <div class="portion_calc">
        <label class="portion_split-text">Please enter number in which bill can be splited:</label>
        <div class="portion_split-input">
            <p class="main-portion no-margin">1/</p>
            <input type="number" v-model="formattedPortion" name="portions" id="portions" class="portions"
                placeholder="Enter portion here.">
        </div>
    </div>
    <div class="popup_button">
        <div class="cancel-save-btn">
            <div class="cancel-split-btn">
                <button class="popup-cancel-split-button popup-close">Cancel</button>
            </div>
            <div class="save-split-btn">
                <button type="button" class="popup-save-split-button" @click="portionFormSubmit()">Save</button>
            </div>
        </div>
    </div>
</template>
<script setup>
import { f7 } from 'framework7-vue';
import { inject, ref, computed }  from 'vue';
import Input from '../../Form/Input.vue';
import { successNotification, errorNotification } from '../../../commonFunction.js'

const splitPortionData = inject('splitPortionData')

const formattedPortion = computed({
    get: () => splitPortionData.value.portion,
    set: (newValue) => {
        splitPortionData.value.portion = newValue; 
    }
})
const portionFormSubmit = () => {
    const portionValue = splitPortionData.value.portion;
    if (!portionValue) {
        errorNotification('Please enter a portion value.');
    } else if (portionValue < 1) {
        errorNotification('Portion value must be greater than or equal to 1.');
    } else {
        f7.popup.close(".split-payment-popup");
        f7.popup.open(".settle-save-popup");
    }
}
</script>