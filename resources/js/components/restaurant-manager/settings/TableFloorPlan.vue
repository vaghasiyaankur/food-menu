<template>
    <div class="card">
        <div class="card-header">
            <div class="table_mangment_heading">
                <h3 class="card-title no-margin">Table List</h3>
            </div>
            <div class="add_table_button">
                <button class="button" @click="$emit('tablehide')"><i class="f7-icons margin-right-half">plus_square</i> Add Table</button>
            </div>
        </div>
        <div class="card-content">
            <div class="data-table">
                <table>
                   <thead>
                      <tr>
                         <th>Table No.</th>
                         <th>Capacity of Person</th>
                         <th>Floor No.</th>
                         <th>Status</th>
                         <th>Table Color</th>
                         <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>
                      <tr>
                         <td class="label-cell">01.</td>
                         <td>04 Person Capacity</td>
                         <td>1<sup>st</sup> Floor</td>
                         <td>                            
                            <span class="status_info status_active">Active</span>
                            
                         </td>
                         <td>
                            <div class="table_color">
                                <span class="green_bg color__dot"></span>Green
                            </div>
                         </td>
                         <td>
                            <div class="display-flex">
                                <a href="#" class="button text-color-black font-13 no-padding-left"><i class="f7-icons font-13 margin-right-half">square_pencil</i> Edit</a>
                                <a href="#" class="button text-color-red font-13"><i class="f7-icons font-13 margin-right-half">trash</i> Delete</a>
                            </div>
                         </td>
                      </tr>
                      <tr>
                         <td class="label-cell">02.</td>
                         <td>02 Person Capacity</td>
                         <td>2<sup>nd</sup> Floor</td>
                         <td>                            
                            <span class="status_info status_deactive">Deactive</span>
                            
                         </td>
                         <td>
                            <div class="table_color">
                                <span class="yellow_bg color__dot"></span>Yellow
                            </div>
                         </td>
                         <td> <div class="display-flex">
                            <a href="#" class="button text-color-black font-13 no-padding-left"><i class="f7-icons font-13 margin-right-half">square_pencil</i> Edit</a>
                            <a href="#" class="button text-color-red font-13"><i class="f7-icons font-13 margin-right-half">trash</i> Delete</a>
                        </div></td>
                      </tr>
                      <tr>
                        <td class="label-cell">03.</td>
                        <td>06 Person Capacity</td>
                        <td>3<sup>rd</sup> Floor</td>
                        <td>                            
                           <span class="status_info status_active">Active</span>
                           
                        </td>
                        <td>
                           <div class="table_color">
                               <span class="red_bg color__dot"></span>Red
                           </div>
                        </td>
                        <td> <div class="display-flex">
                           <a href="#" class="button text-color-black font-13 no-padding-left"><i class="f7-icons font-13 margin-right-half">square_pencil</i> Edit</a>
                           <a href="#" class="button text-color-red font-13"><i class="f7-icons font-13 margin-right-half">trash</i> Delete</a>
                       </div></td>
                     </tr>
                      <tr>
                         <td class="label-cell">04.</td>
                         <td>08 Person Capacity</td>
                         <td>4<sup>th</sup> Floor</td>
                         <td>                            
                            <span class="status_info status_active">Active</span>
                            
                         </td>
                         <td>
                            <div class="table_color">
                                <span class="orange_bg color__dot"></span>Orange
                            </div>
                         </td>
                         <td> <div class="display-flex">
                            <a href="#" class="button text-color-black font-13 no-padding-left"><i class="f7-icons font-13  margin-right-half">square_pencil</i> Edit</a>
                            <a href="#" class="button text-color-red font-13"><i class="f7-icons font-13  margin-right-half">trash</i> Delete</a>
                        </div></td>
                      </tr>                                           
                      <tr>
                         <td class="label-cell">05.</td>
                         <td>12 Person Capacity</td>
                         <td>4<sup>th</sup> Floor</td>
                         <td>                            
                            <span class="status_info status_active">Active</span>
                            
                         </td>
                         <td>
                            <div class="table_color">
                                <span class="blue_bg color__dot"></span>Blue
                            </div>
                         </td>
                         <td> <div class="display-flex">
                            <a href="#" class="button text-color-black font-13 no-padding-left"><i class="f7-icons font-13 margin-right-half">square_pencil</i> Edit</a>
                            <a href="#" class="button text-color-red font-13"><i class="f7-icons font-13 margin-right-half">trash</i> Delete</a>
                        </div></td>
                      </tr>                                           
                      <tr>
                         <td class="label-cell">06.</td>
                         <td>10 Person Capacity</td>
                         <td>2<sup>nd</sup> Floor</td>
                         <td>                            
                            <span class="status_info status_deactive">Deactive</span>
                            
                         </td>
                         <td>
                            <div class="table_color">
                                <span class="pink_bg color__dot"></span>Pink
                            </div>
                         </td>
                         <td> <div class="display-flex">
                            <a href="#" class="button text-color-black font-13 no-padding-left"><i class="f7-icons font-13 margin-right-half">square_pencil</i> Edit</a>
                            <a href="#" class="button text-color-red font-13"><i class="f7-icons font-13 margin-right-half">trash</i> Delete</a>
                        </div></td>
                      </tr>                                           
                      <tr>
                         <td class="label-cell">07.</td>
                         <td>26 Person Capacity</td>
                         <td>3<sup>rd</sup> Floor</td>
                         <td>                            
                            <span class="status_info status_active">Active</span>
                            
                         </td>
                         <td>
                            <div class="table_color">
                                <span class="grey_bg color__dot"></span>Grey
                            </div>
                         </td>
                         <td> <div class="display-flex">
                            <a href="#" class="button text-color-black font-13 no-padding-left"><i class="f7-icons font-13 margin-right-half">square_pencil</i> Edit</a>
                            <a href="#" class="button text-color-red font-13"><i class="f7-icons font-13 margin-right-half">trash</i> Delete</a>
                        </div></td>
                      </tr>                                           
                      <tr>
                         <td class="label-cell">08.</td>
                         <td>8 Person Capacity</td>
                         <td>4<sup>th</sup> Floor</td>
                         <td>                            
                            <span class="status_info status_active">Active</span>
                            
                         </td>
                         <td>
                            <div class="table_color">
                                <span class="orange_bg color__dot"></span>Orange
                            </div>
                         </td>
                         <td> <div class="display-flex">
                            <a href="#" class="button text-color-black font-13 no-padding-left"><i class="f7-icons font-13 margin-right-half">square_pencil</i> Edit</a>
                            <a href="#" class="button text-color-red font-13"><i class="f7-icons font-13 margin-right-half">trash</i> Delete</a>
                        </div></td>
                      </tr>                                           
                   </tbody>
                </table>
             </div>
        </div>
    </div>
</template>

<script>
    export default {
        name : 'AddFloorPlan',
            
    }
</script>
<style scoped>
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
</style>

