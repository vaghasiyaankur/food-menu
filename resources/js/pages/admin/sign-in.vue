<template>
    <f7-page>
        <div class="sign-in-page">
            <img class="top-left-img" src="/assets/images/seederImages/log_in/top_left_img.png" alt="top-left-img">
            <img class="left-img" src="/assets/images/seederImages/log_in/left_img.png" alt="left-img">
            <img class="bottom-right-img" src="/assets/images/seederImages/log_in/bottom_right_img.png"
                alt="bottom-right-img">
            <div class="sign-in-outer-wrapper">
                <div class="sign-in-wrapper">
                    <div class="sign-in-form">
                        <div class="sign-in-heading">
                            <h2>Sign In</h2>
                            <p>Please sign in to continue</p>
                        </div>
                        <div class="user-detail">
                            <div class="email-input">
                                <h4>Email</h4>
                                <input type="email" placeholder="Enter email">
                            </div>
                            <div class="password-input">
                                <h4>Password</h4>
                                <input type="password" placeholder="Enter password">
                            </div>
                            <span><a href="#">Forgot Password?</a></span>
                        </div>
                        <div class="terms-conditions">
                            <input type="checkbox" name="terms" id="terms" checked>
                            <label for="terms">I agree with the terms & conditions</label>
                        </div>
                        <div class="sign-in-buttons">
                            <button class="sign-in-btn">
                                <span>Sign In</span>
                            </button>
                            <p>OR</p>
                            <button class="guest-btn">
                                <span>As a Guest</span>
                            </button>
                        </div>
                        <div class="sign-up-link">
                            <span>Don’t have an account? <a class="sign-up" href="#">Sign Up</a></span>
                        </div>
                    </div>
                    <div class="sign-in-img">
                        <img src="/assets/images/seederImages/log_in/sign_in-img.png" alt="sign_in-img">
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