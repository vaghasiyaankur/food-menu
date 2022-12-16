<template>
  <f7-app v-bind="f7Params">
    <f7-view url="/" :main="true" class="safe-areas" :master-detail-breakpoint="768"></f7-view>
  </f7-app>
</template>
<script>
import { f7App, f7Panel, f7View } from 'framework7-vue';
import routes from './routes';
import store from './store';
import { useCookies } from "vue3-cookies";
import axios from "axios";

export default {
    components: {
        f7App,
        f7Panel,
        f7View,
    },
    data() {
        // Demo Theme
        let theme = 'auto';
        if (document.location.search.indexOf('theme=') >= 0) {
        theme = document.location.search.split('theme=')[1].split('&')[0];
        }

        return {
            f7Params: {
                id: 'io.framework7.testapp',
                theme,
                routes,
                store,
                popup: {
                    closeOnEscape: true,
                },
                sheet: {
                    closeOnEscape: true,
                },
                popover: {
                    closeOnEscape: true,
                },
                actions: {
                    closeOnEscape: true,
                },
            },
            langs: [],
            trans : [],
        };
    },
    setup() {
        const { cookies } = useCookies();
        return { cookies };
    },
    created() {
        this.getLanguage();
        this.languageTranslation();
    },
    methods: {
        getLanguage() {
            axios.get('/api/get-languages')
            .then((res) => {
                this.langs = res.data.langs;
            })
        },
        languageTranslation(langId) {
            axios.post('/api/get-language-translation', { lang_id: langId })
            .then((res) => {
                this.trans = res.data.translations;
            })
        }

    },
};
</script>
