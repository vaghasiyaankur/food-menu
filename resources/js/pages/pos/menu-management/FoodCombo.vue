<template>
    <f7-page>
        <div class="data-list-section">
            <MenuManagementHeader title="Combo" @add:popup="showComboPopup"
                @update:search="updateSearch" />

            <div class="combo-card" v-if="combos?.length > 0">
                <Card 
                    :dataSet="combos" 
                    @open:edit-popup="openEditPage"
                    @open:remove-popup="showRemoveComboPopup"
                />
            </div>
            <div v-else>
                <div class="no_order">
                    <NoValueFound title="Empty Combo List" />
                </div>
            </div>
        </div>

        <!-- ========= DELETE COMBO POPUP ========= -->
        <div class="popup removePopup">
            <RemovePopup 
                :title="'Are you sure delete this combo?'"
                @remove="removeData"
            />
        </div>

    </f7-page>
</template>

<script setup>
import { f7Page, f7 } from 'framework7-vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';
import $ from 'jquery';
import NoValueFound from '../../../components/NoValueFound.vue'
import MenuManagementHeader from './MenuManagementHeader.vue'
import RemovePopup from '../../../components/common/RemovePopup.vue'
import Card from '../../../components/common/Card.vue'
import { successNotification, errorNotification, getErrorMessage } from '../../../commonFunction.js';

const combos = ref([]);
const removeComboId = ref(0);

const search = ref('');

onMounted(() => {
    $('.page-content').css('background', '#F7F7F7');
    getComboList();
});

const getComboList = () => {

    const formData = new FormData();

    formData.append('search', search.value);

    axios.post('/api/get-combos', formData)
    .then((response) => {
        combos.value = response.data.combos;
    });
};

const showComboPopup = (id = null) => {
    f7.view.main.router.navigate({ url: "/add-combo/" });
};

const updateSearch = (searchValue) => {
    search.value = searchValue;
    getComboList();
}

const showRemoveComboPopup = (id) => {
    removeComboId.value = id;
    f7.popup.open(`.removePopup`);
}

const removeData = () => {
    const comboData = new FormData();
    comboData.append('id', removeComboId.value);
    
    axios.post(`/api/delete-combo`, comboData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then((response) => {
        successNotification(response.data.success);
        f7.popup.close(`.removePopup`);
        getComboList();
    })
    .catch((error) => {
        const errorMessage = getErrorMessage(error);
        errorNotification(errorMessage);
    });
}

const openEditPage = (id) => {
    f7.view.main.router.navigate({ url: "/edit-combo/"+id });
}
</script>