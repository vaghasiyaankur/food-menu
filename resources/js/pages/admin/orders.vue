<template>
    <f7-page>
        <div class="orders_admin_page">
            <div class="orders_header">
                <h2 class="no-margin">Orders</h2>
                <f7-breadcrumbs>
                    <f7-breadcrumbs-item class="f7-link" active>
                        <f7-link>Dashboard</f7-link>
                    </f7-breadcrumbs-item>
                    <f7-breadcrumbs-separator />
                    <f7-breadcrumbs-item class="f7-link">
                        <f7-link>Orders</f7-link>
                    </f7-breadcrumbs-item>
                </f7-breadcrumbs>
            </div>
            <div class="order_info">
                <div class="table_search_filter">
                    <div class="search_bar_left">
                        <div class="search_bar">
                            <form data-search-container=".search-list" data-search-in=".item-title" class="searchbar">
                                <input type="search" placeholder="Search Food..." />
                                <i class="searchbar-icon"></i>
                                <span class="input-clear-button"></span>
                            </form>
                        </div>
                        <select name="" id="select_filter">
                            <option value="all" selected>All</option>
                        </select>
                        <select name="" id="select_filter">
                            <option value="all" select>All</option>
                        </select>
                    </div>
                    <button class="filter_table">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.3107 2H2.68913C2.43125 1.99953 2.19483 2.14008 2.07694 2.36391C1.95743 2.59075 1.9784 2.86392 2.13109 3.0711L7.48781 10.433C7.4896 10.4355 7.49155 10.4379 7.49334 10.4404C7.68798 10.6968 7.79318 11.0072 7.79383 11.3264V17.3285C7.79269 17.5063 7.86424 17.677 7.99269 17.8031C8.12115 17.9292 8.29578 18 8.47789 18C8.57057 18 8.66212 17.9819 8.74765 17.9473L11.7577 16.8275C12.0275 16.7473 12.2065 16.499 12.2065 16.2V11.3264C12.207 11.0074 12.3123 10.6968 12.5068 10.4404C12.5086 10.4379 12.5106 10.4355 12.5123 10.433L17.8689 3.07078C18.0216 2.86376 18.0426 2.59075 17.9231 2.36391C17.8052 2.14008 17.5688 1.99953 17.3107 2ZM11.8356 9.95931C11.5364 10.3554 11.3746 10.8343 11.3737 11.3264V16.1013L8.62635 17.1232V11.3264C8.62537 10.8343 8.46358 10.3554 8.16423 9.95931L2.96377 2.81221H17.0362L11.8356 9.95931Z"
                                fill="currentColor" stroke="currentColor" stroke-width="0.5" />
                        </svg>
                        <h4 class="no-margin">Filter</h4>
                    </button>
                </div>
                <div class="order_table_wrapper">
                    <table class="order_table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Payment Status</th>
                                <th>Updated</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#10663</td>
                                <td>
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_1.png">
                                        </div>
                                        <div class="customer-name">Jannson Wasley</div>
                                    </div>
                                </td>
                                <td>$109.00</td>
                                <td>
                                    <div class="order_status cancelled_status">
                                        <p class="no-margin">Cancelled</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>17 hours ago</td>
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
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_2.png">
                                        </div>
                                        <div class="customer-name">Robert Fox</div>
                                    </div>
                                </td>
                                <td>$159.00</td>
                                <td>
                                    <div class="order_status processing_status">
                                        <p class="no-margin">Processing</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>17 hours ago</td>
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
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_3.png">
                                        </div>
                                        <div class="customer-name">Marvin Kinney</div>
                                    </div>
                                </td>
                                <td>$89.00</td>
                                <td>
                                    <div class="order_status completed_status">
                                        <p class="no-margin">Completed</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>1 day ago</td>
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
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_4.png">
                                        </div>
                                        <div class="customer-name">Jessica Williams</div>
                                    </div>
                                </td>
                                <td>$96.00</td>
                                <td>
                                    <div class="order_status cancelled_status">
                                        <p class="no-margin">Cancelled</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>2 days ago</td>
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
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_5.png">
                                        </div>
                                        <div class="customer-name">Floyd Miles</div>
                                    </div>
                                </td>
                                <td>$330.00</td>
                                <td>
                                    <div class="order_status completed_status">
                                        <p class="no-margin">Completed</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>2 days ago</td>
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
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_6.png">
                                        </div>
                                        <div class="customer-name">Kathryn Murphy</div>
                                    </div>
                                </td>
                                <td>$234.00</td>
                                <td>
                                    <div class="order_status cancelled_status">
                                        <p class="no-margin">Completed</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>2 days ago</td>
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
                                <td>#10657</td>
                                <td>
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_2.png">
                                        </div>
                                        <div class="customer-name">Robert Fox</div>
                                    </div>
                                </td>
                                <td>$159.00</td>
                                <td>
                                    <div class="order_status completed_status">
                                        <p class="no-margin">Completed</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>17 hours ago</td>
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
                                <td>#10656</td>
                                <td>
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_3.png">
                                        </div>
                                        <div class="customer-name">Marvin Kinney</div>
                                    </div>
                                </td>
                                <td>$89.00</td>
                                <td>
                                    <div class="order_status processing_status">
                                        <p class="no-margin">Processing</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>1 day ago</td>
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
                                <td>#10655</td>
                                <td>
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_4.png">
                                        </div>
                                        <div class="customer-name">Jessica Williams</div>
                                    </div>
                                </td>
                                <td>$96.00</td>
                                <td>
                                    <div class="order_status cancelled_status">
                                        <p class="no-margin">Cancelled</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>2 days ago</td>
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
                                <td>#10654</td>
                                <td>
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_5.png">
                                        </div>
                                        <div class="customer-name">Floyd Miles</div>
                                    </div>
                                </td>
                                <td>$330.00</td>
                                <td>
                                    <div class="order_status completed_status">
                                        <p class="no-margin">Completed</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>2 days ago</td>
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
                                <td>#10653</td>
                                <td>
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_6.png">
                                        </div>
                                        <div class="customer-name">Kathryn Murphy</div>
                                    </div>
                                </td>
                                <td>$234.00</td>
                                <td>
                                    <div class="order_status processing_status">
                                        <p class="no-margin">Processing</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>2 days ago</td>
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
                                <td>#10652</td>
                                <td>
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_6.png">
                                        </div>
                                        <div class="customer-name">Kathryn Murphy</div>
                                    </div>
                                </td>
                                <td>$234.00</td>
                                <td>
                                    <div class="order_status completed_status">
                                        <p class="no-margin">Completed</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>2 days ago</td>
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
                                <td>#10651</td>
                                <td>
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_2.png">
                                        </div>
                                        <div class="customer-name">Robert Fox</div>
                                    </div>
                                </td>
                                <td>$159.00</td>
                                <td>
                                    <div class="order_status processing_status">
                                        <p class="no-margin">Processing</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>17 hours ago</td>
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
                                <td>#10650</td>
                                <td>
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_3.png">
                                        </div>
                                        <div class="customer-name">Marvin Kinney</div>
                                    </div>
                                </td>
                                <td>$89.00</td>
                                <td>
                                    <div class="order_status completed_status">
                                        <p class="no-margin">Completed</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>1 day ago</td>
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
                                <td>#10649</td>
                                <td>
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_4.png">
                                        </div>
                                        <div class="customer-name">Jessica Williams</div>
                                    </div>
                                </td>
                                <td>$96.00</td>
                                <td>
                                    <div class="order_status cancelled_status">
                                        <p class="no-margin">Cancelled</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>2 days ago</td>
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
                                <td>#10648</td>
                                <td>
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_5.png">
                                        </div>
                                        <div class="customer-name">Floyd Miles</div>
                                    </div>
                                </td>
                                <td>$330.00</td>
                                <td>
                                    <div class="order_status completed_status">
                                        <p class="no-margin">Completed</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>2 days ago</td>
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
                                <td>#10647</td>
                                <td>
                                    <div class="customer-detail">
                                        <div class="customer-img">
                                            <img src="\assets\images\seederImages\dashboard\user_6.png">
                                        </div>
                                        <div class="customer-name">Kathryn Murphy</div>
                                    </div>
                                </td>
                                <td>$234.00</td>
                                <td>
                                    <div class="order_status completed_status">
                                        <p class="no-margin">Completed</p>
                                    </div>
                                </td>
                                <td>Payment Received</td>
                                <td>2 days ago</td>
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
                <div class="pagination_wrapper">
                    <p class="no-margin">Showing 15 of 220 Results</p>
                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">&raquo;</a>
                    </div>
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
</script>