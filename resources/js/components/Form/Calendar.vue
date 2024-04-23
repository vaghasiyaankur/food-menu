<template>
    <div class="list no-hairlines reporting_calander no-margin">
        <ul>
            <li>
                <div class="item-content item-input">
                    <div class="item-inner no-padding-right">
                        <div class="item-input-wrap input-dropdown-wrap">
                            <input type="text" placeholder="Select date range" class="padding-horizontal" readonly="" id="demo-calendar-range">
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { f7 } from 'framework7-vue';
import { onMounted } from "vue";

onMounted(() => {
    f7.calendar.create({
        inputEl: '#demo-calendar-range',
        rangePicker: true,
        numbers:true,
        footer: true,
        dateFormat: 'yyyy/mm/dd',
        on: {
            close() {
                document.getElementById("date-set").click();
            }
        }
    });
})
</script>