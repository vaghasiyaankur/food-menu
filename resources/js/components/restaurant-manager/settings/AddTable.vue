<template>
    <div>
        <div class="add__table padding">
            <div class="back_link">
                <a class="link back text-color-black" href="javascript:;" @click="$emit('tableshow')"><i class="icon icon-back"> </i>
                    <span class="margin-left-half">Back to List</span>
                </a>        
                <!-- <h2 @click="$emit('tableshow')">dcsfhczsdnvghasdf</h2> -->
            </div>
            <div class="add_table_field">
                <form class="list margin-vertical" id="my-form">
                    <div class="row padding-bottom margin-bottom">
                        <div class="col-50">
                            <div class="item-content item-input margin-bottom">
                                <div class="item-inner">
                                    <div class="block-title no-margin-top no-margin-left">Table Number</div>
                                    <div class="item-input-wrap"><input type="number" name="number" class="padding margin-top-half" placeholder="Enter table number"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-50">
                            <div class="item-content item-input margin-bottom">
                                <div class="item-inner">
                                    <div class="block-title no-margin-top no-margin-left">Capacity of Person</div>
                                    <div class="item-input-wrap"><input type="number" name="number" class="padding margin-top-half" placeholder="Enter Capacity"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-50">
                            <div class="block-title no-margin-top no-margin-left padding-left padding-top-half">Select Floor</div>
                            <div class="item-inner padding-left">
                                <div class="item-input-wrap input-dropdown-wrap">
                                    <select placeholder="Please choose..." class="padding-left padding-right">
                                        <option value="Male">Ground floor (Non-AC)</option>
                                        <option value="Female">First floor (AC)</option>
                                        <option value="Female">Second floor (AC)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-50">
                            <div class="item-content item-input margin-bottom">
                                <div class="item-inner">
                                    <div class="block-title no-margin-top no-margin-left">Capacity of Person</div>
                                    <div class="item-input-wrap"><input type="text" name="number" class="padding margin-top-half" placeholder="Enter color name"></div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="submit__button margin-top padding-top">
                        <button class="col button button-large button-fill">Save</button>
                    </div>                                                          
                </form>
            </div>
        </div>
    </div>
</template>
<style scoped>
    .add__table .back_link a.back{
        font-weight: 500;
        font-size: 16px;
        line-height: 19px;
        color: #38373D;
    }
    .add__table .back_link .icon-back:after{
        font-size:16px
    }
    .list input[type='text'], .list input[type='password'], .list input[type='search'], .list input[type='email'], .list input[type='tel'], .list input[type='url'], .list input[type='date'], .list input[type='month'], .list input[type='datetime-local'], .list input[type='time'], .list input[type='number'], .list select{
        background-color: #FAFAFA;
        border-radius: 10px;
    }
    .add__table .list .item-inner:after {
        background-color: transparent;
    }
    .add_table_field .submit__button button{
        width:100%;
        max-width:160px;
        margin:0 auto;   
        border-radius:10px;  
        background-color: #F33E3E;   
    }
    .input-dropdown-wrap:before, .input-dropdown:before{
        right:13px;
    }
</style>