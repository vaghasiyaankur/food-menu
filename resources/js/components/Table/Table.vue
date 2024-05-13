<template>
<div class="tables margin-horizontal" v-if="rowTables.length != 0">
    <div class="table_row margin-horizontal padding-top margin-top" v-for="row in rowTables" :key="row" >
        <!-- <div class="no-padding margin-bottom table-card" :class="[('col-'+table.col)]" v-for="table in row" :key="table.id"> -->
        <div class="no-padding margin-bottom table-card mr-72 -100" v-for="table in row" :key="table.id" >
            <!-- :style="'min-width: '+table.width+'px'" -->
            <!--======= TABLE CHAIR ========= -->
            <TableChair :chair="table.up_table" :color="table.color.color" />
            <div class="card no-margin table_1 equal-height-table drop-target" :data-id="table.id" :data-name="table.floor.name" :data-tnumber="table.table_number" :style="'border-left : 10px solid rgb(' +table.color.rgb +'); min-width : ' +table.width +'px'">
                <div class="card-header no-padding">
                    <div class="row header_detail">
                        <div class="table-number padding-half">
                            <p class="no-margin table__text">Table No.</p>
                            <p class="text-align-center no-margin count__text">{{ table.table_number }} </p>
                        </div>
                        <div class="table-capacity text-align-right padding-half">
                            <p class="no-margin table__text">Capacity</p>
                            <p class="text-align-center no-margin count__text">{{ table.capacity_of_person }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-content padding-top padding-horizontal-half table1__details" >
                    <!-- :style="'max-width : '+(table.width - 20 )+'px'" -->
                    <div class="table_reservation margin-bottom">
                        <div class="display-flex h-100">
                            <div class="table_reservation_info" :class="'test' + order.id" v-for="order in table.orders" :key="order.id" >
                                <div :class="{ongoing_blinking: order.is_time_left,}">
                                    <!-- :data-popover="'.popover-table-'+order.id" -->
                                    <!-- popover-open -->
                                    <!-- :data-popover="'.popover-table-'+order.id" -->
                                    <div class="person-info popover-open" :class="[ 'popover-click-' + order.id, { 'person-info_move': order.is_order_moved, 'ongoing_popover ': order.is_ongoing_order && !order.is_order_moved, neworder_add: order.is_new_order_timing, }, ]" @click=" getRemainingTime(order.id); orderPerson = order.person; orderId = order.id; " :data-popover="'.popover-table-' + order.id" >
                                        <div class="neworder_tooltip order_tooltip" v-if="order.is_new_order_timing" >
                                            <div class="tooltip_text">
                                                <p class="no-margin">New Reservation</p>
                                                <p class="no-margin"> {{ order.new_order_timing_text }} </p>
                                            </div>
                                        </div>
                                        <div class="order_tooltip finish_order_tooltip" v-if="order.is_time_left">
                                            <div class="tooltip_text">
                                                <p class="no-margin">{{ order.time_left }}</p>
                                            </div>
                                        </div>

                                        <div class="person_info_name border__bottom padding-bottom-half margin-bottom-half" >
                                            <p class="no-margin text-align-center">By {{ order.role }}</p>
                                        </div>
                                        <div class="text-align-center person">
                                            <i class="f7-icons size-22">person</i>
                                            <span> &nbsp; {{ order.person }} </span>
                                            <span class="waiting-time margin-top-half text-align-center">
                                                <!-- <i class="f7-icons size-22">clock_fill</i> -->
                                                <span>{{ order.reservation_time }}</span>
                                            </span>
                                        </div>
                                        <div class="popover popover-menu padding-half" v-if="!order.is_order_moved" :class="'popover-table-' + order.id" >
                                            <div class="user-info popover-inner">
                                                <div class="display-flex padding-left-half padding-top-half align-items-center" >
                                                    <i class="f7-icons size-18 text-color-black padding-right-half margin-right-half" >person</i>
                                                    <span class="text-color-black">{{ order.name ? order.name : "Anonymous" }}</span>
                                                </div>
                                                <div class="display-flex padding-left-half padding-top align-items-center" >
                                                    <i class="f7-icons size-18 text-color-black padding-right-half margin-right-half" >clock</i>
                                                    <span class="text-color-black">{{ order.reservation_time_12_format }}</span>
                                                </div>
                                                <div class="display-flex padding-left-half padding-top align-items-center" >
                                                    <i class="f7-icons size-18 text-color-black padding-right-half margin-right-half" >timer</i>
                                                    <span class="text-color-black" v-if="popupRemainingTime == 0" >Ongoing</span>
                                                    <vue-countdown v-else-if="popupRemainingTimeOver" :time="popupRemainingTime" v-slot="{ hours, minutes, seconds }" >
                                                        <p class="no-margin font-30" v-if="String(hours).padStart(2, '0') != 0" >
                                                            Time Over
                                                            <span class="time-over">{{ String(hours).padStart(2, "0") + " hour" }}</span>
                                                        </p>
                                                        <p class="no-margin font-30" v-else-if="String(minutes).padStart(2, '0') != 0" >
                                                            Time Over
                                                            <span class="time-over">{{ String(minutes).padStart(2, "0") + " mins" }}</span>
                                                        </p>
                                                        <p class="no-margin font-30" v-else>
                                                            Time Over
                                                            <span class="time-over">{{ String(seconds).padStart(2, "0") + " second" }}</span>
                                                        </p>
                                                    </vue-countdown>
                                                    <vue-countdown v-else :time="popupRemainingTime" v-slot="{ hours, minutes, seconds }" >
                                                        <p class="no-margin font-30" v-if="String(hours).padStart(2, '0') != 0" >
                                                            {{ String(hours).padStart(2, "0") + " hr & " + String(minutes).padStart(2, "0") + " M" }}
                                                        </p>
                                                        <p class="no-margin font-30" v-else-if="String(minutes).padStart(2, '0') != 0" >
                                                            {{ String(minutes).padStart(2, "0") + " mins" }}
                                                        </p>
                                                        <p class="no-margin font-30" v-else>
                                                            {{ String(seconds).padStart(2, "0") + " secs" }}
                                                        </p>
                                                    </vue-countdown>
                                                </div>
                                                <div class="display-flex padding-left-half padding-top align-items-center" >
                                                    <i class="f7-icons size-18 text-color-black padding-right-half margin-right-half" >phone</i>
                                                    <span class="text-color-black">{{ order.phone ? order.phone : "--" }}</span>
                                                </div>
                                                <div class="display-flex padding-left-half padding-vertical align-items-center" >
                                                    <i class="f7-icons size-18 text-color-black padding-right-half margin-right-half" >person_2</i>
                                                    <span class="text-color-black">{{ order.person }} family member</span>
                                                </div>
                                                <div class="add_minutes" v-if="popupRemainingTime == 0">
                                                    <div class="card-footer no-margin no-padding justify-content-center" >
                                                        <h3>
                                                            <a class="text-color-red popup-open" data-popup=".addMinutesPopup" @click="emit('addMinutesToClosePopOver')" >
                                                            Add Minutes
                                                            </a>
                                                        </h3>
                                                    </div>
                                                </div>

                                                <div class="finish_popup" v-if="order.start_at && order.finished == 0" >
                                                    <div class="card-footer no-margin no-padding justify-content-center" >
                                                        <h3>
                                                            <a href="javascript:;" class="text-color-red" @click="emit('update:cancel-next',order.id)" > Cancle & Next </a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="finish_popup" v-if="order.start_at && order.finished == 0" >
                                                    <div class="card-footer no-margin no-padding justify-content-center">
                                                        <h3>
                                                            <a href="javascript:;" class="text-color-red" @click="emit('update:finish-next',order.id)" > Finish & Next </a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="floor__list" :class=" order.start_at && order.finished == 0 ? 'display-none' : '' ">
                                                    <div class="card-footer no-margin no-padding justify-content-center hassubs" @click="openFloorList(order.id)" >
                                                        <h3 class="text-color-red">Change Floor</h3>
                                                    </div>
                                                    <!-- ============FLOOR DROP DOWN  ============= -->
                                                    <div class="list simple-list floor-drop-down" :class="'f_f' + order.id" >
                                                        <ul>
                                                            <li v-for="floor in availableFloorList" :key="floor.id" @click="emit('change:floor',order.id, floor.id, floor.name)" :class=" table.floor.id == floor.id ? 'display-none' : '' " >
                                                                <div class="floor_number display-flex align-items-center justify_content_between w-100" >
                                                                    <div class="floor_name">
                                                                        <span>{{ floor.name }} </span>
                                                                    </div>
                                                                    <div class="floor_room_available">
                                                                        <span class="room_available">{{ floor.orders_count }}</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="no-available-list" v-if="availableFloorList.length == 0" >
                                                                <div class="floor_number display-flex align-items-center justify_content_between w-100 no-cap" >
                                                                    <div class="floor_name">
                                                                        <span>Not above capacity floor</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- ============FLOOR DROP DOWN END ============= -->
                                                </div>
                                                <div class="table__list" :class="order.start_at && order.finished == 0 ? 'display-none' : '' ">
                                                    <div class="card-footer no-margin no-padding justify-content-center hassubs" @click="openTableList(order)" >
                                                        <h3 class="text-color-red">Change Table</h3>
                                                    </div>
                                                    <!-- ============FLOOR DROP DOWN  ============= -->
                                                    <div class="list simple-list table-drop-down" :class="'t_f' + order.id" >
                                                        <ul>
                                                            <li v-for="changeTable in changeTableList" :key="changeTable.id" :class="changeTable.id == table.id || changeTable.capacity_of_person < orderPerson ? 'display-none' : '' " @click="emit('change:table',order.id, changeTable.id, table.floor.name ) " >
                                                                <div class="floor_number display-flex align-items-center justify_content_between w-100" >
                                                                    <div class="floor_name">
                                                                        <span>Table No : {{ changeTable.table_number }}</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="no-available-list" v-if="noTableListShow && maxNumberTableId == table.id " >
                                                                <div class="floor_number display-flex align-items-center justify_content_between w-100 no-cap" >
                                                                    <div class="floor_name">
                                                                        <span>Not above capacity table</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- ============FLOOR DROP DOWN END ============= -->
                                                </div>
                                            </div>
                                        </div>
                                        <div v-else class="popover popover-move padding" :class="'popover-table-' + order.id">
                                            <div class="user-info popover-inner text-align-center">
                                                <p class="text-color-white no-margin">Moved</p>
                                                <p class="text-color-white no-margin">{{ order.order_moved_text }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--======= TABLE CHAIR ========= -->
            <TableChair :chair="table.down_table" :color="table.color.color" :style="'transform: rotate(180deg);'" />
        </div>
    <!-- <div class="extra-div"></div> -->
    </div>
    </div>
    <div v-else>
    <div class="no_order">
        <NoValueFound title="Empty Table List" />
    </div>
    </div>
</template>

<script setup>
import { f7, f7Page } from "framework7-vue";
import VueCountdown from "@chenfengyuan/vue-countdown";
import TableChair from "./TableChair.vue";
import { ref, reactive,inject } from "vue";
import axios from "axios";
import NoValueFound from "../NoValueFound.vue"
import $ from "jquery"

const popupRemainingTime = ref(0);
const popupRemainingTimeOver = ref(false);
const orderPerson = ref(0);
const availableFloorList = ref([]);

const props = defineProps({
    rowTables : Array,
    changeTableList : Array,
    maxNumberTableData : Object,
});

const emit = defineEmits(['change:table', 'change:floor', 'update:finish-next','update:cancel-next','addMinutesToClosePopOver']);

const noTableListShow = inject('noTableListShow');
const orderId = inject('orderId');

const getRemainingTime = (id) => {
    axios.post("/api/get-remaining-time", { id: id }).then((res) => {
        orderId.value = id;
        popupRemainingTime.value = res.data.time;
        popupRemainingTimeOver.value = res.data.time_over;
    });
};



const openFloorList = (id) => {
    axios.post("/api/change-floor-list", { order_id: id }).then((res) => {
        availableFloorList.value = res.data.floorList;
    });

    $(".table-drop-down").removeClass("floor_dropdown_visible");
    $(".table__list").removeClass("add_left_before");
    $(".table__list").removeClass("add_right_before");
    $(".floor-drop-down").toggleClass("floor_dropdown_visible");
    const ele = document.querySelector(".popover-click-" + id);
    const bounding = ele.getBoundingClientRect();
    const width = screen.width;
    if (width > bounding.left + bounding.width + 285) {
        $(".f_f" + id).css("left", "189px");
        $(".floor__list").removeClass("add_left_before");
        $(".floor__list").toggleClass("add_right_before");
    } else {
        $(".f_f" + id).css("left", "-260px");
        $(".floor__list").removeClass("add_right_before");
        $(".floor__list").toggleClass("add_left_before");
    }
    const height = parseInt($(".f_f" + id).height()) / 2 + 22;
    $(".f_f" + id).css("transform", "translateY(-" + height + "px");
};

const openTableList = (order) => {
    $(".floor-drop-down").removeClass("floor_dropdown_visible");
    $(".floor__list").removeClass("add_left_before");
    $(".floor__list").removeClass("add_right_before");
    $(".table-drop-down").toggleClass("floor_dropdown_visible");
    const ele = document.querySelector(".popover-click-" + order.id);
    const bounding = ele.getBoundingClientRect();
    const width = screen.width;
    if (width > bounding.left + bounding.width + 285) {
        $(".t_f" + order.id).css("left", "190px");
        $(".table__list").removeClass("add_left_before");
        $(".table__list").toggleClass("add_right_before");
    } else {
        $(".t_f" + order.id).css("left", "-249px");
        $(".table__list").removeClass("add_right_before");
        $(".table__list").toggleClass("add_left_before");
    }
    $(".table-drop-down").css("min-width", "240px");

    if (order.person < parseInt(props.maxNumberTableData.capacity_of_person)) {
        noTableListShow.value = false;
    }
    let person = order.person;
    if (parseInt(person) % 2 != 0 && order.table_id == props.maxNumberTableData.id) {
        person = parseInt(person) + 1;
    }
    if (
        order.table_id == props.maxNumberTableData.id &&
        person == parseInt(props.maxNumberTableData.capacity_of_person)
    ) {
        noTableListShow.value = true;
    }

    const height = parseInt($(".t_f" + order.id).height()) / 2 + 22;
    $(".t_f" + order.id).css("transform", "translateY(-" + height + "px");
};
</script>