<template>
    <f7-page>
        <div class="card_header kot_view-header">
            <div class="kot_view-header_inner">
                <div class="kot_view-banner">
                    <h3 class="no-margin no-padding">KOT View
                    </h3>
                </div>
                <div class="kot_view_navbar">
                    <div class="kot_view-sorter">
                        <div class="display-flex align-items-center">
                            <div class="kot_status-represent-delivery"></div>
                            <p class="kot_status-represent-type no-margin no-padding">Delivery</p>
                        </div>
                        <div class="display-flex align-items-center">
                            <div class="kot_status-represent-pickUp"></div>
                            <p class="kot_status-represent-type no-margin no-padding">Pick Up</p>
                        </div>
                        <div class="display-flex align-items-center">
                            <div class="kot_status-represent-dineIn"></div>
                            <p class="kot_status-represent-type no-margin no-padding">Dine In</p>
                        </div>
                    </div>
                    <div class="kot_view-floor_select">
                        <select class="floor_selector" name="floor_selector" id="floor_selector">
                            <option value="First Floor" selected>First Floor (15)</option>
                            <option value="First Floor">First Floor (15)</option>
                            <option value="First Floor">First Floor (15)</option>
                        </select>
                    </div>
                    <div class="search-bar-wrapper">
                        <form class="searchbar">
                            <div class="searchbar-inner">
                                <div class="searchbar-input-wrap">
                                    <input type="search" placeholder="Enter KOT / Order No." />
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.8698 12.2412L9.64354 9.01493C10.3509 8.16682 10.7778 7.07705 10.7778 5.88884C10.7778 3.19309 8.58465 1 5.88888 1C3.19311 1 1 3.19309 1 5.88884C1 8.5846 3.19311 10.7777 5.88888 10.7777C7.0771 10.7777 8.16687 10.3508 9.01498 9.64348L12.2413 12.8698C12.3281 12.9566 12.4419 13 12.5555 13C12.6692 13 12.783 12.9566 12.8698 12.8698C13.0434 12.6961 13.0434 12.4148 12.8698 12.2412ZM1.88889 5.88884C1.88889 3.68331 3.6831 1.88888 5.88888 1.88888C8.09465 1.88888 9.88887 3.68331 9.88887 5.88884C9.88887 8.09438 8.09465 9.88881 5.88888 9.88881C3.6831 9.88881 1.88889 8.09438 1.88889 5.88884Z"
                                            fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                    </svg>
                                    <span class="input-clear-button"></span>
                                </div>
                                <span class="searchbar-disable-button">Cancel</span>
                            </div>
                        </form>
                    </div>
                    <div class="kot_view_btn">
                        <button class="kot_view-add_table_btn height_40" data-popup=".add_table_Popup"
                            @click="handleButtonClick">
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_2563_5499)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.5 17.15C13.725 17.15 17.15 13.7251 17.15 9.5C17.15 5.27503 13.7251 1.84998 9.5 1.84998C5.27503 1.84998 1.84998 5.27503 1.84998 9.5C1.84998 13.725 5.27503 17.15 9.5 17.15ZM9.5 18C14.1944 18 18 14.1944 18 9.5C18 4.80554 14.1944 1 9.5 1C4.80554 1 1 4.80554 1 9.5C1 14.1944 4.80554 18 9.5 18Z"
                                        fill="currentColor" stroke="currentColor" stroke-width="0.5" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.8996 9.49921C12.8996 9.73386 12.7093 9.9242 12.4747 9.9242H6.5246C6.28986 9.9242 6.09961 9.73386 6.09961 9.49921C6.09961 9.26456 6.28986 9.07422 6.5246 9.07422H12.4746C12.7093 9.07422 12.8996 9.26456 12.8996 9.49921Z"
                                        fill="currentColor" stroke="currentColor" stroke-width="0.5" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.49921 12.8996C9.26456 12.8996 9.07422 12.7093 9.07422 12.4747V6.5246C9.07422 6.28986 9.26456 6.09961 9.49921 6.09961C9.73386 6.09961 9.9242 6.28986 9.9242 6.5246V12.4746C9.9242 12.7093 9.73386 12.8996 9.49921 12.8996Z"
                                        fill="currentColor" stroke="currentColor" stroke-width="0.5" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_2563_5499">
                                        <rect width="19" height="19" fill="currentColor" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <p class="no-margin">Add Table</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-content kot_view_list">
            <div class="grid">
                <div class="kot_view_table_card">
                    <h4 class="kot_view_table_no no-margin">Table : 1</h4>
                    <div class="card-type table_card">
                        <div class="table_card-margin-padding">
                            <div class="kot_table_details">
                                <div class="table_detail text-align-center">
                                    <h4 class="dine-in-number no-margin">6</h4>
                                    <h4 class="dine-in-number-text no-margin">Dine in</h4>
                                </div>
                                <div class="table_detail text-align-center">
                                    <h4 class="kot-number no-margin">1</h4>
                                    <h4 class="kot-number-text no-margin">KOT No. </h4>
                                </div>
                                <div class="table_detail text-align-center">
                                    <h4 class="kot-time-number no-margin">1:35:02</h4>
                                    <h4 class="kot-time-text no-margin">Time</h4>
                                </div>
                            </div>
                            <div class="kot_table-bill-details">
                                <div class="customer-detail">
                                    <h5 class="no-margin">John Doe</h5>
                                    <h5 class="no-margin">25 min ago</h5>
                                </div>
                                <div class="ordered-items-details">
                                    <ol class="ordered-item-details-list no-margin">
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Margherita Pizza</h6>
                                                <h6 class="no-margin">₹ 146.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Vegetarian Hakka Noodles</h6>
                                                <h6 class="no-margin">₹ 256.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Supreme Veggie Burger <span>[Note :
                                                        Strong]</span>
                                                </h6>
                                                <h6 class="no-margin">₹ 100.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Biryani Rice</h6>
                                                <h6 class="no-margin">₹ 100.00</h6>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <div class="bill-pay-details">
                                <div class="total-bill">
                                    <hr class="horizontal-divider">
                                    <div class="ordered_items-total">
                                        <h4 class="ordered_items-total-text no-margin">Total Amount</h4>
                                        <h4 class="ordered_items-total-number no-margin">$38.00</h4>
                                    </div>
                                </div>
                                <div class="order-user-comment">
                                    <p class="no-margin">
                                        Momos me shezwan souce kam dalna or
                                        mayonnaise mat dalna
                                    </p>
                                </div>
                                <div class="bill_buttons">
                                    <div class="server_btn-outer">
                                        <button class="server_btn">Serve</button>
                                    </div>
                                    <div class="pay_btn-outer">
                                        <button class="pay_btn" data-popup="#kot_paybill_popup"
                                            @click="f7.popup.open(`.kot_paybill_popup`);">Pay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kot_view_table_card">
                    <h4 class="kot_view_table_no no-margin">Table : 2</h4>
                    <div class="card-type table_card">
                        <div class="table_card-margin-padding">
                            <div class="kot_table_details">
                                <div class="table_detail text-align-center">
                                    <h4 class="dine-in-number no-margin">4</h4>
                                    <h4 class="dine-in-number-text no-margin">Dine in</h4>
                                </div>
                                <div class="table_detail text-align-center">
                                    <h4 class="kot-number no-margin">2</h4>
                                    <h4 class="kot-number-text no-margin">KOT No. </h4>
                                </div>
                                <div class="table_detail text-align-center">
                                    <h4 class="kot-time-number no-margin">1:35:02</h4>
                                    <h4 class="kot-time-text no-margin">Time</h4>
                                </div>
                            </div>
                            <div class="kot_table-bill-details">
                                <div class="customer-detail">
                                    <h5 class="no-margin">John Doe</h5>
                                    <h5 class="no-margin">25 min ago</h5>
                                </div>
                                <div class="ordered-items-details">
                                    <ol class="ordered-item-details-list no-margin">
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Margherita Pizza</h6>
                                                <h6 class="no-margin">₹ 146.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Vegetarian Hakka Noodles</h6>
                                                <h6 class="no-margin">₹ 256.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Supreme Veggie Burger</h6>
                                                <h6 class="no-margin">₹ 100.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Biryani Rice</h6>
                                                <h6 class="no-margin">₹ 100.00</h6>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <div class="bill-pay-details">
                                <div class="total-bill">
                                    <hr class="horizontal-divider">
                                    <div class="ordered_items-total">
                                        <h4 class="ordered_items-total-text no-margin">Total Amount</h4>
                                        <h4 class="ordered_items-total-number no-margin">$38.00</h4>
                                    </div>
                                </div>
                                <div class="order-user-comment">
                                    <p class="no-margin">
                                        Momos me shezwan souce kam dalna or
                                        mayonnaise mat dalna
                                    </p>
                                </div>
                                <div class="bill_buttons">
                                    <div class="server_btn-outer">
                                        <button class="server_btn">Serve</button>
                                    </div>
                                    <div class="pay_btn-outer">
                                        <button class="pay_btn" data-popup="#kot_paybill_popup"
                                            @click="f7.popup.open(`.kot_paybill_popup`);">Pay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kot_view_table_card">
                    <h4 class="kot_view_table_no no-margin">Table : 3</h4>
                    <div class="card-type table_card">
                        <div class="table_card-margin-padding">
                            <div class="kot_table_details">
                                <div class="table_detail text-align-center">
                                    <h4 class="dine-in-number no-margin">5</h4>
                                    <h4 class="dine-in-number-text no-margin">Dine in</h4>
                                </div>
                                <div class="table_detail text-align-center">
                                    <h4 class="kot-number no-margin">3</h4>
                                    <h4 class="kot-number-text no-margin">KOT No. </h4>
                                </div>
                                <div class="table_detail text-align-center">
                                    <h4 class="kot-time-number no-margin">1:35:02</h4>
                                    <h4 class="kot-time-text no-margin">Time</h4>
                                </div>
                            </div>
                            <div class="kot_table-bill-details">
                                <div class="customer-detail">
                                    <h5 class="no-margin">John Doe</h5>
                                    <h5 class="no-margin">25 min ago</h5>
                                </div>
                                <div class="ordered-items-details">
                                    <ol class="ordered-item-details-list no-margin">
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Margherita Pizza</h6>
                                                <h6 class="no-margin">₹ 146.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Vegetarian Hakka Noodles</h6>
                                                <h6 class="no-margin">₹ 256.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Supreme Veggie Burger</h6>
                                                <h6 class="no-margin">₹ 100.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Biryani Rice</h6>
                                                <h6 class="no-margin">₹ 100.00</h6>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <div class="bill-pay-details">
                                <div class="total-bill">
                                    <hr class="horizontal-divider">
                                    <div class="ordered_items-total">
                                        <h4 class="ordered_items-total-text no-margin">Total Amount</h4>
                                        <h4 class="ordered_items-total-number no-margin">$38.00</h4>
                                    </div>
                                </div>
                                <div class="order-user-comment">
                                    <p class="no-margin">
                                        Momos me shezwan souce kam dalna or
                                        mayonnaise mat dalna
                                    </p>
                                </div>
                                <div class="bill_buttons">
                                    <div class="server_btn-outer">
                                        <button class="server_btn">Serve</button>
                                    </div>
                                    <div class="pay_btn-outer">
                                        <button class="pay_btn" data-popup="#kot_paybill_popup"
                                            @click="f7.popup.open(`.kot_paybill_popup`);">Pay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kot_view_table_card">
                    <h4 class="kot_view_table_no no-margin">Table : 4</h4>
                    <div class="card-type table_card">
                        <div class="table_card-margin-padding">
                            <div class="kot_table_details">
                                <div class="table_detail text-align-center">
                                    <h4 class="dine-in-number no-margin">7</h4>
                                    <h4 class="dine-in-number-text no-margin">Dine in</h4>
                                </div>
                                <div class="table_detail text-align-center">
                                    <h4 class="kot-number no-margin">5</h4>
                                    <h4 class="kot-number-text no-margin">KOT No. </h4>
                                </div>
                                <div class="table_detail text-align-center">
                                    <h4 class="kot-time-number no-margin">1:35:02</h4>
                                    <h4 class="kot-time-text no-margin">Time</h4>
                                </div>
                            </div>
                            <div class="kot_table-bill-details">
                                <div class="customer-detail">
                                    <h5 class="no-margin">John Doe</h5>
                                    <h5 class="no-margin">25 min ago</h5>
                                </div>
                                <div class="ordered-items-details">
                                    <ol class="ordered-item-details-list no-margin">
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Margherita Pizza</h6>
                                                <h6 class="no-margin">₹ 146.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Vegetarian Hakka Noodles</h6>
                                                <h6 class="no-margin">₹ 256.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Supreme Veggie Burger</h6>
                                                <h6 class="no-margin">₹ 100.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Biryani Rice</h6>
                                                <h6 class="no-margin">₹ 100.00</h6>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <div class="bill-pay-details">
                                <div class="total-bill">
                                    <hr class="horizontal-divider">
                                    <div class="ordered_items-total">
                                        <h4 class="ordered_items-total-text no-margin">Total Amount</h4>
                                        <h4 class="ordered_items-total-number no-margin">$38.00</h4>
                                    </div>
                                </div>
                                <div class="order-user-comment">
                                    <p class="no-margin">
                                        Momos me shezwan souce kam dalna or
                                        mayonnaise mat dalna
                                    </p>
                                </div>
                                <div class="bill_buttons">
                                    <div class="server_btn-outer">
                                        <button class="server_btn">Serve</button>
                                    </div>
                                    <div class="pay_btn-outer">
                                        <button class="pay_btn" data-popup="#kot_paybill_popup"
                                            @click="f7.popup.open(`.kot_paybill_popup`);">Pay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kot_view_table_card">
                    <h4 class="kot_view_table_no no-margin">Table : 5</h4>
                    <div class="card-type table_card">
                        <div class="table_card-margin-padding">
                            <div class="kot_table_details">
                                <div class="table_detail text-align-center">
                                    <h4 class="dine-in-number no-margin">2</h4>
                                    <h4 class="dine-in-number-text no-margin">Dine in</h4>
                                </div>
                                <div class="table_detail text-align-center">
                                    <h4 class="kot-number no-margin">6</h4>
                                    <h4 class="kot-number-text no-margin">KOT No. </h4>
                                </div>
                                <div class="table_detail text-align-center">
                                    <h4 class="kot-time-number no-margin">1:35:02</h4>
                                    <h4 class="kot-time-text no-margin">Time</h4>
                                </div>
                            </div>
                            <div class="kot_table-bill-details">
                                <div class="customer-detail">
                                    <h5 class="no-margin">John Doe</h5>
                                    <h5 class="no-margin">25 min ago</h5>
                                </div>
                                <div class="ordered-items-details">
                                    <ol class="ordered-item-details-list no-margin">
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Margherita Pizza</h6>
                                                <h6 class="no-margin">₹ 146.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Vegetarian Hakka Noodles</h6>
                                                <h6 class="no-margin">₹ 256.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Supreme Veggie Burger</h6>
                                                <h6 class="no-margin">₹ 100.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Biryani Rice</h6>
                                                <h6 class="no-margin">₹ 100.00</h6>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <div class="bill-pay-details">
                                <div class="total-bill">
                                    <hr class="horizontal-divider">
                                    <div class="ordered_items-total">
                                        <h4 class="ordered_items-total-text no-margin">Total Amount</h4>
                                        <h4 class="ordered_items-total-number no-margin">$38.00</h4>
                                    </div>
                                </div>
                                <div class="order-user-comment">
                                    <p class="no-margin">
                                        Momos me shezwan souce kam dalna or
                                        mayonnaise mat dalna
                                    </p>
                                </div>
                                <div class="bill_buttons">
                                    <div class="server_btn-outer">
                                        <button class="server_btn">Serve</button>
                                    </div>
                                    <div class="pay_btn-outer">
                                        <button class="pay_btn" data-popup="#kot_paybill_popup"
                                            @click="f7.popup.open(`.kot_paybill_popup`);">Pay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kot_view_table_card">
                    <h4 class="kot_view_table_no no-margin">Table : 6</h4>
                    <div class="card-type table_card">
                        <div class="table_card-margin-padding">
                            <div class="kot_table_details">
                                <div class="table_detail text-align-center">
                                    <h4 class="dine-in-number no-margin">8</h4>
                                    <h4 class="dine-in-number-text no-margin">Dine in</h4>
                                </div>
                                <div class="table_detail text-align-center">
                                    <h4 class="kot-number no-margin">9</h4>
                                    <h4 class="kot-number-text no-margin">KOT No. </h4>
                                </div>
                                <div class="table_detail text-align-center">
                                    <h4 class="kot-time-number no-margin">1:35:02</h4>
                                    <h4 class="kot-time-text no-margin">Time</h4>
                                </div>
                            </div>
                            <div class="kot_table-bill-details">
                                <div class="customer-detail">
                                    <h5 class="no-margin">John Doe</h5>
                                    <h5 class="no-margin">25 min ago</h5>
                                </div>
                                <div class="ordered-items-details">
                                    <ol class="ordered-item-details-list no-margin">
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Margherita Pizza</h6>
                                                <h6 class="no-margin">₹ 146.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Vegetarian Hakka Noodles</h6>
                                                <h6 class="no-margin">₹ 256.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Supreme Veggie Burger</h6>
                                                <h6 class="no-margin">₹ 100.00</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ordered-item">
                                                <h6 class="no-margin">Biryani Rice</h6>
                                                <h6 class="no-margin">₹ 100.00</h6>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <div class="bill-pay-details">
                                <div class="total-bill">
                                    <hr class="horizontal-divider">
                                    <div class="ordered_items-total">
                                        <h4 class="ordered_items-total-text no-margin">Total Amount</h4>
                                        <h4 class="ordered_items-total-number no-margin">$38.00</h4>
                                    </div>
                                </div>
                                <div class="order-user-comment display-none">
                                    <p class="no-margin">
                                        Momos me shezwan souce kam dalna or
                                        mayonnaise mat dalna
                                    </p>
                                </div>
                                <div class="bill_buttons">
                                    <div class="server_btn-outer">
                                        <button class="server_btn">Serve</button>
                                    </div>
                                    <div class="pay_btn-outer">
                                        <button class="pay_btn" data-popup="#kot_paybill_popup"
                                            @click="f7.popup.open(`.kot_paybill_popup`);">Pay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========= KOT-VIEW POPUP ========= -->
        <div class="popup kot_paybill_popup" id="kot_paybill_popup">
            <div class="data-form add_table-data-form">
                <div class="kot_paybill-popup_header">
                    <div class="text-align-center kot_paybill-popup_title">
                        Table No. 4</div>
                    <div class="kot_paybill-popup_edit_btn">
                        <button class="kot_paybill_edit_btn">Edit</button>
                    </div>
                </div>
                <div class="kot_paybill_data">
                    <div class="customer_order_datails">
                        <div class="order_heading">
                            <h5 class="no-margin">Order #1321</h5>
                            <h5 class="no-margin">John Doe</h5>
                        </div>
                    </div>
                    <div class="billed_items">
                        <ol class="billed-order-items">
                            <li>
                                <div class="display-flex align-items-center justify-content-space-between">
                                    <h6 class="no-margin">Margherita Pizza</h6>
                                    <h6 class="no-margin">₹ 146.00</h6>
                                </div>
                            </li>
                            <li>
                                <div class="display-flex align-items-center justify-content-space-between">
                                    <h6 class="no-margin">Vegetarian Hakka Noodles</h6>
                                    <h6 class="no-margin">₹ 256.00</h6>
                                </div>
                            </li>
                            <li>
                                <div class="display-flex align-items-center justify-content-space-between">
                                    <h6 class="no-margin">Supreme Veggie Burger</h6>
                                    <h6 class="no-margin">₹ 100.00</h6>
                                </div>
                            </li>
                            <li>
                                <div class="display-flex align-items-center justify-content-space-between">
                                    <h6 class="no-margin">Biryani Rice</h6>
                                    <h6 class="no-margin">₹ 100.00</h6>
                                </div>
                            </li>
                        </ol>
                    </div>
                    <hr class="horizontal-divider">
                    <div class="pay_bill_total_outer">
                        <div class="pay_bill_subtotal">
                            <h5 class="no-margin">Sub Total</h5>
                            <h5 class="no-margin">$38.00</h5>
                        </div>
                        <hr class="horizontal-divider">
                        <div class="pay_bill_total">
                            <h5 class="no-margin">Total Amount</h5>
                            <h5 class="no-margin">$38.00</h5>
                        </div>
                    </div>
                    <div class="popup_button">
                        <div class="new_order_button">
                            <button class="new_order_btn">New Order</button>
                        </div>
                        <div class="kot_pay_bill_btns">
                            <div class="cancel_pay_button">
                                <button type="button" class="cancel_pay_btn">Cancel</button>
                            </div>
                            <div class="online_pay_button">
                                <button type="button" class="online_pay_btn">Online Pay</button>
                            </div>
                            <div class="cash_pay_button">
                                <button type="button" class="cash_pay_btn">Cash</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
        </div>
    </f7-page>
</template>
<script setup>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input, f7ListItem, f7AccordionContent, f7List, f7AccordionToggle, f7AccordionItem } from 'framework7-vue';
import axios from 'axios';
import { ref } from 'vue';
</script>