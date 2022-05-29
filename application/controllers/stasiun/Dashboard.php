<?php
class Dashboard extends CI_Controller{
	// public function __construct() {
 //    	parent::__construct();
 //        $user = $this->session->userdata('auth_admin');
 //        if(!$user){
 //            redirect('stasiun/login');
 //        }
 //    }
	// public function index(){
	// 	$data['title'] = 'Dashboard';
	// 	$data['a_user'] = $this->m_general->gDataA('costumer')->num_rows();
	// 	$data['b_user'] = $this->m_general->gDataW('costumer',array('reg_date'=>date('Y-m-d')))->num_rows();
	// 	$data['a_order'] = $this->m_general->gDataA('order')->num_rows();
	// 	$data['b_order'] = $this->m_general->gDataW('order',array('order_date'=>date('Y-m-d')))->num_rows();
	// 	$a_in = $this->m_general->gDataA('order')->result();
	// 	$total=0;
	// 	foreach($a_in as $a){
	// 		$total = $total+$a->final_price;
	// 	}
	// 	$data['a_in'] = $total;
	// 	$b_in = $this->m_general->gDataW('order',array('order_date'=>date('Y-m-d')))->result();
	// 	$totall=0;
	// 	foreach($b_in as $b){
	// 		$totall = $totall+$b->final_price;
	// 	}
	// 	$data['b_in'] = $totall;
	// 	$data['content'] = 'stasiun/dashboard';
	// 	$this->load->view('stasiun/template',$data);
	// }
	// public function tes(){
 //            $this->load->library("PHPExcel");
 //            $objPHPExcel = new PHPExcel();
 //            $objPHPExcel = PHPExcel_IOFactory::load("./template/excelA4.xlsx");
 //            $start = '2018-02-10';
 //            $end = '2018-02-17';
 //            $baris  = 6;
 //            $order = $this->m_general->gOrderDate($start,$end);
 //            $no=1;

 //            foreach ($order as $frow){
 //                $styleArray = array(
 //                  'borders' => array(
 //                    'allborders' => array(
 //                      'style' => PHPExcel_Style_Border::BORDER_THIN
 //                    )
 //                  )
 //                );
 //                $objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$baris, $no);
 //                $objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$baris, $frow->buyer_name); 
 //                $objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$baris, $frow->time); 
 //                $objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$baris, $frow->price); 
 //                $objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$baris, $frow->status);  

 //                $objPHPExcel->getActiveSheet()->getStyle('A'.$baris)->applyFromArray($styleArray);
 //                $objPHPExcel->getActiveSheet()->getStyle('B'.$baris)->applyFromArray($styleArray);
 //                $objPHPExcel->getActiveSheet()->getStyle('C'.$baris)->applyFromArray($styleArray);
 //                $objPHPExcel->getActiveSheet()->getStyle('D'.$baris)->applyFromArray($styleArray);
 //                $objPHPExcel->getActiveSheet()->getStyle('E'.$baris)->applyFromArray($styleArray);
                 
 //                $baris++;
 //                $no++;
 //            }
 //             $objPHPExcel->setActiveSheetIndex(0)
 //                                        ->setCellValue('A3', ''.tgl_indo($start).' Sampai '.tgl_indo($end));
 //            $objPHPExcel->getActiveSheet()->setTitle('Data');   
 //            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 //            $filename = 'Rekap Order Dari '.tgl_indo($start).' Sampai '.tgl_indo($end).'.xlsx';
 //            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
 //            header("Cache-Control: no-store, no-cache, must-revalidate");
 //            header("Cache-Control: post-check=0, pre-check=0", false);
 //            header("Pragma: no-cache");
 //            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 //            header('Content-Disposition: attachment;filename="'.$filename.'"');
 //            $objWriter->save("php://output");
	// }


    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('auth_admin');
        if(!$user){
            redirect('stasiun/login');
        }
    }
    public $table='place'; 
    public $page='place'; 
    public $primary_key='id_train_movement'; 
    public function index($action='',$id=''){
        
        $data['title'] = 'Lokasi Kereta';
        $data['content'] = 'stasiun/crud_basic';
        $data['tableTitle'] = array('Kereta','Asal Kota','Kota Tujuan','Waktu Setempat','Lokasi Terkini');
        $data['tableField'] = array('transportation_code','kota_asal','kota_tujuan','Time','location');
        $data['inputType'] = array(
                                array('type'=>'text','label'=>'Nama','name'=>'place_name' ),
                                array('type'=>'text','label'=>'Kode','name'=>'place_code'),
                                
                                array('type'=>'select','label'=>'Tipe','name'=>'id_transportation_type'
                                    ,'option'=>array('data'=>'database','table'=>'transportation_type','label'=>'transportation_type_name','value'=>'id_transportation_type'),'onchange'=>'','id'=>'id_transportation_type'),
                                array('type'=>'select','label'=>'Kota','name'=>'id_city'
                                    ,'option'=>array('data'=>'database','table'=>'city','label'=>'city_name','value'=>'id_city'),'onchange'=>'','id'=>''),
                            ); 
        $data['data'] = $this->m_admin->gLoc();
        if($action=='edit'&&$id!==''){
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
}