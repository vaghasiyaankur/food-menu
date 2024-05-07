<template>
    <f7-page>
        <div class="product-list-section">
            <div class="product_list_card no-margin position-relative">
                <div class="display-flex">
                    <div class="add-combo-header">
                        <div class="row align-items-center add-combo-banner">
                            <div class="col-100 large-60 medium-60">
                                <h3 class="combo-banner-heading no-margin">
                                    <Icon name="back" @click="moveBack" />
                                    <span class="page_heading">{{ pageType }} Combo</span>
                                </h3>
                            </div>
                            <div class="col-100 large-40 medium-40">
                                <form class="searchbar combo-search-bar">
                                    <input type="search" placeholder="Search" @input="handleSearch">
                                    <i class="searchbar-icon"></i>
                                    <span class="input-clear-button"></span>
                                    <span class="searchbar-disable-button">Cancel</span>
                                </form>
                            </div>
                        </div>
                        <LeftSideComboForm 
                            :products="products" 
                            :selectProducts="selectProducts"
                            @select:product="selectProduct"
                        />
                    </div>
                    <div class="position-relative add-combo-slider-wrapper">
                        <RightSideComboForm 
                            :selectProducts="selectProducts"
                            @select:remove-product="selectRemoveProduct"
                            :combo-data="comboData"
                            @clear:data="clearAllData"
                            @submit:combo="submitCombo"
                            :page-type-button="pageTypeButton"
                            />
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>

<script setup>
import { f7Page, f7 } from 'framework7-vue';
import { ref, onMounted } from 'vue';
import $ from 'jquery';
import axios from 'axios';
import NoValueFound from '../../../components/NoValueFound.vue'
import Icon from '../../../components/Icon.vue';
import RightSideComboForm from '../../../components/Combo/RightSideComboForm.vue';
import LeftSideComboForm from '../../../components/Combo/LeftSideComboForm.vue';

import { successNotification, errorNotification, getErrorMessage } from '../../../commonFunction.js';

const selectProducts = ref([]);
const products = ref([]);
const search = ref('');
const pageType = ref('');
const pageTypeButton = ref('');

const comboData = ref([
    {  label: 'Price', multipleLang: false, type: 'number', name: 'price', placeHolder: 'Product Price', value: ''},
    {
        label: 'Food Type',
        multipleLang: false,
        type: 'radio',  
        name: 'food_type',
        options: [
            { label: 'Veg', value: 1},
            { label: 'Non-veg', value: 2},
            { label: 'Egg Type', value: 3}
        ],
        placeHolder: 'Add Category Type',
        value: 1
    },
    {
        label: 'Status',
        multipleLang: false,
        type: 'radio',
        name: 'status',
        options: [
            { label: 'Active', value: 1},
            { label: 'Deactive', value: 2}
        ],
        placeHolder: 'Category Status',
        value: 1
    },
    { label: 'Image', multipleLang: false, type: 'image', name: 'image', placeHolder: 'Product Image', value: {}, preview: ''},
    { label: 'Id', multipleLang: false, type: 'hidden', name: 'id', placeHolder: 'Product Id', value: ''},
]);

onMounted(() => {
    getProductList();
    getLanguages();
    setTimeout(() => {
        if(f7.view.main.router.currentRoute.params.id){
            const id = f7.view.main.router.currentRoute.params.id;
            getCombo(id);
            pageType.value = 'Edit';
            pageTypeButton.value = 'Update';
        }else{
            pageType.value = 'Add';
            pageTypeButton.value = 'Add';
        }
    }, 400)
});


const getCombo = (id = null) => {
    if(id){
        axios.get('/api/get-combo/'+id)
        .then((response) => {
            updateFormData(response.data);
        });
    }
}

const updateFormData = (comboResponseData) => {

    const formData = comboData.value;
    manipulateField(formData, 'Id', comboResponseData.id);
    manipulateField(formData, 'Image', `/storage/${comboResponseData.image}`);
    manipulateField(formData, 'Food Type', parseInt(comboResponseData.food_type));
    manipulateField(formData, 'Status', parseInt(comboResponseData.status));
    manipulateField(formData, 'Price', comboResponseData.price);

    const nameIndex = formData.findIndex(item => item.label === 'Name');
    if (nameIndex !== -1) {
        comboResponseData.comRestLang.forEach((productRestLang) => {
            const langOptionIndex = formData[nameIndex].options.findIndex(option => option.language_id === productRestLang.language_id);
            if (langOptionIndex !== -1) {
                formData[nameIndex].options[langOptionIndex].value = productRestLang.name;
            }
        });
    }
    comboResponseData.products.forEach((product) => {
        selectProducts.value.push({
            id: product.id,
            image: product.image,
            name: product.name,
            type: product.type,
            price: product.price,
            status: product.status
        });
    });
}

const getLanguages = () => {
    axios.get('/api/get-languages')
    .then((response) => {
        let optionsData = [];
        
        Object.keys(response.data.langs).forEach(langKey => {
            const lang = response.data.langs[langKey];
            optionsData.push({
                language_id: lang.id,
                language: lang.name,
                value: ''
            });
        });
        
        comboData.value.unshift({
            label: 'Name',
            multipleLang: true,
            type: 'text',
            placeHolder: 'Add Combo Name',
            value: '',
            options: optionsData
        });
    });
};

const getProductList = () => {
    const formData = new FormData();
    formData.append('search', search.value);

    axios.post('/api/get-products', formData)
    .then((response) => {
        products.value = response.data.products;
    });
};

const debounce = (func, delay) => {
    let timeoutId;
    return function (...args) {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            func.apply(this, args);
        }, delay);
    };
}

const handleSearch = debounce((event) => {
    search.value = event.target.value;
    getProductList();
}, 300);

const selectProduct = (id) => {
    const available = selectProducts.value.findIndex(item => item.id === id);
    if(available !== -1){

    }else{
        const allProduct = products.value;
        const index = allProduct.findIndex(item => item.id === id);
        if (index !== -1) {
            selectProducts.value.push({
                id: allProduct[index].id,
                image: allProduct[index].image,
                name: allProduct[index].name,
                price: allProduct[index].price,
                type: allProduct[index].type,
                status: allProduct[index].status
            });
        }
    }
}

const selectRemoveProduct = (id) => {
    const index = selectProducts.value.findIndex(item => item.id === id);
    if(index !== -1){
        selectProducts.value.splice(index, 1);
    }
}


const manipulateField = (formData, label, value = null) => {
    const index = formData.findIndex(item => item.label === label);
    if (index !== -1) {
        if(label == 'Image'){
            formData[index].preview = value !== null ? value : formData[index].default;
            formData[index].value = {};
        }else{
            formData[index].value = value !== null ? value : formData[index].default;
        }
    }
};

const clearAllData = () => {
    const formData = comboData.value;
    manipulateField(formData, 'Image', '');
    manipulateField(formData, 'Price', '');
    manipulateField(formData, 'Food Type', 1);
    manipulateField(formData, 'Status', 1);

    const nameIndex = formData.findIndex(item => item.label === 'Name');
    if (nameIndex !== -1) {
        formData[nameIndex].options.forEach(option => option.value = '');
    }

    selectProducts.value = [];
}

const submitCombo = () => {
    const formData = new FormData();
    const id = comboData.value.find(item => item.label === 'Id').value;

    comboData.value.forEach(item => {
        if(item.label == 'Name'){
            item.options.forEach(option => {
                formData.append('names['+ option.language +']', option.value);
                formData.append('language[]', option.language);
            });
        }else{
            formData.append(item.name, item.value);
        }
    });
    selectProducts.value.forEach(ingredient => {
        formData.append('products[]', ingredient.id);
    });

    const endpoint = id ? '/api/update-combo' : '/api/add-combo';

    axios.post(endpoint, formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then((response) => {
        successNotification(response.data.success);
        f7.view.main.router.navigate({ url: "/food-combo/" });
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
}

const moveBack = () => {
    f7.view.main.router.navigate({ url: "/food-combo/" });
}
</script>
