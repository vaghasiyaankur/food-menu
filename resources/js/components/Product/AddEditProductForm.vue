
<template>
    <div class="add-product_form">
        <div class="add-product_name-price display-flex">
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
                <textarea id="add-product-discr" name="add_discription" rows="3"></textarea>price
            </div>
        </div>
        <div class="add-product_size-select">
            <h5 class="no-padding no-margin">Size</h5>
            <div class="add-product_size-selector-btns display-flex">
                <div>
                    <input type="radio" name="select_size" value="small" id="small" checked>
                    <label for="small" checked>
                        <div>S</div>
                        <div>$10</div>
                    </label>
                    
                    </div>
                <div><input type="radio" name="select_size" value="medium" id="medium"><label
                        for="medium">M</label></div>
                <div><input type="radio" name="select_size" value="large" id="large"><label
                        for="large">L</label></div>
                <div><input type="radio" name="select_size" value="extraLarge" id="extraLarge"><label
                        for="extraLarge">X</label></div>
            </div>
        </div>
        <div class="add-product_product_select">
            <h5 class="no-padding no-margin">Products</h5>
            <div class="add-product_product-select display-flex">
                <div class="bg-color-white select-product-card selected-card">
                    <div class="combo-image"><img
                            src="\assets\images\seederImages\combo\French_Fries.png">
                    </div>
                    <div class="text-align-center add-combo-product-name">
                        <h4 class="no-margin no-padding">French fries</h4>
                        <p class="selected-product-price no-margin no-padding">$19.00</p>
                    </div>
                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type1.png">
                </div>
                <div class="bg-color-white select-product-card selected-card">
                    <div class="combo-image"><img src="\assets\images\seederImages\combo\Coca_Cola.png">
                    </div>
                    <div class="text-align-center add-combo-product-name">
                        <h4 class="no-margin no-padding">Coca-Cola</h4>
                        <p class="selected-product-price no-margin no-padding">$19.00</p>
                    </div>
                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type1.png">
                </div>
                <div class="add-product-card display-flex">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.4 19.708C10.0707 19.708 9.81733 19.6193 9.64 19.442C9.488 19.2647 9.412 19.024 9.412 18.72V11.044H1.888C1.584 11.044 1.34333 10.968 1.166 10.816C0.988667 10.6387 0.9 10.398 0.9 10.094C0.9 9.79 0.988667 9.562 1.166 9.41C1.34333 9.23267 1.584 9.144 1.888 9.144H9.412V1.696C9.412 1.392 9.488 1.15133 9.64 0.974C9.81733 0.796666 10.0707 0.707999 10.4 0.707999C10.7293 0.707999 10.97 0.796666 11.122 0.974C11.2993 1.15133 11.388 1.392 11.388 1.696V9.144H18.912C19.2413 9.144 19.482 9.23267 19.634 9.41C19.8113 9.562 19.9 9.79 19.9 10.094C19.9 10.4233 19.8113 10.664 19.634 10.816C19.482 10.968 19.2413 11.044 18.912 11.044H11.388V18.72C11.388 19.024 11.2993 19.2647 11.122 19.442C10.97 19.6193 10.7293 19.708 10.4 19.708Z"
                            fill="#999999" />
                    </svg>

                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    selectIngredients: {
        type: Array,
        default: () => []
    },
    selectVariations: {
        type: Array,
        default: () => []
    },
});
</script>