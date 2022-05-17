require("./bootstrap");

$("#hamburger").on("click", function () {
    if (!$("#nav").hasClass("top-[80px]")) {
        $("#hamburger").addClass("hamburger-active");
        $("#nav").addClass("top-[80px]");
        $("#nav").addClass("opacity-100");
        $("#nav").removeClass("opacity-0");
        $("#nav").removeClass("top-[-400px]");
    } else {
        $("#hamburger").removeClass("hamburger-active");
        $("#nav").removeClass("top-[80px]");
        $("#nav").addClass("top-[-400px]");
        $("#nav").addClass("opacity-0");
        $("#nav").removeClass("opacity-100");
    }
});
