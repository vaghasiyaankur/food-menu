<template>
    <div class="popup split-payment-popup" id="split-payment-popup">
        <div class="data-form add-table-view-data-form">
            <div class="text-align-center table_view-popup_title">
                Split Bill</div>
            <hr class="popup_title_divider">
            <div class="toolbar tabbar">
                <div class="toolbar-inner">
                    <a href="#portion-form" class="tab-link tab-link-active" @click="splitType = 'portion'">
                        <Icon name="portion" :color="splitType == 'portion' ? '#f33e3e' : '#38373d'"/>
                        <p class="no-margin">Portion Wise</p>
                    </a>
                    <a href="#percentage-wise-form" class="tab-link" @click="splitType = 'percentage'">
                        <Icon name="percentage" :color="splitType == 'percentage' ? '#f33e3e' : '#38373d'"/>
                        <p class="no-margin">Percentage Wise</p>
                    </a>
                    <!-- <a href="#item-wise-form" class="tab-link" @click="splitType = 'item'">
                        <Icon name="list" :color="splitType == 'item' ? '#f33e3e' : '#38373d'"/>
                        <p class="no-margin">Item Wise</p>
                    </a> -->
                </div>
            </div>
            <div class="tabs">
                <div id="portion-form" class="page-content tab tab-active">
                    <PortionForm />
                </div>
                <div id="percentage-wise-form" class="page-content tab">
                    <PercentageWiseForm />
                </div>
                <!-- <div id="item-wise-form" class="page-content tab">
                    <ItemWiseForm />
                </div> -->
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>
</template>
<script setup>
import { f7 } from 'framework7-vue';
import { inject, ref }  from 'vue';
import axios from 'axios';
import { successNotification, errorNotification } from '../../commonFunction.js'
import Icon from '../Icon.vue';
import PortionForm from './Split/PortionForm.vue';
import PercentageWiseForm from './Split/PercentageWiseForm.vue';
import ItemWiseForm from './Split/itemWiseForm.vue';

const splitType = inject('splitType')
</script>