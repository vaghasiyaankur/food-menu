<template>
    <f7-page>
        <div class="product-list-section" @click="clickout">
            <div class="product_list_card no-margin">
                <MenuManagementHeader 
                    title="Combo" @add:popup="showaddCombo"
                />

                <div class="card-content combo-list">
                    <div class="grid grid-cols-5 medium-grid-cols-4 grid-gap-25 align-items-center">
                        <div class="card-type bg-color-white combo-card">
                            <div class="food-type-icon">
                                <img src="/images/veg-icon.png" alt="">
                            </div>
                            <div class="combo-image"><img src="/assets/images/seederImages/combo/1.png"></div>
                            <div class="text-align-center combo-name">
                                <h4 class="no-margin no-padding">Combo 1</h4>
                                <p class="combo-price no-margin no-padding">$8.00</p>
                            </div>
                            <div class="grid grid-cols-2 grid-gap-5 combo-change">
                                <a class="edit-combo col-100 large-45 medium-50"><Icon name="editIcon" />Edit</a>
                                <a class="delete-combo col-100 large-50 medium-50"><Icon name="deleteIcon" />Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>
<script setup>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input, f7ListItem, f7AccordionContent, f7List, f7AccordionToggle, f7AccordionItem } from 'framework7-vue';
import axios from 'axios';
import NoValueFound from '../../../components/NoValueFound.vue'
import Icon from '../../../components/Icon.vue'
import MenuManagementHeader from './MenuManagementHeader.vue'
import { ref } from 'vue';

const showaddCombo = () => {
    f7.views.main.router.navigate('/add-combo/');
}

const getCombo = () => {
    // axios.get('/api/get-sub-category/'+id)
    // .then((response) => {
    //     updateFormData(response.data);
    // });
}

getCombo()
</script>
