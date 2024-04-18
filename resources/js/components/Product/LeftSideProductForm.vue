<template>
    <div class="add-product_form">

        <AddEditForm :form-data-format="productData"/>

        <div class="add-product_size-select" v-if="selectVariations.length">
            <h5 class="no-padding no-margin">Variation</h5>
            <div class="add-product_size-selector-btns display-flex">
                <div v-for="(variation,index) in selectVariations" :key="index">
                    <label for="small" checked>
                        <div>{{ variation.name }}</div>
                        <div>${{ variation.price }}</div>
                    </label>
                </div>
            </div>
        </div>
        <div class="add-product_product_select" v-if="selectIngredients.length">
            <h5 class="no-padding no-margin">Ingredients</h5>
            <div class="add-product_product-select display-flex">
                <div 
                    class="bg-color-white select-product-card selected-card"
                    v-for="(ingredient,index) in selectIngredients" :key="index"
                >
                    <div class="combo-image">
                        <img :src="'/storage/' + ingredient.image">
                    </div>
                    <div class="text-align-center add-combo-product-name">
                        <h4 class="no-margin no-padding">{{ingredient.name}}</h4>
                        <p class="selected-product-price no-margin no-padding">${{ingredient.price}}</p>
                    </div>
                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type1.png">
                </div>
                <!-- <div class="bg-color-white select-product-card selected-card">
                    <div class="combo-image"><img src="\assets\images\seederImages\combo\Coca_Cola.png">
                    </div>
                    <div class="text-align-center add-combo-product-name">
                        <h4 class="no-margin no-padding">Coca-Cola</h4>
                        <p class="selected-product-price no-margin no-padding">$19.00</p>
                    </div>
                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type1.png">
                </div>
                <div class="add-product-card display-flex">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.4 19.708C10.0707 19.708 9.81733 19.6193 9.64 19.442C9.488 19.2647 9.412 19.024 9.412 18.72V11.044H1.888C1.584 11.044 1.34333 10.968 1.166 10.816C0.988667 10.6387 0.9 10.398 0.9 10.094C0.9 9.79 0.988667 9.562 1.166 9.41C1.34333 9.23267 1.584 9.144 1.888 9.144H9.412V1.696C9.412 1.392 9.488 1.15133 9.64 0.974C9.81733 0.796666 10.0707 0.707999 10.4 0.707999C10.7293 0.707999 10.97 0.796666 11.122 0.974C11.2993 1.15133 11.388 1.392 11.388 1.696V9.144H18.912C19.2413 9.144 19.482 9.23267 19.634 9.41C19.8113 9.562 19.9 9.79 19.9 10.094C19.9 10.4233 19.8113 10.664 19.634 10.816C19.482 10.968 19.2413 11.044 18.912 11.044H11.388V18.72C11.388 19.024 11.2993 19.2647 11.122 19.442C10.97 19.6193 10.7293 19.708 10.4 19.708Z"
                            fill="#999999" />
                    </svg>

                </div> -->
            </div>
        </div>
    </div>
</template>

<script setup>

import AddEditForm from './AddEditForm.vue';
import DropDown from '../Form/DropDown.vue';
import Input from '../Form/Input.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';

onMounted(() => {
    getLanguages();
})

const productData = ref([
    {  label: 'Id', multipleLang: false, type: 'hidden', name: 'id', placeHolder: 'Category Id', value: ''},
    {
        label: 'Food Type',
        multipleLang: false,
        type: 'radio',
        name: 'category_type',
        options: [
            { label: 'Veg', value: 1},
            { label: 'Non-veg', value: 2},
            { label: 'Egg Type', value: 3}
        ],
        placeHolder: 'Add Category Type',
        value: 1
    },
    {
        label: 'Status',
        multipleLang: false,
        type: 'radio',
        name: 'status',
        options: [
            { label: 'Active', value: 1},
            { label: 'Deactive', value: 2}
        ],
        placeHolder: 'Category Status',
        value: 1
    }
]);

const getLanguages = () => {
    axios.get('/api/get-languages')
    .then((response) => {
        let optionsData = [];
        
        Object.keys(response.data.langs).forEach(langKey => {
            const lang = response.data.langs[langKey];
            optionsData.push({
                language_id: lang.id,
                language: lang.name,
                value: ''
            });
        });
        
        productData.value.unshift({
            label: 'Name',
            multipleLang: true,
            type: 'text',
            placeHolder: 'Add Product Name',
            value: '',
            options: optionsData
        });
    });
};

const props = defineProps({
    selectIngredients: {
        type: Array,
        default: () => []
    },
    selectVariations: {
        type: Array,
        default: () => []
    },
});
</script>