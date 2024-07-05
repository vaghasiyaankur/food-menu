<template>
    <f7-page>
        <div class="reporting_section">
            <div class="row padding-vertical margin-horizontal align-items-center">
                <div class="col-60">
                    <h3 class="no-margin">
                        <!-- <a href="javscript:;" class="text-color-black padding-right-half"><i class="f7-icons font-22" style="vertical-align: bottom;">arrow_left</i></a>                             -->
                        <span class="page_heading"> Reporting</span>
                    </h3>
                </div>
                <div class="col-40">
                    <div class="list no-hairlines reporting-calendar no-margin">
                        <ul>
                            <li>
                                <div class="item-content item-input">
                                    <div class="item-inner no-padding-right   ">
                                        <div class="item-input-wrap input-dropdown-wrap">
                                            <input type="text" placeholder="Select date range" readonly="readonly" id="demo-calendar-range" />
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="reporting_card">
                <div class="row">
                    <div class="col-100 large-25 medium-50">
                        <div class="card border__radius_10 elevation-2">
                            <div class="card-content">
                                <h3 class="card__heading no-margin-top">Total Orders</h3>
                                <p class="total__number no-margin" id="total_order">{{ totalOrder }}</p>
                                <div class="card__icon">
                                    <img src="/images/report-1.png" alt="">
                                </div>
                                <img src="/images/reportingbg.gif" class="dash_back-image" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-100 large-25 medium-50">
                        <div class="card border__radius_10 elevation-2">
                            <div class="card-content">
                                <h3 class="card__heading no-margin-top">Completed Orders</h3>
                                <p class="total__number no-margin" id="complete_order">{{ completeOrder }}</p>
                                <div class="card__icon">
                                    <img src="/images/report-2.png" alt="">
                                </div>
                                <img src="/images/reportingbg.gif" class="dash_back-image" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-100 large-25 medium-50">
                        <div class="card border__radius_10 elevation-2">
                            <div class="card-content">
                                <h3 class="card__heading no-margin-top">Ongoing Orders</h3>
                                <p class="total__number no-margin" id="ongoing_order">{{ ongoingOrder }}</p>
                                <div class="card__icon">
                                    <img src="/images/report-3.png" alt="">
                                </div>
                                <img src="/images/reportingbg.gif" class="dash_back-image" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-100 large-25 medium-50">
                        <div class="card border__radius_10 elevation-2">
                            <div class="card-content">
                                <h3 class="card__heading no-margin-top">Most Reservation Table</h3>
                                <p class="total__number no-margin" id="reservation_table">{{ reservationTable }}</p>
                                <div class="card__icon card__icon_2">
                                    <img src="/images/report-4.png" alt="">
                                </div>
                                <img src="/images/reportingbg.gif" class="dash_back-image" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="reporting__chart">
                <div class="row">
                    <div class="col-100">
                        <div class="card elevation-2">
                            <h3 class="card__heading margin padding-top">Total Orders</h3>
                            <f7-block>
                                <div id="chart">
                                    <div id="chart-timeline">
                                        <Chart :pannable="true" :zoomable="true" :style="{ height: '400px'}">
                                            <ChartTooltip :background="'#fff'" />
                                            <ChartCategoryAxis>
                                                <ChartCategoryAxisItem :max="categoryAxisMax" :max-divisions="categoryAxisMaxDivisions" :labels="{ color: '#686868',rotation: 'auto', }" :line="{ color: 'rgba(243, 62, 62, 1)' }" />
                                            </ChartCategoryAxis>
                                            <ChartValueAxis>
                                                <ChartValueAxisItem :labels="{ visible: true ,color : '#686868'}" :line="{ color: 'rgba(243, 62, 62, 1)' }"/>
                                            </ChartValueAxis>
                                            <ChartSeries>
                                                <ChartSeriesItem :type="'line'" :data-items="series" :category-field="'category'" :color="'rgba(243, 62, 62, 1)'" :markers="{ visible: false }" :line-style="'normal'" :field="'value'" />
                                            </ChartSeries>
                                        </Chart>
                                    </div>
                                </div>
                            </f7-block>
                        </div>
                        <input type="hidden" id="fromDate">
                        <input type="hidden" id="toDate">
                        <button @click="report" style="opacity: 0" id="date-set"></button>
                    </div>
                </div>
            </div>

            <input type="hidden" id="fromDate">
            <input type="hidden" id="toDate">
            <button @click="report" style="opacity: 0" id="date-set"></button>
        </div>
    </f7-page>
</template>

<script setup>
import { ref, onMounted, onBeforeMount } from 'vue';
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input,f7AreaChart } from 'framework7-vue';
import axios from 'axios';
import $ from 'jquery';
import moment from 'moment';
import 'hammerjs';

const totalOrder = ref(0);
const completeOrder = ref(0);
const ongoingOrder = ref(0);
const reservationTable = ref(0);
const series = ref([]);
const categoryAxisMax = new Date(2023, 1, 0);
const categoryAxisMaxDivisions = 10;

onBeforeMount(() => {
    // addLoader();
});

onMounted(() => {
    f7.calendar.create({
        inputEl: '#demo-calendar-range',
        rangePicker: true,
        numbers:true,
        footer: true,
        on: {
            open() {
                setTimeout(() => {
                    $('.popover-angle').css({ 'left': '147px' });
                    if($('body').width() > $('body').height())  $('.calendar-popover').css({ 'top': '144px', 'left': '787.406px' });
                    else $('.calendar-popover').css({ 'top': '144px', 'left': '493.406px' });
                }, 1);
            },
            close(daterange) {
                var dates = daterange.getValue();
                if(dates){
                    var from_date = new Date(dates[0]).toLocaleDateString('sv-SE');
                    var to_date = dates[1] ? new Date(dates[1]).toLocaleDateString('sv-SE') : '';

                    $('#fromDate').val(from_date);
                    $('#toDate').val(to_date);

                    $("#date-set").trigger('click');
                }
            }
        }
    });

    // activationMenu('reporting', '');
    // removeLoader();
    report();
    // apexChartData();
});

const chartInstance = (chart) => {
    chart.value = chart;
}

const report = () => {
    const fromDate = $('#fromDate').val() || '';
    const toDate = $('#toDate').val() || '';
    axios.get('/api/report-data', { params: { from_date: fromDate, to_date: toDate } })
        .then((res) => {
            totalOrder.value = res.data.total_order;
            completeOrder.value = res.data.complete_order;
            ongoingOrder.value = res.data.ongoing_order;
            reservationTable.value = res.data.reservation_table;
        })
        .catch((error) => {
            console.error('Error fetching report data:', error);
        });
};

const apexChartData = () => {
    axios.get('/api/report-chart-data')
        .then((res) => {
            res.data.all_orders.forEach((data) => {
                const category = moment(data.created_at, moment.defaultFormat).toDate();
                series.value.push({
                    value: data.orders,
                    category: category,
                });
            });
        })
        .catch((error) => {
            console.error('Error fetching chart data:', error);
        });
};

</script>

<style scoped>

/*========= CHART CSS =========*/
.area-chart{
    width: 100%;
    max-width: 100%;
    padding: 20px;
}
/*<!--======= REPORTING CARD CSS ======== -->*/
.reporting_section{
    margin-top: 70px;
}
.reporting-calendar ul{
    background-color: transparent;
}
.reporting-calendar ul .item-input-wrap input{
    background-color: #fff;
    border-radius: 8px;
    padding: 12px;
}
.reporting_card .card{
    border-left: 7px solid #F33E3E;
    justify-content: space-between;
    align-items: end;
    overflow: hidden;
    z-index: 0;
}
.reporting_card .card .dash_back-image {
    position: absolute;
    top: 0;
    z-index: -1;
    right: 0;
    width: 75%;
}
.reporting_card .card .card-content{
    padding: 20px;
    position: relative;
}
.reporting_card .card .card-content .card__icon{
    position: absolute;
    right: 0;
    bottom: 0;
}
.reporting_card .card .card-content .card__icon.card__icon_2{
    right: 10px;
}
.reporting_card .card .card-content .card__heading{
    font-weight: 600;
    font-size: 16px;
    line-height: 19px;
    color: #38373D;
}
.reporting_card .card .card-content .total__number{
    font-weight: 600;
    font-size: 42px;
    line-height: 51px;
    color: #FDD5D5;
}
.border__radius_10{
    border-radius: 10px;
}
.card-title{
    font-weight: 600;
    font-size: 20px;
    line-height: 24px;
}


.height-40 {
    height: 40px;
}

.height-36 {
    height: 36px;
}
.bg-dark {
    background: #38373D;
}
.bg-pink {
    background: #F33E3E;
}

.text-color-pink {
    color: #F33E3E;
}

.font-22 {
    font-size: 22px;
}

.item-input-wrap {
    width: 100%;
    background: #F0F0F0;
    border: 0.5px solid #DCDCDC;
    border-radius: 7px;
    height: auto;
}

.border-bottom {
    border-bottom: 1px solid #EAEAEA;
}

#searchData {
    width: 85%;
}

@media screen and (max-width:820px) {
    .header-links {
        width: 100%;
    }
}
</style>
<style>
.page-content {
    background: #f7f7f7 !important;
}
.calendar-day-number{
    border-radius: 3px !important;
}
.calendar-day-selected .calendar-day-number{
    background-color: #F33E3E !important;
}
.calendar-day-selected-right .calendar-day-number{
    background-color: #F33E3E !important;

}
.calendar-day-selected-left .calendar-day-number{
    background-color: #F33E3E !important;

}
.calendar-day-today .calendar-day-number{
    background-color: transparent;
    color: #000;
}
.calendar-day-selected-range .calendar-day-number{
    background-color: transparent !important;
    color: inherit !important;
}
.calendar-day-selected-range:before, .calendar-day-selected-left:before, .calendar-day-selected-right:before{
    background-color: #FFE1E1 !important;
    opacity: 1 !important;
}
.apexcharts-canvas .apexcharts-element-hidden, .apexcharts-menu-icon, .apexcharts-reset-icon{
    /* display: none; */
}
.apexcharts-zoomin-icon, .apexcharts-zoomout-icon {
    transform: initial !important;
    margin-right: 10px;
}
#chart{
    height: 420px;
}
</style>
