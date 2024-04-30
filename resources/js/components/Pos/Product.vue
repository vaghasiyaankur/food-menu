<template>
    <div class="pos-product-section">
        <div class="grid grid-cols-3 grid-gap-25 text-align-center padding">
            <f7-card class="no-margin" v-for="(product,index) in products" :key="index">
                <f7-card-content>
                    <div class="food-type-icon">
                        <img :src="foodTypeIcon(product.food_type)" alt="">
                    </div>
                    <div class="product-image">
                        <img :src="'/storage/'+product.image" alt="" width="100" height="100">
                    </div>
                    <div class="product-summary">
                        <p class="product_name margin-bottom-half">{{ product.name }}</p>
                        <p class="product_price text-red margin-top-half">${{ product.price }}</p>
                    </div>
                    <div class="product-add-button">
                        <template v-if="isProductSelected(product.id)">
                            <div class="display-flex">
                                <button class="button button-raised btn-add-product btn-added-product padding text-transform-capitalize active">
                                    <f7-icon f7="checkmark" class="font-16 margin-right-half"></f7-icon> Added
                                </button>
                                <button class="button button-raised btn-add-product btn-added-more-product padding text-transform-capitalize" @click="addProductIntoCart(product.id)" >
                                    <f7-icon f7="plus" class="font-16"></f7-icon>
                                </button>
                            </div>
                        </template>
                        <button 
                            class="button button-raised btn-add-product padding text-transform-capitalize"
                            @click="addProductIntoCart(product.id)"
                            v-else
                        >
                            <f7-icon f7="plus" class="font-16 margin-right-half"></f7-icon> Add
                        </button>
                    </div>
                </f7-card-content>
            </f7-card>
        </div>
    </div>
</template>

<script setup>
import { f7Card, f7CardContent,f7, f7Icon } from 'framework7-vue';
import { getFoodTypeIcon } from '../../commonFunction.js';
import { ref } from 'vue';
import Icon from '../Icon.vue';

const props = defineProps({
    products: Object,
    cartProducts: {
        type: Array,
        default: () => []
    },
});

const emit = defineEmits(['add:cart-product', 'remove:cart-product']);

const cartProduct = ref([]);

const foodTypeIcon = (typeId) => {
    return getFoodTypeIcon(typeId);
}

const addProductIntoCart = (id) => {
    emit('add:cart-product', id);
}

// const removeProductIntoCart = (id) => {
//     emit('remove:cart-product', id);
// }

const isProductSelected = (id) => {
    return props.cartProducts.some(item => item.id === id);
}
</script>