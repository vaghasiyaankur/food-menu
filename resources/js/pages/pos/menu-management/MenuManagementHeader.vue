<template>
<div class="card_header">
    <div class="row padding-left padding-right padding-top-half align-items-center">
        <div class="col-100 large-50 medium-40">
            <h3>
                <span class="page_heading"> {{ title }}</span>
            </h3>
        </div>
        <div class="col-100 large-50 medium-60">
            <div class="row align-items-center">
                <div class="col">
                    <div class="item-content item-input">
                        <div class="item-inner">
                            <div class="col-100 large-60 medium-65">
                                <form class="searchbar combo-search-bar">
                                    <input type="search" placeholder="Search" class="height_40">
                                    <i class="searchbar-icon"></i>
                                    <span class="input-clear-button"></span>
                                    <span class="searchbar-disable-button">Cancel</span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col padding-left-half padding-right-half">
                    <button class="button button-raised bg-dark text-color-white padding height_40 active" data-popup=".categoryPopup" @click="handleButtonClick"><i class="f7-icons font-22 margin-right-half">plus_square</i> Add {{ title }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script setup>
import { defineProps , defineEmits} from 'vue';

const props = defineProps({
    addButtonTitle      :  String,
    title               :  String,
});

const emit = defineEmits(['update:search', 'blank:action', 'add:popup', 'update:PopupTitle']);

const handleSearch = (event) => {
    emit('update:search', event.target.value);
};

const handleButtonClick = () => {
    emit('update:PopupTitle', 'Add '+props.title)
    emit('blank:action');
    emit('add:popup');
};
</script>

<style scoped>
    .digital_menu_card{
        margin-top: 70px;
        height: calc(100vh - 132px);
    }
    .font-13{
        font-size: 13px;
        font-weight: 500;
        line-height: 18px;
    }
    .height-40 {
        height: 40px;
    }
    .nav-botton {
        height: 100%;
    }



    .bg-dark {
        background: #38373D;
    }


    .menu-dropdown-link{
        border-bottom: 1px solid #EFEFEF;
    }
    .bg-pink {
        background: #F33E3E;
    }

    .text-color-pink {
        color: #F33E3E;
    }

    .font-22 {
        font-size: 22px;
    }



    /*<!-- =======MENU CSS ========== -->*/
    .demo-swiper .swiper-slide {
        font-size: 25px;
        font-weight: 300;
        display: block;
        background: #fff;
        color: #000;
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
        left: 10%;
        width: 80%;
        height: 0px;
        top: 11px;
        z-index: 1;
      }
      .menu-title span{
        background: white;
        padding: 0 10px;
        position: relative;
        z-index: 2;
      }
      /*.add-favlist i{
        box-shadow: 1px 1px 8px rgba(0, 0, 0, 0.15);
        border-radius: 32px;
        height: 30px;
        width: 30px;
      }*/
      .dots{
        flex: 1;
        border-bottom: 2px dotted #000;
        height: 1em;
      }
      .swiper-slide{
        width: 67px;
        height: 67px;
      }
      .menu-lists{
        height: 100%;
        max-height: 390px;
        overflow: auto;
      }
      .swiper-horizontal>.swiper-pagination-bullets, .swiper-pagination-bullets.swiper-pagination-horizontal, .swiper-pagination-custom, .swiper-pagination-fraction{
        bottom: 0;
      }
      .digital_menu_card .menu-details{
        width: 82%;
        margin: 0 auto;
      }
    @media screen and (max-width:820px) {
        .header-links {
            width: 100%;
        }

    }
</style>

<style>
    .slide-active .menu-image{
        background: #f33e3e59 !important;
        box-shadow: 0px 1px 3px #f33e3e59;
        border-radius: 7px;
      }

    .swiper-pagination-bullet-active{
        background:#F33E3E !important;
      }
</style>
