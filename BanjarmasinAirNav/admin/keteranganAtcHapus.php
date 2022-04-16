<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_keterangan=showKeteranganAtc($connect,"id",$id,"null");
            foreach($data_keterangan as $data){
		?>
            <div class="row">
                <div class="form-group col-12">
                    <input id="id" type="hidden" class="form-control" value="<?= $data['id']?>" name="id">
                    <p>Apakah Anda Yakin Menghapus Data <b><?= $data['nama']?></b> ini ?<br> Keterangan = <?= $data['keterangan']?><br> Status = <?= $data['status']?><br> Bulan = <?= $data['bulan']?> - Tahun = <?= $data['tahun']?></p>      
                </div>
            </div>
        <?php 
        } 
    }
?>