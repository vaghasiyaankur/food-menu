<template>
    <div class="customer-info_pending-order_table">
        <div class="latest_customer_info">
            <div class="table_header">
                <h3 class="no-margin">Latest Customer</h3>
                <a href="" class="no-margin">
                    <h5 class="no-margin">View All</h5>
                </a>
            </div>
            <div class="customer_card_holder">
                <div class="customer_card" v-for="latest_customer in latestCustomers" :key="latest_customer.id">
                    <div class="customer_image">
                        <img src="\assets\images\seederImages\dashboard\customer_1.png">
                    </div>
                    <div class="card_customer_name">
                        <h5 class="no-margin">{{latest_customer.name}}</h5>
                    </div>
                    <div class="customer_online_status">
                        <p class="no-margin">18 hours ago</p>
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
</template>

<script setup>
    import { defineProps } from 'vue';

    defineProps({
        latestCustomers: {
            type : Array,
            default : () => []
        }
    });
</script>