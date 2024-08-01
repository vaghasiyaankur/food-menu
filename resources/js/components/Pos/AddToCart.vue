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
                <div class="order-sub_total">
                    <p class="no-margin">Sub Total</p>
                    <p class="no-margin">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }} {{ subTotal }}</p>
                </div>
                <div class="order-discount">
                    <p class="no-margin">
                        Discount
                        <i  
                            v-if="parseFloat(discount) > 0"
                            class="icon f7-icons font-16 remove-discount-icon" 
                            @click="removeDiscountValue()">minus </i>
                    </p>
                    <p class="no-margin">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }} {{ discount ? discount : '0.00' }}</p>
                </div>
            </div>
            <hr class="bill-divider">
            <div class="total_bill_amount">
                <div class="total_bill-text">
                    <p class="no-margin">Payable Amount</p>
                </div>
                <div class="total_bill-amount">
                    <p class="no-margin">{{  currentCurrencyData ? currentCurrencyData.currency_symbol :  '₹'  }} {{ totalAmount }}</p>
                </div>
            </div>
            <hr class="bill-divider">
            <div class="billing-btns grid grid-cols-3">
                <button class="button kot-btn active" @click="createKot(table?.id)">KOT</button>
                <button class="button hold-btn" @click="holdKot(table?.id)">Hold</button>
                <button class="button e-bill-btn" @click="settleBill(table?.id)">Settle & eBill</button>
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
import { ref, inject } from 'vue'
import Icon from '../../components/Icon.vue';
import { errorNotification } from "../../commonFunction";

const emit = defineEmits(['increase:quantity', 'decrease:quantity','open:note-popup', 'remove:cart-product', 'create:kot', 'hold:kot']);

const currentCurrencyData = inject('currentCurrencyData');
const defaultFillUpSettleMentData = inject('defaultFillUpSettleMentData')
const openAmountSlider = ref(true);
const removeDiscount = inject('removeDiscount');
const saveData = inject('saveData');
const table = inject('table');

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
    personDetailFillUp : {
        type: Boolean,
        default: false
    },
    noOfPersonFillUp : {
        type: Boolean,
        default: false
    },
    assignDeliveryFillUp : {
        type: Boolean,
        default: false
    }
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
    if(!props.personDetailFillUp || !props.noOfPersonFillUp || !props.assignDeliveryFillUp) {
        errorNotification("Please complete the user form before create kot.");
        return;
    } else {
        emit('create:kot', tableId)
    }
}
const holdKot = (tableId) => {
    emit('hold:kot', tableId)
}

const settleBill = () => {
    // f7.popup.open(`.split-payment-popup`);
    if (props.oldOrder || props.cartProducts?.length > 0) {
        const message = props.cartProducts?.length > 0 
            ? "Please create KOT for items on hold or remove them from hold." 
            : "Proceed to settle or save the order.";
        props.cartProducts?.length > 0 
            ? errorNotification(message) 
            : openSettlementSavePopup();
    } else {
        errorNotification("There are no items in the order.");
    }
}

const toggleAmountSlider = () => {
    openAmountSlider.value = !openAmountSlider.value
}

const moveToTableView = () => {
    f7.view.main.router.navigate({ url: "/" });
}

const openSettlementSavePopup = () => {
    defaultFillUpSettleMentData();
    f7.popup.open(`.settle-save-popup`);
}

const removeDiscountValue = () => {
    saveData(table.value.id);
    removeDiscount();
}
</script>