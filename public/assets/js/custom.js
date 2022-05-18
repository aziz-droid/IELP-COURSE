/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

console.log(typeof $("#input"));
$("#modal-1").fireModal({
    title: "Tambah Kelas",
    body: $("#modal-form"),
    footerCLass: "my-modal footer-class",
    buttons: [
        {
            submit: true,
            class: "btn btn-primary btn-shadow",
            text: "Login",
            id: "",
            handler: () => {
                $(this).submit();
            },
        },
    ],
});
$("#data").DataTable();
