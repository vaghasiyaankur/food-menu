<template>
    <f7-page>
        <div class="subcategory-list-section">
            <!-- <div class="card elevation-2"> -->
            <!-- <div class="card_header">
                <div class="row padding-left padding-right align-items-center padding-top-half">
                    <div class="col-100 large-50 medium-40">
                        <h3>
                            <span class="page_heading"> Sub Category</span>
                        </h3>
                    </div>
                    <div class="col-100 large-50 medium-60">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="item-content item-input">
                                    <div class="item-inner">
                                        <div class="item-input-wrap searchData row padding-half height_40 search_data_wrap">
                                            <i class="f7-icons font-18 search-icon">search</i>
                                            <input type="search" name="search" class="search__data" placeholder="Search SubCategory" id="searchData" v-model="search" @input="getSubCategories()">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col padding-left-half padding-right-half">
                                <button class="button button-raised bg-dark text-color-white padding height_40" @click="subCategory_title = 'Add Sub Category'; subCategory.name = []; subCategory.category = null;showSubCategoryPopup()" data-popup="#sub_category_popup"><i class="f7-icons font-22 margin-right-half">plus_square</i> Add Sub Category</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <MenuManagementHeader title="Sub Category" @blank:action="blankForm" @add:popup="showSubCategoryPopup"
                @update:search="updateSearch" @update:PopupTitle="updatePopupTitle" />
            <div class="card-content add-combo">
                <div
                    class="grid grid-cols-5 medium-grid-cols-4 grid-gap-25 grid-gap-20 align-items-center add-combo-list food-sub-category-list">
                    <div class="bg-color-white add-combo-product-card">
                        <div class="combo-image"><img
                                src="\assets\images\seederImages\Food-SubCategory\Kathiyavadi_Thali.png">
                        </div>
                        <div class="text-align-center add-combo-product-name">
                            <h4 class="no-margin no-padding">Kathiyavadi Thali</h4>
                        </div>
                        <div class="grid grid-cols-2 grid-gap-5 combo-change">
                            <a class="edit-combo col-100 large-45 medium-50">
                                <Icon name="editIcon" />Edit
                            </a>
                            <a class="delete-combo col-100 large-50 medium-50">
                                <Icon name="deleteIcon" />Delete
                            </a>
                        </div>
                        <img class="food-category" src="/assets/images/seederImages/combo/type1.png">
                    </div>
                    <div class="bg-color-white add-combo-product-card">
                        <div class="combo-image"><img src="\assets\images\seederImages\Food-SubCategory\Pizza.png">
                        </div>
                        <div class="text-align-center add-combo-product-name">
                            <h4 class="no-margin no-padding">Pizza</h4>
                        </div>
                        <div class="grid grid-cols-2 grid-gap-5 combo-change">
                            <a class="edit-combo col-100 large-45 medium-50">
                                <Icon name="editIcon" />Edit
                            </a>
                            <a class="delete-combo col-100 large-50 medium-50">
                                <Icon name="deleteIcon" />Delete
                            </a>
                        </div>
                        <img class="food-category" src="/assets/images/seederImages/combo/type3.png">
                    </div>
                    <div class="bg-color-white add-combo-product-card">
                        <div class="combo-image"><img src="\assets\images\seederImages\Food-SubCategory\Paratha.png">
                        </div>
                        <div class="text-align-center add-combo-product-name">
                            <h4 class="no-margin no-padding">Paratha</h4>
                        </div>
                        <div class="grid grid-cols-2 grid-gap-5 combo-change">
                            <a class="edit-combo col-100 large-45 medium-50">
                                <Icon name="editIcon" />Edit
                            </a>
                            <a class="delete-combo col-100 large-50 medium-50">
                                <Icon name="deleteIcon" />Delete
                            </a>
                        </div>
                        <img class="food-category" src="/assets/images/seederImages/combo/type1.png">
                    </div>

                    <div class="bg-color-white add-combo-product-card">
                        <div class="combo-image"><img src="\assets\images\seederImages\Food-SubCategory\Sandwich.png">
                        </div>
                        <div class="text-align-center add-combo-product-name">
                            <h4 class="no-margin no-padding">Sandwich</h4>
                        </div>
                        <div class="grid grid-cols-2 grid-gap-5 combo-change">
                            <a class="edit-combo col-100 large-45 medium-50">
                                <Icon name="editIcon" />Edit
                            </a>
                            <a class="delete-combo col-100 large-50 medium-50">
                                <Icon name="deleteIcon" />Delete
                            </a>
                        </div>
                        <img class="food-category" src="/assets/images/seederImages/combo/type1.png">
                    </div>
                </div>
            </div>
            <!-- <div class="pagination_count padding-vertical-half">
                    <div class="pagination_list">
                        <div v-for="(link,index) in paginationData.links" :key="link">
                            <a href="javascript:;" v-if="index == 0" @click="link.url != null ? getFloors(link.url) : 'javascript:;'" class="link" :class="{ 'disabled': link.url == null}"><i class="icon-prev"></i></a>
                            <a href="javascript:;" v-if="paginationData.links.length - 1 != index && index != 0" @click="link.url != null ? getFloors(link.url) : 'javascript:;'" :class="{ 'disabled': link.url == null, 'active': paginationData.current_page == index}">{{ index }}</a>
                            <a href="javascript:;" v-if="paginationData.links.length - 1 == index" @click="link.url != null ? getFloors(link.url) : 'javascript:;'" class="link" :class="{ 'disabled': link.url == null}"><i class="icon-next"></i></a>
                        </div>
                    </div>
                </div> -->
            <!-- <div v-else>
                <div class="no_order">
                    <NoValueFound />
                    <div class="no_order_text text-align-center">
                        <p class="no-margin">Empty Food Sub Category List</p>
                    </div>
                </div>
            </div> -->
            <!-- </div> -->
        </div>

        <!-- ========= ADD SUB-CATEGORY POPUP ========= -->
        <div class="popup categoryPopup" id="sub_category_popup">
            <div class="category-form">
                <div class="text-align-center popup_title">
                    Add sub Category</div>
                <div class="category-add">
                    <label class="add_sub-category_name">Add sub category name</label>
                    <div class="sub-categoryName text-align-left">
                        <input type="text" class="sub-category-name" placeholder="Add sub category name">
                    </div>
                    <div class="sub-category-image-selection">
                        <div class="sub-category-add-image">
                            <img src="/images/add-image.png" />
                        </div>
                        <div class="sub-category-add-image-text">
                            <span class="add-image-text">Select Image</span>
                        </div>
                    </div>
                    <label class="choose_sub-category_title">Category</label>
                    <div class="choose_sub-category">
                        <select name="choose_sub-category" id="choose_sub-category">
                            <option value="pizza" selected><label>Pizza</label><svg width="8" height="5"
                                    viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.78383 4.77535C3.90185 4.898 4.09815 4.898 4.21617 4.77535L7.84129 1.00801C8.02469 0.817422 7.88962 0.5 7.62512 0.5H0.374881C0.110383 0.5 -0.0246882 0.817421 0.158708 1.00801L3.78383 4.77535Z"
                                        fill="#555555" />
                                </svg>
                            </option>
                        </select>
                    </div>
                    <div class="display-flex justify-content-center popup_button">
                        <button type="button"
                            class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                        <button type="button" class="button button-raised button-large popup-ok-button">Ok</button>
                    </div>
                </div>
            </div>
            <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
        </div>
        <!-- ========= EDIT SUB-CATEGORY POPUP ========= -->
        <div class="popup EditSubCategoryPopup">
            <div class="category-form">
                <div class="text-align-center popup_title">
                    edit sub Category</div>
                <div class="category-add">
                    <label class="add_sub-category_name">Add sub category name</label>
                    <div class="sub-categoryName text-align-left">
                        <input type="text" class="sub-category-name" placeholder="Add sub category name">
                    </div>
                    <div class="display-flex justify-content-center popup_button">
                        <button type="button"
                            class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                        <button type="button" class="button button-raised button-large popup-ok-button">Ok</button>
                    </div>
                </div>
            </div>
            <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
        </div>
        <!-- ========= DELETE SUB-CATEGORY POPUP ========= -->
        <div class="popup DeleteSubCategoryPopup">
            <div class="delete-sub-category-form">
                <div class="delete-category-WarningSign">
                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.5 0C6.05663 0 0 6.05663 0 13.5C0 20.9434 6.05663 27 13.5 27C20.9434 27 27 20.9434 27 13.5C27 6.05663 20.9434 0 13.5 0ZM18.4715 16.8816C18.9102 17.3204 18.9102 18.0327 18.4715 18.4731C18.2519 18.6923 17.9635 18.8023 17.6767 18.8023C17.3896 18.8023 17.1012 18.6923 16.8816 18.4731L13.5 15.0915L10.1184 18.4731C9.89882 18.6923 9.61043 18.8023 9.32327 18.8023C9.03488 18.8023 8.74814 18.6923 8.52855 18.4731C8.08978 18.0343 8.08978 17.322 8.52855 16.8816L11.9085 13.5L8.5269 10.1184C8.08813 9.67964 8.08813 8.96732 8.5269 8.5269C8.96567 8.08649 9.67799 8.08813 10.1184 8.5269L13.5 11.9085L16.8816 8.5269C17.3204 8.08813 18.0327 8.08813 18.4731 8.5269C18.9135 8.96567 18.9119 9.67799 18.4731 10.1184L15.0915 13.5L18.4715 16.8816Z"
                            fill="#F33E3E" />
                    </svg>
                </div>
                <h4 class=" no-margin delete-category-warning-text">Are you sure delete the sub category?</h4>
                <div class="display-flex justify-content-center popup_button">
                    <button type="button"
                        class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                    <button type="button" class="button button-raised button-large popup-ok-button">Ok</button>
                </div>
            </div>
            <div class="wave-image-content"><img src="/images/flow.png"></div>
        </div>


        <!-- <div id="sub_category_popup" class="popup" style="position: fixed; display: block; border-radius: 15px;">
            <div class="text-align-center padding popup_title">{{ subCategory_title }}</div>
            <div class="category-add padding">
                <div class="categoryForm text-align-left no-padding">
                    <label for="" class="add_category_name">Sub category name</label>
                    <input type="text" name="name" v-model="subCategory.name[lang.id]" v-for="lang in $root.langs"
                        :key="lang.id" class="category-name margin-top-half padding-left-half padding-right-half"
                        :placeholder="'Add ' + lang.name + ' sub category name'">
                </div>
                <div class="categoryForm text-align-left margin-top">
                    <label for="" class="add_category_name">Parent category</label>
                    <div class="item-input-wrap input-dropdown-wrap category-name margin-top-half no-padding">
                        <select placeholder="Please choose..." v-model="subCategory.category"
                            class="selectCategory padding-left-half">
                            <option v-for="(category, key) in categoryOption" :key="category" :value="key">{{ category }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="margin-top no-margin-bottom display-flex justify-content-center padding-top popup_button">
                    <button type="button"
                        class="button button-raised text-color-black button-large popup-close margin-right popup-button">Cancel</button>
                    <button type="button" class="button button-raised button-large bg-karaka-orange popup-button"
                        style="background-color: rgb(243, 62, 62); color: rgb(255, 255, 255);"
                        @click="addUpdateSubCategory">Ok</button>
                </div>
            </div>
            <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
        </div>

        <div id="product_popup" class="popup" style="position: fixed; display: block; border-radius: 15px;">
            <div class="text-align-center padding popup_title">Add Product</div>
            <div class="category-add padding">
                <div class="categoryForm text-align-left no-padding">
                    <label for="" class="add_category_name">Product Name</label>
                    <input type="text" v-model="product.name[lang.id]" name="name" v-for="lang in $root.langs"
                        :key="lang.id" class="category-name margin-top-half padding-left-half padding-right-half"
                        :placeholder="'Add ' + lang.name + ' Product name'">
                </div>
                <div class="categoryForm text-align-left margin-top">
                    <label for="" class="add_category_name">Choose Sub category</label>
                    <div class="item-input-wrap input-dropdown-wrap category-name margin-top-half no-padding">
                        <select placeholder="Please choose..." v-model="product.sub_category"
                            class="selectCategory padding-left-half">
                            <option v-for="(subCat, key) in subCategoryOption" :key="subCat" :value="key">{{ subCat }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="categoryForm margin-top text-align-left no-padding">
                    <label for="" class="add_category_name">Price</label>
                    <input type="number" name="name" v-model="product.price"
                        class="category-name margin-top-half padding-left-half padding-right-half"
                        placeholder="Add product price">
                </div>
                <div class="margin-top no-margin-bottom display-flex justify-content-center padding-top popup_button">
                    <button type="button"
                        class="button button-raised text-color-black button-large popup-close margin-right poup-button">Cancel</button>
                    <button type="button" class="button button-raised button-large bg-karaka-orange poup-button"
                        style="background-color: rgb(243, 62, 62); color: rgb(255, 255, 255);"
                        @click="addProduct">Ok</button>
                </div>
            </div>
            <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
        </div> -->
    </f7-page>
</template>

<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input } from 'framework7-vue';
import $ from 'jquery';
import axios from 'axios';
import NoValueFound from '../../../components/NoValueFound.vue'
import MenuManagementHeader from './MenuManagementHeader.vue'

export default {
    name: 'FoodSubCategory',
    components: {
        f7Page,
        f7Navbar,
        f7BlockTitle,
        f7Block,
        f7,
        f7Input,
        NoValueFound,
        MenuManagementHeader
    },
    data() {
        return {
            subCategories: [],
            categoryOption: [],
            subCategory: {
                id: null,
                name: [],
                category: null,
                image: '',
            },
            subCategory_title: 'Add Sub Category',
            search: '',
            subCategoryOption: [],
            product: {
                name: [],
                sub_category: null,
                price: '',
            },
            paginationData: [],
            image_url: null,
        }
    },
    beforeCreate() {
        this.$root.addLoader();
    },
    created() {
        this.getSubCategories();
    },
    mounted() {
        $('.page-content').css('background', '#F7F7F7');
        this.getAllCategories();
        this.$root.activationMenu('menu_management', 'subcategory');
        this.$root.removeLoader();
    },
    methods: {
        updateSearch(searchValue) {
            this.search = searchValue;
            this.getSubCategories();
        },
        getSubCategories() {
            axios.post('/api/get-sub-categories', { search: this.search })
                .then((res) => {
                    this.subCategories = res.data.sub_category.data;
                    this.paginationData = res.data.sub_category;
                })
        },
        addUpdateSubCategory() {
            var formData = new FormData();
            formData.append('name', this.subCategory.name);
            formData.append('category_id', this.subCategory.category);

            if (!this.subCategory.name || !this.subCategory.category) {
                this.$root.errornotification('Please fill the form details.');
                return false;
            }

            if (this.subCategory.id) {
                formData.append('id', this.subCategory.id);

                axios.post('/api/update-sub-category', formData)
                    .then((res) => {
                        this.$root.successnotification(res.data.success);
                        this.getSubCategories();
                        f7.popup.close(`#sub_category_popup`);
                    })
            } else {
                axios.post('/api/add-sub-category', formData)
                    .then((res) => {
                        this.getSubCategories();
                        this.$root.successnotification(res.data.success);
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
            }, 50);
        },
        editSubCategory(id) {
            this.subCategory_title = 'Edit Sub Category';
            axios.get('/api/get-sub-category/' + id)
                .then((res) => {
                    this.subCategory.id = res.data.id;
                    res.data.sub_category_language.forEach(subcat_lang => {
                        this.subCategory.name[subcat_lang.language_id] = subcat_lang.name;
                    });
                    this.subCategory.category = res.data.category_id;
                    console.log(this.subCategory.category);
                })
        },
        addProduct() {

            var formData = new FormData();
            formData.append('name', this.product.name);
            formData.append('price', this.product.price);
            formData.append('sub_category_id', this.product.sub_category);

            if (!this.product.name || !this.product.price || !this.product.sub_category) {
                this.$root.errornotification('Please fill the form details.');
                return false;
            }

            axios.post('/api/add-product', formData)
                .then((res) => {
                    this.$root.successnotification(res.data.success);
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
                    f7.popup.open(`#product_popup`);
                    this.subCategoryOption = res.data;
                })
        },
        blankForm() {
            this.subCategory.id = null;
            this.subCategory.name = [];
            this.subCategory.category = '';
            this.image_url = null;
        },
        showSubCategoryPopup() {
            f7.popup.open(`#sub_category_popup`);
        },
        updatePopupTitle(title) {
            this.subCategory_title = title;
        }
    },
}
</script>

<style scoped>
.border__right {
    border-right: 1px solid #D8D8D8;
    border-radius: 0;
}

.page-food-category {
    background: #f1f1f1;
}

.subcategory-list-section .card {
    height: calc(100vh - 132px);
    overflow: auto;
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


.bg-dark {
    background: #38373D;
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

.subcategory-list-section {
    margin-top: 77px;
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

@media screen and (max-width:820px) {
    .header-links {
        width: 100%;
    }
}
</style>

<style>
.searchData {
    align-items: center !important;
}
</style>
