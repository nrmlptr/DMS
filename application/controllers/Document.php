<?php
$recipients = [
	'shakaaji29@gmail.com',
	'shakannn29@gmail.com'
];
class Document extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_documents');
		$this->load->model('m_karyawan');
		$this->load->model('m_utama');
		$this->load->model('m_shift');
		$this->load->helper('url_helper');
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

	public function view(){
		// det documents data
		$data['documents'] = $this->m_documents->get_documents();
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('index', $data);
		$this->load->view('templates/footer');
		// $this->load->view('index');
		// echo 'Hello World!';
	}

	private function send_mail($data)
	{
		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'mail.incoe.astra.co.id',
			'smtp_port' => 25,
			'smtp_user' => 'no-reply@incoe.astra.co.id',
			'smtp_pass' => 'just4unme',
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1'
		);
		$url = base_url();

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$name = '';
		if (isset($data['name'])) {
			$name = $data['name'];
		}
		$this->email->from('no-reply@incoe.astra.co.id', $name);
		$this->email->to($data['to']);
		$this->email->subject($data['subject']);
		$this->email->message($data['message']);
		return $this->email->send();
	}
	public function exports()
	{
		// if user not loggin redirect to login page
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		// det documents data



		$listOfDocument = $this->m_documents->get_data_for_exports();
		//  format all Expired Date in listOfDocument from yyyy-mm-dd to yyyy/mm/dd
		foreach ($listOfDocument as $key => $value) {
			$listOfDocument[$key]['Expired Date'] = str_replace('-', '/', $listOfDocument[$key]['Expired Date']);
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
	public function imports()
	{
		// if user not loggin redirect to login page
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		// check if it's a post request
		// if this is a post request then get json data from ajax post
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			//get raw json data from ajax post
			$json = file_get_contents('php://input');
			//decode json data to array
			// $data = json_decode($json, true);

			// get json data from ajax post
			// $data = $this->input->post('data');
			// var_dump($data);
			// decode json data
			// $batchData = json_decode($data);
			// var_dump($batchData);
			// insert data to database
			$data = json_decode($json, true);
			$batchData = [];
			//load data to batch data

			for ($i = 0; $i < count($data); $i++) {
				$batchData[$i] = [
					'nama_alat' => isset($data[$i]['nama_alat']) ? $data[$i]['nama_alat'] : '',
					'pabrik_pembuat' =>  isset($data[$i]['pabrik_pembuat']) ? $data[$i]['pabrik_pembuat'] : '',
					'kapasitas' => isset($data[$i]['kapasitas']) ? $data[$i]['kapasitas'] : '',
					'lokasi' => isset($data[$i]['lokasi']) ? $data[$i]['lokasi'] : '',
					'no_seri' => isset($data[$i]['no_seri']) ? $data[$i]['no_seri'] : '',
					'no_perijinan' => isset($data[$i]['no_perijinan']) ? $data[$i]['no_perijinan'] : '',
					'expired_date' => isset($data[$i]['expired_date']) ? $data[$i]['expired_date'] : '',
					'status' => isset($data[$i]['status']) ? $data[$i]['status'] : '',
				];
			}
			// foreach ($data as $key => $value) {
			// 	$batchData[] = [
			// 		'nama_alat' => isset($value['nama_alat']) ? $value['nama_alat'] : "",
			// 		'pabrik_pembuat' => isset($value['pabrik_pembuat']) ? $value['pabrik_pembuat'] : "",
			// 		'kapasitas' => isset($value['kapasitas']) ? $value['kapasitas'] : "",
			// 		'lokasi' => isset($value['lokasi']) ? $value['lokasi'] : "",
			// 		'no_seri' => isset($value['no_seri']) ? $value['no_seri'] : "",
			// 		'no_perijinan' => isset($value['no_perijinan']) ? $value['no_perijinan'] : "",
			// 		'expired_date' => isset($value['expired_date']) ? $value['expired_date'] : "",
			// 	];
			// }
			$this->m_documents->add_multiple_documents($batchData);
			// return success message
			echo 'success';
			// var_dump($data);
			var_dump($batchData);
		} else {
			$this->load->view('templates/header');
			$this->load->view('templates/nav');
			$this->load->view('imports',);
			$this->load->view('templates/footer');
		}
	}
	public function flip_status($id)
	{
		// if user not loggin redirect to login page
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		$this->m_documents->flip_status($id);
		echo "<script>window.location.href='" . base_url() . "';</script>";
	}
	public function add()
	{
		// if user not loggin redirect to login page
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		$data["is_add_documents"] = 'true';
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('add',);
		$this->load->view('templates/footer', $data);
	}
	public function edit($id)
	{
		// if user not loggin redirect to login page
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		// $id = $this->uri->segment(3);
		// echo "ini tempat edit masa berlaku";
		// $this->load->model("m_documents");
		$data['ujiriksa']=$this->m_documents->getDocumentById($id);

		// var_dump($data['ujiriksa']);die;
		// array(10) { ["id_document"]=> string(1) "1" ["nama_alat"]=> string(3) "tes" ["pabrik_pembuat"]=> string(3) "tes" ["kapasitas"]=> string(3) "tes" ["lokasi"]=> string(6) "testes" ["no_seri"]=> string(6) "testes" ["no_perijinan"]=> string(6) "testes" ["expired_date"]=> string(10) "2023-03-14" ["status"]=> string(7) "expired" ["filename"]=> string(0) "" }
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('edit', $data);
		$this->load->view('templates/footer');
		// $this->m_documents->deleteLisensi($id);
		// echo "<script>window.location.href='" . base_url() . "';</script>";
	}

	//metode proses simpan edit shift
	public function loadEdit(){
		// var_dump($_POST);die;
		// array(2) { ["masa_berlaku"]=> string(10) "2024-03-10" ["id_document_lisensi"]=> string(1) "4" }

		// $id = $this->input->post('id_document_lisensi');
		$data['id_document'] = $this->input->post('id_document');
		$data['expired_date'] = $this->input->post('expired_date');
		$data['active'] = $this->input->post('status');


		$this->load->model('m_documents');
		$this->m_documents->updateExp($data);

	}

	public function delete($base64_id)
	{
		// if user not loggin redirect to login page
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		$id = base64_decode($base64_id);
		$this->m_documents->delete($id);
		echo "<script>window.location.href='" . base_url() . "';</script>";
	}


	public function upload($id)
	{
		// if user not loggin redirect to login page
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		// upload file then set file name to database using  setFilenameBy function on model
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
		$config['max_size'] = 10000;
		$config['max_width'] = 10240;
		$config['max_height'] = 7680;
		$this->load->library('upload', $config);
		// $this->upload->initialize($config);
		if (!$this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_errors());
			//reload to root page
			echo $error['error'];
			echo "<script>alert('Upload gagal!');window.location.href='" . base_url() . "';</script>";
		} else {
			$data = array('upload_data' => $this->upload->data());
			// set file name to database
			$this->m_documents->setFilenameBy($id, $data['upload_data']['file_name']);
			//reload to root page
			echo "<script>alert('Upload berhasil!');window.location.href='" . base_url() . "';</script>";
		}
	}
	public function produceExpiredDocumentSample()
	{
		return	$this->m_documents->produceExpiredDocumentSample();
	}

	public function sendExpiredEmailNotification($idDocument)
	{
		// get data from database
		$item = $this->m_documents->getDocumentById($idDocument);

		$data = array();
		$data['to'] = 'shakaaji29@gmail.com';
		$data['subject'] = 'Document has Expired';
		$data['name'] = 'Document has Expired';
		$data['message'] = 'Dear User,';
		$data['message'] .= '<br>';
		$data['message'] .= 'Document with name ' . $item['nama_alat'] . ' has expired';
		$data['message'] .= '<br>';
		$data['message'] .= 'Please check your document';
		$data['message'] .= '<br>';
		$data['message'] .= 'Thank you';
		$data['message'] .= '<br>';
		$data['message'] .= 'Regards';
		$data['message'] .= '<br>';
		$data['message'] .= 'Admin';
		$result = false;
		$recipients = [
			'ihan.pratama@incoe.astra.co.id',
			'nonik.purnamasari@incoe.astra.co.id',
			'ahmad.zaelani@incoe.astra.co.id',
			'sugiyanto@incoe.astra.co.id'
		];
		foreach ($recipients as $val) {
			$data['to'] = $val;
			$result = $this->send_mail($data);
			# code...
		}
		// send email
		if ($result) {
			// show dialog success and redirect to root page
			echo "<script>alert('Email berhasil dikirim!');window.location.href='" . base_url() . "';</script>";
		};
	}

	public function webhook_reminder()
	{
		// get data for reminder from database
		$data = $this->m_documents->getDocumentsForReminders();
		// var_dump($data);
		// set count of reminders data
		$count = count($data);
		// if count is less than 1, return false

		if ($count < 1) {
			echo json_encode(
				[
					"status" => "failed",
					"message" => "no data found"
				]
			);
			return;
		}
		$url = base_url();
		$to = 'shakaaji29@gmail.com';
		$subject = $count . ' Document will Expired';
		$message = "Dear User,";
		$message .= "<br>";
		$message .= "We want to inform you that there are " . $count . " documents will expired.";
		$message .= "<br><br>";
		$message .= "Please check the list below : ";
		$message .= "<br><br>";
		$message .= "<table border='1' style='border-collapse: collapse;'>";
		$message .= "<tr>";
		$message .= "<th>No</th>";
		$message .= "<th>Document Name</th>";
		$message .= "<th>Expired Date</th>";
		$message .= "<th>Link</th>";
		$message .= "</tr>";
		$no = 1;
		foreach ($data as $key => $value) {
			$message .= "<tr>";
			$message .= "<td>" . $no . "</td>";
			$message .= "<td>" . $value['nama_alat'] . "</td>";
			$message .= "<td>" . $value['expired_date'] . "</td>";
			$message .= "<td>" . $url . "uploads/" . $value['filename'] . "</td>";
			$message .= "</tr>";
			$no++;
		}
		$message .= "</table>";
		$message .= "<br><br>";
		$message .= "or you can check full document list in this link : <a href='" . $url . "'>Document List</a>";
		$message .= "<br><br>";
		$message .= "Thanks";
		$message .= "<br>Admin";

		$name = 'Document Expired Reminder';
		$data = array(
			"to" => $to,
			"subject" => $subject,
			"message" => $message,
			"name" => $name
		);
		$recipients = [
			'ihan.pratama@incoe.astra.co.id',
			'nonik.purnamasari@incoe.astra.co.id',
			'ahmad.zaelani@incoe.astra.co.id',
			'sugiyanto@incoe.astra.co.id'
		];
		foreach ($recipients as $val) {
			$data['to'] = $val;
			$result = $this->send_mail($data);
			# code...
		}
		// $this->send_mail($data);

		// $config = array(
		// 	'protocol'  => 'smtp',
		// 	'smtp_host' => 'mail.incoe.astra.co.id',
		// 	'smtp_port' => 25,
		// 	'smtp_user' => 'no-reply@incoe.astra.co.id',
		// 	'smtp_pass' => 'just4unme',
		// 	'mailtype'  => 'html',
		// 	'charset'   => 'iso-8859-1'
		// );

		// $this->load->library('email', $config);
		// $this->email->set_newline("\r\n");
		// $this->email->from('no-reply@incoe.astra.co.id', $name);
		// $this->email->to($to);

		// $this->email->to('nitawulandari215@gmail.com','lukymulana@gmail.com');

		// $this->email->subject($subject);
		// $this->email->message($message);
		// $this->email->send();
	}
	// this function is for send email to user when document is expired
	// [data] is array of data that will be sent to user
	// [data] must have [subject],[message] and [to] key
	// [data] can have [name] key

	//===========================================================master data karyawan ehs==========================================================
	//metode untuk tampilkan data master karyawan
	// public function showKaryawan(){

	// 	// $this->load->model('M_karyawan');
	// 	$data['list_karyawan'] = $this->m_karyawan->getKaryawan();
	// 	// var_dump($data['list_karyawan']);die;

	// 	$this->load->view('templates/header');
	// 	$this->load->view('templates/nav');
	// 	$this->load->view('dashboard/v_karyawan', $data);
	// 	$this->load->view('templates/footer');
	// }

	// //metode tampilkan form tambah karyawan
	// public function addKaryawan(){
	// 	$this->load->view('templates/header');
	// 	$this->load->view('templates/nav');
	// 	$this->load->view('dashboard/v_addKaryawan');
	// 	$this->load->view('templates/footer');
	// }

	// //metode proses simpan tambah karyawan
	// public function loadAddKaryawan(){
	// 	// var_dump($_POST);die;
	// 	//proses upload
	// 		$config['upload_path']          = './uploads/';
	// 		$config['allowed_types']        = 'gif|jpg|png|jpeg';
	// 		$config['max_size']             = 20480;
	// 		$config['max_width']            = 10240;
	// 		$config['max_height']           = 10240;

	// 		$this->load->library('upload', $config);

	// 		if ( ! $this->upload->do_upload('karyawanFile'))
	// 		{
	// 			$error = array('error' => $this->upload->display_errors());

	// 			// $this->load->view('upload_form', $error);
	// 			redirect('addKar');
	// 		}
	// 		else
	// 		{
	// 			$dataUpload = array('upload_data' => $this->upload->data());

	// 			// $this->load->view('upload_success', $data);
	// 		}
	// 	//end upload
		
	// 	$data['nik'] = $this->input->post('nik');
	// 	$data['nm_karyawan'] = $this->input->post('nm_karyawan');
	// 	$data['foto_karyawan'] = $this->upload->data('file_name');


	// 	$this->load->model('m_karyawan');
	// 	$this->m_karyawan->addKaryawan($data);
	// }

	// //metode tampilkan edit karyawan
	// public function editKaryawan(){
	// 	// echo "Ini tempat perbarui data";
	// 	//buat ngetes buttonnya berfungsi atau engga
	// 	$this->load->view('templates/header');
	// 	$this->load->view('templates/nav');

	// 	$id_karyawan = $this->uri->segment(3);
	// 	$data['kyw'] = $this->m_karyawan->getKaryawanById($id_karyawan);

	// 	// var_dump($data['kyw']);die();

	// 	$this->load->view('dashboard/v_editKaryawan',$data);
	// 	$this->load->view('templates/footer');
	// }

	// //metode proses simpan edit karyawan
	// public function loadEditKaryawan(){
	// 	// var_dump($_POST);die;

	// 	//proses upload gambar
	// 		$config['upload_path']          = './uploads/';
	// 		$config['allowed_types']        = 'gif|jpg|png|jpeg';
	// 		$config['max_size']             = 20480;
	// 		$config['max_width']            = 10240;
	// 		$config['max_height']           = 10240;

	// 		$this->load->library('upload', $config);

	// 		if ( ! $this->upload->do_upload('karyawanFile')){
	// 			$error = array('error' => $this->upload->display_errors());
	// 			$id = $this->input->post('id_karyawan');
	// 			$data['nik'] = $this->input->post('nik');
	// 			$data['nm_karyawan'] = $this->input->post('nm_karyawan');

	// 			$this->load->model('m_karyawan');
	// 			$this->m_karyawan->updateKaryawan($id, $data);
	// 			// $this->load->view('upload_form', $error);
	// 			redirect('document/editKaryawan');
	// 		}
	// 		else{
	// 			$dataUpload = array('upload_data' => $this->upload->data());
	// 			// $this->load->view('upload_success', $data);
	// 			$id = $this->input->post('id_karyawan');
	// 			$data['nik'] = $this->input->post('nik');
	// 			$data['nm_karyawan'] = $this->input->post('nm_karyawan');
	// 			$data['foto_karyawan'] = $this->upload->data('file_name');


	// 			$this->load->model('m_karyawan');
	// 			$this->m_karyawan->updateKaryawan($id, $data);

	// 		}
	// 	//end upload
	// }


	// //metode hapus karyawan by id
	// public function deleteKaryawanById(){
	// 	$id = $this->uri->segment(3);
	// 	$this->load->model('m_karyawan');
	// 	$this->m_karyawan->hapusKaryawanById($id);
	// }

	// //buat metode untuk download data karyawan
	// public function exportsKar()
	// {
	// 	// if user not loggin redirect to login page
	// 	if (!$this->session->userdata('logged_in')) {
	// 		redirect('login');
	// 	}
	// 	// get documents data

	// 	$listOfDocument = $this->m_karyawan->get_data_for_exports();
	// 	//  format all Expired Date in listOfDocument from yyyy-mm-dd to yyyy/mm/dd
	// 	foreach ($listOfDocument as $key => $value) {
	// 		// $listOfDocument[$key]['Expired Date'] = str_replace('-', '/', $listOfDocument[$key]['Expired Date']);
	// 	}

	// 	//echoing import javascript XLSX library 
	// 	// echo "<script src='assets/js/xlsx.full.min.js'></script>";
	// 	// //then using xlsx utils to convert json to excel
	// 	// echo "<script>var data = " . json_encode($data['documents']) . ";"
	// 	// 	. "var ws = XLSX.utils.json_to_sheet(data);"
	// 	// 	. "var wb = XLSX.utils.book_new();"
	// 	// 	. "XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');"
	// 	// 	. "XLSX.writeFile(wb, 'data.xlsx');</script>";
	// 	// returns $data['documents'] as json
	// 	echo json_encode($listOfDocument);
	// }


	//================================================================== master data shift =========================================================
	//metode tampilkan data shift secara menyeluruh
	// public function showShift(){

	// 	// $this->load->model('M_karyawan');
	// 	$data['list_shift'] = $this->m_shift->getShift();
	// 	// var_dump($data['list_shift']);die;
	// 	$this->load->view('templates/header');
	// 	$this->load->view('templates/nav');
	// 	$this->load->view('dashboard/v_shift', $data);
	// 	$this->load->view('templates/footer');
	// }

	// //metode untuk tampilkan form edit shift
	// public function editShift(){
	// 	// echo "ini tempat untuk edit shift";
	// 	$this->load->view('templates/header');
	// 	$this->load->view('templates/nav');

	// 	$id_shift = $this->uri->segment(3);
	// 	$data['shift'] = $this->m_shift->getShiftbyID($id_shift);

	// 	// var_dump($data['shift']);die;
	// 	$this->load->view('dashboard/v_editShift', $data);
	// 	$this->load->view('templates/footer');
	// }

	// //metode proses simpan edit shift
	// public function loadEditShift(){
	// 	// var_dump($_POST);die;
	// 	// array(3) { ["nm_shift"]=> string(8) "Shift 22" ["id_shift"]=> string(1) "1" ["wkt_shift"]=> string(13) "09.00 - 12.30" }

	// 	$id = $this->input->post('id_shift');
	// 	$data['nm_shift'] = $this->input->post('nm_shift');
	// 	$data['waktu_shift'] = $this->input->post('waktu_shift');

	// 	$this->load->model('m_shift');
	// 	$this->m_shift->updateShift($id, $data);

	// }

	// //metode hapus data shift by id
	// public function deleteShiftById(){
	// 	$id = $this->uri->segment(3);
	// 	$this->load->model('m_shift');
	// 	$this->m_shift->hapusShiftById($id);
	// }

	// //buat metode untuk download data karyawan
	// public function exportsShift()
	// {
	// 	// if user not loggin redirect to login page
	// 	if (!$this->session->userdata('logged_in')) {
	// 		redirect('login');
	// 	}
	// 	// get documents data

	// 	$listOfDocument = $this->m_shift->get_data_for_exports();
	// 	//  format all Expired Date in listOfDocument from yyyy-mm-dd to yyyy/mm/dd
	// 	foreach ($listOfDocument as $key => $value) {
	// 		// $listOfDocument[$key]['Expired Date'] = str_replace('-', '/', $listOfDocument[$key]['Expired Date']);
	// 	}

	// 	//echoing import javascript XLSX library 
	// 	// echo "<script src='assets/js/xlsx.full.min.js'></script>";
	// 	// //then using xlsx utils to convert json to excel
	// 	// echo "<script>var data = " . json_encode($data['documents']) . ";"
	// 	// 	. "var ws = XLSX.utils.json_to_sheet(data);"
	// 	// 	. "var wb = XLSX.utils.book_new();"
	// 	// 	. "XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');"
	// 	// 	. "XLSX.writeFile(wb, 'data.xlsx');</script>";
	// 	// returns $data['documents'] as json
	// 	echo json_encode($listOfDocument);
	// }

	//===================================================dms dokumen lisensi===============================================
	public function viewLisensi(){
		// det documents data
		$data['documents_lisensi'] = $this->m_documents->get_documents_lisensi();
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('indexLisensi', $data);
		$this->load->view('templates/footer');
		// $this->load->view('index');
		// echo 'Hello World!';
	}


	private function send_mail_Lisensi($data)
	{
		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'mail.incoe.astra.co.id',
			'smtp_port' => 25,
			'smtp_user' => 'no-reply@incoe.astra.co.id',
			'smtp_pass' => 'just4unme',
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1'
		);
		$url = base_url();

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$name = '';
		if (isset($data['name'])) {
			$name = $data['name'];
		}
		$this->email->from('no-reply@incoe.astra.co.id', $name);
		$this->email->to($data['to']);
		$this->email->subject($data['subject']);
		$this->email->message($data['message']);
		return $this->email->send();
	}

	public function exportsLisensi()
	{
		// if user not loggin redirect to login page
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		// det documents data



		$listOfDocument = $this->m_documents->get_data_for_exports_lisensi();
		//  format all Expired Date in listOfDocument from yyyy-mm-dd to yyyy/mm/dd
		foreach ($listOfDocument as $key => $value) {
			$listOfDocument[$key]['Masa Berlaku'] = str_replace('-', '/', $listOfDocument[$key]['Masa Berlaku']);
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


	public function importsLisensi()
	{
		// if user not loggin redirect to login page
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		// check if it's a post request
		// if this is a post request then get json data from ajax post
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			//get raw json data from ajax post
			$json = file_get_contents('php://input');
			//decode json data to array
			// $data = json_decode($json, true);

			// get json data from ajax post
			// $data = $this->input->post('data');
			// var_dump($data);
			// decode json data
			// $batchData = json_decode($data);
			// var_dump($batchData);
			// insert data to database
			$data = json_decode($json, true);
			$batchData = [];
			//load data to batch data

			for ($i = 0; $i < count($data); $i++) {
				$batchData[$i] = [
					'jenis_lisensi' => isset($data[$i]['jenis_lisensi']) ? $data[$i]['jenis_lisensi'] : '',
					'nama' =>  isset($data[$i]['nama']) ? $data[$i]['nama'] : '',
					'seksi' => isset($data[$i]['seksi']) ? $data[$i]['seksi'] : '',
					'npk' => isset($data[$i]['npk']) ? $data[$i]['npk'] : '',
					'no_sio' => isset($data[$i]['no_sio']) ? $data[$i]['no_sio'] : '',
					'masa_berlaku' => isset($data[$i]['masa_berlaku']) ? $data[$i]['masa_berlaku'] : '',
					'status' => isset($data[$i]['status']) ? $data[$i]['status'] : '',
				];
			}
			// foreach ($data as $key => $value) {
			// 	$batchData[] = [
			// 		'nama_alat' => isset($value['nama_alat']) ? $value['nama_alat'] : "",flip_status_lisensi
			// 		'pabrik_pembuat' => isset($value['pabrik_pembuat']) ? $value['pabrik_pembuat'] : "",
			// 		'kapasitas' => isset($value['kapasitas']) ? $value['kapasitas'] : "",
			// 		'lokasi' => isset($value['lokasi']) ? $value['lokasi'] : "",
			// 		'no_seri' => isset($value['no_seri']) ? $value['no_seri'] : "",
			// 		'no_perijinan' => isset($value['no_perijinan']) ? $value['no_perijinan'] : "",
			// 		'expired_date' => isset($value['expired_date']) ? $value['expired_date'] : "",
			// 	];
			// }
			$this->m_documents->add_multiple_documents_lisensi($batchData);
			// return success message
			echo 'success';
			// var_dump($data);
			var_dump($batchData);
		} else {
			$this->load->view('templates/header');
			$this->load->view('templates/nav');
			$this->load->view('importsLisensi',);
			$this->load->view('templates/footer');
		}
	}

	public function flip_status_lisensi($id)
	{
		// if user not loggin redirect to login page
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		$this->m_documents->flip_status_lisensi($id);
		echo "<script>window.location.href='" . base_url('homeLisensi') . "';</script>";
	}


	public function addLisensi()
	{
		// if user not loggin redirect to login page
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		$data["is_add_documents_lisensi"] = 'true';
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('addLisensi',);
		$this->load->view('templates/footer', $data);
	}


	public function deleteLisensi($base64_id)
	{
		// if user not loggin redirect to login page
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		$id = base64_decode($base64_id);
		$this->m_documents->deleteLisensi($id);
		echo "<script>window.location.href='" . base_url('document/viewLisensi') . "';</script>";
	}

	public function editLisensi($id)
	{
		// if user not loggin redirect to login page
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		// $id = $this->uri->segment(3);
		// echo "ini tempat edit masa berlaku";
		// $this->load->model("m_documents");
		$data['lisensi']=$this->m_documents->getDocumentLisensiById($id);

		// var_dump($data['lisensi']);die;
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('editLisensi', $data);
		$this->load->view('templates/footer');
		// $this->m_documents->deleteLisensi($id);
		// echo "<script>window.location.href='" . base_url() . "';</script>";
	}

	//metode proses simpan edit shift
	public function loadEditMaber(){
		// var_dump($_POST);die;
		// array(2) { ["masa_berlaku"]=> string(10) "2024-03-10" ["id_document_lisensi"]=> string(1) "4" }

		// $id = $this->input->post('id_document_lisensi');
		$data['id_document_lisensi'] = $this->input->post('id_document_lisensi');
		$data['masa_berlaku'] = $this->input->post('masa_berlaku');
		$data['active'] = $this->input->post('status');


		$this->load->model('m_documents');
		$this->m_documents->updateMaber($data);

	}


	public function uploadLisensi($id)
	{
		// if user not loggin redirect to login page
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		// upload file then set file name to database using  setFilenameBy function on model
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|xlsx|xls';
		$config['max_size'] = 20480;
		$config['max_width'] = 10240;
		$config['max_height'] = 10240;
		$this->load->library('upload', $config);
		// $this->upload->initialize($config);
		if (!$this->upload->do_upload('fileLisensi')) {
			$error = array('error' => $this->upload->display_errors());
			//reload to root page
			echo $error['error'];
			echo "<script>alert('Upload gagal!');window.location.href='" . base_url() . "';</script>";
		} else {
			$data = array('upload_data' => $this->upload->data());
			// set file name to database
			$this->m_documents->setFilenameByLisensi($id, $data['upload_data']['file_name']);
			//reload to root page
			echo "<script>alert('Upload berhasil!');window.location.href='" . base_url() . "';</script>";
		}
	}


	public function produceExpiredDocumentSampleLisensi()
	{
		return	$this->m_documents->produceExpiredDocumentSample();
	}

	public function sendExpiredEmailNotificationLisensi($idDocument)
	{
		// get data from database
		$item = $this->m_documents->getDocumentLisensiById($idDocument);

		$data = array();
		$data['to'] = 'shakaaji29@gmail.com';
		$data['subject'] = 'Document has Expired';
		$data['name'] = 'Document has Expired';
		$data['message'] = 'Dear User,';
		$data['message'] .= '<br>';
		$data['message'] .= 'Document with name ' . $item['jenis_lisensi'] . ' has expired';
		$data['message'] .= '<br>';
		$data['message'] .= 'Please check your document';
		$data['message'] .= '<br>';
		$data['message'] .= 'Thank you';
		$data['message'] .= '<br>';
		$data['message'] .= 'Regards';
		$data['message'] .= '<br>';
		$data['message'] .= 'Admin';
		$result = false;
		$recipients = [
			'ihan.pratama@incoe.astra.co.id',
			'nonik.purnamasari@incoe.astra.co.id',
			'ahmad.zaelani@incoe.astra.co.id',
			'sugiyanto@incoe.astra.co.id'
		];
		foreach ($recipients as $val) {
			$data['to'] = $val;
			$result = $this->send_mail($data);
			# code...
		}
		// send email
		if ($result) {
			// show dialog success and redirect to root page
			echo "<script>alert('Email berhasil dikirim!');window.location.href='" . base_url() . "';</script>";
		};
	}

	public function webhook_reminder_lisensi()
	{
		// get data for reminder from database
		$data = $this->m_documents->getDocumentsForRemindersLisensi();
		// var_dump($data);
		// set count of reminders data
		$count = count($data);
		// if count is less than 1, return false

		if ($count < 1) {
			echo json_encode(
				[
					"status" => "failed",
					"message" => "no data found"
				]
			);
			return;
		}
		$url = base_url();
		$to = 'shakaaji29@gmail.com';
		$subject = $count . ' Document will Expired';
		$message = "Dear User,";
		$message .= "<br>";
		$message .= "We want to inform you that there are " . $count . " documents will expired.";
		$message .= "<br><br>";
		$message .= "Please check the list below : ";
		$message .= "<br><br>";
		$message .= "<table border='1' style='border-collapse: collapse;'>";
		$message .= "<tr>";
		$message .= "<th>No</th>";
		$message .= "<th>Nama Lisensi</th>";
		$message .= "<th>Masa Berlaku</th>";
		$message .= "<th>Link</th>";
		$message .= "</tr>";
		$no = 1;
		foreach ($data as $key => $value) {
			$message .= "<tr>";
			$message .= "<td>" . $no . "</td>";
			$message .= "<td>" . $value['jenis_lisensi'] . "</td>";
			$message .= "<td>" . $value['masa_berlaku'] . "</td>";
			$message .= "<td>" . $url . "uploads/" . $value['filename'] . "</td>";
			$message .= "</tr>";
			$no++;
		}
		$message .= "</table>";
		$message .= "<br><br>";
		$message .= "or you can check full document list in this link : <a href='" . $url . "'>Document List</a>";
		$message .= "<br><br>";
		$message .= "Thanks";
		$message .= "<br>Admin";

		$name = 'Document Expired Reminder';
		$data = array(
			"to" => $to,
			"subject" => $subject,
			"message" => $message,
			"name" => $name
		);
		$recipients = [
			'ihan.pratama@incoe.astra.co.id',
			'nonik.purnamasari@incoe.astra.co.id',
			'ahmad.zaelani@incoe.astra.co.id',
			'sugiyanto@incoe.astra.co.id'
		];
		foreach ($recipients as $val) {
			$data['to'] = $val;
			$result = $this->send_mail($data);
			# code...
		}
		// $this->send_mail($data);

		// $config = array(
		// 	'protocol'  => 'smtp',
		// 	'smtp_host' => 'mail.incoe.astra.co.id',
		// 	'smtp_port' => 25,
		// 	'smtp_user' => 'no-reply@incoe.astra.co.id',
		// 	'smtp_pass' => 'just4unme',
		// 	'mailtype'  => 'html',
		// 	'charset'   => 'iso-8859-1'
		// );

		// $this->load->library('email', $config);
		// $this->email->set_newline("\r\n");
		// $this->email->from('no-reply@incoe.astra.co.id', $name);
		// $this->email->to($to);

		// $this->email->to('nitawulandari215@gmail.com','lukymulana@gmail.com');

		// $this->email->subject($subject);
		// $this->email->message($message);
		// $this->email->send();
	}



	// public function view($slug = NULL) {
	// 	$data['document_item'] = $this->Document_model->get_documents($slug);
	// 	if (empty($data['document_item'])) {
	// 		show_404();
	// 	}
	// 	$data['title'] = $data['document_item']['title'];
	// 	$this->load->view('templates/header', $data);
	// 	$this->load->view('document/view', $data);
	// 	$this->load->view('templates/footer');
	// }
	// public function create() {
	// 	$this->load->helper('form');
	// 	$this->load->library('form_validation');
	// 	$data['title'] = 'Create a document item';
	// 	$this->form_validation->set_rules('title', 'Title', 'required');
	// 	$this->form_validation->set_rules('text', 'Text', 'required');
	// 	if ($this->form_validation->run() === FALSE) {
	// 		$this->load->view('templates/header', $data);
	// 		$this->load->view('document/create');
	// 		$this->load->view('templates/footer');
	// 	} else {
	// 		$this->Document_model->set_documents();
	// 		$this->load->view('document/success');
	// 	}
	// }
}
