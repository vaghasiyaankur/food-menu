<template>
    <f7-page color="bg-color-white">
            <div class="header-links display-flex align-items-center padding-right" v-bind="dragOptions">
                <!--========= SMALL SCREEN MENU BAR=========== -->
                <!-- <div class="hamburger__button">
                    <a href="#" class="link icon-only panel-open" data-panel=".panel-right-1"><i class="icon f7-icons if-not-md">menu</i></a>
                </div>
                <div class="panel panel-right panel-right-1 panel-cover panel-resizable panel-init">
                    <div class="block">
                        <div class=" padding-left-half padding-right-half height-40 nav-button">
                            <a href="/Reservation/" class="link nav-link padding">
                                Reservation</a>
                        </div>
                        <div class="menu-item menu-item-dropdown margin-top bg-white">
                            <div class="menu-item-content padding-left-half padding-right-half">Menu management
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
                        <div class="padding-left-half padding-right-half height-40">
                            <a href="/Reporting/" class="margin-top link nav-link padding">Reporting</a>
                        </div>
                        <div class=" padding-left-half padding-right-half height-40">
                            <button class="col nav-link padding closeReservation" @click="$root.closeReservation()">Close reservation</button>
                        </div>
                        <div class="padding-left-half padding-right-half height-40">
                            <a href="/settings/" class="col link nav-link padding">Settings</a>
                        </div>
                    </div>
                </div> -->
                <!--========= SMALL SCREEN MENU BAR END=========== -->
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
            </div>


        <div class="table_main">
            <!-- ============= TABLE FLOOR SWIPER ============= -->
           <div class="table_floor_swiper">
                <div class="row">
                    <div class="col-100 large-80 medium-75">
                        <div data-pagination='{"el":".swiper-pagination"}' data-navigation="{'el':'.swiper-navigation'}" data-space-between="10" data-slides-per-view="4"
                            class="swiper swiper-init demo-swiper margin-top margin-bottom floor_swiper_inner  swiper-navigation">
                            <!-- <div class="swiper-pagination"></div> -->
                            <div class="swiper-wrapper padding-left-half">
                                <div class="swiper-slide slide-active">
                                    <p class="no-margin text-align-center margin-top-half swiper_text display-flex">Ground Floor (Non-AC)
                                        <span class="room_available color-blue">20</span>
                                    </p>
                                </div>
                                <div class="swiper-slide">
                                    <p class="no-margin text-align-center margin-top-half swiper_text display-flex">First Floor (AC)
                                        <span class="room_available color-blue">20</span>
                                    </p>
                                </div>
                                <div class="swiper-slide">
                                    <p class="no-margin text-align-center margin-top-half swiper_text display-flex">Second Floor (AC)
                                        <span class="room_available color-blue">20</span>
                                    </p>
                                </div>
                                <div class="swiper-slide">
                                    <p class="no-margin text-align-center margin-top-half swiper_text display-flex">Third Floor (AC)
                                        <span class="room_available color-blue">20</span>
                                    </p>
                                </div>
                                <div class="swiper-slide">
                                    <p class="no-margin text-align-center margin-top-half swiper_text display-flex">Fourth Floor (AC)
                                        <span class="room_available color-blue">20</span>
                                    </p>
                                </div>
                                <div class="swiper-slide">
                                    <p class="no-margin text-align-center margin-top-half swiper_text display-flex">Fifth Floor (AC)
                                        <span class="room_available color-blue">20</span>
                                    </p>
                                </div>
                                <div class="swiper-slide">
                                    <p class="no-margin text-align-center margin-top-half swiper_text display-flex">Sixth Floor (AC)
                                        <span class="room_available color-blue">20</span>
                                    </p>
                                </div>
                                <div class="swiper-slide">
                                    <p class="no-margin text-align-center margin-top-half swiper_text display-flex">Seventh Floor (AC)
                                        <span class="room_available color-blue">20</span>
                                    </p>
                                </div>
                                <div class="swiper-slide">
                                    <p class="no-margin text-align-center margin-top-half swiper_text display-flex">Eighth Floor (AC)
                                        <span class="room_available color-blue">20</span>
                                    </p>
                                </div>
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
                    <div class="col-100 large-20 medium-25">
                        <div class="current_capacity">
                            <div class="current_capacity_card card display-flex align-items-center no-margin-vertical justify_content_between">
                                <div class="card_img padding-left">
                                    <img src="/images/capacity.png" alt="">
                                </div>
                                <div class="card-content card-content-padding padding-vertical-half">
                                    <p class="no-margin">Current Capacity</p>
                                    <span class="text-color-red">80% Full</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
            <div class="tables margin-horizontal">
                <div class=" table_row margin-horizontal padding-top margin-top" v-for="row  in row_tables" :key="row">
                    <!-- <div class="no-padding margin-bottom table-card" :class="[('col-'+table.col)]" v-for="table in row" :key="table.id"> -->
                    <div class="no-padding margin-bottom table-card" :style="'min-width: '+table.width+'px'" :class="[{'ml-40' :  ind != 0}]" v-for="(table,ind) in row" :key="table.id">
                        <!--======= TABLE CHAIR ========= -->
                        <div class="row table_top_chair">
                            <div class="col" v-for="index in table.up_table" :key="index">
                                <div class="table_card_img text-align-center">
                                    <img :src="'/images/table/'+table.color.color+'.png'" alt="table">
                                </div>
                            </div>
                        </div>

                        <div class="card no-margin table_1 equal-height-table" :style="('border-left : 10px solid rgb('+table.color.rgb)+')'"  @dragover.prevent @drop.prevent="onDrop(table.id)">
                            <div class="card-header no-padding">
                                <div class="row header_detail">
                                    <div class="table-number padding-half"> <p class="no-margin">Table No.</p>
                                    <p class=" text-align-center no-margin"> 01</p>
                                    </div>
                                    <div class="table-capacity text-align-right padding-half">
                                        <p class="no-margin"> Capacity </p> <p class="text-align-center no-margin">{{ table.capacity_of_person }}</p> </div>
                                </div>
                            </div>
                            <div class="card-content card-content-padding padding-horizontal-half table1__details" :style="'max-width : '+(table.width - 20 )+'px'">
                                <div class="table_reservation">
                                    <!-- <h3 class="no-margin-top">Reserved</h3> -->
                                    <div class="display-flex drop-target" :data-id="table.id">
                                    <draggable :scroll-sensitivity="250"  :force-fallback="true" class="dragArea list-group w-full" :list="list" @change="log">
                                        
                                        <div class="table_reservation_info" draggable="true" @dragstart="startDrag(table.id)" >
                                            <div class="person-info popover-open" data-popover=".popover-table"  @click="removebackdrop">
                                                <div class="person_info_name border__bottom padding-bottom-half margin-bottom-half">
                                                    <p class="no-margin text-align-center">By Manager</p>
                                                </div>
                                                <div class="text-align-center person">
                                                    <i class="f7-icons size-22">person_fill</i>
                                                    <span>&nbsp;4</span>
                                                    <span class="waiting-time margin-top-half text-align-center">
                                                        <i class="f7-icons size-22">clock_fill</i>
                                                        <span>2:47</span>
                                                    </span>
                                                </div>
                                                <div class="popover popover-table padding-half">
                                                    <div class="user-info popover-inner">
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_fill</i>
                                                            <span class="text-color-black">John Smith</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">clock</i>
                                                            <span class="text-color-black">3:00pm</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">phone</i>
                                                            <span class="text-color-black">+91 12345 12345</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="card-footer no-margin no-padding justify-content-center hassubs" @click="addClass()">
                                                            <h3 class="text-color-red">Change Floor</h3>

                                                        </div>
                                                         <!-- ============FLOOR DROP DOWN  ============= -->
                                                         <div class="list simple-list floor_dropdwon">
                                                            <ul>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>1<sup>st</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">20</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>2<sup>nd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">12</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>3<sup>rd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">16</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>4<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">15</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>5<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">08</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>6<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">13</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </draggable>
                                    <draggable :scroll-sensitivity="250"  :force-fallback="true" class="dragArea list-group w-full" :list="list" @change="log">

                                    
                                        <div class="table_reservation_info margin-bottom" draggable="true" @dragstart="startDrag(table.id)">
                                            <div class="person-info popover-open" data-popover=".popover-table1-1"  @click="removebackdrop">
                                                <div class="person_info_name border__bottom padding-bottom-half margin-bottom-half">
                                                    <p class="no-margin text-align-center">By Guest</p>
                                                </div>
                                                <div class="text-align-center person">
                                                    <i class="f7-icons size-22">person_fill</i>
                                                    <span>&nbsp;4</span>
                                                    <span class="waiting-time margin-top-half text-align-center">
                                                        <i class="f7-icons size-22">clock_fill</i>
                                                        <span>2:47</span>
                                                    </span>
                                                </div>
                                                <div class="popover popover-table1-1 padding-half">
                                                    <div class="user-info popover-inner">
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_fill</i>
                                                            <span class="text-color-black">John Smith</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">clock</i>
                                                            <span class="text-color-black">3:00pm</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">phone</i>
                                                            <span class="text-color-black">+91 12345 12345</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="card-footer no-margin no-padding justify-content-center hassubs" @click="addClass()">
                                                            <h3 class="text-color-red">Change Floor</h3>

                                                        </div>
                                                         <!-- ============FLOOR DROP DOWN  ============= -->
                                                         <div class="list simple-list floor_dropdwon">
                                                            <ul>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>1<sup>st</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">20</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>2<sup>nd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">12</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>3<sup>rd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">16</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>4<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">15</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>5<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">08</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>6<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">13</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </draggable>
                                    <draggable :scroll-sensitivity="250"  :force-fallback="true" class="dragArea list-group w-full" :list="list" @change="log">
                                        <div class="table_reservation_info margin-bottom" draggable="true" @dragstart="startDrag(table.id)">
                                            <div class="person-info popover-open" data-popover=".popover-table1-3"  @click="removebackdrop">
                                                <div class="person_info_name border__bottom padding-bottom-half margin-bottom-half">
                                                    <p class="no-margin text-align-center">By Guest</p>
                                                </div>
                                                <div class="text-align-center person">
                                                    <i class="f7-icons size-22">person_fill</i>
                                                    <span>&nbsp;4</span>
                                                    <span class="waiting-time margin-top-half text-align-center">
                                                        <i class="f7-icons size-22">clock_fill</i>
                                                        <span>2:47</span>
                                                    </span>
                                                </div>
                                                <div class="popover popover-table1-3 padding-half">
                                                    <div class="user-info popover-inner">
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_fill</i>
                                                            <span class="text-color-black">John Smith</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">clock</i>
                                                            <span class="text-color-black">3:00pm</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">phone</i>
                                                            <span class="text-color-black">+91 12345 12345</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="card-footer no-margin no-padding justify-content-center hassubs" @click="addClass()">
                                                            <h3 class="text-color-red">Change Floor</h3>

                                                        </div>
                                                         <!-- ============FLOOR DROP DOWN  ============= -->
                                                         <div class="list simple-list floor_dropdwon">
                                                            <ul>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>1<sup>st</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">20</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>2<sup>nd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">12</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>3<sup>rd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">16</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>4<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">15</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>5<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">08</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>6<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">13</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </draggable>
                                    <draggable :scroll-sensitivity="250"  :force-fallback="true" class="dragArea list-group w-full" :list="list" @change="log">
                                        
                                        <div class="table_reservation_info" draggable="true" @dragstart="startDrag(table.id)" >
                                            <div class="person-info popover-open" data-popover=".popover-table"  @click="removebackdrop">
                                                <div class="person_info_name border__bottom padding-bottom-half margin-bottom-half">
                                                    <p class="no-margin text-align-center">By Manager</p>
                                                </div>
                                                <div class="text-align-center person">
                                                    <i class="f7-icons size-22">person_fill</i>
                                                    <span>&nbsp;4</span>
                                                    <span class="waiting-time margin-top-half text-align-center">
                                                        <i class="f7-icons size-22">clock_fill</i>
                                                        <span>2:47</span>
                                                    </span>
                                                </div>
                                                <div class="popover popover-table padding-half">
                                                    <div class="user-info popover-inner">
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_fill</i>
                                                            <span class="text-color-black">John Smith</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">clock</i>
                                                            <span class="text-color-black">3:00pm</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">phone</i>
                                                            <span class="text-color-black">+91 12345 12345</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="card-footer no-margin no-padding justify-content-center hassubs" @click="addClass()">
                                                            <h3 class="text-color-red">Change Floor</h3>

                                                        </div>
                                                         <!-- ============FLOOR DROP DOWN  ============= -->
                                                         <div class="list simple-list floor_dropdwon">
                                                            <ul>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>1<sup>st</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">20</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>2<sup>nd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">12</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>3<sup>rd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">16</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>4<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">15</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>5<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">08</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>6<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">13</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </draggable>
                                    <draggable :scroll-sensitivity="250"  :force-fallback="true" class="dragArea list-group w-full" :list="list" @change="log">

                                    
                                        <div class="table_reservation_info margin-bottom" draggable="true" @dragstart="startDrag(table.id)">
                                            <div class="person-info popover-open" data-popover=".popover-table1-1"  @click="removebackdrop">
                                                <div class="person_info_name border__bottom padding-bottom-half margin-bottom-half">
                                                    <p class="no-margin text-align-center">By Guest</p>
                                                </div>
                                                <div class="text-align-center person">
                                                    <i class="f7-icons size-22">person_fill</i>
                                                    <span>&nbsp;4</span>
                                                    <span class="waiting-time margin-top-half text-align-center">
                                                        <i class="f7-icons size-22">clock_fill</i>
                                                        <span>2:47</span>
                                                    </span>
                                                </div>
                                                <div class="popover popover-table1-1 padding-half">
                                                    <div class="user-info popover-inner">
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_fill</i>
                                                            <span class="text-color-black">John Smith</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">clock</i>
                                                            <span class="text-color-black">3:00pm</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">phone</i>
                                                            <span class="text-color-black">+91 12345 12345</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="card-footer no-margin no-padding justify-content-center hassubs" @click="addClass()">
                                                            <h3 class="text-color-red">Change Floor</h3>

                                                        </div>
                                                         <!-- ============FLOOR DROP DOWN  ============= -->
                                                         <div class="list simple-list floor_dropdwon">
                                                            <ul>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>1<sup>st</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">20</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>2<sup>nd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">12</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>3<sup>rd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">16</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>4<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">15</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>5<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">08</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>6<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">13</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </draggable>
                                    <draggable :scroll-sensitivity="250"  :force-fallback="true" class="dragArea list-group w-full" :list="list" @change="log">
                                        <div class="table_reservation_info margin-bottom" draggable="true" @dragstart="startDrag(table.id)">
                                            <div class="person-info popover-open" data-popover=".popover-table1-3"  @click="removebackdrop">
                                                <div class="person_info_name border__bottom padding-bottom-half margin-bottom-half">
                                                    <p class="no-margin text-align-center">By Guest</p>
                                                </div>
                                                <div class="text-align-center person">
                                                    <i class="f7-icons size-22">person_fill</i>
                                                    <span>&nbsp;4</span>
                                                    <span class="waiting-time margin-top-half text-align-center">
                                                        <i class="f7-icons size-22">clock_fill</i>
                                                        <span>2:47</span>
                                                    </span>
                                                </div>
                                                <div class="popover popover-table1-3 padding-half">
                                                    <div class="user-info popover-inner">
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_fill</i>
                                                            <span class="text-color-black">John Smith</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">clock</i>
                                                            <span class="text-color-black">3:00pm</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">phone</i>
                                                            <span class="text-color-black">+91 12345 12345</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="card-footer no-margin no-padding justify-content-center hassubs" @click="addClass()">
                                                            <h3 class="text-color-red">Change Floor</h3>

                                                        </div>
                                                         <!-- ============FLOOR DROP DOWN  ============= -->
                                                         <div class="list simple-list floor_dropdwon">
                                                            <ul>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>1<sup>st</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">20</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>2<sup>nd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">12</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>3<sup>rd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">16</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>4<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">15</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>5<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">08</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>6<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">13</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </draggable>
                                    <draggable :scroll-sensitivity="250"  :force-fallback="true" class="dragArea list-group w-full" :list="list" @change="log">
                                        
                                        <div class="table_reservation_info" draggable="true" @dragstart="startDrag(table.id)" >
                                            <div class="person-info popover-open" data-popover=".popover-table"  @click="removebackdrop">
                                                <div class="person_info_name border__bottom padding-bottom-half margin-bottom-half">
                                                    <p class="no-margin text-align-center">By Manager</p>
                                                </div>
                                                <div class="text-align-center person">
                                                    <i class="f7-icons size-22">person_fill</i>
                                                    <span>&nbsp;4</span>
                                                    <span class="waiting-time margin-top-half text-align-center">
                                                        <i class="f7-icons size-22">clock_fill</i>
                                                        <span>2:47</span>
                                                    </span>
                                                </div>
                                                <div class="popover popover-table padding-half">
                                                    <div class="user-info popover-inner">
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_fill</i>
                                                            <span class="text-color-black">John Smith</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">clock</i>
                                                            <span class="text-color-black">3:00pm</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">phone</i>
                                                            <span class="text-color-black">+91 12345 12345</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="card-footer no-margin no-padding justify-content-center hassubs" @click="addClass()">
                                                            <h3 class="text-color-red">Change Floor</h3>

                                                        </div>
                                                         <!-- ============FLOOR DROP DOWN  ============= -->
                                                         <div class="list simple-list floor_dropdwon">
                                                            <ul>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>1<sup>st</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">20</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>2<sup>nd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">12</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>3<sup>rd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">16</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>4<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">15</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>5<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">08</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>6<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">13</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </draggable>
                                    <draggable :scroll-sensitivity="250"  :force-fallback="true" class="dragArea list-group w-full" :list="list" @change="log">

                                    
                                        <div class="table_reservation_info margin-bottom" draggable="true" @dragstart="startDrag(table.id)">
                                            <div class="person-info popover-open" data-popover=".popover-table1-1"  @click="removebackdrop">
                                                <div class="person_info_name border__bottom padding-bottom-half margin-bottom-half">
                                                    <p class="no-margin text-align-center">By Guest</p>
                                                </div>
                                                <div class="text-align-center person">
                                                    <i class="f7-icons size-22">person_fill</i>
                                                    <span>&nbsp;4</span>
                                                    <span class="waiting-time margin-top-half text-align-center">
                                                        <i class="f7-icons size-22">clock_fill</i>
                                                        <span>2:47</span>
                                                    </span>
                                                </div>
                                                <div class="popover popover-table1-1 padding-half">
                                                    <div class="user-info popover-inner">
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_fill</i>
                                                            <span class="text-color-black">John Smith</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">clock</i>
                                                            <span class="text-color-black">3:00pm</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">phone</i>
                                                            <span class="text-color-black">+91 12345 12345</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="card-footer no-margin no-padding justify-content-center hassubs" @click="addClass()">
                                                            <h3 class="text-color-red">Change Floor</h3>

                                                        </div>
                                                         <!-- ============FLOOR DROP DOWN  ============= -->
                                                         <div class="list simple-list floor_dropdwon">
                                                            <ul>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>1<sup>st</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">20</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>2<sup>nd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">12</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>3<sup>rd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">16</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>4<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">15</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>5<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">08</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>6<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">13</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </draggable>
                                    <draggable :scroll-sensitivity="250"  :force-fallback="true" class="dragArea list-group w-full" :list="list" @change="log">
                                        <div class="table_reservation_info margin-bottom" draggable="true" @dragstart="startDrag(table.id)">
                                            <div class="person-info popover-open" data-popover=".popover-table1-3"  @click="removebackdrop">
                                                <div class="person_info_name border__bottom padding-bottom-half margin-bottom-half">
                                                    <p class="no-margin text-align-center">By Guest</p>
                                                </div>
                                                <div class="text-align-center person">
                                                    <i class="f7-icons size-22">person_fill</i>
                                                    <span>&nbsp;4</span>
                                                    <span class="waiting-time margin-top-half text-align-center">
                                                        <i class="f7-icons size-22">clock_fill</i>
                                                        <span>2:47</span>
                                                    </span>
                                                </div>
                                                <div class="popover popover-table1-3 padding-half">
                                                    <div class="user-info popover-inner">
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_fill</i>
                                                            <span class="text-color-black">John Smith</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">clock</i>
                                                            <span class="text-color-black">3:00pm</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">phone</i>
                                                            <span class="text-color-black">+91 12345 12345</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="card-footer no-margin no-padding justify-content-center hassubs" @click="addClass()">
                                                            <h3 class="text-color-red">Change Floor</h3>

                                                        </div>
                                                         <!-- ============FLOOR DROP DOWN  ============= -->
                                                         <div class="list simple-list floor_dropdwon">
                                                            <ul>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>1<sup>st</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">20</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>2<sup>nd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">12</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>3<sup>rd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">16</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>4<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">15</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>5<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">08</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>6<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">13</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </draggable>
                                    <draggable :scroll-sensitivity="250"  :force-fallback="true" class="dragArea list-group w-full" :list="list" @change="log">
                                        
                                        <div class="table_reservation_info" draggable="true" @dragstart="startDrag(table.id)" >
                                            <div class="person-info popover-open" data-popover=".popover-table"  @click="removebackdrop">
                                                <div class="person_info_name border__bottom padding-bottom-half margin-bottom-half">
                                                    <p class="no-margin text-align-center">By Manager</p>
                                                </div>
                                                <div class="text-align-center person">
                                                    <i class="f7-icons size-22">person_fill</i>
                                                    <span>&nbsp;4</span>
                                                    <span class="waiting-time margin-top-half text-align-center">
                                                        <i class="f7-icons size-22">clock_fill</i>
                                                        <span>2:47</span>
                                                    </span>
                                                </div>
                                                <div class="popover popover-table padding-half">
                                                    <div class="user-info popover-inner">
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_fill</i>
                                                            <span class="text-color-black">John Smith</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">clock</i>
                                                            <span class="text-color-black">3:00pm</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">phone</i>
                                                            <span class="text-color-black">+91 12345 12345</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="card-footer no-margin no-padding justify-content-center hassubs" @click="addClass()">
                                                            <h3 class="text-color-red">Change Floor</h3>

                                                        </div>
                                                         <!-- ============FLOOR DROP DOWN  ============= -->
                                                         <div class="list simple-list floor_dropdwon">
                                                            <ul>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>1<sup>st</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">20</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>2<sup>nd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">12</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>3<sup>rd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">16</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>4<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">15</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>5<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">08</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>6<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">13</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </draggable>
                                    <draggable :scroll-sensitivity="250"  :force-fallback="true" class="dragArea list-group w-full" :list="list" @change="log">

                                    
                                        <div class="table_reservation_info margin-bottom" draggable="true" @dragstart="startDrag(table.id)">
                                            <div class="person-info popover-open" data-popover=".popover-table1-1"  @click="removebackdrop">
                                                <div class="person_info_name border__bottom padding-bottom-half margin-bottom-half">
                                                    <p class="no-margin text-align-center">By Guest</p>
                                                </div>
                                                <div class="text-align-center person">
                                                    <i class="f7-icons size-22">person_fill</i>
                                                    <span>&nbsp;4</span>
                                                    <span class="waiting-time margin-top-half text-align-center">
                                                        <i class="f7-icons size-22">clock_fill</i>
                                                        <span>2:47</span>
                                                    </span>
                                                </div>
                                                <div class="popover popover-table1-1 padding-half">
                                                    <div class="user-info popover-inner">
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_fill</i>
                                                            <span class="text-color-black">John Smith</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">clock</i>
                                                            <span class="text-color-black">3:00pm</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">phone</i>
                                                            <span class="text-color-black">+91 12345 12345</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="card-footer no-margin no-padding justify-content-center hassubs" @click="addClass()">
                                                            <h3 class="text-color-red">Change Floor</h3>

                                                        </div>
                                                         <!-- ============FLOOR DROP DOWN  ============= -->
                                                         <div class="list simple-list floor_dropdwon">
                                                            <ul>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>1<sup>st</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">20</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>2<sup>nd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">12</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>3<sup>rd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">16</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>4<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">15</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>5<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">08</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>6<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">13</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </draggable>
                                    <draggable :scroll-sensitivity="250"  :force-fallback="true" class="dragArea list-group w-full" :list="list" @change="log">
                                        <div class="table_reservation_info margin-bottom" draggable="true" @dragstart="startDrag(table.id)">
                                            <div class="person-info popover-open" data-popover=".popover-table1-3"  @click="removebackdrop">
                                                <div class="person_info_name border__bottom padding-bottom-half margin-bottom-half">
                                                    <p class="no-margin text-align-center">By Guest</p>
                                                </div>
                                                <div class="text-align-center person">
                                                    <i class="f7-icons size-22">person_fill</i>
                                                    <span>&nbsp;4</span>
                                                    <span class="waiting-time margin-top-half text-align-center">
                                                        <i class="f7-icons size-22">clock_fill</i>
                                                        <span>2:47</span>
                                                    </span>
                                                </div>
                                                <div class="popover popover-table1-3 padding-half">
                                                    <div class="user-info popover-inner">
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_fill</i>
                                                            <span class="text-color-black">John Smith</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">clock</i>
                                                            <span class="text-color-black">3:00pm</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top align-items-center">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">phone</i>
                                                            <span class="text-color-black">+91 12345 12345</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="display-flex padding-left-half padding-top-half align-items-center padding-bottom">
                                                            <i class="f7-icons size-12 text-color-black padding-right-half margin-right-half">person_2_fill</i>
                                                            <span class="text-color-black">5 family member</span>
                                                        </div>
                                                        <div class="card-footer no-margin no-padding justify-content-center hassubs" @click="addClass()">
                                                            <h3 class="text-color-red">Change Floor</h3>

                                                        </div>
                                                         <!-- ============FLOOR DROP DOWN  ============= -->
                                                         <div class="list simple-list floor_dropdwon">
                                                            <ul>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>1<sup>st</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">20</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>2<sup>nd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">12</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>3<sup>rd</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">16</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>4<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">15</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>5<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">08</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>6<sup>th</sup> Floor (AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">13</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="floor_number display-flex align-items-center justify_content_between w-100">
                                                                        <div class="floor_name">
                                                                            <span>7<sup>th</sup> Floor (Non-AC)</span>
                                                                        </div>
                                                                        <div class="floor_room_available">
                                                                            <span class="room_available">18</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </draggable>
                                    


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

export default {
    name : 'RegisterPage',
    data() {
        return {
            row_tables: [],
        }
    },
    computed: {
    dragOptions() {
      return {
        group: {
          name: 'g1'
        },
        scrollSensitivity: 200,
        forceFallback: true
      };
    }
  },
    components : {
        f7,f7Page, f7Navbar, f7BlockTitle, f7Block,f7Swiper,f7SwiperSlide,draggable: VueDraggableNext
    },
    mounted() {
        this.equal_height();
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
        addClass(){
            $('.floor_dropdwon').toggleClass('floor_dropdown_visible');
        },
        removebackdrop(){
            $('.floor_dropdwon').removeClass('floor_dropdown_visible');
            $(".popover-backdrop").remove();
        },
        tableList() {
            axios.get('/api/table-list-with-order')
                .then((res) => {
                    var row_tables = [];
                    var cal_of_capacity = 0;
                    var single_row_data = [];
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
                    });
                    this.row_tables = row_tables;

                })
        },
        startDrag(id) {
            console.log(id);
        },
        onDrop(id) {
            console.log(id);
            // console.log(event.target.closest('.drop-target'));
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
.ml-40{
    margin-left : 40px;
}
.current_capacity_card .card-content{
    padding-right:8px !important;
    padding-left:0px !important;
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
.size-12{
    font-size :12px;
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
    overflow-x:auto;
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
.table_main .table_floor_swiper .floor_swiper_inner .swiper-slide p.swiper_text{
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #38373D;
    white-space: nowrap;
    justify-content:center;
}
.table_main .table_floor_swiper .floor_swiper_inner{
    border-bottom:1px solid #E0E0E0;
    margin-left: 20px;
    padding-bottom: 12px;
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
}
.floor_dropdwon{
    width: 220px;
    position:absolute;
    left: 100%;
    bottom: -119%;
    background: white;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    opacity: 0;
    visibility: hidden;
    transition: 0.3s all ease-in-out;
    transform: translateY(2em);
    border: 0.5px solid #999999;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.5s ease-in;
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
</style>

<style>
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
}
.nav-button{
    text-transform: capitalize;
}
.navbar a.link{
    color : #000;
}
.left{
    width: 60%;
    margin-right: 0 !important;
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
    max-width: 94px;
    margin-right: 23px;
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

</style>
