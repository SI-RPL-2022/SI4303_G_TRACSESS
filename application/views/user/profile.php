<style type="text/css">
  
body {
  font-family: sans-serif;
}

.profilepic {
  position: relative;
  width: 150px;
  height: 150px;
  border-radius: 50%;
  overflow: hidden;
  background-color: #111;
}

.profilepic:hover .profilepic__content {
  opacity: 1;
}

.profilepic:hover .profilepic__image {
  opacity: .5;
}

.profilepic__image {
  object-fit: cover;
  opacity: 1;
  transition: opacity .2s ease-in-out;
}

.profilepic__content {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  color: white;
  opacity: 0;
  transition: opacity .2s ease-in-out;
}

.profilepic__icon {
  color: white;
  padding-bottom: 8px;
}

.fas {
  font-size: 20px;
}

.profilepic__text {
  text-transform: uppercase;
  font-size: 12px;
  width: 50%;
  text-align: center;
}


</style>

<main>
	<div class="page-content">
   <div class="container">
    <div class="row">
      <div class="col m4">
        <?php $this->load->view('user/nav') ?>
      </div>
      <div class="col m8">
        <div class="card grey lighten-4">
          <div class="title-card grey lighten-4">Ubah Profil</div>
          <div class="card-content white"> <div class="row">
            <?=$this->session->flashdata('pesan')?>
            <div class="card grey lighten-4">
              <div class="card-tabs">
                <ul class="tabs tabs-fixed-width tabs-transparent">
                  <li class="tab"><a class="blue-text" href="#profile">Profil</a></li>
                  <li class="tab"><a class="blue-text" href="#password">Kata Sandi</a></li>
                </ul>
              </div>
            </div>
            <div class="container">
              <div id="profile" class="col s12">

  <div class="row" style="margin-top: 10px;">
    <div class="col m3" >

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/svg-with-js.min.css" rel="stylesheet" />
<?=form_open_multipart('user/p_profile')?>

<div class="profilepic">
  <img class="profilepic__image" src="<?= base_url() . "assets/" ?>images/profilepic/<?=$info->pic_file?>" width="150" height="150" alt="Profibild" />
  <div class="profilepic__content">
    <span class="profilepic__icon"><i class="fas fa-camera"></i></span>
    <div class="profilepic__text">Edit Profile<input type="file" name="pic_file" style="opacity:0.0"></div>
  </div>
</div>


      <!-- <img src="https://assets.pikiran-rakyat.com/crop/0x0:1000x924/x/photo/2022/03/10/141822281.jpg" alt="Avatar" style="width:150px;border-radius: 50%; "> -->
     <!--  <button type="submit" class="btn blue" style="margin-top:25px;margin-left:10px"><i class="material-icons inline-text"></i> Upload Foto Baru</button>
 -->


    </div>

        <div class="col m7" style="float:right;">
     
                
                <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">person</i>   
                    <input value="<?=$info->full_name?>" name="full_name" id="icon_prefix" type="text">
                    <label>Nama Lengkap</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">email</i>   
                    <input name="email" id="icon_prefix" value="<?=$info->email?>" type="text">
                    <label>Alamat Email</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">phone</i>   
                    <input name="phone" id="icon_prefix" value="<?=$info->phone?>" type="text">
                    <label>No. Handphone</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">home</i>   
                    <textarea name="address" class="materialize-textarea"><?=$info->address?></textarea>
                    <label>Alamat</label>
                  </div>
                  <button type="submit" class="btn blue"><i class="material-icons inline-text">save</i> Simpan</button>
                  <?=form_close()?>
      
    </div>



  </div>


                </div>
              </div>
              <div id="password" class="col s12">
                <?=form_open('user/p_password')?>
                <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">lock_outline</i>
                    <input type="password" name="o_password">
                    <label>Kata Sandi Lama</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" name="password">
                    <label>Kata Sandi Baru</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" name="c_password">
                    <label>Ulangi Kata Sandi Baru</label>
                  </div>
                  <button type="submit" class="btn blue"><i class="material-icons inline-text">save</i> Simpan</button>
                  <?=form_close()?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</main>
