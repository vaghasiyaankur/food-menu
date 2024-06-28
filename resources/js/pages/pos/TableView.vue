<template>
    <f7-page>
        <div class="card_header table_view-header">
            <div class="row align-items-center table_view-header_inner">
                <div class="col-100 large-20 medium-100">
                    <h3 class="no-margin no-padding table_view-banner">Table View
                    </h3>
                </div>
                <div class="col-100 large-80 medium-100">
                    <div class="table_view-features">
                        <div class="table_view-representer">
                            <div class="display-flex align-items-center">
                                <div class="table_status-represent-ordering"></div>
                                <p class="table_status-represent-type no-margin no-padding">Ordering</p>
                            </div>
                            <div class="display-flex align-items-center">
                                <div class="table_status-represent-blank"></div>
                                <p class="table_status-represent-type no-margin no-padding">Empty</p>
                            </div>
                        </div>
                        <div class="table_view-btn table_view-add_table_btn">
                            <button class="button button-raised bg-dark text-color-white height_40 active" @click="openAddNewTablePopup(null)"><i class="f7-icons font-22 margin-right-half">plus_square</i>Add Table</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-content table_view_list"  v-if="floorList.length">
            <template v-for="(floor, index) in floorList" :key="index">
                <h4 class="table_view_list-floor-heading no-margin no-padding">{{ floor.name }}</h4>
                <div
                    class="grid grid-cols-4 medium-grid-cols-3 align-items-center floor-divider">
                    <!-- empty_card -->
                    <template v-for="(table, ind) in floor.tables" :key="ind">
                        <div v-if="table.order" class="card-type table_view-ground_floor-card ordering_card">
                            <div class="card-margin-padding">
                                <div class="action-btn">
                                    <i class="icon f7-icons" @click="table.visible = !table.visible"> ellipsis_vertical</i>
                                    <div class="action-dropdown" v-if="table.visible">
                                        <div class="bordershadow">
                                            <div class="edit-btn" @click="openAddNewTablePopup(table.id)">
                                                <Icon name="editIcon" />
                                                <span>Edit</span>
                                            </div>
                                            <div class="delete-btn" @click="showRemoveTablePopUp(table.id)">
                                                <Icon name="deleteIcon" />
                                                <span>Delete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hold-btn" v-if="table.holdKotAvailable">
                                    <i class="icon f7-icons" @click="showRemoveHoldPopUp(table.id)">hand_raised_slash</i>
                                    <!-- <div class="delete-hold">
                                        <button>
                                            <Icon name="deleteIcon" @click="removeHoldKot(table.id)" />
                                        </button></div> -->
                                </div>
                                <div class="table_view-table_number">
                                    <h5 class="no-margin no-padding">Table No. {{ table.table_number }}</h5>
                                </div>
                                <div class="ordering_card-waiting_time">
                                    <div class="display-flex align-items-center">
                                        <Icon name="timer" />
                                        <span class="waiting-time">{{ table.order.duration }}</span>
                                    </div>
                                </div>
                                <div class="table_view-table_cost">
                                    <p class="no-margin no-padding">{{ currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹' }} {{ table?.order?.total_price?.toFixed(2) }}</p>
                                </div>
                                <div class="display-flex align-items-center table_view-table_details">
                                    <div class="table_view-people_count_btn">
                                        <button class="button height_40">
                                            <Icon name="person" color="#009049" />
                                            <span>Person - {{ table.order.person }}</span>
                                        </button>
                                    </div>
                                    <div class="table_view-inspect_btn" v-if="table.holdKotAvailable">
                                </div>
                                    <div class="table_view-inspect_btn display-flex">
                                        <button class="button height_40 printer-active margin-right-half">
                                            <Icon name="printer" @click="settleSavePayment(table.id)" />
                                        </button>
                                        <button class="button height_40">
                                            <Icon name="eye" @click="openPos(table.id)" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else class="card-type table_view-ground_floor-card blank_card">
                            <div class="card-margin-padding">
                                <div class="action-btn">
                                    <i class="icon f7-icons" @click="table.visible = !table.visible"> ellipsis_vertical</i>
                                    <div class="action-dropdown" v-if="table.visible">
                                        <div class="bordershadow">
                                            <div class="edit-btn" @click="openAddNewTablePopup(table.id)">
                                                <Icon name="editIcon" />
                                                <span>Edit</span>
                                            </div>
                                            <div class="delete-btn" @click="showRemoveTablePopUp(table.id)">
                                                <Icon name="deleteIcon" />
                                                <span>Delete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hold-btn" v-if="table.holdKotAvailable">
                                    <i class="icon f7-icons" @click="showRemoveHoldPopUp(table.id)">hand_raised_slash</i>
                                    <!-- <div class="delete-hold"><button>
                                            <Icon name="deleteIcon" @click="removeHoldKot(table.id)" />
                                        </button></div> -->
                                </div>
                                <div class="table_view-table_number"  @click="openPos(table.id)">
                                    <h5 class="no-margin no-padding">Table No. {{ table.table_number }}</h5>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </template>
        </div>
        <div v-else>
            <div class="no_order">
                <NoValueFound title="Empty KOT List" />
            </div>
        </div>
        <!-- ========= ADD TABLE-VIEW POPUP ========= -->
        <div class="popup addUpdatePopup">
            <AddUpdatePopup :title="addUpdateTitle" :form-data-format="addUpdateFormDataFormat" :type="addUpdateType" :data-type="'table-view'" @store:update="storeUpdateData" />
        </div>

        <!-- ========= DELETE TABLE-VIEW POPUP ========= -->
        <div class="popup removePopup">
            <RemovePopup :title="'Are you sure delete this table?'" @remove="removeData" />
        </div>

        <div class="popup removeHoldPopup">
            <RemovePopup :title="'Are you sure to remove the hold KOT?'" @remove="removeHoldKot" />
        </div>


        <!-- ========= SETTLE,SAVE & EBill POPUP ========= -->
        <PayAndEBillPopup ref="payAndEBillRef" @success-payment="successPayment()" />
        
    </f7-page>
</template>
<script setup>
import { f7Page, f7, f7Popover, f7List, f7ListItem, f7Link } from 'framework7-vue';
import axios from 'axios';
import { ref, onMounted, provide, inject } from 'vue';
import Icon from '../../components/Icon.vue';
import AddUpdatePopup from '../../components/common/AddUpdatePopup.vue'
import RemovePopup from '../../components/common/RemovePopup.vue'
import { successNotification, errorNotification, getErrorMessage } from '../../commonFunction.js'
import NoValueFound from '../../components/NoValueFound.vue';
import PayAndEBillPopup from '../../components/Popup/PayAndEBillPopup.vue';

const floorList = ref([]);
const defaultSelectColorId = ref('');
const defaultSelectFloorId = ref('');
const removeTableId = ref(0);
const removeHoldId = ref(0);
const currentCurrencyData = inject('currentCurrencyData');

const addUpdateTitle = ref('Add Table');
const addUpdateType = ref('add');
const addUpdateFormDataFormat = ref([
    { label: 'Table Number', multipleLang: false, type: 'number', name: 'table_number', placeHolder: 'Table Number', value: '' },
    { label: 'Capacity Of Person', multipleLang: false, type: 'number', name: 'capacity_of_person', placeHolder: 'Capacity Of Person', value: '' },
    {
        label: 'Status',
        multipleLang: false,
        type: 'radio',
        name: 'status',
        options: [
            { label: 'Active', value: 1 },
            { label: 'Deactive', value: 0 }
        ],
        placeHolder: 'Status',
        value: 1
    },
    { label: 'Finish Order Time', multipleLang: false, type: 'number', name: 'finish_order_time', placeHolder: 'Finish Order Time (In Minutes)', value: '' },
    { label: 'Id', multipleLang: false, type: 'hidden', name: 'id', placeHolder: 'Category Id', value: '' },
]);

const payAndEBillRef = ref(null);
const payableAmount = ref(0);
const orderId = ref(0);
const tableIdNumber = ref(0);

onMounted(() => {
    getTableListFloorWise();
    getColorList();
});

const getColorList = () => {
    axios.get('/api/color-list')
        .then((response) => {
            let optionsData = [];

            Object.keys(response.data.colors).forEach(floorKey => {
                const floor = response.data.colors[floorKey];
                optionsData.push({
                    id: floor.id,
                    label: floor.color,
                });
            });

            const statusIndex = addUpdateFormDataFormat.value.findIndex(item => item.label === 'Status');
            defaultSelectColorId.value = response.data.colors[0]?.id ?? '';

            if (statusIndex !== -1) {
                addUpdateFormDataFormat.value.splice(statusIndex + 1, 0, {
                    label: 'Color',
                    multipleLang: false,
                    type: 'drop-down',
                    name: 'color_id',
                    placeHolder: 'Select Color Name',
                    value: response.data.colors[0]?.id ?? '',
                    options: optionsData
                });
            }
        });
}

const getTableListFloorWise = () => {
    axios.post('/api/get-table-list-floor-wise')
        .then((response) => {
            response.data.forEach(floor => {
                floor.visible = false;
            });
            floorList.value = response.data;

            let optionsData = [];

            Object.keys(response.data).forEach(floorKey => {
                const floor = response.data[floorKey];
                optionsData.push({
                    id: floor.id,
                    label: floor.name,
                });
            });

            const capacityIndex = addUpdateFormDataFormat.value.findIndex(item => item.label === 'Capacity Of Person');
            defaultSelectFloorId.value = response.data[0]?.id ?? '';

            if (capacityIndex !== -1) {
                const FloorIndex = addUpdateFormDataFormat.value.findIndex(item => item.label === 'Floor');
                let floor = 0;
                if (FloorIndex !== -1) {
                    floor = 1;
                }
                addUpdateFormDataFormat.value.splice(capacityIndex + 1, floor, {
                    label: 'Floor',
                    multipleLang: false,
                    type: 'drop-down',
                    name: 'floor_id',
                    placeHolder: 'Select Floor Name',
                    value: response.data[0]?.id ?? '',
                    options: optionsData
                });
            }

        });
}

const openPos = (id) => {
    f7.view.main.router.navigate({ url: "/pos/" + id });
}

const showRemoveHoldPopUp = (id) => {
    removeHoldId.value = id;
    f7.popup.open(`.removeHoldPopup`);
}

const removeHoldKot = () => {
    axios.get('/api/remove-hold-kot/' + removeHoldId.value)
        .then((response) => {
            getTableListFloorWise();
            f7.popup.close(`.removeHoldPopup`);
        });
}


const storeUpdateData = () => {
    const formData = addUpdateFormDataFormat.value;
    const id = formData.find(item => item.label === 'Id').value;

    const tableData = new FormData(event.target);

    axios.post('/api/add-update-table', tableData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then((response) => {
        successNotification(response.data.success);
        f7.popup.close(`.addUpdatePopup`);
        getTableListFloorWise();
        console.log(addUpdateFormDataFormat.value);
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
}
    

const openAddNewTablePopup = (id = null) => {
    if(id){
        axios.get('/api/get-table/'+id)
        .then((response) => {
            updateFormData(response.data);
        });
    }else{
        resetFormData();
    }
    addUpdateTitle.value = id ? 'Edit Table' : 'Add Table';
    addUpdateType.value = id ? 'edit' : 'add';
    f7.popup.open(`.addUpdatePopup`);
};

const manipulateField = (formData, label, value = null) => {
    const index = formData.findIndex(item => item.label === label);
    if (index !== -1) {
        formData[index].value = value !== null ? value : formData[index].default;
    }
};

const updateFormData = (tableData) => {
    const formData = addUpdateFormDataFormat.value;
    manipulateField(formData, 'Id', tableData.id);
    manipulateField(formData, 'Table Number', tableData.table_number);
    manipulateField(formData, 'Capacity Of Person', tableData.capacity_of_person);
    manipulateField(formData, 'Status', parseInt(tableData.status));
    manipulateField(formData, 'Finish Order Time', tableData.finish_order_time);
    manipulateField(formData, 'Color', tableData.color_id);
    manipulateField(formData, 'Floor', tableData.floor_id);
};

const resetFormData = () => {
    const formData = addUpdateFormDataFormat.value;
    manipulateField(formData, 'Id', '');
    manipulateField(formData, 'Table Number', '');
    manipulateField(formData, 'Capacity Of Person', '');
    manipulateField(formData, 'Status', 1);
    manipulateField(formData, 'Finish Order Time', '');
    manipulateField(formData, 'Color', defaultSelectColorId.value);
    manipulateField(formData, 'Floor', defaultSelectFloorId.value);
};

const showRemoveTablePopUp = (id) => {
    const table = floorList.value.flatMap(floor => floor.tables).find(table => table.id === id);

    if (table) {
        if (table.order) {
            errorNotification("This Table Has a current order available. Please handle the order before removing the table.");
        } else {
            removeTableId.value = id;
            f7.popup.open(`.removePopup`);
        }
    } else {
        errorNotification("Table not found.");
    }
}

const removeData = () => {
    const tableData = new FormData();
    tableData.append('id', removeTableId.value);
    
    axios.post(`/api/delete-table`, tableData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then((response) => {
        successNotification(response.data.success);
        f7.popup.close(`.removePopup`);
        getTableListFloorWise();
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
}

const settleSavePayment = (tableId) => {
    const table = floorList.value.flatMap(floor => floor.tables).find(table => table.id === tableId);
    if(table.holdKotAvailable){
        errorNotification('Please create KOT for items on hold or remove them from hold.');
    }else{
        if(!table.order){
            errorNotification('No Order Found in this Table.');
        }else{
            const order = table.order;
            console.log(order);
            axios.post('/api/check-current-order-kot-available', {tableId : tableId, orderId : order.id}, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then((response) => {
                if(response.data > 0){
                    payableAmount.value = order.total_price;
                    orderId.value = order.id;
                    tableIdNumber.value = tableId;
                    f7.popup.open(`.settle-save-popup`);
                    payAndEBillRef.value.defaultFillUpSettleMentData();
                }else{
                    errorNotification('No Item available in this order. Add Item in Order or remove the order.');
                }
                // successNotification(response.data.success);
                // f7.popup.close(`.addUpdatePopup`);
                // getTableListFloorWise();
            })
            .catch((error) => {
                // const errorMessage = getErrorMessage(error);
                // errorNotification(errorMessage);
            });
        }
    }
}

const successPayment = () => {
    getTableListFloorWise();
}

provide('payableAmount', payableAmount);
provide('orderId', orderId);
provide('tableIdNumber', tableIdNumber);
</script>