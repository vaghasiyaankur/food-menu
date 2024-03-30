<template>
    <div 
        class="submit__button margin-top padding-top"
    >
        <button
            class="col button button-large button-fill" 
            @click="submitEvent"
        >
            {{ title }}
        </button>
    </div>
</template>

<script setup>
    import { ref, defineProps } from 'vue';

    const props = defineProps({
        title       : String,
        submitEvent : Function
    });
</script>

<style scoped>
.submit__button button {
	width: 100%;
	max-width: 160px;
	margin: 0 auto 10px;
	border-radius: 10px;
	background-color: #F33E3E;
}
</style>