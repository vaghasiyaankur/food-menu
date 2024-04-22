<template>
    <div class="card no-margin qrcode_generate">
        <div class="row align-items-center padding">
            <div class="table_mangment_heading col-40">
                <h3 class="no-margin">
                    <span class="page_heading">QR Code Generation</span>
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
                            <button class="button button-raised padding height_40 popup-open" @click="blankform" data-popup=".qrcode_popup">Generate QR Code</button>
                        </div>
                    </div>
                    <button @click="calender" style="opacity: 0" id="date-set"></button>
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
                        <tr v-for="(qrCode,index) in qrCodes" :key="qrCode">
                            <td class="label-cell">{{ (paginationData.per_page * (pageNumber - 1)) + (index + 1) }}.</td>
                            <td>{{ qrCode.start_date }} - {{ qrCode.end_date }}</td>
                            <td>{{ date_format(qrCode.updated_at) }}</td>
                            <td><div v-html="qrCodeXml[qrCode.id]"></div></td>
                            <td><span class="status_info" :class="[{ 'status_expired': qrCode.status == 'Expired' }, { 'status_ongoing': qrCode.status == 'Ongoing' }, { 'status_upcoming': qrCode.status == 'Upcoming' }]">{{ qrCode.status }}</span></td>
                            <td>
                                <div class="menu-item-dropdown">
                                    <div><i class="f7-icons">ellipsis</i></div>
                                    <div class="menu-dropdown menu-dropdown-right">
                                        <div class="menu-dropdown-content padding-vertical-half">
                                            <button class="menu-dropdown-link font-13 height-45 button text-color-black menu-close padding-bottom-half" @click="downloadQrCode(qrCode.id)"><img src="/images/downlaod.png" style="margin-right:11px;"> Download </button>
                                            <button class="menu-dropdown-link font-13 height-45 active_text button menu-close " @click="removeqr(qrCode.id)" v-if="qrCode.status == 'Expired'"><i class="f7-icons margin-right-half">trash</i>Delete </button>
                                            <button class="menu-dropdown-link font-13 height-45 button text-color-black menu-close" @click="regenerateQrCode(qrCode.id)" v-if="qrCode.status != 'Expired'"><i class="f7-icons margin-right-half">arrow_counterclockwise</i>Regenerate </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr v-if="qrCodes.length == 0">
                            <td colspan="6" class="text-align-center">No Data Found !!</td>
                        </tr>
                    </tbody>
                </table>
                <div class="bottom__bar">           
                    <div class="pagination_count padding display-flex justify-content-end align-items-center">
                        <Pagination :function-name="getLangTraslation" :data="paginationData" />
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
                                    <input type="month" v-model="start_qrcode" placeholder="Please choose..." :min="startMinDate" :max="startMaxDate" class="no-padding-vertical" @change="startChangeDate" />
                                </div>
                            </li>
                            <li class="item-input margin-bottom no-padding">
                                <div class="item-input-wrap">
                                    <input type="month" v-model="end_qrcode" class="no-padding-vertical" :min="endMinDate" :max="endMaxDate" placeholder="Please choose..." @change="endChangeDate" />
                                </div>
                            </li>
                            <li class="item-input no-padding">
                                <div class="item-input-wrap" style="border-radius:10px">
                                    <button type="button" class="button button-raised button-large popup-button" @click="generateQrCode()" style="background-color: rgb(243, 62, 62); color: rgb(255, 255, 255); border-radius:10px">Apply</button>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input,f7AreaChart} from 'framework7-vue';
import axios from 'axios';
import moment from 'moment';
import { ref } from 'vue';
import Pagination from '../../../components/Pagination.vue';

const qrCodeXml = ref([]);
const qrCodes = ref([]);
const pageNumber = ref(1);
const paginationData = ref([]);
const fromDate = ref('');
const toDate = ref('');
const startQrCode = ref('');
const endQrCode = ref('');
const startMinDate = ref('');
const endMinDate = ref('');
const startMaxDate = ref('');
const endMaxDate = ref('');

const generateQrCode = () => {
    if (!start_qrcode.value) {
        errorNotification("Please enter start month."); return;
    } else if (!end_qrcode.value) {
        errorNotification("Please enter end month."); return;
    }
    axios.post('/api/generate-qrcode', { start_qrcode: start_qrcode.value, end_qrcode: end_qrcode.value })
    .then((res) => {
        if (res.data.success) {
            successNotification(res.data.success);
        } else {
            errorNotification(res.data.error);
        }
        f7.popup.close(`#qrcode_popup`);
        listQrCodes();
    })
}

// export default {
//     name : 'QrCodeGenerate',
//     data() {
//         return {
//             test: 'indian',
//             categories: [],
//             categoryOption : [],
//             category: {
//                 id : null,
//                 name: [],
//                 image: '',
//             },
//             qrcodexml: [],
//             qrcodes: [],
//             pagenumber: 1,
//             paginationData : [],
//             from_date: '',
//             to_date: '',
//             start_qrcode: '',
//             end_qrcode: '',
//             start_mindate: '',
//             start_maxdate : '',
//             end_mindate: '',
//             end_maxdate : '',
//         }
//     },
//     mounted() {
//         f7.calendar.create({
//             inputEl: '#demo-calendar-range',
//             rangePicker: true,
//             numbers:true,
//             footer: true,
//             on: {
//                 open() {
//                     setTimeout(() => {
//                         $('.popover-angle').css({ 'left': '147px' });
//                         $('.calendar-popover').css({ 'top': '206px', 'left': '525px' });
//                     }, 1);
//                 },
//                 close(daterange) {
//                     var dates = daterange.getValue();
//                     if(dates){
//                         var from_date = new Date(dates[0]).toLocaleDateString('sv-SE');
//                         if(dates[1]) var to_date = new Date(dates[1]).toLocaleDateString('sv-SE');
//                         else var to_date = '';
//                         $("#from-date").val(from_date);
//                         $("#to-date").val(to_date);
//                         $("#date-set").trigger('click');
//                     }
//                 }
//             }
//         });
//         this.listQrCodes();
//         this.$root.activationMenu('setting', '');
//     },
//     methods: {
//         date_format(date) {
//             return moment(String(date)).format('DD, MMM YYYY');
//         },
//         removeqr(id){
//             f7.dialog.confirm('Are you sure delete the QR Code?', () => {
//                 axios.post('/api/delete-qrcode',{id:id})
//                 .then((res) => {
//                     // this.$root.successNotification(res.data.success);
//                     this.listQrCodes(this.pagenumber)
//                 })
//             });
//             setTimeout(() => {
//                 $('.dialog-button').eq(1).css({ 'background-color': '#F33E3E', 'color': '#fff' });
//                 $('.dialog-title').html("<img src='/images/cross.png'>");
//                 $('.dialog-buttons').after("<div><img src='/images/flow.png' style='width:100%'></div>");
//                 $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
//                 $('.dialog-button').eq(1).removeClass('text-color-black');
//                 $('.dialog-buttons').addClass('margin-top no-margin-bottom')
//             }, 50);
//         },
//         listQrCodes(pagenumber) {
//             if (pagenumber == undefined || pagenumber == 1) {
//                 this.pagenumber = 1;
//             } else if (Number(pagenumber)) {
//                 this.pagenumber = Number(this.pagenumber);
//             } else {
//                 this.pagenumber = pagenumber.split('page=')[1];
//             }
//             var page = '/api/qrcode?page=' + this.pagenumber + '&from_date=' + this.from_date + '&to_date=' + this.to_date;
//             axios.get(page)
//             .then((res) => {
//                 this.qrcodes = res.data.qrcodes.data;
//                 this.qrcodexml = res.data.qrcodexml;
//                 this.paginationData = res.data.qrcodes;
//             })
//         },
//         calender() {
//             var from = $("#from-date").val();
//             var to = $("#to-date").val();
//             if (from) this.from_date = new Date(from).toLocaleDateString('sv-SE');
//             else this.from_date = '';
//             if (to) this.to_date = new Date(to).toLocaleDateString('sv-SE');
//             else this.to_date = '';
//             this.listQrCodes();
//         },
//         generateQrCode() {
//             if (!this.start_qrcode) {
//                 this.$root.errorNotification("Please enter start month."); return;
//             } else if (!this.end_qrcode) {
//                 this.$root.errorNotification("Please enter end month."); return;
//             }
//             axios.post('/api/generate-qrcode', { start_qrcode: this.start_qrcode, end_qrcode: this.end_qrcode })
//                 .then((res) => {
//                 if (res.data.success) {
//                     // this.$root.successNotification(res.data.success);
//                 } else {
//                     this.$root.errorNotification(res.data.error);
//                 }
//                 f7.popup.close(`#qrcode_popup`);
//                 this.listQrCodes();
//             })
//         },
//         regenerateQrCode(id) {
//             axios.post('/api/regenerate-qrcode', { id: id })
//             .then((res) => {
//                 // this.$root.successNotification(res.data.success);
//                 this.listQrCodes(this.pagenumber);
//             })
//         },
//         downloadQrCode(id) {
//             axios({ url: '/api/download-qrcode/' + id, method: 'GET', responseType: 'arraybuffer', })
//             .then((response) => {
//                 let blob = new Blob([response.data], {
//                     type: 'application/pdf'
//                 })
//                 let link = document.createElement('a')
//                 link.href = window.URL.createObjectURL(blob)
//                 link.download = 'qrcode.pdf'
//                 link.click()
//             })
//         },
//         startChangeDate() {
//             this.end_mindate = this.start_qrcode;
//         },
//         endChangeDate() {
//             this.start_maxdate = this.end_qrcode
//         },
//         blankform() {
//             const current = new Date();
//             this.start_qrcode = '';
//             this.end_qrcode = '';
//             this.start_mindate = `${current.getFullYear()}-${String(current.getMonth() + 1).padStart(2, '0')}`;
//             this.start_maxdate = '';
//             this.end_mindate = `${current.getFullYear()}-${String(current.getMonth() + 1).padStart(2, '0')}`;
//             this.end_maxdate = '';
//         }
//     }

// }
</script>