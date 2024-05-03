<template>
    <div class="dine-options grid grid-cols-3">
        <button class="button button-small food-received-type" 
                :class="{'button-raised active' : foodReceivedType == 'dine_in'}"
                @click="changeFoodReceiveType('dine_in')"
        >
            Dine In
        </button>
        <button class="button button-small food-received-type" 
                :class="{'button-raised active' : foodReceivedType == 'takeaway'}"
                @click="changeFoodReceiveType('takeaway')"
        >
            Takeaway
        </button>
        <button class="button button-small food-received-type" 
                :class="{'button-raised active' : foodReceivedType == 'delivery'}"
                @click="changeFoodReceiveType('delivery')"
        >
            Delivery
        </button>
    </div>
    <div class="order-specific-options grid">
        <button class="button button-small order-option tooltip button-raised" @click="personDetails()">
            <!-- <span class="pos-fill-up-success">
                <Icon name="tick" color="#ffffff"/>
            </span> -->
            <Icon name="singlePerson" color="#38373d"/>
            <span class="tool-tip-text">Details</span>
        </button>
        <button class="button button-small order-option tooltip" @click="noOfPerson()">
            <!-- <span class="pos-fill-up-success">
                <Icon name="tick" color="#ffffff"/>
            </span> -->
            <Icon name="person" color="#38373d"/>
            <span class="tool-tip-text">No. of Person</span>
        </button>
        <button class="button button-small order-option tooltip" @click="orderNote()">
            <!-- <span class="pos-fill-up-success">
                <Icon name="tick" color="#ffffff"/>
            </span> -->
            <Icon name="note" color="#38373d"/>
            <span class="tool-tip-text">Note</span>
        </button>
        <button class="button button-small order-option tooltip "  @click="waiterAssign()">
            <!-- <span class="pos-fill-up-success">
                <Icon name="tick" color="#ffffff"/>
            </span> -->
            <Icon name="waiterIcon" color="#38373d"/>
            <span class="tool-tip-text">Waiter</span>
        </button>
        <button class="button button-small order-option tooltip active"  @click="addDiscount()">
            <Icon name="discountIcon" color="#38373d"/>
            <span class="tool-tip-text">Discount</span>
        </button>
        <!-- <button class="button button-small deactive">{{ floorName }}</button> -->
    </div>
</template>
<script setup>
import Icon from '../Icon.vue';
import { ref, inject } from 'vue'

const emit = defineEmits(['increase:quantity', 'decrease:quantity', 'open:note-popup', 'remove:cart-product']);

const foodReceivedType = inject('foodReceivedType');

const props = defineProps({
    cartProducts: {
        type: Array,
        default: () => []
    },
    foodReceivedType: String,
    oldOrder: [Array, Object],
    openAmountSlider : Boolean
});


const changeFoodReceiveType = (type) => {
    foodReceivedType.value = type;
}
const personDetails = () => {
    f7.popup.open(`.person_details`);
}
const noOfPerson = () => {
    f7.popup.open(`.no-of-person-popup`);
}
const orderNote = () => {
    f7.popup.open(`.order_note`);
}
const waiterAssign = () => {
    f7.popup.open(`.waiter_popup`);
}
const addDiscount = () => {
    f7.popup.open(`.applied-discount-popup`);
}

</script>