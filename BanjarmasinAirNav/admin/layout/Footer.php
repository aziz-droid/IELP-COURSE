
    <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; <?= date('Y') ?> <div class="bullet"></div> Design By ABRE</a>
        </div>
      </footer>
    </div>
  </div>

  
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script type="text/javascript" src="../assets/js/sweetalert2.js"></script>
  <script type="text/javascript" src="../assets/js/datatables.js"></script>

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
  <script type="text/javascript">
        $(document).ready(function(){
            $('#ubah').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                var akun  = $(e.relatedTarget).data('akun');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'masterAkunEdit.php',
                    data :   {idx : idx, akun : akun},
                    success : function(data){
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#hapus').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                var akun  = $(e.relatedTarget).data('akun');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'masterAkunHapus.php',
                    data :  {idx : idx, akun : akun},
                    success : function(data){
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#verifikasi').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                var akun  = $(e.relatedTarget).data('akun');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'verifikasi.php',
                    data :  {idx : idx, akun : akun},
                    success : function(data){
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#unverifikasi').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                var akun  = $(e.relatedTarget).data('akun');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'unverifikasi.php',
                    data :  {idx : idx, akun : akun},
                    success : function(data){
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#ubah_map').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'mapTukarDinasEdit.php',
                    data :   {idx : idx},
                    success : function(data){
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#hapus_map').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'mapTukarDinasHapus.php',
                    data :  {idx : idx},
                    success : function(data){
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#ubah_form').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'formTukarDinasEdit.php',
                    data :   {idx : idx},
                    success : function(data){
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#hapus_form').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'formTukarDinasHapus.php',
                    data :  {idx : idx},
                    success : function(data){
                        console.log(data);
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#ubah_jd').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'masterJdEdit.php',
                    data :   {idx : idx},
                    success : function(data){
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#hapus_jd').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'masterJdHapus.php',
                    data :  {idx : idx},
                    success : function(data){
                        console.log(data);
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#ubah_dk').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'dokumenEdit.php',
                    data :   {idx : idx},
                    success : function(data){
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#hapus_dk').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'dokumenHapus.php',
                    data :  {idx : idx},
                    success : function(data){
                        console.log(data);
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#ubah_ojt').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'ojtEdit.php',
                    data :   {idx : idx},
                    success : function(data){
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#hapus_ojt').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'ojtHapus.php',
                    data :  {idx : idx},
                    success : function(data){
                        console.log(data);
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#ubah_artikel').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'artikelEdit.php',
                    data :   {idx : idx},
                    success : function(data){
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#hapus_artikel').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'artikelHapus.php',
                    data :  {idx : idx},
                    success : function(data){
                        console.log(data);
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#ubah_atc').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'atcEdit.php',
                    data :   {idx : idx},
                    success : function(data){
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#hapus_atc').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'atcHapus.php',
                    data :  {idx : idx},
                    success : function(data){
                        console.log(data);
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#ubah_keterangan_atc').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'keteranganAtcEdit.php',
                    data :   {idx : idx},
                    success : function(data){
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#hapus_keterangan_atc').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                // console.log(idx);
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'keteranganAtcHapus.php',
                    data :  {idx : idx},
                    success : function(data){
                        console.log(data);
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#mapPengajuan').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'mapPengajuan.php',
                    data :  {idx : idx},
                    success : function(data){
                        console.log(data);
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#mapSetuju').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'mapSetuju.php',
                    data :  {idx : idx},
                    success : function(data){
                        console.log(data);
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#mapTolak').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'mapTolak.php',
                    data :  {idx : idx},
                    success : function(data){
                        console.log(data);
                    $('.hasil-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
  </script>
  <script type="text/javascript">
          $(document).ready(function(){
            $('.data').DataTable();
          });
      </script>   
      
  <script>  
  function Pass() {
        //show pass masuk
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function isCorrect(){
        var ps = document.getElementById("password").value;
        var cps = document.getElementById("password2").value;
        if(ps===cps){
            $("#register").removeAttr("disabled");
            $("#alert").css("display","none");
        } else {
            $("#alert").css("display","block");
        }
    }

    function Pass2() {
        //show pass daftar
        var y = document.getElementById("password");
        var z = document.getElementById("password2");

        if (y.type === "password") {
            y.type = "text";
            z.type = "text";
        } else {
            y.type = "password";
            z.type = "password";
        }
    }
    function isCorrect2(){
        var ps = document.getElementById("new_pass").value;
        var cps = document.getElementById("cek_pass").value;
        if(ps===cps){
            $("#alert2").css("display","none");
        } else {
            $("#alert2").css("display","block");
        }
    }
    function ubahPassword() {
            var x = document.getElementById("old_pass");
            var y = document.getElementById("new_pass");
            var z = document.getElementById("cek_pass");
            if (x.type === "password") {
                x.type = "text";
                y.type = "text";
                z.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
                z.type = "password";
            }
        }
    </script>
 