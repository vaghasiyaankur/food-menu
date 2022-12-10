<template>
    <div class="floor_plan_list">
        <div class="card">
            <div class="card-header">
                <div class="table_mangment_heading">
                   <h3 class="card-title no-margin">Floor List</h3>
                </div>
                <div class="add_table_button"><button class="button"  @click="$emit('floorlisthide', 0, page_number)"><i class="f7-icons margin-right-half">plus_square</i> Add Table</button></div>
            </div>
            <div class="card-content card-content-padding">
                <div class="data-table">
                    <table>
                        <thead>
                            <tr>
                                <th style="width:20%">Number</th>
                                <th style="width:35%">Floor Name</th>
                                <th style="width:25%">Shortcut Floor Name</th>
                                <th style="width:20%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(floor,index) in floors" :key="floor">
                                <td class="label-cell">{{ index + 1 }}.</td>
                                <td>{{ floor.name }}</td>
                                <td>{{ floor.short_cut }}</td>
                                <td>
                                    <div class="display-flex">
                                        <a href="javascript:;" class="button text-color-black font-13 no-padding-left" @click="$emit('floorlisthide', floor.id, page_number)">
                                            <i class="f7-icons font-13 margin-right-half">square_pencil</i> Edit
                                        </a>
                                        <a href="javascript:;" class="button text-color-red font-13" @click="removeFloor(floor.id)">
                                            <i class="f7-icons font-13 margin-right-half">trash</i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="data-table-pagination">
                        <div v-for="(link,index) in paginationData.links" :key="link">
                            <a href="javascript:;" v-if="index == 0" @click="link.url != null ? getFloors(link.url) : 'javascript:;'" class="link" :class="{ 'disabled': link.url == null}"><i class="icon icon-prev color-gray"></i></a>
                            <a href="javascript:;" v-if="paginationData.links.length - 1 != index && index != 0" @click="link.url != null ? getFloors(link.url) : 'javascript:;'" class="link" :class="{ 'disabled': link.url == null}">{{ index }}</a>
                            <a href="javascript:;" v-if="paginationData.links.length - 1 == index" @click="link.url != null ? getFloors(link.url) : 'javascript:;'" class="link" :class="{ 'disabled': link.url == null}"><i class="icon icon-next color-gray"></i></a>
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
        name : 'FloorPlan',
        components: { f7 },
        props: ['page'],
        data() {
            return {
                floors: [],
                paginationData: [],
                page_number : 1,
            }
        },
        created() {
            this.page_number = this.page;
            this.getFloors(this.page_number);
        },
        methods: {
            getFloors(page) {
                if (page == undefined || page == 1) {
                    page = '/api/get-floors?page=1'
                }
                this.page_number = page;
                axios.get(page)
                .then((res) => {
                    this.floors = res.data.data;
                    this.paginationData = res.data;
                })
            },
            removeFloor(id) {
                f7.dialog.confirm('Are you sure delete the Floor?', () => {
                    axios.post('/api/delete-floor', { id: id })
                        .then((res) => {
                            this.$root.notification(res.data.success);
                            this.getFloors();
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
        },
    }
</script>
<style scoped>
.list input[type='text'], .list input[type='password'], .list input[type='search'], .list input[type='email'], .list input[type='tel'], .list input[type='url'], .list input[type='date'], .list input[type='month'], .list input[type='datetime-local'], .list input[type='time'], .list input[type='number'], .list select {
    background-color: #FAFAFA;
    border-radius: 10px;
}
.list .item-inner:after {
    background-color: transparent;
}
/*.submit__button{
    margin-top: 50px;
}*/
.submit__button button{
    width: 100%;
    max-width: 160px;
    margin: 0 auto;
    border-radius: 10px;
    background-color: #F33E3E;
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
.floor_plan_list .card{
    box-shadow: none;
}
.data-table thead th:not(.sortable-cell-active), .data-table thead td:not(.sortable-cell-active) {
    font-weight: 600;
    font-size: 15px;
    line-height: 18px;
    color: #555555;
    background-color: #F4F4F4;
}
.data-table tbody tr:nth-child(even) {
    background-color: #FAFAFA;
}
.font-13{
    font-size: 13px;
}
.data-table .data-table-pagination{
    justify-content: end;
}
</style>

