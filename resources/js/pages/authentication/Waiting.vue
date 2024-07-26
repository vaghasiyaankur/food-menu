<template>
    <f7-page>
        <div class="login_screen">
            <div class="login_screen_inner">
                <div class="login_image">
                    <div class="login_main_img">
                        <img src="/images/hold_request.png" height="500px" width="500px" />
                    </div>
                    <div class="login_message">Your request for registration is under evaluation!</div>
                    <div class="login_info">
                        In order to register your account, you must be a verified member, Verification is a one-time process.
                        This verification process is necessary because of spammers and fraud.
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>

<script setup>
    import { f7App, f7Page, f7 } from "framework7-vue";
</script>

<style scoped>
    .login_screen {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login_screen_inner {
    text-align: center;
}

.login_image {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.login_main_img img {
    max-width: 100%;
    height: auto;
}

.login_message {
    font-weight: 500;
    font-size: 26px;
    line-height: 31.47px;
    text-align: center;
    margin: 20px 0;
}

.login_info {
    font-size: 16px;
    font-weight: 400;
    max-width: 760px;
    margin: 0 auto;
}
</style>