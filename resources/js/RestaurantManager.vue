<template>
  <f7-app v-bind="f7Params">
    <f7-page>
      <div class="nav-bar" v-if="currentRoute != 'login'">
        <Navbar 
          :moveToPos="moveToPos"
          :close-reservation="closeReservationValue"
          :close-reservation-event="closeReservation"
          :current-submenu-route="currentSubmenuRoute"
        />
      </div>
      <f7-view
        url="/reservation/"
        :main="true"
        class="safe-areas"
        :master-detail-breakpoint="768"
        ></f7-view>
        <!-- @notification="notification" -->
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

<script setup>
import { f7App, f7Panel, f7View, f7, f7Page, f7Navbar } from 'framework7-vue';
import { ref, onMounted, onBeforeMount, provide } from 'vue';
import routes from "./restaurant-manager-routes";
import store from "./store";
import axios from "axios";
import $ from "jquery";
import Navbar from "./pages/restaurant-manager/Navbar.vue";

const f7Params = {
  id: "io.framework7.testapp",
  theme: "auto",
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
};

const closeReservationValue = ref(0);
const currentRoute = ref("");
const currentSubmenuRoute = ref('');
const langs = ref([]);
const events = ["click", "mousemove", "mousedown", "scroll", "keypress", "load"];
const warningTimer = ref(null);
let checkLogin = false;
const trans = ref([]);
const user = ref([]);

onMounted(() => {
  setTimeout(() => {
    if (checkLogin) {
      getLanguage();
      checkReservation();
    }
  }, 500);
  resetTimer();
  $(window).bind("load", function () {
    $(".overlay, body").addClass("loaded");
    setTimeout(function () {
      $(".overlay").css({ display: "none" });
    }, 1000);
  });
});


const getLanguage = () => {
  axios.get("/api/get-all-languages").then((res) => {
    langs.value = res.data.langs;
    languageTranslation(langs.value[0].id);
  });
};

const languageTranslation = (langId) => {
  axios.post("/api/get-language-translation", { lang_id: langId }).then((res) => {
    trans.value = res.data.translations;
    selected_lang.value = res.data.lang_id;
  });
};

const checkReservation = () => {
  axios.get("/api/check-reservation").then((res) => {
    closeReservationValue.value = res.data.close_reservation;
  });
};

const closeReservation = (reservation) => {
  $(".closeReservation").css("background-color", "#F33E3E");
  var openOrClose = closeReservationValue.value == 0 ? "open" : "close";
  f7.dialog.confirm("Are you sure " + openOrClose + " the reservation?", () => {
    var changeReservation = closeReservationValue.value == 0 ? 1 : 0;
    axios
      .post("/api/change-reservation", { reservation: changeReservation })
      .then((res) => {
        closeReservationValue.value = res.data.close_reservation;
      });
    $(".closeReservation").css("background-color", "");
  });
  setTimeout(() => {
    $(".dialog-button").eq(1).css({ "background-color": "#F33E3E", color: "#fff" });
    if (closeReservationValue.value == 0)
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
};

const successNotification = (notice) => {
  var notificationFull = f7.notification.create({
    title: '<img src="/images/check-icon.png">' + notice,
    closeTimeout: 3000,
    closeOnClick: true,
    cssClass: "success--notification",
  });
  notificationFull.open();
  $(".notification-header").append('<div><i class="f7-icons">xmark</i></div>');
  $(".notification-content").remove();
};

const errorNotification = (notice) => {
  var notificationFull = f7.notification.create({
    title: '<img src="/images/cross-icon.png">' + notice,
    closeTimeout: 3000,
    closeOnClick: true,
    cssClass: "error--notification",
  });
  notificationFull.open();
  $(".notification-header").append('<div><i class="f7-icons">xmark</i></div>');
  $(".notification-content").remove();
};

const activationMenu = (active, submenuactive) => {
  currentRoute.value = active;
  currentSubmenuRoute.value = submenuactive;
};

const addLoader = () => {
  $(".overlay, body").removeClass("loaded");
  $(".overlay").css({ display: "" });
};

const removeLoader = () => {
  setTimeout(function () {
    $(".overlay, body").addClass("loaded");
    setTimeout(function () {
      $(".overlay").css({ display: "none" });
    }, 1000);
  }, 2000);
};

const setTimer = () => {
  warningTimer.value = setInterval(warningMessage, 15 * 60 * 1000);
};

const warningMessage = () => {
  f7.dialog.close();
  f7.popup.close();
  f7.view.main.router.navigate({ url: "/lock-screen/" });
  lockScreenEnable();
};

const resetTimer = () => {
  clearInterval(warningTimer.value);
  setTimer();
};

const lockScreenEnable = () => {
  const config = {
    headers: { "content-type": "multipart/form-data" },
  };
  axios
    .post("/api/lock-enable-disable", { lock: 1 }, config)
    .then((res) => {})
    .catch((err) => {});
};

const moveToPos = () => {
  window.open('/pos', '_blank');
};


provide('user', user)

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

/*.data-list-section {
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
