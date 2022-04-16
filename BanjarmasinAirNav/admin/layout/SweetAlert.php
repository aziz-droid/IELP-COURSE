
<?php if(@$_SESSION['sukses']){ ?>
    <script>
        swal({
                title: "Berhasil!",
                text: "<?php echo $_SESSION['sukses']; ?>",
                type: "success",
                timer: 3000
                });
    </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['sukses']); } ?>

<?php if(@$_SESSION['gagal']){ ?>
    <script>
        swal({
                title: "Gagal!",
                text: "<?php echo $_SESSION['gagal']; ?>",
                type: "error",
                timer: 3000
                });
    </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['gagal']); } ?>

