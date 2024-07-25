<template>
    <f7-app ref="app" v-bind="f7Params">
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
                    <div class="login_form" v-if="!isRestaurantShow">
                        <div class="login_title text-align-center">
                            <h3>Sign Up</h3>
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
                                            Name *
                                        </div>
                                        <div class="item-input-wrap">
                                            <input
                                                type="text"
                                                placeholder="Enter Name"
                                                v-model="userName"
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
                                            Email Address*
                                        </div>
                                        <div class="item-input-wrap">
                                            <input
                                                type="email"
                                                placeholder="Email Address"
                                                v-model="userEmail"
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
                                                v-model="userPassword"
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
                                        <div class="item-title item-label">
                                            Confirm Password*
                                        </div>
                                        <div class="item-input-wrap">
                                            <input
                                                type="password"
                                                name="password_confirmation"
                                                placeholder="Re-Enter your password"
                                                v-model="userConfirmationPassword"
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
                                        <div class="item-title item-label">
                                            Mobile Number*
                                        </div>
                                        <div class="item-input-wrap">
                                            <input
                                                type="number"
                                                name="mobile_number"
                                                placeholder="Enter Mobile Number"
                                                v-model="userMobileNumber"
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
                                                class="button button-fill button border_radius_10 button-raised bg_red text-color-white button-large text-transform-capitalize height_40"
                                                @click="registerDetail('signup')"
                                            >
                                                Continue
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="login_form" v-else>
                        <div class="login_title text-align-center">
                            <h3>Restaurant Detail</h3>
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
                                            Name *
                                        </div>
                                        <div class="item-input-wrap">
                                            <input
                                                type="text"
                                                placeholder="Enter Restaurant Name"
                                                v-model="restaurantName"
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
                                            Please enter valid restaurant name
                                        </p>
                                    </div>
                                </li>
                                <li
                                    class="item-content item-input no-padding-left padding-bottom"
                                >
                                    <div class="item-inner no-padding-right">
                                        <div class="item-title item-label">
                                            Restaurant Address*
                                        </div>
                                        <div class="item-input-wrap">
                                            <input
                                                type="text"
                                                placeholder="Restaurant Address"
                                                v-model="restaurantAddress"
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
                                            Please enter restaurant address
                                        </p>
                                    </div>
                                </li>
                                <li
                                    class="item-content item-input no-padding-left padding-bottom"
                                >
                                    <div class="item-inner no-padding-right">
                                        <div class="item-input-wrap">
                                            <button
                                                class="button button-fill button border_radius_10 button-raised bg_red text-color-white button-large text-transform-capitalize height_40"
                                                @click="registerDetail('restaurant')"
                                            >
                                                Continue
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
    </f7-app>
</template>

<script setup>
    import { f7App, f7Page, f7 } from "framework7-vue";
    import axios from "axios";
    import { ref,reactive } from 'vue';
    import { errorNotification, successNotification } from './commonFunction.js';

    const authId = ref(null);

    const userName = ref("");
    const userEmail = ref("");
    const userPassword = ref("");
    const userMobileNumber = ref("");
    const userConfirmationPassword = ref("");

    const restaurantName = ref("");
    const restaurantAddress = ref("");
    const restaurantTimeZone = ref("");

    const isLoggedIn = ref(false);
    const isRestaurantShow = ref(false);

    // Reactive data
    const f7Params = reactive({
        id: "io.framework7.testapp",
        theme: "auto",
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

    const registerDetail = (type) => {
        if(type == 'signup') {
            if(!userName.value) {
                errorNotification("Please Enter User Name");
                return;
            } else if(!userEmail.value) {
                errorNotification("Please Enter User Email Address");
                return;
            } else if(!userPassword.value) {
                errorNotification("Please Enter Password");
                return;
            } else if(!userConfirmationPassword.value) {
                errorNotification("Please Re-Enter Password");
                return;
            } else if(!userMobileNumber.value) {
                errorNotification("Please Enter Mobile Number");
                return;
            } else if (!/^\d{10}$/.test(userMobileNumber.value)) {
                errorNotification("Mobile Number must be 10 digits");
                return;
            } else if (userPassword.value !== userConfirmationPassword.value) {
                errorNotification("Passwords do not match");
                return;
            }
        } else {

        }

        const formData = new FormData();
        formData.append('type', type);
        
        if(type == 'signup') {
            formData.append('name', userName.value);
            formData.append('email', userEmail.value);
            formData.append('password', userPassword.value);
            formData.append('password_confirmation', userConfirmationPassword.value);
            formData.append('mobile_number', userMobileNumber.value);
        } else {
            formData.append('name', restaurantName.value);
            formData.append('address', restaurantAddress.value);
            formData.append('user_id', authId.value);
        }

        axios.post('/api/sign-up', formData)
            .then(response => {
                if(response.status) {

                    successNotification(response.data.message);

                    if(response && response.type && response.type == 'restaurant') {
                        authId.value = null;
                        isRestaurantShow.value = false;
                    } else {
                        authId.value = response.data.user;
                        isRestaurantShow.value = true;
                    }
                    resetFormDetail(type);
                }
            }).catch((error) => {
                errorNotification(error);
            });
    }

    const resetFormDetail = (type) => {
        if(type == 'signup') {
            userName.value = "";
            userEmail.value = "";
            userPassword.value = "";
            userMobileNumber.value = "";
            userConfirmationPassword.value = "";
        } else {
            restaurantName.value = "";
            restaurantAddress.value = "";
            restaurantTimeZone.value = "";
        }
    }

    const redirectToRegister = () => {
        if(!isLoggedIn.value) {
            window.location.href = "signup";
        }
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
