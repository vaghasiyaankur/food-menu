<template>
    <a 
        v-for="(item, index) in items" 
        :key="index" 

        :href="'#tab-'+(index+1)" 
        
        class="tab-link"
        :class="{
            'tab-link-active' : item.active
        }"

        @click="handleTableHideShow(item.name)"
    > 
        {{ item.name }} 
    </a>
</template>
<script setup>
    import { ref, defineProps } from 'vue';

    const props = defineProps({
        tableShow : Boolean,
        floorlistShow : Boolean,
        language : Boolean
    });

    const items = ref([
        { active : true,  name : 'General' },
        { active : false, name : 'Table Management' },
        { active : false, name : 'Floor Plan' },
        { active : false, name : 'Language' },
        { active : false, name : 'QR Code' }
    ]);

    const handleTableHideShow = (tabName) => {
        if(tabName == 'Table Management') {
            props.tableShow = !props.tableShow;
            console.log(props.tableShow);
        } else if(tabName == 'Floor Plan') {
            props.floorlistShow = !props.floorlistShow;
            console.log(props.floorlistShow);
        }else if(tabName == 'Language') {
            props.language = !props.language;
            console.log(props.language);
        }
    }

</script>
<style scoped>
.tabbar .tab-link, .tabbar-labels .tab-link, .tabbar .link, .tabbar-labels .link{
	position: relative;
	width: auto;
	display: flex;
	justify-content: center;
	align-items: center;
	background-color:  #E1E1E1;
	margin: 0 auto;
	border-top-right-radius: 15px;
	border-top-left-radius: 15px;
	padding: 12px;
    overflow: inherit;
    flex: 1;
    margin: 15px;
    color: #555555;
}
.tabbar .tab-link-active, .tabbar-labels .tab-link-active{
    background-color:  #F33E3E;
    color: #ffffff;
}

.toolbar-inner{
    overflow: inherit !important;
}
.tab-link::after {
	content: "";
	position: absolute;
	right: -17px;
	bottom: 0px;
	background: none;
    width: 1.125rem;
    height: 1.125rem;
    background: radial-gradient(circle at 100% 0, transparent 1.125rem, #e1e1e1 1.25rem);
}
.tab-link::before {
	content: "";
	position: absolute;
	left: -17px;
	bottom: 0px;
	background: none;
    width: 1.125rem;
    height: 1.125rem;
    background: radial-gradient(circle at 0 0, transparent 1.125rem, #e1e1e1 1.25rem);
}
.tab-link.tab-link-active::after{
    background: radial-gradient(circle at 100% 0, transparent 1.125rem, #F33E3E 1.25rem);
}
.tab-link.tab-link-active::before{
    background: radial-gradient(circle at 0 0, transparent 1.125rem, #F33E3E 1.25rem);
}
.toolbar{
    background-color: transparent !important;
    z-index: 98;
}

.toolbar-inner{
    width:85%;
}

@media screen and (max-width:820px) {
    .header-links {
        width: 100%;
    }
    .toolbar-inner{
        width:100%;
    }
}
</style>
