<template>
    <div class="">
        <span 
            v-for="(opt, index) in options" :key="index" 
            class="active_status"
            :class="{'margin-left': index !== 0 }"
        >
            <input type="radio" 
                :id="name+'-'+dataType+'-'+opt.value" 
                :name="name" 
                :value="opt.value" 
                :checked="value == opt.value"
                @change="updateRadioValue"
            >
            <label :for="name+'-'+dataType+'-'+opt.value">{{opt.label}}</label>
        </span>
    </div>
</template>

<script setup>
const props = defineProps({
    dataType    : String,
    options         : Object,
    name            : String,
    value           : [String, Number]
});

const emit = defineEmits(['update:radio']);

const updateRadioValue = (event) => {
    emit('update:radio', event.target.value);
};

</script>
