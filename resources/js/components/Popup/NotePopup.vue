<template>
     <div id="note_popup" class="popup notePopup" style="position: fixed; display: block; border-radius: 15px;">
        <div class="text-align-center padding popup_title">Notes</div>
        <div class="padding-horizontal">
            <div class="popup-content padding-horizontal padding-top">
                <label class="add_minutes_text">Special Notes</label>
                <div class="display-flex align-items-center margin-top-half">
                    <input type="text" class="w-100" id="product-note" :value="noteProductDescription"
                        placeholder="Add Note...">
                </div>
                <div class="margin-top no-margin-bottom display-flex justify-content-center padding-top popup_button">
                    <button type="button"
                        class="button button-raised text-color-black bg-color-white button-large popup-close margin-right popup-button">Cancel</button>
                    <button type="button" class="button button-raised button-large popup-button active"
                        @click="submitNote">Save</button>
                </div>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>
</template>
<script setup>
import $ from 'jquery';

const props = defineProps({
    // Note Modal
    noteProductId: Number,
    noteProductDescription: String,
    
});

const emit = defineEmits([
                'submit:product-note', 
            ]);

const submitNote = () => {
    const note = $("#product-note").val();
    emit('submit:product-note', note);
}
</script>