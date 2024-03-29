<template>
<div class="table_mangment_heading">
    <h3 class="no-margin">
        <span class="page_heading">{{ title }}</span>
    </h3>
</div>
</template>

<script setup>
    import { ref, defineProps } from 'vue';

    const props = defineProps({
        title     :  String,
    });
</script>