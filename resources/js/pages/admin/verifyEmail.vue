<template>
    <f7-page>
        <div class="varify-email-page">
            <img class="top-left-img" src="/assets/images/seederImages/log_in/top_left_img.png" alt="top-left-img">
            <img class="left-img" src="/assets/images/seederImages/log_in/left_img.png" alt="left-img">
            <img class="bottom-right-img" src="/assets/images/seederImages/log_in/bottom_right_img.png"
                alt="bottom-right-img">
            <div class="ve-outer-wrapper">
                <div class="ve-wrapper">
                    <div class="ve-form">
                        <div class="ve-heading">
                            <h2>Enter OTP</h2>
                            <p>Please enter the 4 digit code sent to
                                johndoe@gmail.com</p>
                        </div>
                        <div class="email-input">
                            <input type="text" name="1" id="1" placeholder="2" maxlength="1">
                            <input type="text" name="2" id="2" placeholder="3" maxlength="1">
                            <input type="text" name="3" id="3" placeholder="5" maxlength="1">
                            <input type="text" name="4" id="4" placeholder="8" maxlength="1">
                        </div>
                        <div class="ve-link">
                            <a class="resend" href="#">Resend Code</a>
                        </div>
                        <div class="ve-buttons">
                            <button class="submit-btn">
                                <span>Submit</span>
                            </button>
                        </div>
                    </div>
                    <div class="ve-img">
                        <img src="/assets/images/seederImages/log_in/enter_otp-img.png" alt="enter_otp-img">
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>

<script setup>
import {
    f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Breadcrumbs,
    f7BreadcrumbsItem, f7BreadcrumbsSeparator, f7BreadcrumbsCollapsed,
} from 'framework7-vue';
</script>