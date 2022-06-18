<main>
	<div class="page-content">
   <div class="container">
    <div class="row">
      <div class="col m4">
        <?php $this->load->view('user/nav') ?>

      </div>
      <div class="col m8">
        <div class="card grey lighten-4">
          <div class="title-card grey lighten-4">Cek Jadwal</div>
          <div class="card-content white"> <div class="row">
            <?=$this->session->flashdata('pesan')?>
            <!-- <div class="card grey lighten-4">
              <div class="card-tabs">
                <ul class="tabs tabs-fixed-width tabs-transparent">
                  <li class="tab"><a class="blue-text" href="#profile">Kedatangan</a></li>
                  <li class="tab"><a class="blue-text" href="#password">Keberangkatan</a></li>
                </ul>
              </div> -->
            </div>
            <div class="container">
              <div id="profile" >

                   <?=$bas?>
                
                <div class="row">

<div class="row" style="margin-top: 10px; display:flex; ">
    <div class="col m1">
      <img title="" src="<?=base_url()."assets/"?>images/company_logo/kai.png" style="width:150px; margin-top:10px;">
    </div>

<div class="col m11" style="margin-left: 150px;">
<h5><B>JADWAL <?=$ket?> KERETA</B></h5>
<h5><B>Stasiun <?=$namastasiun?></B></h5>
    </div>
  </div>



                  <div class="input-field">
                    <input name="kondisi" id="icon_prefix" value="<?=$kondisiku?>" type="hidden">
                  </div>

  <div class="row" style="margin-top: 50px; text-align:center;justify-content:center;">
    <div class="col m6">
      <div class="input-field">
                  <!--  -->
<select class="form-control" name='Asal'>
      
             <?php 

            foreach($stasiun21 as $row)
            { 
              echo '<option value="'.$row->place_name.'">'.$row->place_name.'</option>';
            }
            ?>
            </select> 


                    <label>Stasiun</label>

    </div></div>

        <div class="col m6">

 <div class="input-field">
           
<select class="form-control"  name='Kelas'>

             <?php 

            foreach($kelasnya as $row)
            { 
              echo '<option value="'.$row->class_name.'">'.$row->class_name.'</option>';
            }
            ?>
            </select> 


                    <label>Kelas</label>
    </div></div>
</div>

                   
                 <!--  <div class="input-field">
                    <i class="material-icons prefix">home</i>   
                    <textarea name="address" class="materialize-textarea"><?=$info->address?></textarea>
                    <label>Alamat</label>
                  </div> -->
                  <button type="submit" class="btn blue"  style="float: right; margin-bottom:30px"><i class="material-icons inline-text">search</i> Cari Jadwal</button>
                  <?=form_close()?>

<table class="datatables responsive-table striped bordered" style="margin-top:50px">
            <thead class="blue">
              <tr class="white-text">
                <th class="light">No</th>
                <?php 
                foreach($tableTitle as $tt){
                  echo '<th class="light">'.$tt.'</th>';
                }
                ?>
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
               <!--  <td style="text-align: center">
                  <a href="<?=site_url('admin/'.$page.'/index/edit/'.$d->$primary_key.'')?>" class="btn waves-effect waves-light action green"><i class="material-icons">edit</i></a>
                  <a href="#deleteDialog<?=$d->$primary_key?>" class="btn waves-effect modal-trigger waves-light action modal-trigger red"><i class="material-icons">delete</i></a>
                </td>
                <div id="deleteDialog<?=$d->$primary_key?>" class="modal deletemodal">
                  <div class="modal-content blue white-text">
                    <p>Apakah anda yakin ingin menghapus data ini?</p>
                  </div>
                  <div class="modal-footer">
                    <a class="waves-effect waves-blue btn white blue-text modal-action modal-close">TIDAK</a>
                    <a href="<?=site_url('admin/'.$page.'/p/delete/'.$d->$primary_key.'')?>" class="waves-effect waves-light btn blue modal-action modal-close">YA</a>
                  </div>
                </div> -->
                <?php $no++; } ?>
              </tr>
            </tbody>
          </table>

                </div>
              </div>

              <div id="password" class="col s12">
              <!--   <?=form_open('user/p_password')?>
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
                  <?=form_close()?> -->
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

