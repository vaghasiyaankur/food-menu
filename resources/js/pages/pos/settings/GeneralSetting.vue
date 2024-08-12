<template>
    <div class="form-title general_settings-banner">
        <h3 class="no-padding no-margin">
            <span class="page_heading general_settings"> Add General </span>
        </h3>
    </div>
    <div class="general_info_form">
        <form class="list" id="general-setting-form" @submit.prevent="submitGeneralSetting">
            <input type="hidden" name="id" :value="data?.id">
            <div class="item-content item-input general_info_form-address no-padding">
                <Input label="Restaurant Name" type="text" name="restaurant[name]" :value="restaurant?.name" placeholder="Enter restaurant name" />
            </div>
            <div class="item-content item-input general_info_form-image-input no-padding">
                <div class="item-inner no-padding">
                    <SettingImage name="restaurant[logo]" label="Logo" :preview="logoPreview" @set:update="changeLogo" />
                </div>
                <div class="item-inner no-padding">
                    <SettingImage name="restaurant[fav_icon]" label="Fav Icon" :preview="favPreview" @set:update="changeLogo" />
                </div>
            </div>
            <div class="item-content item-input general_info_form-address no-padding">
                <Input label="Address" type="text" name="setting[address]" :value="data?.address" placeholder="Enter Address" />
            </div>
            <div class="item-content item-input general_info_form-phone no-padding">
                <Input label="Phone" type="number" name="setting[phone_number]" :value="data?.phone_number" placeholder="Enter Phone" />
                <Input label="Member Capacity" type="number" name="setting[member_capacity]" :value="data?.member_capacity" placeholder="Enter Member capacity" />
            </div>
            <div class="item-content item-input general_info_form-print no-padding">
                <Input label="Print Bill Header" type="text" name="setting[bill_header]" :value="data?.bill_header" placeholder="Enter Print Bill Header" />
                <Input label="Print Bill Footer" type="text" name="setting[bill_footer]" :value="data?.bill_footer" placeholder="Enter Print Bill Footer" />
            </div>
            <hr class="margin-vertical">
            <div class="time_onoff margin-top">
                <div class="row align-items-center margin-bottom">
                    <div class="col-50 height_46">
                        <Switch :changeStatus="data?.highlight_on_off" name="setting[highlight_on_off]" :value="1" :label="'Highlight Time ON /OFF'" @update:changeData="changeData" />
                    </div>
                    <div class="col-50 list" :class="{ 'display-none' : !data?.highlight_on_off }">
                        <div class="item-content item-input no-padding">
                            <div class="item-inner no-padding-right general_info_form-print no-padding">
                                <Dropdown :options="options" :value="data?.highlight_time" name="setting[highlight_time]" :placeholder="'select highlight time'" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-content item-input general_info_form-print no-padding">
                    <Timer label="Open Time" name="restaurant[operating_start_hours]" :id="'restaurant_starting_hours'" :value="restaurant?.operating_start_hours" />
                    <Timer label="Close Time" name="restaurant[operating_end_hours]" :id="'restaurant_ending_hours'" :value="restaurant?.operating_end_hours" />
                </div>
            </div>
            <div class="form-submit no-margin display-flex justify-content-right popup_button">
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
import { successNotification, errorNotification, getErrorMessage } from '../../../commonFunction.js';

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
const data = ref(null);
const logoPreview = ref("/images/logo.png");
const favPreview = ref("/images/logo.png");
const restaurant = ref(null);

const getGeneralSetting = () => {
    axios.get('/api/setting-data')
    .then((res) => {
        data.value = res.data.setting;
        restaurant.value = res.data.restaurant;
        logoPreview.value =  '/storage/' + restaurant.value.logo;
        favPreview.value = '/storage/' + restaurant.value.fav_icon;
    })
}

getGeneralSetting();

const changeLogo = (type) => {
    if (type == 'restaurant[logo]') logoPreview.value = URL.createObjectURL(event.target.files[0]);
    else favPreview.value = URL.createObjectURL(event.target.files[0]);
}

const changeData = (status) => {
    highlightOnOff.value = status;
}

const submitGeneralSetting = () => {
    var formData = new FormData(event.target);
    axios.post('/api/update-setting', formData)
    .then((res) => {
        if(res.data.success) {
            document.getElementById('restaurant_logo_image') ?
            document.getElementById('restaurant_logo_image').setAttribute('src', '/storage/'+res.data?.logo) :
            "";
        }
        successNotification(res.data.success);
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
}

</script>