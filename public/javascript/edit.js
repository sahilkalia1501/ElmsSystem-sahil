$.validator.addMethod("noSpace", function (value, element) {
    return /^[a-zA-Z]+$/.test(value);
}, "No Space And No Number Begin With");

$(function () {
    $("form[name='edit']").validate({
        rules: {
        fname: {
            required: true,
            noSpace: true,
        },
        lname: {
            required: true,
            noSpace: true,
        },
        dob: {
            required: true,
            date: true,
        },
        number: {
            required: true,
            minlength: 10,
            maxlength: 10,
        },
        email: {
            required: true,
            email: true
        },
        photo: {
            required: false,
            }
        },
    });
});
