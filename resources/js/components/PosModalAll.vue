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
                    <button type="button"
                        class="button button-raised text-color-black bg-color-white button-large popup-close margin-right popup-button">Cancel</button>
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
    

    <!-- ========= SETTLE & SAVE POPUP ========= -->
    <div class="popup settle-save-popup" id="settle-save-popup">
        <div class="data-form add_table_view-data-form">
            <div class="text-align-center table_view-popup_title">
                Applied Discount</div>
            <hr class="popup_title_divider">
            <label class="custom-disc-text">Custom Discount</label>
            <div class="payment-method display-block">
                <div class="grid">
                    <div class="payment-option">
                        <input type="checkbox" id="Cash" name="Cash" value="Cash" checked>
                        <label for="Cash">Cash</label>
                    </div>
                    <div class="payment-option">
                        <input type="checkbox" id="Card" name="Card" value="Card">
                        <label for="Card">Card</label>
                    </div>
                    <div class="payment-option">
                        <input type="checkbox" id="Split" name="Split" value="Split">
                        <label for="Split">Split</label>
                    </div>
                    <div class="payment-option">
                        <input type="checkbox" id="Other" name="Other" value="Other">
                        <label for="Other">Other</label>
                    </div>
                    <div class="payment-option">
                        <input type="checkbox" id="UPI" name="UPI" value="UPI">
                        <label for="UPI">UPI</label>
                    </div>
                    <div class="payment-option">
                        <input type="checkbox" id="Due" name="Due" value="Due">
                        <label for="Due">Due</label>
                    </div>
                    <div class="payment-option">
                        <input type="checkbox" id="Parts" name="Parts" value="Parts">
                        <label for="Parts">Parts</label>
                    </div>
                </div>
            </div>
            <label class="settle_save-heading-text">Customer Paid</label>
            <div class="settle_save-text text-align-left">
                <input type="number" class="customer-paid-update-data settle_save-input" placeholder="2000">
            </div>
            <label class="settle_save-heading-text">Return to customer</label>
            <div class="settle_save-text text-align-left">
                <input type="number" class="return-customer-update-data settle_save-input" placeholder="0">
            </div>
            <label class="settle_save-heading-text">Tip</label>
            <div class="settle_save-text text-align-left">
                <input type="number" class="tip-update-data settle_save-input" placeholder="0">
            </div>
            <label class="settle_save-heading-text">Settlement Amount</label>
            <div class="settle_save-text text-align-left">
                <input type="number" class="settlement-amount-update-data settle_save-input" placeholder="0">
            </div>
            <div class="display-flex justify-content-center popup_button">
                <button type="button" class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                <button type="button" class="button button-raised button-large popup-ok-button popup-save-settle-button">Save & Settle</button>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>


    <!-- ========= DINE IN PLACE ORDER POPUP ========= -->
    <div class="popup dine_in_order_Popup" id="dine_in_order_Popup">
        <div class="data-form add_table_view-data-form">
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
        <div class="data-form add_table_view-data-form">
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

    <!-- ========= PART PAYMENT POPUP ========= -->
    <div class="popup part_payment_Popup" id="part_payment_Popup">
        <div class="data-form add_table_view-data-form">
            <div class="text-align-center table_view-popup_title">
                Part Payment</div>
            <hr class="popup_title_divider">
            <div class="bill-header">
                <label class="bill-number-banner">Bill No: <span>861</span></label>
                <label class="payable-amount-banner">Payable Amount: $38</label>
            </div>
            <div class="toolbar tabbar">
                <div class="toolbar-inner">
                    <a href="#pay_opt_1" class="tab-link">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_2679_2121)">
                                <path
                                    d="M21.3268 26.3309H31.9901C32.39 26.3309 32.6566 26.0643 32.6566 25.6644V19.6663C32.6566 19.2664 32.39 18.9999 31.9901 18.9999H21.3268C20.9269 18.9999 20.6604 19.2664 20.6604 19.6663V25.6644C20.6603 26.0642 20.9269 26.3309 21.3268 26.3309ZM21.9933 20.3327H31.3237V24.9979H21.9933V20.3327ZM3.33245 17.6668H8.66414C9.06402 17.6668 9.33057 17.4003 9.33057 17.0004C9.33057 16.6005 9.06402 16.334 8.66414 16.334H3.33245C2.93257 16.334 2.66602 16.6005 2.66602 17.0004C2.66602 17.4003 2.93257 17.6668 3.33245 17.6668ZM11.3299 17.6668H16.6616C17.0615 17.6668 17.3281 17.4003 17.3281 17.0004C17.3281 16.6005 17.0615 16.334 16.6616 16.334H11.3299C10.9301 16.334 10.6635 16.6005 10.6635 17.0004C10.6635 17.4003 10.9301 17.6668 11.3299 17.6668ZM3.33245 20.3327H11.9964C12.3963 20.3327 12.6628 20.0662 12.6628 19.6663C12.6628 19.2664 12.3963 18.9999 11.9964 18.9999H3.33245C2.93257 18.9999 2.66602 19.2664 2.66602 19.6663C2.66602 20.0662 2.93257 20.3327 3.33245 20.3327ZM16.6616 18.9998H14.6622C14.2623 18.9998 13.9958 19.2663 13.9958 19.6662C13.9958 20.0661 14.2623 20.3327 14.6622 20.3327H16.6616C17.0614 20.3327 17.328 20.0661 17.328 19.6662C17.328 19.2663 17.0614 18.9998 16.6616 18.9998Z"
                                    fill="currentColor" />
                                <path
                                    d="M39.3877 10.7363C38.9212 10.1365 38.3214 9.80324 37.5882 9.73662L35.9887 9.54277V6.33768C35.9887 4.8715 34.7891 3.67188 33.3229 3.67188H2.66581C1.19962 3.6718 0 4.87142 0 6.33768V27.6644C0 28.8681 0.808887 29.8916 1.90979 30.2197C1.87621 31.5678 2.89628 32.7383 4.26538 32.8627L35.0558 36.3283H35.3223C36.6553 36.3283 37.8549 35.3286 37.9881 34.0624L39.9875 12.6691C40.0541 12.0026 39.8542 11.2694 39.3877 10.7363ZM1.33294 8.33706H34.6559V12.3358H1.33294V8.33706ZM2.66581 5.00474H33.3229C34.056 5.00474 34.6558 5.60455 34.6558 6.33768V7.00411H1.33294V6.33768C1.33294 5.60455 1.93275 5.00474 2.66581 5.00474ZM1.33294 27.6643V13.6687H34.6559V27.6643C34.6559 28.3974 34.0561 28.9972 33.3229 28.9972H2.66588C1.93275 28.9972 1.33294 28.3974 1.33294 27.6643ZM38.6545 12.4024L36.6552 33.7957C36.5886 34.5289 35.922 35.062 35.189 34.9954L4.46524 31.5298C3.79881 31.4632 3.33224 30.93 3.26562 30.3302H33.3229C34.789 30.3302 35.9887 29.1306 35.9887 27.6644V10.8029L37.5215 10.9362C37.8548 10.9362 38.188 11.1362 38.3879 11.4027C38.5879 11.6693 38.7212 12.0692 38.6545 12.4024Z"
                                    fill="currentColor" />
                            </g>
                            <defs>
                                <clipPath id="clip0_2679_2121">
                                    <rect width="40" height="40" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p class="no-margin">Card</p>
                    </a>
                    <a href="#pay_opt_2" class="tab-link">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M34.5898 37.5006H3.6524C2.94916 37.4999 2.27493 37.2211 1.77766 36.7255C1.2804 36.2298 1.00072 35.5578 1 34.8569V10.3282C1 10.1847 1.05719 10.0471 1.159 9.94559C1.2608 9.84412 1.39888 9.78711 1.54286 9.78711H34.5898C35.293 9.78797 35.9672 10.0668 36.4644 10.5624C36.9616 11.058 37.2414 11.7299 37.2422 12.4308V19.6704C37.2422 19.8139 37.185 19.9516 37.0832 20.053C36.9814 20.1545 36.8434 20.2115 36.6994 20.2115C36.5554 20.2115 36.4173 20.1545 36.3155 20.053C36.2137 19.9516 36.1565 19.8139 36.1565 19.6704V12.4308C36.1561 12.0168 35.9909 11.6199 35.6972 11.3271C35.4035 11.0344 35.0052 10.8697 34.5898 10.8693H2.08571V34.8569C2.08629 35.2708 2.25153 35.6677 2.54522 35.9604C2.83891 36.2531 3.23707 36.4178 3.6524 36.4184H34.5898C35.0052 36.4178 35.4033 36.2531 35.697 35.9604C35.9907 35.6677 36.1559 35.2708 36.1565 34.8569V27.6178C36.1565 27.4743 36.2137 27.3367 36.3155 27.2352C36.4173 27.1337 36.5554 27.0767 36.6994 27.0767C36.8434 27.0767 36.9814 27.1337 37.0832 27.2352C37.185 27.3367 37.2422 27.4743 37.2422 27.6178V34.8569C37.2414 35.5578 36.9616 36.2297 36.4644 36.7253C35.9672 37.2209 35.293 37.4997 34.5898 37.5006Z"
                                fill="currentColor" stroke="currentColor" stroke-width="0.4" />
                            <path
                                d="M37.5489 28.1562H31.1915C29.9907 28.1562 28.8391 27.6808 27.9901 26.8345C27.141 25.9883 26.664 24.8405 26.664 23.6437C26.664 22.4468 27.141 21.299 27.9901 20.4528C28.8391 19.6065 29.9907 19.1311 31.1915 19.1311H37.5489C37.9336 19.1316 38.3024 19.2843 38.5745 19.5555C38.8465 19.8267 38.9995 20.1944 38.9999 20.5779V26.7083C38.9999 27.0921 38.8471 27.4601 38.575 27.7316C38.3029 28.0031 37.9338 28.1558 37.5489 28.1562ZM31.1915 20.2154C30.7395 20.2154 30.2919 20.3041 29.8744 20.4765C29.4568 20.6489 29.0774 20.9016 28.7578 21.2201C28.4382 21.5387 28.1847 21.9168 28.0117 22.333C27.8388 22.7492 27.7497 23.1953 27.7497 23.6458C27.7497 24.0963 27.8388 24.5424 28.0117 24.9586C28.1847 25.3748 28.4382 25.753 28.7578 26.0715C29.0774 26.39 29.4568 26.6427 29.8744 26.8151C30.2919 26.9875 30.7395 27.0763 31.1915 27.0763H37.5489C37.5971 27.0762 37.6449 27.0666 37.6895 27.048C37.734 27.0295 37.7744 27.0023 37.8084 26.9681C37.8423 26.9339 37.8692 26.8933 37.8873 26.8488C37.9055 26.8042 37.9146 26.7564 37.9142 26.7083V20.5779C37.9141 20.4813 37.8755 20.3887 37.8071 20.3204C37.7386 20.252 37.6458 20.2135 37.5489 20.2132L31.1915 20.2154ZM1.54277 10.8693C1.41427 10.8693 1.28994 10.8239 1.1919 10.7411C1.09386 10.6583 1.02848 10.5435 1.00737 10.4171C0.986268 10.2908 1.01081 10.1611 1.07664 10.0511C1.14247 9.94108 1.24532 9.85793 1.36688 9.81641L22.1713 2.7126C22.7658 2.50951 23.4003 2.45079 24.022 2.54133C24.6438 2.63186 25.2349 2.86904 25.7462 3.23313C26.2575 3.59723 26.6743 4.07772 26.9617 4.63466C27.2492 5.1916 27.3991 5.80889 27.3991 6.43521V10.3283C27.3991 10.4718 27.3419 10.6094 27.2401 10.7109C27.1383 10.8123 27.0002 10.8693 26.8562 10.8693C26.7122 10.8693 26.5741 10.8123 26.4723 10.7109C26.3705 10.6094 26.3133 10.4718 26.3133 10.3283V6.43521C26.3133 5.98115 26.2045 5.53364 25.9961 5.1299C25.7876 4.72616 25.4855 4.37783 25.1148 4.11388C24.7441 3.84993 24.3156 3.67798 23.8648 3.61231C23.4141 3.54664 22.9541 3.58915 22.5231 3.73632L1.71865 10.8401C1.66206 10.8595 1.60262 10.8694 1.54277 10.8693Z"
                                fill="currentColor" stroke="currentColor" stroke-width="0.4" />
                            <path
                                d="M31.4044 25.5872C31.0189 25.5871 30.642 25.473 30.3215 25.2595C30.001 25.0459 29.7513 24.7424 29.6038 24.3874C29.4563 24.0323 29.4178 23.6417 29.4931 23.2648C29.5684 22.8879 29.7541 22.5418 30.0267 22.2701C30.2994 21.9984 30.6467 21.8134 31.0249 21.7385C31.403 21.6635 31.7949 21.702 32.1511 21.8491C32.5073 21.9962 32.8117 22.2452 33.0259 22.5648C33.2401 22.8843 33.3544 23.2599 33.3544 23.6442C33.3539 24.1595 33.1483 24.6535 32.7827 25.0178C32.4171 25.3821 31.9214 25.5869 31.4044 25.5872ZM31.4044 22.7839C31.2336 22.7839 31.0666 22.8344 30.9245 22.929C30.7825 23.0236 30.6718 23.1581 30.6064 23.3154C30.5411 23.4727 30.524 23.6459 30.5574 23.8129C30.5907 23.9799 30.6731 24.1333 30.7939 24.2536C30.9147 24.374 31.0687 24.4559 31.2363 24.4891C31.4038 24.5223 31.5775 24.5051 31.7353 24.4399C31.8931 24.3747 32.028 24.2642 32.1228 24.1226C32.2177 23.981 32.2682 23.8145 32.2681 23.6442C32.268 23.416 32.1769 23.1971 32.015 23.0358C31.853 22.8745 31.6334 22.7839 31.4044 22.7839Z"
                                fill="currentColor" stroke="currentColor" stroke-width="0.4" />
                        </svg>
                        <p class="no-margin">Wallets</p>
                    </a>
                    <a href="#pay_opt_3" class="tab-link">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M27.9163 38.9987C22.5425 38.9987 16.833 37.333 16.833 34.2487C16.833 34.0387 16.9164 33.8374 17.0649 33.6889C17.2133 33.5404 17.4147 33.457 17.6247 33.457C17.8346 33.457 18.036 33.5404 18.1845 33.6889C18.3329 33.8374 18.4163 34.0387 18.4163 34.2487C18.4163 35.5708 22.0295 37.4154 27.9163 37.4154C33.8032 37.4154 37.4163 35.5708 37.4163 34.2487C37.4163 34.0387 37.4998 33.8374 37.6482 33.6889C37.7967 33.5404 37.998 33.457 38.208 33.457C38.418 33.457 38.6193 33.5404 38.7678 33.6889C38.9163 33.8374 38.9997 34.0387 38.9997 34.2487C38.9997 37.333 33.2902 38.9987 27.9163 38.9987Z"
                                fill="currentColor" />
                            <path
                                d="M27.9163 34.2487C22.5425 34.2487 16.833 32.583 16.833 29.4987C16.833 29.2887 16.9164 29.0874 17.0649 28.9389C17.2133 28.7904 17.4147 28.707 17.6247 28.707C17.8346 28.707 18.036 28.7904 18.1845 28.9389C18.3329 29.0874 18.4163 29.2887 18.4163 29.4987C18.4163 30.8208 22.0295 32.6654 27.9163 32.6654C33.8032 32.6654 37.4163 30.8208 37.4163 29.4987C37.4163 29.2887 37.4998 29.0874 37.6482 28.9389C37.7967 28.7904 37.998 28.707 38.208 28.707C38.418 28.707 38.6193 28.7904 38.7678 28.9389C38.9163 29.0874 38.9997 29.2887 38.9997 29.4987C38.9997 32.583 33.2902 34.2487 27.9163 34.2487Z"
                                fill="currentColor" />
                            <path
                                d="M27.9163 29.5C22.5425 29.5 16.833 27.8343 16.833 24.75C16.833 21.6657 22.5425 20 27.9163 20C33.2902 20 38.9997 21.6657 38.9997 24.75C38.9997 27.8343 33.2902 29.5 27.9163 29.5ZM27.9163 21.5833C22.0295 21.5833 18.4163 23.4279 18.4163 24.75C18.4163 26.0721 22.0295 27.9167 27.9163 27.9167C33.8032 27.9167 37.4163 26.0721 37.4163 24.75C37.4163 23.4279 33.8032 21.5833 27.9163 21.5833Z"
                                fill="currentColor" />
                            <path
                                d="M38.2083 35.0404C37.9984 35.0404 37.797 34.957 37.6485 34.8085C37.5001 34.66 37.4167 34.4587 37.4167 34.2487V24.7487C37.4167 24.5387 37.5001 24.3374 37.6485 24.1889C37.797 24.0404 37.9984 23.957 38.2083 23.957C38.4183 23.957 38.6197 24.0404 38.7681 24.1889C38.9166 24.3374 39 24.5387 39 24.7487V34.2487C39 34.4587 38.9166 34.66 38.7681 34.8085C38.6197 34.957 38.4183 35.0404 38.2083 35.0404ZM17.625 35.0404C17.415 35.0404 17.2137 34.957 17.0652 34.8085C16.9167 34.66 16.8333 34.4587 16.8333 34.2487V24.7487C16.8333 24.5387 16.9167 24.3374 17.0652 24.1889C17.2137 24.0404 17.415 23.957 17.625 23.957C17.835 23.957 18.0363 24.0404 18.1848 24.1889C18.3333 24.3374 18.4167 24.5387 18.4167 24.7487V34.2487C18.4167 34.4587 18.3333 34.66 18.1848 34.8085C18.0363 34.957 17.835 35.0404 17.625 35.0404ZM12.0833 19.9987C6.7095 19.9987 1 18.333 1 15.2487C1 15.0387 1.08341 14.8374 1.23187 14.6889C1.38034 14.5404 1.5817 14.457 1.79167 14.457C2.00163 14.457 2.20299 14.5404 2.35146 14.6889C2.49993 14.8374 2.58333 15.0387 2.58333 15.2487C2.58333 16.5708 6.1965 18.4154 12.0833 18.4154C17.9702 18.4154 21.5833 16.5708 21.5833 15.2487C21.5833 15.0387 21.6667 14.8374 21.8152 14.6889C21.9637 14.5404 22.165 14.457 22.375 14.457C22.585 14.457 22.7863 14.5404 22.9348 14.6889C23.0833 14.8374 23.1667 15.0387 23.1667 15.2487C23.1667 18.333 17.4572 19.9987 12.0833 19.9987Z"
                                fill="currentColor" />
                            <path
                                d="M12.0833 15.2487C6.7095 15.2487 1 13.583 1 10.4987C1 10.2887 1.08341 10.0874 1.23187 9.93891C1.38034 9.79044 1.5817 9.70703 1.79167 9.70703C2.00163 9.70703 2.20299 9.79044 2.35146 9.93891C2.49993 10.0874 2.58333 10.2887 2.58333 10.4987C2.58333 11.8208 6.1965 13.6654 12.0833 13.6654C17.9702 13.6654 21.5833 11.8208 21.5833 10.4987C21.5833 10.2887 21.6667 10.0874 21.8152 9.93891C21.9637 9.79044 22.165 9.70703 22.375 9.70703C22.585 9.70703 22.7863 9.79044 22.9348 9.93891C23.0833 10.0874 23.1667 10.2887 23.1667 10.4987C23.1667 13.583 17.4572 15.2487 12.0833 15.2487ZM12.0833 29.4987C6.7095 29.4987 1 27.833 1 24.7487C1 24.5387 1.08341 24.3374 1.23187 24.1889C1.38034 24.0404 1.5817 23.957 1.79167 23.957C2.00163 23.957 2.20299 24.0404 2.35146 24.1889C2.49993 24.3374 2.58333 24.5387 2.58333 24.7487C2.58333 26.0708 6.1965 27.9154 12.0833 27.9154C12.9447 27.9154 13.6952 27.8805 14.3744 27.8093C14.58 27.793 14.7839 27.8575 14.9426 27.9892C15.1014 28.121 15.2024 28.3094 15.2243 28.5145C15.2462 28.7196 15.1871 28.9252 15.0597 29.0874C14.9324 29.2496 14.7467 29.3557 14.5423 29.3831C13.8044 29.4623 13.0001 29.4987 12.0833 29.4987ZM12.0833 34.2487C6.7095 34.2487 1 32.583 1 29.4987C1 29.2887 1.08341 29.0874 1.23187 28.9389C1.38034 28.7904 1.5817 28.707 1.79167 28.707C2.00163 28.707 2.20299 28.7904 2.35146 28.9389C2.49993 29.0874 2.58333 29.2887 2.58333 29.4987C2.58333 30.8208 6.1965 32.6654 12.0833 32.6654C12.9447 32.6654 13.6952 32.6305 14.3744 32.5593C14.58 32.543 14.7839 32.6075 14.9426 32.7392C15.1014 32.871 15.2024 33.0594 15.2243 33.2645C15.2462 33.4696 15.1871 33.6752 15.0597 33.8374C14.9324 33.9996 14.7467 34.1057 14.5423 34.1331C13.8044 34.2123 13.0001 34.2487 12.0833 34.2487ZM12.0833 24.7487C6.7095 24.7487 1 23.083 1 19.9987C1 19.7887 1.08341 19.5874 1.23187 19.4389C1.38034 19.2904 1.5817 19.207 1.79167 19.207C2.00163 19.207 2.20299 19.2904 2.35146 19.4389C2.49993 19.5874 2.58333 19.7887 2.58333 19.9987C2.58333 21.3208 6.1965 23.1654 12.0833 23.1654C12.9447 23.1654 13.6952 23.1305 14.3744 23.0593C14.4792 23.0452 14.5858 23.0523 14.6879 23.0802C14.7899 23.108 14.8853 23.156 14.9685 23.2213C15.0517 23.2866 15.1209 23.3679 15.1722 23.4604C15.2234 23.553 15.2556 23.6548 15.2668 23.76C15.278 23.8652 15.268 23.9715 15.2375 24.0727C15.2069 24.174 15.1563 24.2681 15.0888 24.3495C15.0213 24.4309 14.9381 24.4979 14.8442 24.5466C14.7504 24.5953 14.6477 24.6247 14.5423 24.6331C13.8044 24.7123 13.0001 24.7487 12.0833 24.7487Z"
                                fill="currentColor" />
                            <path
                                d="M12.0833 10.5C6.7095 10.5 1 8.83433 1 5.75C1 2.66567 6.7095 1 12.0833 1C17.4572 1 23.1667 2.66567 23.1667 5.75C23.1667 8.83433 17.4572 10.5 12.0833 10.5ZM12.0833 2.58333C6.1965 2.58333 2.58333 4.42792 2.58333 5.75C2.58333 7.07208 6.1965 8.91667 12.0833 8.91667C17.9702 8.91667 21.5833 7.07208 21.5833 5.75C21.5833 4.42792 17.9702 2.58333 12.0833 2.58333Z"
                                fill="currentColor" />
                            <path
                                d="M1.79167 30.2904C1.5817 30.2904 1.38034 30.207 1.23187 30.0585C1.08341 29.91 1 29.7087 1 29.4987V5.7487C1 5.53873 1.08341 5.33737 1.23187 5.18891C1.38034 5.04044 1.5817 4.95703 1.79167 4.95703C2.00163 4.95703 2.20299 5.04044 2.35146 5.18891C2.49993 5.33737 2.58333 5.53873 2.58333 5.7487V29.4987C2.58333 29.7087 2.49993 29.91 2.35146 30.0585C2.20299 30.207 2.00163 30.2904 1.79167 30.2904ZM22.375 16.0404C22.165 16.0404 21.9637 15.957 21.8152 15.8085C21.6667 15.66 21.5833 15.4587 21.5833 15.2487V5.7487C21.5833 5.53873 21.6667 5.33737 21.8152 5.18891C21.9637 5.04044 22.165 4.95703 22.375 4.95703C22.585 4.95703 22.7863 5.04044 22.9348 5.18891C23.0833 5.33737 23.1667 5.53873 23.1667 5.7487V15.2487C23.1667 15.4587 23.0833 15.66 22.9348 15.8085C22.7863 15.957 22.585 16.0404 22.375 16.0404Z"
                                fill="currentColor" />
                        </svg>
                        <p class="no-margin">Other</p>
                    </a>
                    <a href="#pay_opt_4" class="tab-link">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_2679_2173)">
                                <path
                                    d="M19.6684 38.7037C14.682 38.7037 9.99364 36.7432 6.46798 33.182C2.94233 29.6217 1 24.8873 1 19.8519C1 14.8164 2.94233 10.082 6.46798 6.52171C9.99364 2.96141 14.682 1 19.6684 1C24.6549 1 29.3432 2.96054 32.8689 6.52171C36.3945 10.082 38.3369 14.8164 38.3369 19.8519C38.3369 22.072 37.9582 24.2453 37.211 26.3132C37.1511 26.4802 37.0071 26.6021 36.8341 26.6333C36.661 26.6644 36.4845 26.6004 36.3705 26.4646C35.0468 24.8865 33.1148 23.9806 31.0696 23.9806C27.2415 23.9806 24.1263 27.1256 24.1263 30.9922C24.1263 33.1465 25.0867 35.1512 26.7617 36.4914C26.8997 36.6013 26.9691 36.7778 26.9442 36.9534C26.9194 37.129 26.8029 37.2779 26.6401 37.3445C24.4227 38.246 22.0768 38.7037 19.6684 38.7037ZM19.6684 1.99671C9.9191 1.99671 1.98701 10.0067 1.98701 19.8519C1.98701 29.697 9.9191 37.707 19.6684 37.707C21.6776 37.707 23.6405 37.3713 25.5151 36.7068C23.996 35.2057 23.1401 33.1656 23.1401 30.9913C23.1401 26.5753 26.6975 22.983 31.0696 22.983C33.1225 22.983 35.0742 23.7807 36.5436 25.1971C37.0791 23.4736 37.3498 21.6792 37.3498 19.851C37.3498 10.0067 29.4178 1.99671 19.6684 1.99671Z"
                                    fill="currentColor" stroke="currentColor" stroke-width="0.5" />
                                <path
                                    d="M19.6684 35.2896C11.2385 35.2896 4.38086 28.3645 4.38086 19.8518C4.38086 11.3391 11.2385 4.41406 19.6684 4.41406C28.0983 4.41406 34.956 11.3391 34.956 19.8518C34.956 21.3192 34.7512 22.7736 34.3477 24.1744C34.3083 24.3102 34.2149 24.4227 34.0889 24.4841C33.963 24.5455 33.8173 24.5499 33.688 24.4971C32.856 24.1545 31.9752 23.9814 31.0705 23.9814C27.2424 23.9814 24.1271 27.1264 24.1271 30.993C24.1271 31.9871 24.3293 32.9484 24.7277 33.849C24.7851 33.978 24.7851 34.125 24.7286 34.254C24.672 34.3829 24.5641 34.4815 24.4313 34.5256C22.8959 35.0326 21.2937 35.2896 19.6684 35.2896ZM19.6684 5.41077C11.7826 5.41077 5.36787 11.8894 5.36787 19.8518C5.36787 27.8151 11.7835 34.2929 19.6684 34.2929C21.0119 34.2929 22.3373 34.1051 23.6173 33.734C23.3003 32.8575 23.1401 31.9378 23.1401 30.9913C23.1401 26.5753 26.6975 22.983 31.0696 22.983C31.9161 22.983 32.7438 23.1162 33.538 23.3793C33.8242 22.2294 33.969 21.0449 33.969 19.851C33.969 11.8885 27.5542 5.41077 19.6684 5.41077Z"
                                    fill="currentColor" stroke="currentColor" stroke-width="0.5" />
                                <path
                                    d="M19.6684 8.88455C19.396 8.88455 19.1749 8.66133 19.1749 8.3862V4.91242C19.1749 4.63728 19.396 4.41406 19.6684 4.41406C19.9409 4.41406 20.1619 4.63728 20.1619 4.91242V8.3862C20.1619 8.66133 19.9409 8.88455 19.6684 8.88455ZM34.4625 20.3502H31.0225C30.75 20.3502 30.529 20.127 30.529 19.8518C30.529 19.5767 30.75 19.3535 31.0225 19.3535H34.4625C34.7349 19.3535 34.956 19.5767 34.956 19.8518C34.956 20.127 34.7349 20.3502 34.4625 20.3502ZM19.6684 35.2896C19.396 35.2896 19.1749 35.0664 19.1749 34.7913V31.3175C19.1749 31.0423 19.396 30.8191 19.6684 30.8191C19.9409 30.8191 20.1619 31.0423 20.1619 31.3175V34.7913C20.1619 35.0664 19.9409 35.2896 19.6684 35.2896ZM8.31435 20.3502H4.87437C4.60191 20.3502 4.38086 20.127 4.38086 19.8518C4.38086 19.5767 4.60191 19.3535 4.87437 19.3535H8.31435C8.5868 19.3535 8.80785 19.5767 8.80785 19.8518C8.80785 20.127 8.5868 20.3502 8.31435 20.3502ZM19.6684 22.0754C18.4544 22.0754 17.4665 21.0778 17.4665 19.8518C17.4665 18.6258 18.4544 17.6283 19.6684 17.6283C20.8825 17.6283 21.8704 18.6258 21.8704 19.8518C21.8704 21.0778 20.8825 22.0754 19.6684 22.0754ZM19.6684 18.625C18.9984 18.625 18.4535 19.1752 18.4535 19.8518C18.4535 20.5284 18.9984 21.0787 19.6684 21.0787C20.3384 21.0787 20.8833 20.5284 20.8833 19.8518C20.8833 19.1752 20.3384 18.625 19.6684 18.625Z"
                                    fill="currentColor" stroke="currentColor" stroke-width="0.5" />
                                <path
                                    d="M19.6688 18.6264C19.3963 18.6264 19.1753 18.4032 19.1753 18.128V11.1312C19.1753 10.856 19.3963 10.6328 19.6688 10.6328C19.9413 10.6328 20.1623 10.856 20.1623 11.1312V18.128C20.1623 18.4032 19.9413 18.6264 19.6688 18.6264ZM21.0756 19.3731C20.9583 19.3731 20.8409 19.3307 20.7466 19.2459C20.5436 19.0625 20.5264 18.7467 20.7089 18.5425L24.2363 14.5712C24.2795 14.5224 24.3318 14.4827 24.3902 14.4544C24.4487 14.4261 24.5121 14.4097 24.5768 14.4062C24.6415 14.4026 24.7062 14.412 24.7673 14.4338C24.8285 14.4556 24.8847 14.4894 24.9329 14.5331C25.1359 14.7166 25.1531 15.0324 24.9706 15.2365L21.4432 19.2078C21.3968 19.2598 21.3401 19.3013 21.2767 19.3298C21.2134 19.3582 21.1449 19.373 21.0756 19.3731ZM31.07 39.001C26.697 39.001 23.1396 35.4087 23.1396 30.9927C23.1396 26.5767 26.697 22.9844 31.07 22.9844C35.443 22.9844 39.0004 26.5767 39.0004 30.9927C39.0004 35.4087 35.443 39.001 31.07 39.001ZM31.07 23.982C27.2419 23.982 24.1266 27.127 24.1266 30.9936C24.1266 34.8602 27.241 38.0052 31.07 38.0052C34.899 38.0052 38.0134 34.8602 38.0134 30.9936C38.0134 27.127 34.899 23.982 31.07 23.982Z"
                                    fill="currentColor" stroke="currentColor" stroke-width="0.5" />
                                <path
                                    d="M31.0694 35.9038C29.5923 35.9038 28.3911 34.6908 28.3911 33.1992C28.3911 32.924 28.6122 32.7008 28.8846 32.7008C29.1571 32.7008 29.3781 32.924 29.3781 33.1992C29.3781 34.1414 30.1372 34.9071 31.0694 34.9071C32.0024 34.9071 32.7607 34.1405 32.7607 33.1992C32.7607 32.2578 32.0016 31.4913 31.0694 31.4913C29.5923 31.4913 28.3911 30.2783 28.3911 28.7866C28.3911 27.295 29.5923 26.082 31.0694 26.082C32.5465 26.082 33.7477 27.295 33.7477 28.7866C33.7477 29.0618 33.5267 29.285 33.2542 29.285C32.9818 29.285 32.7607 29.0618 32.7607 28.7866C32.7607 27.8444 32.0016 27.0787 31.0694 27.0787C30.1372 27.0787 29.3781 27.8453 29.3781 28.7866C29.3781 29.728 30.1372 30.4946 31.0694 30.4946C32.5465 30.4946 33.7477 31.7076 33.7477 33.1992C33.7477 34.6908 32.5465 35.9038 31.0694 35.9038Z"
                                    fill="currentColor" stroke="currentColor" stroke-width="0.5" />
                                <path
                                    d="M31.0697 36.6765C30.7972 36.6765 30.5762 36.4532 30.5762 36.1781V25.807C30.5762 25.5318 30.7972 25.3086 31.0697 25.3086C31.3421 25.3086 31.5632 25.5318 31.5632 25.807V36.1781C31.5632 36.4532 31.343 36.6765 31.0697 36.6765Z"
                                    fill="currentColor" stroke="currentColor" stroke-width="0.5" />
                            </g>
                            <defs>
                                <clipPath id="clip0_2679_2173">
                                    <rect width="40" height="40" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p class="no-margin">Due Payment</p>
                    </a>
                </div>
            </div>
            <div class="tabs">
                <div id="pay_opt_1" class="page-content tab">
                    <label class="captured_amount-text">Captured Amount:</label>
                    <div class="user-amount-input">
                        <label class="enter_amount-text">Enter Amount<span>*</span></label>
                        <div class="enter_amount-inputs">
                            <input type="text" name="enter_amount" id="enter_amount" class="enter_amount">
                            <button class="save-amount-btn">Save</button>
                        </div>
                    </div>
                    <hr class="dashed-line-devider">
                    <div class="payment-details">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.4667 7.39793H9.82716C9.46484 7.39793 9.16437 7.09746 9.16437 6.73514C9.16437 6.37281 9.46484 6.07235 9.82716 6.07235H14.4667C14.6425 6.07235 14.8111 6.14218 14.9354 6.26647C15.0597 6.39077 15.1295 6.55936 15.1295 6.73514C15.1295 6.91092 15.0597 7.0795 14.9354 7.2038C14.8111 7.3281 14.6425 7.39793 14.4667 7.39793ZM5.18763 8.06956C5.01972 8.06956 4.85182 8.0077 4.71926 7.87514L4.05647 7.21235C3.80019 6.95607 3.80019 6.53188 4.05647 6.2756C4.31275 6.01932 4.73693 6.01932 4.99321 6.2756L5.18763 6.47002L6.70763 4.95002C6.96391 4.69374 7.38809 4.69374 7.64437 4.95002C7.90065 5.2063 7.90065 5.63049 7.64437 5.88677L5.656 7.87514C5.53182 7.99947 5.36335 8.0694 5.18763 8.06956ZM14.4667 13.584H9.82716C9.46484 13.584 9.16437 13.2835 9.16437 12.9212C9.16437 12.5589 9.46484 12.2584 9.82716 12.2584H14.4667C14.6425 12.2584 14.8111 12.3282 14.9354 12.4525C15.0597 12.5768 15.1295 12.7454 15.1295 12.9212C15.1295 13.097 15.0597 13.2656 14.9354 13.3898C14.8111 13.5141 14.6425 13.584 14.4667 13.584ZM5.18763 14.2556C5.01972 14.2556 4.85182 14.1937 4.71926 14.0612L4.05647 13.3984C3.80019 13.1421 3.80019 12.7179 4.05647 12.4617C4.31275 12.2054 4.73693 12.2054 4.99321 12.4617L5.18763 12.6561L6.70763 11.1361C6.96391 10.8798 7.38809 10.8798 7.64437 11.1361C7.90065 11.3923 7.90065 11.8165 7.64437 12.0728L5.656 14.0612C5.53182 14.1855 5.36335 14.2554 5.18763 14.2556Z"
                                fill="currentColor" />
                            <path
                                d="M12.1512 19H6.84884C2.05023 19 0 16.9498 0 12.1512V6.84884C0 2.05023 2.05023 0 6.84884 0H12.1512C16.9498 0 19 2.05023 19 6.84884V12.1512C19 16.9498 16.9498 19 12.1512 19ZM6.84884 1.32558C2.77488 1.32558 1.32558 2.77488 1.32558 6.84884V12.1512C1.32558 16.2251 2.77488 17.6744 6.84884 17.6744H12.1512C16.2251 17.6744 17.6744 16.2251 17.6744 12.1512V6.84884C17.6744 2.77488 16.2251 1.32558 12.1512 1.32558H6.84884Z"
                                fill="currentColor" />
                        </svg>
                        <label class="enter_amount-text">Payment Summary</label>
                        <label class="enter_amount-text">$38.00</label>
                    </div>
                    <hr class="dashed-line-devider">
                    <div class="payment-details">
                        <label class="enter_amount-text">Pay via cash</label>
                        <label class="enter_amount-text">$38.00</label>
                    </div>
                    <hr class="dashed-line-devider">
                </div>
                <div id="pay_opt_2" class="page-content tab"></div>
                <div id="pay_opt_3" class="page-content tab">
                    <div class="other-pay-method">
                        <label class="other-method-text">Other</label>
                        <div class="other-method-selector">
                            <select name="other-method" id="other-method" class="other-method">
                                <option value="paytm">Paytm</option>
                            </select>
                        </div>
                    </div>
                    <div class="add-comments">
                        <label class="comment-text">Comments</label>
                        <div class="comment-text-area">
                            <textarea name="add-comment-text" id="add-comment-text" rows="1"></textarea>
                        </div>
                    </div>
                    <label class="captured_amount-text">Captured Amount:</label>
                    <div class="user-amount-input">
                        <label class="enter_amount-text">Enter Amount<span>*</span></label>
                        <div class="enter_amount-inputs">
                            <input type="text" name="enter_amount" id="enter_amount" class="enter_amount">
                            <button class="save-amount-btn">Save</button>
                        </div>
                    </div>
                    <hr class="dashed-line-devider">
                    <div class="payment-details">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.4667 7.39793H9.82716C9.46484 7.39793 9.16437 7.09746 9.16437 6.73514C9.16437 6.37281 9.46484 6.07235 9.82716 6.07235H14.4667C14.6425 6.07235 14.8111 6.14218 14.9354 6.26647C15.0597 6.39077 15.1295 6.55936 15.1295 6.73514C15.1295 6.91092 15.0597 7.0795 14.9354 7.2038C14.8111 7.3281 14.6425 7.39793 14.4667 7.39793ZM5.18763 8.06956C5.01972 8.06956 4.85182 8.0077 4.71926 7.87514L4.05647 7.21235C3.80019 6.95607 3.80019 6.53188 4.05647 6.2756C4.31275 6.01932 4.73693 6.01932 4.99321 6.2756L5.18763 6.47002L6.70763 4.95002C6.96391 4.69374 7.38809 4.69374 7.64437 4.95002C7.90065 5.2063 7.90065 5.63049 7.64437 5.88677L5.656 7.87514C5.53182 7.99947 5.36335 8.0694 5.18763 8.06956ZM14.4667 13.584H9.82716C9.46484 13.584 9.16437 13.2835 9.16437 12.9212C9.16437 12.5589 9.46484 12.2584 9.82716 12.2584H14.4667C14.6425 12.2584 14.8111 12.3282 14.9354 12.4525C15.0597 12.5768 15.1295 12.7454 15.1295 12.9212C15.1295 13.097 15.0597 13.2656 14.9354 13.3898C14.8111 13.5141 14.6425 13.584 14.4667 13.584ZM5.18763 14.2556C5.01972 14.2556 4.85182 14.1937 4.71926 14.0612L4.05647 13.3984C3.80019 13.1421 3.80019 12.7179 4.05647 12.4617C4.31275 12.2054 4.73693 12.2054 4.99321 12.4617L5.18763 12.6561L6.70763 11.1361C6.96391 10.8798 7.38809 10.8798 7.64437 11.1361C7.90065 11.3923 7.90065 11.8165 7.64437 12.0728L5.656 14.0612C5.53182 14.1855 5.36335 14.2554 5.18763 14.2556Z"
                                fill="currentColor" />
                            <path
                                d="M12.1512 19H6.84884C2.05023 19 0 16.9498 0 12.1512V6.84884C0 2.05023 2.05023 0 6.84884 0H12.1512C16.9498 0 19 2.05023 19 6.84884V12.1512C19 16.9498 16.9498 19 12.1512 19ZM6.84884 1.32558C2.77488 1.32558 1.32558 2.77488 1.32558 6.84884V12.1512C1.32558 16.2251 2.77488 17.6744 6.84884 17.6744H12.1512C16.2251 17.6744 17.6744 16.2251 17.6744 12.1512V6.84884C17.6744 2.77488 16.2251 1.32558 12.1512 1.32558H6.84884Z"
                                fill="currentColor" />
                        </svg>
                        <label class="enter_amount-text">Payment Summary</label>
                        <label class="enter_amount-text">$38.00</label>
                    </div>
                    <hr class="dashed-line-devider">
                    <div class="payment-details">
                        <svg class="delete-indicator" width="19" height="19" viewBox="0 0 19 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.8023 19H4.19767C3.08481 18.9986 2.01793 18.5559 1.23102 17.769C0.444107 16.9821 0.00140306 15.9152 0 14.8023V4.19767C0.00140306 3.08481 0.444107 2.01793 1.23102 1.23102C2.01793 0.444107 3.08481 0.00140306 4.19767 0H14.8023C15.9152 0.00140306 16.9821 0.444107 17.769 1.23102C18.5559 2.01793 18.9986 3.08481 19 4.19767V14.8023C18.9986 15.9152 18.5559 16.9821 17.769 17.769C16.9821 18.5559 15.9152 18.9986 14.8023 19ZM4.19767 1.32558C3.43624 1.32652 2.70625 1.62941 2.16783 2.16783C1.62941 2.70625 1.32652 3.43624 1.32558 4.19767V14.8023C1.32652 15.5638 1.62941 16.2938 2.16783 16.8322C2.70625 17.3706 3.43624 17.6735 4.19767 17.6744H14.8023C15.5638 17.6735 16.2938 17.3706 16.8322 16.8322C17.3706 16.2938 17.6735 15.5638 17.6744 14.8023V4.19767C17.6735 3.43624 17.3706 2.70625 16.8322 2.16783C16.2938 1.62941 15.5638 1.32652 14.8023 1.32558H4.19767Z"
                                fill="currentColor" />
                            <path
                                d="M5.89928 14C5.72138 13.9998 5.54751 13.9468 5.39964 13.8477C5.25177 13.7485 5.13653 13.6077 5.06847 13.4429C5.00041 13.2781 4.98259 13.0969 5.01725 12.9219C5.05192 12.747 5.13751 12.5863 5.26323 12.4602L12.4638 5.24215C12.6344 5.08278 12.8601 4.99602 13.0933 5.00014C13.3264 5.00426 13.5489 5.09896 13.7138 5.26426C13.8787 5.42957 13.9732 5.65259 13.9773 5.88633C13.9814 6.12008 13.8949 6.3463 13.7359 6.51733L6.53533 13.7353C6.45207 13.8195 6.35297 13.8862 6.24378 13.9316C6.1346 13.977 6.0175 14.0003 5.89928 14Z"
                                fill="currentColor" />
                            <path
                                d="M13.1006 14C12.9824 14.0003 12.8653 13.977 12.7561 13.9316C12.6469 13.8862 12.5478 13.8195 12.4646 13.7353L5.26403 6.51733C5.10504 6.3463 5.01849 6.12008 5.0226 5.88633C5.02672 5.65259 5.12118 5.42957 5.28609 5.26426C5.45099 5.09896 5.67347 5.00426 5.90665 5.00014C6.13983 4.99602 6.36551 5.08278 6.53613 5.24215L13.7367 12.4602C13.8624 12.5863 13.948 12.747 13.9827 12.9219C14.0173 13.0969 13.9995 13.2781 13.9314 13.4429C13.8634 13.6077 13.7481 13.7485 13.6003 13.8477C13.4524 13.9468 13.2785 13.9998 13.1006 14Z"
                                fill="#F33E3E" />
                        </svg>
                        <label class="enter_amount-text">Pay via Other (Paytm)</label>
                        <label class="enter_amount-text">$38.00</label>
                    </div>
                    <hr class="dashed-line-devider">
                    <div class="payment-details">
                        <label class="enter_amount-text">Pay via cash</label>
                        <label class="enter_amount-text">$38.00</label>
                    </div>
                    <hr class="dashed-line-devider">
                </div>
                <div id="pay_opt_4" class="page-content tab"></div>
            </div>

            <div class="popup_button">
                <div class="back-to-order-btn">
                    <button class="popup-back-button">Back To Order</button>
                </div>
                <div class="bill-btns">
                    <div class="new-order-btn">
                        <button type="button" class="popup-new-order-button">New Order</button>
                    </div>
                    <div class="print-btn">
                        <button type="button" class="popup-print-button">Print</button>
                    </div>
                    <div class="ebill-btn">
                        <button type="button" class="popup-ebill-button">EBill</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>

    <!-- ========= SPLIT BILL POPUP ========= -->
    <div class="popup split_bill_Popup" id="split_bill_Popup">
        <div class="data-form add_table_view-data-form">
            <div class="text-align-center table_view-popup_title">
                Split Bill</div>
            <hr class="popup_title_divider">
            <div class="toolbar tabbar">
                <div class="toolbar-inner">
                    <a href="#split_bill_opt_1" class="tab-link tab-link-active">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M34.8602 9.88302C24.903 -4.68058 2.13243 2.24475 2 19.9541C1.99862 22.3225 2.46595 24.6678 3.37502 26.8545C4.2841 29.0411 5.6169 31.0259 7.2965 32.6942C23.076 47.5963 46.5242 28.2526 34.8602 9.88302ZM35.9602 15.1605L25.6121 24.6886L22.7617 21.8355L34.2283 11.2735C34.9696 12.4895 35.5516 13.7959 35.9602 15.1605ZM33.5064 10.1932L21.8533 20.9264L20.6165 19.6884V16.5909L30.7813 7.23913C31.8043 8.11135 32.7191 9.10309 33.5064 10.1932ZM29.7598 6.43354L20.6171 14.8459V9.36827L26.0229 4.38934C27.3507 4.90805 28.6066 5.59506 29.7598 6.43354ZM19.9736 3.24852C21.5523 3.24888 23.1229 3.4742 24.6382 3.9177L20.6165 7.62069V5.17691C20.6112 5.01003 20.5413 4.85176 20.4215 4.73558C20.3017 4.61941 20.1414 4.55445 19.9746 4.55445C19.8078 4.55445 19.6475 4.61941 19.5277 4.73558C19.4079 4.85176 19.338 5.01003 19.3327 5.17691V19.6884L7.73557 31.2967C-2.10206 20.8221 5.46757 3.20348 19.9736 3.24852ZM19.9736 36.6591C15.7701 36.6616 11.7216 35.0702 8.64328 32.2052L19.9743 20.8633L29.9578 30.8559C30.0795 30.9698 30.2406 31.0319 30.4072 31.0291C30.5738 31.0263 30.7327 30.9588 30.8505 30.8409C30.9683 30.723 31.0357 30.5639 31.0385 30.3972C31.0413 30.2305 30.9793 30.0692 30.8655 29.9474L30.2825 29.3638L36.1832 23.9248C35.2908 27.5546 33.2096 30.7808 30.2717 33.0887C27.3338 35.3966 23.7083 36.654 19.9736 36.6591ZM29.3748 28.4546L26.5205 25.5977L36.3208 16.5754C36.6763 18.3054 36.7555 20.0808 36.5555 21.8355L29.3748 28.4546Z"
                                fill="currentColor" />
                        </svg>
                        <p class="no-margin">Portion Wise</p>
                    </a>
                    <a href="#split_bill_opt_2" class="tab-link">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.0023 2C15.2286 2.00249 10.6511 3.89996 7.27551 7.27551C3.89996 10.6511 2.00249 15.2286 2 20.0023C2.00311 24.7755 3.90093 29.3522 7.27648 32.7268C10.652 36.1015 15.2292 37.9981 20.0023 38C24.775 37.9981 29.3517 36.1014 32.7265 32.7265C36.1014 29.3517 37.9981 24.775 38 20.0023C37.9981 15.2292 36.1015 10.652 32.7268 7.27648C29.3522 3.90093 24.7755 2.00311 20.0023 2ZM20.0023 3.24332C22.2034 3.2424 24.3831 3.67525 26.4168 4.51714C28.4506 5.35903 30.2984 6.59346 31.8548 8.14986C33.4112 9.70627 34.6457 11.5541 35.4875 13.5878C36.3294 15.6216 36.7623 17.8013 36.7614 20.0023C36.7623 22.2034 36.3294 24.3831 35.4875 26.4168C34.6457 28.4506 33.4112 30.2984 31.8548 31.8548C30.2984 33.4112 28.4506 34.6457 26.4168 35.4875C24.3831 36.3294 22.2034 36.7623 20.0023 36.7614C17.8011 36.7626 15.6211 36.33 13.5871 35.4882C11.5531 34.6465 9.705 33.4121 8.14835 31.8557C6.59169 30.2992 5.35706 28.4513 4.51502 26.4174C3.67298 24.3835 3.24005 22.2036 3.24097 20.0023C3.23974 17.8009 3.67245 15.6207 4.51435 13.5866C5.35625 11.5524 6.59083 9.7042 8.14752 8.14752C9.7042 6.59083 11.5524 5.35625 13.5866 4.51435C15.6207 3.67245 17.8009 3.24209 20.0023 3.24332Z"
                                fill="currentColor" />
                            <path
                                d="M20.0021 5.72266C16.2151 5.72452 12.5838 7.22988 9.90623 9.90789C7.22866 12.5859 5.7239 16.2175 5.72266 20.0044C5.72514 23.7902 7.23013 27.4202 9.90706 30.0971C12.584 32.774 16.214 34.279 19.9997 34.2815C23.7855 34.279 27.4155 32.774 30.0924 30.0971C32.7693 27.4202 34.2743 23.7902 34.2768 20.0044C34.2756 16.2183 32.7714 12.5874 30.0949 9.90955C27.4183 7.23167 23.7882 5.72576 20.0021 5.72266ZM20.0021 6.96598C21.7142 6.96505 23.4096 7.30163 24.9915 7.95645C26.5734 8.61128 28.0107 9.57151 29.2212 10.7822C30.4317 11.993 31.3917 13.4304 32.0463 15.0125C32.7008 16.5945 33.0371 18.29 33.0358 20.0021C33.0368 21.714 32.7003 23.4092 32.0456 24.991C31.3909 26.5727 30.4309 28.0099 29.2204 29.2204C28.0099 30.4309 26.5727 31.3909 24.991 32.0456C23.4092 32.7003 21.714 33.0368 20.0021 33.0358C18.29 33.0371 16.5945 32.7008 15.0125 32.0463C13.4304 31.3917 11.993 30.4317 10.7822 29.2212C9.57151 28.0107 8.61128 26.5734 7.95645 24.9915C7.30163 23.4096 6.96505 21.7142 6.96598 20.0021C6.96474 18.2898 7.30109 16.5941 7.95578 15.0119C8.61047 13.4297 9.57065 11.9922 10.7814 10.7814C11.9922 9.57065 13.4297 8.61047 15.0119 7.95578C16.5941 7.30109 18.2898 6.96474 20.0021 6.96598Z"
                                fill="currentColor" />
                            <path
                                d="M19.3784 2.625V6.34792H20.6217V2.62735L19.3784 2.625ZM19.3784 33.6564V37.3817H20.6217V33.6564H19.3784ZM33.6554 19.384V20.6273H37.3807V19.384H33.6554ZM2.62402 19.3793V20.6227H6.34695V19.377L2.62402 19.3793ZM32.3464 7.75546L29.6111 10.2796L30.4533 11.1922L33.1886 8.66801L32.3464 7.75546ZM9.55143 28.8145L6.81612 31.3387L7.66065 32.2512L10.3913 29.7224L9.55143 28.8145ZM30.2844 29.0115L29.4211 29.903L32.1118 32.4835L32.9681 31.592L30.2844 29.0115ZM7.89289 7.52087L7.03429 8.41465L9.72033 10.9951L10.5813 10.0967L7.89289 7.52087Z"
                                fill="currentColor" />
                            <path
                                d="M13.4164 13.4184C13.3586 13.4761 13.3127 13.5447 13.2815 13.6201C13.2502 13.6956 13.2341 13.7765 13.2341 13.8582C13.2341 13.9399 13.2502 14.0208 13.2815 14.0963C13.3127 14.1718 13.3586 14.2403 13.4164 14.2981L25.7042 26.5858C25.7619 26.6436 25.8305 26.6895 25.906 26.7208C25.9814 26.7521 26.0623 26.7682 26.144 26.7682C26.2257 26.7682 26.3066 26.7521 26.3821 26.7208C26.4576 26.6895 26.5261 26.6436 26.5839 26.5858C26.6417 26.5281 26.6876 26.4595 26.7188 26.3841C26.7501 26.3086 26.7662 26.2277 26.7662 26.146C26.7662 26.0643 26.7501 25.9834 26.7188 25.9079C26.6876 25.8324 26.6417 25.7639 26.5839 25.7061L14.2961 13.4184C14.2384 13.3606 14.1698 13.3147 14.0943 13.2834C14.0189 13.2521 13.938 13.236 13.8563 13.236C13.7746 13.236 13.6937 13.2521 13.6182 13.2834C13.5427 13.3147 13.4742 13.3606 13.4164 13.4184ZM24.3436 12.5527C22.6381 12.5527 21.2423 13.9532 21.2423 15.6587C21.2423 17.3665 22.6381 18.7623 24.3436 18.76C26.0514 18.76 27.4519 17.3665 27.4519 15.6587C27.4519 13.9509 26.0514 12.5527 24.3436 12.5527ZM24.3436 13.7961C25.3804 13.7961 26.2085 14.6242 26.2085 15.6587C26.2085 16.6932 25.3804 17.519 24.3436 17.519C24.0988 17.5205 23.8562 17.4735 23.6298 17.3805C23.4034 17.2876 23.1977 17.1506 23.0247 16.9776C22.8516 16.8045 22.7146 16.5988 22.6217 16.3724C22.5288 16.146 22.4817 15.9034 22.4833 15.6587C22.4817 15.4137 22.5287 15.1709 22.6216 14.9442C22.7145 14.7176 22.8514 14.5116 23.0244 14.3382C23.1974 14.1647 23.403 14.0273 23.6295 13.9339C23.8559 13.8404 24.0986 13.7951 24.3436 13.7961ZM15.6567 21.2443C13.9513 21.2443 12.5508 22.6401 12.5508 24.3455C12.5539 25.1685 12.882 25.957 13.4638 26.5392C14.0455 27.1214 14.8337 27.4501 15.6567 27.4538C17.3645 27.4538 18.758 26.0533 18.7603 24.3455C18.7603 22.6401 17.3645 21.2443 15.6567 21.2443ZM15.6567 22.4876C16.6936 22.4876 17.517 23.3086 17.517 24.3455C17.5186 24.5905 17.4716 24.8333 17.3787 25.06C17.2858 25.2866 17.1489 25.4926 16.9759 25.6661C16.8029 25.8395 16.5973 25.9769 16.3708 26.0703C16.1444 26.1638 15.9017 26.2114 15.6567 26.2105C15.4116 26.2114 15.1686 26.1638 14.9419 26.0704C14.7153 25.977 14.5093 25.8397 14.3359 25.6663C14.1626 25.493 14.0252 25.287 13.9318 25.0603C13.8384 24.8336 13.7908 24.5907 13.7918 24.3455C13.7908 24.1006 13.8385 23.8579 13.9319 23.6314C14.0254 23.405 14.1628 23.1993 14.3362 23.0263C14.5096 22.8534 14.7156 22.7165 14.9423 22.6236C15.169 22.5307 15.4118 22.4837 15.6567 22.4852V22.4876Z"
                                fill="currentColor" />
                        </svg>
                        <p class="no-margin">Percentage Wise</p>
                    </a>
                    <a href="#split_bill_opt_3" class="tab-link">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.09756 3.5C3.81463 3.5 2 5.379 2 7.61032C2 9.90036 3.87317 11.7206 6.09756 11.7206C8.38049 11.7206 10.1951 9.84164 10.1951 7.61032C10.1951 5.32028 8.32195 3.5 6.09756 3.5ZM6.09756 9.66548C4.98537 9.66548 4.04878 8.72598 4.04878 7.61032C4.04878 6.49466 4.98537 5.55516 6.09756 5.55516C7.20976 5.55516 8.14634 6.49466 8.14634 7.61032C8.14634 8.72598 7.20976 9.66548 6.09756 9.66548ZM6.09756 15.8897C3.81463 15.8897 2 17.7687 2 20C2 22.29 3.87317 24.1103 6.09756 24.1103C8.38049 24.1103 10.1951 22.2313 10.1951 20C10.1951 17.71 8.32195 15.8897 6.09756 15.8897ZM6.09756 22.0552C4.98537 22.0552 4.04878 21.1157 4.04878 20C4.04878 18.8843 4.98537 17.9448 6.09756 17.9448C7.20976 17.9448 8.14634 18.8843 8.14634 20C8.14634 21.1157 7.20976 22.0552 6.09756 22.0552ZM6.09756 28.2794C3.81463 28.2794 2 30.1584 2 32.3897C2 34.621 3.87317 36.5 6.09756 36.5C8.38049 36.5 10.1951 34.621 10.1951 32.3897C10.1951 30.1584 8.32195 28.2794 6.09756 28.2794ZM6.09756 34.4448C4.98537 34.4448 4.04878 33.5053 4.04878 32.3897C4.04878 31.274 4.98537 30.3345 6.09756 30.3345C7.20976 30.3345 8.14634 31.274 8.14634 32.3897C8.14634 33.5053 7.20976 34.4448 6.09756 34.4448ZM15.3463 8.66726H36.9463C37.5317 8.66726 38 8.19751 38 7.61032C38 7.02313 37.5317 6.6121 36.9463 6.6121H15.3463C14.761 6.6121 14.2927 7.08185 14.2927 7.66904C14.2927 8.25623 14.761 8.66726 15.3463 8.66726ZM36.9463 19.0018H15.3463C14.761 19.0018 14.2927 19.4715 14.2927 20.0587C14.2927 20.6459 14.761 21.1157 15.3463 21.1157H36.9463C37.5317 21.1157 38 20.6459 38 20.0587C38 19.4715 37.5317 19.0018 36.9463 19.0018ZM36.9463 31.3327H15.3463C14.761 31.3327 14.2927 31.8025 14.2927 32.3897C14.2927 32.9769 14.761 33.4466 15.3463 33.4466H36.9463C37.5317 33.4466 38 32.9769 38 32.3897C38 31.8025 37.5317 31.3327 36.9463 31.3327Z"
                                fill="currentColor" />
                        </svg>
                        <p class="no-margin">Item Wise</p>
                    </a>
                </div>
            </div>
            <div class="tabs">
                <div id="split_bill_opt_1" class="page-content tab tab-active">
                    <div class="portion_calc">
                        <label class="portion_split-text">Please enter number in which bill can be splited:</label>
                        <div class="portion_split-input">
                            <p class="main-portion no-margin">1/</p>
                            <input type="text" name="enter_portions" id="enter_portions" class="enter_portions"
                                placeholder="Enter portion here.">
                        </div>
                    </div>
                    <div class="popup_button">
                        <div class="cancel_save-btns">
                            <div class="cancel-split-btn">
                                <button class="popup-cancel-split-button">Cancel</button>
                            </div>
                            <div class="save-split-btn">
                                <button type="button" class="popup-save-split-button">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="split_bill_opt_2" class="page-content tab">
                    <h3 class="percentage-split-heading no-margin">Please provide only number</h3>
                    <div class="percentage_split_calc">
                        <div class="percentage-input-1">
                            <label class="percentage_split-text">Percentage Number</label>
                            <div class="percentage_split-input-1">
                                <input type="text" name="enter_percentages" id="enter_percentages"
                                    class="enter_percentages" placeholder="Enter percentage here like 80">
                            </div>
                        </div>
                        <div class="percentage-input-2">
                            <label class="percentage_split-text">Percentage Number</label>
                            <div class="percentage_split-input-2">
                                <input type="text" name="enter_percentages" id="enter_percentages"
                                    class="enter_percentages" placeholder="Enter percentage here like 20">
                            </div>
                        </div>
                    </div>
                    <div class="popup_button popup-btns-for-portion-split">
                        <div class="add-more-btn">
                            <button class="popup-add-more-button">Add More</button>
                        </div>
                        <div class="cancel_save-btns">
                            <div class="cancel-split-btn">
                                <button class="popup-cancel-split-button">Cancel</button>
                            </div>
                            <div class="save-split-btn">
                                <button type="button" class="popup-save-split-button">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="split_bill_opt_3" class="page-content tab">
                    <div class="item_wise">
                        <ul class="all-items">
                            <li class="all-items-selector"><input class="all-items-selector-input" type="checkbox"
                                    name="All_Items" id="All_Items" value="All Items" /> <label for="All_Items">All
                                    Items</label></li>
                            <ul class="all-items-list">
                                <li class="all_items-item">
                                    <input type="checkbox" name="All_Items-list" id="All_Items-list"
                                        value="Masala Dosa" /> <label for="All_Items-list">Masala Dosa</label>
                                </li>
                                <li class="all_items-item">
                                    <input type="checkbox" name="All_Items-list" id="All_Items-list"
                                        value="Paneer Wrap" /> <label for="All_Items-list">Paneer Wrap</label>
                                </li>
                                <li class="all_items-item">
                                    <input type="checkbox" name="All_Items-list" id="All_Items-list"
                                        value="Spl. Shahi Paneer (Half)" /> <label for="All_Items-list">Spl. Shahi
                                        Paneer (Half)</label>
                                </li>
                                <li class="all_items-item">
                                    <input type="checkbox" name="All_Items-list" id="All_Items-list"
                                        value="Mix Veg Soup" /> <label for="All_Items-list">Mix Veg Soup</label>
                                </li>
                                <li class="all_items-item">
                                    <input type="checkbox" name="All_Items-list" id="All_Items-list"
                                        value="Hot And Sour Soup" /> <label for="All_Items-list">Hot And Sour
                                        Soup</label>
                                </li>
                                <li class="all_items-item">
                                    <input type="checkbox" name="All_Items-list" id="All_Items-list"
                                        value="Manchow Soup" /> <label for="All_Items-list">Manchow Soup</label>
                                </li>
                                <li class="all_items-item">
                                    <input type="checkbox" name="All_Items-list" id="All_Items-list"
                                        value="Veg Clear Soup" /> <label for="All_Items-list">Veg Clear Soup</label>
                                </li>
                                <li class="all_items-item">
                                    <input type="checkbox" name="All_Items-list" id="All_Items-list"
                                        value="Paneer Garlic Bread" /> <label for="All_Items-list">Paneer Garlic
                                        Bread</label>
                                </li>
                            </ul>
                        </ul>
                        <div class="add-in-items">
                            <div class="add-items-part-1">
                                <div class="add-items-part-banner">
                                    <button class="add-items-to-list-btn">
                                        <p class="no-margin">Add</p>
                                    </button>
                                    <h4 class="no-margin">Part 1</h4>
                                </div>
                                <div class="list-item-show"></div>
                            </div>
                            <div class="add-items-part-2">
                                <div class="add-items-part-banner">
                                    <button class="add-items-to-list-btn">
                                        <p class="no-margin">Add</p>
                                    </button>
                                    <h4 class="no-margin">Part 2</h4>
                                </div>
                                <div class="list-item-show"></div>
                            </div>
                        </div>
                    </div>
                    <div class="popup_button">
                        <div class="cancel_save-btns">
                            <div class="cancel-split-btn">
                                <button class="popup-cancel-split-button">Cancel</button>
                            </div>
                            <div class="save-split-btn">
                                <button type="button" class="popup-save-split-button">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>

</template>