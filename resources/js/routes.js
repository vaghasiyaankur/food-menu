import Register from "./components/guest-app/Register.vue";
import Favourite from "./components/guest-app/Favourite.vue";
import Waiting from "./components/guest-app/Waiting.vue";
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
