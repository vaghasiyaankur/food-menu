<template>
    <div class="row header-link justify-content-flex-end align-items-center tab_view_menu">
        <div v-for="(item, index) in navbarItems" :key="index" class="padding-left-half padding-right-half height-40 nav-button">
            <template v-if="item.submenu">
                <div class="menu-item menu-item-dropdown bg-white">
                <div 
                    class="menu-item-content col link nav-link button button-raised bg-dark text-color-white padding-horizontal"
                    :class="item.routesName.includes(currentRouteName) ? 'bg-pink' : 'bg-dark'"
                >
                    <Icon
                        :name="item.icon"
                        :color="iconColor"
                        class="margin-right-half"
                    />
                    {{ item.label }}
                    <i class="f7-icons">chevron_down</i>
                </div>
                <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                    <div class="menu-dropdown-content bg-color-white no-padding">
                    <a 
                        v-for="(submenuItem, submenuIndex) in item.submenu" 
                        :key="submenuIndex" :href="submenuItem.href" 
                        class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding"
                        :class="[submenuItem.routesName.includes(currentRouteName) ? 'active_submenu' : 'text-color-black']"
                    >
                        {{ submenuItem.label }}
                    </a>
                    </div>
                </div>
                </div>
            </template>
            <div v-else-if="item.openCloseReservation" class="height-40 border-bottom" >
                <button
                    class="col link nav-link button button-raised text-color-white padding bg-dark"
                    @click="closeReservationEvent(closeReservation)"
                >
                <Icon :name="closeReservation == 1 ? 'true' : 'close'" :color="item.routesName.includes(currentRouteName) ? '#fff' : iconColor" class="margin-right-half" />
                {{ closeReservation == 1 ? 'Open Reservation' : 'Close Reservation' }}
                </button>
            </div>
            <template v-else>
                <a
                :href="item.href"
                class="col link nav-link button button-raised text-color-white padding"
                :class="item.routesName.includes(currentRouteName) ? 'bg-pink' : 'bg-dark'"
                >
                <Icon
                    :name="item.icon"
                    :color="iconColor"
                    class="margin-right-half"
                />
                {{ item.label }}
                </a>
            </template>
        </div>
    </div>
</template>

<script setup>
import Icon from './Icon.vue';

const props = defineProps({
    currentRouteName   :   String,
    navbarItems: {
        type: Array,
        default: () => []
    },
    iconColor: String,
    closeReservation: [Boolean, Number],
    closeReservationEvent: Function
});
</script>

<style scoped>
.active_submenu {
    color: #f33e3e !important;
}
</style>