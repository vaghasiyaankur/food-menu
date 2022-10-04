<template>
<f7-page color="bg-color-white" @page:beforeremove="onPageBeforeRemove" @page:beforeout="onPageBeforeOut">
    <div class="row align-items-center">
      <div class="menu">
        <div class="menu-inner bg-color-white color-black">
            <div class="menu-item menu-item-dropdown bg-color-white">
                <div class="card row menu-item-content bg-color-white no-margin-top no-margin-bottom">
                    <div class="col">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                      <path d="M6.11595 8.79832C6.09029 8.67002 5.20648 4.256 5.17845 4.11613C5.13466 3.89728 4.94226 3.73975 4.71882 3.73975H3.78132C3.55788 3.73975 3.36548 3.89728 3.3217 4.11613C3.29323 4.25837 2.40851 8.67689 2.3842 8.79829C2.33341 9.05187 2.49807 9.29853 2.75191 9.34922C3.00576 9.39994 3.25273 9.23547 3.30348 8.98192L3.6031 7.48547H4.89704L5.19666 8.98195C5.24745 9.23563 5.49451 9.39997 5.74823 9.34925C6.00207 9.29853 6.16673 9.05187 6.11595 8.79832ZM3.7906 6.54904L4.1656 4.67618H4.33454L4.70954 6.54904H3.7906Z" fill="#7A8BA0"/>
                      <path d="M6.11595 8.79832C6.09029 8.67002 5.20648 4.256 5.17845 4.11613C5.13466 3.89728 4.94226 3.73975 4.71882 3.73975H3.78132C3.55788 3.73975 3.36548 3.89728 3.3217 4.11613C3.29323 4.25837 2.40851 8.67689 2.3842 8.79829C2.33341 9.05187 2.49807 9.29853 2.75191 9.34922C3.00576 9.39994 3.25273 9.23547 3.30348 8.98192L3.6031 7.48547H4.89704L5.19666 8.98195C5.24745 9.23563 5.49451 9.39997 5.74823 9.34925C6.00207 9.29853 6.16673 9.05187 6.11595 8.79832ZM3.7906 6.54904L4.1656 4.67618H4.33454L4.70954 6.54904H3.7906Z" fill="black" fill-opacity="0.2"/>
                      <path d="M13.625 7.4855H12.2188V7.01729C12.2188 6.75871 12.0089 6.54907 11.75 6.54907C11.4911 6.54907 11.2812 6.75871 11.2812 7.01729V7.4855H9.875C9.61612 7.4855 9.40625 7.69514 9.40625 7.95372C9.40625 8.2123 9.61612 8.42193 9.875 8.42193H9.98844C10.2555 9.28383 10.6577 9.94538 11.1002 10.4755C10.74 10.8046 10.3756 11.0744 10.0509 11.3338C9.84878 11.4954 9.816 11.79 9.97775 11.9919C10.1396 12.1939 10.4346 12.2265 10.6366 12.065C10.963 11.8042 11.3543 11.5143 11.75 11.1516C12.146 11.5145 12.538 11.8049 12.8634 12.065C13.0656 12.2266 13.3606 12.1938 13.5223 11.9919C13.684 11.79 13.6512 11.4953 13.4491 11.3338C13.1253 11.075 12.7604 10.8049 12.3998 10.4755C12.8423 9.94538 13.2445 9.28383 13.5116 8.42193H13.625C13.8839 8.42193 14.0938 8.2123 14.0938 7.95372C14.0938 7.69514 13.8839 7.4855 13.625 7.4855ZM11.75 9.78741C11.4508 9.41221 11.1816 8.96438 10.9787 8.41881H12.5213C12.3184 8.96438 12.0492 9.41221 11.75 9.78741Z" fill="#7A8BA0"/>
                      <path d="M13.625 7.4855H12.2188V7.01729C12.2188 6.75871 12.0089 6.54907 11.75 6.54907C11.4911 6.54907 11.2812 6.75871 11.2812 7.01729V7.4855H9.875C9.61612 7.4855 9.40625 7.69514 9.40625 7.95372C9.40625 8.2123 9.61612 8.42193 9.875 8.42193H9.98844C10.2555 9.28383 10.6577 9.94538 11.1002 10.4755C10.74 10.8046 10.3756 11.0744 10.0509 11.3338C9.84878 11.4954 9.816 11.79 9.97775 11.9919C10.1396 12.1939 10.4346 12.2265 10.6366 12.065C10.963 11.8042 11.3543 11.5143 11.75 11.1516C12.146 11.5145 12.538 11.8049 12.8634 12.065C13.0656 12.2266 13.3606 12.1938 13.5223 11.9919C13.684 11.79 13.6512 11.4953 13.4491 11.3338C13.1253 11.075 12.7604 10.8049 12.3998 10.4755C12.8423 9.94538 13.2445 9.28383 13.5116 8.42193H13.625C13.8839 8.42193 14.0938 8.2123 14.0938 7.95372C14.0938 7.69514 13.8839 7.4855 13.625 7.4855ZM11.75 9.78741C11.4508 9.41221 11.1816 8.96438 10.9787 8.41881H12.5213C12.3184 8.96438 12.0492 9.41221 11.75 9.78741Z" fill="black" fill-opacity="0.2"/>
                      <path d="M14.5938 3.27154H7.83122L7.63028 1.66144C7.5425 0.959989 6.94263 0.43103 6.23491 0.43103H1.40625C0.630844 0.43103 0 1.06115 0 1.83568V12.1676C0 12.9422 0.630844 13.5723 1.40625 13.5723H5.35884L5.55722 15.1824C5.64484 15.8824 6.24472 16.4128 6.95262 16.4128H14.5938C15.3692 16.4128 16 15.7827 16 15.0081V4.67618C16 3.90166 15.3692 3.27154 14.5938 3.27154ZM1.40625 12.6358C1.14778 12.6358 0.9375 12.4258 0.9375 12.1676V1.83568C0.9375 1.5775 1.14778 1.36746 1.40625 1.36746H6.23491C6.47081 1.36746 6.67078 1.54376 6.7 1.77743C6.76794 2.32168 7.98775 12.096 8.05513 12.6358H1.40625ZM6.46012 14.8443L6.30341 13.5723H7.56103L6.46012 14.8443ZM15.0625 15.0081C15.0625 15.2663 14.8522 15.4764 14.5938 15.4764H7.15231L8.93681 13.4146C9.02816 13.3116 9.06909 13.175 9.05022 13.0392L7.94809 4.20797H14.5938C14.8522 4.20797 15.0625 4.41801 15.0625 4.67618V15.0081Z" fill="#7A8BA0"/>
                      <path d="M14.5938 3.27154H7.83122L7.63028 1.66144C7.5425 0.959989 6.94263 0.43103 6.23491 0.43103H1.40625C0.630844 0.43103 0 1.06115 0 1.83568V12.1676C0 12.9422 0.630844 13.5723 1.40625 13.5723H5.35884L5.55722 15.1824C5.64484 15.8824 6.24472 16.4128 6.95262 16.4128H14.5938C15.3692 16.4128 16 15.7827 16 15.0081V4.67618C16 3.90166 15.3692 3.27154 14.5938 3.27154ZM1.40625 12.6358C1.14778 12.6358 0.9375 12.4258 0.9375 12.1676V1.83568C0.9375 1.5775 1.14778 1.36746 1.40625 1.36746H6.23491C6.47081 1.36746 6.67078 1.54376 6.7 1.77743C6.76794 2.32168 7.98775 12.096 8.05513 12.6358H1.40625ZM6.46012 14.8443L6.30341 13.5723H7.56103L6.46012 14.8443ZM15.0625 15.0081C15.0625 15.2663 14.8522 15.4764 14.5938 15.4764H7.15231L8.93681 13.4146C9.02816 13.3116 9.06909 13.175 9.05022 13.0392L7.94809 4.20797H14.5938C14.8522 4.20797 15.0625 4.41801 15.0625 4.67618V15.0081Z" fill="black" fill-opacity="0.2"/>
                      </svg> 
                    </div>
                    <div class="col text-align-right">
                      <svg xmlns="http://www.w3.org/2000/svg" width="7" height="4" viewBox="0 0 7 4" fill="none">
                        <path d="M3.28896 3.29113C3.40587 3.40683 3.59413 3.40683 3.71104 3.29113L6.01255 1.01322C6.20304 0.824685 6.06953 0.5 5.80151 0.5H1.19849C0.93047 0.5 0.796961 0.824685 0.987452 1.01322L3.28896 3.29113Z" fill="#7A8BA0"/>
                        <path d="M3.28896 3.29113C3.40587 3.40683 3.59413 3.40683 3.71104 3.29113L6.01255 1.01322C6.20304 0.824685 6.06953 0.5 5.80151 0.5H1.19849C0.93047 0.5 0.796961 0.824685 0.987452 1.01322L3.28896 3.29113Z" fill="black" fill-opacity="0.2"/>
                      </svg>
                    </div>
                </div>
                <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                    <div class="card menu-dropdown-content bg-color-white">
                        <a href="#" class="menu-dropdown-link menu-close justify-content-center text-color-black">Gujarati</a>
                        <a href="#" class="menu-dropdown-link menu-close justify-content-center text-color-black">English</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="registranstion font-18">Registration</div>
      <div class="card">
        <a class="link icon-only" href="/favourites/">
          <i class="f7-icons size-22 text-color-red padding-half font-18">heart</i>
        </a>
      </div>
    </div>
    <div class="margin-left margin-right register-from">
      <div class="text-align-center text-color-gray">
        <p> Please fill in the form below. <br> We will contact you as soon as possible </p>
      </div>
      <div class="text-align-center padding-top">
        <img src="/images/registerImage.png" alt="">
      </div>
      <div>
        <form class="list" id="my-form">
          <div class="item-content item-input">
            <div class="item-inner">
              <div class="item-title item-label font-16 text-color-lightBlue">Enter your name</div>
              <div class="item-input-wrap">
                <input type="text" name="name" class="padding" placeholder="Enter Your name" />
              </div>
            </div>
          </div>
          <div class="item-content item-input">
            <div class="item-inner">
              <div class="item-title item-label font-16 text-color-lightBlue">Enter your phone number</div>
              <div class="item-input-wrap">
                <input type="text" name="number" class="padding" placeholder="Enter your phone number" />
              </div>
            </div>
          </div>
          <div class="item-content item-input">
            <div class="item-inner">
              <div class="item-title item-label font-16 text-color-lightBlue">Enter your family member member</div>
              <div class="item-input-wrap">
                <input type="text" name="member" class="padding" placeholder="5 family member" />
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="text-align-center">
        <a class="link text-underline text-color-blue" href="javascript:;">Check Time</a>
        <div class="countdown_section" :style="{ 'display' : display}">
          <i class="f7-icons size-22 text-color-blue padding-half">alarm</i>
          <p class="no-margin font-30">01:25:10</p>
        </div>
      </div>      
    </div>
    <div class="padding bottom-bar">
        <div class="row justify-content-start">
          <div class="col bottom-button margin-right">
            <f7-button class="button bg-color-white register-button button-raised text-color-blue button-large text-transform-capitalize" @click="register">Register</f7-button>
          </div>
          <div class="col bottom-button">
            <f7-button class="button bg-color-white register-button button-raised text-color-blue button-large text-transform-capitalize" fill sheet-open=".demo-sheet-swipe-to-close">Menu</f7-button>
          </div>
        </div>
      </div>
    <f7-sheet
    class="demo-sheet-swipe-to-close"
    style="height:auto; --f7-sheet-bg-color: #fff;"
    swipe-to-close
    backdrop
  >
    <f7-page-content>
      <div class="row">
        <div class="col">
          <div class="border-popup"></div>
        </div>
      </div>
      <i class="f7-icons font-30 close-menu" @click="closePopup">xmark</i>
      <f7-block-title class="text-align-center font-18 text-color-black">Food Menu</f7-block-title>
      <div class="margin">
        <div class="text-align-center text-color-gray">Select your favourite food <br> and enjoy with family</div>
        <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" data-slides-per-view="5"
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
              <div class="font-18 text-align-center menu-list-title"><u>Dosa</u></div>
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
              <div class="font-18 text-align-center menu-list-title"><u>Gujrati Dish</u></div>
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
</f7-page>
</template>

<script>
import $ from "jquery";
import {
  f7Page,
  f7Navbar,
  f7BlockTitle,
  f7PageContent,
  f7,
  f7Block,
  f7Row,
  f7Col,
  f7Button,
  f7Menu,
  f7MenuItem,
  f7MenuDropdown,
  f7MenuDropdownItem,
  f7Sheet
} from 'framework7-vue';
import Framework7 from 'framework7/lite/bundle';
import { onMounted } from 'vue';
export default {
  components : {
      f7Page,
      f7Navbar,
      f7BlockTitle,
      f7Block,
      f7Row,
      f7Col,
      f7Button,
      f7Menu,
      f7MenuItem,
      f7MenuDropdown,
      f7MenuDropdownItem,
      f7Sheet,f7PageContent
  },
  mounted() {
    $('.navbar-bg').remove();
  },
  data() {
    return {
      display : 'none',
      app : Framework7,
    }
  },
  methods: {
    register() {
      f7.dialog.confirm('', () => {
        f7.dialog.alert('Success!');
        setTimeout(() => {          
          $('.dialog-title').html("<img src='/images/success.png'>");
          $('.dialog-button').addClass('col button button-raised button-large text-transform-capitalize');
          $('.dialog-button').addClass('active');
          $('.dialog-button').css('width','50%');
        }, 200);
      });
      $('.dialog-title').text("Are you confirm to register?");
      $('.dialog-button').addClass('col button button-raised button-large text-transform-capitalize');
      $('.dialog-button').eq(1).addClass('active');

    },
    onPageBeforeOut() {
      const self = this;
      // Close opened sheets on page out
      f7.sheet.close();
    },
    onPageBeforeRemove() {
      const self = this;
      // Destroy sheet modal when page removed
      if (self.sheet) self.sheet.destroy();
    },
    closePopup(){
      document.querySelector('.sheet-backdrop').click();
    }
  },
}
</script>
<style scoped>
  .menu-dropdown-center:before , .menu-dropdown-center:after, .dialog-inner:after{
    content: none !important;
  }
  .bg-color-transparent{
    background-color: transparent !important;
  }
  .menu-dropdown-content{
    top : -8px !important;
    left : 60% !important;
  }
  
  .registranstion{
    color: #394C65;
  }
  .text-color-lightBlue{
    color: #7A8BA0 !important;
  }
  .list .item-inner:after{
    content: none !important;
  }
  .list input[type='text'], .list input[type='password'], .list input[type='search'], .list input[type='email'], .list input[type='tel'], .list input[type='url'], .list input[type='date'], .list input[type='month'], .list input[type='datetime-local'], .list input[type='time'], .list input[type='number'], .list select {
    background: #F7FAFF !important;
    border-radius: 10px !important;
  }
  .text-underline{
    text-decoration: underline;
  }
  .countdown_section{
    background: linear-gradient(71.02deg, rgb(48 131 255 / 15%) -23.38%, rgb(15 179 255 / 15%) 113.05%);
    box-shadow: 0px 1px 9px rgba(87, 184, 255, 0.6);
    border-radius: 7px;
    padding: 18px;
  }
  .text-color-Blue{
    color: #3083FF !important;
  }
  .text-transform-capitalize{
    text-transform: capitalize;
  }
  /* .bottom-bar{
    position: sticky;
    bottom: 0;
    z-index: 10;
    background: white;
  } */

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
    background: linear-gradient(71.02deg, rgba(48, 131, 255,0.35) -23.38%, rgba(15, 179, 255,0.35) 113.05%);
    box-shadow: 0px 1px 9px rgba(87, 184, 255, 0.7);
    border-radius: 7px;
  }

  .menu-image {
    box-sizing: border-box;
    width: 67px;
    height: 67px;
    background: #F7FAFF;
    border-radius: 7px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .position-relative{
    position: relative;
  }
  .menu-title,.menu-list-title{
    color: #394C65;
    text-align: center;
    font-size: 18px;
    padding: 0 10px;
  }
  .menu-title::before{
    position: absolute;
    content: '';
    border: 1px dashed #7A8BA0;
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
    border-bottom: 2px dotted #394C65;
    height: 1em;
  }
  .menu-lists{
    height: 100%;
    max-height: 450px;
    overflow: auto;
  }
  .list{
    color : #394C65;
  }
  .register-from{
    height: calc(100vh - 150px);
    overflow-y: auto;
  }
</style>
<style>
  .dialog-inner:after{
    content: none !important;
  }
   .dialog-button{
    margin: 0 5px !important;
    border-radius: var(--f7-dialog-border-radius) !important;
  }
   .dialog-buttons{
    margin : 0 5px 15px;    
  }
  .register-button:hover , .register-button:active, .active{
    background: linear-gradient(71.02deg, #3083FF -23.38%, #0FB3FF 113.05%)!important;
    color: #fff !important;
  }
  .font-13{
    font-size : 13px !important;
  }
  .font-18{
    font-size : 18px !important;
  }
  .font-16{
    font-size : 16px !important;
  }
  .font-30{
    font-size : 30px;
  }
</style>