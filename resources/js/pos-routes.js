import Pos from "./pages/pos/Pos.vue";
import Login from "./pages/restaurant-manager/Login.vue";
import FoodCategory from "./pages/pos/menu-management/FoodCategory.vue";
import FoodSubCategory from "./pages/pos/menu-management/FoodSubCategory.vue";
import FoodProduct from "./pages/pos/menu-management/FoodProduct.vue";
import FoodCombo from "./pages/pos/menu-management/FoodCombo.vue";
import AddCombo from "./pages/pos/menu-management/AddCombo.vue";
import AddProduct from "./pages/pos/menu-management/AddProduct.vue";
import DigitalMenu from "./pages/pos/menu-management/DigitalMenu.vue";
import FoodIngradient from "./pages/pos/menu-management/FoodIngradient.vue";
import Setting from "./pages/pos/SettingsTab.vue";
import NewSetting from "./pages/pos/NewSettingsTab.vue";
import TableView from "./pages/restaurant-manager/table-view.vue"

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
    name : 'FoodCombo',
    path: '/food-combo/',
    component: FoodCombo,
  },
  {
    name : 'AddCombo',
    path: '/add-combo/',
    component: AddCombo,
  },
  {
    name : 'AddProduct',
    path: '/add-product/',
    component: AddProduct,
  },
  {
    name : 'DigitalMenu',
    path: '/digital-menu/',
    component: DigitalMenu,
  },
  {
    name : 'FoodIngradient',
    path: '/food-ingradient/',
    component: FoodIngradient,
  },
  {
    name : 'Setting',
    path: '/settings/',
    component: Setting,
  },
  {
    name : 'NewSetting',
    path: '/new-settings/',
    component: NewSetting,
  },  
  {
    name : 'TableView',
    path: '/table-view/',
    component: TableView,
  },

]
