<template>
    <div class="coupon_code_page">
        <div class="coupon_code_heading">
            <h3>Upi Codes</h3>
            <button class="add_coupon_btn" data-popup="#coupon-code-popup"
                @click="showUpiPopup()">
                <Icon name="plusCircleIcon" class="margin-right-half" />
                <span>Add UPI</span>
            </button>
        </div>
        <div class="coupon_table_wrapper">
            <table class="coupon_table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Mode</th>
                        <th>Qr Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <template v-if="upiList?.length > 0">
                        <tr v-for="(upi, index) in upiList" :key="index">
                            <td>{{ upi.id }}.</td>
                            <td>{{ upi.name }}</td>
                            <td>{{ upi.phone }}</td>
                            <td>{{ upi.mode }}</td>
                            <td><img :src="'/storage/'+upi.image" width="100" height="100" /></td>
                            <td>
                                <div class="action-btn">
                                    <a href="#" class="edit_btn" @click="showUpiPopup(upi.id)">
                                        <Icon name="editIcon" />
                                        <span>Edit</span>
                                    </a>
                                    <a href="#" class="delete_btn" @click="showRemoveUpiPopup(upi.id)">
                                        <Icon name="deleteIcon" /> 
                                        <span>Delete</span></a>
                                </div>
                            </td>
                        </tr>
                    </template>
                    <template v-else>
                        <tr>
                            <td colspan="6"> No Upi Found !!</td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>

    <!-- ADD COUPON CODE POPUP -->
    <div class="popup addEditUpiPopup" id="addEditUpiPopup">
        <AddUpdatePopup 
            :title="addUpdateTitle" 
            :form-data-format="addUpdateFormDataFormat" 
            :type="addUpdateType" :data-type="'Upi Code'"
            @store:update="saveUpiData" />
    </div>
    
    <!-- ========= DELETE COUPON CODE POPUP ========= -->
    <div class="popup removePopup">
        <RemovePopup :title="'Are you sure delete this upi code?'" @remove="removeData"/>
    </div>

</template>
<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { f7 } from 'framework7-vue';
import { successNotification, errorNotification, getErrorMessage } from '../../../commonFunction.js';
import AddUpdatePopup from '../../../components/common/AddUpdatePopup.vue'
import RemovePopup from '../../../components/common/RemovePopup.vue'
import Icon from '../../../components/Icon.vue';

const upiList = ref([]);

const addUpdateTitle = ref('Add Upi');
const addUpdateType = ref('add');
const removeUpiId = ref(0);

const addUpdateFormDataFormat = ref([
    { label: 'Id', name: 'id', type: 'hidden', placeHolder: 'Upi Id', value: ''},
    { label: 'Name', name: 'name', type: 'text', placeHolder: 'Enter Name', value: ''},
    { label: 'Phone', name: 'phone', type: 'number', placeHolder: 'Enter Phone', value: ''},
    { label: 'Image', multipleLang: false, type: 'image', name: 'image', placeHolder: 'Upi Code Image', value: {}, preview: ''},
    { label: 'Mode', name: 'mode', type: 'text', placeHolder: 'Enter Mode', value: ''},
]);

onMounted(() => {
    getUpiCodeList();
});

const getUpiCodeList = () => {
    axios.get('/api/get-upi-list')
    .then((response) => {
        upiList.value = response.data.upiList
    });
}

const formatDate = (dateString) => {
    const options = { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' };
    return new Date(dateString).toLocaleDateString('en-US', options);
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

const updateFormData = (upiData) => {
    const formData = addUpdateFormDataFormat.value;
    manipulateField(formData, 'Id', upiData.id);
    manipulateField(formData, 'Name', upiData.name);
    manipulateField(formData, 'Phone', upiData.phone);
    manipulateField(formData, 'Image', `/storage/${upiData.image}`);
    manipulateField(formData, 'Mode', upiData.mode);
};

const resetFormData = () => {
    const formData = addUpdateFormDataFormat.value;
    manipulateField(formData, 'Id', '');
    manipulateField(formData, 'Name', '');
    manipulateField(formData, 'Phone', '');
    manipulateField(formData, 'Image', '');
    manipulateField(formData, 'Mode', '');
};

const showUpiPopup = (id = null) => {
    if(id){
        axios.get('/api/get-upi/'+id)
        .then((response) => {
            updateFormData(response.data);
        });
    }else{
        resetFormData();
    }
    addUpdateTitle.value = id ? 'Edit Upi' : 'Add Upi';
    addUpdateType.value = id ? 'edit' : 'add';
    f7.popup.open(`.addEditUpiPopup`);
};

const showRemoveUpiPopup = (id) => {
    removeUpiId.value = id;
    f7.popup.open(`.removePopup`);
}

const removeData = () => {
    const upiData = new FormData();
    upiData.append('id', removeUpiId.value);
    
    axios.post(`/api/delete-upi`, upiData)
    .then((response) => {
        successNotification(response.data.success);
        f7.popup.close(`.removePopup`);
        getUpiCodeList();
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
}

const saveUpiData = () => {    
    const formData = new FormData(event.target);
    const id = addUpdateFormDataFormat.value.find(item => item.label === 'Id').value;
    const endpoint = id ? '/api/update-upi' : '/api/add-upi';
    axios.post(endpoint, formData)
    .then((res) => {
        successNotification(res.data.success);
        f7.popup.close(`#addEditUpiPopup`);
        resetFormData();
        getUpiCodeList();
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
}
</script>
