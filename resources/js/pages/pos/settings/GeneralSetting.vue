<template>
    <div class="form-title general_settings-banner">
        <h3 class="no-padding no-margin">
            <span class="page_heading general_settings"> Add General </span>
        </h3>
    </div>
    <div class="general_info_form">
        <form class="list" id="my-form" @submit.prevent="submitGeneralSetting">
            <div class="item-content item-input general_info_form-address no-padding">
                <Input label="Restaurant Name" type="text" name="name" placeholder="Enter restaurant name" />
            </div>
            <div class="item-content item-input general_info_form-image-input no-padding">
                <div class="item-inner no-padding">
                    <SettingImage name="logo_file" label="Logo" />
                </div>
                <div class="item-inner no-padding">
                    <SettingImage name="fav_file" label="Fav Icon" />
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
                <div class="row align-items-center margin-bottom">
                    <div class="col-50 height_46">
                        <Switch :changeStatus="highlightOnOff" :label="'Highlight Time ON /OFF'" @update:changeData="changeData" />
                    </div>
                    <div class="col-50 list" :class="{ 'display-none' : !highlightOnOff }">
                        <div class="item-content item-input no-padding">
                            <div class="item-inner no-padding-right general_info_form-print no-padding">
                                <Dropdown :options="options" name="highlight_time" :placeholder="'select highlight time'" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-content item-input general_info_form-print no-padding">
                    <Timer label="Open Time" name="open_time" />
                    <div class="item-inner no-padding">
                        <div class="block-title no-margin-top no-margin-left">Close Time:</div>
                        <div id="drop-down-1" @click="closeTimePopupToggle($event)">
                            <div id="dropDown" class="drop-down__button">
                                <div class="drop-down__store display-flex justify-content-space-between padding-horizontal align-items-center toggle-event-check">
                                    <span class="drop-down__name">
                                        <input type="text" class="toggle-event-check" placeholder="Date Time" v-model="closeTime" readonly="readonly" id="end-picker-date" />
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
                                        <a class="text-color-red" href="javascript:;" @click="endTimeShow()">OK</a>
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
import Switch from "../../../components/Form/Switch.vue"
import SettingImage from "../../../components/Form/SettingImage.vue";
import Dropdown from "../../../components/Form/DropDown.vue";
import Timer from "../../../components/Form/Timer.vue";

const highlightOnOff = ref(true);
const showTiming = ref('');
const timerOnOff = ref(false);
const highlightTime = ref('');
const closeTime = ref(''); // Initialize closeTime as a ref
const options = ref([
    {id : '0.166666667', label : '10 second'},
    {id : '0.333333333', label : '20 second'},
    {id : '0.5', label : '30 second'},
    {id : '0.666666667', label : '40 second'},
    {id : '0.833333333', label : '50 second'},
    {id : '1', label : '1 Minute'},
    {id : '2', label : '2 Minute'},
    {id : '3', label : '3 Minute'},
]);
const startPicker = ref(null);

const getGeneralSetting = () => {
    axios.get('/api/setting-data')
    .then((res) => {
        
    })
}
getGeneralSetting();

const changeData = (status) => {
    highlightOnOff.value = status;
}

const openTimePopupToggle = (e) => {
    if (!e.target.classList.contains('toggle-event-check')) return false;
    document.getElementById('drop-down').classList.toggle('drop-down--active');
    // Destroy the picker if it exists
    if (startPicker.value) {
        document.getElementById("start-picker-date-container").innerHTML = '';
    }

    var ctime = closeTime.value;
    var chours = '0';
    var cminutes = '0';
    if (ctime) {
        const match = ctime.match(/^(\d+)/);
        if (match) {
            chours = Number(match[1]);
            cminutes = Number(match[1]);
            var CAMPM = match[1];
            if (CAMPM == "PM" && chours < 12) chours = chours + 12;
            if (CAMPM == "AM" && chours == 12) chours = chours - 12;
        }
    }

    var csHours = chours.toString();
    var csMinutes = cminutes.toString();
    if (chours < 10) csHours = "0" + csHours;
    if (cminutes < 10) csMinutes = "0" + csMinutes;
    createPicker(csHours, csMinutes,'start');
}

const closeTimePopupToggle = (e) => {
    if (!e.target.classList.contains('toggle-event-check')) return false;
    document.getElementById('drop-down-1').classList.toggle('drop-down--active');
    if (startPicker.value) {
        document.getElementById("end-picker-date-container").innerHTML = '';
    }

    var ctime = closeTime.value;
    var chours = '0';
    var cminutes = '0';
    if (ctime) {
        const match = ctime.match(/^(\d+)/);
        if (match) {
            chours = Number(match[1]);
            cminutes = Number(match[1]);
            var CAMPM = match[1];
            if (CAMPM == "PM" && chours < 12) chours = chours + 12;
            if (CAMPM == "AM" && chours == 12) chours = chours - 12;
        }
    }
    var csHours = chours.toString();
    var csMinutes = cminutes.toString();
    if (chours < 10) csHours = "0" + csHours;
    if (cminutes < 10) csMinutes = "0" + csMinutes;

    createPicker(csHours, csMinutes,'end');
}

const createPicker = (hours, minutes,id) => {
    startPicker.value = f7.picker.create({
        containerEl: '#'+id+'-picker-date-container',
        inputEl: '#'+id+'-picker-date-hidden',
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