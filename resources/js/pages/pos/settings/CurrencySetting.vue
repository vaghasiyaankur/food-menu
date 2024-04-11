<template>
    <div class="form-title currency_settings-banner">
        <h3 class="no-margin">                                    
            <span class="page_heading no-margin currency_settings"> Add New Currency </span> 
        </h3>
    </div>
    <div class="currency_form">
        <form class="list" id="my-form">
            <div class="item-content item-input currency_form-currency-name no-margin no-padding">
                <div class="item-inner no-padding">
                    <div class="block-title no-margin">Name</div>
                    <div class="item-input-wrap currency_form-input">
                        <input type="text" name="name" class="" placeholder="Enter currency name">
                    </div>
                </div>
            </div>
            <div class="item-content item-input currency_form-currency-code no-margin no-padding">
                <div class="item-inner no-padding">
                    <div class="block-title no-margin">Code</div>
                    <div class="item-input-wrap currency_form-input">
                        <input type="text" name="name" class="" placeholder="INR">
                    </div>
                </div>
            </div>
            <div class="item-content item-input currency_form-currency-symbol no-margin no-padding">
                <div class="item-inner no-padding">
                    <div class="block-title no-margin">Symbol</div>
                    <div class="item-input-wrap currency_form-input">
                        <input type="text" name="name" class="" placeholder="₹">
                    </div>
                </div>
            </div>
            <div class="form-submit no-margin-bottom display-flex justify-content-right padding-top popup_button">
                <button type="button" class="button button-raised text-color-red button-large popup-close margin-right popup-button">
                    Cancel
                </button>
                <button type="button" class="button button-raised text-color-white bg-color-red button-large margin-right  popup-button">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</template>