<template>
  <f7-app v-bind="f7Params">
    <f7-page>
      <div class="nav-bar" v-if="currentRoute != 'login'">
        <f7-navbar class="navbar-menu bg-color-white">
          <SwitchButton
              :moveToMethod="moveToPos"
              :title="'Switch Pos'"
          />
          <div
            class="header-links display-flex align-items-center"
            v-if="CurrentsubmenuRoute != 'category'"
          >
            <!--========= MANAGER SMALL SCREEN NAVBAR =========== -->
            <div class="small_screen_menu">
              <div class="hamburger__button">
                <a
                  href="#"
                  class="icon-only panel-open text-color-black"
                  data-panel=".panel-right-1"
                  ><i class="f7-icons">bars</i></a
                >
              </div>
              <div
                class="panel panel-right panel-right-1 panel-cover panel-resizable panel-init"
              >
                <div class="pannel_header padding-horizontal text-align-right">
                  <p>
                    <a href="#" class="panel-close text-color-black"
                      ><i class="f7-icons">xmark</i></a
                    >
                  </p>
                </div>
                <div class="block no-margin-top no-padding">
                  <div
                    class="padding-horizontal height-40 border-bottom pannel_menu_link panel-close"
                  >
                    <a href="/table/" class="link nav-link text-color-black font-16">
                      <i class="f7-icons font-14 margin-right-half">clock</i>Waiting
                      area</a
                    >
                  </div>
                  <div
                    class="padding-horizontal height-40 border-bottom pannel_menu_link panel-close"
                  >
                    <a
                      href="/all-reservation/"
                      class="link nav-link text-color-black font-16"
                    >
                      <img
                        src="/images/reservation.png"
                        alt=""
                        class="padding-right-half"
                        style="filter: invert(100%); height: 13px"
                      />All Reservation</a
                    >
                  </div>
                  <div
                    class="padding-horizontal height-40 border-bottom pannel_menu_link panel-close"
                  >
                    <a
                      href="/Reservation/"
                      class="link nav-link text-color-black font-16"
                    >
                      <img
                        src="/images/pluse.png"
                        alt=""
                        class="padding-right-half"
                        style="filter: invert(100%); height: 13px"
                      />Reservation</a
                    >
                  </div>
                  <!-- <div class="list accordion-list inset no-margin">
                    <ul>
                      <li class="accordion-item">
                        <a href="#" class="item-link item-content border-bottom">
                          <div class="item-inner">
                            <div class="item-title font-16">
                              <img
                                src="/images/menu.png"
                                alt=""
                                class="padding-right-half"
                                style="filter: invert(100%); height: 13px"
                              />Menu management
                            </div>
                          </div>
                        </a>
                        <div class="accordion-item-content" aria-hidden="true">
                          <div class="block">
                            <div class="bg-color-white no-padding">
                              <a
                                href="/food-category/"
                                class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding panel-close"
                                >Food Category</a
                              >
                              <a
                                href="/food-subcategory/"
                                class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding panel-close"
                                >Food SubCategory</a
                              >
                              <a
                                href="/food-product/"
                                class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding panel-close"
                                >Food Menu</a
                              >
                              <a
                                href="/digital-menu/"
                                class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding panel-close"
                                >Digital Menu</a
                              >
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div> -->
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
                    <a
                      href="/Reporting/"
                      class="link nav-link text-color-black font-16 panel-close"
                      ><img
                        src="/images/reporting.png"
                        alt=""
                        class="padding-right-half"
                        style="filter: invert(100%); height: 13px"
                      />Reporting</a
                    >
                  </div>
                  <div class="padding-horizontal height-40 border-bottom">
                    <button
                      class="col nav-link button close_reservation no-padding font-16 panel-close"
                      @click="$root.closeReservation(close_reservation)"
                    >
                      <img
                        src="/images/close_1_.png"
                        alt=""
                        class="padding-right-half"
                        style="filter: invert(100%); height: 13px"
                      />{{ close_reservation == 1 ? "Open" : "Close" }} reservation
                    </button>
                  </div>
                  <div class="padding-horizontal height-40 border-bottom">
                    <a
                      href="/settings/"
                      class="col link nav-link text-color-black font-16 panel-close"
                    >
                      <img
                        src="/images/setting.png"
                        alt=""
                        class="padding-right-half"
                        style="filter: invert(100%); height: 13px"
                      />Settings</a
                    >
                  </div>
                </div>
              </div>
            </div>
            <!--========= MANAGER SMALL SCREEN NAVBAR END =========== -->
            <!--========= MANAGER BIG SCREEN NAVBAR =========== -->
            <div
              class="row header-link justify-content-flex-end align-items-center tab_view_menu"
            >
              <div class="padding-left-half padding-right-half height-40 nav-button">
                <a
                  href="/table/"
                  class="col link nav-link button button-raised text-color-white padding"
                  :class="currentRoute == 'table' ? 'bg-pink' : 'bg-dark'"
                >
                  <i class="f7-icons font-14 margin-right-half">clock</i>waiting area</a
                >
              </div>
              <div class="padding-left-half padding-right-half height-40 nav-button">
                <a
                  href="/all-reservation/"
                  class="col link nav-link button button-raised text-color-white padding"
                  :class="currentRoute == 'all-reservation' ? 'bg-pink' : 'bg-dark'"
                >
                  <img
                    src="/images/reservation.png"
                    alt=""
                    class="padding-right-half"
                  />All Reservation</a
                >
              </div>
              <div class="padding-left-half padding-right-half height-40 nav-button">
                <a
                  href="/Reservation/"
                  class="col link nav-link button button-raised text-color-white padding"
                  :class="currentRoute == 'reservation' ? 'bg-pink' : 'bg-dark'"
                >
                  <img src="/images/pluse.png" alt="" class="padding-right-half" /> New
                  Reservation</a
                >
              </div>
              <!-- <div class="nav-button padding-left-half padding-right-half">
                <div class="menu-item menu-item-dropdown">
                  <div
                    class="menu-item-content button button-raised text-color-white"
                    :class="currentRoute == 'menu_management' ? 'bg-pink' : 'bg-dark'"
                  >
                    <img src="/images/menu.png" alt="" class="padding-right-half" />Menu
                    management
                    <i class="f7-icons">chevron_down</i>
                  </div>
                  <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                    <div class="menu-dropdown-content bg-color-white no-padding">
                      <a
                        href="#"
                        class="menu-dropdown-link menu-close margin-horizontal no-padding"
                      ></a>
                       <a href="/" class="menu-dropdown-link menu-close text-color-pink">Table</a> 
                      <a
                        href="/food-category/"
                        class="menu-dropdown-link menu-close"
                        :class="
                          CurrentsubmenuRoute == 'category'
                            ? 'active_submenu'
                            : 'text-color-black'
                        "
                        >Food Category</a
                      >
                      <a
                        href="/food-subcategory/"
                        class="menu-dropdown-link menu-close"
                        :class="
                          CurrentsubmenuRoute == 'subcategory'
                            ? 'active_submenu'
                            : 'text-color-black'
                        "
                        >Food SubCategory</a
                      >
                      <a
                        href="/food-product/"
                        class="menu-dropdown-link menu-close"
                        :class="
                          CurrentsubmenuRoute == 'product'
                            ? 'active_submenu'
                            : 'text-color-black'
                        "
                        >Food Menu</a
                      >
                      <a
                        href="/digital-menu/"
                        class="menu-dropdown-link menu-close"
                        :class="
                          CurrentsubmenuRoute == 'digitalmenu'
                            ? 'active_submenu'
                            : 'text-color-black'
                        "
                        >Digital Menu</a
                      >
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="padding-left-half padding-right-half height-40 nav-button">
                <a
                  href="/Reporting/"
                  class="link nav-link button button-raised text-color-white padding"
                  :class="currentRoute == 'reporting' ? 'bg-pink' : 'bg-dark'"
                >
                  <img
                    src="/images/reporting.png"
                    alt=""
                    class="padding-right-half"
                  />Reporting</a
                >
              </div>
              <div class="padding-left-half padding-right-half height-40">
                <button
                  class="nav-link button button-raised text-color-white padding closeReservation"
                  :class="currentRoute == 'close_reservation' ? 'bg-pink' : 'bg-dark'"
                  @click="$root.closeReservation(close_reservation)"
                >
                  <img
                    :src="
                      close_reservation == 1
                        ? '/images/open_1_.png'
                        : '/images/close_1_.png'
                    "
                    alt=""
                    class="padding-right-half"
                  />
                  {{ close_reservation == 1 ? "Open" : "Close" }} reservation
                </button>
              </div>
              <div class="padding-left-half padding-right-half height-40">
                <a
                  href="/settings/"
                  class="nav-link button button-raised text-color-white padding"
                  :class="currentRoute == 'setting' ? 'bg-pink' : 'bg-dark'"
                >
                  <img
                    src="/images/setting.png"
                    alt=""
                    class="padding-right-half"
                  />Settings</a
                >
              </div>
            </div>
            <!--========= MANAGER BIG SCREEN NAVBAR END=========== -->
          </div>
        </f7-navbar>
      </div>
      <f7-view
        url="/"
        :main="true"
        class="safe-areas"
        :master-detail-breakpoint="768"
        @notification="notification"
      ></f7-view>
      <div class="overlay">
        <div class="overlayDoor"></div>
        <div class="overlayContent">
          <div class="inner text-align-center">
            <img src="/images/loading.gif" alt="Loading.." />
            <p class="text-align-center font__bold font-22">Loading....</p>
            <p class="text-align-center font-18">Please wait,it take a few seconds.</p>
          </div>
        </div>
      </div>
    </f7-page>
  </f7-app>
</template>

<script>
import { f7App, f7Panel, f7View, f7, f7Page, f7Navbar } from "framework7-vue";
import routes from "./restaurant-manager-routes";
import store from "./store";
import $ from "jquery";
import axios from "axios";
import SwitchButton from "./components/SwitchButton.vue";

export default {
  components: {
    f7App,
    f7Panel,
    f7View,
    f7,
    f7Page,
    f7Navbar,
    SwitchButton
  },
  data() {
    // Demo Theme
    let theme = "auto";
    if (document.location.search.indexOf("theme=") >= 0) {
      theme = document.location.search.split("theme=")[1].split("&")[0];
    }

    return {
      f7Params: {
        id: "io.framework7.testapp",
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
      close_reservation: 0,
      currentRoute: "",
      CurrentsubmenuRoute: "",
      langs: [],
      events: ["click", "mousemove", "mousedown", "scroll", "keypress", "load"],
      warningTimer: null,
      checklogin: false,
      trans: [],
      user: [],
    };
  },
  beforeCreate() {
    axios.get("/api/checkLogin").then((res) => {
      if (res.data.check_auth) {
        this.checklogin = true;
        this.user = res.data.user;
        f7.view.main.router.navigate({ url: "/table/" });
      } else {
        f7.view.main.router.navigate({ url: "/login/" });
      }
    });
  },
  created() {
    setTimeout(() => {
      if (this.checklogin) {
        this.getLanguage();
        this.checkreservation();
      }
    }, 500);
    $(window).bind("load", function () {
      $(".overlay, body").addClass("loaded");
      setTimeout(function () {
        $(".overlay").css({ display: "none" });
      }, 1000);
    });
  },
  mounted() {
    this.events.forEach(function (event) {
      window.addEventListener(event, this.resetTimer);
    }, this);
    if (this.checklogin) {
      this.setTimer();
    }
  },
  methods: {
    getLanguage() {
      axios.get("/api/get-all-languages").then((res) => {
        this.langs = res.data.langs;
        this.languageTranslation(this.langs[0].id);
      });
    },
    languageTranslation(langId) {
      axios.post("/api/get-language-translation", { lang_id: langId }).then((res) => {
        this.trans = res.data.translations;
        this.selected_lang = res.data.lang_id;
      });
    },
    checkreservation() {
      axios.get("/api/check-reservation").then((res) => {
        this.close_reservation = res.data.close_reservation;
      });
    },
    closeReservation(reservation) {
      $(".closeReservation").css("background-color", "#F33E3E");
      var openOrClose = this.close_reservation == 0 ? "open" : "close";
      f7.dialog.confirm("Are you sure " + openOrClose + " the reservation?", () => {
        if (reservation == 0) var changereservation = 1;
        else var changereservation = 0;
        axios
          .post("/api/change-reservation", { reservation: changereservation })
          .then((res) => {
            this.close_reservation = res.data.close_reservation;
          });
        $(".closeReservation").css("background-color", "");
      });
      setTimeout(() => {
        $(".dialog-button").eq(1).css({ "background-color": "#F33E3E", color: "#fff" });
        if (this.close_reservation == 0)
          $(".dialog-title").html("<img src='/images/open_reservation.png'>");
        else $(".dialog-title").html("<img src='/images/close_reservation.png'>");
        $(".dialog-buttons").after(
          "<div><img src='/images/flow.png' style='width:100%'></div>"
        );
        $(".dialog-button").addClass(
          "col button button-raised text-color-black button-large text-transform-capitalize"
        );
        $(".dialog-button").eq(1).removeClass("text-color-black");
        $(".dialog-text").addClass("margin-top");
        $(".dialog-buttons").addClass("margin-top no-margin-bottom");
      }, 50);
    },
    successnotification(notice) {
      var notificationFull = f7.notification.create({
        title: '<img src="/images/checkicon.png">' + notice,
        closeTimeout: 3000,
        closeOnClick: true,
        cssClass: "success--notification",
      });
      notificationFull.open();
      $(".notification-header").append('<div><i class="f7-icons">xmark</i></div>');
      $(".notification-content").remove();
    },
    errornotification(notice) {
      var notificationFull = f7.notification.create({
        title: '<img src="/images/crossicon.png">' + notice,
        closeTimeout: 3000,
        closeOnClick: true,
        cssClass: "error--notification",
      });
      notificationFull.open();
      $(".notification-header").append('<div><i class="f7-icons">xmark</i></div>');
      $(".notification-content").remove();
    },
    activationMenu(active, submenuactive) {
      this.currentRoute = active;
      this.CurrentsubmenuRoute = submenuactive;
    },
    addLoader() {
      $(".overlay, body").removeClass("loaded");
      $(".overlay").css({ display: "" });
    },
    removeLoader() {
      setTimeout(function () {
        $(".overlay, body").addClass("loaded");
        setTimeout(function () {
          $(".overlay").css({ display: "none" });
        }, 1000);
      }, 2000);
    },
    setTimer() {
      this.warningTimer = setTimeout(this.warningMessage, 15 * 60 * 1000);
    },
    warningMessage() {
      f7.dialog.close();
      f7.popup.close();
      f7.view.main.router.navigate({ url: "/lock-screen/" });
      this.lockScreenEnable();
    },
    resetTimer() {
      clearTimeout(this.warningTimer);
      this.setTimer();
    },
    lockScreenEnable() {
      const config = {
        headers: { "content-type": "multipart/form-data" },
      };
      axios
        .post("/api/lockenabledisable", { lock: 1 }, config)
        .then((res) => {})
        .catch((err) => {});
    },
    moveToPos() {
      window.open('/pos', '_blank');
    }
  },
  computed: {
    manager() {
      console.log(f7);
      // return this.$route.path === '/'
    },
  },
};
$("body").click(function (e) {
  if ($(e.target).hasClass("backdrop-in")) {
    f7.dialog.close();
  }
});
</script>
<style>
.active_submenu {
  color: #f33e3e !important;
}
.menu-dropdown-link:before {
  background-color: transparent !important;
}
/*========= LOADER CSS ==========*/
/*body.loaded {
    overflow-y: auto;
  }*/
.font__bold {
  font-weight: 700;
}
.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 9999;
}
.overlay.loaded {
  z-index: -1;
  transition: 0.5s cubic-bezier(0.77, 0, 0.18, 1);
  transition-delay: 0.8s;
}
.overlay .overlayDoor:before,
.overlay .overlayDoor:after {
  content: "";
  position: absolute;
  width: 50%;
  height: 100%;
  background: #fff;
  transition: 0.5s cubic-bezier(0.77, 0, 0.18, 1);
  transition-delay: 0.8s;
}
.overlay .overlayDoor:before {
  left: 0;
}
.overlay .overlayDoor:after {
  right: 0;
}
.overlay.loaded .overlayDoor:before {
  left: -50%;
}
.overlay.loaded .overlayDoor:after {
  right: -50%;
}
.overlay.loaded .overlayContent {
  opacity: 0;
  margin-top: -15px;
}
.overlay .overlayContent {
  position: relative;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  transition: 0.5s cubic-bezier(0.77, 0, 0.18, 1);
}

/*.loader {
    width: 128px;
    height: 128px;
    border: 3px solid #fff;
    border-bottom: 3px solid transparent;
    border-radius: 50%;
    position: relative;
    -webkit-animation: spin 1s linear infinite;
            animation: spin 1s linear infinite;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .loader .inner {
    width: 64px;
    height: 64px;
    border: 3px solid transparent;
    border-top: 3px solid #fff;
    border-radius: 50%;
    -webkit-animation: spinInner 1s linear infinite;
            animation: spinInner 1s linear infinite;
  }*/

/*@-webkit-keyframes spin {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }
  @-webkit-keyframes spinInner {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(-720deg);
    }
  }
  @keyframes spinInner {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(-720deg);
    }
  }*/
/*======= LOPADER CSS END ===========*/
.tab_view_menu.row {
  flex-wrap: nowrap !important;
}
.notification-title {
  display: flex;
  justify-content: center;
  align-items: center;
  text-transform: capitalize !important;
  font-weight: 600;
  font-size: 18px;
  line-height: 22px;
}
.notification-title img {
  margin-right: 8px;
}
.notification.success--notification .notification-title {
  color: #0fc963;
}

.notification.error--notification .notification-title {
  color: #ff6161;
}
.notification.success--notification.modal-in {
  background: linear-gradient(
    90deg,
    #91f4be 0%,
    rgb(252 253 252) 100%,
    rgb(145 244 190 / 54%) 100%
  );
  border-radius: 10px;
}
.notification.error--notification.modal-in {
  background: linear-gradient(
    90deg,
    #ffbbbb 0%,
    rgb(252 253 252) 100%,
    rgba(255, 187, 187, 0.9) 100%
  );
  border-radius: 10px;
}
.notification-header {
  justify-content: space-between !important;
}
/*====== NAVBAR CSS ======*/
.header-links .tab_view_menu .button {
  font-size: 14px;
  line-height: 16px;
  font-weight: 400;
}
.small_screen_menu {
  display: none;
}
.nav-link,
.menu-item-content {
  height: 100% !important;
  text-transform: capitalize !important;
}
.navbars,
.navbar {
  z-index: 6000 !important;
  position: fixed !important;
  top: 0;
}
.bg-dark {
  background: #38373d !important;
}
.menu-item-dropdown .menu-item-content .f7-icons {
  font-size: 15px;
  margin-left: 10px;
}
.menu-dropdown-content {
  box-shadow: 0px 0.5px 12px rgba(0, 0, 0, 0.2);
  min-width: 100% !important;
  top: -30px !important;
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
  height: 40px !important;
}

.menu-item-content {
  position: relative;
  z-index: 9;
}

.menu-dropdown-center:before,
.menu-dropdown-center:after {
  content: none !important;
}

.bg-dark {
  background: #38373d;
}

.menu-item-dropdown-opened .menu-item-content {
  background: #f33e3e;
}

.menu-dropdown-link {
  border-bottom: 1px solid #efefef;
}

.nav-bar {
  border-radius: 8px 8px 0px 0px;
}

.page-content {
  padding-top: 0px !important;
  background-color: #f7f7f7 !important;
}

.icon-only {
  width: 100% !important;
  height: 100% !important;
}

.border-bottom {
  border-bottom: 1px solid #eaeaea;
  border-radius: 0 !important;
}

.padding-icon {
  padding: 3px;
}

.border-right {
  border-right: 1px solid #f3f3f3 !important;
}

.header-links {
  width: 100%;
}

.bg-pink {
  background: #f33e3e !important;
}

.bg-karaka-orange {
  background: #ee4925;
}

.text-color-pink {
  color: #f33e3e;
}

.font-22 {
  font-size: 22px;
}
.font-16 {
  font-size: 16px !important;
}
.font-14 {
  font-size: 14px !important;
}
.dialog-title {
  display: flex;
  justify-content: center;
}
.dialog-title {
  display: flex;
  justify-content: center;
}
.md .dialog-buttons {
  justify-content: center !important;
}
.md .dialog-button {
  width: 100% !important;
  border-radius: 10px !important;
}
.md .dialog-title + .dialog-text {
  margin-top: 5px;
}
.dialog {
  border-radius: 10px !important;
}

@media screen and (max-width: 991px) {
  .small_screen_menu {
    display: block;
    width: 100%;
    text-align: end;
  }
  .tab_view_menu {
    display: none !important;
  }
  .menu-dropdown-content {
    z-index: 2;
  }
  .ios .navbar a.icon-only {
    justify-content: end !important;
  }
  .close_reservation {
    border: none;
    background-color: transparent;
    text-align: start;
  }
  .panel.panel-right .list .item-link .item-inner:before {
    color: #000000 !important;
  }
  .panel-backdrop {
    background-color: rgb(17 24 39 / 30%) !important;
  }
  .panel.panel-right .menu-dropdown-link,
  .panel.panel-right .menu-dropdown-item {
    border-bottom: none !important;
    font-weight: 400 !important;
  }
  .panel.panel-right .link.nav-link,
  .panel.panel-right .item-title {
    font-weight: 600 !important;
  }
  .panel.panel-right .close_reservation {
    font-weight: 600 !important;
    line-height: 40px;
    color: #000000;
  }
  .panel.panel-right .close_reservation.button {
    justify-content: flex-start;
  }
}
</style>
<style>
.active-state {
  background-color: none !important;
  opacity: 1 !important;
}
</style>
