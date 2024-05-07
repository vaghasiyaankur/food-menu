<template>
    <f7-page>
        <div class="login_screen">
            <div class="login_screen_inner">
                <div class="login_image">
                    <div class="login_main_img">
                        <img src="/images/login_screen.png" />
                    </div>
                    <div class="login_tab_img display-none">
                        <img src="/images/login_smallbg.png" alt="" />
                    </div>
                </div>
                <div class="login_form">
                    <div class="login_title text-align-center">
                        <h3>Login</h3>
                    </div>
                    <div
                        class="list no-hairlines login_inputs margin-top-half no-margin-bottom"
                    >
                        <ul>
                            <li
                                class="item-content item-input no-padding-left padding-bottom"
                            >
                                <div class="item-inner no-padding-right">
                                    <div class="item-title item-label">
                                        Email Address*
                                    </div>
                                    <div class="item-input-wrap">
                                        <input
                                            type="email"
                                            placeholder="Email Address"
                                            v-model="email"
                                            class="padding-left-half"
                                        />
                                        <span class="input-clear-button"></span>
                                        <!-- ====== ERROR SYMBOL ========= -->
                                        <span
                                            class="input_error_symbol display-none"
                                            ><i class="f7-icons font-18"
                                                >exclamationmark_triangle</i
                                            ></span
                                        >
                                    </div>
                                    <!-- ======= ERROR MESSAGE =======-->
                                    <p
                                        class="error_message no-margin-bottom display-none"
                                    >
                                        Please enter valid Email Address
                                    </p>
                                </div>
                            </li>
                            <li
                                class="item-content item-input no-padding-left padding-bottom"
                            >
                                <div class="item-inner no-padding-right">
                                    <div class="item-title item-label">
                                        Password*
                                    </div>
                                    <div class="item-input-wrap">
                                        <input
                                            type="password"
                                            placeholder="Enter your password"
                                            v-model="password"
                                            class="padding-left-half"
                                        /><span
                                            class="input-clear-button"
                                        ></span>
                                    </div>
                                </div>
                            </li>
                            <li
                                class="item-content item-input no-padding-left padding-bottom"
                            >
                                <div class="item-inner no-padding-right">
                                    <div class="item-input-wrap">
                                        <button
                                            class="button button-fill button border_radius_10 button-raised bg_red text-color-white button-large text-transform-capitalize"
                                            @click="loginAuthUser"
                                        >
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>

<script setup>
import { f7Page } from "framework7-vue";
import axios from "axios";
import { ref } from 'vue';
import { errorNotification } from '../../commonFunction.js';

const email = ref('');
const password = ref('');

const loginAuthUser = () => {
    if (!email.value) {
        errorNotification("Please enter your email");
        return;
    } else if (!password.value) {
        errorNotification("Please enter your password");
        return;
    }
    axios
        .post("/api/login-user", {
            email: email.value,
            password: password.value,alreadyLogin
        })
        .then((res) => {
            if (res.data.success) {
                location.reload();
            } else {
                errorNotification(res.data.error);
            }
        });
}

</script>

<style scoped>
.border_radius_10 {
    border-radius: 10px;
}
.bg_red {
    background-color: #f33e3e;
}
/* ======= ERROR MESSAGE =======*/
.error_message {
    font-weight: 400;
    font-size: 12px;
    line-height: 15px;
    color: #f33e3e;
}
.input_error_symbol {
    color: #f33e3e;
    font-size: 18px;
    position: absolute;
    right: 6px;
    top: 27%;
}
.login_screen .login_screen_inner {
    position: relative;
}
.login_screen .login_screen_inner .login_image img {
    height: 100%;
    width: 100%;
}
.login_screen .login_screen_inner .login_form {
    position: absolute;
    top: 58%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    max-width: 457px;
    background: #ffffff;
    box-shadow: 0px 2px 11px rgb(166 107 107 / 25%);
    border-radius: 20px;
    padding: 25px;
}
.login_screen .login_form .item-label {
    font-weight: 400;
    font-size: 16px;
    line-height: 19px;
    color: #555555;
    margin-bottom: 10px;
}

.simple-list li:after,
.links-list a:after,
.list .item-inner:after {
    background-color: transparent !important;
}
.login_screen .login_form .item-input-wrap {
    background: #fafafa;
    border-radius: 10px;
}
.login_screen .login_form .item-input-wrap input {
    padding-right: 24px;
}
.login_screen .login_form .login_title h3 {
    font-weight: 500;
    font-size: 26px;
    line-height: 31px;
    color: #f33e3e;
    border-bottom: 1px solid #d0d0d0;
    padding-bottom: 20px;
    margin-top: 0;
}
.login_screen input::placeholder {
    color: #999999 !important;
    font-weight: 400 !important;
    font-size: 16px;
    line-height: 19px;
}
.login_screen .input-clear-button {
    right: 6px !important;
}
@media screen and (max-width: 991px) {
    .login_screen .login_screen_inner .login_form {
        top: 56%;
        max-width: 404px;
    }
    .login_tab_img {
        display: block !important;
    }
    .login_main_img {
        display: none;
    }
}
</style>
