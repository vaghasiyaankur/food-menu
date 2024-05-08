<template>
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
        <div class="cancel-save-btn">
            <div class="cancel-split-btn">
                <button class="popup-cancel-split-button popup-close">Cancel</button>
            </div>
            <div class="save-split-btn">
                <button type="button" class="popup-save-split-button">Save</button>
            </div>
        </div>
    </div>
</template>