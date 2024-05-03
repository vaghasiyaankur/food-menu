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
        <button class="button button-small order-option tooltip button-raised" :class="{'active' : personDetailFillUp}" @click="personDetails()">
            <span class="pos-fill-up-success" v-if="personDetailFillUp">
                <Icon name="tick" color="#ffffff"/>
            </span>
            <Icon name="singlePerson" :color="personDetailFillUp ? '#f33e3e' : '#38373d'"/>
            <span class="tool-tip-text">Details</span>
        </button>
        <button class="button button-small order-option tooltip" :class="{'active' : noOfPersonFillUp}" @click="noOfPerson()">
            <span class="pos-fill-up-success" v-if="noOfPersonFillUp">
                <Icon name="tick" color="#ffffff"/>
            </span>
            <Icon name="person" :color="noOfPersonFillUp ? '#f33e3e' : '#38373d'"/>
            <span class="tool-tip-text">No. of Person</span>
        </button>
        <button class="button button-small order-option tooltip" :class="{'active' : orderNoteFillUp}" @click="orderNote()">
            <span class="pos-fill-up-success" v-if="orderNoteFillUp">
                <Icon name="tick" color="#ffffff"/>
            </span>
            <Icon name="note" :color="orderNoteFillUp ? '#f33e3e' : '#38373d'"/>
            <span class="tool-tip-text">Note</span>
        </button>
        <button class="button button-small order-option tooltip" :class="{'active' : assignDeliveryFillUp}"  @click="waiterAssign()">
            <span class="pos-fill-up-success" v-if="assignDeliveryFillUp">
                <Icon name="tick" color="#ffffff"/>
            </span>
            <Icon name="waiterIcon" :color="assignDeliveryFillUp ? '#f33e3e' : '#38373d'"/>
            <span class="tool-tip-text">Waiter</span>
        </button>
        <button class="button button-small order-option tooltip" :class="{'active' : discountFillUp}"  @click="addDiscount()">
            <span class="pos-fill-up-success" v-if="discountFillUp">
                <Icon name="tick" color="#ffffff"/>
            </span>
            <Icon name="discountIcon" :color="discountFillUp ? '#f33e3e' : '#38373d'"/>
            <span class="tool-tip-text">Discount</span>
        </button>
        <!-- <button class="button button-small deactive">{{ floorName }}</button> -->
    </div>
</template>
<script setup>
import { f7 } from "framework7-vue"
import Icon from '../Icon.vue';
import { ref, inject } from 'vue'

const emit = defineEmits(['increase:quantity', 'decrease:quantity', 'open:note-popup', 'remove:cart-product']);

const foodReceivedType = inject('foodReceivedType');
const personDetailFillUp = inject('personDetailFillUp');
const noOfPersonFillUp = inject('noOfPersonFillUp');
const assignDeliveryFillUp = inject('assignDeliveryFillUp');
const orderNoteFillUp = inject('orderNoteFillUp');
const discountFillUp = inject('discountFillUp');

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
    f7.popup.open(`.order-note`);
}
const waiterAssign = () => {
    f7.popup.open(`.waiter-popup`);
}
const addDiscount = () => {
    f7.popup.open(`.applied-discount-popup`);
}


</script>