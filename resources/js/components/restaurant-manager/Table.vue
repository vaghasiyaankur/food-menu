<template>
    <f7-page color="bg-color-white">
        <div class="header-links display-flex align-items-center padding-right">
            <div class="row header-link justify-content-flex-end align-items-center">
                <div class=" padding-left-half padding-right-half height-40 nav-button">
                    <a href="/Reservation/" class="col link nav-link button button-raised bg-dark text-color-white padding">
                        Reservation</a></div>
                <div class=" nav-button">
                    <div class="menu-item menu-item-dropdown">
                        <div class="menu-item-content button button-raised bg-dark text-color-white padding-left-half padding-right-half">Menu management</div>
                        <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                            <div class="menu-dropdown-content bg-color-white padding-left padding-right">
                                <a href="#" class="menu-dropdown-link menu-close"></a>
                                <a href="/food-category/" class="menu-dropdown-link menu-close text-color-black">Food Category</a>
                                <a href="/food-product/" class="menu-dropdown-link menu-close text-color-black">Food Menu</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" padding-left-half padding-right-half height-40 nav-button"><a href="/Reporting/" class="col link nav-link button button-raised bg-dark text-color-white padding">Reporting</a></div>
                <div class=" padding-left-half padding-right-half height-40 nav-button"><button class="col nav-link button button-raised bg-dark text-color-white padding closeReservation" @click="$root.closeReservation()">Close reservation</button></div>
                <div class=" padding-left-half padding-right-half height-40 nav-button"><a href="/settings/" class="col link nav-link button button-raised bg-dark text-color-white padding">Settings</a></div>
            </div>
        </div>
        <div class="tables margin-top">
            <div class="row table_row margin-horizontal padding-top margin-top">
                <!-- ========= TABLE 1 START ========= -->
                <div class="col-25 no-padding no-margin-horizontal table-card"> 
                       <!--======= TABLE CHAIR ========= -->
                    <div class="row table_top_chair">
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table-1.png" alt="table">
                            </div>
                        </div>
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table-1.png" alt="table">
                            </div>
                        </div>
                    </div>               

                    <div class="card no-margin table_1">
                        <div class="card-header no-padding">
                            <div class="row header_detail">
                                <div class="table-number padding-half"> <p class="no-margin">Table No.</p>                                     
                                 <p class=" text-align-center no-margin"> 01</p>
                                </div>
                                <div class="table-capacity text-align-right padding-half">
                                    <p class="no-margin"> Capacity </p> <p class="text-align-center no-margin">04</p> </div>
                            </div>
                        </div>
                        <div class="card-content card-content-padding padding-horizontal-half">
                            <!-- <div class="table_image text-align-center">
                                <img src="/images/table/3_member_table.png" alt="">
                            </div> -->
                            <div class="table_reservation margin-top equal-height-table">
                                <h3>Reserved</h3>
                                <div class="row padding-horizontal-half">
                                    <div class="col-50 table_reservation_info">
                                        <div class="person-info tooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-12">person_fill</i>
                                                <span>&nbsp;3</span>                                                
                                                <span class="waiting-time margin-top-half text-align-center">
                                                    <i class="f7-icons size-12">clock_fill</i>
                                                    <span>2:47</span>
                                                </span>
                                            </div>
                                            <div class="tooltiptext padding-half">
                                                <div class="user-info">                                                    
                                                    <div class="display-flex padding-left-half padding-top">
                                                        <i class="f7-icons size-12 text-color-black padding-right-half">person_fill</i>
                                                        <span class="text-color-black">John Smith</span>
                                                    </div>
                                                    <div class="display-flex padding-left-half padding-top">
                                                        <i class="f7-icons size-12 text-color-black padding-right-half">clock</i>
                                                        <span class="text-color-black">3:00pm</span>
                                                    </div>
                                                    <div class="display-flex padding-left-half padding-top">
                                                        <i class="f7-icons size-12 text-color-black padding-right-half">phone</i>
                                                        <span class="text-color-black">+91 12345 12345</span>
                                                    </div>
                                                    <div class="display-flex padding-left-half padding-top">
                                                        <i class="f7-icons size-12 text-color-black padding-right-half">person_2_fill</i>
                                                        <span class="text-color-black">5 family member</span>
                                                    </div>                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-50 table_reservation_info">
                                        <div class="person-info tooltip" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;3</span>
                                                <span class="waiting-time margin-top-half text-align-center">
                                                    <i class="f7-icons size-22">clock_fill</i>
                                                    <span>2:47</span>
                                                </span>
                                            </div>
                                            <div class="tooltiptext padding-half">
                                                <div class="user-info">
                                                    <div class="display-flex padding-left-half padding-top-half">
                                                        <i class="f7-icons size-12 text-color-black padding-right-half">person_fill</i>
                                                        <span class="text-color-black">John Smith</span>
                                                    </div>
                                                    <div class="display-flex padding-left-half padding-top">
                                                        <i class="f7-icons size-12 text-color-black padding-right-half">clock</i>
                                                        <span class="text-color-black">3:00pm</span>
                                                    </div>
                                                    <div class="display-flex padding-left-half padding-top">
                                                        <i class="f7-icons size-12 text-color-black padding-right-half">phone</i>
                                                        <span class="text-color-black">+91 12345 12345</span>
                                                    </div>
                                                    <div class="display-flex padding-left-half padding-top-half">
                                                        <i class="f7-icons size-12 text-color-black padding-right-half">person_2_fill</i>
                                                        <span class="text-color-black">5 family member</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-50 table_reservation_info margin-top">
                                        <div class="person-info tooltip" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;3</span>
                                                <span class="waiting-time margin-top-half text-align-center">
                                                    <i class="f7-icons size-22">clock_fill</i>
                                                    <span>2:47</span>
                                                </span>
                                            </div>
                                            <div class="tooltiptext padding-half">
                                                <div class="user-info">
                                                    <div class="display-flex padding-left-half padding-top-half">
                                                        <i class="f7-icons size-12 text-color-black padding-right-half">person_fill</i>
                                                        <span class="text-color-black">John Smith</span>
                                                    </div>
                                                    <div class="display-flex padding-left-half padding-top">
                                                        <i class="f7-icons size-12 text-color-black padding-right-half">clock</i>
                                                        <span class="text-color-black">3:00pm</span>
                                                    </div>
                                                    <div class="display-flex padding-left-half padding-top">
                                                        <i class="f7-icons size-12 text-color-black padding-right-half">phone</i>
                                                        <span class="text-color-black">+91 12345 12345</span>
                                                    </div>
                                                    <div class="display-flex padding-left-half padding-top-half">
                                                        <i class="f7-icons size-12 text-color-black padding-right-half">person_2_fill</i>
                                                        <span class="text-color-black">5 family member</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-50 table_reservation_info margin-top">
                                        <div class="person-info tooltip" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;3</span>
                                                <span class="waiting-time margin-top-half text-align-center">
                                                    <i class="f7-icons size-22">clock_fill</i>
                                                    <span>2:47</span>
                                                </span>
                                            </div>
                                            <div class="tooltiptext padding-half">
                                                <div class="user-info">
                                                    <div class="display-flex padding-left-half padding-top-half">
                                                        <i class="f7-icons size-12 text-color-black padding-right-half">person_fill</i>
                                                        <span class="text-color-black">John Smith</span>
                                                    </div>
                                                    <div class="display-flex padding-left-half padding-top">
                                                        <i class="f7-icons size-12 text-color-black padding-right-half">clock</i>
                                                        <span class="text-color-black">3:00pm</span>
                                                    </div>
                                                    <div class="display-flex padding-left-half padding-top">
                                                        <i class="f7-icons size-12 text-color-black padding-right-half">phone</i>
                                                        <span class="text-color-black">+91 12345 12345</span>
                                                    </div>
                                                    <div class="display-flex padding-left-half padding-top-half">
                                                        <i class="f7-icons size-12 text-color-black padding-right-half">person_2_fill</i>
                                                        <span class="text-color-black">5 family member</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;3</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;3</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;3</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;3</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--======= TABLE CHAIR ========= -->
                    <div class="row table_bottom_chair">
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table1-2.png" alt="table">
                            </div>
                        </div>
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table1-2.png" alt="table">
                            </div>
                        </div>
                    </div>  
                </div>
                <!-- ======== TABLE 2 START ======= -->
                <div class="col-30 no-padding no-margin-horizontal table-card">    
                    <!--======= TABLE CHAIR ========= -->
                    <div class="row table_top_chair">
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table-2.png" alt="table">
                            </div>
                        </div>
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table-2.png" alt="table">
                            </div>
                        </div>
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table-2.png" alt="table">
                            </div>
                        </div>
                    </div> 
                    <div class="card table_2 no-margin">                        
                        <div class="card-header no-padding">
                            <div class="row header_detail">
                                <div class="table-number padding-half"> 
                                    <p class="no-margin">Table No. </p>
                                    <p class=" text-align-center no-margin"> 02</p>
                                </div>
                                <div class="table-capacity text-align-right padding-half"> 
                                    <p class="no-margin">Capacity </p>
                                    <p class="text-align-center no-margin">06</p>                                     
                                </div>
                            </div>
                        </div>
                        <div class="card-content card-content-padding">
                            <!-- <div class="table_image text-align-center">
                                <img src="/images/table/4_member_table.png" alt="">
                            </div> -->
                            <div class="table_reservation margin-top equal-height-table">
                                <h3>Empty</h3>
                                <div class="row padding-horizontal-half">
                                    <div class="col-50 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;4</span>
                                                <span class="waiting-time margin-top-half text-align-center">
                                                    <i class="f7-icons size-22">clock_fill</i>
                                                    <span>2:47</span>
                                                </span>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="col-50 table_reservation_info ">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;4</span>
                                                <span class="waiting-time margin-top-half text-align-center">
                                                    <i class="f7-icons size-22">clock_fill</i>
                                                    <span>2:47</span>
                                                </span>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="col-50 table_reservation_info margin-top">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;4</span>
                                                <span class="waiting-time margin-top-half text-align-center">
                                                    <i class="f7-icons size-22">clock_fill</i>
                                                    <span>2:47</span>
                                                </span>
                                            </div>                                           
                                        </div>
                                    </div>
                                    <!-- <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;4</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;4</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--======= TABLE CHAIR ========= -->
                    <div class="row table_bottom_chair">
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table-2-1.png" alt="table">
                            </div>
                        </div>
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table-2-1.png" alt="table">
                            </div>
                        </div>
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table-2-1.png" alt="table">
                            </div>
                        </div>
                    </div> 
                </div>
                <!-- ======= TABLE 3 START ========== -->
                <div class="col-40 no-padding no-margin-horizontal table-card">
                    <!--======= TABLE CHAIR ========= -->
                    <div class="row table_top_chair">
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table-3.png" alt="table">
                            </div>
                        </div>
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table-3.png" alt="table">
                            </div>
                        </div>
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table-3.png" alt="table">
                            </div>
                        </div>
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table-3.png" alt="table">
                            </div>
                        </div>
                    </div>  
                    <div class="card table_3 no-margin">
                        <div class="card-header no-padding ">
                            <div class="row header_detail">
                                <div class="table-number padding-half"> <p class="no-margin">Table No.</p>
                                    <p class=" text-align-center no-margin"> 03</p>                                    
                                </div>
                                <div class="table-capacity text-align-right padding-half"> <p class="no-margin">Capacity</p>
                                    <p class=" text-align-center no-margin"> 08</p>                                                                        
                                </div>
                            </div>
                        </div>
                        <div class="card-content card-content-padding">
                             
                            <!-- <div class="table_image text-align-center">
                                <img src="/images/table/5_member_table.png" alt="">
                            </div> -->
                            <div class="table_reservation margin-top equal-height-table">
                                <div class="row">
                                    <div class="col-33 table_reservation_info">
                                        <div class="person-info " data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                                <span class="waiting-time margin-top-half text-align-center">
                                                    <i class="f7-icons size-22">clock_fill</i>
                                                    <span>2:47</span>
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-33 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                                <span class="waiting-time margin-top-half text-align-center">
                                                    <i class="f7-icons size-22">clock_fill</i>
                                                    <span>2:47</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-33 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                                <span class="waiting-time margin-top-half text-align-center">
                                                    <i class="f7-icons size-22">clock_fill</i>
                                                    <span>2:47</span>
                                                </span>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="col-33 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                                <span class="waiting-time margin-top-half text-align-center">
                                                    <i class="f7-icons size-22">clock_fill</i>
                                                    <span>2:47</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--======= TABLE CHAIR ========= -->
                    <div class="row table_bottom_chair">
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table3-1.png" alt="table">
                            </div>
                        </div>
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table3-1.png" alt="table">
                            </div>
                        </div>
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table3-1.png" alt="table">
                            </div>
                        </div>
                        <div class="col">
                            <div class="table_card_img text-align-center">
                                <img src="/images/table/table3-1.png" alt="table">
                            </div>
                        </div>
                    </div> 
                </div>
                <!-- <div class="col-25 card no-margin-horizontal no-padding table-card">
                    <div class="">
                        <div class="card-header no-padding">
                            <div class="row header_detail">
                                <div class="text-color-white table-number padding-half">Table : 4</div>
                                <div class="text-color-white table-capacity text-align-right padding-half">Capacity : 6</div>
                            </div>
                        </div>
                        <div class="card-content card-content-padding">
                            <div class="table_image text-align-center">
                                <img src="/images/table/6_member_table.png" alt="">
                            </div>
                            <div class="table_reservation margin-top equal-height-table">
                                <div class="row">
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-25 card no-padding no-margin-horizontal table-card">
                    <div class="">
                        <div class="card-header no-padding">
                            <div class="row header_detail">
                                <div class="text-color-white table-number padding-half">Table : 5</div>
                                <div class="text-color-white table-capacity text-align-right padding-half">Capacity : 1</div>
                            </div>
                        </div>
                        <div class="card-content card-content-padding">
                            <div class="table_image text-align-center">
                                <img src="/images/table/1_member_table.png" alt="">
                            </div>
                            <div class="table_reservation margin-top equal-height-table">
                                <div class="row">
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-25 card no-padding no-margin-horizontal table-card">
                    <div class="">
                        <div class="card-header no-padding">
                            <div class="row header_detail">
                                <div class="text-color-white table-number padding-half">Table : 6</div>
                                <div class="text-color-white table-capacity text-align-right padding-half">Capacity : 2</div>
                            </div>
                        </div>
                        <div class="card-content card-content-padding">
                            <div class="table_image text-align-center">
                                <img src="/images/table/2_member_table.png" alt="">
                            </div>
                            <div class="table_reservation margin-top equal-height-table">
                                <div class="row">
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-25 card no-padding no-margin-horizontal table-card">
                    <div class="">
                        <div class="card-header no-padding">
                            <div class="row header_detail">
                                <div class="text-color-white table-number padding-half">Table : 7</div>
                                <div class="text-color-white table-capacity text-align-right padding-half">Capacity : 7</div>
                            </div>
                        </div>
                        <div class="card-content card-content-padding">
                            <div class="table_image text-align-center">
                                <img src="/images/table/7_member_table.png" alt="">
                            </div>
                            <div class="table_reservation margin-top equal-height-table">
                                <div class="row">
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-25 card no-padding no-margin-horizontal table-card">
                    <div class="">
                        <div class="card-header no-padding">
                            <div class="row header_detail">
                                <div class="text-color-white table-number padding-half">Table : 8</div>
                                <div class="text-color-white table-capacity text-align-right padding-half">Capacity : 8</div>
                            </div>
                        </div>
                        <div class="card-content card-content-padding">
                            <div class="table_image text-align-center">
                                <img src="/images/table/8_member_table.png" alt="">
                            </div>
                            <div class="table_reservation margin-top equal-height-table">
                                <div class="row">
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                            <div class="bg-color-white">
                                                <a href="/profile/" class="link tooltip-init profile-link" data-tooltip="Profile settings">
                                                    <i class="profile-icon"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-25 card no-padding no-margin-horizontal table-card">
                    <div class="">
                        <div class="card-header no-padding">
                            <div class="row header_detail">
                                <div class="text-color-white table-number padding-half">Table : 9</div>
                                <div class="text-color-white table-capacity text-align-right padding-half">Capacity : 10</div>
                            </div>
                        </div>
                        <div class="card-content card-content-padding">
                            <div class="table_image text-align-center">
                                <img src="/images/table/10_member_table.png" alt="">
                            </div>
                            <div class="table_reservation margin-top equal-height-table">
                                <div class="row">
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-25 card no-padding no-margin-horizontal table-card">
                    <div class="">
                        <div class="card-header no-padding">
                            <div class="row header_detail">
                                <div class="text-color-white table-number padding-half">Table : 10</div>
                                <div class="text-color-white table-capacity text-align-right padding-half">Capacity : 20</div>
                            </div>
                        </div>
                        <div class="card-content card-content-padding">
                            <div class="table_image text-align-center">
                                <img src="/images/table/20_member_table.png" alt="">
                            </div>
                            <div class="table_reservation margin-top equal-height-table">
                                <div class="row">
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-25 card no-padding no-margin-horizontal table-card">
                    <div class="">
                        <div class="card-header no-padding">
                            <div class="row header_detail">
                                <div class="text-color-white table-number padding-half">Table : 11</div>
                                <div class="text-color-white table-capacity text-align-right padding-half">Capacity : 9</div>
                            </div>
                        </div>
                        <div class="card-content card-content-padding">
                            <div class="table_image text-align-center">
                                <img src="/images/table/9_member_table.png" alt="">
                            </div>
                            <div class="table_reservation margin-top equal-height-table">
                                <div class="row">
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-25 card no-padding no-margin-horizontal table-card">
                    <div class="">
                        <div class="card-header no-padding">
                            <div class="row header_detail">
                                <div class="text-color-white table-number padding-half">Table : 12</div>
                                <div class="text-color-white table-capacity text-align-right padding-half">Capacity : 15</div>
                            </div>
                        </div>
                        <div class="card-content card-content-padding">
                            <div class="table_image text-align-center">
                                <img src="/images/table/15_member_table.png" alt="">
                            </div>
                            <div class="table_reservation margin-top equal-height-table">
                                <div class="row">
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-25 table_reservation_info">
                                        <div class="person-info" data-tooltip="Button tooltip text" @click="openTooltip">
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;5</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        </f7-page>
</template>

<script>
import { f7,f7Page, f7Navbar, f7BlockTitle, f7Block } from 'framework7-vue';
import $ from 'jquery';
export default {
    name : 'RegisterPage',
    components : {
        f7,f7Page, f7Navbar, f7BlockTitle, f7Block
    },
    mounted() {
        this.equal_height();
    },
    updated() {
        this.equal_height();
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
    },
}
</script>

<style scoped>

    .header-links{
        box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.15);
        height: 60px !important;
        position: relative;
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
    .menu-dropdown-link:nth-child(2){
        border-bottom: 1px solid #EFEFEF;
    }
    /*.table_reservation .row{
        justify-content: flex-start;
        width: 100%;
    }*/
    .col-25{
        /* width: 25% !important; */
        padding: 5px;
    }
    .table_image {
        height: 100%;
        min-height: 44px;
    }
    .card {
        border-radius: 10px;
    }
    /*.card-content{
        height: 100%;
        min-height: 210px;
    }*/
    /*.table_reservation_info{
        width: 25% !important;
    }*/
.size-12{
    font-size :12px;
}
.tooltip {
    position: relative;
    display: inline-block;
    opacity: 1;
    width: 100%;
    background: #f1f1f1;
    padding: 10px;
    color: black;
    line-height: 1.4;
    transform: inherit;
    transition-duration: inherit;
    transition-property: inherit;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 160px;
  background-color :#fff;
  box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.15);
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  top: 100%;
  left: -42px;
  /*margin-left: -60px;*/
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  bottom: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: transparent transparent #fff transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}

@media screen and (max-width : 820px) {
    .nav-button {
        width : 25% !important;
    }
    .table-card{
        width : 33.33% !important;
    }
}
</style>

<style>
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
        /*box-shadow: 0px 1px 2px rgba(218, 172, 172, 0.22);*/
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
    /*.table-number{
        background: #F33E3E;
    }*/
    .person-info i{
        font-size: 12px !important;
        padding-right: 5px;
    }
    .person-info{
        background: #F1F1F1;
        border-radius: 5px;
        padding: 7px 5px !important;
        font-size: 10px !important;
        width: 100%;
        max-width: 108px;
    }
    /*.person{
        border-bottom: 1px solid;
    }*/
    .waiting-time{
        border-left: 0.5px solid #555555;
        padding-left: 8px;
        margin-left: 8px;
    }
    /*.table_reservation{
        height: 100%;
        min-height: 125px;
        display: flex;
        justify-content: flex-start;
        align-items: end;
    }*/
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
    .table_row .table_1{
        border-left: 10px solid #0FC963;
    }
    .table_row .table_2{
        border-left: 10px solid #FF6161;
    }
    .table_row .table_3{
        border-left: 10px solid #FC8E5E;

    }
    .table_top_chair{
        margin-bottom: -2px;
    }
    .table_bottom_chair{
        margin-top: -2px;
    }
</style>
