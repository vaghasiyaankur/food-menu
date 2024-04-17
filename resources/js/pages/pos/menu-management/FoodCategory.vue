<template>
    <f7-page>
        
        <div class="data-list-section">
            <MenuManagementHeader title="Category" @add:popup="showCategoryPopup"
                @update:search="updateSearch" />

            <div class="category-card">
                <Card 
                    :dataSet="categories" 
                    @open:edit-popup="showCategoryPopup"
                    @open:remove-popup="showRemoveCategoryPopup"
                />
            </div>
        </div>

        <!-- ========= ADD - EDIT CATEGORY POPUP ========= -->
        <div class="popup addUpdatePopup">
            <AddUpdatePopup
                :title="addUpdateTitle"
                :form-data-format="addUpdateFormDataFormat" 
                :type="addUpdateType" :data-type="'category'"
                @store:update="storeUpdateData"
            />
        </div>

        <!-- ========= DELETE CATEGORY POPUP ========= -->
        <div class="popup removePopup">
            <RemovePopup 
                :title="'Are you sure delete this category?'"
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
import AddUpdatePopup from '../../../components/common/AddUpdatePopup.vue'
import RemovePopup from '../../../components/common/RemovePopup.vue'
import Card from '../../../components/common/Card.vue'
import { successNotification, errorNotification, getErrorMessage } from '../../../commonFunction.js';

const categories = ref([]);
const addUpdateTitle = ref('Add Category');
const addUpdateType = ref('add');
const removeCategoryId = ref(0);

const addUpdateFormDataFormat = ref([
    { label: 'Id', multipleLang: false, type: 'hidden', placeHolder: 'Category Id', value: ''},
    { label: 'Image', multipleLang: false, type: 'image', placeHolder: 'Category Image', value: {}, preview: ''},
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
        categories.value = response.data.categories;
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

const updateFormData = (categoryData) => {
    const formData = addUpdateFormDataFormat.value;
    manipulateField(formData, 'Id', categoryData.id);
    manipulateField(formData, 'Image', `/storage/${categoryData.image}`);
    manipulateField(formData, 'Type', parseInt(categoryData.category_type));
    manipulateField(formData, 'Status', parseInt(categoryData.status));

    const nameIndex = formData.findIndex(item => item.label === 'Name');
    if (nameIndex !== -1) {
        categoryData.catRestLang.forEach((categoryRestLang) => {
            const langOptionIndex = formData[nameIndex].options.findIndex(option => option.language_id === categoryRestLang.language_id);
            if (langOptionIndex !== -1) {
                formData[nameIndex].options[langOptionIndex].value = categoryRestLang.name;
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
    const categoryType = formData.find(item => item.label === 'Type').value;
    const status = formData.find(item => item.label === 'Status').value;

    // Create FormData object to send file data along with other form data
    const categoryData = new FormData();
    categoryData.append('id', id);
    categoryData.append('category_type', categoryType);
    categoryData.append('status', status);
    categoryData.append('image', formData.find(item => item.label === 'Image').value); // Append the image file to FormData

    // Map language data to FormData
    formData.find(item => item.label === 'Name').options.forEach(option => {
        categoryData.append('names['+option.language+']', option.value);
        categoryData.append('language[]', option.language);
    });

    const endpoint = id ? '/api/update-category' : '/api/add-category';

    // Send POST request with FormData
    axios.post(endpoint, categoryData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then((response) => {
        successNotification(response.data.success);
        f7.popup.close(`.addUpdatePopup`);
        getCategories();
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
};

const showRemoveCategoryPopup = (id) => {
    removeCategoryId.value = id;
    f7.popup.open(`.removePopup`);
}

const removeData = () => {
    const categoryData = new FormData();
    categoryData.append('id', removeCategoryId.value);
    
    axios.post(`/api/delete-category`, categoryData, {
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

</script>