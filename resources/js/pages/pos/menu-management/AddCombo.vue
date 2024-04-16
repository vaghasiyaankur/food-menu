<template>
    <f7-page>
        <div class="product-list-section" @click="clickout">
            <div class="product_list_card no-margin position-relative">
                <div class="display-flex">
                    <div class="card_header add-combo-header">
                        <div data-v-06ca3cce="" class="row align-items-center add-combo-banner">
                            <div data-v-06ca3cce="" class="col-100 large-60 medium-60">
                                <h3 data-v-06ca3cce="" class="combo-banner-heading no-margin"><svg width="16"
                                        height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.0415 5.55139H2.70258L6.89287 1.3611C6.96848 1.28807 7.0288 1.20072 7.07029 1.10413C7.11178 1.00755 7.13362 0.903663 7.13453 0.798546C7.13544 0.693429 7.11541 0.589182 7.07561 0.49189C7.0358 0.394597 6.97702 0.306205 6.90269 0.231874C6.82835 0.157542 6.73996 0.0987582 6.64267 0.0589525C6.54538 0.0191468 6.44113 -0.000883547 6.33601 2.9891e-05C6.2309 0.000943329 6.12701 0.0227825 6.03043 0.0642729C5.93384 0.105763 5.84649 0.166074 5.77346 0.241687L0.231789 5.78335C0.0833746 5.93181 0 6.13314 0 6.34306C0 6.55298 0.0833746 6.75431 0.231789 6.90277L5.77346 12.4444C5.92277 12.5886 6.12274 12.6684 6.33032 12.6666C6.53789 12.6648 6.73645 12.5816 6.88323 12.4348C7.03001 12.288 7.11327 12.0895 7.11507 11.8819C7.11688 11.6743 7.03708 11.4743 6.89287 11.325L2.70258 7.13473H15.0415C15.2515 7.13473 15.4528 7.05132 15.6013 6.90285C15.7498 6.75439 15.8332 6.55302 15.8332 6.34306C15.8332 6.1331 15.7498 5.93174 15.6013 5.78327C15.4528 5.6348 15.2515 5.55139 15.0415 5.55139Z"
                                            fill="#38373D" />
                                    </svg>
                                    <span data-v-06ca3cce="" class="page_heading">Add Combo</span>
                                </h3>
                            </div>
                            <div data-v-06ca3cce="" class="col-100 large-40 medium-40">
                                <form class="searchbar combo-search-bar">
                                    <input type="search" placeholder="Search">
                                    <i class="searchbar-icon"></i>
                                    <span class="input-clear-button"></span>
                                    <span class="searchbar-disable-button">Cancel</span>
                                </form>
                            </div>
                        </div>

                        <div class="card-content add-combo display-flex">
                            <div
                                class="grid grid-cols-3 medium-grid-cols-4 grid-gap-25 grid-gap-20 align-items-center add-combo-list">
                                <div class="bg-color-white selected-product data-card">
                                    <div class="combo-image"><img src="/assets/images/seederImages/combo/Burger.png">
                                    </div>
                                    <div class="text-align-center data-card-name">
                                        <h4 class="no-margin no-padding">Burger</h4>
                                        <p class="add-combo-product-price no-margin no-padding">$8.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type1.png">
                                </div>
                                <div class="bg-color-white data-card">
                                    <div class="combo-image"><img src="/assets/images/seederImages/combo/Sandwich.png">
                                    </div>
                                    <div class="text-align-center data-card-name">
                                        <h4 class="no-margin no-padding">Sandwich</h4>
                                        <p class="add-combo-product-price no-margin no-padding">$10.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type2.png">
                                </div>
                                <div class="bg-color-white data-card">
                                    <div class="combo-image"><img src="/assets/images/seederImages/combo/Noodles.png">
                                    </div>
                                    <div class="text-align-center data-card-name">
                                        <h4 class="no-margin no-padding">Noodles</h4>
                                        <p class="add-combo-product-price no-margin no-padding">$19.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type1.png">
                                </div>
                                <div class="bg-color-white data-card">
                                    <div class="combo-image"><img src="/assets/images/seederImages/combo/Papad.png">
                                    </div>
                                    <div class="text-align-center data-card-name">
                                        <h4 class="no-margin no-padding">Papad</h4>
                                        <p class="add-combo-product-price no-margin no-padding">$10.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type3.png">
                                </div>
                                <div class="bg-color-white selected-product data-card">
                                    <div class="combo-image"><img
                                            src="/assets/images/seederImages/combo/French_Fries.png">
                                    </div>
                                    <div class="text-align-center data-card-name">
                                        <h4 class="no-margin no-padding">French Fries</h4>
                                        <p class="add-combo-product-price no-margin no-padding">$19.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type1.png">
                                </div>
                                <div class="bg-color-white selected-product data-card">
                                    <div class="combo-image"><img src="/assets/images/seederImages/combo/Coca_Cola.png">
                                    </div>
                                    <div class="text-align-center data-card-name">
                                        <h4 class="no-margin no-padding">Coca Cola</h4>
                                        <p class="add-combo-product-price no-margin no-padding">$19.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type3.png">
                                </div>
                                <div class="bg-color-white data-card">
                                    <div class="combo-image"><img src="/assets/images/seederImages/combo/Momos.png">
                                    </div>
                                    <div class="text-align-center data-card-name">
                                        <h4 class="no-margin no-padding">Momos</h4>
                                        <p class="add-combo-product-price no-margin no-padding">$10.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type3.png">
                                </div>
                                <div class="bg-color-white data-card">
                                    <div class="combo-image"><img src="/assets/images/seederImages/combo/Pasta.png">
                                    </div>
                                    <div class="text-align-center data-card-name">
                                        <h4 class="no-margin no-padding">Pasta</h4>
                                        <p class="add-combo-product-price no-margin no-padding">$10.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type1.png">
                                </div>
                                <div class="bg-color-white data-card">
                                    <div class="combo-image"><img
                                            src="/assets/images/seederImages/combo/Manchurian.png">
                                    </div>
                                    <div class="text-align-center data-card-name">
                                        <h4 class="no-margin no-padding">Manchurian</h4>
                                        <p class="add-combo-product-price no-margin no-padding">$19.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type3.png">
                                </div>
                                <div class="bg-color-white data-card">
                                    <div class="combo-image"><img src="/assets\images\seederImages\combo\Pizza.png">
                                    </div>
                                    <div class="text-align-center data-card-name">
                                        <h4 class="no-margin no-padding">Pizza</h4>
                                        <p class="add-combo-product-price no-margin no-padding">$19.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type1.png">
                                </div>
                                <div class="bg-color-white data-card">
                                    <div class="combo-image"><img
                                            src="/assets/images/seederImages/combo/Buttermilk.png">
                                    </div>
                                    <div class="text-align-center data-card-name">
                                        <h4 class="no-margin no-padding">Buttermilk</h4>
                                        <p class="add-combo-product-price no-margin no-padding">$10.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type3.png">
                                </div>
                                <div class="bg-color-white data-card">
                                    <div class="combo-image"><img src="/assets/images/seederImages/combo/Sprite.png">
                                    </div>
                                    <div class="text-align-center data-card-name">
                                        <h4 class="no-margin no-padding">Sprite</h4>
                                        <p class="add-combo-product-price no-margin no-padding">$10.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type2.png">
                                </div>
                                <div class="bg-color-white data-card">
                                    <div class="combo-image"><img
                                            src="/assets/images/seederImages/combo/Veg_Crispy.png">
                                    </div>
                                    <div class="text-align-center data-card-name">
                                        <h4 class="no-margin no-padding">Veg Crispy</h4>
                                        <p class="add-combo-product-price no-margin no-padding">$8.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type1.png">
                                </div>
                                <div class="bg-color-white data-card">
                                    <div class="combo-image"><img src="/assets/images/seederImages/combo/Fanta.png">
                                    </div>
                                    <div class="text-align-center data-card-name">
                                        <h4 class="no-margin no-padding">Fanta</h4>
                                        <p class="add-combo-product-price no-margin no-padding">$10.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type3.png">
                                </div>
                                <div class="bg-color-white data-card">
                                    <div class="combo-image"><img src="/assets/images/seederImages/combo/Soup.png">
                                    </div>
                                    <div class="text-align-center data-card-name">
                                        <h4 class="no-margin no-padding">Soup</h4>
                                        <p class="add-combo-product-price no-margin no-padding">$19.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type1.png">
                                </div>
                                <div class="bg-color-white data-card">
                                    <div class="combo-image"><img src="/assets/images/seederImages/combo/Samosa.png">
                                    </div>
                                    <div class="text-align-center data-card-name">
                                        <h4 class="no-margin no-padding">Samosa</h4>
                                        <p class="add-combo-product-price no-margin no-padding">$19.00</p>
                                    </div>
                                    <img class="food-type-icon" src="/assets/images/seederImages/combo/type1.png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative add-combo-slider-wrapper">
                        <div class="add-combo-slider no-margin">
                            <div class="added-combo-details">
                                <table class="added-combo-discr">
                                    <tbody>
                                        <tr>
                                            <td class="no-margin no-padding">
                                                <h4 class="no-margin no-padding">Combo Name</h4>
                                            </td>
                                            <td class="no-margin no-padding">
                                                <h4 class="no-margin no-padding">Price</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="no-margin no-padding">
                                                <input type="text" placeholder="Combo Name" class="added-combo-input">
                                            </td>
                                            <td class="no-margin no-padding">
                                                <input type="number" placeholder="$14.00" class="added-combo-input">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="added-combo-type">
                                    <tbody>
                                        <tr>
                                            <td class="no-margin no-padding">
                                                <h4 class="no-margin no-padding">Food Type</h4>
                                            </td>
                                            <td class="no-margin no-padding">
                                                <h4 class="no-margin no-padding">Status</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="no-margin no-padding">
                                                <div class="display-flex flex-direction-column">
                                                    <div class="type-radio-btn">
                                                        <input type="radio" id="veg" name="type" value="Veg">
                                                        <span for="Veg" checked>Veg</span>
                                                    </div>
                                                    <div class="type-radio-btn">
                                                        <input type="radio" id="non-veg" name="type" value="Non-Veg">
                                                        <span for="Non-Veg">Non - Veg</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="no-margin no-padding">
                                                <div class="display-flex flex-direction-column">
                                                    <div class="status-radio-btn">
                                                        <input type="radio" id="active" name="status" value="Active"
                                                            checked>
                                                        <span for="Active">Active</span>
                                                    </div>
                                                    <div class="status-radio-btn">
                                                        <input type="radio" id="deactive" name="status"
                                                            value="Deactive">
                                                        <span for="Deactive">Deactive</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="added-combo-item-view">
                                <h4 class="no-margin no-padding">Product Image</h4>
                                <div class="display-flex edit-picture">
                                    <div class="edit-picture-img"><img
                                            src="/assets/images/seederImages/add-combo/samosa.png">
                                    </div>
                                    <div
                                        class="edit-picture-btn display-flex justify-content-center align-items-center">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.0833 0H1.91675C0.859834 0 0 0.859863 0 1.91678V13.0833C0 14.1401 0.859834 15 1.91675 15H13.0833C14.1402 15 15 14.1401 15 13.0832V1.91678C15 0.859863 14.1402 0 13.0833 0ZM14.1165 13.0833C14.1165 13.653 13.653 14.1165 13.0833 14.1165H1.91675C1.34701 14.1165 0.883506 13.653 0.883506 13.0833V11.4717L3.79137 8.99757C3.8426 8.95385 3.90763 8.92966 3.97498 8.92925C4.04233 8.92885 4.10765 8.95227 4.15939 8.99537L5.9809 10.5079C6.15653 10.6537 6.41435 10.6418 6.57574 10.4802L10.9037 6.14561C10.982 6.06724 11.0732 6.05962 11.1208 6.06205C11.1682 6.06448 11.2583 6.08142 11.3281 6.1674L14.1165 9.6007L14.1165 13.0833ZM14.1165 8.19917L12.0139 5.61032C11.9106 5.48323 11.7817 5.37923 11.6357 5.30505C11.4896 5.23086 11.3296 5.18813 11.166 5.17963C10.8359 5.16293 10.5122 5.28721 10.2785 5.52129L6.23531 9.57073L4.72389 8.31568C4.51226 8.13941 4.24512 8.04364 3.9697 8.04529C3.69429 8.04694 3.42832 8.14591 3.21882 8.32471L0.883506 10.3117V1.91678C0.883506 1.34704 1.34701 0.883535 1.91675 0.883535H13.0833C13.653 0.883535 14.1165 1.34704 14.1165 1.91678V8.19917Z"
                                                fill="#F33E3E" />
                                            <path
                                                d="M4.72188 1.8457C3.54722 1.8457 2.59161 2.80137 2.59161 3.97597C2.59161 5.1506 3.54725 6.10623 4.72188 6.10623C5.89651 6.10623 6.85214 5.1506 6.85214 3.97597C6.85214 2.80134 5.89654 1.8457 4.72188 1.8457ZM4.72188 5.22272C4.0344 5.22272 3.47512 4.66342 3.47512 3.97597C3.47512 3.28849 4.0344 2.72921 4.72188 2.72921C5.40936 2.72921 5.96864 3.28852 5.96864 3.97597C5.96864 4.66342 5.40936 5.22272 4.72188 5.22272Z"
                                                fill="#F33E3E" />
                                        </svg>
                                        <a href="#" class="no-margin no-padding">
                                            Edit Picture</a>
                                    </div>
                                </div>
                            </div>

                            <div class="added-product-combo">
                                <ul class="added-product-combo_list no-margin no-padding">

                                    <li class="added-combo_list-item">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.5 0C5.15871 0 0 5.15871 0 11.5C0 17.8413 5.15871 23 11.5 23C17.8413 23 23 17.8413 23 11.5C23 5.15871 17.8413 0 11.5 0ZM16.5312 12.4583H6.46875C5.93975 12.4583 5.51042 12.029 5.51042 11.5C5.51042 10.971 5.93975 10.5417 6.46875 10.5417H16.5312C17.0602 10.5417 17.4896 10.971 17.4896 11.5C17.4896 12.029 17.0602 12.4583 16.5312 12.4583Z"
                                                fill="#F33E3E" />
                                        </svg>
                                        <div class="added-list-item-preview">
                                            <img src="/assets/images/seederImages/add-combo/Burger.png">
                                        </div>
                                        <p>Burger</p>
                                    </li>
                                    <hr class="no-padding">

                                    <li class="added-combo_list-item">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.5 0C5.15871 0 0 5.15871 0 11.5C0 17.8413 5.15871 23 11.5 23C17.8413 23 23 17.8413 23 11.5C23 5.15871 17.8413 0 11.5 0ZM16.5312 12.4583H6.46875C5.93975 12.4583 5.51042 12.029 5.51042 11.5C5.51042 10.971 5.93975 10.5417 6.46875 10.5417H16.5312C17.0602 10.5417 17.4896 10.971 17.4896 11.5C17.4896 12.029 17.0602 12.4583 16.5312 12.4583Z"
                                                fill="#F33E3E" />
                                        </svg>
                                        <div class="added-list-item-preview">
                                            <img src="/assets/images/seederImages/add-combo/Sandwich.png">
                                        </div>
                                        <p>Sandwich</p>
                                    </li>
                                    <hr class="no-padding">

                                    <li class="added-combo_list-item">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.5 0C5.15871 0 0 5.15871 0 11.5C0 17.8413 5.15871 23 11.5 23C17.8413 23 23 17.8413 23 11.5C23 5.15871 17.8413 0 11.5 0ZM16.5312 12.4583H6.46875C5.93975 12.4583 5.51042 12.029 5.51042 11.5C5.51042 10.971 5.93975 10.5417 6.46875 10.5417H16.5312C17.0602 10.5417 17.4896 10.971 17.4896 11.5C17.4896 12.029 17.0602 12.4583 16.5312 12.4583Z"
                                                fill="#F33E3E" />
                                        </svg>
                                        <div class="added-list-item-preview">
                                            <img src="/assets/images/seederImages/add-combo/Noodles.png">
                                        </div>
                                        <p>Noodles</p>
                                    </li>
                                    <hr class="no-padding">

                                    <li class="added-combo_list-item">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.5 0C5.15871 0 0 5.15871 0 11.5C0 17.8413 5.15871 23 11.5 23C17.8413 23 23 17.8413 23 11.5C23 5.15871 17.8413 0 11.5 0ZM16.5312 12.4583H6.46875C5.93975 12.4583 5.51042 12.029 5.51042 11.5C5.51042 10.971 5.93975 10.5417 6.46875 10.5417H16.5312C17.0602 10.5417 17.4896 10.971 17.4896 11.5C17.4896 12.029 17.0602 12.4583 16.5312 12.4583Z"
                                                fill="#F33E3E" />
                                        </svg>
                                        <div class="added-list-item-preview">
                                            <img src="/assets/images/seederImages/add-combo/French_Fries.png">
                                        </div>
                                        <p>French fries</p>
                                    </li>
                                </ul>
                            </div>

                            <div class="added-product-combo-btns display-flex">
                                <div class="clear-all-btn">
                                    <a href="#" class="bg-color-white">Clear All</a>
                                </div>
                                <div class="add-combo-btn">
                                    <a href="#" class="text-color-white">Add Combo</a>
                                </div>
                            </div>

                            <div class="horizontal-added-combo-slider">
                                <a href="#"><svg width="8" height="12" viewBox="0 0 8 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.8578 11.0639L7.06917 6.53649C7.15405 6.46279 7.22168 6.37383 7.26791 6.27509C7.31414 6.17635 7.33799 6.06993 7.33799 5.96236C7.33799 5.8548 7.31414 5.74837 7.26791 5.64964C7.22168 5.5509 7.15405 5.46194 7.06917 5.38824L1.8578 0.860863C1.46617 0.520738 0.823486 0.776863 0.823486 1.27336L0.823487 10.6514C0.823487 11.1479 1.46617 11.404 1.8578 11.0639Z"
                                            fill="white" />
                                    </svg>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </f7-page>
</template>
<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input, f7ListItem, f7AccordionContent, f7List, f7AccordionToggle, f7AccordionItem } from 'framework7-vue';
import $ from 'jquery';
import axios from 'axios';
import NoValueFound from '../../../components/NoValueFound.vue'
export default {
    name: 'FoodProduct',
    components: {
        f7Page,
        f7Navbar,
        f7BlockTitle,
        f7Block,
        f7,
        f7Input,
        f7ListItem,
        f7AccordionContent,
        f7AccordionToggle,
        f7List,
        f7AccordionItem,
        NoValueFound
    },
    data() {
        return {
            product: {
                id: null,
                name: [],
                sub_category: null,
                price: '',
            },
            productTitle: 'Add Product',
            subCategoryOption: [],
            subCategoryProduct: {
                products: {
                    product_language: []
                }
            },
            search: '',
            showCategoryList: true,
            showSubCategoryList: true,
            categoryList: [],
            subCategoryList: [],
            active_category: 0,
            active_sub_category: 0,
            active_category_name: 'Category',
            active_sub_category_name: 'Sub Category',
            paginationData: [],
        }
    },
    beforeCreate() {
        this.$root.addLoader();
    },
    mounted() {
        $('.page-content').css('background', '#F7F7F7');
        this.getAllSubCategories();
        this.getProducts();
        this.$root.activationMenu('menu_management', 'product');
        this.getAllCategories();
        this.$root.removeLoader();
    },
    methods: {
        addProduct() {
            var formData = new FormData();
            formData.append('name', this.product.name);
            formData.append('price', this.product.price);
            formData.append('sub_category_id', this.product.sub_category);

            if (!this.product.name || !this.product.price || !this.product.sub_category) {
                this.$root.errorNotification('Please fill the form details.');
                return false;
            }

            if (this.product.id) {
                formData.append('id', this.product.id);
                axios.post('/api/update-product', formData)
                    .then((res) => {
                        // this.$root.successNotification(res.data.success);
                        this.getProducts();
                        f7.popup.close(`#product_popup`);
                        this.blankform();
                    })
            } else {
                axios.post('/api/add-product', formData)
                    .then((res) => {
                        // this.$root.successNotification(res.data.success);
                        this.getProducts();
                        f7.popup.close(`#product_popup`);
                        this.blankform();
                    })
            }
        },
        removeProduct(id) {
            f7.dialog.confirm('Are you sure delete the product?', () => {
                axios.post('/api/delete-product', { id: id })
                    .then((res) => {
                        // this.$root.successNotification(res.data.success);
                        this.getProducts();
                    })
            });

            setTimeout(() => {
                $('.dialog-button').eq(1).css({ 'background-color': '#F33E3E', 'color': '#fff' });
                $('.dialog-title').html("<img src='/images/cross.png'>");
                $('.dialog-buttons').after("<div><img src='/images/flow.png' style='width:100%'></div>");
                $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
                $('.dialog-button').eq(1).removeClass('text-color-black');
                $('.dialog-buttons').addClass('margin-top no-margin-bottom')
            }, 50);
        },
        editProduct(id) {
            this.productTitle = 'Edit Product';
            axios.get('/api/product/' + id)
                .then((res) => {
                    this.product.id = res.data.id;
                    res.data.product_language.forEach(product_lang => {
                        this.product.name[product_lang.language_id] = product_lang.name;
                    });
                    this.product.price = res.data.price;
                    this.product.sub_category = res.data.sub_category_id;
                })
        },
        getAllSubCategories() {
            axios.get('/api/sub-categories')
                .then((res) => {
                    this.subCategoryOption = res.data;
                })
        },
        getProducts() {
            axios.post('/api/get-products', { search: this.search, categoryId: this.active_category, subcategoryId: this.active_sub_category })
                .then((res) => {
                    this.subCategoryProduct = res.data.sub_category_product.data;
                    this.paginationData = res.data.sub_category_product;
                    this.subCategoryList = res.data.sub_category;
                })
        },
        blankform() {
            this.product.id = null;
            this.product.name = [];
            this.product.price = '';
            this.product.sub_category = null;
            this.productTitle = 'Add Product';
        },
        showAllData(e) {
            e.target.classList.toggle('scroll_change_arrow');
            var loadAllData = e.target.parentNode.parentNode.parentNode.previousSibling.querySelectorAll('.showData');
            for (let i = 0; i < loadAllData.length; i++) {
                loadAllData[i].classList.toggle('display-none');
            }
        },
        getAllCategories() {
            axios.get('/api/categories', { search: this.search })
                .then((res) => {
                    this.categoryList = res.data;
                })
        },
        getSubCategoryList(id, e) {
            this.active_category = id;
            this.active_sub_category = 0;
            this.showCategoryList = true;
            this.active_sub_category_name = 'Sub Category';
            this.getProducts();
        },
        getProductList(id) {
            this.active_sub_category = id;
            this.showSubCategoryList = true;
            this.getProducts();
        },
        clickout() {
            const category_list = event.target.parentNode.classList.contains('category--list');
            if (!category_list) {
                this.showCategoryList = true;
            }
            const subcategory_list = event.target.parentNode.classList.contains('subcategory--list');
            if (!subcategory_list) {
                this.showSubCategoryList = true;
            }
        },
        showProductPopup() {
            f7.popup.open(`#product_popup`);
        }
    },
}
</script>

<style scoped>
.deactive_dropdown {
    background-color: #dddddd !important;
}

.product_list_card .dropdown_list {
    position: absolute;
    width: 100%;
    box-shadow: 0px 0px 14px rgba(34, 34, 34, 0.1);
    border-radius: 5px;
}

.list ul::before {
    background-color: #fff !important;
    height: 0;
}

.product_list_card .f-concise #select-concise {
    border: 1px solid #555555;
    border-radius: 7px;
}

.product_list_card #select-concise {
    height: 40px;
}

.arrow_button {
    width: 30px;
    height: 30px;
    background: #ffffff;
    box-shadow: 0px 1px 10px rgb(51 51 51 / 10%);
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.scroll__arrow {
    position: absolute;
    bottom: 0;
    left: 50%;
}

.scroll__arrow .arrow_button i {
    font-size: 18px;
    color: #999999;
    transition: all 0.5s ease;
}

.scroll_change_arrow {
    transform: rotate(180deg);
}

.position-relative {
    position: relative;
}

.menu-item-dropdown .menu-item-content .f7-icons {
    font-size: 15px;
    margin-left: 10px;
}

.product-list-section {
    margin-top: 60px;
}

.product-list-section .product_list_card.card {
    background-color: transparent;
    box-shadow: none;
}

.product-list-section .product_list_card .card.product_lists {
    box-shadow: 0px 1px 10px rgba(51, 51, 51, 0.1);
    border-radius: 10px;
}

.product-list-section .product_list_card .card.product_lists .product_list .button {
    box-shadow: none;
}

.page-food-category {
    background: #f1f1f1;
}

.height-40 {
    height: 40px;
}

.height-36 {
    height: 36px;
}

.bg-dark {
    background: #38373D;
}

.border-bottom {
    border-bottom: 1px solid #EAEAEA;
}

.bg-pink {
    background: #F33E3E;
}

.text-color-pink {
    color: #F33E3E;
}

.font-22 {
    font-size: 22px;
}

.font-18 {
    font-size: 18px;
}

#product_popup .item-input-wrap {
    width: 100%;
    background: #F0F0F0;
    border: 0.5px solid #DCDCDC;
    border-radius: 7px;
    height: auto;
}

.bg-karaka-orange {
    background: #EE4925;
}

.card-title {
    font-weight: 600;
    font-size: 20px;
    line-height: 24px;
}

.product_list:nth-of-type(even) {
    background-color: #f7f7f7
}

.product_lists {
    position: relative;
}

.according_button {
    position: absolute;
    bottom: -26px;
    left: 48%;
}

.product-detail {
    font-weight: 400;
    font-size: 16px;
    line-height: 19px;
}

.option-button {
    font-weight: 400;
    font-size: 13px;
    line-height: 17px;
}

.popup_title {
    font-weight: 500;
    font-size: 18px;
    line-height: 22px;
    color: #38373D;
}

.popup_button .button {
    width: 130px;
    border-radius: 10px;
}

.arrow_button {
    width: 30px;
    height: 30px;
    background: #ffffff;
    box-shadow: 0px 1px 10px rgb(51 51 51 / 10%);
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.scroll__arrow {
    position: absolute;
    bottom: 0;
    left: 50%;
}

.position-relative {
    position: relative;
}

.subcategory__list,
.category__list {
    position: absolute;
    width: 100%;
    z-index: 999;
    background-color: #fff;
    box-shadow: 0.7px 0.7px 5px rgb(0 0 0 / 20%);
    border-radius: 7px;
    max-height: 220px;
    overflow: auto;
}

@media screen and (max-width:820px) {
    .header-links {
        width: 100%;
    }
}
</style>
<style>
.search-icon {
    width: 5% !important;
}
</style>
