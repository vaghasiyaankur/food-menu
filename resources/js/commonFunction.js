import { f7 } from 'framework7-vue';
import $ from 'jquery';

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
    if(error.response.data.errors){
        const errorFields = Object.keys(error.response.data.errors);
        if (errorFields.length > 0) {
            const firstErrorField = errorFields[0];
            errorMessage = error.response.data.errors[firstErrorField][0];
        }
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

export const addLoader = () => {
    $(".overlay, body").removeClass("loaded");
    $(".overlay").css({ display: "" });
}

export const removeLoader = () => {
    setTimeout(function () {
        $(".overlay, body").addClass("loaded");
        setTimeout(function () {
            $(".overlay").css({ display: "none" });
        }, 1000);
    }, 2000);
}

export const formattedPrice = (price) => {
    return parseFloat(price).toFixed(2);
}