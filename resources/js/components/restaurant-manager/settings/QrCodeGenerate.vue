<template>
    <div class="card no-margin-top qrcode_generate">
        <div class="row margin-vertical-half align-items-center padding">
            <div class="table_mangment_heading col-40">
                <h3 class="no-margin"> 
                    <span class="page_heading">QR Code Generate</span>
                </h3>
            </div>
            <div class="col-60">
                <div class="row">
                    <div class="col-60">
                        <div class="list no-hairlines reporting_calander no-margin">
                            <ul>
                                <li>
                                    <div class="item-content item-input">
                                        <div class="item-inner no-padding-right">
                                            <div class="item-input-wrap input-dropdown-wrap">
                                                <input type="text" placeholder="Select date range" readonly="" id="demo-calendar-range">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-40">
                        <div class="qrcode_generate_popup">
                            <button class="button button-raised padding height_40 popup-open" data-popup=".qrcode_popup">Generate QR Code</button>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class="card-content">
            <div class="data-table">
                <table>
                   <thead>
                      <tr>
                         <th>ID</th>
                         <th>Date</th>
                         <th>Generate Date</th>
                         <th>QR Code</th>
                         <th>Status</th>
                         <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>
                        <tr>
                            <td class="label-cell">01.</td>
                            <td>24, Sep 2022</td>
                            <td>24, Sep 2022</td>
                            <td><img src="/images/ORcode.png" alt="Orcode"></td>
                            <td><span class="status_info status_expired">Expired</span></td>                       
                            <td>
                                <div class="menu-item-dropdown">
                                    <div><i class="f7-icons">ellipsis</i></div>
                                    <div class="menu-dropdown menu-dropdown-right">
                                        <div class="menu-dropdown-content no-padding">
                                            <a class="menu-dropdown-link menu-close padding-vertical" href="javascript:;"><img src="/images/downlaod.png" class="margin-right-half"> Download </a>
                                            <a class="menu-dropdown-link menu-close padding-vertical active_text" href="javascript:;"><i class="f7-icons margin-right-half">trash</i>Delete </a>
                                            <a class="menu-dropdown-link menu-close padding-vertical active_text" href="javascript:;"><i class="f7-icons">arrow_counterclockwise</i>Regenerate </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-cell">02.</td>
                            <td>24, Sep 2022</td>
                            <td>24, Sep 2022</td>
                            <td><img src="/images/ORcode.png" alt="Orcode"></td>
                            <td><span class="status_info status_upcoming">Upcoming</span></td>                       
                            <td>
                                <div class="menu-item-dropdown">
                                    <div><i class="f7-icons">ellipsis</i></div>
                                    <div class="menu-dropdown menu-dropdown-right">
                                        <div class="menu-dropdown-content no-padding">
                                            <a class="menu-dropdown-link menu-close padding-vertical" href="javascript:;"><img src="/images/downlaod.png" class="margin-right-half"> Download </a>
                                            <a class="menu-dropdown-link menu-close padding-vertical active_text" href="javascript:;"><i class="f7-icons margin-right-half">trash</i>Delete </a>
                                            <a class="menu-dropdown-link menu-close padding-vertical active_text" href="javascript:;"><i class="f7-icons">arrow_counterclockwise</i>Regenerate </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-cell">03.</td>
                            <td>24, Sep 2022</td>
                            <td>24, Sep 2022</td>
                            <td><img src="/images/ORcode.png" alt="Orcode"></td>
                            <td><span class="status_info status_ongoing">Ongoing</span></td>                       
                            <td>
                                <div class="menu-item-dropdown">
                                    <div><i class="f7-icons">ellipsis</i></div>
                                    <div class="menu-dropdown menu-dropdown-right">
                                        <div class="menu-dropdown-content no-padding">
                                            <a class="menu-dropdown-link menu-close padding-vertical" href="javascript:;"><img src="/images/downlaod.png" class="margin-right-half"> Download </a>
                                            <a class="menu-dropdown-link menu-close padding-vertical active_text" href="javascript:;"><i class="f7-icons margin-right-half">trash</i>Delete </a>
                                            <a class="menu-dropdown-link menu-close padding-vertical active_text" href="javascript:;"><i class="f7-icons">arrow_counterclockwise</i>Regenerate </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-cell">04.</td>
                            <td>24, Sep 2022</td>
                            <td>24, Sep 2022</td>
                            <td><img src="/images/ORcode.png" alt="Orcode"></td>
                            <td><span class="status_info status_ongoing">Ongoing</span></td>                       
                            <td>
                                <div class="menu-item-dropdown">
                                    <div><i class="f7-icons">ellipsis</i></div>
                                    <div class="menu-dropdown menu-dropdown-right">
                                        <div class="menu-dropdown-content no-padding">
                                            <a class="menu-dropdown-link menu-close padding-vertical" href="javascript:;"><img src="/images/downlaod.png" class="margin-right-half"> Download </a>
                                            <a class="menu-dropdown-link menu-close padding-vertical active_text" href="javascript:;"><i class="f7-icons margin-right-half">trash</i>Delete </a>
                                            <a class="menu-dropdown-link menu-close padding-vertical active_text" href="javascript:;"><i class="f7-icons">arrow_counterclockwise</i>Regenerate </a>
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
    <div id="qrcode_popup" class="popup qrcode_popup" style="position: fixed; display: block; border-radius: 15px; top:37% !important; left:34% !important;">
        <div class="qrcode-form">           
            <div class="padding margin-top">
                <div class="list no-hairlines no-margin">
                    <ul>
                      <li class="item-content item-input margin-bottom-half no-padding">
                        <div class="item-inner no-padding">
                          <div class="item-input-wrap">
                            <input type="text" placeholder="Start Date - Sep 2022" />                            
                          </div>
                        </div>
                      </li>
                      <li class="item-content item-input margin-bottom-half no-padding">
                        <div class="item-inner no-padding">
                          <div class="item-input-wrap">
                            <input type="text" placeholder="End Date - Aug 2022" />
                          </div>
                        </div>
                      </li>
                      <li class="item-content item-input no-padding">
                        <div class="item-inner no-padding">
                          <div class="item-input-wrap" style="border-radius:10px">
                            <button type="button" class="button button-raised button-large popup-button" style="background-color: rgb(243, 62, 62); color: rgb(255, 255, 255); border-radius:10px">Apply</button>
                          </div>
                        </div>
                      </li>
                    </ul>
                </div>                
            </div>            
        </div>
    </div>
</template>

<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input,f7AreaChart} from 'framework7-vue';
import apexchart from "vue3-apexcharts";
import axios from 'axios';
import $ from 'jquery';

export default {
    name : 'QrCodeGenerate',
    data() {
        return {
            test: 'indian',
            categories: [],
            categoryOption : [],
            category: {
                id : null,
                name: [],
                image: '',
            },
        }
    },
    components: {
        f7Page,
        f7Navbar,
        f7BlockTitle,
        f7Block,
        f7,
        f7Input,
        f7AreaChart,
        apexchart
    },
    mounted() {
    f7.calendar.create({
            inputEl: '#demo-calendar-range',
            rangePicker: true,
            numbers:true,
            footer: true,
            on: {
                close(daterange) {
                    var dates = daterange.getValue();
                    // var datefrom = dates[0] ? : '';
                    // var dateto = dates[1];
                    if(dates){
                        var from_date = new Date(dates[0]).toLocaleDateString('sv-SE');
                        if(dates[1]) var to_date = new Date(dates[1]).toLocaleDateString('sv-SE');
                        else var to_date = '';

                        axios.get('/api/report-data?from_date='+from_date+'&to_date='+to_date)
                        .then((res) => {
                            $("#total_order").text(res.data.total_order);
                            $("#complete_order").text(res.data.complete_order);
                            $("#ongoing_order").text(res.data.ongoing_order);
                            $("#reservation_table").text(res.data.reservation_table);
                        })
                    
                    }
                }
            }
        });

        this.$root.activationMenu('reporting');
    },
    
}
</script>
<style scoped>

.qrcode_generate_popup .button{
    box-shadow: none;
    border: 0.5px solid #999999;
    color:  #999999;
    font-weight: 500;
}

.qrcode_generate .menu-dropdown-content a{
	font-weight: 500;
	font-size: 15px;
	line-height: 18px;
	color: #999999;
}
.qrcode_generate .menu-dropdown-link{
	justify-content: flex-start !important;
}
.qrcode_generate .menu-dropdown{
	background-color: transparent !important;
}
.qrcode_generate .menu-dropdown-right::before{
    background-image: none !important;
}
.qrcode_generate .menu-dropdown-content{
	background: #FFFFFF;
	box-shadow: 0px 0px 14px rgba(34, 34, 34, 0.1);
	z-index: 99;
    top: -9px !important;
}
.qrcode_generate .menu-item-dropdown-right .menu-dropdown-content, .qrcode_generate .menu-dropdown-right .menu-dropdown-content {
	right: 72px;
	border-top-right-radius: 5px;
	width: 180px;
}
.status_info{
    display: flex;
    justify-content: center;
    border-radius: 5px;
    height: 26px;
    line-height: 1px;
    font-weight: 400;
    font-size: 12px;
    width: 60%;
    padding: 17px 42px;
    align-items: center;
}
.status_info.status_expired{
    background: #FFE7DD;
	color: #E31A1A;
}
.status_info.status_upcoming{
    background: #E9FBE7;
    color: #3D833C;
}
.status_info.status_ongoing{
    background: #FFF9E3;
    color: #D39255;
}
.item-input-wrap{
	width: 100%;
	background: #ffffff;
	border: 0.5px solid #DCDCDC;
	border-radius: 7px;
	height: auto;
}
 ul .item-input-wrap input{
	background-color: #fff;
	border-radius: 8px;
	padding: 12px;
    height: 40px;
}
.active_text{
    color: rgba(243, 62, 62, 1) !important;
}
@media screen and (max-width:991px) {
    .qrcode_generate .menu-item-dropdown-right .menu-dropdown-content, .qrcode_generate .menu-dropdown-right .menu-dropdown-content{
        right: 31px;
    }
}
</style>
<style>
#qrcode_generate_popup .popup{
    top: 50% !important;
    left: 50% !important;
    transform: translate(-50%, -50%) !important;
}
</style>

