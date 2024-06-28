<template>
    <f7-page>
        <div class="reservation_card" @click="clickOut">
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
                                <form name="reservationForm" class="list margin-vertical" id="reservation-form">
                                    <div class="item-content item-input">
                                        <div class="item-inner">
                                            <div class="item-input-wrap margin-bottom-half margin-top-half">
                                                <input type="text" v-model="reservation.name" name="customer_name" class="padding" placeholder="Enter Your name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-content item-input">
                                        <div class="item-inner">
                                            <div class="item-input-wrap margin-bottom-half"><input type="text" v-model="reservation.email" name="email" class="padding" placeholder="Email"></div>
                                        </div>
                                    </div>
                                    <div class="item-content item-input">
                                        <div class="item-inner">
                                            <div class="item-input-wrap margin-bottom-half"><input type="text" v-model.number="reservation.number" name="customer_number" class="padding" placeholder="Phone number" maxlength="10" @keypress="checkNumberValidate"></div>
                                        </div>
                                    </div>
                                    <div class="item-content item-input">
                                        <div class="item-inner">
                                            <div class="item-input-wrap margin-bottom-half"><input type="number" v-model="reservation.member" name="person" class="padding" placeholder="Family member" @keyup="floorAvailable"></div>
                                        </div>
                                    </div>
                                    <div class="item-content item-input margin-bottom">
                                        <div class="item-inner">
                                            <div class="item-input-wrap">
                                                <div class="f-concise position-relative">
                                                    <div id="selection-concise" class="floor--list">
                                                        <div id="select-concise" class="input-dropdown-wrap" :class="{ 'disable-text' : !reservation.member}" @click="reservation.member ? showFloorList = !showFloorList : ''">{{ reservation.member ? showFloorName : 'Select floor' }}</div>
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
                                                <p class="no-margin font-30">{{ waitingTime + " " + hourMin }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="padding bottom-bar">
                            <div class="row justify-content-start">
                                <div class="col bottom-button margin-right">
                                    <f7-button class="button bg-color-white register-button button-raised text-color-black button-large text-transform-capitalize border_radius_10" @click="checkTimeForRegister" id="book_table">Book Table</f7-button>
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
                <div class="digital_menu_card digital_menu_page">
                    <DigitalProduct />  
                </div>
            </f7-page-content>
        </f7-sheet>
    </f7-page>
</template>
<script setup>
import { ref, onMounted, onBeforeMount } from 'vue';
import $ from 'jquery';
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input, f7Button, f7Sheet, f7PageContent, f7Swiper, f7SwiperSlide } from 'framework7-vue';
import VueCountdown from '@chenfengyuan/vue-countdown';
import NoValueFound from '../../components/NoValueFound.vue';
import axios from 'axios';
import  { errorNotification, successNotification } from '../../commonFunction.js'
import DigitalProduct from "../../components/Product/DigitalProduct.vue";

const display = ref(true);
const floors = ref([]);
const reservation = ref({
    name: '',
    email: '',
    number: '',
    member: '',
    floor: null
});
const checkWaitingTime = ref(false);

const categories = ref([]);
const digitalProducts = ref([]);
const selectedCategoryName = ref('');
const selectCategory = ref('');

const sliderActive = ref(0);
const memberLimit = ref(0);
const waitingTime = ref('00:00');
const showFloorList = ref(true);
const showFloorName = ref('Select Floor');
const showFloorId = ref(0);
const hourMin = ref('Minutes');

onBeforeMount(() => {
    // addLoader();
});

onMounted(() => {
  // getFloors();
    // getCategories();
    memberLimitation();
    // activationMenu('reservation', '');
    // removeLoader();
});

const getCategories = () => {
    axios.post('/api/get-categories')
    .then((response) => {
        categories.value = response.data.categories;
        selectCategory.value = response.data.categories[0]?.id ?? '';
        selectedCategoryName.value = response.data.categories[0]?.name ?? '';
        digitalProductList(selectCategory.value)
    });
};

const digitalProductList = (id) => {
    if(id){
        axios.get('/api/get-digital-product-list/'+id)
        .then((response) => {
            console.log(response.data);
            digitalProducts.value = response.data;
        });
    }
}

const memberLimitation = () => {
    axios.get('/api/member-limitation')
    .then((res) => {
        memberLimit.value = res.data.member_capacity;
    });
};

const closePopup = () => {
    document.querySelector('.sheet-backdrop').click();
    // emit('textChange');
};

const checkTimeForRegister = () => {
    if (!reservation.value.name || !reservation.value.email || !reservation.value.number || !reservation.value.member) {
        errorNotification('Please enter all the required details.');
        return false;
    } else if (parseInt(reservation.value.member) > parseInt(memberLimit.value)) {
        errorNotification(`Order create must be ${memberLimit.value} or less than member.`);
        return false;
    } else if (reservation.value.number.toString().length !== 10) {
        errorNotification('Please enter a valid number.');
        return false;
    } else if (!reservation.value.floor) {
        errorNotification('Please select the floor.');
        return false;
    }
    var formData = new FormData(document.getElementById('reservation-form'));
    ['customer_name', 'customer_number'].forEach(key => formData.delete(key));
    formData.append('floor', reservation.value.floor);
    formData.append('role', 'Manager');
    
    // formData.append('person', reservation.value.member);
    // formData.append('email', reservation.value.email);

    axios.post('/api/check-time', formData)
        .then((res) => {
        if (res.data.success) {
            hourMin.value = res.data.hour_min;
            waitingTime.value = res.data.waiting_time;
            register();
        } else {
            errorNotification(res.data.message);
            return false;
        }
        });
};

const register = () => {
    const conformationMessage = waitingTime.value === '00:00' ? 'No waiting time' : `Waiting time is ${waitingTime.value}`;

    f7.dialog.confirm(conformationMessage, () => {
        var form = document.getElementById('reservation-form');
        var formData = new FormData(form);
        formData.append('role', 'Manager');
        formData.append('agree_condition', 1);
        // formData.append('customer_name', reservation.value.name);
        // formData.append('customer_number', reservation.value.number);
        // formData.append('person', reservation.value.member);
        // formData.append('email', reservation.value.email);
        // formData.append('floor', reservation.value.floor);

        axios.post('/api/add-reservation', formData)
        .then((res) => {
            f7.dialog.alert('Success!', () => {
                document.getElementById('book_table').classList.remove('active');
                reservation.value.name = '';
                reservation.value.email = '';
                reservation.value.number = '';
                reservation.value.member = '';
                floors.value = [];
                reservation.value.floor = 1;
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
        $('.dialog-title').text('').css('font-size', '20px').html("<img src='/images/usericon.png'>");
        $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
        $('.dialog-button').eq(1).removeClass('text-color-black');
        $('.dialog-button').eq(1).addClass('active');
        $('.dialog-inner').addClass('margin-top');
        $('.dialog-buttons').css({ 'margin-top': '25px', 'margin-bottom': '35px' });
    });
    };

const getFloors = () => {
    axios.get('/api/get-floors-data')
        .then((res) => {
        floors.value = res.data;
        });
};

const checkTime = () => {
    if (!reservation.value.name || !reservation.value.number || !reservation.value.member) {
        errorNotification('Please enter all the required details.');
        return false;
    } else if (parseInt(reservation.value.member) > parseInt(memberLimit.value)) {
        errorNotification(`Order create must be ${memberLimit.value} or less than member.`);
        return false;
    } else {
        const formData = new FormData();
        formData.append('person', reservation.value.member);
        formData.append('floor', reservation.value.floor);
        formData.append('role', 'Manager');

        axios.post('/api/check-time', formData)
        .then((res) => {
            if (res.data.success) {
            waitingTime.value = res.data.waiting_time;
            checkWaitingTime.value = true;
            } else {
            errorNotification(res.data.message);
            return false;
            }
        });
    }
};

const checkNumberValidate = (evt) => {
    evt = evt ? evt : window.event;
    const charCode = evt.which ? evt.which : evt.keyCode;
    if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
        evt.preventDefault();
    } else {
        return true;
    }
};

const floorAvailable = () => {
    if (reservation.value.member) {
        axios.post('/api/floor-available', { 'member': reservation.value.member })
        .then((res) => {
            if (res.data.success) {
            reservation.value.floor = null;
            showFloorName.value = 'Select Floor';
            floors.value = res.data.floors;
            }
        });
    }
};

const clickOut = () => {
    const floorList = event.target.parentNode.classList.contains('floor--list');
    if (!floorList) {
        showFloorList.value = true;
    }
};

</script>