
import Table from "./components/restaurant-manager/Table.vue";
import FoodCategory from "./components/restaurant-manager/FoodCategory.vue";
import FoodSubCategory from "./components/restaurant-manager/FoodSubCategory.vue";
import FoodProduct from "./components/restaurant-manager/FoodProduct.vue";
import SingleCategoryProducts from "./components/restaurant-manager/SingleCategoryProducts.vue";
import Setting from "./components/restaurant-manager/settings/SettingsTab.vue";
import DigitalMenu from "./components/restaurant-manager/DigitalMenu.vue";
import Reporting from "./components/restaurant-manager/Reporting.vue";
import Reservation from "./components/restaurant-manager/Reservation.vue";
import Waiting from "./components/restaurant-manager/Waiting.vue";
import AllReservation from "./components/restaurant-manager/AllReservation.vue";
import ReservationView from "./components/restaurant-manager/ReservationView.vue";
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
    name : 'SingleCategoryProducts',
    path: '/single-category-products/:id',
    component: SingleCategoryProducts,
    props: true
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
    name : 'AllReservation',
    path: '/all-reservation/',
    component: AllReservation,
  },
  {
    name : 'ReservationView',
    path: '/reservation-view/:id',
    component: ReservationView,
    props: true
  },
  {
    name : 'Waiting',
    path: '/waiting/',
    component: Waiting,
  },

]
