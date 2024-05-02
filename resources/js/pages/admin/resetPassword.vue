<template>
    <f7-page>
        <div class="reset-password-page">
            <img class="top-left-img" src="/assets/images/seederImages/log_in/top_left_img.png" alt="top-left-img">
            <img class="left-img" src="/assets/images/seederImages/log_in/left_img.png" alt="left-img">
            <img class="bottom-right-img" src="/assets/images/seederImages/log_in/bottom_right_img.png"
                alt="bottom-right-img">
            <div class="rp-outer-wrapper">
                <div class="rp-wrapper">
                    <div class="rp-form">
                        <div class="rp-heading">
                            <h2>Reset Password</h2>
                            <p>Your new password must be diffrent
                                from previously used password.</p>
                        </div>
                        <div class="user-detail">
                            <div class="new-password-input">
                                <h4>New Password</h4>
                                <input type="password" placeholder="Enter password">
                            </div>
                            <div class="confirm-password-input">
                                <h4>Confirm New Password</h4>
                                <input type="password" placeholder="Enter confirm password">
                            </div>
                        </div>
                        <div class="rp-buttons">
                            <button class="submit-btn">
                                <span>Submit</span>
                            </button>
                        </div>
                    </div>
                    <div class="rp-img">
                        <img src="/assets/images/seederImages/log_in/reset_password-img.png" alt="reset_password-img">
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