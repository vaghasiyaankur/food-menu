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
                                        <td>#{{ (paginationData.per_page * (pageNumber - 1)) + (index + 1) }}</td>
                                        <td>{{ data.name ? data.name : 'Anonymous' }}</td>
                                        <td>{{ data.phone ? data.phone : '--' }}</td>
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
                                    <tr v-if="reservation && reservation.length == 0">
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

<script setup>
import { ref, onMounted } from 'vue';
import $ from 'jquery';
import { f7Page, f7 } from 'framework7-vue';
import axios from 'axios';

const id = ref('');
const reservation = ref([]);
const fromDate = ref('');
const toDate = ref('');
const search = ref('');
const paginationData = ref([]);
const showFilter = ref(false);
const pageNumber = ref(1);

onMounted(() => {
    //   addLoader();
    f7.calendar.create({
        inputEl: '#calender-date-range',
        rangePicker: true,
        numbers: true,
        footer: true,
        on: {
        open() {
            setTimeout(() => {
            $('.popover-angle').css({ 'left': '147px' });
            if ($('body').width() > $('body').height()) $('.calendar-popover').css({ 'top': '152px', 'left': '293.312px' });
            else $('.calendar-popover').css({ 'top': '152px', 'left': '143.312px' });
            }, 1);
        },
        close(dateRange) {
            var dates = dateRange.getValue();
            if (dates) {
            var from_date = new Date(dates[0]).toLocaleDateString('sv-SE');
            var to_date = dates[1] ? new Date(dates[1]).toLocaleDateString('sv-SE') : '';
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

    reservationData(pageNumber.value);
    //   activationMenu('all-reservation', '');
    //   removeLoader();
});

const reservationData = (pNumber) => {
    if (pNumber == undefined || pNumber == 1) {
        pNumber = 1
    } else {
        pNumber = pNumber.split('page=')[1];
    }

    const searchValue = search.value;
    const from_date = fromDate.value;
    const to_date = toDate.value;

    pageNumber.value = pNumber;
    const page = '/api/reservation-list?from_date=' + from_date + '&to_date=' + to_date + '&search=' + searchValue + '&page=' + pNumber;
    axios.get(page)
    .then((res) => {
        reservation.value = res.data.reservation.data;
        paginationData.value = res.data.reservation;
    })
}

const removeReservation = (id) => {
    f7.dialog.confirm('Are you sure delete this reservation?', () => {
        axios.post('/api/remove-reservation', { id: id })
        .then((res) => {
            // this.$root.successNotification(res.data.success);
            reservationData();
        })
    });

    setTimeout(() => {
        $('.dialog-button').eq(1).css({ 'background-color': '#F33E3E', 'color': '#fff' });
        $('.dialog-title').html("<img src='/images/cross.png'>");
        $('.dialog-buttons').after("<div><img src='/images/flow.png' style='width:100%'></div>");
        $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
        $('.dialog-button').eq(1).removeClass('text-color-black');
        $('.dialog-buttons').addClass('margin-top no-margin-bottom')
    }, 50);
}

const calender = () => {
    const from = $("#from-date").val();
    const to = $("#to-date").val();
    if (from) fromDate.value = new Date(from).toLocaleDateString('sv-SE');
    else fromDate.value = '';
    if (to) toDate.value = new Date(to).toLocaleDateString('sv-SE');
    else toDate.value = '';
    }

    const resetFilter = () => {
    fromDate.value = '';
    toDate.value = '';
    search.value = '';
    $(".date-range").val('');
    reservationData();
    showFilter.value = false;
}

</script>
