<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_upload extends CI_Model
{
    //Dokumen Manual ===========================================================================================================================
    public function buatKode()
    {
        $this->db->select('RIGHT(manual.kd_manual,5) as kd_manual', FALSE);
        $this->db->order_by('kd_manual', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('manual');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_manual) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "DOC-MAN-" . $batas;
        return $kodetampil;
    }

    //metode untuk hapus dokumen manual ========================================================================================================
    public function hapusManualById($id)
    {
        $this->db->delete('manual', array('id_manual' => $id));

        //panggil helper untuk history user
        helper_log("delete", "Delete Document Manual");

        redirect('viewData');
    }


    //Dokumen SOP ==============================================================================================================================
    public function buatKodeSOP()
    {
        $this->db->select('RIGHT(berkas.kd_sop,5) as kd_sop', FALSE);
        $this->db->order_by('kd_sop', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('berkas');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_sop) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "DOC-SOP-" . $batas;
        return $kodetampil;
    }

    //metode untuk hapus dokumen SOP ========================================================================================================
    public function hapusSOPById($id)
    {
        $this->db->delete('berkas', array('id_sop' => $id));

        //panggil helper untuk history user
        helper_log("delete", "Delete Document SOP");


        redirect('viewDataSOP');
    }


    //Dokumen IK =============================================================================================================================
    public function buatKodeIK()
    {
        $this->db->select('RIGHT(ik.kd_ik,5) as kd_ik', FALSE);
        $this->db->order_by('kd_ik', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('ik');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_ik) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "DOC-IK-" . $batas;
        return $kodetampil;
    }

    //metode untuk hapus dokumen IK ========================================================================================================
    public function hapusIKById($id)
    {
        $this->db->delete('ik', array('id_ik' => $id));

        //panggil helper untuk history user
        helper_log("delete", "Delete Document IK");


        redirect('viewDataIK');
    }


    //Dokumen IAD =============================================================================================================================
    public function buatKodeIAD()
    {
        $this->db->select('RIGHT(berkas_iad.kd_berkas_iad,5) as kd_berkas_iad', FALSE);
        $this->db->order_by('kd_berkas_iad', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('berkas_iad');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_berkas_iad) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "DOC-IAD-" . $batas;
        return $kodetampil;
    }

    //metode untuk hapus dokumen IAD ========================================================================================================
    public function hapusIADById($id)
    {
        $this->db->delete('berkas_iad', array('id_iad' => $id));

        //panggil helper untuk history user
        helper_log("delete", "Delete Document IAD K3 & LINGKUNGAN");


        redirect('viewDataIAD');
    }


    //Dokumen FORM =============================================================================================================================
    public function buatKodeFORM()
    {
        $this->db->select('RIGHT(form.kd_form,5) as kd_form', FALSE);
        $this->db->order_by('kd_form', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('form');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_form) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "DOC-FORM-" . $batas;
        return $kodetampil;
    }

    //metode untuk hapus dokumen FORM ========================================================================================================
    public function hapusFORMById($id)
    {
        $this->db->delete('form', array('id_form' => $id));

        //panggil helper untuk history user
        helper_log("delete", "Delete Document FORM");


        redirect('viewDataForm');
    }


    //Dokumen MSDS =============================================================================================================================
    public function buatKodeMSDS()
    {
        $this->db->select('RIGHT(berkas_msds.kd_berkas_msds,5) as kd_berkas_msds', FALSE);
        $this->db->order_by('kd_berkas_msds', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('berkas_msds');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_berkas_msds) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "DOC-MSDS-" . $batas;
        return $kodetampil;
    }

    //metode untuk hapus dokumen MSDS ========================================================================================================
    public function hapusMSDSById($id)
    {
        $this->db->delete('berkas_msds', array('id_msds' => $id));

        //panggil helper untuk history user
        helper_log("delete", "Delete Document MSDS & Safety Sign");


        redirect('viewDataMSDS');
    }


    //VIDEO EDUKASI LK3 =============================================================================================================================
    public function buatKodeVIDEO()
    {
        $this->db->select('RIGHT(videoedukasi.kd_video,5) as kd_video', FALSE);
        $this->db->order_by('kd_video', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('videoedukasi');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_video) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "VID-EDK-" . $batas;
        return $kodetampil;
    }

    //metode untuk hapus Video LK3 ========================================================================================================
    public function hapusVideoById($id)
    {
        $this->db->delete('videoedukasi', array('id_video' => $id));

        //panggil helper untuk history user
        helper_log("delete", "Delete Video Edukasi LK3");

        redirect('viewDataVideo');
    }

    public function getHistory()
    {
        $query = $this->db->get('tabel_log');
        // var_dump($query);die;
        return $query->result();
    }
}