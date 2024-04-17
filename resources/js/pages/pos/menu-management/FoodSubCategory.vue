<template>
    <f7-page>
        <div class="data-list-section">
            <MenuManagementHeader title="Sub Category" @add:popup="showSubCategoryPopup"
                @update:search="updateSearch" />

                <div class="sub-category-card">
                    <Card 
                        :dataSet="subCategories" 
                        @open:edit-popup="showSubCategoryPopup"
                        @open:remove-popup="showRemoveSubCategoryPopup"
                    />
                </div>
        </div>

        <!-- ========= ADD - EDIT SUB-CATEGORY POPUP ========= -->
        <div class="popup addUpdatePopup">
            <AddUpdatePopup
                :title="addUpdateTitle"
                :form-data-format="addUpdateFormDataFormat" 
                :type="addUpdateType" :data-type="'sub-category'"
                @store:update="storeUpdateData"
            />
        </div>

        <!-- ========= DELETE SUB-CATEGORY POPUP ========= -->
        <div class="popup removePopup">
            <RemovePopup 
                :title="'Are you sure delete this sub category?'"
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

const subCategories = ref([]);
const addUpdateTitle = ref('Add Sub Category');
const addUpdateType = ref('add');
const removeSubCategoryId = ref(0);
const defaultSelectCatId = ref(0);

const addUpdateFormDataFormat = ref([
    { label: 'Id', multipleLang: false, type: 'hidden', placeHolder: 'Category Id', value: ''},
    { label: 'Image', multipleLang: false, type: 'image', placeHolder: 'Sub Category Image', value: {}, preview: ''},
    {
        label: 'Status',
        multipleLang: false,
        type: 'radio',
        name: 'status',
        options: [
            { label: 'Active', value: 1},
            { label: 'Deactive', value: 2}
        ],
        placeHolder: 'Sub Category Status',
        value: 1
    }
]);

const search = ref('');

onMounted(() => {
    $('.page-content').css('background', '#F7F7F7');
    getCategories();
    getSubCategories();
    getLanguages();
});

const getSubCategories = () => {
    axios.post('/api/get-sub-categories', {
        search: search.value
    })
    .then((response) => {
        subCategories.value = response.data.subCategories;
    });
};

const getCategories = () => {
    axios.post('/api/get-categories')
    .then((response) => {
        let optionsData = [];
        
        Object.keys(response.data.categories).forEach(catKey => {
            const cat = response.data.categories[catKey];
            optionsData.push({
                id: cat.id,
                label: cat.name,
            });
        });

        defaultSelectCatId.value = response.data.categories[0]?.id ?? ''

        addUpdateFormDataFormat.value.push({
            label: 'Category',
            multipleLang: false,
            type: 'drop-down',
            placeHolder: 'Select Category Name',
            value: response.data.categories[0]?.id ?? '',
            options: optionsData
        });
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
            placeHolder: 'Add Sub Category Name',
            value: '',
            options: optionsData
        });
    });
};

const showSubCategoryPopup = (id = null) => {
    if(id){
        axios.get('/api/get-sub-category/'+id)
        .then((response) => {
            updateFormData(response.data);
        });
    }else{
        resetFormData();
    }
    addUpdateTitle.value = id ? 'Edit Category' : 'Add Sub Category';
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

const updateFormData = (subCategoryData) => {
    const formData = addUpdateFormDataFormat.value;
    manipulateField(formData, 'Id', subCategoryData.id);
    manipulateField(formData, 'Category', subCategoryData.categoryId);
    manipulateField(formData, 'Image', `/storage/${subCategoryData.image}`);
    manipulateField(formData, 'Status', parseInt(subCategoryData.status));

    const nameIndex = formData.findIndex(item => item.label === 'Name');
    if (nameIndex !== -1) {
        subCategoryData.subCatRestLang.forEach((subCategoryRestLang) => {
            const langOptionIndex = formData[nameIndex].options.findIndex(option => option.language_id === subCategoryRestLang.language_id);
            if (langOptionIndex !== -1) {
                formData[nameIndex].options[langOptionIndex].value = subCategoryRestLang.name;
            }
        });
    }
};

const resetFormData = () => {
    const formData = addUpdateFormDataFormat.value;
    manipulateField(formData, 'Id', '');
    manipulateField(formData, 'Category', defaultSelectCatId.value);
    manipulateField(formData, 'Image', '');
    manipulateField(formData, 'Status', 1);

    const nameIndex = formData.findIndex(item => item.label === 'Name');
    if (nameIndex !== -1) {
        formData[nameIndex].options.forEach(option => option.value = '');
    }
};

const updateSearch = (searchValue) => {
    search.value = searchValue;
    getSubCategories();
}

const storeUpdateData = () => {
    const formData = addUpdateFormDataFormat.value;
    const id = formData.find(item => item.label === 'Id').value;
    const status = formData.find(item => item.label === 'Status').value;
    const categoryId = formData.find(item => item.label === 'Category').value;

    const subCategoryData = new FormData();
    subCategoryData.append('id', id);
    subCategoryData.append('status', status);
    subCategoryData.append('category_id', categoryId);
    subCategoryData.append('image', formData.find(item => item.label === 'Image').value); // Append the image file to FormData

    formData.find(item => item.label === 'Name').options.forEach(option => {
        subCategoryData.append('names['+option.language+']', option.value);
        subCategoryData.append('language[]', option.language);
    });

    const endpoint = id ? '/api/update-sub-category' : '/api/add-sub-category';

    axios.post(endpoint, subCategoryData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then((response) => {
        successNotification(response.data.success);
        f7.popup.close(`.addUpdatePopup`);
        getSubCategories();
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
};

const showRemoveSubCategoryPopup = (id) => {
    removeSubCategoryId.value = id;
    f7.popup.open(`.removePopup`);
}

const removeData = () => {
    const subCategoryData = new FormData();
    subCategoryData.append('id', removeSubCategoryId.value);
    
    axios.post(`/api/delete-sub-category`, subCategoryData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then((response) => {
        successNotification(response.data.success);
        f7.popup.close(`.removePopup`);
        getSubCategories();
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
}
</script>