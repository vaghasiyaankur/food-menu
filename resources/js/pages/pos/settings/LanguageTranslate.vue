<template>
    <div class="card edit_tranaslation no-margin">
        <div class="card-header padding">
            <div class="heading translate_left">
                <h3 class="no-margin">
                    <a href="/Language/" class=" text-color-black" @click="$emit('languagelistshow')"><i class="f7-icons font-22 margin-right-half">arrow_left</i></a> 
                    <span class="page_heading">Edit Translations -</span>
                </h3>
            </div>
            <div class="translate_right display-flex align-items-center">
                <div class="item-content item-input margin-right">
                    <div class="item-inner">
                        <div class="item-input-wrap searchData row padding-half height_40 search_data_wrap">
                            <i class="f7-icons font-18 search-icon">search</i>
                            <input type="search" name="search" class="search__data" v-model="searchData" @input="getLangTraslation()" placeholder="Search Translation...">
                        </div>
                    </div>
                </div>
                <div class="submit__button">
                    <button class="button button-large button-fill height_40 padding-horizontal bg-pink" @click="updateTraslation()">Save Change</button>
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
                            <tr v-for="(trans,index) in translations" :key="trans.id">
                                <td>{{ index + 1 }}.</td>
                                <td>
                                    <div class="translate__id display-flex align-items-center">
                                        <div class="item-input-wrap margin-bottom-half margin-top-half width_100">
                                            <input type="text" name="name" class="padding" :value="trans.title" readonly>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="translate__label">
                                        <div class="item-input-wrap margin-bottom-half margin-top-half width_100 margin-right">
                                            <input type="text" name="translation" v-model="lang_trans[trans.id]" class="padding">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="bottom__bar">           
            <div class="pagination_count padding display-flex justify-content-end align-items-center">
                <div class="pagination_list display-flex">
                    <div v-for="(link,index) in paginationData.links" :key="link">
                        <a href="javascript:;" v-if="index == 0" @click="link.url != null ? getLangTraslation(link.url) : 'javascript:;'"
                            class="link" :class="{ 'disabled': link.url == null}"><i class="icon-prev"></i></a>
                        <a href="javascript:;" v-if="paginationData.links.length - 1 != index && index != 0"
                            @click="link.url != null ? getLangTraslation(link.url) : 'javascript:;'"
                            :class="{ 'disabled': link.url == null, 'active': paginationData.current_page == index}">{{ index }}</a>
                        <a href="javascript:;" v-if="paginationData.links.length - 1 == index"
                            @click="link.url != null ? getLangTraslation(link.url) : 'javascript:;'" class="link"
                            :class="{ 'disabled': link.url == null}"><i class="icon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { f7 } from 'framework7-vue';
import axios from 'axios';
import { ref } from "vue";

const props = defineProps({
    langId : Number
});

const pageNumber = ref(1);
const searchData = ref('');
const translations = ref([]);
const paginationData = ref([]);
const lang_trans = ref([]);

const getLangTraslation = (pageNumber) => {
    if (pageNumber == undefined || pageNumber == 1) {
        pageNumber = 1
    } else {
        pageNumber = pageNumber.split('page=')[1];
    }
    var page = '/api/get-lang-translation/' + props.langId + '?page=' + pageNumber + '&q=' + searchData.value;
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
        getLangTraslation(this.pageNumber)
    });
}

getLangTraslation();
</script>