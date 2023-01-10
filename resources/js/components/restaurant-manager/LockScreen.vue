<template>
    <f7-page>
        <div class="lock-screen" :style="{background: 'url(' + '\'/images/lock_screen.png\'' + ') no-repeat center/cover'}">
            <div class="lock-screen-main ">
                <div class="lock-screen-inner">
                    <div class="lock-screen-right">
                        <div class="lockscreen-right-heading password_waiting mt-3">
                            <h6 class=" no-margin"><img src="/images/lockimg.png" alt=""></h6>
                            <h1>Enter passcode</h1>
                        </div>
                        <!--======== WRONG PASSCORD TEXT =========-->
                        <div class="lockscreen-right-heading wrong_passcord mt-3 display-none">
                            <h6 class="no-margin-bottom"><img src="/images/wornpinimg.png"></h6>
                            <h1>Wrong Password! Please Enter Right Password</h1>
                        </div>
                        <div id="fields">
                            <div class="grid pin_show">
                                <div class="grid__col numberfield" id="position-1"><span></span></div>
                                <div class="grid__col numberfield" id="position-2"><span></span></div>
                                <div class="grid__col numberfield" id="position-3"><span></span></div>
                                <div class="grid__col numberfield" id="position-4"><span></span></div>
                            </div>
                        </div>
                        <div id="numbers" class="pt-3">
                            <div class="grid">
                                <div class="grid__col grid__col--1-of-3"><button @click="addLockPin(1)" >1</button></div>
                                <div class="grid__col grid__col--1-of-3"><button @click="addLockPin(2)" >2</button></div>
                                <div class="grid__col grid__col--1-of-3"><button @click="addLockPin(3)" >3</button></div>

                                <div class="grid__col grid__col--1-of-3"><button @click="addLockPin(4)" >4</button></div>
                                <div class="grid__col grid__col--1-of-3"><button @click="addLockPin(5)" >5</button></div>
                                <div class="grid__col grid__col--1-of-3"><button @click="addLockPin(6)" >6</button></div>

                                <div class="grid__col grid__col--1-of-3"><button @click="addLockPin(7)" >7</button></div>
                                <div class="grid__col grid__col--1-of-3"><button @click="addLockPin(8)" >8</button></div>
                                <div class="grid__col grid__col--1-of-3"><button @click="addLockPin(9)" >9</button></div>

                                <div class="grid__col grid__col--1-of-3"></div>
                                <!-- <button @click="passwordVerify">OK</button> -->
                                <div class="grid__col grid__col--1-of-3"><button @click="addLockPin(0)" >0</button></div>
                                <div class="grid__col grid__col--1-of-3"><button @click="removeLockPin()" class="delete_text"><i class="f7-icons">delete_left</i></button></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lockscreen_bottom">
                <h2 class="text-color-white no-margin-bottom">{{ dateTime }}</h2>
                <h6 class="text-color-white no-margin">{{ dateFormat() }}</h6>
            </div>
        </div>
    </f7-page>
</template>

<script>
import { f7,f7Page, f7Navbar, f7BlockTitle, f7Block, f7Swiper, f7SwiperSlide} from 'framework7-vue';
import $ from 'jquery';
import axios from 'axios';
import { VueDraggableNext } from 'vue-draggable-next';
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'
import moment from 'moment';


export default {
    name : 'LockScreen',
    data() {
        return {
            pinposition : 0,
            pin: '',
            passcode: 0,
            dateTime : null,
        }
    },
    components : {
        f7,f7Page, f7Navbar, f7BlockTitle, f7Block,f7Swiper,f7SwiperSlide,draggable: VueDraggableNext,Carousel,Slide,Pagination,Navigation
    },
    mounted() {
        this.$root.activationMenu('login');
        this.$root.removeLoader();
    },
    created() {
        this.getusepasscode();
        this.timeformat();
    },
    methods: {
        timeformat: function () {
            this.dateTime = moment().format('hh:mm A');
            setInterval(() => {
                this.dateTime = moment().format('hh:mm A');
            }, 60000);
        },
        dateFormat : function () {
            return moment().format('dddd MMMM d, Y')
        },
         /* verify user passcode */
        passwordVerify() {
            if(this.pin.length == 4 && (parseInt(this.passcode) == parseInt(this.pin))){
                $('.lock-screen').addClass('scale-out-ver-top');
                // var routes = this.$router;
                $(".numberfield").removeClass('number_active');
                this.pinposition = 0;
                this.pin = '';
                setTimeout(function () {
                    f7.view.main.router.navigate({ url: '/' });
                }, 500);
                this.lockScreenDisable();
            }else{
                $(".numberfield").removeClass('number_active');
                this.pinposition = 0;
                this.pin = '';
                $("#fields").addClass('miss');
                $('.password_waiting').addClass('display-none');
                $('.wrong_passcord').removeClass('display-none');
                $('.pin_show').addClass('wrong_password');
                setTimeout(function() {
                    $("#fields").removeClass('miss');
                }, 500);
                setTimeout(function () {
                    $('.wrong_passcord').addClass('display-none');
                    $('.password_waiting').removeClass('display-none');
                    $('.pin_show').removeClass('wrong_password');
                }, 2000);
            }
        },

        /* Pin number set */
        addLockPin(number){

            var element = event.target;
            element.classList.add("number_active");

            setTimeout(function() {
                element.classList.remove("number_active")
            }, 500);

            if(this.pin.length <= 4){
                console.log("here");
                var pos = this.pinposition + 1;
                $("#position-"+pos).addClass('number_active');
                this.position = this.pinposition++;
                let newpin = '' + this.pin + number;
                this.pin = newpin;
                if(newpin.length == 4){
                    this.passwordVerify();
                }
            }
        },

        /* Remove last number of the pin*/
        removeLockPin() {
            if(this.pin.length > 0){

                var pos = this.pinposition;
                $("#position-"+pos).removeClass('number_active');
                this.position = this.pinposition--;

                let newpin = this.pin.slice(0, -1);
                this.pin = newpin;

            }
        },

        /* Lock Screen Disable for backend side */
        lockScreenDisable(){
            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }
            axios.post('/api/lockenabledisable',{lock : 0},config)
            .then(res => {
            }).catch(err => {
            })
        },
        /* User Passcode catch from database */
        getusepasscode(){
            axios.get('/api/getuserpasscode')
            .then(res => {
                this.passcode = res.data.passcode;
            })
            .catch(err => {
                console.log(err);
            });
        },
    }
}
</script>
<style scoped>
.miss {
    -webkit-animation: miss .8s ease-out 1;
    animation: miss .8s ease-out 1;
    animation-iteration-count: 2;
}

@keyframes miss {
    0% {
        -webkit-transform: translate(0, 0);
        transform: translate(0, 0);
    }

    10% {
        -webkit-transform: translate(-25px, 0);
        transform: translate(-25px, 0);
    }

    20% {
        -webkit-transform: translate(25px, 0);
        transform: translate(25px, 0);
    }

    30% {
        -webkit-transform: translate(-20px, 0);
        transform: translate(-20px, 0);
    }

    40% {
        -webkit-transform: translate(20px, 0);
        transform: translate(20px, 0);
    }

    50% {
        -webkit-transform: translate(-10px, 0);
        transform: translate(-10px, 0);
    }

    60% {
        -webkit-transform: translate(10px, 0);
        transform: translate(10px, 0);
    }

    70% {
        -webkit-transform: translate(-5px, 0);
        transform: translate(-5px, 0);
    }

    80% {
        -webkit-transform: translate(5px, 0);
        transform: translate(5px, 0);
    }

    100% {
        -webkit-transform: translate(0, 0);
        transform: translate(0, 0);
    }
}
/************* LOCK SCREEEN CSS *******************/

.lock-screen .lock-screen-right #fields .wrong_password .numberfield span{
    border: 1px solid #F33E3E;
}
.lock-screen{
    height:100vh;
    overflow: hidden;
    position: relative;
    z-index: 1100;
}
/*.lock-screen::before{
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    background-image: url("/images/lock_screen.png");
    background-repeat: no-repeat;
    background-position: center center;
    background-size: 100% 100%;
}*/
.lock-screen-main{
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    transform: translate(-50%, -50%);
    text-align: center;
    overflow: hidden;
}
.lock-screen .lock-screen-left .font--50{
    font-size:50px;
}
.lock-screen .lock-screen-right .lockscreen-right-heading h1{
    font-weight: 500;
    font-size: 21px;
    line-height: 25px;
    color: #FFFFFF;
}
.lock-screen .lock-screen-right #fields {
    margin: 10px auto 65px;
    position: relative;
    display: block;
}
.lock-screen .lock-screen-right .grid {
    list-style: none;
    margin-left: -20px;
}
.lock-screen .lock-screen-right .grid__col {
    box-sizing: border-box;
    display: inline-block;
    margin-right: -0.25em;
    min-height: 1px;
    padding-left: 15px;
    vertical-align: top;
    }
.lock-screen .lock-screen-right .grid__col--1-of-4{
    width: 25%;
}
.lock-screen .lock-screen-right .grid__col--1-of-3{
    width:33.33%;
}
.lock-screen .lock-screen-right #fields .numberfield span {
    height: 13px;
    width: 13px;
    border: 1px solid #FFFFFF;
    border-radius: 100%;
    position: relative;
    display: inline-block;
    text-align: center;
}
.lock-screen .lock-screen-right #fields .numberfield.number_active span{
    background-color:#FFFFFF;
}

.lock-screen .lock-screen-right #numbers {
    max-width: 256px;
    margin: 0 auto;
    position: relative;
    display: block;
    -webkit-transition: all 1s ease-out;
    -moz-transition: all 1s ease-out;
    transition: all 1s ease-out;
    opacity: 1;
}
.lock-screen .lock-screen-right #numbers button{
    width: 67px;
    height: 67px;
    margin-bottom: 25px;
    background: rgba(209, 136, 144, 0.54);
    font-weight: 500;
    font-size: 21px;
    line-height: 25px;
    border: none;
    color: #FFFFFF;
    border-radius: 50%;
    opacity: 1;
    outline: 0;
}
.lock-screen .lock-screen-right #numbers button.delete_text{
    background-color: transparent;
}

/*.lock-screen .lock-screen-right #numbers button.number_active {
    background-color: #0ab39c;
    box-shadow: 0 5px #0f5e58;
    transform: translateY(-4px);
}*/
.lockscreen_bottom{
    position: absolute;
    bottom: 45px;
    left: 60px;
}
.lockscreen_bottom h2{
    font-weight: 500;
    font-size: 50px;
    line-height: 61px;
    color: #FFFFFF;
}
.lockscreen_bottom h6{
    font-weight: 500;
    font-size: 26px;
    line-height: 31px;
    color: #FFFFFF;
}
.lock-screen button.number_active{
    background-color: #bf646e85 !important;
}
.lock-screen button.number_active-state{
    background-color: transparent !important;
}
.lock-screen .lock-screen-right .lockscreen-right-heading.wrong_passcord h1{
    color: #F33E3E;
}
/************** RESPONSIVE CSS ****************/
/*@media screen and (max-width:820px){
    .lock-screen{
        height: 98vh;
    }
}*/
</style>

