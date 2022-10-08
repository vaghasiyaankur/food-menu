
import Table from "./components/restaurant-manager/Table.vue";
import FoodCategory from "./components/restaurant-manager/FoodCategory.vue";
// Pages
export default [
  // Index page
  {
    path: '/',
    component: Table,
    master(f7) {
      return f7.theme === 'aurora';
    },
  },
  {
    path: '/food-category/',
    component: FoodCategory,
  },


]
