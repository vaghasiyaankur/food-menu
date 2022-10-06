
import RegisterRestaurant from "./components/restaurant-manager/Register.vue";
// Pages
export default [
  // Index page
  {
    path: '/',
    component: RegisterRestaurant,
    master(f7) {
      return f7.theme === 'aurora';
    },
  },
  

]
