import './bootstrap';

import {createApp} from 'vue'
// import Route from './routes/routes'
import App from './components/App.vue'

// Import F7 Bundle
import Framework7 from 'framework7/lite-bundle'
// import FrameworkCss from 'framework7/css'





// Import F7-Vue Plugin Bundle (with all F7 components registered)
import Framework7Vue, { registerComponents } from 'framework7-vue/bundle'

// Init F7-Vue Plugin
Framework7.use([Framework7Vue]);



const app = createApp({
    data() {
        return {
            msg: 'Welcome'
        }
    }
});

app.component('App',App);
// Register all Framework7 Vue components
registerComponents(app);
app.mount("#app");