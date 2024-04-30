import DashBoard from "./pages/admin/DashBoard.vue";
import Orders from "./pages/admin/orders.vue";
import OrdersDetail from "./pages/admin/orders_detail.vue";

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
]
