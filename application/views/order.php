<main>
<style>
.button {
  border-radius: 4px;
  background-color: #64B5F6;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 18px;
  padding: 1px;
  width: 400px;
  height:50px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>

  <div class="page-header blue white-text">
    <h4 class="light">Konfirmasi Pesanan</h4>
  </div>
  <div class="page-content">
   <div class="container">
    <div class="row">
      <div class="col s12 m8">
        <?php foreach($cart as $c){
          $i = $this->m_general->gRuteW($c['id_rute']);
          ?>
          <div class="card blue lighten-1">
            <div class="card-content ">
              <i class="material-icons inline-text white-text">directions</i> 
              <?=$i[0]->place_name_from?> <?=$i[0]->p_name_from?> → <?=$i[0]->place_name_to?> <?=$i[0]->p_name_to?> | <i class="material-icons inline-text white-text">group</i> <?=$c['jumlah']?> Penumpang | <i class="material-icons inline-text white-text">airline_seat_recline_normal</i> <?=$i[0]->class_name?>
            </div>
          </div>

          <div class="card grey lighten-4">
            <div class="title-card blue lighten-1">
              <i class="material-icons inline-text white-text">details</i> Detail Perjalanan</div>
              <div class="card-content ">
                <b><?=hari_tgl($i[0]->depart_at)?></b><br>
                <table>
                  <tr>
                    <td width="80px">
                      <img style="width: 60px" src="<?=site_url()."assets/images/company_logo/".$i[0]->company_logo?>"></td>
                      <td><?=$i[0]->transportation_code?><br><span class="light"><?=$i[0]->class_name?></span>
                      </td>
                    </tr>
                  </table>
                  
                  
                  <table class="detail">
                    
                    <tbody>
                      <tr>
                        <td style="text-align:center">
                          <span class="t"><?=stime($i[0]->depart_time)?></span>
                          <p><?=$i[0]->place_name_from?></p>
                        </td>
                        <td style="text-align:center">
                          <i class="material-icons inline-text blue-text">arrow_forward</i>
                        </td>
                        <td style="text-align:center">
                          <span class="t"><?=stime($i[0]->arrive_time)?></span>
                          <p><?=$i[0]->place_name_to?></p>
                        </td>
                        <td>
                          <span class="t"><?=sel_jam($i[0]->depart_at.' '.$i[0]->depart_time,$i[0]->arrive_at.' '.$i[0]->arrive_time)?></span>
                          <p>Langsung</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php } ?>
            </div>
            <div class="col m4">
              <div class="card grey lighten-4">
                <div class="title-card blue lighten-1"><i class="material-icons inline-text white-text">attach_money</i> Rincian Harga</div>
                <div class="card-content ">
                  <table class="light">
                    <?php 
                    $total = 0 ;
                    foreach($cart as $c){
                      $i = $this->m_general->gRuteW($c['id_rute']);
                      $harga = $i[0]->price*$c['jumlah'];
                      $total = $total+$harga;
                      ?>
                      <tr>
                        <td  style="width:60%"><?=$i[0]->transportation_code?> (Penumpang) x<?=$c['jumlah']?></td>
                        <td style="text-align: right;"><b><?=rupiah($harga)?></b></td>
                      </tr>
                      <?php } ?>
                      <tr>
                        <td><hr>Total Harga  :</td>
                        <td style="text-align: right;"><hr><b><?=rupiah($total)?></b></td>
                      </tr>
                    </table>
                  </div>
                </div>
               <!--  <a href="<?=site_url('order/checkout')?>" class="btn blue btn-large" style="width: 100%">
                  <i class="material-icons inline-text">chevron_right</i> Lanjutkan ke Pemesanan</a> -->

                <a href="<?=site_url('order/checkout')?>">
                 <button class="button"><span>Lanjutkan Pemesanan </span></button>   </a>
                
                </div>
              </div>
              <div class="row">
                <div class="col m8">
                </div>
              </div>
            </div>
          </div>
        </main>