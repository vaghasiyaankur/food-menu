
import Pos from "./pages/pos/Pos.vue";
import Login from "./pages/restaurant-manager/Login.vue";
import FoodCategory from "./pages/restaurant-manager/FoodCategory.vue";
import FoodSubCategory from "./pages/restaurant-manager/FoodSubCategory.vue";
import FoodProduct from "./pages/restaurant-manager/FoodProduct.vue";
import Setting from "./pages/pos/settings/SettingsTab.vue";

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
    name : 'Setting',
    path: '/settings/',
    component: Setting,
  }

]
