<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_artikel=showArtikel($connect,"id",$id);
            foreach($data_artikel as $data){
		?>
            <div class="row">
                <div class="form-group col-12">
                    <input id="id" type="hidden" class="form-control" value="<?= $data['id']?>" name="id">
                    <p>Apakah Anda Yakin Menghapus Data Artikel <b><?= $data['judul']?></b> ini ?</p>      
                </div>
            </div>
        <?php 
        } 
    }
?>