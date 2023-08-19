$(document).ready(function () {
    $("#btnLogin").click(function () {
        window.location.href = "../views/index.html";
    });

    $("#btnReg").click(function () {
        $("#registerModal-content").load("../views/modalSignUpPartial.html", function () {
            $("#registerModal").modal('show');
        });
    });
});