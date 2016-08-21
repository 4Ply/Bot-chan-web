$(document).ready(function () {
    $("#btn-join").click(function () {
        join();
    });

    showWelcome();
});

function join() {
    $("#welcome-title").fadeOut('slow');
    $("#btn-join").fadeOut('slow');
    $("#smiley").fadeOut("slow", function () {
        window.location.href = "login";
        // $(".content").fadeIn("slow");
    });
}

function showWelcome() {
    $("#spinner").fadeOut('slow', function () {
        if (window.location.hash === "#login") {
            join();
        } else {
            $("#welcome").fadeIn('slow');
        }
    });
}
