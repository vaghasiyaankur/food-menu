<template>
    <f7-page class="page-favourite bg-color-white"> 
        <f7-navbar
        large
        transparent
        title="My Favourite"
        back-link="Back"
        >
        <div class="card favourites-card">
            <a class="link icon-only" href="/favourites/">
              <i class="f7-icons size-22 text-color-red padding-half font-18">heart_fill</i>
            </a>
          </div>
        </f7-navbar>
        <div class="margin-left margin-right">
            <div class="text-align-center text-color-gray">
                <p> See your favorite food list and place order </p>
            </div>
            <div class="card cart-list">
                <div class="card-content card-content-padding no-padding-bottom">
                    <div class="row">
                        <div class="col-20 padding-top">
                            <i class="f7-icons size-22 padding-icon font-18 bg-color-red text-color-white fav-list-remove-icon">minus</i>
                        </div>
                        <div class="col-80 padding-bottom border-bottom row">
                            <div class="col-75 border-right">
                                <p>Jini Dosa</p>
                            </div>
                            <div class="col-25">
                                <p>110.00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content card-content-padding no-padding-bottom">
                    <div class="row">
                        <div class="col-20 padding-top">
                            <i class="f7-icons size-22 padding-icon font-18 bg-color-red text-color-white fav-list-remove-icon">minus</i>
                        </div>
                        <div class="col-80 padding-bottom border-bottom row">
                            <div class="col-75 border-right">
                                <p>Cheese Paneer Chilli Dosa Chilli Dosa</p>
                            </div>
                            <div class="col-25">
                                <p>110.00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content card-content-padding no-padding-bottom">
                    <div class="row">
                        <div class="col-20 padding-top">
                            <i class="f7-icons size-22 padding-icon font-18 bg-color-red text-color-white fav-list-remove-icon">minus</i>
                        </div>
                        <div class="col-80 padding-bottom border-bottom row">
                            <div class="col-75 border-right">
                                <p>Jini Dosa</p>
                            </div>
                            <div class="col-25">
                                <p>110.00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content card-content-padding no-padding-bottom">
                    <div class="row">
                        <div class="col-20 padding-top">
                            <i class="f7-icons size-22 padding-icon font-18 bg-color-red text-color-white fav-list-remove-icon">minus</i>
                        </div>
                        <div class="col-80 padding-bottom border-bottom row">
                            <div class="col-75 border-right">
                                <p>Cheese Paneer Chilli Dosa Chilli Dosa</p>
                            </div>
                            <div class="col-25">
                                <p>110.00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content card-content-padding">
                    <div class="row">
                        <div class="col-20 padding-top">
                            <i class="f7-icons size-22 padding-icon font-18 bg-color-red text-color-white fav-list-remove-icon">minus</i>
                        </div>
                        <div class="col-80 padding-bottom border-bottom row">
                            <div class="col-75 border-right">
                                <p>Jini Dosa</p>
                            </div>
                            <div class="col-25">
                                <p>110.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>

<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block } from 'framework7-vue';
import $ from 'jquery';

export default {
    name : 'Favourite',
  components: {
    f7Page,
    f7Navbar,
    f7BlockTitle,
    f7Block,
  },
  mounted() {
    $('.page-content').addClass('padding-top-page-content');
  },
};
</script>

<style scoped>
    .favourites-card{
        width: 30px;
        height: 30px;
    }
    .icon-only{
        width :100% !important;
        height: 100% !important;
    }
    .border-bottom{
        border-bottom: 1px solid #EAEAEA;
    }
    .padding-icon{
        padding : 3px;
    }
    .border-right{
        border-right: 1px solid #F3F3F3 !important;
    }
</style>

<style>
    .cart-list{
        box-shadow: 1px 2px 5px 2px rgb(0 0 0 / 20%);
    }
    .padding-top-page-content{
        padding-top : 50px !important;
    }
    .navbar-large .title{
        opacity : 1 !important;
        left :0 !important;
    }
    .title-large{
        display: none !important;
    }
    .fav-list-remove-icon{
        border-radius: 50%;
    }
</style>