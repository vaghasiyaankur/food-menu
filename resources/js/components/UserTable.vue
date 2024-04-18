<template>
    <div class="AllUsers card data-table">
        <table class="all_users no-margin no-padding">
            <TableHeader :items="headerItem" />
            <tbody>
                <template v-if="items?.length > 0">
                    <tr v-for="(item,i) in items" :key="item">
                        <td class="label-cell">{{i + 1}}.</td>
                        <td class="label-cell">
                            <div class="display-flex align-items-center">
                                <img src="\assets\images\seederImages\settings\settings_user.png">
                                <p class="settings_user-name">{{item.name}}</p>
                            </div>
                        </td>
                        <td class="label-cell">
                            <p class="settings_user-email">{{item.email}}</p>
                        </td>
                        <td class="label-cell">
                            <div class="site-role">
                                <label>{{item.role}}</label>
                            </div>
                        </td>
                        <td class="label-cell">
                            <div class="user-btns display-flex">
                                <span class="edit_user_button display-flex" @click="emit('open:edit-popup',item.id)">
                                    <Icon name="editIcon" /> <p>Edit</p>
                                </span>
                                <span class="delete_user_button display-flex" @click="emit('delete:user', item.id)">
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

const emit = defineEmits(['open:edit-popup', 'delete:user']);

const headerItem = ref([
    { field : 'No', class : 'label-cell' },
    { field : 'Name', class : 'label-cell' },
    { field : 'Email', class : 'label-cell' },
    { field : 'Site Role', class : 'label-cell' },
    { field : 'Action', class : 'label-cell' },
]);
</script>