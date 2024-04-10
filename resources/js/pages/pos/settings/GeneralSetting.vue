<template>
    <div class="form-title general_settings-banner">
        <h3 class="no-padding no-margin">
            <span class="page_heading general_settings"> Add General </span>
        </h3>
    </div>
    <div class="general_info_form">
        <form class="list" id="my-form">
            <div class="item-content item-input general_info_form-restaurent-name no-padding">
                <div class="item-inner no-padding">
                    <div class="block-title no-margin">Restaurant Name</div>
                    <div class="item-input-wrap general_info_form-input">
                        <input type="text" name="name" class="" placeholder="Enter restaurant name"
                            v-model="restaurant_name">
                    </div>
                </div>
            </div>
            <div class="item-content item-input general_info_form-image-input no-padding">
                <div class="item-inner no-padding">
                    <div class="block-title no-margin">Logo</div>
                    <div class="image-logo">
                        <img src="/images/logo.png" width="100" height="100" alt="" class="restaurant_logo">
                    </div>
                    <div class="image-field item-input-wrap">
                        <input type="file" name="file" id="file" @change="onRestaurantLogoChange">
                        <label for="file">
                            <div class="image-label">
                                <div class="image-label-text">Choose File</div>
                                <button type="button" class="button image-label-remove">
                                    <Icon name="remove" color="#F33E3E" />
                                </button>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="item-inner no-padding">
                    <div class="block-title no-margin">Fav Icon</div>
                    <div class="image-logo">
                        <img src="/images/logo.png" width="100" height="100" alt="" class="restaurant_logo">
                    </div>
                    <div class="image-field item-input-wrap">
                        <input type="file" name="file" id="file" @change="onRestaurantLogoChange">
                        <label for="file">
                            <div class="image-label">
                                <div class="image-label-text">Choose File</div>
                                <button type="button" class="button image-label-remove">
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
                    <div class="item-input-wrap general_info_form-input">
                        <input type="text" name="member" class=""
                            placeholder="Enter manager name" v-model="manager_name">
                    </div>
                </div>
            </div>
            <div class="item-content item-input general_info_form-phone no-padding">
                <div class="item-inner no-padding">
                    <div class="block-title no-margin">Phone</div>
                    <div class="item-input-wrap general_info_form-input">
                        <input type="text" name="member" class=""
                            placeholder="Enter manager name" v-model="manager_name">
                    </div>
                </div>
                <div class="item-inner no-padding">
                    <div class="block-title no-margin">Time Zone</div>
                    <div class="item-input-wrap general_info_form-input">
                        <input type="text" name="member" class=""
                            placeholder="Enter manager name" v-model="manager_name">
                    </div>
                </div>
            </div>
            <div class="item-content item-input general_info_form-print no-padding">
                <div class="item-inner">
                    <div class="block-title no-margin">Print Bill Header</div>
                    <div class="item-input-wrap general_info_form-input">
                        <input type="text" name="member" class=""
                            placeholder="Enter manager name" v-model="manager_name">
                    </div>
                </div>
                <div class="item-inner">
                    <div class="block-title no-margin">Print Bill Footer</div>
                    <div class="item-input-wrap general_info_form-input">
                        <input type="text" name="member" class=""
                            placeholder="Enter manager name" v-model="manager_name">
                    </div>
                </div>
            </div>
            <div class="form-submit no-margin display-flex justify-content-right popup_button">
                <button type="button"
                    class="button button-raised text-color-red button-large popup-close margin-right popup-button">
                    Cancel
                </button>
                <button type="button"
                    class="button button-raised text-color-white bg-color-red button-large margin-right  popup-button">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import Icon from '../../../components/Icon.vue';
</script>