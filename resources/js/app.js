require("./bootstrap");

$("#hamburger").on("click", function () {
    if ($(".nav").hasClass("hidden")) {
        $("#hamburger").addClass("hamburger-active");
        $(".nav").removeClass("hidden");
    } else {
        $("#hamburger").removeClass("hamburger-active");
        $(".nav").addClass("hidden");
    }
});
