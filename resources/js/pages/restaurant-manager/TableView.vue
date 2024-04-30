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
                        <div class="table_view-btn table_view-move_btn">
                            <button class="button button-raised height_40">Move KOT / Items</button>
                        </div>
                        <div class="table_view-representer">
                            <div class="display-flex align-items-center">
                                <div class="table_status-represent-ordering"></div>
                                <p class="table_status-represent-type no-margin no-padding">Ordering</p>
                            </div>
                            <div class="display-flex align-items-center">
                                <div class="table_status-represent-empty"></div>
                                <p class="table_status-represent-type no-margin no-padding">Empty</p>
                            </div>
                            <div class="display-flex align-items-center">
                                <div class="table_status-represent-blank"></div>
                                <p class="table_status-represent-type no-margin no-padding">Blank Table</p>
                            </div>
                        </div>
                        <div class="table_view-btn table_view-reserve_btn">
                            <button class="button button-raised height_40">Table Reservation</button>
                        </div>
                        <div class="table_view-btn table_view-add_table_btn">
                            <button class="button button-raised bg-dark text-color-white height_40 active"
                                @click="openAddNewTablePopup"><i
                                    class="f7-icons font-22 margin-right-half">plus_square</i>Add Table</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-content table_view_list">
            <template v-for="(floor,index) in floorList" :key="index">
                <h4 class="table_view_list-floor-heading no-margin no-padding">{{ floor.name }}</h4>
                <div class="grid grid-cols-5 medium-grid-cols-3 grid-gap-25 grid-gap-20 align-items-center floor-divider">
                    <!-- empty_card -->
                    <template v-for="(table,ind) in floor.tables" :key="ind">
                        <div v-if="table.order" class="card-type table_view-ground_floor-card ordering_card">
                            <div class="card-margin-padding">
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
                                    <p class="no-margin no-padding">₹ {{ table?.order?.total_price?.toFixed(2)}}</p>
                                </div>
                                <div class="display-flex align-items-center table_view-table_details">
                                    <div class="table_view-people_count_btn">
                                        <button class="button height_40">
                                            <Icon name="person" />
                                            <span>Person - {{ table.order.person }}</span>
                                        </button>
                                    </div>
                                    <div class="table_view-inspect_btn" v-if="table.holdKotAvailable">

                                        <button class="button height_40">
                                            <Icon name="deleteIcon" @click="removeHoldKot(table.id)"/>
                                            Hold
                                        </button>
                                    </div>
                                    <div class="table_view-inspect_btn">
                                        <button class="button height_40">
                                            <Icon name="eye" @click="openPos(table.id)"/>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else class="card-type table_view-ground_floor-card blank_card"
                            @click="openPos(table.id)"
                        >
                            <div class="card-margin-padding">
                                <div class="table_view-table_number">
                                    <h5 class="no-margin no-padding">Table No. {{ table.table_number }}</h5>
                                </div>
                                <!-- <div class="table_view-inspect_btn" v-if="table.holdKotAvailable">
                                    <button class="button height_40">
                                        <Icon name="deleteIcon" @click="removeHoldKot(table.id)"/>
                                        Hold
                                    </button>
                                </div> -->
                            </div>
                        </div>
                    </template>
                </div>
            </template>
        </div>
        <!-- ========= ADD TABLE-VIEW POPUP ========= -->
        <div class="popup addUpdatePopup">
            <AddUpdatePopup 
                :title="addUpdateTitle"
                :form-data-format="addUpdateFormDataFormat"
                :type="addUpdateType" :data-type="'table-view'"
                @store:update="storeUpdateData"
            />
        </div>
    </f7-page>  
</template>
<script setup>
import { f7Page, f7 } from 'framework7-vue';
import axios from 'axios';
import { ref, onMounted } from 'vue';
import Icon from '../../components/Icon.vue';
import AddUpdatePopup from '../../components/common/AddUpdatePopup.vue'
import { successNotification, errorNotification, getErrorMessage } from '../../commonFunction.js'
const floorList = ref([]);

const addUpdateTitle = ref('Add Table');
const addUpdateType = ref('add');
const addUpdateFormDataFormat = ref([
    { label: 'Table Number', multipleLang: false, type: 'number', name: 'table_number', placeHolder: 'Table Number', value: ''},
    { label: 'Capacity Of Person', multipleLang: false, type: 'number', name: 'capacity_of_person', placeHolder: 'Capacity Of Person', value: ''},
    {
        label: 'Status',
        multipleLang: false,
        type: 'radio',
        name: 'status',
        options: [
            { label: 'Active', value: 1},
            { label: 'Deactive', value: 0}
        ],
        placeHolder: 'Status',
        value: 1
    },
    { label: 'Finish Order Time', multipleLang: false, type: 'number', name: 'finish_order_time', placeHolder: 'Finish Order Time (In Minutes)', value: ''},
    { label: 'Id', multipleLang: false, type: 'hidden', name: 'id', placeHolder: 'Category Id', value: ''},
]);

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

        if (capacityIndex !== -1) {
            addUpdateFormDataFormat.value.splice(capacityIndex + 1, 0, {
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
    f7.view.main.router.navigate({ url: "/pos/"+id });
}

const removeHoldKot = (id) => {
    axios.get('/api/remove-hold-kot/'+id)
    .then((response) => {
        
    });
}

const openAddNewTablePopup = () => {
    f7.popup.open(`.addUpdatePopup`);
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
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
}
</script>