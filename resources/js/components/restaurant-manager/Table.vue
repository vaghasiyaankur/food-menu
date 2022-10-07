<template>
    <f7-page color="bg-color-white">
        <f7-navbar class="navbar-menu text-color-black bg-color-white" large transparent back-link="Back">
            <div class="right">
                <div class="row header-link">
                    <div class="col"><button class="col button button-raised text-color-black padding">Menu management</button></div>
                    <div class="col"><button class="col button button-raised text-color-black padding">Close reservation</button></div>
                    <div class="col"><button class="col button button-raised text-color-black padding">Settings</button></div>
                </div>
            </div>
        </f7-navbar>

        <div class="tables">
            <div class="row table_row">
                <div class="col-25 no-padding">
                    <div class="card">
                        <div class="card-header no-padding">
                            <div class="row header_detail">
                                <div class="text-color-white table-number padding-half">Table : 1</div>
                                <div class="text-color-white table-capacity text-align-right padding-half">Capacity : 3</div>
                            </div>
                        </div>
                        <div class="card-content card-content-padding">
                            <div class="table_image text-align-center">
                                <img src="/images/table/3_member_table.png" alt="">
                            </div>
                            <div class="table_reservation margin-top">
                                <div class="row">
                                    <div class="col-25">
                                        <div class="person-info tooltip" >
                                            <div class="text-align-center person">
                                                <i class="f7-icons size-22">person_fill</i>
                                                <span>&nbsp;3</span>
                                            </div>
                                            <div class="waiting-time margin-top-half text-align-center">
                                                <i class="f7-icons size-22">clock_fill</i>
                                                <span>2:47</span>
                                            </div>
                                            <div class="tooltiptext">
                                                <div class="user-info ">
                                            <div class="display-flex">
                                                <i class="f7-icons size-12">person_fill</i>
                                                <span>John Smith</span>
                                            </div>
                                            <div class="display-flex">
                                                <i class="f7-icons size-12">+91 12345 12345</i>
                                                <span>+91 12345 12345</span>
                                            </div>
                                            <div class="display-flex">
                                                <i class="f7-icons size-12">person_2_fill</i>
                                                <span>5 family member</span>
                                            </div>
                                        </div>
                                            </div>
                                        </div>

                                        <!-- <div class="bg-color-white user-info ">
                                            <div class="display-flex">
                                                <i class="f7-icons size-12">person_fill</i>
                                                <span>John Smith</span>
                                            </div>
                                            <div class="display-flex">
                                                <i class="f7-icons size-12">+91 12345 12345</i>
                                                <span>+91 12345 12345</span>
                                            </div>
                                            <div class="display-flex">
                                                <i class="f7-icons size-12">person_2_fill</i>
                                                <span>5 family member</span>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-25 no-padding">
                    <div class="card">
                        <div class="card-header no-padding">
                            <div class="row header_detail">
                                <div class="text-color-white table-number padding-half">Table : 2</div>
                                <div class="text-color-white table-capacity text-align-right padding-half">Capacity : 4</div>
                            </div>
                        </div>
                        <div class="card-content card-content-padding">
                            <div class="table_image text-align-center">
                                <img src="/images/table/4_member_table.png" alt="">
                            </div>
                            <div class="table_reservation margin-top">
                                <div class="row">
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-25 no-padding">
                    <div class="card">
                        <div class="card-header no-padding ">
                            <div class="row header_detail">
                                <div class="text-color-white table-number padding-half">Table : 3</div>
                                <div class="text-color-white table-capacity text-align-right padding-half">Capacity : 5</div>
                            </div>
                        </div>
                        <div class="card-content card-content-padding">
                            <div class="table_image text-align-center">
                                <img src="/images/table/5_member_table.png" alt="">
                            </div>
                            <div class="table_reservation margin-top">
                                <div class="row">
                                    <div class="col-25">
                                        <div class="person-info " data-tooltip="Button tooltip text" @click="openTooltip">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                <div class="col-25 no-padding">
                    <div class="card">
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
                            <div class="table_reservation margin-top">
                                <div class="row">
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                <div class="col-25 no-padding">
                    <div class="card">
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
                            <div class="table_reservation margin-top">
                                <div class="row">
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                <div class="col-25 no-padding">
                    <div class="card">
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
                            <div class="table_reservation margin-top">
                                <div class="row">
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                <div class="col-25 no-padding">
                    <div class="card">
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
                            <div class="table_reservation margin-top">
                                <div class="row">
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                <div class="col-25 no-padding">
                    <div class="card">
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
                            <div class="table_reservation margin-top">
                                <div class="row">
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                <div class="col-25 no-padding">
                    <div class="card">
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
                            <div class="table_reservation margin-top">
                                <div class="row">
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                <div class="col-25 no-padding">
                    <div class="card">
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
                            <div class="table_reservation margin-top">
                                <div class="row">
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                <div class="col-25 no-padding">
                    <div class="card">
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
                            <div class="table_reservation margin-top">
                                <div class="row">
                                    <div class="col-25">
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
                                    <div class="col-25">
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
                <div class="col-25 no-padding">
                    <div class="card">
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
                            <div class="table_reservation margin-top">
                                <div class="row">
                                    <div class="col-25">
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
                                    <div class="col-25">
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
            </div>
        </div>
    </f7-page>
</template>

<script>
import { f7,f7Page, f7Navbar, f7BlockTitle, f7Block } from 'framework7-vue';
export default {
    name : 'RegisterPage',
    components : {
        f7,f7Page, f7Navbar, f7BlockTitle, f7Block
    },
    // methods: {
    //     openTooltip(){
    //         f7.tooltip.create({
    //             targetEl: '.person-info',
    //             text: '<div class="bg-color-white">sddsdsfds</div>'
    //         });
    //     }
    // },
}
</script>

<style scoped>
    .tables .table_row,.table_reservation .row{
        justify-content: flex-start;
        width: 100%;
    }
    .col-25{
        width: 25% !important;
        padding: 5px;
    }
    .table_image {
        height: 100%;
        min-height: 44px;
    }
    .card {
        border-radius: 10px;
    }
    .card-header{
        border-radius: 10px 10px 0 0 !important;
    }
    .size-12{
        font-size :12px;
    }
    .user-info{
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.11);
    }
    .tooltip {
    position: relative;
    display: inline-block;
    opacity: 1;
    width: 100%;
    background: #f1f1f1;
    padding: 10px;
    color: black;
    line-height: initial;
    transform: inherit;
    transition-duration: inherit;
    transition-property: inherit;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color :#fff;
  box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.15);
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  top: 100%;
  left: 50%;
  margin-left: -60px;
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
</style>

<style>
    .navbar-menu{
        box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.15);
        height: 60px !important;
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
        background: #394C65;
        box-shadow: 0px 1px 2px rgba(218, 172, 172, 0.22);
        min-height: 0 !important;
        overflow: hidden;
    }
    .header_detail{
        width:100%;
    }
    .table-number{
        background: #F33E3E;
    }
    .person-info i{
        font-size: 12px !important;
    }
    .person-info{
        background: #F1F1F1;
        border-radius: 5px;
        padding: 7px 5px;
        font-size: 10px !important;
    }
    .person{
        border-bottom: 1px solid;
    }
    .table_reservation{
        height: 100%;
        min-height: 125px;
        display: flex;
        justify-content: flex-start;
        align-items: end;
    }
</style>

