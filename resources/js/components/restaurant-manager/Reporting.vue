<template>
    <f7-page>
        <div class="nav-bar">
            <f7-navbar class="navbar-menu bg-color-white" large transparent back-link="Back">
                <div class="header-links display-flex align-items-center padding-right">
                    <div class="row header-link justify-content-flex-end align-items-center">
                        <div class=" padding-left-half padding-right-half height-40 nav-button">
                            <a href="/reservation/" class="col link nav-link button button-raised bg-dark text-color-white padding">
                                Reservation</a>
                        </div>
                        <div class="nav-button col-25">
                            <div class="menu-item menu-item-dropdown">
                                <div class="menu-item-content button button-raised text-color-white padding-left-half padding-right-half">Menu management
                                    <i class="f7-icons">chevron_down</i>
                                </div>
                                <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                                    <div class="menu-dropdown-content bg-color-white no-padding">
                                        <a href="#" class="menu-dropdown-link menu-close margin-horizontal no-padding"></a>
                                        <a href="/food-category/" class="menu-dropdown-link menu-close text-color-pink margin-horizontal no-padding">Food Category</a>
                                        <a href="/food-product/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food Menu</a>                                    
                                        <a href="/food-subcategory/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food subCategory</a>
                                        <a href="/digital-menu/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Digital Menu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" padding-left-half padding-right-half height-40 nav-button"><a href="/reporting/" class="link nav-link button button-raised text-color-white padding  bg-pink">Reporting</a></div>
                        <div class="padding-left-half padding-right-half height-40"><button class="nav-botton button button-raised bg-dark text-color-white padding closeReservation" @click="$root.closeReservation()">Close reservation</button></div>
                        <div class="padding-left-half padding-right-half height-40"><a href="/settings/" class="nav-link button button-raised bg-dark text-color-white padding">Settings</a></div>
                    </div>
                </div>
            </f7-navbar>
        </div>
        <div class="reporting_section">
            <div class="row padding-vertical margin-horizontal align-items-center">
                <div class="col-60">
                    <h3 class="card-title no-margin">Reporting</h3>
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
                                <p class="total__number no-margin">69</p>
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
                                <p class="total__number no-margin">47</p>
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
                                <p class="total__number no-margin">22</p>
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
                                <p class="total__number no-margin">23</p>
                                <div class="card__icon">
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
                                <f7-area-chart
                                tooltip
                                axis
                                :axis-labels="numbers"
                                line-chart
                                :datasets="[
                                    {
                                    label: 'Red data',
                                    color: '#f00',
                                    values: [0, 300, 127, 47, 10, 20, 30, 40, 50, 11],
                                    },
                                ]"
                                />
                            </f7-block>
                        </div>
                    </div>
                    <div class="col-100">
                        <div class="card elevation-2">
                            <h3 class="card__heading margin padding-top">Total Orders</h3>
                            <f7-block>
                                <f7-area-chart
                                tooltip
                                axis
                                :axis-labels="numbers"
                                line-chart
                                :datasets="[
                                    {
                                    label: 'Red data',
                                    color: '#f00',
                                    values: [0, 300, 127, 47, 10, 20, 30, 40, 50, 11],
                                    },
                                ]"
                                />
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
export default {
    name : 'Reporting',
    components: {
        f7Page,
        f7Navbar,
        f7BlockTitle,
        f7Block,
        f7,
        f7Input,
        f7AreaChart
    },
    mounted() {
        f7.calendar.create({
            inputEl: '#demo-calendar-range',
            rangePicker: true,
            numbers:true
        });          
    },
    setup() {
        const numbers = [];
        for (let i = 1; i <= 8; i++) {
            numbers.push(i);
        }
       
        // helpers data for axis
        const dates = [];
        const today = new Date();
        const year = today.getFullYear();
        const month = today.getMonth();
        for (let i = 0; i < 4; i += 1) {
        dates.push(new Date(year, month - (3 - i)));
        }
        const axisDateFormat = Intl.DateTimeFormat(undefined, { month: 'short', year: 'numeric' });
        const tooltipDateFormat = Intl.DateTimeFormat(undefined, { month: 'long', year: 'numeric' });
        return {
        dates,
        axisDateFormat,
        tooltipDateFormat,
        numbers
        };
    },
}
</script>

<style scoped>
.reporting_section{
    margin-top:70px;    
}
.menu-item-dropdown .menu-item-content .f7-icons{
    font-size: 15px;
    margin-left: 10px;
}
/*========= CHART CSS =========*/
.area-chart{
    width: 100%;
    max-width: 100%;
    padding: 20px;
}
/*<!--======= REPORTING CARD CSS ======== -->*/

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

.navbar-menu {
    box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.15);
    height: 60px !important;
    position: relative;
    z-index: 99;
}

.height-40 {
    height: 40px;
}

.height-36 {
    height: 36px;
}

.nav-botton {
    height: 100%;
}

.menu-item-content {
    position: relative;
    z-index: 9;
}

.menu-dropdown-content {
    box-shadow: 0px 0.5px 12px rgba(0, 0, 0, 0.2);
    min-width: 100% !important;
    top: -30px;
}

.header-links {
    width: 75%;
}

.menu-dropdown-center:before,
.menu-dropdown-center:after {
    content: none;
}

.bg-dark {
    background: #38373D;
}

.menu-item-dropdown-opened .menu-item-content {
    background: #F33E3E;
}

.menu-dropdown-link:nth-child(2) {
    border-bottom: 1px solid #EFEFEF;
}
.menu-dropdown-link{
    border-bottom: 1px solid #EFEFEF;
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

.nav-bar {
    border-radius: 8px 8px 0px 0px;
    position: fixed;
    width: 100%;
    z-index: 99;
}

.page-content {
    padding-top: 0px !important;
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
    width: 90%;
}

.nav-link,
.menu-item-content {
    height: 100% !important;
    text-transform: capitalize !important;
}

@media screen and (max-width:820px) {
    .header-links {
        width: 100%;
    }
}
</style>
<style>

.page-content{
    background: #fff !important;
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

</style>