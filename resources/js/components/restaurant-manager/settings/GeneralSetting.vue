<template>
    <div class="card general_setting_card">
        <div class="card-content card-content-padding">
            <div class="row border__bottom">
                <div class="col">
                    <div class="general_info_form">
                        <form class="list margin-vertical" id="my-form">
                           <div class="item-content item-input margin-bottom no-padding-left">
                              <div class="item-inner">
                                 <div class=" block-title no-margin-top">Restaurant Name</div>
                                 <div class="item-input-wrap">
                                    <input type="text" name="name" class="padding margin-top-half" placeholder="Enter restaurant name" v-model="restaurant_name">
                                </div>
                              </div>
                           </div>
                           <div class="item-content item-input margin-bottom no-padding-left">
                              <div class="item-inner">
                                 <div class="block-title no-margin-top">Phone Number</div>
                                 <div class="item-input-wrap">
                                    <input type="number" name="number" class="padding margin-top-half" placeholder="Enter phone number" v-model="phone_number">
                                </div>
                              </div>
                           </div>
                           <div class="item-content item-input margin-bottom no-padding-left">
                              <div class="item-inner">
                                 <div class="block-title no-margin-top">Manager Name</div>
                                 <div class="item-input-wrap">
                                    <input type="text" name="member" class="padding margin-top-half" placeholder="Enter manager name"  v-model="manager_name">
                                </div>
                              </div>
                           </div>
                           <!-- <div class="item-content item-input margin-bottom no-padding-left">
                            <div class="item-inner">
                               <div class="block-title no-margin-top">Capacity Of Member</div>
                               <div class="item-input-wrap">
                                  <input type="text" name="member" class="padding margin-top-half" placeholder="Enter manager name"  v-model="member_capacity">
                              </div>
                            </div>
                         </div> -->
                        </form>
                     </div>
                </div>
                <div class="col">
                    <div class="formbold-mb-5 formbold-file-input margin-vertical">
                        <div class="block-title no-margin-top padding-top-half no-margin-left">Restaurant Logo</div>
                        <input type="file" name="file" id="file" @change="onRestaurantLogoChange">
                        <label for="file">
                          <div>
                            <!-- <img src="/images/imageuploader.svg"> -->
                            <img :src="restaurant_logo_preview" alt="" class="restaurant_logo">
                          </div>
                        </label>
                    </div>
                </div>
            </div>
            <h3 class="card-title">Time Zone</h3>
            <div class="row">
                <div class="col padding-right">
                    <div class="block-title no-margin-top no-margin-left">Open Time:</div>
                    <div class="drop-down"  @click="openTimePopupToggle($event)">
                        <div id="dropDown" class="drop-down__button">
                            <div class="drop-down__store display-flex justify_content_between padding align-items-center toggle-event-check">
                                <span class="drop-down__name">
                                    <input type="text" class="toggle-event-check" placeholder="Date Time" v-model="open_time" readonly="readonly" id="start-picker-date" />
                                    <input type="hidden" readonly="readonly" id="start-picker-date-hidden" />
                                </span>
                                <span classs="down__icon">
                                    <i class="f7-icons toggle-event-check">arrowtriangle_down_fill</i>
                                </span>
                            </div>
                        </div>

                        <div class="drop-down__menu-box">
                            <div class="drop-down__menu">
                                <div class="block-title margin-top">Set Open Time</div>
                                    <!-- <div class="list no-margin">
                                        <ul>
                                            <li>
                                                <div class="item-content item-input">
                                                    <div class="item-inner">
                                                        <div class="item-input-wrap">
                                                            <input type="text" placeholder="Date Time" v-model="opentime" readonly="readonly" id="start-picker-date" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div> -->
                                <div class="block block-strong no-padding no-margin margin-bottom time_piker_inner">
                                    <div id="start-picker-date-container"></div>
                                </div>
                                <div class="display-flex justify-content-end padding-bottom time__button">
                                    <a class="padding-right text-color-black toggle-event-check" href="javascript:;">Cancel</a>
                                    <a class="text-color-red" href="javascript:;" @click="opentimeshow()">OK</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col padding-left">
                    <div class="block-title no-margin-top no-margin-left">Close Time:</div>
                    <div class="drop-down-1"  @click="closeTimePopupToggle($event)">
                        <div id="dropDown" class="drop-down__button">
                            <div class="drop-down__store display-flex justify_content_between padding align-items-center toggle-event-check">
                                <span class="drop-down__name">
                                    <input type="text" class="toggle-event-check" placeholder="Date Time" v-model="close_time" readonly="readonly" id="end-picker-date" />
                                    <input type="hidden" readonly="readonly" id="end-picker-date-hidden" />
                                </span>
                                <span classs="down__icon">
                                    <i class="f7-icons toggle-event-check">arrowtriangle_down_fill</i>
                                </span>
                            </div>
                        </div>

                        <div class="drop-down__menu-box">
                            <div class="drop-down__menu">
                                <div class="block-title margin-top">Set Close Time</div>
                                    <!-- <div class="list no-margin">
                                        <ul>
                                            <li>
                                                <div class="item-content item-input">
                                                    <div class="item-inner">
                                                        <div class="item-input-wrap">
                                                        <input type="text" placeholder="Date Time" v-model="closetime" readonly="readonly" id="end-picker-date" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div> -->
                                <div class="block block-strong no-padding no-margin margin-bottom time_piker_inner">
                                    <div id="end-picker-date-container"></div>
                                </div>
                                <div class="display-flex justify-content-end padding-bottom time__button">
                                    <a class="padding-right text-color-black toggle-event-check" href="javascript:;">Cancel</a>
                                    <a class="text-color-red" href="javascript:;" @click="endtimeshow()">OK</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="submit__button margin-top padding-top">
                <button class="col button button-large button-fill" @click="updateSetting()">Save</button>
            </div>
        </div>
    </div>
</template>

<script>
    import { f7 } from 'framework7-vue';
    import $ from 'jquery';
    import axios from 'axios';
    export default {
        name : 'GeneralSetting',
        components : {
            f7
        },
        data() {
            return {
                open_time: '',
                close_time : '',
                restaurant_name : '',
                phone_number : '',
                manager_name : '',
                restaurant_logo_preview : '',
                restaurant_logo : '',
            }
        },
        created() {
            this.settingData();
        },
        methods: {
            settingData() {
                axios.get('/api/setting-data')
                .then((res) => {
                    this.restaurant_name = res.data.setting.restaurant_name;
                    this.phone_number = res.data.setting.phone_number;
                    this.manager_name = res.data.setting.manager_name;
                    this.restaurant_logo_preview = '/storage/' + res.data.setting.restaurant_logo;
                    this.open_time = res.data.setting.open_time_12_format;
                    this.close_time = res.data.setting.close_time_12_format;
                })
            },
            onRestaurantLogoChange(e){
                this.restaurant_logo = e.target.files[0];
                this.restaurant_logo_preview = URL.createObjectURL(this.restaurant_logo);
            },
            openTimePopupToggle(e){
                if(!e.target.classList.contains('toggle-event-check')) return false;
                $('.drop-down').toggleClass('drop-down--active');

                var otime = this.open_time;
                var ohours = Number(otime.match(/^(\d+)/)[1]);
                var ominutes = Number(otime.match(/:(\d+)/)[1]);
                var OAMPM = otime.match(/\s(.*)$/)[1];
                if(OAMPM == "PM" && ohours<12) ohours = ohours+12;
                if(OAMPM == "AM" && ohours==12) ohours = ohours-12;
                var osHours = ohours.toString();
                var osMinutes = ominutes.toString();
                if(ohours<10) osHours = "0" + osHours;
                if(ominutes<10) osMinutes = "0" + osMinutes;

                f7.picker.create({
                    containerEl: '#start-picker-date-container',
                    inputEl: '#start-picker-date-hidden',
                    toolbar: false,
                    rotateEffect: true,
                    value: [
                        osHours,
                        osMinutes
                    ],
                    formatValue: function (values, displayValues) {
                    return displayValues[0] + ':' + values[1]  + ' ' +  values[2];
                    },
                    cols: [
                    // Hours
                    {
                        values: (function () {
                        var arr = [];
                        for (var i = 1; i <= 12; i++) { arr.push(i < 10 ? '0' + i : i); }
                        return arr;
                        })(),
                    },
                    // Divider
                    {
                        divider: true,
                        content: ':'
                    },
                    // Minutes
                    {
                        values: (function () {
                        var arr = [];
                        for (var i = 0; i <= 59; i++) { arr.push(i < 10 ? '0' + i : i); }
                        return arr;
                        })(),
                    },
                    // am / pm
                    {
                        values: (function () {
                        var arr = ['AM','PM'];

                        return arr;
                        })(),
                    }
                    ],
                    on: {
                    change: function (picker, values, displayValues) {
                        var daysInMonth = picker.value[0] + ' : ' + picker.value[1] + ' ' + picker.value[2];
                    },
                    }
                })
            },
            closeTimePopupToggle(e){
                if(!e.target.classList.contains('toggle-event-check')) return false;
                $('.drop-down-1').toggleClass('drop-down--active');

                var ctime = this.close_time;
                var chours = Number(ctime.match(/^(\d+)/)[1]);
                var cminutes = Number(ctime.match(/:(\d+)/)[1]);
                var CAMPM = ctime.match(/\s(.*)$/)[1];
                if(CAMPM == "PM" && chours<12) chours = chours+12;
                if(CAMPM == "AM" && chours==12) chours = chours-12;
                var csHours = chours.toString();
                var csMinutes = cminutes.toString();
                if(chours<10) csHours = "0" + csHours;
                if(cminutes<10) csMinutes = "0" + csMinutes;

                f7.picker.create({
                    containerEl: '#end-picker-date-container',
                    inputEl: '#end-picker-date-hidden',
                    toolbar: false,
                    rotateEffect: true,
                    value: [
                        csHours,
                        csMinutes
                    ],
                    formatValue: function (values, displayValues) {
                    return displayValues[0] + ':' + values[1]  + ' ' +  values[2];
                    },
                    cols: [
                    // Hours
                    {
                        values: (function () {
                        var arr = [];
                        for (var i = 1; i <= 12; i++) { arr.push(i < 10 ? '0' + i : i); }
                        return arr;
                        })(),
                    },
                    // Divider
                    {
                        divider: true,
                        content: ':'
                    },
                    // Minutes
                    {
                        values: (function () {
                        var arr = [];
                        for (var i = 0; i <= 59; i++) { arr.push(i < 10 ? '0' + i : i); }
                        return arr;
                        })(),
                    },
                    // am / pm
                    {
                        values: (function () {
                        var arr = ['AM','PM'];

                        return arr;
                        })(),
                    }
                    ],
                    on: {
                    change: function (picker, values, displayValues) {
                            var daysInMonth = picker.value[0] + ' : ' + picker.value[1]  + ' ' + picker.value[2];
                        }
                    }
                });
            },
            opentimeshow(){
                this.open_time = $("#start-picker-date-hidden").val();
                $('.drop-down').removeClass('drop-down--active');
            },
            endtimeshow(){
                this.close_time = $("#end-picker-date-hidden").val();
                $('.drop-down-1').removeClass('drop-down--active');
            },
            updateSetting() {
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                var formData = new FormData();

                if(!this.restaurant_name || !this.phone_number || !this.manager_name){
                    this.$root.errornotification('Please Fill All Data in Form')
                    return false;
                }

                formData.append('restaurant_name' , this.restaurant_name);
                formData.append('phone_number' , this.phone_number);
                formData.append('manager_name' , this.manager_name);
                formData.append('restaurant_logo' , this.restaurant_logo);
                formData.append('open_time' , this.open_time);
                formData.append('close_time' , this.close_time);

                axios
                .post("/api/update-setting", formData, config)
                .then((res) => {
                    this.$root.successnotification(res.data.success);
                }).catch((error) => {
                    this.$root.errornotification('Something Went Wrong !!!');
                    return false;
                });
            }
        }
    }
</script>
<style scoped>
img.restaurant_logo{
    width: 160px;
    height: 160px;
}
.justify_content_between{
    justify-content:space-between
}
.submit__button button{
    width: 100%;
    max-width: 160px;
    margin: 0 auto;
    border-radius: 10px;
    background-color: #F33E3E;
}
/*=========TIMEPIKER DROPDOWN CSS =============*/

.time_piker_inner{
    height:100%;
    max-height:120px;
    overflow:hidden ;
}
#start-picker-date-container{
    height:100%;
    max-height:120px;
}
.time__button a{
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 22px;
}
.block-strong:after{
    background-color:transparent !important;
}
.block-strong:before{
    background-color:transparent !important;
}

.f7-icons{
    font-size:14px !important;
}
  .drop-down,.drop-down-1{
      display: inline-block;
      position: relative;
      width: 100%;
  }

  .drop-down__button{
    background:#FAFAFA;
    display: inline-block;
    text-align: left;
    border-radius: 10px;
    box-shadow: 0px 4px 6px 0px rgba(0,0,0,0.2);
    width:100%
  }

  .drop-down__name input{
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    letter-spacing: 2px;
    width: 100%;
  }

  .drop-down__menu-box {
    position: absolute;
    width: 100%;
    left: 14.5%;
    background-color: #fff;
    border-radius: 4px;
    box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.11);
    transition: all 0.3s;
    visibility: hidden;
    opacity: 0;
    margin-top: 5px;
    z-index: 10;
    width: 100%;
    max-width: 378px;
    border-radius: 10px;
  }

  .drop-down__menu {
      margin: 0;
      padding: 0 13px;
      list-style: none;

  }
  .drop-down__menu-box:before{
    content: '';
    background-color: transparent;
    border-right: 15px solid transparent;
    position: absolute;
    border-left: 15px solid transparent;
    border-bottom: 15px solid #fff;
    border-top: 15px solid transparent;
    top: -30px;
    right: 50%;

  }
    .drop-down__item {
      font-size: 13px;
      padding: 13px 0;
      text-align: left;
      font-weight: 500;
      color: #909dc2;
      cursor: pointer;
      position: relative;
      border-bottom: 1px solid #e0e2e9;
  }

  .drop-down--active .drop-down__menu-box, .drop-down--active-1 .drop-down__menu-box{
    visibility: visible;
    opacity: 1;
    margin-top: 15px;
  }
  .list input[type='text'], .list input[type='password'], .list input[type='search'], .list input[type='email'], .list input[type='tel'], .list input[type='url'], .list input[type='date'], .list input[type='month'], .list input[type='datetime-local'], .list input[type='time'], .list input[type='number'], .list select{
    background-color:#FAFAFA;
    border-radius: 10px;
}
 .list .item-inner:after{
    background-color: transparent;
}
.formbold-file-input input {
    opacity: 0;
    position: absolute;
    width: 100%;
    height: auto;
}
.formbold-file-input label {
    position: relative;
    border: 1px dashed #e0e0e0;
    border-radius: 6px;
    height: 100%;
    min-height: 233px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px;
    text-align: center;
}

.formbold-drop-file {
    display: block;
    font-weight: 600;
    color: #07074d;
    font-size: 20px;
    margin-bottom: 8px;
}
.border__bottom{
    border-bottom: 1px solid #E1E1E1;
}
.card-title{
    font-weight: 600;
    font-size: 20px;
    line-height: 24px;
    color: #38373D;
}

</style>
<style>
.picker-items{
    padding:43px 0 !important;
}
.picker-center-highlight{
    background-color:transparent !important;
}
.picker-columns{
    width: 90%;
    height: 60% !important;
    background:  linear-gradient(180deg, #F3F4F5 0%, #FFFFFF 34.65%, #FFFFFF 63.19%, rgba(243, 244, 245, 0.857255) 100%);
    border-radius: 10px;
    margin:0 auto;
    justify-content: space-between !important;
    -webkit-mask-box-image: none !important;
}
.tabs-animated-wrap{
    position: relative;
    width: 100%;
    overflow-x: hidden !important;
    height: calc(100% - 147px) !important;
    overflow-y: auto !important;
}
@media screen and (max-width:820px){
    .tabs-animated-wrap{
    height: calc(100% - 456px) !important;
    }
}
</style>
