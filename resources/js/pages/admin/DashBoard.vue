<template>
    <f7-page>
        <div class="dashboard_page">
            <div class="dashboard_header">
                <h2 class="no-margin">Dashboard</h2>
                <f7-breadcrumbs>
                    <f7-breadcrumbs-item class="f7-link" active>
                        <f7-link>Dashboard</f7-link>
                    </f7-breadcrumbs-item>
                    <f7-breadcrumbs-separator />
                    <f7-breadcrumbs-item class="f7-link">
                        <f7-link>Dashboard</f7-link>
                    </f7-breadcrumbs-item>
                </f7-breadcrumbs>
            </div>
            <div class="dashboard_welcome_section">
                <div class="greeting_user">
                    <h3 class="no-margin">Good Morning, Jannson!</h3>
                    <h4 class="no-margin">Here's what's happening with your store today.</h4>
                </div>
            </div>
            <DashboardCounter></DashboardCounter>
            <div class="orders-category_tables">
                <div class="latest_orders_table">
                    <div class="table_header">
                        <h3 class="no-margin">Latest Orders</h3>
                        <a href="" class="no-margin">
                            <h5 class="no-margin">View All</h5>
                        </a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#10663</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_1.png">
                                    </div>
                                    <div class="customer_name">Jannson Wasley</div>
                                </td>
                                <td>$109.00</td>
                                <td>
                                    <div class="status_indicator">
                                        <div class="cancelled_order">
                                            <p class="no-margin">Cancelled</p>
                                        </div>
                                    </div>
                                </td>
                                <td>24, Sep 2022 / 10:00 am</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>#10662</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_2.png">
                                    </div>
                                    <div class="customer_name">Robert Fox</div>
                                </td>
                                <td>$159.00</td>
                                <td>
                                    <div class="status_indicator">
                                        <div class="processing_order">
                                            <p class="no-margin">Processing</p>
                                        </div>
                                    </div>
                                </td>
                                <td>24, Sep 2022 / 10:00 am</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>#10661</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_3.png">
                                    </div>
                                    <div class="customer_name">Marvin Kinney</div>
                                </td>
                                <td>$89.00</td>
                                <td>
                                    <div class="status_indicator">
                                        <div class="processing_order">
                                            <p class="no-margin">Processing</p>
                                        </div>
                                    </div>
                                </td>
                                <td>24, Sep 2022 / 10:00 am</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>#10660</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_4.png">
                                    </div>
                                    <div class="customer_name">Jessica Williams</div>
                                </td>
                                <td>$96.00</td>
                                <td>
                                    <div class="status_indicator">
                                        <div class="cancelled_order">
                                            <p class="no-margin">Cancelled</p>
                                        </div>
                                    </div>
                                </td>
                                <td>24, Sep 2022 / 10:00 am</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>#10659</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_5.png">
                                    </div>
                                    <div class="customer_name">Floyd Miles</div>
                                </td>
                                <td>$330.00</td>
                                <td>
                                    <div class="status_indicator">
                                        <div class="processing_order">
                                            <p class="no-margin">Processing</p>
                                        </div>
                                    </div>
                                </td>
                                <td>24, Sep 2022 / 10:00 am</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>#10658</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_6.png">
                                    </div>
                                    <div class="customer_name">Kathryn Murphy</div>
                                </td>
                                <td>$234.00</td>
                                <td>
                                    <div class="status_indicator">
                                        <div class="processing_order">
                                            <p class="no-margin">Processing</p>
                                        </div>
                                    </div>
                                </td>
                                <td>24, Sep 2022 / 10:00 am</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                        </tbody>
                    </table>
                </div>
                <div class="latest_category_table">
                    <div class="table_header">
                        <h3 class="no-margin">Latest Category</h3>
                        <a href="" class="no-margin">
                            <h5 class="no-margin">View All</h5>
                        </a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Item</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>
                                    <div class="product_image">
                                        <img src="\assets\images\seederImages\dashboard\Burger.png">
                                    </div>
                                    <div class="product_name">Burger</div>
                                </td>
                                <td>16 Item</td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>
                                    <div class="product_image">
                                        <img src="\assets\images\seederImages\dashboard\Noodles.png">
                                    </div>
                                    <div class="product_name">Noodles</div>
                                </td>
                                <td>6 Item</td>
                            </tr>
                            <tr>
                                <td>03</td>
                                <td>
                                    <div class="product_image">
                                        <img src="\assets\images\seederImages\dashboard\Indian_Food.png">
                                    </div>
                                    <div class="product_name">Indian Food</div>
                                </td>
                                <td>10 Item</td>
                            </tr>
                            <tr>
                                <td>04</td>
                                <td>
                                    <div class="product_image">
                                        <img src="\assets\images\seederImages\dashboard\Sandwich.png">
                                    </div>
                                    <div class="product_name">Sandwich</div>
                                </td>
                                <td>8 Item</td>
                            </tr>
                            <tr>
                                <td>05</td>
                                <td>
                                    <div class="product_image">
                                        <img src="\assets\images\seederImages\dashboard\Pizza.png">
                                    </div>
                                    <div class="product_name">Pizza</div>
                                </td>
                                <td>17 Item</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="customer-info_pending-order_table">
                <div class="latest_customer_info">
                    <div class="table_header">
                        <h3 class="no-margin">Latest Customer</h3>
                        <a href="" class="no-margin">
                            <h5 class="no-margin">View All</h5>
                        </a>
                    </div>
                    <div class="customer_card_holder">
                        <div class="customer_card">
                            <div class="customer_image">
                                <img src="\assets\images\seederImages\dashboard\customer_1.png">
                            </div>
                            <div class="card_customer_name">
                                <h5 class="no-margin">Prezy Mark</h5>
                            </div>
                            <div class="customer_online_status">
                                <p class="no-margin">18 hours ago</p>
                            </div>
                        </div>
                        <div class="customer_card">
                            <div class="customer_image">
                                <img src="\assets\images\seederImages\dashboard\customer_2.png">
                            </div>
                            <div class="card_customer_name">
                                <h5 class="no-margin">John Smith</h5>
                            </div>
                            <div class="customer_online_status">
                                <p class="no-margin">1 day ago</p>
                            </div>
                        </div>
                        <div class="customer_card">
                            <div class="customer_image">
                                <img src="\assets\images\seederImages\dashboard\customer_3.png">
                            </div>
                            <div class="card_customer_name">
                                <h5 class="no-margin">Jessica Johnson</h5>
                            </div>
                            <div class="customer_online_status">
                                <p class="no-margin">1 day ago</p>
                            </div>
                        </div>
                        <div class="customer_card">
                            <div class="customer_image">
                                <img src="\assets\images\seederImages\dashboard\customer_4.png">
                            </div>
                            <div class="card_customer_name">
                                <h5 class="no-margin">Alex Smith</h5>
                            </div>
                            <div class="customer_online_status">
                                <p class="no-margin">3 days ago</p>
                            </div>
                        </div>
                        <div class="customer_card">
                            <div class="customer_image">
                                <img src="\assets\images\seederImages\dashboard\customer_5.png">
                            </div>
                            <div class="card_customer_name">
                                <h5 class="no-margin">Yunus Emre</h5>
                            </div>
                            <div class="customer_online_status">
                                <p class="no-margin">3 days ago</p>
                            </div>
                        </div>
                        <div class="customer_card">
                            <div class="customer_image">
                                <img src="\assets\images\seederImages\dashboard\customer_6.png">
                            </div>
                            <div class="card_customer_name">
                                <h5 class="no-margin">Vihan Hudda</h5>
                            </div>
                            <div class="customer_online_status">
                                <p class="no-margin">3 days ago</p>
                            </div>
                        </div>
                        <div class="customer_card">
                            <div class="customer_image">
                                <img src="\assets\images\seederImages\dashboard\customer_7.png">
                            </div>
                            <div class="card_customer_name">
                                <h5 class="no-margin">Zara Hudda</h5>
                            </div>
                            <div class="customer_online_status">
                                <p class="no-margin">4 days ago</p>
                            </div>
                        </div>
                        <div class="customer_card">
                            <div class="customer_image">
                                <img src="\assets\images\seederImages\dashboard\customer_8.png">
                            </div>
                            <div class="card_customer_name">
                                <h5 class="no-margin">Jansh Brown</h5>
                            </div>
                            <div class="customer_online_status">
                                <p class="no-margin">5 days ago</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pending_order_table">
                    <div class="table_header">
                        <h3 class="no-margin">Latest Pending Orders</h3>
                        <a href="" class="no-margin">
                            <h5 class="no-margin">View All</h5>
                        </a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Order Name</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_1.png">
                                    </div>
                                    <div class="customer_name">Jannson Wasley</div>
                                </td>
                                <td>$109.00</td>
                                <td>Burger,Pizza...</td>
                                <td>24, Sep 2022</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>09</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_2.png">
                                    </div>
                                    <div class="customer_name">Robert Fox</div>
                                </td>
                                <td>$159.00</td>
                                <td>Noodles,Pizza...</td>
                                <td>24, Sep 2022</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>08</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_3.png">
                                    </div>
                                    <div class="customer_name">Marvin Kinney</div>
                                </td>
                                <td>$89.00</td>
                                <td>Burger,Pizza...</td>
                                <td>24, Sep 2022</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>07</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_4.png">
                                    </div>
                                    <div class="customer_name">Jessica Williams</div>
                                </td>
                                <td>$96.00</td>
                                <td>Noodles,Pizza...</td>
                                <td>24, Sep 2022</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>06</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_5.png">
                                    </div>
                                    <div class="customer_name">Floyd Miles</div>
                                </td>
                                <td>$330.00</td>
                                <td>Burger,Pizza...</td>
                                <td>24, Sep 2022</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>05</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_6.png">
                                    </div>
                                    <div class="customer_name">Kathryn Murphy</div>
                                </td>
                                <td>$234.00</td>
                                <td>Noodles,Pizza...</td>
                                <td>24, Sep 2022</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="complete_order-product_tables">
                <div class="latest_completed_orders_table">
                    <div class="table_header">
                        <h3 class="no-margin">Latest Completed Orders</h3>
                        <a href="" class="no-margin">
                            <h5 class="no-margin">View All</h5>
                        </a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Order Name</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_1.png">
                                    </div>
                                    <div class="customer_name">Jannson Wasley</div>
                                </td>
                                <td>$109.00</td>
                                <td>Burger,Pizza...</td>
                                <td>24, Sep 2022</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>09</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_2.png">
                                    </div>
                                    <div class="customer_name">Robert Fox</div>
                                </td>
                                <td>$159.00</td>
                                <td>Noodles,Pizza...</td>
                                <td>24, Sep 2022</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>08</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_3.png">
                                    </div>
                                    <div class="customer_name">Marvin Kinney</div>
                                </td>
                                <td>$89.00</td>
                                <td>Burger,Pizza...</td>
                                <td>24, Sep 2022</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>07</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_4.png">
                                    </div>
                                    <div class="customer_name">Jessica Williams</div>
                                </td>
                                <td>$96.00</td>
                                <td>Noodles,Pizza...</td>
                                <td>24, Sep 2022</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>06</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_5.png">
                                    </div>
                                    <div class="customer_name">Floyd Miles</div>
                                </td>
                                <td>$330.00</td>
                                <td>Burger,Pizza...</td>
                                <td>24, Sep 2022</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>05</td>
                                <td>
                                    <div class="customer_img">
                                        <img src="\assets\images\seederImages\dashboard\user_6.png">
                                    </div>
                                    <div class="customer_name">Kathryn Murphy</div>
                                </td>
                                <td>$234.00</td>
                                <td>Noodles,Pizza...</td>
                                <td>24, Sep 2022</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                        </tbody>
                    </table>
                </div>
                <div class="latest_product_table">
                    <div class="table_header">
                        <h3 class="no-margin">Latest Product</h3>
                        <a href="" class="no-margin">
                            <h5 class="no-margin">View All</h5>
                        </a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>
                                    <div class="product_image">
                                        <img src="\assets\images\seederImages\dashboard\Burger.png">
                                    </div>
                                    <div class="product_online_status">
                                        <div class="product_name">Burger</div>
                                        <p class="no-margin">7 months ago</p>
                                    </div>
                                </td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>02</td>
                                <td>
                                    <div class="product_image">
                                        <img src="\assets\images\seederImages\dashboard\Noodles.png">
                                    </div>
                                    <div class="product_online_status">
                                        <div class="product_name">Noodles</div>
                                        <p class="no-margin">7 months ago</p>
                                    </div>
                                </td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>03</td>
                                <td>
                                    <div class="product_image">
                                        <img src="\assets\images\seederImages\dashboard\Indian_Food.png">
                                    </div>
                                    <div class="product_online_status">
                                        <div class="product_name">Indian Food</div>
                                        <p class="no-margin">7 months ago</p>
                                    </div>
                                </td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>04</td>
                                <td>
                                    <div class="product_image">
                                        <img src="\assets\images\seederImages\dashboard\Sandwich.png">
                                    </div>
                                    <div class="product_online_status">
                                        <div class="product_name">Sandwich</div>
                                        <p class="no-margin">7 months ago</p>
                                    </div>
                                </td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>05</td>
                                <td>
                                    <div class="product_image">
                                        <img src="\assets\images\seederImages\dashboard\Pizza.png">
                                    </div>
                                    <div class="product_online_status">
                                        <div class="product_name">Pizza</div>
                                        <p class="no-margin">7 months ago</p>
                                    </div>
                                </td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="menu_transactions_tables">
                <div class="latest_menu_table">
                    <div class="table_header">
                        <h3 class="no-margin">Latest Menu</h3>
                        <a href="" class="no-margin">
                            <h5 class="no-margin">View All</h5>
                        </a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Size</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>
                                    <div class="product_image">
                                        <img src="\assets\images\seederImages\dashboard\Burger.png">
                                    </div>
                                    <div class="product_name">Burger</div>
                                </td>
                                <td>S, M, L</td>
                                <td>$56.00</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>02</td>
                                <td>
                                    <div class="product_image">
                                        <img src="\assets\images\seederImages\dashboard\Noodles.png">
                                    </div>
                                    <div class="product_name">Noodles</div>
                                </td>
                                <td>S, M, L</td>
                                <td>$59.00</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>03</td>
                                <td>
                                    <div class="product_image">
                                        <img src="\assets\images\seederImages\dashboard\Indian_Food.png">
                                    </div>
                                    <div class="product_name">Indian Food</div>
                                </td>
                                <td>S, M, L</td>
                                <td>$119.00</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>04</td>
                                <td>
                                    <div class="product_image">
                                        <img src="\assets\images\seederImages\dashboard\Sandwich.png">
                                    </div>
                                    <div class="product_name">Sandwich</div>
                                </td>
                                <td>S, M, L</td>
                                <td>$156.00</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                                <td>05</td>
                                <td>
                                    <div class="product_image">
                                        <img src="\assets\images\seederImages\dashboard\Pizza.png">
                                    </div>
                                    <div class="product_name">Margherita Pizza</div>
                                </td>
                                <td>S, M, L</td>
                                <td>$126.00</td>
                                <td><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
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
                        </tbody>
                    </table>
                </div>
                <div class="latest_transactions_table">
                    <div class="table_header">
                        <h3 class="no-margin">Latest Transactions</h3>
                        <a href="" class="no-margin">
                            <h5 class="no-margin">View All</h5>
                        </a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Payment Method</th>
                                <th>Payment Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>121</td>
                                <td>Master Card</td>
                                <td>$56.00</td>
                                <td>Payment Received</td>
                                <td>24, Sep 2022 / 10:00 am</td>
                            </tr>
                            <tr>
                                <td>120</td>
                                <td>Visa Card</td>
                                <td>$59.00</td>
                                <td>Payment Received</td>
                                <td>24, Sep 2022 / 10:00 am</td>
                            </tr>
                            <tr>
                                <td>119</td>
                                <td>PayPal Card</td>
                                <td>$119.00</td>
                                <td>Payment Received</td>
                                <td>24, Sep 2022 / 10:00 am</td>
                            </tr>
                            <tr>
                                <td>118</td>
                                <td>Paytm Card</td>
                                <td>$156.00</td>
                                <td>Payment Received</td>
                                <td>24, Sep 2022 / 10:00 am</td>
                            </tr>
                            <tr>
                                <td>117</td>
                                <td>Apple Pay</td>
                                <td>$126.00</td>
                                <td>Payment Received</td>
                                <td>24, Sep 2022 / 10:00 am</td>
                            </tr>
                            <tr>
                                <td>116</td>
                                <td>Paytm Card</td>
                                <td>$156.00</td>
                                <td>Payment Received</td>
                                <td>24, Sep 2022 / 10:00 am</td>
                            </tr>
                            <tr>
                                <td>115</td>
                                <td>RuPay Card</td>
                                <td>$126.00</td>
                                <td>Payment Received</td>
                                <td>24, Sep 2022 / 10:00 am</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </f7-page>
</template>
<script setup>
import {
    f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Breadcrumbs,
    f7BreadcrumbsItem, f7BreadcrumbsSeparator, f7BreadcrumbsCollapsed,
} from 'framework7-vue';

import DashboardCounter from './Dashboard/DashboardCount.vue';
</script>