<template>
    <f7-page>
        
        <div class="data-list-section">
            <MenuManagementHeader title="Variation" @add:popup="showVariationPopup"
                @update:search="updateSearch" />

            <div class="variation-card" v-if="variations?.length > 0">
                <Card 
                    :dataSet="variations" 
                    @open:edit-popup="showVariationPopup"
                    @open:remove-popup="showRemoveVariationPopup"
                />
            </div>
            <div v-else>
                <div class="no_order">
                    <NoValueFound title="Empty KOT List" />
                </div>
            </div>
        </div>

        <!-- ========= ADD - EDIT INGREDIENT POPUP ========= -->
        <div class="popup addUpdatePopup">
            <AddUpdatePopup
                :title="addUpdateTitle"
                :form-data-format="addUpdateFormDataFormat" 
                :type="addUpdateType" :data-type="'variation'"
                @store:update="storeUpdateData"
            />
        </div>

        <!-- ========= DELETE INGREDIENT POPUP ========= -->
        <div class="popup removePopup">
            <RemovePopup 
                :title="'Are you sure delete this variation ?'"
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

const variations = ref([]);
const addUpdateTitle = ref('Add Variation');
const addUpdateType = ref('add');
const removeVariationId = ref(0);

const addUpdateFormDataFormat = ref([
    { label: 'Id', multipleLang: false, type: 'hidden', name: 'id', placeHolder: 'Variation Id', value: ''},
    { label: 'Image', multipleLang: false, type: 'image', name: 'image', placeHolder: 'Variation Image', value: {}, preview: ''},
    {
        label: 'Status',
        multipleLang: false,
        type: 'radio',
        name: 'status',
        options: [
            { label: 'Active', value: 1},
            { label: 'Deactive', value: 2}
        ],
        placeHolder: 'Variation Status',
        value: 1
    }
]);

const search = ref('');

onMounted(() => {
    $('.page-content').css('background', '#F7F7F7');
    getVariations();
    getLanguages();
});

const getVariations = () => {
    axios.post('/api/get-variations', {
        search: search.value
    })
    .then((response) => {
        variations.value = response.data.variations;
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
            placeHolder: 'Add Variation Name',
            value: '',
            options: optionsData
        });
    });
};

const showVariationPopup = (id = null) => {
    if(id){
        axios.get('/api/get-variation/'+id)
        .then((response) => {
            updateFormData(response.data);
        });
    }else{
        resetFormData();
    }
    addUpdateTitle.value = id ? 'Edit Variation' : 'Add Variation';
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

const updateFormData = (variationData) => {
    const formData = addUpdateFormDataFormat.value;
    manipulateField(formData, 'Id', variationData.id);
    manipulateField(formData, 'Image', `/storage/${variationData.image}`);
    manipulateField(formData, 'Status', parseInt(variationData.status));

    const nameIndex = formData.findIndex(item => item.label === 'Name');
    if (nameIndex !== -1) {
        variationData.ingRestLang.forEach((variationRestLang) => {
            const langOptionIndex = formData[nameIndex].options.findIndex(option => option.language_id === variationRestLang.language_id);
            if (langOptionIndex !== -1) {
                formData[nameIndex].options[langOptionIndex].value = variationRestLang.name;
            }
        });
    }
};

const resetFormData = () => {
    const formData = addUpdateFormDataFormat.value;
    manipulateField(formData, 'Id', '');
    manipulateField(formData, 'Image', '');
    manipulateField(formData, 'Status', 1);

    const nameIndex = formData.findIndex(item => item.label === 'Name');
    if (nameIndex !== -1) {
        formData[nameIndex].options.forEach(option => option.value = '');
    }
};

const updateSearch = (searchValue) => {
    search.value = searchValue;
    getVariations();
}

const storeUpdateData = () => {
    const formData = addUpdateFormDataFormat.value;
    const id = formData.find(item => item.label === 'Id').value;
    const status = formData.find(item => item.label === 'Status').value;

    // Create FormData object to send file data along with other form data
    const variationData = new FormData();
    variationData.append('id', id);
    variationData.append('status', status);
    variationData.append('image', formData.find(item => item.label === 'Image').value); // Append the image file to FormData

    // Map language data to FormData
    formData.find(item => item.label === 'Name').options.forEach(option => {
        variationData.append('names['+option.language+']', option.value);
        variationData.append('language[]', option.language);
    });

    const endpoint = id ? '/api/update-variation' : '/api/add-variation';

    // Send POST request with FormData
    axios.post(endpoint, variationData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then((response) => {
        successNotification(response.data.success);
        f7.popup.close(`.addUpdatePopup`);
        getVariations();
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
};

const showRemoveVariationPopup = (id) => {
    removeVariationId.value = id;
    f7.popup.open(`.removePopup`);
}

const removeData = () => {
    const variationData = new FormData();
    variationData.append('id', removeVariationId.value);
    
    axios.post(`/api/delete-variation`, variationData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then((response) => {
        successNotification(response.data.success);
        f7.popup.close(`.removePopup`);
        getVariations();
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
}
</script>