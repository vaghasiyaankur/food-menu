<template>
    <div class="search__img text-align-center">
        <img src="/images/Empty-pana 1.png" alt="serach">
    </div>
    <div class="no_order_text text-align-center" v-if="title">
        <p class="no-margin">{{title}}</p>
    </div>
</template>
<script setup>
const props = defineProps({
    title : String
});
</script>
<style>
.no_order{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: calc(100% - 110px);
}
.no_order_text p{
    font-size: 20px;
    line-height: 24px;
    font-weight: 600;
    color: #38373D;
}
.search__img img{
    width: 100%;
    max-height: 320px;
    height: 100%;
    object-fit: cover;
}
</style>
