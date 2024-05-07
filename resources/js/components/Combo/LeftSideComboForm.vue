<template>
    <div class="card-content add-combo display-flex">
        <div
            class="grid grid-cols-3 medium-grid-cols-4 grid-gap-25 grid-gap-20 align-items-center add-combo-list">
            <div class="bg-color-white data-card"  
                :class="{ 'selected-product': isProductSelected(product.id)}"
                v-for="(product, index) in products" :key="index"
                @click="selectProductForCombo(product.id)"
            >
                <div class="combo-image">
                    <img :src="'/storage/'+product.image" />
                </div>
                <div class="text-align-center data-card-name">
                    <h4 class="no-margin no-padding">{{product.name}}</h4>
                    <p class="add-combo-product-price no-margin no-padding">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }} {{product.price}}</p>
                </div>
                <img class="food-type-icon" :src="foodTypeIcon(product.type)">
            </div>
        </div>
    </div>
</template>
<script setup>

import { getFoodTypeIcon } from '../../commonFunction.js'
import { inject } from 'vue';

const emit = defineEmits(['select:product']);
const currentCurrencyData = inject('currentCurrencyData');

const props = defineProps({
    products: {
        type: Array,
        default: () => []
    },
    selectProducts: {
        type: Array,
        default: () => []
    },
});

const foodTypeIcon = (typeId) => {
    return getFoodTypeIcon(typeId);
}

const isProductSelected = (id) => {
    return props.selectProducts.some(item => item.id === id);
}

const selectProductForCombo = (id) => {
    emit('select:product', id);
}

</script>