<template>
    <f7-page>
        <div class="waiting_time">
            <div class="card elevation-2">
                <div class="card-content card-content-padding h-100">
                    <div class="countdown_text text-align-center">
                        <h3>Waiting Time</h3>
                        <p class="no-margin">Lorem Ipsum is simply dummy text of the 
                            printing and typesetting industry</p>
                    </div>
                    <div class="text-align-center margin-top card_count"> 
                        <div class="countdown_section position-relative margin-horizontal h-100 margin-top" :class="{ 'display-none' : display }">
                            <div style="background : url('/images/dots.png')" class="countdown__image">
                                <img src="/images/clock_img.png" alt="">
                                <!-- <i class="f7-icons padding-half margin-bottom close-countdown font-13" @click="display = true">xmark</i> -->
                                <vue-countdown :time="60 * 60 * 1000" v-slot="{ hours, minutes, seconds }">
                                    <p class="no-margin-bottom margin-top font-30">{{ hours }} : {{ minutes }} : {{ seconds }}</p>
                                </vue-countdown>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>

<script>
import { f7Page} from 'framework7-vue';
import VueCountdown from '@chenfengyuan/vue-countdown';
export default {
    name : 'Waiting',
    components: {
        f7Page,
        VueCountdown
    },
}
</script>
<style scoped>
.countdown_section{
    background: #f88f721a;
    box-shadow: 0px 1px 9px #f88f721a;
    border-radius: 7px;
    padding: 18px;
    position: relative;
}
.countdown_section .countdown__image{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    flex-direction: column;
}

.close-countdown{
    position: absolute;
    top: 5px;
    right: 5px;
    background: white;
    border-radius: 50%;
    padding: 5px !important;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 20px;
    height: 20px;
}
.font-30{
    font-weight: 500;
    font-size: 30px;
    line-height: 36px;
    color: #38373D;
}
.font-13{
    font-size: 13px !important;
}
.waiting_time .card{
    height: calc(100vh - 35px);
}
.waiting_time .card .card-content{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.h-100{
    height: 100%;
}
.card_count{
    width: 100%;
    max-width: 400px;
    height: 100%;
    max-height: 200px;
    margin: 0 auto;
}
.countdown_text{
    width: 40%;
    margin: 0 auto;
}
.countdown_text h3{
    font-weight: 600;
    font-size: 20px;
    line-height: 24px;
    color: #38373D;
}
.countdown_text p{
    font-weight: 500;
    font-size: 15px;
    line-height: 18px;
    text-align: center;
    color: #555555;

}
@media screen and (max-width:820px){
    .waiting_time .card{
        height: calc(100vh - 400px);
    }
}
</style>