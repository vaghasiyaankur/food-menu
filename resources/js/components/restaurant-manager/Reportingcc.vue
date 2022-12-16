<template>
    <f7-page>
        <ejs-chart :primaryXAxis="chartPrimaryXAxis" :title="chartTitle"
        :primaryYAxis="chartPrimaryYAxis">
          <e-series-collection>
            <e-series type="Line" :dataSource="chartData" xName="date" yName="value" 
            :marker="chartMarker">
            </e-series>
          </e-series-collection>   
        </ejs-chart>
    </f7-page>
</template>

<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input,f7AreaChart} from 'framework7-vue';
import { ChartPlugin, LineSeries, DateTime } from '@syncfusion/ej2-vue-charts';
import axios from 'axios';
import $ from 'jquery';

export default {
    name : 'Reporting',
    components: {
        f7Page,
        f7Navbar,
        f7BlockTitle,
        f7Block,
        f7,
        f7Input,
        f7AreaChart,
        apexchart,
        chart : [LineSeries, DateTime]
    },
    data() {
    return {
      chartMarker : {
        visible : true,
        height : 7,
        width : 7
      },
      chartPrimaryYAxis : { title : 'Temperature'},
      chartTitle : 'Weather Statistics',
      chartPrimaryXAxis : {
        valueType : 'DateTime',
        title : 'Date',
        edgeLabelPlacement : 'Shift',
        labelFormat : 'yyy MMM',
        minimum : new Date(2016, 12, 31),
        maximum : new Date(2022, 12, 1),
        interval : 6,
        intervalType : 'Months',
        rangePadding : 'None'
      },
      chartData : [
       { date : new Date(2017, 3, 1), value : 6.3 },
       { date : new Date(2017, 5, 1), value : 13.3 },
       { date : new Date(2018, 7, 1), value : 8.0 },
       { date : new Date(2018, 4, 1), value : 17.3 },
       { date : new Date(2019, 5, 1), value : 19.8 },
       { date : new Date(2019, 9, 1), value : 5.1 },
       { date : new Date(2020, 2, 1), value : 10.1 },
       { date : new Date(2020, 7, 1), value : 9.6 },
       { date : new Date(2021, 5, 1), value : 18.1 },
       { date : new Date(2021, 12, 15), value : 8.2 }
      ]
    };
  }
}
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
.reporting_calander ul{
    background-color: transparent;
}
.reporting_calander ul .item-input-wrap input{
    background-color: #fff;
    border-radius: 8px;
    padding: 12px;
}
.reporting_card .card{
    background-image: url(/images/reportingbg.png);
    background-size: cover;
    border-left: 7px solid #F33E3E;
    justify-content: space-between;
    align-items: end;
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
.calendar-day-selected-right .calendar-day-number{
    background-color: #F33E3E !important;

}
.calendar-day-selected-left .calendar-day-number{
    background-color: #F33E3E !important;

}
.calendar-day-today .calendar-day-number{
    background-color: #F33E3E !important;
}
.calendar-day-selected-range:before, .calendar-day-selected-left:before, .calendar-day-selected-right:before{
    background-color: #FFE1E1 !important;
    opacity: 1 !important;
}
.apexcharts-canvas .apexcharts-element-hidden, .apexcharts-menu-icon, .apexcharts-reset-icon{
    display: none;
}
.apexcharts-zoomin-icon, .apexcharts-zoomout-icon {
    transform: initial !important;
    margin-right: 10px;
}
</style>
