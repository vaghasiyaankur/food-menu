<template>
    <f7-page class="page-waiting bg-color-white" @page:beforeremove="onPageBeforeRemove" @page:beforeout="onPageBeforeOut">
        <div v-if="qrcode">
            <div class="nav-bar">
                <f7-navbar class="navbar-menu text-color-white waiting-page" large transparent :title="trans.time" :back-link="trans.back">
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
                        <h3 v-if="time == 0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                <path d="M15.5711 3.05069C15.3504 2.82964 14.9924 2.82926 14.7717 3.04975L7.98967 9.81387L5.54274 7.15626C5.33131 6.92675 4.97383 6.91187 4.74393 7.12328C4.51422 7.33471 4.49951 7.69237 4.71094 7.92208L7.55643 11.0123C7.66064 11.1256 7.80648 11.1914 7.96026 11.1946C7.96439 11.1947 7.96838 11.1947 7.97233 11.1947C8.12177 11.1947 8.26553 11.1354 8.37144 11.0299L15.5699 3.85023C15.7912 3.62977 15.7915 3.27173 15.5711 3.05069Z" fill="#555555" stroke="#555555" stroke-width="0.3"/>
                                <path d="M15.4347 7.93466C15.1224 7.93466 14.8693 8.18772 14.8693 8.5C14.8693 12.0122 12.0122 14.8693 8.5 14.8693C4.98801 14.8693 2.13065 12.0122 2.13065 8.5C2.13065 4.98801 4.98801 2.13065 8.5 2.13065C8.81225 2.13065 9.06534 1.87759 9.06534 1.56534C9.06534 1.25307 8.81225 1 8.5 1C4.36445 1 1 4.36445 1 8.5C1 12.6354 4.36445 16 8.5 16C12.6354 16 16 12.6354 16 8.5C16 8.18775 15.7469 7.93466 15.4347 7.93466Z" fill="#555555" stroke="#555555" stroke-width="0.3"/>
                            </svg> {{ trans.booked }}</h3>
                        <h3 v-else>{{ trans.waiting_time }}</h3>
                        <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p> -->
                    </div>
                    <div class="countdown position-relative text-align-center">
                        <div style="background : url('/images/dots.png')"
                            class="display-flex justify-content-space-between align-items-center flex-direction-column">
                            <img src="/images/clock.png" alt="">
                            <p v-if="time == 0" class="no-margin margin-top-half font-20">{{ trans.your_turn }}</p>
                            <p v-else-if="time != 0" class="no-margin margin-top-half font-20">{{ remainingWaitingTime }}</p>
                            <!-- <vue-countdown v-else :time="time" v-slot="{ hours, minutes, seconds }">
                                <p class="no-margin margin-top-half font-20" v-if="String(hours).padStart(2, '0') != 0">{{ String(hours).padStart(2, '0') +' '+ trans.hour_and + ' ' +String(minutes).padStart(2, '0')+' '+trans.min_left}}</p>
                                <p class="no-margin margin-top-half font-20" v-else-if="String(minutes).padStart(2, '0') != 0">{{ String(minutes).padStart(2, '0')+' '+trans.min_left}}</p>
                                <p class="no-margin margin-top-half font-20" v-else-if="String(seconds).padStart(2, '0') != 0">{{ String(seconds).padStart(2, '0')+' '+trans.second_left}}</p>
                                <p class="no-margin margin-top-half font-20" v-else>{{ trans.your_turn }}</p>
                            </vue-countdown> -->
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
                                    <p class="no-margin">{{ trans.table_no }}</p>
                                    <span class="no-margin">{{ String(order.table_number).padStart(2, '0') }}</span>
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
                            <span class="table_info_text">{{ trans.number_guest }}  : </span>
                            <span>{{ order.orders ? String(order.orders[0].person).padStart(2, '0') : '' }}</span>
                        </div>
                        <div class="date_time margin-top-half">
                            <span class="table_info_text">{{ trans.date_time }} : </span>
                            <span>{{ order.orders ? dateFormat(order.orders[0].created_at) :  dateFormat(order.created_at)}}</span>
                        </div>
                        <div class="margin-top-half margin-bottom">
                            <span class="table_info_text">{{ trans.floor_no }} : </span>
                            <span>{{ order.floor ? order.floor.name : '' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="padding-horizontal bottom-bar toolbar">
                <div class="row">
                    <div class="col">
                        <f7-button class="button button-raised open-menu-button active button-large text-transform-capitalize" fill sheet-open=".demo-sheet-swipe-to-close" @click="showMenuData()">{{ trans.open_menu }}</f7-button>
                    </div>
                    <div class="col">
                        <f7-button class="button button-raised open-menu-button button-large text-transform-capitalize" v-if="time == 0" :style="'background : #a9a9a9 !important'">{{ trans.cancel_reservation }}</f7-button>
                        <f7-button class="button button-raised open-menu-button button-large text-transform-capitalize" v-else  @click="cancelReservation()">{{ trans.cancel_reservation }}</f7-button>
                    </div>
                </div>
            </div>
            <Menu ref="menuComponentRef" />
        </div>
        <div v-else >
            <NotFound />
        </div>
    </f7-page>
</template>

<script setup>
import { f7Page, f7Navbar, f7Button,f7 } from 'framework7-vue';
import $ from 'jquery';
import VueCountdown from '@chenfengyuan/vue-countdown';
import { useCookies } from "vue3-cookies";
import Menu from './Menu.vue';
import axios from "axios";
import moment from 'moment';
import NotFound from './NotFound.vue';
import { ref, inject, onMounted, onBeforeUnmount } from 'vue';

const time = ref(3600000);
const order = ref({ color: [] });
const windowWidth = ref(0);
const qrcode = ref('');
const remainingWaitingTime = ref('0 Second Left');
const intervalId = ref(null);
const { cookies } = useCookies();

const trans = inject('trans');
const menuComponentRef = ref(null);

onBeforeUnmount(() => {
    clearInterval(intervalId.value);
});

onMounted(() => {
    windowWidth.value = window.innerWidth;
    qrcode.value = window.location.href.split('/?qrcode=')[1];
    if (qrcode.value) {
        cookies.set("qrcode", qrcode.value, 60 * 60 * 24);
        getOrderData();
        getWaitingTime();
    }

    intervalId.value = setInterval(() => {
        getWaitingTime();
    }, 30000);
});

const onPageBeforeOut = () => {
    f7.sheet.close();
}

const onPageBeforeRemove = () => {
    f7.sheet.destroy();
}


const cancelReservation = () => {
    var ids = JSON.parse(cookies.get('orderId'));
    f7.dialog.confirm(trans.value.cancel_conformation_message, () => {

        axios.post('/api/cancel-reservation', {ids : ids, cancelled_by : 'Guest'})
        .then((res) => {
            cookies.remove("orderId");
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
        $('.dialog-button').eq(0).text(trans.value.cancel);
        $('.dialog-button').eq(1).removeClass('text-color-black').addClass('active').text(trans.value.ok);
        $('.dialog-buttons').addClass('margin-vertical padding-bottom');
    });
}

const getOrderData = () => {
    var ids = JSON.parse(cookies.get('orderId'));

    axios.post('/api/waiting-order-data', {ids : ids})
    .then((res) => {
        order.value = res.data.table;
        if (parseInt(order.value.capacity_of_person) % 2 != 0) {
            var cap = parseInt(order.value.capacity_of_person - 1);
            var up_table = (parseInt(order.value.capacity_of_person) + 1) / 2;
            var down_table = (parseInt(order.value.capacity_of_person) - 1) / 2;
        } else {
            var cap = parseInt(order.value.capacity_of_person) - 2;
            var up_table = parseInt(order.value.capacity_of_person) / 2;
            var down_table = parseInt(order.value.capacity_of_person) / 2;
        }
        order.value['up_table'] = up_table;
        order.value['down_table'] = down_table;
    })
    .catch((err) => {
    });
}

const getWaitingTime = () => {
    var ids = JSON.parse(cookies.get('orderId'));

    axios.post('/api/waiting-time', {ids : ids})
    .then((res) => {
        time.value = res.data.time;
        let hours = Math.floor(time.value / 3600000);
        let minutes = Math.floor((time.value % 3600000) / 60000);
        let seconds = Math.floor(((time.value % 3600000) % 60000) / 1000);
        if(hours > 0)  remainingWaitingTime.value = String(hours).padStart(2, '0') +' '+ trans.value.hour_and + ' ' +String(minutes).padStart(2, '0')+' '+trans.value.min_left;
        else if(minutes > 0) remainingWaitingTime.value = String(minutes).padStart(2, '0')+' '+trans.value.min_left;
        else if(seconds > 0) remainingWaitingTime.value = String(seconds).padStart(2, '0')+' '+trans.value.second_left;
        else{
            remainingWaitingTime.value = '0 Second Left';
            time.value = 0;
            // clearInterval(intervalId.value);
        }

        if(order.value.id !== res.data.table) getOrderData.value();
        
        if(res.data.finish){
            cookies.remove("orderId");
            window.location.reload();
        }
    })
    .catch((err) => {
    });
}

const dateFormat = (date) => {
    return moment(String(date)).format('DD, MMM YYYY / hh:mm a');
}

const showMenuData = () => {
    if (menuComponentRef.value) {
        menuComponentRef.value.getCategories();
        menuComponentRef.value.wishlistData();
    }
}
</script>
<style scoped>

.font-20{
    font-size: 20px;
}
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
    /* border-radius: 8px 8px 0px 0px; */
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
.not_found{
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.not_found h1{
    font-weight: 700;
    color: #F33E3E;
    font-size: 35px;
}
.not_found p{
    font-size: 17px;
    line-height: 18px;
    font-weight: 500;
    color: #F33E3E;;
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