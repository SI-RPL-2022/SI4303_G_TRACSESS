<?php
class User extends CI_Controller{
	public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('auth_user');
        if(!$user){
        	$this->session->set_flashdata('pesan','<div class="alert red">Anda harus masuk dulu</div>');
            redirect('home');
        }
    }
    public $primary_key='id_place'; 
    public function foodmenu(){
    	$data['ket'] = 'KEDATANGAN';
    	$data['kondisiku'] = 'tempat_tujuan';
    	$data['stasiun21'] = $this->m_admin->gPlace();
    	$data['kelasnya'] = $this->m_admin->gTransportationC();
    	$data['tableTitle'] = array('Kode KA','Nama Kereta','Asal','Kedatangan','Keberangkatan');
    	$data['tableField'] = array('transportation_code','transportation_name','tempat_asal','kedatangan','keberangkatan');
    	$data['makanan'] = $this->m_admin->gMeals('Food');
    	$data['minuman'] = $this->m_admin->gMeals('Drink');
    	$data['Snacks'] = $this->m_admin->gMeals('Snacks');
		$data['info'] = $this->m_general->usrInfo($this->session->userdata('auth_user'));
		$data['title'] = 'Pengaturan Akun';
		$data['namastasiun'] = '';
		// $data['bas'] = form_open('user/makanan');
		$data['content'] = 'makanan';
		$this->load->view('template',$data);
	}

    public function schedule(){
    	$data['ket'] = 'KEDATANGAN';
    	$data['kondisiku'] = 'tempat_tujuan';
    	$data['stasiun21'] = $this->m_admin->gPlace();
    	$data['kelasnya'] = $this->m_admin->gTransportationC();
    	$data['tableTitle'] = array('Kode KA','Nama Kereta','Asal','Kedatangan','Keberangkatan');
    	$data['tableField'] = array('transportation_code','transportation_name','tempat_asal','kedatangan','keberangkatan');
    	$data['data'] = $this->m_admin->gJadwal();
		$data['info'] = $this->m_general->usrInfo($this->session->userdata('auth_user'));
		$data['title'] = 'Pengaturan Akun';
		$data['namastasiun'] = '';
		$data['bas'] = form_open('user/scheduleWith');
		$data['content'] = 'user/schedule';
		$this->load->view('template',$data);
	}

    public function scheduleWith(){
    	
    	$data = $_POST;
    	$data['kondisiku'] = 'tempat_tujuan';
    	$data['ket'] = 'KEDATANGAN';
    	$data['stasiun21'] = $this->m_admin->gPlace();
    	$data['kelasnya'] = $this->m_admin->gTransportationC();
    	$data['bas'] = form_open('user/scheduleWith');
    	$data['tableTitle'] = array('Kode KA','Nama Kereta','Asal','Kedatangan','Keberangkatan');
    	$data['tableField'] = array('transportation_code','transportation_name','tempat_asal','kedatangan','keberangkatan');
    	$data['data'] = $this->m_admin->gJadwalW($data['kondisi'],'class_name',$data['Asal'],$data['Kelas']);
		$data['info'] = $this->m_general->usrInfo($this->session->userdata('auth_user'));
		$data['title'] = 'Pengaturan Akun';
		$data['namastasiun'] = $data['Asal'];
		$data['content'] = 'user/schedule';
		$this->load->view('template',$data);
	}

	public function schedulereverse(){
		$data['ket'] = 'KEBERANGKATAN';
		$data['kondisiku'] = 'tempat_asal';
    	$data['stasiun21'] = $this->m_admin->gPlace();
    	$data['kelasnya'] = $this->m_admin->gTransportationC();
    	$data['tableTitle'] = array('Kode KA','Nama Kereta','Tujuan','Kedatangan','Keberangkatan');
    	$data['tableField'] = array('transportation_code','transportation_name','tempat_tujuan','kedatangan','keberangkatan');
    	$data['data'] = $this->m_admin->gJadwal();
		$data['info'] = $this->m_general->usrInfo($this->session->userdata('auth_user'));
		$data['title'] = 'Pengaturan Akun';
		$data['bas'] = form_open('user/schedulereverseWith');
		$data['namastasiun'] = '';
		$data['content'] = 'user/schedule';
		$this->load->view('template',$data);
	}

    public function schedulereverseWith(){
    	
    	$data = $_POST;
    	$data['ket'] = 'KEBERANGKATAN';
    	$data['kondisiku'] = 'tempat_asal';
    	$data['stasiun21'] = $this->m_admin->gPlace();
    	$data['kelasnya'] = $this->m_admin->gTransportationC();
    	$data['bas'] = form_open('user/schedulereverseWith');
    	$data['tableTitle'] = array('Kode KA','Nama Kereta','Tujuan','Kedatangan','Keberangkatan');
    	$data['tableField'] = array('transportation_code','transportation_name','tempat_tujuan','kedatangan','keberangkatan');
    	$data['data'] = $this->m_admin->gJadwalW($data['kondisi'],'class_name',$data['Asal'],$data['Kelas']);
		$data['info'] = $this->m_general->usrInfo($this->session->userdata('auth_user'));
		$data['title'] = 'Pengaturan Akun';
		$data['namastasiun'] = $data['Asal'];
		$data['content'] = 'user/schedule';
		$this->load->view('template',$data);
	}
	public function profile(){
		$data['info'] = $this->m_general->usrInfo($this->session->userdata('auth_user'));
		$data['title'] = 'Pengaturan Akun';
		$data['content'] = 'user/profile';
		$this->load->view('template',$data);
	}
	public function order(){
		$data['info'] = $this->m_general->usrInfo($this->session->userdata('auth_user'));
		$data['list'] = $this->m_general->gDataW('order',array('id_costumer'=>$this->session->userdata('auth_user')))->result();
		$data['title'] = 'Pembelian';
		$data['content'] = 'user/order';
		$this->load->view('template',$data);
	}
	public function order_detail($id_order=''){
		$data['o'] = $this->m_general->gOrder($id_order);
		$data['res'] = $this->m_general->gDataW('reservation',array('id_order'=>$id_order))->result();
		$data['title'] = 'Detail Pembelian';
		$data['content'] = 'user/order_detail';
		$this->load->view('template',$data);
	}
	public function order_cancel($id_order=''){
		$data['o'] = $this->m_general->gOrder($id_order);
		$data['balancenya'] = $this->m_general->gBlc($id_order);
		$data['refund'] = $this->m_general->grutenyacok($id_order);
		$data['res'] = $this->m_general->gDataW('reservation',array('id_order'=>$id_order))->result();
		$data['title'] = 'Pembatalan Pemesanan';
		$data['content'] = 'user/order_cancel';
		$data['id_order'] = $id_order;
		$this->load->view('template',$data);
	}
	public function p_cancel($id_order=''){
		$data = $_POST;
		$this->m_general->uData('order',array('status'=>'Batal'),array('id_order'=>$data['id_order']));
		$this->m_general->uData('costumer',array('Balance'=> $data['balanceku'] + $data['refund']),array('id_costumer'=>$data['id_costumer'])); //Kok Gabisa Anjir
		$this->m_general->iData('order_cancel',array('id_order'=>$data['id_order'],'reason'=>$data['reason'],'id_costumer'=>$data['id_costumer']));
		$this->session->set_flashdata('pesan','<div class="alert orange">Permintaan pembatalan anda telah terkirim, apabila sudah diterima maka pesanan ini akan otomatis dibatalkan</div>');

		redirect('user/order_detail/'.$data['id_order'].'');
	}
	public function p_profile(){
		$data = $_POST;

			$cek = $this->m_general->usrInfo($this->session->userdata('auth_user'));
			$id_user = $cek->id_user;

			$config['upload_path']          = APPPATH. '../assets/images/profilepic/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 4000;
			// $data['content'] = 'user/profile';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('pic_file')){
				// $error = array('error' => $this->upload->display_errors());
				// $data['content'] = 'user/profile';
				// $this->load->view('template', $error);
				$this->m_general->uData('user',array('username'=>$data['email'],'phone'=>$data['phone'],'address'=>$data['address']),array('id_user'=>$id_user));
				$this->m_general->uData('costumer',$data,array('id_costumer'=>$this->session->userdata('auth_user')));
			}else{

				//file is uploaded successfully
				//now get the file uploaded data 
				$upload_data = $this->upload->data();

				//get the uploaded file name
				$data['pic_file'] = $upload_data['file_name'];

				// //store pic data to the db
				// $this->pic_model->store_pic_data($data);
				// $this->m_general->uData('order',array('bukti_transfer'=>$data['pic_file']),array('id_order'=>$data['id_order']));
				$this->m_general->uData('user',array('username'=>$data['email'],'phone'=>$data['phone'],'address'=>$data['address']),array('id_user'=>$id_user));
				$this->m_general->uData('costumer',$data,array('id_costumer'=>$this->session->userdata('auth_user')));
				// redirect('/');
			}

		$this->m_general->uData('costumer',$data,array('id_costumer'=>$this->session->userdata('auth_user')));
        $this->session->set_flashdata('pesan','<div class="alert green">Data berhasil disimpan</div>');
		redirect('user/profile');
	}

    public function e_ticket($id_order){   

    	$data['transaksi'] = $this->db->query("SELECT * from reservation rs,passenger ps,rute rt, transportation trs, transportation_company trsc, transportation_class class, v_asal va,v_tujuan vt WHERE rs.id_order = ps.id_order AND rs.id_rute = rt.id_rute AND trs.id_transportation = rt.id_transportation AND trsc.id_transportation_company = trs.id_transportation_company AND trs.id_transportation_class = class.id_transportation_class AND rt.id_rute =va.rute_asal AND rt.id_rute = vt.rute_tujuan AND rs.id_order =$id_order")->result();

		$this->load->view('user/tiketku',$data);
    }



	public function p_password(){
		$o = md5($_POST['o_password']);
		$p = md5($_POST['password']);
		$n = md5($_POST['c_password']);
		$cek = $this->m_general->usrInfo($this->session->userdata('auth_user'));
		$id_user = $cek->id_user;
		if($cek->password !== $o){
			$this->session->set_flashdata('pesan','<div class="alert red">Kata sandi lama salah</div>');
			redirect('user/profile');
		}elseif($p !== $n){
			$this->session->set_flashdata('pesan','<div class="alert red">Konfirmasi kata sandi tidak sama</div>');
			redirect('user/profile');
		}else{
			$this->m_general->uData('user',array('password'=>$n),array('id_user'=>$id_user));
			$this->session->set_flashdata('pesan','<div class="alert green">Data berhasil disimpan</div>');
			redirect('user/profile');
		}
	}


	public function upload($id_order='') 
    {
    	// $this->load->model('pic_model');
		$this->load->library('form_validation');
    	$data['o'] = $this->m_general->gOrder($id_order);
		$data['balancenya'] = $this->m_general->gBlc($id_order);
		$data['refund'] = $this->m_general->grutenyacok($id_order);
		$data['res'] = $this->m_general->gDataW('reservation',array('id_order'=>$id_order))->result();
		$data['id_order'] = $id_order;
    	$data['title'] = 'Pembelian';
		$data['content'] = 'user/upload_transferan';
      $this->load->view('template',$data);

		


    }


    	public function upload_action($id_order='') 
    {
    	// $this->load->model('pic_model');
		$this->load->library('form_validation');
	    $cek = $this->m_general->usrInfo($this->session->userdata('auth_user'));
		$id_user = $cek->id_user;
    	$data['o'] = $this->m_general->gOrder($id_order);
		$data['balancenya'] = $this->m_general->gBlc($id_order);
		$data['refund'] = $this->m_general->grutenyacok($id_order);
		$data['res'] = $this->m_general->gDataW('reservation',array('id_order'=>$id_order))->result();
		$data['id_order'] = $id_order;
    	$data['title'] = 'Pembelian';
		$data['content'] = 'user/upload_transferan';

//get the form values
			// $data['pic_title'] = $this->input->post('pic_title', TRUE);
			// $data['pic_desc'] = $this->input->post('pic_desc', TRUE);

			//file upload code 
			//set file upload settings 
			$config['upload_path']          = APPPATH. '../assets/images/buktitransfer/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 4000;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('pic_file')){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('template', $error);
			}else{

				//file is uploaded successfully
				//now get the file uploaded data 
				$upload_data = $this->upload->data();

				//get the uploaded file name
				$data['pic_file'] = $upload_data['file_name'];

				// //store pic data to the db
				// $this->pic_model->store_pic_data($data);
				$this->m_general->uData('order',array('bukti_transfer'=>$data['pic_file']),array('id_order'=>$data['id_order']));

				redirect('/');
			}
			$this->load->view('template',$data);

		// $this->form_validation->set_rules('pic_file', 'required');

  //       if ($this->form_validation->run() == FALSE){
		// 	$this->load->view('upload_form');
		// }else{
			
		// 	//get the form values
		// 	$data['pic_title'] = $this->input->post('pic_title', TRUE);
		// 	$data['pic_desc'] = $this->input->post('pic_desc', TRUE);

		// 	//file upload code 
		// 	//set file upload settings 
		// 	$config['upload_path']          = APPPATH. '../assets/images/buktitransfer/';
		// 	$config['allowed_types']        = 'gif|jpg|png';
		// 	$config['max_size']             = 4000;

		// 	$this->load->library('upload', $config);

		// 	if ( ! $this->upload->do_upload('pic_file')){
		// 		$error = array('error' => $this->upload->display_errors());
		// 		$this->load->view('upload_form', $error);
		// 	}else{

		// 		//file is uploaded successfully
		// 		//now get the file uploaded data 
		// 		$upload_data = $this->upload->data();

		// 		//get the uploaded file name
		// 		$data['pic_file'] = $upload_data['file_name'];

		// 		// //store pic data to the db
		// 		// $this->pic_model->store_pic_data($data);

		// 		redirect('/');
		// 	}
		// 	$this->load->view('footer');
		// }
      

		


    }
}