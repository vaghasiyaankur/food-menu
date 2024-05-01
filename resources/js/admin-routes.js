import DashBoard from "./pages/admin/DashBoard.vue";
import Orders from "./pages/admin/orders.vue";
import OrdersDetail from "./pages/admin/orders_detail.vue";
import FeedBack from "./pages/admin/feedback.vue";
import Transaction from "./pages/admin/transaction.vue";
import User from "./pages/admin/user.vue";
import BranchList from "./pages/admin/branch-list.vue";
import Branch from "./pages/admin/branch.vue";

export default [
  {
    name : 'DashBoard',
    path: '/DashBoard/',
    component: DashBoard,
  },
  {
    name : 'Orders',
    path: '/Orders/',
    component: Orders,
  },
  {
    name : 'OrdersDetail',
    path: '/OrdersDetail/',
    component: OrdersDetail,
  },
  {
    name : 'FeedBack',
    path: '/FeedBack/',
    component: FeedBack,
  },
  {
    name : 'Transaction',
    path: '/Transaction/',
    component: Transaction,
  },
  {
    name : 'User',
    path: '/User/',
    component: User,
  },
  {
    name : 'BranchList',
    path: '/BranchList/',
    component: BranchList,
  },
  {
    name : 'Branch',
    path: '/Branch/',
    component: Branch,
  },
]
