<template>
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
                    <!-- <div class="block no-margin-top no-padding">
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
                    </div> -->
                    <div class="block no-margin-top no-padding">
                    <template v-for="(item, index) in navbarItems">
                        <div v-if="item.submenu" class="list accordion-list inset no-margin">
                            <ul>
                                <li class="accordion-item"
                                    
                                >
                                    <a href="#" class="item-link item-content border-bottom" 
                                        :class="{
                                            'bg-pink': item.routesName.includes(currentRouteName),
                                            'bg-white': !item.routesName.includes(currentRouteName),
                                            'text-color-white': item.routesName.includes(currentRouteName),
                                            'text-color-black': !item.routesName.includes(currentRouteName)
                                        }"
                                    >
                                        <div class="item-inner">
                                            <div class="item-title font-16">
                                                <Icon :name="item.icon" :color="item.routesName.includes(currentRouteName) ? '#fff' : iconColor" class="padding-right-half" />
                                                {{ item.label }}
                                            </div>
                                        </div>
                                    </a>
                                    <div class="accordion-item-content" aria-hidden="true">
                                        <div class="block">
                                            <div class="bg-color-white no-padding">
                                                <a 
                                                    v-for="(submenuItem, submenuIndex) in item.submenu" 
                                                    :key="submenuIndex" 
                                                    :href="submenuItem.href" 
                                                    class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding panel-close" 
                                                    :class="[submenuItem.routeName == currentRouteName ? 'active_submenu' : 'text-color-black']"
                                                    >
                                                    {{ submenuItem.label }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div v-else 
                            class="padding-horizontal height-40 border-bottom pannel_menu_link panel-close"
                            :class="currentRouteName === item.routeName ? 'bg-pink' : 'bg-white'"
                        >
                            <a 
                                :href="item.href" 
                                router 
                                class="link nav-link  font-16"
                                :class="currentRouteName === item.routeName ? 'text-color-white' : 'text-color-black'"
                            >
                                <Icon :name="item.icon" :color="currentRouteName === item.routeName ? '#fff' : iconColor" class="margin-right-half" />
                                {{ item.label }}
                            </a>
                        </div>
                    </template>
                </div>
                </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import Icon from './Icon.vue';

const props = defineProps({
    currentRouteName   :   String,
    navbarItems: {
        type: Array,
        default: () => []
    },
    iconColor: String
});
</script>
<style scoped>
.active_submenu {
  color: #f33e3e !important;
}
</style>