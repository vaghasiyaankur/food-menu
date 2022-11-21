<template>
    <div class="card general_setting_card">
        <div class="card-content card-content-padding">
            <div class="row border__bottom">
                <div class="col">
                    <div class="general_info_form">
                        <form class="list margin-vertical" id="my-form">
                           <div class="item-content item-input  margin-bottom">
                              <div class="item-inner">
                                 <div class=" block-title no-margin-top">Restaurant Name</div>
                                 <div class="item-input-wrap">
                                    <input type="text" name="name" class="padding margin-top-half" placeholder="Enter restaurant name">
                                </div>
                              </div>
                           </div>
                           <div class="item-content item-input margin-bottom">
                              <div class="item-inner">
                                 <div class="block-title no-margin-top">Phone Number</div>
                                 <div class="item-input-wrap"><input type="number" name="number" class="padding margin-top-half" placeholder="Enter phone number"></div>
                              </div>
                           </div>
                           <div class="item-content item-input margin-bottom">
                              <div class="item-inner">
                                 <div class="block-title no-margin-top">Manager Name</div>
                                 <div class="item-input-wrap">
                                    <input type="text" name="member" class="padding margin-top-half" placeholder="Enter manager name">
                                </div>
                              </div>
                           </div>
                        </form>
                     </div>
                </div>
                <div class="col">
                    <div class="formbold-mb-5 formbold-file-input margin-vertical">
                        <div class="block-title no-margin-top padding-top-half no-margin-left">Restaurant Logo</div>
                        <input type="file" name="file" id="file">
                        <label for="file">
                          <div>
                            <img src="/images/imageuploader.svg">
                          </div>
                        </label>
                    </div>
                </div>
            </div>
            <h3 class="card-title">Time Zone</h3>
            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name : 'GeneralSetting'
    }
</script>
<style scoped>
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
    height: 100%;
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

