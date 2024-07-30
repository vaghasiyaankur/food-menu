<template>
    <div class="block-title no-margin">{{ label }}</div>
    <label class="switch general_info_form-input">
        <input
            type="checkbox"
            class="switch-input"
            :name="name"
            :checked="Boolean(changeStatus)"
            @change="emit('update:changeData', $event.target.checked ? 1 : 0)"
        >
        <span class="switch-label" data-on="On" data-off="Off"></span>
        <span class="switch-handle"></span>
    </label>
</template>

<script setup>
const props = defineProps({
    changeStatus: [Boolean, Number],
    label: String,
    name: String,
    value: [String, Number]
});

const emit = defineEmits(['update:changeData']);
</script>