<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_user=showUsers($connect,"id",$id);
            foreach($data_user as $data){
		?>
            <div class="row">
              <div class="form-group  col-12">
                    <input type="hidden" id="id_akun" name="id_akun" value="<?= $data['id']?>" >
                    <input type="hidden" id="status_akun" name="status_akun" value="0" >
                    <b>Apakah Anda yakin unverifikasi data akun dibawah ini ?</b><br>
                    Nama Lengkap = <?= $data['nama']?> <br>
                    No. Hp = <?= $data['no_hp']?> <br>
                    Email = <?= $data['email']?><br>
              </div>
            </div>
        <?php 
          } 
      }
?>