<template>
<div class="card_header">
    <div class="row padding-left padding-right padding-top-half align-items-center">
        <div class="col-100 large-30 medium-20">
            <h3>
                <span class="page_heading"> {{ title }}</span>
            </h3>
        </div>
        <div class="col-100 large-70 medium-80">
            <div class="row align-items-center">
                <div class="col">
                    <div class="item-content item-input">
                        <div class="item-inner">
                            <div class="col-100 large-60 medium-65 w-100">
                                <form class="searchbar combo-search-bar">
                                    <input type="search" placeholder="Search" class="height_40" @input="handleSearch">
                                    <i class="searchbar-icon"></i>
                                    <span class="input-clear-button"></span>
                                    <span class="searchbar-disable-button">Cancel</span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col" 
                    v-for="(dd,index) in dropDown" :key="index"
                >
                        <DropDown 
                            :data-type="'drop-down-' + dd.label"
                            :options="dd.data" 
                            :value="dd.value"
                            :placeholder="dd.label"
                            @update:drop-down="saveValue(index, $event)" 
                        />
                </div>
                <div class="col">
                    <button class="button button-raised bg-dark text-color-white padding height_40 active" @click="handleButtonClick">
                        <i class="f7-icons font-22 margin-right-half">plus_square</i>
                            Add {{ title }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script setup>

import DropDown from './../../../components/Form/DropDown.vue'

const props = defineProps({
    addButtonTitle      :  String,
    title               :  String,
    dropDown: {
        type: Array,
        default: () => []
    },
});

const emit = defineEmits(['update:search', 'add:popup', 'filter:data']);

const debounce = (func, delay) => {
    let timeoutId;
    return function (...args) {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            func.apply(this, args);
        }, delay);
    };
}

const handleSearch = debounce((event) => {
    emit('update:search', event.target.value);
}, 300);

const handleButtonClick = () => {
    emit('add:popup');
};

const saveValue = (index, value) => {
    props.dropDown[index].value = value;
    emit('filter:data', props.dropDown[index].label)
};
</script>
