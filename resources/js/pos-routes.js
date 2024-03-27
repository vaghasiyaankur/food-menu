
import Pos from "./pages/pos/Pos.vue";
import Login from "./pages/restaurant-manager/Login.vue";
// Pages
export default [
  // Index page

  {
    name : 'POS',
    path: '/',
    component: Pos,
  },
  {
    name : 'Login',
    path: '/login/',
    component: Login
  },

]
