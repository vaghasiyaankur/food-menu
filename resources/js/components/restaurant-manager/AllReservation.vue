<template>
    <f7-page>
        <div class="all_reservation">
            <div class="all_reservation_inner">
                <div class="card">
                    <div class="card_header padding-top-half">
                        <div class="row padding-left padding-right padding-top align-items-center">
                            <div class="col-100 medium-80 large-70">
                                <div class="row align-items-center">
                                    <div class="col-40">
                                        <div class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap searchData row padding-half height_40 search_data_wrap">
                                                    <i class="f7-icons font-18 search-icon">search</i>
                                                    <input type="search" name="search" class="search__data" id="searchData" v-model="search" placeholder="Search user name or reservation ID">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-40">
                                        <div class="list no-hairlines reporting_calander no-margin">
                                            <ul>
                                                <li>
                                                    <div class="item-input no-padding-left">
                                                        <div class=" no-padding-right">
                                                            <div class="item-input-wrap input-dropdown-wrap">
                                                                <input type="text" placeholder="Select date range" class="padding-horizontal-half height_40" readonly="" id="calender-date-range">
                                                                <input type="hidden" name="from-date" id="from-date">
                                                                <input type="hidden" name="to-date" id="to-date">                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-20">
                                        <div class="item-content item-input">
                                            <div class="item-inner">
                                                <button class="col button button-fill color-green height_40" style="border-radius: 7px;">Apply</button>
                                            </div>
                                        </div>                                    
                                    </div>
                                </div>                            
                            </div>
                            <div class="col-100 medium-20 large-30">
                                <div class="filters_button row justify-content-end">
                                    <button class="col-100 large-50 button button-outline height_40" @click="reservationData()"><i class="f7-icons">funnel</i>Filters</button>
                                </div>
                            </div>
                            <button @click="calender" style="opacity: 0" id="date-set"></button>
                        </div>
                    </div>
                </div>
                <div class="reservation_table">
                    <div class="card data-table no-margin-horizontal">
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
                                    <tr v-for="data in reservation" :key="data.id">
                                        <td>#{{ data.id }}</td>
                                        <td>{{ data.customer.name }}</td>
                                        <td>{{ data.customer.number }}</td>
                                        <td>{{ data.person }}</td>
                                        <td v-if="data.deleted_at"><span class="status_info status_cancel">Cancel</span></td>
                                        <td v-else-if="data.finished"><span class="status_info status_complete">Complete</span></td>
                                        <td v-else-if="data.start_time"><span class="status_info status_ongoing">Ongoing</span></td>
                                        <td v-else><span class="status_info status_waiting">Wating</span></td>
                                        <td>{{ data.date }}</td>
                                        <td>
                                            <div class="menu-item-dropdown">
                                                <div class=""><i class="f7-icons">ellipsis</i>  </div>
                                                <div class="menu-dropdown menu-dropdown-right">
                                                <div class="menu-dropdown-content no-padding">
                                                    <a class="menu-dropdown-link menu-close padding-vertical" :href="'/reservation-view/'+data.id"><i class="f7-icons margin-right-half">eye</i>View </a>
                                                    <a class="menu-dropdown-link menu-close padding-vertical" href="javascript:;" @click="removeReservation(data.id)"><i class="f7-icons margin-right-half">trash</i>Delete </a>
                                                </div>
                                                </div>
                                            </div>
                                        </td>
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
                        <a href="javascript:;" v-if="index == 0" @click="link.url != null ? reservationData(paginationData.current_page - 1) : 'javascript:;'" class="link" :class="{ 'disabled': link.url == null}"><i class="icon-prev"></i></a>
                        <a href="javascript:;" v-if="paginationData.links.length - 1 != index && index != 0" @click="link.url != null ? reservationData(link.label) : 'javascript:;'" :class="{ 'disabled': link.url == null, 'active': paginationData.current_page == index}">{{ index }}</a>
                        <a href="javascript:;" v-if="paginationData.links.length - 1 == index" @click="link.url != null ? reservationData(paginationData.current_page + 1) : 'javascript:;'" class="link" :class="{ 'disabled': link.url == null}"><i class="icon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>
<script>
import $ from "jquery";
import { f7Page, f7 } from 'framework7-vue';
import axios from 'axios';

export default {
    name : 'AllReservation',
    data() {
        return {
            reservation : [],
            from_date : '',
            to_date: '',
            search: '',
            paginationData : [],
        }
    },
    components: {
        f7Page,
        f7,
    },
    created() {
        this.page_number = this.page;
        this.reservationData(this.page_number);
    },
    mounted() {
        f7.calendar.create({
            inputEl: '#calender-date-range',
            rangePicker: true,
            numbers:true,
            footer: true,
            on: {
                close(daterange) {
                    var dates = daterange.getValue();
                    if(dates){
                        console.log(dates);
                        var from_date = new Date(dates[0]).toLocaleDateString('sv-SE');
                        if(dates[1]) var to_date = new Date(dates[1]).toLocaleDateString('sv-SE');
                        else var to_date = '';
                        console.log(to_date);
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
            }
        });

        this.$root.activationMenu('all-reservation');
    },
    methods : {
        reservationData(page) {
            if(page == undefined || page == '') page = 1;
            var search = this.search;
            var from_date = this.from_date;
            var to_date = this.to_date;
            var page = page;

            axios.get('/api/reservation-list?from_date='+from_date+'&to_date='+to_date+'&search='+search+'&page='+page)
            .then((res) => {
                this.reservation = res.data.reservation.data;
                this.paginationData = res.data.reservation;
                console.log(res.data.reservation);
            })
        },
        removeReservation(id) {

            f7.dialog.confirm('Are you sure delete this reservation?', () => {
                axios.post('/api/remove-reservation', { id: id })
                    .then((res) => {
                        this.$root.successnotification(res.data.success);
                        this.reservationData();
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
        },
        calender(){
           var from = $("#from-date").val();
           var to = $("#to-date").val();
           console.log($("#to-date").val());
           if(from) this.from_date = new Date(from).toLocaleDateString('sv-SE');
           else this.from_date = '';
           if(to) this.to_date = new Date(to).toLocaleDateString('sv-SE');
           else this.to_date = '';
        }
    }

}
</script>
<style scoped>

.justify_content_between{
    justify-content:space-between !important;
}
.all_reservation{
    margin-top: 59px;
    background-color: #ffffff;
}
.all_reservation_inner{
    height: calc(100vh - 135px);
    overflow: auto;
}
.all_reservation .card{
    box-shadow: none;
    background-color: transparent;
}

.all_reservation  .item-input-wrap {
    width: 100%;
    background: #FFFFFF;
    border: 0.5px solid #555555;
    border-radius: 7px;
    height: auto;
}
.all_reservation .filters_button .button{
    border: 1px solid #555555;
    border-radius: 5px;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #555555;
    border-radius: 7px;
}


/*======== TABLE ==========*/
.reservation_table thead tr{
    background: #F4F4F4;
}
/*.reservation_table .table_content{
    height: 100%;
    max-height: 607px;
    overflow-y: auto;
}*/
.reservation_table .table_content table tr td{
    padding: 20px 16px;
    font-weight: 400;
    font-size: 15px;
    line-height: 18px;
    color: #38373D;
    white-space: nowrap;
}
.reservation_table .table_content table thead tr th{
    font-weight: 600;
        font-size: 15px;
        line-height: 18px;
        color: #555555;
}
.reservation_table .table_content table tbody tr:nth-child(even){
    background-color:#FAFAFA;
}
.reservation_table .table_content .status_info{
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
.reservation_table .table_content .status_info.status_complete{
	background-color: #E9FBE7;
	color: #3D833C;
}
.reservation_table .table_content .status_info.status_waiting{
    background: #FFE7DD;
    color: #555555;
}
.reservation_table .table_content .status_info.status_ongoing{
    background: #FFF9E3;
    color: #D39255;
}
.reservation_table .table_content .status_info.status_cancel{
    background: #FFE7DD;
    color: #E31A1A;
}
.pagination_count{
    position: fixed;
    bottom: 15px;
    width: 100%;
    z-index: 9999999;
    height: 50px;
    background-color: #fff;
    box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
}
.pagination_count .pagination_list{
    display: flex;
    justify-content: center;
    align-items:center;
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
  .menu-item-dropdown-right .menu-dropdown::before, .menu-item-dropdown-center .menu-dropdown::before, .menu-dropdown-right::before, .menu-dropdown-center::before {
    content: none;
  }
  .reservation_table .table_content .menu-dropdown{
    background-color: transparent;
  }
  .reservation_table .table_content .menu-dropdown-content{
    top: -9px !important;
  }
  .reservation_table .table_content .menu-item-dropdown-right .menu-dropdown-content, .reservation_table .table_content .menu-dropdown-right .menu-dropdown-content{
    right: 33px;
    border-top-right-radius: 5px;
    width: 180px;
  }
  .reservation_table .table_content .menu-dropdown-content{
    background: #FFFFFF;
    box-shadow: 0px 0px 14px rgba(34, 34, 34, 0.1);
    z-index: 99;
}
.reservation_table .table_content .menu-dropdown-content a{
    font-weight: 500;
    font-size: 15px;
    line-height: 18px;
    color: #999999;
  }
  .reservation_table .table_content .menu-dropdown-link:last-child{
    border-bottom: none;
  }
  .reservation_table .table_content .menu-dropdown-link{
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
.menu-dropdown-link::before{
    background-color: #F33E3E !important;
}
.active-state{
    background-color: #F33E3E !important;
    color: #fff !important;
}
::placeholder{
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #555555;
}

</style>
<style>
.height_40{
    height: 40px !important;
}
.font-18{
    font-size: 18px !important;
}
/*===== SERACH BOX CSS =======*/
.search__data{
    width: 92%;
    line-height: 20px;
    font-size: var(--f7-input-font-size);
}
.search_data_wrap{
    width: 100%;
    background: #FFFFFF;
    border: 0.5px solid #555555;
    border-radius: 7px;
    height: auto;
}
/*===== SERACH BOX CSS END=======*/
</style>

