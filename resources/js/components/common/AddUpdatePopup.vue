<template>
    <div class="data-form">
        <div class="text-align-center popup_title">{{title}}</div>
        <div class="data-add">
            <form @submit.prevent="storeData" class="no-margin" method="post">
                <template v-for="(data,index) in formDataFormat" :key="index">
                    <div class="add-data-main-div">
                        <label class="add-data-name" v-if="data.type != 'hidden'">{{ data.label }}</label>
                        <template v-if="data.type == 'text' || data.type == 'hidden'  || data.type == 'number' || data.type == 'email' || data.type == 'password' || data.type == 'month'">
                            <template v-if="data.multipleLang">
                                <div class="data-name" :class="{ 'text-align-left padding-bottom-half' : data.type != 'hidden' }"
                                    v-for="(option, ind) in data.options" :key="option"
                                >
                                    <Input 
                                        :data-type="dataType"
                                        :type="data.type" 
                                        :class="'add-update-data-name ' + data.class" 
                                        :placeholder="data.placeHolder+ ' (' + option.language +')'"
                                        :value="option.value"
                                        :name="'names['+option.language+']'"
                                        @update:input="saveValue(index, ind, $event)" 
                                    />
                                </div>
                            </template>
                            <template v-else>
                                <div class="data-name" :class="{ 'text-align-left padding-bottom-half' : data.type != 'hidden' }">
                                    <Input 
                                        :data-type="dataType"
                                        :type="data.type" 
                                        :class="'add-update-data-name ' + data.class"  
                                        :placeholder="data.placeHolder"
                                        :value="data.value"
                                        :name="data.name"
                                        :min="data.min"
                                        :max="data.max"
                                        @update:input="saveValue(index, null, $event)" 
                                        @set:change="changeValue(data.method)"
                                    />
                                </div>
                            </template>
                        </template>
                        <template v-if="data.type == 'image'">
                            <div class="data-image-selection margin-top">
                                <Image 
                                    :data-type="dataType"
                                    :alt="data.placeHolder"
                                    :value="data.value"
                                    :preview="data.preview"
                                    :name="data.name"
                                    @update:image="saveImage(index, $event.ImageData, $event.ImageInput)"
                                />
                            </div>
                        </template>
                        <template v-if="data.type == 'radio'">
                            <div class="data-name text-align-left">
                                <Radio 
                                    :data-type="dataType"
                                    :options="data.options" 
                                    :name="data.name" 
                                    :value="data.value"
                                    @update:radio="saveValue(index, null, $event)" 
                                    class="type-radio-btn"
                                />
                            </div>
                        </template>
                        <template v-if="data.type == 'drop-down'">
                            <div class="data-name text-align-left">
                                <DropDown 
                                    :data-type="dataType"
                                    :options="data.options" 
                                    :value="data.value"
                                    :name="data.name"
                                    :placeholder="data.placeHolder"
                                    @update:drop-down="saveValue(index, null, $event)" 
                                />
                            </div>
                        </template>
                        <template v-if="data.type == 'switch'">
                            <div class="data-name text-align-left">
                                <Switch
                                    :name="data.name"
                                    :changeStatus="data.value"
                                    @update:changeData="(value) => saveValue(index, null, value)"
                                />
                            </div>
                        </template>
                        <template v-if="data.type == 'date-time'">
                            <div class="data-name text-align-left">
                                <DateTime 
                                    :data-type="dataType"
                                    :value="data.value"
                                    :name="data.name"
                                    :label="''"
                                    :class-names="data.class"
                                    :placeholder="data.placeHolder"
                                    @update:date-time="saveValue(index, null, $event)" 
                                />
                            </div>
                        </template>
                    </div>
                </template>
                <div class="display-flex justify-content-center popup_button">
                    <button type="button"
                        class="button button-raised button-large popup-close popup-cancel-button bg-color-white">Cancel</button>
                    <button type="submit" class="button button-raised button-large popup-ok-button">Ok</button>
                </div>
            </form>
        </div>
    </div>
    <div class="wave-image-content">
        <img src="/images/flow.png" style="width:100%" />
    </div>
</template>

<script setup>
import Input from '../Form/Input.vue';
import Image from '../Form/Image.vue';
import Radio from '../Form/Radio.vue';
import DropDown from '../Form/DropDown.vue';
import Switch from '../Form/Switch.vue';
import DateTime from '../Form/DateTime.vue';
import { onBeforeUnmount, ref } from 'vue';


const props = defineProps({
    title   :   String,
    formDataFormat: {
        type: Array,
        default: () => []
    },
    type    : String,
    dataType: String
});

const localFormDataFormat = ref(props.formDataFormat);

const emit = defineEmits(['store:update', 'set:startDate', 'set:endDate']);

const saveValue = (index, ind = null, value) => {
    if(ind == null){
        localFormDataFormat.value[index].value = value;
    }else{
        localFormDataFormat.value[index].options[ind].value = value;
    }
};

const saveImage = (index, imageData, imageInput) => {

    localFormDataFormat.value[index].value = imageInput;
    localFormDataFormat.value[index].preview = imageData;
};

const storeData = () => {
    emit('store:update');
}

const changeValue = (method) => {
    if (method && typeof method.startsWith === 'function') {
        emit(method);
    }
}

onBeforeUnmount(() => {
    localFormDataFormat.value = [];  
});

</script>