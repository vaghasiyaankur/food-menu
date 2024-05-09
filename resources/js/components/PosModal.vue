<template>
    <!-- ========= Note POPUP ========= -->
    <NotePopup 
            :note-product-id="noteProductId"
            :note-product-description="noteProductDescription"
            @submit:product-note="submitNote"
            :note-product-status="noteProductStatus"
    />

    <!-- ========= ADD INGREDIENT/VARIATION POPUP ========= -->
    <AddIngredientVariationPopUp 
        :add-ingredient-list="addIngredientList"
        :add-variation-list="addVariationList"
        @submit:ingredient-variation="submitIngVar"
    />

    <!-- ========= ADD Number Of Person Add  POPUP ========= -->
    <PersonDetailPopup />
    
    <!-- ========= NUMBER OF PERSON POPUP ========= -->
    <NoOfPersonPopup />

    <!-- ========= ORDER NOTE POPUP ========= -->
    <OrderNotePopup />

    <!-- ========= WAITER POPUP ========= -->
    <WaiterAssignPopup />

    <!-- ========= APPLIED DISCOUNT POPUP ========= -->
    <AppliedDiscountPopup />

    <!-- ========= SETTLE & SAVE POPUP ========= -->
    <SettleSavePopup @open:split-popup="openSplitPopup" @open:upi-popup="openUPIPopup" />

    <!-- ========= SPLIT BILL POPUP ========= -->
    <SplitPaymentPopup />

    <!-- ========= PART PAYMENT POPUP ========= -->
    <UpiPaymentPopup />
    
</template>
<script setup>

import { f7 } from 'framework7-vue';
import NotePopup from './Popup/NotePopup.vue'
import AddIngredientVariationPopUp from './Popup/AddIngredientVariationPopUp.vue'
import PersonDetailPopup from './Popup/PersonDetailPopup.vue'
import NoOfPersonPopup from './Popup/NoOfPersonPopup.vue'
import OrderNotePopup from './Popup/OrderNotePopup.vue'
import WaiterAssignPopup from './Popup/WaiterAssignPopup.vue'
import AppliedDiscountPopup from './Popup/AppliedDiscountPopup.vue'
import SettleSavePopup from './Popup/SettleSavePopup.vue'
import SplitPaymentPopup from './Popup/SplitPaymentPopup.vue'
import UpiPaymentPopup from './Popup/UpiPaymentPopup.vue'

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
    },
    noteProductStatus: String
    
});

const emit = defineEmits([
                'submit:product-note', 
                'submit:ingredient-variation'
            ]);

const submitNote = (note, npStatus) => {
    emit('submit:product-note', note, npStatus);
}

const submitIngVar = () => {    
    emit('submit:ingredient-variation');
}

const openSplitPopup = () => {
    f7.popup.open(".split-payment-popup");
}

const openUPIPopup = () => {
    f7.popup.open(".upi-payment-popup");
}
</script>