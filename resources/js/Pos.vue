<template>
  <f7-app ref="app" v-bind="f7Params">
    <f7-page>
      <div class="nav-bar" v-if="currentRoute.value != 'login'">
        <Navbar 
          :moveToMethod="MoveToWaitingArea"
        />
      </div>
      <f7-view
        url="/currentOrders/"
        :main="true"
        class="safe-areas"
        :master-detail-breakpoint="768"
      ></f7-view>
      <div class="overlay loaded">
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
import { ref, reactive, onMounted, onBeforeUnmount, computed } from 'vue';
import { f7App, f7Panel, f7View, f7, f7Page, f7Navbar } from "framework7-vue";
import routes from "./pos-routes";
import store from "./store";
import axios from "axios";
import Icon from "./components/Icon.vue";
import Navbar from "./pages/pos/Navbar.vue";

// Reactive data
const f7Params = reactive({
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
});

const closeReservationData = ref(0);
const currentRoute = ref("");
const currentSubmenuRoute = ref("");
const langs = ref([]);
const warningTimer = ref(null);
const checkLogin = ref(false);
const trans = ref([]);
const user = ref([]);
const events = ["click", "mousemove", "mousedown", "scroll", "keypress", "load"];

// Function to move to waiting area
const MoveToWaitingArea = () => {
  window.open("/manager", "_blank");
};

// Methods
const getLanguage = async () => {
  const res = await axios.get("/api/get-all-languages");
  langs.value = res.data.langs;
  await languageTranslation(langs.value[0].id);
};

const languageTranslation = async (langId) => {
  const res = await axios.post("/api/get-language-translation", { lang_id: langId });
  trans.value = res.data.translations;
};

const checkReservation = async () => {
  const res = await axios.get("/api/check-reservation");
  closeReservationData.value = res.data.close_reservation;
};

const closeReservation = async (reservation) => {
  try {
    const elements = document.querySelectorAll(".closeReservation");
    elements.forEach(element => {
      element.style.backgroundColor = "#F33E3E";
    });

    const openOrClose = closeReservationData.value === 0 ? "open" : "close";
    const confirmed = await f7.dialog.confirm(`Are you sure ${openOrClose} the reservation?`);

    if (confirmed) {
      const changeReservation = reservation === 0 ? 1 : 0;
      const res = await axios.post("/api/change-reservation", { reservation: changeReservation });
      closeReservationData.value = res.data.close_reservation;
    }

    elements.forEach(element => {
      element.style.backgroundColor = "";
    });
  } catch (error) {
    console.error("Error:", error);
  }
};

const activationMenu = (active, subMenuActive) => {
  currentRoute.value = active;
  currentSubmenuRoute.value = subMenuActive;
};

const addLoader = () => {
  const elements = document.querySelectorAll(".overlay, body");
  elements.forEach(element => {
    element.classList.remove("loaded");
  });

  const overlayElements = document.querySelectorAll(".overlay");
  overlayElements.forEach(element => {
    element.style.display = "";
  });
};

const removeLoader = () => {
  setTimeout(() => {
    const elements = document.querySelectorAll(".overlay, body");
    elements.forEach(element => {
      element.classList.add("loaded");
    });

    const overlayElements = document.querySelectorAll(".overlay");
    overlayElements.forEach(element => {
      element.style.display = "none";
    });
  }, 2000);
};

const setTimer = () => {
  warningTimer.value = setTimeout(warningMessage, 15 * 60 * 1000);
};

const warningMessage = () => {
  f7.dialog.close();
  f7.popup.close();
  f7.view.main.router.navigate({ url: "/lock-screen/" });
  lockScreenEnable();
};

const resetTimer = () => {
  clearTimeout(warningTimer.value);
  setTimer();
};

const lockScreenEnable = async () => {
  try {
    const config = { headers: { "content-type": "multipart/form-data" } };
    await axios.post("/api/lockenabledisable", { lock: 1 }, config);
  } catch (error) {
    console.error("Error:", error);
  }
};

// Lifecycle hooks
onMounted(async () => {
  try {
    const res = await axios.get("/api/checkLogin");
    if (res.data.check_auth) {
      checkLogin.value = true;
      user.value = res.data.user;
      f7.view.main.router.navigate({ url: "/table/" });
    } else {
      f7.view.main.router.navigate({ url: "/login/" });
    }

    setTimeout(() => {
      if (checkLogin.value) {
        getLanguage();
        checkReservation();
      }
    }, 500);

    window.addEventListener("load", () => {
      const elements = document.querySelectorAll(".overlay, body");
      elements.forEach(element => {
        element.classList.add("loaded");
      });

      const overlayElements = document.querySelectorAll(".overlay");
      overlayElements.forEach(element => {
        element.style.display = "none";
      });
    });

    events.forEach(event => {
      window.addEventListener(event, resetTimer);
    });

    if (checkLogin.value) {
      setTimer();
    }
  } catch (error) {
    console.error("Error:", error);
  }
});

onBeforeUnmount(() => {
  events.forEach(event => {
    window.removeEventListener(event, resetTimer);
  });

  clearTimeout(warningTimer.value);
});

// Computed properties
const manager = computed(() => {
  console.log(f7);
  // return this.$route.path === '/'
});
</script>
