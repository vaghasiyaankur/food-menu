<template>
    <div class="cart-products" :class="openAmountSlider ? '' : 'open'" >
        <div class="kot-time-wrapper">
            <div class="kot-time" v-if="oldOrder">
                <template v-for="(kot,index) in oldOrder.kots" :key="index">
                    <div class="kot-time-heading">
                        <h5 class="no-margin">KOT - {{ kot.number }} Time - {{ kot.time }}</h5>
                    </div>
                    <div class="product_detail" v-for="(kp, ind) in kot.kot_products" :key="ind">
                        <div class="product-detail-inner">
                            <div class="product-summary">
                                <div class="display-flex">
                                    <p class="no-margin-vertical margin-right-half">{{ kp.name }}</p>
                                    <span 
                                        v-if="kp.variation"
                                        class="no-margin display-flex align-items-center"
                                    >
                                        (Size: {{ kp.variation }})
                                    </span>
                                </div>
                                <span v-if="kp.ingredients.length > 0" >
                                    Ingredient : 
                                    <span v-for="(ing, index) in kp.ingredients" :key="index">
                                        {{ ing }} <span v-if="(kp.ingredients.length - 1) !== index">, </span>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="product-detail-inner justify-content-end">
                            <div class="product-summary text-align-right margin-right">
                                <p class="text-red no-margin">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }} {{ ((kp.price + kp.extra_amount) * kp.quantity).toFixed(2) }}</p>
                            </div>
                            <div class="product-note-content">
                                <div class="product-note" data-popup="#note_popup" @click="openNotePopup(kot.id, 'old', index, ind)">
                                    <Icon name="note" />
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <div class="kot-time">
                <div class="kot-time-heading">
                    <h5 class="no-margin">New KOT</h5>
                </div>
                <div class="product_detail" v-for="(product,index) in cartProducts" :key="index" >
                    <div class="product-detail-inner">
                        <div class="display-flex align-items-center w-100">
                            <div class="delete-product"  @click="removeProduct(index, 'new', null, null)">
                                <span>
                                    <f7-icon f7="minus" class="font-16 delete-product-button"></f7-icon>
                                </span>
                            </div>
                            <div class="product-summary">
                                <p class="no-margin">
                                    {{ product.name }}
                                </p>
                                <p class="text-red no-margin">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }} {{ ((product.price + product.extraAmount) * product.quantity).toFixed(2) }}</p>
                                <span v-if="product.variation.name" class="no-margin display-flex align-items-center" >
                                    Size: {{ product.variation.name }}
                                </span>
                                <span v-if="product.ingredient.length > 0" >
                                    Ingredient : 
                                    <span v-for="(ing, index) in product.ingredient" :key="index">
                                        {{ ing.name }} <span v-if="(product.ingredient.length - 1) !== index">, </span>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="product-detail-inner">
                        <div class="quantity-section">
                            <div class="quantity-content">
                                <span class="quantity-minus" :class="{'disabled' : product.quantity < 2}" @click="decreaseQuantity(index, 'new', null, null)">
                                    <f7-icon f7="minus"
                                        class="font-16 quantity-icon">
                                    </f7-icon>
                                </span>
                                <span class="quantity-count">{{ product.quantity }}</span>
                                <span class="quantity-plus" @click="increaseQuantity(index, 'new', null, null)">
                                    <f7-icon f7="plus" class="font-16 quantity-icon"></f7-icon>
                                </span>
                            </div>
                        </div>
                        <div class="product-note-content">
                            <div class="product-note" @click="openNotePopup(index, 'new', null, null)">
                                <Icon name="note" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { f7, f7Icon } from 'framework7-vue';
import Icon from '../Icon.vue';
import { inject } from 'vue';

const emit = defineEmits(['increase:quantity', 'decrease:quantity', 'open:note-popup', 'remove:cart-product']);
const currentCurrencyData = inject('currentCurrencyData');

const props = defineProps({
    cartProducts: {
        type: Array,
        default: () => []
    },
    table: [Array, Object],
    oldOrder: [Array, Object],
    openAmountSlider : Boolean
});

const increaseQuantity = (id, kot, kotIndex, kotProductIndex) => {
    emit('increase:quantity', id, kot, kotIndex, kotProductIndex);
}

const decreaseQuantity = (id, kot, kotIndex, kotProductIndex) => {
    emit('decrease:quantity', id, kot, kotIndex, kotProductIndex);
}

const openNotePopup = (id, kot, kotIndex, kotProductIndex) => {
    emit('open:note-popup', id, kot, kotIndex, kotProductIndex);
}

const removeProduct = (index, kot, kotIndex, kotProductIndex) => {
    emit('remove:cart-product', index, kot, kotIndex, kotProductIndex)
}
</script>