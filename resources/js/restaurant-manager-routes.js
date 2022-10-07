
import Table from "./components/restaurant-manager/Table.vue";
// Pages
export default [
  // Index page
  {
    path: '/',
    component: Table,
    master(f7) {
      return f7.theme === 'aurora';
    },
  },


]
