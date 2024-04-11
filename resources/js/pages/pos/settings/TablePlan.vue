<template>
    <div class="card no-margin-top">
        <!-- <TabHeader title="Table List" /> -->
        <div class="card-header margin-vertical-half">
        <div class="table_mangment_heading">
            <h3 class="no-margin">
                <span class="page_heading">
                    Table List
                </span>
            </h3>
        </div>
        <div class="add_table_button">
            <button class="button" @click="$emit('tablehide', 0, page_number)"><i class="f7-icons margin-right-half">plus_square</i> Add Table</button>
        </div>
    </div>
        <div class="card-content padding-vertical">
            <div class="data-table">
                <table>
                   <TableHeader :items="headerItems" />
                   <tbody>
                      <tr v-for="table in tables" :key="table.id">
                         <td class="label-cell">{{ table.table_number }}</td>
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
                        <tr v-if="tables.length == 0">
                            <td colspan="6" class="text-align-center">No Data Found !!</td>
                        </tr>
                   </tbody>
                </table>
                <div class="pagination_count padding-vertical-half data-table-pagination">
                    <Pagination :function-name="tableList" :data="paginationData" />
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { f7 } from 'framework7-vue';
    import TableHeader from '../../../components/TableHeader.vue';
    import TabHeader from '../../../components/TabHeader.vue';
    import Pagination from '../../../components/Pagination.vue';
    import $ from 'jquery';
    import axios from 'axios';

    export default {
        name : 'AddFloorPlan',
        props : ['page'],
        components : {
            TableHeader,
            TabHeader,
            Pagination
        },
        data() {
            return {
                tables: [],
                page_number: 1,
                paginationData : [],
                headerItems : [
                    {'name' : 'table_plan', 'field' : 'Table No'},
                    {'name' : 'table_plan', 'field' : 'Capacity of Person'},
                    {'name' : 'table_plan', 'field' : 'Floor No.', 'width' : '15%'},
                    {'name' : 'table_plan', 'field' : 'Status', 'width' : '20%'},
                    {'name' : 'table_plan', 'field' : 'Table Color'},
                    {'name' : 'table_plan', 'field' : 'Action', 'width' : '15%'},
                ]
            }
        },
        created() {
            this.page_number = this.page;
            this.tableList(this.page_number);
        },
        mounted() {
            this.$root.activationMenu('setting', '');
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
                        this.$root.successNotification(res.data.success);
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
                        this.$root.successNotification(res.data.success);
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
.data-table .data-table-pagination{
    justify-content: end;
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
</style>

