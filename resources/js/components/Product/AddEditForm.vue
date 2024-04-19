<template>
    <div class="data-add">
        <form class="row add-edit-form">
            <div 
                class="row item-content item-input general_info_form-address no-padding col-100"
                :class="{ 'medium-100 large-100' : data.multipleLang, 'medium-100 large-50' : !data.multipleLang }" v-for="(data,index) in formDataFormat" :key="index"   
            >
                <template v-if="data.type == 'text' || data.type == 'hidden'  || data.type == 'number' || data.type == 'email' || data.type == 'password'">
                    <template v-if="data.multipleLang">
                        <div class="block-title no-margin col-100" v-if="data.type != 'hidden'">{{ data.label }}</div>
                        <div class="col-100 medium-100 large-33" v-for="(option, ind) in data.options" :key="option">
                            <Input 
                                :type="data.type" 
                                :value="option.value"
                                :name="'names['+option.language+']'"
                                :placeholder="'Name ('+ option.language +')'"
                                @update:input="saveValue(index, ind, $event)" 
                            />
                        </div>
                    </template>
                    <template v-else>
                        <div class="block-title no-margin col-100" v-if="data.type != 'hidden'">{{ data.label }}</div>
                        <div class="col-100 medium-100 large-100">
                            <Input 
                                :type="data.type" 
                                :placeholder="data.placeHolder"
                                :value="data.value"
                                :name="data.name"
                                @update:input="saveValue(index, null, $event)" 
                            />
                        </div>
                    </template>
                </template>
                <template v-if="data.type == 'radio'">
                    <div class="col-100">
                        <div class="block-title no-margin col-100">{{ data.label }}</div>
                        <Radio 
                            :options="data.options" 
                            :name="data.name" 
                            :value="data.value"
                            @update:radio="saveValue(index, null, $event)" 
                            class="type-radio-btn"
                        />
                    </div>
                </template>
                <template v-if="data.type == 'drop-down'">
                    <div class="col-100 medium-100 large-100">

                        <div class="block-title no-margin col-100">{{ data.label }}</div>
                            <DropDown 
                                :options="data.options" 
                                :value="data.value"
                                :name="data.name"
                                :placeholder="data.placeHolder"
                                @update:drop-down="saveValue(index, null, $event)" 
                            />
                    </div>
                </template>
                <template v-if="data.type == 'image'">
                    <div class="col-100">
                        <div class="block-title no-margin col-100">{{ data.label }}</div>
                            <Image 
                                :alt="data.placeHolder"
                                :value="data.value"
                                :preview="data.preview"
                                :name="data.name"
                                @update:image="saveImage(index, $event.ImageData, $event.ImageInput)"
                            />
                    </div>  
                </template>
                <template v-if="data.type == 'text-area'">
                    <div class="col-100">
                        <div class="block-title no-margin col-100">{{ data.label }}</div>
                            <TextArea 
                                :type="data.type" 
                                :placeholder="data.placeHolder"
                                :value="data.value"
                                :name="data.name"
                                @update:input="saveValue(index, null, $event)" 
                            />
                    </div>  
                </template>
            </div>
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

import Input from '../Form/Input.vue';
import TextArea from '../Form/TextArea.vue';
import Radio from '../Form/Radio.vue';
import DropDown from '../Form/DropDown.vue';
import Image from '../Form/Image.vue';

const props = defineProps({
    formDataFormat: {
        type: Array,
        default: () => []
    }
});

const saveValue = (index, ind = null, value) => {
    if(ind == null){
        props.formDataFormat[index].value = value;
    }else{
        props.formDataFormat[index].options[ind].value = value;
    }
};

const saveImage = (index, imageData, imageInput) => {
    props.formDataFormat[index].value = imageInput;
    props.formDataFormat[index].preview = imageData;
};
</script>