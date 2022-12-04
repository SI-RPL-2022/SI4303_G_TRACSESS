<?php
class Order extends CI_Controller{
	public function __construct() {
    	parent::__construct();
        $user = $this->session->userdata('auth_admin');
        if(!$user){
            redirect('petugas/login');
        }
    }
    public $table='order'; 
    public $tableview='v_order'; 
    public $page='order'; 
    public $primary_key='id_order'; 
	public function index($action='',$id=''){
		$data['title'] = 'Cek In Ticket';
        $data['title2'] = 'Scan Tiket';
		$data['content'] = 'petugas/crud_custom2';
		$data['tableTitle'] = array('Kode Ticket','Nama','Waktu','Harga','Pembayaran','Status Cekin');
		$data['tableField'] = array('ticket_code','buyer_name','time','price','pay_status','check_in2');
		$data['data'] = $this->m_general->gOrderA();
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
		$this->load->view('petugas/template',$data);
	}

    public function autoqr(){
        $ticket_code = $_POST['email'];
        $data = $this->m_general->gDataW('v_order',array('ticket_code'=> $ticket_code))->row();
        $id = $data->id_order;
        $this->m_general->uData('order',array('check_in'=>'CekIn'),array('id_order'=>$id));
        $msg = 'Pesanan #'.$data->id_order.' atas nama '.$data->buyer_name.' berhasil cek in';
        $this->session->set_flashdata('pesan','<div class="alert green">'.$msg.'</div>');
        $res = json_encode(array('result' => 1, 'content' => 'Login berhasil, mengalihkan ...'));
        $this->output->set_content_type('application/json')->set_output($res);
    }

	public function p($action,$id=''){
		if($action=='accept'){			
			$data = $this->m_general->gDataW('order',array('id_order'=>$id))->row();
			$this->m_general->uData('order',array('check_in'=>'CekIn'),array('id_order'=>$id));
			$msg = 'Pesanan #'.$data->id_order.' atas nama '.$data->buyer_name.' berhasil cek in';
		
		}elseif($action=='delete'){
			$this->m_general->dData($this->table,array($this->primary_key=>$id));
			$msg = 'Data berhasil dihapus';
		}else{
			$msg = '';
		}
		$this->session->set_flashdata('pesan','<div class="alert green">'.$msg.'</div>');
		redirect('petugas/'.$this->page.'');
	}
	public function backup(){
        $this->m_admin->eDB($this->table);
    }

    public function export(){
        $this->m_admin->eCSV($this->tableview);
    }
    public function truncate(){
        $this->m_admin->emDB($this->table);
		$this->session->set_flashdata('pesan','<div class="alert green">Data berhasil dikosongkan</div>');
		redirect('petugas/'.$this->page.'');
    }
    public function rec(){
            $this->load->library("PHPExcel");
            $objPHPExcel = new PHPExcel();
            $objPHPExcel = PHPExcel_IOFactory::load("./template/excelA4.xlsx");
            $start = $_POST['start'];
            $end = $_POST['end'];
            $baris  = 11;
            $order = $this->m_general->gOrderDate($start,$end);
            $no=1;

            foreach ($order as $frow){
                $styleArray = array(
                  'borders' => array(
                    'allborders' => array(
                      'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                  )
                );
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$baris, $no);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$baris, $frow->ticket_code); 
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$baris, $frow->transportation_code); 
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$baris, $frow->transportation_name); 
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$baris, $frow->buyer_name);  
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$baris, $frow->kota_asal);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$baris, $frow->kota_tujuan);


                $objPHPExcel->getActiveSheet()->getStyle('A'.$baris)->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('B'.$baris)->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('C'.$baris)->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('D'.$baris)->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('E'.$baris)->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('F'.$baris)->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('G'.$baris)->applyFromArray($styleArray);
                 
                $baris++;
                $no++;
            }
             $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A8', ''.tgl_indo($start).' Sampai '.tgl_indo($end));
            $objPHPExcel->getActiveSheet()->setTitle('Data');   
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $filename = 'Rekap Order Dari '.tgl_indo($start).' Sampai '.tgl_indo($end).'.xlsx';
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            $objWriter->save("php://output");
	}
}