<template>
    <f7-page>
        <div class="data-list-section">
            <div class="add-product-page display-flex">
                <div class="add-product_details">
                    <div class="add-product_heading">
                        <h4 class="no-margin no-padding">
                            <Icon name="back" />
                            Add Products</h4>
                    </div>
                    <LeftSideProductForm 
                        :select-ingredients="selectIngredients" 
                        :select-variations="selectVariations" 
                    />
                </div>

                <div class="add-product_search-wrapper">
                    <div class="add-product_search">
                        <div class="add-product-search-bar">
                            <RightSideProductForm 
                                :ingredients="ingredients" 
                                :variations="variations"
                                :select-ingredients="selectIngredients"
                                :select-variations="selectVariations"
                                @add:select-ingredient="addIngredient"
                                @remove:select-ingredient="removeIngredient"
                                @open:variation-popup="openVariationPopup"
                                @remove:select-variation="removeVariation"
                                />
                            <div class="added-product-combo-btns display-flex">
                                <div class="clear-all-products-btn">
                                    <a href="#" class="bg-color-white">Clear All</a>
                                </div>
                                <div class="submit-products-btn">
                                    <a href="#" class="text-color-white">Submit Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========= ADD VARIATION PRICE POPUP ========= -->
        <div class="popup variationPricePopup">
            <AddUpdatePopup
                :title="'Select Variation'"
                :form-data-format="variationDataFormat" 
                :data-type="'category'"
                @store:update="storeUpdateData"
                />
        </div>
    </f7-page>
</template>

<script setup>
import {
    f7Page, f7
} from 'framework7-vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';
import Icon from './../../../components/Icon.vue'
import LeftSideProductForm from './../../../components/Product/LeftSideProductForm.vue'
import RightSideProductForm from './../../../components/Product/RightSideProductForm.vue'
import AddUpdatePopup from './common/AddUpdatePopup.vue';

const ingredients = ref([]);
const variations = ref([]);
const selectIngredients = ref([]);
const selectVariations = ref([]);

const variationDataFormat = ref([
    { label: 'Id', multipleLang: false, type: 'hidden', placeHolder: 'Category Id', value: ''},
    { label: 'Price', multipleLang: false, type: 'number', placeHolder: 'Category Price', value: ''}
]);

onMounted(() => {
    getIngredientList();
    getVariationList();
});

const getIngredientList = () => {
    axios.post('/api/get-ingredients')
    .then((response) => {
        ingredients.value = response.data.ingredients;
    });
};

const getVariationList = () => {
    axios.post('/api/get-variations')
    .then((response) => {
        variations.value = response.data.variations;
    });
};

const addIngredient = (id) => {
    const allIngredients = ingredients.value;
    const index = allIngredients.findIndex(item => item.id === id);
    if (index !== -1) {
        selectIngredients.value.push({
            id: allIngredients[index].id,
            image: allIngredients[index].image,
            name: allIngredients[index].name,
            price: allIngredients[index].price,
            type: allIngredients[index].type
        });
    }
}

const removeIngredient = (id) => {
    const allIngredients = selectIngredients.value;
    const index = allIngredients.findIndex(item => item.id === id);
    if (index !== -1) {
        selectIngredients.value.splice(index, 1);
    }
}

const manipulateField = (formData, label, value = null) => {
    const index = formData.findIndex(item => item.label === label);
    if (index !== -1) {        
        formData[index].value = value !== null ? value : formData[index].default;
    }
};

const openVariationPopup = (id) => {
    const allSelectVariations = selectVariations.value;
    const index = allSelectVariations.findIndex(item => item.id === id);
    const formData = variationDataFormat.value;
    manipulateField(formData, 'Id', id);
    if (index !== -1) {
        manipulateField(formData, 'Price', allSelectVariations[index].price);
    }else{
        manipulateField(formData, 'Price', '');
    }
    f7.popup.open(`.variationPricePopup`);
}

const removeVariation = (id) => {
    console.log(id);
    const allVariations = selectVariations.value;
    const index = allVariations.findIndex(item => item.id === id);
    if (index !== -1) {
        selectVariations.value.splice(index, 1);
    }
}

const storeUpdateData = () => {
    const formData = variationDataFormat.value;
    const id = formData.find(item => item.label === 'Id').value;
    const price = formData.find(item => item.label === 'Price').value;


    const allVariations = variations.value;
    const index = allVariations.findIndex(item => item.id === id);
    if (index !== -1) {
        selectVariations.value.push({
            id: id,
            image: allVariations[index].image,
            name: allVariations[index].name,
            price: price,
            status: allVariations[index].status
        });
    }
    f7.popup.close(`.variationPricePopup`);
}

</script>