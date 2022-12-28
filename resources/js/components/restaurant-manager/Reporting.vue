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
                    <div class="list no-hairlines reporting_calander no-margin">
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
                                <p class="total__number no-margin" id="total_order">{{ total_order }}</p>
                                <div class="card__icon">
                                    <img src="/images/report-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-100 large-25 medium-50">
                        <div class="card border__radius_10 elevation-2">
                            <div class="card-content">
                                <h3 class="card__heading no-margin-top">Completed Orders</h3>
                                <p class="total__number no-margin" id="complete_order">{{ complete_order }}</p>
                                <div class="card__icon">
                                    <img src="/images/report-2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-100 large-25 medium-50">
                        <div class="card border__radius_10 elevation-2">
                            <div class="card-content">
                                <h3 class="card__heading no-margin-top">Ongoing Orders</h3>
                                <p class="total__number no-margin" id="ongoing_order">{{ ongoing_order }}</p>
                                <div class="card__icon">
                                    <img src="/images/report-3.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-100 large-25 medium-50">
                        <div class="card border__radius_10 elevation-2">
                            <div class="card-content">
                                <h3 class="card__heading no-margin-top">Most Reservation Table</h3>
                                <p class="total__number no-margin" id="reservation_table">{{ reservation_table }}</p>
                                <div class="card__icon card__icon_2">
                                    <img src="/images/report-4.png" alt="">
                                </div>
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
                                <apexchart width="1100" height="310" type="line" :options="options" :series="series"></apexchart>
                            </f7-block>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>

<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input,f7AreaChart} from 'framework7-vue';
import apexchart from "vue3-apexcharts";
import axios from 'axios';
import $ from 'jquery';

export default {
    name : 'Reporting',
    data() {
        return {
            total_order : '',
            complete_order : '',
            ongoing_order : '',
            reservation_table : '',
            totalOrderValue  : [1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27,28, 29, 30,31],
            options: {
                chart: {
                id: 'total-order'
                },
                xaxis: {
                    categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999, 2000, 2001],
                    range : 7
                }
            },
            series: [{
                name: 'total-order',
                data: [30, 40, 45, 50, 49, 60, 70, 91,60, 70, 91]
            }]
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
    beforeCreate() {
        this.$root.addLoader();
    },
    mounted() {
        f7.calendar.create({
            inputEl: '#demo-calendar-range',
            rangePicker: true,
            numbers:true,
            footer: true,
            on: {
                open() {
                    setTimeout(() => {
                        $('.popover-angle').css({ 'left': '147px' });
                        $('.calendar-popover').css({ 'top': '144px', 'left': '787.406px' });
                    }, 1);
                },
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
        this.$root.removeLoader();
    },
    created() {
        this.report();
    },
    setup() {
        const numbers = [];
        for (let i = 1; i <= 31; i++) {
            numbers.push(i);
        }

        // helpers data for axis
        const dates = [];
        const today = new Date();
        const year = today.getFullYear();
        const month = today.getMonth();
        for (let i = 0; i < 12; i += 1) {
        dates.push(new Date(year, month - (3 - i)));
        }
        const axisDateFormat = Intl.DateTimeFormat(undefined, { month: 'short', year: 'numeric' });
        const tooltipDateFormat = Intl.DateTimeFormat(undefined, { month: 'long', year: 'numeric' });
        console.log(dates);
        console.log(axisDateFormat);
        console.log(tooltipDateFormat);
        console.log(numbers);
        return {
        dates,
        axisDateFormat,
        tooltipDateFormat,
        numbers
        };
    },
    methods : {
        report() {
            axios.get('/api/report-data')
            .then((res) => {
                this.total_order = res.data.total_order;
                this.complete_order = res.data.complete_order;
                this.ongoing_order = res.data.ongoing_order;
                this.reservation_table = res.data.reservation_table;
            })
        },
        onChange() {
            console.log('123');
        },
        check(m) {
            console.log(m);
        }
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
