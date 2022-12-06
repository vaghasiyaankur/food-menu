<template>
<f7-page>
    <div class="nav-bar">
        <f7-navbar class="navbar-menu bg-color-white" large transparent back-link="Back">
            <div class="header-links display-flex align-items-center padding-right">
                <div class="row header-link justify-content-flex-end align-items-center">
                    <div class=" padding-left-half padding-right-half height-40 nav-button">
                        <a href="/Reservation/" class="col link nav-link button button-raised bg-dark text-color-white padding">
                            Reservation</a>
                    </div>
                    <div class="nav-button col-25">
                        <div class="menu-item menu-item-dropdown">
                            <div class="menu-item-content button button-raised bg-pink text-color-white padding-left-half padding-right-half">Menu management
                                <i class="f7-icons">chevron_down</i>
                            </div>
                            <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                                <div class="menu-dropdown-content bg-color-white no-padding">
                                    <a href="#" class="menu-dropdown-link menu-close"></a>
                                    <a href="/food-category/" class="menu-dropdown-link menu-close text-color-pink">Food Category</a>
                                    <a href="/food-subcategory/" class="menu-dropdown-link menu-close text-color-black">Food subCategory</a>
                                    <a href="/food-product/" class="menu-dropdown-link menu-close text-color-black">Food Menu</a>
                                    <a href="/digital-menu/" class="menu-dropdown-link menu-close text-color-black">Digital Menu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" padding-left-half padding-right-half height-40 nav-button"><a href="/reporting/" class="link nav-link button button-raised bg-dark text-color-white padding">Reporting</a></div>
                    <div class="padding-left-half padding-right-half height-40"><button class="nav-botton button button-raised bg-dark text-color-white padding closeReservation" @click="$root.closeReservation()">Close reservation</button></div>
                    <div class="padding-left-half padding-right-half height-40"><a href="/settings/" class="nav-link button button-raised bg-dark text-color-white padding">Settings</a></div>
                </div>
            </div>
        </f7-navbar>
    </div>
    <div class="subcategory-list-section">
        <div class="card elevation-2">
            <div class="card_header">
                <div class="row padding-left padding-right align-items-center">
                    <div class="col-100 large-50 medium-40">
                        <h3>Sub Category</h3>
                    </div>
                    <div class="col-100 large-50 medium-60">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="item-content item-input">
                                    <div class="item-inner">
                                        <div class="item-input-wrap searchData row padding-half">
                                            <i class="f7-icons font-22 search-icon">search</i>
                                            <input type="search" v-model="search" @input="getSubCategories()" name="search" id="searchData">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col padding-left-half padding-right-half">
                                <button class="button button-raised bg-dark text-color-white padding height-36 popup-open" @click="subCategory_title = 'Add Sub Category'; subCategory.name = ''; subCategory.category = '';" data-popup="#sub_category_popup"><i class="f7-icons font-22">plus_square</i> Add Sub Category</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-content card-content-padding">
                <div v-for="subcategory in subCategories" :key="subcategory">
                    <div class="main-category text-color-pink padding-left-half margin-top padding-top-half">{{ subcategory.name }}</div>
                    <div class="category-list border-bottom padding-vertical-half" v-for="subcat in subcategory.sub_category" :key="subcat">
                        <div class="row align-items-center">
                            <div class="col-100 large-60 medium-55">
                                <div class="display-flex align-items-center">
                                    <span class="padding-left-half sub_category_name">{{ subcat.name }}</span>
                                </div>
                            </div>
                            <div class="col-100 large-40 medium-45 action-buttons">
                                <div class="row align-items-center">
                                    <div class="col-50">
                                        <button class="button text-color-black padding height-36 popup-open border__right" data-popup="#product_popup" @click="product.sub_category = subcat.id"><i class="f7-icons font-22">plus_square</i>&nbsp; Add Product</button>
                                    </div>
                                    <div class="col-25">
                                        <button class="button text-color-black padding height-36 popup-open" data-popup="#sub_category_popup" @click="editSubCategory(subcat.id)"><i class="f7-icons font-22">square_pencil</i> Edit</button>
                                    </div>
                                    <div class="col-25">
                                        <button class="button text-color-red padding height-36" @click="removeSubCategory(subcat.id)"><i class="f7-icons font-22">trash</i> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sub_category_popup" class="popup" style="position: fixed; display: block; border-radius: 15px;">
        <div class="text-align-center padding popup_title">{{ subCategory_title }}</div>
        <div class="category-add padding">
            <div class="categoryForm text-align-left no-padding">
                <label for="" class="add_category_name">Sub category name</label>
                <input type="text" name="name" v-model="subCategory.name" class="category-name margin-top-half padding-left-half padding-right-half" placeholder="Add sub category name">
            </div>
            <div class="categoryForm text-align-left margin-top">
                <label for="" class="add_category_name">Parent category</label>
                <div class="item-input-wrap input-dropdown-wrap category-name margin-top-half no-padding">
                    <select placeholder="Please choose..." v-model="subCategory.category" class="selectCategory padding-left-half">
                        <option v-for="(category,key) in categoryOption" :key="category" :value="key">{{ category }}</option>
                    </select>
                </div>
            </div>
            <div class="margin-top no-margin-bottom display-flex justify-content-center padding-top popup_button">
                <button type="button" class="button button-raised text-color-black button-large popup-close margin-right popup-button">Cancel</button>
                <button type="button" class="button button-raised button-large bg-karaka-orange popup-button" style="background-color: rgb(243, 62, 62); color: rgb(255, 255, 255);" @click="addUpdateSubCategory">Ok</button>
            </div>
        </div>
        <div><img src="/images/flow.png" style="width:100%"></div>
    </div>
    <div id="product_popup" class="popup" style="position: fixed; display: block; border-radius: 15px;">
        <div class="text-align-center padding popup_title">Add Product</div>
        <div class="category-add padding">
            <div class="categoryForm text-align-left no-padding">
                <label for="" class="add_category_name">Add product</label>
                <input type="text" v-model="product.name" name="name" class="category-name margin-top-half padding-left-half padding-right-half" placeholder="Add Product name">
            </div>
            <div class="categoryForm text-align-left margin-top">
                <label for="" class="add_category_name">Choose Sub category</label>
                <div class="item-input-wrap input-dropdown-wrap category-name margin-top-half no-padding">
                    <select placeholder="Please choose..." v-model="product.sub_category" class="selectCategory padding-left-half">
                        <option v-for="(subCat,key) in subCategoryOption" :key="subCat" :value="key">{{ subCat }}</option>
                    </select>
                </div>
            </div>
            <div class="categoryForm margin-top text-align-left no-padding">
                <label for="" class="add_category_name">Price</label>
                <input type="text" name="name" v-model="product.price" class="category-name margin-top-half padding-left-half padding-right-half" placeholder="Add product price">
            </div>
            <div class="margin-top no-margin-bottom display-flex justify-content-center padding-top popup_button">
                <button type="button" class="button button-raised text-color-black button-large popup-close margin-right poup-button">Cancel</button>
                <button type="button" class="button button-raised button-large bg-karaka-orange poup-button" style="background-color: rgb(243, 62, 62); color: rgb(255, 255, 255);" @click="addProduct">Ok</button>
            </div>
        </div>
        <div><img src="/images/flow.png" style="width:100%"></div>
    </div>
</f7-page>
</template>

<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input } from 'framework7-vue';
import $ from 'jquery';
import axios from 'axios';

export default {
    name: 'FoodSubCategory',
    components: {
        f7Page,
        f7Navbar,
        f7BlockTitle,
        f7Block,
        f7,
        f7Input
    },
    data() {
        return {
            subCategories: [],
            categoryOption: [],
            subCategory: {
                id : null,
                name: '',
                category: null,
            },
            subCategory_title: 'Add Sub Category',
            search: '',
            subCategoryOption: [],
            product: {
                name : '',
                sub_category : null,
                price : '',
            }

        }
    },
    created() {
        this.getSubCategories();
    },
    mounted() {
        $('.page-content').css('background', '#FFF');
        this.getAllCategories();
        this.getAllSubCategories();
    },
    methods: {
        getSubCategories() {
            axios.post('/api/get-sub-categories', { search: this.search })
            .then((res) => {
                this.subCategories = res.data;
            })
        },
        addUpdateSubCategory() {
            var formData = new FormData();
            formData.append('name', this.subCategory.name);
            formData.append('category_id', this.subCategory.category);

            if (!this.subCategory.name || !this.subCategory.category) {
                this.notification('Please fill the form details.');
                return false;
            }

            if (this.subCategory.id) {
                formData.append('id', this.subCategory.id);

                axios.post('/api/update-sub-category', formData)
                    .then((res) => {
                    this.getSubCategories();
                    f7.popup.close(`#sub_category_popup`);
                })
            } else {
                axios.post('/api/add-sub-category', formData)
                .then((res) => {
                    this.getSubCategories();
                    f7.popup.close(`#sub_category_popup`);
                })
            }
        },
        removeSubCategory(id) {
            f7.dialog.confirm('Are you sure delete the sub category?', () => {
                axios.post('/api/delete-sub-category', { id: id })
                .then((res) => {
                    this.getSubCategories();
                })
            });
            setTimeout(() => {
                $('.dialog-button').eq(1).css({ 'background-color': '#F33E3E', 'color': '#fff' });
                $('.dialog-title').html("<img src='/images/cross.png'>");
                $('.dialog-buttons').after("<div><img src='/images/flow.png' style='width:100%'></div>");
                $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
                $('.dialog-button').eq(1).removeClass('text-color-black');
                $('.dialog-buttons').addClass('margin-top no-margin-bottom')
            }, 50       );
        },
        editSubCategory(id) {
            this.subCategory_title = 'Edit Sub Category';
            axios.get('/api/get-sub-category/'+id)
                .then((res) => {
                this.subCategory.id = res.data.id;
                this.subCategory.name = res.data.name;
                this.subCategory.category = res.data.category_id;
            })
        },
        addProduct() {

            var formData = new FormData();
            formData.append('name', this.product.name);
            formData.append('price', this.product.price);
            formData.append('sub_category_id', this.product.sub_category);

            if (!this.product.name || !this.product.price || !this.product.sub_category) {
                this.notification('Please fill the form details.');
                return false;
            }

            axios.post('/api/add-product', formData)
                .then((res) => {
                    f7.popup.close(`#product_popup`);
                    this.product.name = '';
                    this.product.price = '';
                    this.product.sub_category = null;
            })
        },
        getAllCategories() {
            axios.get('/api/categories')
            .then((res) => {
                this.categoryOption = res.data;
            })
        },
        getAllSubCategories() {
            axios.get('/api/sub-categories')
            .then((res) => {
                this.subCategoryOption = res.data;
            })
        },
        notification(notice) {
            var notificationFull = f7.notification.create({
                subtitle: notice,
                closeTimeout: 3000,
            });
            notificationFull.open();
        },
    },
}
</script>

<style scoped>
.border__right {
    border-right: 1px solid #D8D8D8;
    border-radius: 0;
}
.menu-item-dropdown .menu-item-content .f7-icons{
    font-size: 15px;
    margin-left: 10px;
}
.page-food-category {
    background: #f1f1f1;
}
.subcategory-list-section .card{
    height: calc(100vh - 94px);
    overflow: auto;
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

.height-36 {
    height: 36px;
}

.nav-botton {
    height: 100%;
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

.header-links {
    width: 75%;
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

.menu-dropdown-link:nth-child(2) {
    border-bottom: 1px solid #EFEFEF;
}
.menu-dropdown-link{
    border-bottom: 1px solid #EFEFEF;
}

.bg-pink {
    background: #F33E3E;
}

.text-color-pink {
    color: #F33E3E;
}

.font-22 {
    font-size: 22px;
}

.nav-bar {
    border-radius: 8px 8px 0px 0px;
    position: fixed;
    width: 100%;
    z-index: 99;
}
.subcategory-list-section{
    margin-top:75px;
}

.page-content {
    padding-top: 0px !important;
}

.item-input-wrap {
    width: 100%;
    background: #F0F0F0;
    border: 0.5px solid #DCDCDC;
    border-radius: 7px;
    height: auto;
}

.bg-karaka-orange {
    background: #EE4925;
}

.sub_category_name {
    font-size: 18px;
}

.border-bottom {
    border-bottom: 1px solid #EAEAEA;
}

.main-category {
    font-weight: 600;
    font-size: 20px;
    line-height: 24px;
}

#searchData {
    width: 90%;
}

.nav-link,
.menu-item-content {
    height: 100% !important;
    text-transform: capitalize !important;
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
@media screen and (max-width:820px) {
    .header-links {
        width: 100%;
    }
    .subcategory-list-section .card{
        height: calc(100vh - 400px);
        overflow: auto;
    }
}
</style>

<style>
.left {
    width: 20%;
    margin-left: 20px;
}

.searchData{
    align-items: center !important;
}

@media screen and (max-width:820px) {
    .left {
        width: 50%;
    }
}
</style>
