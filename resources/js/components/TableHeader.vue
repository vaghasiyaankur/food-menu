<template>
   <thead>
        <tr>
            <th 
                v-for="(item, index) in items" :key="index"
                :style="item.width ? { width: item.width } : ''"
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