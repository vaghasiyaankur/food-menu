import { createApp } from 'vue';
import Framework7 from 'framework7/lite/bundle';
import Framework7Vue from 'framework7-vue';
import RestaurantManager from './RestaurantManager.vue';
import Pusher from 'pusher-js';
import Echo from 'laravel-echo';

import 'framework7/css/bundle';
// import '.././css/app.css';

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

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
    wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
    encrypted: true,
    enabledTransports: ['ws', 'wss'],
    auth: {
      headers: {
          // I assume you have meta named `csrf-token`.
          'X-CSRF-Token': document.head.querySelector('meta[name="csrf-token" ]')
      }
  }
});


// Init Vue App
const app = createApp(RestaurantManager);
// app.use(VueApexCharts);
app.mount('#app');
