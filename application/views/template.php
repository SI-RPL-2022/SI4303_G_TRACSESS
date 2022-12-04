<!DOCTYPE html>
<html>
  <?php if(isset($error)){print $error;}?>
<head>
  <title>TRACSESS || FOR  YOUR BETTER EXPERIENCE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="<?= base_url() . "assets/" ?>css/materialize.css">
  <link rel="stylesheet" href="<?= base_url() . "assets/" ?>css/style.css">
  <link rel="shortcut icon" type="image/jpg" href="<?= base_url() . "assets/" ?>images/logo.png"/>
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->
</head>

<body>
  <header>
    <nav class="nav-material grey lighten-5">
      <div class="nav-wrapper">
        <a style="padding-left: 20px;padding-top: 3px" href="<?= site_url() ?>" class="brand-logo">
          <img class="img-brand" src="<?= base_url() . "assets/" ?>images/logo.png" style="width:70px">
        </a>
        <a href="#" data-activates="mobile-demo" class="button-collapse blue-text"><i class="material-icons">menu</i></a>

        <ul class="right hide-on-med-and-down" style="">
          <li>

          </li>
          <!--       <li><a class="light" href="badges.html">Tiket Pesawat</a>

      </li>
      <li><a class="light" href="collapsible.html">Tiket Keret Api</a>

      </li> -->
          <li>
            <?php if ($this->session->userdata('auth_user')) {
              $info = $this->m_general->gDataW('costumer', array('id_costumer' => $this->session->userdata('auth_user')))->row();
            ?>
              <a class='light dropdown-button grey lighten-5 black-text' href='#' data-activates='dropdown1' style="width:250px;text-align:right;">
                <i class="material-icons inline-text"> </i> <?= $info->full_name ?></a>
              <ul id='dropdown1' class='dropdown-content'>
                <li><a href="<?= site_url('user/foodmenu') ?>"><i class="material-icons">restaurant</i>Meals On Train</a></li>
                <li><a href="<?= site_url('user/schedule') ?>"><i class="material-icons">schedule</i>Data Kedatangan</a></li>
                <li><a href="<?= site_url('user/schedulereverse') ?>"><i class="material-icons">schedule</i>Data Keberangkatan</a></li>
                <li><a href="<?= site_url('user/profile') ?>"><i class="material-icons">settings</i>Profilku</a></li>
                <li><a href="<?= site_url('user/order') ?>"><i class="material-icons">shopping_cart</i> Pesanan</a></li>
                <li><a href="<?= site_url('auth/logout') ?>"><i class="material-icons">power_settings_new</i> Keluar</a></li>
              </ul>
            <?php } else {
            ?>
              <a class='light dropdown-button grey lighten-5 black-text' href='#' data-activates='dropdown1' style="width:150px ">
                <i class="material-icons inline-text">account_circle</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MENU</a>
              <ul id='dropdown1' class='dropdown-content' style="margin-top:60px;">
                <li><a href="<?= site_url('account/register') ?>"><i class="material-icons">person_add</i> Daftar</a></li>
                <li><a href="<?= site_url('account/login') ?>"><i class="material-icons">persons</i> Masuk</a></li>
		<li><a href="<?= site_url('account/loginWQRgktuh') ?>"><i class="material-icons">persons</i> QR Code</a></li>              
</ul>
            <?php
            } ?>
          </li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="sass.html"> Beranda</a>

          </li>
          <li><a href="badges.html">Tiket Pesawat</a>

          </li>
          <li><a href="collapsible.html">Tiket Keret Api</a>

          </li>
          <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
              <li>
                <?php if ($this->session->userdata('auth_user')) {
                  $info = $this->m_general->gDataW('costumer', array('id_costumer' => $this->session->userdata('auth_user')))->row();
                ?>
                  <a class="collapsible-header"><?= $info->full_name ?><i class="material-icons">arrow_drop_down</i></a>
                  <div class="collapsible-body">
                    <ul>
                      <li><a href="<?= site_url('user/profile') ?>">Profilku</a></li>
                      <li><a href="<?= site_url('user/order') ?>">Pesanan</a></li>
                      <li><a href="<?= site_url('auth/logout') ?>">Keluar</a></li>
                    </ul>
                  </div>
                <?php } else { ?>
                  <a class="collapsible-header">Akun Saya<i class="material-icons">arrow_drop_down</i></a>
                  <div class="collapsible-body">
                    <ul>
                      <li><a href="<?= site_url('account/register') ?>">Daftar</a></li>
                      <li><a href="<?= site_url('account/register') ?>">Masuk</a></li>
                    </ul>
                  </div>
                <?php } ?>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <?php $this->load->view($content) ?>

  <footer class="page-footer blue">

    <div class="container">
      <div class="row">
        <div class="col l4 s12">
          <h5 class="white-text">
            <img src="<?= base_url('assets/images/logo-text-white.png') ?>" style="width:170px">
          </h5>
          <p class="grey-text text-lighten-4">
            Booking Online Tiket Kereta Api</p>
            <h5 class="white-text" style="margin-top:100px;">Metode Pembayaran </h5>
              <span style="font-family: Verdana,Arial,Helvetica,sans-serif; font-size: x-small;">          </span><br />
<div align="left">
<span style="font-family: Verdana,Arial,Helvetica,sans-serif; font-size: x-small;">
<img height="48" src="http://2.bp.blogspot.com/-_mCEuNk_z48/TV2uQZrISmI/AAAAAAAABHo/0AdOcn9_b_M/s1600/logo-bca.png" width="100" /></span>

<span style="font-family: Verdana,Arial,Helvetica,sans-serif; font-size: x-small;">
<img height="48" src="http://4.bp.blogspot.com/-0hM1YfniJpM/TV2uS-MJTRI/AAAAAAAABHs/GEgCEBzWIg4/s1600/logo-bni.png" width="100" /></span>

<span style="font-family: Verdana,Arial,Helvetica,sans-serif; font-size: x-small;">
<img height="48" src="http://1.bp.blogspot.com/-6YE8x_ZkcT0/TV2uUwl1YiI/AAAAAAAABHw/0Xyj00OHeWA/s1600/logo-bri.png" width="100" /></span>

<span style="font-family: Verdana,Arial,Helvetica,sans-serif; font-size: x-small;">
<img height="48" src="http://2.bp.blogspot.com/-txNPDQ1PbMM/TV2ubcYocmI/AAAAAAAABH8/vQ2ozBC2qxA/s1600/logo-atmbersama.png" width="100" /></span>


<span style="font-family: Verdana,Arial,Helvetica,sans-serif; font-size: x-small;">
<img height="48" src="https://upload.wikimedia.org/wikipedia/commons/9/9d/Logo_Indomaret.png" width="100" /></span>

<span style="font-family: Verdana,Arial,Helvetica,sans-serif; font-size: x-small;">
<img height="48" src="https://upload.wikimedia.org/wikipedia/commons/9/9e/ALFAMART_LOGO_BARU.png" width="100" /></span>
</div>


        </div>
                      <div class="col l6 offset-l2 s12">


                <h5 class="white-text">Kantor Pusat</h5>
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d365.448283084319!2d107.6276478322157!3d-6.969373192175843!2m3!1f352.4999999999998!2f0!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x0%3A0x613eec0feec9fcf7!2sTelkom%20University%20Landmark%20Tower%20(TULT)!5e1!3m2!1sid!2sid!4v1648479558076!5m2!1sid!2sid" width="350" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                <p class="grey-text text-lighten-3"><i class="fas fa-map-marker-alt">Jl. Telekomunikasi No.1, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40267</i></p>
                <!-- <ul>
                  <li><a class="grey-text text-lighten-3" href="#!"></a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul> -->
                <h5 class="white-text">Kantor Operasional</h5>
                <p class="grey-text text-lighten-3"><i class="fas fa-map-marker-alt">Jl. Telekomunikasi Terusan Buah Batu, Dayeuhkolot, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257</i></p>
                <a href="tel:(022) 7566456" class="white-text">No Telp : (022) 7566456</a><br>
                <a href="tel:(022) 7566456" class="white-text">E-Mail : Tracsess.Official@Mail.com</a>
              </div>
      </div>

    </div>
<svg class="custom-section-curved-top-7" width="100%" height="300">
                    <path id="svg_2" fill="#ffff "d="M 3 64 C 882 -180 1588 485 2804 -4 V 411 H 3"></path>
                </svg>
      <div class="footer-copyright blue lighten-2">
        <div class="container">
          <span>Copyright &copy; 2022 <a class="black-text text-lighten-4" href="<?= base_url() ?>" target="_blank">TRACSESS</a> All rights reserved.</span>
          <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="<?= site_url('Credit') ?>">Kelompok G RPL</a></span>
        </div>
      </div>
  </footer>



  <!-- Compiled and minified JavaScript -->
  <script src="<?= base_url() . "assets/" ?>js/jquery.js"></script>
  <script src="<?= base_url() . "assets/" ?>js/materialize.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('.modal-show').modal();
      $('input.autocomplete').autocomplete({
        data: {
          "Apple": "Apple",
          "Microsoft": null,
          "Google": 'https://placehold.it/250x250'
        },
        limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
        onAutocomplete: function(val) {

        },
        minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
      });
      $(".button-collapse").sideNav();
      $('.carousel.carousel-slider').carousel({
        fullWidth: true
      });
      // $('.select2').select2();
      $('select').material_select();

      $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: false, // Close upon selecting a date,
        format: 'yyyy-mm-dd'
      });

      $('.datepicker').on('mousedown', function(event) {
        event.preventDefault();
      })

      $('ul.tabs').tabs();
      $("#goPayment").click(function() {
        $('ul.tabs').tabs('select_tab', 'payment');
      });
    });
  </script>
  <script type="text/javascript">
    function cekTP() {
      var asal = $('#p_asal').val();
      var tujuan = $('#p_tujuan').val();
      if (asal == tujuan) {
        $('#p_asal').val('');
        $('#p_tujuan').val('');
        $('#p_asal').material_select();
        $('#p_tujuan').material_select();
      }
    }

    function cekTGLP() {
      var berangkat = $('#p_b').val();
      var pulang = $('#p_p').val();
      if (pulang !== '') {
        if (pulang < berangkat) {
          $('#p_p').val(berangkat);
        }
      }
    }

    function cekTK() {
      var asal = $('#k_asal').val();
      var tujuan = $('#k_tujuan').val();
      if (asal == tujuan) {
        $('#k_asal').val('');
        $('#k_tujuan').val('');
        $('#k_asal').material_select();
        $('#k_tujuan').material_select();
      }
    }

    function cekTGLK() {
      var berangkat = $('#k_b').val();
      var pulang = $('#k_p').val();
      if (pulang !== '') {
        if (pulang < berangkat) {
          $('#k_p').val(berangkat);
        }
      }
    }
    $("#login").click(function() {
      var formData = new FormData($('#loginForm')[0]);
      $.ajax({
        url: "<?= site_url('auth/login') ?>",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          $("input").removeAttr("disabled", "disabled");
          if (data.result) {
            $('#message').html('<div class="alert green">' + data.content + '</div>');
            window.location.replace('<?= base_url() ?>');
          } else {
            $('#message').html('<div class="alert red">' + data.content + '</div>');

          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
          $("input").removeAttr("disabled", "disabled");
          $('#message').html('<div class="alert red">Terjadi kesalahan</div>');

        },
        beforeSend: function() {
          $("input").attr("disabled", "disabled");
          $("#message").html('<div class="progress blue lighten-4"><div class="indeterminate blue"></div> </div>');
        }
      });
      return false;
    });
    $("#register").click(function() {
      var formData = new FormData($('#registerForm')[0]);
      $.ajax({
        url: "<?= site_url('auth/register') ?>",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          $("input").removeAttr("disabled", "disabled");
          if (data.result) {
            $('#message').html('<div class="alert green">' + data.content + '</div>');
            window.location.replace('<?= base_url() ?>');
          } else {
            $('#message').html('<div class="alert red">' + data.content + '</div>');

          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
          $("input").removeAttr("disabled", "disabled");
          $('#message').html('<div class="alert red">Terjadi kesalahan</div>');

        },
        beforeSend: function() {
          $("input").attr("disabled", "disabled");
          $("#message").html('<div class="progress blue lighten-4"><div class="indeterminate blue"></div> </div>');
        }
      });
      return false;
    });
  </script>
  <script type="text/javascript">
    $('.timepicker').pickatime({
      default: 'now',
      twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
      donetext: 'OK',
      autoclose: false,
      vibrate: true // vibrate the device when dragging clock hand
    });

    $('.timepicker').on('mousedown', function(event) {
      event.preventDefault();
    })
  </script>
  <script type="text/javascript">
    function addCart(id_rute, jumlah) {
      $.post('<?= base_url('order/cart') ?>', {
        id_rute: id_rute,
        jumlah: jumlah
      }, function(data) {
        $('.pilih').addClass('disabled');
        $('#b' + id_rute).attr('onclick', 'delCart(' + id_rute + ',' + jumlah + ')');
        $('#b' + id_rute).html('BATAL');
        $('#b' + id_rute).removeClass('disabled');
        $('#btnPesan').addClass('slideInDown');
        $('#orderBtn').show();
        $.post('<?= base_url('order/tabelconfirm') ?>', {
          id_rute: id_rute
        }, function(tabel) {
          $('#tblorder').html(tabel);
        });
      });
    }

    function delCart(id_rute, jumlah) {
      $.post('<?= base_url('order/dCart') ?>', {
        id_rute: id_rute,
        jumlah: jumlah
      }, function(data) {
        $('.pilih').removeClass('disabled');
        $('#b' + id_rute).attr('onclick', 'addCart(' + id_rute + ',' + jumlah + ')');
        $('#b' + id_rute).html('PILIH');
        // $('#btnPesan').removeClass('slideInDown');
        // $('#btnPesan').addClass('slideOutDown');
        $('#orderBtn').hide(500);
        $.post('<?= base_url('order/tabelconfirm') ?>', {
          id_rute: id_rute
        }, function(tabel) {
          $('#tblorder').html(tabel);
        });
      });
    }

    function addCartB(id_rute, jumlah) {
      $.post('<?= base_url('order/cart') ?>', {
        id_rute: id_rute,
        jumlah: jumlah
      }, function(data) {
        $('.pilih_b').addClass('disabled');
        $('#b' + id_rute).attr('onclick', 'delCartB(' + id_rute + ',' + jumlah + ')');
        $('#b' + id_rute).html('BATAL');
        $('#b' + id_rute).removeClass('disabled');
        $.post('<?= base_url('order/cekPP') ?>', {
          id_rute: id_rute
        }, function(data) {
          if (data == 1) {
            $.post('<?= base_url('order/tabelconfirm') ?>', {
              id_rute: id_rute
            }, function(tabel) {
              $('#tblorder').html(tabel);
            });
            $('#btnPesan').addClass('slideInDown');
            $('#orderBtn').show();
          } else {
            $('#orderBtn').hide(500);
          }
        });
      });
    }

    function delCartB(id_rute, jumlah) {
      // $('#btnPesan').removeClass('slideInDown');
      // $('#btnPesan').addClass('slideOutDown');
      $.post('<?= base_url('order/dCart') ?>', {
        id_rute: id_rute,
        jumlah: jumlah
      }, function(data) {
        $('.pilih_b').removeClass('disabled');
        $('#b' + id_rute).attr('onclick', 'addCartB(' + id_rute + ',' + jumlah + ')');
        $('#b' + id_rute).html('PILIH');
        $.post('<?= base_url('order/cekPP') ?>', {
          id_rute: id_rute
        }, function(data) {
          if (data == 1) {
            $.post('<?= base_url('order/tabelconfirm') ?>', {
              id_rute: id_rute
            }, function(tabel) {
              $('#tblorder').html(tabel);
            });
            $('#btnPesan').addClass('slideInDown');
            $('#orderBtn').show();
          } else {
            $('#orderBtn').hide(500);
          }
        });
      });
    }

    function addCartP(id_rute, jumlah) {
      $.post('<?= base_url('order/cart') ?>', {
        id_rute: id_rute,
        jumlah: jumlah
      }, function(data) {
        $('.pilih_p').addClass('disabled');
        $('#p' + id_rute).attr('onclick', 'delCartP(' + id_rute + ',' + jumlah + ')');
        $('#p' + id_rute).html('BATAL');
        $('#p' + id_rute).removeClass('disabled');
        $.post('<?= base_url('order/cekPP') ?>', {
          id_rute: id_rute
        }, function(data) {

          if (data == 1) {
            $.post('<?= base_url('order/tabelconfirm') ?>', {
              id_rute: id_rute
            }, function(tabel) {
              $('#tblorder').html(tabel);
            });
            $('#btnPesan').addClass('slideInDown');
            $('#orderBtn').show();
          } else {
            $('#orderBtn').hide(500);
          }
        });
      });
    }

    function delCartP(id_rute, jumlah) {
      // $('#btnPesan').removeClass('slideInDown');
      // $('#btnPesan').addClass('slideOutDown');
      $.post('<?= base_url('order/dCart') ?>', {
        id_rute: id_rute,
        jumlah: jumlah
      }, function(data) {
        $('.pilih_p').removeClass('disabled');
        $('#p' + id_rute).attr('onclick', 'addCartP(' + id_rute + ',' + jumlah + ')');
        $('#p' + id_rute).html('PILIH');
        $.post('<?= base_url('order/cekPP') ?>', {
          id_rute: id_rute
        }, function(data) {

          if (data == 1) {
            $.post('<?= base_url('order/tabelconfirm') ?>', {
              id_rute: id_rute
            }, function(tabel) {
              $('#tblorder').html(tabel);
            });
            $('#btnPesan').addClass('slideInDown');
            $('#orderBtn').show();
          } else {
            $('#orderBtn').hide(500);
          }
        });
      });
    }

    $("#transfer").css('display', 'none');
    $("#trpay").css('display', 'none');
    $("#kartu").css('display', 'none');
    $("input[name=method]").change(function() {
      if ($("input[name=method]:checked").val() == '1') {
        $("#kartu").css('display', 'none');
        $("#transfer").css('display', 'block');
        $("#trpay").css('display', 'none');
      } else if ($("input[name=method]:checked").val() == '2') {
        $("#transfer").css('display', 'none');
        $("#kartu").css('display', 'block');
        $("#trpay").css('display', 'none');
      } else if ($("input[name=method]:checked").val() == '3') {
        $("#transfer").css('display', 'none');
        $("#kartu").css('display', 'none');
        $("#trpay").css('display', 'block');
      }else {
        $("#transfer").css('display', 'none');
        $("#kartu").css('display', 'none');
        $("#trpay").css('display', 'none');
      }
    });





    function cekCode(harga) {
      var code = $('#kode').val();
      var total;
      $.ajax({
        url: "<?= site_url('order/check_code/') ?>/" + code + "/" + harga,
        type: "GET",
        dataType: 'json',
        success: function(data) {
          if (data.result) {
            $('#msg').html('<div class="alert green">Selamat! anda mendapatkan diskon</div>');
            $('#kode').attr('readonly', 'readonly');
            $('.total').html(data.total);
            $('#code').html('Kode Promo : ' + data.code);
            $('#min').html('- ' + data.min);
            $('#promo-t').show();

          } else {
            $('#msg').html('<div class="alert red">Kode Promo Salah</div>');
          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error adding / update data');

        }
      });
    };

    $("#pay").click(function() {
      var formData = new FormData($('#orderForm')[0]);
      $.ajax({
        url: "<?= site_url('order/pay') ?>",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'JSON',
        success: function(data) {
          if (data.result) {
            window.location.replace('<?= base_url('order/complete') ?>/' + data.id_order);
          } else {
            alert('Pesanan Anda Berhasil');
            window.location.replace('<?= base_url('user/order') ?>');
             // window.location.replace('<?= base_url('order/complete') ?>/' + data.id_order);
          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Pesanan Anda Berhasil');
            window.location.replace('<?= base_url('user/order') ?>');
          // alert('HEHE');
           // window.location.replace('<?= base_url('order/complete') ?>/' + data.id_order);

        },
        beforeSend: function() {
          $("#menu").hide();
          $("#progress").show();
        }
      });
      return false;
    });
  </script>
</body>

</html>