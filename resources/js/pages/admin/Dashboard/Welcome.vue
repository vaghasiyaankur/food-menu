<template>
    <div class="dashboard_welcome_section">
        <div class="greeting_user">
            <h3 class="no-margin">Good Morning, {{ userName }} !</h3>
            <h4 class="no-margin">Here's what's happening with your store today.</h4>
        </div>
    </div>
</template>

<script setup>
    import { defineProps } from 'vue';
    
    defineProps({
        userName : {
            type : String,
            default : "Guest"
        }
    })
</script>