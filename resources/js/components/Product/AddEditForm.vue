<template>
    <div class="data-add">
        <form class="add-edit-form">
            
        </form>
    </div>
    <!-- <div class="add-product">
        <h5 class="no-padding no-margin">Product Name</h5>
        <input type="text" placeholder="Enter Product Name">
    </div>
    
    <div class="add-product">
        <h5 class="no-padding no-margin">Price</h5>
        <input type="number" placeholder="Enter Product Price">
    </div> -->
    
    <!-- <div class="add-product_name-price display-flex">
        <div class="add-product_name">
            <h5 class="no-padding no-margin">Product Name</h5>
            <input type="text" placeholder="Enter Product Name">
        </div>
        <div class="add-product_price">
            <h5 class="no-padding no-margin">Price</h5>
            <input type="number" placeholder="Enter Product Price">
        </div>
    </div>
    <div class="add-product_category display-flex">
        <div class="add-product_category-name">
            <h5 class="no-padding no-margin">Category</h5>
            <select name="select_category" id="select_category">
                <option value="Pizza">Pizza</option>
            </select>
        </div>
        <div class="add-product_image-select-wrapper">
            <h5></h5>
            <div class="add-product_image-select display-flex">
                <div class="add-product-image">
                    <img src="/images/add-image.png" />
                </div>
                <div class="add-product-image-text">
                    <span class="add-image-text">Select Image</span>
                </div>
            </div>
        </div>
    </div>
    <div class="add-product_type display-flex">
        <div class="add-product_food-type">
            <h5 class="no-padding no-margin">Food Type</h5>
            <div class="add-product_food-type-radio-btn display-flex">
                <div class="add-product_veg-type display-flex">
                    <input type="radio" id="food-type" name="food-type" value="veg" checked>
                    <label for="veg-type">Veg</label>
                </div>
                <div class="add-product_non-veg-type">
                    <input type="radio" id="food-type" name="food-type" value="non-veg">
                    <label for="non-veg-type">Non - Veg</label>
                </div>
            </div>
        </div>
        <div class="add-product_status">
            <h5 class="no-padding no-margin">Status</h5>
            <div class="add-product_food-status-radio-btn display-flex">
                <div class="add-product_active-status">
                    <input type="radio" id="food-status" name="food-status" value="active" checked>
                    <label for="food-status">Active</label>
                </div>
                <div class="add-product_deactive-status">
                    <input type="radio" id="food-status" name="food-status" value="deactive">
                    <label for="non-veg-type">Deactive</label>
                </div>
            </div>
        </div>
    </div>
    <div class="add-product_discription">
        <h5 class="no-padding no-margin">Discription</h5>
        <div class="add-product_discr">
            <textarea id="add-product-discr" name="add_discription" rows="3"></textarea>
        </div>
    </div> -->

</template>

<script setup>
const props = defineProps({
    formDataFormat: {
        type: Array,
        default: () => []
    }
});
</script>