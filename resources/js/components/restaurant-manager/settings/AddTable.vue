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
                                    <div class="item-input-wrap">
                                        <input type="number" name="number" class="padding margin-top-half" placeholder="Enter table number" v-model="table_number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-50">
                            <div class="item-content item-input margin-bottom">
                                <div class="item-inner">
                                    <div class="block-title no-margin-top no-margin-left">Capacity of Person</div>
                                    <div class="item-input-wrap">
                                        <input type="number" name="number" class="padding margin-top-half" placeholder="Enter Capacity" v-model="capacity_of_person">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-50">
                            <div class="block-title no-margin-top no-margin-left padding-left">Select Floor</div>
                            <div class="item-inner padding-left">
                                <div class="item-input-wrap input-dropdown-wrap">
                                    <select placeholder="Please choose..." class="padding-left padding-right" v-model="floor_number">
                                        <option value="0">Ground floor (Non-AC)</option>
                                        <option value="1">First floor (AC)</option>
                                        <option value="2">Second floor (AC)</option>
                                        <option value="3">Third floor (AC)</option>
                                        <option value="4">Fourth floor (AC)</option>
                                        <option value="5">Fifth floor (AC)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-50">
                            <div class="block-title no-margin-top no-margin-left padding-left">Table Color</div>
                            <div class="item-content item-input margin-bottom">
                                <div class="item-inner">
                                    <div class="item-input-wrap input-dropdown-wrap">
                                        <!-- <input type="text" name="number" class="padding margin-top-half" placeholder="Enter color name"> -->
                                        <select placeholder="Please choose table color..." class="padding-left padding-right" v-model="color">
                                            <option value="Green">Green</option>
                                            <option value="Yellow">Yellow</option>
                                            <option value="Red">Red</option>
                                            <option value="Orange">Orange</option>
                                            <option value="Blue">Blue</option>
                                            <option value="Pink">Pink</option>
                                            <option value="Grey">Grey</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="submit__button margin-top padding-top">
                        <button type="button" class="col button button-large button-fill" @click="addUpdateTable">Save</button>
                    </div>                                                          
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import { f7 } from 'framework7-vue';
    import axios from 'axios';  
    export default {
        name : 'AddTable',
        props: ['tableId'],
        components : {
            f7
        },
        data() {
            return {
                table_number : '',
                capacity_of_person : '',
                floor_number : '',
                color: '',
            }
        },
        created() {
            if(this.tableId == 0) return false;
            this.tableData();
        },
        methods: {
            tableData() {
                axios.get('/api/table-data/'+this.tableId)
                .then((res) => {
                    this.table_number = res.data.table.table_number;
                    this.capacity_of_person = res.data.table.capacity_of_person;
                    this.floor_number = res.data.table.floor_number;
                    this.color = res.data.table.color;
                })
            },
            addUpdateTable() {
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                var formData = new FormData();

                if(!this.table_number || !this.capacity_of_person || !this.floor_number || !this.color){
                    this.notification('Please Fill All Data in Form')  
                    return false;
                }

                formData.append('id', this.tableId);
                formData.append('table_number' , this.table_number);
                formData.append('capacity_of_person' , this.capacity_of_person);
                formData.append('floor_number' , this.floor_number);
                formData.append('color' , this.color);  

                axios
                .post("/api/add-update-table", formData, config)
                .then((res) => {
                    this.notification(res.data.success);
                    this.$emit('tableshow')
                }).catch((error) => {
                    this.notification('Something Went Wrong !!!');
                    return false;
                });
            },
            notification(notice) {
                var notificationFull = f7.notification.create({
                    subtitle: notice,
                    closeTimeout: 3000,
                });
                notificationFull.open();
            }
        }    
    }
</script>
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