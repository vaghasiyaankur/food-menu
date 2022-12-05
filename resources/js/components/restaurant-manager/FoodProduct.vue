<template>
    <f7-page>
        <div class="nav-bar">
            <f7-navbar class="navbar-menu bg-color-white" large transparent back-link="Back">
                <div class="header-links display-flex align-items-center padding-right">
                    <div class="row header-link justify-content-flex-end align-items-center">
                        <div class=" padding-left-half padding-right-half height-40 nav-button">
                            <a href="/Reservation/" class="col link nav-link button button-raised bg-dark text-color-white padding">
                                Reservation</a>
                        </div>
                        <div class="col-25 nav-button">
                            <div class="menu-item menu-item-dropdown">
                                <div class="menu-item-content button button-raised bg-pink text-color-white padding-left-half padding-right-half">Menu management
                                    <i class="f7-icons">chevron_down</i>
                                </div>
                                <div class="menu-dropdown menu-dropdown-center bg-color-transparent">
                                    <div class="menu-dropdown-content bg-color-white no-padding">
                                        <a href="#" class="menu-dropdown-link menu-close margin-horizontal no-padding"></a>
                                        <a href="/food-category/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food Category</a>
                                        <a href="/food-product/" class="menu-dropdown-link menu-close text-color-pink margin-horizontal no-padding">Food Menu</a>                                        
                                        <a href="/food-subcategory/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Food SubCategory</a>
                                        <a href="/digital-menu/" class="menu-dropdown-link menu-close text-color-black margin-horizontal no-padding">Digital Menu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" padding-left-half padding-right-half height-40 nav-button"><a href="/Reporting/" class="link nav-link button button-raised bg-dark text-color-white padding">Reporting</a></div>
                        <div class="padding-left-half padding-right-half height-40"><button class="nav-link button button-raised bg-dark text-color-white padding closeReservation" @click="$root.closeReservation()">Close reservation</button></div>
                        <div class=" padding-left-half padding-right-half height-40"><a href="/settings/" class="nav-link button button-raised bg-dark text-color-white padding">Settings</a></div>
                    </div>
                </div>
            </f7-navbar>
        </div>
        <div class="product-list-section">
            <div class="card product_list_card no-margin">
                <div class="card_header">
                    <div class="row padding-horizontal margin-horizontal align-items-center">
                        <div class="col-50">
                            <h3 class="card-title">Product</h3>
                        </div>
                        <div class="col-50">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="item-content item-input">
                                        <div class="item-inner">
                                            <div class="item-input-wrap row padding-half">
                                                <i class="f7-icons font-22 search-icon">search</i>
                                                <input type="search" name="search" id="searchData">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col padding-left-half padding-right-half">
                                    <button class="button bg-dark text-color-white padding height-36 popup-open"
                                    data-popup="#product_popup" @click="addProduct"><i class="f7-icons font-22 margin-right-half">plus_square</i> Add Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content card-content-padding">
                    <div class="row">
                        <div class="col-50">
                            <div class="row">                                
                                <div class="col-100">
                                    <div class="card product_lists">
                                        <div class="card_header padding-horizontal padding-top text-align-center">
                                            <div class="border-bottom padding-bottom">
                                                <span class="card-title">Kathiyavadi thali</span>
                                            </div>
                                        </div>
                                        <div class="card-content padding-top">
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Rice</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                                                data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Dal</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                                                data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Roti</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                                                data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Sabji</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                                                data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Chhas</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                                                data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Sabji</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                                                data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Chhas</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                                                data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Sabji</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                                                data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-100">
                                    <div class="card product_lists">
                                        <div class="card_header padding-horizontal padding-top text-align-center">
                                            <div class="border-bottom padding-bottom">
                                                <span class="card-title">Paratha</span>
                                            </div>
                                        </div>
                                        <div class="card-content padding-top">
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Rice</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                                                data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Dal</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                                                data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Roti</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                                                data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Sabji</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                                                data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Chhas</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                                                data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-50">
                            <div class="row">
                                <div class="col-100">
                                    <div class="card product_lists">
                                        <div class="card_header padding-horizontal padding-top text-align-center">
                                            <div class="border-bottom padding-bottom">
                                                <span class="card-title">Pizza</span>
                                            </div>
                                        </div>
                                        <div class="card-content padding-top">
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Rice</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                    data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Dal</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                    data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Roti</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                    data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Sabji</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                    data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Chhas</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                    data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-100">
                                    <div class="card product_lists">
                                        <div class="card_header padding-horizontal padding-top text-align-center">
                                            <div class="border-bottom padding-bottom">
                                                <span class="card-title">Sandwich</span>
                                            </div>
                                        </div>
                                        <div class="card-content padding-top">
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Rice</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                    data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Dal</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                    data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Roti</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                    data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Sabji</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                    data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_list padding-vertical-half">
                                                <div class="row align-items-center padding-horizontal">
                                                    <div class="col-60">
                                                        <div class="row">
                                                            <div class="col product-detail">Chhas</div>
                                                            <div class="col text-align-right product-detail">₹ 70.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-40">
                                                        <div class="row">
                                                            <div class="col-50">
                                                                <button class="button text-color-black padding height-36 option-button  popup-open"
                                    data-popup="#product_popup" @click="editProduct"><i class="f7-icons font-18 margin-right-half">square_pencil</i> Edit</button>
                                                            </div>
                                                            <div class="col-50">
                                                                <button class="button text-color-red padding height-36 option-button" @click="removeProduct"><i class="f7-icons font-18 margin-right-half">trash</i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
        <div id="product_popup" class="popup" style="position: fixed; display: block; border-radius: 15px;">
            <div class="text-align-center padding popup_title">Add Product</div>
            <div class="category-add padding">
                <div class="categoryForm text-align-left no-padding">
                    <label for="" class="add_category_name">Add product</label>
                    <input type="text" name="name" class="category-name margin-top-half padding-left-half padding-right-half" placeholder="Add Product name">
                </div>
                <div class="categoryForm text-align-left margin-top">
                    <label for="" class="add_category_name">Parent category</label>
                    <div class="item-input-wrap input-dropdown-wrap category-name margin-top-half no-padding">
                        <select placeholder="Please choose..." class="selectCategory padding-left-half">
                            <option value="indian">indian</option>
                            <option value="chinese">chinese</option>
                            <option value="panjabi">panjabi</option>
                            <option value="dessert">dessert</option>
                            <option value="fast_food">fast food</option>
                        </select>
                    </div>
                </div>
                <div class="categoryForm margin-top text-align-left no-padding">
                    <label for="" class="add_category_name">Price</label>
                    <input type="text" name="name" class="category-name margin-top-half padding-left-half padding-right-half" placeholder="Add product price">
                </div>
                <div class="margin-top no-margin-bottom display-flex justify-content-center padding-top popup_button">
                    <button type="button" class="button button-raised text-color-black button-large popup-close margin-right">Cancel</button>
                    <button type="button" class="button button-raised button-large bg-karaka-orange" style="background-color: rgb(243, 62, 62); color: rgb(255, 255, 255);" @click="addCategory">Ok</button>
                </div>
            </div>
            <div><img src="/images/flow.png" style="width:100%"></div>
        </div>
    </f7-page>
</template>
<script>
import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Input,f7ListItem,f7AccordionContent,f7List,f7AccordionToggle,f7AccordionItem } from 'framework7-vue';
import $ from 'jquery';
export default {
    name : 'FoodProduct',
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
        f7AccordionItem
    },
    mounted() {
        $('.page-content').css('background', '#F0F0F0');
    },
    methods: {
        addProduct(){
            // var product = f7.dialog.create({
            //     title: 'Add Product',
            //     content: document.getElementById('product_popup').innerHTML,
            //     buttons: [{
            //             text: 'Cancel',
            //             class: 'button'
            //         },
            //         {
            //             text: 'Ok',
            //             class: 'button'
            //         },
            //     ],
            // });

            // product.open(false)

            // setTimeout(() => {
            //     $('.category-title').remove();
            //     $('.dialog-button').eq(1).css({ 'background-color': '#F33E3E', 'color': '#fff' });
            //     $('.dialog-buttons').after("<div><img src='/images/flow.png' style='width:100%'></div>");
            //     $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
            //     $('.dialog-button').eq(1).removeClass('text-color-black');
            //     $('.dialog-buttons').addClass('margin-top no-margin-bottom')
            // }, 200);
        },
        removeProduct(){
            f7.dialog.confirm('Are you sure delete the product?');
            setTimeout(() => {
                $('.dialog-button').eq(1).css({ 'background-color': '#F33E3E', 'color': '#fff' });
                $('.dialog-title').html("<img src='/images/cross.png'>");
                $('.dialog-buttons').after("<div><img src='/images/flow.png' style='width:100%'></div>");
                $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
                $('.dialog-button').eq(1).removeClass('text-color-black');
                $('.dialog-buttons').addClass('margin-top no-margin-bottom')
            }, 200);
        },
        editProduct(){
            // var product = f7.dialog.create({
            //     title: 'Edit Product',
            //     content: document.getElementById('product_popup').innerHTML,
            //     buttons: [{
            //             text: 'Cancel',
            //             class: 'button'
            //         },
            //         {
            //             text: 'Ok',
            //             class: 'button'
            //         },
            //     ],
            // });

            // product.open(false)

            // setTimeout(() => {
            //     $('.category-title').remove();
            //     $('.dialog-button').eq(1).css({ 'background-color': '#F33E3E', 'color': '#fff' });
            //     $('.dialog-buttons').after("<div><img src='/images/flow.png' style='width:100%'></div>");
            //     $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
            //     $('.dialog-button').eq(1).removeClass('text-color-black');
            //     $('.dialog-buttons').addClass('margin-top no-margin-bottom')
            // }, 200);
        }
    },
}
</script>

<style scoped>
.menu-item-dropdown .menu-item-content .f7-icons{
    font-size: 15px;
    margin-left: 10px;
}
.product-list-section .product_list_card.card{
    background-color: #ffffff;
    box-shadow:none;
}
.product-list-section .product_list_card .card.product_lists{
   box-shadow: 0px 1px 10px rgba(51, 51, 51, 0.1);
   border-radius: 10px;
}
.product-list-section .product_list_card .card.product_lists .product_list .button{
    box-shadow:none;
}
    .page-food-category {
        background: #f1f1f1;
    }

    .navbar-menu {
        box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.15);
        height: 60px !important;
        position: relative;
        z-index: 99;
    }

    .height-40 {
        height: 40px;
    }

    .height-36 {
        height: 36px;
    }

    .nav-botton {
        height: 100%;
    }

    .menu-item-content {
        position: relative;
        z-index: 9;
    }

    .menu-dropdown-content {
        box-shadow: 0px 0.5px 12px rgba(0, 0, 0, 0.2);
        min-width: 100% !important;
        top: -30px;
    }

    .header-links {
        width: 75%;
    }

    .menu-dropdown-center:before,
    .menu-dropdown-center:after {
        content: none;
    }

    .bg-dark {
        background: #38373D;
    }

    .menu-item-dropdown-opened .menu-item-content {
        background: #F33E3E;
    }

    .menu-dropdown-link:nth-child(2) {
        border-bottom: 1px solid #EFEFEF;
    }
    .menu-dropdown-link{
        border-bottom: 1px solid #EFEFEF;
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
    .font-18{
        font-size: 18px;
    }
    .nav-bar {
        border-radius: 8px 8px 0px 0px;
        position: fixed;
        width: 100%;
        z-index: 99;
    }

    .page-content {
        padding-top: 0px !important;
    }
    .item-input-wrap {
        width: 100%;
        background: #F0F0F0;
        border: 0.5px solid #DCDCDC;
        border-radius: 7px;
        height: auto;
    }
    .bg-karaka-orange{
        background: #EE4925;
    }
    .card-title{
        font-weight: 600;
        font-size: 20px;
        line-height: 24px;
    }
    #searchData {
        width: 90%;
    }
    .product_list:nth-of-type(even){
        background-color:#f7f7f7
    }
    .product_lists{
        position: relative;
    }
    .according_button{
        position: absolute;
        bottom: -26px;
        left: 48%;
    }
    .product-detail{
        font-weight: 400;
        font-size: 16px;
        line-height: 19px;
    }
    .option-button{
        font-weight: 400;
        font-size: 13px;
        line-height: 17px;
    }

    .nav-link,.menu-item-content {
        height: 100% !important;
        text-transform: capitalize !important;
    }
    .popup_title{
        font-weight: 500;
        font-size: 18px;
        line-height: 22px;
        color: #38373D;
    }
    .popup_button .button{
        width: 130px;
        border-radius: 10px;
    }

    @media screen and (max-width:820px) {
        .header-links {
            width: 100%;
        }
    }
</style>

<style>
    .left {
        width: 20%;
        margin-left: 20px;
    }
    .search-icon{
        width : 10% !important;
    }
    @media screen and (max-width:820px) {
        .left {
            width: 30%;
        }
    }
</style>
