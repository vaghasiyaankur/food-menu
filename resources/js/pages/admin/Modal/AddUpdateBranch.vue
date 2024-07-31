<template>
    <div class="data-form">
        <div class="text-align-center popup_title">{{ modalTitle }}</div>
        <div class="data-add">
            <form @submit.prevent="handleSaveBranch" enctype="multipart/form-data" class="no-margin" method="post">
                <div class="add-data-main-div">
                    <label class="add-data-name">Logo</label>
                    <div class="data-name text-align-left padding-bottom-half">
                        <div class="item-inner no-padding">
                            <div class="item-input-wrap general_info_form-input w-100">
                                <input @change="handleFileChange" type="file" name="logo" class="add-update-data-name" accept="image/*" />
                                <img v-if="imagePreview" :src="imagePreview" alt="Image Preview" class="image-preview" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-data-main-div">
                    <label class="add-data-name">Branch Name</label>
                    <div class="data-name text-align-left padding-bottom-half">
                        <div class="item-inner no-padding">
                            <div class="item-input-wrap general_info_form-input w-100">
                                <input v-model="localBranchDetails.branch_name" type="text" name="branch_name" placeholder="Enter Branch Name"
                                    class="add-update-data-name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-data-main-div">
                    <label class="add-data-name">Owner Name</label>
                    <div class="data-name text-align-left padding-bottom-half">
                        <div class="item-inner no-padding">
                            <div class="item-input-wrap general_info_form-input w-100">
                                <input v-model="localBranchDetails.owner_name" type="text" name="owner_name" placeholder="Enter Branch Owner"
                                    class="add-update-data-name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-data-main-div">
                    <label class="add-data-name">Email</label>
                    <div class="data-name text-align-left padding-bottom-half">
                        <div class="item-inner no-padding">
                            <div class="item-input-wrap general_info_form-input w-100">
                                <input v-model="localBranchDetails.email" type="text" name="email" placeholder="Enter Branch Email"
                                    class="add-update-data-name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-data-main-div">
                    <label class="add-data-name">Mobile Number</label>
                    <div class="data-name text-align-left padding-bottom-half">
                        <div class="item-inner no-padding">
                            <div class="item-input-wrap general_info_form-input w-100">
                                <input v-model="localBranchDetails.mobile_number" type="number" name="mobile_number" placeholder="Enter Mobile Number"
                                    class="add-update-data-name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-data-main-div">
                    <label class="add-data-name">Address</label>
                    <div class="data-name text-align-left padding-bottom-half">
                        <div class="item-inner no-padding">
                            <div class="item-input-wrap general_info_form-input w-100">
                                <input v-model="localBranchDetails.address" type="text" name="address" placeholder="Enter Branch Address"
                                    class="add-update-data-name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-data-main-div">
                    <label class="add-data-name">City</label>
                    <div class="data-name text-align-left padding-bottom-half">
                        <div class="item-inner no-padding">
                            <div class="item-input-wrap general_info_form-input w-100">
                                <input v-model="localBranchDetails.city" type="text" name="city" placeholder="Enter Branch City"
                                    class="add-update-data-name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-data-main-div">
                    <label class="add-data-name">Zip Code</label>
                    <div class="data-name text-align-left padding-bottom-half">
                        <div class="item-inner no-padding">
                            <div class="item-input-wrap general_info_form-input w-100">
                                <input v-model="localBranchDetails.zip_code" type="text" name="zip_code" placeholder="Enter Branch Zip Code"
                                    class="add-update-data-name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-data-main-div">
                    <label class="add-data-name">State</label>
                    <div class="data-name text-align-left padding-bottom-half">
                        <div class="item-inner no-padding">
                            <div class="item-input-wrap general_info_form-input w-100">
                                <input v-model="localBranchDetails.state" type="text" name="state" placeholder="Enter Branch State"
                                    class="add-update-data-name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-data-main-div">
                    <label class="add-data-name">Country</label>
                    <div class="data-name text-align-left padding-bottom-half">
                        <div class="item-inner no-padding">
                            <div class="item-input-wrap general_info_form-input w-100">
                                <input v-model="localBranchDetails.country" type="text" name="country" placeholder="Enter Branch Country"
                                    class="add-update-data-name" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="display-flex justify-content-center popup_button">
                    <button @click="handleCancel" type="button" class="button button-raised button-large popup-close popup-cancel-button">
                        Cancel
                    </button>
                    <button type="submit" class="button button-raised button-large popup-ok-button">
                        Ok
                    </button>
                </div>
            </form>
        </div>
        <div class="wave-image-content">
            <img src="/images/flow.png" style="width: 100%" />
        </div>
    </div>
</template>

<script setup>
    import { ref, watch, defineProps, toRefs, defineEmits, defineExpose } from 'vue';
    import { f7Page, f7Navbar, f7BlockTitle, f7Block, f7, f7Breadcrumbs, f7BreadcrumbsItem, f7BreadcrumbsSeparator, f7BreadcrumbsCollapsed } from "framework7-vue";

    const props = defineProps({
        modalTitle: {
            type: String,
            default: ""
        },
        branchDetails: {
            type: Object,
            default: () => ({})
        }
    });

    const { modalTitle, branchDetails } = toRefs(props);
    const localBranchDetails = ref({ ...branchDetails.value });
    
    const imagePreview = ref('');
    const emit = defineEmits(['save-branch']);

    watch(branchDetails, (newDetails) => {
        localBranchDetails.value = { ...newDetails };
        if (newDetails.logo) {
            imagePreview.value = 'storage/'+newDetails.logo;
        }
    });

    const handleSaveBranch = async () => {
        
        const formData = new FormData();
        for (const key in localBranchDetails.value) {
            formData.append(key, localBranchDetails.value[key]);
        }
        
        if(typeof localBranchDetails.value.logo == 'string') {
            const response = await fetch(`storage/${localBranchDetails.value.logo}`);
            const blob = await response.blob();
            const file = new File([blob], localBranchDetails.value.logo, { type: blob.type });
            formData.append('logo', file);
        } 
        emit('save-branch', formData);
    }

    const handleFileChange = (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                imagePreview.value = e.target.result;
            };
            reader.readAsDataURL(file);
            localBranchDetails.value.logo = file;
        }
    }

    const handleCancel = () => {
        localBranchDetails.value = { ...branchDetails.value };
        imagePreview.value = '';
        f7.popup.close(`#addEditBranchPopup`);
    }

    defineExpose({
        'logo' : imagePreview
    });

</script>

<style scoped>
    .image-preview {
        width: 30%;
        height: auto;
        margin-top: 10px;
    }
</style>