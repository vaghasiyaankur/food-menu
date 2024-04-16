<template>
    <div class="data-form">
        <div class="text-align-center popup_title">{{title}}</div>
        <div class="data-add">
            <!-- {{ formDataFormat }} -->
            <template v-for="(data,index) in formDataFormat" :key="index">
                <div class="add-data-main-div">
                    <label class="add-data-name" v-if="data.type != 'hidden'">{{ data.label }}</label>
                    <template v-if="data.type == 'text' || data.type == 'hidden'">
                        <template v-if="data.multipleLang">
                            <div class="data-name text-align-left" 
                                v-for="(option, ind) in data.options"
                            >
                                <Input 
                                    :type="data.type" 
                                    :class="'add-update-data-name'" 
                                    :placeholder="data.placeHolder+ ' (' + option.language +')'"
                                    :value="option.value"
                                    @update:input="saveValue(index, ind, $event)" 
                                />
                            </div>
                        </template>
                        <template v-else>
                            <div class="data-name text-align-left">
                                <Input 
                                    :type="data.type" 
                                    :class="'add-update-data-name'" 
                                    :placeholder="data.placeHolder"
                                    :value="data.value"
                                    @update:input="saveValue(index, null, $event)" 
                                />
                            </div>
                        </template>
                    </template>
                    <template v-if="data.type == 'image'">
                        <div class="data-image-selection margin-top">
                            {{ typeof data.value }}
                            <Image 
                                :alt="data.placeHolder"
                                :value="data.value"
                                :preview="data.preview"
                                @update:image="saveImage(index, $event.ImageData, $event.ImageInput)"
                            />
                        </div>
                    </template>
                    <template v-if="data.type == 'radio'">
                        <div class="data-name text-align-left">
                            <Radio 
                                :options="data.options" 
                                :name="data.name" 
                                :value="data.value"
                                @update:radio="saveValue(index, null, $event)" 
                            />
                        </div>
                    </template>
                    <template v-if="data.type == 'drop-down'">
                        <div class="data-name text-align-left">
                            <DropDown 
                                :options="data.options" 
                                :value="data.value"
                                :placeholder="data.placeHolder"
                                @update:drop-down="saveValue(index, null, $event)" 
                            />
                        </div>
                    </template>
                </div>
            </template>
            <div class="display-flex justify-content-center popup_button">
                <button type="button"
                    class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                <button type="button" class="button button-raised button-large popup-ok-button" @click="storeData">Ok</button>
            </div>
        </div>
    </div>
    <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
</template>

<script setup>
import Input from '../../../../components/Form/Input.vue';
import Image from '../../../../components/Form/Image.vue';
import Radio from '../../../../components/Form/Radio.vue';
import DropDown from '../../../../components/Form/DropDown.vue';
import { onBeforeUnmount } from 'vue';


const props = defineProps({
    title   :   String,
    formDataFormat: {
        type: Array,
        default: () => []
    },
    type    : String,
    dataType: String
});

console.log(props.formDataFormat);

const emit = defineEmits(['store:update', 'set:data-value', 'set:image-value']);

const saveValue = (index, ind = null, value) => {
    emit('set:data-value', index, ind, value);
    // console.log(props.formDataFormat);
    // if(ind == null){
    //     props.formDataFormat[index].value = value;
    // }else{
    //     props.formDataFormat[index].options[ind].value = value;
    // }
};

const saveImage = (index, imageData, imageInput) => {
    // console.log(props.formDataFormat);
    // console.log(typeof imageInput);
    // console.log(typeof imageData);
    // console.log(imageInput);
    // console.log(imageData);
    // console.log(props.formDataFormat);   
    // console.log(props.formDataFormat[index]);
    // console.log(index);

    // props.formDataFormat[index].value = imageInput;
    // props.formDataFormat[index].preview = imageData;

    emit('set:image-value', index, imageInput, imageData)
};

const storeData = () => {
    emit('store:update');
}

onBeforeUnmount(() => {
    props.formDataFormat = [];  
});

</script>