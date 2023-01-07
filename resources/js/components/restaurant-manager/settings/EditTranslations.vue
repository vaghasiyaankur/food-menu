<template>
    <div class="card edit_tranaslation no-margin">
        <div class="card-header padding">
            <div class="heading translate_left">
                <h3 class="no-margin">
                    <a href="/Language/" class=" text-color-black" @click="$emit('languagelistshow')"><i class="f7-icons font-22 margin-right-half">arrow_left</i></a> 
                    <span class="page_heading">Edit Translations - {{ $root.langs[this.langId - 1].name }}</span>
                </h3>
            </div>
            <div class="translate_right display-flex align-items-center">
                <!-- <div class="item-content item-input">
                    <div class="item-inner">
                        <div class="item-input-wrap searchData row padding-half height_40 search_data_wrap">
                            <i class="f7-icons font-18 search-icon">search</i>
                            <input type="search" name="search" class="search__data" v-model="searchData" @change="getLangTraslation()" placeholder="Search Translation...">
                        </div>
                    </div>
                </div> -->
                <div class="item-content item-input margin-right">
                    <div class="item-inner">
                        <div class="item-input-wrap searchData row padding-half height_40 search_data_wrap">
                            <i class="f7-icons font-18 search-icon">search</i>
                            <input type="search" name="search" class="search__data" v-model="searchData" @input="getLangTraslation()" placeholder="Search Translation...">
                        </div>
                    </div>
                </div>
                <div class="submit__button">
                    <button class=" button button-large button-fill height_40 padding-horizontal" @click="updateTraslation()">Save Change</button>
                </div>
                <!-- <div class="filters_button">
                    <button class="button button-outline height_40"><i class="f7-icons">funnel</i>Filters</button>
                </div> -->
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
                <!-- <div class="pagination__text">
                    <p class="no-margin">Showing 15 of 220 Results</p>
                </div> -->
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

<script>
    import { f7 } from 'framework7-vue';
    import axios from 'axios';
    export default {
        name : 'EditTranslations',
        props: ['langId'],
        components : {
            f7
        },
        data() {
            return {
                translations: [],
                paginationData: [],
                lang_trans: [],
                pagenumber: 1,
                searchData : '',
            }
        },
        created() {
            this.getLangTraslation();
        },
        mounted() {
            this.$root.activationMenu('setting');
        },
        methods: {
            getLangTraslation(pagenumber) {
                if (pagenumber == undefined || pagenumber == 1) {
                    pagenumber = 1
                } else {
                    pagenumber = pagenumber.split('page=')[1];
                }
                var page = '/api/get-lang-translation/' + this.langId + '?page=' + pagenumber + '&q=' + this.searchData;
                axios.get(page)
                .then((res) => {
                    this.translations = res.data.translations.data;
                    this.translations.forEach(trans => {
                        this.lang_trans[trans.id] = trans.content;
                    });
                    this.paginationData = res.data.translations;
                });
            },
            updateTraslation() {
                axios.post('/api/update-lang-translation', { lang_trans: this.lang_trans })
                .then((res) => {
                    this.$root.successnotification(res.data.success);
                    this.getLangTraslation(this.pagenumber)
                });
            }
        }
    }
</script>
<style scoped>
  .height_40{
    height: 40px;
  }
  .width_100{
    width: 100%;
  }
  .edit_tranaslation .filters_button .button{
	border: 1px solid #555555;
	border-radius: 5px;
	font-weight: 500;
	font-size: 14px;
	line-height: 17px;
	color: #555555;
    width: 140px;
}
.submit__button button{
	width: 100%;
	max-width: 160px;
	margin: 0 auto;
	border-radius: 10px;
	background-color: #F33E3E;
    text-transform: capitalize;
}
.pagination_count .pagination_list a {
	color: black;
	float: left;
	padding: 8px 16px;
	text-decoration: none;
	border-radius: 5px;
}
.register-button:hover, .register-button:active, .active {
	background: #F33E3E !important;
	color: #fff !important;
}
.bottom__bar{
    /*position: fixed;
    width: 100%;
    bottom: 0;*/
    border-top: 1px solid #999999;
    background-color: #ffffff;
}
.edit_tranaslation .card-content .edit_translate_table{
    height: calc(100% - 287px);
    overflow: auto;
}
.edit_translate_table .translate__id .item-input-wrap input{
    background: #F0F0F0;
}
.edit_translate_table .translate__label .item-input-wrap input{
    background: #FFFFFF ;
}
.edit_translate_table .item-input-wrap input{
	width: 100%;
	border: 0.5px solid #DCDCDC;
	border-radius: 5px;
    height: 36px;
}

</style>
<style>

label.item-checkbox input[type='checkbox']:checked~.icon-checkbox{
    background-color: #F33E3E !important;
    border-color: #F33E3E !important;
}
</style>

