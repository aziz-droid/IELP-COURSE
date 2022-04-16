<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_map=showMap($connect,"id",$id);
            foreach($data_map as $data){
		?>
            <div class="row">
              <input id="id" type="hidden" class="form-control" value="<?= $data['id']?>" name="id">
              <p>Apakah Anda Yakin Menghapus Data <b><?= $data['alasan']?></b> ini ?</p>      
        <?php 
        } 
    }
?>