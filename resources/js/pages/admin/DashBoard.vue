<template>
    <f7-page>
        <div class="dashboard_page">
            <div class="dashboard_header">
                <h2 class="no-margin">Dashboard</h2>
                <f7-breadcrumbs>
                    <f7-breadcrumbs-item class="f7-link" active>
                        <f7-link>Dashboard</f7-link>
                    </f7-breadcrumbs-item>
                    <f7-breadcrumbs-separator />
                    <f7-breadcrumbs-item class="f7-link">
                        <f7-link>Dashboard</f7-link>
                    </f7-breadcrumbs-item>
                </f7-breadcrumbs>
            </div>
            
            <!-- Dashboard Welcome Section Component -->
            <Welcome :user-name="user.name" />

            <!--  Dashboard Counter Card Section Component -->
            <DashboardCounter :overview-counter="overviewCounter" />
            
            <!-- Latest Order And Category Section Component -->
            <LatestOrderCategory :latest-orders="latestOrders" :latest-category="latestCategory" :currency-symbol="currencySetting" />

            <!-- Latest Customer And Pending Order Section Component -->
            <LatestCustomerPendingOrder :latest-customers="latestCustomers" :latest-pending-orders="latestPendingOrders" :currency-symbol="currencySetting" />

            <!-- Latest Order And Product Section Component -->
            <LatestCompletedOrderProduct :latest-completed-orders="latestCompletedOrders" :latest-products="latestProducts" :currency-symbol="currencySetting" />
            
            <!-- Latest Menu Transaction Section Component -->
            <LatestMenuTransaction :latest-transactions="latestTransactions" :currency-symbol="currencySetting"/>

        </div>
    </f7-page>
</template>
<script setup>
    import axios from 'axios';
    import { ref, onMounted } from 'vue';
    import {f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Breadcrumbs,f7BreadcrumbsItem, f7BreadcrumbsSeparator, f7BreadcrumbsCollapsed} from 'framework7-vue';
    import Welcome from './Dashboard/Welcome.vue';
    import DashboardCounter from './Dashboard/DashboardCount.vue';
    import LatestCompletedOrderProduct from './Dashboard/LatestOrderProduct.vue';
    import LatestOrderCategory from './Dashboard/LatestOrderAndCategory.vue';
    import LatestMenuTransaction from './Dashboard/LatestMenuTransaction.vue';
    import LatestCustomerPendingOrder from './Dashboard/LatestCustomerAndPendingOrder.vue';
    
    const user = ref([]);
    const currencySetting = ref("");

    const overviewCounter = ref({
        total_order : 0,
        completed_order : 0,
        pending_order : 0,
        customer : 0,
    });
    
    const latestOrders = ref([]);
    const latestCategory = ref([]);
    
    const latestCustomers = ref([]);
    const latestPendingOrders = ref([]);

    const latestCompletedOrders = ref([]);
    const latestProducts = ref([]);

    const latestTransactions = ref([]);

    onMounted(() => {
        dashboardList();
        authUser();
    });

    const dashboardList = async () => {
        await axios.get('/api/dashboard-list')
            .then(response => {
                if(response.status) {

                    currencySetting.value = response.data.setting;

                    overviewCounter.value.total_order = response.data.total_order;
                    overviewCounter.value.completed_order = response.data.completed_order;
                    overviewCounter.value.pending_order = response.data.pending_order;
                    overviewCounter.value.customer = response.data.customer;

                    latestCustomers.value = response.data.latest_customer;
                    latestPendingOrders.value = response.data.latest_pending_order;

                    latestOrders.value = response.data.latest_orders;
                    latestCategory.value = response.data.category;

                    latestCompletedOrders.value = response.data.latest_complete_order;
                    latestProducts.value = response.data.latest_products;

                    latestTransactions.value = response.data.transactions;
                }
            }).catch(error => {
                console.error('Error Fetching For Dashboard Details ' ,error);
            });
    }

    const authUser = async () => {
        await axios.get('/api/checkLogin')
            .then(response => {
                if(response.data.user) {
                    user.value = response.data.user;
                }
            })
            .catch((error) => {
                console.error('Auth User Error : ', error);
            });
    }
</script>