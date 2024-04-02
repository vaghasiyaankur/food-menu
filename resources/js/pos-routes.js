import Pos from "./pages/pos/Pos.vue";
import Login from "./pages/restaurant-manager/Login.vue";
import FoodCategory from "./pages/pos/menu-management/FoodCategory.vue";
import FoodSubCategory from "./pages/pos/menu-management/FoodSubCategory.vue";
import FoodProduct from "./pages/pos/menu-management/FoodProduct.vue";
import DigitalMenu from "./pages/pos/menu-management/DigitalMenu.vue";
import Setting from "./pages/pos/SettingsTab.vue";

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
    name : 'DigitalMenu',
    path: '/digital-menu/',
    component: DigitalMenu,
  },
  {
    name : 'Setting',
    path: '/settings/',
    component: Setting,
  }

]
