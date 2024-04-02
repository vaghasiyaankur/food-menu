<template>
    <f7-page>
        <div class="setting-tabs">
            <div class="col-100 large-50 medium-40 margin-left">
                <h3>
                    <span class="page_heading"> Setting</span>
                </h3>
            </div>
            <div class="card elevation-2 border_radius_10">
                <div class="card-content card-content-padding categorey_card" style="display: flex;">
                    <div class="toolbar tabbar" style="flex-direction: column;">
                        <div class="toolbar-inner">
                            <a href="#tab-general" class="tab-link tab-link-active">General</a>
                            <a href="#tab-table-management" class="tab-link">Table Management</a>
                            <a href="#tab-floor-plan" class="tab-link">Floor Plan</a>
                            <a href="#tab-language" class="tab-link">Language</a>
                            <a href="#tab-qr-code" class="tab-link">QR Code</a>
                        </div>
                        </div>
                        <div class="tabs margin-left" style="flex-grow: 1;">
                        <div id="tab-general" class="tab tab-active">
                            <div class="form-title">
                                <h3>                                    
                                    <span class="page_heading">
                                        Add General
                                    </span> 
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
                                        <div class="image-field item-input-wrap">
                                            <input type="file" name="file" id="file" @change="onRestaurantLogoChange">
                                            <label for="file">
                                            <div>
                                                <img src="/images/logo.png" alt="" class="restaurant_logo">
                                            </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="item-inner">
                                        <div class="block-title no-margin-top">Fav Icon</div>
                                        <div class="item-input-wrap">
                                            <input type="file" name="file" id="file" @change="onRestaurantLogoChange">
                                            <label for="file">
                                            <div>
                                                <img src="/images/logo.png" alt="" class="restaurant_logo">
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
                        </div>
                        <div id="tab-table-management" class="tab">
                            456
                        </div>
                        <div id="tab-floor-plan" class="tab">
                            789
                        </div>
                        <div id="tab-language" class="tab">
                            101112
                        </div>
                        <div id="tab-qr-code" class="tab">
                            113323
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>

<script setup>
import {
    f7Page,
    f7Navbar,
    f7BlockTitle,
    f7Block,
    f7,
    f7Input
} from 'framework7-vue';

</script>
<style scoped>
.height-40 {
    height: 40px;
}

.bg-dark {
    background: #38373D;
}

.icon-only {
    width: 100% !important;
    height: 100% !important;
}

.border-bottom {
    border-bottom: 1px solid #EAEAEA;
}

.padding-icon {
    padding: 3px;
}

.border-right {
    border-right: 1px solid #F3F3F3 !important;
}

.header-links {
    width: 75%;
}

.bg-pink {
    background: #F33E3E;
}

.bg-karaka-orange {
    background: #EE4925;
}

.text-color-pink {
    color: #F33E3E;
}

.font-22 {
    font-size: 22px;
}

.height-36 {
    height: 36px;
}

.category_image {
    background: #FFE3E3;
    filter: drop-shadow(1px 1px 4px rgba(0, 0, 0, 0.2));
    border-radius: 5px;
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.category_name {
    font-weight: 500;
    font-size: 18px;
    line-height: 18px;
}

.setting-tabs .category-list .button {
    box-shadow: none;
}

.border__right {
    border-right: 1px solid #D8D8D8;
    border-radius: 0;
}

.popup_title {
    font-weight: 500;
    font-size: 18px;
    line-height: 22px;
    color: #38373D;
}

.popup_button .button {
    width: 130px;
    border-radius: 10px;
}

.category-image-selection .popup_img {
    width: 100%;
    height: 100%;
}

.category-image-selection .popup_img img {
    width: 100%;
    height: 100%;
    object-fit: none;
}

.setting-tabs .card {
    height: calc(100vh - 132px);
    overflow: scroll;
}

.setting-tabs {
    margin-top: 77px;
}

.setting-tabs .category-list .menu-dropdown-link {
    border-bottom: none !important;
}

@media screen and (max-width:820px) {
    .header-links {
        width: 100%;
    }

}
</style>

<style>
.border_radius_10 {
    border-radius: 10px;
}

.page_heading {
    font-weight: 600;
    font-size: 20px;
    line-height: 24px;
    color: #38373D;
}

.dialog-title {
    padding-bottom: 10px;
}

.cart-list {
    box-shadow: 1px 2px 5px 2px rgb(0 0 0 / 20%);
}

.padding-top-page-content {
    padding-top: 50px !important;
}

.navbar-large .title {
    opacity: 1 !important;
    left: 0 !important;
}

.title-large {
    display: none !important;
}

.fav-list-remove-icon {
    border-radius: 50%;
}

.category-add {
    border-top: 1px solid #D8D8D8;
}

.add_category_name {
    font-weight: 400;
    font-size: 16px;
    line-height: 19px;
}

.category-name {
    background: #F7F7F7 !important;
    border-radius: 10px !important;
    width: 100%;
    height: 40px;
}

.category-image {
    background: #F7F7F7;
    border: 1px dashed #999999;
    border-radius: 2px;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 90px;
}

#categoryImage {
    opacity: 0;
    width: 0;
    height: 0;
}

.add-image-text {
    border: 1px solid transparent;
    border-radius: 7px;
    padding: 8px 15px;
}

.dialog-buttons {
    width: 70%;
    margin: 0 auto 15px;
}

.selectCategory {
    width: 100%;
    height: 40px;
}

.popup {
    width: 378px !important;
    height: auto !important;
    top: 20% !important;
    left: 35% !important;
    margin: 0 !important;
}

.popup-button {
    text-transform: capitalize !important;
}

.pagination_count .pagination_list {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.pagination_count .pagination_list a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 5px;
}

@media screen and (max-width:991px) {
    .popup {
        left: 28% !important;
        top: 28% !important;
    }
}
</style>
