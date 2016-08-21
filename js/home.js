function logout() {
    window.location.href = "logout";
}

$(document).ready(function () {
    $(".logout-btn").click(function () {
        logout();
    });

    $(".content").fadeIn("slow");
});
