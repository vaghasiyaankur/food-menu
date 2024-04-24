<template>
<div class="block-title no-margin">{{label}}</div>
    <div class="image-logo">
        <img :src="preview" width="100" height="100" alt="" class="restaurant_logo">
    </div>
    <div class="image-field item-input-wrap">
        <input type="file" :name="name" accept="image/*" :id="name" @change="emit('set:update',name)">
        <label :for="name">
            <div class="image-label">
                <div class="image-label-text">Choose File</div>
            </div>
        </label>
    </div>
</template>
<script setup>
import Icon from '../Icon.vue';
import { ref } from 'vue';

const props = defineProps({
    label : String,
    name  : String,
    preview : String
});

const emit = defineEmits(['set:update']);

const onImageChange = (e) => {
    preview.value = URL.createObjectURL(e.target.files[0]);
}

</script>