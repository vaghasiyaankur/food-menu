<template>
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
                    <button type="button"
                        class="button button-raised text-color-black bg-color-white button-large popup-close margin-right popup-button">Cancel</button>
                    <button type="button" class="button button-raised button-large popup-button active">Save</button>
                </div>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>
    <!-- ========= Delete Cart Item POPUP ========= -->
    <div id="deleteCartItem_popup" class="popup deleteCartItemPopup"
        style="position: fixed; display: block; border-radius: 15px;">
        <div class="text-align-center padding popup_title">Delete New York-Style Pizza Vegetarian</div>
        <div class="padding-horizontal">
            <div class="popup-content padding-horizontal padding-top">
                <label class="add_minutes_text">Reason</label>
                <div class="display-flex align-items-center margin-top-half">
                    <textarea rows="" cols="" class="w-100" placeholder="Reason"></textarea>
                </div>
                <div class="margin-top no-margin-bottom display-flex justify-content-center padding-top popup_button">
                    <button type="button"
                        class="button button-raised text-color-black bg-color-white button-large popup-close margin-right popup-button">Cancel</button>
                    <button type="button" class="button button-raised button-large popup-button active">Save</button>
                </div>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>

    <!-- ========= DINE IN PLACE ORDER POPUP ========= -->
    <div class="popup dine_in_order_Popup" id="dine_in_order_Popup">
        <div class="data-form add-table-view-data-form">
            <div class="text-align-center table_view-popup_title">
                Select the staff member you want to assign to this table</div>
            <hr class="popup_title_divider">
            <label class="dine_in-order-heading-text">Table</label>
            <select name="table-selector" id="table-selector" class="dine_in_order-text table-selector">
                <option value="Select Table">Select Table</option>
            </select>
            <label class="dine_in-order-heading-text">Contact Number</label>
            <div class="dine_in_order-text text-align-left">
                <input type="number" class="customer-contact-update-data dine_in_order-input"
                    placeholder="Enter contact number">
            </div>
            <label class="dine_in-order-heading-text">Customer Name</label>
            <div class="dine_in_order-text text-align-left">
                <input type="number" class="customer-name-update-data dine_in_order-input"
                    placeholder="Enter customer name">
            </div>
            <label class="dine_in-order-heading-text">Customer Email</label>
            <div class="dine_in_order-text text-align-left">
                <input type="number" class="customer-email-update-data dine_in_order-input"
                    placeholder="Enter customer email">
            </div>
            <div class="display-flex justify-content-center popup_button">
                <button type="button"
                    class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                <button type="button"
                    class="button button-raised button-large popup-ok-button popup-place-order-button">Place
                    Order</button>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>

    <!-- ========= DELIVERY PLACE ORDER POPUP ========= -->
    <div class="popup delivery_order_Popup" id="delivery_order_Popup">
        <div class="data-form add-table-view-data-form">
            <div class="text-align-center table_view-popup_title">
                Fill the details to place your online order</div>
            <hr class="popup_title_divider">
            <label class="delivery-order-heading-text">Contact Number</label>
            <div class="delivery_order-text text-align-left">
                <input type="number" class="customer-contact-update-data delivery_order-input"
                    placeholder="Enter contact number">
            </div>
            <label class="delivery-order-heading-text">Customer Name</label>
            <div class="delivery_order-text text-align-left">
                <input type="number" class="customer-name-update-data delivery_order-input"
                    placeholder="Enter customer name">
            </div>
            <label class="delivery-order-heading-text">Customer Email</label>
            <div class="delivery_order-text text-align-left">
                <input type="number" class="customer-email-update-data delivery_order-input"
                    placeholder="Enter customer email">
            </div>
            <label class="delivery-order-heading-text">Customer Address</label>
            <div class="delivery_order-text text-align-left">
                <input type="number" class="customer-adddress-update-data delivery_order-input"
                    placeholder="Enter customer address">
            </div>
            <div class="display-flex justify-content-center popup_button">
                <button type="button"
                    class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                <button type="button"
                    class="button button-raised button-large popup-ok-button popup-place-order-button">Place
                    Order</button>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>

</template>