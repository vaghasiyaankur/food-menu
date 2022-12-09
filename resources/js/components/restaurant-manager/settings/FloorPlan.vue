<template>
    <div>
        <div class="floor_plan card">
            <div class="back_link padding-left">
                <a class="link back text-color-black" href="javascript:;" @click="$emit('floorlistshow')"><i class="icon icon-back"></i><span class="margin-left-half">Back to List</span></a>
            </div>
            <div class="card-content card-content-padding">
                <div class="row">
                    <div class="col">
                        <div class="list">
                            <div class="item-content item-input margin-bottom no-padding-left">
                                <div class="item-inner">
                                    <div class="block-title no-margin-top">Add Floor</div>
                                    <div class="item-input-wrap">
                                        <input type="number" name="number" class="padding margin-top-half" placeholder="Enter floor name">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="list">
                            <div class="item-content item-input margin-bottom">
                                <div class="item-inner">
                                    <div class="block-title no-margin-top no-margin-left">Shortcut Floor Name</div>
                                    <div class="item-input-wrap">
                                        <input type="text" name="text" class="padding margin-top-half" placeholder="Enter shortcut floor name">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="submit__button margin-top padding-top">
                    <button class="col button button-large button-fill" >Save</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name : 'FloorList',
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

.floor_plan.card{
    box-shadow: none;
}

</style>