<template>
    <f7-page>
        <div class="nav-bar">
            <f7-navbar class="navbar-menu bg-color-white" large transparent back-link="Back">
                <div class="header-links display-flex align-items-center padding-right">
                    <div class="row header-link justify-content-flex-end align-items-center">
                        <div class=" padding-left-half padding-right-half height-40 nav-button">
                            <a href="/Reservation/"
                                class="col link nav-link button button-raised bg-dark text-color-white padding">
                                Reservation</a>
                        </div>
                        <div class="col-25 nav-button">
                            <div class="menu-item menu-item-dropdown">
                                <div class="menu-item-content button button-raised bg-pink text-color-white padding-left-half padding-right-half">
                                    Menu management
                                    <i class="f7-icons">chevron_down</i>
                                </div>
                                <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                                    <div class="menu-dropdown-content bg-color-white no-padding">
                                        <a href="#" class="menu-dropdown-link menu-close margin-horizontal no-padding"></a>
                                        <a href="/food-category/"
                                            class="menu-dropdown-link menu-close text-color-black">Food Category</a>
                                        <a href="/food-subcategory/"
                                                class="menu-dropdown-link menu-close text-color-black">Food SubCategory</a>
                                        <a href="/food-product/"
                                            class="menu-dropdown-link menu-close text-color-black">Food Menu</a>
                                        <a href="/digital-menu/"
                                            class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Digital Menu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="nav-button">
                        <div class="menu-item menu-item-dropdown">
                            <div class="menu-item-content button button-raised bg-pink text-color-white padding-left-half padding-right-half">Menu management</div>
                            <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                                <div class="menu-dropdown-content bg-color-white no-padding">
                                    <a href="#" class="menu-dropdown-link menu-close"></a>
                                    <a href="/food-category/" class="menu-dropdown-link menu-close text-color-pink">Food Category</a>
                                    <a href="/food-product/" class="menu-dropdown-link menu-close text-color-black">Food Menu</a>
                                    <a href="/food-subcategory/" class="menu-dropdown-link menu-close text-color-black">Food SubCategory</a>
                                    <a href="/digital-menu/" class="menu-dropdown-link menu-close text-color-black">Digital Menu</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                        <div class=" padding-left-half padding-right-half height-40 nav-button"><a href="/Reporting/"
                                class="link nav-link button button-raised bg-dark text-color-white padding">Reporting</a>
                        </div>
                        <div class="padding-left-half padding-right-half height-40"><button
                                class="nav-link button button-raised bg-dark text-color-white padding closeReservation"
                                @click="$root.closeReservation()">Close reservation</button></div>
                        <div class="padding-left-half padding-right-half height-40"><a href="/settings/"
                                class="nav-link button button-raised bg-dark text-color-white padding">Settings</a>
                        </div>
                    </div>
                </div>
            </f7-navbar>
        </div>
        <div class="category-list-section">
            <div class="card elevation-2">
                <div class="card_header">
                    <div class="row padding-left padding-right align-items-center">
                        <div class="col-50">
                            <h3>Category</h3>
                        </div>
                        <div class="col-50">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="item-content item-input">
                                        <div class="item-inner">
                                            <div class="item-input-wrap searchData row padding-half">
                                                <i class="f7-icons font-22 search-icon">search</i>
                                                <input type="search" v-model="search" name="search" id="searchData" @input="getCategories()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col padding-left-half padding-right-half">
                                    <button class="button button-raised bg-dark text-color-white padding height-36 popup-open"
                                        data-popup=".categoryPopup" @click="category_title = 'Add Category'; category_placeholder = 'Add Category name'; category.id = null"><i class="f7-icons font-22">plus_square</i> Add
                                        category</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content card-content-padding categorey_card">
                    <div class="category-list border-bottom padding-top padding-bottom"
                        v-for="(category,index) in categories" :key="category">
                        <div class="row align-items-center">
                            <div class="col-5 category-count">
                                <span>{{ index + 1 }}.</span>
                            </div>
                            <div class="col-100 medium-50 large-60 ">
                                <div class="display-flex align-items-center">
                                    <div class="category_image">
                                        <img :src="'/storage'+category.image" alt="">
                                    </div>
                                    <p class="padding-left-half category_name">{{ category.name }}</p>
                                </div>
                            </div>
                            <div class="col-100 medium-45 large-35 action-buttons">
                                <div class="row align-items-center">
                                    <div class="col-50">
                                        <button class="button text-color-black padding height-36 border__right popup-open" data-popup="#subCategory_popup"
                                            @click="subCategory.category = category.id">
                                            <i class="f7-icons font-22">plus_square</i>Add sub category
                                        </button>
                                    </div>
                                    <div class="col-25">
                                        <button class="button text-color-black padding height-36 popup-open" data-popup=".categoryPopup"
                                            @click="editCategory(category.id)"><i
                                                class="f7-icons font-22">square_pencil</i> Edit</button>
                                    </div>
                                    <div class="col-25">
                                        <button class="button text-color-red padding height-36"
                                            @click="removeCategory(category.id)"><i class="f7-icons font-22">trash</i>
                                            Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="category_popup" class="popup categoryPopup" style="position: fixed; display: block; border-radius: 15px;">
            <div class="category-form">
                <div class="text-align-center padding popup_title">{{ category_title }}</div>
                <div class="category-add padding">
                    <label class="add_category_name">Category name</label>
                    <div class="categoryForm text-align-left">
                        <input type="text" v-model="category.name" name="name"
                            class="category-name margin-top-half padding-left-half padding-right-half"
                            :placeholder="category_placeholder">
                    </div>
                    <div class="category-image-selection margin-top">
                        <input type="file" class="add-category-image" @change="addimageChange" id="categoryImage" />
                        <label class="category-image text-align-center" for="categoryImage">
                            <div v-if="image_url" class="popup_img">
                                <img :src="image_url" alt="" />
                            </div>
                            <div v-else>
                                <div class="margin-bottom">
                                    <img src="/images/add-image.png" />
                                </div>
                                <div>
                                    <span class="add-image-text">Select Image</span>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="margin-top no-margin-bottom display-flex justify-content-center padding-top popup_button">
                        <button type="button" class="button button-raised text-color-black button-large popup-close margin-right popup-button">Cancel</button>
                        <button type="button" class="button button-raised button-large popup-button" style="background-color: rgb(243, 62, 62); color: rgb(255, 255, 255);" @click="addCategory">Ok</button>
                    </div>
                </div>
                <div><img src="/images/flow.png" style="width:100%"></div>
            </div>
        </div>
        <div id="subCategory_popup" class="popup subCategoryPopup" style="position: fixed; display: block; border-radius: 15px;">
            <div class="text-align-center padding popup_title">Add Sub category</div>
            <div class="category-add padding">
                <div class="categoryForm text-align-left no-padding margin-bottom">
                    <label class="add_category_name">Sub category name</label>
                    <input type="text" name="name" v-model="subCategory.name"
                        class="category-name margin-top-half padding-left-half padding-right-half"
                        placeholder="Add sub category name">
                </div>
                <div class="categoryForm text-align-left margin-bottom">
                    <label for="" class="add_category_name">Parent category</label>
                    <div class="item-input-wrap input-dropdown-wrap category-name margin-top-half no-padding">
                        <select placeholder="Please choose..." v-model="subCategory.category" class="selectCategory padding-left-half">
                            <option v-for="(category,key) in categoryOption" :key="category" :value="key">{{ category }}</option>
                        </select>
                    </div>
                </div>
                <div class="margin-top no-margin-bottom display-flex justify-content-center padding-top popup_button">
                    <button type="button" class="button button-raised text-color-black button-large popup-close margin-right popup-button">Cancel</button>
                    <button type="button" class="button button-raised button-large text-color-white popup-button" style="background-color: #f33e3e" @click="addSubCategory">Ok</button>
                </div>
            </div>
            <div><img src="/images/flow.png" style="width:100%"></div>
        </div>
    </f7-page>
</template>

<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input } from 'framework7-vue';
import $ from 'jquery';
import axios from "axios";

export default {
    name: 'Favourite',
    data() {
        return {
            test: 'indian',
            categories: [],
            categoryOption : [],
            category: {
                id : null,
                name: '',
                image: '',
            },
            subCategory: {
                name: '',
                category: null,
            },
            category_title: 'Add Category',
            category_placeholder: 'Add Category name',
            image_url: null,
            search : '',
        }
    },
    components: {
        f7Page,
        f7Navbar,
        f7BlockTitle,
        f7Block,
        f7,
        f7Input
    },
    mounted() {
        $('.page-content').css('background', '#FFF');
        this.getCategories();
        this.getAllCategories();
    },
    methods: {
        addimageChange(e) {
            this.category.image = e.target.files[0];
            this.image_url = URL.createObjectURL(this.category.image);
        },
        getCategories() {
            axios.post('/api/get-categories', { search: this.search})
            .then((res) => {
                this.categories = res.data;
            })
        },
        removeCategory(id) {
            f7.dialog.confirm('Are you sure delete the category?', () => {
                axios.post('/api/delete-category', { id: id })
                .then((res) => {
                    this.getCategories();
                })
            });
            setTimeout(() => {
                $('.dialog-button').eq(1).css({ 'background-color': '#F33E3E', 'color': '#fff' });
                $('.dialog-title').html("<img src='/images/cross.png'>");
                $('.dialog-buttons').after("<div><img src='/images/flow.png' style='width:100%'></div>");
                $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
                $('.dialog-button').eq(1).removeClass('text-color-black');
                $('.dialog-buttons').addClass('margin-top no-margin-bottom')
            }, 200);
        },
        addCategory() {
            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }
            var formData = new FormData();
            formData.append('name', this.category.name);
            formData.append('image', this.category.image);
            if (!this.category.name || !this.category.image) {
                this.notification('Please fill the form details.');
                return false;
            }
            if (this.category.id) {
                formData.append('id', this.category.id);
                axios.post('/api/update-category', formData, config)
                .then((res) => {
                    this.getCategories();
                    f7.popup.close(`#category_popup`);
                })
            } else {
                axios.post('/api/add-category', formData, config)
                .then((res) => {
                    this.categories.push(res.data);
                    f7.popup.close(`#category_popup`);
                })
            }
        },
        editCategory(id) {
            this.category_title = 'Edit Category';
            this.category_placeholder = 'Edit Category name';
            axios.get('/api/get-category/'+id)
                .then((res) => {
                this.category.id = res.data.id;
                this.category.name = res.data.name;
                this.category.image = res.data.image;
                if (res.data.image) {
                    this.image_url = '/storage' + res.data.image;
                }
            })
        },
        addSubCategory() {
            var formData = new FormData();
            formData.append('name', this.subCategory.name);
            formData.append('category_id', this.subCategory.category);

            if (!this.subCategory.name || !this.subCategory.category) {
                this.notification('Please fill the form details.');
                return false;
            }

            axios.post('/api/add-sub-category', formData)
            .then((res) => {
                f7.popup.close(`#subCategory_popup`);
            })
        },
        notification(notice) {
            var notificationFull = f7.notification.create({
                subtitle: notice,
                closeTimeout: 3000,
            });
            notificationFull.open();
        },
        getAllCategories() {
            axios.get('/api/categories')
            .then((res) => {
                this.categoryOption = res.data;
            })
        }
    },
};
</script>

<style scoped>
.menu-item-dropdown .menu-item-content .f7-icons{
    font-size: 15px;
    margin-left: 10px;
}
.nav-bar {
    position: fixed;
    width: 100%;
    z-index: 100;
}

.category-list-section {
    margin-top: 70px
}

.page-food-category {
    background: #f1f1f1;
}

.navbar-menu {
    box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.15);
    height: 60px !important;
    position: relative;
    z-index: 99;
}

.height-40 {
    height: 40px;
}

.menu-item-content {
    position: relative;
    z-index: 9;
}

.menu-dropdown-content {
    box-shadow: 0px 0.5px 12px rgba(0, 0, 0, 0.2);
    min-width: 100% !important;
    top: -30px;
}

.menu-dropdown-center:before,
.menu-dropdown-center:after {
    content: none;
}

.bg-dark {
    background: #38373D;
}

.menu-item-dropdown-opened .menu-item-content {
    background: #F33E3E;
}

.menu-dropdown-link {
    border-bottom: 1px solid #EFEFEF;
}

.color-pink {
    background: #F33E3E;
}

.nav-bar {
    border-radius: 8px 8px 0px 0px;
}

.page-content {
    padding-top: 0px !important;
    background-color: #fff !important;
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

.item-input-wrap {
    width: 100%;
    background: #F0F0F0;
    border: 0.5px solid #DCDCDC;
    border-radius: 7px;
    height: auto;
}

#searchData {
    width: 90%;
}

.height-36 {
    height: 36px;
}

.category-count {
    border-right: 1px solid #D8D8D8;
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

.category-list-section .category-list .button {
    box-shadow: none;
}

.action-buttons button {
    text-transform: capitalize;
}

.border__right {
    border-right: 1px solid #D8D8D8;
    border-radius: 0;
}
.popup_title{
    font-weight: 500;
    font-size: 18px;
    line-height: 22px;
    color: #38373D;
}
.popup_button .button{
    width: 130px;
    border-radius: 10px;
}
.category-image-selection .popup_img {
    width: 100%;
    height: 100%;
}
.category-image-selection .popup_img img{
    width: 100%;
    height: 100%;
    object-fit: none;
}
/*.categorey_card{
    height: calc(100vh - 150px);
    overflow: auto;
}*/
.category-list-section .card{
    height: calc(100vh - 94px);
    overflow:scroll;
}
@media screen and (max-width:820px) {
    .header-links {
        width: 100%;
    }
    .category-list-section .card{
        height: calc(100vh - 400px);
        overflow: scroll;
    }
}
</style>

<style>
.left {
    width: 20%;
    margin-left: 20px;
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

.nav-link,
.menu-item-content {
    height: 100% !important;
    text-transform: capitalize !important;
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
    height:auto !important;
    top: 20% !important;
    left: 35% !important;
    margin : 0 !important;
}
.dialog{
    top: 36%;
}

.popup-button{
    text-transform: capitalize !important;
}

@media screen and (max-width:820px) {
    .left {
        width: 30%;
    }

}

/*@media screen and (max-width:820px) {
    .left {
        width: 50%;
    }
}*/
</style>
