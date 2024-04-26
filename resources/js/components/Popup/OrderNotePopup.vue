<template>
    <div class="popup order_note" id="order_note">
        <div class="data-form add_table_view-data-form">
            <div class="text-align-center table_view-popup_title">
                Notes</div>
            <hr class="popup_title_divider">
            <label class="notes-text">Comment</label>
            <div class="add_notes-text text-align-left">
                <textarea name="add_notes-comment" id="add_notes-comment" cols="34" rows="3" v-model="orderNote"></textarea>
            </div>
            <div class="display-flex justify-content-center popup_button">
                <button type="button"
                    class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                <button type="button" class="button button-raised button-large popup-ok-button" @click="setOrderNote()">Ok</button>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>
</template>
<script setup>

import { f7 } from 'framework7-vue';
import { inject }  from 'vue';

const orderNote = inject('orderNote');

const setOrderNote = () => {
    f7.popup.close(`.order_note`);
}
</script>