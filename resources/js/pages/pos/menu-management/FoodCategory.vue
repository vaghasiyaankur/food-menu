<template>
    <f7-page>

        <div class="category-list-section">
            <!-- <div class="card elevation-2 border_radius_10"> -->
            <MenuManagementHeader title="Category" @blank:action="blankForm" @add:popup="showCategoryPopup"
                @update:search="updateSearch" @update:PopupTitle="updatePopupTitle" />

            <div class="card-content add-combo">
                <div class="grid grid-cols-5 medium-grid-cols-4 grid-gap-25 grid-gap-20 align-items-center add-combo-list">
                    <div class="bg-color-white add-combo-product-card" v-for="category in categories" :key="category">
                        <div class="combo-image"><img :src="'/storage'+category?.image">
                        </div>
                        <div class="text-align-center add-combo-product-name">
                            <h4 class="no-margin no-padding">{{category?.category_languages[0]?.name}}</h4>
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
        </div>
        <!-- ========= ADD CATEGORY POPUP ========= -->
        <div class="popup categoryPopup">
            <div class="category-form">
                <div class="text-align-center popup_title">
                    Add Category</div>
                <div class="category-add">
                    <label class="add_category_name">Add category name</label>
                    <div class="categoryName text-align-left">
                        <input type="text" class="category-name" placeholder="Add category name">
                    </div>
                    <div class="category-image-selection">
                        <div class="category-add-image">
                            <img src="/images/add-image.png" />
                        </div>
                        <div class="category-add-image-text">
                            <span class="add-image-text">Select Image</span>
                        </div>
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
        <!-- ========= EDIT CATEGORY POPUP ========= -->
        <div class="popup EditCategoryPopup">
            <div class="category-form">
                <div class="text-align-center popup_title">
                    edit Category</div>
                <div class="category-add">
                    <label class="add_category_name">Category name</label>
                    <div class="categoryName text-align-left">
                        <input type="text" class="category-name" placeholder="Add category name">
                    </div>
                    <div class="category-image-selection">
                        <div class="category-add-image">
                            <img src="/images/add-image.png" />
                        </div>
                        <div class="category-add-image-text">
                            <span class="add-image-text">Select Image</span>
                        </div>
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
        <!-- ========= DELETE CATEGORY POPUP ========= -->
        <div class="popup DeleteCategoryPopup">
            <div class="delete-category-form">
                <div class="delete-category-WarningSign">
                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.5 0C6.05663 0 0 6.05663 0 13.5C0 20.9434 6.05663 27 13.5 27C20.9434 27 27 20.9434 27 13.5C27 6.05663 20.9434 0 13.5 0ZM18.4715 16.8816C18.9102 17.3204 18.9102 18.0327 18.4715 18.4731C18.2519 18.6923 17.9635 18.8023 17.6767 18.8023C17.3896 18.8023 17.1012 18.6923 16.8816 18.4731L13.5 15.0915L10.1184 18.4731C9.89882 18.6923 9.61043 18.8023 9.32327 18.8023C9.03488 18.8023 8.74814 18.6923 8.52855 18.4731C8.08978 18.0343 8.08978 17.322 8.52855 16.8816L11.9085 13.5L8.5269 10.1184C8.08813 9.67964 8.08813 8.96732 8.5269 8.5269C8.96567 8.08649 9.67799 8.08813 10.1184 8.5269L13.5 11.9085L16.8816 8.5269C17.3204 8.08813 18.0327 8.08813 18.4731 8.5269C18.9135 8.96567 18.9119 9.67799 18.4731 10.1184L15.0915 13.5L18.4715 16.8816Z"
                            fill="#F33E3E" />
                    </svg>
                </div>
                <h4 class=" no-margin delete-category-warning-text">Are you sure delete the category?</h4>
                <div class="display-flex justify-content-center popup_button">
                    <button type="button"
                        class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                    <button type="button" class="button button-raised button-large popup-ok-button">Ok</button>
                </div>
            </div>
            <div class="wave-image-content"><img src="/images/flow.png"></div>
        </div>
    </f7-page>
</template>

<script>
import {
    f7Page,
    f7Navbar,
    f7BlockTitle,
    f7Block,
    f7,
    f7Input
} from 'framework7-vue';
import $ from 'jquery';
import axios from "axios";
import NoValueFound from '../../../components/NoValueFound.vue'
import MenuManagementHeader from './MenuManagementHeader.vue'
import Icon from "../../../components/Icon.vue"

export default {
    name: 'Favourite',
    data() {
        return {
            test: 'indian',
            categories: [],
            categoryOption: [],
            category: {
                id: null,
                name: [],
                image: '',
            },
            subCategory: {
                name: [],
                category: null,
            },
            category_title: 'Add Category',
            image_url: null,
            search: '',
            paginationData: [],
        }
    },
    components: {
        f7Page,
        f7Navbar,
        f7BlockTitle,
        f7Block,
        f7,
        f7Input,
        NoValueFound,
        MenuManagementHeader,
        Icon
    },
    beforeCreate() {
        this.$root.addLoader();
    },
    mounted() {
        $('.page-content').css('background', '#F7F7F7');
        this.getCategories();
        this.$root.activationMenu('menu_management', 'category');
        this.$root.removeLoader();
    },
    methods: {
        updateSearch(searchValue) {
            this.search = searchValue;
            this.getCategories();
        },
        addimageChange(e) {
            this.category.image = e.target.files[0];
            this.image_url = URL.createObjectURL(this.category.image);
        },
        getCategories() {
            console.log(this.search);
            axios.post('/api/get-categories', {
                search: this.search
            })
                .then((res) => {
                    this.categories = res.data.category.data;
                    this.paginationData = res.data.category;
                })
        },
        removeCategory(id) {
            f7.dialog.confirm('Are you sure delete the category?', () => {
                axios.post('/api/delete-category', {
                    id: id
                })
                    .then((res) => {
                        this.getCategories();
                        this.$root.successnotification(res.data.success);
                    })
            });
            setTimeout(() => {
                $('.dialog-button').eq(1).css({
                    'background-color': '#F33E3E',
                    'color': '#fff'
                });
                $('.dialog-title').html("<img src='/images/cross.png'>");
                $('.dialog-buttons').after("<div><img src='/images/flow.png' style='width:100%'></div>");
                $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
                $('.dialog-button').eq(1).removeClass('text-color-black');
                $('.dialog-buttons').addClass('margin-top no-margin-bottom')
            }, 20);
        },
        addCategory() {
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            var formData = new FormData();
            formData.append('name', this.category.name);
            formData.append('image', this.category.image);
            if (!this.category.name || !this.category.image) {
                this.$root.errornotification('Please fill the form details.');
                return false;
            }
            if (this.category.id) {
                formData.append('id', this.category.id);
                axios.post('/api/update-category', formData, config)
                    .then((res) => {
                        this.$root.successnotification(res.data.success);
                        this.getCategories();
                        this.blankForm();
                        f7.popup.close(`#category_popup`);
                    })
            } else {
                axios.post('/api/add-category', formData, config)
                    .then((res) => {
                        this.$root.successnotification(res.data.success);
                        this.getCategories();
                        this.blankForm();
                        f7.popup.close(`#category_popup`);
                    })
            }
        },
        editCategory(id) {
            this.category_title = 'Edit Category';
            axios.get('/api/get-category/' + id)
                .then((res) => {
                    this.category.id = res.data.id;
                    res.data.category_languages.forEach(cat_lang => {
                        this.category.name[cat_lang.language_id] = cat_lang.name;
                    });
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
                this.$root.errornotification('Please fill the form details.');
                return false;
            }

            axios.post('/api/add-sub-category', formData)
                .then((res) => {
                    this.$root.successnotification(res.data.success);
                    this.subCategory.name = [];
                    this.subCategory.category = null;
                    f7.popup.close(`#subCategory_popup`);
                })
        },
        getAllCategories(id) {
            f7.popup.open(`.subCategoryPopup`);
            axios.get('/api/categories')
                .then((res) => {
                    this.categoryOption = res.data;
                    this.subCategory.category = id;
                })
        },
        blankForm() {
            this.category.id = null;
            this.category.name = [];
            this.category.image = '';
            this.image_url = null;
        },
        showCategoryPopup() {
            f7.popup.open(`.categoryPopup`);
        },
        updatePopupTitle(title) {
            this.category_title = title;
        }
    },
};
</script>