<template>
    <input :type="type" :placeholder="placeholder" :class="class" :value="value" @input="updateInputValue"/>
</template>

<script setup>
const props = defineProps({
    type        : String,
    placeholder : String,
    class       : String,
    value       : String
});

const emit = defineEmits(['update:input']);

const updateInputValue = (event) => {
    emit('update:input', event.target.value);
};

</script>
