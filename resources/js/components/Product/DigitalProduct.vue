<template>
    <div v-if="categories.length != 0">
        <div class="digital_menu_swiper">
            <f7-swiper ref="swiperRef" class="demo-swiper" :pagination="true" :space-between="20" :slides-per-view="9" style="height: 135px">
                <f7-swiper-slide :class="{'slide-active': category.id === selectCategory}" v-for="category in categories" :key="category.id" @click="getProducts(category.id)">
                <div class="menu-image">
                    <img :src="'/storage' + category.image" alt="" width="50" height="50">
                </div>
                <p class="font-13 no-margin">{{ category.name }}</p>
                </f7-swiper-slide>
            </f7-swiper>
        </div>
    </div>
    <div class="category_title_show">
        <hr class="hmd-line hmd-line-1">
        <div class="hmd_category_name_empty display-none">{{ selectedCategoryName }}</div>
        <div class="hmd_category_name">{{ selectedCategoryName }}</div>
        <hr class="hmd-line hmd-line-2">
    </div>
    <template  v-if="digitalProducts.length">
        <div class="digital_gujarati_dish_category scroll-category"
        v-for="(subCat, ind) in digitalProducts" :key="ind"
        >
            <div class='faq faq-dropdown'>
                <input :id="'sub-category-'+ind" class="sub_categories" type='checkbox'>
                <label :for="'sub-category-'+ind">
                    <h4 class="no-margin faq-heading">{{ subCat.name }}</h4>
                    <div class='faq-arrow open'></div>
                    <div class="faq-menu-items">
                        <div class="sub-menu-items item_digital_menu">
                            <div class="sub_items" v-for="(product, index) in subCat.products" :key="index">
                                <div class="item_display">
                                    <img :src="'/storage/'+product.image">
                                </div>
                                <div class="item_disc">
                                    <div class="item_name">{{ product.name }}</div>
                                    <div class="item_price">{{ product.price.toFixed(2) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
        </div>
    </template>
    <div class="empty_category_list" v-else>
        <EmptyCardIcon />
        <p class="no-margin">Empty Food Menu List</p>
    </div>
</template>

<script setup>
import { f7Page, f7, f7Swiper, f7SwiperSlide } from 'framework7-vue';
import axios from 'axios';
import { ref, onMounted } from 'vue';
import EmptyCardIcon from '../common/EmptyCardIcon.vue'

const categories = ref([]);
const digitalProducts = ref([]);
const selectCategory = ref('');
const selectedCategoryName = ref('');
const sliderPerView = ref(11);

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
            // Get all checkboxes with class 'sub_categories'
            const checkboxes = document.querySelectorAll('.sub_categories');

            // Loop through each checkbox and uncheck it
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
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