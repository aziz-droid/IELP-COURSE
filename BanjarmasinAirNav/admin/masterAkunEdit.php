<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $akun = $_POST['akun'];      
        $data_user=showUsers($connect,"id",$id);
            foreach($data_user as $data){
		?>
            <div class="row">
                    <input id="id_akun" type="hidden" class="form-control" value="<?= $data['id']?>" name="id_akun">
                    <input id="akun" type="hidden" class="form-control" value="<?= $akun ?>" name="akun">
                    <div class="form-group col-12">
                      <label for="nama">Nama Lengkap <span style="color: red; font-weight: bold">*</span></label>
                      <input id="nama" type="text" class="form-control" value="<?= $data['nama']?>" name="nama" required>
                    </div>
                    <div class="form-group col-12">
                      <label for="nomer">No Hp <span style="color: red; font-weight: bold">*</span></label>
                      <input id="nomer" type="number" class="form-control" value="<?= $data['no_hp']?>" name="nomer" required>
                    </div>
                    <div class="form-group  col-12">
                      <label for="username">Username <span style="color: red; font-weight: bold">*</span></label>
                      <input id="username" type="text" class="form-control" value="<?= $data['username']?>" name="username" required>
                    </div>
                    <div class="form-group  col-12">
                      <label for="email">Email <span style="color: red; font-weight: bold">*</span></label>
                      <input id="email" type="email" class="form-control" value="<?= $data['email']?>" name="email" required>
                  </div>
        <?php 
        } 
        }
?>