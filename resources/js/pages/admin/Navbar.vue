<template>
<f7-navbar class="navbar-menu bg-color-white">
    <!-- <SwitchButton 
        :moveToMethod="moveToMethod"
        :title="'Switch To Waiting Area'"
    /> -->
    <img src="/images/setting/logo.png" height="38px" width="40px" alt="Logo Image Error" />
    <div
        class="header-links display-flex justify-content-flex-end align-items-center"
    >
        <!--========= POS SMALL SCREEN NAVBAR =========== -->
        <SmallScreenNavbar
            :current-route-name="currentRouteName"
            :navbar-items="navbarItems"
            :icon-color="'#000'"
        />
        <!--========= POS SMALL SCREEN NAVBAR  END=========== -->

        <!--========= POS BIG SCREEN NAVBAR =========== -->
        <BigScreenNavbar 
            :current-route-name="currentRouteName"
            :navbar-items="navbarItems"
            :icon-color="'#fff'"
        />
        <!--========= POS BIG SCREEN NAVBAR END=========== -->
    </div>
</f7-navbar>

</template>


<script setup>
import { f7, f7Navbar } from "framework7-vue";
// import SwitchButton from "../../components/SwitchButton.vue";
import { ref, onMounted, nextTick, watch } from "vue";
import SmallScreenNavbar from "../../components/SmallScreenNavbar.vue"
import BigScreenNavbar from "../../components/BigScreenNavbar.vue"

const props = defineProps({
    moveToMethod: Function,
});

const navbarItems = [
    { label: 'Dashboard', routesName: ['dashboard'], href: '/dashboard/', icon: 'dashboard' },
    { label: 'Orders', routesName: ['orders'], href: '/orders/', icon: 'order' },
    { label: 'Transaction', routesName: ['transaction'], href: '/transaction/', icon: 'transaction' },
    {
        label: 'Menu Management',
        icon: 'bars',
        routesName: ['FoodCategory', 'FoodSubCategory', 'FoodIngredient', 'FoodVariation', 'FoodCombo', 'AddCombo', 'EditCombo', 'FoodProduct', 'AddProduct', 'EditProduct', 'DigitalMenu'],
        submenu: [
        { label: 'Food Category', href: '/food-category/', routesName: ['FoodCategory']},
        { label: 'Food Subcategory', href: '/food-subcategory/', routesName: ['FoodSubCategory']},
        { label: 'Food Ingredient', href: '/food-ingredient/', routesName: ['FoodIngredient']},
        { label: 'Food Variation', href: '/food-variation/', routesName: ['FoodVariation']},
        { label: 'Food Combo', href: '/food-combo/', routesName: ['FoodCombo', 'AddCombo', 'EditCombo']},
        { label: 'Food Menu', href: '/food-product/', routesName: ['FoodProduct', 'AddProduct', 'EditProduct']},
        { label: 'Digital Menu', href: '/digital-menu/', routesName: ['DigitalMenu']}
        ]
    },
    { label: 'User', routesName: ['user'], href: '/user/', icon: 'user' },
    { label: 'Branch', routesName: ['branch'], href: '/branch/', icon: 'branch' },
    { label: 'Logout', routesName: [], href: '#', icon: 'logout', logoutUser: true }
];


let currentRouteName = ref(null);
// let currentRoute = f7.view.main.router.currentRoute.name;

// Function to update currentRouteName
const updateCurrentRoute = () => {
    if (f7.view.main) {
        currentRouteName.value = f7.view.main.router.currentRoute.name;
    }
};

// Fetch and update currentRouteName on component mount
onMounted(async () => {
    await nextTick();
    updateCurrentRoute();
});

// Listen for route change
f7.on('routeChange', (route) => {
    currentRouteName.value = route.name;
});
</script>
