<main>

 <div class="carousel carousel-slider center" data-indicators="true">
  <div class="carousel-fixed-item center">
  </div>
  <div style="text-align: left" class="carousel-item blue lighten-1 white-text" href="#one!" style="background-image: url('http://2.bp.blogspot.com/-gRUqxgtdLes/Vq7Cdxvd-0I/AAAAAAAADHs/y3DO6oUTnrk/s1600/Bima-Ditarik-CC206105.jpg');" >
    <div class="container" >
    <?php 
    if($this->session->userdata('auth_user')){
      $info = $this->m_general->gDataW('costumer',array('id_costumer'=>$this->session->userdata('auth_user')))->row();
      ?>
      <h3 style="margin-top: 100px" class="light">Hai, <?=$info->full_name?></h3>
      <p class="white-text">Pesan Tiketmu Hanya Di Aplikasi TRACSESS Vesi beranda</p>
      <?php
    }else{
      ?>
      <h3 style="margin-top: 100px" class="light">SELAMAT DATANG DI TRACSESS</h3>
      <p class="white-text">Booking Online Tiket Kereta Apimu Sekarang Juga Vesi beranda</p>
      <a href="<?=site_url('account/register')?>" class="btn waves-effect blue white-text darken-text-2">DAFTAR SEKARANG</a>
      <a href="<?=site_url('Contoh')?>" class="btn waves-effect blue white-text darken-text-2">DAFTAR SEKARANG</a>
      <?php
    }
    ?>
  </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div style="margin-top: -100px" class="col s12 m12 l12">
      <div class="card blue">
        <div class="card-tabs">
          <ul class="tabs tabs-fixed-width tabs-transparent tabs-icon">
<!--             <li class="tab"><a href="#test1"><i class="material-icons">airplanemode_active</i>Pesawat</a></li> -->
            <li class="tab"><a href="#test2"><i class="material-icons">train</i>Kereta Api</a></li>
          </ul>
        </div>
        <div class="card-content grey lighten-5">
          <!-- <div id="test2">  
            <form method="GET" action="<?=site_url('flight/search')?>">    
              <div class="row">
                <div class="input-field col l4 m6 s12">
                  <i class="material-icons prefix">flight_takeoff</i>
                  <select name="from" id="p_asal" onchange="cekTP()">
                    <option value="">Pilih Bandara</option>
                    <?php
                    foreach($plp as $l){
                      echo '<option value="'.$l->id_place.'">'.$l->city_name.' - '.$l->place_name.'</option>';
                    }
                    ?>
                  </select>
                  <label for="icon_prefix">Kota Asal</label>
                </div>
                <div class="input-field col l4 m6 s12">
                  <i class="material-icons prefix">flight_land</i>
                  <select name="to" id="p_tujuan" onchange="cekTP()">
                    <option value="">Pilih Bandara</option>
                    <?php
                    foreach($plp as $l){
                      echo '<option value="'.$l->id_place.'">'.$l->city_name.' - '.$l->place_name.'</option>';
                    }
                    ?>
                  </select>
                  <label for="icon_prefix">Kota Tujuan</label>
                </div>
                <div class="input-field col l2 m6 s6">
                  <i class="material-icons prefix">airline_seat_recline_normal</i>       
                  <select name="class">
                    <option value="">Semua</option>
                    <?php
                    foreach($kp as $l){
                      echo '<option value="'.$l->id_transportation_class.'">'.$l->class_name.'</option>';
                    }
                    ?>
                  </select>
                  <label>Kelas</label>
                </div>
                <div class="input-field col l2 m6 s6">
                  <i class="material-icons prefix">group</i>   
                  <select name="ps">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                  <label>Jumlah Penumpang</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col l4 m4 s12">
                  <i class="material-icons prefix">date_range</i>
                  <input type="text" id="p_b" name="date_g" class="datepicker" onchange="cekTGLP()">
                  <label for="icon_prefix">Tanggal Berangkat</label>
                </div>
                <div class="input-field col l4 m4 s12">
                  <i class="material-icons prefix">date_range</i>  
                  <input type="text" id="p_p" name="date_b" class="datepicker" onchange="cekTGLP()">
                  <label for="icon_prefix">Tanggal Pulang</label>
                </div>
                <div class="col l4 m4 s12">
                  <button type="submit" style="margin-top:20px;width: 100%" class="waves-effect blue waves-light btn"><i class="material-icons left">search</i>CARI TIKET</button>
                </div>
              </div>
            </form>
          </div> -->
          <div id="test1">  

            <form method="GET" action="<?=site_url('train/search')?>">    
              <div class="row">
                <div class="input-field col l4 m6 s12">
                  <i class="material-icons prefix">place</i>
                  <select name="from" id="k_asal" onchange="cekTK()">
                    <option value="">Pilih Stasiun Asal</option>
                    <?php
                    foreach($plk as $l){
                      echo '<option value="'.$l->id_place.'">'.$l->city_name.' - '.$l->place_name.'</option>';
                    }
                    ?>
                  </select>
                  <label for="icon_prefix">Kota Asal</label>
                </div>
                <div class="input-field col l4 m6 s12">
                  <i class="material-icons prefix">place</i>
                  <select name="to" id="k_tujuan" onchange="cekTK()">
                    <option value="">Pilih Stasiun Tujuan</option>
                    <?php
                    foreach($plk as $l){
                      echo '<option value="'.$l->id_place.'">'.$l->city_name.' - '.$l->place_name.'</option>';
                    }
                    ?>
                  </select>
                  <label for="icon_prefix">Kota Tujuan</label>
                </div>
                <div class="input-field col l2 m6 s6">
                  <i class="material-icons prefix">airline_seat_recline_normal</i>       
                  <select name="class">
                    <option value="">Semua</option>
                    <?php
                    foreach($kk as $l){
                      echo '<option value="'.$l->id_transportation_class.'">'.$l->class_name.'</option>';
                    }
                    ?>
                  </select>
                  <label>Kelas</label>
                </div>
                <div class="input-field col l2 m6 s6">
                  <i class="material-icons prefix">group</i>   
                  <select name="ps">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                  <label>Jumlah Penumpang</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col l4 m4 s12">
                  <i class="material-icons prefix">date_range</i>
                  <input type="text" name="date_g" class="datepicker" id="k_b" onchange="cekTGLK()">
                  <label for="icon_prefix">Tanggal Berangkat</label>
                </div>
                <div class="input-field col l4 m4 s12"><input type="checkbox"/>
                  <i class="material-icons prefix">date_range</i>  
                  <input type="text" name="date_b" class="datepicker" id="k_p" onchange="cekTGLK()">
                  <label for="icon_prefix">Tanggal Pulang</label>
                 <i style="color:red; margin-left:40px ">*Kosongkan Tanggal Pulang Jika Tidak Diperlukan</i>
                </div>

              </div>

                              <div class="col l6 m4 s10 "><button type="submit" style="margin-top:0px;width: 100%;margin-left:320px;height:50px;" class="waves-effect blue waves-light btn"><i class="material-icons left">search</i>CARI TIKET</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- <div class="col m4">
      <h4>Partner Maskapai</h4>
      Partner Maskapai Penerbangan di Dalam & Luar Negeri
      <p class="light">Kami bekerja sama dengan berbagai maskapai penerbangan di seluruh dunia untuk menerbangkan Anda ke mana pun Anda inginkan!</p>
    </div>
    <div class="col m8 partner-list">
      
      <?php foreach($pp as $p) {?>
      <a href="" class="partner"><img title="<?=$p->company_name?>" src="<?=base_url()."assets/"?>images/company_logo/<?=$p->company_logo?>"></a>
      <?php } ?>
    </div>
  </div> -->
  

</div>
<div class="row">

<!--    <center><h1> UNDER CONSTRUCTION !!!!</h1></center> -->


<div class="row" style="margin-top: 50px; margin-left: 340px;  width:50%;text-align:center;justify-content:center;border-radius: 15px;background-color:#42A5F5; box-shadow: 3px 3px 3px 3px #cccccc;">
    <div class="col m6" >
      <table style="width:100%;">  
  <tr>
    <th rowspan="2"><img src="https://catatanoline.web.id/wp-content/uploads/2019/08/E-wallet-900x506.png" style="width:50px "></th>
    <td><b><i>TRACSESS Pay</i></b></td>
  </tr>
  <tr>
    <td>      Rp.<?php echo number_format($info->Balance) ?>
   <!--    <?=$info->Balance?> -->
<!--       <a href="" style="color:black"><?=$p->full_name?></a> -->
      <?php  ?></td>
  </tr>
</table>
    </div>

        <div class="col m6">
     <table style="width:100%">

  <tr>
     <th rowspan="2"><img src="https://www.pinclipart.com/picdir/big/355-3556122_4-succeed-vector-trophy-icon-png-clipart.png" style="width:30px "></th>
    <td><b><i>Your Point</i></b></td>
  </tr>
  <tr>
    <td>-</td>
  </tr>
</table>
    </div>

      
   
  </div>
</div>




  <div class="row">

<!--    <center><h1> UNDER CONSTRUCTION !!!!</h1></center> -->
    <center><h3> Kenapa Harus Di Tracsess ??</h3></center>

<div class="row" style="margin-top: 100px; text-align:center;justify-content:center;">
    <div class="col m3">
      <img importance="low" loading="lazy" decoding="async" width="150" height="150" style="object-fit: contain; object-position: 50% 50%;" srcset="https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494404291315-14b952bd322b531e5bd110ef42647fb2.png?tr=h-150,q-75,w-150 1x, https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494404291315-14b952bd322b531e5bd110ef42647fb2.png?tr=dpr-2,h-150,q-75,w-150 2x, https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494404291315-14b952bd322b531e5bd110ef42647fb2.png?tr=dpr-3,h-150,q-75,w-150 3x" src="https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494404291315-14b952bd322b531e5bd110ef42647fb2.png?tr=h-150,q-75,w-150">
      <h5>Praktis,No Repot</h5>
      <p class="light">Bebas transaksi di mana saja dan kapan saja, mulai dari desktop, aplikasi mobile, atau situs web mobile.</p>
    </div>

        <div class="col m3">
      <img importance="low" loading="lazy" decoding="async" width="150" height="150" style="object-fit: contain; object-position: 50% 50%;" srcset="https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494404302517-45b26bdf0f75fb811e24082493af1d27.png?tr=h-150,q-75,w-150 1x, https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494404302517-45b26bdf0f75fb811e24082493af1d27.png?tr=dpr-2,h-150,q-75,w-150 2x, https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494404302517-45b26bdf0f75fb811e24082493af1d27.png?tr=dpr-3,h-150,q-75,w-150 3x" src="https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494404302517-45b26bdf0f75fb811e24082493af1d27.png?tr=h-150,q-75,w-150">
      <h5>Terpercaya,Dan Dapat Dipercaya</h5>
      <p class="light">Anda akan mendapat apa  yang Anda bayar – dijamin!.</p>
    </div>

        <div class="col m3">
      <img importance="low" loading="lazy" decoding="async" width="150" height="150" style="object-fit: contain; object-position: 50% 50%;" srcset="https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494404312846-6dbe5b1372f2c392fa9115fc3bdd43c8.png?tr=h-150,q-75,w-150 1x, https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494404312846-6dbe5b1372f2c392fa9115fc3bdd43c8.png?tr=dpr-2,h-150,q-75,w-150 2x, https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494404312846-6dbe5b1372f2c392fa9115fc3bdd43c8.png?tr=dpr-3,h-150,q-75,w-150 3x" src="https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494404312846-6dbe5b1372f2c392fa9115fc3bdd43c8.png?tr=h-150,q-75,w-150">
      <h5>Berbagai Pilihan Pembayaran Yang Ditawarkan</h5>
      <p class="light">Pembayaran jadi semakin fleksibel dengan berbagi pilihan, mulai dari ATM, Transfer Bank, Kartu Kredit, Bayar Tunai di Konter, hingga Internet Banking. </p>
    </div>

        <div class="col m3">
      <img importance="low" loading="lazy" decoding="async" width="150" height="150" style="object-fit: contain; object-position: 50% 50%;" srcset="https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494404320802-53c931500308f54da6365b2162f39ba3.png?tr=h-150,q-75,w-150 1x, https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494404320802-53c931500308f54da6365b2162f39ba3.png?tr=dpr-2,h-150,q-75,w-150 2x, https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494404320802-53c931500308f54da6365b2162f39ba3.png?tr=dpr-3,h-150,q-75,w-150 3x" src="https://ik.imagekit.io/tvlk/image/imageResource/2017/05/10/1494404320802-53c931500308f54da6365b2162f39ba3.png?tr=h-150,q-75,w-150">
      <h5>Keamanan Transaksi Terjamin</h5>
      <p class="light">Teknologi SSL dari RapidSSL dengan Sertifikat yang terotentikasi menjamin privasi dan keamanan transaksi online Anda. Konfirmasi instan dan e-tiket atau voucher dikirim langsung ke email Anda..</p>
    </div>

   
  </div>

 <div class="row" style="margin-top: 100px">
    <div class="col m4">
      <h4>Partner Kereta Api</h4>
      <p class="light">Pergi ke bandara ataupun menjelajah negeri, pesan tiket kereta Anda bebas repot di sini!</p>
    </div>
    <div class="col m8 partner-list">
      <?php foreach($pk as $p) {?>
      <a href="<?=base_url()."assets/"?>images/company_logo/<?=$p->company_logo?>" class="partner"><img title="<?=$p->company_name?>" src="<?=base_url()."assets/"?>images/company_logo/<?=$p->company_logo?>"></a>
      <?php } ?>
    </div>
  </div>
<!-- ================ -->
    <!-- <div class="col m4">
      <h4>Partner Maskapai</h4>
      Partner Maskapai Penerbangan di Dalam & Luar Negeri
      <p class="light">Kami bekerja sama dengan berbagai maskapai penerbangan di seluruh dunia untuk menerbangkan Anda ke mana pun Anda inginkan!</p>
    </div>
    <div class="col m8 partner-list">
      
      <?php foreach($pp as $p) {?>
      <a href="" class="partner"><img title="<?=$p->company_name?>" src="<?=base_url()."assets/"?>images/company_logo/<?=$p->company_logo?>"></a>
      <?php } ?>
    </div>
  </div> -->
 <!--  <div class="row" style="margin-top: 100px">
    <div class="col m4">
      <h4>Partner Kereta Api</h4>
      <p class="light">Pergi ke bandara ataupun menjelajah negeri, pesan tiket kereta Anda bebas repot di sini!</p>
    </div>
    <div class="col m8 partner-list">
      <?php foreach($pk as $p) {?>
      <a href="" class="partner"><img title="<?=$p->company_name?>" src="<?=base_url()."assets/"?>images/company_logo/<?=$p->company_logo?>"></a>
      <?php } ?>
    </div>
  </div> -->

</div>


</main>  