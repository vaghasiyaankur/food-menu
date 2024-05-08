<template>
    <h3 class="percentage-split-heading no-margin">Please provide only number</h3>
    <div class="percentage_split_calc">
        {{ splitPercentageData }}
        <div class="percentage-input-1" v-for="(splitPer, index) in splitPercentageData" :key="index"> 
            <label class="percentage_split-text">Percentage Number</label>
            <div class="percentage_split-input-1">
                <input type="text" name="enter_percentages" id="enter_percentages"
                    class="enter_percentages" placeholder="Enter percentage here like 80">
            </div>
        </div>
        <!-- <div class="percentage-input-2">
            <label class="percentage_split-text">Percentage Number</label>
            <div class="percentage_split-input-2">
                <input type="text" name="enter_percentages" id="enter_percentages"
                    class="enter_percentages" placeholder="Enter percentage here like 20">
            </div>
        </div> -->
    </div>
    <div class="popup_button popup-btns-for-portion-split">
        <div class="add-more-btn">
            <button class="popup-add-more-button" @click="addMorePercentage">Add More</button>
        </div>
        <div class="cancel-save-btn">
            <div class="cancel-split-btn">
                <button class="popup-cancel-split-button popup-close">Cancel</button>
            </div>
            <div class="save-split-btn">
                <button type="button" class="popup-save-split-button">Save</button>
            </div>
        </div>
    </div>
</template>
<script setup>
import { f7 } from 'framework7-vue';
import { inject, ref, computed }  from 'vue';
import Input from '../../Form/Input.vue';
import { successNotification, errorNotification } from '../../../commonFunction.js'

const splitPercentageData = inject('splitPercentageData')

const formattedPortion = computed({
    get: () => splitPercentageData.value.portion,
    set: (newValue) => {
        splitPercentageData.value.portion = newValue; 
    }
})
const portionFormSubmit = () => {
    // const portionValue = splitPercentageData.value.portion;
    // if (!portionValue) {
    //     errorNotification('Please enter a portion value.');
    // } else if (portionValue < 1) {
    //     errorNotification('Portion value must be greater than or equal to 1.');
    // } else {
    //     f7.popup.close(".split-payment-popup");
    //     f7.popup.open(".settle-save-popup");
    // }
}

const addMorePercentage = () => {

}
</script>