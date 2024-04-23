<template>
    <div class="item-inner no-padding">
        <div class="block-title no-margin-top no-margin-left">{{label}}:</div>
        <div id="drop-down" @click="createPicker($event)">
            <div id="dropDown" class="drop-down__button">
                <div class="drop-down__store display-flex justify-content-space-between padding-horizontal align-items-center toggle-event-check">
                    <span class="drop-down__name">
                        <input type="text" class="toggle-event-check" placeholder="Date Time" readonly="readonly" id="start-picker-date" />
                        <input type="hidden" readonly="readonly" id="start-picker-date-hidden" />
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
                        <div id="start-picker-date-container"></div>
                    </div>
                    <div class="display-flex justify-content-end padding-bottom time__button">
                        <a class="padding-right text-color-black toggle-event-check" href="javascript:;">Cancel</a>
                        <a class="text-color-red" href="javascript:;" @click="openTimeShow()">OK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { f7 } from "framework7-vue";

const props = defineProps({
    label : String,
    name  : String
});

const createPicker = () => {
    document.getElementById("start-picker-date-container").innerHTML = '';
    const today = new Date();
    f7.picker.create({
        containerEl: '#'+id+'-picker-date-container',
        inputEl: '#'+id+'-picker-date-hidden',
        toolbar: false,
        rotateEffect: true,
        value: [
            today.getHours() < 10 ? '0' + today.getHours() : today.getHours(),
            today.getMinutes() < 10 ? '0' + today.getMinutes() : today.getMinutes()
        ],
        formatValue: function (values, displayValues) {
            return displayValues[0] + ':' + values[1] + ' ' + values[2];
        },
        cols: [
            // Hours
            {
                values: (function () {
                    var arr = [];
                    for (var i = 1; i <= 12; i++) { arr.push(i < 10 ? '0' + i : i); }
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
                    var arr = [];
                    for (var i = 0; i <= 59; i++) { arr.push(i < 10 ? '0' + i : i); }
                    return arr;
                })(),
            },
            // am / pm
            {
                values: (function () {
                    var arr = ['AM', 'PM'];

                    return arr;
                })(),
            }
        ],
        on: {
            change: function (picker, values, displayValues) {
                var daysInMonth = picker.value[0] + ' : ' + picker.value[1] + ' ' + picker.value[2];
            }
        }
    });
}
</script>