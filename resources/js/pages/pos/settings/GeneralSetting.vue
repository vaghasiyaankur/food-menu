<template>
    <div class="form-title general_settings-banner">
        <h3 class="no-padding no-margin">
            <span class="page_heading general_settings"> Add General </span>
        </h3>
    </div>
    <div class="general_info_form">
        <form class="list" id="my-form" @submit.prevent="submitGeneralsetting">
            <div class="item-content item-input general_info_form-restaurent-name no-padding">
                <div class="item-inner no-padding">
                    <div class="block-title no-margin">Restaurant Name</div>
                    <div class="item-input-wrap general_info_form-input ">
                        <input type="text" name="name" class="" placeholder="Enter restaurant name" v-model="restaurant_name">
                    </div>
                </div>
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
                <div class="item-inner no-padding">
                    <div class="block-title no-margin">Address</div>
                    <div class="item-input-wrap general_info_form-input ">
                        <input type="text" name="member" class="" placeholder="Enter Address" v-model="manager_name">
                    </div>
                </div>
            </div>
            <div class="item-content item-input general_info_form-phone no-padding">
                <div class="item-inner no-padding">
                    <div class="block-title no-margin">Phone</div>
                    <div class="item-input-wrap general_info_form-input ">
                        <input type="text" name="member" class="" placeholder="Enter Phone" v-model="manager_name">
                    </div>
                </div>
                <div class="item-inner no-padding">
                    <div class="block-title no-margin">Time Zone</div>
                    <div class="item-input-wrap general_info_form-input ">
                        <input type="text" name="member" class="" placeholder="Enter Time Zone" v-model="manager_name">
                    </div>
                </div>
            </div>
            <div class="item-content item-input general_info_form-print no-padding">
                <div class="item-inner">
                    <div class="block-title no-margin">Print Bill Header</div>
                    <div class="item-input-wrap general_info_form-input ">
                        <input type="text" name="member" class="" placeholder="Enter Print Bill Header" v-model="manager_name">
                    </div>
                </div>
                <div class="item-inner">
                    <div class="block-title no-margin">Print Bill Footer</div>
                    <div class="item-input-wrap general_info_form-input ">
                        <input type="text" name="member" class="" placeholder="Enter Print Bill Footer" v-model="manager_name">
                    </div>
                </div>
            </div>
            <hr>
            <div class="time_onoff">
                <h3 class="card-title">Highlight Time ON /OFF</h3>
                <div class="row align-items-center">
                    <div class="col-50 height_46">
                        <label class="switch">
                            <input type="checkbox" class="switch-input" @change="highlight_on_off = !highlight_on_off" :checked="highlight_on_off">
                            <span class="switch-label" data-on="On" data-off="Off"></span>
                            <span class="switch-handle"></span>
                        </label>
                    </div>
                    <div class="col-50 padding-left list" :class="{ 'display-none' : !highlight_on_off }">
                        <div class="item-content item-input no-padding">
                            <div class="item-inner no-padding-right">
                                <div class="item-input-wrap">
                                    <div class="f-concise position-relative">
                                        <div id="selection-concise" class="timer--list">
                                            <div id="select-concise" class="input-dropdown-wrap"  @click="timerOnOff = !timerOnOff">{{ showTiming }}</div>
                                            <ul id="location-select-list" class="dropdown_list" :class="{ 'display-none' : !timerOnOff }">
                                                <li class="concise p-1" :class="{ 'active' : showTiming == '10 second'}">10 second</li>
                                                <li class="concise p-1" :class="{ 'active' : showTiming == '20 second'}">20 second</li>
                                                <li class="concise p-1" :class="{ 'active' : showTiming == '30 second'}">30 second</li>
                                                <li class="concise p-1" :class="{ 'active' : showTiming == '40 second'}">40 second</li>
                                                <li class="concise p-1" :class="{ 'active' : showTiming == '50 second'}">50 second</li>
                                                <li class="concise p-1" :class="{ 'active' : showTiming == '1 minute'}">1 minute</li>
                                                <li class="concise p-1" :class="{ 'active' : showTiming == '2 minute'}">2 minute</li>
                                                <li class="concise p-1" :class="{ 'active' : showTiming == '3 minute'}">3 minute</li>
                                            </ul>
                                        </div>
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

const logo_preview = ref("/images/logo.png");
const fav_preview = ref("/images/logo.png");
const highlight_on_off = ref(true);
const showTiming = ref('');
const timerOnOff = ref(false);

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
</script>