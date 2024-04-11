<template>
    <div class="form-title tax_settings-banner">
        <h3 class="no-margin no-padding">                                    
            <span class="page_heading tax_settings"> Add Taxes </span> 
        </h3>
    </div>
    <div class="taxsetting_form">
        <form class="list no-margin tax-setting-form" id="tax-setting-form">
            <div class="item-content item-input taxsetting_form-name no-margin no-padding">
                <div class="item-inner no-padding">
                    <div class="block-title no-margin">Tax Name</div>
                    <div class="item-input-wrap taxsetting_form-input">
                        <input type="text" name="name" class="" placeholder="Indian Rupee">
                    </div>
                </div>
            </div>
            <div class="item-content item-input taxsetting_form-type-charge no-margin no-padding">
                <div class="item-inner no-padding">
                    <div class="block-title no-margin">
                        <span class="block-title"> Type Charge</span>
                        <span class="type_charge no-margin">
                            <input type="radio" checked="checked" id="percentage" name="type_charge" value="percentage">
                            <label for="percentage"> Percentage</label>
                        </span>
                        <span class="type_charge">
                            <input type="radio" id="flat" name="type_charge" value="flat">
                            <label for="flat"> Flat</label>
                        </span>
                    </div>
                    <div class="item-input-wrap taxsetting_form-input">
                        <input type="text" name="rate" class="" placeholder="10">
                    </div>
                </div>
            </div>
            <hr class="tax-divider no-margin no-padding">
            <h3 class="no-margin no-padding"> <span class="page_heading tax_settings"> Notes </span></h3>
            <div class="item-content item-input taxsetting_form-gst no-padding-left">
                <div class="item-inner no-padding">
                    <div class="w-100 display-flex justify-content-space-between">
                        <div class="block-title no-margin"> GST</div>
                        <div>
                            <span class="active_status margin-right-half">
                                <input type="radio" id="gst_status_1" name="gst_status" value="on">
                                <label for="gst_status_1"> On</label>
                            </span>
                            <span class="active_status">
                                <input type="radio" id="gst_status_2" name="gst_status" value="off">
                                <label for="gst_status_2"> Off</label>
                            </span>
                        </div>
                    </div>
                    <div class="w-100 display-flex justify-content-space-between align-tems-center note_details gst-details">
                        <div class="block-title no-margin">100 CHF</div>
                        <div class="tax-btns">
                            <span class="edit_tax_button"><Icon name="editIcon" /></span>
                            <span class="delete_tax_button"><Icon name="deleteIcon" /></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-content item-input taxsetting_form-cgst no-padding-left">
                <div class="item-inner no-padding">
                    <div class="w-100 display-flex justify-content-space-between">
                        <div class="block-title no-margin"> CGST</div>
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
                    <div class="w-100 display-flex justify-content-space-between align-tems-center note_details gst-details">
                        <div class="block-title no-margin">10%</div>
                        <div class="tax-btns">
                            <span class="edit_tax_button"><Icon name="editIcon" /></span>
                            <span class="delete_tax_button"><Icon name="deleteIcon" /></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-content item-input taxsetting_form-sgst no-padding-left">
                <div class="item-inner no-padding">
                    <div class="w-100 display-flex justify-content-space-between">
                        <div class="block-title no-margin"> SGST</div>
                        <div>
                            <span class="active_status margin-right-half">
                                <input type="radio" id="gst_status_1" name="gst_status" value="on">
                                <label for="gst_status_1"> On</label>
                            </span>
                            <span class="active_status">
                                <input type="radio" id="gst_status_2" name="gst_status" value="off">
                                <label for="gst_status_2"> Off</label>
                            </span>
                        </div>
                    </div>
                    <div class="w-100 display-flex justify-content-space-between align-tems-center note_details gst-details">
                        <div class="block-title no-margin">30%</div>
                        <div class="tax-btns">
                            <span class="edit_tax_button"><Icon name="editIcon" /></span>
                            <span class="delete_tax_button"><Icon name="deleteIcon" /></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-submit no-margin no-padding display-flex justify-content-right popup_button">
                <button type="button" class="button button-raised text-color-red button-large popup-close popup-button">Cancel</button>
                <button type="button" class="button button-raised text-color-white bg-color-red button-large popup-button">Save Changes</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import Icon from '../../../components/Icon.vue'
</script>