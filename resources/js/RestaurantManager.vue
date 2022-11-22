<template>
<f7-app v-bind="f7Params">
    <f7-view url="/" :main="true" class="safe-areas" :master-detail-breakpoint="768"></f7-view>
</f7-app>
</template>

<script>
import { f7App, f7Panel, f7View, f7,f7Page,f7Navbar } from 'framework7-vue';
import routes from './restaurant-manager-routes';
import store from './store';
import $ from 'jquery';

export default {
    components: {
        f7App,
        f7Panel,
        f7View,
        f7,
        f7Page,
        f7Navbar
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
        }
    },
    methods: {
        closeReservation() {
            $('.closeReservation').css('background-color', '#F33E3E');
            f7.dialog.confirm('Are you sure close the reservation?', () => {
                $('.closeReservation').css('background-color', '');
            });
            setTimeout(() => {
                $('.dialog-button').eq(1).css({ 'background-color': '#F33E3E', 'color': '#fff' });
                $('.dialog-title').html("<img src='/images/close.png'>");
                $('.dialog-buttons').after("<div><img src='/images/flow.png' style='width:100%'></div>");
                $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
                $('.dialog-button').eq(1).removeClass('text-color-black');
            }, 200);
        }
    },
    computed: {
        manager() {
            console.log(f7);
            // return this.$route.path === '/'
        },
    },
};
</script>
