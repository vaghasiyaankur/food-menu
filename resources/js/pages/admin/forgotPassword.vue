<template>
    <f7-page>
        <div class="forgot-password-page">
            <img class="top-left-img" src="/assets/images/seederImages/log_in/top_left_img.png" alt="top-left-img">
            <img class="left-img" src="/assets/images/seederImages/log_in/left_img.png" alt="left-img">
            <img class="bottom-right-img" src="/assets/images/seederImages/log_in/bottom_right_img.png"
                alt="bottom-right-img">
            <div class="fp-outer-wrapper">
                <div class="fp-wrapper">
                    <div class="fp-form">
                        <div class="fp-heading">
                            <h2>Forgot Password?</h2>
                            <p>Please enter your email address to
                                recieve a verication code.</p>
                        </div>
                        <div class="user-detail">
                            <div class="email-input">
                                <h4>Email</h4>
                                <input type="email" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="fp-buttons">
                            <button class="submit-btn">
                                <span>Submit</span>
                            </button>
                        </div>
                        <div class="fp-link">
                            <a class="sign-in" href="#">Return to Sign In</a>
                        </div>
                    </div>
                    <div class="fp-img">
                        <img src="/assets/images/seederImages/log_in/forgot_password-img.png" alt="forgot_password-img">
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