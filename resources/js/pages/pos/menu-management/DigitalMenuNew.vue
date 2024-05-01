<template>
    <f7-page>
        <div class="card digital_menu_card elevation-2">
            <div class="row padding-horizontal no-padding-vertical">
                <div class="col">
                    <h3 class="margin-bottom-half">
                        <span class="page_heading"> Food Menu </span>
                    </h3>
                    <p class="no-margin">Select your favourite food and enjoy with family</p>
                </div>
            </div>
            <div v-if="categories.length != 0">
                <div class="digital_menu_swiper padding">
                    <div data-pagination='{"el":".swiper-pagination"}' data-space-between="20" data-slides-per-view="11"
                    class="swiper swiper-init demo-swiper margin-top margin-bottom" style="height : 135px">
                        <div class="swiper-pagination"></div>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide margin-right" :class="{ 'slide-active': category.id == selectCategory}" v-for="(category, index) in categories" :key="index" @click="getProducts(category.id)">
                                <div class="menu-image">
                                    <img :src="'/storage'+category.image" alt="" width="50" height="50">
                                </div>
                                <p class="font-13 no-margin text-align-center margin-top-half">
                                    {{ category.name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu_list">
                    <div class="position-relative">
                        <div class="menu-title"><span>{{ selectedCategoryName }} Menu</span></div>
                    </div>
                    <div class="menu-details margin-top">
                        <div class="menu-lists">
                            <div class="row" v-if="digitalProducts.length">
                                <div class="col-50" v-for="(subCat, index) in digitalProducts" :key="subCat">
                                    <div class="menu-list">
                                        <div class="font-18 text-align-center menu-list-title text-color-black"><u>{{ subCat.name }}</u></div>
                                        <div class="list row margin-half align-items-center" v-for="(product, index) in subCat.products" :key="index">
                                            <div class="col-85 display-flex">{{ product.name }}&nbsp;<span class="dots"></span></div>
                                            <div class="col-15">{{ product.price.toFixed(2) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-else>
                                <div class="no_order">
                                    <NoValueFound />
                                    <div class="no_order_text text-align-center">
                                        <p class="no-margin">Empty Food Menu List</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <div class="no_order">
                    <NoValueFound />
                    <div class="no_order_text text-align-center">
                        <p class="no-margin">Empty Food Menu List</p>
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>
    
<script setup>
    import { f7Page, f7 } from 'framework7-vue';
    import $ from 'jquery';
    import axios from 'axios';
    import NoValueFound from '../../../components/NoValueFound.vue'
    import { ref, onMounted } from 'vue';
    
    const categories = ref([]);
    const digitalProducts = ref([]);
    const selectCategory = ref('');
    const selectedCategoryName = ref('');
    
    onMounted(() => {
        getCategories();
    });
    
    const getCategories = () => {
        axios.post('/api/get-categories')
        .then((response) => {
            categories.value = response.data.categories;
            selectCategory.value = response.data.categories[0]?.id ?? '';
            selectedCategoryName.value = response.data.categories[0]?.name ?? '';
            digitalProductList(selectCategory.value)
        });
    };
    
    const digitalProductList = (id) => {
        if(id){
            axios.get('/api/get-digital-product-list/'+id)
            .then((response) => {
                digitalProducts.value = response.data;
            });
        }
    }
    
    const getProducts = (id) => {
        const selectedCategory = categories.value.find(category => category.id === id);
    
        selectCategory.value = id;
        selectedCategoryName.value = selectedCategory ? selectedCategory.name : '';
    
        digitalProductList(id);
    }
    
</script>
