<template>
<f7-page color="bg-color-white" @click="clickOut" @page:beforeremove="onPageBeforeRemove" @page:beforeout="onPageBeforeOut">

    <div v-if="qrToken && qrCodeExits">
        <div class="nav-bar">
            <div class="row align-items-center navbar-menu padding-vertical-half padding-horizontal justify-content-flex-start">
                <div class="menu col-33">
                    <div class="menu-inner color-black" v-if="langs.length > 1">
                        <div class="menu-item menu-item-dropdown bg-color-transparent language_dropdown">
                            <div class="row menu-item-content no-margin-top no-margin-bottom justify-content-center">
                                <div class="margin-right-half">
                                    <img src="/images/language.svg">
                                </div>
                            </div>
                            <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                                <div class="card menu-dropdown-content bg-color-white margin-left no-margin-top no-padding">
                                    <a href="#" class="language-list menu-dropdown-link menu-close justify-content-center text-color-black" :class="{ 'active': selectedLang == lang.id }" v-for="lang in langs" :key="lang" @click="languageTranslation(lang.id)">{{ lang.name }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-40 text-align-center">
                    <div class="text-color-white registration-text">{{ trans.registration }}</div>
                </div>
            </div>
        </div>
        <div class="padding-left padding-right register-from padding-top">
            <div class="text-align-center padding-top">
                <img src="/images/registerImage.png" alt="">
            </div>
            <div>
                <form class="list margin-vertical" id="register-form">
                    <input type="hidden" name="qrToken" :value="qrToken">
                    <div class="item-content item-input no-padding-left">
                        <div class="item-inner no-padding-right">
                            <div class="item-input-wrap margin-bottom-half margin-top-half">
                                <input type="text" v-model="reservation.name" name="customer_name" class="padding" :placeholder="trans.enter_name" @keyup="removeTimer()">
                            </div>
                        </div>
                    </div>
                    <div class="item-content item-input no-padding-left">
                        <div class="item-inner no-padding-right">
                            <div class="item-input-wrap margin-bottom-half">
                                <input type="email" v-model="reservation.email" name="email" class="padding" :placeholder="trans.enter_email" @keyup="removeTimer()">
                                </div>
                        </div>
                    </div>
                    <div class="item-content item-input no-padding-left">
                        <div class="item-inner no-padding-right">
                            <div class="item-input-wrap margin-bottom-half">
                                <input type="number" v-model="reservation.number" name="customer_number" class="padding" :placeholder="trans.phone_number" @keypress="checkNumberValidate" @keyup="removeTimer()">
                                </div>
                        </div>
                    </div>
                    <div class="item-content item-input no-padding-left">
                        <div class="item-inner no-padding-right">
                            <div class="item-input-wrap margin-bottom-half">
                                <input type="number" v-model="reservation.member" name="person" class="padding" :placeholder="trans.family_member" @keyup="floorAvailable(); removeTimer()"  @keypress="checkNumberValidate">
                                </div>
                        </div>
                    </div>
                    <div class="item-content item-input no-padding-left floor-selection">
                        <div class="item-inner no-padding-right">
                            <div class="item-input-wrap">
                                <div class="f-concise position-relative">
                                    <div id="selection-concise" class="floor--list">
                                        <div id="select-concise" class="input-dropdown-wrap"
                                        :class="{ 'disable-floor-list' : !floors || Object.keys(floors).length < 1 }"
                                            @click="reservation.member ? showFloorList = !showFloorList : ''"
                                        >
                                            {{ reservation.member ? showFloorName : 'Select Floor' }}
                                        </div>
                                        
                                        <ul id="location-select-list" class="dropdown_list" :class="{ 'display-none' : showFloorList }">

                                            <li class="concise p-1" :class="[{ 'active': reservation.floor == 0}, {'display-none' : floors.length < 2 }, {'display-block' : floors.length > 1 }]" @click="reservation.floor = 0; showFloorName = trans.earlier; showFloorList = true; removeTimer()">{{ trans.earlier }}</li>

                                            <li class="concise p-1" :class="{ 'active': reservation.floor == key }" @click="reservation.floor = key; showFloorName = floor; showFloorList = true; removeTimer()" v-for="(floor,key) in floors" :key="floor" :data-id="key"><span :data-id="key">{{ floor }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="no-padding-left display-flex align-items-center justify-content-space-between">
                        <label class="no-padding-left item-checkbox item-content">
                            <input type="checkbox" name="demo-checkbox" v-model="reservation.agree_condition" checked="checked" />
                            <i class="icon icon-checkbox margin-right-half"></i>
                            <div class="item-inner">
                                <div class="item-title padding-vertical-half">I agree to&nbsp;<f7-button class="no-padding term_condition" sheet-open=".demo-sheet">terms of service&nbsp;</f7-button> & <f7-button class="no-padding term_condition" sheet-open=".demo-sheet">&nbsp;Privacy Policy</f7-button></div>
                            </div>
                        </label>
                    </div>
                </form>
            </div>

            <div class="text-align-center margin-top">
                <a class="text-underline check-time-wait" :class="{ 'display-none': checkWaitingTime }" @click="checkTime" href="javascript:;">{{ trans.check_time }}</a>
                <div class="countdown_section position-relative margin-horizontal" :class="{ 'display-none' : !checkWaitingTime }">
                    <div style="background : url('/images/dots.png')">
                        <img src="/images/clock.png" alt="clock">
                        <i class="f7-icons font-13 padding-half margin-bottom close-countdown" @click="removeTimer()">xmark</i>
                        <!-- <vue-countdown :time="60 * 60 * 1000" v-slot="{ hours, minutes, seconds }"> -->
                            <p class="no-margin margin-top-half font-20">{{ waitingTime != "00:00" ? waitingTime + " " + hourMin : trans.no_waiting_time}}</p>
                        <!-- </vue-countdown> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="padding bottom-bar">
            <div class="row justify-content-start">
                <div class="col bottom-button margin-right">
                    <f7-button class="button border_radius_10 bg-color-white register-button button-raised text-color-black button-large text-transform-capitalize" @click="checkTimeForRegister" id="book_table">{{ trans.book_table }}</f7-button>
                </div>
                <div class="col bottom-button">
                    <f7-button class="button border_radius_10 bg-color-white register-button button-raised text-color-black button-large text-transform-capitalize" fill sheet-open=".demo-sheet-swipe-to-close" @click="title = 'Menu';showMenuData()" >{{ trans.menu }}</f7-button>
                </div>
            </div>
        </div>
        <Menu ref="menuComponentRef"></Menu>

        <!-- ========VIEW TERMS AND CONDITION========= -->
        <f7-sheet class="demo-sheet" :opened="sheetOpened" @sheet:closed="sheetOpened = false"
            style="height:auto; border-radius: 20px 20px 0px 0px;" backdrop>
            <!-- Scrollable sheet content -->
            <f7-page-content>
                <div class="card_header border_bottom">
                    <div class="row">
                        <div class="col">
                            <div class="border-popup"></div>
                        </div>
                    </div>
                    <div class="close-menu">
                        <f7-link sheet-close><i class="f7-icons font-25 text-color-black">xmark</i></f7-link>
                    </div>
                    <div class="block-title text-align-center font-18 text-color-black margin-top padding-vertical-half" medium="false">{{ trans.terms_conditions }}</div>
                </div>
                <f7-block class="no-margin terms_condition_main">
                    <p class="margin-top">Terms and Conditions agreements contain a broad range of guidelines for how you and
                        your users can use your service or site.</p>
                    <p>Here’s what you should include in your terms and conditions agreements to prevent such misunderstandings
                        and others:</p>
                    <div class="terms_condition">
                        <div class="terms_lists">
                            <h3 class="margin-bottom-half">1. Using our Services</h3>
                            <p class="padding-left margin-top-half">Unlike a Privacy Policy, you aren't legally required to have
                                a Terms and Conditions agreement. However, there are many reasons why you should draft one and
                                display it on your website.</p>
                        </div>
                        <div class="terms_lists">
                            <h3 class="margin-bottom-half">2. Your Account</h3>
                            <p class="padding-left margin-top-half">Unlike a Privacy Policy, you aren't legally required to have
                                a Terms and Conditions agreement. However, there are many reasons why you should draft one and
                                display it on your website.</p>
                        </div>
                        <div class="terms_lists">
                            <h3 class="margin-bottom-half">3. License</h3>
                            <p class="padding-left margin-top-half">Unlike a Privacy Policy, you aren't legally required to have
                                a Terms and Conditions agreement. However, there are many reasons why you should draft one and
                                display it on your website.</p>
                        </div>
                        <div class="terms_lists">
                            <h3 class="margin-bottom-half">4. Privacy Policy</h3>
                            <p class="padding-left margin-top-half">Unlike a Privacy Policy, you aren't legally required to have
                                a Terms and Conditions agreement. However, there are many reasons why you should draft one and
                                display it on your website.</p>
                        </div>
                    </div>
                    <div class="agree_button margin-bottom">
                        <f7-button class="button border_radius_10 button-raised button-large" sheet-close @click="agreeWithCondition()">{{ trans.agree }}</f7-button>
                    </div>
                </f7-block>
            </f7-page-content>
        </f7-sheet>
        <!-- ========VIEW TERMS AND CONDITION END========= -->
    </div>

    <div v-else>
        <NotFound />
    </div>

</f7-page>
</template>

<script setup>
import $ from "jquery";
import { ref, onMounted, inject } from 'vue';
import { useCookies } from "vue3-cookies";
import Framework7 from 'framework7/lite/bundle';
import VueCountdown from '@chenfengyuan/vue-countdown';
import axios from "axios";
import { addLoader, removeLoader, errorNotification } from '../../commonFunction.js';

import Menu from "./Menu.vue";
import NotFound from './NotFound.vue';

import {
    f7Page,
    f7Navbar,
    f7BlockTitle,
    f7PageContent,
    f7,
    f7Block,
    f7Row,
    f7Col,
    f7Button,
    f7Menu,
    f7MenuItem,
    f7MenuDropdown,
    f7MenuDropdownItem,
    f7Sheet,
    f7Toolbar,
    f7Link
} from 'framework7-vue';

// State
const display = ref(true);
const app = Framework7;
const name = ref('');
const number = ref('');
const member = ref('');
const location = ref('');
const checkWaitingTime = ref(false);
const floors = ref([]);
const reservation = ref({
    name: '',
    number: '',
    member: '',
    email: '',
    floor: null,
    agree_condition: true,
});
const memberLimit = ref(0);
const waitingTime = ref('00:00');
const showFloorList = ref(true);
const showFloorName = ref('Select Floor');
const qrToken = ref('');
const qrCodeExits = ref(null);
const hourMin = ref('Minutes');
const closeReservation = ref(null);
const { cookies } = useCookies();
const sheetOpened = ref(false);
const menuComponentRef = ref(null);

const langs = inject('langs');
const trans = inject('trans');
const selectedLang = inject('selectedLang');
const languageTranslation = inject('languageTranslation')

onMounted(() => {
    addLoader();
    setTimeout(() => {
        qrToken.value = f7.view.current.router.currentRoute.query.qrcode;
        if (qrToken.value) {
        axios.post('/api/check-qrcode-exists', { qrToken: qrToken.value })
            .then((res) => {
            qrCodeExits.value = res.data.qrcode_exist;
            if (res.data.qrcode_exist) {
                cookies.set('qrcode', qrToken.value, 60 * 60 * 24);
                memberLimitation();
                checkOrder();
            }
            removeLoader();
            });
        } else {
        removeLoader();
        }
    }, 500);
});

// onMounted(() => {
//     $('.navbar-bg').remove();
//     $('.page-content').css('padding-top', 0);
//     setTimeout(() => {
//         if (qrCodeExits.value) {
//         checkReservation();
//         }
//     }, 2000);
// });

const checkReservation = async () => {
    await axios.get('/api/check-reservation-enable?qrcode='+qrToken.value)
    .then((res) => {
        closeReservation.value = res.data.close_reservation;
        if(res.data.close_reservation == 1){
            errorNotification("Currently, the restaurant is closed");
            return false;
        }
    });
}

const memberLimitation = () => {
    axios.get('/api/member-limitation')
    .then((res) => {
        memberLimit.value = res.data.member_capacity;
    })
}

const checkOrder = () => {
    var orderIds = JSON.parse(cookies.get('orderId'));
    if(orderIds == 'undefined' || !orderIds)  var orderIds = [];

    axios.post('/api/check-order', {orderIds : orderIds})
    .then((res) => {
        if(res.data.orderremaining) {
            f7.view.main.router.navigate({ url: '/waiting/' });
        }else{
            cookies.remove("orderId")
        }

    })
}

const onPageBeforeOut = () => {
    f7.sheet.close();
}

const onPageBeforeRemove = () => {
    f7.sheet.destroy();

    // const self = this;
    // // Destroy sheet modal when page removed
    // if (self.sheet) self.sheet.destroy();
}

const checkTime = async () => {
    await checkReservation()
    if(closeReservation.value == 0){
        if(!reservation.value.name || !reservation.value.number || !reservation.value.member){
            errorNotification(trans.value.reservation_error);
            return false;
        } else if (parseInt(reservation.value.member) > parseInt(memberLimit.value)) {
            errorNotification(trans.value.capacity_error);
            return false;
        } else if (reservation.value.number.toString().length != 10) {
            errorNotification(trans.value.number_error);
        }else if(!reservation.value.agree_condition){
            errorNotification(trans.value.accept_term_cond); 
            return false;
        }else{
            // var formData = new FormData();
            // formData.append('person', reservation.value.member);
            // formData.append('floor', reservation.value.floor);
            // formData.append('role', 'Guest');
            // formData.append('qrToken', qrToken.value);

            var formData = new FormData(document.getElementById('register-form'));
            ['customer_name', 'customer_number'].forEach(key => formData.delete(key));
            formData.append('floor', reservation.value.floor);
            formData.append('role', 'Guest');

            axios.post('/api/check-time', formData)
            .then((res) => {
                if(res.data.success){
                    waitingTime.value = res.data.waiting_time;
                    hourMin.value = res.data.hour_min;
                    checkWaitingTime.value = true;
                }
                else{
                    errorNotification(res.data.message); 
                    return false;
                }
            });
        }
    }
}

const getFloors = () => {
    axios.get('/api/get-floors-data')
    .then((res) => {
        floors.value = res.data;
    })
}

const checkTimeForRegister = async () => {
    await checkReservation();

    if(closeReservation.value == 0){
        if(!reservation.value.name || !reservation.value.number || !reservation.value.member){
            errorNotification(trans.value.reservation_error); return false;
        }else if(parseInt(reservation.value.member) > parseInt(memberLimit.value)){
            errorNotification(trans.value.capacity_error); return false;
        } else if (reservation.value.number.toString().length != 10) {
            errorNotification(trans.value.number_error); return false;
        }else if(!reservation.value.agree_condition){
            errorNotification(trans.value.accept_term_cond); return false;
        }else if (!reservation.value.floor) {
            errorNotification(trans.value.select_floor); return false;
        }
        // var formData = new FormData();
        // formData.append('person', reservation.value.member);
        // formData.append('floor', reservation.value.floor);
        // formData.append('role', 'Guest');
        // formData.append('qrToken', qrToken.value);

        var formData = new FormData(document.getElementById('register-form'));
        ['customer_name', 'customer_number'].forEach(key => formData.delete(key));
        formData.append('floor', reservation.value.floor);
        // formData.append('email', reservation.value.email);
        formData.append('role', 'Guest');

        axios.post('/api/check-time', formData)
        .then((res) => {
            if(res.data.success){
                hourMin.value = res.data.hour_min;
                waitingTime.value = res.data.waiting_time;
                register();
            }
            else{
                errorNotification(res.data.message); 
                return false;
            }
        });
    }
}

const register = () => {
    if(reservation.value.agree_condition) var agreeCondition = 1;
    else var agreeCondition = 0;

    if(waitingTime.value == '00:00'){
        var conformation_message = trans.value.no_waiting_message;
    }else{
        var conformation_message = trans.value.conformation_message.replace('@waiting', waitingTime.value + " " + hourMin.value);
    }

    f7.dialog.confirm(conformation_message, () => {

        // var formData = new FormData();
        // formData.append('customer_name', reservation.value.name);
        // formData.append('customer_number', reservation.value.number);
        // formData.append('person', reservation.value.member);
        // formData.append('floor', reservation.value.floor);
        // formData.append('role', 'Guest');
        // formData.append('agree_condition', agreeCondition);
        // formData.append('qrToken', qrToken.value);
        
        var form = document.getElementById('register-form');
        var formData = new FormData(form);
        formData.append('role', 'Guest');
        formData.append('email', reservation.value.email);
        formData.append('agree_condition', agreeCondition);

        axios.post('/api/add-reservation', formData)
        .then((res) => {
            var orderId = res.data.orderId;
            var cookieArray = JSON.parse(cookies.get('orderId'));
            if(cookieArray == 'undefined' || !cookieArray) var cookieArray = [];
            cookieArray.push(orderId);
            cookies.set("orderId", JSON.stringify(cookieArray), 60 * 60 * 24);

            f7.dialog.alert(trans.value.success, () => {
                document.getElementById('book_table').classList.remove('active');
                f7.view.main.router.navigate({ url: '/waiting/' });
            });

            setTimeout(() => {
                $('.dialog-title').html("<img src='/images/success.png'>");
                $('.dialog-button').addClass('col button button-raised button-large text-transform-capitalize active').text(trans.value.ok);
                $('.dialog-button').css('width', '50%');
                $('.dialog-text').css({'text-align': 'center'});
            }, 10);
        })
        .catch((err) => {
            errorNotification(err.response.data.error); 
            return false;
        });
    });

    setTimeout(() => {
        $('.dialog-title').css({'font-size': '20px'});
        $('.dialog-text').css({'font-size': '18px', 'line-height': '22px', 'text-align':'center'});
        $('.dialog-title').html("<img src='/images/usericon.png'>");
        $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
        $('.dialog-button').eq(0).text(trans.value.cancel);
        $('.dialog-button').eq(1).removeClass('text-color-black').addClass('active').text(trans.value.ok);
        $('.dialog-buttons').addClass('margin-vertical padding-bottom');
    },10);
}

const showMenuData = () => {
    if (menuComponentRef.value) {
        menuComponentRef.value.getCategories();
        menuComponentRef.value.wishlistData();
    }
}

const checkNumberValidate = (evt) => {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
        evt.preventDefault();;
    } else {
        return true;
    }
}

const floorAvailable = () => {
    if(reservation.value.member){
        showFloorName.value = 'Select Floor';
        axios.post('/api/floor-available', {'member' : reservation.value.member})
        .then((res) => {
            if(res.data.success){
                reservation.value.floor = null;
                floors.value = res.data.floors;
            }
        });
    }else{
        showFloorName.value = 'Select Floor';
        floors.value = {};
    }
}

const setDeviceToken = (userId) => {
    var firebaseConfig = {
        apiKey: "AIzaSyBfphAIxpzsJDUuCCOhF6DtZKqUPxgj-wA",
        authDomain: "fir-test-25564.firebaseapp.com",
        projectId: "fir-test-25564",
        storageBucket: "fir-test-25564.appspot.com",
        messagingSenderId: "1064311492584",
        appId: "1:1064311492584:web:4842b73ccef0b65aeade5d",
        measurementId: "G-B3L0LYKB05"
    };
    firebase.initializeApp(firebaseConfig);

    const messaging = firebase.messaging();


    messaging
    .requestPermission()
    .then(function () {
        return messaging.getToken()
    })
    .then(function(token) {
        if(token){
            axios.post('/api/set-device-token', {'user_id' : userId, 'token' : token})
            .then((res) => {
                if(res.data.success){
                    console.log('token saved succesfully');
                }
            });
        }

    }).catch(function (err) {
        console.log('User Notification Token Error : '+ err);
    });
}

const agreeWithCondition = () => {
    reservation.value.agree_condition = true;
}

const clickOut = () => {
    const floor_list = event.target.parentNode.classList.contains('floor--list');
    if (!floor_list) {
        showFloorList.value = true;
    }
}

const removeTimer = () => {
    checkWaitingTime.value = null
}
</script>
