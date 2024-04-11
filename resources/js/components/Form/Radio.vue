<template>
   <div class="type-radio-btn">
        <span 
            v-for="(opt, index) in options" :key="index" 
            :class="index == 0 ? '' : 'margin-left'"
        >
            <input type="radio" 
                :id="name+'-'+opt.value" 
                :name="name" 
                :value="opt.value" 
                :checked="value == opt.value"
                @change="updateRadioValue"
            >
            <label :for="name+'-'+opt.value">{{opt.label}}</label>
        </span>
    </div>
</template>

<script setup>
const props = defineProps({
    options         : Object,
    name            : String,
    value           : Number
});

const emit = defineEmits(['update:radio']);

const updateRadioValue = (event) => {
    emit('update:radio', event.target.value);
};

</script>
