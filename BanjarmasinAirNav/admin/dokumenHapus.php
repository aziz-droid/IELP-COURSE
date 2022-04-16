<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_dokumen=showDetailDokumen($connect,"id",$id);
            foreach($data_dokumen as $data){
		?>
            <div class="row">
                <div class="form-group col-12">
                    <input id="id" type="hidden" class="form-control" value="<?= $data['id']?>" name="id">
                    <p>Apakah Anda Yakin Menghapus Data <b><?= $data['nama']?> - <?= $data['file']?></b> ini ?</p>      
                </div>
            </div>
        <?php 
        } 
    }
?>