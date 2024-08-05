<template>
    <div class="percentage_split_calc">
        <div :class="'percentage-input-value percentage-input-'+(index+1)" v-for="(splitPer, key, index) in splitPercentageData" :key="index"> 
            <label class="margin-top percentage_split-text">Percentage Number</label>
            <div class="percentage-split-input-value display-flex">
                <input type="number" 
                    :name="'percentages-'+(index+1)" 
                    :id="'percentages-'+(index+1)"
                    :class="['percentages-'+(index+1), index >= 2 ? 'percentage-value-more' : '']"
                    placeholder="Enter percentage"
                    :value="splitPer"
                    @input="updatePercentage($event, index)"
                >
                <template v-if="index >= 2">
                    <button 
                        class="remove-percentage-value display-flex justify-content-center align-items-center"
                        @click="removePercentage(index)"
                    >
                        <Icon name="deleteIcon" />
                    </button>
                </template>
            </div>
        </div>
    </div>
    <div class="popup_button popup-btn-for-portion-split">
        <div class="add-more-btn">
            <button class="popup-add-more-button" @click="addMorePercentage">Add More</button>
        </div>
        <div class="cancel-save-btn">
            <div class="cancel-split-btn">
                <button class="popup-cancel-split-button popup-close">Cancel</button>
            </div>
            <div class="save-split-btn">
                <button type="button" class="popup-save-split-button" @click="portionFormSubmit">Save</button>
            </div>
        </div>
    </div>
</template>
<script setup>
import { f7 } from 'framework7-vue';
import { inject, ref, computed }  from 'vue';
import Input from '../../Form/Input.vue';
import { successNotification, errorNotification } from '../../../commonFunction.js'
import Icon from '../../Icon.vue';

const splitPercentageData = inject('splitPercentageData')

const portionFormSubmit = () => {
    if (Object.values(splitPercentageData.value).some(val => !val)) return errorNotification('Please add a value for all percentages.');
    const sum = Object.values(splitPercentageData.value).reduce((acc, val) => acc + parseFloat(val || 0), 0);
    
    if (Math.abs(sum - 100) > 0.50) return errorNotification('Please write proper percentages. The sum of all percentages must be 100.');
    f7.popup.close(".split-payment-popup");
    f7.popup.open(".settle-save-popup");
}

const addMorePercentage = () => {
    let index = 1;
    let newDataKey = `percentage${index}`;
    while (splitPercentageData.value[newDataKey] !== undefined) {
        index++;
        newDataKey = `percentage${index}`;
    }
    splitPercentageData.value[newDataKey] = '';
}

const removePercentage = (index) => {
    const keys = Object.keys(splitPercentageData.value);
    const keyToRemove = keys[index];
    delete splitPercentageData.value[keyToRemove];
}

const updatePercentage = (event, index) => {
    const newValue = event.target.value;
    const keys = Object.keys(splitPercentageData.value);
    const keyToRemove = keys[index];
    splitPercentageData.value[keyToRemove] = newValue;
}
</script>