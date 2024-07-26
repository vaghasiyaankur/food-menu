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
                                            @click="registerDetail('signup', 0)"
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
                                        Restaurant Logo *
                                    </div>
                                    <div class="item-input-wrap">
                                        <input
                                            type="file"
                                            id="logo"
                                            class="padding-left-half"
                                            accept="image/*"
                                            @change="handleRestaurantLogo"
                                        />
                                    </div>
                                    <div v-if="restaurantLogoPreview">
                                        <img :src="restaurantLogoPreview" height="80px" width="80px" alt="" class="restaurant_logo">
                                    </div>
                                </div>
                            </li>
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
                                    </div>
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
                                            v-model="restaurantEmail"
                                            class="padding-left-half"
                                        />
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
                                            @click="registerDetail('restaurant', 1)"
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
</template>

<script setup>
    import { f7App, f7Page, f7 } from "framework7-vue";
    import axios from "axios";
    import { ref } from 'vue';
    import { errorNotification, successNotification } from '../../commonFunction.js';

    const userName = ref("");
    const userEmail = ref("");
    const userPassword = ref("");
    const userMobileNumber = ref("");
    const userConfirmationPassword = ref("");

    const restaurantName = ref("");
    const restaurantEmail = ref("");
    const restaurantAddress = ref("");

    const imageBinaryFile = ref(null);
    const restaurantLogoPreview = ref(null);

    const isRestaurantShow = ref(false);

    const handleRestaurantLogo = (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                restaurantLogoPreview.value = e.target.result;
            };
            reader.readAsDataURL(file);
            imageBinaryFile.value = file;
        }
    }

    const registerDetail = (type, order) => {
        const validations = type === 'signup' ? [
            { condition: !userName.value, message: "Please Enter User Name" },
            { condition: !userEmail.value, message: "Please Enter User Email Address" },
            { condition: !userPassword.value, message: "Please Enter Password" },
            { condition: !userConfirmationPassword.value, message: "Please Re-Enter Password" },
            { condition: !userMobileNumber.value, message: "Please Enter Mobile Number" },
            { condition: !/^\d{10}$/.test(userMobileNumber.value), message: "Mobile Number must be 10 digits" },
            { condition: userPassword.value !== userConfirmationPassword.value, message: "Passwords do not match" }
        ] : [
            { condition: !restaurantLogoPreview.value, message: "Please Select Restaurant Logo" },
            { condition: !restaurantName.value, message: "Please Enter Restaurant Name" },
            { condition: !restaurantEmail.value, message: "Please Enter Restaurant Email" },
            { condition: !restaurantAddress.value, message: "Please Enter Restaurant Location" }
        ];

        for (const { condition, message } of validations) {
            if (condition) return showError(message);
        }

        let formArray = [];
        if (order === 0 || order === 1) {
            
            let signupArray = [];
            let restaurantArray = [];

            signupArray.push({
                'name': userName.value,
                'email': userEmail.value,
                'password': userPassword.value,
                'password_confirmation': userConfirmationPassword.value,
                'mobile_number': userMobileNumber.value,
            });

            if(restaurantName.value && restaurantAddress.value) {
                restaurantArray.push({
                    'name': restaurantName.value,
                    'address': restaurantAddress.value,
                    'email' : restaurantEmail.value
                });
            }

            if (type == 'signup') {
                isRestaurantShow.value = true;
            }

            if (signupArray.length > 0) {
                formArray.push(signupArray);
            }
            if (restaurantArray.length > 0) {
                formArray.push(restaurantArray);
            }

            if(signupArray.length > 0 && restaurantArray.length > 0) {

                const formData = new FormData();
                formData.append('register_detail', JSON.stringify(formArray));
                formData.append('logo', imageBinaryFile.value);
        
                axios.post('/api/sign-up', formData, {
                    headers : {
                        'Content-Type': 'multipart/form-data',
                    }
                })
                .then(response => {
                    if(response.status) {
                        successNotification(response.data.message);
                        f7.view.main.router.navigate({ url: "/restaurant-request/" });
                        resetFormDetail();
                    }
                }).catch((error) => {
                    console.log(error);
                    errorNotification(error.response.data.error);
                });
            }
        }
    }

    const showError = (msg) => {
        errorNotification(msg);
        return true;
    }

    const resetFormDetail = () => {
        userName.value = "";
        userEmail.value = "";
        userPassword.value = "";
        userMobileNumber.value = "";
        userConfirmationPassword.value = "";
        restaurantName.value = "";
        restaurantAddress.value = "";
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
