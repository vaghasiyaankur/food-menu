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
            <Welcome />

            <!--  Dashoboard Counter Card Section Component -->
            <DashboardCounter />
            
            <!-- Latest Order And Category Section Component -->
            <LatestOrderCategory />

            <!-- Latest Customer And Pending Order Section Component -->
            <LatestCustomerPendingOrder :latest-customers="latestCustomers" />

            <!-- Latest Order And Product Section Component -->
            <LatestOrderProduct />
            
            <!-- Latest Menu Transction Section Component -->
            <LatestMenuTransaction />

        </div>
    </f7-page>
</template>
<script setup>
    import axios from 'axios';
    import { ref, onMounted } from 'vue';
    import {f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Breadcrumbs,f7BreadcrumbsItem, f7BreadcrumbsSeparator, f7BreadcrumbsCollapsed} from 'framework7-vue';
    import Welcome from './Dashboard/Welcome.vue';
    import DashboardCounter from './Dashboard/DashboardCount.vue';
    import LatestOrderProduct from './Dashboard/LatestOrderProduct.vue';
    import LatestOrderCategory from './Dashboard/LatestOrderAndCategory.vue';
    import LatestMenuTransaction from './Dashboard/LatestMenuTransaction.vue';
    import LatestCustomerPendingOrder from './Dashboard/LatestCustomerAndPendingOrder.vue';

    const latestCustomers = ref([]);

    onMounted(() => {
        dashboardList();
    });

    const dashboardList = async () => {
        await axios.get('/api/dashboard-list')
            .then(response => {
                if(response.status) {
                    latestCustomers.value = response.data.latest_customer;
                }
            }).catch(error => {
                console.log(error);
            });
    }
</script>