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
                                    <div class="content_right_text no-margin col-50"><span>#{{ reservation.id }}</span> </div> 
                                </div>
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">User Name :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span>{{  reservation.customer ? reservation.customer.name : '' }}</span> </div> 
                                </div>
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">Phone Number :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span>{{  reservation.customer ? reservation.customer.number : '' }}</span> </div> 
                                </div>
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">No. of Guest :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span>{{  reservation.person }} </span> </div> 
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
                                    <div class="content_right_text no-margin col-50">
                                        <span class="status_info status_cancel" v-if="reservation.deleted_at">Cancel</span>
                                        <span class="status_info status_complete" v-else-if="reservation.finished">Complete</span>
                                        <span class="status_info status_ongoing" v-else-if="reservation.start_time">Ongoing</span>
                                        <span class="status_info status_waiting" v-else>Wating</span>
                                    </div> 
                                </div>
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">Cancel By :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span>{{ reservation.cancelled_by }}</span> </div> 
                                </div>
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">Reservation By :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span>{{ reservation.role }}</span> </div> 
                                </div>
                                <div class="single_content row margin-bottom">
                                    <div class="content_left_text no-margin col-50"><p class="no-margin">Reservation Date & Time :</p> </div> 
                                    <div class="content_right_text no-margin col-50"><span>{{  reservation.date }}</span> </div> 
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
            id: '',
            reservation : []
        }
    },
    components: {
        f7Page,
        f7
    },
    created() {
    },
    mounted() {
        setTimeout(() => {
            this.reservationDetail();
        }, 500);
    },
    methods : {
        reservationDetail() {
            this.id = f7.view.main.router.currentRoute.params.id;
            axios.get('/api/reservation-detail/'+this.id)
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
.reservation_details .card-content .single_content  .status_info.status_complete{
	background-color: #E9FBE7;
	color: #3D833C;
}
.reservation_details .card-content .single_content  .status_info.status_waiting{
    background: #FFE7DD;
    color: #555555;
}
.reservation_details .card-content .single_content  .status_info.status_ongoing{
    background: #FFF9E3;
    color: #D39255;
}
.reservation_details .card-content .single_content  .status_info.status_cancel{
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
