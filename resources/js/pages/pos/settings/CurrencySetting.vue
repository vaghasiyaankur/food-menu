<template>
    <div class="form-title">
        <h3>                                    
            <span class="page_heading"> Add New Currency </span> 
        </h3>
    </div>
    <div class="currency_form">
        <form class="list margin-vertical" id="my-form">
            <div class="item-content item-input margin-bottom no-padding-left">
                <div class="item-inner">
                    <div class="block-title no-margin-top">Name</div>
                    <div class="item-input-wrap">
                        <input type="text" name="name" class="padding margin-top-half" placeholder="Enter currency name">
                    </div>
                </div>
            </div>
            <div class="item-content item-input margin-bottom no-padding-left">
                <div class="item-inner">
                    <div class="block-title no-margin-top">Code</div>
                    <div class="item-input-wrap">
                        <input type="text" name="name" class="padding margin-top-half" placeholder="Enter code">
                    </div>
                </div>
            </div>
            <div class="item-content item-input margin-bottom no-padding-left">
                <div class="item-inner">
                    <div class="block-title no-margin-top">Symbol</div>
                    <div class="item-input-wrap">
                        <input type="text" name="name" class="padding margin-top-half" placeholder="Enter symbol">
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