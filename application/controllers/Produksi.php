<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == FALSE){
			redirect('Login/index');
		}
		$this->load->model('m_login');
		$this->load->model('m_utama');
		$this->load->model('m_karyawan');
		$this->load->model('m_shift');
	}

    public function index()
	{
		// if user not loggin redirect to login page
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		// get data utama dashboard 
		$karyawan_on = $this->m_karyawan->getKywOn();
		// $apar_off = $this->HomeModel->getAparOff();

		foreach ($karyawan_on as $on) {
			$data['on'] = $on->onnn;
		}

		// foreach ($apar_off as $off) {
		// 	$data['off'] = $off->offff;
		// }

		$data['dataProses']=$this->m_utama->getProses()->result();


		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('dashboard/v_utama', $data);
		$this->load->view('templates/footer');
	}

	public function prosesWWT(){
		// echo "ini tempat untuk input proses wwt";
		$data['dataMaterial']=$this->m_utama->getMaterial()->result();
		// var_dump($data['dataMaterial']);die;

		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('home/v_inputWWT', $data);
		$this->load->view('templates/footer');
	}

	public function loadAddMaterial()
    {
		// ini buat nerima data dari view terus di split pake array_chunk(cari aja buat lebih jelasnya)
		// kenapa harus di split karena data yg dari view kalo inputnya multiple alias lebih dari row itu akan terus tambah index keliapatan 4
		// misal ada 3 row array nya jadi ada  4x3 = 12, sedangkan kalo seperti itu nanti susah buuat looping ke db nya
		// makanya perlu di split dulu setiap row nya
		$arrData = array_chunk($this->input->post('addmore'), 4);

		// kalo udah di split tinggal di looping aja disini
		// kalo bingung di vardump aja setiap prosesnya
		for ($i = 0;  $i < count($arrData); $i++) {
			$data = array(
				'material_id' => $arrData[$i][0]['material_id'], // ini kenapa manggilnya kek gini karena sesuai sama struktur array yg tadi di chunk atau di split, jadi bisa aja manggil nya beda tergantung array yg di kasih kaya gimana
				'nm_user' => $arrData[$i][1]['nm_user'],
				'jml_pemakaian' => $arrData[$i][2]['jml_pemakaian'],
				'tanggal_pemakaian' => $arrData[$i][3]['tanggal_pemakaian']
			);

			$this->db->insert('pemakaian_material', $data);
		}
		redirect('Produksi/');
        // print_r('Data berhasil disimpan');
    }

	public function showDataPWWT(){
		// echo 'tempat buat show data material yang dipakai untuk proses wwt';
		$data['dataProses']=$this->m_utama->getProsesWWT()->result();

		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('home/v_showDataPWWT', $data);
		$this->load->view('templates/footer');		
	}



	//buat metode untuk download data penggunaan material proses wwt
	public function exportsProsesWWT()
	{
		// if user not loggin redirect to login page
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		// get documents data

		$listOfDocument = $this->m_utama->get_data_for_exports();
		//  format all Expired Date in listOfDocument from yyyy-mm-dd to yyyy/mm/dd
		foreach ($listOfDocument as $key => $value) {
			$listOfDocument[$key]['Tanggal Pemakaian'] = str_replace('-', '/', $listOfDocument[$key]['Tanggal Pemakaian']);
		}

		//echoing import javascript XLSX library 
		// echo "<script src='assets/js/xlsx.full.min.js'></script>";
		// //then using xlsx utils to convert json to excel
		// echo "<script>var data = " . json_encode($data['documents']) . ";"
		// 	. "var ws = XLSX.utils.json_to_sheet(data);"
		// 	. "var wb = XLSX.utils.book_new();"
		// 	. "XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');"
		// 	. "XLSX.writeFile(wb, 'data.xlsx');</script>";
		// returns $data['documents'] as json
		echo json_encode($listOfDocument);
	}

}