<template>
    <div class="table_floor_swiper">
        <div class="row">
            <div class="col-100">
                <div data-pagination='{"el":".swiper-pagination"}' data-navigation="{'el':'.swiper-navigation'}" data-space-between="10" data-slides-per-view="4" class="swiper swiper-init demo-swiper margin-top margin-bottom floor_swiper_inner swiper-navigation" >
                    <div class="swiper-wrapper padding-left-half">
                        <div class="swiper-slide" :class="{ active: floor.id == activeFloorId, }" v-for="floor in floorList" :key="floor.id" @click="emit('get:floor-value',floor.id);" >
                        <span v-if="floor.time_left">
                            <img src="/images/floor_blinking.gif" class="floor_blinking_img" />
                        </span>

                        <p class="no-margin text-align-center margin-vertical-half swiper_text display-flex" >
                            {{ floor.name }}
                            <span class="room_available color-blue">{{ floor.orders_count }}</span>
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

const props = defineProps({
    floorList : Array,
    activeFloorId : Number
});

const emit = defineEmits(['get:floor-value']);

</script>