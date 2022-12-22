<template>
    <f7-page color="bg-color-white">
            <!-- <div class="header-links display-flex align-items-center padding-right" v-bind="dragOptions">
                <div class="row header-link justify-content-flex-end align-items-center tablate_view_menu">
                    <div class=" padding-left-half padding-right-half height-40 nav-button">
                        <a href="/Reservation/" class="col link nav-link button button-raised bg-dark text-color-white padding">
                            Reservation</a>
                    </div>
                    <div class="col-20 large-20 medium-25 nav-button">
                        <div class="menu-item menu-item-dropdown">
                            <div class="menu-item-content button button-raised bg-dark text-color-white padding-left-half padding-right-half">Menu management
                                <i class="f7-icons">chevron_down</i>
                            </div>
                            <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                                <div class="menu-dropdown-content bg-color-white no-padding">
                                    <a href="#" class="menu-dropdown-link menu-close margin-horizontal no-padding"></a>
                                    <a href="/food-category/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food Category</a>
                                    <a href="/food-subcategory/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food SubCategory</a>
                                    <a href="/food-product/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food Menu</a>
                                    <a href="/digital-menu/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Digital Menu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" padding-left-half padding-right-half height-40 nav-button"><a href="/Reporting/" class="col link nav-link button button-raised bg-dark text-color-white padding">Reporting</a></div>
                    <div class=" padding-left-half padding-right-half height-40 nav-button"><button class="col nav-link button button-raised bg-dark text-color-white padding closeReservation" @click="$root.closeReservation()">Close reservation</button></div>
                    <div class=" padding-left-half padding-right-half height-40 nav-button"><a href="/settings/" class="col link nav-link button button-raised bg-dark text-color-white padding">Settings</a></div>
                </div>
            </div> -->
        <div class="table_main">
            <!-- ============= TABLE FLOOR SWIPER ============= -->
           <div class="table_floor_swiper">
                <div class="row">
                    <div class="col-100">
                        <div data-pagination='{"el":".swiper-pagination"}' data-navigation="{'el':'.swiper-navigation'}" data-space-between="10" data-slides-per-view="4"
                            class="swiper swiper-init demo-swiper margin-top margin-bottom floor_swiper_inner swiper-navigation">
                            <!-- <div class="swiper-pagination"></div> -->
                           <div class="swiper-wrapper padding-left-half">
                                 <div class="swiper-slide" :class="{'active' : floor.id == active_floor_id}"  v-for="floor in floorlist" :key="floor.id" @click="tableListFloorWise(floor.id)">
                                    <p class="no-margin text-align-center margin-vertical-half swiper_text display-flex">{{ floor.name }}
                                        <span class="room_available color-blue">{{ floor.activetables_count }}</span>
                                    </p>
                                </div>

                            <!-- <carousel :items-to-show="3">
                                <slide v-for="floor in floorlist" :key="floor.id">
                                    <div class="swiper-slide slide-active">
                                        <p class="no-margin text-align-center margin-top-half swiper_text display-flex">{{ floor.name }}
                                            <span class="room_available color-blue">{{ floor.total_order }}</span>
                                        </p>
                                    </div>
                                </slide>

                                <template #addons>
                                  <navigation />
                                  <pagination />
                                </template>
                              </carousel> -->
                            </div>
                        </div>
                        <!-- <div class="margin-top margin-bottom floor_swiper_inner">
                            <f7-swiper navigation :speed="500" :slidesPerView="5" :spaceBetween="5">
                                <f7-swiper-slide>
                                    <div class="swiper-slide slide-active">
                                        <p class="no-margin text-align-center margin-top-half swiper_text display-flex">Ground Floor (Non-AC)
                                            <span class="room_available color-blue">20</span>
                                        </p>
                                    </div>
                                </f7-swiper-slide>
                                <f7-swiper-slide>
                                    <div class="swiper-slide">
                                        <p class="no-margin text-align-center margin-top-half swiper_text display-flex">First Floor (AC)
                                            <span class="room_available color-blue">20</span>
                                        </p>
                                    </div>
                                </f7-swiper-slide>
                                <f7-swiper-slide>
                                    <div class="swiper-slide">
                                        <p class="no-margin text-align-center margin-top-half swiper_text display-flex">Second Floor (AC)
                                            <span class="room_available color-blue">20</span>
                                        </p>
                                    </div>
                                </f7-swiper-slide>
                                <f7-swiper-slide>
                                    <div class="swiper-slide">
                                        <p class="no-margin text-align-center margin-top-half swiper_text display-flex">Third Floor (AC)
                                            <span class="room_available color-blue">20</span>
                                        </p>
                                    </div>
                                </f7-swiper-slide>
                                <f7-swiper-slide>
                                    <div class="swiper-slide">
                                        <p class="no-margin text-align-center margin-top-half swiper_text display-flex">Fourth Floor (AC)
                                            <span class="room_available color-blue">20</span>
                                        </p>
                                    </div>
                                </f7-swiper-slide>
                                <f7-swiper-slide>
                                    <div class="swiper-slide">
                                        <p class="no-margin text-align-center margin-top-half swiper_text display-flex">Fifth Floor (AC)
                                            <span class="room_available color-blue">20</span>
                                        </p>
                                    </div>
                                </f7-swiper-slide>
                                <f7-swiper-slide>
                                    <div class="swiper-slide">
                                        <p class="no-margin text-align-center margin-top-half swiper_text display-flex">Sixth Floor (AC)
                                            <span class="room_available color-blue">20</span>
                                        </p>
                                    </div>
                                </f7-swiper-slide>
                                <f7-swiper-slide>
                                    <div class="swiper-slide">
                                        <p class="no-margin text-align-center margin-top-half swiper_text display-flex">Seventh Floor (AC)
                                            <span class="room_available color-blue">20</span>
                                        </p>
                                    </div>
                                </f7-swiper-slide>
                                <f7-swiper-slide>
                                    <div class="swiper-slide">
                                        <p class="no-margin text-align-center margin-top-half swiper_text display-flex">Eighth Floor (AC)
                                            <span class="room_available color-blue">20</span>
                                        </p>
                                    </div>
                                </f7-swiper-slide>
                            </f7-swiper>
                        </div> -->
                    </div>
                    <!-- <div class="col-100">
                        <div class="current_capacity">
                            <div class="current_capacity_card card display-flex align-items-center no-margin-vertical">
                                <div class="card_img padding-left-half">
                                    <img src="/images/capacity.png" alt="">
                                </div>
                                <div class="card-content card-content-padding padding-vertical-half padding-left">
                                    <p class="no-margin">Current Capacity</p>
                                    <span class="text-color-red">{{ current_capacity.toFixed(2) }}% Full</span>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
           </div>
            <div class="tables margin-horizontal">
                <div class=" table_row margin-horizontal padding-top margin-top" v-for="row  in row_tables" :key="row">
                    <!-- <div class="no-padding margin-bottom table-card" :class="[('col-'+table.col)]" v-for="table in row" :key="table.id"> -->
                    <div class="no-padding margin-bottom table-card mr-72" :style="'min-width: '+table.width+'px'"  v-for="(table,t_index) in row" :key="table.id">
                        <!--======= TABLE CHAIR ========= -->
                        <div class="row table_top_chair">
                            <div class="col" v-for="index in table.up_table" :key="index">
                                <div class="table_card_img text-align-center">
                                    <img :src="'/images/table/'+table.color.color+'.png'" alt="table">
                                </div>
                            </div>
                        </div>
                        <div class="card no-margin table_1 equal-height-table drop-target"  :data-id="table.id" :data-name="table.floor.name" :data-tnumber="table.table_number" :style="('border-left : 10px solid rgb('+table.color.rgb)+')'" >
                            <div class="card-header no-padding">
                                <div class="row header_detail">
                                    <div class="table-number padding-half"> <p class="no-margin table__text">Table No.</p>
                                    <p class=" text-align-center no-margin count__text"> {{ table.table_number }}</p>
                                    </div>
                                    <div class="table-capacity text-align-right padding-half">
                                        <p class="no-margin table__text"> Capacity </p> <p class="text-align-center no-margin count__text">{{ table.capacity_of_person }}</p> </div>
                                </div>
                            </div>
                            <div class="card-content padding-top  padding-horizontal-half table1__details" :style="'max-width : '+(table.width - 20 )+'px'">
                                <div class="table_reservation margin-bottom">
                                    <!-- <h3 class="no-margin-top">Reserved</h3> -->
                                    <div class="display-flex">
                                        <!-- <draggable :scroll-sensitivity="250"  :force-fallback="true" class="dragArea list-group w-full" :class="'dragger'+table.id" :list="order[index]" @start="startDrag(order.id, table.id)" @touchend.prevent="onDrop" v-for="(order,index) in table.orders" :key="order.id"> -->

                                            <div class="table_reservation_info" :class="'test'+order.id" v-for="(order,index) in table.orders" :key="order.id" >
                                                <div class="person-info popover-open" :class="['popover-click-' + order.id, { 'person-info_move': order.is_order_moved }]" :data-popover="'.popover-table-'+order.id"  @click="order_person = order.person; removebackdrop()">
                                                    <div class="person_info_name border__bottom padding-bottom-half margin-bottom-half">
                                                        <p class="no-margin text-align-center">By {{ order.role }}</p>
                                                    </div>
                                                    <div class="text-align-center person">
                                                        <i class="f7-icons size-22">person</i>
                                                        <span>&nbsp;{{order.person}}</span>
                                                        <span class="waiting-time margin-top-half text-align-center">
                                                            <!-- <i class="f7-icons size-22">clock_fill</i> -->
                                                            <span>{{ order.reservation_time }}</span>
                                                        </span>
                                                    </div>
                                                    <div class="popover padding-half" v-if="!order.is_order_moved" :class="'popover-table-' + order.id">
                                                        <div class="user-info popover-inner">
                                                            <div class="display-flex padding-left-half padding-top-half align-items-center">
                                                                <i class="f7-icons size-18 text-color-black padding-right-half margin-right-half">person</i>
                                                                <span class="text-color-black">{{ order.customer.name }}</span>
                                                            </div>
                                                            <div class="display-flex padding-left-half padding-top align-items-center">
                                                                <i class="f7-icons size-18 text-color-black padding-right-half margin-right-half">clock</i>
                                                                <span class="text-color-black">{{ order.reservation_time_12_format }}</span>
                                                            </div>
                                                            <div class="display-flex padding-left-half padding-top align-items-center">
                                                                <i class="f7-icons size-18 text-color-black padding-right-half margin-right-half">phone</i>
                                                                <span class="text-color-black">{{ order.customer.number }}</span>
                                                            </div>
                                                            <div class="display-flex padding-left-half padding-vertical align-items-center">
                                                                <i class="f7-icons size-18 text-color-black padding-right-half margin-right-half">person_2</i>
                                                                <span class="text-color-black">{{ order.person }} family member</span>
                                                            </div>
                                                            <div class="floor__list">
                                                                <div class="card-footer no-margin no-padding justify-content-center hassubs" @click="openFloorList(order.id)">
                                                                    <h3 class="text-color-red">Change Floor</h3>
                                                                </div>
                                                                <!-- ============FLOOR DROP DOWN  ============= -->
                                                                <div class="list simple-list floor_dropdwon" :class="'f_f'+order.id">
                                                                    <ul>
                                                                        <li v-for="floor in floorlist" :key="floor.id" @click="changeFloor(order.id,floor.id,floor.name)" :class="(table.floor.id == floor.id) ? 'display-none' : ''">
                                                                            <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                                <div class="floor_name">
                                                                                    <span>{{ floor.name }} </span>
                                                                                </div>
                                                                                <div class="floor_room_available">
                                                                                    <span class="room_available">{{ floor.activetables_count }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <!-- ============FLOOR DROP DOWN END ============= -->
                                                            </div>
                                                            <div class="table__list">
                                                                <div class="card-footer no-margin no-padding justify-content-center hassubs" @click="openTableList(order)">
                                                                    <h3 class="text-color-red">Change Table</h3>
                                                                </div>
                                                                <!-- ============FLOOR DROP DOWN  ============= -->
                                                                <div class="list simple-list table_dropdwon" :class="'t_f'+order.id">
                                                                    <ul>
                                                                        <li v-for="changetable in change_table_list" :key="changetable.id" :class="(changetable.id == table.id || changetable.capacity_of_person < order_person) ? 'display-none' : ''" @click="changeTable(order.id, changetable.id, table.floor.name)">
                                                                            <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                                <div class="floor_name">
                                                                                    <span>Table No : {{ changetable.table_number }}</span>
                                                                                </div>
                                                                                <!-- <div class="floor_room_available">
                                                                                    <span class="room_available">20</span>
                                                                                </div> -->
                                                                            </div>
                                                                        </li>
                                                                        <li v-if="no_table_list_show && max_number_table_id == table.id">
                                                                            <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                                <div class="floor_name">
                                                                                    <span>Not above capacity table</span>
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
                                                    <div v-else class="popover popover-move padding" :class="'popover-table-' + order.id">
                                                        <div class="user-info popover-inner text-align-center">
                                                            <p class="text-color-white no-margin">Moved</p>
                                                            <p class="text-color-white no-margin">{{ order.order_moved }} seconds ago</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="table_reservation_info margin-bottom">
                                                <div class="person-info person-info_move popover-open" data-popover=".popover-move" @click="removebackdrop">
                                                    <div class="person_info_name border__bottom padding-bottom-half margin-bottom-half">
                                                        <p class="no-margin text-align-center">By Guest</p>
                                                    </div>
                                                    <div class="text-align-center person">
                                                        <i class="f7-icons size-22">person_fill</i>
                                                        <span>&nbsp;5</span>
                                                    </div>
                                                    <div class="waiting-time margin-top-half text-align-center">
                                                        <i class="f7-icons size-22">clock_fill</i>
                                                        <span>2:47</span>
                                                        <span>&nbsp;4</span>
                                                        <span class="waiting-time margin-top-half text-align-center">
                                                            <i class="f7-icons size-22">clock_fill</i>
                                                            <span>2:47</span>
                                                        </span>
                                                    </div>
                                                    <div class="popover popover-move padding">
                                                        <div class="user-info popover-inner text-align-center">
                                                            <p class="text-color-white no-margin">Moved</p>
                                                            <p class="text-color-white no-margin">50 seconds ago</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        <!-- </draggable> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--======= TABLE CHAIR ========= -->
                        <div class="row table_bottom_chair">
                            <div class="col" v-for="index in table.down_table" :key="index">
                                <div class="table_card_img text-align-center" >
                                    <img :src="'/images/table/'+table.color.color+'.png'" alt="table" style="transform : rotate(180deg)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="extra-div"></div> -->

                </div>
            </div>
        </div>
        </f7-page>
</template>

<script>
import { f7,f7Page, f7Navbar, f7BlockTitle, f7Block, f7Swiper, f7SwiperSlide} from 'framework7-vue';
import $ from 'jquery';
import axios from 'axios';
import { VueDraggableNext } from 'vue-draggable-next';
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'


export default {
    name : 'RegisterPage',
    data() {
        return {
            row_tables: [],
            dragOrderId: '',
            dragOrderTableId: '',
            floorlist: [],
            active_floor_id : 0,
            change_table_list : [],
            current_capacity : 0,
            max_number_table_id : 0,
            no_table_list_show: true,
            order_person: 0,
            max_number_table_cap: 0,
            max_number_table_data: [],
            intervalId : null,
            checkCallInterval: 1,
        }
    },
    computed: {
    dragOptions() {
      return {
        group: {
          name: 'table'
        },
        scrollSensitivity: 200,
        forceFallback: true
      };
    }
  },
    components : {
        f7,f7Page, f7Navbar, f7BlockTitle, f7Block,f7Swiper,f7SwiperSlide,draggable: VueDraggableNext,Carousel,Slide,Pagination,Navigation
    },
    mounted() {
        this.equal_height();
        $(document).on('click', '.popover-backdrop', function(){
        //    $(".navbar").addClass('bg-color-white');
        //    $(".navbar-bg").css('width', '100%');
           $(".navbar-bg").css('background', 'var(--f7-navbar-bg-color)');
           $(".table_dropdwon").removeClass('floor_dropdown_visible');
           $(".floor_dropdwon").removeClass('floor_dropdown_visible');
        });
        this.$root.activationMenu('table');
    },
    updated() {
        this.equal_height();
    },
    created() {
        this.tableList();
    },

    methods: {
        equal_height(){
            var highestBox = 0;
            var targetDiv = document.querySelectorAll('.equal-height-table');
            for(var i=0; i<targetDiv.length;i++){
            if(targetDiv[i].clientHeight > highestBox){
                    highestBox = targetDiv[i].clientHeight;
            }
            }
            document.querySelectorAll(".equal-height-table").forEach(node => node.style.height = highestBox + "px");
        },
        openFloorList(id){
            $('.table_dropdwon').removeClass('floor_dropdown_visible');
            $('.floor_dropdwon').toggleClass('floor_dropdown_visible');
            var ele = document.querySelector(".popover-click-"+id);
            var bounding = ele.getBoundingClientRect();
            if(screen.width > (bounding.left + bounding.width + 285)) {
                $(".f_f"+id).css('left', '100%');
            }else{
                $(".f_f"+id).css('left', '-135%');
            }
        },
        openTableList(order) {
            $('.floor_dropdwon').removeClass('floor_dropdown_visible');
            $('.table_dropdwon').toggleClass('floor_dropdown_visible');
            var ele = document.querySelector(".popover-click-" +order.id);
            var bounding = ele.getBoundingClientRect();
            if(screen.width > (bounding.left + bounding.width + 285)) {
                $(".t_f" + order.id).css('left', '100%');
            }else{
                $(".t_f" +order.id).css('left', '-135%');
            }
            $(".table_dropdwon").css('min-width', '240px');

            if (order.person < parseInt(this.max_number_table_data.capacity_of_person)) {
                this.no_table_list_show = false;
            }
            var person = order.person;
            if (parseInt(person) % 2 != 0 && order.table_id == this.max_number_table_data.id) {
                person = parseInt(person) + 1;
            }
            console.log(parseInt(this.max_number_table_data.capacity_of_person));
            if (order.table_id == this.max_number_table_data.id && person == parseInt(this.max_number_table_data.capacity_of_person)) {
                this.no_table_list_show = true;
            }
        },
        removebackdrop(){
            $('.floor_dropdwon').removeClass('floor_dropdown_visible');
            $('.table_dropdwon').removeClass('floor_dropdown_visible');
        },
        secondIncrement(second, orderIndex, tableIndex) {
            this.intervalId = setInterval(() => {
                if (second < 60) {
                    second++;
                    this.row_tables[0][tableIndex].orders[orderIndex].order_moved = second;
                }
            }, 1000);

            setTimeout(() => {
                this.tableListFloorWise(this.active_floor_id);
                f7.popover.close('.popover-move');
                clearInterval(this.intervalId);
             }, 60000);
        },
        tableList() {
            axios.get('/api/table-list-with-order')
            .then((res) => {
                this.current_capacity = res.data.current_capacity;
                this.floorlist = res.data.floorlist;
                this.active_floor_id = res.data.floorlist[0].id;
                var row_tables = [];
                var cal_of_capacity = 0;
                var single_row_data = [];
                var change_table_list_array = [];
                var max_number_table_id = 0;
                res.data.tables.forEach((table, index) => {
                    // calculation of row wise table list
                    if(parseInt(cal_of_capacity) > 18){
                        row_tables.push(single_row_data);
                        single_row_data = [];
                        cal_of_capacity = 0;
                    }

                    if(parseInt(table.capacity_of_person) % 2 != 0){
                        var cap = parseInt(table.capacity_of_person - 1);
                        var up_table = (parseInt(table.capacity_of_person) + 1) / 2;
                        var down_table = (parseInt(table.capacity_of_person) - 1)/ 2;
                    } else{
                        var cap = parseInt(table.capacity_of_person) - 2;
                        var up_table = parseInt(table.capacity_of_person) / 2;
                        var down_table = parseInt(table.capacity_of_person) / 2;
                    }


                    var col = (cap / 2) * 5 + 20;


                    table['col'] = col > 100 ? 100 : col;
                    table['up_table'] = up_table;
                    table['down_table'] = down_table;

                    table['width'] = 182 + ((up_table - 1)* 80)
                    single_row_data.push(table);

                    if(index == res.data.tables.length - 1){
                        row_tables.push(single_row_data);
                        single_row_data = [];
                        cal_of_capacity = 0;
                    }

                    cal_of_capacity = parseInt(cal_of_capacity) + parseInt(table.capacity_of_person);

                    // set change table list upon capacity

                    var obj = {
                        id: table.id,
                        capacity_of_person: parseInt(table.capacity_of_person),
                        table_number: table.table_number
                    };


                    change_table_list_array.push(obj);

                    // Max Number Capacity Table Id
                    if (parseInt(res.data.max_table_cap) == parseInt(table.capacity_of_person)) {
                        max_number_table_id = parseInt(table.id);
                        this.max_number_table_cap = parseInt(table.capacity_of_person);
                        this.max_number_table_data = table;
                    }
                    table.orders.forEach((order, o_index) => {
                        if (order.is_order_moved) {
                            this.secondIncrement(order.order_moved, o_index, index);
                        }
                    });
                });
                this.max_number_table_id = max_number_table_id;
                this.row_tables = row_tables;
                this.change_table_list = change_table_list_array;
                this.no_table_list_show = true;
                change_table_list_array.forEach((table, index) => {
                    if (this.max_number_table_cap == table.capacity_of_person && table.id != max_number_table_id) {
                        this.no_table_list_show = false;
                    }
                });
            })
        },
        tableListFloorWise(id) {
            this.active_floor_id = id;
            axios.get('/api/table-list-floor-wise/'+id)
                .then((res) => {
                this.current_capacity = res.data.current_capacity;
                var row_tables = [];
                var cal_of_capacity = 0;
                var single_row_data = [];
                var change_table_list_array = [];
                var max_number_table_id = 0;
                res.data.tables.forEach((table, index) => {
                    if(parseInt(cal_of_capacity) > 18){
                        row_tables.push(single_row_data);
                        single_row_data = [];
                        cal_of_capacity = 0;
                    }


                    if(parseInt(table.capacity_of_person) % 2 != 0){
                        var cap = parseInt(table.capacity_of_person - 1);
                        var up_table = (parseInt(table.capacity_of_person) + 1) / 2;
                        var down_table = (parseInt(table.capacity_of_person) - 1)/ 2;
                    } else{
                        var cap = parseInt(table.capacity_of_person) - 2;
                        var up_table = parseInt(table.capacity_of_person) / 2;
                        var down_table = parseInt(table.capacity_of_person) / 2;
                    }


                    var col = (cap / 2) * 5 + 20;


                    table['col'] = col > 100 ? 100 : col;
                    table['up_table'] = up_table;
                    table['down_table'] = down_table;

                    table['width'] = 182 + ((up_table - 1)* 80)
                    single_row_data.push(table);

                    if(index == res.data.tables.length - 1){
                        row_tables.push(single_row_data);
                        single_row_data = [];
                        cal_of_capacity = 0;
                    }

                    cal_of_capacity = parseInt(cal_of_capacity) + parseInt(table.capacity_of_person);

                    // set change table list upon capacity

                    var obj = {
                        id: table.id,
                        capacity_of_person: parseInt(table.capacity_of_person),
                        table_number: table.table_number
                    };


                    change_table_list_array.push(obj);
                    // Max Number Capacity Table Id
                    // if(this.max_number_table_cap <= parseInt(table.capacity_of_person)) {
                    //     max_number_table_id = parseInt(table.id);
                    //     this.max_number_table_cap = parseInt(table.capacity_of_person);
                    // }
                    if (parseInt(res.data.max_table_cap) == parseInt(table.capacity_of_person)) {
                        max_number_table_id = parseInt(table.id);
                        this.max_number_table_cap = parseInt(table.capacity_of_person);
                        this.max_number_table_data = table;
                    }

                    table.orders.forEach((order, o_index) => {
                        if (order.is_order_moved) {
                            this.secondIncrement(order.order_moved, o_index, index);
                        }
                    });
                });
                this.max_number_table_id = max_number_table_id;
                this.row_tables = row_tables;
                this.change_table_list = change_table_list_array;
                this.no_table_list_show = true;
                change_table_list_array.forEach((table, index) => {
                    if(this.max_number_table_cap == table.capacity_of_person && table.id != max_number_table_id){
                        this.no_table_list_show = false;
                    }
                });

            })
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
            var table = endTarget.closest('.drop-target');
            if(table) var tableId = $(table).data('id');

            if(!tableId || !this.dragOrderTableId ||  tableId == this.dragOrderTableId) return false;

            var order_id = this.dragOrderId;
            var floor_name = $(table).data('name');
            var table_number = $(table).data('tnumber');

            f7.dialog.confirm('Are you sure to order transfer to '+floor_name+'(Table Number : '+table_number+') ?', () => {
                axios.post('/api/change-order-table', { table_number: table_number , id : order_id})
                .then((res) => {
                    if(res.data.success)  this.tableList();
                })
            });

            setTimeout(() => {
                    $('.dialog-title').html("<img src='/images/success.png'>");
                    $('.dialog-button').addClass('col button button-raised button-large text-transform-capitalize');
                    $('.dialog-button').eq(1).addClass('active');
                    $('.dialog-button').css('width', '50%');
                }, 50);
        },
        changeTable(order_id, table_number, floor_name) {
            f7.popover.close();
            f7.dialog.confirm('Are you sure to order transfer to '+floor_name+'(Table Number : '+table_number+') ?', () => {
                axios.post('/api/change-order-table', { table_number: table_number , id : order_id})
                .then((res) => {
                    if (res.data.success) {
                        this.tableListFloorWise(this.active_floor_id)
                    }
                })
            });

            // setTimeout(() => {
                    $('.dialog-title').html("<img src='/images/success.png'>");
                    $('.dialog-button').addClass('col button button-raised button-large text-transform-capitalize');
                    $('.dialog-button').eq(1).addClass('active');
                    $('.dialog-button').css('width', '50%');
                // }, 50);
        },
        changeFloor(order_id, floor_id,floor_name) {
            f7.popover.close();
            // $(".navbar").addClass('bg-color-white');
            // $(".navbar-bg").css('width', '100%');
            // $(".navbar-bg").css('background', 'var(--f7-navbar-bg-color)');

            f7.dialog.confirm('Are you sure to order transfer to '+floor_name+' ?', () => {
                axios.post('/api/change-floor-order', { floor_id: floor_id , id : order_id})
                .then((res) => {
                    if(res.data.success) {
                        this.tableListFloorWise(this.active_floor_id);
                    }else{
                        this.$root.errornotification(res.data.message); return false;
                    }
                })
            });

            // setTimeout(() => {
                    $('.dialog-title').html("<img src='/images/success.png'>");
                    $('.dialog-button').addClass('col button button-raised button-large text-transform-capitalize');
                    $('.dialog-button').eq(1).addClass('active');
                    $('.dialog-button').css('width', '50%');
                // }, 50);
        },
        check(m){
            console.log(m);
        }
    }
}
</script>

<style scoped>

*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}
.mr-72{
    margin-right : 72px;
}
.current_capacity_card .card-content{
    padding-right:8px !important;
    padding-left:18px !important;
}
.menu-item-dropdown .menu-item-content .f7-icons{
    font-size: 15px;
    margin-left: 10px;
}
.border__bottom{
    border-bottom: 0.5px solid #555555;
}
.w-100{
    width: 100%;
}
.justify_content_between{
    justify-content: space-between;
}
.header-links{
    box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.15);
    background-color: #fff;
    height: 60px !important;
    position: fixed;
    width: 100%;
    z-index: 99;
}
.height-40{
    height: 40px;
}

.nav-link,.menu-item-content {
    height: 100%;
    text-transform: capitalize;
}
.menu-item-content{
    position: relative;
    z-index: 9;
}
.menu-dropdown-content{
    box-shadow: 0px 0.5px 12px rgba(0, 0, 0, 0.2);
    min-width: 100% !important;
    top:-30px;
}
.menu-dropdown-center:before, .menu-dropdown-center:after {
    content : none;
}
.bg-dark{
    background: #38373D;
}
.menu-item-dropdown-opened .menu-item-content{
    background: #ff2d55;
}
.menu-dropdown-link{
    border-bottom: 1px solid #EFEFEF;
}
.col-25{
    padding: 5px;
}
.table_image {
    height: 100%;
    min-height: 44px;
}
.card {
    border-radius: 10px;
}
.size-18{
    font-size :18px;
}
p.table__text{
    font-size: 14px;
    line-height: 22px;
    color: #555555;
}
p.count__text{
    font-weight: 600;
    font-size: 16px;
    line-height: 22px;
    color: #555555;
}
.table_row {
    display: flex;
}
.table_row .table_1{
    border-left: 10px solid #0FC963;
    width: 100%;
}
.table_row .table_2{
    border-left: 10px solid #FF6161;
    width: 100%;
    min-width: 332px;
}
.table_row .table_3{
    border-left: 10px solid #FC8E5E;
    width: 100%;
    min-width: 412px;
}
.table_row .table_4{
    border-left: 10px solid #FF619A;
    width: 100%;
    min-width: 500px;
}
.table_row .table_4 .card-content,.table_row .table_5 .card-content{
    padding-top: 50px;
}
.table_row .table_10 .card-content{
    padding-top: 50px;

}
.table_row .table_4_margin{
    margin-right: 103px;
}
.table_row .table_5{
    border-left: 10px solid #9ECBFF;
    width: 100%;
    min-width: 574px;
}
.table_row .table_9{
    width:100%;
    min-width: 182px;
    /*max-width: 182px;*/
    margin: 0 auto;
    border-left: 10px solid #FCD95E;
}
.table_row .table_10 {
    width:100%;
    min-width: 1120px;
    margin: 0 auto;
    border-left: 10px solid #C6C6C6;;
}
.tables{
    overflow-x: auto;
}
.table_main{
    width: 100%;
    height: calc(100vh - 70px);
    overflow: auto;
    margin-top: 70px;
}
.center_table_card{
    margin-left: 83px;
    margin-right: 83px;
}
.tables .row{
    flex-wrap: nowrap !important;
}
/*.tables .table_row .row{
    flex-wrap: wrap !important;
}*/
.table_card_right_margin{
    margin-right: 72px;
}
.table1__details{
    width: 100%;
    overflow-x: auto;
}

.table2__details{
    width: 100%;
    max-width: 323px;
    overflow-x:auto;
}
.table3__details{
    width: 100%;
    max-width: 426px;
    overflow-x:auto;
}
.person{
    white-space:nowrap;
}
/*=========  TABLE SWIPER ============*/
.swiper-slide.active {
    background: transparent !important;
    border-bottom: 1px solid #F33E3E;
}
.swiper-slide.active p{
    color:#F33E3E !important;
}
.table_main .table_floor_swiper .floor_swiper_inner .swiper-slide p.swiper_text{
    font-weight: 500;
    font-size: 14px;
    line-height: 21px;
    color: #38373D;
    white-space: nowrap;
    justify-content:center;
}
.table_main .table_floor_swiper .floor_swiper_inner{
    border-bottom:1px solid #E0E0E0;
    /*margin-left: 20px;*/
}
.table_main .table_floor_swiper .floor_swiper_inner .room_available{
    width:35px;
    height:21px;
    background: #FDD5D5;
    border-radius:2px;
    color:#F33E3E;
    font-weight: 500;
    font-size: 12px;
    line-height: 15px;
    display:flex;
    justify-content: center;
    align-items:center;
    margin-left: 5px;

}
/*=============== POPOVER=================*/
.popover.popover-move{
    background-color: #F33E3E;
    border:0.5px solid transparent;
}
.popover{
    width: 100%;
    max-width: 180px;
    box-shadow: 0px 0px 10px rgb(0 0 0 / 27%);
    background: #fff;
    border: 0.5px solid #999999;
    border-radius: 7px;
}
.floor_dropdwon{
    min-width: 250px;
    max-width: 250px;
    position:absolute;
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
.floor_dropdwon::before{
content: '';
    background: var(--f7-popover-bg-color);
    width: 26px;
    height: 26px;
    position: absolute;
    left: 0;
    top: 0;
    border-radius: 3px;
    transform: rotate(45deg);
}
.table_dropdwon{
    max-width: 240px;
    min-width: 240px;
    position:absolute;
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
.floor_dropdown_visible{
    opacity: 1;
    visibility: visible;
    transform: translateY(-1em);

}
.popover-angle:after{
    border:0.5px solid #999999 !important;
}
.popover-angle.on-bottom:after{
    border:0.5px solid #999999 !important;
}
.floor_room_available .room_available{
    width: 35px;
    height: 21px;
    background: #FDD5D5;
    border-radius: 2px;
    color: #F33E3E;
    font-weight: 500;
    font-size: 12px;
    line-height: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 5px;
}
.floor_name{
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 172px;
}
.hamburger__button{
    display:none;
}
@media screen and (max-width : 820px) {
    .table_9_chair{
        width:100%;
        min-width:1120px;
    }
    .margin_right{
        margin-right: 45px;
    }
    .margin_left{
        margin-left: 45px;
    }
    .table-card{
        width : 100% !important;
    }
    .current_capacity_card .card-content{
        padding-right:8px !important;
        padding-left:8px !important;
    }
    .current_capacity_card .card-content p{
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
.extra-div{
    min-width: 300px;
    visibility: hidden;

}
</style>

<style>
.demo-swiper .swiper-slide,
.demo-swiper-multiple .swiper-slide {
    background: transparent;
}
.popover-move .popover-angle:after{
    background: #f33e3e !important;
    border:  0.5px solid transparent !important
}
.popover-angle:after{
   border:  0.5px solid #999999 !important;
}
.ios .popover-angle.on-bottom:after {
    left: 0;
    top: -22px !important;
}

*{
    box-sizing: border-box;
}
.header-link .button{
    border-radius: 10px !important;
}
.header-link .menu-item{
    border-radius: 10px !important;
    background: #38373D !important;
}
.nav-button{
    text-transform: capitalize;
}
.navbar a.link{
    color : #000;
}

.right{
    width : 40%;
    margin-left: 0 !important;
}
.header-link{
    width: 100%;
}
.header-link button{
    text-transform: capitalize;
}
.card-header{
    background: transparent;
    min-height: 0 !important;
    overflow: hidden;
    color: #000;
    border-radius: 10px 10px 0 0 !important;
}
.card-header:after{
    background-color: transparent !important;
}
.header_detail{
    width:100%;
}
.person-info i{
    font-size: 12px !important;
    padding-right: 5px;
    white-space: nowrap;
}
.person-info{
    background: #F1F1F1;
    border-radius: 5px;
    padding: 7px 5px !important;
    font-size: 10px !important;
    width: 100%;
    max-width: 96px;
    margin-right: 30px;
}
.person-info .person_info_name p{
    font-weight: 500;
    font-size: 10px;
    line-height: 12px;
    color: #38373D;
}
.person-info_move{
    background: #fff;
    border: 1px solid #F33E3E;
    box-shadow: 0px 0px 10px rgb(241 2 2 / 29%);
}
.waiting-time{
    border-left: 0.5px solid #555555;
    padding-left: 8px;
    margin-left: 8px;
}
.table_reservation_info .person-info span{
    font-size: 12px;
    line-height: 15px;
    color: #38373D;
}
.bg-color-dark-pink {
    background-color: #F33E3E !important;
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
    transform: translate(-13%, -50%) !important;
}

.dialog-button {
    margin: 0 5px !important;
    border-radius: var(--f7-dialog-border-radius) !important;
}

.dialog-buttons {
    margin: 0 5px 15px;
}
.table_row .card{
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.11);
    }

/*.framework7-root {
    overflow: scroll !important;
    box-sizing: border-box;
    background: rgb(0 0 0 / 41%) !important;
}*/
</style>
