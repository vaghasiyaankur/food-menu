<template>
    <f7-page color="bg-color-white">
        <draggable class='area' :group='group' :list='list1'>
            <div class='item' v-for='element in list1' :key='element.name'>
              {{ element.name }}
            </div>
          </draggable>
          <draggable class='area' group='foo' :list='list2' data-zone='A'>
            <div class='item' v-for='element in list2' :key='element.name'>
              {{ element.name }}
            </div>
          </draggable>
          <draggable class='area' group='foo' :list='list3' data-zone='B'>
            <div class='item' v-for='element in list3' :key='element.name'>
              {{ element.name }}
            </div>
          </draggable>
    </f7-page>
</template>

<script>
import { f7,f7Page, f7Navbar, f7BlockTitle, f7Block, f7Swiper, f7SwiperSlide} from 'framework7-vue';
import $ from 'jquery';
import axios from 'axios'; 
import { VueDraggableNext } from 'vue-draggable-next';

export default {
    name : 'RegisterPage',
    data() {
        return {
            list1: [{
                name: "John"
                }, {
                name: "Joao"
                }, {
                name: "Jean"
                }, {
                name: "Gerard"
                }],
                list2: [{
                name: "Juan"
                }],
                list3: [{
                name: "Edgard"
                }, {
                name: "Johnson"
                }]
            }
        },
    computed: {
        group() {
      return {
        name: 'foo',
        put: false,
        pull(to) {
          let zone = to.el.dataset.zone
          switch (zone) {
            case 'A':
              return true
            case 'B':
              return 'clone'
          }
          return false
        }
      }
    }
  },
    components : {
        f7,f7Page, f7Navbar, f7BlockTitle, f7Block,f7Swiper,f7SwiperSlide,draggable: VueDraggableNext
    },
    mounted() {
        this.equal_height();
    },
    updated() {
        this.equal_height();
    },
    created() {
        this.tableList();
    },
    methods: {
        equal_height(){
            var highestBox = 0;
            var targetDiv = document.querySelectorAll('.equal-height-table');
            for(var i=0; i<targetDiv.length;i++){
            if(targetDiv[i].clientHeight > highestBox){
                    highestBox = targetDiv[i].clientHeight;
            }
            }
            document.querySelectorAll(".equal-height-table").forEach(node => node.style.height = highestBox + "px");
        },
        addClass(){
            $('.floor_dropdwon').toggleClass('floor_dropdown_visible');
        },
        removebackdrop(){
            $('.floor_dropdwon').removeClass('floor_dropdown_visible');
            $(".popover-backdrop").remove();
        },
        tableList() {
            axios.get('/api/table-list-with-order')
                .then((res) => {
                    var row_tables = [];
                    var cal_of_capacity = 0;
                    var single_row_data = [];
                    res.data.tables.forEach((table, index) => {
                        if(parseInt(cal_of_capacity) > 18){
                            row_tables.push(single_row_data);
                            single_row_data = [];
                            cal_of_capacity = 0;
                        }


                        if(parseInt(table.capacity_of_person) % 2 != 0){
                            var cap = parseInt(table.capacity_of_person - 1);  
                            var up_table = (parseInt(table.capacity_of_person) + 1) / 2;
                            var down_table = (parseInt(table.capacity_of_person) - 1)/ 2;
                        } else{
                            var cap = parseInt(table.capacity_of_person) - 2;
                            var up_table = parseInt(table.capacity_of_person) / 2;
                            var down_table = parseInt(table.capacity_of_person) / 2;
                        }
                        

                        var col = (cap / 2) * 5 + 20;


                        table['col'] = col > 100 ? 100 : col;
                        table['up_table'] = up_table;
                        table['down_table'] = down_table;

                        table['width'] = 182 + ((up_table - 1)* 80)
                        single_row_data.push(table);

                        if(index == res.data.tables.length - 1){
                            row_tables.push(single_row_data);
                            single_row_data = [];
                            cal_of_capacity = 0;
                        }

                        cal_of_capacity = parseInt(cal_of_capacity) + parseInt(table.capacity_of_person);
                    });
                    this.row_tables = row_tables;

                })
        },
        startDrag(id) {
            console.log(id);
        },
        onDrop(id) {
            console.log(id);
            // console.log(event.target.closest('.drop-target'));
        }
    }
}
</script>

<style scoped>
*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}
.ml-40{
    margin-left : 40px;
}
.current_capacity_card .card-content{
    padding-right:8px !important;
    padding-left:0px !important;
}
.menu-item-dropdown .menu-item-content .f7-icons{
    font-size: 15px;
    margin-left: 10px;
}
.border__bottom{
    border-bottom: 0.5px solid #555555;
}
.w-100{
    width: 100%;
}
.justify_content_between{
    justify-content: space-between;
}
.header-links{
    box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.15);
    background-color: #fff;
    height: 60px !important;
    position: fixed;
    width: 100%;
    z-index: 99;
}
.height-40{
    height: 40px;
}
.nav-link,.menu-item-content {
    height: 100%;
    text-transform: capitalize;
}
.menu-item-content{
    position: relative;
    z-index: 9;
}
.menu-dropdown-content{
    box-shadow: 0px 0.5px 12px rgba(0, 0, 0, 0.2);
    min-width: 100% !important;
    top:-30px;
}
.menu-dropdown-center:before, .menu-dropdown-center:after {
    content : none;
}
.bg-dark{
    background: #38373D;
}
.menu-item-dropdown-opened .menu-item-content{
    background: #ff2d55;
}
.menu-dropdown-link{
    border-bottom: 1px solid #EFEFEF;
}
.col-25{
    padding: 5px;
}
.table_image {
    height: 100%;
    min-height: 44px;
}
.card {
    border-radius: 10px;
}
.size-12{
    font-size :12px;
}
.table_row {
    display: flex;
}
.table_row .table_1{
    border-left: 10px solid #0FC963;
    width: 100%;
}
.table_row .table_2{
    border-left: 10px solid #FF6161;
    width: 100%;
    min-width: 332px;
}
.table_row .table_3{
    border-left: 10px solid #FC8E5E;
    width: 100%;
    min-width: 412px;
}
.table_row .table_4{
    border-left: 10px solid #FF619A;
    width: 100%;
    min-width: 500px;
}
.table_row .table_4 .card-content,.table_row .table_5 .card-content{
    padding-top: 50px;
}
.table_row .table_10 .card-content{
    padding-top: 50px;

}
.table_row .table_4_margin{
    margin-right: 103px;
}
.table_row .table_5{
    border-left: 10px solid #9ECBFF;
    width: 100%;
    min-width: 574px;
}
.table_row .table_9{
    width:100%;
    min-width: 182px;
    /*max-width: 182px;*/
    margin: 0 auto;
    border-left: 10px solid #FCD95E;
}
.table_row .table_10 {
    width:100%;
    min-width: 1120px;
    margin: 0 auto;
    border-left: 10px solid #C6C6C6;;
}
.tables{
    overflow-x: auto;
}
.table_main{
    width: 100%;
    height: calc(100vh - 70px);
    overflow: auto;
    margin-top: 70px;
}
.center_table_card{
    margin-left: 83px;
    margin-right: 83px;
}
.tables .row{
    flex-wrap: nowrap !important;
}
/*.tables .table_row .row{
    flex-wrap: wrap !important;
}*/
.table_card_right_margin{
    margin-right: 72px;
}
.table1__details{
    width: 100%;
    overflow-x:auto;
}

.table2__details{
    width: 100%;
    max-width: 323px;
    overflow-x:auto;
}
.table3__details{
    width: 100%;
    max-width: 426px;
    overflow-x:auto;
}
.person{
    white-space:nowrap;
}
/*=========  TABLE SWIPER ============*/
.table_main .table_floor_swiper .floor_swiper_inner .swiper-slide p.swiper_text{
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #38373D;
    white-space: nowrap;
    justify-content:center;
}
.table_main .table_floor_swiper .floor_swiper_inner{
    border-bottom:1px solid #E0E0E0;
    margin-left: 20px;
    padding-bottom: 12px;
}
.table_main .table_floor_swiper .floor_swiper_inner .room_available{
    width:35px;
    height:21px;
    background: #FDD5D5;
    border-radius:2px;
    color:#F33E3E;
    font-weight: 500;
    font-size: 12px;
    line-height: 15px;
    display:flex;
    justify-content: center;
    align-items:center;
    margin-left: 5px;

}
/*=============== POPOVER=================*/
.popover.popover-move{
    background-color: #F33E3E;
    border:0.5px solid transparent;
}
.popover{
    width: 100%;
    max-width: 180px;
    box-shadow: 0px 0px 10px rgb(0 0 0 / 27%);
    background: #fff;
    border: 0.5px solid #999999;
}
.floor_dropdwon{
    width: 220px;
    position:absolute;
    left: 100%;
    bottom: -119%;
    background: white;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    opacity: 0;
    visibility: hidden;
    transition: 0.3s all ease-in-out;
    transform: translateY(2em);
    border: 0.5px solid #999999;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.5s ease-in;
}
.floor_dropdown_visible{
    opacity: 1;
    visibility: visible;
    transform: translateY(-1em);

}
.popover-angle:after{
    border:0.5px solid #999999 !important;
}
.popover-angle.on-bottom:after{
    border:0.5px solid #999999 !important;
}
.floor_room_available .room_available{
    width: 35px;
    height: 21px;
    background: #FDD5D5;
    border-radius: 2px;
    color: #F33E3E;
    font-weight: 500;
    font-size: 12px;
    line-height: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 5px;
}
.hamburger__button{
    display:none;
}
@media screen and (max-width : 820px) {
    .table_9_chair{
        width:100%;
        min-width:1120px;
    }
    .margin_right{
        margin-right: 45px;
    }
    .margin_left{
        margin-left: 45px;
    }
    .table-card{
        width : 100% !important;
    }
    /*.closeReservation{
        border: none;
        background-color: transparent;
        text-align:start;
    }
    .tablate_view_menu{
        display:none;
    }
    .hamburger__button{
        display: block;
        text-align:end;
        width:100%;
    }
    .menu-dropdown-content{
        z-index:2;
    }*/
}
</style>

<style>
.popover-move .popover-angle:after{
    background: #f33e3e !important;
    border:  0.5px solid transparent !important
}
.popover-angle:after{
   border:  0.5px solid #999999 !important;
}
.ios .popover-angle.on-bottom:after {
    left: 0;
    top: -22px !important;
}

*{
    box-sizing: border-box;
}
.header-link .button{
    border-radius: 10px !important;
}
.header-link .menu-item{
    border-radius: 10px !important;
}
.nav-button{
    text-transform: capitalize;
}
.navbar a.link{
    color : #000;
}
.left{
    width: 60%;
    margin-right: 0 !important;
}
.right{
    width : 40%;
    margin-left: 0 !important;
}
.header-link{
    width: 100%;
}
.header-link button{
    text-transform: capitalize;
}
.card-header{
    background: transparent;
    min-height: 0 !important;
    overflow: hidden;
    color: #000;
    border-radius: 10px 10px 0 0 !important;
}
.card-header:after{
    background-color: transparent !important;
}
.header_detail{
    width:100%;
}
.person-info i{
    font-size: 12px !important;
    padding-right: 5px;
    white-space: nowrap;
}
.person-info{
    background: #F1F1F1;
    border-radius: 5px;
    padding: 7px 5px !important;
    font-size: 10px !important;
    width: 100%;
    max-width: 94px;
    margin-right: 23px;
}
.person-info_move{
    background: #fff;
    border: 1px solid #F33E3E;
    box-shadow: 0px 0px 10px rgb(241 2 2 / 29%);
}
.waiting-time{
    border-left: 0.5px solid #555555;
    padding-left: 8px;
    margin-left: 8px;
}
.table_reservation_info .person-info span{
    font-size: 12px;
    line-height: 15px;
    color: #38373D;
}
.bg-color-dark-pink {
    background-color: #F33E3E !important;
}

.dialog-text {
    font-weight: 500;
    font-size: 20px;
    line-height: 24px;
}

.dialog-inner:after {
    content: none !important;
}

.dialog {
    background-color: #fff !important;
    width: 378px !important;
}

.dialog-button {
    margin: 0 5px !important;
    border-radius: var(--f7-dialog-border-radius) !important;
}

.dialog-buttons {
    margin: 0 5px 15px;
}
.table_row .card{
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.11);
    }
    .area {
        display: block;
        padding: 24px;
      }
      
      .item {
        margin: 2px 0;
        padding: 8px;
        background-color: lightgray;
        cursor: move;
      }
      
</style>
