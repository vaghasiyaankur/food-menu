<template>
    <f7-page class="page-waiting bg-color-white" @page:beforeremove="onPageBeforeRemove" @page:beforeout="onPageBeforeOut">
        <div class="nav-bar">
            <f7-navbar class="navbar-menu text-color-white waiting-page" large transparent :title="$root.trans.time" :back-link="$root.trans.back">
                <div class="favourites-card">
                    <a class="link icon-only" href="/favourites/">
                        <i class="f7-icons size-22 text-color-white padding-half font-18">heart</i>
                    </a>
                </div>
            </f7-navbar>
        </div>
        <div class="waiting_area">
            <div class="margin countdown_section">
                <div class="text-align-center">
                    <h3>{{ $root.trans.waiting_time }}</h3>
                    <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p> -->
                </div>
                <div class="countdown position-relative text-align-center">
                    <div style="background : url('/images/dots.png')"
                        class="display-flex justify-content-space-between align-items-center flex-direction-column">
                        <img src="/images/clock.png" alt="">
                        <vue-countdown :time="time" v-slot="{ hours, minutes, seconds }">
                            <p class="no-margin font-30">{{ String(hours).padStart(2, '0') }} : {{ String(minutes).padStart(2, '0')
                            }} : {{ String(seconds).padStart(2, '0') }}</p>
                        </vue-countdown>
                    </div>
                </div>
            </div>
            <div class="waiting_info">
                <div class="padding margin-vertical table-card margin-horizontal-half">
                    <!--======= TABLE CHAIR ========= -->
                    <div class="row table_top_chair">
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img v-if="order.color" :src="'/images/table/' + order.color.color +'.png'" alt="table">
                            </div>
                        </div>
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img v-if="order.color" :src="'/images/table/' + order.color.color +'.png'" alt="table">
                            </div>
                        </div>
                        <div class="col" v-if="windowWidth > 280">
                            <div class="table_card_img text-align-center">
                                <img v-if="order.color" :src="'/images/table/' + order.color.color +'.png'" alt="table">
                            </div>
                        </div>
                    </div>
                    <div class="card no-margin table_1" :style="('border-left-color : rgb(' + order.color.rgb + ')')">
                        <div class="card-content display-flex justify-content-center align-items-center no-padding h_100 table_order_content">
                            <div class="table_number table_inner" :style="('background : rgba(' + order.color.rgb + ', 0.3)')">
                                <p class="no-margin">Table No.</p>
                                <span class="no-margin">{{ String(order.table_number).padStart(2, '0') }}</span>
                            </div>
                            <div class="table_capacity table_inner" :style="('background : rgba(' + order.color.rgb + ', 0.3)')">
                                <p class="no-margin">Capacity</p>
                                <span class="no-margin">{{ order.orders ? String(order.orders[0].person).padStart(2, '0') : '' }}</span>
                            </div>
                        </div>
                    </div>
                    <!--======= TABLE CHAIR ========= -->
                    <div class="row table_bottom_chair">
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img v-if="order.color" :src="'/images/table/' + order.color.color +'.png'" alt="table" style="transform: rotate(180deg);">
                            </div>
                        </div>
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img v-if="order.color" :src="'/images/table/' + order.color.color +'.png'" alt="table" style="transform: rotate(180deg);">
                            </div>
                        </div>
                        <div class="col" v-if="windowWidth > 280">
                            <div class="table_card_img text-align-center">
                                <img v-if="order.color" :src="'/images/table/' + order.color.color +'.png'" alt="table" style="transform: rotate(180deg);">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table__information padding">
                    <div class="guest_number">
                        <span class="table_info_text">No. of Guest : </span>
                        <span>{{ order.orders ? String(order.orders[0].person).padStart(2, '0') : '' }}</span>
                    </div>
                    <div class="date_time margin-top-half margin-bottom">
                        <span class="table_info_text">Date & Time : </span>
                        <span>{{ dateFormat(this.order.created_at) }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="padding-horizontal bottom-bar toolbar">
            <div class="row">
                <div class="col">
                    <f7-button class="button button-raised open-menu-button active button-large text-transform-capitalize" fill sheet-open=".demo-sheet-swipe-to-close" @click="showMenuData()">{{ $root.trans.open_menu }}</f7-button>
                </div>
                <div class="col">
                    <f7-button class="button button-raised open-menu-button button-large text-transform-capitalize" @click="cancelReservation()">{{ $root.trans.cancel_reservation }}</f7-button>
                </div>
            </div>
        </div>
        <Menu ref="menu" />
    </f7-page>
</template>

<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7Button,f7 } from 'framework7-vue';
import $ from 'jquery';
import VueCountdown from '@chenfengyuan/vue-countdown';
import { useCookies } from "vue3-cookies";
import Menu from './Menu.vue';
import axios from "axios";
import moment from 'moment'

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
    data() {
        return {
            time: 3600000,
            order: {
                color: [],
            },
            windowWidth : 0,
        }
    },
    setup() {
        const { cookies } = useCookies()
        return { cookies };
    },
    beforeCreate() {
        this.$root.addLoader();
    },
    created() {
        this.getWaitingTime();
        this.windowWidth = window.innerWidth;
        this.$root.removeLoader();
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

                axios.post('/api/cancel-reservation', {ids : ids, cancelled_by : 'Guest'})
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
                $('.dialog-text').css({'font-size': '18px', 'line-height': '22px', 'text-align':'center'});
                $('.dialog-title').html("<img src='/images/cross.png'>");
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
                this.order = res.data.table;
                if (parseInt(this.order.capacity_of_person) % 2 != 0) {
                    var cap = parseInt(this.order.capacity_of_person - 1);
                    var up_table = (parseInt(this.order.capacity_of_person) + 1) / 2;
                    var down_table = (parseInt(this.order.capacity_of_person) - 1) / 2;
                } else {
                    var cap = parseInt(this.order.capacity_of_person) - 2;
                    var up_table = parseInt(this.order.capacity_of_person) / 2;
                    var down_table = parseInt(this.order.capacity_of_person) / 2;
                }
                this.order['up_table'] = up_table;
                this.order['down_table'] = down_table;
            })
            .catch((err) => {
            });
        },
        dateFormat(date) {
            return moment(String(date)).format('DD, MMM YYYY / hh:mm a');
        },
        showMenuData() {
            if (this.$refs.menu) {
                this.$refs.menu.getCategories();
                this.$refs.menu.wishlistData();
            }
        },
    },

};
</script>

<style scoped>
/*============ WAITING INFO =============*/
.waiting_info{
    border: 1px solid #999;
    margin: 15px 15px 80px;
    border-radius: 10px;
}
.waiting_info .table_1{
    height: 145px;
    border-left: 10px solid rgb(255, 97, 97);
}
.table_inner {
	background: #fff4f1;
	padding: 10px 16px;
	margin-right: 10px;
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
    padding-bottom: 60px !important;
    padding-top: 10px !important;
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
    margin-bottom: 40px !important;
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
    font-size: 15px;
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

@media screen and (max-width : 280px){
    .table_order_content{
        justify-content: space-around !important;
    }
    .table_inner{
        padding: 5px 7px;
        margin-right: 0;
    }
}
@media screen and (max-width:320px) {
    .open-menu-button {
            font-size: 12px;
            line-height: 18px;
            height: 40px !important;
        }
}
</style>
<style>
.page-waiting .waiting-page .left{
    opacity: 0;
    visibility: hidden;
}
</style>
