<template>
        <a :href="'#tab-'+tab.slug" 
            v-for="(tab, index) in tabs" :key="index"
            class="tab-link" :class="{ 'tab-link-active': activeTab === tab.slug }" 
            @click="setActiveTab(tab.slug)"
        >
            <p>
                <Icon
                    :name="tab.icon"
                    :color="activeTab === tab.slug ? '#F33E3E' : '#555555'"
                    class="margin-right-half"
                />
                {{ tab.label }}
            </p>
        </a>
</template>

<script setup>
// import SettingTab from './settings/SettingTab.vue';
import Icon from '../../../components/Icon.vue';

const props = defineProps({
    tabs: Object,
    activeTab: String
});

const emit = defineEmits(['update:activeTab']);

const setActiveTab = (slug) => {
    emit('update:activeTab', slug);
};

</script>
