<template>
    <div class="add-combo-slider no-margin">
        
        <AddEditForm :combo-data="comboData"/>

        <div class="added-product-combo">
            <ul class="added-product-combo_list no-margin no-padding">

                <template 
                v-for="(product, index) in selectProducts"  :key="index"   
                >
                <li class="added-combo_list-item">
                    <Icon name="minusCircleFillUp" @click="removeSelectProduct(product.id)" />
                    <div class="added-list-item-preview">
                        <img :src="'/storage/' + product.image" width="40" height="40">
                    </div>
                    <p>{{product.name}}</p>
                </li>
                <hr class="no-padding"  v-if="(index + 1) !== selectProducts.length">
                </template>
            </ul>
        </div>

        <div class="added-product-combo-btns display-flex">
            <div class="clear-all-btn">
                <a href="#" class="bg-color-white" @click="clearAllData">Clear All</a>
            </div>
            <div class="add-combo-btn">
                <a href="#" class="text-color-white" @click="submitCombo">Add Combo</a>
            </div>
        </div>

        <div class="horizontal-added-combo-slider">
            <a href="#"><svg width="8" height="12" viewBox="0 0 8 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1.8578 11.0639L7.06917 6.53649C7.15405 6.46279 7.22168 6.37383 7.26791 6.27509C7.31414 6.17635 7.33799 6.06993 7.33799 5.96236C7.33799 5.8548 7.31414 5.74837 7.26791 5.64964C7.22168 5.5509 7.15405 5.46194 7.06917 5.38824L1.8578 0.860863C1.46617 0.520738 0.823486 0.776863 0.823486 1.27336L0.823487 10.6514C0.823487 11.1479 1.46617 11.404 1.8578 11.0639Z"
                        fill="white" />
                </svg>

            </a>
        </div>
    </div>
</template>

<script setup>

import Icon from '../Icon.vue';
import AddEditForm from './AddEditForm.vue';
const emit = defineEmits(['select:remove-product', 'clear:data', 'submit:combo']);


const props = defineProps({
    selectProducts: {
        type: Array,
        default: () => []
    },
    comboData : {
        type: Array,
        default: () => []
    }
});

const removeSelectProduct = (id) => {
    emit('select:remove-product', id);
}
const clearAllData = () => {
    emit('clear:data');
}
const submitCombo = () => {
    emit('submit:combo');
}
</script>