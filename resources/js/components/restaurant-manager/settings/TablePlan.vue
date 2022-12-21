<template>
    <div class="card">
        <div class="card-header">
            <div class="table_mangment_heading">
                <h3 class="card-title no-margin">Table List</h3>
            </div>
            <div class="add_table_button">
                <button class="button" @click="$emit('tablehide', 0, page_number)"><i class="f7-icons margin-right-half">plus_square</i> Add Table</button>
            </div>
        </div>
        <div class="card-content">
            <div class="data-table">
                <table>
                   <thead>
                      <tr>
                         <th>Table No.</th>
                         <th>Capacity of Person</th>
                         <th style="width:15%">Floor No.</th>
                         <th style="width:20%;">Status</th>
                         <th>Table Color</th>
                         <th style="width:15%;">Action</th>
                      </tr>
                   </thead>
                   <tbody>
                      <tr v-for="table in tables" :key="table.id">
                         <td class="label-cell">{{ table.table_number }}.</td>
                         <td>{{ table.capacity_of_person }} Person Capacity</td>
                         <td>{{ table.floor_number == 0 ? 'Ground' : table.floor.short_cut }} Floor</td>
                         <td>
                            <span class="status_info status_active" v-if=" table.status" @click="changeStatus(table.id, 0)">Active</span>
                            <span class="status_info status_deactive" v-else @click="changeStatus(table.id, 1)">Deactive</span>

                         </td>
                         <td>
                            <div class="table_color">
                                <span class="green_bg color__dot" :style="{'background-color': 'rgb('+table.color.rgb+')'}"></span>{{ table.color.color.replace("_", " ") }}
                            </div>
                         </td>
                         <td>
                            <div class="display-flex">
                                <a href="javascript:;" class="button text-color-black font-13 no-padding-left" @click="$emit('tablehide', table.id, page_number)"><i class="f7-icons font-13 margin-right-half">square_pencil</i> Edit</a>
                                <a href="javascript:;" class="button text-color-red font-13" @click="removeTable(table.id)"><i class="f7-icons font-13 margin-right-half">trash</i> Delete</a>
                            </div>
                         </td>
                      </tr>
                   </tbody>
                </table>
                <div class="pagination_count padding-vertical-half">
                        <div class="pagination_list">
                            <div v-for="(link,index) in paginationData.links" :key="link">
                                <a href="javascript:;" v-if="index == 0" @click="link.url != null ? tableList(link.url) : 'javascript:;'" class="link" :class="{ 'disabled': link.url == null}"><i class="icon-prev"></i></a>
                                <a href="javascript:;" v-if="paginationData.links.length - 1 != index && index != 0" @click="link.url != null ? tableList(link.url) : 'javascript:;'" :class="{ 'disabled': link.url == null, 'active': paginationData.current_page == index}">{{ index }}</a>
                                <a href="javascript:;" v-if="paginationData.links.length - 1 == index" @click="link.url != null ? tableList(link.url) : 'javascript:;'" class="link" :class="{ 'disabled': link.url == null}"><i class="icon-next"></i></a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { f7 } from 'framework7-vue';
    import $ from 'jquery';
    import axios from 'axios';

    export default {
        name : 'AddFloorPlan',
        props : ['page'],
        data() {
            return {
                tables: [],
                page_number: 1,
                paginationData : [],
            }
        },
        created() {
            this.page_number = this.page;
            this.tableList(this.page_number);
        },
        mounted() {
            this.$root.activationMenu('setting');
        },
        methods: {
            tableList(pagenumber) {
                if (pagenumber == undefined || pagenumber == 1) {
                    pagenumber = 1
                } else {
                    pagenumber = pagenumber.split('page=')[1];
                }
                var page = '/api/table-list?page=' + pagenumber;
                this.page_number = page;
                axios.get(page)
                .then((res) => {
                    this.tables = res.data.tables.data;
                    this.paginationData = res.data.tables;
                })
            },
            removeTable(id) {
                f7.dialog.confirm('Are you sure delete the table?', () => {
                axios.post('/api/delete-table', { id: id })
                    .then((res) => {
                        this.$root.successnotification(res.data.success);
                        this.tableList();
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
            changeStatus(id, status){
                f7.dialog.confirm('Are you sure Change status of the table?', () => {
                    axios.post('/api/change-table-status', { id : id , status: status })
                    .then((res) => {
                        this.$root.successnotification(res.data.success);
                        this.tableList();
                    })
                });
                setTimeout(() => {
                    $('.dialog-button').eq(1).css({ 'background-color': '#F33E3E', 'color': '#fff' });
                    $('.dialog-title').html("");
                    $('.dialog-buttons').after("<div><img src='/images/flow.png' style='width:100%'></div>");
                    $('.dialog-button').addClass('col button button-raised text-color-black button-large text-transform-capitalize');
                    $('.dialog-button').eq(1).removeClass('text-color-black');
                    $('.dialog-buttons').addClass('margin-top no-margin-bottom');
                }, 50);
            }
        }
    }
</script>
<style scoped>
.card-content .data-table td{
    padding-top: 15px;
    padding-bottom: 15px;
    white-space: nowrap;
}
.add_table_button button{
    background-color: #38373D;
    box-shadow: 0px 2px 4px rgba(172, 172, 172, 0.45);
    border-radius: 7px;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #FFFFFF;
    padding: 20px 36px !important;
}
.card-title{
    font-weight: 600;
    font-size: 20px;
    line-height: 24px;
    color: #38373D;
}
.status_info{
    display: flex;
    justify-content: center;
    border-radius: 5px;
    height: 26px;
    line-height: 26px;
    font-weight: 400;
    font-size: 12px;
    width: 60%;
    padding: 0 42px;

}
.status_info.status_active{
    background-color: #E9FBE7;
    color: #3D833C;
}
.status_info.status_deactive{
    background-color: #FFE9E9;
    color: #AE4444;
}
.table_color .color__dot{
    width: 14px;
    height: 14px;
    border-radius:50%;
    display: inline-block;
    vertical-align: middle;
    margin-right: 5px;
    opacity: 0.5;
}
.green_bg{
    background-color: #0FC963;
}
.yellow_bg{
    background: #FCD95E;
}
.red_bg{
    background: #FF6161;
}
.orange_bg{
    background: #FC8E5E;
}
.blue_bg{
    background: #9ECBFF;
}
.pink_bg{
    background: #FF619A;
}
.grey_bg{
    background: #C6C6C6;
}

.font-13{
    font-size: 13px;
}
.data-table thead th:not(.sortable-cell-active), .data-table thead td:not(.sortable-cell-active){
    font-weight: 600;
    font-size: 15px;
    line-height: 18px;
    color: #555555;
    background-color: #F4F4F4;
}
.data-table tbody td:before, .data-table tbody th:before{
    background-color: transparent !important;
}
.data-table tbody tr:nth-child(even){
    background-color: #FAFAFA;
}
.pagination_count .pagination_list {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.pagination_count .pagination_list a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 5px;
}
</style>

