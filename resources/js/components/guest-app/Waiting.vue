<template>
    <f7-page class="page-favourite bg-color-white" @page:beforeremove="onPageBeforeRemove" @page:beforeout="onPageBeforeOut">
        <div class="nav-bar">
            <f7-navbar class="navbar-menu text-color-white" large transparent title="Time" back-link="Back">
                <div class="favourites-card">
                    <a class="link icon-only" href="/favourites/">
                        <i class="f7-icons size-22 text-color-white padding-half font-18">heart_fill</i>
                    </a>
                </div>
            </f7-navbar>
        </div>

        <div class="margin countdown_section">
            <div class="text-align-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry</div>
            <div class="countdown position-relative text-align-center margin">
                <div style="background : url('/images/dots.png')">
                    <img src="/images/clock.png" alt="">
                    <i class="f7-icons font-13 padding-half margin-bottom close-countdown" @click="display = true">xmark</i>
                    <vue-countdown :time="60 * 60 * 1000" v-slot="{ hours, minutes, seconds }">
                        <p class="no-margin font-30">{{ hours }} : {{ minutes }} : {{ seconds }}</p>
                    </vue-countdown>
                </div>
            </div>
        </div>
        <div class="menu-button">
            <f7-button class="button button-raised open-menu-button button-large text-transform-capitalize margin" fill sheet-open=".demo-sheet-swipe-to-close">Open Menu</f7-button>
        </div>
        <Menu></Menu>
    </f7-page>
</template>

<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7Button,f7 } from 'framework7-vue';
import $ from 'jquery';
import VueCountdown from '@chenfengyuan/vue-countdown';
import Menu from './Menu.vue';

export default {
    name : 'Favourite',
    components: {
        f7Page,
        f7Navbar,
        f7BlockTitle,
        f7Block,
        VueCountdown,
        Menu,
        f7,
        f7Button
    },
    methods: {
        onPageBeforeOut() {
            const self = this;
            // Close opened sheets on page out
            f7.sheet.close();
        },
        onPageBeforeRemove() {
            const self = this;
            // Destroy sheet modal when page removed
            if (self.sheet) self.sheet.destroy();
        },
    },
};
</script>

<style scoped>
.nav-bar{
    background: #38373D;
    border-radius: 8px 8px 0px 0px;
    transform: matrix(1, 0, 0, -1, 0, 0);
}

.navbar-menu{
    transform: matrix(1, 0, 0, -1, 0, 0);
    height: 56px;
}
.text-color-dark-orange{
    color: #FC4B1A !important;
}

.menu-dropdown-center:before , .menu-dropdown-center:after, .dialog-inner:after{
    content: none !important;
}
.bg-color-transparent{
    background-color: transparent !important;
}
.menu-dropdown-content{
    top : -8px !important;
    left : 60% !important;
}
.menu-item-dropdown .menu-item-content:after{
    opacity: 0;
}
.countdown_section{
    height: calc(100vh - 90px);
    display: flex;
    flex-wrap: wrap;
    align-content: center;
    justify-content: center;
}
.countdown{
    background: #f88f721a;
    border-radius: 7px;
    padding: 18px;
    width: 100%;
}
.close-countdown{
    position: absolute;
    top: 5px;
    right: 5px;
    background: white;
    border-radius: 50%;
    padding: 5px !important;
}
.position-relative{
    position: relative;
}
.open-menu-button{
    background: #F33E3E !important;
    color : #fff;
}
.text-transform-capitalize {
    text-transform: capitalize;
}
.menu-button{
    position: fixed;
    bottom: 0;
    width: 100%;
    left: 0;
}
</style>
