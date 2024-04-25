<template>
    <f7-page>
        <div class="completed_orders_wrapper">
            <div class="card_header completed_orders-header">
                <div class="completed_orders_banner">
                    <h2 class="banner_text no-margin">Completed Orders</h2>
                </div>
                <div class="order_by_dates_filter_box">
                    <div class="input_dates_for_filter">
                        <input type="date" name="from_date" id="from_date">
                        <p class="no-margin">To</p>
                        <input type="date" name="to_date" id="to_date">
                    </div>
                    <div class="filter_by_date_button">
                        <button class="filter_btn" data-popup="#order_filter_popup"
                                            @click="f7.popup.open(`.order_filter_popup`);">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.3107 2H2.68913C2.43125 1.99953 2.19483 2.14008 2.07694 2.36391C1.95743 2.59075 1.9784 2.86392 2.13109 3.0711L7.48781 10.433C7.4896 10.4355 7.49155 10.4379 7.49334 10.4404C7.68798 10.6968 7.79318 11.0072 7.79383 11.3264V17.3285C7.79269 17.5063 7.86424 17.677 7.99269 17.8031C8.12115 17.9292 8.29578 18 8.47789 18C8.57057 18 8.66212 17.9819 8.74765 17.9473L11.7577 16.8275C12.0275 16.7473 12.2065 16.499 12.2065 16.2V11.3264C12.207 11.0074 12.3123 10.6968 12.5068 10.4404C12.5086 10.4379 12.5106 10.4355 12.5123 10.433L17.8689 3.07078C18.0216 2.86376 18.0426 2.59075 17.9231 2.36391C17.8052 2.14008 17.5688 1.99953 17.3107 2ZM11.8356 9.95931C11.5364 10.3554 11.3746 10.8343 11.3737 11.3264V16.1013L8.62635 17.1232V11.3264C8.62537 10.8343 8.46358 10.3554 8.16423 9.95931L2.96377 2.81221H17.0362L11.8356 9.95931Z"
                                    fill="currentColor" stroke="currentColor" stroke-width="0.5" />
                            </svg><span>Filter</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-content completed_order_content">
                <div class="completed_orders_list">
                    <ol class="filtered_list no-margin" id="filtered_list">
                        <li class="filtered_order_item select">
                            <div class="filtered_order_detail">
                                <div class="order_user-info">
                                    <img class="selected_user_image display-none"
                                        src="\assets\images\seederImages\completedOrders\selected_user.png">
                                    <img class="user_image" src="\assets\images\seederImages\completedOrders\user.png">
                                    <div class="order_number_time">
                                        <h3 class="order_number no-margin">Order #10663</h3>
                                        <div class="order_timing">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_2155_11687)">
                                                    <path
                                                        d="M8 15C4.134 15 1 11.866 1 8C1 4.134 4.134 1 8 1C11.866 1 15 4.134 15 8C14.9944 11.8637 11.8637 14.9944 8 15ZM8 1.76364C4.55575 1.76364 1.76364 4.55575 1.76364 8C1.76364 11.4443 4.55575 14.2364 8 14.2364C11.4443 14.2364 14.2364 11.4443 14.2364 8C14.2308 4.55807 11.4419 1.76924 8 1.76364Z"
                                                        fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                    <path
                                                        d="M10.5464 11.4372C10.4326 11.4371 10.3246 11.3867 10.2512 11.2997L7.70571 8.24518C7.64885 8.17652 7.61821 8.08994 7.61916 8.00082V4.94627C7.61916 4.73541 7.79012 4.56445 8.00098 4.56445C8.21184 4.56445 8.3828 4.73541 8.3828 4.94627V7.86336L10.8417 10.811C10.9746 10.9747 10.952 11.2147 10.7908 11.3506C10.7213 11.406 10.6353 11.4365 10.5464 11.4372Z"
                                                        fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2155_11687">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="order_date">December 22, 2021</span>
                                            <p class="no-margin">at</p>
                                            <span class="order_time">12:58 pm</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="filtered_order_payment-info">
                                    <h3 class="total-amount no-margin">$57.00</h3>
                                    <p class="total-items no-margin">5 items</p>
                                </div>
                            </div>
                        </li>
                        <li class="filtered_order_item">
                            <div class="filtered_order_detail">
                                <div class="order_user-info">
                                    <img class="selected_user_image display-none"
                                        src="\assets\images\seederImages\completedOrders\selected_user.png">
                                    <img class="user_image" src="\assets\images\seederImages\completedOrders\user.png">
                                    <div class="order_number_time">
                                        <h3 class="order_number no-margin">Order #10662</h3>
                                        <div class="order_timing">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_2155_11687)">
                                                    <path
                                                        d="M8 15C4.134 15 1 11.866 1 8C1 4.134 4.134 1 8 1C11.866 1 15 4.134 15 8C14.9944 11.8637 11.8637 14.9944 8 15ZM8 1.76364C4.55575 1.76364 1.76364 4.55575 1.76364 8C1.76364 11.4443 4.55575 14.2364 8 14.2364C11.4443 14.2364 14.2364 11.4443 14.2364 8C14.2308 4.55807 11.4419 1.76924 8 1.76364Z"
                                                        fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                    <path
                                                        d="M10.5464 11.4372C10.4326 11.4371 10.3246 11.3867 10.2512 11.2997L7.70571 8.24518C7.64885 8.17652 7.61821 8.08994 7.61916 8.00082V4.94627C7.61916 4.73541 7.79012 4.56445 8.00098 4.56445C8.21184 4.56445 8.3828 4.73541 8.3828 4.94627V7.86336L10.8417 10.811C10.9746 10.9747 10.952 11.2147 10.7908 11.3506C10.7213 11.406 10.6353 11.4365 10.5464 11.4372Z"
                                                        fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2155_11687">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="order_date">December 21, 2021</span>
                                            <p class="no-margin">at</p>
                                            <span class="order_time">10:00 am</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="filtered_order_payment-info">
                                    <h3 class="total-amount no-margin">$42.00</h3>
                                    <p class="total-items no-margin">3 items</p>
                                </div>
                            </div>
                        </li>
                        <li class="filtered_order_item">
                            <div class="filtered_order_detail">
                                <div class="order_user-info">
                                    <img class="selected_user_image display-none"
                                        src="\assets\images\seederImages\completedOrders\selected_user.png">
                                    <img class="user_image" src="\assets\images\seederImages\completedOrders\user.png">
                                    <div class="order_number_time">
                                        <h3 class="order_number no-margin">Order #10661</h3>
                                        <div class="order_timing">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_2155_11687)">
                                                    <path
                                                        d="M8 15C4.134 15 1 11.866 1 8C1 4.134 4.134 1 8 1C11.866 1 15 4.134 15 8C14.9944 11.8637 11.8637 14.9944 8 15ZM8 1.76364C4.55575 1.76364 1.76364 4.55575 1.76364 8C1.76364 11.4443 4.55575 14.2364 8 14.2364C11.4443 14.2364 14.2364 11.4443 14.2364 8C14.2308 4.55807 11.4419 1.76924 8 1.76364Z"
                                                        fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                    <path
                                                        d="M10.5464 11.4372C10.4326 11.4371 10.3246 11.3867 10.2512 11.2997L7.70571 8.24518C7.64885 8.17652 7.61821 8.08994 7.61916 8.00082V4.94627C7.61916 4.73541 7.79012 4.56445 8.00098 4.56445C8.21184 4.56445 8.3828 4.73541 8.3828 4.94627V7.86336L10.8417 10.811C10.9746 10.9747 10.952 11.2147 10.7908 11.3506C10.7213 11.406 10.6353 11.4365 10.5464 11.4372Z"
                                                        fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2155_11687">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="order_date">December 20, 2021</span>
                                            <p class="no-margin">at</p>
                                            <span class="order_time">07:33 am</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="filtered_order_payment-info">
                                    <h3 class="total-amount no-margin">$56.00</h3>
                                    <p class="total-items no-margin">4 items</p>
                                </div>
                            </div>
                        </li>
                        <li class="filtered_order_item">
                            <div class="filtered_order_detail">
                                <div class="order_user-info">
                                    <img class="selected_user_image display-none"
                                        src="\assets\images\seederImages\completedOrders\selected_user.png">
                                    <img class="user_image" src="\assets\images\seederImages\completedOrders\user.png">
                                    <div class="order_number_time">
                                        <h3 class="order_number no-margin">Order #10660</h3>
                                        <div class="order_timing">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_2155_11687)">
                                                    <path
                                                        d="M8 15C4.134 15 1 11.866 1 8C1 4.134 4.134 1 8 1C11.866 1 15 4.134 15 8C14.9944 11.8637 11.8637 14.9944 8 15ZM8 1.76364C4.55575 1.76364 1.76364 4.55575 1.76364 8C1.76364 11.4443 4.55575 14.2364 8 14.2364C11.4443 14.2364 14.2364 11.4443 14.2364 8C14.2308 4.55807 11.4419 1.76924 8 1.76364Z"
                                                        fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                    <path
                                                        d="M10.5464 11.4372C10.4326 11.4371 10.3246 11.3867 10.2512 11.2997L7.70571 8.24518C7.64885 8.17652 7.61821 8.08994 7.61916 8.00082V4.94627C7.61916 4.73541 7.79012 4.56445 8.00098 4.56445C8.21184 4.56445 8.3828 4.73541 8.3828 4.94627V7.86336L10.8417 10.811C10.9746 10.9747 10.952 11.2147 10.7908 11.3506C10.7213 11.406 10.6353 11.4365 10.5464 11.4372Z"
                                                        fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2155_11687">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="order_date">December 19, 2021</span>
                                            <p class="no-margin">at</p>
                                            <span class="order_time">08:32 am</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="filtered_order_payment-info">
                                    <h3 class="total-amount no-margin">$68.00</h3>
                                    <p class="total-items no-margin">6 items</p>
                                </div>
                            </div>
                        </li>
                        <li class="filtered_order_item">
                            <div class="filtered_order_detail">
                                <div class="order_user-info">
                                    <img class="selected_user_image display-none"
                                        src="\assets\images\seederImages\completedOrders\selected_user.png">
                                    <img class="user_image" src="\assets\images\seederImages\completedOrders\user.png">
                                    <div class="order_number_time">
                                        <h3 class="order_number no-margin">Order #10659</h3>
                                        <div class="order_timing">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_2155_11687)">
                                                    <path
                                                        d="M8 15C4.134 15 1 11.866 1 8C1 4.134 4.134 1 8 1C11.866 1 15 4.134 15 8C14.9944 11.8637 11.8637 14.9944 8 15ZM8 1.76364C4.55575 1.76364 1.76364 4.55575 1.76364 8C1.76364 11.4443 4.55575 14.2364 8 14.2364C11.4443 14.2364 14.2364 11.4443 14.2364 8C14.2308 4.55807 11.4419 1.76924 8 1.76364Z"
                                                        fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                    <path
                                                        d="M10.5464 11.4372C10.4326 11.4371 10.3246 11.3867 10.2512 11.2997L7.70571 8.24518C7.64885 8.17652 7.61821 8.08994 7.61916 8.00082V4.94627C7.61916 4.73541 7.79012 4.56445 8.00098 4.56445C8.21184 4.56445 8.3828 4.73541 8.3828 4.94627V7.86336L10.8417 10.811C10.9746 10.9747 10.952 11.2147 10.7908 11.3506C10.7213 11.406 10.6353 11.4365 10.5464 11.4372Z"
                                                        fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2155_11687">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="order_date">December 20, 2021</span>
                                            <p class="no-margin">at</p>
                                            <span class="order_time">07:33 am</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="filtered_order_payment-info">
                                    <h3 class="total-amount no-margin">$36.00</h3>
                                    <p class="total-items no-margin">2 items</p>
                                </div>
                            </div>
                        </li>
                        <li class="filtered_order_item">
                            <div class="filtered_order_detail">
                                <div class="order_user-info">
                                    <img class="selected_user_image display-none"
                                        src="\assets\images\seederImages\completedOrders\selected_user.png">
                                    <img class="user_image" src="\assets\images\seederImages\completedOrders\user.png">
                                    <div class="order_number_time">
                                        <h3 class="order_number no-margin">Order #10658</h3>
                                        <div class="order_timing">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_2155_11687)">
                                                    <path
                                                        d="M8 15C4.134 15 1 11.866 1 8C1 4.134 4.134 1 8 1C11.866 1 15 4.134 15 8C14.9944 11.8637 11.8637 14.9944 8 15ZM8 1.76364C4.55575 1.76364 1.76364 4.55575 1.76364 8C1.76364 11.4443 4.55575 14.2364 8 14.2364C11.4443 14.2364 14.2364 11.4443 14.2364 8C14.2308 4.55807 11.4419 1.76924 8 1.76364Z"
                                                        fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                    <path
                                                        d="M10.5464 11.4372C10.4326 11.4371 10.3246 11.3867 10.2512 11.2997L7.70571 8.24518C7.64885 8.17652 7.61821 8.08994 7.61916 8.00082V4.94627C7.61916 4.73541 7.79012 4.56445 8.00098 4.56445C8.21184 4.56445 8.3828 4.73541 8.3828 4.94627V7.86336L10.8417 10.811C10.9746 10.9747 10.952 11.2147 10.7908 11.3506C10.7213 11.406 10.6353 11.4365 10.5464 11.4372Z"
                                                        fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2155_11687">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="order_date">December 19, 2021</span>
                                            <p class="no-margin">at</p>
                                            <span class="order_time">08:32 am</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="filtered_order_payment-info">
                                    <h3 class="total-amount no-margin">$63.00</h3>
                                    <p class="total-items no-margin">5 items</p>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>
                <div class="selected_order_details_wrapper">
                    <div class="selected_order_details">
                        <div class="selected_order_details_header">
                            <h4 class="no-margin">Order #10663</h4>
                            <a class="selected_order-customer_email" href="#">Customer@gmail.com</a>
                        </div>
                        <ol class="order_items_full_list no-margin">
                            <li class="ordered_list_item no-padding">
                                <div class="order_list_item_detail">
                                    <div class="item_name">
                                        <h5 class="no-margin">Margherita Pizza</h5>
                                    </div>
                                    <div class="item_size-number">
                                        <div class="item_size">
                                            <p class="no-margin">Size: S</p>
                                        </div>
                                        <div class="number_of_items">
                                            <p class="no-margin">X 2</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ordered_list_item_price">
                                    <h5 class="no-margin">$10.00</h5>
                                </div>
                            </li>
                            <li class="ordered_list_item no-padding">
                                <div class="order_list_item_detail">
                                    <div class="item_name">
                                        <h5 class="no-margin">Romana Pizza</h5>
                                    </div>
                                    <div class="item_size-number">
                                        <div class="item_size">
                                            <p class="no-margin">Size: M</p>
                                        </div>
                                        <div class="number_of_items">
                                            <p class="no-margin">X 1</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ordered_list_item_price">
                                    <h5 class="no-margin">$15.00</h5>
                                </div>
                            </li>
                            <li class="ordered_list_item no-padding">
                                <div class="order_list_item_detail">
                                    <div class="item_name">
                                        <h5 class="no-margin">California Style Pizza</h5>
                                    </div>
                                    <div class="item_size-number">
                                        <div class="item_size">
                                            <p class="no-margin">Size: L</p>
                                        </div>
                                        <div class="number_of_items">
                                            <p class="no-margin">X 3</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ordered_list_item_price">
                                    <h5 class="no-margin">$15.00</h5>
                                </div>
                            </li>
                            <li class="ordered_list_item no-padding">
                                <div class="order_list_item_detail">
                                    <div class="item_name">
                                        <h5 class="no-margin">New York-Style Pizza Vegetarian</h5>
                                    </div>
                                    <div class="item_size-number">
                                        <div class="item_size">
                                            <p class="no-margin">Size: S</p>
                                        </div>
                                        <div class="number_of_items">
                                            <p class="no-margin">X 1</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ordered_list_item_price">
                                    <h5 class="no-margin">$10.00</h5>
                                </div>
                            </li>
                            <li class="ordered_list_item no-padding">
                                <div class="order_list_item_detail">
                                    <div class="item_name">
                                        <h5 class="no-margin">New York-Style Pizza</h5>
                                    </div>
                                    <div class="item_size-number">
                                        <div class="item_size">
                                            <p class="no-margin">Size: M</p>
                                        </div>
                                        <div class="number_of_items">
                                            <p class="no-margin">X 2</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ordered_list_item_price">
                                    <h5 class="no-margin">$15.00</h5>
                                </div>
                            </li>
                        </ol>
                        <div class="pullUp_total_menu-wrapper">
                            <div class="pullUp_total_menu">
                                <div class="discount_provided">
                                    <h5 class="no-margin">Discount</h5>
                                    <h5 class="no-margin">$0.00</h5>
                                </div>
                                <div class="sub_total">
                                    <h5 class="no-margin">Sub Total</h5>
                                    <h5 class="no-margin">$38.00</h5>
                                </div>
                                <hr class="divider">
                                <div class="total_amount">
                                    <h5 class="no-margin">Total Amount</h5>
                                    <h5 class="no-margin">$38.00</h5>
                                </div>
                                <button class="print_invoice_btn">
                                    <span class="no-margin">Print Invoice</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========= ORDER FILTER POPUP ========= -->
        <div class="popup order_filter_popup" id="order_filter_popup">
            <div class="data-form order_filter-data-form">
                <select name="order_detail_select" id="order_detail_select" placeholder="Select Column">
                    <option value="id" selected>Order ID</option>
                    <option value="email">Customer email</option>
                    <option value="name">Customer name</option>
                </select>
                <select name="order_condition_select" id="order_condition_select" placeholder="Select Condition">
                    <option value="contains"selected>Contains</option>
                    <option value="doesnt_contain">Does not contain</option>
                    <option value="equal">Is Equals to</option>
                    <option value="not_equal">Is Not equal to</option>
                </select>
                <input type="text" name="" id="" placeholder="Value here">
                <button class="apply_btn">
                    <span>Apply</span>
                </button>
            </div>
        </div>

    </f7-page>
</template>
<script setup>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input, f7ListItem, f7AccordionContent, f7List, f7AccordionToggle, f7AccordionItem } from 'framework7-vue';
import axios from 'axios';
import { ref } from 'vue';
</script>