<template>
    <f7-page>
        <div class="sign-up-page">
            <img class="top-left-img" src="/assets/images/seederImages/log_in/top_left_img.png" alt="top-left-img">
            <img class="left-img" src="/assets/images/seederImages/log_in/left_img.png" alt="left-img">
            <img class="bottom-right-img" src="/assets/images/seederImages/log_in/bottom_right_img.png"
                alt="bottom-right-img">
            <div class="sign-up-outer-wrapper">
                <div class="sign-up-wrapper">
                    <div class="sign-up-form">
                        <div class="sign-up-heading">
                            <h2>Sign Up</h2>
                            <p>Please fill the details and create account</p>
                        </div>
                        <div class="user-detail">
                            <div class="name-input">
                                <h4>Name</h4>
                                <input type="text" placeholder="Enter name">
                            </div>
                            <div class="email-input">
                                <h4>Email</h4>
                                <input type="email" placeholder="Enter email">
                            </div>
                            <div class="password-input">
                                <h4>Password</h4>
                                <input type="password" placeholder="Enter password">
                            </div>
                        </div>
                        <div class="sign-up-buttons">
                            <button class="sign-up-btn">
                                <span>Sign Up</span>
                            </button>
                            <p>OR</p>
                            <button class="guest-btn">
                                <span>As a Guest</span>
                            </button>
                        </div>
                        <div class="sign-up-link">
                            <span>Already have a account? <a class="sign-in" href="#">Sign In</a></span>
                        </div>
                    </div>
                    <div class="sign-up-img">
                        <img src="/assets/images/seederImages/log_in/sign_up-img.png" alt="sign_up-img">
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