import Pos from "./pages/pos/Pos.vue";
import PosNew from "./pages/pos/PosNew.vue";
import Login from "./pages/restaurant-manager/Login.vue";
import FoodCategory from "./pages/pos/menu-management/FoodCategory.vue";
import FoodSubCategory from "./pages/pos/menu-management/FoodSubCategory.vue";
import FoodProduct from "./pages/pos/menu-management/FoodProduct.vue";
import FoodCombo from "./pages/pos/menu-management/FoodCombo.vue";
import AddEditCombo from "./pages/pos/menu-management/AddEditCombo.vue";
import AddEditProduct from "./pages/pos/menu-management/AddEditProduct.vue";
import DigitalMenu from "./pages/pos/menu-management/DigitalMenu.vue";
import FoodIngredient from "./pages/pos/menu-management/FoodIngredient.vue";
import FoodVariation from "./pages/pos/menu-management/FoodVariation.vue";
import Setting from "./pages/pos/SettingsTab.vue";
import NewSetting from "./pages/pos/NewSettingsTab.vue";
import TableView from "./pages/restaurant-manager/table-view.vue"
import KotView from "./pages/restaurant-manager/KOT-view.vue"


export default [
  {
    name : 'POS',
    path: '/',
    component: Pos,
  },
  {
    name : 'PosNew',
    path: '/pos/:id',
    component: PosNew,
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
    component: AddEditCombo,
  },
  {
    name : 'EditCombo',
    path: '/edit-combo/:id',
    component: AddEditCombo,
  },
  {
    name : 'AddProduct',
    path: '/add-product/',
    component: AddEditProduct,
  },
  {
    name : 'EditProduct',
    path: '/edit-product/:id',
    component: AddEditProduct,
  },
  {
    name : 'DigitalMenu',
    path: '/digital-menu/',
    component: DigitalMenu,
  },
  {
    name : 'FoodIngredient',
    path: '/food-ingredient/',
    component: FoodIngredient,
  },
  {
    name : 'FoodVariation',
    path: '/food-variation/',
    component: FoodVariation,
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
  {
    name : 'KotView',
    path: '/KOT-view/',
    component: KotView,
  },

]
