<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_form=showForm($connect,"id",$id);
            foreach($data_form as $data){
		?>
            <div class="row">
                  <input id="id" type="hidden" class="form-control" name="id" value="<?= $data['id']?>">
                  <input id="id_map" type="hidden" class="form-control" name="id_map" value="<?= $data['id_map']?>">
                  <div class="form-group col-12">
                      <label for="nama">Nama <span style="color: red; font-weight: bold">*</span></label>
                      <input id="nama" type="text" class="form-control" name="nama" value="<?= $data['nama']?>"  required>
                    </div>
                    <div class="form-group col-12">
                      <label for="tgl">Tanggal <span style="color: red; font-weight: bold">*</span></label>
                      <input id="tgl" type="date" class="form-control" name="tgl" value="<?= $data['tanggal']?>" required>
                    </div>
                    <div class="form-group  col-12">
                      <label for="jadwal">Jadwal Asli <span style="color: red; font-weight: bold">*</span></label>
                      <input id="jadwal" type="text" class="form-control" name="jadwal" value="<?= $data['jadwal_asli']?>" required>
                    </div>
                    <div class="form-group  col-12">
                      <label for="perubahan">Perubahan <span style="color: red; font-weight: bold">*</span></label>
                      <input id="perubahan" type="perubahan" class="form-control" name="perubahan" value="<?= $data['perubahan']?>" required>
                  </div>
                  </div>
        <?php 
        } 
  }
?>