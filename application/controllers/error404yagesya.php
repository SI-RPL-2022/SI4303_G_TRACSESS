<?php
class error404yagesya extends CI_Controller{
	public function index(){
		$_SESSION['cart'] = array();
		$data['title'] = 'Beranda';
		$data['content'] = '404nyagaes';
		// $data['pp'] = $this->m_general->gDataW('transportation_company',array('id_transportation_type'=>1))->result();
		// $data['pk'] = $this->m_general->gDataW('transportation_company',array('id_transportation_type'=>2))->result();
		// $data['kp'] = $this->m_general->gDataW('transportation_class',array('id_transportation_type'=>1))->result();
		// $data['kk'] = $this->m_general->gDataW('transportation_class',array('id_transportation_type'=>2))->result();
		// $data['plp'] = $this->m_general->gPlaceW(array('place.id_transportation_type'=>1))->result();
		// $data['plk'] = $this->m_general->gPlaceW(array('place.id_transportation_type'=>2))->result();
		$this->load->view('template',$data);
	}
}