<!--                      
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



<script type="text/javascript">
  window.print();
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
 <title>Bukti Pemesanan Perjalanan</title>
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
    border-collapse: collapse;
}

table td,
table th {
    border: 1px solid black;
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
    border: 1px solid black;
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
 </head>
 <body style="background-image: url('<?php echo base_url() ?>assets/assets_shop/img/kocak.png');background-size: 800px 1132px; background-repeat: no-repeat; background-position: center; background-opacity: 0.5;">

  <div id="page-wrap" >
   <div id="header">INVOICE</div>
   <div id="identity">
   <img src="<?php echo base_url() ?>assets/assets_shop/img/Transsaba-official.png" style="object-fit:contain;
              width:120px;
              height:120px;
              ">
   
    <div id="logo">
  <textarea id="address" readonly=True style="text-align:right;"> Jl. Dandang Gendis, RT.17/RW.5, Teguhan, Kec. Jiwan, Kabupaten Madiun, Jawa Timur 63161 
    +62 812 3187 5657 
    TranssabaOfficial@gmail</textarea>
     
     
    </div>
   </div>
   <div style="clear:both"></div>
   <div id="customer">
  <h3 style="color:#fab702">Data Pelanggan</h3><hr style="background-color:blue; width:200px; height: 2px;">
  <h4 class="mt-4" style="text-transform: capitalize;"><?php echo $tr->nama ?>(<?php echo $tr->no_telp ?>)</h4>
  <p class="mt-4" style="text-transform: capitalize; width :400px;"><?php echo $tr->alamat ?></p>
    <table id="meta">
     <tr>
      <td class="meta-head">Invoice #</td>
      <td><textarea>INV/TSB/<?php echo $tr->id_rental ?>/<?php echo date("Y") ?></textarea></td>
     </tr>
     <tr>

      <td class="meta-head">Date</td>
      <td><textarea id="date"><?php $tanggal = date('Y-m-d', strtotime($tr->tanggal_rental)); echo tanggal_indo($tanggal, true) ?></textarea></td>
     </tr>
     <tr>
      <td class="meta-head">Total Tagihan</td>
      <td><div class="due">Rp.<?php echo number_format($tr->harga * $jmlHari,0,',','.') ?></div></td>
     </tr>

    </table>
   </div>
   <table id="items">

    <tr>
     <th>Nama Unit</th>
     <th>Tanggal Sewa</th>
     <th>Tanggal Selesai</th>
     <th>Biaya / Hari</th>
     <th>Lama</th>
    </tr>



    <tr class="item-row" style="text-align:center;">
     <td class="description"><span><?php echo $tr->Nama_unit ?></textarea><a class="delete" href="javascript:;" title="Remove row"></a></td>

     <td class="description"><span><?php $tanggal = date('Y-m-d', strtotime($tr->tanggal_rental)); echo tanggal_indo($tanggal, true) ?></span></td>
     <td class="description"><span class="cost"><?php $tanggal = date('Y-m-d', strtotime($tr->tanggal_kembali)); echo tanggal_indo($tanggal, true) ?></span></td>
     <td class="description"><span class="qty">Rp.<?php echo number_format($tr->harga) ?>   <?php 
      $y = strtotime($tr->tanggal_rental);
      $x = strtotime($tr->tanggal_kembali);
      $jmlHari = abs(($x - $y)/(60*60*24));
     ?></span></td>
     <td><span class="price"><?php echo  $jmlHari ?> Hari</span></td>
    </tr>

    <!-- <tr class="item-row">
     <td class="item-name"><textarea>Car rental Application</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></td>

     <td class="description"><textarea>Car rental and rental application that is very useful hehehe ...</textarea></td>
     <td><textarea class="cost">$200.00</textarea></td>
     <td><textarea class="qty">3</textarea></td>
     <td><span class="price">$600.00</span></td>
    </tr>

    <tr class="item-row">
     <td class="item-name"><textarea>AI application building layout plan</textarea><a class="delete" href="javascript:;" title="Remove row"></a></td>

     <td class="description"><textarea>AI application for building arrangement is very useful hehehe .....</textarea></td>
     <td><textarea class="cost">$100.00</textarea></td>
     <td><textarea class="qty">1</textarea></td>
     <td><span class="price">$100.00</span></td>
    </tr>       -->

    <tr id="hiderow">
     <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
    </tr>

    <!-- <tr>
     <td colspan="2" class="blank"> </td>
     <td colspan="2" class="total-line">Subtotal</td>
     <td class="total-value"><div id="subtotal">$1700.00</div></td>
    </tr>
    <tr>

     <td colspan="2" class="blank"> </td>
     <td colspan="2" class="total-line">Total</td>
     <td class="total-value"><div id="total">$1700.00</div></td>
    </tr>
    <tr>
     <td colspan="2" class="blank"> </td>
     <td colspan="2" class="total-line">Amount Paid</td>

     <td class="total-value"><textarea id="paid">$100.00</textarea></td>
    </tr>
    <tr>
     <td colspan="2" class="blank"> </td>
     <td colspan="2" class="total-line balance">Balance Due</td>
     <td class="total-value balance"><div class="due">$1600.00</div></td>
    </tr> -->
   </table> <center>
   <h2 style="margin-top:50px;">Syarat & Ketentuan</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p style="margin-bottom:10px;">Syarat dan ketentuan sewa unit PO.TRANS SABA</p>
   </center>
   <ol class="ml-5" style="margin-bottom:10px;">
                            <li>Harga tidak termasuk biaya tiket masuk Obyek Wisata, Tol, Parkir, Restribusi, Penyeberangan Ferry dan Tips Crew Bus</li>
  <li>Batas waktu pemakaian dalam kota sampai dengan jam 20.00 WIB, apabila melebihi waktu akan kenakan biaya tambahan</li>
  <li>Batas waktu pemakaian luar kota sampai dengan jam 23.00 WIB, apabila melebihi jam 24.00 WIB akan kenakan biaya tambahan sesuai kententuan dan akan disesuaikan dengan kondisi perjalanan</li>
  <li>Pemesanan dianggap sah apabila sudah ada pembayaran uang muka sebesar 25% dari harga sewa dan pelunasan 7 hari sebelum keberangkatan</li>
  <li>Pembatalan 3 hari sebelum keberangkatan total pembayaran tidak dapat di kembalikan</li>
  <li>Pembatalan 3 hari sebelum keberangkatan, uang muka pembayaran tidak dapat di kembalikan (hangus)</li>

</ol>

   <div style="margin-top:200px; text-align:center;" >
    <h3>P0.TRANS SABA</h3><hr>
    <h4>The Best Tour Solutions</h4>
   </div>
  </div>
 </body>
 </html>
 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
 <script  src="js/index.js"></script>
</body>
</html>