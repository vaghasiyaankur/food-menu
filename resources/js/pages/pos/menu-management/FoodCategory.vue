<template>
<f7-page>

    <div class="category-list-section">
        <div class="card elevation-2 border_radius_10">
            <MenuManagementHeader 
                title="Category"
                @blank:action="blankForm" 
                @add:popup="showCategoryPopup" 
                @update:search="updateSearch"
                @update:PopupTitle="updatePopupTitle"
            />
            <div class="card-content card-content-padding categorey_card">
                <div v-if="categories.length">
                    <div class="category-list padding-top padding-bottom" v-for="(category,index) in categories" :key="category">
                        <f7-card class="no-margin">
                            <f7-card-content>
                                <div class="food-category">
                                    <img src="/images/vegan-icon.png" alt="">
                                </div>
                                <div class="product-image">
                                    <img src="/storage/product/1-3.webp" alt="" width="100" height="100">
                                </div>
                                <div class="product-summary">
                                    <p class="product_name margin-bottom-half">Water Bottle</p>
                                    <p class="product_price text-red margin-top-half">$0.00</p>
                                </div>
                                <div class="product-add-button">
                                    <button class="button button-raised btn-add-product padding text-transform-capitalize" data-popup="#watter_popup" @click="f7.popup.open(`.watterPopup`);"><f7-icon f7="plus" class="font-16 margin-right-half"></f7-icon>Add</button>
                                </div>
                            </f7-card-content>
                        </f7-card>
                        <!-- <div class="row align-items-center">
                            <div class="col-100 medium-40 large-60 ">
                                <div class="display-flex align-items-center">
                                    <div class="category-count padding-right">
                                        <span>{{ index + 1 }}.</span>
                                    </div>
                                    <a class="display-flex align-items-center" :href="'/single-category-products/'+category.id">
                                        <div class="category_image">
                                            <img :src="'/storage'+category.image" alt="">
                                        </div>

                                        <span class="padding-left-half category_name text-color-black">{{ category.category_languages[0].name }}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-100 medium-60 large-40 action-buttons">
                                <div class="row align-items-center">
                                    <div class="col-50">
                                        <button class="button text-color-black padding height-36 border__right" data-popup="#subCategory_popup" @click="getAllCategories(category.id)">
                                            <i class="f7-icons font-22 margin-right-half">plus_square</i>Add sub category
                                        </button>
                                    </div>
                                    <div class="col-25">
                                        <button class="button text-color-black padding height-36 popup-open" data-popup=".categoryPopup" @click="editCategory(category.id);showCategoryPopup()"><i class="f7-icons font-22 margin-right-half">square_pencil</i> Edit</button>
                                    </div>
                                    <div class="col-25">
                                        <button class="button text-color-red padding height-36" @click="removeCategory(category.id)"><i class="f7-icons font-22 margin-right-half">trash</i>
                                            Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div v-else>
                    <div class="no_order">
                        <NoValueFound />
                        <div class="no_order_text text-align-center">
                            <p class="no-margin">Empty Food Category List</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========= CATEGORY POPUP ========= -->
    <div id="category_popup" class="popup categoryPopup" style="position: fixed; display: block; border-radius: 15px;">
        <div class="category-form">
            <div class="text-align-center padding popup_title">{{ category_title }}</div>
            <div class="category-add padding">
                <label class="add_category_name">Category name</label>
                <div class="categoryForm text-align-left" v-for="lang in $root.langs" :key="lang.id">
                    <input type="text" v-model="category.name[lang.id]" name="name" class="category-name margin-top-half padding-left-half padding-right-half" :placeholder="'Add '+lang.name+' Category name'">
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
            <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
        </div>
    </div>
    <!-- ========= SUBCATEGORY POPUP ========= -->
    <div id="subCategory_popup" class="popup subCategoryPopup" style="position: fixed; display: block; border-radius: 15px;">
        <div class="text-align-center padding popup_title">Add Sub category</div>
        <div class="category-add padding">
            <div class="categoryForm text-align-left no-padding margin-bottom">
                <label class="add_category_name">Sub category name</label>
                <input type="text" name="name" v-model="subCategory.name[lang.id]" v-for="lang in $root.langs" :key="lang.id" class="category-name margin-top-half padding-left-half padding-right-half" :placeholder="'Add ' + lang.name + ' sub category name'">
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
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
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
        MenuManagementHeader
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
        updateSearch(searchValue){
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

.category-list-section .category-list .button {
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

.category-list-section .card {
    height: calc(100vh - 132px);
    overflow: scroll;
}

.category-list-section {
    margin-top: 77px;
}

.category-list-section .category-list .menu-dropdown-link {
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
