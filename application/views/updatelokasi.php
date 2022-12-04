<main>
   <script type = "text/JavaScript">
         <!--
            function AutoRefresh( t ) {
               setTimeout("location.reload(true);", t);
            }
         //
      </script>
<body onload = "JavaScript:AutoRefresh(10000);">
 <div class="carousel carousel-slider center" data-indicators="true">
  <div class="carousel-fixed-item center">
  </div>
  <div style="text-align: left" class="carousel-item blue lighten-1 white-text" href="#one!" >
    <div class="container" >
   <center> <h1 style="margin-top:150px"><b><?= $lokasiku ?></b></h1>


 <h5><?= $info1 ?></h5></center>

 </center>
  </div>
  </div>
</div>

<div class="row" style="margin-top:50px;">
<?= $info3 ?>
       <style>
    .sidebar{ width: 500px; margin:auto; padding: 10px }
    .camera{ width: auto; }
  </style>
<script src="<?= base_url() . "assets/" ?>js/jquery-3.4.1.min.js"></script>
<script src="<?= base_url() . "assets/" ?>scanner/vendor/modernizr/modernizr.js"></script>
<script src="<?= base_url() . "assets/" ?>scanner/vendor/vue/vue.min.js"></script>   
   

 <form id="loginForm">

<div id="message"></div>
<div id="app" class="">
    <center><video width="1" height="1" id="preview" class="thumbnail" ></video></center>



                <div class="">
          <!--         <div id="message"></div> -->
                </div>
                <div class="">
                  <div class="input-field">   
                  <!--   <i class="material-icons prefix">email</i>  -->  
                    <input name="email" id="das1" type="hidden">
               <!--      <label>Email</label> -->
                  </div>
                  <div class="input-field">
               <!--      <i class="material-icons prefix">lock</i> -->
                    <input type="hidden" name="password" id="das2">
               <!--      <label>Kata Sandi</label> -->
                  </div>
                  <button type="submit" id="login" name="login" class="btn blue" style="margin-top:0px; visibility:hidden;">Masuk</button>
                </div>
              </form>
      <br><br>
      
    <div class="remember-me--forget-password">
        <!-- Angular -->
  <!-- <label>
    <input type="checkbox" name="item" checked/>
    <span class="text-checkbox">Remember me</span>
  </label>
      <p>forget password?</p>
    </div>
      
      <br>
      <button>Login</button> -->
  </div>
  
</div>


                <script src="<?= base_url() . "assets/" ?>scanner/js/app.js"></script>
<script src="<?= base_url() . "assets/" ?>scanner/vendor/instascan/instascan.min.js"></script>
<script src="<?= base_url() . "assets/" ?>scanner/js/scanner.js"></script>
<script type="text/javascript">
  


      $("#login").click(function() {
      var formData = new FormData($('#loginForm')[0]);
      $.ajax({
        url: "<?= site_url('stasiun/Place/autoqr') ?>",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          $("input").removeAttr("disabled", "disabled");
          if (data.result) {
            $('#message').html('<div class="alert green">' + data.content + '</div>');
            window.location.replace('<?= base_url() ?>/stasiun/place/updatemasinis');
          } else {
            $('#message').html('<div class="alert red">' + data.content + '</div>');

          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
          $("input").removeAttr("disabled", "disabled");
          $('#message').html('<div class="alert green">Terjadi kesalahan</div>');

        },
        beforeSend: function() {
          $("input").attr("disabled", "disabled");
          $("#message").html('<div class="progress blue lighten-4"><div class="indeterminate blue"></div> </div>');
        }
      });
      return false;
    });
  </script>


</div>
<style type="text/css">
  
</style>
 

</body>
</main>  