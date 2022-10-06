import Register from "./components/guest-app/Register.vue";
import Favourite from "./components/guest-app/Favourite.vue";

import RegisterRestaurant from "./components/restaurant-manager/Register.vue";
// Pages
export default [
    {
        name : 'RestaurantManager',
        path: '/restaurant-manager',
        component: RegisterRestaurant,
        routes: [

        ],
      },
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

]
