<template>
    <div class="add-product_form">

        <AddEditForm :form-data-format="formDataFormat"/>

        <div class="add-product_size-select" v-if="selectVariations.length">
            <h5 class="no-padding no-margin">Variation</h5>
            <div class="add-product_size-selector-btns display-flex">
                <div class="position-relative" v-for="(variation,index) in selectVariations" :key="index">
                    <div class="pencil-icon">
                        <Icon name="pencil" />
                    </div>
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
            </div>
        </div>
    </div>
</template>

<script setup>
import { f7 } from 'framework7-vue';
import AddEditForm from './AddEditForm.vue';
import DropDown from '../Form/DropDown.vue';
import Input from '../Form/Input.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';
import Icon from '../Icon.vue';

onMounted(() => {
    // getLanguages();
})


const props = defineProps({
    selectIngredients: {
        type: Array,
        default: () => []
    },
    selectVariations: {
        type: Array,
        default: () => []
    },
    formDataFormat: {
        type: Array,
        default: () => []
    }
});
</script>