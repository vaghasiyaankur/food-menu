<template>
    <thead>
        <tr>
            <th 
                v-for="(item, index) in items" :key="index"
                :style="item.width ? { width: item.width } : ''" :class="item.class"
            >
                {{ item.field }}
            </th>
        </tr>
    </thead>
</template>

<script setup>
    const props = defineProps({
        items   :   Object
    });
</script>