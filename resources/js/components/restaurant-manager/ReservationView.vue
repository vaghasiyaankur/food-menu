<template>
    <f7-page>
       <div class="reservation_view">
            <div class="back_link padding">
                <a class="link back" href="all-reservation"><i class="icon icon-back"></i>
                    <span class="margin-left-half">Back to List</span>
                </a>
            </div>
            <div class="block reservation_details no-margin-top">
                <div class="row">
                    <div class="col-50">
                        <div class="card border_radius_10">
                            <div class="card-header"><h3 class="no-margin"> Guest Details</h3></div>
                            <div class="card-content card-content-padding">
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">Reservation ID :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span>#10663</span> </div> 
                                </div>
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">User Name :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span>Jannson Wasley</span> </div> 
                                </div>
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">Phone Number :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span>8258340744</span> </div> 
                                </div>
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">No. of Guest :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span>04 </span> </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-50">
                        <div class="card border_radius_10">
                            <div class="card-header"><h3 class="no-margin"> Reservation Details</h3></div>
                            <div class="card-content card-content-padding">
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">Status :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span class="status_info status_cancel">Cancel</span> </div> 
                                </div>
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">Cancel By :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span>Manager</span> </div> 
                                </div>
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">Reservation By :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span>Guest</span> </div> 
                                </div>
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">Reservation Date & Time :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span>24, Sep 2022 / 10:00 am</span> </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-50">
                        <div class="card border_radius_10">
                            <div class="card-header"><h3 class="no-margin"> Table Shift Details</h3></div>
                            <div class="card-content card-content-padding">
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">Table shifted :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span><span>Table 3</span> <i class="f7-icons margin-horizontal-half">arrow_right</i> <span>Table 8</span></span> </div> 
                                </div>
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">Message Sending Time :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span>5 : 30 : 45 PM</span> </div> 
                                </div>                                
                            </div>
                        </div>
                    </div>                  
                    <div class="col-50">
                        <div class="card border_radius_10">
                            <div class="card-header"><h3 class="no-margin"> Floor shift Details</h3></div>
                            <div class="card-content card-content-padding">
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">Floor shifted :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span><span>First Floor </span> <i class="f7-icons margin-horizontal-half">arrow_right</i> <span>Second Floor</span></span> </div> 
                                </div>
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">Message Sending Time :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span>5 : 30 : 45 PM</span> </div> 
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
<style>
.page-content{
    background-color: #fff !important;
    height: 100%;
}
</style>
<style scoped>
.reservation_view{
    margin-top:60px;
}
.reservation_view .back_link a.back {
	font-weight: 500;
	font-size: 16px;
	line-height: 19px;
	color: #38373D;
}
.card-header{
border-bottom:1px solid #DDE0E6;
}
.border_radius_10{
    border-radius: 10px;
}
.reservation_details .card-content .single_content .content_left_text p,.reservation_details .card-content .single_content .content_right_text span{
    font-weight: 500;
    font-size: 16px;
    line-height: 22px;
    color: #222222;
    white-space: nowrap;
}
.reservation_details .card-content .single_content .content_right_text span{
    font-weight: 400;
}
.reservation_details .card-content .single_content .status_info{
    display: flex;
    justify-content: center;
    border-radius: 5px;
    height: 26px;
    line-height: 26px !important;
    font-weight: 400 !important;
    font-size: 12px;
    width: 100px;
}
.reservation_details .card-content .single_content .status_info.status_cancel{
	background: #FFE7DD;
	color: #E31A1A;
}
.reservation_details .card-content .single_content .content_right_text .f7-icons{
    font-size: 20px;
    vertical-align: middle;
}
.card-header h3{
    font-weight: 500;
    font-size: 18px;
    line-height: 25px;
    color: #222222;
}
</style>
