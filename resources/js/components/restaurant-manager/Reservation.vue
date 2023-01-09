<template>
    <f7-page>
        <div class="reservation_card" @click="clickout">
            <div class="card">
                <div class="row height_100 align-items-center">
                    <div class="col-100 medium-100 large-50 margin-bottom padding-bottom">
                        <div class="text-align-center padding-top reservation_banner">
                            <img src="/images/reservationbg.png" style="width:100%;height:auto">
                        </div>
                    </div>
                    <div class="col-100 medium-100 large-50 reservation_details">
                        <div class="reservation_form">
                            <div class="text-color-gray register-text padding-left">
                                <h3 class="card-title text-align-center">Registration</h3>
                            </div>
                            <div>
                                <form name="reservationForm" class="list margin-vertical" id="my-form">
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
                                            <div class="item-input-wrap margin-bottom-half"><input type="text" v-model.number="reservation.number" name="number" class="padding" placeholder="Phone number" maxlength="10" @keypress="checknumbervalidate"></div>
                                        </div>
                                    </div>
                                    <div class="item-content item-input">
                                        <div class="item-inner">
                                            <!-- <div class="item-title item-label">Family member number</div> -->
                                            <div class="item-input-wrap margin-bottom-half"><input type="number" v-model="reservation.member" name="member" class="padding" placeholder="Family member" @keyup="floorAvailable"></div>
                                        </div>
                                    </div>
                                    <div class="item-content item-input margin-bottom">
                                        <div class="item-inner">
                                            <div class="item-input-wrap">
                                                <div class="f-concise position-relative">
                                                    <div id="selection-concise" class="floor--list">
                                                        <div id="select-concise" class="input-dropdown-wrap" @click="showFloorList = !showFloorList">{{ showFloorName }}</div>
                                                        <ul id="location-select-list" class="dropdown_list" :class="{ 'd-none' : showFloorList }">
                                                            <li class="concise p-1" :class="{ 'active': reservation.floor == 0 }" @click="reservation.floor = 0; showFloorName = 'As soon as earlier'; showFloorList = true">As soon as earlier</li>
                                                            <li class="concise p-1" :class="{ 'active': reservation.floor == key }" @click="reservation.floor = key; showFloorName = floor; showFloorList = true" v-for="(floor,key) in floors" :key="floor" :data-id="key"><span :data-id="key">{{ floor }}</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-align-center margin-top">
                                        <a class="link text-underline text-color-black" :class="{ 'display-none': checkWaitingTime }" @click="checkTime" href="javascript:;">Check Time</a>
                                        <div class="countdown_section position-relative margin-horizontal" :class="{ 'display-none' : !checkWaitingTime }">
                                            <div style="background : url('/images/dots.png')" class="display-flex align-items-center justify-content-center flex-direction-column height_100">
                                                <img src="/images/clock.png" alt="">
                                                <i class="f7-icons font-13 padding-half margin-bottom close-countdown" @click="(checkWaitingTime = false)">xmark</i>
                                                <!-- <vue-countdown :time="60 * 50 * 1000" v-slot="{ hours, minutes, seconds }"> -->
                                                    <p class="no-margin font-30">{{ waiting_time }}</p>
                                                <!-- </vue-countdown> -->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="padding bottom-bar">
                            <div class="row justify-content-start">
                                <div class="col bottom-button margin-right">
                                    <f7-button class="button bg-color-white register-button button-raised text-color-black button-large text-transform-capitalize border_radius_10" @click="register" id="book_table">Book Table</f7-button>
                                </div>
                                <div class="col bottom-button">
                                    <f7-button class="button bg-color-white register-button button-raised text-color-black button-large text-transform-capitalize border_radius_10" fill sheet-open=".demo-sheet-swipe-to-close" @click="title = 'Menu'">Menu</f7-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <f7-sheet class="demo-sheet-swipe-to-close" swipe-to-close style="height:auto; --f7-sheet-bg-color: #fff;" backdrop>
            <f7-page-content>
                <div class="row">
                    <div class="col">
                        <div class="border-popup"></div>
                    </div>
                </div>
                <i class="f7-icons font-30 close-menu" @click="closePopup">xmark</i>
                <f7-block-title class="text-align-center font-18 text-color-black margin-top-half">Food Menu</f7-block-title>
                <div class="margin" v-if="product_category">
                    <!-- <div class="text-align-center text-color-gray">Select your favourite food <br> and enjoy with family</div> -->
                    <div data-pagination='{"el":".swiper-pagination"}' data-space-between="10" data-slides-per-view="8" class="swiper swiper-init demo-swiper margin-top margin-bottom" style="height : 120px">
                        <div class="swiper-pagination"></div>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" :class="{ 'slide-active': category.id == sliderActive}" v-for="category in product_category" :key="category" @click="getProducts(category.id)">
                                <div class="menu-image col">
                                    <img :src="'/storage'+category.image" alt="">
                                </div>
                                <p class="font-13 no-margin text-align-center margin-top-half">{{ category.category_languages[0].name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative">
                        <div class="menu-title"><span>{{ categoryName }} Menu</span></div>
                    </div>
                    <div class="menu-details margin-top">
                        <div class="menu-lists" v-if="product_subcategory.length">
                            <div class="menu-list" v-for="subcate in product_subcategory" :key="subcate">
                                <div class="font-18 text-align-center menu-list-title text-color-black"><u>{{ subcate.sub_category_language[0].name }}</u></div>
                                <div class="list row margin-half align-items-center" v-for="product in subcate.products" :key="product">
                                    <div class="col-90 display-flex">{{ product.product_language[0].name }}&nbsp; <span class="dots"></span></div>
                                    <div class="col-10">{{ product.price.toFixed(2) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-lists" v-else>
                            <div class="no_order">
                                <NoValueFound />
                                <div class="no_order_text text-align-center">
                                    <p class="no-margin">Empty Food Menu List</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <div class="no_order">
                        <NoValueFound />
                        <div class="no_order_text text-align-center">
                            <p class="no-margin">Empty Food Menu List</p>
                        </div>
                    </div>
                </div>
            </f7-page-content>
        </f7-sheet>
    </f7-page>
</template>
<script>
import $ from "jquery";
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input, f7Button, f7Sheet, f7PageContent} from 'framework7-vue';
import VueCountdown from '@chenfengyuan/vue-countdown';
import NoValueFound from './NoValueFound.vue';
import axios from "axios";

export default {
    name : 'Reservation',
    components: {
        f7Page,
        f7Navbar,
        f7BlockTitle,
        f7Block,
        f7,
        f7Input,
        f7Button,
        f7Sheet,
        f7PageContent,
        VueCountdown,
        NoValueFound
    },
    data() {
        return {
            display: true,
            floors: [],
            reservation: {
                name: '',
                number: '',
                member: '',
                floor: 1
            },
            checkWaitingTime: false,
            product_category: [],
            product_subcategory: [],
            categoryName: '',
            sliderActive : 0,
            member_limit : 0,
            waiting_time: '00:00',
            showFloorList: true,
            showFloorName: '',
            showFloorId: 0,
        }
    },
    beforeCreate() {
        this.$root.addLoader();
    },
    created() {
        // this.getFloors();
        this.getCategories();
        this.memberLimitation();
    },
    mounted() {
        this.$root.activationMenu('reservation', '');
        this.$root.removeLoader();
    },
    methods: {
        getCategories() {
            axios.post('/api/get-category-list')
            .then((res) => {
                this.product_category = res.data.category;
                if(this.product_category) this.getProducts(this.product_category[0].id);
            })
        },
        getProducts(id) {
            this.sliderActive = id;
            axios.get('/api/get-category-wise-products/' + id)
            .then((res) => {
                this.categoryName = res.data.category_languages[0].name;
                this.product_subcategory = res.data.sub_category;
            })
        },
        memberLimitation() {
            axios.get('/api/member-limitation')
            .then((res) => {
                this.member_limit = res.data.member_capacity;
            })
        },
        closePopup(){
            document.querySelector('.sheet-backdrop').click();
            this.$emit('textChange');
        },
        register() {
            if(!this.reservation.name || !this.reservation.number || !this.reservation.member){
                this.$root.errornotification('Please enter all the required details.'); return false;
            }else if(parseInt(this.reservation.member) > parseInt(this.member_limit)){
                this.$root.errornotification('order create must be '+this.member_limit+' or less than member.'); return false;
            }

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
                formData.append('role', 'Manager');
                formData.append('agree_condition', 1);

                axios.post('/api/add-reservation', formData)
                .then((res) => {
                    f7.dialog.alert('Success!', () => {
                        document.getElementById('book_table').classList.remove('active');
                        // f7.view.main.router.navigate({ url: '/waiting/' });
                        this.reservation.name = '';
                        this.reservation.number = '';
                        this.reservation.member = '';
                        this.floors = [];
                        this.reservation.floor = 1;
                    });
                    setTimeout(() => {
                        $('.dialog-title').html("<img src='/images/success.png'>");
                        $('.dialog-button').addClass('col button button-raised button-large text-transform-capitalize');
                        $('.dialog-button').addClass('active');
                        $('.dialog-button').css('width', '50%');
                    }, 50);
                });

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
        getFloors() {
            axios.get('/api/get-floors-data')
            .then((res) => {
                this.floors = res.data;
            })
        },
        checkTime() {
            if(!this.reservation.name || !this.reservation.number || !this.reservation.member){
                this.$root.errornotification('Please enter all the required details.'); return false;
            }else if(parseInt(this.reservation.member) > parseInt(this.member_limit)){
                this.$root.errornotification('order create must be '+this.member_limit+' or less than member.'); return false;
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
                        this.$root.errornotification(res.data.message); return false;
                    }
                });
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
            if (this.reservation.member) {
                axios.post('/api/floor-available', { 'member': this.reservation.member })
                .then((res) => {
                    if (res.data.success) {
                        this.reservation.floor = 0;
                        this.floors = res.data.floors;
                    }
                    else {

                    }
                });
            }
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

.border_radius_10{
    border-radius: 10px !important;
}
.sheet-modal{
    height: 92% !important;
}

.popover-inner{
    background-color: #fff;
    border-radius: 10px;
}
/*========== FOOD MENU MODAL CSS =============*/
.close-menu{
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
.menu-image{
    box-sizing: border-box;
    background: #FAF5F2;
    border-radius: 7px;
    display: flex;
    width: 100%;
    height: 100%;
    justify-content: center;
    align-items: center;
}
.swiper-slide{
    width: 67px;
    height: 67px;
}
.demo-swiper .swiper-slide{
    font-size: 25px;
    font-weight: 300;
    display: block;
    background: #fff;
    color: #000;
}
.font-18 {
    font-size: 18px !important;
}
.position-relative{
    position: relative;
}
.menu-title, .menu-list-title {
    text-align: center;
    font-size: 18px;
    padding: 0 10px;
}
.menu-title::before {
    position: absolute;
    content: '';
    border: 1px dashed #000;
    left: 0;
    width: 100%;
    height: 0px;
    top: 11px;
    z-index: -1;
}
.menu-lists{
    height: 100%;
    max-height: 500px;
    overflow: auto;
    width: 85%;
    margin: 0 auto;
}
.menu-title span{
    background: white;
    padding: 0 10px;
}
.add-favlist i {
    box-shadow: 1px 1px 8px rgba(0, 0, 0, 0.15);
    border-radius: 50%;
    width: 25px;
    height: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.dots{
    flex: 1;
    border-bottom: 2px dotted #000;
    height: 1em;
}
/*============ RESERVATION CARD ============*/

.reservation_card .card{
    height: calc(100vh - 142px);
}

.simple-list li:after, .links-list a:after, .list .item-inner:after{
    background-color: transparent !important;
}
.list input[type='text'], .list input[type='password'], .list input[type='search'], .list input[type='email'], .list input[type='tel'], .list input[type='url'], .list input[type='date'], .list input[type='month'], .list input[type='datetime-local'], .list input[type='time'], .list input[type='number'], .list select{
    background-color: #fafafa;
    border-radius: 10px;
}
.reservation_card .item-title{
    font-weight: 600;
    font-size: 14px;
    line-height: 17px;
    color: #555555;
    margin-bottom: 10px;
}
.reservation_details{
    padding-right: 30px;
    padding-left: 30px;
}
.reservation_form{

    height: calc(100vh - 250px);
    overflow-y: auto;

}
.icon.icon-checkbox{
    border-radius: 3px;
}
label.item-checkbox input[type='checkbox']:checked ~ .icon-checkbox:after, label.item-checkbox input[type='checkbox']:checked ~ * .icon-checkbox:after, .checkbox input[type='checkbox']:checked ~ i:after, label.item-checkbox input[type='checkbox']:indeterminate ~ .icon-checkbox:after, label.item-checkbox input[type='checkbox']:indeterminate ~ * .icon-checkbox:after, .checkbox input[type='checkbox']:indeterminate ~ i:after{
    background-color: #F33E3E;
    border-radius: 3px;
}
.countdown_section{
    background: #f88f721a;
    box-shadow: 0px 1px 9px #f88f721a;
    border-radius: 7px;
    padding: 18px;
    position: relative;
    height: 100%;
    max-height: 125px;
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
.font-13{
    font-size: 13px !important;
}
.card-title{
    font-weight: 600;
    font-size: 20px;
    line-height: 24px;
    color: #000;
}
.text-underline {
    text-decoration: underline;
}

.height-40 {
    height: 40px;
}

.height-36 {
    height: 36px;
}
.nav-botton {
    height: 100%;
}

.bg-dark {
    background: #38373D;
}

/*.menu-dropdown-link:nth-child(2) {
    border-bottom: 1px solid #EFEFEF;
}*/
.bg-pink {
    background: #F33E3E;
}

.text-color-pink {
    color: #F33E3E;
}

.font-22 {
    font-size: 22px;
}

.reservation_card{
    margin-top:80px;
}

.item-input-wrap {
    width: 100%;
    background: #F0F0F0;
    border: 0.5px solid #DCDCDC;
    border-radius: 7px;
    height: auto;
}


.border-bottom {
    border-bottom: 1px solid #EAEAEA;
}

#searchData {
    width: 85%;
}

@media screen and (max-width:820px) {
    .header-links {
        width: 100%;
    }
    .reservation_form{
        height: calc(100vh - 730px);
    }
    /*.reservation_card .card .row{
       height: auto !important;
    }*/
    .reservation_card .card .reservation_banner img{
        width:100%;
        max-width:350px;
    }

}
</style>
<style>
.height_100{
    height: 100%;
}
/* Chrome, Safari, Edge, Opera */

/* Firefox */
input[type=number] {
  -moz-appearance: textfield !important;
}
#select-concise{
    background-color: #fafafa;
    border-radius: 10px;
    width: 100%;
    height: 44px;
    display: flex;
    align-items: center;
    padding: 16px;
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
.d-none{
    display: none;
}
.register-button:hover, .register-button:active, .active {
    background: #F33E3E !important;
    color: #fff !important;
}
.sheet-modal-inner .page-content{
    background: #fff !important;
}
@media screen and (max-width:820px){
    .dialog{
        top: 50% !important;
    }
}
</style>
