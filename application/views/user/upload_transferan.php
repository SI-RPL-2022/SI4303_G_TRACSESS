<main>
	<div class="page-content">
   <div class="container">
    <div class="row">
      <div class="col m4">
        <?php $this->load->view('user/nav') ?>
      </div>
      <div class="col m8">
        <div class="card grey lighten-4">
          <div class="title-card grey lighten-4">Permintaan Pembatalan Pembelian </div>
          <div class="card-content white"> 
            <div class="row">
              <?=form_open_multipart('user/upload_action/'.$o->id_order.'')?>
              <div class="input-field"><!-- 
                <i class="material-icons prefix">shopping_cart</i>    -->
                <input value="<?=$refund->price?>" name="refund" id="icon_prefix" type="hidden">
                <input value="<?=$balancenya->Balance?>" name="balanceku" id="icon_prefix" type="hidden">
                <input value="<?=$id_order?>" name="id_order" id="icon_prefix" type="hidden">
                <!-- <label>ID Pesanan</label> -->
              </div>
<!--               <div class="input-field">
                <i class="material-icons prefix">offline_pin</i>   
                <textarea name="reason" class="materialize-textarea" required=""></textarea>
                <label>Alasan</label>
              </div> -->
              <input type="hidden" name="id_costumer" value="<?=$this->session->userdata('auth_user')?>">
<!-- 
                  <h3>Pilih gambar dari komputer Anda dan klik upload</h3>
    <?php echo @$error; ?> 
    <?php echo form_open_multipart('ImageUpload_Controller/upload');?>
    <?php echo "<input type='file' name='profile_pic' size='20' />"; ?>
    <?php echo "<input type='submit' name='submit' value='upload' /> ";?>
    <?php echo "</form>"?> -->

            <input type='file' class="btn blue" name='pic_file' /><br> <br>
            <input type='submit' class="btn blue" name='submit' value='upload' />

<!--               <button type="submit" class="btn blue"><i class="material-icons inline-text">done</i> KIRIM</button> -->
              <?=form_close()?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
