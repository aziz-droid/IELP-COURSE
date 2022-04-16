<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_dokumen=showDetailDokumen($connect,"id",$id);
            foreach($data_dokumen as $data){
		?>
            <div class="row">
                <input id="id" type="hidden" class="form-control" name="id" value="<?= $data['id']?>">
                    <div class="form-group col-12">
                      <label for="nama">Jenis Dokumen <span style="color: red; font-weight: bold">*</span></label>
                      <select class="custom-select" id="id_jenis_dokumen" name="id_jenis_dokumen">
                        <option value="" selected disabled>Pilih Jenis Dokumen</option>
                        <?php
                          $master=showMasterJD($connect,"all","");
                          foreach($master as $datas ){
                      ?>
                            <option value="<?= $datas['id'] ?>" <?= $data['id_jenis_dokumen'] == $datas['id'] ? 'selected' : '' ?> ><?= $datas['nama'] ?></option>
                        <?php
                             }
                          ?>
                      </select>
                    </div>
                    <div class="form-group col-12">
                        <label for="nama"> Dokumen Lama</label>
                        <div class="custom-file">
                              <input  type="text" class="form-control" value="<?= $data['file']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="nama">Ubah Dokumen </label>
                        <input type="file" class="form-control" id="dokumen" name="dokumen" required accept="application/pdf">
                        <!-- <div class="custom-file">
                          <input type="file" class="custom-file-input" id="dokumen" name="dokumen" accept="application/pdf">
                          <label class="custom-file-label" for="dokumen">Pilih File</label>
                        </div> -->
                    </div>
                  </div>
        <?php 
        } 
  }
?>