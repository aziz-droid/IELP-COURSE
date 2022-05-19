/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$("#modal-1").fireModal({
    title: $("#modal-1").data("title"),
    body: $("#modal-form"),
    buttons: [
        {
            submit: true,
            class: "btn btn-primary btn-shadow",
            text: "Simpan",
            id: "",
            handler: () => {
                $(this).submit();
            },
        },
    ],
});
$("#modal-2").fireModal({
    title: $("#modal-2").data("title"),
    body: $("#modal-form-desk"),
    buttons: [
        {
            submit: true,
            class: "btn btn-primary btn-shadow",
            text: "Simpan",
            id: "",
            handler: () => {
                $(this).submit();
            },
        },
    ],
});
$("#data").DataTable();
