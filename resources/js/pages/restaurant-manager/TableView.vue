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
                        <!-- <div class="table_view-btn table_view-reserve_btn">
                            <button class="button button-raised height_40">Table Reservation</button>
                        </div> -->
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
            <template v-for="(floor, index) in floorList" :key="index">
                <h4 class="table_view_list-floor-heading no-margin no-padding">{{ floor.name }}</h4>
                <div
                    class="grid grid-cols-5 medium-grid-cols-3 grid-gap-25 grid-gap-20 align-items-center floor-divider">
                    <!-- empty_card -->
                    <template v-for="(table, ind) in floor.tables" :key="ind">
                        <div v-if="table.order" class="card-type table_view-ground_floor-card ordering_card">
                            <div class="card-margin-padding">
                                <div class="action-btn">
                                    <i class="icon f7-icons">
                                        ellipsis_vertical</i>
                                    <div class="action-dropdown">
                                        <div class="bordershadow">
                                            <div class="edit-btn">
                                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_3080_346)">
                                                        <path
                                                            d="M1.58452 12.5H1.6634L5.46904 11.6486C5.54317 11.6359 5.61186 11.6006 5.66621 11.5473L12.1141 4.91895C12.3472 4.67977 12.5318 4.39531 12.6571 4.08212C12.7823 3.76893 12.8457 3.43327 12.8437 3.09466C12.8445 2.40536 12.5826 1.74317 12.1141 1.25007C11.8814 1.01036 11.6047 0.820611 11.3 0.691858C10.9954 0.563106 10.6688 0.497921 10.3394 0.500098C10.0081 0.497081 9.67975 0.56387 9.37453 0.696347C9.06932 0.828824 8.79374 1.02418 8.5648 1.27036L2.13661 7.89866C2.07991 7.94556 2.0386 8.00925 2.01829 8.08109L1.19015 11.9932C1.179 12.0625 1.1839 12.1334 1.20446 12.2004C1.22502 12.2673 1.26066 12.3283 1.30847 12.3784C1.38129 12.4548 1.4805 12.4985 1.58452 12.5ZM10.3394 1.3109C11.2869 1.31083 12.055 2.10033 12.055 3.07429L12.0549 3.09466C12.0581 3.32427 12.0161 3.55219 11.9314 3.76468C11.8467 3.97716 11.721 4.16984 11.562 4.33112L9.13663 1.81761C9.29484 1.65598 9.48253 1.52803 9.68892 1.44108C9.89532 1.35413 10.1164 1.30989 10.3394 1.3109ZM8.5845 2.40548L11.0098 4.8987L5.39012 10.6554L2.96478 8.18243L8.5845 2.40548ZM2.6493 8.99327L4.60139 11L2.09717 11.5676L2.6493 8.99327ZM14.1056 13.6892H0.894367C0.676557 13.6892 0.5 13.8707 0.5 14.0946C0.5 14.3185 0.676557 14.5 0.894367 14.5H14.1056C14.3234 14.5 14.5 14.3185 14.5 14.0946C14.5 13.8707 14.3234 13.6892 14.1056 13.6892Z"
                                                            fill="#555555" stroke="#555555" stroke-width="0.4" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_3080_346">
                                                            <rect width="15" height="15" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <span>Edit</span>
                                            </div>
                                            <div class="delete-btn">
                                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_3080_323)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.69226 6.58867C5.84197 6.57417 5.99152 6.61774 6.10802 6.7098C6.22453 6.80187 6.29845 6.9349 6.31355 7.07965L6.69193 10.7382C6.70141 10.8108 6.69575 10.8846 6.67529 10.9551C6.65483 11.0256 6.61998 11.0915 6.57279 11.1487C6.5256 11.206 6.46704 11.2536 6.40054 11.2887C6.33404 11.3237 6.26096 11.3456 6.1856 11.3529C6.11024 11.3602 6.03412 11.3529 5.96174 11.3313C5.88935 11.3098 5.82217 11.2744 5.76413 11.2274C5.70609 11.1803 5.65839 11.1225 5.62382 11.0573C5.58925 10.9922 5.56852 10.921 5.56285 10.8479L5.18447 7.18941C5.16947 7.04465 5.21453 6.90005 5.30975 6.7874C5.40497 6.67475 5.54255 6.60327 5.69226 6.58867ZM9.58955 6.58867C9.73911 6.60328 9.87657 6.67465 9.97177 6.78714C10.067 6.89963 10.1121 7.04403 10.0973 7.18867L9.71896 10.8472C9.71352 10.9204 9.69297 10.9917 9.65851 11.0571C9.62406 11.1224 9.57641 11.1804 9.51838 11.2277C9.46035 11.2749 9.39311 11.3104 9.32064 11.3321C9.24817 11.3538 9.17194 11.3612 9.09645 11.3539C9.02097 11.3466 8.94776 11.3248 8.88115 11.2897C8.81455 11.2546 8.7559 11.2069 8.70868 11.1495C8.66145 11.0921 8.62661 11.0261 8.6062 10.9555C8.5858 10.8848 8.58025 10.8109 8.58988 10.7382L8.96826 7.07965C8.98336 6.93504 9.05718 6.80213 9.17352 6.71008C9.28985 6.61804 9.43996 6.57437 9.58955 6.58867Z"
                                                            fill="#F33E3E" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.22108 0H8.77968C8.94389 0 9.08616 -2.72582e-09 9.22087 0.0204878C9.48338 0.0610222 9.73243 0.160425 9.94807 0.310738C10.1637 0.461051 10.34 0.658096 10.4627 0.886098C10.5255 1.00317 10.5709 1.13415 10.6224 1.28415L10.7071 1.52927L10.7291 1.59146C10.7976 1.77523 10.9251 1.93298 11.093 2.04161C11.2609 2.15023 11.4604 2.20403 11.6622 2.19512H13.9324C14.083 2.19512 14.2273 2.25294 14.3338 2.35586C14.4402 2.45877 14.5 2.59836 14.5 2.7439C14.5 2.88945 14.4402 3.02903 14.3338 3.13195C14.2273 3.23487 14.083 3.29268 13.9324 3.29268H1.06757C0.917039 3.29268 0.772676 3.23487 0.666237 3.13195C0.559797 3.02903 0.5 2.88945 0.5 2.7439C0.5 2.59836 0.559797 2.45877 0.666237 2.35586C0.772676 2.25294 0.917039 2.19512 1.06757 2.19512H3.40595C3.60808 2.19043 3.80334 2.12325 3.96309 2.00342C4.12284 1.88358 4.23868 1.71741 4.29362 1.52927L4.37838 1.28415C4.42984 1.13415 4.47524 1.00317 4.53805 0.886098C4.66072 0.658186 4.83685 0.461196 5.05236 0.310889C5.26786 0.160582 5.51676 0.0611291 5.77914 0.0204878C5.91459 -2.72582e-09 6.05686 0 6.22108 0ZM5.23654 2.19512C5.28968 2.0945 5.33398 1.98974 5.36897 1.88195L5.44465 1.66244C5.51276 1.46268 5.52941 1.42244 5.54454 1.39317C5.58539 1.31708 5.64412 1.2513 5.716 1.20111C5.78789 1.15092 5.87093 1.11771 5.95849 1.10415C5.99254 1.09902 6.03719 1.09756 6.25589 1.09756H8.74562C8.96357 1.09756 9.00822 1.09902 9.04227 1.10488C9.12975 1.11836 9.21275 1.15146 9.28463 1.20152C9.35651 1.25158 9.41527 1.31722 9.45622 1.39317C9.47135 1.42244 9.48724 1.46268 9.55686 1.66317L9.63254 1.88268L9.6613 1.96537C9.69157 2.04439 9.72562 2.12122 9.76497 2.19512H5.23654ZM2.432 4.75756C2.58211 4.74792 2.73004 4.7963 2.84328 4.89207C2.95651 4.98784 3.02579 5.12316 3.03589 5.26829L3.384 10.3171C3.45211 11.3027 3.50054 11.989 3.60649 12.5049C3.71016 13.0061 3.85395 13.271 4.06054 13.4583C4.26789 13.6456 4.55092 13.7671 5.07459 13.8329C5.61416 13.901 6.32627 13.9024 7.34789 13.9024H7.93362C8.95524 13.9024 9.66659 13.901 10.2069 13.8329C10.7306 13.7671 11.0136 13.6456 11.221 13.4583C11.4276 13.271 11.5714 13.0061 11.675 12.5049C11.781 11.989 11.8294 11.3027 11.8975 10.3171L12.2456 5.26829C12.2506 5.19637 12.2702 5.1261 12.3032 5.06149C12.3363 4.99688 12.3822 4.9392 12.4383 4.89174C12.4944 4.84428 12.5596 4.80797 12.6302 4.78488C12.7009 4.7618 12.7755 4.75239 12.8499 4.7572C12.9243 4.762 12.997 4.78092 13.0638 4.81289C13.1306 4.84485 13.1903 4.88922 13.2393 4.94348C13.2884 4.99773 13.326 5.0608 13.3499 5.12909C13.3737 5.19738 13.3835 5.26954 13.3785 5.34146L13.0274 10.4283C12.963 11.3663 12.9108 12.1244 12.7882 12.72C12.6603 13.3383 12.4439 13.8549 11.9959 14.2595C11.5486 14.6649 11.0008 14.8398 10.3537 14.921C9.73168 15 8.94616 15 7.97297 15H7.30854C6.33535 15 5.54984 15 4.92778 14.9217C4.28076 14.8398 3.73287 14.6649 3.28562 14.2595C2.83762 13.8549 2.62119 13.3376 2.4933 12.72C2.3707 12.1244 2.31924 11.3663 2.25416 10.4283L1.90303 5.34146C1.89809 5.26954 1.90786 5.19738 1.93178 5.1291C1.9557 5.06083 1.99329 4.99778 2.04241 4.94356C2.09153 4.88933 2.15122 4.845 2.21807 4.81309C2.28492 4.78117 2.35761 4.7623 2.432 4.75756Z"
                                                            fill="#F33E3E" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_3080_323">
                                                            <rect width="15" height="15" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <span>Delete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hold-btn">
                                    <i class="icon f7-icons">hand_raised</i>
                                    <div class="delete-hold"><button>
                                            <Icon name="deleteIcon" @click="removeHoldKot(table.id)" />
                                        </button></div>
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
                                    <p class="no-margin no-padding">₹ {{ table?.order?.total_price?.toFixed(2) }}</p>
                                </div>
                                <div class="display-flex align-items-center table_view-table_details">
                                    <div class="table_view-people_count_btn">
                                        <button class="button height_40">
                                            <Icon name="person" />
                                            <span>Person - {{ table.order.person }}</span>
                                        </button>
                                    </div>
                                    <div class="table_view-inspect_btn">
                                        <button class="button height_40">
                                            <Icon name="eye" @click="openPos(table.id)" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else class="card-type table_view-ground_floor-card blank_card"
                            @click="openPos(table.id)">
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
            <AddUpdatePopup :title="addUpdateTitle" :form-data-format="addUpdateFormDataFormat" :type="addUpdateType"
                :data-type="'table-view'" @store:update="storeUpdateData" />
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
    f7.view.main.router.navigate({ url: "/pos/" + id });
}

const removeHoldKot = (id) => {
    axios.get('/api/remove-hold-kot/' + id)
        .then((response) => {
            getTableListFloorWise();
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