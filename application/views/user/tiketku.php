<link rel="shortcut icon" type="image/jpg" href="<?= base_url() . "assets/" ?>images/logo.png"/><!--                      
<link rel="stylesheet" href="<?="assets/"?>css/materialize.css">
<link rel="stylesheet" href="<?="assets/"?>css/style.css">
<style type="text/css">
body{
  background-color: #fff;
  color: black !important;
}
.head-ticket{
  border-bottom: solid 2px black;
  padding-bottom: 10px;
}
.light{
  font-weight: 300;
}
</style>
<div>
  <div class="head-ticket">
   <center>
     <img style="width: 300px" src="assets/images/logo.png">
   </center>
 </div>
 <center><b style="font-size: 20px">E - TIKET</b></center>
 <div>
  <table style="margin-top: -40px">
    <tbody>
      <tr>
       <td width="30%"></td>
       <td></td>
     </tr>
     <tr>
       <td width="30%"><b>No Pesanan</b></td>
       <td>#<?=$o->id_order?></td>
     </tr>
     <tr>
       <td><b>Nama Pembeli</b></td>
       <td><?=$o->buyer_name?></td>
     </tr>
     <tr>
       <td><b>Email</b></td>
       <td><?=$o->buyer_email?></td>
     </tr>
     <tr>
       <td><b>No HP</b></td>
       <td><?=$o->buyer_phone?></td>
     </tr>
   </tbody>
 </table>
</div>
<div style="margin-top: 40px">
  <h5 class="light">Detail Perjalanan</h5>
  <?php foreach($res as $r){
    $i = $this->m_general->gRuteW($r->id_rute);
    ?>
    <b><?=hari_tgl($i[0]->depart_at)?></b><br>
    <table class="detail">
      <tr>
        <td>
          <img style="width: 60px" src="<?="assets/images/company_logo/".$i[0]->company_logo?>"></td>
          <td><?=$i[0]->company_name?><br><span class="light"><?=$i[0]->class_name?></span>
          </td>
          <td style="text-align:center">
            <span class="t"><?=stime($i[0]->depart_time)?></span>
            <p style="text-align:center"><?=$i[0]->place_name_from?>-<?=$i[0]->p_name_from?></p>
          </td>
          <td style="text-align:center">
            ke
          </td>
          <td style="text-align:center">
            <span class="t"><?=stime($i[0]->arrive_time)?></span>
            <p style="text-align:center"><?=$i[0]->place_name_to?>-<?=$i[0]->p_name_to?></p>
          </td>
        </tr>
      </table>
      <?php } ?>
    </div>
    <div style="margin-top: 40px">
      <h5 class="light">Detail Penumpang</h5>
      <table>
        <thead>
          <tr>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kode Tiket</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <?php $no=1; foreach($ps as $r){
            ?>
            <tr>
              <td><?=$no?></td>
              <td><?=$r->p_title?> <?=$r->p_full_name?></td>
              <td><?=$r->ticket_code?></td>
            </tr>
          </table>
          <?php $no++; } ?>
        </tbody>
      </div>

    </div>



 -->





    <!-- <table style="width: 60%">
  <h3>Bukti Pembayaran</h3>
  <?php foreach($transaksi as $tr) :?>
  <tr>
    <td>Nama Customer</td>
    <td>:</td>
    <td><?php echo $tr->nama ?></td>
  </tr>
  <tr>
    <td>Merk Mobil</td>
    <td>:</td>
    <td><?php echo $tr->Nama_unit ?></td>
  </tr>
  <tr>
    <td>Tanggal Rental</td>
    <td>:</td>
    <td><?php echo $tr->tanggal_rental ?></td>
  </tr>
  <tr>
    <td>tanggal kembali</td>
    <td>:</td>
    <td><?php echo $tr->tanggal_kembali ?></td>
  </tr>
  <tr>
    <td>Biaya sewa /hari</td>
    <td>:</td>
    <td>Rp.<?php echo number_format($tr->harga,0,',','.') ?></td>
  </tr>
  <tr>
    <?php 
      $y = strtotime($tr->tanggal_rental);
      $x = strtotime($tr->tanggal_kembali);
      $jmlHari = abs(($x - $y)/(60*60*24));
     ?>
    <td>Jumlah hari</td>
    <td>:</td>
    <td><?php echo  $jmlHari ?> Hari</td>
  </tr>
  <tr>
    <td>Status Pembayaran</td>
    <td>:</td>
    <td><?php if($tr->status_pembayaran == '0'){echo "belum lunas";}else{echo "lunas";} ?></td>
  </tr>
  
  <tr style="font-weight: bold; color: red">
    <td>Total Bayar</td>
    <td>:</td>
    <td>Rp.<?php echo number_format($tr->harga * $jmlHari,0,',','.') ?></td>
  </tr>
  
  <?php endforeach; ?>
</table> -->

<!-- 

<script type="text/javascript">
  window.print();
</script>
 -->

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript">
            function generateBarCode()
            {
                var nric = $('#text').val();
                var url = 'https://api.qrserver.com/v1/create-qr-code/?data=' + nric + '&amp;size=50x50';
                $('#barcode').attr('src', url);
            }
        </script>

 <?php
// FUNGSI
function tanggal_indo($tanggal, $cetak_hari = false)
{
  $hari = array ( 1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
      );
      
  $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
  $split    = explode('-', $tanggal);
  $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
  
  if ($cetak_hari) {
    $num = date('N', strtotime($tanggal));
    return $hari[$num] . ', ' . $tgl_indo;
  }
  return $tgl_indo;
}
?>


<!DOCTYPE html>
<html lang="en" >
<head>
 <meta charset="UTF-8">
 <title>E-Ticket A.n <?php echo $tr->p_title ?>.&nbsp;<?php echo $tr->p_full_name ?></title>
 <link rel="stylesheet" href="css/style.css">
</head>
<body >
  <style> 
   #hiderow,
.delete {
    display: none;
}

* {
    margin: 0;
    padding: 0;
}

body {
    font: 14px/1.4 Georgia, serif;
  
}

#page-wrap {
    width: 800px;
    margin: 0 auto;
}

textarea {
    border: 0;
    font: 14px Georgia, Serif;
    overflow: hidden;
    resize: none;
}

table {
/*    border-collapse: collapse;*/
}

table td,
table th {
    /*border: 1px solid black;*/
    padding: 5px;
}

#header {
    height: 15px;
    width: 100%;
    margin: 20px 0;
    background: #222;
    text-align: center;
    color: white;
    font: bold 15px Helvetica, Sans-Serif;
    text-decoration: uppercase;
    letter-spacing: 20px;
    padding: 8px 0px;
}

#address {
    width: 250px;
    height: 150px;
    float: left;
}

#customer {
    overflow: hidden;
}

#logo {
    text-align: right;
    float: right;
    position: relative;
    margin-top: 25px;
    border: 1px solid #fff;
    max-width: 540px;
    max-height: 100px;
    overflow: hidden;
}

#logo:hover,
#logo.edit {
    border: 1px solid #000;
    margin-top: 0px;
    max-height: 125px;
}

#logoctr {
    display: none;
}

#logo:hover #logoctr,
#logo.edit #logoctr {
    display: block;
    text-align: right;
    line-height: 25px;
    background: #eee;
    padding: 0 5px;
}

#logohelp {
    text-align: left;
    display: none;
    font-style: italic;
    padding: 10px 5px;
}

#logohelp input {
    margin-bottom: 5px;
}

.edit #logohelp {
    display: block;
}

.edit #save-logo,
.edit #cancel-logo {
    display: inline;
}

.edit #image,
#save-logo,
#cancel-logo,
.edit #change-logo,
.edit #delete-logo {
    display: none;
}

#customer-title {
    font-size: 20px;
    font-weight: bold;
    float: left;
}

#meta {
    margin-top: 1px;
    width: 300px;
    float: right;
}

#meta td {
    text-align: right;
}

#meta td.meta-head {
    text-align: left;
    background: #eee;
}

#meta td textarea {
    width: 100%;
    height: 20px;
    text-align: right;
}

#items {
    clear: both;
    width: 100%;
    margin: 30px 0 0 0;
/*    border: 1px solid black;*/
}

#items th {
    background: #eee;
}

#items textarea {
    width: 80px;
    height: 50px;
}

#items tr.item-row td {
    border: 0;
    vertical-align: top;
}

#items td.description {
    width: 300px;
}

#items td.item-name {
    width: 175px;
}

#items td.description textarea,
#items td.item-name textarea {
    width: 100%;
}

#items td.total-line {
    border-right: 0;
    text-align: right;
}

#items td.total-value {
    border-left: 0;
    padding: 10px;
}

#items td.total-value textarea {
    height: 20px;
    background: none;
}

#items td.balance {
    background: #eee;
}

#items td.blank {
    border: 0;
}

#terms {
    text-align: center;
    margin: 20px 0 0 0;
}

#terms h5 {
    text-transform: uppercase;
    font: 13px Helvetica, Sans-Serif;
    letter-spacing: 10px;
    border-bottom: 1px solid black;
    padding: 0 0 8px 0;
    margin: 0 0 8px 0;
}

#terms textarea {
    width: 100%;
    text-align: center;
}

textarea:hover,
textarea:focus,
#items td.total-value textarea:hover,
#items td.total-value textarea:focus,
.delete:hover {
    background-color: #EEFF88;
}

.delete-wpr {
    position: relative;
}

.delete {
    display: block;
    color: #000;
    text-decoration: none;
    position: absolute;
    background: #EEEEEE;
    font-weight: bold;
    padding: 0px 3px;
    border: 1px solid;
    top: -6px;
    left: -22px;
    font-family: Verdana;
    font-size: 12px;
} 
  
  
  </style>
 <html lang="en">
 <head>
   
  <meta charset='UTF-8'>
  
  <title>Editable Invoice</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </head>
 <body style="background-image: url('<?php echo base_url() ?>assets/assets_shop/img/kocak.png');background-size: 800px 1132px; background-repeat: no-repeat; background-position: center; background-opacity: 0.5;">










<!--   ============================================== -->

  <div id="page-wrap" style="margin-top:50px; ">
  <!--  <div id="header">INVOICE</div> -->
  <div class="container">
  <div class="row" >
    <div class="col-sm">
      <h5> E-TICKET / <i style="color: gray;">E-Tiket</i></h5>
      <h6>Departure Trip / <i style="color: gray;"> Keberangkatan Perjalanan  </i></h6>
    </div>
    <div class="col-sm">
      <img class="img-brand" src="<?= base_url() . "assets/" ?>images/logo-text.png" style="width:300px; margin-left:100px;">
    </div>
  </div>
</div>

<div class="container" style="margin-top: 20px;">
  <div class="row">
    <div class="col-sm" style="background-color:#f9f9f9;">
      <img class="img-brand" src="<?= base_url() . "assets/" ?>images/company_logo/kai.png" style="width:100px; margin-bottom:10px;"><br>
      <h6><?php echo $tr->company_name ?></h6>
      <h6><?php echo $tr->transportation_code ?></h6>
    </div>
    <div class="col-sm" style="background-color:#f9f9f9;">
      <h4><?php $tanggal = date('Y-m-d', strtotime($tr->depart_at)); echo tanggal_indo($tanggal, true) ?><h4>

<table style="border:0px;padding:0px;">

  <tr style="border:0px;padding:0px;">
    <td rowspan="2" style="border:0px;padding:0px;"><h4><?php echo date('H:i ', strtotime($tr->depart_time))  ?></h4></td>
  <td rowspan="2" style="border:0px;padding:0px;"><h6><img src="https://icon-library.com/images/d1bbdcc09c.svg.svg" style="width:20px"></h6></td>
    <td style="border:0px;padding:0px;"><h6><?php echo $tr->kota_asal ?>(<?php echo $tr->kode_asal_asal ?>)</h6></td>

    
  </tr>
  <tr style="border:0px;padding:0px;">
    <td style="border:0px;padding:0px;"><h6><?php echo $tr->tempat_asal ?></h6></td>

  </tr>
</table>
<table style="border:0px;padding:0px; margin-top:10px;">




  <tr style="border:0px;padding:0px;">
     <td rowspan="2" style="border:0px;padding:0px;"><h4><?php echo date('H:i ', strtotime($tr->arrive_time))  ?></h4></td>
  <td rowspan="2" style="border:0px;padding:0px;"><h6><img src="https://icon-library.com/images/d1bbdcc09c.svg.svg" style="width:20px"></h6></td>
    <td style="border:0px;padding:0px;"><h6><?php echo $tr->kota_tujuan ?>(<?php echo $tr->kode_asal_tempat ?>)</h6></td>

    
  </tr>
  <tr style="border:0px;padding:0px;">
    <td style="border:0px;padding:0px;"><h6><?php echo $tr->tempat_tujuan ?></h6></td>

  </tr>
</table>
    </div>
    <div class="col-sm" >
      <img id='barcode' 
            src="https://api.qrserver.com/v1/create-qr-code/?data= <?php echo $tr->ticket_code?>&amp;size=100x100" 
            alt="" 
            title="HELLO" 
            width="100" 
            height="100" 
            />
      <h6> Ticket Code </h6>
      <h4 style="color:#34f5c6;"><b><?php echo $tr->ticket_code ?></b></h4>
      <h6> Your Tracsess Reservation Code </h6>
      <h6> <?php echo $tr->reservation_code ?></h6>
    </div>
  </div>
</div>
<hr>

<h4>Important Pre-Travel Information </h4>

<div class="container">
  <div class="row">
    <div class="col-sm">
<table style="border:0px;padding:0px;">

  <tr style="border:0px;padding:0px;">
      <td rowspan="2"style="border:0px;padding:0px;"><img src=" https://www.kindpng.com/picc/m/252-2524822_train-ticket-train-ticket-icon-png-transparent-png.png" width="40px"></td>
    <td style="border:0px;padding:0px;"><h6 style=" margin-top: 50px;">Use E-Ticket to print the Boarding Pass at the station. as early as 2x24 hours before departure.</h6></td>
  </tr>

</table>
    </div>
    <div class="col-sm">
     <table style="border:0px;padding:0px;">

  <tr style="border:0px;padding:0px;">
      <td rowspan="2"style="border:0px;padding:0px;"><img src=" https://d1nhio0ox7pgb.cloudfront.net/_img/i_collection_png/512x512/plain/id_cards.png" width="40px "></td>
    <td style="border:0px;padding:0px;"><h6 style=" margin-top: 50px;">To Board the Train, Bring your Official Identity Document As Used in Booking</h6></td>
  </tr>

</table>
    </div>
    <div class="col-sm">
      <table style="border:0px;padding:0px;">

  <tr style="border:0px;padding:0px;">
      <td rowspan="2"style="border:0px;padding:0px;"><img src=" https://www.kindpng.com/picc/m/252-2524822_train-ticket-train-ticket-icon-png-transparent-png.png" width="40px"></td>
    <td style="border:0px;padding:0px;"><h6 style=" margin-top: 50px;">Arrive at the Station at least 60 Minutes before departure.</h6></td>
  </tr>

</table>
    </div>
  </div>
</div>
<hr >

   <table id="items" style=" margin-top:50px;">

    <tr>
     <th>Passenger</th>
     <th>Type</th>
     <th>Class</th>
     <th>Train Name</th>
    </tr>



    <tr class="item-row">
     <td class="description"><span><?php echo $tr->p_full_name?></textarea><a class="delete" href="javascript:;" title="Remove row"></a></td>

     <td class="description"><span>Adult</span></td>
     <td class="description"><span class="cost"><?php echo $tr->class_name?></span></td>
     <td class="description"><span class="qty"><?php echo $tr->transportation_code?></span></td>

    </tr>
   </table> 
 <h3 style="margin-top:30px;"> Price Details </h3>


   <table id="items">

    <tr>
     <th>Train Name</th>
     <th>Description</th>
     <th>Class</th>
     <th>Price</th>
    </tr>



    <tr class="item-row">
     <td class="description"><span><?php echo $tr->transportation_code?></textarea><a class="delete" href="javascript:;" title="Remove row"></a></td>

     <td class="description"><span><?php echo $tr->kota_asal ?>-<?php echo $tr->kota_tujuan ?> <br><?php $tanggal = date('Y-m-d', strtotime($tr->depart_at)); echo tanggal_indo($tanggal, true) ?>   </span></td>
     <td class="description"><span class="cost"><?php echo $tr->class_name?></span></td>
     <td class="description"><span class="qty"><?php echo $tr->price?></span></td>

    </tr>
   </table> 

<hr style=" margin-top:50px;">
   <h2 style="margin-top:50px;">Reschedule and Cancellation</h2>

   <ol class="ml-5" style="margin-bottom:10px;">
  <li>Schedule changes are served at the station counter.</li>
  <li>Travel cancellation at the request of the passenger, is served at the designated station counter no later than 30 minutes before the train's scheduled departure as stated in the Boarding Pass.</li>
  <li>The applicant for cancellation is the passenger concerned by showing proof of original identity according to the data listed on the Boarding Pass and submitting a copy (photocopy).</li>
  <li>In the event that the applicant for cancellation is not the owner of the Boarding Pass, it is obligatory to attach a power of attorney stamped from the owner of the Boarding Pass to the authorized person to cancel.</li>
  <li>There is a cancellation fee of 25% of the train fare excluding the booking fee.</li>
  <li> If the Boarding Pass that is canceled is more than one passenger but with the same booking code, a copy (photocopy) of proof of identity and/or cancellation power of attorney attached is sufficient for one of the intended passengers.</li>
  <li>The applicant fills out a cancellation form consisting of 2 copies in the form of boarding pass data and passenger data as well as information on taking cancellation fees.</li>
  <li>Refunds are made after the 30th day via transfer or cash collection at the designated station. The list of stations serving fee collection can be seen in the Cancellation Station List.</li>
  <li>If the cancellation form is lost, it is obligatory to attach a certificate of loss from the Police at the time of collection of fees in cash at the counter.</li>


</ol>

   
 <footer class="page-footer blue" style="background-color:#2196f3; margin-top:100px;">

    <div class="container">
      <div class="row">
        <div class="col l4 s12">
          <h5 class="white-text">
            <img src="<?= base_url('assets/images/logo-text-white.png') ?>" style="width:170px">
          </h5>
          <p class="grey-text text-lighten-4" style="color:white;">
            Booking Online Tiket Kereta Api</p>
            

        </div>
                      <div class="col l6 offset-l2 s12" style="margin-top:20px">


               
                <a href="tel:(022) 7566456" class="white-text" style="color:white;">No Telp : (022) 7566456</a><br>
                <a href="tel:(022) 7566456" class="white-text" style="color:white;">E-Mail : Tracsess.Official@Mail.com</a>
              </div>
      </div>

    </div>

  </footer>


  </div>
 </body>
 </html>
 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
 <script  src="js/index.js"></script>
</body>
</html>