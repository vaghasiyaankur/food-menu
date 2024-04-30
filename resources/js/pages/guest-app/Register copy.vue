<template>
<f7-page color="bg-color-white" @click="clickout" @page:beforeremove="onPageBeforeRemove" @page:beforeout="onPageBeforeOut">

    <div v-if="qrToken && qrCodeExits">
        <div class="nav-bar">
            <div class="row align-items-center navbar-menu padding-vertical-half padding-horizontal justify-content-flex-start">
                <div class="menu col-33">
                    <div class="menu-inner color-black" v-if="$root.langs.length > 1">
                        <div class="menu-item menu-item-dropdown bg-color-transparent language_dropdown">
                            <div class="row menu-item-content no-margin-top no-margin-bottom justify-content-center">
                                <div class="margin-right-half">
                                    <img src="/images/language.svg">
                                </div>
                            </div>
                            <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                                <div class="card menu-dropdown-content bg-color-white margin-left no-margin-top no-padding">
                                    <a href="#" class="menu-dropdown-link menu-close justify-content-center text-color-black" :class="{ 'active': $root.selectedLang == lang.id }" v-for="lang in $root.langs" :key="lang" @click="$root.languageTranslation(lang.id)">{{ lang.name }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-40 text-align-center">
                    <div class="text-color-white registration-text">{{ $root.trans.registration }}</div>
                </div>
            </div>
        </div>
        <div class="padding-left padding-right register-from padding-top">
            <div class="text-align-center padding-top">
                <img src="/images/registerImage.png" alt="">
            </div>
            <div>
                <form class="list margin-vertical" id="my-form">
                    <div class="item-content item-input no-padding-left">
                        <div class="item-inner no-padding-right">
                            <div class="item-input-wrap margin-bottom-half margin-top-half">
                                <input type="text" v-model="reservation.name" name="name" class="padding" :placeholder="$root.trans.enter_name" @keyup="removeTimer()">
                            </div>
                        </div>
                    </div>

                    <div class="item-content item-input no-padding-left">
                        <div class="item-inner no-padding-right">
                            <div class="item-input-wrap margin-bottom-half">
                                <input type="number" v-model.number="reservation.number" name="number" class="padding" :placeholder="$root.trans.phone_number" @keypress="checknumbervalidate" @keyup="removeTimer()">
                                </div>
                        </div>
                    </div>
                    <div class="item-content item-input no-padding-left">
                        <div class="item-inner no-padding-right">
                            <div class="item-input-wrap margin-bottom-half">
                                <input type="number" v-model="reservation.member" name="member" class="padding" :placeholder="$root.trans.family_member" @keyup="floorAvailable(); removeTimer()"  @keypress="checknumbervalidate">
                                </div>
                        </div>
                    </div>
                    <div class="item-content item-input no-padding-left floor-selection">
                        <div class="item-inner no-padding-right">
                            <div class="item-input-wrap">
                                <div class="f-concise position-relative">
                                    <div id="selection-concise" class="floor--list">
                                        <div id="select-concise" class="input-dropdown-wrap" :class="{ 'disable-floor-list' : !Object.keys(this.floors).length}" @click="reservation.member ? showFloorList = !showFloorList : ''">{{ reservation.member ? showFloorName : 'Select floor' }}</div>
                                        
                                        <ul id="location-select-list" class="dropdown_list" :class="{ 'display-none' : showFloorList }">

                                            <li class="concise p-1" :class="[{ 'active': reservation.floor == 0}, {'display-none' : Object.keys(this.floors).length < 2 }, {'display-block' : Object.keys(this.floors).length > 1 }]" @click="reservation.floor = 0; showFloorName = $root.trans.earlier; showFloorList = true; removeTimer()">{{ $root.trans.earlier }}</li>

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
                <a class="text-underline check-time-wait" :class="{ 'display-none': checkWaitingTime }" @click="checkTime" href="javascript:;">{{ $root.trans.check_time }}</a>
                <div class="countdown_section position-relative margin-horizontal" :class="{ 'display-none' : !checkWaitingTime }">
                    <div style="background : url('/images/dots.png')">
                        <img src="/images/clock.png" alt="clock">
                        <i class="f7-icons font-13 padding-half margin-bottom close-countdown" @click="removeTimer()">xmark</i>
                        <!-- <vue-countdown :time="60 * 60 * 1000" v-slot="{ hours, minutes, seconds }"> -->
                            <p class="no-margin margin-top-half font-20">{{ waiting_time != "00:00" ? waiting_time + " " + hour_min : $root.trans.no_waiting_time}}</p>
                        <!-- </vue-countdown> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="padding bottom-bar">
            <div class="row justify-content-start">
                <div class="col bottom-button margin-right">
                    <f7-button class="button border_radius_10 bg-color-white register-button button-raised text-color-black button-large text-transform-capitalize" @click="checkTimeForRegister" id="book_table">{{ $root.trans.book_table }}</f7-button>
                </div>
                <div class="col bottom-button">
                    <f7-button class="button border_radius_10 bg-color-white register-button button-raised text-color-black button-large text-transform-capitalize" fill sheet-open=".demo-sheet-swipe-to-close" @click="title = 'Menu';showMenuData()" >{{ $root.trans.menu }}</f7-button>
                </div>
            </div>
        </div>
        <Menu ref="menu"></Menu>

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
                    <div class="block-title text-align-center font-18 text-color-black margin-top padding-vertical-half" medium="false">{{ $root.trans.terms_conditions }}</div>
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
                        <f7-button class="button border_radius_10 button-raised button-large" sheet-close @click="agreewithcondition()">{{ $root.trans.agree }}</f7-button>
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

<script>
import $ from "jquery";
import { useCookies } from "vue3-cookies";
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
import Framework7 from 'framework7/lite/bundle';
import { onMounted } from 'vue';
import VueCountdown from '@chenfengyuan/vue-countdown';
import axios from "axios";

export default {
    components: {
        Menu,
        f7Page,
        f7Navbar,
        f7BlockTitle,
        f7Block,
        f7Row,
        f7Col,
        f7Button,
        f7Menu,
        f7MenuItem,
        f7MenuDropdown,
        f7MenuDropdownItem,
        f7Sheet,
        f7PageContent,
        VueCountdown,
        f7Toolbar,
        f7Link,
        NotFound
    },
    data() {
        return {
            display: true,
            app: Framework7,
            name: '',
            number: '',
            member: '',
            location: '',
            checkWaitingTime: false,
            floors: [],
            reservation: {
                name: '',
                number: '',
                member: '',
                floor: null,
                agree_condition: true
            },
            member_limit : 0,
            waiting_time: '00:00',
            showFloorList: true,
            showFloorName: 'Select Floor',
            qrToken : '',
            qrCodeExits : null,
            hour_min : 'Minutes',
            close_reservation : null,
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
        // this.getFloors();
        setTimeout(() => {
            this.qrToken = f7.view.current.router.currentRoute.query.qrcode;
            if(this.qrToken){
                axios.post('/api/check-qrcode-exists',{ qrToken : this.qrToken})
                .then((res) => {
                    this.qrCodeExits = res.data.qrcode_exist;
                    if(res.data.qrcode_exist){
                        this.cookies.set("qrcode", this.qrToken, 60 * 60 * 24);
                        this.memberLimitation();
                        this.checkOrder();
                    }
                    this.$root.removeLoader();
                })
            }else{
                this.$root.removeLoader();
            }
        },500);
    },
    mounted() {
        $('.navbar-bg').remove();
        $(".page-content").css('padding-top', 0);
        setTimeout(() => {
            if(this.qrCodeExits){
                this.checkreservation();
            }
        }, 2000);
    },
    methods: {
        checkreservation() {
            axios.get('/api/check-reservation-enable?qrcode='+this.qrToken)
            .then((res) => {
                this.close_reservation = res.data.close_reservation;
                if(res.data.close_reservation == 1){
                    this.errorNotification("Currently, the restaurant is closed");return false;
                }
            });
        },
        memberLimitation() {
            axios.get('/api/member-limitation')
            .then((res) => {
                this.member_limit = res.data.member_capacity;
            })
        },
        checkOrder() {
            var orderIds = JSON.parse(this.cookies.get('orderId'));
            if(orderIds == 'undefined' || !orderIds)  var orderIds = [];

            axios.post('/api/check-order', {orderIds : orderIds})
            .then((res) => {
                if(res.data.orderremaining) {
                    f7.view.main.router.navigate({ url: '/waiting/' });
                }else{
                    this.cookies.remove("orderId")
                }

            })
        },
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
        checkTime() {
            this.checkreservation()
            if(this.close_reservation == 0){
                if(!this.reservation.name || !this.reservation.number || !this.reservation.member){
                    this.errorNotification(this.$root.trans.reservation_error); return false;
                } else if (parseInt(this.reservation.member) > parseInt(this.member_limit)) {
                    this.errorNotification(this.$root.trans.capacity_error); return false;
                    // this.errorNotification(this.$root.trans.capacity_error.replace(/@person/g, this.member_limit)); return false;
                } else if (this.reservation.number.toString().length != 10) {
                    this.errorNotification(this.$root.trans.number_error);
                }else if(!this.reservation.agree_condition){
                    this.errorNotification(this.$root.trans.accept_term_cond); return false;
                }else{
                    var formData = new FormData();
                    formData.append('person', this.reservation.member);
                    formData.append('floor', this.reservation.floor);
                    formData.append('role', 'Guest');
                    formData.append('qrToken', this.qrToken);

                    axios.post('/api/check-time', formData)
                    .then((res) => {
                        if(res.data.success){
                            this.waiting_time = res.data.waiting_time;
                            this.hour_min = res.data.hour_min;
                            this.checkWaitingTime = true;
                        }
                        else{
                            this.errorNotification(res.data.message); return false;
                        }
                    });
                }
            }

        },
        successNotification(notice) {
            var notificationFull = f7.notification.create({
                title: '<img src="/images/check-icon.png">' + notice ,
                closeTimeout: 3000,
                closeOnClick: true,
                cssClass: 'success--notification'

            });
            notificationFull.open();
            $('.notification-header').append('<div><i class="f7-icons">xmark</i></div>');
            $('.notification-content').remove();
        },
        errorNotification(notice) {
            var notificationFull = f7.notification.create({
                title: '<img src="/images/cross-icon.png">' + notice,
                closeTimeout: 3000,
                closeOnClick: true,
                cssClass: 'error--notification'

            });
            notificationFull.open();
            $('.notification-header').append('<div><i class="f7-icons">xmark</i></div>');
            $('.notification-content').remove();
        },
        getFloors() {
            axios.get('/api/get-floors-data')
            .then((res) => {
                this.floors = res.data;
            })
        },
        checkTimeForRegister() {
            this.checkreservation();
            if(this.close_reservation == 0){
                if(!this.reservation.name || !this.reservation.number || !this.reservation.member){
                    this.errorNotification(this.$root.trans.reservation_error); return false;
                }else if(parseInt(this.reservation.member) > parseInt(this.member_limit)){
                    this.errorNotification(this.$root.trans.capacity_error); return false;
                    // this.errorNotification(this.$root.trans.capacity_error.replace(/@person/g, this.member_limit)); return false;
                } else if (this.reservation.number.toString().length != 10) {
                    this.errorNotification(this.$root.trans.number_error); return false;
                }else if(!this.reservation.agree_condition){
                    this.errorNotification(this.$root.trans.accept_term_cond); return false;
                }

                var formData = new FormData();
                formData.append('person', this.reservation.member);
                formData.append('floor', this.reservation.floor);
                formData.append('role', 'Guest');
                formData.append('qrToken', this.qrToken);

                axios.post('/api/check-time', formData)
                .then((res) => {
                    if(res.data.success){
                        this.waiting_time = res.data.waiting_time;
                        this.register();
                    }
                    else{
                        this.errorNotification(res.data.message); return false;
                    }
                });
            }
        },
        register() {
            if(this.reservation.agree_condition) var agree_condition = 1;
            else var agree_condition = 0;

            if(this.waiting_time == '00:00'){
                var conformation_message = this.$root.trans.no_waiting_message;
            }else{
                var conformation_message = this.$root.trans.conformation_message.replace('@waiting', this.waiting_time);
            }

            f7.dialog.confirm(conformation_message, () => {

                var formData = new FormData();
                formData.append('customer_name', this.reservation.name);
                formData.append('customer_number', this.reservation.number);
                formData.append('person', this.reservation.member);
                formData.append('floor', this.reservation.floor);
                formData.append('role', 'Guest');
                formData.append('agree_condition', agree_condition);
                formData.append('qrToken', this.qrToken);

                axios.post('/api/add-reservation', formData)
                .then((res) => {
                    var orderId = res.data.orderId;
                    var cookieArray = JSON.parse(this.cookies.get('orderId'));
                    if(cookieArray == 'undefined' || !cookieArray) var cookieArray = [];
                    cookieArray.push(orderId);
                    this.cookies.set("orderId", JSON.stringify(cookieArray), 60 * 60 * 24);

                    f7.dialog.alert(this.$root.trans.success, () => {
                        document.getElementById('book_table').classList.remove('active');
                        f7.view.main.router.navigate({ url: '/waiting/' });
                    });

                    setTimeout(() => {
                        $('.dialog-title').html("<img src='/images/success.png'>");
                        $('.dialog-button').addClass('col button button-raised button-large text-transform-capitalize active').text(this.$root.trans.ok);
                        $('.dialog-button').css('width', '50%');
                        $('.dialog-text').css({'text-align': 'center'});
                    }, 10);
                })
                .catch((err) => {
                    this.errorNotification(err.response.data.error); return false;
                });
            });

            setTimeout(() => {
                $('.dialog-title').css({'font-size': '20px'});
                $('.dialog-text').css({'font-size': '18px', 'line-height': '22px', 'text-align':'center'});
                $('.dialog-title').html("<img src='/images/usericon.png'>");
                $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
                $('.dialog-button').eq(0).text(this.$root.trans.cancel);
                $('.dialog-button').eq(1).removeClass('text-color-black').addClass('active').text(this.$root.trans.ok);
                $('.dialog-buttons').addClass('margin-vertical padding-bottom');
            },10);
        },
        showMenuData() {
            if (this.$refs.menu) {
                this.$refs.menu.getCategories();
                this.$refs.menu.wishlistData();
            }
        },
        checknumbervalidate(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                evt.preventDefault();;
            } else {
                return true;
            }
        },
        floorAvailable() {
            if(this.reservation.member){
                this.showFloorName = 'Select Floor';
                axios.post('/api/floor-available', {'member' : this.reservation.member})
                .then((res) => {
                    if(res.data.success){
                        this.reservation.floor = null;
                        this.floors = res.data.floors;
                    }
                });
            }else{
                this.showFloorName = 'Select Floor';
                this.floors = {};
            }
        },
        setDeviceToken(userId) {
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
        },
        agreewithcondition() {
            this.reservation.agree_condition = true;
        },
        clickout(){
            const floor_list = event.target.parentNode.classList.contains('floor--list');
            if (!floor_list) {
                this.showFloorList = true;
            }
        },
        removeTimer() {
            this.checkWaitingTime = null;
        }
    }
}
</script>
