<template>
    <div class="card edit_tranaslation no-margin">        
        <div class="card-header padding">
            <div class="heading translate_left">
                <h3 class="no-margin">
                    <span class="page_heading"> Edit Translations - English</span>
                </h3>
            </div>
            <div class="translate_right display-flex align-items-center">
                <div class="item-content item-input margin-right">
                    <div class="item-input-wrap search__data padding-half display-flex">
                        <i class="f7-icons font-22 search-icon">search</i>
                        <input type="search" name="search" placeholder="Search user name...">
                    </div>
                </div>
                <div class="filters_button">
                    <button class="button button-outline height_40"><i class="f7-icons">funnel</i>Filters</button>
                </div>
            </div>
        </div>
        <div class="card-content">
            <div class="edit_translate_table">
                <div class="data-table">
                    <table style="border-bottom:1px solid #E1E1E1">
                        <thead>
                            <tr>
                                <th style="width: 50%;">ID</th>
                                <th style="width: 50%;">Label</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="translate__id display-flex align-items-center">
                                        <span>01.</span>
                                        <div class="item-input-wrap margin-bottom-half margin-top-half width_100">
                                            <input type="text" name="name" class="padding" value="1_business_day" readonly>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="translate__label">
                                        <div class="item-input-wrap margin-bottom-half margin-top-half width_100 margin-right">
                                            <input type="text" name="name" class="padding" placeholder="Ready to ship in 1 Business Day">
                                        </div>
                                    </div>
                                </td>                           
                            </tr>
                            <tr>
                                <td>
                                    <div class="translate__id display-flex align-items-center">
                                        <span>02.</span>
                                        <div class="item-input-wrap margin-bottom-half margin-top-half width_100">
                                            <input type="text" name="name" class="padding" value="2_3_business_days" readonly>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="translate__label">
                                        <div class="item-input-wrap margin-bottom-half margin-top-half width_100 ">
                                            <input type="text" name="name" class="padding" placeholder="Ready to ship in 2-3 Business Days">
                                        </div>
                                    </div>
                                </td>                           
                            </tr>
                            <tr>
                                <td>
                                    <div class="translate__id display-flex align-items-center">
                                        <span>03.</span>
                                        <div class="item-input-wrap margin-bottom-half margin-top-half width_100">
                                            <input type="text" name="name" class="padding" value="4_7_business_day" readonly>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="translate__label">
                                        <div class="item-input-wrap margin-bottom-half margin-top-half width_100 ">
                                            <input type="text" name="name" class="padding" placeholder="Ready to ship in 4-7 Business Day">
                                        </div>
                                    </div>
                                </td>                           
                            </tr>
                            <tr>
                                <td>
                                    <div class="translate__id display-flex align-items-center">
                                        <span>04.</span>
                                        <div class="item-input-wrap margin-bottom-half margin-top-half width_100">
                                            <input type="text" name="name" class="padding" value="8_15_business_day" readonly>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="translate__label">
                                        <div class="item-input-wrap margin-bottom-half margin-top-half width_100 ">
                                            <input type="text" name="name" class="padding" placeholder="Ready to ship in 8-15 Business Day">
                                        </div>
                                    </div>
                                </td>                           
                            </tr>
                            <tr>
                                <td>
                                    <div class="translate__id display-flex align-items-center">
                                        <span>05.</span>
                                        <div class="item-input-wrap margin-bottom-half margin-top-half width_100">
                                            <input type="text" name="name" class="padding" value="abuse_reports" readonly>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="translate__label">
                                        <div class="item-input-wrap margin-bottom-half margin-top-half width_100">
                                            <input type="text" name="name" class="padding" placeholder="Abuse Reports">
                                        </div>
                                    </div>
                                </td>                           
                            </tr>
                            <tr>
                                <td>
                                    <div class="translate__id display-flex align-items-center">
                                        <span>06.</span>
                                        <div class="item-input-wrap margin-bottom-half margin-top-half width_100">
                                            <input type="text" name="name" class="padding" value="abuse_report_exp" readonly>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="translate__label">
                                        <div class="item-input-wrap margin-bottom-half margin-top-half width_100">
                                            <input type="text" name="name" class="padding" placeholder="Briefly describe the issue you're facing">
                                        </div>
                                    </div>
                                </td>                           
                            </tr>
                        </tbody>
                    </table>                
                </div> 
            </div>          
        </div>
        <div class="bottom__bar">
            <div class="submit__button margin-top padding-top">
                <button class="col button button-large button-fill">Save Change</button>
            </div>
            <div class="pagination_count padding display-flex justify-content-space-between align-items-center">
                <div class="pagination__text">
                    <p class="no-margin">Showing 15 of 220 Results</p> 
                </div>
                <div class="pagination_list">
                    <a href="javascript:;" class="link disabled"><i class="icon-prev"></i></a>
                    <a href="javascript:;" class="active">1</a>
                    <a href="javascript:;" class="">2</a>
                    <a href="javascript:;" class="link"><i class="icon-next"></i></a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { f7 } from 'framework7-vue';
    import axios from 'axios';
    export default {
        name : 'EditTranslations',
        props: ['tableId'],
        components : {
            f7
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
            this.$root.activationMenu('setting');
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
.edit_tranaslation .search__data{
    width: 100%;
    background: #FFFFFF;
    border:1px solid #555555;;
    border-radius: 5px;
    height: auto;
  }
  .height_40{
    height: 40px;
  }
  .width_100{
    width: 100%;
  }
  .edit_tranaslation .filters_button .button{
	border: 1px solid #555555;
	border-radius: 5px;
	font-weight: 500;
	font-size: 14px;
	line-height: 17px;
	color: #555555;
    width: 140px;
}
.submit__button button{
	width: 100%;
	max-width: 160px;
	margin: 0 auto;
	border-radius: 10px;
	background-color: #F33E3E;
    text-transform: capitalize;
}
.pagination_count .pagination_list a {
	color: black;
	float: left;
	padding: 8px 16px;
	text-decoration: none;
	border-radius: 5px;
}
.register-button:hover, .register-button:active, .active {
	background: #F33E3E !important;
	color: #fff !important;
}
.bottom__bar{
    position: fixed;
    width: 100%;
    bottom: 0;
    border-top: 1px solid #999999;
}
.edit_tranaslation .card-content .edit_translate_table{
    height: calc(100% - 225px);
    overflow: auto;
}
.edit_translate_table .translate__id .item-input-wrap input{
    background: #F0F0F0;
}
.edit_translate_table .translate__label .item-input-wrap input{
    background: #FFFFFF ;
}
.edit_translate_table .item-input-wrap input{
	width: 100%;	
	border: 0.5px solid #DCDCDC;
	border-radius: 5px;
    height: 36px;
}

</style>
<style>

label.item-checkbox input[type='checkbox']:checked~.icon-checkbox{
    background-color: #F33E3E !important;
    border-color: #F33E3E !important;
}
</style>

