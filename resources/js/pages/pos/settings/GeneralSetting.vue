<template>
    <div class="form-title">
        <h3>                                    
            <span class="page_heading"> Add General </span> 
        </h3>
    </div>
    <div class="general_info_form">
        <form class="list margin-vertical" id="my-form">
        <div class="item-content item-input margin-bottom no-padding-left">
            <div class="item-inner">
                <div class="block-title no-margin-top">Restaurant Name</div>
                <div class="item-input-wrap">
                    <input type="text" name="name" class="padding margin-top-half" placeholder="Enter restaurant name" v-model="restaurant_name">
                </div>
            </div>
        </div>
        <div class="item-content item-input margin-bottom no-padding-left">
            <div class="item-inner">
                <div class="block-title no-margin-top">Logo</div>
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
            <div class="item-inner">
                <div class="block-title no-margin-top">Fav Icon</div>
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
        <div class="item-content item-input margin-bottom no-padding-left">
            <div class="item-inner">
                <div class="block-title no-margin-top">Address</div>
                <div class="item-input-wrap">
                    <input type="text" name="member" class="padding margin-top-half" placeholder="Enter manager name"  v-model="manager_name">
                </div>
            </div>
        </div>
        <div class="item-content item-input margin-bottom no-padding-left">
            <div class="item-inner">
                <div class="block-title no-margin-top">Phone</div>
                <div class="item-input-wrap">
                    <input type="text" name="member" class="padding margin-top-half" placeholder="Enter manager name"  v-model="manager_name">
                </div>
            </div>
            <div class="item-inner">
                <div class="block-title no-margin-top">Time Zone</div>
                <div class="item-input-wrap">
                    <input type="text" name="member" class="padding margin-top-half" placeholder="Enter manager name"  v-model="manager_name">
                </div>
            </div>
        </div>
        <div class="item-content item-input margin-bottom no-padding-left">
            <div class="item-inner">
                <div class="block-title no-margin-top">Print Bill Header</div>
                <div class="item-input-wrap">
                    <input type="text" name="member" class="padding margin-top-half" placeholder="Enter manager name"  v-model="manager_name">
                </div>
            </div>
            <div class="item-inner">
                <div class="block-title no-margin-top">Print Bill Footer</div>
                <div class="item-input-wrap">
                    <input type="text" name="member" class="padding margin-top-half" placeholder="Enter manager name"  v-model="manager_name">
                </div>
            </div>
        </div>
        <div class="form-submit no-margin-bottom display-flex justify-content-right padding-top popup_button">
            <button type="button" class="button button-raised text-color-red button-large popup-close margin-right popup-button">
                Cancel
            </button>
            <button type="button" class="button button-raised text-color-white bg-color-red button-large margin-right  popup-button">
                Save Changes
            </button>
        </div>
        </form>
    </div>
</template>

<script setup>
import Icon from '../../../components/Icon.vue';
</script>