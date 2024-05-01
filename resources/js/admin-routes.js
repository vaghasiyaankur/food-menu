import dashboard from "./pages/admin/DashBoard.vue";
import orders from "./pages/admin/orders.vue";
import ordersdetail from "./pages/admin/orders_detail.vue";
import feedback from "./pages/admin/feedback.vue";
import transaction from "./pages/admin/transaction.vue";
import user from "./pages/admin/user.vue";
import branchList from "./pages/admin/branch-list.vue";
import branch from "./pages/admin/branch.vue";
import signin from "./pages/admin/sign-in.vue";
// import login from "./pages/admin/log-in.vue";

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
    name : 'branch',
    path: '/branch/',
    component: branch,
  },
  {
    name : 'signin',
    path: '/signin/',
    component: signin,
  },
  // {
  //   name : 'login',
  //   path: '/login/',
  //   component: login,
  // },
]
