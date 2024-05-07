
<template>
    <div class="toolbar tabbar added-product-list-bar">
        <div class="toolbar-inner added-product-list-bar-inner">
            <a href="#tab-ingredients" class="tab-link tab-link-active dine-in-btn">Ingredient</a>
            <a href="#tab-variations" class="tab-link takeaway-btn">Variation</a>
        </div>
    </div>
    <div class="tabs added-product-list">
        <ul id="tab-ingredients" class="tab tab-active added-product_list no-margin no-padding">
            <template 
                v-for="(ingredient, index) in ingredients"  :key="index"   
            >
            <li class="added-product_list-item display-flex">
                <div class="added-list-item-preview">
                    <img :src="'/storage/'+ingredient.image">
                </div>
                <div>
                    <p class="margin-bottom-half">{{ ingredient.name }}</p>
                    <p class="margin-top-half">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }} {{ ingredient.price }}</p>
                </div>
                <div class="add-remove-icon" 
                    v-if="isIngredientSelected(ingredient.id)"
                    @click="VariationIngredient(ingredient.id)"
                >
                    <Icon name="minusCircleFillUp"/>
                </div>
                <div class="add-remove-icon" 
                    v-else
                    @click="addSelectIngredient(ingredient.id)"
                >
                    <Icon name="plusCircleFillUp"/>
                </div>
            </li>
            <hr class="no-padding" v-if="(index + 1) !== ingredients.length">
            </template>
        </ul>
        <ul id="tab-variations" class="tab added-product_list-size-select no-margin no-padding">
            <template 
                v-for="(variation, index) in variations"  :key="index"   
            >
                <li class="added-product_list-item display-flex">
                    <div class="added-list-item-preview">
                        <img :src="'/storage/'+variation.image">
                    </div>
                    <p>{{variation.name}}</p>
                    <!-- <div class="add-remove-icon" @click="selectVariation(variation.id)">
                        <Icon name="minusCircleFillUp" />
                    </div> -->
                <div class="add-remove-icon" 
                    v-if="isVariationSelected(variation.id)"
                    @click="removeSelectVariation(variation.id)"
                >
                    <Icon name="minusCircleFillUp"/>
                </div>
                <div class="add-remove-icon" 
                    v-else
                    @click="openVariationPopup(variation.id)"
                >
                    <Icon name="plusCircleFillUp"/>
                </div>
                </li>
                <hr class="no-padding" v-if="(index + 1) !== variations.length">
            </template>
        </ul>
    </div>
</template>

<script setup>

import Icon from '../Icon.vue';
import { ref, inject } from 'vue';

const currentCurrencyData = inject('currentCurrencyData');

const emit = defineEmits([
    'add:select-ingredient', 
    'remove:select-ingredient',
    'open:variation-popup',
    'remove:select-variation'
]);

const props = defineProps({
    ingredients: {
        type: Array,
        default: () => []
    },
    variations: {
        type: Array,
        default: () => []
    },
    selectIngredients: {
        type: Array,
        default: () => []
    },
    selectVariations: {
        type: Array,
        default: () => []
    },
});

const popupSelectVariationId = ref(0);

const selectVariation = (id) => {
    popupSelectVariationId.value = id;
}

const addSelectIngredient = (id) => {
    emit('add:select-ingredient', id);
}

const VariationIngredient = (id) => {
    emit('remove:select-ingredient', id);
}

const isIngredientSelected = (id) => {
    return props.selectIngredients.some(item => item.id === id);
}

const isVariationSelected = (id) => {
    return props.selectVariations.some(item => item.id === id);
}

const openVariationPopup = (id) => {
    emit('open:variation-popup', id);
}
const removeSelectVariation = (id) => {
    emit('remove:select-variation', id);
}
</script>