<template>
    <div class="card language_setting no-margin">
        <div class="card-header padding-vertical">
            <div class="language_heading">
                <h3 class="no-margin">
                   <span class="page_heading">Language</span>
                </h3>
            </div>
        </div>
        <div class="card-content">
            <div class="data-table">
                <table style="border-bottom:1px solid #E1E1E1">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Translate</th>
                            <th>Language</th>
                            <th>Select</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span>01.</span></td>
                            <td><a href="javscript:;" class="text-underline text-color-black"  @click="$emit('languagelisthide')">Translate</a></td>
                            <td><span>English</span></td>
                            <td>
                                <label class="item-checkbox item-content">
                                    <input type="checkbox" name="demo-checkbox"><i class="icon icon-checkbox"></i>                                    
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td><span>02.</span></td>
                            <td><a href="javscript:;" class="text-underline text-color-black">Translate</a></td>
                            <td><span>Hindi</span></td>
                            <td>
                                <label class="item-checkbox item-content">
                                    <input type="checkbox" name="demo-checkbox"><i class="icon icon-checkbox"></i>                                    
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td><span>03.</span></td>
                            <td><a href="javscript:;" class="text-underline text-color-black">Translate</a></td>
                            <td><span>Gujarati</span></td>
                            <td>
                                <label class="item-checkbox item-content">
                                    <input type="checkbox" name="demo-checkbox"><i class="icon icon-checkbox"></i>                                    
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="submit__button margin-top padding-top">
                    <button class="col button button-large button-fill">Save</button>
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
        name : 'Language',
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
            tableList(page) {
                if (page == undefined || page == 1) {
                    page = '/api/table-list?page=1';
                }
                this.page_number = page;
                axios.get(page)
                .then((res) => {
                    this.tables = res.data.tables.data;
                    this.paginationData = res.data.tables;
                })
            },
        }
    }
</script>
<style scoped>
.submit__button button {
	width: 100%;
	max-width: 160px;
	margin: 0 auto;
	border-radius: 10px;
	background-color: #F33E3E;
}
.submit__button{
    position: fixed;
    top: 50%;
    width: 100%;
}
</style>

