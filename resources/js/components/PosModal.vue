<template>
    <!-- ========= Note POPUP ========= -->
    <div id="note_popup" class="popup notePopup" style="position: fixed; display: block; border-radius: 15px;">
        <div class="text-align-center padding popup_title">Notes</div>
        <div class="padding-horizontal">
            <div class="popup-content padding-horizontal padding-top">
                <label class="add_minutes_text">Special Notes</label>
                <div class="display-flex align-items-center margin-top-half">
                    <input type="text" class="w-100" placeholder="Add Note...">
                </div>
                <div class="margin-top no-margin-bottom display-flex justify-content-center padding-top popup_button">
                    <button type="button" class="button button-raised text-color-black bg-color-white button-large popup-close margin-right popup-button">Cancel</button>
                    <button type="button" class="button button-raised button-large popup-button active">Save</button>
                </div>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>

    <!-- ========= Open Item POPUP ========= -->
    <div id="open_item_popup" class="popup openItemPopup" style="position: fixed; display: block; border-radius: 15px;">
        <div class="text-align-center padding popup_title">Open Item</div>
        <div class="padding-horizontal">
            <div class="popup-content padding-horizontal padding-top">
                <div class="input-group margin-bottom">
                    <label class="add_minutes_text">Item Name</label>
                    <div class="minutes_input display-flex align-items-center margin-top-half">
                        <input type="text" class="w-100" placeholder="Add Name...">
                    </div>
                </div>
                <div class="input-group">
                    <label class="add_minutes_text">Price</label>
                    <div class="minutes_input display-flex align-items-center margin-top-half">
                        <input type="text" class="w-100" placeholder="Add Price...">
                    </div>
                </div>
                <div class="margin-top no-margin-bottom display-flex justify-content-center padding-top popup_button">
                    <button type="button" class="button button-raised text-color-black bg-color-white button-large popup-close margin-right popup-button">Cancel</button>
                    <button type="button" class="button button-raised button-large popup-button active">Save</button>
                </div>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>
    <!-- ========= Water POPUP ========= -->
    <div id="watter_popup" class="popup watterPopup" style="position: fixed; display: block; border-radius: 15px;">
        <div class="text-align-center padding popup_title">water bottle</div>
        <div class="padding-horizontal">
            <div class="popup-content padding-horizontal padding-top">
                <label class="add_minutes_text">Price</label>
                <div class="display-flex align-items-center margin-top-half">
                    <input type="number" class="w-100" placeholder="Add Price...">
                </div>
                <div class="margin-top no-margin-bottom display-flex justify-content-center padding-top popup_button">
                    <button type="button" class="button button-raised text-color-black bg-color-white button-large popup-close margin-right popup-button">Cancel</button>
                    <button type="button" class="button button-raised button-large popup-button active">Save</button>
                </div>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>
    <!-- ========= Delete Cart Item POPUP ========= -->
    <div id="deleteCartItem_popup" class="popup deleteCartItemPopup" style="position: fixed; display: block; border-radius: 15px;">
        <div class="text-align-center padding popup_title">Delete New York-Style Pizza Vegetarian</div>
        <div class="padding-horizontal">
            <div class="popup-content padding-horizontal padding-top">
                <label class="add_minutes_text">Reason</label>
                <div class="display-flex align-items-center margin-top-half">
                    <textarea rows="" cols="" class="w-100" placeholder="Reason"></textarea>
                </div>
                <div class="margin-top no-margin-bottom display-flex justify-content-center padding-top popup_button">
                    <button type="button" class="button button-raised text-color-black bg-color-white button-large popup-close margin-right popup-button">Cancel</button>
                    <button type="button" class="button button-raised button-large popup-button active">Save</button>
                </div>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>
</template>