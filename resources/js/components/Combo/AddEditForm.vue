<template>
    <!-- <div class="data-add">
        <form class="row add-edit-form">
            <div 
                class="row item-content item-input general_info_form-address no-padding col-100"
                :class="{ 'medium-100 large-100' : data.multipleLang, 'medium-100 large-50' : !data.multipleLang }" v-for="(data,index) in comboData" :key="index"   
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
    </div> -->
    <div class="added-combo-details" v-for="(data,index) in comboData" :key="index" >
        <!-- <table class="added-combo-discr">
            <tbody>
                <tr>
                    <td class="no-margin no-padding">
                        <h4 class="no-margin no-padding">Combo Name</h4>
                    </td>
                    <td class="no-margin no-padding">
                        <h4 class="no-margin no-padding">Price</h4>
                    </td>
                </tr>
                <tr>
                    <td class="no-margin no-padding">
                        <input type="text" placeholder="Combo Name" class="added-combo-input">
                    </td>
                    <td class="no-margin no-padding">
                        <input type="number" placeholder="$14.00" class="added-combo-input">
                    </td>
                </tr>
            </tbody>
        </table> -->
        <!-- <div   > -->
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
        <!-- </div> -->
        <!-- <table class="added-combo-type">
            <tbody>
                <tr>
                    <td class="no-margin no-padding">
                        <h4 class="no-margin no-padding">Food Type</h4>
                    </td>
                    <td class="no-margin no-padding">
                        <h4 class="no-margin no-padding">Status</h4>
                    </td>
                </tr>
                <tr>
                    <td class="no-margin no-padding">
                        <div class="display-flex flex-direction-column">
                            <div class="type-radio-btn">
                                <input type="radio" id="veg" name="type" value="Veg">
                                <span for="Veg" checked>Veg</span>
                            </div>
                            <div class="type-radio-btn">
                                <input type="radio" id="non-veg" name="type" value="Non-Veg">
                                <span for="Non-Veg">Non - Veg</span>
                            </div>
                        </div>
                    </td>
                    <td class="no-margin no-padding">
                        <div class="display-flex flex-direction-column">
                            <div class="status-radio-btn">
                                <input type="radio" id="active" name="status" value="Active"
                                    checked>
                                <span for="Active">Active</span>
                            </div>
                            <div class="status-radio-btn">
                                <input type="radio" id="deactive" name="status"
                                    value="Deactive">
                                <span for="Deactive">Deactive</span>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table> -->
    </div>

    <!-- <div class="added-combo-item-view">
        <h4 class="no-margin no-padding">Product Image</h4>
        <div class="display-flex edit-picture">
            <div class="edit-picture-img"><img
                    src="/assets/images/seederImages/add-combo/samosa.png">
            </div>
            <div
                class="edit-picture-btn display-flex justify-content-center align-items-center">
                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.0833 0H1.91675C0.859834 0 0 0.859863 0 1.91678V13.0833C0 14.1401 0.859834 15 1.91675 15H13.0833C14.1402 15 15 14.1401 15 13.0832V1.91678C15 0.859863 14.1402 0 13.0833 0ZM14.1165 13.0833C14.1165 13.653 13.653 14.1165 13.0833 14.1165H1.91675C1.34701 14.1165 0.883506 13.653 0.883506 13.0833V11.4717L3.79137 8.99757C3.8426 8.95385 3.90763 8.92966 3.97498 8.92925C4.04233 8.92885 4.10765 8.95227 4.15939 8.99537L5.9809 10.5079C6.15653 10.6537 6.41435 10.6418 6.57574 10.4802L10.9037 6.14561C10.982 6.06724 11.0732 6.05962 11.1208 6.06205C11.1682 6.06448 11.2583 6.08142 11.3281 6.1674L14.1165 9.6007L14.1165 13.0833ZM14.1165 8.19917L12.0139 5.61032C11.9106 5.48323 11.7817 5.37923 11.6357 5.30505C11.4896 5.23086 11.3296 5.18813 11.166 5.17963C10.8359 5.16293 10.5122 5.28721 10.2785 5.52129L6.23531 9.57073L4.72389 8.31568C4.51226 8.13941 4.24512 8.04364 3.9697 8.04529C3.69429 8.04694 3.42832 8.14591 3.21882 8.32471L0.883506 10.3117V1.91678C0.883506 1.34704 1.34701 0.883535 1.91675 0.883535H13.0833C13.653 0.883535 14.1165 1.34704 14.1165 1.91678V8.19917Z"
                        fill="#F33E3E" />
                    <path
                        d="M4.72188 1.8457C3.54722 1.8457 2.59161 2.80137 2.59161 3.97597C2.59161 5.1506 3.54725 6.10623 4.72188 6.10623C5.89651 6.10623 6.85214 5.1506 6.85214 3.97597C6.85214 2.80134 5.89654 1.8457 4.72188 1.8457ZM4.72188 5.22272C4.0344 5.22272 3.47512 4.66342 3.47512 3.97597C3.47512 3.28849 4.0344 2.72921 4.72188 2.72921C5.40936 2.72921 5.96864 3.28852 5.96864 3.97597C5.96864 4.66342 5.40936 5.22272 4.72188 5.22272Z"
                        fill="#F33E3E" />
                </svg>
                <a href="#" class="no-margin no-padding">
                    Edit Picture</a>
            </div>
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
    comboData: {
        type: Array,
        default: () => []
    }
});

const saveValue = (index, ind = null, value) => {
    if(ind == null){
        props.comboData[index].value = value;
    }else{
        props.comboData[index].options[ind].value = value;
    }
};

const saveImage = (index, imageData, imageInput) => {
    props.comboData[index].value = imageInput;
    props.comboData[index].preview = imageData;
};
</script>