<template>
    <f7-page class="page-favourite bg-color-white"> 
        <f7-navbar
        large
        transparent
        title="My Favourite"
        back-link="Back"
        >
        <div class="card">
            <a class="link icon-only" href="/favourites/">
              <i class="f7-icons size-22 text-color-red padding-half font-18">heart_fill</i>
            </a>
          </div>
        </f7-navbar>
        <div class="margin-left margin-right">
            <div class="text-align-center text-color-gray">
                <p> Please fill in the form below. <br> We will contact you as soon as possible </p>
            </div>
        </div>
    </f7-page>
</template>

<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block } from 'framework7-vue';

export default {
    name : 'Favourite',
  components: {
    f7Page,
    f7Navbar,
    f7BlockTitle,
    f7Block,
  },
};
</script>

<style scoped>
    .card{
        width: 30px;
        height: 30px;
    }
    .icon-only{
        width :100% !important;
        height: 100% !important;
    }
</style>

<style>
    .navbar-large .title{
        opacity : 1 !important;
        left :0 !important;
    }
    .title-large{
        display: none !important;
    }
</style>