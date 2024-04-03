<template>
    <div class="padding-half order-summary add-to-cart-section">
        <div class="padding">
            <div class="display-flex justify-content-space-between align-items-flex-start">
                <div class="flex-shrink-0 font-16 order_number">Order #10663</div>
                <div class="align-self-center font-16 table_number">Table No. 10</div>
            </div>
            <div class="grid grid-cols-3 grid-gap margin-top">
                <button class="button button-small padding food-received-type button-raised text-transform-capitalize active">Dine In</button>
                <button class="button button-small padding food-received-type text-transform-capitalize">Takeaway</button>
                <button class="button button-small padding food-received-type text-transform-capitalize">Delivery</button>
            </div>
        </div>
    </div>
    <CartProduct />
</template>
<script setup>
import CartProduct from './CartProduct.vue'
</script>