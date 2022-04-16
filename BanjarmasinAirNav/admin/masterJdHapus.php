<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_master=showMasterJD($connect,"id",$id);
            foreach($data_master as $data){
		?>
            <div class="row">
              <input id="id" type="hidden" class="form-control" value="<?= $data['id']?>" name="id">
              <p>Apakah Anda Yakin Menghapus Data <b><?= $data['nama']?></b> ini ?</p>      
        <?php 
        } 
    }
?>