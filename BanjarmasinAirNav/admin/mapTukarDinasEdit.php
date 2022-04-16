<?php
    include '../connect.php';
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $data_map=showMap($connect,"id",$id);
            foreach($data_map as $data){
		?>
            <div class="row">
                  <input id="id" type="hidden" class="form-control" name="id" value="<?= $data['id']?>">
                    <div class="form-group col-12">
                      <label for="alasan">Alasan <span style="color: red; font-weight: bold">*</span></label>
                      <textarea id="alasan" name="alasan" style="height:100px" class="form-control"  required><?= $data['alasan']?></textarea>
                    </div>
                  </div>
        <?php 
        } 
  }
?>