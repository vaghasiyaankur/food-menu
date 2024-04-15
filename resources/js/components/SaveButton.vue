<template>
    <div 
        class="submit__button"
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

    const props = defineProps({
        title       : String,
        submitEvent : Function
    });
</script>

<style scoped>
.submit__button{
    padding: 12px 23px;
    margin: 100px 0 300px;
}
.submit__button button {
	width: 100%;
	max-width: 170px;
	margin: 0 auto;
	border-radius: 10px;
	background-color: #F33E3E;
}
</style>