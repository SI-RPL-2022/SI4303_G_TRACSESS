<main>
<style type="text/css">
body {
  background-image: linear-gradient(135deg, #FAB2FF 10%, #1904E5 100%);
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  font-family: "Open Sans", sans-serif;
  color: #333333;
}

.box-form {
  margin: 0 auto;
  margin-top: 100px;
  margin-bottom: 100px;
  width: 80%;
  background: #FFFFFF;
  border-radius: 10px;
  overflow: hidden;
  display: flex;
  flex: 1 1 100%;
  align-items: stretch;
  justify-content: space-between;
  box-shadow: 0 0 20px 6px #090b6f85;
}
@media (max-width: 980px) {
  .box-form {
    flex-flow: wrap;
    text-align: center;
    align-content: center;
    align-items: center;
  }
}
.box-form div {
  height: auto;
}
.box-form .left {
  color: #FFFFFF;
  background-size: cover;
  background-repeat: no-repeat;
  background-image: url("https://fashionsista.co/wallpaper/wallpaper/20210203/pt-kereta-api-indonesia-persero-daop-2-bandung-preview.jpg");
  overflow: hidden;
}
.box-form .left .overlay {
  padding: 30px;
  width: 100%;
  height: 100%;
  background: #5961f9ad;
  overflow: hidden;
  box-sizing: border-box;
}
.box-form .left .overlay h1 {
  font-size: 10vmax;
  line-height: 1;
  font-weight: 900;
  margin-top: 40px;
  margin-bottom: 20px;
}
.box-form .left .overlay span p {
  margin-top: 30px;
  font-weight: 900;
}
.box-form .left .overlay span a {
  background: #3b5998;
  color: #FFFFFF;
  margin-top: 10px;
  padding: 14px 50px;
  border-radius: 100px;
  display: inline-block;
  box-shadow: 0 3px 6px 1px #042d4657;
}
.box-form .left .overlay span a:last-child {
  background: #1dcaff;
  margin-left: 30px;
}
.box-form .right {
  padding: 40px;
  overflow: hidden;
}
@media (max-width: 980px) {
  .box-form .right {
    width: 100%;
  }
}
.box-form .right h5 {
  font-size: 6vmax;
  line-height: 0;
}
.box-form .right p {
  font-size: 14px;
  color: #B0B3B9;
}
.box-form .right .inputs {
  overflow: hidden;
}
.box-form .right input {
  width: 80%;
  padding: 1px;
  margin-top: 1px;
  font-size: 16px;
  border: none;
  outline: none;
  border-bottom: 2px solid #B0B3B9;
}
.box-form .right .remember-me--forget-password {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.box-form .right .remember-me--forget-password input {
  margin: 0;
  margin-right: 7px;
  width: auto;
}
.box-form .right button {
  margin-top: 50px;
  margin-right: 120px;
  float: right;
  color: #fff;
  font-size: 16px;
  width:300px;
  height:50px;
  border-radius: 50px;
  display: inline-block;
  border: 0;
  outline: 0;
  box-shadow: 0px 4px 20px 0px #49c628a6;
  background-image: linear-gradient(135deg, #70F570 10%, #49C628 100%);
}

}
</style>


<!-- partial:index.partial.html -->
<div class="box-form">
  <div class="left">
    <div class="overlay">
    <img class="img-brand" src="<?= base_url() . "assets/" ?>images/logo-text-white.png" style="width:500px">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    Curabitur et est sed felis aliquet sollicitudin</p>
<!--     <span >
      <p style="margin-top:250px;">See Our Social Media</p>
      <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a>
      <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>Twitter</a>
      <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i>Instagram</a>
    </span> -->
    </div>
  </div>
  
  
    <div class="right">
    <h5 style="margin-top:75px; ">Login</h5>
    <p style="margin-top:75px; ">Ga Ada Akun kah? <a href="<?= site_url('account/register') ?>">Buat Sini Sudah !!</a>.Pembuatan akun memerlukan waktu kurang dari 5 menit</p>
    <div class="inputs">

    </div>
      <form id="loginForm">
                <div class="row">
                  <div id="message"></div>
                </div>
                <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">email</i>   
                    <input name="email" id="icon_prefix" type="text">
                    <label>Email</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" name="password">
                    <label>Kata Sandi</label>
                  </div>
                  <button type="submit" id="login" name="login" class="btn blue">Masuk</button>
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
<!-- partial -->
<!-- 
	<div class="page-content">
   <div class="container">
    <div class="row">
      <div class="col m6 s12 offset-l3 offset-m3">
       <div class="row">
        <div class="col s12 m12">
          <div class="card grey lighten-4">
          	<div class="title-card blue white-text">
          		Masuk Menggunakan Akun Anda
          	</div>
            <div class="card-content">
              <form id="loginForm">
                <div class="row">
                  <div id="message"></div>
                </div>
                <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">email</i>   
                    <input name="email" id="icon_prefix" type="text">
                    <label>Email</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" name="password">
                    <label>Kata Sandi</label>
                  </div>
                  <button type="submit" id="login" name="login" class="btn blue">Masuk</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
</div>
</div>
</main>
