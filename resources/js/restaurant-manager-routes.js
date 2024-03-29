
import LockScreen from "./pages/restaurant-manager/LockScreen.vue";
import Login from "./pages/restaurant-manager/Login.vue";
import Table from "./pages/restaurant-manager/Table.vue";
import FoodCategory from "./pages/restaurant-manager/FoodCategory.vue";
import FoodSubCategory from "./pages/restaurant-manager/FoodSubCategory.vue";
import FoodProduct from "./pages/restaurant-manager/FoodProduct.vue";
import SingleCategoryProducts from "./pages/restaurant-manager/SingleCategoryProducts.vue";
import Setting from "./pages/restaurant-manager/settings/SettingsTab.vue";
import DigitalMenu from "./pages/restaurant-manager/DigitalMenu.vue";
import Reporting from "./pages/restaurant-manager/Reporting.vue";
import Reservation from "./pages/restaurant-manager/Reservation.vue";
import Waiting from "./pages/restaurant-manager/Waiting.vue";
import AllReservation from "./pages/restaurant-manager/AllReservation.vue";
import ReservationView from "./pages/restaurant-manager/ReservationView.vue";
// Pages
export default [
  // Index page

  {
    name : 'LockScreen',
    path: '/lock-screen/',
    component: LockScreen,
  },
  {
    name : 'Login',
    path: '/login/',
    component: Login
  },
  {
    name : 'Table',
    path: '/table/',
    component: Table,
    master(f7) {
      return f7.theme === 'aurora';
    },
  },
  // {
  //   name : 'FoodCategory',
  //   path: '/food-category/',
  //   component: FoodCategory,
  // },
  // {
  //   name : 'FoodSubCategory',
  //   path: '/food-subcategory/',
  //   component: FoodSubCategory,
  // },

  // {
  //   name : 'FoodProduct',
  //   path: '/food-product/',
  //   component: FoodProduct,
  // },

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
