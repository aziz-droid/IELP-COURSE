require("./bootstrap");

$("#hamburger").on("click", function () {
    if (!$("#nav").hasClass("top-full")) {
        $("#hamburger").addClass("hamburger-active");
        $("#nav").addClass("top-full");
        $("#nav").addClass("opacity-100");
        $("#nav").removeClass("opacity-0");
        $("#nav").removeClass("top-[-400px]");
    } else {
        $("#hamburger").removeClass("hamburger-active");
        $("#nav").removeClass("top-full");
        $("#nav").addClass("top-[-400px]");
        $("#nav").addClass("opacity-0");
        $("#nav").removeClass("opacity-100");
    }
});
$("#profile").on("click", function () {
    if ($("#dropdown").hasClass("hidden")) {
        $("#dropdown").removeClass("hidden");
    } else {
        $("#dropdown").addClass("hidden");
    }
});
