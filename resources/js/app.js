/* eslint-disable import/no-unresolved */
/* eslint-disable import/no-extraneous-dependencies */
import { createApp } from 'vue';
import Framework7 from 'framework7/lite/bundle';
import Framework7Vue from 'framework7-vue';
import App from './app.vue';

import 'framework7/css/bundle';

import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";

// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyBJKAe1KTNC3dK65FfK-XDZ609tCYVjAYY",
    authDomain: "ewaiting-notification.firebaseapp.com",
    projectId: "ewaiting-notification",
    storageBucket: "ewaiting-notification.appspot.com",
    messagingSenderId: "229500280113",
    appId: "1:229500280113:web:85a419c0bad44fc5ac2410",
    measurementId: "G-LBC3XY97T0"
};

const firebase = initializeApp(firebaseConfig);
const analytics = getAnalytics(firebase);

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

// Init Vue App
const app = createApp(App);
app.mount('#app');
