import dashboard from "./pages/admin/DashBoard.vue";
import orders from "./pages/admin/orders.vue";
import ordersdetail from "./pages/admin/orders_detail.vue";
import feedback from "./pages/admin/feedback.vue";
import transaction from "./pages/admin/transaction.vue";
import user from "./pages/admin/user.vue";
import branchList from "./pages/admin/branch-list.vue";
import branch from "./pages/admin/branch.vue";
import signin from "./pages/admin/sign-in.vue";
import signup from "./pages/admin/sign-up.vue";
import forgotpassword from "./pages/admin/forgotPassword.vue";
import resetpassword from "./pages/admin/resetPassword.vue";
import verifyemail from "./pages/admin/verifyEmail.vue";
import branchlistnew from "./pages/admin/branchlistnew.vue";
import FoodCategory from "./pages/pos/menu-management/FoodCategory.vue";
import FoodSubCategory from "./pages/pos/menu-management/FoodSubCategory.vue";
import FoodProduct from "./pages/pos/menu-management/FoodProduct.vue";
import FoodCombo from "./pages/pos/menu-management/FoodCombo.vue";
import AddEditCombo from "./pages/pos/menu-management/AddEditCombo.vue";
import AddEditProduct from "./pages/pos/menu-management/AddEditProduct.vue";
import DigitalMenu from "./pages/pos/menu-management/DigitalMenu.vue";
import FoodIngredient from "./pages/pos/menu-management/FoodIngredient.vue";
import FoodVariation from "./pages/pos/menu-management/FoodVariation.vue";
import LockScreen from './pages/restaurant-manager/LockScreen.vue';
import NewSetting from "./pages/pos/NewSettingsTab.vue";

export default [
  {
    name : 'LockScreen',
    path: '/lock-screen/',
    component: LockScreen,
  },
  {
    name : 'dashboard',
    path: '/dashboard/',
    component: dashboard,
  },
  {
    name : 'orders',
    path: '/orders/',
    component: orders,
  },
  {
    name : 'NewSetting',
    path: '/new-settings/',
    component: NewSetting,
  },  
  {
    name : 'ordersdetail',
    path: '/ordersdetail/:id',
    component: ordersdetail,
  },
  {
    name : 'feedback',
    path: '/feedback/',
    component: feedback,
  },
  {
    name : 'transaction',
    path: '/transaction/',
    component: transaction,
  },
  {
    name : 'user',
    path: '/user/',
    component: user,
  },
  {
    name : 'branchList',
    path: '/branchList/',
    component: branchList,
  },
  {
    name : 'branchlistnew',
    path: '/branchlistnew/',
    component: branchlistnew,
  },
  {
    name : 'branch',
    path: '/branch/',
    component: branch,
  },
  {
    name : 'signin',
    path: '/signin/',
    component: signin,
  },
  {
    name : 'signup',
    path: '/signup/',
    component: signup,
  },
  {
    name : 'forgotpassword',
    path: '/forgotpassword/',
    component: forgotpassword,
  },
  {
    name : 'resetpassword',
    path: '/resetpassword/',
    component: resetpassword,
  },
  {
    name : 'verifyemail',
    path: '/verifyemail/',
    component: verifyemail,
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
]
