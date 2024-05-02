<template>
    <div class="coupon_code_page">
        <div class="coupon_code_heading">
            <h3>Coupon Codes</h3>
            <button class="add_coupon_btn" data-popup="#coupon-code-popup"
                @click="showCouponPopup()">
                <Icon name="plusCircleIcon" class="margin-right-half" />
                <span>Add Coupon</span>
            </button>
        </div>
        <div class="coupon_table_wrapper">
            <table class="coupon_table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Type</th>
                        <th>Value</th>
                        <th>Starting Date Time</th>
                        <th>Expiry Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(coupon, index) in coupons" :key="index">
                        <td>{{ coupon.id }}.</td>
                        <td>{{ coupon.code }}</td>
                        <td>{{ coupon.discount_type == 'fixed' ? 'Fixed' : 'Percentage' }}</td>
                        <td>{{ coupon.discount_value }}</td>
                        <td>{{ formatDate(coupon.starting_date_time) }}</td>
                        <td>{{ formatDate(coupon.expiry_date_time) }}</td>
                        <td>
                            <div class="action-btn">
                                <a href="#" class="edit_btn" @click="showCouponPopup(coupon.id)">
                                    <Icon name="editIcon" />
                                    <span>Edit</span>
                                </a>
                                <a href="#" class="delete_btn" @click="showRemoveCouponPopup(coupon.id)">
                                    <Icon name="deleteIcon" /> 
                                    <span>Delete</span></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- ADD COUPON CODE POPUP -->
    <div class="popup addEditCouponPopup" id="addEditCouponPopup">
        <AddUpdatePopup 
            :title="addUpdateTitle" 
            :form-data-format="addUpdateFormDataFormat" 
            :type="addUpdateType" :data-type="'Coupon Code'"
            @store:update="saveCouponData" />
    </div>
    
    <!-- ========= DELETE COUPON CODE POPUP ========= -->
    <div class="popup removePopup">
        <RemovePopup :title="'Are you sure delete this coupon code?'" @remove="removeData"/>
    </div>

</template>
<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { f7 } from 'framework7-vue';
import { successNotification, errorNotification, getErrorMessage } from '../../../commonFunction.js';
import UserTable from '../../../components/UserTable.vue';
import AddUpdatePopup from '../../../components/common/AddUpdatePopup.vue'
import RemovePopup from '../../../components/common/RemovePopup.vue'
import Icon from '../../../components/Icon.vue';

const coupons = ref([]);

const addUpdateTitle = ref('Add Coupon');
const addUpdateType = ref('add');
const removeCouponId = ref(0);

const addUpdateFormDataFormat = ref([
    { label: 'Id', name: 'id', type: 'hidden', placeHolder: 'Coupon Id', value: ''},
    { label: 'Code', name: 'code', type: 'text', placeHolder: 'Enter Code', value: ''},
    {
        label: 'Type',
        multipleLang: false,
        type: 'radio',
        name: 'discount_type',
        options: [
            { label: 'Fixed', value: 'fixed'},
            { label: 'Percentage', value: 'percentage'}
        ],
        placeHolder: 'Add Coupon Type',
        value: 'fixed'
    },
    {  label: 'Price / Percentage', multipleLang: false, type: 'number', name: 'discount_value', placeHolder: 'Discount Price / Percentage', value: ''},
    {  label: 'Starting Date Time', multipleLang: false, type: 'date-time', name: 'starting_date_time', placeHolder: 'Starting Date Time', value: ''},
    {  label: 'Expiry Date Time', multipleLang: false, type: 'date-time', name: 'expiry_date_time', placeHolder: 'Expiry Date Time', value: ''}
]);

onMounted(() => {
    getCouponCodeList();
});

const getCouponCodeList = () => {
    axios.get('/api/get-coupon-list')
    .then((response) => {
        coupons.value = response.data.coupons
    });
}

const formatDate = (dateString) => {
    const options = { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' };
    return new Date(dateString).toLocaleDateString('en-US', options);
}

const manipulateField = (formData, label, value = null) => {
    const index = formData.findIndex(item => item.label === label);
    if (index !== -1) {
        formData[index].value = value !== null ? value : formData[index].default;
    }
};

const updateFormData = (couponData) => {
    const formData = addUpdateFormDataFormat.value;
    manipulateField(formData, 'Id', couponData.id);
    manipulateField(formData, 'Code', couponData.code);
    manipulateField(formData, 'Type', couponData.discount_type);
    manipulateField(formData, 'Price / Percentage', couponData.discount_value);
    manipulateField(formData, 'Starting Date Time', couponData.starting_date_time);
    manipulateField(formData, 'Expiry Date Time', couponData.expiry_date_time);
};

const resetFormData = () => {
    const formData = addUpdateFormDataFormat.value;
    manipulateField(formData, 'Id', '');
    manipulateField(formData, 'Code', '');
    manipulateField(formData, 'Type', 'fixed');
    manipulateField(formData, 'Price / Percentage', '');
    manipulateField(formData, 'Starting Date Time', '');
    manipulateField(formData, 'Expiry Date Time', '');
};

const showCouponPopup = (id = null) => {
    if(id){
        axios.get('/api/get-coupon/'+id)
        .then((response) => {
            updateFormData(response.data);
        });
    }else{
        resetFormData();
    }
    addUpdateTitle.value = id ? 'Edit Coupon' : 'Add Coupon';
    addUpdateType.value = id ? 'edit' : 'add';
    f7.popup.open(`.addEditCouponPopup`);
};

const showRemoveCouponPopup = (id) => {
    removeCouponId.value = id;
    f7.popup.open(`.removePopup`);
}

const removeData = () => {
    const couponData = new FormData();
    couponData.append('id', removeCouponId.value);
    
    axios.post(`/api/delete-coupon`, couponData)
    .then((response) => {
        successNotification(response.data.success);
        f7.popup.close(`.removePopup`);
        getCouponCodeList();
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
}

const saveCouponData = () => {    
    const formData = new FormData(event.target);
    const id = addUpdateFormDataFormat.value.find(item => item.label === 'Id').value;
    const endpoint = id ? '/api/update-coupon' : '/api/add-coupon';
    axios.post(endpoint, formData)
    .then((res) => {
        successNotification(res.data.success);
        f7.popup.close(`#addEditCouponPopup`);
        resetFormData();
        getCouponCodeList();
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
}
</script>
