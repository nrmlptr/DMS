<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class m_shift extends CI_Model {
        
        //metode yang dibuat untuk mengambil data dari tabel shift pada db secara keseluruhan
        public function getShift(){
            $query = $this->db->get('shift');
            return $query->result();  
        }

        //metode untuk ambil data shift by id
        public function getShiftbyID($id_shift){
            $query = $this->db->get_where('shift', array('id_shift' => $id_shift));
            return $query->result();
        }

        public function updateShift($id, $data){

            $this->db->where('id_shift', $id);
            $run = $this->db->update('shift', $data);

            if($run){
                redirect('viewShift');
            }else{
                echo"(Gagal Ubah Data)";
                redirect('document/editShift');
            }
        }

        public function hapusShiftById($id){
            $this->db->delete('shift', array('id_shift' => $id));
            redirect('viewShift');
        }

        public function get_data_for_exports()
        {
            $this->db->select(' nm_shift as `Jadwal Shift`, waktu_shift as `Jam Kerja');
            $this->db->from('shift');
            $this->db->order_by('id_shift', 'DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
    }
?>