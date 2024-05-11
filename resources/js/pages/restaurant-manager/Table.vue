<template>
    <f7-page color="bg-color-white">
        <div class="table_main">
            <!-- ============= TABLE FLOOR SWIPER ============= -->
            <Slider :floorList="floorList" :activeFloorId="activeFloorId" @get:floor-value="tableListFloorWise" />
            <div class="tables margin-horizontal" v-if="rowTables.length != 0">
                <div class="table_row margin-horizontal padding-top margin-top" v-for="row in rowTables" :key="row" >
                    <!-- <div class="no-padding margin-bottom table-card" :class="[('col-'+table.col)]" v-for="table in row" :key="table.id"> -->
                    <div class="no-padding margin-bottom table-card mr-72 -100" v-for="table in row" :key="table.id" >
                        <!-- :style="'min-width: '+table.width+'px'" -->
                        <!--======= TABLE CHAIR ========= -->
                        <div class="row table_top_chair">
                            <div class="col" v-for="index in table.up_table" :key="index">
                                <div class="table_card_img text-align-center">
                                    <img :src="'/images/table/' + table.color.color + '.png'" alt="table" />
                                </div>
                            </div>
                        </div>
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
                                                                        <a class="text-color-red popup-open" data-popup=".addMinutesPopup" @click="addMinutesToClosePopOver()" >
                                                                        Add Minutes
                                                                        </a>
                                                                    </h3>
                                                                </div>
                                                            </div>

                                                            <div class="finish_popup" v-if="order.start_at && order.finished == 0" >
                                                                <div class="card-footer no-margin no-padding justify-content-center" >
                                                                    <h3>
                                                                        <a href="javascript:;" class="text-color-red" @click="cancelNext(order.id)" > Cancle & Next </a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="finish_popup" v-if="order.start_at && order.finished == 0" >
                                                                <div class="card-footer no-margin no-padding justify-content-center">
                                                                    <h3>
                                                                        <a href="javascript:;" class="text-color-red" @click="finishNext(order.id)" > Finish & Next </a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="floor__list" :class=" order.start_time && order.finished == 0 ? 'display-none' : '' ">
                                                                <div class="card-footer no-margin no-padding justify-content-center hassubs" @click="openFloorList(order.id)" >
                                                                    <h3 class="text-color-red">Change Floor</h3>
                                                                </div>
                                                                <!-- ============FLOOR DROP DOWN  ============= -->
                                                                <div class="list simple-list floor-drop-down" :class="'f_f' + order.id" >
                                                                    <ul>
                                                                        <li v-for="floor in availableFloorList" :key="floor.id" @click="changeFloor(order.id, floor.id, floor.name)" :class=" table.floor.id == floor.id ? 'display-none' : '' " >
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
                                                                        <li v-for="changetable in changeTableList" :key="changetable.id" :class="changetable.id == table.id || changetable.capacity_of_person < orderPerson ? 'display-none' : '' " @click="changeTable( order.id, changetable.id, table.floor.name ) " >
                                                                            <div class="floor_number display-flex align-items-center justify_content_between w-100" >
                                                                                <div class="floor_name">
                                                                                    <span>Table No : {{ changetable.table_number }}</span>
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
                        <div class="row table_bottom_chair">
                            <div class="col" v-for="index in table.down_table" :key="index">
                                <div class="table_card_img text-align-center">
                                    <img :src="'/images/table/' + table.color.color + '.png'" alt="table" style="transform: rotate(180deg)" />
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- <div class="extra-div"></div> -->
                </div>
            </div>
            <div v-else>
                <div class="no_order">
                    <NoValueFound title="Empty Table List" />
                </div>
            </div>
        </div>
        <!-- ======== ADD MINUTES POPUP ======= -->
        <div id="addMinutesPopup" class="popup addMinutesPopup" style="position: fixed; display: block; border-radius: 15px" >
            <div class="text-align-center padding popup_title">Change Time</div>
            <div class="padding-horizontal">
                <div class="addminutes-form padding-horizontal padding-top">
                    <label class="add_minutes_text">Add Minutes</label>
                    <div class="minutes_input display-flex align-items-center margin-top">
                        <input type="number" v-model="minutes" class="w-100 add-minutes-input padding-horizontal-half" name="" id="" @keypress="checkNumberValidate" />
                        <div class="minutes_text">Min</div>
                    </div>
                    <div class="margin-top no-margin-bottom display-flex justify-content-center padding-top popup_button" >
                        <button type="button" class="button button-raised text-color-black bg-color-white button-large popup-close margin-right popup-button" > Cancel </button>
                        <button type="button" class="button button-raised button-large popup-button" style="background-color: rgb(243, 62, 62); color: rgb(255, 255, 255)" @click="addMinutes()" > Add Minutes </button>
                    </div>
                </div>
            </div>
            <div class="wave-image-content">
                <img src="/images/flow.png" style="width: 100%" />
            </div>
        </div>
    </f7-page>
</template>

<script setup>
import { f7, f7Page, f7Navbar, f7BlockTitle, f7Block } from "framework7-vue";
import $ from "jquery";
// import { useRouter } from "vue-router";
import axios from "axios";
import VueCountdown from "@chenfengyuan/vue-countdown";
import NoValueFound from "../../components/NoValueFound.vue";
import Slider from "../../components/Table/Slider.vue";
import Pusher from "pusher-js";
import moment from "moment";
import { ref, computed, onMounted, onUpdated, onDeactivated, inject } from "vue";

const rowTables = ref([]);
const dragOrderId = ref("");
const dragOrderTableId = ref("");
const floorList = ref([]);
const activeFloorId = ref(0);
const changeTableList = ref([]);
const currentCapacity = ref(0);
const maxNumberTableId = ref(0);
const noTableListShow = ref(true);
const orderPerson = ref(0);
const maxNumberTableCap = ref(0);
const maxNumberTableData = ref([]);
const checkCallInterval = ref(1);
const popupRemainingTime = ref(0);
const popupRemainingTimeOver = ref(false);
const highlight_time = ref(0);
const highlightTimeOnOff = ref(0);
const availableFloorList = ref([]);
const timeoutId = ref(null);
const userId = ref(0);
const minutes = ref("");
const orderId = ref(0);
const intervalNewOrder = ref([]);
const intervalTransferOrder = ref([]);
const user = inject("user");

const dragOptions = computed(() => ({
    group: {
        name: "table",
    },
    scrollSensitivity: 200,
    forceFallback: true,
}));

// const router = useRouter();

onMounted(() => {
    tableList();
    equal_height();
    userId.value = user.value.id;
    Pusher.logToConsole = true;

    const pusher_key = import.meta.env.VITE_PUSHER_APP_KEY;

    const pusher = new Pusher(pusher_key, {
        cluster: "ap2",
    });

    const channel = pusher.subscribe("reservation-" + userId.value);
    channel.bind("NewReservation", function (data) {
        tableListFloorWise(activeFloorId.value);
    });

    Echo.channel("reservation-" + userId.value).listen("NewReservation", (e) => {
        tableListFloorWise(activeFloorId.value);
    });
});

onUpdated(() => {
    equal_height();
});

onDeactivated(() => {
    userId.value = user.value.id;
    window.Echo.leave("reservation-" + userId.value);
});

const addMinutesToClosePopOver = () => {
    minutes.value = "";
    f7.popover.close();
};

const equal_height = () => {
    let highestBox = 0;
    const targetDiv = document.querySelectorAll(".equal-height-table");
    targetDiv.forEach((node) => {
        if (node.clientHeight > highestBox) {
        highestBox = node.clientHeight;
        }
    });
    targetDiv.forEach((node) => {
        node.style.height = highestBox + "px";
    });
};

const openFloorList = (id) => {
    axios.post("/api/change-floor-list", { order_id: id }).then((res) => {
        availableFloorList.value = res.data.floorList;
    });

    // $(".table-drop-down").removeClass("floor_dropdown_visible");
    // $(".table__list").removeClass("add_left_before");
    // $(".table__list").removeClass("add_right_before");
    // $(".floor-drop-down").toggleClass("floor_dropdown_visible");
    const ele = document.querySelector(".popover-click-" + id);
    const bounding = ele.getBoundingClientRect();
    const width = screen.width;
    // if (width > bounding.left + bounding.width + 285) {
    //     $(".f_f" + id).css("left", "189px");
    //     $(".floor__list").removeClass("add_left_before");
    //     $(".floor__list").toggleClass("add_right_before");
    // } else {
    //     $(".f_f" + id).css("left", "-260px");
    //     $(".floor__list").removeClass("add_right_before");
    //     $(".floor__list").toggleClass("add_left_before");
    // }
    const height = parseInt($(".f_f" + id).height()) / 2 + 22;
    $(".f_f" + id).css("transform", "translateY(-" + height + "px");
};

const openTableList = (order) => {
    // $(".floor-drop-down").removeClass("floor_dropdown_visible");
    // $(".floor__list").removeClass("add_left_before");
    // $(".floor__list").removeClass("add_right_before");
    // $(".table-drop-down").toggleClass("floor_dropdown_visible");
    const ele = document.querySelector(".popover-click-" + order.id);
    const bounding = ele.getBoundingClientRect();
    const width = screen.width;
    // if (width > bounding.left + bounding.width + 285) {
    //     $(".t_f" + order.id).css("left", "190px");
    //     $(".table__list").removeClass("add_left_before");
    //     $(".table__list").toggleClass("add_right_before");
    // } else {
    //     $(".t_f" + order.id).css("left", "-249px");
    //     $(".table__list").removeClass("add_right_before");
    //     $(".table__list").toggleClass("add_left_before");
    // }
    // $(".table-drop-down").css("min-width", "240px");

    if (order.person < parseInt(maxNumberTableData.value.capacity_of_person)) {
        noTableListShow.value = false;
    }
    let person = order.person;
    if (parseInt(person) % 2 != 0 && order.table_id == maxNumberTableData.value.id) {
        person = parseInt(person) + 1;
    }
    if (
        order.table_id == maxNumberTableData.value.id &&
        person == parseInt(maxNumberTableData.value.capacity_of_person)
    ) {
        noTableListShow.value = true;
    }

    const height = parseInt($(".t_f" + order.id).height()) / 2 + 22;
    $(".t_f" + order.id).css("transform", "translateY(-" + height + "px");
};

const timingCountOrder = (
    finish_time,
    order_finish_time,
    orderIndex,
    tableIndex,
    rowIndex
) => {
    const timing = moment(finish_time) - moment();
    let duration = moment.duration(timing, "milliseconds");
    const interval = 60000;

    const updateOrderTimeLeft = () => {
        duration = moment.duration(duration - interval, "milliseconds");

        if (duration.minutes() === 3) {
        tableListFloorWise(activeFloorId.value);
        }

        if (duration.minutes() <= 0) {
        rowTables.value[rowIndex][tableIndex].orders[orderIndex].time_left = "Time over";
        } else if (duration.minutes() <= 3) {
        rowTables.value[rowIndex][tableIndex].orders[
            orderIndex
        ].time_left = `${duration.minutes()} Min Left`;
        } else {
        rowTables.value[rowIndex][tableIndex].orders[orderIndex].time_left = "Time over";
        }
    };

    const intervalId = setInterval(updateOrderTimeLeft, interval);
    intervalNewOrder.value.push(intervalId);

    updateOrderTimeLeft();
};

const secondIncrement = (second, orderIndex, tableIndex, rowIndex) => {
    const intervalId = setInterval(() => {
        if (second < 60 * parseFloat(highlight_time.value)) {
        second++;
        const order = rowTables.value[rowIndex]?.[tableIndex]?.orders?.[orderIndex];
        if (order) {
            order.order_moved = second;

            if (second > 60) {
            const minutes = parseInt(Math.floor(second / 60), 10);
            const extraSeconds = second % 60;
            order.order_moved_text = `${minutes < 10 ? "0" + minutes : minutes} minute ${
                extraSeconds < 10 ? "0" + extraSeconds : extraSeconds
            } second ago`;
            } else {
            order.order_moved_text = second + " seconds ago";
            }
        }
        } else {
        tableListFloorWise(activeFloorId.value);
        f7.popover.close(".popover-move");
        clearInterval(intervalId);
        }
    }, 1000);

    intervalTransferOrder.push(intervalId);
};

const newOrderSecondIncrement = (second, orderIndex, tableIndex, rowIndex) => {
    const interval = setInterval(() => {
        if (second < 60 * parseFloat(highlight_time.value)) {
        second++;
        if (
            rowTables.value[rowIndex] !== undefined &&
            rowTables.value[rowIndex][tableIndex] !== undefined &&
            rowTables.value[rowIndex][tableIndex].orders[orderIndex] !== undefined
        ) {
            rowTables.value[rowIndex][tableIndex].orders[
            orderIndex
            ].new_order_timing = second;
            if (second > 60) {
            var minutes = parseInt(Math.floor(second / 60), 10);
            var extraSeconds = second % 60;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            extraSeconds = extraSeconds < 10 ? "0" + extraSeconds : extraSeconds;
            rowTables.value[rowIndex][tableIndex].orders[orderIndex].new_order_timing_text =
                minutes + " minute " + extraSeconds + " second ago";
            } else {
            rowTables.value[rowIndex][tableIndex].orders[orderIndex].new_order_timing_text =
                second + " seconds ago";
            }
        }
        } else {
        tableListFloorWise(activeFloorId.value);
        clearInterval(interval);
        }
    }, 1000);
    intervalNewOrder.value.push(interval);
};

const tableList = () => {
    axios.get("/api/table-list-with-order").then((res) => {
        highlightTimeOnOff.value = res.data.highlight_time_on_off;
        highlight_time.value = res.data.highlight_time;
        currentCapacity.value = res.dataC;
        floorList.value = res.data.floorList;
        activeFloorId.value = res.data.floorList[0] ? res.data.floorList[0].id : 0;
        let row_tables_arr = [];
        let cal_of_capacity = 0;
        let single_row_data = [];
        let change_table_list_array = [];
        let max_number_table_id_val = 0;
        res.data.tables.forEach((table, index) => {
        // calculation of row wise table list
        if (parseInt(cal_of_capacity) > 6) {
            row_tables_arr.push(single_row_data);
            single_row_data = [];
            cal_of_capacity = 0;
        }

        let cap, up_table, down_table;
        if (parseInt(table.capacity_of_person) % 2 !== 0) {
            cap = parseInt(table.capacity_of_person) - 1;
            up_table = (parseInt(table.capacity_of_person) + 1) / 2;
            down_table = (parseInt(table.capacity_of_person) - 1) / 2;
        } else {
            cap = parseInt(table.capacity_of_person) - 2;
            up_table = parseInt(table.capacity_of_person) / 2;
            down_table = parseInt(table.capacity_of_person) / 2;
        }

        const col = (cap / 2) * 5 + 20;

        table.col = col > 100 ? 100 : col;
        table.up_table = up_table;
        table.down_table = down_table;
        table.width = 182 + (up_table - 1) * 80;

        single_row_data.push(table);

        if (index === res.data.tables.length - 1) {
            row_tables_arr.push(single_row_data);
            single_row_data = [];
            cal_of_capacity = 0;
        }
        cal_of_capacity += Object.keys(table.orders).length;

        // set change table list upon capacity
        const obj = {
            id: table.id,
            capacity_of_person: parseInt(table.capacity_of_person),
            table_number: table.table_number,
        };
        change_table_list_array.push(obj);

        // Max Number Capacity Table Id
        if (parseInt(res.data.max_table_cap) === parseInt(table.capacity_of_person)) {
            maxNumberTableId.value = parseInt(table.id);
            maxNumberTableCap.value = parseInt(table.capacity_of_person);
            maxNumberTableData.value = table;
        }
        });

        // Setting values after processing
        maxNumberTableId.value = max_number_table_id_val;
        rowTables.value = row_tables_arr;

        rowTables.value.forEach((tables, row_index) => {
        tables.forEach((table, t_index) => {
            table.orders.forEach((order, o_index) => {
            if (o_index === 0) {
                timingCountOrder(
                order.time_left,
                order.finish_time,
                o_index,
                t_index,
                row_index
                );
            }
            if (order.is_order_moved && highlightTimeOnOff.value === 1) {
                secondIncrement(order.order_moved, o_index, t_index, row_index);
            }
            if (order.is_new_order_timing && highlightTimeOnOff.value === 1) {
                newOrderSecondIncrement(order.new_order_timing, o_index, t_index, row_index);
            }
            });
        });
        });

        changeTableList.value = change_table_list_array;
        noTableListShow.value = true;

        change_table_list_array.forEach((table, index) => {
        if (
            maxNumberTableCap.value === table.capacity_of_person &&
            table.id !== maxNumberTableId.value
        ) {
            noTableListShow.value = false;
        }
        });
    });
};

const tableListFloorWise = (id) => {
    clearTimeout(timeoutId.value);
    // Clear intervals
    intervalNewOrder.value.forEach(clearInterval);
    intervalTransferOrder.value.forEach(clearInterval);

    if (id !== undefined) activeFloorId.value = id;

    axios
    .get("/api/table-list-floor-wise/" + activeFloorId.value)
    .then((res) => {
        currentCapacity.value = res.dataC;
        floorList.value = res.data.floorList;
        const rowTablesData = [];
        let cal_of_capacity = 0;
        let single_row_data = [];
        const change_table_list_array = [];
        let max_number_table_id_val = 0;

        res.data.tables.forEach((table, index) => {
            if (parseInt(cal_of_capacity) > 6) {
            rowTablesData.push(single_row_data);
            single_row_data = [];
            cal_of_capacity = 0;
            }

            const cap =
            parseInt(table.capacity_of_person) % 2 !== 0
                ? parseInt(table.capacity_of_person) - 1
                : parseInt(table.capacity_of_person) - 2;

            const up_table =
            parseInt(table.capacity_of_person) % 2 !== 0
                ? (parseInt(table.capacity_of_person) + 1) / 2
                : parseInt(table.capacity_of_person) / 2;

            const down_table =
            parseInt(table.capacity_of_person) % 2 !== 0
                ? (parseInt(table.capacity_of_person) - 1) / 2
                : parseInt(table.capacity_of_person) / 2;

            const col = (cap / 2) * 5 + 20;

            table.col = col > 100 ? 100 : col;
            table.up_table = up_table;
            table.down_table = down_table;
            table.width = 182 + (up_table - 1) * 80;

            single_row_data.push(table);

            if (index === res.data.tables.length - 1) {
            rowTablesData.push(single_row_data);
            single_row_data = [];
            cal_of_capacity = 0;
            }

            cal_of_capacity += parseInt(table.orders.length);

            const obj = {
            id: table.id,
            capacity_of_person: parseInt(table.capacity_of_person),
            table_number: table.table_number,
            };

            change_table_list_array.push(obj);

            if (parseInt(res.data.max_table_cap) === parseInt(table.capacity_of_person)) {
            maxNumberTableId.value = parseInt(table.id);
            maxNumberTableCap.value = parseInt(table.capacity_of_person);
            maxNumberTableData.value = table;
            }
        });

        // Assign values to reactive variables
        maxNumberTableId.value = max_number_table_id_val;
        rowTables.value = rowTablesData;

        rowTables.value.forEach((tables, row_index) => {
            tables.forEach((table, t_index) => {
            table.orders.forEach((order, o_index) => {
                if (o_index === 0) {
                timingCountOrder(
                    order.time_left,
                    order.finish_time,
                    o_index,
                    t_index,
                    row_index
                );
                }
                if (order.is_order_moved && highlightTimeOnOff.value === 1) {
                secondIncrement(order.order_moved, o_index, t_index, row_index);
                }
                if (order.is_new_order_timing && highlightTimeOnOff.value === 1) {
                newOrderSecondIncrement(
                    order.new_order_timing,
                    o_index,
                    t_index,
                    row_index
                );
                }
            });
            });
        });

        changeTableList.value = change_table_list_array;
        noTableListShow.value = true;

        change_table_list_array.forEach((table, index) => {
            if (
            maxNumberTableCap.value === table.capacity_of_person &&
            table.id !== maxNumberTableId.value
            ) {
            noTableListShow.value = false;
            }
        });
    })
    .catch((error) => {
        console.error("Error fetching table list:", error);
    });
};

const startDrag = (id, tableId) => {
    dragOrderId.value = id;
    dragOrderTableId.value = tableId;
};

const onDrop = (event) => {
    const endTarget = document.elementFromPoint(
        event.changedTouches[0].pageX,
        event.changedTouches[0].pageY
    );
    const table = endTarget.closest(".drop-target");
    if (table) {
        const tableId = $(table).data("id");
        if (!tableId || !dragOrderTableId.value || tableId == dragOrderTableId.value) {
        return false;
        }
        const order_id = dragOrderId.value;
        const floor_name = $(table).data("name");
        const table_number = $(table).data("tnumber");

        f7.dialog.confirm(
        "Are you sure to order transfer to " +
            floor_name +
            "(Table Number : " +
            table_number +
            ") ?",
        () => {
            axios
            .post("/api/change-order-table", {
                table_number: table_number,
                id: order_id,
            })
            .then((res) => {
                if (res.data.success) tableList();
            });
        }
        );

        setTimeout(() => {
        $(".dialog-title").html("<img src='/images/success.png'>");
        $(".dialog-button").addClass(
            "col button button-raised button-large text-transform-capitalize"
        );
        $(".dialog-button").eq(0).addClass("text-color-black");
        $(".dialog-button").eq(1).addClass("active");
        $(".dialog-button").css("width", "50%");
        }, 50);
    }
};

const changeTable = (order_id, table_number, floor_name) => {
    f7.popover.close();
    f7.dialog.confirm(
        "Are you sure to order transfer to " +
        floor_name +
        "(Table Number : " +
        table_number +
        ") ?",
        () => {
        axios
            .post("/api/change-order-table", {
            table_number: table_number,
            id: order_id,
            })
            .then((res) => {
            if (res.data.success) {
                tableListFloorWise(activeFloorId.value);
            }
            });
        }
    );

    $(".dialog-title").html("<img src='/images/success.png'>");
    $(".dialog-button").addClass(
        "col button button-raised button-large text-transform-capitalize"
    );
    $(".dialog-button").eq(0).addClass("text-color-black");
    $(".dialog-button").eq(1).addClass("active");
    $(".dialog-button").css("width", "50%");
};

const changeFloor = (order_id, floor_id, floor_name) => {
    f7.popover.close();
    f7.dialog.confirm(`Are you sure to order transfer to ${floor_name} ?`, () => {
        axios
        .post("/api/change-floor-order", {
            floor_id: floor_id,
            id: order_id,
        })
        .then((res) => {
            if (res.data.success) {
            tableListFloorWise(floor_id);
            } else {
            root.errorNotification(res.data.message);
            return false;
            }
        });
    });

    setTimeout(() => {
        $(".dialog-title").html("<img src='/images/success.png'>");
        $(".dialog-button").addClass(
        "col button button-raised button-large text-transform-capitalize"
        );
        $(".dialog-button").eq(0).addClass("text-color-black");
        $(".dialog-button").eq(1).addClass("active");
        $(".dialog-button").css("width", "50%");
    }, 50);
};

const finishNext = (id) => {
    f7.popover.close();
    f7.dialog.confirm("Are you sure to finish this order and going to next?", () => {
        axios.post("/api/finish-next", { id: id }).then((res) => {
        tableListFloorWise(activeFloorId.value);
        });
    });
    setTimeout(() => {
        $(".dialog-button").eq(1).css({ "background-color": "#F33E3E", color: "#fff" });
        $(".dialog-title").html("<img src='/images/cross.png'>");
        $(".dialog-buttons").after(
        "<div><img src='/images/flow.png' style='width:100%'></div>"
        );
        $(".dialog-button").addClass(
        "col button button-raised text-color-black button-large text-transform-capitalize"
        );
        $(".dialog-button").eq(1).removeClass("text-color-black");
        $(".dialog-buttons").addClass("margin-top no-margin-bottom");
    }, 50);
};

const cancelNext = (id) => {
    f7.popover.close();
    f7.dialog.confirm("Are you sure to cancel this order and going to next?", () => {
        axios
        .post("/api/cancel-next", {
            id: id,
            cancelled_by: "Manager",
        })
        .then((res) => {
            tableListFloorWise(activeFloorId.value);
        });
    });
    setTimeout(() => {
        $(".dialog-button").eq(1).css({ "background-color": "#F33E3E", color: "#fff" });
        $(".dialog-title").html("<img src='/images/cross.png'>");
        $(".dialog-buttons").after(
        "<div><img src='/images/flow.png' style='width:100%'></div>"
        );
        $(".dialog-button").addClass(
        "col button button-raised text-color-black button-large text-transform-capitalize"
        );
        $(".dialog-button").eq(1).removeClass("text-color-black");
        $(".dialog-buttons").addClass("margin-top no-margin-bottom");
    }, 50);
};

const getRemainingTime = (id) => {
    axios.post("/api/get-remaining-time", { id: id }).then((res) => {
        popupRemainingTime.value = res.data.time;
        popupRemainingTimeOver.value = res.data.time_over;
    });
};

const addMinutes = () => {
    if (minutes.value === "") {
        root.errorNotification("Please add minutes in order");
        return false;
    }
    axios
    .post("/api/add-minutes-order", {
        minutes: minutes.value,
        orderId: orderId.value,
    })
    .then((res) => {
        f7.popup.close();
        minutes.value = "";
        tableListFloorWise(activeFloorId.value);
    });
};

const checkNumberValidate = (evt) => {
    evt = evt ? evt : window.event;
    var charCode = evt.which ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode !== 46) {
        evt.preventDefault();
    } else {
        return true;
    }
};
</script>
