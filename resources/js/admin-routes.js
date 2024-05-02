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

export default [
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
    name : 'ordersdetail',
    path: '/ordersdetail/',
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
]
