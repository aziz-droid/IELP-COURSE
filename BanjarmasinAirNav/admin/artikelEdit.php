<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_artikel=showArtikel($connect,"id",$id);
            foreach($data_artikel as $data){
		?>
            <div class="row">
                <div class="form-group col-12">
                    <input id="id" type="hidden" class="form-control" value="<?= $data['id']?>" name="id">
                    <div class="form-group col-12">
                      <label for="judul"> Judul <span style="color: red; font-weight: bold">*</span></label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $data['judul']?>" required>
                    </div>
                    <div class="form-group col-12">
                      <label>Isi Artikel <span style="color: red; font-weight: bold">*</span></label>
                      <textarea style="height:250px" class="form-control" id="isi" name="isi" required><?= $data['isi']?></textarea>
                    </div>
                    <?php if(!empty($data['gambar_artikel'])){ ?>
                    <div class="form-group col-12">
                      <label>Gambar Lama</label><br>
                      <img src="../files/artikel/<?= $data['gambar_artikel']; ?>" height="200px" width="200px"> 
                    </div>
                    <?php } ?>
                      <div class="form-group col-12">
                        <label for="nama">Update Gambar</label>
                        <input type="file" class="form-control" id="artikel" name="artikel" accept="image/*">
                        <!-- <div class="custom-file">
                          <input type="file" class="custom-file-input" id="artikel" name="artikel" accept="image/*">
                          <label class="custom-file-label" for="dokumen">Pilih Gambar</label>
                        </div> -->
                    </div>
                  </div>      
                </div>
            </div>
        <?php 
        } 
    }
?>