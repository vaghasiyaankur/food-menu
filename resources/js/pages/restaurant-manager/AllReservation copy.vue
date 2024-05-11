<template>
<f7-page>
    <div class="all_reservation">
        <div class="all_reservation_inner">
            <div class="card">
                <div class="card_header padding-top-half">
                    <div class="row padding-top align-items-center">
                        <div class="col-85">
                            <div class="row align-items-center" :class="{ 'display-none': !showFilter }">
                                <div class="col-30">
                                    <div class="item-content item-input">
                                        <div class="item-inner">
                                            <div class="item-input-wrap searchData row padding-half height_40 search_data_wrap">
                                                <i class="f7-icons font-18 search-icon">search</i>
                                                <input type="search" name="search" class="search__data" id="searchData" v-model="search" placeholder="Search user name or reservation ID">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-30">
                                    <div class="list no-hairlines reporting-calendar no-margin">
                                        <ul>
                                            <li>
                                                <div class="item-input no-padding-left">
                                                    <div class=" no-padding-right">
                                                        <div class="item-input-wrap input-dropdown-wrap">
                                                            <input type="text" placeholder="Select date range" class="padding-horizontal-half height_40 date-range" readonly="" id="calender-date-range">
                                                            <input type="hidden" name="from-date" id="from-date">
                                                            <input type="hidden" name="to-date" id="to-date">
                                                        </div>
                                                    </div>

                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-40">
                                    <div class="item-content item-input">
                                        <div class="row">
                                            <button class="col button button-fill button-raised bg-dark height_40" style="border-radius: 7px;" @click="reservationData()">Apply</button>
                                            <button class="col button button-fill button-raised bg-pink height_40" @click="resetFilter()">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-15">
                            <div class="filters_button">
                                <button class="button button-outline height_40" @click="showFilter = true"><i class="f7-icons">funnel</i>Filters</button>
                            </div>
                        </div>
                        <button @click="calender" style="opacity: 0" id="date-set" class="data_set_btn"></button>
                    </div>
                </div>
                <div class="reservation_table">
                    <div class="card data-table no-margin-horizontal overflow_x_inherit">
                        <div class="table_content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Reservation ID</th>
                                        <th>User Name</th>
                                        <th>Phone Number</th>
                                        <th>No. of Guest</th>
                                        <th style="width:15%;">Status</th>
                                        <th>Reservation Date & Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(data,index) in reservation" :key="data.id">
                                        <td>#{{ (paginationData.per_page * (page_number - 1)) + (index + 1) }}</td>
                                        <td>{{ data.customer.name }}</td>
                                        <td>{{ data.customer.number }}</td>
                                        <td>{{ data.person }}</td>
                                        <td v-if="data.deleted_at"><span class="status_info status_cancel">Cancel</span></td>
                                        <td v-else-if="data.finished"><span class="status_info status_complete">Complete</span></td>
                                        <td v-else-if="data.start_at"><span class="status_info status_ongoing">Ongoing</span></td>
                                        <td v-else><span class="status_info status_waiting">Wating</span></td>
                                        <td>{{ data.date }}</td>
                                        <td>
                                            <div class="menu-item-dropdown">
                                                <div class=""><i class="f7-icons">ellipsis</i></div>
                                                <div class="menu-dropdown menu-dropdown-right">
                                                    <div class="menu-dropdown-content padding-vertical">
                                                        <a class="menu-dropdown-link menu-close button padding-bottom height_40" :href="'/reservation-view/'+data.id"><i class="f7-icons margin-right-half">eye</i>View </a>
                                                        <a class="menu-dropdown-link menu-close padding-top button height_40" @click="removeReservation(data.id)"><i class="f7-icons margin-right-half">trash</i>Delete </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr v-if="reservation.length == 0">
                                        <td colspan="7" class="text-align-center">No Data Found !!</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="pagination_count padding-vertical-half">
                <div class="pagination_list">
                    <div v-for="(link,index) in paginationData.links" :key="link">
                        <a href="javascript:;" v-if="index == 0" @click="link.url != null ? reservationData(link.url) : 'javascript:;'" class="link" :class="{ 'disabled': link.url == null}"><i class="icon-prev"></i></a>
                        <a href="javascript:;" v-if="paginationData.links.length - 1 != index && index != 0" @click="reservationData(link.url)" :class="{ 'disabled': link.url == null, 'active': paginationData.current_page == index}">{{ index }}</a>
                        <a href="javascript:;" v-if="paginationData.links.length - 1 == index" @click="link.url != null ? reservationData(link.url) : 'javascript:;'" class="link" :class="{ 'disabled': link.url == null}"><i class="icon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</f7-page>
</template>

<script>
import $ from "jquery";
import {
    f7Page,
    f7
} from 'framework7-vue';
import axios from 'axios';

export default {
    name: 'AllReservation',
    data() {
        return {
            id: '',
            reservation: [],
            from_date: '',
            to_date: '',
            search: '',
            paginationData: [],
            showFilter: false,
            page_number: 1,
        }
    },
    components: {
        f7Page,
        f7,
    },
    beforeCreate() {
        this.$root.addLoader();
    },
    created() {
        this.reservationData(this.page_number);
    },
    mounted() {
        f7.calendar.create({
            inputEl: '#calender-date-range',
            rangePicker: true,
            numbers: true,
            footer: true,
            on: {
                open() {
                    setTimeout(() => {
                        $('.popover-angle').css({
                            'left': '147px'
                        });
                        if ($('body').width() > $('body').height()) $('.calendar-popover').css({
                            'top': '152px',
                            'left': '293.312px'
                        });
                        else $('.calendar-popover').css({
                            'top': '152px',
                            'left': '143.312px'
                        });
                    }, 1);
                },
                close(daterange) {
                    var dates = daterange.getValue();
                    if (dates) {
                        var from_date = new Date(dates[0]).toLocaleDateString('sv-SE');
                        if (dates[1]) var to_date = new Date(dates[1]).toLocaleDateString('sv-SE');
                        else var to_date = '';
                        $("#from-date").val(from_date);
                        $("#to-date").val(to_date);
                        $("#date-set").trigger('click');
                        // axios.get('/api/report-data?from_date='+from_date+'&to_date='+to_date)
                        // .then((res) => {
                        //     $("#total_order").text(res.data.total_order);
                        //     $("#complete_order").text(res.data.complete_order);
                        //     $("#ongoing_order").text(res.data.ongoing_order);
                        //     $("#reservation_table").text(res.data.reservation_table);
                        // })

                    }
                }
            },
        });

        this.$root.activationMenu('all-reservation', '');
        this.$root.removeLoader();
    },
    methods: {
        reservationData(pagenumber) {
            if (pagenumber == undefined || pagenumber == 1) {
                pagenumber = 1
            } else {
                pagenumber = pagenumber.split('page=')[1];
            }

            var search = this.search;
            var from_date = this.from_date;
            var to_date = this.to_date;

            this.page_number = pagenumber;
            var page = '/api/reservation-list?from_date=' + from_date + '&to_date=' + to_date + '&search=' + search + '&page=' + pagenumber;
            axios.get(page)
                .then((res) => {
                    this.reservation = res.data.reservation.data;
                    this.paginationData = res.data.reservation;
                })
        },
        removeReservation(id) {
            f7.dialog.confirm('Are you sure delete this reservation?', () => {
                axios.post('/api/remove-reservation', {
                        id: id
                    })
                    .then((res) => {
                        // this.$root.successNotification(res.data.success);
                        this.reservationData();
                    })
            });

            setTimeout(() => {
                $('.dialog-button').eq(1).css({
                    'background-color': '#F33E3E',
                    'color': '#fff'
                });
                $('.dialog-title').html("<img src='/images/cross.png'>");
                $('.dialog-buttons').after("<div><img src='/images/flow.png' style='width:100%'></div>");
                $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
                $('.dialog-button').eq(1).removeClass('text-color-black');
                $('.dialog-buttons').addClass('margin-top no-margin-bottom')
            }, 50);
        },
        calender() {
            var from = $("#from-date").val();
            var to = $("#to-date").val();
            if (from) this.from_date = new Date(from).toLocaleDateString('sv-SE');
            else this.from_date = '';
            if (to) this.to_date = new Date(to).toLocaleDateString('sv-SE');
            else this.to_date = '';
        },
        resetFilter() {
            this.from_date = '';
            this.to_date = '';
            this.search = '';
            $(".date-range").val('');
            this.reservationData();
            this.showFilter = false;
        }
    }
}
</script>

<style scoped>
button.data_set_btn {
    outline: none;
    border: none;
}

.overflow_x_inherit {
    overflow-x: inherit;
}

.justify_content_between {
    justify-content: space-between !important;
}

.all_reservation {
    margin-top: 59px;
    background-color: #ffffff;
}

.all_reservation_inner .card {
    height: calc(100vh - 165px);
    overflow: auto;
}

.all_reservation .card {
    box-shadow: none;
    background-color: transparent;
}

.all_reservation .item-input-wrap {
    width: 100%;
    background: #FFFFFF;
    border: 0.5px solid #555555;
    border-radius: 7px;
    height: auto;
}

.all_reservation .filters_button .button {
    border: 1px solid #555555;
    border-radius: 5px;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #555555;
    border-radius: 7px;
}

/*======== TABLE ==========*/
.reservation_table thead tr {
    background: #F4F4F4;
}

.reservation_table .table_content table tr td {
    padding: 20px 16px;
    font-weight: 400;
    font-size: 15px;
    line-height: 18px;
    color: #38373D;
    white-space: nowrap;
}

.reservation_table .table_content table thead tr th {
    font-weight: 600;
    font-size: 15px;
    line-height: 18px;
    color: #555555;
}

.reservation_table .table_content table tbody tr:nth-child(even) {
    background-color: #FAFAFA;
}

.reservation_table .table_content .status_info {
    display: flex;
    justify-content: center;
    border-radius: 5px;
    height: 26px;
    line-height: 26px;
    font-weight: 400;
    font-size: 12px;
    width: 80%;
    padding: 0 42px;
}

.reservation_table .table_content .status_info.status_complete {
    background-color: #E9FBE7;
    color: #3D833C;
}

.reservation_table .table_content .status_info.status_waiting {
    background: #E7E7E7;
    color: #555555;
}

.reservation_table .table_content .status_info.status_ongoing {
    background: #FFF9E3;
    color: #D39255;
}

.reservation_table .table_content .status_info.status_cancel {
    background: #FFE7DD;
    color: #E31A1A;
}

.pagination_count {
    /* position: fixed;
    bottom: 15; */
    width: 100%;
    z-index: 9999999;
    height: 60px;
    background-color: #fff;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
}

.pagination_count .pagination_list {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

.pagination_count .pagination_list a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 5px;
}

.pagination_count .pagination_list a:hover:not(.active) {
    background-color: #ddd;
    border-radius: 5px;
}

.menu-item-dropdown-right .menu-dropdown::before,
.menu-item-dropdown-center .menu-dropdown::before,
.menu-dropdown-right::before,
.menu-dropdown-center::before {
    content: none;
}

.reservation_table .table_content .menu-dropdown {
    background-color: transparent;
}

.reservation_table .table_content .menu-dropdown-content {
    top: -9px !important;
}

.reservation_table .table_content .menu-item-dropdown-right .menu-dropdown-content,
.reservation_table .table_content .menu-dropdown-right .menu-dropdown-content {
    right: 33px;
    border-top-right-radius: 5px;
    width: 180px;
}

.reservation_table .table_content .menu-dropdown-content {
    background: #FFFFFF;
    box-shadow: 0px 0px 14px rgba(34, 34, 34, 0.1);
    z-index: 9999;
}

.reservation_table .table_content .menu-dropdown-content a {
    font-weight: 500;
    font-size: 15px;
    line-height: 18px;
    color: #999999;
}

.reservation_table .table_content .menu-dropdown-link:last-child {
    border-top: 0.5px solid #999999;
    border-radius: 0;
}

.reservation_table .table_content .menu-dropdown-link {
    justify-content: flex-start !important;
}

.pagination_count .pagination_list {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.pagination_count .pagination_list a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 5px;
}

.menu-dropdown-link::before {
    background-color: #F33E3E !important;
    height: 100%;
    top: -6px;
}

.active-state {
    background-color: none !important;
    opacity: 0 !important;
}
</style>
<style>
::placeholder {
    font-weight: 500 !important;
    font-size: 14px;
    line-height: 17px;
    color: #555555 !important;
}

.height_40 {
    height: 40px !important;
}

.font-18 {
    font-size: 18px !important;
}

.height_50 {
    height: 50px !important;
}

/*===== SERACH BOX CSS =======*/
.search__data {
    width: 90%;
    line-height: 20px;
    font-size: var(--f7-input-font-size);
}

.search_data_wrap {
    width: 100%;
    background: #FFFFFF;
    border: 0.5px solid #555555;
    border-radius: 7px;
    height: auto;
}

/*===== SERACH BOX CSS END=======*/
.calendar.calendar-range {
    background-color: #FFFFFF !important;
    border-radius: 10px !important;
}

@media screen and (max-width:820px) {
    .search__data {
        width: 87%;
    }
}
</style>
