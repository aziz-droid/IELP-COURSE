<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_atc=showAtc($connect,"id",$id);
            foreach($data_atc as $data){
		?>
            <div class="row">
                <input id="id" type="hidden" class="form-control" name="id" value="<?= $data['id']?>">
                <?php if($_SESSION['role'] == 1) { ?>
                  <div class="form-group col-12">
                  <label for="nama">Users <span style="color: red; font-weight: bold">*</span></label>
                  <select class="custom-select" id="id_akun" name="id_akun" required>
                    <option value="" selected disabled>Pilih Users</option>
                    <?php
                    $data_user = showUsers($connect, "users_atc", "");
                    foreach ($data_user as $data2) {
                    ?>
                      <option value="<?= $data2['id'] ?>" <?= $data['id_akun'] == $data2['id'] ? 'selected' : '' ?> ><?= $data2['nama'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                  <?php }else { ?>
                    <input type="hidden" class="form-control"  id="id_akun" name="id_akun" value="<?= $_SESSION['idUsers']?>" >
                    <?php } ?>
                    <div class="form-group col-12">
                      <label for="dns"> DNS <span style="color: red; font-weight: bold">*</span></label>
                      <input type="text" class="form-control"  id="dns" name="dns" value="<?= $data['dns']?>" placeholder="DNS" required>
                    </div>
                    <div class="form-group col-12">
                      <label for="ctr"> CTR </label>
                      <input type="number" class="form-control"  id="ctr" name="ctr" value="<?= $data['ctr']?>" placeholder="CTR" >
                    </div>
                    <div class="form-group col-12">
                      <label for="ass"> ASS </label>
                      <input type="number" class="form-control"  id="ass" name="ass" value="<?= $data['ass']?>" placeholder="ASS" >
                    </div>
                    <div class="form-group col-12">
                      <label for="tgl"> Tanggal <span style="color: red; font-weight: bold">*</span></label>
                      <input type="date" class="form-control"  id="tgl" name="tgl" value="<?= date('Y-m-d', strtotime($data['created_at'])) ?>" required>
                    </div>
                <?php if(!empty($data['gambar'])){ ?>
                    <div class="form-group col-12">
                        <label>Gambar Lama</label><br>
                        <img src="../files/atc/<?= $data['gambar']; ?>" height="200px" width="200px"> 
                    </div>
                    <?php } ?>
                    <div class="form-group col-12">
                        <label for="nama">Ubah Gambar </label>
                        <input type="file" class="form-control" id="gambar" name="gambar" >
                    </div>
                  </div>
        <?php 
        } 
  }
?>