<template>
<div class="block-title no-margin">{{label}}</div>
    <div class="image-logo">
        <img :src="preview" width="100" height="100" alt="" class="restaurant_logo">
    </div>
    <div class="image-field item-input-wrap">
        <input type="file" :name="name" accept="image/*" :id="name" @change="onImageChange">
        <label :for="name">
            <div class="image-label">
                <div class="image-label-text">Choose File</div>
                <button type="button" class="button image-label-remove" @click="onImageDelete">
                    <Icon name="remove" color="#F33E3E" />
                </button>
            </div>
        </label>
    </div>
</template>
<script setup>
import Icon from '../Icon.vue';
import { ref } from 'vue';

const props = defineProps({
    label : String,
    name  : String
});

const preview = ref("/images/logo.png");

const onImageChange = (e) => {
    preview.value = URL.createObjectURL(e.target.files[0]);
}

const onImageDelete = () => {
    document.getElementById(props.name).value = '';
    preview.value = "/images/logo.png";
}

</script>