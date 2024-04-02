<template>
    <f7-page>
        <div class="product-list-section" @click="clickout">
            <div class="product_list_card no-margin">
                <div class="card_header">
                    <div data-v-06ca3cce="" class="row padding-left padding-right padding-top-half align-items-center">
                        <div data-v-06ca3cce="" class="col-100 large-50 medium-40">
                            <h3 data-v-06ca3cce=""><span data-v-06ca3cce="" class="page_heading">Combo</span></h3>
                        </div>
                        <div data-v-06ca3cce="" class="col-100 large-50 medium-60">
                            <div data-v-06ca3cce="" class="row align-items-center">
                                <div data-v-06ca3cce="" class="col">
                                    <form class="searchbar combo-search-bar">
                                        <div class="searchbar-input-wrap">
                                            <input type="search" placeholder="Search">
                                            <i class="searchbar-icon"></i>
                                            <span class="input-clear-button"></span>
                                        </div>
                                        <span class="searchbar-disable-button">Cancel</span>
                                    </form>
                                </div>
                                <div data-v-06ca3cce=""
                                    class="col padding-left-half padding-right-half padding-top-half padding-bottom-half">
                                    <button data-v-06ca3cce=""
                                        class="button button-raised text-color-white padding height_40 combo-btn"
                                        data-popup=".categoryPopup"><i data-v-06ca3cce=""
                                            class="f7-icons font-22 margin-right-half">plus_square</i> Add
                                        Combo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="combo-list">
                <div class="row align-items-center combo-list-top">
                    <div class="padding col-100 large-20 medium-50 combo-card-type1 bg-color-white">
                        <div class="card-content-padding padding-half combo-1"></div>
                        <div class="card-content text-align-center">
                            <h4 class="combo-name no-margin-bottom">Combo 1</h4>
                            <p class="combo-price margin-top-half">$8.00</p>
                        </div>
                        <div class="text-align-center combo-change"><a class="edit-combo">Edit</a><a
                                class="delete-combo">Delete</a></div>
                    </div>
                    <div class="padding col-100 large-20 medium-50 combo-card-type2 bg-color-white">
                        <div class="card-content-padding padding-half combo-2"></div>
                        <div class="card-content text-align-center">
                            <h4 class="combo-name no-margin-bottom">Combo 2</h4>
                            <p class="combo-price margin-top-half">$10.00</p>
                        </div>
                        <div class="text-align-center combo-change"><a class="edit-combo">Edit</a><a
                                class="delete-combo">Delete</a></div>
                    </div>
                    <div class="padding col-100 large-20 medium-50 combo-card-type1 bg-color-white">
                        <div class="card-content-padding padding-half combo-3"></div>
                        <div class="card-content text-align-center">
                            <h4 class="combo-name no-margin-bottom">Combo 3</h4>
                            <p class="combo-price margin-top-half">$19.00</p>
                        </div>
                        <div class="text-align-center combo-change"><a class="edit-combo">Edit</a><a
                                class="delete-combo">Delete</a></div>
                    </div>
                    <div class="padding col-100 large-20 medium-50 combo-card-type1 bg-color-white">
                        <div class="card-content-padding padding-half combo-4"></div>
                        <div class="card-content text-align-center">
                            <h4 class="combo-name no-margin-bottom">Combo 4</h4>
                            <p class="combo-price margin-top-half">$19.00</p>
                        </div>
                        <div class="text-align-center combo-change"><a class="edit-combo">Edit</a><a
                                class="delete-combo">Delete</a></div>
                    </div>
                    <div class="padding col-100 large-20 medium-50 combo-card-type1 bg-color-white">
                        <div class="card-content-padding padding-half combo-5"></div>
                        <div class="card-content text-align-center">
                            <h4 class="combo-name no-margin-bottom">Combo 5</h4>
                            <p class="combo-price margin-top-half">$19.00</p>
                        </div>
                        <div class="text-align-center combo-change"><a class="edit-combo">Edit</a><a
                                class="delete-combo">Delete</a></div>
                    </div>
                </div>
                <div class="row align-items-center combo-list-bottom margin-top">
                    <div class="padding col-100 large-20 medium-50 combo-card-type3 bg-color-white">
                        <div class="card-content-padding padding-half combo-6"></div>
                        <div class="card-content text-align-center">
                            <h4 class="combo-name no-margin-bottom">Combo 6</h4>
                            <p class="combo-price margin-top-half">$10.00</p>
                        </div>
                        <div class="text-align-center combo-change"><a class="edit-combo">Edit</a><a
                                class="delete-combo">Delete</a></div>
                    </div>
                    <div class="padding col-100 large-20 medium-50 combo-card-type3 bg-color-white">
                        <div class="card-content-padding padding-half combo-7"></div>
                        <div class="card-content text-align-center">
                            <h4 class="combo-name no-margin-bottom">Combo 7</h4>
                            <p class="combo-price margin-top-half">$10.00</p>
                        </div>
                        <div class="text-align-center combo-change"><a class="edit-combo">Edit</a><a
                                class="delete-combo">Delete</a></div>
                    </div>
                    <div class="padding col-100 large-20 medium-50 combo-card-type3 bg-color-white">
                        <div class="card-content-padding padding-half combo-8"></div>
                        <div class="card-content text-align-center">
                            <h4 class="combo-name no-margin-bottom">Combo 8</h4>
                            <p class="combo-price margin-top-half">$10.00</p>
                        </div>
                        <div class="text-align-center combo-change"><a class="edit-combo">Edit</a><a
                                class="delete-combo">Delete</a></div>
                    </div>
                    <div class="col-100 large-20 medium-50"></div>
                    <div class="col-100 large-20 medium-50"></div>
                </div>
            </div>
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
                this.$root.errornotification('Please fill the form details.');
                return false;
            }

            if (this.product.id) {
                formData.append('id', this.product.id);
                axios.post('/api/update-product', formData)
                    .then((res) => {
                        this.$root.successnotification(res.data.success);
                        this.getProducts();
                        f7.popup.close(`#product_popup`);
                        this.blankform();
                    })
            } else {
                axios.post('/api/add-product', formData)
                    .then((res) => {
                        this.$root.successnotification(res.data.success);
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
                        this.$root.successnotification(res.data.success);
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
