<template>
    <f7-page class="page-favourite bg-color-white" @page:beforeremove="onPageBeforeRemove" @page:beforeout="onPageBeforeOut">
        <div class="nav-bar">
            <f7-navbar class="navbar-menu text-color-white" large transparent :title="$root.trans.waiting_time" :back-link="$root.trans.back">
                <div class="favourites-card">
                    <a class="link icon-only" href="/favourites/">
                        <i class="f7-icons size-22 text-color-white padding-half font-18">heart</i>
                    </a>
                </div>
            </f7-navbar>
        </div>
        <div class="waiting_area">
            <div class="waiting_info">
                <div class="padding margin-vertical table-card margin-horizontal-half">
                    <!--======= TABLE CHAIR ========= -->
                    <div class="row table_top_chair">
                    <div class="col">
                        <div class="table_card_img text-align-center"><img src="/images/table/Red.png" alt="table"></div>
                    </div>
                    <div class="col">
                        <div class="table_card_img text-align-center"><img src="/images/table/Red.png" alt="table"></div>
                    </div>
                    <div class="col">
                        <div class="table_card_img text-align-center"><img src="/images/table/Red.png" alt="table"></div>
                    </div>
                    </div>
                    <div class="card no-margin table_1" >
                    <div class="card-content display-flex justify-content-center align-items-center no-padding h_100">
                        <div class="table_number table_inner">
                            <p class="no-margin">Table No.</p>
                            <span class="no-margin">03</span>
                        </div>
                        <div class="table_capacity table_inner">
                            <p class="no-margin">Capacity</p>
                            <span class="no-margin">05</span>
                        </div>
                    </div>                  
                    </div>
                    <!--======= TABLE CHAIR ========= -->
                    <div class="row table_bottom_chair">
                    <div class="col">
                        <div class="table_card_img text-align-center"><img src="/images/table/Red.png" alt="table" style="transform: rotate(180deg);"></div>
                    </div>
                    <div class="col">
                        <div class="table_card_img text-align-center"><img src="/images/table/Red.png" alt="table" style="transform: rotate(180deg);"></div>
                    </div>
                    <div class="col">
                        <div class="table_card_img text-align-center"><img src="/images/table/Red.png" alt="table" style="transform: rotate(180deg);"></div>
                    </div>
                    </div>
                </div>
                <div class="table__information padding">
                    <div class="guest_number">
                        <span class="table_info_text">No. of Guest :</span>
                        <span>5</span>
                    </div>
                    <div class="date_time margin-top-half margin-bottom">
                        <span class="table_info_text">Date & Time :</span>
                        <span>24, Sep 2022 / 10:00 am</span>
                    </div>
                </div>
            </div>
            <div class="margin countdown_section">
                <div class="text-align-center">
                    <h3>Waiting Time</h3>    
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p> 
                </div>
                <div class="countdown position-relative text-align-center margin">
                    <div style="background : url('/images/dots.png')" class="display-flex justify-content-space-between align-items-center flex-direction-column">
                        <img src="/images/clock.png" alt="">
                        <!-- <i class="f7-icons font-13 padding-half margin-bottom close-countdown" @click="display = true">xmark</i> -->
                        <vue-countdown :time="time" v-slot="{ hours, minutes, seconds }">
                            <p class="no-margin font-30">{{ hours }} : {{ minutes }} : {{ seconds }}</p>
                        </vue-countdown>
                    </div>
                </div>
            </div>           
        </div>
        <div class="padding-horizontal bottom-bar toolbar">
            <div class="row">
                <div class="col">
                    <f7-button class="button button-raised open-menu-button active button-large text-transform-capitalize" fill sheet-open=".demo-sheet-swipe-to-close">{{ $root.trans.open_menu }}</f7-button>
                </div>
                <div class="col">
                    <f7-button class="button button-raised open-menu-button button-large text-transform-capitalize" @click="cancelReservation()">{{ $root.trans.cancel_reservation }}</f7-button>
                </div>
            </div>
        </div>
        <Menu></Menu>
    </f7-page>
</template>

<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7Button,f7 } from 'framework7-vue';
import $ from 'jquery';
import VueCountdown from '@chenfengyuan/vue-countdown';
import { useCookies } from "vue3-cookies";
import Menu from './Menu.vue';
import axios from "axios";

export default {
    name : 'Favourite',
    data(){
        return {
            category: {
                    id : null,
                    name: '',
                    image: '',
                }
        }
    },
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
    data() {
        return {
            time : 3600000,
        }
    },
    setup() {
        const { cookies } = useCookies()
        return { cookies };
    },
    created() {
        this.getWaitingTime();
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
        cancelReservation(){
            var ids = JSON.parse(this.cookies.get('orderId'));
            f7.dialog.confirm(this.$root.trans.cancel_conformation_message, () => {

                axios.post('/api/cancel-reservation', {ids : ids})
                .then((res) => {
                    this.cookies.remove("orderId");
                    // f7.view.main.router.navigate({ url: '/', reloadCurrent: true });
                    window.location.reload();
                })
                .catch((err) => {
                });
                            });
            setTimeout(() => {
                $('.dialog-title').eq().css({'font-size': '20px'});
                $('.dialog-text').css({'font-size': '18px', 'line-height': '22px'});
                $('.dialog-title').html("<img src='/images/usericon.png'>");
                $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
                $('.dialog-button').eq(0).text(this.$root.trans.cancel);
                $('.dialog-button').eq(1).removeClass('text-color-black').addClass('active').text(this.$root.trans.ok);
                $('.dialog-buttons').addClass('margin-vertical padding-bottom');
            });
        },
        getWaitingTime() {

            var ids = JSON.parse(this.cookies.get('orderId'));

            axios.post('/api/waiting-time', {ids : ids})
            .then((res) => {
                this.time = res.data.time;
            })
            .catch((err) => {
            });
        }
    },

};
</script>

<style scoped>
/*============ WAITING INFO =============*/
.waiting_info{
    border: 1px solid #999;
    margin: 15px;
    border-radius: 10px;
}
.waiting_info .table_1{
    height: 145px;
    border-left: 10px solid rgb(255, 97, 97);
}
.table_inner {
	background: #fff4f1;
	padding: 10px 16px;
	margin-right: 20px;
	border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.table_inner span{
    font-weight: 600;
    font-size: 17px;
    line-height: 21px;
    text-align: center;
    color: #555555;
    margin-top: 5px !important;
}
.table__information .table_info_text{
    font-weight: 500;
    font-size: 18px;
    line-height: 22px;
    color: #38373D;

}
.bottom-bar{
    position: fixed;
    bottom: 0;
    background-color: #fff !important;
    /*padding-top: 55px;*/
}
 .toolbar .button{
    color: #38373D !important;
 }
 .toolbar .button.active{
    color: #fff !important;
 }
 h3{
    font-weight: 500;
        font-size: 18px;
        line-height: 22px;
        color: #38373D;
 }
.h_100{
    height: 100%;
}
.border_radius_10{
    border-radius: 10px;
}
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
    display: flex;
    flex-wrap: wrap;
    align-content: center;
    justify-content: center;
}
.countdown{
    background: #f88f721a;
    border-radius: 7px;
    width: 100%;
    height: 100%;
    max-height: 138px;
    display: flex;
    justify-content: center;
    align-items: center;
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
    background: #ffffff !important;
    color : #000000;
    border-radius: 10px;
    font-weight: 500;
    font-size: 16px;
    line-height: 20px;
}
.open-menu-button.active{
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
<style>
.left{
    opacity: 0;
    visibility: hidden;
}
</style>
