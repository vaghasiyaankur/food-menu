<template>
    <div class="data-drop-down w-100 col-100">
        <select :name="name" 
            :id="'data-drop-down-'+name" class="col-100"
            @change="updateDropDownValue"
        >
            <option 
            v-for="(opt, index) in options" :key="index"
            :value="opt.id" :selected="value == opt.id"
            >
                <label>{{opt.label}}</label>
            </option>
        </select>
    </div>
</template>

<script setup>
const props = defineProps({
    dataType        : String,
    options         : Object,
    placeholder     : String,
    name            : String,
    value           : [String, Number]
});

const emit = defineEmits(['update:drop-down']);

const updateDropDownValue = (event) => {
    emit('update:drop-down', event.target.value);
};


</script>
