<template>
    <div class="order-summary add-to-cart-section">
        <div class="order_table_details">
            <div class="order_number">Order {{ table.order ? '#'+table.order.id : '' }}</div>
            <div class="table_number">Table No. {{ table ?.table_number }}</div>
        </div>
        <div class="dine-options grid grid-cols-3">
            <button class="button button-small food-received-type button-raised active">Dine In</button>
            <button class="button button-small food-received-type">Takeaway</button>
            <button class="button button-small food-received-type">Delivery</button>
        </div>
        <div class="order-specific-options grid">
            <button class="button button-small order-option tooltip button-raised active" data-popup="#due_btn_Popup"
                @click="f7.popup.open(`.due_btn_Popup`)">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M18.5359 14.0798L18.3129 14.2424L18.5707 14.3411C22.0141 15.6588 24.4653 18.9973 24.4653 22.8974C24.4653 24.5254 23.1407 25.85 21.5128 25.85H9.10256C7.47464 25.85 6.15 24.5254 6.15 22.8974C6.15 18.9973 8.60124 15.6588 12.0447 14.3411L12.3024 14.2424L12.0794 14.0798C10.7086 13.0801 9.81665 11.4627 9.81665 9.64102C9.81665 6.6134 12.2801 4.15 15.3077 4.15C18.3353 4.15 20.7987 6.6134 20.7987 9.64102C20.7987 11.4627 19.9067 13.0801 18.5359 14.0798ZM15.3077 5.54232C13.0475 5.54232 11.209 7.38087 11.209 9.64102C11.209 11.9012 13.0475 13.7398 15.3077 13.7398C17.5678 13.7398 19.4064 11.9012 19.4064 9.64102C19.4064 7.38087 17.5678 5.54232 15.3077 5.54232ZM9.10256 24.4577H21.5128C22.3733 24.4577 23.0731 23.7579 23.0731 22.8974C23.0731 18.6153 19.5898 15.132 15.3077 15.132C11.0257 15.132 7.54232 18.6154 7.54232 22.8974C7.54232 23.7579 8.24211 24.4577 9.10256 24.4577Z"
                        stroke-width="0.3" />
                </svg>
                <span class="tooltiptext">Due</span>
            </button>
            <button class="button button-small order-option tooltip" data-popup="#no_of_person_btn_Popup"
                @click="f7.popup.open(`.no_of_person_btn_Popup`)">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M25.9458 13.858C26.8243 13.2407 27.406 12.2138 27.406 11.0563C27.406 9.16275 25.8746 7.63129 23.981 7.63129C22.0875 7.63129 20.556 9.16275 20.556 11.0563C20.556 12.2138 21.1318 13.2407 22.0162 13.858C21.2624 14.1192 20.5738 14.5229 19.9921 15.0452C19.1907 14.3626 18.2469 13.8402 17.2141 13.5316C18.4666 12.7718 19.3095 11.3887 19.3095 9.8157C19.3095 7.4176 17.3684 5.47656 14.9703 5.47656C12.5722 5.47656 10.6312 7.42354 10.6312 9.8157C10.6312 11.3887 11.4681 12.7718 12.7266 13.5316C11.7056 13.8402 10.7736 14.3567 9.97824 15.0274C9.39652 14.5169 8.71983 14.1192 7.97784 13.864C8.85635 13.2466 9.43807 12.2197 9.43807 11.0622C9.43807 9.16869 7.90661 7.63723 6.01306 7.63723C4.11951 7.63723 2.58805 9.16869 2.58805 11.0622C2.58805 12.2197 3.16383 13.2466 4.04828 13.864C1.69173 14.6772 0 16.915 0 19.5446V19.9364C0 19.9483 0.0118718 19.9601 0.0237436 19.9601H7.28334C7.24179 20.2866 7.21805 20.625 7.21805 20.9633V21.3669C7.21805 23.1121 8.63079 24.5248 10.3759 24.5248H19.5766C21.3217 24.5248 22.7345 23.1121 22.7345 21.3669V20.9633C22.7345 20.625 22.7107 20.2866 22.6692 19.9601H29.9763C29.9881 19.9601 30 19.9483 30 19.9364V19.5446C29.9881 16.9091 28.3023 14.6713 25.9458 13.858ZM21.5057 11.0504C21.5057 9.68511 22.6157 8.5751 23.981 8.5751C25.3463 8.5751 26.4563 9.68511 26.4563 11.0504C26.4563 12.3978 25.37 13.496 24.0285 13.5256H23.9335C22.5861 13.5019 21.5057 12.4037 21.5057 11.0504ZM11.5691 9.8157C11.5691 7.94589 13.0886 6.42631 14.9584 6.42631C16.8283 6.42631 18.3478 7.94589 18.3478 9.8157C18.3478 11.6202 16.9292 13.0982 15.1543 13.1992H14.7626C12.9877 13.0982 11.5691 11.6202 11.5691 9.8157ZM3.51998 11.0504C3.51998 9.68511 4.63 8.5751 5.99525 8.5751C7.36051 8.5751 8.47052 9.68511 8.47052 11.0504C8.47052 12.3978 7.38425 13.496 6.04274 13.5256H5.94776C4.60625 13.5019 3.51998 12.4037 3.51998 11.0504ZM7.44954 19.0045H0.961615C1.22873 16.4758 3.36565 14.4932 5.95964 14.4754H6.03087C7.26553 14.4813 8.39335 14.9384 9.26593 15.6804C8.41116 16.6064 7.77602 17.7461 7.44954 19.0045ZM21.7729 21.3669C21.7729 22.5838 20.7816 23.5751 19.5647 23.5751H10.3641C9.14721 23.5751 8.15592 22.5838 8.15592 21.3669V20.9633C8.15592 17.2771 11.1001 14.2617 14.7626 14.1548C14.8279 14.1608 14.8991 14.1608 14.9644 14.1608C15.0297 14.1608 15.1009 14.1608 15.1662 14.1548C18.8287 14.2617 21.7729 17.2771 21.7729 20.9633V21.3669ZM22.4792 19.0045C22.1528 17.752 21.5295 16.6301 20.6806 15.7041C21.5592 14.9443 22.6989 14.4872 23.9454 14.4754H24.0166C26.6106 14.4932 28.7475 16.4758 29.0146 19.0045H22.4792Z"
                        stroke-width="0.3" />
                </svg>
                <span class="tooltiptext">No. of Person</span>
            </button>
            <button class="button button-small order-option tooltip" data-popup="#notes_btn_Popup"
                @click="f7.popup.open(`.notes_btn_Popup`)">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.7369 24.6711H8.35571C7.55318 24.6704 6.78374 24.3512 6.21627 23.7837C5.64879 23.2163 5.32964 22.4468 5.32886 21.6443V8.3557C5.32886 6.68651 6.68651 5.32886 8.35571 5.32886H17.8201C19.4893 5.32886 20.847 6.68651 20.847 8.3557V12.1577C20.847 12.3339 20.917 12.5029 21.0416 12.6275C21.1662 12.7521 21.3352 12.8221 21.5114 12.8221C21.6876 12.8221 21.8566 12.7521 21.9812 12.6275C22.1058 12.5029 22.1758 12.3339 22.1758 12.1577V8.3557C22.1758 5.95416 20.2217 4 17.8201 4H8.35571C7.20086 4.00117 6.09365 4.46045 5.27705 5.27705C4.46045 6.09365 4.00117 7.20086 4 8.3557V21.6443C4 24.0458 5.95416 26 8.35571 26H11.7369C11.9131 26 12.0821 25.93 12.2067 25.8054C12.3313 25.6808 12.4013 25.5118 12.4013 25.3356C12.4013 25.1594 12.3313 24.9904 12.2067 24.8657C12.0821 24.7411 11.9131 24.6711 11.7369 24.6711Z"
                        fill="#38373D" stroke="white" stroke-width="0.25" />
                    <path
                        d="M18.642 9.8324C18.642 9.65618 18.572 9.48718 18.4473 9.36258C18.3227 9.23797 18.1537 9.16797 17.9775 9.16797H8.20007C8.02386 9.16797 7.85486 9.23797 7.73025 9.36258C7.60565 9.48718 7.53564 9.65618 7.53564 9.8324C7.53564 10.0086 7.60565 10.1776 7.73025 10.3022C7.85486 10.4268 8.02386 10.4968 8.20007 10.4968H17.9775C18.1537 10.4968 18.3227 10.4268 18.4473 10.3022C18.572 10.1776 18.642 10.0086 18.642 9.8324ZM8.20007 14.3358C8.02386 14.3358 7.85486 14.4058 7.73025 14.5304C7.60565 14.655 7.53564 14.824 7.53564 15.0002C7.53564 15.1764 7.60565 15.3454 7.73025 15.47C7.85486 15.5946 8.02386 15.6646 8.20007 15.6646H15.7628C15.939 15.6646 16.108 15.5946 16.2326 15.47C16.3572 15.3454 16.4272 15.1764 16.4272 15.0002C16.4272 14.824 16.3572 14.655 16.2326 14.5304C16.108 14.4058 15.939 14.3358 15.7628 14.3358H8.20007ZM11.7813 19.5035H8.20081C8.02459 19.5035 7.85559 19.5735 7.73099 19.6981C7.60639 19.8228 7.53638 19.9918 7.53638 20.168C7.53638 20.3442 7.60639 20.5132 7.73099 20.6378C7.85559 20.7624 8.02459 20.8324 8.20081 20.8324H11.7813C11.9576 20.8324 12.1266 20.7624 12.2512 20.6378C12.3758 20.5132 12.4458 20.3442 12.4458 20.168C12.4458 19.9918 12.3758 19.8228 12.2512 19.6981C12.1266 19.5735 11.9576 19.5035 11.7813 19.5035ZM25.2929 15.4454L23.6658 13.8197C23.1667 13.3192 22.2948 13.3199 21.7958 13.8197L13.596 22.018C13.351 22.2622 13.2118 22.5928 13.2084 22.9386L13.1899 24.5835C13.1862 24.9423 13.3236 25.2796 13.5775 25.5343C13.8278 25.7846 14.1585 25.9212 14.5114 25.9212H14.5269L16.1725 25.9027C16.5195 25.899 16.8458 25.7617 17.0931 25.5159L25.2929 17.3161C25.54 17.0675 25.6788 16.7312 25.6788 16.3807C25.6788 16.0302 25.54 15.6939 25.2929 15.4454ZM16.1548 24.5739L14.5188 24.599L14.535 22.9578L22.7252 14.7588L24.3524 16.3763L16.1548 24.5739Z"
                        stroke-width="0.25" />
                </svg>
                <span class="tooltiptext">Note</span>
            </button>
            <button class="button button-small order-option tooltip" data-popup="#waiter_btn_Popup"
                @click="f7.popup.open(`.waiter_btn_Popup`)">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M23.7906 17.2084L19.5549 19.2963C19.5909 18.7392 19.3198 18.1897 18.8149 17.889L17.2081 16.9312C16.6277 16.5855 15.9648 16.403 15.2892 16.4029H13.1164C12.1151 16.4029 11.1739 16.7927 10.4661 17.5007L9.27511 18.6918V18.4936C9.27511 17.6204 8.56465 16.9101 7.69156 16.9101H4.58354C3.71045 16.9101 3 17.6204 3 18.4936V24.5377C3 25.411 3.71045 26.1212 4.58354 26.1212H7.69151C8.5646 26.1212 9.27506 25.411 9.27506 24.5377V23.9233L9.81171 24.385C10.4931 24.9712 11.3621 25.2936 12.2609 25.2939H17.3942C18.1819 25.2939 18.9372 25.0516 19.5785 24.5932L25.6233 20.2702C26.5212 19.6283 26.631 18.3317 25.8478 17.5481C25.3052 17.0057 24.4784 16.8687 23.7906 17.2084ZM8.51625 24.5377C8.51625 24.9923 8.14628 25.3624 7.69151 25.3624H4.58354C4.12877 25.3624 3.75881 24.9923 3.75881 24.5377V18.4937C3.75881 18.0391 4.12877 17.669 4.58354 17.669H7.69151C8.14628 17.669 8.51625 18.0391 8.51625 18.4937V24.5377ZM25.182 19.653L19.1372 23.976C18.6255 24.3417 18.0227 24.5351 17.3942 24.5351H12.2609C11.5437 24.5349 10.8503 24.2776 10.3065 23.81L9.27501 22.9224V19.7649L11.0025 18.0372C11.5671 17.4725 12.3177 17.1617 13.1163 17.1617H15.2891C15.8279 17.1617 16.3567 17.3074 16.8195 17.5833L18.4266 18.5411C18.8365 18.7849 18.9246 19.3424 18.6083 19.7011C18.3964 19.9413 18.0393 20.0391 17.7159 19.8893L15.9335 19.0665C15.7432 18.9794 15.5178 19.0613 15.4301 19.2521C15.3421 19.4421 15.4253 19.6678 15.6156 19.7556L17.3981 20.5784C17.8158 20.7711 18.2889 20.7757 18.7351 20.5423C18.7403 20.54 18.7458 20.5406 18.751 20.5381L24.1258 17.889C24.523 17.6926 24.9987 17.7726 25.3113 18.0846C25.7612 18.5349 25.7007 19.2817 25.182 19.653ZM26.9019 13.6998H25.7609C25.5634 9.13517 21.8244 5.47548 17.2288 5.40328V4.3794C17.2288 4.1697 17.0589 4 16.8494 4C16.6399 4 16.47 4.1697 16.47 4.3794V5.42446C12.1002 5.73546 8.61528 9.29637 8.42488 13.6998H7.28416C7.07465 13.6998 6.90475 13.8695 6.90475 14.0792C6.90475 14.2889 7.07465 14.4586 7.28416 14.4586H26.9019C27.1114 14.4586 27.2813 14.2889 27.2813 14.0792C27.2813 13.8695 27.1114 13.6998 26.9019 13.6998ZM9.18295 13.6998C9.38154 9.50791 12.8526 6.15857 17.0909 6.15857C21.3313 6.15857 24.804 9.50791 25.0028 13.6998H9.18295Z"
                        stroke-width="0.3" />
                </svg>
                <span class="tooltiptext">Waiter</span>
            </button>
            <button class="button button-small deactive">{{ floorName }}</button>
        </div>
    </div>

    <CartProduct 
        :cart-products="cartProducts"
        @increase:quantity="increaseQuantity"
        @decrease:quantity="decreaseQuantity"
        @open:note-popup="openNotePopup"
        @remove:cart-product="removeProduct" 
        :table="table"
        :oldOrder="oldOrder"
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
            <div class="payment-method">
                <div class="grid">
                    <div class="payment-option">
                        <input type="checkbox" id="Cash" name="Cash" value="Cash" checked>
                        <label for="Cash">Cash</label>
                    </div>
                    <div class="payment-option">
                        <input type="checkbox" id="Card" name="Card" value="Card">
                        <label for="Card">Card</label>
                    </div>
                    <div class="payment-option">
                        <input type="checkbox" id="Split" name="Split" value="Split">
                        <label for="Split">Split</label>
                    </div>
                    <div class="payment-option">
                        <input type="checkbox" id="Other" name="Other" value="Other">
                        <label for="Other">Other</label>
                    </div>
                    <div class="payment-option">
                        <input type="checkbox" id="UPI" name="UPI" value="UPI">
                        <label for="UPI">UPI</label>
                    </div>
                    <div class="payment-option">
                        <input type="checkbox" id="Due" name="Due" value="Due">
                        <label for="Due">Due</label>
                    </div>
                    <div class="payment-option">
                        <input type="checkbox" id="Parts" name="Parts" value="Parts">
                        <label for="Parts">Parts</label>
                    </div>
                </div>
            </div>
            <div class="billing-btns grid grid-cols-3">
                <button class="button kot-btn active" @click="createKot(table ?.table_number)">KOT</button>
                <button class="button hold-btn">Hold</button>
                <button class="button ebill-btn">eBill</button>
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
import { ref } from 'vue'

const emit = defineEmits(['increase:quantity', 'decrease:quantity','open:note-popup', 'remove:cart-product']);

const openAmountSlider = ref(true);

const props = defineProps({
    cartProducts: {
        type: Array,
        default: () => []
    },
    table: {
        type: Array,
        default: () => []
    },
    oldOrder: {
        type: Array,
        default: () => []
    },
    floorName: String,
    totalAmount: Number,
    subTotal: Number,
    discount: Number

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

// const getTotalAmount = () => {
//     const zero = 0;
//     return zero.toFixed(2);
// }

const removeProduct = (index, kot, kotIndex, kotProductIndex) => {
    emit('remove:cart-product', index, kot, kotIndex, kotProductIndex)
}

const createKot = (tableId) => {
    emit('create:kot', tableId)
}
const toggleAmountSlider = () => {
    openAmountSlider.value = !openAmountSlider.value
}

</script>