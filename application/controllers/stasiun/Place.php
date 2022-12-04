<?php
class Place extends CI_Controller{
	 public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('auth_admin');
        if(!$user){
            redirect('stasiun/login');
        }
    }
    public $table='train_movement'; 
    public $table2='user';
    public $table3='v_rute';
    public $page='place'; 
    public $primary_key='id_train_movement'; 
    public $primary_key2='id_user';
    public $primary_key3='transportation_code'; 
    public $primary_key4='id_rute';
    public $msgkuloh='';
    public $idrutenyaitu ;
    public function index($action='',$id=''){
        
        $cek = $this->m_general->StasiunInfo($this->session->userdata('auth_admin'));
        $id_user = $cek->id_user;
        $getValue = $this->m_general->gDataW($this->table2,array($this->primary_key2=>$id_user))->row();
        $data['lokasiku'] = $getValue->address;
        $data['title'] = 'Lokasi Kereta';
        $data['content'] = 'stasiun/crud_basic';
        $data['tableTitle'] = array('Kode Kereta','Nama Kereta','Asal Kota','Kota Tujuan','Waktu Setempat','Lokasi Terkini');
        $data['tableField'] = array('transportation_code','transportation_name','kota_asal','kota_tujuan','Time','address');
        $data['inputType'] = array(
                                array('type'=>'text','label'=>'','name'=>'address','readonly'=> 'true' ),
                                // array('type'=>'text','label'=>'Kode','name'=>'place_code'),
                                // array('type'=>'text','label'=>'Nama','name'=>'Time','value'=> '829298'),
                                // array('type'=>'select','label'=>'Tipe','name'=>'id_transportation_type'
                                //     ,'option'=>array('data'=>'database','table'=>'transportation_type','label'=>'transportation_type_name','value'=>'id_transportation_type'),'onchange'=>'','id'=>'id_transportation_type'),
                                // array('type'=>'select','label'=>'Kota','name'=>'id_city'
                                //     ,'option'=>array('data'=>'database','table'=>'city','label'=>'city_name','value'=>'id_city'),'onchange'=>'','id'=>''),
                            ); 
        $data['data'] = $this->m_admin->gLoc();
        if($action=='edit'&&$id!==''){
           $no=0;
           $cek = $this->m_general->StasiunInfo($this->session->userdata('auth_admin'));
           $id_user = $cek->id_user;
           $getValue = $this->m_general->gDataW($this->table2,array($this->primary_key2=>$id_user))->row();
           foreach($data['inputType'] as $z){
               $name = $z['name'];
                $data['inputType'][$no]['value'] = $getValue->$name;
                $no++;
           }
           $data['aidi'] = $id;
        }
        $data['action'] = $action;
        $data['page'] = $this->page;
        $data['primary_key'] = $this->primary_key;
        $this->load->view('stasiun/template',$data);
    }
    public function p($action,$id=''){
        if($action=='insert'){
            $required = array('place_name','id_transportation_type','id_city','place_code');
            foreach($required as $f){
                if(empty($_POST[$f])){
                    $this->session->set_flashdata('pesan','<div class="alert red">Masih ada data yang kosong</div>');
                    redirect('stasiun/'.$this->page.'/index/add');
                }
            }
            $data = $_POST;
            $this->m_general->iData($this->table,$data);
            $msg = 'Data berhasil ditambahkan';
        }elseif($action=='update'){
            $data = $_POST;
            $this->m_general->uData($this->table,$data,array($this->primary_key=>$id));
            $this->m_general->uData($this->table,array('Time'=>date('H:i:s')),array($this->primary_key=>$id));
            $msg = 'Data berhasil diubah';
        }elseif($action=='delete'){
            $this->m_general->dData($this->table,array($this->primary_key=>$id));
            $msg = 'Data berhasil dihapus';
        }else{
            $msg = '';
        }
        $this->session->set_flashdata('pesan','<div class="alert green">'.$msg.'</div>');
        redirect('stasiun/'.$this->page.'');
    }
    public function backup(){
        $this->m_admin->eDB($this->table);
    }

    public function export(){
        $this->m_admin->eCSV($this->table);
    }
    public function truncate(){
        $this->m_admin->emDB($this->table);
        $this->session->set_flashdata('pesan','<div class="alert green">Data berhasil dikosongkan</div>');
        redirect('stasiun/'.$this->page.'');
    }

    public function updatemasinis(){
 
        $data['title'] = 'Beranda';
        $data['content'] = 'updatelokasi';
        $cek = $this->m_general->StasiunInfo($this->session->userdata('auth_admin'));
        $id_user = $cek->id_user;
        $getValue = $this->m_general->gDataW($this->table2,array($this->primary_key2=>$id_user))->row();
        $data['lokasiku'] = $getValue->address;
        $data['info1'] = 'PT Kereta Api Indonesia';
        $data['info2'] = 'updatelokasi';
        $data['info3'] = $this->session->flashdata('inipesannya');
        // $data['pp'] = $this->m_general->gDataW('transportation_company',array('id_transportation_type'=>1))->result();
        // $data['pk'] = $this->m_general->gDataW('transportation_company',array('id_transportation_type'=>2))->result();
        // $data['kp'] = $this->m_general->gDataW('transportation_class',array('id_transportation_type'=>1))->result();
        // $data['kk'] = $this->m_general->gDataW('transportation_class',array('id_transportation_type'=>2))->result();
        // $data['plp'] = $this->m_general->gPlaceW(array('place.id_transportation_type'=>1))->result();
        // $data['plk'] = $this->m_general->gPlaceW(array('place.id_transportation_type'=>2))->result();
        $this->load->view('template',$data);

    }

    public function autoqr(){

        $data['title'] = 'Beranda';
        $data['content'] = 'updatelokasi';
        $cek = $this->m_general->StasiunInfo($this->session->userdata('auth_admin'));
        $id_user = $cek->id_user;
        $getValue = $this->m_general->gDataW($this->table2,array($this->primary_key2=>$id_user))->row();
        $data['lokasiku'] = $getValue->address;
        $data['info1'] = 'PT Kereta Api Indonesia';
        $data['info2'] = 'updatelokasi';
        // $this->msgkuloh = $getValue->address;
        // $Trans_code = 'KA 783';
        // $cariIdRute = $this->m_general->gDataW($this->table2,array($this->primary_key3=>$Trans_code))->row();
        $IDRute = $_POST['email'];
        $Tipe = $_POST['password'];
        // $id = $_POST['email'];
        // $data = $_POST;
        // $this->m_general->uData($this->table,$data,array($this->primary_key4=>$IDRute));
        $this->m_general->uData($this->table,array('Time'=>date('H:i:s'),'address'=>$getValue->address,'comment'=>$Tipe),array($this->primary_key4=>$IDRute));
        $msg = 'Data berhasil diubah';
        $getDetail = $this->m_general->gDataW($this->table3,array($this->primary_key4=>$IDRute))->row();
        if ($Tipe == 'Tiba') {
            $this->session->set_flashdata('inipesannya','   <center><h3>S&nbsp;E&nbsp;L&nbsp;A&nbsp;M&nbsp;A&nbsp;T&nbsp;&nbsp;&nbsp; D&nbsp;A&nbsp;T&nbsp;A&nbsp;N&nbsp;G</h3>
    <h4 style="margin-bottom: 30px;">'.$getDetail->transportation_code.' | '.$getDetail->transportation_name.

    '</h4><table class="detail" style="width:30%">
                    <tbody>
                      <tr>

                          <td style="text-align:center">
                            <span class="t">'.$getDetail->kota_asal.' ('.$getDetail->kode_asal_asal.')</span>
                            <p style="text-align:center">'.$getDetail->tempat_asal.'</p>
                          </td>
                          <td style="text-align:center">

                            <i class="material-icons inline-text blue-text">arrow_forward</i><br>
                    

                          </td>
                          <td style="text-align:center">
                            <span class="t">'.$getDetail->kota_tujuan.' ('.$getDetail->kode_asal_tempat.')</span>
                            <p style="text-align:center">'.$getDetail->tempat_tujuan.'</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
  </center>');
        }elseif ($Tipe == 'Berangkat') {
            $this->session->set_flashdata('inipesannya','   <center><h3>S&nbsp;E&nbsp;L&nbsp;A&nbsp;M&nbsp;A&nbsp;T&nbsp;&nbsp;&nbsp; J&nbsp;A&nbsp;L&nbsp;A&nbsp;N</h3>
    <h4 style="margin-bottom: 30px;">'.$getDetail->transportation_code.' | '.$getDetail->transportation_name.

    '</h4><table class="detail" style="width:30%">
                    <tbody>
                      <tr>

                          <td style="text-align:center">
                            <span class="t">'.$getDetail->kota_asal.' ('.$getDetail->kode_asal_asal.')</span>
                            <p style="text-align:center">'.$getDetail->tempat_asal.'</p>
                          </td>
                          <td style="text-align:center">

                            <i class="material-icons inline-text blue-text">arrow_forward</i><br>
                    

                          </td>
                          <td style="text-align:center">
                            <span class="t">'.$getDetail->kota_tujuan.' ('.$getDetail->kode_asal_tempat.')</span>
                            <p style="text-align:center">'.$getDetail->tempat_tujuan.'</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
  </center>');
        }


        
        // $this->session->set_flashdata('dimana',$getDetail->transportation_code);
        // $this->session->set_flashdata('dimana',$getDetail->transportation_name);
        // $this->session->set_flashdata('dimana',$getDetail->kode_asal_asal);
        // $this->session->set_flashdata('dimana',$getDetail->kota_asal);
        // $this->session->set_flashdata('dimana',$getDetail->kode_asal_asal);
        // $this->session->set_flashdata('dimana',$getDetail->kota_asal);


       
        // $ticket_code = $_POST['email'];
        // $data = $this->m_general->gDataW('v_order',array('ticket_code'=> $ticket_code))->row();
        // $id = $data->id_order;
        // $this->m_general->uData('order',array('check_in'=>'CekIn'),array('id_order'=>$id));
        // $msg = 'Pesanan #'.$data->id_order.' atas nama '.$data->buyer_name.' berhasil cek in';

        $this->session->set_flashdata('dimana',$getValue->address);
        $res = json_encode(array('result' => 1, 'content' => 'Login berhasil, mengalihkan ...'));
        $this->output->set_content_type('application/json')->set_output($res);

    }
}