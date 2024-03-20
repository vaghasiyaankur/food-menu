<template>
    <div  class="page_not_found">
        <div class="not_found_header">
            <h3 class="text-align-center no-margin text-color-white padding">Page not found</h3>
        </div>
        <div class="not_found_img">
            <img src="/images/404-page.png">
        </div>
    </div>
</template>
<style>
/*========PAGE NOT FOUND CSS ========*/
.page_not_found .not_found_img{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
}
.page_not_found .not_found_img img{
    width: 100%;
    height: auto;
}
.page_not_found{
    position: relative;
    height: 100%;
    width: 100%;
    background-color: #f33e3e08;
}
.not_found_header{
    background: #38373D;
    border-radius: 0px 0px 8px 8px;
}
</style>
