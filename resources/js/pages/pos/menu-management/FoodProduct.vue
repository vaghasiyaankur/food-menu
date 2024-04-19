<template>
    <f7-page>
        <div class="data-list-section">
            <MenuManagementHeader title="Product" @add:popup="showProductPopup"
                @update:search="updateSearch" :drop-down="headerDropDown" @filter:data="filterData" />

            <div class="product-card">
                <Card 
                    :dataSet="products" 
                    @open:edit-popup="openEditPage"
                    @open:remove-popup="showRemoveProductPopup"
                />
            </div>
        </div>

        <!-- ========= DELETE PRODUCT POPUP ========= -->
        <div class="popup removePopup">
            <RemovePopup 
                :title="'Are you sure delete this product?'"
                @remove="removeData"
            />
        </div>

    </f7-page>
</template>

<script setup>
import { f7Page, f7 } from 'framework7-vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';
import $ from 'jquery';
import NoValueFound from '../../../components/NoValueFound.vue'
import MenuManagementHeader from './MenuManagementHeader.vue'
import RemovePopup from '../../../components/common/RemovePopup.vue'
import Card from '../../../components/common/Card.vue'
import { successNotification, errorNotification, getErrorMessage } from '../../../commonFunction.js';

const products = ref([]);
const removeProductId = ref(0);

const headerDropDown = ref([
    { label: 'Category',  data: {}, value: "0"},
    { label: 'Sub-Category', data: {}, value: "0"}
]);

const search = ref('');

onMounted(() => {
    $('.page-content').css('background', '#F7F7F7');
    getCategoriesList();
    getSubCategoriesList();
    getProductList();
});

const getCategoriesList = () => {
    axios.post('/api/get-categories')
    .then((response) => {
        let optionsData = [];

        optionsData.push({
            id: 0,
            label: 'Category',
        });

        Object.keys(response.data.categories).forEach(catKey => {
            const cat = response.data.categories[catKey];
            optionsData.push({
                id: cat.id,
                label: cat.name,
            });
        });

        const formData = headerDropDown.value;
        const index = formData.findIndex(item => item.label === 'Category');
        if (index !== -1) {
            formData[index].data = optionsData;
        }
    });
};

const getSubCategoriesList = () => {
    const headDD = headerDropDown.value;
    const catInd = headDD.findIndex(item => item.label === 'Category');
    const formData = new FormData();

    if (catInd !== -1) {
        formData.append('category', headDD[catInd].value);
        if(headDD[catInd].value == 0 || !headDD[catInd].value){
            const subCatInd = headDD.findIndex(item => item.label === 'Sub-Category');
            if (subCatInd !== -1) {
                var optionsData = [];
                optionsData.push({
                    id: 0,
                    label: 'Sub Category',
                });
                headDD[subCatInd].value = "0";
                headDD[subCatInd].data = optionsData;   
                return;
            }
        }
    }

    axios.post('/api/get-sub-categories', formData)
    .then((response) => {
        var optionsData = [];

        optionsData.push({
            id: 0,
            label: 'Sub Category',
        });
        
        Object.keys(response.data.subCategories).forEach(subCatKey => {
            const subCat = response.data.subCategories[subCatKey];
            optionsData.push({
                id: subCat.id,
                label: subCat.name,
            });
        });

        const formData = headerDropDown.value;
        const index = formData.findIndex(item => item.label === 'Sub-Category');
        if (index !== -1) {
            formData[index].data = optionsData;
            formData[index].value = "0";
        }
    });
};

const getProductList = () => {

    const formData = new FormData();

    formData.append('search', search.value);

    const headerDD = headerDropDown.value;
    const catInd = headerDD.findIndex(item => item.label === 'Category');
    const subCatInd = headerDD.findIndex(item => item.label === 'Sub-Category');
    if (catInd !== -1) {
        formData.append('category', headerDD[catInd].value);
    }
    if (subCatInd !== -1) {
        formData.append('subCategory', headerDD[subCatInd].value);
    }

    axios.post('/api/get-products', formData)
    .then((response) => {
        products.value = response.data.products;
    });
};

const showProductPopup = (id = null) => {

    f7.view.main.router.navigate({ url: "/add-product/" });
    // if(id){
    //     axios.get('/api/get-product/'+id)
    //     .then((response) => {
    //         updateFormData(response.data);
    //     });
    // }else{
    //     resetFormData();
    // }
    // addUpdateTitle.value = id ? 'Edit Product' : 'Add Product';
    // addUpdateType.value = id ? 'edit' : 'add';
    // f7.popup.open(`.addUpdatePopup`);
};

const updateSearch = (searchValue) => {
    search.value = searchValue;
    getProductList();
}

const showRemoveProductPopup = (id) => {
    removeProductId.value = id;
    f7.popup.open(`.removePopup`);
}

const removeData = () => {
    const productData = new FormData();
    productData.append('id', removeProductId.value);
    
    axios.post(`/api/delete-product`, productData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then((response) => {
        successNotification(response.data.success);
        f7.popup.close(`.removePopup`);
        getCategories();
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
}

const filterData = (filterLabel) => {
    const formData = headerDropDown.value;
    if(filterLabel == 'Category'){
        const index = formData.findIndex(item => item.label === 'Sub-Category');

        if (index !== -1) {
            formData[index].value = "0";
        }
        
        getSubCategoriesList();
    }
    getProductList();
}

const openEditPage = (id) => {
    f7.view.main.router.navigate({ url: "/edit-product/"+id });
}
</script>