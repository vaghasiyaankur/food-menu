<template>
    <f7-page>
        
        <div class="data-list-section">
            <MenuManagementHeader title="Ingredient" @add:popup="showIngredientPopup"
                @update:search="updateSearch" />

            <div class="ingredient-card">
                <Card 
                    :dataSet="ingredients" 
                    @open:edit-popup="showIngredientPopup"
                    @open:remove-popup="showRemoveIngredientPopup"
                />
            </div>
        </div>

        <!-- ========= ADD - EDIT INGREDIENT POPUP ========= -->
        <div class="popup addUpdatePopup">
            <AddUpdatePopup
                :title="addUpdateTitle"
                :form-data-format="addUpdateFormDataFormat" 
                :type="addUpdateType" :data-type="'ingredient'"
                @store:update="storeUpdateData"
                @set:data-value="setDataValue"
                @set:image-value="setImageValue"
            />
        </div>

        <!-- ========= DELETE INGREDIENT POPUP ========= -->
        <div class="popup removePopup">
            <RemovePopup 
                :title="'Are you sure delete this ingredient ?'"
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
import AddUpdatePopup from './common/AddUpdatePopup.vue'
import RemovePopup from './common/RemovePopup.vue'
import Card from './common/Card.vue'
import { successNotification, errorNotification, getErrorMessage } from '../../../commonFunction.js';

const ingredients = ref([]);
const addUpdateTitle = ref('Add Ingredient');
const addUpdateType = ref('add');
const removeIngredientId = ref(0);

const addUpdateFormDataFormat = ref([
    { label: 'Id', multipleLang: false, type: 'hidden', placeHolder: 'Ingredient Id', value: ''},
    { label: 'Image', multipleLang: false, type: 'image', placeHolder: 'Ingredient Image', value: {}, preview: ''},
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
        placeHolder: 'Add Ingredient Type',
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
        placeHolder: 'Ingredient Status',
        value: 1
    }
]);

const search = ref('');

onMounted(() => {
    $('.page-content').css('background', '#F7F7F7');
    getIngredients();
    getLanguages();
});

const getIngredients = () => {
    axios.post('/api/get-ingredients', {
        search: search.value
    })
    .then((response) => {
        ingredients.value = response.data.ingredients;
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
            placeHolder: 'Add Ingredient Name',
            value: '',
            options: optionsData
        });
    });
};

const showIngredientPopup = (id = null) => {
    if(id){
        axios.get('/api/get-ingredient/'+id)
        .then((response) => {
            updateFormData(response.data);
        });
    }else{
        resetFormData();
    }
    addUpdateTitle.value = id ? 'Edit Ingredient' : 'Add Ingredient';
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

const updateFormData = (ingredientData) => {
    const formData = addUpdateFormDataFormat.value;
    manipulateField(formData, 'Id', ingredientData.id);
    manipulateField(formData, 'Image', `/storage/${ingredientData.image}`);
    manipulateField(formData, 'Type', parseInt(ingredientData.type));
    manipulateField(formData, 'Status', parseInt(ingredientData.status));

    const nameIndex = formData.findIndex(item => item.label === 'Name');
    if (nameIndex !== -1) {
        ingredientData.ingRestLang.forEach((ingredientRestLang) => {
            const langOptionIndex = formData[nameIndex].options.findIndex(option => option.language_id === ingredientRestLang.language_id);
            if (langOptionIndex !== -1) {
                formData[nameIndex].options[langOptionIndex].value = ingredientRestLang.name;
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
    getIngredients();
}

const storeUpdateData = () => {
    const formData = addUpdateFormDataFormat.value;
    const id = formData.find(item => item.label === 'Id').value;
    const type = formData.find(item => item.label === 'Type').value;
    const status = formData.find(item => item.label === 'Status').value;

    // Create FormData object to send file data along with other form data
    const ingredientData = new FormData();
    ingredientData.append('id', id);
    ingredientData.append('type', type);
    ingredientData.append('status', status);
    ingredientData.append('image', formData.find(item => item.label === 'Image').value); // Append the image file to FormData

    // Map language data to FormData
    formData.find(item => item.label === 'Name').options.forEach(option => {
        ingredientData.append('names['+option.language+']', option.value);
        ingredientData.append('language[]', option.language);
    });

    const endpoint = id ? '/api/update-ingredient' : '/api/add-ingredient';

    // Send POST request with FormData
    axios.post(endpoint, ingredientData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then((response) => {
        successNotification(response.data.success);
        f7.popup.close(`.addUpdatePopup`);
        getIngredients();
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
};

const showRemoveIngredientPopup = (id) => {
    removeIngredientId.value = id;
    f7.popup.open(`.removePopup`);
}

const removeData = () => {
    const ingredientData = new FormData();
    ingredientData.append('id', removeIngredientId.value);
    
    axios.post(`/api/delete-ingredient`, ingredientData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then((response) => {
        successNotification(response.data.success);
        f7.popup.close(`.removePopup`);
        getIngredients();
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
}

const setDataValue = (index, optionInd, value) => {
    if(optionInd){
        addUpdateFormDataFormat.value[index].options[ind].value = value;
    }else{
        addUpdateFormDataFormat.value[index].value = value;
    }
}

const setImageValue = (index, value, preview) => {
    console.log(addUpdateFormDataFormat.value[index]);
    addUpdateFormDataFormat.value[index].value = value;
    addUpdateFormDataFormat.value[index].preview = preview;
}
</script>