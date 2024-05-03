<template>
    <div class="order-summary add-to-cart-section">
        <div class="order_table_details">
            <div class="order_number">
                <Icon name="back" @click="moveToTableView"/>
                Order
                {{ table.order ? '#'+table.order.id : '' }}
            </div>
            <div class="floor-name">{{floorName}}</div>
            <div class="table_number">{{ ' Table No. ' +  table ?.table_number}}</div>
        </div>
        <CartHeader />
    </div>

    <CartProduct 
        :cart-products="cartProducts"
        @increase:quantity="increaseQuantity"
        @decrease:quantity="decreaseQuantity"
        @open:note-popup="openNotePopup"
        @remove:cart-product="removeProduct" 
        :table="table"
        :old-order="oldOrder"
        :open-amount-slider="openAmountSlider"
    />
    <div class="order-bill-wrapper">
        <button :class="openAmountSlider ? 'btn-order-detail-expand' : 'btn-order-detail-collapse'" @click="toggleAmountSlider"></button>
        <div class="order-bill">
            <div class="order-details" :class="{'open' : !openAmountSlider}">
                <div class="order-discount">
                    <p class="no-margin">Discount</p>
                    <p class="no-margin">${{ discount }}</p>
                </div>
                <div class="order-sub_total">
                    <p class="no-margin">Sub Total</p>
                    <p class="no-margin">${{ subTotal }}</p>
                </div>
            </div>
            <hr class="bill-divider">
            <div class="total_bill_amount">
                <div class="total_bill-text">
                    <p class="no-margin">Total Amount</p>
                </div>
                <div class="total_bill-amount">
                    <p class="no-margin">${{ totalAmount }}</p>
                </div>
            </div>
            <hr class="bill-divider">
            <div class="billing-btns grid grid-cols-3">
                <button class="button kot-btn active" @click="createKot(table?.id)">KOT</button>
                <button class="button hold-btn" @click="holdKot(table?.id)">Hold</button>
                <button class="button ebill-btn" @click="oldOrder || cartProducts?.length > 0 ? settleBill(table?.id): ''">Settle & eBill</button>
            </div>
            <div class="bill-details-extend">
                <div class="bill-details-extend-inner"></div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { f7 } from "framework7-vue"
import CartProduct from './CartProduct.vue'
import CartHeader from './CartHeader.vue'
import { ref } from 'vue'
import Icon from '../../components/Icon.vue';

const emit = defineEmits(['increase:quantity', 'decrease:quantity','open:note-popup', 'remove:cart-product', 'create:kot', 'hold:kot']);

const openAmountSlider = ref(true);

const props = defineProps({
    cartProducts: {
        type: Array,
        default: () => []
    },
    table: [Array, Object],
    oldOrder: [Array, Object],
    floorName: String,
    totalAmount: [String, Number],
    subTotal: [String, Number],
    discount: [String, Number],
});


const increaseQuantity = (index, kot, kotIndex, kotProductIndex) => {
    emit('increase:quantity', index, kot, kotIndex, kotProductIndex);
}

const decreaseQuantity = (index, kot, kotIndex, kotProductIndex) => {
    emit('decrease:quantity', index, kot, kotIndex, kotProductIndex);
}

const openNotePopup = (index, kot, kotIndex, kotProductIndex) => {
    emit('open:note-popup', index, kot, kotIndex, kotProductIndex);
}

const removeProduct = (index, kot, kotIndex, kotProductIndex) => {
    emit('remove:cart-product', index, kot, kotIndex, kotProductIndex)
}

const createKot = (tableId) => {
    emit('create:kot', tableId)
}
const holdKot = (tableId) => {
    emit('hold:kot', tableId)
}

const settleBill = () => {
    f7.popup.open(`.settle-save-popup`);
}

const toggleAmountSlider = () => {
    openAmountSlider.value = !openAmountSlider.value
}

const moveToTableView = () => {
    f7.view.main.router.navigate({ url: "/" });
}

</script>