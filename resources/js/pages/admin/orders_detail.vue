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
    </f7-page>
</template>

<script setup>
import { f7App, f7Panel, f7View, f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Breadcrumbs, f7BreadcrumbsItem, f7BreadcrumbsSeparator, f7BreadcrumbsCollapsed, } from 'framework7-vue';
</script>