import Login from "./pages/authentication/Login.vue";
import SignUp from "./pages/authentication/SignUp.vue";

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
]