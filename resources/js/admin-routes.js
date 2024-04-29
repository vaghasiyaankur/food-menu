import DashBoard from "./pages/admin/DashBoard.vue";
import Orders from "./pages/admin/orders.vue";

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
]
