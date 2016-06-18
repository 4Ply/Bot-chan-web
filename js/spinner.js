$(document).ready(function () {
    $(".spinner").fadeOut(1000, function () {
        $(".container").hide().fadeIn("slow", function () {
            showLinks();
        });
    });
});

function showLinks() {
    $(".header-links").hide().fadeIn(500);
}
