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
                        <div class="nav-button col-20">
                            <div class="menu-item menu-item-dropdown">
                                <div class="menu-item-content button button-raised bg-pink text-color-white padding-left-half padding-right-half">Menu management</div>
                                <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                                    <div class="menu-dropdown-content bg-color-white no-padding">
                                        <a href="#" class="menu-dropdown-link menu-close"></a>
                                        <a href="/food-category/" class="menu-dropdown-link menu-close text-color-pink">Food Category</a>
                                        <a href="/food-product/" class="menu-dropdown-link menu-close text-color-black">Food Menu</a>                                    
                                        <a href="/food-subcategory/" class="menu-dropdown-link menu-close text-color-black">Food subCategory</a>
                                        <a href="/digital-menu/" class="menu-dropdown-link menu-close text-color-black">Digital Menu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" padding-left-half padding-right-half height-40 nav-button"><a href="/reporting/" class="link nav-link button button-raised bg-dark text-color-white padding">Reporting</a></div>
                        <div class="padding-left-half padding-right-half height-40"><button class="nav-botton button button-raised bg-dark text-color-white padding closeReservation" @click="$root.closeReservation()">Close reservation</button></div>
                        <div class="padding-left-half padding-right-half height-40"><a href="/settings/" class="nav-link button button-raised bg-dark text-color-white padding">Settings</a></div>
                    </div>
                </div>
            </f7-navbar>
        </div>
        <div class="reservation_card">
            <div class="card">
                <div class="row height_100 align-items-center">
                    <div class="col-50">
                        <div class="text-align-center padding-top">
                            <img src="/images/registerImage.png" alt="">
                        </div>
                    </div>
                    <div class="col-50">                        
                        <div class="reservation_form">
                            <div class="text-color-gray register-text padding-left">
                                <h3 class="card-title">Registration</h3>
                                <p> Please fill in the form below. <br> We will contact you as soon as possible </p>
                            </div>
                            <div>
                                <form class="list margin-vertical" id="my-form">
                                    <div class="item-content item-input">
                                        <div class="item-inner">
                                            <div class="item-title item-label">Name</div>
                                            <div class="item-input-wrap">
                                                <input type="text" name="name" class="padding" placeholder="Enter Your name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-content item-input">
                                        <div class="item-inner">
                                            <div class="item-title item-label">Phone number</div>
                                            <div class="item-input-wrap"><input type="number" name="number" class="padding" placeholder="Phone number"></div>
                                        </div>
                                    </div>
                                    <div class="item-content item-input">
                                        <div class="item-inner">
                                            <div class="item-title item-label">Family member member</div>
                                            <div class="item-input-wrap"><input type="number" name="member" class="padding" placeholder="5 Family member"></div>
                                        </div>
                                    </div>
                                    <div class="item-content item-input">
                                        <div class="item-inner">
                                            <div class="item-title item-label">Location type</div>
                                            <div class="item-input-wrap input-dropdown-wrap">
                                                <select placeholder="Please choose..." class="padding-left padding-right">
                                                <option value="Male">Ground floor (Non-AC)</option>
                                                <option value="Female">First floor (AC)</option>
                                                <option value="Female">Second floor (AC)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="no-padding-left">
                                        <label class="item-checkbox item-content">
                                            <input type="checkbox" name="demo-checkbox" value="Books"><i class="icon icon-checkbox"></i>
                                            <div class="item-inner">
                                                <div class="item-title no-margin">I agree with the terms &amp; conditions</div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="text-align-center margin-top">
                                        <a class="link text-underline text-color-black" href="javascript:;">Check Time</a>
                                        <div class="countdown_section position-relative display-none">
                                            <div style="background: url(&quot;/images/dots.png&quot;);">
                                                <img src="/images/clock.png" alt=""><i class="f7-icons font-13 padding-half margin-bottom close-countdown">xmark</i><span><p class="no-margin font-30">0 : 37 : 22</p></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="padding bottom-bar">
                            <div class="row justify-content-start">
                               <div class="col bottom-button margin-right">
                                  <a class="button button bg-color-white register-button button-raised text-color-black button-large text-transform-capitalize" href="#" id="book_table">
                                     Book Table
                                  </a>
                               </div>
                               <div class="col bottom-button">
                                  <a class="button button-fill sheet-open button bg-color-white register-button button-raised text-color-black button-large text-transform-capitalize" href="#" data-sheet=".demo-sheet-swipe-to-close">
                                     Menu
                                  </a>
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
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input } from 'framework7-vue';
export default {
    name : 'Reservation',
    components: {
        f7Page,
        f7Navbar,
        f7BlockTitle,
        f7Block,
        f7,
        f7Input
    },
}
</script>
<style scoped>
/*============ RESERVATION CARD ============*/
.reservation_card .card{
    height: calc(100vh - 100px);
}
.height_100{
    height: 100%;
}
.simple-list li:after, .links-list a:after, .list .item-inner:after{
    background-color: transparent !important;
}
.list input[type='text'], .list input[type='password'], .list input[type='search'], .list input[type='email'], .list input[type='tel'], .list input[type='url'], .list input[type='date'], .list input[type='month'], .list input[type='datetime-local'], .list input[type='time'], .list input[type='number'], .list select{
    background-color: #fafafa;
    border-radius: 10px;
}
.reservation_card .item-title{
    font-weight: 600;
    font-size: 14px;
    line-height: 17px;
    color: #555555;
    margin-bottom: 10px;
}
.reservation_form{
    
    height: calc(100vh - 250px);
    overflow-y: auto;

}
.icon.icon-checkbox{
    border-radius: 3px;
}
label.item-checkbox input[type='checkbox']:checked ~ .icon-checkbox:after, label.item-checkbox input[type='checkbox']:checked ~ * .icon-checkbox:after, .checkbox input[type='checkbox']:checked ~ i:after, label.item-checkbox input[type='checkbox']:indeterminate ~ .icon-checkbox:after, label.item-checkbox input[type='checkbox']:indeterminate ~ * .icon-checkbox:after, .checkbox input[type='checkbox']:indeterminate ~ i:after{
    background-color: #F33E3E;
    border-radius: 3px;
}
.countdown_section{
    background: #f88f721a;
    box-shadow: 0px 1px 9px #f88f721a;
    border-radius: 7px;
    padding: 18px;
    position: relative;
}
.close-countdown{
    position: absolute;
    top: 5px;
    right: 5px;
    background: white;
    border-radius: 50%;
    padding: 5px !important;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 20px;
    height: 20px;
}
.font-13{
    font-size: 13px !important;
}
.card-title{
    font-weight: 600;
    font-size: 20px;
    line-height: 24px;
    color: #000;
}
.text-underline {
    text-decoration: underline;
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