<template>
    <div class="floor_plan_list">
        <div class="no-margin">
            <div class="card-header padding-vertical">
                <div class="table_mangment_heading">
                    <h3 class="no-margin">
                        <span class="page_heading">Floor List</span>
                    </h3>
                </div>
                <div class="add_table_button"><button class="button button-raised button-raise text-color-white bg-pink height-40 padding-horizontal padding-vertical-half text-transform-capitalize" data-popup="#addEditFloorPopup" @click="showFloorPopup();f7.popup.open(`.addEditFloorPopup`);"><i class="f7-icons margin-right-half">plus_square</i> Add Floor</button></div>
            </div>
            <div class="card-content">
                <div class="data-table">
                    <table>
                        <thead>
                            <tr>
                                <th style="width:20%">Number</th>
                                <th style="width:35%">Floor Name</th>
                                <th style="width:25%">Shortcut Floor Name</th>
                                <th style="width:20%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(floor,index) in floors" :key="floor">
                                <td class="label-cell settings_user-name">{{ (paginationData.per_page * (pageCount - 1)) + (index + 1) }}.</td>
                                <td class="label-cell settings_user-name">{{ floor.name }}</td>
                                <td class="label-cell settings_user-name">{{ floor.short_cut }}</td>
                                <td class="label-cell settings_user-name">
                                    <div class="user-btns display-flex">
                                        <span class="edit_user_button display-flex" @click="showFloorPopup(floor.id)">
                                            <Icon name="editIcon" /> <p>Edit</p>
                                        </span>
                                        <span class="delete_user_button display-flex" @click="deleteUserData(floor.id)">
                                            <Icon name="deleteIcon" /> <p>Delete</p>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr v-if="floors.length == 0">
                                <td colspan="4" class="text-align-center">No Data Found !!</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="pagination_count padding display-flex justify-content-end align-items-center">
                        <Pagination :function-name="getFloors" :data="paginationData" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========= ADD - EDIT CATEGORY POPUP ========= -->
    <div class="popup addEditFloorPopup" id="addEditFloorPopup">
        <AddUpdatePopup :title="addUpdateTitle" :form-data-format="addUpdateFormDataFormat" :type="addUpdateType" :data-type="'category'" @store:update="storeUpdateData" />
    </div>

    <!-- ========= DELETE CATEGORY POPUP ========= -->
    <div class="popup removePopup">
        <RemovePopup :title="'Are you sure delete this floor?'" @remove="removeData" />
    </div>


</template>

<script setup>
import { f7 } from 'framework7-vue';
import { ref } from 'vue';  
import axios from 'axios';
import Icon from "../../../components/Icon.vue";
import AddUpdatePopup from '../../../components/common/AddUpdatePopup.vue'
import RemovePopup from '../../../components/common/RemovePopup.vue'
import Pagination from '../../../components/Pagination.vue';

const floors = ref([]);
const paginationData = ref([]);
const pageCount = ref(1);
const pageNumber = ref(1);
const addUpdateFormDataFormat = ref([
    { label: 'Id', multipleLang: false, type: 'hidden', name: 'id', placeHolder: 'Id', value: ''},
    { label: 'Name', multipleLang: false, type: 'text', name: 'name', placeHolder: 'Floor Name', value: ''},
    { label: 'Shortcut Floor Name', multipleLang: false, type: 'text', name: 'short_cut', placeHolder: 'Floor Short Cut', value: ''},
]);
const deleteId = ref(0);
const addUpdateTitle = ref('Add Floor');

const getFloors = (pageNum) => {
    pageNum = pageNum || 1; // Default to 1 if not provided
    pageCount.value = pageNum;
    var page = '/api/get-floors?page=' + pageNum;
    pageNumber.value = pageNum; // Update the reactive ref
    axios.get(page)
    .then((res) => {
        floors.value = res.data.data;
        paginationData.value = res.data;
        f7.popup.close(`#addEditFloorPopup`);
    })
    .catch((error) => {
        console.error("Error fetching floors:", error);
    });
}

getFloors(pageNumber.value); // Initial fetch with default pageNumber

const storeUpdateData = () => {
    var formData = new FormData(event.target);

    axios.post('/api/add-floor', formData)
    .then((res) => {
        getFloors();
    });
}

const showFloorPopup = (id = null) => {
    if(id){
        addUpdateTitle.value = id ? 'Edit Floor' : 'Add Floor';
        const floor = floors.value.find(item => item.id === id);
        updateFormData(floor);
        f7.popup.open(`#addEditFloorPopup`);
    }else{
        resetFormData();
    }
};

const updateFormData = (floor) => {
    const formData = addUpdateFormDataFormat.value;
    manipulateField(formData, 'Id', floor.id);
    manipulateField(formData, 'Name', floor.name);
    manipulateField(formData, 'Shortcut Floor Name', floor.short_cut);
};

const manipulateField = (formData, label, value = null) => {
    const index = formData.findIndex(item => item.label === label);
    if (index !== -1) {
        formData[index].value = value !== null ? value : formData[index].default;
    }
};

const deleteUserData = (id) => {
    deleteId.value = id;
    f7.popup.open(`.removePopup`);
}

const removeData = () => {
    axios.delete('/api/delete-floor-data/'+deleteId.value)
    .then((res) => {
        successNotification(res.data.success);
        f7.popup.close(`.removePopup`);
        getUser();
    })
}

</script>