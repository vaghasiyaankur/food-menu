<template>
    <div class="language_setting no-margin">
        <TabHeader title="Language" :toggle="false" /> 
        <div class="card-content">
            <div class="data-table">
                <table>
                    <TableHeader :items="headerItems" />
                    <tbody>
                        <tr v-for="lang in langs" :key="lang.id">
                            <td><span>{{ lang.id }}.</span></td>
                            <td><a href="javascript:;" class="text-underline text-color-black" @click="emit('change:langTrans', !showLangs, lang.id)">Translate</a></td>
                            <td><label :for="'selectedLang_'+lang.id">{{ lang.name }}</label></td>
                            <td>
                                <label class="item-checkbox item-content">
                                    <input type="checkbox" :id="'selectedLang_'+lang.id" name="demo-checkbox" class="select-language" v-model="selected_lang[lang.id]" value="1" @change="changeSelectedLanguage($event)"><i class="icon icon-checkbox"></i>
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

<script setup>
import { f7 } from 'framework7-vue';
import TableHeader from '../../../components/TableHeader.vue';
import TabHeader from '../../../components/TabHeader.vue';
import SaveButton from '../../../components/SaveButton.vue';
import axios from 'axios';
import { ref } from 'vue';
import { successNotification, errorNotification } from '../../../commonFunction.js';

const props = defineProps({
    showLangs :Boolean
});

const emit = defineEmits(['change:langTrans']);

const headerItems = ref([
                    {'name' : 'language', 'field' : 'Number'},
                    {'name' : 'language', 'field' : 'Translate'},
                    {'name' : 'language', 'field' : 'Language'},
                    {'name' : 'language', 'field' : 'Select'},
                ]);

const langs = ref([]);
const selected_lang = ref([]);

const getLanguage = () => {
    axios.get('/api/get-all-languages')
    .then((res) => {
        langs.value = res.data.langs;
        langs.value.forEach((lang) => {
            selected_lang.value[lang.id] = lang.status ? true : false;
        });
    })
}
getLanguage();

const changeSelectedLanguage = (event) => {
    const allFalse = selected_lang.value.every(item => item === false);
    if (allFalse) {
        event.target.checked = true;
    }
}

const changeLangStatus = () => {
    axios.post('/api/update-languages-status', { language: selected_lang.value })
    .then((res) => {
        successNotification(res.data.success);
        getLanguage();
    })
}
</script>