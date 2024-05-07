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
                        <Calender />
                    </div>
                    <div class="col-40">
                        <div class="qrcode_generate_popup">
                            <button class="button button-raised padding height_40 popup-open" @click="blankForm" data-popup=".qrcode_popup">Generate QR Code</button>
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
                            <td>{{ dateFormat(qrCode.updated_at) }}</td>
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
                        <Pagination :function-name="listQrCodes" :data="paginationData" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="qrcode_popup" class="popup qrcode_popup" style="position:fixed; border-radius: 15px; top:37% !important; left:34% !important;">
        <AddUpdatePopup title="Generate Qr Code" :form-data-format="addUpdateFormDataFormat" :type="addUpdateType" :data-type="'category'" @set:startDate="startChangeDate" @set:endDate="endChangeDate" @store:update="storeUpdateData" />
    </div>
    <!-- ========= DELETE CATEGORY POPUP ========= -->
    <div class="popup removePopup">
        <RemovePopup :title="'Are you sure delete this QR Code?'" @remove="removeData" />
    </div>
</template>

<script setup>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input,f7AreaChart} from 'framework7-vue';
import axios from 'axios';
import moment from 'moment';
import { ref } from 'vue';
import Pagination from '../../../components/Pagination.vue';
import AddUpdatePopup from "../../../components/common/AddUpdatePopup.vue"
import { successNotification, errorNotification } from '../../../commonFunction.js';
import RemovePopup from '../../../components/common/RemovePopup.vue'
import Calender from "../../../components/Form/Calendar.vue"

const qrCodeXml = ref([]);
const qrCodes = ref([]);
const pageNumber = ref(1);
const paginationData = ref([]);
const fromDate = ref('');
const toDate = ref('');
const deleteId = ref(0);
const addUpdateType = ref('Qr Code')

const addUpdateFormDataFormat = ref([
    { label: 'Start Month', multipleLang: false, type: 'month', name: 'start_qrcode', value: '', min: '', max: '', method: 'set:startDate'},
    { label: 'End Month', multipleLang: false, type: 'month', name: 'end_qrcode', value: '', min: '', max: '', method: 'set:endDate'},
]);

const startChangeDate = () => {
    addUpdateFormDataFormat.value[1].min = event.target.value;
}
const endChangeDate = () => {
    addUpdateFormDataFormat.value[0].max = event.target.value;
}

const generateQrCode = () => {
    if (!startQrCode.value) {
        errorNotification("Please enter start month."); return;
    } else if (!end_qrcode.value) {
        errorNotification("Please enter end month."); return;
    }
    axios.post('/api/generate-qrcode', { start_qrcode: startQrCode.value, end_qrcode: startQrCode.value })
    .then((res) => {
        if (res.data.success) {
            successNotification(res.data.success);
            f7.popup.close(`#qrcode_popup`);
            listQrCodes();
        } else {
            errorNotification(res.data.error);
        }
    })
}

const listQrCodes = (pageNum) => {
    if (pageNum == undefined || pageNum == 1) {
        pageNumber.value = 1;
    } else if (Number(pageNum)) {
        pageNumber.value = Number(pageNumber.value);
    } else {
        pageNumber.value = pageNum.split('page=')[1];
    }
    var page = '/api/qrcode?page=' + pageNumber.value + '&from_date=' + fromDate.value + '&to_date=' + toDate.value;
    axios.get(page)
    .then((res) => {
        qrCodes.value = res.data.qrcodes.data;
        qrCodeXml.value = res.data.qrcodexml;
        paginationData.value = res.data.qrcodes;
    })
}

listQrCodes();

const dateFormat = (date) => {
    return moment(String(date)).format('DD, MMM YYYY');
}

const blankForm = () => {
    const current = new Date();

    addUpdateFormDataFormat.value.forEach((formData,index) => {
        formData.value = '';
        formData.min = `${current.getFullYear()}-${String(current.getMonth() + 1).padStart(2, '0')}`;
        formData.max = '';
    });
}

const downloadQrCode = (id) => {
    axios({ url: '/api/download-qrcode/' + id, method: 'GET', responseType: 'arraybuffer', })
    .then((response) => {
        let blob = new Blob([response.data], {
            type: 'application/pdf'
        })
        let link = document.createElement('a')
        link.href = window.URL.createObjectURL(blob)
        link.download = 'qrcode.pdf'
        link.click()
    })
}

const regenerateQrCode = (id) => {
    axios.post('/api/regenerate-qrcode', { id: id })
    .then((res) => {
        successNotification(res.data.success);
        listQrCodes(pageNumber.value);
    })
}

const removeqr = (id) => {
    deleteId.value = id;
    f7.popup.open(`.removePopup`);
}

const removeData = () => {
    axios.post('/api/delete-qrcode',{id:deleteId.value})
    .then((res) => {
        successNotification(res.data.success);
        f7.popup.close(`.removePopup`);
        listQrCodes(pageNumber.value)
    })
}

const storeUpdateData = () => {
    var formData = new FormData(event.target);
    if (!formData.get('start_qrcode')) {
        errorNotification("Please enter start month."); return;
    } else if (!formData.get('end_qrcode')) {
        errorNotification("Please enter end month."); return;
    }
    axios.post('/api/generate-qrcode', formData)
        .then((res) => {
        if (res.data.success) {
            successNotification(res.data.success);
            f7.popup.close(`#qrcode_popup`);
            listQrCodes(pageNumber.value);
        } else {
            errorNotification(res.data.error);
        }
    })
}

const calender = () => {
    var dateRange = document.getElementById('demo-calendar-range').value;
    dateRange = dateRange.split(" - ");
    fromDate.value = dateRange[0];
    toDate.value = dateRange[1];
    listQrCodes();
}
</script>