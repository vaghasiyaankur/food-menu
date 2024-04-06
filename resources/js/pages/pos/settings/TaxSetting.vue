<template>
    <div class="form-title">
        <h3>                                    
            <span class="page_heading"> Add Taxes </span> 
        </h3>
    </div>
    <div class="taxsetting_form">
        <form class="list margin-vertical" id="tax-setting-form">
            <div class="item-content item-input margin-bottom no-padding-left">
                <div class="item-inner">
                    <div class="block-title no-margin-top">Tax Name</div>
                    <div class="item-input-wrap">
                        <input type="text" name="name" class="padding margin-top-half" placeholder="Enter tax name">
                    </div>
                </div>
            </div>
            <div class="item-content item-input margin-bottom no-padding-left">
                <div class="item-inner">
                    <div class="block-title no-margin-top">
                        <span class="block-title"> Type Charge</span>
                        <span class="type_charge margin-right-half">
                            <input type="radio" checked="checked" id="percentage" name="type_charge" value="percentage">
                            <label for="percentage"> Percentage</label>
                        </span>
                        <span class="type_charge">
                            <input type="radio" id="flat" name="type_charge" value="flat">
                            <label for="flat"> Flat</label>
                        </span>
                    </div>
                    <div class="item-input-wrap">
                        <input type="text" name="rate" class="padding margin-top-half" placeholder="Enter tax rate">
                    </div>
                </div>
            </div>
            <hr class="tax-divider">
            <h3> <span class="page_heading"> Notes </span></h3>
            <div class="item-content item-input margin-bottom no-padding-left">
                <div class="item-inner">
                    <div class="w-100 display-flex justify-content-space-between">
                        <div class="block-title no-margin"> GST</div>
                        <div>
                            <span class="active_status margin-right-half">
                                <input type="radio" checked="checked" id="gst_status_1" name="gst_status" value="on">
                                <label for="gst_status_1"> On</label>
                            </span>
                            <span class="active_status">
                                <input type="radio" id="gst_status_2" name="gst_status" value="off">
                                <label for="gst_status_2"> Off</label>
                            </span>
                        </div>
                    </div>
                    <div class="w-100 margin-top-half display-flex justify-content-space-between align-tems-center note_details">
                        <div class="block-title no-margin">100 CHF</div>
                        <div>
                            <span class="padding-right edit_tax_button"><Icon name="editIcon" /></span>
                            <span class="margin-left"><Icon name="deleteIcon" /></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-submit no-margin-bottom display-flex justify-content-right padding-top popup_button">
                <button type="button" class="button button-raised text-color-red button-large popup-close margin-right popup-button">Cancel</button>
                <button type="button" class="button button-raised text-color-white bg-color-red button-large popup-button">Save Changes</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import Icon from '../../../components/Icon.vue'
</script>