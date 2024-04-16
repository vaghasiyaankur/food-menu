<template>
    <div class="">
        <span 
            v-for="(opt, index) in options" :key="index" 
            class="active_status"
            :class="{'margin-left': index !== 0 }"
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
