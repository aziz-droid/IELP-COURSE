<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $akun = $_POST['akun'];  
        $data_user=showUsers($connect,"id",$id);
            foreach($data_user as $data){
		?>
            <div class="row">
              <input id="id_akun" type="hidden" class="form-control" value="<?= $data['id']?>" name="id_akun">
              <input id="akun" type="hidden" class="form-control" value="<?= $akun ?>" name="akun">
              <p>Apakah Anda Yakin Menghapus Data Akun <b><?= $data['nama']?></b> ini ?</p>      
        <?php 
        } 
        }
?>