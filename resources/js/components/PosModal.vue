<template>
    <!-- ========= Note POPUP ========= -->
    <NotePopup 
            :note-product-id="noteProductId"
            :note-product-description="noteProductDescription"
            @submit:product-note="submitNote"
    />

    <!-- ========= ADD INGREDIENT/VARIATION POPUP ========= -->
    <AddIngredientVariationPopUp 
        :add-ingredient-list="addIngredientList"
        :add-variation-list="addVariationList"
        @submit:ingredient-variation="submitIngVar"
    />
</template>
<script setup>

import NotePopup from './Popup/NotePopup.vue'
import AddIngredientVariationPopUp from './Popup/AddIngredientVariationPopUp.vue'

const props = defineProps({
    // Note Modal
    noteProductId: Number,
    noteProductDescription: String,

    // Add Ingredient variation
    addIngredientList: {
        type: Array,
        default: () => []
    },
    addVariationList: {
        type: Array,
        default: () => []
    }
    
});

const emit = defineEmits([
                'submit:product-note', 
                'submit:ingredient-variation'
            ]);

const submitNote = (note) => {
    emit('submit:product-note', note);
}

const submitIngVar = () => {    
    emit('submit:ingredient-variation');
}
</script>