
import Table from "./components/restaurant-manager/Table.vue";
import FoodCategory from "./components/restaurant-manager/FoodCategory.vue";
import FoodSubCategory from "./components/restaurant-manager/FoodSubCategory.vue";
import FoodProduct from "./components/restaurant-manager/FoodProduct.vue";
import Setting from "./components/restaurant-manager/settings/SettingsTab.vue";
import DigitalMenu from "./components/restaurant-manager/DigitalMenu.vue";
import Reporting from "./components/restaurant-manager/Reporting.vue";
import Reservation from "./components/restaurant-manager/Reservation.vue";
import Waiting from "./components/restaurant-manager/Waiting.vue";
// Pages
export default [
  // Index page
  {
    name : 'Table',
    path: '/',
    component: Table,
    master(f7) {
      return f7.theme === 'aurora';
    },
  },
  {
    name : 'FoodCategory',
    path: '/food-category/',
    component: FoodCategory,
  },
  {
    name : 'FoodSubCategory',
    path: '/food-subcategory/',
    component: FoodSubCategory,
  },

  {
    name : 'FoodProduct',
    path: '/food-product/',
    component: FoodProduct,
  },

  {
    name : 'Setting',
    path: '/settings/',
    component: Setting,
  },

  {
    name : 'DigitalMenu',
    path: '/digital-menu/',
    component: DigitalMenu,
  },
  {
    name : 'Reporting',
    path: '/reporting/',
    component: Reporting,
  },
  {
    name : 'Reservation',
    path: '/reservation/',
    component: Reservation,
  },
  {
    name : 'Waiting',
    path: '/waiting/',
    component: Waiting,
  },

]
