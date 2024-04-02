<template>
<f7-navbar class="navbar-menu bg-color-white">
    <SwitchButton 
        :moveToMethod="moveToWaitingArea"
        :title="'Switch To Waiting Area'"
    />
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
import SwitchButton from "../../components/SwitchButton.vue";
import { ref, onMounted, nextTick, watch } from "vue";
import SmallScreenNavbar from "../../components/SmallScreenNavbar.vue"
import BigScreenNavbar from "../../components/BigScreenNavbar.vue"

const props = defineProps({
    moveToWaitingArea: Function,
});

const navbarItems = [
  { label: 'POS', routesName: ['POS'], href: '/', icon: 'pos' },
  { label: 'Floorplan', routesName: ['TABLE'], href: '/table/', icon: 'dining_table' },
  {
    label: 'Menu Management',
    icon: 'bars',
    routesName: ['FoodCategory', 'FoodSubCategory', 'FoodProduct', 'DigitalMenu'],
    submenu: [
      { label: 'Food Category', href: '/food-category/', routesName: 'FoodCategory'},
      { label: 'Food Subcategory', href: '/food-subcategory/', routesName: 'FoodSubCategory'},
      { label: 'Food Menu', href: '/food-product/', routesName: 'FoodProduct'},
      { label: 'Digital Menu', href: '/digital-menu/', routesName: 'DigitalMenu'}
    ]
  },
  { label: 'Settings', routesName: ['Setting'], href: '/settings/', icon: 'settings' }
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
