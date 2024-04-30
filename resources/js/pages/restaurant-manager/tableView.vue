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
                                data-popup=".add_table_Popup" @click="handleButtonClick"><i
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
                            <div class="table_hold-inspect_btn">
                                <f7-button popover-open=".popover-menu"><Icon name="hold"/></f7-button> 
                                <f7-popover class="popover-menu">
                                    <f7-list>
                                        <f7-list-item popover-close title="Delete" />
                                    </f7-list>
                                </f7-popover>
                            </div>
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
                        <div v-else class="card-type table_view-ground_floor-card blank_card">
                            <div class="table_hold-inspect_btn">
                                <f7-button popover-open=".popover-menu"><Icon name="hold"/></f7-button> 
                            </div>
                            <div class="card-margin-padding" @click="openPos(table.id)">
                                <div class="table_view-table_number">
                                    <h5 class="no-margin no-padding">Table No. {{ table.table_number }}</h5>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </template>
        </div>
    </f7-page>
</template>
<script setup>
import { f7Page, f7, f7Button, f7Popover, f7Link, f7List, f7ListItem } from 'framework7-vue';
import axios from 'axios';
import { ref, onMounted } from 'vue';
import Icon from '../../components/Icon.vue';

const floorList = ref([]);

onMounted(() => {
    getTableListFloorWise();
});

const getTableListFloorWise = () => {
    axios.post('/api/get-table-list-floor-wise')
    .then((response) => {
        floorList.value = response.data;
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

</script>