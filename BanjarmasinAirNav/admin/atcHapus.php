<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_atc=showAtc($connect,"id",$id);
            foreach($data_atc as $data){
		?>
            <div class="row">
                <div class="form-group col-12">
                    <input id="id" type="hidden" class="form-control" value="<?= $data['id']?>" name="id">
                    <p>Apakah Anda Yakin Menghapus Data <b><?= $data['nama']?></b> ini ?<br> DNS = <?= $data['dns']?>, CTR = <?= $data['ctr']?>, ASS = <?= $data['ass']?></p>      
                </div>
            </div>
        <?php 
        } 
    }
?>