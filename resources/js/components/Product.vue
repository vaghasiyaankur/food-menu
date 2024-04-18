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
                    <!-- <div class="product-add-button">
                        <button class="button active button-raised padding text-transform-capitalize"><Icon name="tick" class="margin-right-half" />Added</button>
                    </div> -->
                    <div class="product-add-button">
                        <button class="button button-raised btn-add-product padding text-transform-capitalize">
                            <f7-icon f7="plus" class="font-16 margin-right-half"></f7-icon>
                                Add
                        </button>
                    </div>
                </f7-card-content>
            </f7-card>
        </div>
    </div>
</template>

<script setup>
import { f7Card, f7CardContent,f7, f7Icon } from 'framework7-vue';
import Icon from '../components/Icon.vue'
import { getFoodTypeIcon } from '../commonFunction.js';

const props = defineProps({
    products: Object,
});

const foodTypeIcon = (typeId) => {
    return getFoodTypeIcon(typeId);
}
</script>