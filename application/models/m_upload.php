<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_upload extends CI_Model {
	
    public function buatKode(){
        $this->db->select('RIGHT(manual.kd_manual,5) as kd_manual', FALSE);
        $this->db->order_by('kd_manual','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('manual');
            if($query->num_rows() <> 0){      
                $data = $query->row();
                $kode = intval($data->kd_manual) + 1; 
            }
            else{      
                $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "DOC-MAN-".$batas;
        return $kodetampil;  
    }

    public function buatKodeSOP(){
        $this->db->select('RIGHT(berkas.kd_sop,5) as kd_sop', FALSE);
        $this->db->order_by('kd_sop','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('berkas');
            if($query->num_rows() <> 0){      
                $data = $query->row();
                $kode = intval($data->kd_sop) + 1; 
            }
            else{      
                $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "DOC-SOP-".$batas;
        return $kodetampil;  
    }

    public function buatKodeIK(){
        $this->db->select('RIGHT(ik.kd_ik,5) as kd_ik', FALSE);
        $this->db->order_by('kd_ik','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('ik');
            if($query->num_rows() <> 0){      
                $data = $query->row();
                $kode = intval($data->kd_ik) + 1; 
            }
            else{      
                $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "DOC-IK-".$batas;
        return $kodetampil;  
    }

    public function buatKodeIAD(){
        $this->db->select('RIGHT(berkas_iad.kd_berkas_iad,5) as kd_berkas_iad', FALSE);
        $this->db->order_by('kd_berkas_iad','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('berkas_iad');
            if($query->num_rows() <> 0){      
                $data = $query->row();
                $kode = intval($data->kd_berkas_iad) + 1; 
            }
            else{      
                $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "DOC-IAD-".$batas;
        return $kodetampil;  
    }


    public function buatKodeFORM(){
        $this->db->select('RIGHT(form.kd_form,5) as kd_form', FALSE);
        $this->db->order_by('kd_form','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('form');
            if($query->num_rows() <> 0){      
                $data = $query->row();
                $kode = intval($data->kd_form) + 1; 
            }
            else{      
                $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "DOC-FORM-".$batas;
        return $kodetampil;  
    }


    public function buatKodeMSDS(){
        $this->db->select('RIGHT(berkas_msds.kd_berkas_msds,5) as kd_berkas_msds', FALSE);
        $this->db->order_by('kd_berkas_msds','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('berkas_msds');
            if($query->num_rows() <> 0){      
                $data = $query->row();
                $kode = intval($data->kd_berkas_msds) + 1; 
            }
            else{      
                $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "DOC-MSDS-".$batas;
        return $kodetampil;  
    }

    
}
?>