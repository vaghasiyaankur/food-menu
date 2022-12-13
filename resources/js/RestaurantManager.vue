<template>
<f7-app v-bind="f7Params">
    <f7-page>
        <div class="nav-bar">
            <f7-navbar class="navbar-menu bg-color-white">
                <div class="left">

                </div>
                <div class="header-links display-flex align-items-center padding-right"> 
                    <!--========= SMALL SCREEN MENU BAR=========== -->
                    <div class="small_screen_menu">
                        <div class="hamburger__button">
                            <a href="#" class="link icon-only panel-open" data-panel=".panel-right-1"><i class="f7-icons">bars</i></a>
                        </div>
                        <div class="panel panel-right panel-right-1 panel-cover panel-resizable panel-init">
                            <div class="pannel_header padding-horizontal text-align-right">
                                <p><a href="#" class="panel-close text-color-black"><i class="f7-icons">xmark</i></a></p>
                            </div>
                            <div class="block no-margin-top no-padding">
                                <div class=" padding-horizontal height-40 border-bottom pannel_menu_link">
                                    <a href="/" class="link nav-link text-color-black font-16">
                                        Waiting area</a>
                                </div>
                                <div class=" padding-horizontal height-40 border-bottom pannel_menu_link">
                                    <a href="/Reservation/" class="link nav-link text-color-black font-16">
                                        Reservation</a>
                                </div>
                                <div class="list accordion-list inset no-margin">
                                    <ul>
                                        <li class="accordion-item">
                                            <a href="#" class="item-link item-content border-bottom">
                                                <div class="item-inner">
                                                    <div class="item-title font-16">Menu management</div>
                                                </div>
                                            </a>
                                            <div class="accordion-item-content" aria-hidden="true">
                                                <div class="block">
                                                    <div class=" bg-color-white no-padding">                                                        
                                                        <a href="/food-category/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food Category</a>
                                                        <a href="/food-subcategory/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food SubCategory</a>
                                                        <a href="/food-product/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food Menu</a>
                                                        <a href="/digital-menu/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Digital Menu</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- <div class="menu-item menu-item-dropdown bg-white">
                                    <div class="menu-item-content padding-horizontal">Menu management
                                        <i class="f7-icons">chevron_down</i>
                                    </div>                                    
                                    <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                                        <div class="menu-dropdown-content bg-color-white no-padding">
                                            <a href="#" class="menu-dropdown-link menu-close margin-horizontal no-padding"></a>
                                            <a href="/food-category/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food Category</a>
                                            <a href="/food-subcategory/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food SubCategory</a>
                                            <a href="/food-product/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food Menu</a>
                                            <a href="/digital-menu/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Digital Menu</a>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="padding-horizontal height-40 border-bottom">
                                    <a href="/Reporting/" class="link nav-link text-color-black font-16">Reporting</a>
                                </div>
                                <div class=" padding-horizontal height-40 border-bottom">
                                    <button class="col nav-link  button close_reservation no-padding font-16" @click="$root.closeReservation()">Close reservation</button>
                                </div>
                                <div class="padding-horizontal height-40 border-bottom">
                                    <a href="/settings/" class="col link nav-link text-color-black font-16">Settings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--========= SMALL SCREEN MENU BAR END=========== -->          
                    <div class="row header-link justify-content-flex-end align-items-center tab_view_menu">
                        <div class=" padding-left-half padding-right-half height-40 nav-button">
                            <a href="/"
                                class="col link nav-link button button-raised bg-dark text-color-white padding">
                                waiting area</a>
                        </div>
                        <div class=" padding-left-half padding-right-half height-40 nav-button">
                            <a href="/Reservation/"
                                class="col link nav-link button button-raised bg-dark text-color-white padding">
                                Reservation</a>
                        </div>
                        <div class="col-25 nav-button">
                            <div class="menu-item menu-item-dropdown">
                                <div class="menu-item-content button button-raised bg-pink text-color-white padding-left-half padding-right-half">
                                    Menu management
                                    <i class="f7-icons">chevron_down</i>
                                </div>
                                <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                                    <div class="menu-dropdown-content bg-color-white no-padding">
                                        <a href="#" class="menu-dropdown-link menu-close margin-horizontal no-padding"></a>
                                        <!-- <a href="/" class="menu-dropdown-link menu-close text-color-pink">Table</a> -->
                                        <a href="/food-category/" class="menu-dropdown-link menu-close text-color-black">Food Category</a>
                                        <a href="/food-subcategory/" class="menu-dropdown-link menu-close text-color-black">Food SubCategory</a>
                                        <a href="/food-product/" class="menu-dropdown-link menu-close text-color-black">Food Menu</a>
                                        <a href="/digital-menu/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Digital Menu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="nav-button">
                        <div class="menu-item menu-item-dropdown">
                            <div class="menu-item-content button button-raised bg-pink text-color-white padding-left-half padding-right-half">Menu management</div>
                            <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                                <div class="menu-dropdown-content bg-color-white no-padding">
                                    <a href="#" class="menu-dropdown-link menu-close"></a>
                                    <a href="/food-category/" class="menu-dropdown-link menu-close text-color-pink">Food Category</a>
                                    <a href="/food-product/" class="menu-dropdown-link menu-close text-color-black">Food Menu</a>
                                    <a href="/food-subcategory/" class="menu-dropdown-link menu-close text-color-black">Food SubCategory</a>
                                    <a href="/digital-menu/" class="menu-dropdown-link menu-close text-color-black">Digital Menu</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                        <div class=" padding-left-half padding-right-half height-40 nav-button"><a href="/Reporting/"
                                class="link nav-link button button-raised bg-dark text-color-white padding">Reporting</a>
                        </div>
                        <div class="padding-left-half padding-right-half height-40">
                            <button
                                class="nav-link button button-raised bg-dark text-color-white padding closeReservation"
                                @click="$root.closeReservation()">Close reservation</button></div>
                        <div class="padding-left-half padding-right-half height-40"><a href="/settings/"
                                class="nav-link button button-raised bg-dark text-color-white padding">Settings</a>
                        </div>
                    </div>
                </div>          
            </f7-navbar>
        </div>         
        <f7-view url="/" :main="true" class="safe-areas" :master-detail-breakpoint="768" @notification="notification"></f7-view>
    </f7-page>
</f7-app>
</template>

<script>
import { f7App, f7Panel, f7View, f7,f7Page,f7Navbar } from 'framework7-vue';
import routes from './restaurant-manager-routes';
import store from './store';
import $ from 'jquery';

export default {
    components: {
        f7App,
        f7Panel,
        f7View,
        f7,
        f7Page,
        f7Navbar
    },
    data() {
        // Demo Theme
        let theme = 'auto';
        if (document.location.search.indexOf('theme=') >= 0) {
            theme = document.location.search.split('theme=')[1].split('&')[0];
        }

        return {
            f7Params: {
                id: 'io.framework7.testapp',
                theme,
                routes,
                store,
                popup: {
                    closeOnEscape: true,
                },
                sheet: {
                    closeOnEscape: true,
                },
                popover: {
                    closeOnEscape: true,
                },
                actions: {
                    closeOnEscape: true,
                },
            },
        }
    },
    methods: {
        closeReservation() {
            $('.closeReservation').css('background-color', '#F33E3E');
            f7.dialog.confirm('Are you sure close the reservation?',() => {
                $('.closeReservation').css('background-color', '');
            });
            setTimeout(() => {
                $('.dialog-button').eq(1).css({ 'background-color': '#F33E3E', 'color': '#fff' });
                $('.dialog-title').html("<img src='/images/close.png'>");
                $('.dialog-buttons').after("<div><img src='/images/flow.png' style='width:100%'></div>");
                $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
                $('.dialog-button').eq(1).removeClass('text-color-black');
                $('.dialog-text').addClass('margin-top');
                $('.dialog-buttons').addClass('margin-top no-margin-bottom')
            }, 200);
        },
        successnotification(notice) {
            var notificationFull = f7.notification.create({                
                title: '<img src="/images/checkicon.png">' + notice ,               
                closeTimeout: 2000,
                closeOnClick: true,
                cssClass: 'success--notification'
                
            });
            notificationFull.open();
            $('.notification-header').append('<div><i class="f7-icons">xmark</i></div>');
            $('.notification-content').remove();
        },
        errornotification(notice) {
            var notificationFull = f7.notification.create({                
                title: '<img src="/images/crossicon.png">' + notice ,               
                closeTimeout: 2000,
                closeOnClick: true,
                cssClass: 'error--notification'
                
            });
            notificationFull.open();
            $('.notification-header').append('<div><i class="f7-icons">xmark</i></div>');
            $('.notification-content').remove();
        }
    },
    computed: {
        manager() {
            console.log(f7);
            // return this.$route.path === '/'
        },
    },
};
</script>
<style>
.notification-title{
    display: flex;
    justify-content: center;
    align-items: center;
}
.notification-title img{
    margin-right: 8px;
}
.notification.success--notification.modal-in{
    background: linear-gradient(90deg, #91F4BE 0%, rgb(252 253 252) 100%, rgb(145 244 190 / 54%) 100%);
    border-radius: 10px;
}
.notification.error--notification.modal-in{
    background: linear-gradient(90deg, #FFBBBB 0%, rgb(252 253 252) 100%, rgba(255, 187, 187, 0.9) 100%);
    border-radius: 10px;
}
.notification-header {
    justify-content: space-between !important
}
/*====== NAVBAR CSS ======*/
.small_screen_menu{
    display: none;
}
.nav-link,
.menu-item-content {
    height: 100% !important;
    text-transform: capitalize !important;
}
.navbars, .navbar{
    z-index: 6000 !important;
    position: fixed !important;
    top: 0;
}
.bg-dark {
    background: #38373D !important;
}
.menu-item-dropdown .menu-item-content .f7-icons{
    font-size: 15px;
    margin-left: 10px;
}
.menu-dropdown-content {
    box-shadow: 0px 0.5px 12px rgba(0, 0, 0, 0.2);
    min-width: 100% !important;
    top: -30px;
}

/*.category-list-section {
    margin-top: 70px
}*/

.page-food-category {
    background: #f1f1f1;
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

.menu-item-content {
    position: relative;
    z-index: 9;
}

.menu-dropdown-content {
    box-shadow: 0px 0.5px 12px rgba(0, 0, 0, 0.2);
    min-width: 100% !important;
    top: -30px !important;
}

.menu-dropdown-center:before,
.menu-dropdown-center:after {
    content: none !important;
}

.bg-dark {
    background: #38373D;
}

.menu-item-dropdown-opened .menu-item-content {
    background: #F33E3E;
}

.menu-dropdown-link {
    border-bottom: 1px solid #EFEFEF;
}

.color-pink {
    background: #F33E3E;
}

.nav-bar {
    border-radius: 8px 8px 0px 0px;
}

.page-content {
    padding-top: 0px !important;
    background-color: #F7F7F7 !important;
}

.icon-only {
    width: 100% !important;
    height: 100% !important;
}

.border-bottom {
    border-bottom: 1px solid #EAEAEA;
    border-radius: 0 !important;
}

.padding-icon {
    padding: 3px;
}

.border-right {
    border-right: 1px solid #F3F3F3 !important;
 
}

.header-links {
    width: 75%;
}

.bg-pink {
    background: #F33E3E;
}

.bg-karaka-orange {
    background: #EE4925;
}

.text-color-pink {
    color: #F33E3E;
}

.font-22 {
    font-size: 22px;
}
.font-16{
    font-size: 16px !important;
}
@media screen and (max-width:991px){
    .small_screen_menu{
        display: block;
        width: 100%;
        text-align: end;
    }
    .tab_view_menu{
        display: none !important;
    }
    .menu-dropdown-content{
        z-index:2;
    }
    .ios .navbar a.icon-only{
        justify-content: end !important;
    }
    .close_reservation{
        border: none;
        background-color: transparent;
        text-align:start;
    }
    .panel.panel-right .list .item-link .item-inner:before{
        color: #000000 !important;
    }
    .panel-backdrop {
        background-color: rgb(17 24 39 / 30%) !important;
    }
    .panel.panel-right .menu-dropdown-link,.panel.panel-right .menu-dropdown-item{
        border-bottom: none !important;
        font-weight: 400 !important;
    }
    .panel.panel-right .link.nav-link, .panel.panel-right .item-title{
        font-weight: 600 !important;
    }
    .panel.panel-right .close_reservation{
        font-weight: 600 !important;
        line-height:40px;
        color: #000000;
    }
    .panel.panel-right .close_reservation.button{
        justify-content: flex-start;
    }
   
}
</style>
