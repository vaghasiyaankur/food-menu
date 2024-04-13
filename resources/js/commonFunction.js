import { f7 } from 'framework7-vue';

export const successNotification = (notice) => {
    f7.notification.create({
        title: '<img src="/images/check-icon.png">' + notice,
        closeTimeout: 3000,
        closeOnClick: true,
        cssClass: "success--notification",
    }).open();
};

export const errorNotification = (notice) => {
    f7.notification.create({
        title: '<img src="/images/cross-icon.png">' + notice,
        closeTimeout: 3000,
        closeOnClick: true,
        cssClass: "error--notification",
    }).open();
};

export const getErrorMessage = (error) => {
    let errorMessage = 'An error occurred';
    const errorFields = Object.keys(error.response.data.errors);
    if (errorFields.length > 0) {
        const firstErrorField = errorFields[0];
        errorMessage = error.response.data.errors[firstErrorField][0];
    }
    return errorMessage;
};

export const getFoodTypeIcon = (typeNumber) => {
    switch (typeNumber) {
        case 1:
            return '/images/veg-icon.png';
        case 2:
            return '/images/non-veg-icon.png';
        case 3:
            return '/images/vegan-icon.png';
        default:
            return '/images/veg-icon.png'; // Default to veg-icon.png if foodType is not recognized
    }
};