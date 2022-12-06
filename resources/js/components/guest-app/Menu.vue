<template>

    <f7-sheet
        class="demo-sheet-swipe-to-close"
        style="height:auto; --f7-sheet-bg-color: #fff;"
        backdrop
    >
        <f7-page-content>
        <div class="row">
            <div class="col">
            <div class="border-popup"></div>
            </div>
        </div>
        <i class="f7-icons font-30 close-menu" @click="closePopup">xmark</i>
        <f7-block-title class="text-align-center font-18 text-color-black margin-top-half">Food Menu</f7-block-title>
        <div class="margin">
            <!-- <div class="text-align-center text-color-gray">Select your favourite food <br> and enjoy with family</div> -->
            <div data-pagination='{"el":".swiper-pagination"}' data-space-between="10" data-slides-per-view="5"
            class="swiper swiper-init demo-swiper margin-top margin-bottom" style="height : 120px">
            <div class="swiper-pagination"></div>
            <div class="swiper-wrapper">
                <div class="swiper-slide slide-active">
                <div class="menu-image col">
                    <img src="/images/indian_dish.png" alt="">
                </div>
                <p class="font-13 no-margin text-align-center margin-top-half">Indian</p>
                </div>
                <div class="swiper-slide">
                <div class="menu-image">
                    <img src="/images/chinese_dish.png" alt="">
                </div>
                <p class="font-13 no-margin text-align-center margin-top-half">Chinese</p>
                </div>
                <div class="swiper-slide">
                <div class="menu-image">
                    <img src="/images/panjabi_dish.png" alt="">
                </div>
                <p class="font-13 no-margin text-align-center margin-top-half">Panjabi</p>
                </div>
                <div class="swiper-slide">
                <div class="menu-image">
                    <img src="/images/dessert_dish.png" alt="">
                </div>
                <p class="font-13 no-margin text-align-center margin-top-half">Dessert</p>
                </div>
                <div class="swiper-slide">
                <div class="menu-image">
                    <img src="/images/fast_food_dish.png" alt="">
                </div>
                <p class="font-13 no-margin text-align-center margin-top-half">Fast Food</p>
                </div>
                <div class="swiper-slide">
                <div class="menu-image">
                    <img src="/images/indian_dish.png" alt="">
                </div>
                <p class="font-13 no-margin text-align-center margin-top-half">Indian</p>
                </div>
                <div class="swiper-slide">
                <div class="menu-image">
                    <img src="/images/chinese_dish.png" alt="">
                </div>
                <p class="font-13 no-margin text-align-center margin-top-half">Chinese</p>
                </div>
                <div class="swiper-slide">
                <div class="menu-image">
                    <img src="/images/panjabi_dish.png" alt="">
                </div>
                <p class="font-13 no-margin text-align-center margin-top-half">Panjabi</p>
                </div>
                <div class="swiper-slide">
                <div class="menu-image">
                    <img src="/images/dessert_dish.png" alt="">
                </div>
                <p class="font-13 no-margin text-align-center margin-top-half">Dessert</p>
                </div>
                <div class="swiper-slide">
                <div class="menu-image">
                    <img src="/images/fast_food_dish.png" alt="">
                </div>
                <p class="font-13 no-margin text-align-center margin-top-half">Fast Food</p>
                </div>
            </div>
            </div>
            <div class="position-relative">
            <div class="menu-title"><span>Indian Menu</span></div>
            </div>
            <div class="menu-details margin-top">
            <div class="menu-lists">
                <div class="menu-list">
                <div class="font-18 text-align-center menu-list-title text-color-black"><u>Dosa</u></div>
                <div class="list row margin-half align-items-center">
                    <div class="col-10">
                    <span class="add-favlist">
                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                    </span>
                    </div>
                    <div class="col-70 display-flex">Jini Dosa <span class="dots"></span></div>
                    <div class="col-20">110.00</div>
                </div>
                <div class="list row margin-half align-items-center">
                    <div class="col-10">
                    <span class="add-favlist">
                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart_fill</i>
                    </span>
                    </div>
                    <div class="col-70 display-flex">Cheese Paneer Chilli Dosa <span class="dots"></span></div>
                    <div class="col-20">110.00</div>
                </div>
                <div class="list row margin-half align-items-center">
                    <div class="col-10">
                    <span class="add-favlist">
                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                    </span>
                    </div>
                    <div class="col-70 display-flex">Paneer jini Dosa <span class="dots"></span></div>
                    <div class="col-20">110.00</div>
                </div>
                <div class="list row margin-half align-items-center">
                    <div class="col-10">
                    <span class="add-favlist">
                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart_fill</i>
                    </span>
                    </div>
                    <div class="col-70 display-flex">Pav Bhaji Dosa <span class="dots"></span></div>
                    <div class="col-20">110.00</div>
                </div>
                <div class="list row margin-half align-items-center">
                    <div class="col-10">
                    <span class="add-favlist">
                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart_fill</i>
                    </span>
                    </div>
                    <div class="col-70 display-flex">Pizza Dosa <span class="dots"></span></div>
                    <div class="col-20">110.00</div>
                </div>
                <div class="list row margin-half align-items-center">
                    <div class="col-10">
                    <span class="add-favlist">
                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                    </span>
                    </div>
                    <div class="col-70 display-flex">Masala Dosa <span class="dots"></span></div>
                    <div class="col-20">110.00</div>
                </div>
                <div class="list row margin-half align-items-center">
                    <div class="col-10">
                    <span class="add-favlist">
                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                    </span>
                    </div>
                    <div class="col-70 display-flex">Sada Dosa <span class="dots"></span></div>
                    <div class="col-20">110.00</div>
                </div>
                <div class="list row margin-half align-items-center">
                    <div class="col-10">
                    <span class="add-favlist">
                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                    </span>
                    </div>
                    <div class="col-70 display-flex">Mysore Dosa <span class="dots"></span></div>
                    <div class="col-20">110.00</div>
                </div>
                </div>
                <div class="menu-list">
                <div class="font-18 text-align-center menu-list-title text-black"><u>Gujrati Dish</u></div>
                <div class="list row margin-half align-items-center">
                    <div class="col-10">
                    <span class="add-favlist">
                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart_fill</i>
                    </span>
                    </div>
                    <div class="col-70 display-flex">Rice <span class="dots"></span></div>
                    <div class="col-20">110.00</div>
                </div>
                <div class="list row margin-half align-items-center">
                    <div class="col-10">
                    <span class="add-favlist">
                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                    </span>
                    </div>
                    <div class="col-70 display-flex">Dal <span class="dots"></span></div>
                    <div class="col-20">110.00</div>
                </div>
                <div class="list row margin-half align-items-center">
                    <div class="col-10">
                    <span class="add-favlist">
                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                    </span>
                    </div>
                    <div class="col-70 display-flex">Roti <span class="dots"></span></div>
                    <div class="col-20">110.00</div>
                </div>
                <div class="list row margin-half align-items-center">
                    <div class="col-10">
                    <span class="add-favlist">
                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                    </span>
                    </div>
                    <div class="col-70 display-flex">Pavbhaji <span class="dots"></span></div>
                    <div class="col-20">110.00</div>
                </div>
                <div class="list row margin-half align-items-center">
                    <div class="col-10">
                    <span class="add-favlist">
                        <i class="f7-icons size-22 bg-color-white text-color-red padding-half font-13">heart</i>
                    </span>
                    </div>
                    <div class="col-70 display-flex">Samosa <span class="dots"></span></div>
                    <div class="col-20">110.00</div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </f7-page-content>
    </f7-sheet>
</template>
<script>
import {
  f7BlockTitle,
  f7PageContent,
  f7,
  f7Block,
  f7Sheet
} from 'framework7-vue';
import VueCountdown from '@chenfengyuan/vue-countdown';
import $ from 'jquery';
export default {
    components : {
        f7BlockTitle,
        f7Block,
        f7Sheet,f7PageContent,
        VueCountdown
    },
    methods: {
        closePopup(){
            document.querySelector('.sheet-backdrop').click();
            this.$emit('textChange');
        },
    },
}

</script>

<style scoped>
.border-popup{
    width: 40px;
    height: 5px;
    background: #F3F3F3;
    margin: 12px auto 0;
}
.close-menu{
    position: absolute;
    top: 10px;
    right: 10px;
  }
  .demo-swiper .swiper-slide {
    font-size: 25px;
    font-weight: 300;
    display: block;
    background: #fff;
    color: #000;
  }

  .slide-active .menu-image{
    background: #f33e3e59;
    box-shadow: 0px 1px 3px rgba(255, 127, 87, 0.7);
    border-radius: 7px;
  }

  .menu-image {
    box-sizing: border-box;
    background: #FAF5F2;
    border-radius: 7px;
    display: flex;
    width: 100%;
    height: 100%;
    justify-content: center;
    align-items: center;
  }
  .position-relative{
    position: relative;
  }
  .menu-title,.menu-list-title{
    text-align: center;
    font-size: 18px;
    padding: 0 10px;
  }
  .menu-title::before{
    position: absolute;
    content: '';
    border: 1px dashed #000;
    left: 0;
    width: 100%;
    height: 0px;
    top: 11px;
    z-index: -1;
  }
  .menu-title span{
    background: white;
    padding: 0 10px;
  }
  .add-favlist i{
    box-shadow: 1px 1px 8px rgba(0, 0, 0, 0.15);
    border-radius: 32px;
  }
  .dots{
    flex: 1;
    border-bottom: 2px dotted #000;
    height: 1em;
  }
  .swiper-slide{
    width: 67px;
    height: 67px;
  }
  .menu-lists {
      height: calc(100vh - 430px);
      overflow: auto;
  }
</style>
