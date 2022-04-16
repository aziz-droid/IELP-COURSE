<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_ojt=showOjtDokumen($connect,"id",$id);
            foreach($data_ojt as $data){
		?>
            <div class="row">
                <div class="form-group col-12">
                    <input id="id" type="hidden" class="form-control" value="<?= $data['id']?>" name="id">
                    <p>Apakah Anda Yakin Menghapus Data <b><?= $data['nama']?><b<br> <b><?= $data['file']?></b> ini ?</p>      
                </div>
            </div>
        <?php 
        } 
    }
?>