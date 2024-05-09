<template>
    <div class="popup add_ingredient_variation_popup" id="add_ingredient_variation_popup">
        <div class="data-form item_edit-data-form">
            <div class="text-align-center item_edit-popup_title">
                <h2 class="no-margin">New York-Style Pizza Vegetarian</h2>
            </div>
            
            <template v-if="addVariationList.length > 0">
                <div class="item_edit-popup_heading">
                    <h4 class="no-margin">Variations</h4>
                </div>
                <div class="diff_var_btns">
                    <div 
                        v-for="(variation,index) in addVariationList"
                        :key="index"
                        class="variable_button"
                        :class="{ 'selected' : isVariationSelected(variation.id)}"
                    >
                    <!-- selected -->
                        <!-- <i class="icon f7-icons font-16 delete-product-button"
                            @click="addRemoveIngVar(variation.id, 'variation', false)"
                        >minus </i> --> 
                        <button class="small_variable_button"
                            @click="addRemoveIngVar(variation.id, 'variation', true)">
                            <h5 class="no-margin variable_name">{{ variation.name }}</h5>
                            <p class="no-margin variable_price">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }} {{ variation.price ? variation.price.toFixed(2) : '0.00' }}</p>
                        </button>
                    </div>
                </div>
            </template>
            <template v-if="addIngredientList.length > 0">
                <div class="item_edit-popup_addon_heading">
                    <h4 class="no-margin">Ingredients</h4>
                </div>
                <div class="diff_addon_btns">
                    <!-- selected -->
                    <div 
                        v-for="(ingredient,index) in addIngredientList"
                        :key="index"
                        class="addon_button"
                        :class="{ 'selected' : isIngredientSelected(ingredient.id)}"
                    >
                        <i 
                            class="icon f7-icons font-16 delete-product-button"
                            @click="addRemoveIngVar(ingredient.id, 'ingredient', false)"
                        >minus </i>
                        <button class="cheese_addon_button" 
                            @click="addRemoveIngVar(ingredient.id, 'ingredient', true)"
                        >
                            <h5 class="no-margin addon_name">{{ ingredient.name }}</h5>
                            <p class="no-margin addon_price">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }} {{ ingredient.price ? ingredient.price.toFixed(2) : '0.00'}}</p>
                            <img src="/images/veg-icon.png">
                        </button>
                    </div>
                </div>
            </template>
            <hr class="horizontal-divider no-margin">
            <div class="probable_amount">
                <h5 class="no-margin">Extra Amount</h5>
                <h5 class="no-margin">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }} {{ formattedExtraAmount }}</h5>
            </div>
            <hr class="horizontal-divider no-margin">
            <div class="popup_button">
                <div class="item_edit-bill-btn">
                    <div class="popup_cancel_item_edit-btn">
                        <button type="button" class="cancel-item_edit-button popup-close">Cancel</button>
                    </div>
                    <div class="popup_save-item_edit-btn" @click="submitIngredientVariation">
                        <button type="button" class="save-item_edit-btn" >Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>
</template>
<script setup>
import { ref, defineProps, watch, computed, inject }  from 'vue';
const props = defineProps({
    addIngredientList: {
        type: Array,
        default: () => []
    },
    addVariationList: {
        type: Array,
        default: () => []
    }
    
});

const addIngredientList = ref(props.addIngredientList);
const addVariationList = ref(props.addVariationList);
const selectIngredient = inject('selectIngredient');
const selectVariation = inject('selectVariation');
const extraAmount = inject('extraAmount');
const currentCurrencyData = inject('currentCurrencyData');

// Watch for changes in each prop and update the corresponding ref accordingly
watch(() => props.addIngredientList, (newVal) => {
    addIngredientList.value = newVal;
});

watch(() => props.addVariationList, (newVal) => {
    addVariationList.value = newVal;
});

watch(() => props.selectIngredient, (newVal) => {
    selectIngredient.value = newVal;
});

watch(() => props.selectVariation, (newVal) => {
    selectVariation.value = newVal;
});

watch(() => props.extraAmount, (newVal) => {
    extraAmount.value = newVal;
})
const emit = defineEmits([
                'submit:ingredient-variation', 
            ]);

const addRemoveIngVar = (id, type, add) => {    
    if(type == 'variation'){
        if(add){
            selectVariation.value = [];
            if(add){
                const variation = addVariationList.value;
                const index = variation.findIndex(item => item.id === id);
                selectVariation.value.push({
                    id: variation[index].id,
                    image: variation[index].image,
                    name: variation[index].name,
                    price: variation[index].price,
                });
            }
        }
    }else{
        if(add){
            const ingredient = addIngredientList.value;
            const index = ingredient.findIndex(item => item.id === id);

            const ind = selectIngredient.value.findIndex(item => item.id === id);
            if(ind == -1){
                selectIngredient.value.push({
                    id: ingredient[index].id,
                    image: ingredient[index].image,
                    name: ingredient[index].name,
                    price: ingredient[index].price,
                });
            }
        }else{
            const index = selectIngredient.value.findIndex(item => item.id === id);
            if(index !== -1){
                selectIngredient.value.splice(index, 1);
            }
        }
    }
    getExtraAmount();
}

const isVariationSelected = (id) => {
    return selectVariation.value.some(item => item.id === id);
}

const isIngredientSelected = (id) => {
    return selectIngredient.value.some(item => item.id === id);
}

const getExtraAmount = () => {
    let total = 0;
    for (const ing of selectIngredient.value) {
        total += ing.price;
    }
    for (const variation of selectVariation.value) {
        total += variation.price;
    }
    extraAmount.value = total;
}

const formattedExtraAmount = computed(() => extraAmount.value ? extraAmount.value.toFixed(2) : 0.00);

const submitIngredientVariation = () => {
    emit('submit:ingredient-variation');
}
</script>