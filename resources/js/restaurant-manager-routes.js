
import Table from "./components/restaurant-manager/Table.vue";
import FoodCategory from "./components/restaurant-manager/FoodCategory.vue";
import FoodSubCategory from "./components/restaurant-manager/FoodSubCategory.vue";
import FoodProduct from "./components/restaurant-manager/FoodProduct.vue";
import Setting from "./components/restaurant-manager/settings/SettingsTab.vue";
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
  {
    path: '/food-subcategory/',
    component: FoodSubCategory,
  },

  {
    path: '/food-product/',
    component: FoodProduct,
  },

  {
    path: '/settings/',
    component: Setting,
  },

]
