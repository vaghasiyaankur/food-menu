<template>
    <f7-page>
       <div>test</div>
    </f7-page>
</template>
<script>
import $ from "jquery";
import { f7Page, f7 } from 'framework7-vue';
import axios from 'axios';

export default {
    name : 'ReservationView',
    data() {
        return {
            reservation : [],
            from_date : '',
            to_date: '',
            search: ''
        }
    },
    components: {
        f7Page,
        f7,
    },
    created() {
        this.reservationData();
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
                        var from_date = new Date(dates[0]).toLocaleDateString('sv-SE');
                        if(dates[1]) var to_date = new Date(dates[1]).toLocaleDateString('sv-SE');
                        else var to_date = '';

                        $("#from-date").val(from_date);
                        $("#to-date").val(to_date);
                    }
                }
            }
        });

        this.$root.activationMenu('all-reservation');
    },
    methods : {
        reservationData() {
            var search = this.search;
            var from_date = this.from_date;
            var to_date = this.to_date;

            axios.get('/api/reservation-list?from_date='+from_date+'&to_date='+to_date+'&search='+search)
            .then((res) => {
                this.reservation = res.data.reservation;
            })
        }
    }

}
</script>
<style scoped>
.height_40{
    height: 40px !important;
}
.justify_content_between{
    justify-content:space-between !important;
}
.all_reservation{
    margin-top: 59px;
    background-color: #ffffff;
    height: calc(100% - 60px);
}
.all_reservation .card{
    box-shadow: none;
    background-color: transparent;
}
.all_reservation #searchData{
    width: 90%;
}
.all_reservation .item-input-wrap{
    width: 100%;
    background: #FFFFFF;
    border: 0.5px solid #555555;
    border-radius: 7px;
    height: auto;
}
::placeholder{
    color: #555555 !important;
    opacity: 1;
}

.all_reservation .filters_button .button{
    border: 1px solid #555555;
    border-radius: 5px;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #555555;
}
/*======== TABLE ==========*/
.reservation_table thead tr{
    background: #F4F4F4;
}
.reservation_table .table_content{
    height: 100%;
    max-height: 607px;
    overflow-y: auto;
}
.reservation_table .table_content table tr td{
    padding: 20px 16px;
    font-weight: 400;
    font-size: 15px;
    line-height: 18px;
    color: #38373D;
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
.pagination_count .pagination_list{
    display: flex;
    justify-content: center;
    align-items:center;
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
</style>

