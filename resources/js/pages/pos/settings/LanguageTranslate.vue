<template>
    <div class="card edit_tranaslation no-margin">
        <div class="card-header padding row">
            <div class="heading translate_left col-40">
                <h3 class="no-margin">
                    <a href="/Language/" class=" text-color-black" @click="emit('change:langTrans', true,0)"><i class="f7-icons font-22 margin-right-half">arrow_left</i></a> 
                    <span class="page_heading">Edit Translations</span>
                </h3>
            </div>
            <div class="translate_right display-flex align-items-center row col-60">
                <div class="item-content item-input col-50">
                    <div class="item-inner">
                        <div class="item-input-wrap searchData padding-half height_40 search_data_wrap display-flex">
                            <i class="f7-icons font-18 search-icon">search</i>
                            <input type="search" name="search" class="search__data w-100" v-model="searchData" @input="getLangTraslation()" placeholder="Search...">
                        </div>
                    </div>
                </div>
                <div class="submit__button col-50">
                    <button class="button button-large button-fill height_40 padding-horizontal bg-pink margin-left-half" @click="updateTraslation()">Save Change</button>
                </div>
            </div>
        </div>
        <div class="card-content">
            <div class="edit_translate_table">
                <div class="data-table">
                    <table style="border-bottom:1px solid #E1E1E1">
                        <thead>
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 45%;"></th>
                                <th style="width: 50%;">Label</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="translations?.length > 0">
                                <tr v-for="(trans,index) in translations" :key="trans.id">
                                    <td>{{ (paginationData.per_page * (pageCount - 1)) + (index + 1) }}.</td>
                                    <td>
                                        <div class="translate__id display-flex align-items-center">
                                            <div class="item-input-wrap margin-bottom-half margin-top-half w-100">
                                                <input type="text" name="name" :value="trans.title" readonly>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="translate__label">
                                            <div class="item-input-wrap margin-bottom-half margin-top-half w-100 margin-right">
                                                <input type="text" name="translation" v-model="lang_trans[trans.id]">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                            <template v-else>
                                <tr>
                                    <td class="text-align-center" colspan="3">No Translation Found !!</td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="bottom__bar">           
            <div class="pagination_count padding display-flex justify-content-end align-items-center">
                <Pagination :function-name="getLangTraslation" :data="paginationData" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { f7 } from 'framework7-vue';
import axios from 'axios';
import { ref } from "vue";
import { successNotification, errorNotification } from '../../../commonFunction.js';
import Pagination from '../../../components/Pagination.vue';

const props = defineProps({
    langId : Number
});

const emit = defineEmits(['change:langTrans']);

const searchData = ref('');
const translations = ref([]);
const paginationData = ref([]);
const lang_trans = ref([]);
const pageNumber = ref(1);
const pageCount = ref(1);

const getLangTraslation = (pageNum) => {
    if (pageNum == undefined || pageNum == 1) {
        pageNum = 1
    } else if (pageNum.includes('page')) {        
            pageNum = pageNum.split('page=')[1];
    }
    pageNumber.value = pageNum;
    pageCount.value = pageNum;
    var page = '/api/get-lang-translation/' + props.langId + '?page=' + pageNum + '&q=' + searchData.value;
    axios.get(page)
    .then((res) => {
        translations.value = res.data.translations.data;
        translations.value.forEach(trans => {
            lang_trans.value[trans.id] = trans.content;
        });
        paginationData.value = res.data.translations;
    });
}

const updateTraslation = () => {
    axios.post('/api/update-lang-translation', { lang_trans: lang_trans.value })
    .then((res) => {
        successNotification(res.data.success);
        getLangTraslation(pageNumber.value)
    });
}

getLangTraslation();
</script>