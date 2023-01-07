<template>
<f7-page color="bg-color-white" @click="clickout" @page:beforeremove="onPageBeforeRemove" @page:beforeout="onPageBeforeOut">

    <div v-if="qrToken && qr_token_exist">
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
                                    <a href="#" class="menu-dropdown-link menu-close justify-content-center text-color-black" :class="{ 'active': $root.selected_lang == lang.id }" v-for="lang in $root.langs" :key="lang" @click="$root.languageTranslation(lang.id)">{{ lang.name }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-40 text-align-center">
                    <div class="text-color-white registraion-text">{{ $root.trans.registration }}</div>
                </div>
            </div>
        </div>
        <div class="margin-left margin-right register-from margin-top">
            <div class="text-align-center padding-top">
                <img src="/images/registerImage.png" alt="">
            </div>
            <div>
                <form class="list margin-vertical" id="my-form">
                    <div class="item-content item-input no-padding-left">
                        <div class="item-inner no-padding-right">
                            <!-- <div class="item-title item-label">Name</div> -->
                            <div class="item-input-wrap margin-bottom-half margin-top-half">
                                <input type="text" v-model="reservation.name" name="name" class="padding" :placeholder="$root.trans.enter_name">
                            </div>
                        </div>
                    </div>

                    <div class="item-content item-input no-padding-left">
                        <div class="item-inner no-padding-right">
                            <!-- <div class="item-title item-label">Phone number</div> -->
                            <div class="item-input-wrap margin-bottom-half"><input type="text" v-model.number="reservation.number" name="number" class="padding" :placeholder="$root.trans.phone_number" minlength="10" maxlength="10" @keypress="checknumbervalidate"></div>
                        </div>
                    </div>
                    <div class="item-content item-input no-padding-left">
                        <div class="item-inner no-padding-right">
                            <!-- <div class="item-title item-label">Family member number</div> -->
                            <div class="item-input-wrap margin-bottom-half"><input type="number" v-model="reservation.member" name="member" class="padding" :placeholder="$root.trans.family_member" @keyup="floorAvailable"></div>
                        </div>
                    </div>
                    <div class="item-content item-input no-padding-left floor-selection">
                        <div class="item-inner no-padding-right">
                            <div class="item-input-wrap">
                                <div class="f-concise position-relative">
                                    <div id="selection-concise" class="floor--list">
                                        <div id="select-concise" class="input-dropdown-wrap" @click="showFloorList = !showFloorList">{{ showFloorName }}</div>
                                        <ul id="location-select-list" class="dropdown_list" :class="{ 'display-none' : showFloorList }">
                                            <li class="concise p-1" :class="{ 'active': reservation.floor == 0 }" @click="reservation.floor = 0; showFloorName = $root.trans.earlier; showFloorList = true">{{ $root.trans.earlier }}</li>
                                            <li class="concise p-1" :class="{ 'active': reservation.floor == key }" @click="reservation.floor = key; showFloorName = floor; showFloorList = true" v-for="(floor,key) in floors" :key="floor" :data-id="key"><span :data-id="key">{{ floor }}</span></li>
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
                        <i class="f7-icons font-13 padding-half margin-bottom close-countdown" @click="(checkWaitingTime = false)">xmark</i>
                        <!-- <vue-countdown :time="60 * 60 * 1000" v-slot="{ hours, minutes, seconds }"> -->
                            <p class="no-margin font-30">{{ waiting_time }}</p>
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
    mounted() {
        $('.navbar-bg').remove();
        $(".page-content").css('padding-top', 0);
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
                floor: 0,
                agree_condition: false
            },
            member_limit : 0,
            waiting_time: '00:00',
            showFloorList: true,
            showFloorName: '',
            qrToken : '',
            qr_token_exist : null,
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
                    this.qr_token_exist = res.data.qrcode_exist;
                    if(res.data.qrcode_exist){
                        this.cookies.set("qrcode", this.qrToken, 60 * 60 * 24);
                        this.memberLimitation();
                        this.checkOrder();
                    }
                    this.$root.removeLoader();
                })
            }
        },500);
    },
    methods: {
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
            if(!this.reservation.name || !this.reservation.number || !this.reservation.member){
                this.errornotification(this.$root.trans.reservation_error); return false;
            } else if (parseInt(this.reservation.member) > parseInt(this.member_limit)) {
                this.errornotification(this.$root.trans.capacity_error.replace(/@person/g, this.member_limit)); return false;
            } else if (this.reservation.number.toString().length != 10) {
                this.errornotification(this.$root.trans.number_error);
            }else if(!this.reservation.agree_condition){
                this.errornotification(this.$root.trans.accept_term_cond); return false;
            }else{
                var formData = new FormData();
                formData.append('person', this.reservation.member);
                formData.append('floor', this.reservation.floor);

                axios.post('/api/check-time', formData)
                .then((res) => {
                    if(res.data.success){
                        this.waiting_time = res.data.waiting_time;
                        this.checkWaitingTime = true;
                    }
                    else{
                        this.errornotification(res.data.message); return false;
                    }
                });
            }
        },
        successnotification(notice) {
            var notificationFull = f7.notification.create({
                title: '<img src="/images/checkicon.png">' + notice ,
                closeTimeout: 2000,
                closeOnClick: true,
                cssClass: 'success--notification'

            });
            notificationFull.open();
            $('.notification-header').append('<div><i class="f7-icons">xmark</i></div>');
            $('.notification-content').remove();
        },
        errornotification(notice) {
            var notificationFull = f7.notification.create({
                title: '<img src="/images/crossicon.png">' + notice ,
                closeTimeout: 2000,
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
            if(!this.reservation.name || !this.reservation.number || !this.reservation.member){
                this.errornotification(this.$root.trans.reservation_error); return false;
            }else if(parseInt(this.reservation.member) > parseInt(this.member_limit)){
                this.errornotification(this.$root.trans.capacity_error.replace(/@person/g, this.member_limit)); return false;
            } else if (this.reservation.number.toString().length != 10) {
                this.errornotification(this.$root.trans.number_error); return false;
            }

            var formData = new FormData();
            formData.append('person', this.reservation.member);
            formData.append('floor', this.reservation.floor);

            axios.post('/api/check-time', formData)
            .then((res) => {
                if(res.data.success){
                    this.waiting_time = res.data.waiting_time;
                    this.register();
                }
                else{
                    this.errornotification(res.data.message); return false;
                }
            });

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
                    }, 50);
                })
                .catch((err) => {
                    this.errornotification(err.response.data.error); return false;
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
            },50);
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
                axios.post('/api/floor-available', {'member' : this.reservation.member})
                .then((res) => {
                    if(res.data.success){
                        this.reservation.floor = 0;
                        this.floors = res.data.floors;
                    }
                });
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
        }
    }
}
</script>

<style scoped>
.height_100{
    height: 100%;
}

.list .item-title{
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: 400;
    font-size: 14px;
    line-height: 17px;
}
.position-relative{
    position: relative;
}
/*=======NAVBAR =========*/
/*.language_dropdown{
    background: #FFFFFF;
    box-shadow: 0.7px 0.7px 5px rgba(0, 0, 0, 0.2);
    border-radius: 3px;
}*/
.border_bottom{
    border-bottom: 1px solid #DBDBDB;
}
/*.d-flex{
    display: flex;
}*/
/*.justify_content_between{
    justify-content: space-between;
}*/
#select-concise{
    background-color: #FAFAFA !important;
    border-radius: 10px;
    height: 40px;
    display: flex;
    align-items: center;
    padding-left: 16px;
}
#location-select-list{
    position: absolute;
    width: 100%;
    z-index: 999;
    background-color: #fff;
    box-shadow: 0.7px 0.7px 5px rgba(0, 0, 0, 0.2);
    border-radius: 3px;
    max-height: 220px;
    overflow: auto;
}
#location-select-list li.concise{
    padding: 10px;
}
#location-select-list li.concise:first-child{
    border-radius: 3px 3px 0px 0px;
}

.terms_condition_main{
    height: calc(100vh - 171px);
    overflow-y: auto;
}
.terms_condition_main p{
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    color: #555555;
    text-align: justify;
}
.terms_condition .terms_lists h3{
    font-weight: 500;
    font-size: 16px;
    line-height: 18px;
    color: #38373D;
}
.term_condition{
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    text-decoration-line: underline;
    color: #005ECC;
    background-color: transparent;
    text-transform: lowercase;
}
.agree_button a{
    background: #F33E3E;
    box-shadow: 1px 1px 4px rgba(143, 113, 100, 0.35), inset 2.5px -2.5px 2px rgba(134, 62, 32, 0.15);
    color: #fff;
    font-weight: 500;
    font-size: 18px;
    line-height: 22px;
    text-transform: capitalize;
}

.close-menu {
	position: absolute;
	top: 10px;
	right: 10px;
}
.border-popup{
	width: 40px;
	height: 5px;
	background: #F3F3F3;
	margin: 12px auto 0;
}
.border_radius_10 {
    border-radius: 10px;
}
.menu-dropdown-link:before{
    content: none;
}
.menu-item-dropdown .menu-item-content:after {
    opacity: 0;
}

.text-color-dark-orange {
    color: #FC4B1A !important;
}

.nav-bar {
    border-radius: 8px 8px 0px 0px;
    transform: matrix(1, 0, 0, -1, 0, 0);
    z-index: 99999;
    position: relative;
    background-color: #38373D !important;
}

.navbar-menu {
    transform: matrix(1, 0, 0, -1, 0, 0);
    height : 56px;
}

.font-18 {
    font-size: 18px;
}
.font-25{
    font-size: 25px;
}
.close-countdown {
    position: absolute;
    top: 5px;
    right: 5px;
    background: white;
    border-radius: 50%;
    padding: 5px !important;
}

.menu-dropdown-center:before,
.menu-dropdown-center:after,
.dialog-inner:after,.menu-dropdown-link:before {
    content: none !important;
}
.menu-dropdown .card.menu-dropdown-content .menu-dropdown-link{
    padding: 6px;
}
.menu-dropdown .card.menu-dropdown-content .menu-dropdown-link:not(:last-child){
    border-bottom: 1px solid #DBDBDB;
}
.menu-dropdown-link.active{
    background: #F33E3E !important;
    color: #fff !important;
}
.bg-color-transparent {
    background-color: transparent !important;
}

.menu-dropdown-content {
    top: 0 !important;
    left: 66% !important;
    z-index: 999;
    min-width: calc(100% + 24px) !important;
}

.registraion-text{
    font-weight: 600;
    font-size: 19px;
    line-height: 23px;
}

.registranstion {
    color: #394C65;
}

.list .item-inner:after {
    content: none !important;
}

.list input[type='text'],
.list input[type='password'],
.list input[type='search'],
.list input[type='email'],
.list input[type='tel'],
.list input[type='url'],
.list input[type='date'],
.list input[type='month'],
.list input[type='datetime-local'],
.list input[type='time'],
.list input[type='number'],
.list select {
    background: #FAFAFA !important;
    border-radius: 10px !important;
    height: 40px;
}

.text-underline {
    text-decoration: underline;
}

.register-text{
    margin-top:20px;
}

.countdown_section {
    background: #f88f721a;
    box-shadow: 0px 1px 9px #f88f721a;
    border-radius: 7px;
    padding: 18px;
    position:relative;
}

.text-color-Blue {
    color: #3083FF !important;
}

.text-transform-capitalize {
    text-transform: capitalize;
}

/* .bottom-bar{
    position: sticky;
    bottom: 0;
    z-index: 10;
    background: white;
  } */

.register-from {
    height: calc(100vh - 174px);
    overflow-y: auto;
}
/*.icon-checkbox,.checkbox i{
    border-radius: 3px !important;
    margin-right: 5px !important;
    width: 17px;
    height: 17px;
}*/
.item-checkbox .item-inner{
    font-weight: 400;
    font-size: 12px;
    line-height: 15px;
    color: #555555;
}
label.item-checkbox input[type='checkbox']:checked~.icon-checkbox{
    background-color: #F33E3E;
    border-color: #F33E3E;
}
.icon-checkbox, .checkbox i{
    border-radius: 3px;
}
/*label.item-checkbox input[type='checkbox']:checked~.icon-checkbox:after{
    line-height: 15px;
    font-size: 13px;
}*/
/*.icon-checkbox:after, .checkbox i:after{
    left: -3px;
    top:-1px
}*/
.md .item-input:not(.item-input-outline) .item-input-wrap::after, .md .input:not(.input-outline)::after {
    background-color: transparent !important;
}
</style>
<style>
.menu-dropdown-link.active,
.menu-dropdown-link.active-state,
.menu-dropdown-link:focus,
.menu-dropdown-link:hover {
    background: #fff !important;
}
.notification-title{
    display: flex;
    justify-content: center;
    align-items: center;
    text-transform: capitalize !important;
    font-weight: 600;
    font-size: 18px;
    line-height: 22px;
}
.notification-title img{
    margin-right: 8px;
}
.notification.success--notification .notification-title{
    color: #0FC963;
}
.notification.error--notification .notification-title {
    color: #FF6161;
}
.notification.success--notification.modal-in{
    background: linear-gradient(90deg, #91F4BE 0%, rgb(252 253 252) 100%, rgb(145 244 190 / 54%) 100%);
    border-radius: 10px;
}
.notification.error--notification.modal-in{
    background: linear-gradient(90deg, #FFBBBB 0%, rgb(252 253 252) 100%, rgba(255, 187, 187, 0.9) 100%);
    border-radius: 10px;
}
.notification-header {
    justify-content: space-between !important
}

.swiper-pagination-bullet-active {
    background: #FC4B1A !important;
}

.dialog-inner:after {
    content: none !important;
}

.dialog-button {
    margin: 0 5px !important;
    border-radius: var(--f7-dialog-border-radius) !important;
}

.dialog-buttons {
    margin: 0 5px 15px;
}

.register-button:hover,
.register-button:active,
.active {
    background: #F33E3E !important;
    color: #fff !important;
}

.check-time-wait{
    color : #F33E3E !important;
    font-weight: 600;
    font-size: 14px;
    line-height: 17px;
}

.font-13 {
    font-size: 13px !important;
}

.font-18 {
    font-size: 18px !important;
}

.font-16 {
    font-size: 16px !important;
}

.font-30 {
    font-size: 30px;
}
.dialog-title{
    display: flex;
    justify-content: center;
}
.md .dialog-buttons{
    justify-content: center !important;

}
.md .dialog-button{
    width: 100%;
    border-radius: 10px;

}
.md .dialog-title + .dialog-text{
    margin-top: 5px;
}
.dialog{
    border-radius: 10px !important;
}
</style>
