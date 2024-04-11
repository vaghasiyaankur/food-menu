<template>
    <f7-page>
        <div class="product-list-section" @click="clickout">
            <div class="product_list_card no-margin">
                <div class="card_header">
                    <div class="row margin-horizontal align-items-center">
                        <div class="col-100 large-20 medium-15">
                            <h3>
                                <!-- <a href="javscript:;" class="text-color-black padding-right-half"><i class="f7-icons font-22" style="vertical-align: bottom;">arrow_left</i></a> -->
                                <span class="page_heading">Product</span>
                            </h3>
                        </div>
                        <div class="col-100 large-80 medium-85">
                            <div class="row align-items-center">
                                <div class="col-100 large-30 medium-25">
                                    <div class="item-content item-input">
                                        <div class="item-inner">
                                            <div
                                                class="item-input-wrap searchData row padding-half height_40 search_data_wrap">
                                                <i class="f7-icons font-18 search-icon">search</i>
                                                <input type="search" name="search" class="search__data"
                                                    placeholder="Search Products" v-model="search"
                                                    @input="getProducts()" id="searchData">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-25">
                                    <div class="f-concise position-relative">
                                        <div id="selection-concise" class="list no-margin category--list">
                                            <div id="select-concise" class="input-dropdown-wrap"
                                                @click="showCategoryList = !showCategoryList">{{ active_category_name }}
                                            </div>
                                            <ul id="category--list" class="dropdown_list"
                                                :class="{ 'd-none': showCategoryList }">
                                                <li class="concise p-1 padding-half"
                                                    :class="{ 'active': active_category == key }"
                                                    v-for="(category, key) in categoryList" :key="category"
                                                    @click="getSubCategoryList(key); active_category_name = category;">
                                                    <span>{{ category }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-25">
                                    <div class="f-concise position-relative">
                                        <div id="selection-concise" class="list no-margin subcategory--list">
                                            <div id="select-concise" class="input-dropdown-wrap"
                                                :class="{ 'deactive_dropdown': active_category_name == 'Category' }"
                                                @click="showSubCategoryList = !showSubCategoryList">{{
                                                active_sub_category_name }} </div>
                                            <ul id="subcategory--list" class="dropdown_list"
                                                :class="{ 'd-none': showSubCategoryList }">
                                                <li class="concise p-1 padding-half"
                                                    :class="{ 'active': active_sub_category == key }"
                                                    v-for="(subCategory, key) in subCategoryList" :key="subCategory"
                                                    @click="getProductList(key); active_sub_category_name = subCategory;">
                                                    <span>{{ subCategory }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-100 large-20 medium-25 padding-left-half padding-right-half">
                                    <a href="/add-product/" class="button bg-dark text-color-white padding height_40"><i
                                            class="f7-icons font-22 margin-right-half">plus_square</i> Add Product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content add-combo">
                    <div
                        class="grid grid-cols-5 medium-grid-cols-4 grid-gap-25 grid-gap-20 align-items-center add-list food-ingradient-list">
                        <div class="bg-color-white data-card">
                            <div class="combo-image"><img src="\assets\images\seederImages\Ingradients\Onion.png">
                            </div>
                            <div class="text-align-center data-card-name">
                                <h4 class="no-margin no-padding">Kathiyavadi Thali</h4>
                            </div>
                            <div class="text-align-center combo-name">
                                <h4 class="no-margin no-padding">Combo 1</h4>
                                <p class="combo-price no-margin no-padding">$8.00</p>
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
        </div>
        <!-- ========= DELETE PRODUCT POPUP ========= -->
        <div class="DeleteProductPopup">
            <div class="delete-product-form">
                <div class="delete-category-WarningSign">
                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.5 0C6.05663 0 0 6.05663 0 13.5C0 20.9434 6.05663 27 13.5 27C20.9434 27 27 20.9434 27 13.5C27 6.05663 20.9434 0 13.5 0ZM18.4715 16.8816C18.9102 17.3204 18.9102 18.0327 18.4715 18.4731C18.2519 18.6923 17.9635 18.8023 17.6767 18.8023C17.3896 18.8023 17.1012 18.6923 16.8816 18.4731L13.5 15.0915L10.1184 18.4731C9.89882 18.6923 9.61043 18.8023 9.32327 18.8023C9.03488 18.8023 8.74814 18.6923 8.52855 18.4731C8.08978 18.0343 8.08978 17.322 8.52855 16.8816L11.9085 13.5L8.5269 10.1184C8.08813 9.67964 8.08813 8.96732 8.5269 8.5269C8.96567 8.08649 9.67799 8.08813 10.1184 8.5269L13.5 11.9085L16.8816 8.5269C17.3204 8.08813 18.0327 8.08813 18.4731 8.5269C18.9135 8.96567 18.9119 9.67799 18.4731 10.1184L15.0915 13.5L18.4715 16.8816Z"
                            fill="#F33E3E" />
                    </svg>
                </div>
                <h4 class=" no-margin delete-category-warning-text">Are you sure delete the Product?</h4>
                <div class="display-flex justify-content-center popup_button">
                    <button type="button"
                        class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                    <button type="button" class="button button-raised button-large popup-ok-button">Ok</button>
                </div>
            </div>
            <div class="wave-image-content"><img src="/images/flow.png"></div>
        </div>
        <div id="product_popup" class="popup" style="position: fixed; display: block; border-radius: 15px;">
            <div class="text-align-center padding popup_title">Add Product</div>
            <div class="data-add padding">
                <div class="categoryForm text-align-left no-padding">
                    <label for="" class="add-data-name">Add product</label>
                    <input type="text" name="name" v-model="product.name[lang.id]" v-for="lang in $root.langs"
                        :key="lang.id" class="add-update-data-name margin-top-half padding-left-half padding-right-half"
                        :placeholder="'Add ' + lang.name + ' Product name'">
                </div>
                <div class="categoryForm text-align-left margin-top">
                    <label for="" class="add-data-name">Choose Sub category</label>
                    <div class="item-input-wrap input-dropdown-wrap add-update-data-name margin-top-half no-padding">
                        <select placeholder="Please choose..." v-model="product.sub_category"
                            class="selectCategory padding-left-half">
                            <option v-for="(subCat, key) in subCategoryOption" :key="subCat" :value="key">{{ subCat }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="categoryForm margin-top text-align-left no-padding">
                    <label for="" class="add-data-name">Price</label>
                    <input type="text" name="price" v-model="product.price"
                        class="add-update-data-name margin-top-half padding-left-half padding-right-half"
                        placeholder="Add product price">
                </div>
                <div class="margin-top no-margin-bottom display-flex justify-content-center padding-top popup_button">
                    <button type="button"
                        class="button button-raised text-color-black button-large popup-close margin-right popup-button">Cancel</button>
                    <button type="button"
                        class="button button-raised button-large bg-karaka-orange text-color-white popup-button"
                        style="background-color: rgb(243, 62, 62);" @click="addProduct">Ok</button>
                </div>
            </div>
            <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
        </div>
    </f7-page>
</template>
<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input, f7ListItem, f7AccordionContent, f7List, f7AccordionToggle, f7AccordionItem } from 'framework7-vue';
import $ from 'jquery';
import axios from 'axios';
import NoValueFound from '../../../components/NoValueFound.vue'
export default {
    name: 'FoodProduct',
    components: {
        f7Page,
        f7Navbar,
        f7BlockTitle,
        f7Block,
        f7,
        f7Input,
        f7ListItem,
        f7AccordionContent,
        f7AccordionToggle,
        f7List,
        f7AccordionItem,
        NoValueFound
    },
    data() {
        return {
            product: {
                id: null,
                name: [],
                sub_category: null,
                price: '',
            },
            productTitle: 'Add Product',
            subCategoryOption: [],
            subCategoryProduct: {
                products: {
                    product_language: []
                }
            },
            search: '',
            showCategoryList: true,
            showSubCategoryList: true,
            categoryList: [],
            subCategoryList: [],
            active_category: 0,
            active_sub_category: 0,
            active_category_name: 'Category',
            active_sub_category_name: 'Sub Category',
            paginationData: [],
        }
    },
    beforeCreate() {
        this.$root.addLoader();
    },
    mounted() {
        $('.page-content').css('background', '#F7F7F7');
        this.getAllSubCategories();
        this.getProducts();
        this.$root.activationMenu('menu_management', 'product');
        this.getAllCategories();
        this.$root.removeLoader();
    },
    methods: {
        addProduct() {
            var formData = new FormData();
            formData.append('name', this.product.name);
            formData.append('price', this.product.price);
            formData.append('sub_category_id', this.product.sub_category);

            if (!this.product.name || !this.product.price || !this.product.sub_category) {
                this.$root.errorNotification('Please fill the form details.');
                return false;
            }

            if (this.product.id) {
                formData.append('id', this.product.id);
                axios.post('/api/update-product', formData)
                    .then((res) => {
                        this.$root.successNotification(res.data.success);
                        this.getProducts();
                        f7.popup.close(`#product_popup`);
                        this.blankform();
                    })
            } else {
                axios.post('/api/add-product', formData)
                    .then((res) => {
                        this.$root.successNotification(res.data.success);
                        this.getProducts();
                        f7.popup.close(`#product_popup`);
                        this.blankform();
                    })
            }
        },
        removeProduct(id) {
            f7.dialog.confirm('Are you sure delete the product?', () => {
                axios.post('/api/delete-product', { id: id })
                    .then((res) => {
                        this.$root.successNotification(res.data.success);
                        this.getProducts();
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
        editProduct(id) {
            this.productTitle = 'Edit Product';
            axios.get('/api/product/' + id)
                .then((res) => {
                    this.product.id = res.data.id;
                    res.data.product_language.forEach(product_lang => {
                        this.product.name[product_lang.language_id] = product_lang.name;
                    });
                    this.product.price = res.data.price;
                    this.product.sub_category = res.data.sub_category_id;
                })
        },
        getAllSubCategories() {
            axios.get('/api/sub-categories')
                .then((res) => {
                    this.subCategoryOption = res.data;
                })
        },
        getProducts() {
            axios.post('/api/get-products', { search: this.search, categoryId: this.active_category, subcategoryId: this.active_sub_category })
                .then((res) => {
                    this.subCategoryProduct = res.data.sub_category_product.data;
                    this.paginationData = res.data.sub_category_product;
                    this.subCategoryList = res.data.sub_category;
                })
        },
        blankform() {
            this.product.id = null;
            this.product.name = [];
            this.product.price = '';
            this.product.sub_category = null;
            this.productTitle = 'Add Product';
        },
        showAllData(e) {
            e.target.classList.toggle('scroll_change_arrow');
            var loadAllData = e.target.parentNode.parentNode.parentNode.previousSibling.querySelectorAll('.showData');
            for (let i = 0; i < loadAllData.length; i++) {
                loadAllData[i].classList.toggle('display-none');
            }
        },
        getAllCategories() {
            axios.get('/api/categories', { search: this.search })
                .then((res) => {
                    this.categoryList = res.data;
                })
        },
        getSubCategoryList(id, e) {
            this.active_category = id;
            this.active_sub_category = 0;
            this.showCategoryList = true;
            this.active_sub_category_name = 'Sub Category';
            this.getProducts();
        },
        getProductList(id) {
            this.active_sub_category = id;
            this.showSubCategoryList = true;
            this.getProducts();
        },
        clickout() {
            const category_list = event.target.parentNode.classList.contains('category--list');
            if (!category_list) {
                this.showCategoryList = true;
            }
            const subcategory_list = event.target.parentNode.classList.contains('subcategory--list');
            if (!subcategory_list) {
                this.showSubCategoryList = true;
            }
        },
        showProductPopup() {
            f7.popup.open(`#product_popup`);
        }
    },
}
</script>

<style scoped>
.deactive_dropdown {
    background-color: #dddddd !important;
}

.product_list_card .dropdown_list {
    position: absolute;
    width: 100%;
    box-shadow: 0px 0px 14px rgba(34, 34, 34, 0.1);
    border-radius: 5px;
}

.list ul::before {
    background-color: #fff !important;
    height: 0;
}

.product_list_card .f-concise #select-concise {
    border: 1px solid #555555;
    border-radius: 7px;
}

.product_list_card #select-concise {
    height: 40px;
}

.arrow_button {
    width: 30px;
    height: 30px;
    background: #ffffff;
    box-shadow: 0px 1px 10px rgb(51 51 51 / 10%);
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.scroll__arrow {
    position: absolute;
    bottom: 0;
    left: 50%;
}

.scroll__arrow .arrow_button i {
    font-size: 18px;
    color: #999999;
    transition: all 0.5s ease;
}

.scroll_change_arrow {
    transform: rotate(180deg);
}

.position-relative {
    position: relative;
}

.menu-item-dropdown .menu-item-content .f7-icons {
    font-size: 15px;
    margin-left: 10px;
}

.product-list-section {
    margin-top: 70px;
}

.product-list-section .product_list_card.card {
    background-color: transparent;
    box-shadow: none;
}

.product-list-section .product_list_card .card.product_lists {
    box-shadow: 0px 1px 10px rgba(51, 51, 51, 0.1);
    border-radius: 10px;
}

.product-list-section .product_list_card .card.product_lists .product_list .button {
    box-shadow: none;
}

.page-food-category {
    background: #f1f1f1;
}

.height-40 {
    height: 40px;
}

.height-36 {
    height: 36px;
}

.bg-dark {
    background: #38373D;
}

.border-bottom {
    border-bottom: 1px solid #EAEAEA;
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

.font-18 {
    font-size: 18px;
}

#product_popup .item-input-wrap {
    width: 100%;
    background: #F0F0F0;
    border: 0.5px solid #DCDCDC;
    border-radius: 7px;
    height: auto;
}

.bg-karaka-orange {
    background: #EE4925;
}

.card-title {
    font-weight: 600;
    font-size: 20px;
    line-height: 24px;
}

.product_list:nth-of-type(even) {
    background-color: #f7f7f7
}

.product_lists {
    position: relative;
}

.according_button {
    position: absolute;
    bottom: -26px;
    left: 48%;
}

.product-detail {
    font-weight: 400;
    font-size: 16px;
    line-height: 19px;
}

.option-button {
    font-weight: 400;
    font-size: 13px;
    line-height: 17px;
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

.arrow_button {
    width: 30px;
    height: 30px;
    background: #ffffff;
    box-shadow: 0px 1px 10px rgb(51 51 51 / 10%);
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.scroll__arrow {
    position: absolute;
    bottom: 0;
    left: 50%;
}

.position-relative {
    position: relative;
}

.subcategory__list,
.category__list {
    position: absolute;
    width: 100%;
    z-index: 999;
    background-color: #fff;
    box-shadow: 0.7px 0.7px 5px rgb(0 0 0 / 20%);
    border-radius: 7px;
    max-height: 220px;
    overflow: auto;
}

@media screen and (max-width:820px) {
    .header-links {
        width: 100%;
    }
}
</style>
<style>
.search-icon {
    width: 5% !important;
}
</style>
