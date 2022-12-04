<main>
  <div class="container">
    <div class="admin-title">
      <div class="row">
        <div class="col m6 s12">
          <h4 class="light"><?=$title?></h4>
        </div>
        <div class="col m6 s12">
         <div class="nav-breadcrumb blue">
          <a href="#!" class="breadcrumb">Petugas</a>
          <a href="#!" class="breadcrumb"><?=$title?></a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col m12 s12">
      <div class="card grey lighten-4">
        <div class="title-card grey lighten-4"><?=$title?></div>
        <div class="card-content white">
          <div class="container">
            <div class="row">
              <?php
              if($this->session->flashdata('pesan')){
                echo $this->session->flashdata('pesan');
              }else{
                if(isset($info)){
                  echo '<div class="alert blue lighten-1">'.$info.'</div>';
                }else{
                  if($action==''){
                    echo '<div class="alert blue">Kelola Data '.$title.'</div>';
                  }elseif(isset($info)){
                    echo '<div class="alert blue lighten-1">'.$info.'</div>';
                  }
                }
              }
              if($action=='rec'){
                ?>
                <?=form_open('petugas/order/rec')?>
                <div class="row">
                  <div class="input-field">
                    <input name="start"  type="text"  class="datepicker">
                    <label>Tanggal Awal</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field">
                    <input name="end"  type="text"  class="datepicker">
                    <label>Tanggal Akhir</label>
                  </div>
                </div>
                <button type="submit" class="btn"><i class="material-icons inline-text">cloud</i> Download</button>
                <?=form_close()?>
                <?php
              }
              ?>   
            </div>
          </div>
        </div>
      </div>
    </div>
         <style>
    .sidebar{ width: 350px; margin:auto; padding: 10px }
    .camera{ width: auto; }
  </style>
<script src="<?= base_url() . "assets/" ?>js/jquery-3.4.1.min.js"></script>
<script src="<?= base_url() . "assets/" ?>scanner/vendor/modernizr/modernizr.js"></script>
<script src="<?= base_url() . "assets/" ?>scanner/vendor/vue/vue.min.js"></script>   
   
    <!-- <div class="col m5 s12">
      <div class="card grey lighten-4">
        <div class="title-card grey lighten-4">Menu <?=$title?></div>
        <div class="card-content white">
          <div class="container">
            <div class="btn-group">
              <a href="<?=site_url('admin/'.$page.'/index/rec')?>" class="btn waves-effect waves-light block"><i class="material-icons inline-text">cloud</i> Download Rekap Order</a>
              <a href="<?=site_url('admin/'.$page.'/backup')?>" class="btn waves-effect waves-light block"><i class="material-icons inline-text">backup</i> Backup Database</a>
              <a href="<?=site_url('admin/'.$page.'/export')?>" class="btn waves-effect waves-light block"><i class="material-icons inline-text">keyboard_backspace</i> Export CSV</a>
              <a href="#truncate" class="btn waves-effect modal-trigger waves-light block"><i class="material-icons inline-text">delete_forever</i> Hapus Semua Data</a>
              <div id="truncate" class="modal deletemodal">
                <div class="modal-content blue white-text">
                  <p>Apakah anda yakin ingin mengosongkan semua data?</p>
                </div>
                <div class="modal-footer">
                  <a class="waves-effect waves-red btn white blue-text modal-action modal-close">TIDAK</a>
                  <a href="<?=site_url('admin/'.$page.'/truncate')?>" class="waves-effect waves-green btn blue modal-action modal-close">YA</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <div class="col m12 s12">
      <div class="card grey lighten-4">
        <div class="title-card grey lighten-4">Data <?=$title?></div>
        <div class="card-content white">
          <table class="datatables responsive-table striped bordered">
            <thead class="blue">
              <tr class="white-text">
                <th class="light">No</th>
                <?php 
                foreach($tableTitle as $tt){
                  echo '<th class="light">'.$tt.'</th>';
                }
                ?>
                <th width="15%" class="light">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach($data as $d){?>
              <tr>
                <td><?=$no?></td>
                <?php 
                foreach($tableField as $tf){
                  echo '<td>'.$d->$tf.'</td>';
                }
                ?>
                <td style="text-align: center">
                  <?php if($d->status=='Terbayar' and $d->check_in=='Belum CekIn'){?>
                  <a href="<?=site_url('petugas/'.$page.'/p/accept/'.$d->$primary_key.'')?>" class="btn waves-effect waves-light action green tooltipped" data-position="top" data-delay="50" data-tooltip="Terima Pembayaran"><i class="material-icons">done</i></a>
                  <?php } ?>
<!--                   <a href="#deleteDialog<?=$d->$primary_key?>" class="btn waves-effect modal-trigger waves-light action modal-trigger red  tooltipped" data-position="top" data-delay="50" data-tooltip="Hapus Data"><i class="material-icons">delete</i></a> -->
                </td>
                <div id="deleteDialog<?=$d->$primary_key?>" class="modal deletemodal">
                  <div class="modal-content blue white-text">
                    <p>Apakah anda yakin ingin menghapus data ini?</p>
                  </div>
                  <div class="modal-footer">
                    <a class="waves-effect waves-blue btn white blue-text modal-action modal-close">TIDAK</a>
                    <a href="<?=site_url('admin/'.$page.'/p/delete/'.$d->$primary_key.'')?>" class="waves-effect waves-light btn blue modal-action modal-close">YA</a>
                  </div>
                </div>
                <?php $no++; } ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<!--                     <div class="row">
                      <div class="alert blue">Tes </div>
                      <div class="alert green">Tes </div>
                      <div class="alert red">Tes </div>
                      <div class="alert orange">Tes </div>
                      <div class="alert blue strip-blue">Tes</div>
                      <div class="alert blue strip-green">Tes</div>
                      <div class="alert blue strip-red">Tes</div>
                      <div class="alert blue strip-orange">Tes</div>
                    </div> -->
                  </div>
                </main>  

 <form id="loginForm">

<div id="message"></div>
<div id="app" class="">
    <center><video width="5" height="5" id="preview" class="thumbnail" ></video></center>



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
                  <button type="submit" id="login" name="login" class="btn blue" style="margin-top:0px;visibility: hidden;">Masuk</button>
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
        url: "<?= site_url('petugas/Order/autoqr') ?>",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          $("input").removeAttr("disabled", "disabled");
          if (data.result) {
            $('#message').html('<div class="alert green">' + data.content + '</div>');
            window.location.replace('<?= base_url() ?>/petugas/Order');
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