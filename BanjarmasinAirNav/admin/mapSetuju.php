<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_map=showMap($connect,"id",$id);
            foreach($data_map as $data){
		?>
            <div class="row">
              <div class="form-group  col-12">
                    <input type="hidden" id="id" name="id" value="<?= $data['id']?>" >
                    <input type="hidden" id="status_verifikasi" name="status_verifikasi" value="2" >
                    <b>Apakah Anda yakin menyetujui data dibawah ini ?</b><br>
                    Nama Pembuat Form = <?= $data['nama']?> <br>
                    Alasan = <?= $data['alasan']?> <br>
              </div>
            </div>
        <?php 
          } 
      }
?>