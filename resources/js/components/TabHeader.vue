<template>
    <!-- <div class="card-header">
        <div class="table_mangment_heading">
            <h3 class="no-margin">
                <span class="page_heading">
                    {{ title }}
                </span>
            </h3>
        </div>
    </div> -->
</template>

<script setup>
    import { ref } from 'vue';

    const props = defineProps({
        title      :  String,
    });
</script>

<style scoped>
.add_table_button button{
    background-color: #38373D;
    box-shadow: 0px 2px 4px rgba(172, 172, 172, 0.45);
    border-radius: 7px;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #FFFFFF;
    padding: 20px 36px !important;
}
</style>