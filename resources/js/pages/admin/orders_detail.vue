<template>
    <f7-page>
        <div class="orders_datail_admin_page">
            <div class="orders_datail_header">
                <h2 class="no-margin">Order Details</h2>
                <f7-breadcrumbs>
                    <f7-breadcrumbs-item class="f7-link" active>
                        <f7-link>Dashboard</f7-link>
                    </f7-breadcrumbs-item>
                    <f7-breadcrumbs-separator />
                    <f7-breadcrumbs-item class="f7-link">
                        <f7-link>Orders</f7-link>
                    </f7-breadcrumbs-item>
                    <f7-breadcrumbs-separator />
                    <f7-breadcrumbs-item class="f7-link">
                        <f7-link>Order Details</f7-link>
                    </f7-breadcrumbs-item>
                </f7-breadcrumbs>
            </div>
            <div class="customer_order_detail_cards">
                <div class="customer_detail_card">
                    <div class="card_header">
                        <h3 class="no-margin">Customer</h3>
                    </div>
                    <div class="customer_info">
                        <div class="customer_img">
                            <img src="\assets\images\seederImages\dashboard\customer_details.png">
                        </div>
                        <div class="customer_name">
                            <h3 class="no-margin">Jannson Wasley</h3>
                            <p class="no-margin">Customer</p>
                        </div>
                    </div>
                    <div class="customer_contact_info">
                        <div class="customer_phone">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.24233 11.6357C5.82643 13.5222 7.73334 15.0075 9.90981 16.0584C10.7385 16.4496 11.8467 16.9138 13.0813 16.9934C13.1579 16.9967 13.2311 17 13.3076 17C14.1363 17 14.8019 16.7149 15.3443 16.1281C15.3477 16.1247 15.3543 16.1181 15.3577 16.1115C15.5507 15.8794 15.7703 15.6705 15.9999 15.4484C16.1564 15.2992 16.3161 15.1434 16.4692 14.9843C17.178 14.2482 17.178 13.3133 16.4625 12.6005L14.4624 10.608C14.123 10.2565 13.717 10.0709 13.291 10.0709C12.865 10.0709 12.4557 10.2565 12.1063 10.6046L10.9149 11.7915C10.805 11.7286 10.6919 11.6722 10.5854 11.6191C10.4523 11.5528 10.3291 11.4898 10.2193 11.4202C9.1344 10.7339 8.14933 9.83879 7.20752 8.68835C6.73163 8.08827 6.41215 7.58433 6.18917 7.07045C6.502 6.78864 6.79486 6.49358 7.07773 6.20514C7.17757 6.10236 7.28074 5.99959 7.38391 5.89681C7.74332 5.53875 7.93634 5.12433 7.93634 4.70327C7.93634 4.28222 7.74665 3.8678 7.38391 3.50974L6.39218 2.52176C6.2757 2.40572 6.16588 2.293 6.05273 2.17696C5.83308 1.95151 5.60346 1.71944 5.37716 1.51057C5.03438 1.17571 4.6317 1 4.20572 1C3.78307 1 3.37706 1.17571 3.02097 1.51388L1.77632 2.75383C1.32372 3.20472 1.06747 3.75176 1.01422 4.385C0.950992 5.17737 1.09742 6.01948 1.47681 7.0373C2.0592 8.6121 2.93777 10.0742 4.24233 11.6357ZM1.82624 4.45462C1.86618 4.01368 2.0359 3.64567 2.35538 3.32739L3.59338 2.09407C3.7864 1.90841 3.99939 1.81227 4.20572 1.81227C4.40872 1.81227 4.61506 1.90841 4.80475 2.1007C5.02772 2.30626 5.23738 2.52176 5.46368 2.75052C5.57683 2.86656 5.69331 2.98259 5.80979 3.10195L6.80152 4.08993C7.00785 4.29548 7.11434 4.50435 7.11434 4.7099C7.11434 4.91546 7.00785 5.12433 6.80152 5.32988C6.69835 5.43266 6.59518 5.53875 6.49202 5.64152C6.18252 5.95317 5.89299 6.24824 5.5735 6.53005C5.56685 6.53668 5.56352 6.53999 5.55687 6.54662C5.28065 6.8218 5.32391 7.08371 5.39047 7.28264C5.3938 7.29258 5.39712 7.29921 5.40045 7.30916C5.6567 7.9225 6.01279 8.50601 6.56856 9.20224C7.56694 10.4289 8.61857 11.3804 9.7767 12.1131C9.9198 12.206 10.0729 12.2789 10.216 12.3518C10.3491 12.4182 10.4722 12.4811 10.5821 12.5508C10.5954 12.5574 10.6054 12.564 10.6187 12.5707C10.7285 12.627 10.835 12.6535 10.9415 12.6535C11.2077 12.6535 11.3808 12.4845 11.4373 12.4281L12.682 11.1881C12.875 10.9959 13.0847 10.8931 13.291 10.8931C13.5439 10.8931 13.7503 11.0489 13.88 11.1881L15.8868 13.184C16.2862 13.5818 16.2828 14.0128 15.8768 14.4339C15.737 14.5831 15.5906 14.7257 15.4342 14.8748C15.2012 15.1003 14.9583 15.3324 14.7387 15.5943C14.3559 16.0054 13.9 16.1977 13.311 16.1977C13.2544 16.1977 13.1945 16.1944 13.1379 16.191C12.0464 16.1214 11.0313 15.6971 10.2692 15.3357C8.19925 14.3378 6.38219 12.9221 4.87464 11.1252C3.63331 9.63655 2.798 8.25072 2.24556 6.76544C1.90278 5.85371 1.77299 5.12101 1.82624 4.45462Z"
                                    fill="#999999" stroke="#999999" stroke-width="0.3" />
                            </svg>
                            <a href="#" class="no-margin">+(256) 245451 441</a>
                        </div>
                        <div class="customer_email">
                            <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.6667 1H2.33334C1.59797 1 1 1.62012 1 2.38273V12.0618C1 12.8243 1.59797 13.4444 2.33334 13.4444H15.6667C16.402 13.4444 17 12.8243 17 12.0617V2.38273C17 1.62012 16.402 1 15.6667 1ZM2.33334 1.69135H15.6667C15.7158 1.69135 15.7591 1.70992 15.8052 1.72042C14.6508 2.81601 10.8232 6.44733 9.48375 7.69887C9.37894 7.79677 9.21 7.91357 9.00003 7.91357C8.79006 7.91357 8.62113 7.79677 8.51597 7.69855C7.17663 6.4472 3.34878 2.81569 2.19463 1.72048C2.24081 1.70998 2.28419 1.69135 2.33334 1.69135ZM1.66666 12.0617V2.38273C1.66666 2.315 1.68634 2.25355 1.70397 2.19165C2.58747 3.03023 5.25822 5.56397 6.98997 7.19707C5.26384 8.73471 2.59241 11.3613 1.70187 12.2419C1.68616 12.1831 1.66666 12.1256 1.66666 12.0617ZM15.6667 12.7531H2.33334C2.28009 12.7531 2.23275 12.7338 2.18303 12.7215C3.10325 11.8118 5.79169 9.17013 7.48747 7.66568C7.70853 7.87364 7.91047 8.06326 8.06966 8.21201C8.34441 8.46926 8.666 8.60495 9 8.60495C9.334 8.60495 9.65559 8.46923 9.93 8.21233C10.0893 8.06352 10.2913 7.87374 10.5125 7.66568C12.2084 9.16997 14.8965 11.8114 15.817 12.7215C15.7673 12.7338 15.72 12.7531 15.6667 12.7531ZM16.3333 12.0617C16.3333 12.1256 16.3138 12.1831 16.2982 12.2419C15.4073 11.3608 12.7362 8.73455 11.0101 7.19711C12.7419 5.564 15.4122 3.03049 16.296 2.19159C16.3137 2.25349 16.3333 2.31496 16.3333 2.38269V12.0617Z"
                                    fill="#999999" stroke="#999999" stroke-width="0.3" />
                            </svg>
                            <a href="#" class="no-margin">alexsmith@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="order_detail_card">
                    <div class="card_header">
                        <h3 class="no-margin">Order #10663</h3>
                    </div>
                    <div class="specific_order_detail">
                        <div class="seeking_detail">
                            <h4 class="no-margin">Status :</h4>
                            <div class="status_indicator">
                                <p class="no-margin">Processing</p>
                            </div>
                        </div>
                        <div class="seeking_detail">
                            <h4 class="no-margin">Order ID :</h4>
                            <h4 class="no-margin">663</h4>
                        </div>
                        <div class="seeking_detail">
                            <h4 class="no-margin">Order Number :</h4>
                            <h4 class="no-margin">10663</h4>
                        </div>
                        <div class="seeking_detail">
                            <h4 class="no-margin">Payment Method :</h4>
                            <h4 class="no-margin">Bank Transfer</h4>
                        </div>
                        <div class="seeking_detail">
                            <h4 class="no-margin">Payment Status :</h4>
                            <h4 class="no-margin">Awaiting Payment</h4>
                        </div>
                        <div class="seeking_detail">
                            <h4 class="no-margin">Updated :</h4>
                            <h4 class="no-margin">24, Sep 2022 / 10:00 am (6 minutes ago)</h4>
                        </div>
                        <div class="seeking_detail">
                            <h4 class="no-margin">Date :</h4>
                            <h4 class="no-margin">24, Sep 2022 / 10:00 am (6 minutes ago)</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="customer_order_history">
                <div class="order-header">
                    <h3 class="no-margin">Order</h3>
                </div>
                <div class="order-table_wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product</th>
                                <th>Item Price</th>
                                <th>Quantity</th>
                                <th>Size</th>
                                <th>VAT</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>115</td>
                                <td>
                                    <div class="product-detail">
                                        <div class="product-img">
                                            <img src="\assets\images\seederImages\dashboard\product-1.png">
                                        </div>
                                        <div class="product-name">Margherita Pizza</div>
                                    </div>
                                </td>
                                <td>$159.00</td>
                                <td>2</td>
                                <td>L</td>
                                <td>$20.36(10%)</td>
                                <td>$179.36</td>
                                <td>
                                    <div class="payment_status">
                                        <div class="status_heading">Awaiting Payment</div>
                                        <button class="pay_approve_btn">
                                            <p class="no-margin">Approve</p>
                                        </button>
                                    </div>
                                </td>
                                <td>6 minutes ago</td>
                                <td class="order_action">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_386_1152)">
                                            <path
                                                d="M2.00001 12C3.10459 12 4.00003 11.1046 4.00003 9.99998C4.00003 8.89541 3.10459 7.99997 2.00001 7.99997C0.895437 7.99997 0 8.89541 0 9.99998C0 11.1046 0.895437 12 2.00001 12Z"
                                                fill="#555555" />
                                            <path
                                                d="M10 12C11.1046 12 12 11.1046 12 9.99998C12 8.89541 11.1046 7.99997 10 7.99997C8.89544 7.99997 8 8.89541 8 9.99998C8 11.1046 8.89544 12 10 12Z"
                                                fill="#555555" />
                                            <path
                                                d="M18 12C19.1046 12 20 11.1046 20 9.99998C20 8.89541 19.1046 7.99997 18 7.99997C16.8954 7.99997 16 8.89541 16 9.99998C16 11.1046 16.8954 12 18 12Z"
                                                fill="#555555" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_386_1152">
                                                <rect width="20" height="20" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10">
                                    <div class="order_shipment_detail">
                                        <div class="order_detail_heading">Order</div>
                                        <div class="shipment_status">The order has not yet been shipped.</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>114</td>
                                <td>
                                    <div class="product-detail">
                                        <div class="product-img">
                                            <img src="\assets\images\seederImages\dashboard\product-2.png">
                                        </div>
                                        <div class="product-name">Burger</div>
                                    </div>
                                </td>
                                <td>$102.00</td>
                                <td>4</td>
                                <td>M</td>
                                <td>$13.00(10%)</td>
                                <td>$115.00</td>
                                <td>
                                    <div class="payment_status">
                                        <div class="status_heading">Awaiting Payment</div>
                                        <button class="pay_approve_btn">
                                            <p class="no-margin">Approve</p>
                                        </button>
                                    </div>
                                </td>
                                <td>6 minutes ago</td>
                                <td class="order_action">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_386_1152)">
                                            <path
                                                d="M2.00001 12C3.10459 12 4.00003 11.1046 4.00003 9.99998C4.00003 8.89541 3.10459 7.99997 2.00001 7.99997C0.895437 7.99997 0 8.89541 0 9.99998C0 11.1046 0.895437 12 2.00001 12Z"
                                                fill="#555555" />
                                            <path
                                                d="M10 12C11.1046 12 12 11.1046 12 9.99998C12 8.89541 11.1046 7.99997 10 7.99997C8.89544 7.99997 8 8.89541 8 9.99998C8 11.1046 8.89544 12 10 12Z"
                                                fill="#555555" />
                                            <path
                                                d="M18 12C19.1046 12 20 11.1046 20 9.99998C20 8.89541 19.1046 7.99997 18 7.99997C16.8954 7.99997 16 8.89541 16 9.99998C16 11.1046 16.8954 12 18 12Z"
                                                fill="#555555" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_386_1152">
                                                <rect width="20" height="20" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10">
                                    <div class="order_shipment_detail">
                                        <div class="order_detail_heading">Order</div>
                                        <div class="shipment_status">The order has not yet been shipped.</div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="total_payable">
                    <div class="subtotal">
                        <h4 class="no-margin">Subtotal :</h4>
                        <h4 class="no-margin">$334.80</h4>
                    </div>
                    <div class="vat">
                        <h4 class="no-margin">VAT :</h4>
                        <h4 class="no-margin">$26.55</h4>
                    </div>
                    <hr class="divider">
                    <div class="total">
                        <h4 class="no-margin">Total (USD) :</h4>
                        <h4 class="no-margin">$361.35</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========= ORDER DETAILS DELETE POPUP ========= -->
        <div class="popup order_delete_popup" id="order_delete_popup">
            <div class="order_delete-data-form">
                <img src="\assets\images\seederImages\dashboard\delete_image.png">
                <h3 class="no-margin">Are you Sure ?</h3>
                <p class="no-margin">Are you Sure want to Delete this
                    Order ?</p>
                <div class="action-btn">
                    <button class="cancel_btn">
                        <span>Cancel</span>
                    </button>
                    <button class="delete_btn">
                        <span>Yes, Delete It!</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- ========= ORDER DETAILS REMOVE POPUP ========= -->
        <div class="popup order_remove_popup" id="order_remove_popup">
            <div class="data-form order_remove-data-form">
                <svg width="150" height="150" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="150" height="150" fill="url(#pattern0_834_1521)" />
                    <defs>
                        <pattern id="pattern0_834_1521" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_834_1521" transform="translate(-0.156667) scale(0.00333333)" />
                        </pattern>
                        <image id="image0_834_1521" width="394" height="300"
                            xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>
                <h3 class="no-margin">Remove Order ?</h3>
                <p class="no-margin">Are you Sure want to Remove this
                    Order ?</p>
                <div class="action-btn">
                    <button class="cancel_btn">
                        <span>Cancel</span>
                    </button>
                    <button class="remove_btn">
                        <span>Yes, Remove</span>
                    </button>
                </div>
            </div>
        </div>
    </f7-page>
</template>

<script setup>
    import axios from 'axios';
    import { ref, onMounted } from 'vue';
    import { f7App, f7Panel, f7View, f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Breadcrumbs, f7BreadcrumbsItem, f7BreadcrumbsSeparator, f7BreadcrumbsCollapsed } from 'framework7-vue';

    const orderID = ref("");
    const orderDetails = ref([]);

    onMounted(() => {
        setTimeout(() => {
            getOrderDetails();
        }, 500);
    });

    const getOrderDetails = async () => {
        orderID.value = f7.view.main.router.currentRoute.params.id;
        await axios.get('/api/order/'+orderID.value)
        .then(response => {
        }).catch((error) => {
            console.error('Error Ocurred When Fetch Order Details ',  error);
        });
    }
</script>