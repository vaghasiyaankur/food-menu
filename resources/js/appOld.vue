<template>
  <f7-app v-bind="f7Params">
    <f7-view url="/" :main="true" class="safe-areas" :master-detail-breakpoint="768"></f7-view>
    <div class="main-app-overlay overlay">
        <div class="overlayDoor"></div>
        <div class="overlayContent">
            <div class="inner text-align-center">
                <img src="/images/loading.gif" alt="Loading..">
                <p class="text-align-center font__bold font-22">Loading....</p>
                <p class="text-align-center font-18">Please wait,it take a few seconds.</p>
            </div>
        </div>
    </div>
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
        f7View
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
            trans: [],
            selected_lang : 0,
        };
    },
    setup() {
        const { cookies } = useCookies();
        return { cookies };
    },
    created() {
        this.getLanguage();
        this.languageTranslation();
        // $(window).bind('load', function () {
        //     $('.overlay, body').addClass('loaded');
        //     setTimeout(function () {
        //         $('.overlay').css({ 'display': 'none' })
        //     }, 1000)
        // });
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
                this.selected_lang = res.data.lang_id;
            })
        },
        addLoader() {
            $('.overlay, body').removeClass('loaded');
            $('.overlay').css({ 'display': '' });
        },
        removeLoader() {
            setTimeout(function () {
                $('.overlay, body').addClass('loaded');
                setTimeout(function () {
                    $('.overlay').css({ 'display': 'none' })
                }, 1000)
            }, 2000);
        },
    },
};
</script>