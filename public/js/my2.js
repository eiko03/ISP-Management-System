document.getElementById("update_form").onsubmit = function () {
    var y = document.forms["update_form"]["validationCustom02"].value;

    var submit = true;


    if (y == null || y == "") {
        emailError = "Please enter your email";
        document.getElementById("email_error").innerHTML = emailError;
        submit = false;
    }
    return submit;
}

function removeWarning() {
    document.getElementById(this.id + "_error").innerHTML = "";
}


document.getElementById("validationCustom02").onkeyup = removeWarning;
