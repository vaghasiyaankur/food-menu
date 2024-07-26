import { createApp } from 'vue';
import Framework7 from 'framework7/lite/bundle';
import Framework7Vue from 'framework7-vue';
import Authentication from './Authentication.vue';
import Pusher from 'pusher-js';
import Echo from 'laravel-echo';

import 'framework7/css/bundle';

// Demo
/* eslint-disable */
if (window.parent && window.parent !== window) {
    const html = document.documentElement;
    if (html) {
        html.style.setProperty('--f7-safe-area-top', '44px');
        html.style.setProperty('--f7-safe-area-bottom', '34px');
    }
}
/* eslint-enable */

Framework7.use(Framework7Vue);

/* eslint-enable */

// Init Vue App
const app = createApp(Authentication);
// app.use(VueApexCharts);
app.mount('#app');
