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
                        <div v-else-if="item.openCloseReservation" class="padding-horizontal height-40 border-bottom" >
                            <button
                                class="col nav-link button close_reservation no-padding font-16 panel-close"
                                @click="closeReservationEvent(closeReservation)"
                            >
                            <Icon :name="closeReservation == 1 ? 'true' : 'close'" :color="item.routesName.includes(currentRouteName) ? '#fff' : iconColor" class="margin-right-half" />
                            {{ closeReservation == 1 ? 'Open Reservation' : 'Close Reservation' }}
                            </button>
                        </div>
                        <div v-else 
                            class="padding-horizontal height-40 border-bottom pannel_menu_link panel-close"
                            :class="item.routesName.includes(currentRouteName) ? 'bg-pink' : 'bg-white'"
                        >
                            <a 
                                :href="item.href" 
                                router 
                                class="link nav-link  font-16"
                                :class="item.routesName.includes(currentRouteName) ? 'text-color-white' : 'text-color-black'"
                            >
                                <Icon :name="item.icon" :color="item.routesName.includes(currentRouteName) ? '#fff' : iconColor" class="margin-right-half" />
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
    iconColor: String,
    closeReservation: Boolean,
    closeReservationEvent: Function
});
</script>
<style scoped>
.active_submenu {
    color: #f33e3e !important;
}
</style>