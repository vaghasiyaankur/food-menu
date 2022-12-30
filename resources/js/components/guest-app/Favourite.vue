<template>
    <f7-page class="page-favourite bg-color-white">
        <div class="nav-bar">
            <f7-navbar
            class="navbar-menu text-color-white"
            large
            transparent
            :title="$root.trans.my_favourite"
            :back-link="$root.trans.back"
            >
                <div class="favourites-card">
                    <a class="link icon-only" href="/favourites/">
                        <i class="f7-icons size-22 text-color-white padding-half font-18">heart_fill</i>
                    </a>
                </div>
            </f7-navbar>
        </div>
        <div class="margin-left margin-right">
            <div class="text-align-center text-color-gray">
                <p>{{ $root.trans.favourite_title }}</p>
            </div>
            <div class="card cart-list">
                <div class="card-content card-content-padding">
                    <div v-if="wishlistData.length != 0">
                        <div class="row padding-top" v-for="wishlist in wishlistData" :key="wishlist">
                            <div class="col-20 padding-top" @click="removeWishlist(wishlist.id)">
                                <i class="f7-icons size-22 padding-icon font-18 bg-color-dark-orange text-color-white fav-list-remove-icon">minus</i>
                            </div>
                            <div class="col-80 padding-bottom border-bottom row">
                                <div class="col-75 border-right">
                                    <p>{{ wishlist.product_language[0].name }}</p>
                                </div>
                                <div class="col-25">
                                    <p>{{ wishlist.price.toFixed(2) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="no_order_text text-align-center" v-else>
                        <img src="/images/Empty-pana 1.png" alt="" style="width:100%">
                        <p>{{ $root.trans.favourite_error }}</p>
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>

<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block } from 'framework7-vue';
import $ from 'jquery';
import { useCookies } from "vue3-cookies";
import axios from "axios";

export default {
    name : 'Favourite',
    components: {
        f7Page,
        f7Navbar,
        f7BlockTitle,
        f7Block,
    },
    data() {
        return {
            wishlist: [],
            wishlistData : [],
        }
    },
    setup() {
        const { cookies } = useCookies()
        return { cookies };
    },
    beforeCreate() {
        this.$root.addLoader();
    },
    created() {
        this.wishlist = JSON.parse(this.cookies.get('wishlist'));
        this.getwishlistData();
        this.$root.removeLoader();
    },
    methods: {
        getwishlistData() {
            axios.post('/api/get-wishlist', { wishlist: this.wishlist })
            .then((res) => {
                this.wishlistData = res.data;
            });
        },
        removeWishlist(id) {
            if (this.wishlist.includes(id)) {
                var data = [];
                this.wishlist.forEach(ele => {
                    if (ele != id) {
                        data.push(ele);
                    }
                });
                this.wishlist = data;
            }
            this.cookies.set("wishlist", JSON.stringify(this.wishlist), 60 * 60 * 24);
            this.wishlist = JSON.parse(this.cookies.get('wishlist'));
            this.getwishlistData();
        }
    },
};
</script>

<style scoped>
    .nav-bar{
        background: #38373D;
        border-radius: 8px 8px 0px 0px;
        transform: matrix(1, 0, 0, -1, 0, 0);
    }

    .navbar-menu{
        transform: matrix(1, 0, 0, -1, 0, 0);
        height: 56px;
    }
    .page-content {
        padding-top: 0px !important;
    }
    .favourites-card{
        width: 30px;
        height: 30px;
    }
    .icon-only{
        width :100% !important;
        height: 100% !important;
    }
    .card{
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
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
    .text-color-dark-orange{
        color: #F33E3E !important;
    }
    .bg-color-dark-orange{
        background: #F33E3E !important;
    }
</style>

<style>
    .nav-bar{
        width : 100%;
    }
    .navbar-inner.sliding{
        justify-content: space-between !important;
    }
    .navbar .title{
        left: -11px !important;
        font-weight: 600 !important;
        font-size: 19px !important;
        line-height: 23px !important;
    }
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

    .navbar a.link{
        color: #fff !important;
        font-weight: 500;
        font-size: 15px;
        line-height: 18px;
        padding : 0 !important;
    }
    .no_order_text p {
        font-size: 20px;
        line-height: 24px;
        font-weight: 600;
        color: #38373d;
    }
</style>
