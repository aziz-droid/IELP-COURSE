/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$(".edit").on("click", function (e) {
    $("#exampleModal").addClass("modal-progress");
    $.ajax({
        url: `/admin/class/${$(this).data("id")}`,
        type: "GET",
        dataType: "json",
        success: (data) => {
            $("#exampleModal").removeClass("modal-progress");
            $("#pertemuan").val(data.pertemuan);
            $("#jadwal").val(data.jadwal);
            $("#link").val(data.link);
            $("#materi").val(data.materi);
            $("#namaFile").removeClass("d-none");
            $("#namaFile").html(data.dokumen);
            $("#youtube").val(data.youtube);
            $("#method").attr("name", "_method");
            $("#method").val("PUT");
            $("form").attr("action", `/admin/class/${$(this).data("id")}`);
        },
    });
});
$(".editPrice").on("click", function (e) {
    $("#exampleModal").addClass("modal-progress");
    $.ajax({
        url: `/admin/prices/${$(this).data("id")}`,
        type: "GET",
        dataType: "json",
        success: (data) => {
            $("#exampleModal").removeClass("modal-progress");
            $("#pelajaran").val(data.pelajaran);
            $("#jamT").val(data.jamT);
            $("#jamP").val(data.jamP);
            $("#method").attr("name", "_method");
            $("#method").val("PUT");
            $("#form").attr("action", `/admin/prices/${$(this).data("id")}`);
        },
    });
});
$(".editVideo").on("click", function (e) {
    $("#exampleModal").addClass("modal-progress");
    $.ajax({
        url: `/admin/videos/${$(this).data("id")}`,
        type: "GET",
        dataType: "json",
        success: (data) => {
            $("#exampleModal").removeClass("modal-progress");
            $("#judul").val(data.judul);
            $("#link").val(data.link);
            $("#method").attr("name", "_method");
            $("#method").val("PUT");
            $("form").attr("action", `/admin/videos/${$(this).data("id")}`);
        },
    });
});
$(".editMentor").on("click", function (e) {
    $("#exampleModal").addClass("modal-progress");
    $.ajax({
        url: `/admin/mentor/${$(this).data("id")}`,
        type: "GET",
        dataType: "json",
        success: (data) => {
            $("#exampleModal").removeClass("modal-progress");
            $("#name").val(data.name);
            $("#biodata").val(data.biodata);
            $("#method").attr("name", "_method");
            $("#method").val("PUT");
            $("form").attr("action", `/admin/mentor/${$(this).data("id")}`);
        },
    });
});
$(".editAdmin").on("click", function (e) {
    $("#exampleModal").addClass("modal-progress");
    $.ajax({
        url: `/admin/admin/${$(this).data("id")}`,
        type: "GET",
        dataType: "json",
        success: (data) => {
            $("#exampleModal").removeClass("modal-progress");
            $("#name").val(data.name);
            $("#email").val(data.email);
            $("#noHp").val(data.noHp);
            $("#method").attr("name", "_method");
            $("#method").val("PUT");
            $("form").attr("action", `/admin/admin/${$(this).data("id")}`);
        },
    });
});
$(".editDokumen").on("click", function (e) {
    $("#exampleModal").addClass("modal-progress");
    $.ajax({
        url: `/admin/dokumen/${$(this).data("id")}`,
        type: "GET",
        dataType: "json",
        success: (data) => {
            $("#exampleModal").removeClass("modal-progress");
            $("#nama").val(data.nama);
            $("#namaFile").html(data.file);
            $("#namaFile").removeClass("d-none");
            $("#method").attr("name", "_method");
            $("#method").val("PUT");
            $("form").attr("action", `/admin/dokumen/${$(this).data("id")}`);
        },
    });
});
$(document).ready(function () {
    var attr = $("table").attr("style");

    // For some browsers, `attr` is undefined; for others,
    // `attr` is false.  Check for both.
    if (typeof attr !== "undefined" && attr !== false) {
        $("table").attr("style", "");
    }
});

$("#exampleModal").on("hidden.bs.modal", function () {
    $("form").trigger("reset");
    $("form").attr("action", ``);
    $("#method").attr("name", "");
    $("#method").val("");
    $("#id").attr("name", "");
    $("#id").val("");
    $("#namaFile").addClass("d-none");
});
$("#data").DataTable();
if (typeof errorToast !== "undefined") {
    if (errorToast != "") {
        toastr.error(errorToast);
    }
}
if (typeof successToast !== "undefined") {
    if (successToast != "") {
        toastr.success(successToast);
    }
}
if (typeof warnToast !== "undefined") {
    if (warnToast != "") {
        toastr.warning(warnToast);
    }
}
