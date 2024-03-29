<template>
    <div>
        <button
        @click="moveToMethod"
        class="col link button text-color-white padding-horizontal padding-vertical-half bg-pink height-40 text-transform-capitalize"
        >
        <i class="f7-icons font-14 margin-right-half"> arrow_right_arrow_left </i>
        {{ title }}
        </button>
    </div>
</template>

<script setup>
    const props = defineProps({
        title: String,
        moveToMethod: Function,
    });
</script>