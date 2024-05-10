<template>
    <f7-page color="bg-color-white">
        <div class="table_main">
            <!-- ============= TABLE FLOOR SWIPER ============= -->
            <div class="table_floor_swiper">
                <div class="row">
                    <div class="col-100">
                        <div
                            data-pagination='{"el":".swiper-pagination"}'
                            data-navigation="{'el':'.swiper-navigation'}"
                            data-space-between="10"
                            data-slides-per-view="4"
                            class="swiper swiper-init demo-swiper margin-top margin-bottom floor_swiper_inner swiper-navigation"
                        >
                            <div class="swiper-wrapper padding-left-half">
                                <div
                                    class="swiper-slide"
                                    :class="{
                                        active: floor.id == active_floor_id,
                                    }"
                                    v-for="floor in floorlist"
                                    :key="floor.id"
                                    @click="tableListFloorWise(floor.id)"
                                >
                                    <span v-if="floor.time_left">
                                        <img
                                            src="/images/floor_blinking.gif"
                                            class="floor_blinking_img"
                                        />
                                    </span>

                                    <p
                                        class="no-margin text-align-center margin-vertical-half swiper_text display-flex"
                                    >
                                        {{ floor.name }}
                                        <span
                                            class="room_available color-blue"
                                            >{{ floor.orders_count }}</span
                                        >
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tables margin-horizontal" v-if="row_tables.length != 0">
                <div
                    class="table_row margin-horizontal padding-top margin-top"
                    v-for="row in row_tables"
                    :key="row"
                >
                    <!-- <div class="no-padding margin-bottom table-card" :class="[('col-'+table.col)]" v-for="table in row" :key="table.id"> -->
                    <div class="no-padding margin-bottom table-card mr-72 -100" v-for="table in row" :key="table.id">
                        <!-- :style="'min-width: '+table.width+'px'" -->
                        <!--======= TABLE CHAIR ========= -->
                        <div class="row table_top_chair">
                            <div
                                class="col"
                                v-for="index in table.up_table"
                                :key="index"
                            >
                                <div class="table_card_img text-align-center">
                                    <img
                                        :src="
                                            '/images/table/' +
                                            table.color.color +
                                            '.png'
                                        "
                                        alt="table"
                                    />
                                </div>
                            </div>
                        </div>
                        <div
                            class="card no-margin table_1 equal-height-table drop-target"
                            :data-id="table.id"
                            :data-name="table.floor.name"
                            :data-tnumber="table.table_number"
                            :style="
                                'border-left : 10px solid rgb(' +
                                table.color.rgb +
                                '); min-width : ' +
                                table.width +
                                'px'
                            "
                        >
                            <div class="card-header no-padding">
                                <div class="row header_detail">
                                    <div class="table-number padding-half">
                                        <p class="no-margin table__text">
                                            Table No.
                                        </p>
                                        <p
                                            class="text-align-center no-margin count__text"
                                        >
                                            {{ table.table_number }}
                                        </p>
                                    </div>
                                    <div
                                        class="table-capacity text-align-right padding-half"
                                    >
                                        <p class="no-margin table__text">
                                            Capacity
                                        </p>
                                        <p
                                            class="text-align-center no-margin count__text"
                                        >
                                            {{ table.capacity_of_person }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="card-content padding-top padding-horizontal-half table1__details"
                            >
                                <!-- :style="'max-width : '+(table.width - 20 )+'px'" -->
                                <div class="table_reservation margin-bottom">
                                    <!-- <h3 class="no-margin-top">Reserved</h3> -->
                                    <div class="display-flex h-100">
                                        <!-- <draggable :scroll-sensitivity="250"  :force-fallback="true" class="dragArea list-group w-full" :class="'dragger'+table.id" :list="order[index]" @start="startDrag(order.id, table.id)" @touchend.prevent="onDrop" v-for="(order,index) in table.orders" :key="order.id"> -->

                                        <div
                                            class="table_reservation_info"
                                            :class="'test' + order.id"
                                            v-for="order in table.orders"
                                            :key="order.id"
                                        >
                                            <div
                                                :class="{
                                                    ongoing_blinking:
                                                        order.is_time_left,
                                                }"
                                            >
                                                <!-- :data-popover="'.popover-table-'+order.id" -->
                                                <!-- popover-open -->
                                                <!-- :data-popover="'.popover-table-'+order.id" -->
                                                <div
                                                    class="person-info popover-open"
                                                    :class="[
                                                        'popover-click-' +
                                                            order.id,
                                                        {
                                                            'person-info_move':
                                                                order.is_order_moved,
                                                            'ongoing_popover ':
                                                                order.is_ongoing_order &&
                                                                !order.is_order_moved,
                                                            neworder_add:
                                                                order.is_new_order_timing,
                                                        },
                                                    ]"
                                                    @click="
                                                        getRemainingTime(
                                                            order.id
                                                        );
                                                        order_person =
                                                            order.person;
                                                        removebackdrop();
                                                        orderId = order.id;
                                                    "
                                                    :data-popover="
                                                        '.popover-table-' +
                                                        order.id
                                                    "
                                                >
                                                    <div
                                                        class="neworder_tooltip order_tooltip"
                                                        v-if="
                                                            order.is_new_order_timing
                                                        "
                                                    >
                                                        <div
                                                            class="tooltip_text"
                                                        >
                                                            <p
                                                                class="no-margin"
                                                            >
                                                                New Reservation
                                                            </p>
                                                            <p
                                                                class="no-margin"
                                                            >
                                                                {{
                                                                    order.new_order_timing_text
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="order_tooltip finish_order_tooltip"
                                                        v-if="
                                                            order.is_time_left
                                                        "
                                                    >
                                                        <div
                                                            class="tooltip_text"
                                                        >
                                                            <p
                                                                class="no-margin"
                                                            >
                                                                {{
                                                                    order.time_left
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="person_info_name border__bottom padding-bottom-half margin-bottom-half"
                                                    >
                                                        <p
                                                            class="no-margin text-align-center"
                                                        >
                                                            By {{ order.role }}
                                                        </p>
                                                    </div>
                                                    <div class="text-align-center person">
                                                        <i class="f7-icons size-22">person</i>
                                                        <span>
                                                            &nbsp;
                                                            {{
                                                                order.person
                                                            }}
                                                        </span>
                                                        <span
                                                            class="waiting-time margin-top-half text-align-center"
                                                        >
                                                            <!-- <i class="f7-icons size-22">clock_fill</i> -->
                                                            <span>{{
                                                                order.reservation_time
                                                            }}</span>
                                                        </span>
                                                    </div>
                                                    <div
                                                        class="popover padding-half"
                                                        v-if="
                                                            !order.is_order_moved
                                                        "
                                                        :class="
                                                            'popover-table-' +
                                                            order.id
                                                        "
                                                    >
                                                        <div
                                                            class="user-info popover-inner"
                                                        >
                                                            <div
                                                                class="display-flex padding-left-half padding-top-half align-items-center"
                                                            >
                                                                <i
                                                                    class="f7-icons size-18 text-color-black padding-right-half margin-right-half"
                                                                    >person</i
                                                                >
                                                                <span
                                                                    class="text-color-black"
                                                                    >{{
                                                                        order
                                                                            .customer
                                                                            .name
                                                                    }}</span
                                                                >
                                                            </div>
                                                            <div
                                                                class="display-flex padding-left-half padding-top align-items-center"
                                                            >
                                                                <i
                                                                    class="f7-icons size-18 text-color-black padding-right-half margin-right-half"
                                                                    >clock</i
                                                                >
                                                                <span
                                                                    class="text-color-black"
                                                                    >{{
                                                                        order.reservation_time_12_format
                                                                    }}</span
                                                                >
                                                            </div>
                                                            <div
                                                                class="display-flex padding-left-half padding-top align-items-center"
                                                            >
                                                                <i
                                                                    class="f7-icons size-18 text-color-black padding-right-half margin-right-half"
                                                                    >timer</i
                                                                >
                                                                <span
                                                                    class="text-color-black"
                                                                    v-if="
                                                                        popup_remaining_time ==
                                                                        0
                                                                    "
                                                                    >Ongoing</span
                                                                >
                                                                <vue-countdown
                                                                    v-else-if="
                                                                        popup_remaining_time_over
                                                                    "
                                                                    :time="
                                                                        popup_remaining_time
                                                                    "
                                                                    v-slot="{
                                                                        hours,
                                                                        minutes,
                                                                        seconds,
                                                                    }"
                                                                >
                                                                    <p
                                                                        class="no-margin font-30"
                                                                        v-if="
                                                                            String(
                                                                                hours
                                                                            ).padStart(
                                                                                2,
                                                                                '0'
                                                                            ) !=
                                                                            0
                                                                        "
                                                                    >
                                                                        Time
                                                                        Over
                                                                        <span
                                                                            class="time-over"
                                                                            >{{
                                                                                String(
                                                                                    hours
                                                                                ).padStart(
                                                                                    2,
                                                                                    "0"
                                                                                ) +
                                                                                " hour"
                                                                            }}</span
                                                                        >
                                                                    </p>
                                                                    <p
                                                                        class="no-margin font-30"
                                                                        v-else-if="
                                                                            String(
                                                                                minutes
                                                                            ).padStart(
                                                                                2,
                                                                                '0'
                                                                            ) !=
                                                                            0
                                                                        "
                                                                    >
                                                                        Time
                                                                        Over
                                                                        <span
                                                                            class="time-over"
                                                                            >{{
                                                                                String(
                                                                                    minutes
                                                                                ).padStart(
                                                                                    2,
                                                                                    "0"
                                                                                ) +
                                                                                " mins"
                                                                            }}</span
                                                                        >
                                                                    </p>
                                                                    <p
                                                                        class="no-margin font-30"
                                                                        v-else
                                                                    >
                                                                        Time
                                                                        Over
                                                                        <span
                                                                            class="time-over"
                                                                            >{{
                                                                                String(
                                                                                    seconds
                                                                                ).padStart(
                                                                                    2,
                                                                                    "0"
                                                                                ) +
                                                                                " second"
                                                                            }}</span
                                                                        >
                                                                    </p>
                                                                </vue-countdown>
                                                                <vue-countdown
                                                                    v-else
                                                                    :time="
                                                                        popup_remaining_time
                                                                    "
                                                                    v-slot="{
                                                                        hours,
                                                                        minutes,
                                                                        seconds,
                                                                    }"
                                                                >
                                                                    <p
                                                                        class="no-margin font-30"
                                                                        v-if="
                                                                            String(
                                                                                hours
                                                                            ).padStart(
                                                                                2,
                                                                                '0'
                                                                            ) !=
                                                                            0
                                                                        "
                                                                    >
                                                                        {{
                                                                            String(
                                                                                hours
                                                                            ).padStart(
                                                                                2,
                                                                                "0"
                                                                            ) +
                                                                            " hr & " +
                                                                            String(
                                                                                minutes
                                                                            ).padStart(
                                                                                2,
                                                                                "0"
                                                                            ) +
                                                                            " M"
                                                                        }}
                                                                    </p>
                                                                    <p
                                                                        class="no-margin font-30"
                                                                        v-else-if="
                                                                            String(
                                                                                minutes
                                                                            ).padStart(
                                                                                2,
                                                                                '0'
                                                                            ) !=
                                                                            0
                                                                        "
                                                                    >
                                                                        {{
                                                                            String(
                                                                                minutes
                                                                            ).padStart(
                                                                                2,
                                                                                "0"
                                                                            ) +
                                                                            " mins"
                                                                        }}
                                                                    </p>
                                                                    <p
                                                                        class="no-margin font-30"
                                                                        v-else
                                                                    >
                                                                        {{
                                                                            String(
                                                                                seconds
                                                                            ).padStart(
                                                                                2,
                                                                                "0"
                                                                            ) +
                                                                            " secs"
                                                                        }}
                                                                    </p>
                                                                </vue-countdown>
                                                            </div>
                                                            <div
                                                                class="display-flex padding-left-half padding-top align-items-center"
                                                            >
                                                                <i
                                                                    class="f7-icons size-18 text-color-black padding-right-half margin-right-half"
                                                                    >phone</i
                                                                >
                                                                <span
                                                                    class="text-color-black"
                                                                    >{{
                                                                        order
                                                                            .customer
                                                                            .number
                                                                    }}</span
                                                                >
                                                            </div>
                                                            <div
                                                                class="display-flex padding-left-half padding-vertical align-items-center"
                                                            >
                                                                <i
                                                                    class="f7-icons size-18 text-color-black padding-right-half margin-right-half"
                                                                    >person_2</i
                                                                >
                                                                <span
                                                                    class="text-color-black"
                                                                    >{{
                                                                        order.person
                                                                    }}
                                                                    family
                                                                    member</span
                                                                >
                                                            </div>
                                                            <div
                                                                class="add_minutes"
                                                                v-if="
                                                                    popup_remaining_time ==
                                                                    0
                                                                "
                                                            >
                                                                <div
                                                                    class="card-footer no-margin no-padding justify-content-center"
                                                                >
                                                                    <h3>
                                                                        <a
                                                                            class="text-color-red popup-open"
                                                                            data-popup=".addMinutesPopup"
                                                                            @click="
                                                                                addMinutesToClosepopover()
                                                                            "
                                                                        >
                                                                            Add
                                                                            Minutes
                                                                        </a>
                                                                    </h3>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="finish_popup"
                                                                v-if="
                                                                    order.start_time &&
                                                                    order.finished ==
                                                                        0
                                                                "
                                                            >
                                                                <div
                                                                    class="card-footer no-margin no-padding justify-content-center"
                                                                >
                                                                    <h3>
                                                                        <a
                                                                            href="javascript:;"
                                                                            class="text-color-red"
                                                                            @click="
                                                                                cancelNext(
                                                                                    order.id
                                                                                )
                                                                            "
                                                                        >
                                                                            Cancle
                                                                            &
                                                                            Next
                                                                        </a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="finish_popup"
                                                                v-if="
                                                                    order.start_time &&
                                                                    order.finished ==
                                                                        0
                                                                "
                                                            >
                                                                <div
                                                                    class="card-footer no-margin no-padding justify-content-center"
                                                                >
                                                                    <h3>
                                                                        <a
                                                                            href="javascript:;"
                                                                            class="text-color-red"
                                                                            @click="
                                                                                finishNext(
                                                                                    order.id
                                                                                )
                                                                            "
                                                                        >
                                                                            Finish
                                                                            &
                                                                            Next
                                                                        </a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="floor__list"
                                                                :class="
                                                                    order.start_time &&
                                                                    order.finished ==
                                                                        0
                                                                        ? 'display-none'
                                                                        : ''
                                                                "
                                                            >
                                                                <div
                                                                    class="card-footer no-margin no-padding justify-content-center hassubs"
                                                                    @click="
                                                                        openFloorList(
                                                                            order.id
                                                                        )
                                                                    "
                                                                >
                                                                    <h3
                                                                        class="text-color-red"
                                                                    >
                                                                        Change
                                                                        Floor
                                                                    </h3>
                                                                </div>
                                                                <!-- ============FLOOR DROP DOWN  ============= -->
                                                                <div
                                                                    class="list simple-list floor-drop-down"
                                                                    :class="
                                                                        'f_f' +
                                                                        order.id
                                                                    "
                                                                >
                                                                    <ul>
                                                                        <li
                                                                            v-for="floor in available_floorlist"
                                                                            :key="
                                                                                floor.id
                                                                            "
                                                                            @click="
                                                                                changeFloor(
                                                                                    order.id,
                                                                                    floor.id,
                                                                                    floor.name
                                                                                )
                                                                            "
                                                                            :class="
                                                                                table
                                                                                    .floor
                                                                                    .id ==
                                                                                floor.id
                                                                                    ? 'display-none'
                                                                                    : ''
                                                                            "
                                                                        >
                                                                            <div
                                                                                class="floor_number display-flex align-items-center justify_content_between w-100"
                                                                            >
                                                                                <div
                                                                                    class="floor_name"
                                                                                >
                                                                                    <span
                                                                                        >{{
                                                                                            floor.name
                                                                                        }}
                                                                                    </span>
                                                                                </div>
                                                                                <div
                                                                                    class="floor_room_available"
                                                                                >
                                                                                    <span
                                                                                        class="room_available"
                                                                                        >{{
                                                                                            floor.orders_count
                                                                                        }}</span
                                                                                    >
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li
                                                                            class="no-available-list"
                                                                            v-if="
                                                                                available_floorlist.length ==
                                                                                0
                                                                            "
                                                                        >
                                                                            <div
                                                                                class="floor_number display-flex align-items-center justify_content_between w-100 no-cap"
                                                                            >
                                                                                <div
                                                                                    class="floor_name"
                                                                                >
                                                                                    <span
                                                                                        >Not
                                                                                        above
                                                                                        capacity
                                                                                        floor</span
                                                                                    >
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <!-- ============FLOOR DROP DOWN END ============= -->
                                                            </div>
                                                            <div
                                                                class="table__list"
                                                                :class="
                                                                    order.start_time &&
                                                                    order.finished ==
                                                                        0
                                                                        ? 'display-none'
                                                                        : ''
                                                                "
                                                            >
                                                                <div
                                                                    class="card-footer no-margin no-padding justify-content-center hassubs"
                                                                    @click="
                                                                        openTableList(
                                                                            order
                                                                        )
                                                                    "
                                                                >
                                                                    <h3
                                                                        class="text-color-red"
                                                                    >
                                                                        Change
                                                                        Table
                                                                    </h3>
                                                                </div>
                                                                <!-- ============FLOOR DROP DOWN  ============= -->
                                                                <div
                                                                    class="list simple-list table-drop-down"
                                                                    :class="
                                                                        't_f' +
                                                                        order.id
                                                                    "
                                                                >
                                                                    <ul>
                                                                        <li
                                                                            v-for="changetable in change_table_list"
                                                                            :key="
                                                                                changetable.id
                                                                            "
                                                                            :class="
                                                                                changetable.id ==
                                                                                    table.id ||
                                                                                changetable.capacity_of_person <
                                                                                    order_person
                                                                                    ? 'display-none'
                                                                                    : ''
                                                                            "
                                                                            @click="
                                                                                changeTable(
                                                                                    order.id,
                                                                                    changetable.id,
                                                                                    table
                                                                                        .floor
                                                                                        .name
                                                                                )
                                                                            "
                                                                        >
                                                                            <div
                                                                                class="floor_number display-flex align-items-center justify_content_between w-100"
                                                                            >
                                                                                <div
                                                                                    class="floor_name"
                                                                                >
                                                                                    <span
                                                                                        >Table
                                                                                        No
                                                                                        :
                                                                                        {{
                                                                                            changetable.table_number
                                                                                        }}</span
                                                                                    >
                                                                                </div>
                                                                                <!-- <div class="floor_room_available">
                                                                                    <span class="room_available">20</span>
                                                                                </div> -->
                                                                            </div>
                                                                        </li>
                                                                        <li
                                                                            class="no-available-list"
                                                                            v-if="
                                                                                no_table_list_show &&
                                                                                max_number_table_id ==
                                                                                    table.id
                                                                            "
                                                                        >
                                                                            <div
                                                                                class="floor_number display-flex align-items-center justify_content_between w-100 no-cap"
                                                                            >
                                                                                <div
                                                                                    class="floor_name"
                                                                                >
                                                                                    <span
                                                                                        >Not
                                                                                        above
                                                                                        capacity
                                                                                        table</span
                                                                                    >
                                                                                </div>
                                                                                <!-- <div class="floor_room_available">
                                                                                    <span class="room_available">20</span>
                                                                                </div> -->
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <!-- ============FLOOR DROP DOWN END ============= -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        v-else
                                                        class="popover popover-move padding"
                                                        :class="
                                                            'popover-table-' +
                                                            order.id
                                                        "
                                                    >
                                                        <div
                                                            class="user-info popover-inner text-align-center"
                                                        >
                                                            <p
                                                                class="text-color-white no-margin"
                                                            >
                                                                Moved
                                                            </p>
                                                            <p
                                                                class="text-color-white no-margin"
                                                            >
                                                                {{
                                                                    order.order_moved_text
                                                                }}
                                                            </p>
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
                            <div
                                class="col"
                                v-for="index in table.down_table"
                                :key="index"
                            >
                                <div class="table_card_img text-align-center">
                                    <img
                                        :src="
                                            '/images/table/' +
                                            table.color.color +
                                            '.png'
                                        "
                                        alt="table"
                                        style="transform: rotate(180deg)"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="extra-div"></div> -->
                </div>
            </div>
            <div v-else>
                <div class="no_order">
                    <NoValueFound />
                    <div class="no_order_text text-align-center">
                        <p class="no-margin">Empty Table List</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ======== ADD MINUTES POPUP ======= -->
        <div
            id="addMinutesPopup"
            class="popup addMinutesPopup"
            style="position: fixed; display: block; border-radius: 15px"
        >
            <div class="text-align-center padding popup_title">Change Time</div>
            <div class="padding-horizontal">
                <div class="addminutes-form padding-horizontal padding-top">
                    <label class="add_minutes_text">Add Minutes</label>
                    <div
                        class="minutes_input display-flex align-items-center margin-top"
                    >
                        <input
                            type="number"
                            v-model="minutes"
                            class="w-100 add-minutes-input padding-horizontal-half"
                            name=""
                            id=""
                            @keypress="checknumbervalidate"
                        />
                        <div class="minutes_text">Min</div>
                    </div>
                    <div
                        class="margin-top no-margin-bottom display-flex justify-content-center padding-top popup_button"
                    >
                        <button
                            type="button"
                            class="button button-raised text-color-black bg-color-white button-large popup-close margin-right popup-button"
                        >
                            Cancel
                        </button>
                        <button
                            type="button"
                            class="button button-raised button-large popup-button"
                            style="
                                background-color: rgb(243, 62, 62);
                                color: rgb(255, 255, 255);
                            "
                            @click="addMinutes()"
                        >
                            Add Minutes
                        </button>
                    </div>
                </div>
            </div>
            <div class="wave-image-content">
                <img src="/images/flow.png" style="width: 100%" />
            </div>
        </div>
    </f7-page>
</template>

<script>
import { f7, f7Page, f7Navbar, f7BlockTitle, f7Block } from "framework7-vue";
import $ from "jquery";
import axios from "axios";
import VueCountdown from "@chenfengyuan/vue-countdown";
import NoValueFound from "../../components/NoValueFound.vue";
import Pusher from "pusher-js";
import moment from "moment";

export default {
    name: "RegisterPage",
    data() {
        return {
            row_tables: [],
            dragOrderId: "",
            dragOrderTableId: "",
            floorlist: [],
            active_floor_id: 0,
            change_table_list: [],
            current_capacity: 0,
            max_number_table_id: 0,
            no_table_list_show: true,
            order_person: 0,
            max_number_table_cap: 0,
            max_number_table_data: [],
            checkCallInterval: 1,
            popup_remaining_time: 0,
            popup_remaining_time_over: false,
            highlight_time: 0,
            highlight_time_on_off: 0,
            available_floorlist: [],
            timeoutId: null,
            userId: 0,
            minutes: "",
            orderId: 0,
            intervalNewOrder: [],
            intervaltransferOrder: [],
        };
    },
    computed: {
        dragOptions() {
            return {
                group: {
                    name: "table",
                },
                scrollSensitivity: 200,
                forceFallback: true,
            };
        },
    },
    components: {
        f7,
        f7Page,
        f7Navbar,
        f7BlockTitle,
        f7Block,
        VueCountdown,
        NoValueFound,
    },
    mounted() {
        this.equal_height();
        $(document).on("click", ".popover-backdrop", function () {
            //    $(".navbar").addClass('bg-color-white');
            //    $(".navbar-bg").css('width', '100%');
            $(".navbar-bg").css("background", "var(--f7-navbar-bg-color)");
            $(".table-drop-down").removeClass("floor_dropdown_visible");
            $(".floor-drop-down").removeClass("floor_dropdown_visible");
            $(".floor__list").removeClass("add_left_before");
            $(".floor__list").removeClass("add_right_before");
            $(".table__list").removeClass("add_left_before");
            $(".table__list").removeClass("add_right_before");
        });
        this.$root.activationMenu("table", "");
        this.$root.removeLoader();
        let vm = this;
        this.userId = this.$root.user.id;
        Pusher.logToConsole = true;

        var pusher_key = import.meta.env.VITE_PUSHER_APP_KEY;

        var pusher = new Pusher(pusher_key, {
            cluster: "ap2",
        });

        var channel = pusher.subscribe("reservation-" + this.userId);
        channel.bind("NewReservation", function (data) {
            vm.tableListFloorWise(this.active_floor_id);
        });

        Echo.channel("reservation-" + this.userId) //Should be Channel Name
            .listen("NewReservation", (e) => {
                vm.tableListFloorWise(this.active_floor_id);
            });
    },
    updated() {
        this.equal_height();
    },
    deactivated() {
        this.userId = this.$root.user.id;
        window.Echo.leave("reservation-" + this.userId);
    },
    beforeCreate() {
        this.$root.addLoader();
    },
    created() {
        this.tableList();
        // this.connect();
    },
    methods: {
        addMinutesToClosepopover() {
            this.minutes = "";
            f7.popover.close();
        },
        equal_height() {
            var highestBox = 0;
            var targetDiv = document.querySelectorAll(".equal-height-table");
            for (var i = 0; i < targetDiv.length; i++) {
                if (targetDiv[i].clientHeight > highestBox) {
                    highestBox = targetDiv[i].clientHeight;
                }
            }
            document
                .querySelectorAll(".equal-height-table")
                .forEach((node) => (node.style.height = highestBox + "px"));
        },
        openFloorList(id) {
            axios
                .post("/api/change-floor-list", { order_id: id })
                .then((res) => {
                    this.available_floorlist = res.data.floorlist;
                });

            $(".table-drop-down").removeClass("floor_dropdown_visible");
            $(".table__list").removeClass("add_left_before");
            $(".table__list").removeClass("add_right_before");
            $(".floor-drop-down").toggleClass("floor_dropdown_visible");
            var ele = document.querySelector(".popover-click-" + id);
            var bounding = ele.getBoundingClientRect();
            if (screen.width > bounding.left + bounding.width + 285) {
                $(".f_f" + id).css("left", "189px");
                $(".floor__list").removeClass("add_left_before");
                $(".floor__list").toggleClass("add_right_before");
            } else {
                $(".f_f" + id).css("left", "-260px");
                $(".floor__list").removeClass("add_right_before");
                $(".floor__list").toggleClass("add_left_before");
            }
            var height = parseInt($(".f_f" + id).height()) / 2 + 22;
            $(".f_f" + id).css("transform", "translateY(-" + height + "px");

            // transform: translateY(-1em);
        },
        openTableList(order) {
            $(".floor-drop-down").removeClass("floor_dropdown_visible");
            $(".floor__list").removeClass("add_left_before");
            $(".floor__list").removeClass("add_right_before");
            $(".table-drop-down").toggleClass("floor_dropdown_visible");
            var ele = document.querySelector(".popover-click-" + order.id);
            var bounding = ele.getBoundingClientRect();
            if (screen.width > bounding.left + bounding.width + 285) {
                $(".t_f" + order.id).css("left", "190px");
                $(".table__list").removeClass("add_left_before");
                $(".table__list").toggleClass("add_right_before");
            } else {
                $(".t_f" + order.id).css("left", "-249px");
                $(".table__list").removeClass("add_right_before");
                $(".table__list").toggleClass("add_left_before");
            }
            $(".table-drop-down").css("min-width", "240px");

            if (
                order.person <
                parseInt(this.max_number_table_data.capacity_of_person)
            ) {
                this.no_table_list_show = false;
            }
            var person = order.person;
            if (
                parseInt(person) % 2 != 0 &&
                order.table_id == this.max_number_table_data.id
            ) {
                person = parseInt(person) + 1;
            }
            if (
                order.table_id == this.max_number_table_data.id &&
                person ==
                    parseInt(this.max_number_table_data.capacity_of_person)
            ) {
                this.no_table_list_show = true;
            }

            var height = parseInt($(".t_f" + order.id).height()) / 2 + 22;
            // if(parseInt($(".t_f"+order.id).height()) == 0) var height = height + 22;

            $(".t_f" + order.id).css(
                "transform",
                "translateY(-" + height + "px"
            );
        },
        removebackdrop() {
            $(".floor-drop-down").removeClass("floor_dropdown_visible");
            $(".table-drop-down").removeClass("floor_dropdown_visible");
            $(".floor__list").removeClass("add_left_before");
            $(".floor__list").removeClass("add_right_before");
            $(".table__list").removeClass("add_left_before");
            $(".table__list").removeClass("add_right_before");
        },
        timingCountOrder(
            finish_time,
            order_finish_time,
            orderIndex,
            tableIndex,
            rowIndex
        ) {
            var timing = moment(finish_time) - moment();
            var duration = moment.duration(timing, "milliseconds");
            var interval = 60000;
            duration = moment.duration(duration - interval, "milliseconds");
            setInterval(() => {
                duration = moment.duration(duration - interval, "milliseconds");
                if (duration.minutes() == 3) {
                    this.tableListFloorWise(this.active_floor_id);
                }
                if (duration.minutes() <= 0) {
                    this.row_tables[rowIndex][tableIndex].orders[
                        orderIndex
                    ].time_left = "Time over";
                } else if (duration.minutes() <= 3) {
                    this.row_tables[rowIndex][tableIndex].orders[
                        orderIndex
                    ].time_left = duration.minutes() + " Min Left";
                } else {
                    this.row_tables[rowIndex][tableIndex].orders[
                        orderIndex
                    ].time_left = "Time over";
                }
            }, interval);
            if (duration.minutes() <= 0) {
                this.row_tables[rowIndex][tableIndex].orders[
                    orderIndex
                ].time_left = "Time over";
            } else if (duration.minutes() <= 3) {
                this.row_tables[rowIndex][tableIndex].orders[
                    orderIndex
                ].time_left = duration.minutes() + " Min Left";
            } else {
                this.row_tables[rowIndex][tableIndex].orders[
                    orderIndex
                ].time_left = "Time over";
            }
            // setTimeout(() => {
            //     // this.row_tables[rowIndex][tableIndex].orders[orderIndex].is_time_left = true;
            //     this.tableListFloorWise(this.active_floor_id);
            //     this.dateFormat(finish_time);
            // }, finish_timing);
        },
        secondIncrement(second, orderIndex, tableIndex, rowIndex) {
            const interval = setInterval(() => {
                if (second < 60 * parseFloat(this.highlight_time)) {
                    second++;
                    if (
                        this.row_tables[rowIndex] != undefined &&
                        this.row_tables[rowIndex][tableIndex] != undefined &&
                        this.row_tables[rowIndex][tableIndex].orders[
                            orderIndex
                        ] != undefined
                    ) {
                        this.row_tables[rowIndex][tableIndex].orders[
                            orderIndex
                        ].order_moved = second;
                        if (second > 60) {
                            var minutes = parseInt(Math.floor(second / 60), 10);
                            var extraSeconds = second % 60;
                            minutes = minutes < 10 ? "0" + minutes : minutes;
                            extraSeconds =
                                extraSeconds < 10
                                    ? "0" + extraSeconds
                                    : extraSeconds;
                            this.row_tables[rowIndex][tableIndex].orders[
                                orderIndex
                            ].order_moved_text =
                                minutes +
                                " minute " +
                                extraSeconds +
                                " second ago";
                        } else {
                            this.row_tables[rowIndex][tableIndex].orders[
                                orderIndex
                            ].order_moved_text = second + " seconds ago";
                        }
                    }
                } else {
                    this.tableListFloorWise(this.active_floor_id);
                    f7.popover.close(".popover-move");
                }
            }, 1000);
            this.intervaltransferOrder.push(interval);
            // }
            // var highlight_time = parseFloat(this.highlight_time) * 60 * 1000;
            // this.timeoutId = setTimeout(() => {
            //     this.tableListFloorWise(this.active_floor_id);
            //     f7.popover.close('.popover-move');
            //     clearInterval(this.intervalId);
            // }, highlight_time);
        },
        newOrdersecondIncrement(second, orderIndex, tableIndex, rowIndex) {
            // if(this.intervalNewOrder.indexOf(orderIndex + 'and' +  tableIndex) < 0) {
            //     this.intervalNewOrder.push(orderIndex + 'and' +  tableIndex);
            const interval = setInterval(() => {
                if (second < 60 * parseFloat(this.highlight_time)) {
                    second++;
                    if (
                        this.row_tables[rowIndex] != undefined &&
                        this.row_tables[rowIndex][tableIndex] != undefined &&
                        this.row_tables[rowIndex][tableIndex].orders[
                            orderIndex
                        ] != undefined
                    ) {
                        this.row_tables[rowIndex][tableIndex].orders[
                            orderIndex
                        ].new_order_timing = second;
                        if (second > 60) {
                            var minutes = parseInt(Math.floor(second / 60), 10);
                            var extraSeconds = second % 60;
                            minutes = minutes < 10 ? "0" + minutes : minutes;
                            extraSeconds =
                                extraSeconds < 10
                                    ? "0" + extraSeconds
                                    : extraSeconds;
                            this.row_tables[rowIndex][tableIndex].orders[
                                orderIndex
                            ].new_order_timing_text =
                                minutes +
                                " minute " +
                                extraSeconds +
                                " second ago";
                        } else {
                            this.row_tables[rowIndex][tableIndex].orders[
                                orderIndex
                            ].new_order_timing_text = second + " seconds ago";
                        }
                    }
                } else {
                    // let index = this.intervalNewOrder.indexOf(orderIndex + 'and' +  tableIndex);
                    // if (index !== -1) {
                    //     this.intervalNewOrder.splice(index, 1);
                    // }

                    this.tableListFloorWise(this.active_floor_id);
                    // clearInterval(interval);
                }
            }, 1000);
            this.intervalNewOrder.push(interval);
            // }
            // var highlight_time = parseFloat(this.highlight_time) * 60 * 1000;
            // this.timeoutId = setTimeout(() => {
            //     // this.tableListFloorWise(this.active_floor_id);
            //     f7.popover.close('.popover-move');
            //     clearInterval(interval);
            // }, highlight_time);
        },
        tableList() {
            axios.get("/api/table-list-with-order").then((res) => {
                this.highlight_time_on_off = res.data.highlight_time_on_off;
                this.highlight_time = res.data.highlight_time;

                this.current_capacity = res.data.current_capacity;
                this.floorlist = res.data.floorlist;
                this.active_floor_id = res.data.floorlist[0]
                    ? res.data.floorlist[0].id
                    : 0;
                var row_tables = [];
                var cal_of_capacity = 0;
                var single_row_data = [];
                var change_table_list_array = [];
                var max_number_table_id = 0;
                res.data.tables.forEach((table, index) => {
                    // Highlight Time get for setting

                    // calculation of row wise table list
                    // if(parseInt(cal_of_capacity) > 18){
                    if (parseInt(cal_of_capacity) > 6) {
                        row_tables.push(single_row_data);
                        single_row_data = [];
                        cal_of_capacity = 0;
                    }

                    if (parseInt(table.capacity_of_person) % 2 != 0) {
                        var cap = parseInt(table.capacity_of_person - 1);
                        var up_table =
                            (parseInt(table.capacity_of_person) + 1) / 2;
                        var down_table =
                            (parseInt(table.capacity_of_person) - 1) / 2;
                    } else {
                        var cap = parseInt(table.capacity_of_person) - 2;
                        var up_table = parseInt(table.capacity_of_person) / 2;
                        var down_table = parseInt(table.capacity_of_person) / 2;
                    }

                    var col = (cap / 2) * 5 + 20;

                    table["col"] = col > 100 ? 100 : col;
                    table["up_table"] = up_table;
                    table["down_table"] = down_table;

                    table["width"] = 182 + (up_table - 1) * 80;
                    single_row_data.push(table);

                    if (index == res.data.tables.length - 1) {
                        row_tables.push(single_row_data);
                        single_row_data = [];
                        cal_of_capacity = 0;
                    }

                    // cal_of_capacity = parseInt(cal_of_capacity) + parseInt(table.capacity_of_person);
                    cal_of_capacity =
                        parseInt(cal_of_capacity) +
                        parseInt(table.orders.length);

                    // set change table list upon capacity

                    var obj = {
                        id: table.id,
                        capacity_of_person: parseInt(table.capacity_of_person),
                        table_number: table.table_number,
                    };

                    change_table_list_array.push(obj);

                    // Max Number Capacity Table Id
                    if (
                        parseInt(res.data.max_table_cap) ==
                        parseInt(table.capacity_of_person)
                    ) {
                        max_number_table_id = parseInt(table.id);
                        this.max_number_table_cap = parseInt(
                            table.capacity_of_person
                        );
                        this.max_number_table_data = table;
                    }
                });
                this.max_number_table_id = max_number_table_id;
                this.row_tables = row_tables;

                this.row_tables.forEach((tables, row_index) => {
                    tables.forEach((table, t_index) => {
                        table.orders.forEach((order, o_index) => {
                            if (o_index == 0) {
                                this.timingCountOrder(
                                    order.time_left,
                                    order.finish_time,
                                    o_index,
                                    t_index,
                                    row_index
                                );
                            }
                            if (
                                order.is_order_moved &&
                                this.highlight_time_on_off == 1
                            ) {
                                this.secondIncrement(
                                    order.order_moved,
                                    o_index,
                                    t_index,
                                    row_index
                                );
                            }
                            if (
                                order.is_new_order_timing &&
                                this.highlight_time_on_off == 1
                            ) {
                                this.newOrdersecondIncrement(
                                    order.new_order_timing,
                                    o_index,
                                    t_index,
                                    row_index
                                );
                            }
                        });
                    });
                });
                this.change_table_list = change_table_list_array;
                this.no_table_list_show = true;
                change_table_list_array.forEach((table, index) => {
                    if (
                        this.max_number_table_cap == table.capacity_of_person &&
                        table.id != max_number_table_id
                    ) {
                        this.no_table_list_show = false;
                    }
                });
            });
        },
        tableListFloorWise(id) {
            clearTimeout(this.timeoutId);
            this.intervalNewOrder.forEach(function (element) {
                clearInterval(element);
            });
            this.intervaltransferOrder.forEach(function (element) {
                clearInterval(element);
            });

            if (id != undefined) this.active_floor_id = id;
            axios
                .get("/api/table-list-floor-wise/" + this.active_floor_id)
                .then((res) => {
                    this.current_capacity = res.data.current_capacity;
                    this.floorlist = res.data.floorlist;
                    var row_tables = [];
                    var cal_of_capacity = 0;
                    var single_row_data = [];
                    var change_table_list_array = [];
                    var max_number_table_id = 0;
                    res.data.tables.forEach((table, index) => {
                        // if(parseInt(cal_of_capacity) > 18){
                        if (parseInt(cal_of_capacity) > 6) {
                            row_tables.push(single_row_data);
                            single_row_data = [];
                            cal_of_capacity = 0;
                        }

                        if (parseInt(table.capacity_of_person) % 2 != 0) {
                            var cap = parseInt(table.capacity_of_person - 1);
                            var up_table =
                                (parseInt(table.capacity_of_person) + 1) / 2;
                            var down_table =
                                (parseInt(table.capacity_of_person) - 1) / 2;
                        } else {
                            var cap = parseInt(table.capacity_of_person) - 2;
                            var up_table =
                                parseInt(table.capacity_of_person) / 2;
                            var down_table =
                                parseInt(table.capacity_of_person) / 2;
                        }

                        var col = (cap / 2) * 5 + 20;

                        table["col"] = col > 100 ? 100 : col;
                        table["up_table"] = up_table;
                        table["down_table"] = down_table;

                        table["width"] = 182 + (up_table - 1) * 80;
                        single_row_data.push(table);

                        if (index == res.data.tables.length - 1) {
                            row_tables.push(single_row_data);
                            single_row_data = [];
                            cal_of_capacity = 0;
                        }

                        // cal_of_capacity = parseInt(cal_of_capacity) + parseInt(table.capacity_of_person);
                        cal_of_capacity =
                            parseInt(cal_of_capacity) +
                            parseInt(table.orders.length);

                        // set change table list upon capacity

                        var obj = {
                            id: table.id,
                            capacity_of_person: parseInt(
                                table.capacity_of_person
                            ),
                            table_number: table.table_number,
                        };

                        change_table_list_array.push(obj);
                        // Max Number Capacity Table Id
                        // if(this.max_number_table_cap <= parseInt(table.capacity_of_person)) {
                        //     max_number_table_id = parseInt(table.id);
                        //     this.max_number_table_cap = parseInt(table.capacity_of_person);
                        // }
                        if (
                            parseInt(res.data.max_table_cap) ==
                            parseInt(table.capacity_of_person)
                        ) {
                            max_number_table_id = parseInt(table.id);
                            this.max_number_table_cap = parseInt(
                                table.capacity_of_person
                            );
                            this.max_number_table_data = table;
                        }
                    });
                    this.max_number_table_id = max_number_table_id;
                    this.row_tables = row_tables;

                    this.row_tables.forEach((tables, row_index) => {
                        tables.forEach((table, t_index) => {
                            table.orders.forEach((order, o_index) => {
                                if (o_index == 0) {
                                    this.timingCountOrder(
                                        order.time_left,
                                        order.finish_time,
                                        o_index,
                                        t_index,
                                        row_index
                                    );
                                }
                                if (
                                    order.is_order_moved &&
                                    this.highlight_time_on_off == 1
                                ) {
                                    this.secondIncrement(
                                        order.order_moved,
                                        o_index,
                                        t_index,
                                        row_index
                                    );
                                }
                                if (
                                    order.is_new_order_timing &&
                                    this.highlight_time_on_off == 1
                                ) {
                                    this.newOrdersecondIncrement(
                                        order.new_order_timing,
                                        o_index,
                                        t_index,
                                        row_index
                                    );
                                }
                            });
                        });
                    });
                    this.change_table_list = change_table_list_array;
                    this.no_table_list_show = true;
                    change_table_list_array.forEach((table, index) => {
                        if (
                            this.max_number_table_cap ==
                                table.capacity_of_person &&
                            table.id != max_number_table_id
                        ) {
                            this.no_table_list_show = false;
                        }
                    });
                });
        },
        startDrag(id, tableId) {
            this.dragOrderId = id;
            this.dragOrderTableId = tableId;
        },
        onDrop(event) {
            var endTarget = document.elementFromPoint(
                event.changedTouches[0].pageX,
                event.changedTouches[0].pageY
            );
            var table = endTarget.closest(".drop-target");
            if (table) var tableId = $(table).data("id");

            if (
                !tableId ||
                !this.dragOrderTableId ||
                tableId == this.dragOrderTableId
            )
                return false;

            var order_id = this.dragOrderId;
            var floor_name = $(table).data("name");
            var table_number = $(table).data("tnumber");

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
                            if (res.data.success) this.tableList();
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
        },
        changeTable(order_id, table_number, floor_name) {
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
                                this.tableListFloorWise(this.active_floor_id);
                            }
                        });
                }
            );

            // setTimeout(() => {
            $(".dialog-title").html("<img src='/images/success.png'>");
            $(".dialog-button").addClass(
                "col button button-raised button-large text-transform-capitalize"
            );
            $(".dialog-button").eq(0).addClass("text-color-black");
            $(".dialog-button").eq(1).addClass("active");
            $(".dialog-button").css("width", "50%");
            // }, 50);
        },
        changeFloor(order_id, floor_id, floor_name) {
            f7.popover.close();
            // $(".navbar").addClass('bg-color-white');
            // $(".navbar-bg").css('width', '100%');
            // $(".navbar-bg").css('background', 'var(--f7-navbar-bg-color)');

            f7.dialog.confirm(
                "Are you sure to order transfer to " + floor_name + " ?",
                () => {
                    axios
                        .post("/api/change-floor-order", {
                            floor_id: floor_id,
                            id: order_id,
                        })
                        .then((res) => {
                            if (res.data.success) {
                                this.tableListFloorWise(floor_id);
                            } else {
                                this.$root.errorNotification(res.data.message);
                                return false;
                            }
                        });
                }
            );

            // setTimeout(() => {
            $(".dialog-title").html("<img src='/images/success.png'>");
            $(".dialog-button").addClass(
                "col button button-raised button-large text-transform-capitalize"
            );
            $(".dialog-button").eq(0).addClass("text-color-black");
            $(".dialog-button").eq(1).addClass("active");
            $(".dialog-button").css("width", "50%");
            // }, 50);
        },
        finishNext(id) {
            f7.popover.close();
            f7.dialog.confirm(
                "Are you sure to finish this order and going to next?",
                () => {
                    axios.post("/api/finish-next", { id: id }).then((res) => {
                        this.tableListFloorWise(this.active_floor_id);
                    });
                }
            );
            setTimeout(() => {
                $(".dialog-button")
                    .eq(1)
                    .css({ "background-color": "#F33E3E", color: "#fff" });
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
        },
        cancelNext(id) {
            f7.popover.close();
            f7.dialog.confirm(
                "Are you sure to cancel this order and going to next?",
                () => {
                    axios
                        .post("/api/cancel-next", {
                            id: id,
                            cancelled_by: "Manager",
                        })
                        .then((res) => {
                            this.tableListFloorWise(this.active_floor_id);
                        });
                }
            );
            setTimeout(() => {
                $(".dialog-button")
                    .eq(1)
                    .css({ "background-color": "#F33E3E", color: "#fff" });
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
        },
        /* For get every order time when open the detail-popup*/
        getRemainingTime(id) {
            // f7.popup.open('.popover-table-'+id);
            // '.popover-table-'+order.id
            axios.post("/api/get-remaining-time", { id: id }).then((res) => {
                this.popup_remaining_time = res.data.time;
                this.popup_remaining_time_over = res.data.time_over;
            });
        },
        addMinutes() {
            if (this.minutes == "") {
                this.$root.errorNotification("Please add minutes in order");
                return false;
            }
            axios
                .post("/api/add-minutes-order", {
                    minutes: this.minutes,
                    orderId: this.orderId,
                })
                .then((res) => {
                    f7.popup.close();
                    this.minutes = "";
                    this.tableListFloorWise(this.active_floor_id);
                });
        },
        checknumbervalidate(evt) {
            evt = evt ? evt : window.event;
            var charCode = evt.which ? evt.which : evt.keyCode;
            if (
                charCode > 31 &&
                (charCode < 48 || charCode > 57) &&
                charCode !== 46
            ) {
                evt.preventDefault();
            } else {
                return true;
            }
        },
    },
};
</script>

<style scoped>
/* *{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
} */
.addMinutesPopup .addminutes-form .minutes_input .add-minutes-input {
    border-radius: 10px 0 0 10px !important;
    background: #fafafa;
    height: 45px;
}
.addMinutesPopup.popup {
    top: 35% !important;
    left: 34% !important;
}
.popup_button .button {
    border-radius: 10px;
}
.minutes_text {
    height: 45px;
    line-height: 45px;
    border: 1px solid #e7e7e7;
    border-radius: 0 10px 10px 0;
    padding: 0 10px;
    background-color: #fafafa;
}

.popup_title {
    font-weight: 500;
    font-size: 18px;
    line-height: 22px;
    color: #38373d;
}
.addminutes-form {
    border-top: 1px solid #d8d8d8;
}
.mr-72 {
    margin-right: 72px;
}
.current_capacity_card .card-content {
    padding-right: 8px !important;
    padding-left: 18px !important;
}
.menu-item-dropdown .menu-item-content .f7-icons {
    font-size: 15px;
    margin-left: 10px;
}
.border__bottom {
    border-bottom: 0.5px solid #555555;
}
.w-100 {
    width: 100%;
}
.justify_content_between {
    justify-content: space-between;
}
.header-links {
    box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.15);
    background-color: #fff;
    height: 60px !important;
    position: fixed;
    width: 100%;
    z-index: 99;
}
.height-40 {
    height: 40px;
}

.nav-link,
.menu-item-content {
    height: 100%;
    text-transform: capitalize;
}
.menu-item-content {
    position: relative;
    z-index: 9;
}
.menu-dropdown-content {
    box-shadow: 0px 0.5px 12px rgba(0, 0, 0, 0.2);
    min-width: 100% !important;
    top: -30px;
}
.menu-dropdown-center:before,
.menu-dropdown-center:after {
    content: none;
}
.bg-dark {
    background: #38373d;
}
.menu-item-dropdown-opened .menu-item-content {
    background: #ff2d55;
}
.menu-dropdown-link {
    border-bottom: 1px solid #efefef;
}
.col-25 {
    padding: 5px;
}
.table_image {
    height: 100%;
    min-height: 44px;
}
.card {
    border-radius: 10px;
}
.size-18 {
    font-size: 18px;
}
p.table__text {
    font-size: 14px;
    line-height: 22px;
    color: #555555;
}
p.count__text {
    font-weight: 600;
    font-size: 16px;
    line-height: 22px;
    color: #555555;
}
.table_row {
    display: flex;
}
.table_row .table_1 {
    border-left: 10px solid #0fc963;
    width: 100%;
    height: 190px;
}
.table_row .table_2 {
    border-left: 10px solid #ff6161;
    width: 100%;
    min-width: 332px;
}
.table_row .table_3 {
    border-left: 10px solid #fc8e5e;
    width: 100%;
    min-width: 412px;
}
.table_row .table_4 {
    border-left: 10px solid #ff619a;
    width: 100%;
    min-width: 500px;
}
.table_row .table_4 .card-content,
.table_row .table_5 .card-content {
    padding-top: 50px;
}
.table_row .table_10 .card-content {
    padding-top: 50px;
}
.table_row .table_4_margin {
    margin-right: 103px;
}
.table_row .table_5 {
    border-left: 10px solid #9ecbff;
    width: 100%;
    min-width: 574px;
}
.table_row .table_9 {
    width: 100%;
    min-width: 182px;
    /*max-width: 182px;*/
    margin: 0 auto;
    border-left: 10px solid #fcd95e;
}
.table_row .table_10 {
    width: 100%;
    min-width: 1120px;
    margin: 0 auto;
    border-left: 10px solid #c6c6c6;
}
.tables {
    overflow-x: auto;
}
.table_main {
    width: 100%;
    height: calc(100vh - 70px);
    overflow: auto;
    margin-top: 70px;
}
.center_table_card {
    margin-left: 83px;
    margin-right: 83px;
}
.tables .row {
    flex-wrap: nowrap !important;
}
/*.tables .table_row .row{
    flex-wrap: wrap !important;
}*/
.table_card_right_margin {
    margin-right: 72px;
}
.table1__details {
    width: 100%;
    /* overflow-x: auto; */
    height: 100%;
    max-height: 122px;
    display: flex;
    align-items: end;
}

.table2__details {
    width: 100%;
    max-width: 323px;
    overflow-x: auto;
}
.table3__details {
    width: 100%;
    max-width: 426px;
    overflow-x: auto;
}
.person {
    white-space: nowrap;
}
/*=========  TABLE SWIPER ============*/
.swiper-slide.active {
    background: transparent !important;
    border-bottom: 1px solid #f33e3e;
}
.swiper-slide.active p {
    color: #f33e3e !important;
}
.table_main
    .table_floor_swiper
    .floor_swiper_inner
    .swiper-slide
    p.swiper_text {
    font-weight: 500;
    font-size: 14px;
    line-height: 21px;
    color: #38373d;
    white-space: nowrap;
    justify-content: center;
}
.table_main .table_floor_swiper .floor_swiper_inner {
    border-bottom: 1px solid #e0e0e0;
    /*margin-left: 20px;*/
}
.table_main .table_floor_swiper .floor_swiper_inner .room_available {
    width: 35px;
    height: 21px;
    background: #fdd5d5;
    border-radius: 2px;
    color: #f33e3e;
    font-weight: 500;
    font-size: 12px;
    line-height: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 5px;
}
.h_100 {
    height: 100%;
}
/*=============== POPOVER=================*/
.popover.popover-move {
    background-color: #f33e3e;
    border: 0.5px solid transparent;
}
.popover {
    width: 100%;
    max-width: 180px;
    box-shadow: 0px 0px 10px rgb(0 0 0 / 27%);
    background: #fff;
    border: 0.5px solid #999999;
    border-radius: 7px;
}
.floor-drop-down {
    min-width: 250px;
    max-width: 250px;
    position: absolute;
    left: 100%;
    background: white;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    opacity: 0;
    visibility: hidden;
    transform: translateY(2em);
    border: 0.5px solid #999999;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    max-height: 360px;
    overflow-y: auto;
    border-radius: 7px;
}
/*.floor-drop-down::before{
content: '';
    background: var(--f7-popover-bg-color);
    width: 26px;
    height: 26px;
    position: absolute;
    left: 0;
    top: 0;
    border-radius: 3px;
    transform: rotate(45deg);
}*/
.table-drop-down {
    max-width: 240px;
    min-width: 240px;
    position: absolute;
    background: white;
    left: 100%;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    opacity: 0;
    visibility: hidden;
    transform: translateY(2em);
    border: 0.5px solid #999999;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    max-height: 360px;
    overflow-y: auto;
    border-radius: 7px;
}
.floor__list.add_right_before::before {
    position: absolute;
    content: "";
    width: 19px;
    height: 19px;
    border-radius: 3px;
    background: #fff;
    right: -9px;
    bottom: 63px;
    transform: rotate(45deg);
    opacity: 1;
}
.floor__list.add_left_before::before {
    position: absolute;
    content: "";
    width: 19px;
    height: 19px;
    border-radius: 3px;
    background: #fff;
    left: -9px;
    bottom: 63px;
    transform: rotate(45deg);
    opacity: 1;
}
.table__list.add_right_before::before {
    position: absolute;
    content: "";
    width: 19px;
    height: 19px;
    border-radius: 3px;
    background: #fff;
    right: -9px;
    bottom: 21px;
    transform: rotate(45deg);
    opacity: 1;
}
.table__list.add_left_before::before {
    position: absolute;
    content: "";
    width: 19px;
    height: 19px;
    border-radius: 3px;
    background: #fff;
    left: -9px;
    bottom: 21px;
    transform: rotate(45deg);
    opacity: 1;
}
.floor_dropdown_visible {
    opacity: 1;
    visibility: visible;
    transform: translateY(-1em);
}
.popover-angle:after {
    border: 0.5px solid #999999 !important;
}
.popover-angle.on-bottom:after {
    border: 0.5px solid #999999 !important;
}
.floor_room_available .room_available {
    width: 35px;
    height: 21px;
    background: #fdd5d5;
    border-radius: 2px;
    color: #f33e3e;
    font-weight: 500;
    font-size: 12px;
    line-height: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 5px;
}
.floor_name {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    width: 172px;
}
/*=========== ONGOING POPOVER =============*/
.ongoing_popover {
    background-color: #e2e2e2;
    /* left : 5px; */
    border: 1px solid #c4c4c4;
    position: relative;
}
.table_reservation_info {
    height: 70px;
}
.ongoing_blinking {
    position: relative;
    height: 100%;
    left: 5px;
}
.ongoing_blinking::before {
    position: absolute;
    content: "";
    top: -7px;
    left: -11px;
    background-image: url("/images/finish_blinking2.gif");
    background-repeat: no-repeat;
    background-position: center;
    background-size: 180px 220px;
    width: 100%;
    height: 100%;
    /* z-index: 9999; */
}
/*========= NEW ORDER ADD ========*/
.neworder_add {
    background-image: url("/images/blinking.gif");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    position: relative;
}
.order_tooltip {
    background: #f33e3e;
    color: #fff;
    position: absolute;
    padding: 5px;
    border-radius: 5px;
    width: 100%;
    max-width: 96px;
    left: 0;
    text-align: center;
    font-weight: 500;
}
.neworder_tooltip {
    top: -44px;
}
.finish_order_tooltip {
    top: -43px;
    padding: 10px;
    font-size: 12px;
}
.order_tooltip::before {
    content: "";
    position: absolute;
    top: 99%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #f33e3e transparent transparent transparent;
}
/*========= NEW ORDER ADD END ========*/

.hamburger__button {
    display: none;
}
@media screen and (max-width: 820px) {
    .table_9_chair {
        width: 100%;
        min-width: 1120px;
    }
    .margin_right {
        margin-right: 45px;
    }
    .margin_left {
        margin-left: 45px;
    }
    .table-card {
        width: 100% !important;
    }
    .current_capacity_card .card-content {
        padding-right: 8px !important;
        padding-left: 8px !important;
    }
    .current_capacity_card .card-content p {
        font-size: 13px;
    }
    /*.closeReservation{
        border: none;
        background-color: transparent;
        text-align:start;
    }
    .tablate_view_menu{
        display:none;
    }
    .hamburger__button{
        display: block;
        text-align:end;
        width:100%;
    }
    .menu-dropdown-content{
        z-index:2;
    }*/
}
.table_reservation {
    height: 60px;
}
.extra-div {
    min-width: 300px;
    visibility: hidden;
}
.time-over {
    border: 1px solid #000;
}
</style>

<style>
.demo-swiper .swiper-slide,
.demo-swiper-multiple .swiper-slide {
    background: transparent;
}
.popover-move .popover-angle:after {
    background: #f33e3e !important;
    border: 0.5px solid transparent !important;
}
.popover-angle:after {
    border: 0.5px solid #999999 !important;
}
.ios .popover-angle.on-bottom:after {
    left: 0;
    top: -22px !important;
}

* {
    box-sizing: border-box;
}
.header-link .button {
    border-radius: 10px !important;
}
.header-link .menu-item {
    border-radius: 10px !important;
    background: #38373d !important;
}
.nav-button {
    text-transform: capitalize;
}
.navbar a.link {
    color: #000;
}

.right {
    width: 40%;
    margin-left: 0 !important;
}
.header-link {
    width: 100%;
}
.header-link button {
    text-transform: capitalize;
}
.card-header {
    background: transparent;
    min-height: 0 !important;
    overflow: hidden;
    color: #000;
    border-radius: 10px 10px 0 0 !important;
}
.card-header:after {
    background-color: transparent !important;
}
.header_detail {
    width: 100%;
}
.person-info i {
    font-size: 12px !important;
    padding-right: 5px;
    white-space: nowrap;
}
.person-info {
    background: #f1f1f1;
    border-radius: 5px;
    padding: 7px 5px !important;
    font-size: 10px !important;
    width: 100%;
    max-width: 96px;
    margin-right: 30px;
    position: relative;
    height: 60px;
}
.person-info .person_info_name p {
    font-weight: 500;
    font-size: 10px;
    line-height: 12px;
    color: #38373d;
}
.person-info_move {
    background: #fff;
    border: 1px solid #f33e3e;
    box-shadow: 0px 0px 10px rgb(241 2 2 / 29%);
}
.waiting-time {
    border-left: 0.5px solid #555555;
    padding-left: 8px;
    margin-left: 8px;
}
.table_reservation_info .person-info span {
    font-size: 12px;
    line-height: 15px;
    color: #38373d;
}
.bg-color-dark-pink {
    background-color: #f33e3e !important;
}

.dialog-text {
    font-weight: 500;
    font-size: 20px;
    line-height: 24px;
}

.dialog-inner:after {
    content: none !important;
}

.dialog {
    background-color: #fff !important;
    width: 378px !important;
    /*transform: translate(-13%, -50%) !important;*/
    transform: translateY(100%) !important;
    left: 45% !important;
}
.dialog.modal-in {
    transform: translateY(-50%) !important;
}

.dialog-button {
    margin: 0 5px !important;
    border-radius: var(--f7-dialog-border-radius) !important;
}

.dialog-buttons {
    margin: 0 5px 15px;
}
.table_row .card {
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.11);
}

/*.framework7-root {
    overflow: scroll !important;
    box-sizing: border-box;
    background: rgb(0 0 0 / 41%) !important;
}*/
.floor_blinking_img {
    width: 100%;
    height: 100%;
    max-width: 20px;
    max-height: 20px;
    margin-right: 5px;
}
@media screen and (max-width: 820px) {
    .dialog {
        transform: translateY(100%) !important;
        left: 43% !important;
    }
    .dialog.modal-in {
        transform: translateY(-100%) !important;
    }
}
</style>
