<template>
    <div class="card language_setting no-margin">
        <TabHeader title="Language" :toggle="false" /> 
        <div class="card-content">
            <div class="data-table">
                <table style="border-bottom:1px solid #E1E1E1">
                    <TableHeader :items="headerItems" />
                    <tbody>
                        <tr v-for="lang in langs" :key="lang.id">
                            <td><span>{{ lang.id }}.</span></td>
                            <td><a href="javscript:;" class="text-underline text-color-black" @click="editTranslations(lang.id)">Translate</a></td>
                            <td><label :for="'selectedLang_'+lang.id">{{ lang.name }}</label></td>
                            <td>
                                <label class="item-checkbox item-content">
                                    <input type="checkbox" :id="'selectedLang_'+lang.id" name="demo-checkbox" class="select-language" v-model="selected_lang[lang.id]" value="1" @change="changeselectedlanguage($event)"><i class="icon icon-checkbox"></i>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <SaveButton title="Save" :submit-event="changeLangStatus" />
            </div>
        </div>
    </div>
</template>

<script>
    import { f7 } from 'framework7-vue';
    import TableHeader from '../../../components/TableHeader.vue';
    import TabHeader from '../../../components/TabHeader.vue';
    import SaveButton from '../../../components/SaveButton.vue';
    import $ from 'jquery';
    import axios from 'axios';

    export default {
        name : 'Language',
        props : ['page'],
        components : { TableHeader, TabHeader, SaveButton },
        data() {
            return {
                tables: [],
                page_number: 1,
                paginationData: [],
                selected_lang: [],
                langs : [],
                headerItems : [
                    {'name' : 'language', 'field' : 'Number'},
                    {'name' : 'language', 'field' : 'Translate'},
                    {'name' : 'language', 'field' : 'Language'},
                    {'name' : 'language', 'field' : 'Select'},
                ]
            }
        },
        created() {
            this.getLanguage();
        },
        mounted() {
            this.$root.activationMenu('setting', '');
        },
        methods: {
            getLanguage() {
                axios.get('/api/get-all-languages')
                .then((res) => {
                    this.langs = res.data.langs;
                    this.langs.forEach((lang) => {
                        this.selected_lang[lang.id] = lang.status ? true : false;
                    });
                })
            },
            editTranslations(id) {
                this.$emit('languagelisthide',id);
            },
            changeLangStatus() {
                axios.post('/api/update-languages-status', { language: this.selected_lang })
                .then((res) => {
                    // this.$root.successNotification(res.data.success);
                    this.getLanguage();
                })
            },
            changeselectedlanguage(event) {
                var selected_lang = $('.select-language:checked').length;
                if (selected_lang == 0) {
                    event.target.checked = true;
                }
            }
        }
    }
</script>
<style scoped>
/*.submit__button button {
	width: 100%;
	max-width: 160px;
	margin: 0 auto 10px;
	border-radius: 10px;
	background-color: #F33E3E;
}*/
/*.submit__button{
    position: fixed;
    top: 50%;
    width: 100%;
}*/
</style>

