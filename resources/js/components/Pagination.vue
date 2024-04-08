<template>
    <div class="pagination_list">
        <div 
            v-for="(link, index) in data.links" 
            :key="link"
        >
            <a 
                href="javascript:;" 
        
                v-if="index == 0" 
                @click="link.url != null ? functionName(link.url) : 'javascript:;'" 
                
                class="link" 
                :class="{ 'disabled': link.url == null}"
            >
                <i class="icon-prev"></i>
            </a>
            <a 
                href="javascript:;" 
                
                v-if="data.links.length - 1 != index && index != 0" 
                @click="functionName(link.url)" 
                
                :class="{ 'disabled': link.url == null, 'active': data.current_page == index}"
            >
                {{ index }}
            </a>
            <a 
                href="javascript:;" 

                v-if="data.links.length - 1 == index" 
                @click="link.url != null ? functionName(link.url) : 'javascript:;'" 
                
                class="link" 
                :class="{ 'disabled': link.url == null}"
            >
                <i class="icon-next"></i>
            </a>
        </div>
    </div>
</template>

<script setup>

    const props = defineProps({
        functionName :  Function,
        data         :  Array,
    });
</script>

<style scoped>
.pagination_count .pagination_list {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}
.pagination_count .pagination_list a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 5px;
}
.data-table .data-table-pagination{
    justify-content: end;
}
</style>
