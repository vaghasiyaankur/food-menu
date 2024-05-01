<template>
    <div class="popup add-table-popup" id="add-table-popup">
        <div class="data-form add_table-data-form">
            <div class="text-align-center add_table-popup_title">
                Add Table</div>
            <div class="data-add add_table-data">
                <label class="add_table_name">Table Number</label>
                <div class="add_table-name text-align-left">
                    <input type="text" class="add_table-update-data-name" placeholder="Enter table number">
                </div>
                <label class="add_table_cap">Capacity of Person</label>
                <div class="add_table-cap text-align-left">
                    <input type="text" class="add_table_cap-data-name" placeholder="Enter capacity of person">
                </div>
                <label class="choose_add_table_floor">Select Floor</label>
                <div class="choose_table_floor">
                    <select name="choose_table_floor" id="choose_table_floor">
                        <option value="FirstFloor" selected><label>First Floor</label></option>
                    </select>
                </div>
                <label class="choose_add_table_status">Status</label>
                <div class="display-flex align-items-center table_status-outer">
                    <div class="table_status-inner">
                        <input type="radio" id="table_status" name="table_status" value="active" checked>
                        <label for="table_status">Active</label>
                    </div>
                    <div class="table_status-inner">
                        <input type="radio" id="table_status" name="table_status" value="deactive">
                        <label for="table_status">Deactive</label>
                    </div>
                </div>
                <div class="display-flex justify-content-center popup_button">
                    <button type="button"
                        class="button button-raised button-large popup-close popup-cancel-button">Cancel</button>
                    <button type="button" class="button button-raised button-large popup-ok-button">Ok</button>
                </div>
            </div>
        </div>
        <div class="wave-image-content"><img src="/images/flow.png" style="width:100%"></div>
    </div>
</template>

<script setup>
    
</script>