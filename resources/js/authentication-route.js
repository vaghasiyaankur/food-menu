import Login from "./pages/authentication/Login.vue";
import SignUp from "./pages/authentication/SignUp.vue";
import Waiting from './pages/authentication/Waiting.vue';

export default [
    {
        name : 'Login',
        path: '/login/',
        component: Login,
    },
    {
        name : 'SignUp',
        path: '/sign-up/',
        component: SignUp,
    },
    {
        name : 'Waiting',
        path: '/restaurant-request/',
        component: Waiting,
    },
]