<template>
    <div class="added-combo-details margin-bottom" v-for="(data,index) in comboData" :key="index" >
        <template v-if="data.type == 'text' || data.type == 'hidden'  || data.type == 'number' || data.type == 'email' || data.type == 'password'">
            <template v-if="data.multipleLang">
                <div class="block-title no-margin col-100" v-if="data.type != 'hidden'">{{ data.label }}</div>
                <div class="col-100 medium-100 padding-bottom-half large-33" v-for="(option, ind) in data.options" :key="option">
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
    </div>
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