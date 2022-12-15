<template>
<f7-page color="bg-color-white" @page:beforeremove="onPageBeforeRemove" @page:beforeout="onPageBeforeOut">
    <div class="nav-bar">
        <div class="row align-items-center navbar-menu">
            <div class="menu col-33">
                <div class="menu-inner color-black">
                    <div class="menu-item menu-item-dropdown bg-color-transparent" style="width : 100%">
                        <div class="row menu-item-content no-margin-top no-margin-bottom justify-content-start">
                            <div class="margin-right-half">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                    <path d="M6.11595 8.79832C6.09029 8.67002 5.20648 4.256 5.17845 4.11613C5.13466 3.89728 4.94226 3.73975 4.71882 3.73975H3.78132C3.55788 3.73975 3.36548 3.89728 3.3217 4.11613C3.29323 4.25837 2.40851 8.67689 2.3842 8.79829C2.33341 9.05187 2.49807 9.29853 2.75191 9.34922C3.00576 9.39994 3.25273 9.23547 3.30348 8.98192L3.6031 7.48547H4.89704L5.19666 8.98195C5.24745 9.23563 5.49451 9.39997 5.74823 9.34925C6.00207 9.29853 6.16673 9.05187 6.11595 8.79832ZM3.7906 6.54904L4.1656 4.67618H4.33454L4.70954 6.54904H3.7906Z" fill="#fff" />
                                    <path d="M6.11595 8.79832C6.09029 8.67002 5.20648 4.256 5.17845 4.11613C5.13466 3.89728 4.94226 3.73975 4.71882 3.73975H3.78132C3.55788 3.73975 3.36548 3.89728 3.3217 4.11613C3.29323 4.25837 2.40851 8.67689 2.3842 8.79829C2.33341 9.05187 2.49807 9.29853 2.75191 9.34922C3.00576 9.39994 3.25273 9.23547 3.30348 8.98192L3.6031 7.48547H4.89704L5.19666 8.98195C5.24745 9.23563 5.49451 9.39997 5.74823 9.34925C6.00207 9.29853 6.16673 9.05187 6.11595 8.79832ZM3.7906 6.54904L4.1656 4.67618H4.33454L4.70954 6.54904H3.7906Z" fill="#fff" fill-opacity="0.2" />
                                    <path d="M13.625 7.4855H12.2188V7.01729C12.2188 6.75871 12.0089 6.54907 11.75 6.54907C11.4911 6.54907 11.2812 6.75871 11.2812 7.01729V7.4855H9.875C9.61612 7.4855 9.40625 7.69514 9.40625 7.95372C9.40625 8.2123 9.61612 8.42193 9.875 8.42193H9.98844C10.2555 9.28383 10.6577 9.94538 11.1002 10.4755C10.74 10.8046 10.3756 11.0744 10.0509 11.3338C9.84878 11.4954 9.816 11.79 9.97775 11.9919C10.1396 12.1939 10.4346 12.2265 10.6366 12.065C10.963 11.8042 11.3543 11.5143 11.75 11.1516C12.146 11.5145 12.538 11.8049 12.8634 12.065C13.0656 12.2266 13.3606 12.1938 13.5223 11.9919C13.684 11.79 13.6512 11.4953 13.4491 11.3338C13.1253 11.075 12.7604 10.8049 12.3998 10.4755C12.8423 9.94538 13.2445 9.28383 13.5116 8.42193H13.625C13.8839 8.42193 14.0938 8.2123 14.0938 7.95372C14.0938 7.69514 13.8839 7.4855 13.625 7.4855ZM11.75 9.78741C11.4508 9.41221 11.1816 8.96438 10.9787 8.41881H12.5213C12.3184 8.96438 12.0492 9.41221 11.75 9.78741Z" fill="#fff" />
                                    <path d="M13.625 7.4855H12.2188V7.01729C12.2188 6.75871 12.0089 6.54907 11.75 6.54907C11.4911 6.54907 11.2812 6.75871 11.2812 7.01729V7.4855H9.875C9.61612 7.4855 9.40625 7.69514 9.40625 7.95372C9.40625 8.2123 9.61612 8.42193 9.875 8.42193H9.98844C10.2555 9.28383 10.6577 9.94538 11.1002 10.4755C10.74 10.8046 10.3756 11.0744 10.0509 11.3338C9.84878 11.4954 9.816 11.79 9.97775 11.9919C10.1396 12.1939 10.4346 12.2265 10.6366 12.065C10.963 11.8042 11.3543 11.5143 11.75 11.1516C12.146 11.5145 12.538 11.8049 12.8634 12.065C13.0656 12.2266 13.3606 12.1938 13.5223 11.9919C13.684 11.79 13.6512 11.4953 13.4491 11.3338C13.1253 11.075 12.7604 10.8049 12.3998 10.4755C12.8423 9.94538 13.2445 9.28383 13.5116 8.42193H13.625C13.8839 8.42193 14.0938 8.2123 14.0938 7.95372C14.0938 7.69514 13.8839 7.4855 13.625 7.4855ZM11.75 9.78741C11.4508 9.41221 11.1816 8.96438 10.9787 8.41881H12.5213C12.3184 8.96438 12.0492 9.41221 11.75 9.78741Z" fill="#fff" fill-opacity="0.2" />
                                    <path d="M14.5938 3.27154H7.83122L7.63028 1.66144C7.5425 0.959989 6.94263 0.43103 6.23491 0.43103H1.40625C0.630844 0.43103 0 1.06115 0 1.83568V12.1676C0 12.9422 0.630844 13.5723 1.40625 13.5723H5.35884L5.55722 15.1824C5.64484 15.8824 6.24472 16.4128 6.95262 16.4128H14.5938C15.3692 16.4128 16 15.7827 16 15.0081V4.67618C16 3.90166 15.3692 3.27154 14.5938 3.27154ZM1.40625 12.6358C1.14778 12.6358 0.9375 12.4258 0.9375 12.1676V1.83568C0.9375 1.5775 1.14778 1.36746 1.40625 1.36746H6.23491C6.47081 1.36746 6.67078 1.54376 6.7 1.77743C6.76794 2.32168 7.98775 12.096 8.05513 12.6358H1.40625ZM6.46012 14.8443L6.30341 13.5723H7.56103L6.46012 14.8443ZM15.0625 15.0081C15.0625 15.2663 14.8522 15.4764 14.5938 15.4764H7.15231L8.93681 13.4146C9.02816 13.3116 9.06909 13.175 9.05022 13.0392L7.94809 4.20797H14.5938C14.8522 4.20797 15.0625 4.41801 15.0625 4.67618V15.0081Z" fill="#fff" />
                                    <path d="M14.5938 3.27154H7.83122L7.63028 1.66144C7.5425 0.959989 6.94263 0.43103 6.23491 0.43103H1.40625C0.630844 0.43103 0 1.06115 0 1.83568V12.1676C0 12.9422 0.630844 13.5723 1.40625 13.5723H5.35884L5.55722 15.1824C5.64484 15.8824 6.24472 16.4128 6.95262 16.4128H14.5938C15.3692 16.4128 16 15.7827 16 15.0081V4.67618C16 3.90166 15.3692 3.27154 14.5938 3.27154ZM1.40625 12.6358C1.14778 12.6358 0.9375 12.4258 0.9375 12.1676V1.83568C0.9375 1.5775 1.14778 1.36746 1.40625 1.36746H6.23491C6.47081 1.36746 6.67078 1.54376 6.7 1.77743C6.76794 2.32168 7.98775 12.096 8.05513 12.6358H1.40625ZM6.46012 14.8443L6.30341 13.5723H7.56103L6.46012 14.8443ZM15.0625 15.0081C15.0625 15.2663 14.8522 15.4764 14.5938 15.4764H7.15231L8.93681 13.4146C9.02816 13.3116 9.06909 13.175 9.05022 13.0392L7.94809 4.20797H14.5938C14.8522 4.20797 15.0625 4.41801 15.0625 4.67618V15.0081Z" fill="#fff" fill-opacity="0.2" />
                                </svg>
                            </div>
                            <div class="text-align-right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="7" height="4" viewBox="0 0 7 4" fill="none">
                                    <path d="M3.28896 3.29113C3.40587 3.40683 3.59413 3.40683 3.71104 3.29113L6.01255 1.01322C6.20304 0.824685 6.06953 0.5 5.80151 0.5H1.19849C0.93047 0.5 0.796961 0.824685 0.987452 1.01322L3.28896 3.29113Z" fill="#fff" />
                                    <path d="M3.28896 3.29113C3.40587 3.40683 3.59413 3.40683 3.71104 3.29113L6.01255 1.01322C6.20304 0.824685 6.06953 0.5 5.80151 0.5H1.19849C0.93047 0.5 0.796961 0.824685 0.987452 1.01322L3.28896 3.29113Z" fill="#fff" fill-opacity="0.2" />
                                </svg>
                            </div>
                        </div>
                        <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                            <div class="card menu-dropdown-content bg-color-white margin-left no-margin-top">
                                <a href="#" class="menu-dropdown-link menu-close justify-content-center text-color-black no-padding">Gujarati</a>
                                <a href="#" class="menu-dropdown-link menu-close justify-content-center text-color-black no-padding">English</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-33 text-align-center">
                <div class="registranstion text-color-white registraion-text">{{ title }}</div>
            </div>
            <div class="col-33 text-align-right">
                <a class="link icon-only" href="/favourites/">
                    <i class="f7-icons size-22 text-color-white padding font-18">heart_fill</i>
                </a>
            </div>
        </div>
    </div>
    <div class="margin-left margin-right register-from margin-top">
        <div class="text-align-center padding-top">
            <img src="/images/registerImage.png" alt="">
        </div>
        <div>
            <form class="list margin-vertical" id="my-form">
                <div class="item-content item-input">
                    <div class="item-inner">
                        <!-- <div class="item-title item-label">Name</div> -->
                        <div class="item-input-wrap margin-bottom-half margin-top-half">
                            <input type="text" v-model="reservation.name" name="name" class="padding" placeholder="Enter Your name">
                        </div>
                    </div>
                </div>

                <div class="item-content item-input">
                    <div class="item-inner">
                        <!-- <div class="item-title item-label">Phone number</div> -->
                        <div class="item-input-wrap margin-bottom-half"><input type="text" v-model.number="reservation.number" name="number" class="padding" placeholder="Phone number" minlength="10" maxlength="10" @focusout="checklength" @keypress="checknumbervalidate"></div>
                    </div>
                </div>
                <div class="item-content item-input">
                    <div class="item-inner">
                        <!-- <div class="item-title item-label">Family member number</div> -->
                        <div class="item-input-wrap margin-bottom-half"><input type="number" v-model="reservation.member" name="member" class="padding" placeholder="Family member"></div>
                    </div>
                </div>
                <div class="item-content item-input">
                    <div class="item-inner">
                        <!-- <div class="item-title item-label font-16 text-color-black">Location type</div> -->
                        <div class="item-input-wrap margin-bottom-half input-dropdown-wrap">
                            <select v-model="reservation.floor" placeholder="floor" class="padding-left padding-right">
                                <option v-for="(floor,key) in floors" :key="floor" :value="key">{{ floor }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="no-padding-left">
                    <label class="item-checkbox item-content">
                        <input type="checkbox" name="demo-checkbox" v-model="reservation.agree_condition" checked="checked" />
                        <i class="icon icon-checkbox"></i>
                        <div class="item-inner">
                            <div class="item-title">I agree with the terms & conditions</div>
                        </div>
                    </label>
                </div>
            </form>
        </div>
        <div class="text-align-center margin-top">
            <a class="link text-underline text-color-black" :class="{ 'display-none': checkWaitingTime }" @click="checkTime" href="javascript:;">Check Time</a>
            <div class="countdown_section position-relative margin-horizontal" :class="{ 'display-none' : !checkWaitingTime }">
                <div style="background : url('/images/dots.png')">
                    <img src="/images/clock.png" alt="">
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
                <f7-button class="button bg-color-white register-button button-raised text-color-black button-large text-transform-capitalize" @click="register" id="book_table">Book Table</f7-button>
            </div>
            <div class="col bottom-button">
                <f7-button class="button bg-color-white register-button button-raised text-color-black button-large text-transform-capitalize" fill sheet-open=".demo-sheet-swipe-to-close" @click="title = 'Menu';showMenuData()" >Menu</f7-button>
            </div>
        </div>
    </div>
    <Menu @textChange="title = 'Registration'" ref="menu"></Menu>
</f7-page>
</template>

<script>
import $ from "jquery";
import Menu from "./Menu.vue";
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
    f7Sheet
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
        VueCountdown
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
            title: 'Registration',
            checkWaitingTime: false,
            floors: [],
            reservation: {
                name: '',
                number: '',
                member: '',
                floor: 1,
                agree_condition: false
            },
            member_limit : 0,
            waiting_time : '00:00',
        }
    },
    created() {
        this.getFloors();
        this.memberLimitation();
    },
    methods: {
        // register() {

        //     if(this.name == '' || this.number == '' || this.member == '' || this.location == ''){
        //         this.errornotification('Please fill the form details.');
        //         return;
        //     }

        //     if(this.number.length > 10){
        //         this.errornotification('Please check your number and enter your mobail number.');
        //         return;
        //     }

        //     f7.dialog.confirm('', () => {



        //         var formData = new FormData();
        //         formData.append('name' , this.name);
        //         formData.append('number' , this.number);
        //         formData.append('member' , this.member);
        //         formData.append('floor_location' , this.location);

        //         axios.post('/api/register',formData)
        //         .then((res) => {
        //             document.getElementById('book_table').classList.add('active');
        //             f7.dialog.alert('Success!',() => {
        //                 document.getElementById('book_table').classList.remove('active');
        //                 f7.view.main.router.navigate({ url: '/waiting/' });
        //             });
        //             setTimeout(() => {
        //             $('.dialog-title').html("<img src='/images/success.png'>");
        //             $('.dialog-button').addClass('col button button-raised button-large text-transform-capitalize');
        //             $('.dialog-button').addClass('active');
        //             $('.dialog-button').css('width','50%');
        //             }, 200);
        //         })
        //         .catch((error) => {
        //             var err = error.response.data.error;
        //             if(err){
        //                 this.errornotification('Please fill the form details.');
        //             }
        //         })
        //     });
        //     $('.dialog-title').text("Are you confirm to register?").css('font-size','20px');
        //     $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
        //     $('.dialog-button').eq(1).removeClass('text-color-black');
        //     $('.dialog-button').eq(1).addClass('active');

        // },
        memberLimitation() {
            axios.get('/api/member-limitation')
            .then((res) => {
                this.member_limit = res.data.member_capacity;
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
            if(!this.reservation.name || !this.reservation.number || !this.reservation.member || !this.reservation.floor){
                this.errornotification('Please enter all the required details.'); return false;
            }else if(parseInt(this.reservation.member) > parseInt(this.member_limit)){
                this.errornotification('order create must be '+this.member_limit+' or less than member.'); return false;
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
        register() {
            if(!this.reservation.name || !this.reservation.number || !this.reservation.member || !this.reservation.floor){
                this.errornotification('Please enter all the required details.'); return false;
            }else if(parseInt(this.reservation.member) > parseInt(this.member_limit)){
                this.errornotification('order create must be '+this.member_limit+' or less than member.'); return false;
            }

            if(this.reservation.agree_condition) var agree_condition = 1;
            else var agree_condition = 0;

            f7.dialog.confirm('Are you confirm to register?', () => {

                var formData = new FormData();
                formData.append('customer_name', this.reservation.name);
                formData.append('customer_number', this.reservation.number);
                formData.append('person', this.reservation.member);
                formData.append('floor', this.reservation.floor);
                formData.append('role', 'manager');
                formData.append('agree_condition', agree_condition);

                axios.post('/api/add-reservation', formData)
                .then((res) => {
                    f7.dialog.alert('Success!', () => {
                        document.getElementById('book_table').classList.remove('active');
                        f7.view.main.router.navigate({ url: '/waiting/' });
                    });
                });

                setTimeout(() => {
                    $('.dialog-title').html("<img src='/images/success.png'>");
                    $('.dialog-button').addClass('col button button-raised button-large text-transform-capitalize');
                    $('.dialog-button').addClass('active');
                    $('.dialog-button').css('width', '50%');
                }, 50);
            });

            setTimeout(() => {
                $('.dialog-title').text("").css('font-size','20px');
                $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
                $('.dialog-button').eq(1).removeClass('text-color-black');
                $('.dialog-button').eq(1).addClass('active');
                $('.dialog-inner').addClass('margin-top');
                $('.dialog-buttons').css({ 'margin-top': '25px', 'margin-bottom': '35px' });
            });
        },
        showMenuData() {
            if (this.$refs.menu) {
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
        checklength() {
            var phone = event.target.value.length;
            if (phone > 10 || phone < 10) {
                this.errornotification('Please enter atleast 10 characters.');
            }
        }
    },
}
    $(document).on('click', '.sheet-backdrop', function () {
        $('.registraion-text').text('Registration');
    });
</script>

<style scoped>
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
    background: #38373D;
    border-radius: 8px 8px 0px 0px;
    transform: matrix(1, 0, 0, -1, 0, 0);
}

.navbar-menu {
    transform: matrix(1, 0, 0, -1, 0, 0);
    height : 56px;
}

.font-18 {
    font-size: 18px;
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
.dialog-inner:after {
    content: none !important;
}

.bg-color-transparent {
    background-color: transparent !important;
}

.menu-dropdown-content {
    top: -8px !important;
    left: 45% !important;
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
    background: #F7FAFF !important;
    border-radius: 10px !important;
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
    height: calc(100vh - 150px);
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
</style>
