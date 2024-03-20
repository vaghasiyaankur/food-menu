import Register from "./pages/guest-app/Register.vue";
import Favourite from "./pages/guest-app/Favourite.vue";
import Waiting from "./pages/guest-app/Waiting.vue";
// Pages
export default [
  // Index page
  {
    path: '/',
    component: Register,
    master(f7) {
      return f7.theme === 'aurora';
    },
  },
  // Favourite page
  {
    path: '/favourites/',
    component: Favourite,
  },

  {
    path: '/waiting/',
    component: Waiting,
  },

]
