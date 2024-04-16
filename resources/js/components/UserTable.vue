<template>
    <div class="AllUsers card data-table">
        <table class="all_users no-margin no-padding">
            <TableHeader :items="headerItem" />
            <tbody v-for="(item,index) in items" :key="item">
                <template v-if="dataType == index || dataType == ''">
                    <tr v-for="(data,i) in item" :key="data">
                        <td class="label-cell">{{i + 1}}.</td>
                        <td class="label-cell">
                            <div class="display-flex align-items-center">
                                <img src="\assets\images\seederImages\settings\settings_user.png">
                                <p class="settings_user-name">{{data.name}}</p>
                            </div>
                        </td>
                        <td class="label-cell">
                            <p class="settings_user-email">{{data.email}}</p>
                        </td>
                        <td class="label-cell">
                            <div class="site-role">
                                <label>{{data.role}}</label>
                            </div>
                        </td>
                        <td class="label-cell">
                            <div class="user-btns display-flex">
                                <span class="edit_user_button display-flex">
                                    <Icon name="editIcon" /> <p>Edit</p>
                                </span>
                                <span class="delete_user_button display-flex">
                                    <Icon name="deleteIcon" /> <p>Delete</p>
                                </span>
                            </div>
                        </td>
                    </tr>
                </template>
                <template v-else>
                    <tr>
                        <td class="text-align-center" colspan="5">No user found!!</td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>
<script setup>
import TableHeader from './TableHeader.vue';
import Icon from './Icon.vue';
import { ref } from 'vue';

const props = defineProps({
    items : Object,
    dataType : String
});

const headerItem = ref([
    { field : 'No', class : 'label-cell' },
    { field : 'Name', class : 'label-cell' },
    { field : 'Email', class : 'label-cell' },
    { field : 'Site Role', class : 'label-cell' },
    { field : 'Action', class : 'label-cell' },
]);
</script>