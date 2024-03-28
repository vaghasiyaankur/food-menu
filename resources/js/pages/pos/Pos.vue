<template>
    <f7-page color="bg-color-white pos-page">
        <div class="display-flex justify-content-space-between align-items-flex-start">
            <div class="product-section flex-shrink-0">
                <div class="category-search padding">
                    <Slider />
                </div>
            </div>
            <div class="add-to-cart padding">
                <div class="display-flex justify-content-space-between align-items-flex-start">
                    <div class="flex-shrink-0">Item 1</div>
                    <div class="align-self-center">Item 2</div>
                    <div class="align-self-flex-end">Item 3</div>
                </div>
            </div>
        </div>
    </f7-page>
</template>

<script>
import { f7Page, f7 } from 'framework7-vue';
import Slider from "../../components/Slider.vue"
export default {
    name : "POS",
    components: {
        f7Page, f7, Slider
    },
}
</script>