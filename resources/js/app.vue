<template>
    <f7-app v-bind="f7Params">
        <f7-view
            url="/"
            :main="true"
            class="safe-areas"
            :master-detail-breakpoint="768"
        ></f7-view>
        <div class="main-app-overlay overlay">
            <div class="overlayDoor"></div>
            <div class="overlayContent">
                <div class="inner text-align-center">
                    <img src="/images/loading.gif" alt="Loading.." />
                    <p class="text-align-center font__bold font-22">
                        Loading....
                    </p>
                    <p class="text-align-center font-18">
                        Please wait,it take a few seconds.
                    </p>
                </div>
            </div>
        </div>
    </f7-app>
</template>

<script setup>
import { ref, onMounted, provide } from "vue";
import { f7App, f7Panel, f7View } from "framework7-vue";
import routes from "./routes";
import store from "./store";
import { useCookies } from "vue3-cookies";
import axios from "axios";
import $ from 'jquery';

const showOverlay = ref(true);
const f7Params = {
    id: "io.framework7.testapp",
    theme: "auto",
    routes,
    store,
    popup: { closeOnEscape: true },
    sheet: { closeOnEscape: true },
    popover: { closeOnEscape: true },
    actions: { closeOnEscape: true },
};

const { cookies } = useCookies();

onMounted(() => {
    getLanguage();
    languageTranslation();
    setTimeout(() => {
        showOverlay.value = false;
    }, 2000);
});

const langs = ref([]);
const trans = ref([]);
const selectedLang = ref(0);

function getLanguage() {
    axios.get("/api/get-languages").then((res) => {
        langs.value = res.data.langs;
    });
}

function languageTranslation(langId) {
    axios
        .post("/api/get-language-translation", { lang_id: langId })
        .then((res) => {
            trans.value = res.data.translations;
            selectedLang.value = res.data.lang_id;
        });
}

function addLoader() {
    $(".overlay, body").removeClass("loaded");
    $(".overlay").css({ display: "" });
}

function removeLoader() {
    setTimeout(function () {
        $(".overlay, body").addClass("loaded");
        setTimeout(function () {
            $(".overlay").css({ display: "none" });
        }, 1000);
    }, 2000);
}

provide('langs', langs)
provide('trans', trans)
provide('selectedLang', selectedLang)
provide('languageTranslation', languageTranslation)

</script>
