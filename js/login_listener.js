var submitForm = function (event) {
    if (event.which == 13) {
        event.preventDefault();
        $("#btn-login").click();
    }
};

$("#username").keypress(submitForm);
$("#password1").keypress(submitForm);
$("#password2").keypress(submitForm);
