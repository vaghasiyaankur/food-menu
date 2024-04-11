<template>
    <f7-page>
        <div class="category-list-section">
            <!-- <div class="card elevation-2 border_radius_10"> -->
            <MenuManagementHeader title="Category" @add:popup="showCategoryPopup"
                @update:search="updateSearch" />

            <div class="card-content add-combo">
                <div class="grid grid-cols-5 medium-grid-cols-4 grid-gap-25 grid-gap-20 align-items-center add-list">
                    <div class="bg-color-white data-card" v-for="category in categories" :key="category">
                        <div class="combo-image"><img :src="'/storage'+category?.image">
                        </div>
                        <div class="text-align-center data-card-name">
                            <h4 class="no-margin no-padding">{{category?.category_languages[0]?.name}}</h4>
                        </div>
                        <div class="grid grid-cols-2 grid-gap-5 combo-change">
                            <a class="edit-combo col-100 large-45 medium-50" @click="showCategoryPopup(category.id)">
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

        <AddUpdatePopup 
            :title="addUpdateTitle" 
            :form-data-format="addUpdateFormDataFormat" 
            :type="addUpdateType" :data-type="'category'"
            @store:update="storeUpdateData"
        />

</f7-page>
</template>

<script setup>
import {
    f7Page,
    f7Navbar,
    f7BlockTitle,
    f7Block,
    f7,
    f7Input
} from 'framework7-vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';
import $ from 'jquery';
import NoValueFound from '../../../components/NoValueFound.vue'
import MenuManagementHeader from './MenuManagementHeader.vue'
import Icon from "../../../components/Icon.vue"
import AddUpdatePopup from './PopUp/AddUpdatePopup.vue';


// const emit = defineEmits(['error:notification', 'success:notification']);
const props = defineProps({
    errorNotification     : Function,
    successNotification   : Function
});

const categories = ref([]);
const addUpdateTitle = ref('Add Category');
const addUpdateType = ref('add');

const addUpdateFormDataFormat = ref([
    { label: 'Id', multipleLang: false, type: 'hidden', placeHolder: 'Category Id', value: ''},
    { label: 'Image', multipleLang: false, type: 'image', placeHolder: 'Category Image', value: '', preview: ''},
    {
        label: 'Type',
        multipleLang: false,
        type: 'radio',
        name: 'food-type',
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
    }
]);

const search = ref('');

onMounted(() => {
    $('.page-content').css('background', '#F7F7F7');
    getCategories();
    getLanguages();
});

const getCategories = () => {
    axios.post('/api/get-categories', {
        search: search.value
    })
    .then((response) => {
        categories.value = response.data.category.data;
    });
};

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

        addUpdateFormDataFormat.value.unshift({
            label: 'Name',
            multipleLang: true,
            type: 'text',
            placeHolder: 'Add Category Name',
            value: '',
            options: optionsData
        });
    });
};

const showCategoryPopup = (id = null) => {
    if(id){
        axios.get('/api/get-category/'+id)
        .then((response) => {
            updateFormData(response.data);
        });
    }else{
        resetFormData();
    }
    addUpdateTitle.value = id ? 'Edit Category' : 'Add Category';
    addUpdateType.value = id ? 'edit' : 'add';
    f7.popup.open(`.addUpdatePopup`);
};

const findIndexByLabel = (formData, label) => formData.findIndex(item => item.label === label);

const manipulateField = (formData, label, value = null) => {
    const index = formData.findIndex(item => item.label === label);
    if (index !== -1) {
        if(label == 'Image'){
            formData[index].preview = value !== null ? value : formData[index].default;
            formData[index].value = '';
        }else{
            formData[index].value = value !== null ? value : formData[index].default;
        }
    }
};

const updateFormData = (categoryData) => {

    const formData = addUpdateFormDataFormat.value;
    manipulateField(formData, 'Id', categoryData.id);
    manipulateField(formData, 'Image', `/storage/${categoryData.image}`);
    manipulateField(formData, 'Type', parseInt(categoryData.category_type));
    manipulateField(formData, 'Status', parseInt(categoryData.status));

    const nameIndex = formData.findIndex(item => item.label === 'Name');
    if (nameIndex !== -1) {
        categoryData.category_languages.forEach((categoryLang) => {
            const langOptionIndex = formData[nameIndex].options.findIndex(option => option.language_id === categoryLang.language_id);
            if (langOptionIndex !== -1) {
                formData[nameIndex].options[langOptionIndex].value = categoryLang.name;
            }
        });
    }
};

const resetFormData = () => {
    const formData = addUpdateFormDataFormat.value;
    manipulateField(formData, 'Id', '');
    manipulateField(formData, 'Image', '');
    manipulateField(formData, 'Type', 1);
    manipulateField(formData, 'Status', 1);

    const nameIndex = formData.findIndex(item => item.label === 'Name');
    if (nameIndex !== -1) {
        formData[nameIndex].options.forEach(option => option.value = '');
    }
};

const updateSearch = (searchValue) => {
    search.value = searchValue;
    getCategories();
}

const storeUpdateData = () => {
    const formData = addUpdateFormDataFormat.value;
    const id = formData.find(item => item.label === 'Id').value;
    const imageFile = formData.find(item => item.label === 'Image').value; // Assuming value is the file object

    // Create FormData object to send file data along with other form data
    const categoryData = new FormData();
    categoryData.append('id', id);
    categoryData.append('image', imageFile); // Append the file object to FormData
    categoryData.append('category_type', formData.find(item => item.label === 'Type').value);
    categoryData.append('status', formData.find(item => item.label === 'Status').value);

    // Map language data to FormData if needed
    formData.find(item => item.label === 'Name').options.forEach(option => {
        categoryData.append('language_id[]', option.language_id);
        categoryData.append('name[]', option.value);
    });

    const endpoint = id ? '/api/update-category' : '/api/add-category';

    // Send POST request with FormData
    axios.post(endpoint, categoryData, {
        headers: {
            'Content-Type': 'multipart/form-data' // Set content type to multipart/form-data for file upload
        }
    })
    .then((response) => {
        // Handle response if needed
    })
    .catch((error) => {
        this.$root.errorNotification("Currently, the restaurant is closed");
        // props.errorNotification('Failed to fetch categories. Please try again later.');
        // emit('error:notification', 'test');
    });
};
</script>