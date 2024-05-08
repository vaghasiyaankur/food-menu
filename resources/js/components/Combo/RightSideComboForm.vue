<template>
    <div class="add-combo-slider no-margin">

        <div class="add-combo-form-list">
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
        </div>
        

        <div class="added-product-combo-btns display-flex">
            <a href="#" class="clear-all-btn bg-color-white" @click="clearAllData">Clear All</a>
            <a href="#" class="add-combo-btn text-color-white" @click="submitCombo">{{ pageTypeButton }} Combo</a>
        </div>

        <!-- <div class="horizontal-added-combo-slider">
            <a href="#">
                <Icon name="rightArrowIcon" />
            </a>
        </div> -->
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
    },
    pageTypeButton : String
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