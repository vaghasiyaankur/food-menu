<template>
    
    <div class="back_link" v-if="backTable == 'back'">
        <a class="link back text-color-black" href="javascript:;" @click="tablehide"><i class="icon icon-back"> </i>
            <span class="margin-left-half">Back to List</span>
        </a>
    </div>

    <div class="card-header margin-vertical-half" v-else>
        <div class="table_mangment_heading">
            <h3 class="no-margin">
                <span class="page_heading">
                    {{ title }}
                </span>
            </h3>
        </div>
        <div class="add_table_button" v-if="toggle">
            <button 
                class="button" 
                @click="tablehide(tableId, pageNumber)"
            >
                <i class="f7-icons margin-right-half">plus_square</i> Add Table
            </button>
        </div>
    </div>
</template>

<script setup>
    import { ref, defineProps } from 'vue';

    const props = defineProps({
        title      :  String,
        tablehide  :  [Function, String, Boolean],
        tableId    :  [String, Number],
        pageNumber :  Number,
        toggle     :  Boolean,
        backTable  :  String
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