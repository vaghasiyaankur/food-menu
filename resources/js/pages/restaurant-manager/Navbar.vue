<template>
<f7-navbar class="navbar-menu bg-color-white">
  <SwitchButton
      :moveToMethod="moveToPos"
      :title="'Switch Pos'"
  />
  <div
    class="header-links display-flex align-items-center"
    >
    <!-- v-if="currentSubmenuRoute != 'category'" -->

    <!--========= MANAGER SMALL SCREEN NAVBAR =========== -->
    <SmallScreenNavbar
        :current-route-name="currentRouteName"
        :navbar-items="navbarItems"
        :icon-color="'#000'"
        :close-reservation-event="closeReservationEvent"
        :close-reservation="closeReservation"
    />
    <!--========= MANAGER SMALL SCREEN NAVBAR END =========== -->
    <!--========= MANAGER BIG SCREEN NAVBAR =========== -->
    <BigScreenNavbar 
            :current-route-name="currentRouteName"
            :navbar-items="navbarItems"
            :icon-color="'#fff'"
            :close-reservation-event="closeReservationEvent"
            :close-reservation="closeReservation"
        />
    <!--========= MANAGER BIG SCREEN NAVBAR END=========== -->
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
    moveToPos: Function,
    closeReservation: [Boolean, Number],
    closeReservationEvent: Function,
    currentSubmenuRoute: String
});

const navbarItems = [
  { label: 'Waiting Area', routesName: ['Table'], href: '/table/', icon: 'waiting' },
  { label: 'All Reservation', routesName: ['AllReservation'], href: '/all-reservation/', icon: 'calendar' },
  { label: 'New Reservation', routesName: ['Reservation'], href: '/reservation/', icon: 'plus' },
  { label: 'Reporting', routesName: ['Reporting'], href: '/reporting/', icon: 'reports' },
  { 
    label: 'Close Reservation',
    routesName: [], 
    href: '#', 
    icon: 'close',
    openCloseReservation: true
  },
  { label: 'Logout', routesName: [], href: '#', icon: 'logout', logoutUser: true }
];


let currentRouteName = ref(null);

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
