<template>
    <div class="block-title no-margin">{{label}}</div>
    <label class="switch general_info_form-input">
        <input type="checkbox" class="switch-input" :name="name" @change="emit('update:changeData',!highlight_on_off)" :checked="highlight_on_off">
        <span class="switch-label" data-on="On" data-off="Off"></span>
        <span class="switch-handle"></span>
    </label>
</template>

<script setup>
const props = defineProps({
                highlight_on_off : Boolean,
                label : String,
                name : String
            });

const emit = defineEmits(['update:changeData'])
</script>