<template>
    <input type="file" class="data-add-image-file" name="image" accept="image/*"  id="image" @change="addimageChange">
    <label class="category-image text-align-center" for="image">
        {{ preview }}
        {{ value }}
        <div class="data-add-image" v-if="preview">
            <div class="data-add-image padding-top padding-bottom">
                <img :src="preview" :alt="alt" width="100" height="100"/>          
            </div>
        </div>
        <div v-else>
            <div class="data-add-image padding-top">
                <img src="/images/add-image.png" />          
            </div>
            <div class="data-add-image-text padding-bottom" for="image">
                <span class="add-image-text">Select Image</span>
            </div>
        </div>
    </label>
</template>

<script setup>
    const props = defineProps({
        alt     : String,
        value   : Object,
        preview   : String,
    });

    const emit = defineEmits(['update:image']);

    const addimageChange = (event) => {
        const ImageInput = event.target.files[0];
        const ImageData = URL.createObjectURL(ImageInput);
        console.log(props.value);
        props.value.value = ImageInput;
        props.preview.value = ImageData;
        emit('update:image', {ImageData, ImageInput});
    }
</script>