<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class m_utama extends CI_Model{
        //mtode untuk dapetin data material di db
        function getMaterial(){
            $query = $this->db->get('material');
            return $query;
        }

        //metode untuk tampilin data inputan proses wwt di dashboard (filter by tanggal hari ini saja)
        function getProses(){
            //buat ambil tanggal saat ini nantinya di bandingin sama tanggal pemakaian di tabel
            $current_date = date("Y-m-d");

            $this->db->select('*');
            $this->db->from('pemakaian_material');
            $this->db->join('material','pemakaian_material.material_id = material.id_material');
            $this->db->where('pemakaian_material.tanggal_pemakaian',$current_date); //select agar data yang muncul hanya data yang sesuai dengan inputan tanggal saat tersebut
            $query = $this->db->get();
            return $query;
        }

        //METODE UNTUK AMBIL DATA PROSES WWT SELURUHNYA
        function getProsesWWT(){
    
            $this->db->select('*');
            $this->db->from('pemakaian_material');
            $this->db->join('material','pemakaian_material.material_id = material.id_material');
            $query = $this->db->get();
            return $query;
        }

        //query metode untuk download data pemakaian material dalam proses wwt dengan format excel
        public function get_data_for_exports()
        {
            $this->db->select(' nm_user as `Nama Karyawan`, material_id as `Nama Material`, jml_pemakaian as `Jumlah Pemakaian`, tanggal_pemakaian as `Tanggal Pemakaian');
            $this->db->from('pemakaian_material');
            $this->db->join('material','pemakaian_material.material_id = material.id_material');
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
    }

?>


