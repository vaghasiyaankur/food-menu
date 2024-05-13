<template>
    <f7-page color="bg-color-white">
        <div class="table_main">
            <!-- ============= TABLE FLOOR SWIPER ============= -->
            <Slider :floorList="floorList" :activeFloorId="activeFloorId" @get:floor-value="tableListFloorWise" />
            <Table :rowTables="rowTables" :changeTableList="changeTableList" :maxNumberTableData="maxNumberTableData" :noTableListShow="noTableListShow" :orderId="orderId" @change:table="changeTable" @change:floor="changeFloor" @update:finish-next="finishNext" @addMinutesToClosePopOver="addMinutesToClosePopOver" @update:cancel-next="cancelNext" />
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
import NoValueFound from "../../components/NoValueFound.vue";
import Slider from "../../components/Table/Slider.vue";
import Table from "../../components/Table/Table.vue";
import Pusher from "pusher-js";
import moment from "moment";
import { ref, computed, onMounted, onUpdated, onDeactivated, inject, provide } from "vue";

const rowTables = ref([]);
const dragOrderId = ref("");
const dragOrderTableId = ref("");
const floorList = ref([]);
const activeFloorId = ref(0);
const changeTableList = ref([]);
const currentCapacity = ref(0);
const maxNumberTableId = ref(0);
const noTableListShow = ref(true);
const maxNumberTableCap = ref(0);
const maxNumberTableData = ref([]);
const checkCallInterval = ref(1);
const highlight_time = ref(0);
const highlightTimeOnOff = ref(0);
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
    $(document).on("click", ".popover-backdrop", function () {
        $(".navbar-bg").css("background", "var(--f7-navbar-bg-color)");
        $(".table-drop-down").removeClass("floor_dropdown_visible");
        $(".floor-drop-down").removeClass("floor_dropdown_visible");
        $(".floor__list").removeClass("add_left_before");
        $(".floor__list").removeClass("add_right_before");
        $(".table__list").removeClass("add_left_before");
        $(".table__list").removeClass("add_right_before");
    });
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

    intervalTransferOrder.value.push(intervalId);
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

provide('noTableListShow',noTableListShow);
provide('orderId',orderId);
</script>
