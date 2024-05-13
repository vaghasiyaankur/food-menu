<template>
    <div class="row table_top_chair">
        <div class="col" v-for="index in chair" :key="index">
            <div class="table_card_img text-align-center">
                <img :src="'/images/table/' + color + '.png'" alt="table" :style="style" />
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    chair : {
        type : Number,
        default : 0
    },
    color : String,
    style : {
        type : String,
        default : ''
    },
});
</script>
