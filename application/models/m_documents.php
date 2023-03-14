
<?php
class M_documents extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_documents()
	{
		$this->db->from('document');
		$this->db->order_by('id_document', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function delete($id)
	{
		$this->db->where('id_document', $id);
		return $this->db->delete('document');
	}
	public function getDocumentById($id)
	{
		$this->db->from('document');
		$this->db->where('id_document', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function set_documents($id, $data)
	{
		//set ,nama_alat,pabrik,kapasistas,lokasi,no_seri,no_perijinan,expired_date
		//by id_document
		$this->db->where('id_document', $id);
		return $this->db->update('document', $data);
	}

	public function add_multiple_documents($batchData)
	{
		//insert multiple data to database using json string

		$this->db->insert_batch('document', $batchData);

		// $this->db->insert_batch('document', $data);
		// $this->db->set($data);
		// $this->db->insert_batch('document', $data);
	}

	public function add_documents($data)
	{
		//set ,nama_alat,pabrik,kapasistas,lokasi,no_seri,no_perijinan,expired_date
		//by id_document
		return $this->db->insert('document', $data);
	}

	public function delete_documents($id)
	{
		//set ,nama_alat,pabrik,kapasistas,lokasi,no_seri,no_perijinan,expired_date
		//by id_document
		$this->db->where('id_document', $id);
		return $this->db->delete('document');
	}
	public function flip_status($id)
	{
		//flip status if active then processing and vice versa
		$this->db->where('id_document', $id);
		$this->db->select('status');
		$query = $this->db->get('document');
		$result = $query->result_array();
		$status = $result[0]['status'];
		if ($status == 'active') {
			$status = 'processing';
		} else {
			$status = 'active';
		}
		$this->db->where('id_document', $id);
		$this->db->set('status', $status);
		return $this->db->update('document');
	}
	public function get_data_for_exports()
	{
		$this->db->select('nama_alat as `Nama Alat`, pabrik_pembuat as `Pabrik Pembuat`, kapasitas as `Kapasitas`, lokasi as `Lokasi`, no_seri as `No Seri`, no_perijinan as `No Perijinan`, expired_date as Expired Date');
		$this->db->from('document');
		$this->db->order_by('id_document', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function setFilenameBy($id, $filename)
	{
		$this->db->where('id_document', $id);
		$this->db->set('filename', $filename);
		return $this->db->update('document');
	}
	public function produceExpiredDocumentSample()
	{
		//insert sample data with expired_date is 90 days from now
		$expired_date = date('Y-m-d', strtotime('+90 days'));

		$data = array(
			'nama_alat' => 'Sample Alat',
			'pabrik_pembuat' => 'Sample Pabrik',
			'kapasitas' => 'Sample Kapasistas',
			'lokasi' => 'Sample Lokasi',
			'no_seri' => 'Sample No Seri',
			'no_perijinan' => 'Sample No Perijinan',
			'expired_date' => $expired_date,
			'status' => 'active',
			'filename' => 'sample.pdf'
		);
		return $this->db->insert('document', $data);
	}
	public function getDocumentsForReminders()
	{
		$expired_date_90d = date('Y-m-d', strtotime('+90 days'));
		$expired_date_60d = date('Y-m-d', strtotime('+60 days'));
		$expired_date_30d = date('Y-m-d', strtotime('+30 days'));
		//select all ative documents with expired_date is equal to 90 or equal to 60 or equal to 30 days from now
		$this->db->from('document');
		$this->db->where('status', 'active'); //only active documents
		$this->db->where('expired_date', $expired_date_90d); //expired_date is equal to 90 days from now
		$this->db->or_where('expired_date', $expired_date_60d); //expired_date is equal to 60 days from now
		$this->db->or_where('expired_date', $expired_date_30d); //expired_date is equal to 30 days from now		
		$this->db->order_by('id_document', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	//========================================================doc lisensi ========================================================================
	public function get_documents_lisensi()
	{
		$this->db->from('document_lisensi');
		$this->db->order_by('id_document_lisensi', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function add_multiple_documents_lisensi($batchData)
	{
		//insert multiple data to database using json string

		$this->db->insert_batch('document_lisensi', $batchData);

		// $this->db->insert_batch('document', $data);
		// $this->db->set($data);
		// $this->db->insert_batch('document', $data);
	}

	public function get_data_for_exports_lisensi()
	{
		// $masaBerlaku = date('d-m-Y', strtotime(masa_berlaku));
		$this->db->select('jenis_lisensi as `Jenis Lisensi`, nama as `Nama Karyawan`, seksi as `Seksi`, npk as `NPK`, no_sio as `No SIO`, masa_berlaku as Masa Berlaku');
		$this->db->from('document_lisensi');
		$this->db->order_by('id_document_lisensi', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDocumentLisensiById($id)
	{
		$this->db->from('document_lisensi');
		$this->db->where('id_document_lisensi', $id);
		$query = $this->db->get();
		return $query->row_array();
	}


	public function deleteLisensi($id)
	{
		$this->db->where('id_document_lisensi', $id);
		return $this->db->delete('document_lisensi');
	}


	public function flip_status_lisensi($id)
	{
		//flip status if active then processing and vice versa
		$this->db->where('id_document_lisensi', $id);
		$this->db->select('status');
		$query = $this->db->get('document_lisensi');
		$result = $query->result_array();
		$status = $result[0]['status'];
		if ($status == 'active') {
			$status = 'processing';
		} else {
			$status = 'active';
		}
		$this->db->where('id_document_lisensi', $id);
		$this->db->set('status', $status);
		return $this->db->update('document_lisensi');
	}

	public function setFilenameByLisensi($id, $filename)
	{
		$this->db->where('id_document_lisensi', $id);
		$this->db->set('filename', $filename);
		return $this->db->update('document_lisensi');
	}

	public function updateMaber($data){
		// $current_date = date("Y-m-d");
		
		$data = array(
			'masa_berlaku' => $data['masa_berlaku'],
			'status' => 'active',
			'id_document_lisensi' => $data['id_document_lisensi'],
		);

		$this->db->where('id_document_lisensi', $data['id_document_lisensi']);
		$run = $this->db->update('document_lisensi', $data);

		// var_dump($data);die;
		if($run){
			redirect('document/viewLisensi');
		}else{
			echo "Gagal Menyetujui";
			redirect('document/editLisensi');
		}
	}


	public function getDocumentsForRemindersLisensi()
	{
		$masa_berlaku_90d = date('Y-m-d', strtotime('+90 days'));
		$masa_berlaku_60d = date('Y-m-d', strtotime('+60 days'));
		$masa_berlaku_30d = date('Y-m-d', strtotime('+30 days'));
		//select all ative documents with expired_date is equal to 90 or equal to 60 or equal to 30 days from now
		$this->db->from('document_lisensi');
		$this->db->where('status', 'active'); //only active documents
		$this->db->where('masa_berlaku', $masa_berlaku_90d); //expired_date is equal to 90 days from now
		$this->db->or_where('masa_berlaku', $masa_berlaku_60d); //expired_date is equal to 60 days from now
		$this->db->or_where('masa_berlaku', $masa_berlaku_30d); //expired_date is equal to 30 days from now		
		$this->db->order_by('id_document_lisensi', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
}
