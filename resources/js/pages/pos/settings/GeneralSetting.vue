<template>
    <div class="form-title general_settings-banner">
        <h3 class="no-padding no-margin">
            <span class="page_heading general_settings"> Add General </span>
        </h3>
    </div>
    <div class="general_info_form">
        <form class="list" id="my-form" @submit.prevent="submitGeneralsetting">
            <div class="item-content item-input general_info_form-address no-padding">
                <Input label="Restaurant Name" type="text" name="name" placeholder="Enter restaurant name" />
            </div>
            <div class="item-content item-input general_info_form-image-input no-padding">
                <div class="item-inner no-padding">
                    <div class="block-title no-margin">Logo</div>
                    <div class="image-logo">
                        <img :src="logo_preview" width="100" height="100" alt="" class="restaurant_logo">
                    </div>
                    <div class="image-field item-input-wrap">
                        <input type="file" name="logo_file" accept="image/*" id="logo_file" @change="onRestaurantLogoChange">
                        <label for="logo_file">
                            <div class="image-label">
                                <div class="image-label-text">Choose File</div>
                                <button type="button" class="button image-label-remove" @click="RestaurantLogoDelete">
                                    <Icon name="remove" color="#F33E3E" />
                                </button>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="item-inner no-padding">
                    <div class="block-title no-margin">Fav Icon</div>
                    <div class="image-logo">
                        <img :src="fav_preview" width="100" height="100" alt="" class="restaurant_logo">
                    </div>
                    <div class="image-field item-input-wrap">
                        <input type="file" name="fav_file" id="fav_file" accept="image/*" @change="onRestaurantFavChange">
                        <label for="fav_file">
                            <div class="image-label">
                                <div class="image-label-text">Choose File</div>
                                <button type="button" class="button image-label-remove" @click="RestaurantFavDelete">
                                    <Icon name="remove" color="#F33E3E" />
                                </button>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="item-content item-input general_info_form-address no-padding">
                <Input label="Address" type="text" name="address" placeholder="Enter Address" />
            </div>
            <div class="item-content item-input general_info_form-phone no-padding">
                <Input label="Phone" type="number" name="phone" placeholder="Enter Phone" />
                <Input label="Time Zone" type="text" name="time_zone" placeholder="Enter Time Zone" />
            </div>
            <div class="item-content item-input general_info_form-print no-padding">
                <Input label="Print Bill Header" type="text" name="bill_header" placeholder="Enter Print Bill Header" />
                <Input label="Print Bill Footer" type="text" name="bill_footer" placeholder="Enter Print Bill Footer" />
            </div>
            <hr class="margin-vertical">
            <div class="time_onoff margin-top">
                <div class="row align-items-center">
                    <div class="col-50 height_46">
                        <div class="block-title no-margin">Highlight Time ON /OFF</div>
                        <label class="switch general_info_form-input">
                            <input type="checkbox" class="switch-input" @change="highlight_on_off = !highlight_on_off" :checked="highlight_on_off">
                            <span class="switch-label" data-on="On" data-off="Off"></span>
                            <span class="switch-handle"></span>
                        </label>
                    </div>
                    <div class="col-50 list" :class="{ 'display-none' : !highlight_on_off }">
                        <div class="item-content item-input no-padding">
                            <div class="item-inner no-padding-right">
                                <div class="item-input-wrap">
                                    <div class="block-title no-margin">Set Time: </div>
                                    <div class="f-concise general_info_form-input position-relative">
                                        <div id="select-concise" class="input-dropdown-wrap timer--list"  @click="timerOnOff = !timerOnOff">{{ showTiming }}</div>
                                        <ul id="location-select-list" class="dropdown_list" :class="{ 'display-none' : !timerOnOff }">
                                            <li class="concise p-1" :class="{ 'active' : showTiming == '10 second'}" @click="timerOnOff = false;showTiming = '10 second'; highlight_time='0.166666667'">10 second</li>
                                            <li class="concise p-1" :class="{ 'active' : showTiming == '20 second'}" @click="timerOnOff = false;showTiming = '20 second'; highlight_time='0.333333333'">20 second</li>
                                            <li class="concise p-1" :class="{ 'active' : showTiming == '30 second'}" @click="timerOnOff = false;showTiming = '30 second'; highlight_time='0.5'">30 second</li>
                                            <li class="concise p-1" :class="{ 'active' : showTiming == '40 second'}" @click="timerOnOff = false;showTiming = '40 second'; highlight_time='0.666666667'">40 second</li>
                                            <li class="concise p-1" :class="{ 'active' : showTiming == '50 second'}" @click="timerOnOff = false;showTiming = '50 second'; highlight_time='0.833333333'">50 second</li>
                                            <li class="concise p-1" :class="{ 'active' : showTiming == '1 minute'}" @click="timerOnOff = false;showTiming = '1 minute'; highlight_time='1'">1 minute</li>
                                            <li class="concise p-1" :class="{ 'active' : showTiming == '2 minute'}" @click="timerOnOff = false;showTiming = '2 minute'; highlight_time='2'">2 minute</li>
                                            <li class="concise p-1" :class="{ 'active' : showTiming == '3 minute'}" @click="timerOnOff = false;showTiming = '3 minute'; highlight_time='3'">3 minute</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin-bottom">
                <div class="col">
                    <div class="block-title no-margin-top no-margin-left">Open Time:</div>
                    <div id="drop-down" @click="openTimePopupToggle($event)">
                        <div id="dropDown" class="drop-down__button">
                            <div class="drop-down__store display-flex justify_content_between padding align-items-center toggle-event-check">
                                <span class="drop-down__name">
                                    <input type="text" class="toggle-event-check" placeholder="Date Time" v-model="open_time" readonly="readonly" id="start-picker-date" />
                                    <input type="hidden" readonly="readonly" id="start-picker-date-hidden" />
                                </span>
                                <span classs="down__icon">
                                    <i class="f7-icons toggle-event-check">arrowtriangle_down_fill</i>
                                </span>
                            </div>
                        </div>

                        <div class="drop-down__menu-box">
                            <div class="drop-down__menu">
                                <div class="block-title margin-top">Set Open Time</div>
                                <div class="block block-strong no-padding no-margin margin-bottom time_piker_inner">
                                    <div id="start-picker-date-container"></div>
                                </div>
                                <div class="display-flex justify-content-end padding-bottom time__button">
                                    <a class="padding-right text-color-black toggle-event-check" href="javascript:;">Cancel</a>
                                    <a class="text-color-red" href="javascript:;" @click="opentimeshow()">OK</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="block-title no-margin-top no-margin-left">Close Time:</div>
                    <div id="drop-down-1" @click="closeTimePopupToggle($event)">
                        <div id="dropDown" class="drop-down__button">
                            <div class="drop-down__store display-flex justify_content_between padding align-items-center toggle-event-check">
                                <span class="drop-down__name">
                                    <input type="text" class="toggle-event-check" placeholder="Date Time" v-model="close_time" readonly="readonly" id="end-picker-date" />
                                    <input type="hidden" readonly="readonly" id="end-picker-date-hidden" />
                                </span>
                                <span classs="down__icon">
                                    <i class="f7-icons toggle-event-check">arrowtriangle_down_fill</i>
                                </span>
                            </div>
                        </div>

                        <div class="drop-down__menu-box">
                            <div class="drop-down__menu">
                                <div class="block-title margin-top">Set Close Time</div>
                                <div class="block block-strong no-padding no-margin margin-bottom time_piker_inner">
                                    <div id="end-picker-date-container"></div>
                                </div>
                                <div class="display-flex justify-content-end padding-bottom time__button">
                                    <a class="padding-right text-color-black toggle-event-check" href="javascript:;">Cancel</a>
                                    <a class="text-color-red" href="javascript:;" @click="endtimeshow()">OK</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="form-submit no-margin display-flex justify-content-right popup_button">
                <button type="reset" class="button button-raised text-color-red button-large popup-close popup-button"> Reset </button>
                <button type="submit" class="button button-raised text-color-white bg-color-red button-large popup-button"> Save Changes </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { ref } from "vue";
import Icon from '../../../components/Icon.vue';
import axios from 'axios';
import { f7 } from 'framework7-vue';
import Input from "../../../components/Form/Input.vue"

const logo_preview = ref("/images/logo.png");
const fav_preview = ref("/images/logo.png");
const highlight_on_off = ref(true);
const showTiming = ref('');
const timerOnOff = ref(false);
const highlight_time = ref('');
const close_time = ref(''); // Initialize close_time as a ref

const onRestaurantLogoChange = (e) => {
    logo_preview.value = URL.createObjectURL(e.target.files[0]);
}

const onRestaurantFavChange = (e) => {
    fav_preview.value = URL.createObjectURL(e.target.files[0]);
}

const RestaurantLogoDelete = () => {
    document.getElementById('logo_file').value = '';
    logo_preview.value = "/images/logo.png";
}

const RestaurantFavDelete = () => {
    document.getElementById('fav_file').value = '';
    fav_preview.value = "/images/logo.png";
}

const getGeneralsetting = () => {
    axios.get('/api/setting-data')
        .then((res) => {
            
        })
}
getGeneralsetting();

const submitGeneralsetting = () => {

}

const openTimePopupToggle = (e) => {
    if (!e.target.classList.contains('toggle-event-check')) return false;
    document.getElementById('drop-down').classList.toggle('drop-down--active');

    var ctime = close_time.value;
    var chours = Number(ctime.match(/^(\d+)/)[1]);
    var cminutes = Number(ctime.match(/:(\d+)/)[1]);
    var CAMPM = ctime.match(/\s(.*)$/)[1];
    if (CAMPM == "PM" && chours < 12) chours = chours + 12;
    if (CAMPM == "AM" && chours == 12) chours = chours - 12;
    var csHours = chours.toString();
    var csMinutes = cminutes.toString();
    if (chours < 10) csHours = "0" + csHours;
    if (cminutes < 10) csMinutes = "0" + csMinutes;

    createPicker(csHours, csMinutes);
}

const closeTimePopupToggle = (e) => {
    if (!e.target.classList.contains('toggle-event-check')) return false;
    document.getElementById('drop-down-1').classList.toggle('drop-down--active');

    var ctime = close_time.value;
    var chours = Number(ctime.match(/^(\d+)/)[1]);
    var cminutes = Number(ctime.match(/:(\d+)/)[1]);
    var CAMPM = ctime.match(/\s(.*)$/)[1];
    if (CAMPM == "PM" && chours < 12) chours = chours + 12;
    if (CAMPM == "AM" && chours == 12) chours = chours - 12;
    var csHours = chours.toString();
    var csMinutes = cminutes.toString();
    if (chours < 10) csHours = "0" + csHours;
    if (cminutes < 10) csMinutes = "0" + csMinutes;

    createPicker(csHours, csMinutes);
}

const createPicker = (hours, minutes) => {
    const picker = f7.picker.create({
        containerEl: '#end-picker-date-container',
        inputEl: '#end-picker-date-hidden',
        toolbar: false,
        rotateEffect: true,
        value: [
            hours,
            minutes
        ],
        formatValue: function (values, displayValues) {
            return displayValues[0] + ':' + values[1] + ' ' + values[2];
        },
        cols: [
            // Hours
            {
                values: (function () {
                    var arr = [];
                    for (var i = 1; i <= 12; i++) { arr.push(i < 10 ? '0' + i : i); }
                    return arr;
                })(),
            },
            // Divider
            {
                divider: true,
                content: ':'
            },
            // Minutes
            {
                values: (function () {
                    var arr = [];
                    for (var i = 0; i <= 59; i++) { arr.push(i < 10 ? '0' + i : i); }
                    return arr;
                })(),
            },
            // am / pm
            {
                values: (function () {
                    var arr = ['AM', 'PM'];

                    return arr;
                })(),
            }
        ],
        on: {
            change: function (picker, values, displayValues) {
                var daysInMonth = picker.value[0] + ' : ' + picker.value[1] + ' ' + picker.value[2];
            }
        }
    });
}
</script>