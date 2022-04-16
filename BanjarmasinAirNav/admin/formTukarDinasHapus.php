<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_form=showForm($connect,"id",$id);
            foreach($data_form as $data){
		?>
            <div class="row">
            <div class="col-md-12">
              <input id="id" type="hidden" class="form-control" value="<?= $data['id']?>" name="id">
              <input id="id_map" type="hidden" class="form-control" value="<?= $data['id_map']?>" name="id_map">
              <p>Apakah Anda Yakin Menghapus Data Dibawah ini ?
                <br><b>Nama</b> = <?= $data['nama']?>
                <br><b>Tanggal</b> = <?= $data['tanggal']?> 
                <br><b>Jadwal Asli</b> = <?= $data['jadwal_asli']?>       
                <br><b>Perubahan</b> = <?= $data['perubahan']?>
                </p> 
            </div>
            </div>
        <?php 
        } 
    }
?>