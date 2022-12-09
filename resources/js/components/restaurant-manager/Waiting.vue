<template>
    <f7-page>
        <div class="nav-bar">
            <f7-navbar class="navbar-menu bg-color-white" large transparent back-link="Back">
                <div class="header-links display-flex align-items-center padding-right">
                    <div class="row header-link justify-content-flex-end align-items-center">
                        <div class=" padding-left-half padding-right-half height-40 nav-button">
                            <a href="/Reservation/" class="col link nav-link button button-raised bg-dark text-color-white padding">
                                Reservation</a>
                        </div>
                        <div class="nav-button col-25">
                            <div class="menu-item menu-item-dropdown">
                                <div class="menu-item-content button button-raised bg-dark text-color-white padding-left-half padding-right-half">Menu management
                                    <i class="f7-icons">chevron_down</i>
                                </div>
                                <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                                    <div class="menu-dropdown-content bg-color-white no-padding">
                                        <a href="#" class="menu-dropdown-link menu-close margin-horizontal no-padding"></a>
                                        <a href="/" class="menu-dropdown-link menu-close text-color-pink">Table</a>
                                        <a href="/food-category/" class="menu-dropdown-link menu-close text-color-pink margin-horizontal no-padding">Food Category</a>
                                        <a href="/food-product/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food Menu
                                        </a>
                                        <a href="/food-subcategory/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food SubCategory</a>
                                        <a href="/digital-menu/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Digital Menu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" padding-left-half padding-right-half height-40 nav-button"><a href="/Reporting/" class="col link nav-link button button-raised bg-dark text-color-white padding">Reporting</a></div>
                        <div class="padding-left-half padding-right-half height-40"><button class="nav-link button button-raised bg-dark text-color-white padding closeReservation" @click="$root.closeReservation()">Close reservation</button></div>
                        <div class="padding-left-half padding-right-half height-40"><a href="/settings/" class="nav-link button button-raised bg-pink text-color-white padding">Settings</a></div>
                    </div>
                </div>
            </f7-navbar>
        </div>
        <div class="waiting_time">
            <div class="card elevation-2">
                <div class="padding"> 
                    <a href="javscript:;" class="text-color-black"><i class="f7-icons font-22" style="vertical-align: bottom;">arrow_left</i></a>
                </div>
                <div class="card-content card-content-padding">
                    <div class="countdown_text text-align-center">
                        <h3>Waiting Time</h3>
                        <p class="no-margin">Lorem Ipsum is simply dummy text of the 
                            printing and typesetting industry</p>
                    </div>
                    <div class="text-align-center margin-top card_count"> 
                        <div class="countdown_section position-relative margin-horizontal h-100 margin-top" :class="{ 'display-none' : display }">
                            <div style="background : url('/images/dots.png')" class="countdown__image">
                                <img src="/images/clock_img.png" alt="">
                                <!-- <i class="f7-icons padding-half margin-bottom close-countdown font-13" @click="display = true">xmark</i> -->
                                <vue-countdown :time="60 * 60 * 1000" v-slot="{ hours, minutes, seconds }">
                                    <p class="no-margin-bottom margin-top font-30">{{ hours }} : {{ minutes }} : {{ seconds }}</p>
                                </vue-countdown>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>

<script>
import { f7Page,f7Navbar} from 'framework7-vue';
import VueCountdown from '@chenfengyuan/vue-countdown';
export default {
    name : 'Waiting',
    components: {
        f7Page,
        f7Navbar,
        VueCountdown
    },
}
</script>
<style scoped>
/*<!-- ======= NAVBAR CSS ======= -->*/
.menu-item-dropdown .menu-item-content .f7-icons{
    font-size: 15px;
    margin-left: 10px;
}
.product-list-section{
    margin-top:70px;
}
.product-list-section .tabs-animated-wrap .card{
    box-shadow:none;
}
.page-food-category {
    background: #f1f1f1;
}

.navbar-menu {
    box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.15);
    height: 60px !important;
    position: relative;
    z-index: 99;
}

.height-40 {
    height: 40px;
}

.nav-link,.menu-item-content {
    height: 100%;
    text-transform: capitalize;
}

.menu-item-content {
    position: relative;
    z-index: 9;
}

.menu-dropdown-content {
    box-shadow: 0px 0.5px 12px rgba(0, 0, 0, 0.2);
    min-width: 100% !important;
    top: -30px;
}

.menu-dropdown-center:before,
.menu-dropdown-center:after {
    content: none;
}

.bg-dark {
    background: #38373D;
}

.menu-item-dropdown-opened .menu-item-content {
    background: #F33E3E;
}

.menu-dropdown-link:nth-child(2) {
    border-bottom: 1px solid #EFEFEF;
}
.menu-dropdown-link{
    border-bottom: 1px solid #EFEFEF;
}


.color-pink {
    background: #F33E3E;
}
.bg-pink {
    background: #F33E3E;
}

.nav-bar {
    border-radius: 8px 8px 0px 0px;
    position:fixed;
    width:100%;
    z-index: 99;
}

.page-content {
    padding-top: 0px !important;
}

.icon-only {
    width: 100% !important;
    height: 100% !important;
}

.border-bottom {
    border-bottom: 1px solid #EAEAEA;
}

.padding-icon {
    padding: 3px;
}

.border-right {
    border-right: 1px solid #F3F3F3 !important;
}

.header-links {
    width: 75%;
}
.countdown_section{
    background: #f88f721a;
    box-shadow: 0px 1px 9px #f88f721a;
    border-radius: 7px;
    padding: 18px;
    position: relative;
}
.countdown_section .countdown__image{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    flex-direction: column;
}

.close-countdown{
    position: absolute;
    top: 5px;
    right: 5px;
    background: white;
    border-radius: 50%;
    padding: 5px !important;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 20px;
    height: 20px;
}
.font-30{
    font-weight: 500;
    font-size: 30px;
    line-height: 36px;
    color: #38373D;
}
.font-13{
    font-size: 13px !important;
}
.waiting_time{
    margin-top: 75px;
}
.waiting_time .card{
    height: calc(100vh - 95px);
}
.waiting_time .card .card-content{
    /*display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;*/
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50% , -50%);
    width: 100%;
}
.h-100{
    height: 100%;
}
.card_count{
    width: 100%;
    max-width: 400px;
    height: 100%;
    max-height: 200px;
    margin: 0 auto;
}
.countdown_text{
    width: 40%;
    margin: 0 auto;
}
.countdown_text h3{
    font-weight: 600;
    font-size: 20px;
    line-height: 24px;
    color: #38373D;
}
.countdown_text p{
    font-weight: 500;
    font-size: 15px;
    line-height: 18px;
    text-align: center;
    color: #555555;

}
@media screen and (max-width:820px){
    .waiting_time .card{
        height: calc(100vh - 400px);
    }
    .header-links {
        width: 100%;
    }
}
</style>