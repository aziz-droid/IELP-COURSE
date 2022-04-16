<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_ojt=showOjtDokumen($connect,"id",$id);
            foreach($data_ojt as $data){
		?>
            <div class="row">
                <input id="id" type="hidden" class="form-control" name="id" value="<?= $data['id']?>">
                    <div class="form-group col-12">
                        <label for="nama"> Dokumen Lama</label>
                        <div class="custom-file">
                              <input  type="text" class="form-control" value="<?= $data['file']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="nama">Ubah Dokumen <span style="color: red; font-weight: bold">*</span></label>
                        <input type="file" class="form-control" id="dokumen" name="dokumen" required accept="application/pdf">
                        <!-- <div class="custom-file">
                          <input type="file" class="custom-file-input" id="dokumen" name="dokumen" required>
                          <label class="custom-file-label" for="dokumen">Pilih File</label>
                        </div> -->
                    </div>
                  </div>
        <?php 
        } 
  }
?>