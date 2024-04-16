<template>
    <div class="card-content add-combo">
        <div class="grid grid-cols-5 medium-grid-cols-4 grid-gap-25 grid-gap-20 align-items-center add-list">
            <div class="bg-color-white data-card" v-for="data in dataSet" :key="data.id">
                <div class="combo-image"><img :src="'/storage/'+data.image">
                </div>
                <div class="text-align-center data-card-name">
                    <h4 class="no-margin no-padding">{{data.name}}</h4>
                </div>
                <div class="grid grid-cols-2 grid-gap-5 combo-change">
                    <a class="edit-combo col-100 large-45 medium-50" @click="openEditPopup(data.id)">
                        <Icon name="editIcon" />Edit
                    </a>
                    <a class="delete-combo col-100 large-50 medium-50" @click="openRemovePopup(data.id)">
                        <Icon name="deleteIcon" />Delete
                    </a>
                </div>
                <img class="food-type-icon" :src="foodTypeIcon(data.type)">
            </div>
        </div>
    </div>
</template>

<script setup>
import Icon from "../../../../components/Icon.vue"
import { getFoodTypeIcon } from '../../../../commonFunction.js';


const emit = defineEmits(['open:edit-popup', 'open:remove-popup']);

const props = defineProps({
    dataSet   :   Object
});

const foodTypeIcon = (typeId) => {
    return getFoodTypeIcon(typeId);
}

const openEditPopup = (id) => {
    emit('open:edit-popup', id)
}

const openRemovePopup = (id) => {
    emit('open:remove-popup', id)
}

</script>