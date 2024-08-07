<template>
    <div class="item-inner no-padding">
        <div class="block-title no-margin" v-if="label">{{label}}</div>
        <div :class="{ 'item-input-wrap general_info_form-input w-100' : type != 'hidden' }">
            <input :type="type" :name="name" :placeholder="placeholder" :class="class" :min="min" :max="max" :value="value" @change="emit('set:change', $event.target.value)" @input="updateInputValue"/>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    dataType    : String,
    type        : String,
    placeholder : String,
    class       : String,
    value       : [String, Number],
    label       : String,
    min         : String,
    max         : String,
    name        : String    
});

const emit = defineEmits(['update:input', 'set:change']);

const updateInputValue = (event) => {
    emit('update:input', event.target.value);
};

</script>
