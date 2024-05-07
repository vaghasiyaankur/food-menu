<template>
    <div class="block-title no-margin">{{label}}</div>
    <label class="date-time general_info_form-input">
        <input type="datetime-local" :name="name" :placeholder="placeholder" :class="classNames" :value="value" @input="updateDateTimeValue"/>
    </label>
</template>

<script setup>
import {defineEmits, defineProps} from 'vue';

const props = defineProps({
    placeholder : String,
    classNames  : String,
    value       : [ String, Number ],
    label       : String,
    name        : String,
    dataType    : String 
});

const emit = defineEmits(['update:date-time']);

const updateDateTimeValue = (event) => {
    emit('update:date-time', event.target.value);
};
</script>