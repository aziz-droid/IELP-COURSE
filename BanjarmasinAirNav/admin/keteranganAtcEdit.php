<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_keterangan=showKeteranganAtc($connect,"id",$id,"null");
            foreach($data_keterangan as $data){
		?>
            <div class="row">
                <input id="id" type="hidden" class="form-control" name="id" value="<?= $data['id']?>">
                <div class="form-group col-12">
                  <label for="nama">Users <span style="color: red; font-weight: bold">*</span></label>
                  <select class="custom-select" id="id_users" name="id_users" required>
                    <option value="" selected disabled>Pilih Users</option>
                    <?php
                    $data_user = showUsers($connect, "users_atc", "");
                    foreach ($data_user as $data2) {
                    ?>
                      <option value="<?= $data2['id'] ?>" <?= $data['id_users'] == $data2['id'] ? 'selected' : '' ?> ><?= $data2['nama'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group col-12">
                  <label for="nama">Bulan <span style="color: red; font-weight: bold">*</span></label>
                  <select class="custom-select" id="bulan" name="bulan" required>
                    <option value="" selected disabled>Pilih Bulan</option>
                    <?php for($i=1 ; $i<=12 ; $i++){ ?>
                        <option value="<?= $i ?>" <?= $data['bulan'] == $i ? 'selected' : '' ?>>Bulan <?= $i ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group col-12">
                  <label for="keterangan"> Keterangan </label>
                  <textarea type="text" class="form-control" style="height:100px" id="keterangan" name="keterangan" placeholder="Keterangan"><?= $data['keterangan'] ?></textarea>
                </div>
                <div class="form-group col-12">
                  <label for="status"> Status <span style="color: red; font-weight: bold">*</span></label>
                  <input type="text" step="any" class="form-control" id="status" name="status" value="<?= $data['status'] ?>" placeholder="Status" required>
                </div>
              </div>
        <?php 
        } 
  }
?>