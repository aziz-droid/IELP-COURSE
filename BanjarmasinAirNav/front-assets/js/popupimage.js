$(document).ready(function () {
    $(".img").click(function () {
        var img = $(this).attr('src');
        $("#show-img").attr('src', img);
        $("#imgmodal").modal('show');
    });
});