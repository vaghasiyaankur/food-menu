<template>
    <div class="item-inner no-padding">
        <div class="block-title no-margin-top no-margin-left">{{label}}:</div>
        <div :id="'drop-down-'+name" class="drop-down" @click="createPicker($event)">
            <div id="dropDown" class="drop-down__button">
                <div class="drop-down__store display-flex justify-content-space-between padding-horizontal align-items-center toggle-event-check">
                    <span class="drop-down__name">
                        <input type="text" :name="name" class="toggle-event-check" placeholder="Date Time" readonly="readonly" :id="name+'-picker-date'" :value="value" />
                        <input type="hidden" class="toggle-event-check" placeholder="Date Time" readonly="readonly" :id="name+'-picker-date-hidden'" :value="value" />
                    </span>
                    <span class="down__icon">
                        <i class="f7-icons toggle-event-check">arrowtriangle_down_fill</i>
                    </span>
                </div>
            </div>

            <div class="drop-down__menu-box">
                <div class="drop-down__menu">
                    <div class="block-title margin-top">Set {{label}}</div>
                    <div class="block block-strong no-padding no-margin margin-bottom time_piker_inner">
                        <div :id="name+'-picker-date-container'"></div>
                    </div>
                    <div class="display-flex justify-content-end padding-bottom time__button">
                        <a class="padding-right text-color-black toggle-event-check" href="javascript:;">Cancel</a>
                        <a class="text-color-red" href="javascript:;" @click="closePicker()">OK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref, inject } from "vue";
import { f7 } from "framework7-vue";

const props = defineProps({
    label: String,
    name: String,
    value: String
});

const createPicker = () => {
    if (!event.target.classList.contains('toggle-event-check')) return false;
    document.getElementById('drop-down-'+props.name).classList.toggle('drop-down--active');
    document.getElementById(props.name+"-picker-date-container").innerHTML = '';

    const today = new Date();

    var cHours = '0';
    var cMinutes = '0';
    var cTime = "AM";
    if (props.value) {
        const [hourString, minuteString] = props.value.split(':');
        const [minute, time] = minuteString.split(' ');
        if (props.value) {
            cHours = Number(hourString);
            cMinutes = Number(minute);
            cTime = time;
        }
    }

    var csHours = cHours.toString();
    var csMinutes = cMinutes.toString();
    if (cHours < 10) csHours = "0" + csHours;
    if (cMinutes < 10) csMinutes = "0" + csMinutes;

    f7.picker.create({
        containerEl: '#' + props.name + '-picker-date-container',
        inputEl: '#' + props.name + '-picker-date-hidden',
        toolbar: false,
        rotateEffect: true,
        value: [
            csHours,
            csMinutes,
            cTime
        ],
        formatValue: function (values, displayValues) {
            return displayValues[0] + ':' + values[1] + ' ' + values[2];
        },
        cols: [
            // Hours
            {
                values: (function () {
                    const arr = [];
                    for (let i = 1; i <= 12; i++) {
                        arr.push(i < 10 ? '0' + i : i);
                    }
                    return arr;
                })(),
            },
            // Divider
            {
                divider: true,
                content: ':'
            },
            // Minutes
            {
                values: (function () {
                    const arr = [];
                    for (let i = 0; i <= 59; i++) {
                        arr.push(i < 10 ? '0' + i : i);
                    }
                    return arr;
                })(),
            },
            // am / pm
            {
                values: ['AM', 'PM'],
            }
        ],
    });
}

const closePicker = () => {
    const pickerDate = document.getElementById(props.name + '-picker-date-hidden').value;
    document.getElementById(props.name + '-picker-date').value = pickerDate;
    document.getElementById('drop-down-' + props.name).classList.remove('drop-down--active');
}
</script>
