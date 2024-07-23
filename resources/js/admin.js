import { createApp } from 'vue';
import Framework7 from 'framework7/lite/bundle';
import Framework7Vue from 'framework7-vue';
import Admin from './Admin.vue';
import Pusher from 'pusher-js';
import Echo from 'laravel-echo';

import 'framework7/css/bundle';
import '.././css/user.css';
import '.././css/admin.css';
import '.././css/orders.css';
import '.././css/feedback.css';
import '.././css/transaction.css';
import '.././css/branch.css';
import '.././css/log-in.css';
import '.././css/menu-management.css';

/* import font awesome icon component */
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { fas } from '@fortawesome/free-solid-svg-icons'

import { faTwitter, faFontAwesome, fab } from '@fortawesome/free-brands-svg-icons'

import { far } from '@fortawesome/free-regular-svg-icons'

library.add(fas, faTwitter, faFontAwesome, far, fab)
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
const app = createApp(Admin);
// app.use(VueApexCharts);
app.component('font-awesome-icon', FontAwesomeIcon)
app.mount('#app');
