<template>
    <div class="card no-margin-top qrcode_generate height_100">
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
                        <div class="qrcode_generate_popup">
                            <button class="button button-raised padding height_40 popup-open" data-popup=".qrcode_popup">Generate QR Code</button>
                        </div>
                    </div>
                    <button @click="calender" style="opacity: 0" id="date-set"></button>
                </div>
            </div>
        </div>
        <div class="card-content height_100">
            <div class="data-table height_100">
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
                        <tr v-for="qrcode in qrcodes" :key="qrcode">
                            <td class="label-cell">{{ qrcode.id }}.</td>
                            <td>{{ qrcode.start_date }} - {{ qrcode.end_date }}</td>
                            <td>{{ date_format(qrcode.created_at) }}</td>
                            <td><div v-html="qrcodexml[qrcode.id]"></div></td>
                            <td><span class="status_info" :class="[{ 'status_expired': qrcode.status == 'Expired' }, { 'status_ongoing': qrcode.status == 'Ongoing' }, { 'status_upcoming': qrcode.status == 'Upcoming' }]">{{ qrcode.status }}</span></td>
                            <td>
                                <div class="menu-item-dropdown">
                                    <div><i class="f7-icons">ellipsis</i></div>
                                    <div class="menu-dropdown menu-dropdown-right">
                                        <div class="menu-dropdown-content no-padding">
                                            <button class="menu-dropdown-link font-13 height-40 button text-color-black"><img src="/images/downlaod.png" style="margin-right:11px;"> Download </button>
                                            <button class="menu-dropdown-link font-13 height-40 active_text button" @click="removeqr(qrcode.id)" v-if="qrcode.status == 'Expired'"><i class="f7-icons margin-right-half">trash</i>Delete </button>
                                            <button class="menu-dropdown-link font-13 height-40 button text-color-black"><i class="f7-icons margin-right-half">arrow_counterclockwise</i>Regenerate </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                   </tbody>
                </table>
                <div class="bottom__bar">
                    <div class="pagination_count padding display-flex justify-content-end align-items-center">
                        <div class="pagination_list display-flex">
                            <div v-for="(link,index) in paginationData.links" :key="link">
                                <a href="javascript:;" v-if="index == 0"
                                    @click="link.url != null ? listQrCodes(link.url) : 'javascript:;'" class="link"
                                    :class="{ 'disabled': link.url == null}"><i class="icon-prev"></i></a>
                                <a href="javascript:;" v-if="paginationData.links.length - 1 != index && index != 0"
                                    @click="link.url != null ? listQrCodes(link.url) : 'javascript:;'"
                                    :class="{ 'disabled': link.url == null, 'active': paginationData.current_page == index}">{{ index
                                    }}</a>
                                <a href="javascript:;" v-if="paginationData.links.length - 1 == index"
                                    @click="link.url != null ? listQrCodes(link.url) : 'javascript:;'" class="link"
                                    :class="{ 'disabled': link.url == null}"><i class="icon-next"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="qrcode_popup" class="popup qrcode_popup" style="position:fixed; border-radius: 15px; top:37% !important; left:34% !important;">
        <div class="qrcode-form">
            <div class="padding margin-top">
                <div class="list no-hairlines no-margin">
                    <form action="">
                        <ul>
                            <li class="item-input margin-bottom no-padding">
                                <div class="item-input-wrap">
                                    <input type="month" v-model="start_qrcode" placeholder="Start Date - Sep 2022" class="no-padding-vertical" />
                                </div>
                            </li>
                            <li class="item-input margin-bottom no-padding">
                                <div class="item-input-wrap">
                                    <input type="month" v-model="end_qrcode" class="no-padding-vertical" placeholder="Please choose..." />
                                </div>
                            </li>
                            <li class="item-input no-padding">
                                <div class="item-input-wrap" style="border-radius:10px">
                                    <button type="button" class="button button-raised button-large popup-button" @click="generateQrCode()"
                                        style="background-color: rgb(243, 62, 62); color: rgb(255, 255, 255); border-radius:10px">Apply</button>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input,f7AreaChart} from 'framework7-vue';
import axios from 'axios';
import $ from 'jquery';
import moment from 'moment'

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
            qrcodexml: [],
            qrcodes: [],
            pagenumber: 1,
            paginationData : [],
            from_date: '',
            to_date: '',
            start_qrcode: '',
            end_qrcode : '',
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
                        $("#from-date").val(from_date);
                        $("#to-date").val(to_date);
                        $("#date-set").trigger('click');

                    }
                }
            }
        });
        this.listQrCodes();
        this.$root.activationMenu('setting');
    },
    methods: {
        date_format(date) {
            return moment(String(date)).format('DD, MMM YYYY');
        },
        removeqr(id){
            f7.dialog.confirm('Are you sure delete the QR Code?', () => {
                axios.post('/api/delete-qrcode',{id:id})
                .then((res) => {
                    this.$root.successnotification(res.data.success);
                    this.listQrCodes(this.pagenumber)
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
        listQrCodes(pagenumber) {
            if (pagenumber == undefined || pagenumber == 1) {
                pagenumber = 1;
            } else {
                pagenumber = pagenumber.split('page=')[1];
            }
            var page = '/api/qrcode?page=' + pagenumber + '&from_date=' + this.from_date + '&to_date=' + this.to_date;
            axios.get(page)
            .then((res) => {
                this.qrcodes = res.data.qrcodes.data;
                this.qrcodexml = res.data.qrcodexml;
                this.paginationData = res.data.qrcodes;
            })
        },
        calender() {
            var from = $("#from-date").val();
            var to = $("#to-date").val();
            if (from) this.from_date = new Date(from).toLocaleDateString('sv-SE');
            else this.from_date = '';
            if (to) this.to_date = new Date(to).toLocaleDateString('sv-SE');
            else this.to_date = '';
            this.listQrCodes();
        },
        generateQrCode() {
            axios.post('/api/generate-qrcode', { start_qrcode: this.start_qrcode, end_qrcode: this.end_qrcode })
            .then((res) => {
                this.$root.successnotification(res.data.success);
                f7.popup.close(`#qrcode_popup`);
                this.listQrCodes();
            })
        }
    }

}
</script>
<style scoped>
.font-13{
    font-size: 13px;
}
.height-40 {
    height: 40px;
}
.qrcode_generate.card{
    box-shadow: none !important;
}
.height_100{
    height: 100%;
}
.qrcode_generate_popup .button{
    box-shadow: none;
    border: 0.5px solid #999999;
    color:  #999999;
    font-weight: 500;
    border-radius: 7px;
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
.qrcode_popup .qrcode-form .button.active-state{
    background-color: rgb(243, 62, 62) !important;
    color: rgb(255, 255, 255) !important;
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
	border-radius: 7px;
	height: auto;
}
 ul .item-input-wrap input{
	background-color: #fff;
	border-radius: 8px;
	padding: 12px;
    height: 40px;
	border: 0.5px solid #999999;
}
.active_text{
    color: rgba(243, 62, 62, 1) !important;
}
.qrcode_popup .simple-list li:after, .qrcode_popup .links-list a:after, .qrcode_popup .list .item-inner:after{
    background-color: transparent !important;
}
.menu-dropdown-link::before{
    content: none !important;
}
.active-state{
    background-color: transparent !important;
}
@media screen and (max-width:991px) {
    .qrcode_generate .menu-item-dropdown-right .menu-dropdown-content, .qrcode_generate .menu-dropdown-right .menu-dropdown-content{
        right: 31px;
    }
    #qrcode_popup{
        transform: translate(-18%);
    }
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
</style>
<style>
#qrcode_generate_popup .popup{
    top: 50% !important;
    left: 50% !important;
    transform: translate(-50%, -50%) !important;
}
</style>

