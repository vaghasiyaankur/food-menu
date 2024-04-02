<template>
    <div>
        <div class="add__table padding">
            <TabHeader title="Back to List" />
            <div class="back_link">
                <a class="link back text-color-black" href="javascript:;" @click="$emit('tableshow')"><i class="icon icon-back"> </i>
                    <span class="margin-left-half">Back to List</span>
                </a>
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
                                        <input type="number" name="number" class="padding margin-top-half" placeholder="Enter Capacity" v-model="capacity_of_person" @keyup="checkColor()">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-50">
                            <div class="block-title no-margin-top no-margin-left padding-left">Select Floor</div>
                            <div class="item-inner padding-left">
                                <div class="item-input-wrap input-dropdown-wrap">
                                    <select placeholder="Please choose..." class="padding-left padding-right" v-model="floor_number">
                                        <option v-for="floor in floors" :key="floor" :value="floor.id">{{ floor.name }}</option>
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
                                            <option v-for="color in colors" :key="color.id" :value="color.id">{{color.color.replace("_", " ")}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-50">
                            <div class="item-content item-input margin-bottom">
                                <div class="item-inner">
                                    <div class="block-title no-margin-top no-margin-left">Finish Order Time(in Minute)</div>
                                    <div class="item-input-wrap">
                                        <input type="number" name="finish_order_time" class="padding margin-top-half" placeholder="Enter Capacity" v-model="finish_order_time">
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
    import TabHeader from '../../../components/TabHeader.vue';
    import axios from 'axios';
    export default {
        name : 'AddTable',
        props: ['tableId'],
        components : {
            f7, TabHeader
        },
        data() {
            return {
                table_number : '',
                capacity_of_person : '',
                floor_number : '',
                colors : [],
                color: '',
                floors : [],
                finish_order_time: 0
            }
        },
        created() {
            this.colorList();
            this.getFloors();
        },
        mounted() {
            this.$root.activationMenu('setting', '');
        },
        methods: {
            colorList() {
                axios.get('/api/color-list')
                .then((res) => {
                    this.colors = res.data.colors;
                    if(this.tableId == 0) return false;
                    this.tableData();
                })
            },
            tableData() {
                axios.get('/api/table-data/'+this.tableId)
                .then((res) => {
                    this.table_number = res.data.table.table_number;
                    this.capacity_of_person = res.data.table.capacity_of_person;
                    this.floor_number = res.data.table.floor_id;
                    this.color = res.data.table.color_id;
                    this.finish_order_time = res.data.table.finish_order_time;
                })
            },
            addUpdateTable() {
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                var formData = new FormData();

                if(!this.table_number || !this.capacity_of_person || !this.floor_number || !this.color){
                    this.$root.errornotification('Please Fill All Data in Form')
                    return false;
                }

                formData.append('id', this.tableId);
                formData.append('table_number' , this.table_number);
                formData.append('capacity_of_person' , this.capacity_of_person);
                formData.append('floor_number' , this.floor_number);
                formData.append('color' , this.color);
                formData.append('finish_order_time' , parseInt(this.finish_order_time));

                axios
                .post("/api/add-update-table", formData, config)
                .then((res) => {
                    this.$root.successnotification(res.data.success);
                    this.$emit('tableshow')
                }).catch((error) => {
                    this.$root.errornotification('Something Went Wrong !!!');
                    return false;
                });
            },
            checkColor() {
                axios.get('/api/check-color/'+this.capacity_of_person)
                .then((res) => {
                    if(res.data.success) this.color = res.data.color_id;
                })
            },
            getFloors() {
                axios.get('/api/get-floors')
                    .then((res) => {
                        this.floors = res.data.data;
                    })
            },
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
