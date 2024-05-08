<template>
    <f7-page>
        <div class="card digital_menu_card digital_menu_page elevation-2">
            <div class="no-padding digital_menu_banner-outer">
                <div class="digital_menu_banner">
                    <h3 class="no-margin"> Food Menu </h3>
                </div>
                <p class="no-margin">Select your favourite food and enjoy with family</p>
            </div>
            <DigitalProduct />
        </div>
    </f7-page>
</template>

<script setup>
import { f7Page, f7 } from 'framework7-vue';
import DigitalProduct from "../../../components/Product/DigitalProduct.vue";
</script>