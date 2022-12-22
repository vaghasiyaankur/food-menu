<template>
    <f7-page>
        <div class="product-list-section">
            <div class="product_list_card no-margin">
                <div class="card_header">
                    <div class="row padding-horizontal margin-horizontal align-items-center">
                        <div class="col-50">
                            <h3 class="card-title">
                                <a href="javscript:;" class="text-color-black padding-right-half"><i class="f7-icons font-22" style="vertical-align: bottom;">arrow_left</i></a>
                                <span>Product</span>
                            </h3>
                        </div>
                        <div class="col-50">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="item-content item-input">
                                        <div class="item-inner">
                                            <div class="item-input-wrap searchData row padding-half">
                                                <i class="f7-icons font-22 search-icon">search</i>
                                                <input type="search" v-model="search" name="search" @input="getProducts()" id="searchData">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col padding-left-half padding-right-half">
                                    <button class="button bg-dark text-color-white padding height-36 popup-open"
                                    data-popup="#product_popup" @click="blankform"><i class="f7-icons font-22 margin-right-half">plus_square</i> Add Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content card-content-padding">
                    <div class="row" v-if="subCategoryProduct.length">
                        <div class="col-100 medium-100 large-50" v-for="subproduct in subCategoryProduct" :key="subproduct"> 
                            <div class="row">
                                <div class="col-100 position-relative">
                                    <div class="card product_lists">
                                        <div class="card_header padding-horizontal padding-top text-align-center">
                                            <div class="border-bottom padding-bottom">
                                                <span class="card-title">{{ subproduct.sub_category_language[0].name }}</span>
                                            </div>
                                        </div>
                                        <div class="card-content padding-top">
                                            <div class="product_list padding-vertical-half" :class="{ 'display-none showData' : index >= 5 }" v-for="(product,index) in subproduct.products" :key="product">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row align-items-center">
                                                            <div class="col product-detail">{{ product.product_language[0] ? product.product_language[0].name : '' }}</div>
                                                            <div class="col text-align-right product-detail">₹ {{ product.price.toFixed(2) }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row align-items-center">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                                                data-popup="#product_popup" @click="editProduct(product.id)"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct(product.id)"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="scroll__arrow"  @click="showAllData" v-if="(subproduct.products.length >= 6)">
                                        <div class="arrow_button">
                                            <a href="javascript:;"><i class="f7-icons scroll_change_arrow">eject_fill</i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <NoValueFound />
                    </div>
                </div>
            </div>
        </div>
        <div id="product_popup" class="popup" style="position: fixed; display: block; border-radius: 15px;">
            <div class="text-align-center padding popup_title">Add Product</div>
            <div class="category-add padding">
                <div class="categoryForm text-align-left no-padding">
                    <label for="" class="add_category_name">Add product</label>
                    <input type="text" name="name" v-model="product.name[lang.id]" v-for="lang in $root.langs" :key="lang.id" class="category-name margin-top-half padding-left-half padding-right-half" :placeholder="'Add ' + lang.name + ' Product name'">
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
                    <input type="text" name="price" v-model="product.price" class="category-name margin-top-half padding-left-half padding-right-half" placeholder="Add product price">
                </div>
                <div class="margin-top no-margin-bottom display-flex justify-content-center padding-top popup_button">
                    <button type="button" class="button button-raised text-color-black button-large popup-close margin-right popup-button">Cancel</button>
                    <button type="button" class="button button-raised button-large bg-karaka-orange text-color-white popup-button" style="background-color: rgb(243, 62, 62);" @click="addProduct">Ok</button>
                </div>
            </div>
            <div><img src="/images/flow.png" style="width:100%"></div>
        </div>
    </f7-page>
</template>
<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input,f7ListItem,f7AccordionContent,f7List,f7AccordionToggle,f7AccordionItem } from 'framework7-vue';
import $ from 'jquery';
import axios from 'axios';
import NoValueFound from './NoValueFound.vue'
export default {
    name : 'FoodProduct',
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
                id : null,
                name: [],
                sub_category: null,
                price: '',
            },
            productTitle : 'Add Product',
            subCategoryOption: [],
            subCategoryProduct: {
                products: {
                    product_language:[]
                }
            },
            search : '',
        }
    },
    mounted() {
        $('.page-content').css('background', '#F7F7F7');
        this.getAllSubCategories();
        this.getProducts();
        this.$root.activationMenu('menu_management');
    },
    methods: {
        addProduct(){
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
        removeProduct(id){
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
            }, 200);
        },
        editProduct(id) {
            this.productTitle = 'Edit Product';
            axios.get('/api/product/'+id)
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
            axios.post('/api/get-products',{search : this.search})
            .then((res) => {
                this.subCategoryProduct = res.data;
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
        }
    },
}
</script>

<style scoped>
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

  .scroll_change_arrow{
    transform: rotate(180deg);
  }

  .position-relative {
      position: relative;
  }
.menu-item-dropdown .menu-item-content .f7-icons{
    font-size: 15px;
    margin-left: 10px;
}
.product-list-section{
    margin-top: 70px;
}
.product-list-section .product_list_card.card{
    background-color: transparent;
    box-shadow:none;
}
.product-list-section .product_list_card .card.product_lists{
   box-shadow: 0px 1px 10px rgba(51, 51, 51, 0.1);
   border-radius: 10px;
}
.product-list-section .product_list_card .card.product_lists .product_list .button{
    box-shadow:none;
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
    .font-18{
        font-size: 18px;
    }
    .item-input-wrap {
        width: 100%;
        background: #F0F0F0;
        border: 0.5px solid #DCDCDC;
        border-radius: 7px;
        height: auto;
    }
    .bg-karaka-orange{
        background: #EE4925;
    }
    .card-title{
        font-weight: 600;
        font-size: 20px;
        line-height: 24px;
    }
    #searchData {
        width: 85%;
    }
    .product_list:nth-of-type(even){
        background-color:#f7f7f7
    }
    .product_lists{
        position: relative;
    }
    .according_button{
        position: absolute;
        bottom: -26px;
        left: 48%;
    }
    .product-detail{
        font-weight: 400;
        font-size: 16px;
        line-height: 19px;
    }
    .option-button{
        font-weight: 400;
        font-size: 13px;
        line-height: 17px;
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
    .scroll__arrow{
        position:absolute;
        bottom: 0;
        left: 50%;
    }
    .position-relative{
        position: relative;
    }
    @media screen and (max-width:820px) {
        .header-links {
            width: 100%;
        }
    }
</style>

<style>

    .search-icon{
        width : 10% !important;
    }

</style>
