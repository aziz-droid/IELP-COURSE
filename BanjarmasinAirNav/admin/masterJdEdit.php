<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_master=showMasterJD($connect,"id",$id);
            foreach($data_master as $data){
		?>
            <div class="row">
                  <input id="id" type="hidden" class="form-control" name="id" value="<?= $data['id']?>">
                    <div class="form-group col-12">
                        <label for="nama">Nama <span style="color: red; font-weight: bold">*</span></label>
                        <input type="text" id="nama" name="nama" class="form-control" value="<?= $data['nama']?>"  required>
                    </div>
                  </div>
        <?php 
        } 
  }
?>