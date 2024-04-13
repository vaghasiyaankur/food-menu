<template>
    <div class="delete-data-form">
        <div class="delete-data-warning-sign">
            <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13.5 0C6.05663 0 0 6.05663 0 13.5C0 20.9434 6.05663 27 13.5 27C20.9434 27 27 20.9434 27 13.5C27 6.05663 20.9434 0 13.5 0ZM18.4715 16.8816C18.9102 17.3204 18.9102 18.0327 18.4715 18.4731C18.2519 18.6923 17.9635 18.8023 17.6767 18.8023C17.3896 18.8023 17.1012 18.6923 16.8816 18.4731L13.5 15.0915L10.1184 18.4731C9.89882 18.6923 9.61043 18.8023 9.32327 18.8023C9.03488 18.8023 8.74814 18.6923 8.52855 18.4731C8.08978 18.0343 8.08978 17.322 8.52855 16.8816L11.9085 13.5L8.5269 10.1184C8.08813 9.67964 8.08813 8.96732 8.5269 8.5269C8.96567 8.08649 9.67799 8.08813 10.1184 8.5269L13.5 11.9085L16.8816 8.5269C17.3204 8.08813 18.0327 8.08813 18.4731 8.5269C18.9135 8.96567 18.9119 9.67799 18.4731 10.1184L15.0915 13.5L18.4715 16.8816Z"
                    fill="#F33E3E" />
            </svg>
        </div>
        <h4 class=" no-margin delete-data-warning-text">{{ title }}</h4>
        <div class="display-flex justify-content-center popup_button">
            <button type="button"
                class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
            <button type="button" class="button button-raised button-large popup-ok-button" @click="removeData">Ok</button>
        </div>
    </div>
    <div class="wave-image-content"><img src="/images/flow.png"></div>
</template>

<script setup>

const props = defineProps({
    title   :   String
});

const emit = defineEmits(['remove']);

const removeData = () => {
    emit('remove');
}

</script>