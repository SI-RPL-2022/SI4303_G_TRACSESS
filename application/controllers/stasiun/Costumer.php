<?php
class Costumer extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$user = $this->session->userdata('auth_admin');
		if(!$user){
			redirect('stasiun/login');
		}
	}
	public $table='staff'; 
	public $table2='user';
	public $page='costumer'; 
	public $primary_key='Id_staff'; 
	public $primary_key2='id_user';
	public function index($action='',$id=''){
		$cek = $this->m_general->StasiunInfo($this->session->userdata('auth_admin'));
        $id_user = $cek->id_user;
        $getValue = $this->m_general->gDataW($this->table2,array($this->primary_key2=>$id_user))->row();
        $data['lokasiku'] = $getValue->address;
		$data['title'] = 'Akun Petugas';
		$data['content'] = 'stasiun/crud_custom';
		$data['tableTitle'] = array('Nama','Email','No. HP','Alamat');
		$data['tableField'] = array('Full_name','email','phone','address');
		$data['data'] = $this->m_general->gStaff();
		if($action=='edit'&&$id=='3'){
			$no=0;
			$getValue = $this->m_general->gDataW($this->table,array($this->primary_key=>$id))->row();
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
		if($action=='reset'){			
			$data = $this->m_general->gDataW('staff',array('Id_staff'=>$id))->row();
			$id_user = $data->id_user;
			$pass = substr(md5(rand(0,202020)),20);
			$password = md5($pass);
			$this->m_general->uData('user',array('password'=>$password),array('id_user'=>$id_user));
			$msg = 'User '.$data->email.' berhasil di reset kata sandi menjadi : '.$pass.'';
			
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
}