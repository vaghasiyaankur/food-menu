<template>
<f7-navbar class="navbar-menu bg-color-white">
    <!-- <div>
        <button
        @click="moveToWaitingArea"
        class="col link button text-color-white padding-horizontal padding-vertical-half bg-pink height-40 text-transform-capitalize"
        >
        <i class="f7-icons font-14 margin-right-half"> arrow_right_arrow_left </i>
        Switch To Waiting Area
        </button>
    </div> -->
    <SwitchButton 
        :moveToMethod="moveToWaitingArea"
        :title="'Switch To Waiting Area'"
    />
    <div
        class="header-links display-flex justify-content-flex-end align-items-center"
    >
        <!--========= SMALL SCREEN MENU BAR=========== -->
        <div class="small_screen_menu">
        <div class="hamburger__button">
            <a
            href="#"
            class="icon-only panel-open text-color-black"
            data-panel=".panel-right-1"
            ><i class="f7-icons">bars</i></a
            >
        </div>
        <div
            class="panel panel-right panel-right-1 panel-cover panel-resizable panel-init"
        >
            <div class="pannel_header padding-horizontal text-align-right">
            <p>
                <a href="#" class="panel-close text-color-black"
                ><i class="f7-icons">xmark</i></a
                >
            </p>
            </div>
            <div class="block no-margin-top no-padding">
            <div
                class="padding-horizontal height-40 border-bottom pannel_menu_link panel-close"
            >
                <a
                href="/"
                router
                class="link nav-link text-color-black font-16"
                >
                <Icon name="pos" color="#000" class="margin-right-half" />POS</a
                >
            </div>
            <div
                class="padding-horizontal height-40 border-bottom pannel_menu_link panel-close"
            >
                <a
                href="/table/"
                router
                class="link nav-link text-color-black font-16"
                >
                <Icon
                    name="dining_table"
                    color="#000"
                    class="margin-right-half"
                />Floorplan</a
                >
            </div>
            <div class="list accordion-list inset no-margin">
                <ul>
                <li class="accordion-item">
                    <a href="#" class="item-link item-content border-bottom">
                    <div class="item-inner">
                        <div class="item-title font-16">
                        <img
                            src="/images/menu.png"
                            alt=""
                            class="padding-right-half"
                            style="filter: invert(100%); height: 13px"
                        />Menu management
                        </div>
                    </div>
                    </a>
                    <div class="accordion-item-content" aria-hidden="true">
                    <div class="block">
                        <div class="bg-color-white no-padding">
                        <a
                            href="/food-category/"
                            class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding panel-close"
                            >Food Category</a
                        >
                        <a
                            href="/food-subcategory/"
                            class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding panel-close"
                            >Food SubCategory</a
                        >
                        <a
                            href="/food-product/"
                            class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding panel-close"
                            >Food Menu</a
                        >
                        <a
                            href="/digital-menu/"
                            class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding panel-close"
                            >Digital Menu</a
                        >
                        </div>
                    </div>
                    </div>
                </li>
                </ul>
            </div>
            <div
                    class="padding-horizontal height-40 border-bottom pannel_menu_link panel-close"
                  >
                    <a
                      href="/table/"
                      router
                      class="link nav-link text-color-black font-16"
                    >
                      <Icon
                        name="settings"
                        color="#000"
                        class="margin-right-half"
                      />Settings</a
                    >
                  </div>
            </div>
        </div>
        </div>
        <!--========= SMALL SCREEN MENU BAR END=========== -->
        <div
        class="row header-link justify-content-flex-end align-items-center tab_view_menu"
        >
        <div class="padding-left-half padding-right-half height-40 nav-button">
            <a
            href="/"
            class="col link nav-link button button-raised text-color-white padding"
            :class="currentRoute == 'pos' ? 'bg-dark' : 'bg-dark'"
            >
            <Icon name="pos" color="#fff" class="margin-right-half" />POS</a
            >
        </div>
        <div class="padding-left-half padding-right-half height-40 nav-button">
            <a
            href="/table/"
            class="col link nav-link button button-raised text-color-white padding"
            :class="currentRoute == 'table' ? 'bg-pink' : 'bg-dark'"
            >
            <Icon
                name="dining_table"
                color="#fff"
                class="margin-right-half"
            />Floorplan</a
            >
        </div>
        <div class="padding-left-half padding-right-half height-40 nav-button">
            <div class="menu-item menu-item-dropdown bg-white">
            <div
                class="menu-item-content col link nav-link button button-raised bg-dark text-color-white padding-horizontal"
            >
                <i class="f7-icons font-20 margin-right-half no-margin-left">bars</i
                >Menu management
                <i class="f7-icons">chevron_down</i>
            </div>
            <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                <div class="menu-dropdown-content bg-color-white no-padding">
                <a
                    href="#"
                    class="menu-dropdown-link menu-close margin-horizontal no-padding"
                >
                </a>
                <a
                    href="/food-category/"
                    class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding"
                    >Food Category</a
                >
                <a
                    href="/food-subcategory/"
                    class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding"
                    >Food SubCategory</a
                >
                <a
                    href="/food-product/"
                    class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding"
                    >Food Menu</a
                >
                <a
                    href="/digital-menu/"
                    class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding"
                    >Digital Menu</a
                >
                </div>
            </div>
            </div>
        </div>
        <div class="padding-left-half padding-right-half height-40 nav-button">
                <a
                  href="/settings/"
                  class="nav-link button button-raised text-color-white padding"
                  :class="currentRoute == 'setting' ? 'bg-pink' : 'bg-dark'"
                >
                  <img
                    src="/images/setting.png"
                    alt=""
                    class="padding-right-half"
                  />Settings</a
                >
              </div>
        </div>
    </div>
</f7-navbar>

</template>


<script setup>
import { f7, f7Navbar } from "framework7-vue";
import SwitchButton from "../../components/SwitchButton.vue";
import { ref, onMounted, nextTick, watch } from "vue";
import { useRouter } from 'vue-router'


const props = defineProps({
    moveToWaitingArea: Function,
});

const router = useRouter();

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

// Watch for changes in the route and update currentRouteName
watch(() => {
  if (f7.view.main) {
    return f7.view.main.router.currentRoute.name;
  }
}, (newValue) => {
    console.log(newValue);
  currentRouteName.value = newValue;
});
</script>
