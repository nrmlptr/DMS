<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unggah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
        }
        $this->load->model('m_login');
        $this->load->model('m_upload');
    }

    //================================================================ Upload Dokumen Manual =====================================================
    //metode untuk buka form upload dokumen manual
    function create()
    {
        $this->load->model('m_upload');
        $x['kd_manual'] = $this->m_upload->buatKode(); //variabel untuk kode dokumen otomatis
        // echo $kd_manual; 

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('upload/v_upload', $x);
        $this->load->view('templates/footer');
    }

    //metode untuk proses upload dokumen ke sistem
    function proses()
    {
        $config['upload_path']          = './documents/file_manual';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|pdf|doc|docx|xlsx|xls|pptx';
        $config['max_size']             = 20480;
        $config['max_width']            = 10240;
        $config['max_height']           = 10240;
        $config['encrypt_name']            = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('berkas')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload/v_upload', $error);
        } else {

            $data['id_manual']          = '';
            $data['kd_manual']          = $this->input->post('kd_manual');
            $data['no_manual']          = $this->input->post('no_manual');
            $data['judul_manual']       = $this->input->post('judul_manual');
            $data['nm_manual']          = $this->upload->data("file_name");
            $data['keterangan_manual']  = $this->input->post('keterangan_manual');
            $data['tipe_manual']        = $this->upload->data('file_ext');
            $data['ukuran_manual']      = round($this->upload->data('file_size'));
            $this->db->insert('manual', $data);

            //contoh panggil helper log
            helper_log("upload", "Upload Document Manual");

            //load untuk kembali ke halaman keseluruhan data yang sudah di upload
            redirect('viewData');
        }
    }

    //metode untuk buka tampilan dokumen yang ada pada sistem
    public function index()
    {
        $data['manual'] = $this->db->get('manual'); //ambil tabel berkas dari db
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('upload/v_manual', $data);
        $this->load->view('templates/footer');
    }


    //metode untuk download berkas yg tadi di upload berdasarkan id berkas 
    function download($id)
    {
        $data = $this->db->get_where('manual', ['id_manual' => $id])->row();

        //contoh panggil helper log
        helper_log("download", "Download Document Manual");

        force_download('documents/file_manual/' . $data->nm_manual, NULL);
    }

    //metode delete dokumen by id
    public function deleteManById()
    {
        $id = $this->uri->segment(3);
        $this->load->model('m_upload');
        $this->m_upload->hapusManualById($id);
    }


    //=============================================================UPLOAD SOP ================================================================
    //metode untuk buka tampilan dokumen yang ada pada sistem
    public function viewSOP()
    {
        $data['berkas'] = $this->db->get('berkas'); //ambil tabel berkas dari db
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('upload/v_sop', $data);
        $this->load->view('templates/footer');
    }

    //metode untuk buka form upload dokumen sop
    function createSOP()
    {
        $this->load->model('m_upload');
        $x['kd_sop'] = $this->m_upload->buatKodeSOP(); //variabel untuk kode dokumen otomatis
        // var_dump($x['kd_sop']);die; 

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('upload/v_upload_sop', $x);
        $this->load->view('templates/footer');
    }

    //metode untuk proses upload dokumen ke sistem
    function prosesSOP()
    {
        // var_dump($_POST);die;
        $config['upload_path']          = './documents/file_sop';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|pdf|doc|docx|xlsx|xls|pptx';
        $config['max_size']             = 20480;
        $config['max_width']            = 10240;
        $config['max_height']           = 10240;
        $config['encrypt_name']         = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('berkas')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload/v_upload_sop', $error);
        } else {

            $data['id_sop']             = '';
            $data['kd_sop']             = $this->input->post('kd_sop');
            $data['no_sop']             = $this->input->post('no_sop');
            $data['judul_sop']          = $this->input->post('judul_sop');
            $data['nm_sop']             = $this->upload->data("file_name");
            $data['keterangan_sop']     = $this->input->post('keterangan_sop');
            $data['tipe_sop']           = $this->upload->data('file_ext');
            $data['ukuran_sop']         = round($this->upload->data('file_size'));
            $this->db->insert('berkas', $data);

            //contoh panggil helper log
            helper_log("upload", "Upload Document SOP");


            //load untuk kembali ke halaman keseluruhan data yang sudah di upload
            redirect('viewDataSOP');
        }
    }

    //metode untuk download berkas yg tadi di upload berdasarkan id berkas 
    function downloadSOP($id)
    {
        $data = $this->db->get_where('berkas', ['id_sop' => $id])->row();

        //contoh panggil helper log
        helper_log("download", "Download Document SOP");


        force_download('documents/file_sop/' . $data->nm_sop, NULL);
    }

    //metode delete dokumen by id
    public function deleteSOPById()
    {
        $id = $this->uri->segment(3);
        $this->load->model('m_upload');
        $this->m_upload->hapusSOPById($id);
    }

    //=============================================================UPLOAD MSDS ================================================================
    //metode untuk buka tampilan dokumen yang ada pada sistem
    public function viewMSDS()
    {
        $data['berkas_msds'] = $this->db->get('berkas_msds'); //ambil tabel berkas dari db
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('upload/v_berkas_msds', $data);
        $this->load->view('templates/footer');
    }

    //metode untuk buka form upload dokumen
    function createMSDS()
    {
        $this->load->model('m_upload');
        $x['kd_berkas_msds'] = $this->m_upload->buatKodeMSDS(); //variabel untuk kode dokumen otomatis
        // var_dump($x['kd_sop']);die; 

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('upload/v_upload_msds', $x);
        $this->load->view('templates/footer');
    }

    //metode untuk proses upload dokumen ke sistem
    function prosesMSDS()
    {
        // var_dump($_POST);die;
        $config['upload_path']          = './documents/file_msds';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|pdf|doc|docx|xlsx|xls|pptx';
        $config['max_size']             = 20480;
        $config['max_width']            = 10240;
        $config['max_height']           = 10240;
        $config['encrypt_name']         = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('berkas_msds')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload/v_upload_msds', $error);
        } else {

            $data['id_msds']                    = '';
            $data['kd_berkas_msds']             = $this->input->post('kd_berkas_msds');
            $data['no_berkas_msds']             = $this->input->post('no_berkas_msds');
            $data['judul_berkas_msds']          = $this->input->post('judul_berkas_msds');
            $data['nm_berkas_msds']             = $this->upload->data("file_name");
            $data['keterangan_berkas_msds']     = $this->input->post('keterangan_berkas_msds');
            $data['tipe_berkas_msds']           = $this->upload->data('file_ext');
            $data['ukuran_berkas_msds']         = round($this->upload->data('file_size'));
            $this->db->insert('berkas_msds', $data);

            //contoh panggil helper log
            helper_log("upload", "Upload Document MSDS & Safety Sign");

            //load untuk kembali ke halaman keseluruhan data yang sudah di upload
            redirect('viewDataMSDS');
        }
    }

    //metode untuk download berkas yg tadi di upload berdasarkan id berkas 
    function downloadMSDS($id)
    {
        $data = $this->db->get_where('berkas_msds', ['id_msds' => $id])->row();

        //contoh panggil helper log
        helper_log("download", "Download Document MSDS & Safety Sign");


        force_download('documents/file_msds/' . $data->nm_berkas_msds, NULL);
    }

    //metode delete dokumen by id
    public function deleteMSDSById()
    {
        $id = $this->uri->segment(3);
        $this->load->model('m_upload');
        $this->m_upload->hapusMSDSById($id);
    }


    //=============================================================UPLOAD IK ================================================================
    //metode untuk buka tampilan dokumen yang ada pada sistem
    public function viewIK()
    {
        $data['ik'] = $this->db->get('ik'); //ambil tabel berkas dari db
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('upload/v_ik', $data);
        $this->load->view('templates/footer');
    }

    //metode untuk buka form upload dokumen
    function createIK()
    {
        $this->load->model('m_upload');
        $x['kd_ik'] = $this->m_upload->buatKodeIK(); //variabel untuk kode dokumen otomatis
        // var_dump($x['kd_sop']);die; 

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('upload/v_upload_ik', $x);
        $this->load->view('templates/footer');
    }


    //metode untuk proses upload dokumen ke sistem
    function prosesIK()
    {
        // var_dump($_POST);die;
        $config['upload_path']          = './documents/file_ik';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|pdf|doc|docx|xlsx|xls|pptx';
        $config['max_size']             = 20480;
        $config['max_width']            = 10240;
        $config['max_height']           = 10240;
        $config['encrypt_name']         = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('ik')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload/v_upload_ik', $error);
        } else {


            $data['id_ik']          = '';
            $data['kd_ik']          = $this->input->post('kd_ik');
            $data['no_ik']          = $this->input->post('no_ik');
            $data['judul_ik']       = $this->input->post('judul_ik');
            $data['nm_ik']          = $this->upload->data("file_name");
            $data['keterangan_ik']  = $this->input->post('keterangan_ik');
            $data['tipe_ik']        = $this->upload->data('file_ext');
            $data['ukuran_ik']      = round($this->upload->data('file_size'));
            $this->db->insert('ik', $data);

            //contoh panggil helper log
            helper_log("upload", "Upload Document IK");


            //load untuk kembali ke halaman keseluruhan data yang sudah di upload
            redirect('viewDataIK');
        }
    }

    //metode untuk download berkas yg tadi di upload berdasarkan id berkas 
    function downloadIK($id)
    {
        $data = $this->db->get_where('ik', ['id_ik' => $id])->row();

        //contoh panggil helper log
        helper_log("download", "Download Document IK");

        force_download('documents/file_ik/' . $data->nm_ik, NULL);
    }

    //metode delete dokumen by id
    public function deleteIKById()
    {
        $id = $this->uri->segment(3);
        $this->load->model('m_upload');
        $this->m_upload->hapusIKById($id);
    }

    //=============================================================UPLOAD IAD ================================================================
    //metode untuk buka tampilan dokumen yang ada pada sistem
    public function viewIAD()
    {
        $data['berkas_iad'] = $this->db->get('berkas_iad'); //ambil tabel berkas dari db
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('upload/v_iad', $data);
        $this->load->view('templates/footer');
    }

    //metode untuk buka form upload dokumen
    function createIAD()
    {
        $this->load->model('m_upload');
        $x['kd_berkas_iad'] = $this->m_upload->buatKodeIAD(); //variabel untuk kode dokumen otomatis
        // var_dump($x['kd_sop']);die; 

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('upload/v_upload_iad', $x);
        $this->load->view('templates/footer');
    }


    //metode untuk proses upload dokumen ke sistem
    function prosesIAD()
    {
        // var_dump($_POST);die;
        $config['upload_path']          = './documents/file_iad';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|pdf|doc|docx|xlsx|xls|pptx';
        $config['max_size']             = 20480;
        $config['max_width']            = 10240;
        $config['max_height']           = 10240;
        $config['encrypt_name']            = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('berkas_iad')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload/v_upload_iad', $error);
        } else {

            $data['id_iad']                 = '';
            $data['kd_berkas_iad']          = $this->input->post('kd_berkas_iad');
            $data['no_berkas_iad']          = $this->input->post('no_berkas_iad');
            $data['judul_berkas_iad']       = $this->input->post('judul_berkas_iad');
            $data['nm_berkas_iad']          = $this->upload->data("file_name");
            $data['keterangan_berkas_iad']  = $this->input->post('keterangan_berkas_iad');
            $data['tipe_berkas_iad']        = $this->upload->data('file_ext');
            $data['ukuran_berkas_iad']      = round($this->upload->data('file_size'));
            $this->db->insert('berkas_iad', $data);

            //contoh panggil helper log
            helper_log("upload", "Upload Document IAD K3 & LINGKUNGAN");

            redirect('viewDataIAD');
        }
    }

    //metode untuk download berkas yg tadi di upload berdasarkan id berkas 
    function downloadIAD($id)
    {
        $data = $this->db->get_where('berkas_iad', ['id_iad' => $id])->row();

        //contoh panggil helper log
        helper_log("download", "Download Document IAD K3 & LINGKUNGAN");


        force_download('documents/file_iad/' . $data->nm_berkas_iad, NULL);
    }

    //metode delete dokumen by id
    public function deleteIADById()
    {
        $id = $this->uri->segment(3);
        $this->load->model('m_upload');
        $this->m_upload->hapusIADById($id);
    }

    //============================================================= UPLOAD FORM ================================================================
    //metode untuk buka tampilan dokumen yang ada pada sistem
    public function viewFORM()
    {
        $data['form'] = $this->db->get('form'); //ambil tabel berkas dari db
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('upload/v_form', $data);
        $this->load->view('templates/footer');
    }

    //metode untuk buka form upload dokumen
    function createFORM()
    {
        $this->load->model('m_upload');
        $x['kd_form'] = $this->m_upload->buatKodeFORM(); //variabel untuk kode dokumen otomatis
        // var_dump($x['kd_sop']);die; 

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('upload/v_upload_form', $x);
        $this->load->view('templates/footer');
    }


    //metode untuk proses upload dokumen ke sistem
    function prosesFORM()
    {
        // var_dump($_POST);die;
        $config['upload_path']          = './documents/file_form';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|pdf|doc|docx|xlsx|xls|pptx';
        $config['max_size']             = 20480;
        $config['max_width']            = 10240;
        $config['max_height']           = 10240;
        $config['encrypt_name']            = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('form')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload/v_upload_form', $error);
        } else {

            $data['id_form']            = '';
            $data['kd_form']            = $this->input->post('kd_form');
            $data['no_form']            = $this->input->post('no_form');
            $data['judul_form']         = $this->input->post('judul_form');
            $data['nm_form']            = $this->upload->data("file_name");
            $data['keterangan_form']    = $this->input->post('keterangan_form');
            $data['tipe_form']          = $this->upload->data('file_ext');
            $data['ukuran_form']        = round($this->upload->data('file_size'));
            $this->db->insert('form', $data);

            //contoh panggil helper log
            helper_log("upload", "Upload Document FORM");

            redirect('viewDataForm');
        }
    }

    //metode untuk download berkas yg tadi di upload berdasarkan id berkas 
    function downloadFORM($id)
    {
        $data = $this->db->get_where('form', ['id_form' => $id])->row();

        //contoh panggil helper log
        helper_log("download", "Download Document FORM");


        force_download('documents/file_form/' . $data->nm_form, NULL);
    }

    //metode delete dokumen by id
    public function deleteFORMById()
    {
        $id = $this->uri->segment(3);
        $this->load->model('m_upload');
        $this->m_upload->hapusFORMById($id);
    }

    //============================================================= UPLOAD VIDEO EDUKASI LK3 ================================================================
    //metode untuk buka tampilan VIDEO yang ada pada sistem
    public function viewVIDEO()
    {
        $data['videoEdukasi'] = $this->db->get('videoedukasi'); //ambil tabel video dari db
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('upload/v_videoEdukasi', $data);
        $this->load->view('templates/footer');
    }

    //metode untuk buka form upload video
    public function createVIDEO()
    {
        $this->load->model('m_upload');
        $x['kd_video'] = $this->m_upload->buatKodeVIDEO(); //variabel untuk kode video otomatis
        // var_dump($x['kd_video']);die; 

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('upload/v_upload_video', $x);
        $this->load->view('templates/footer');
    }

    //metode untuk proses upload video ke sistem
    public function prosesVIDEO()
    {
        // var_dump($_POST);die;
        $config['upload_path']          = './video/f_vidEdukasi';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|mkv|mp4|mov|MPEG|MPG|WebM|WMV|pdf|doc|docx|xlsx|xls|pptx';
        $config['max_size']             = 1000480;
        $config['max_width']            = 1000480;
        $config['max_height']           = 1000480;
        $config['encrypt_name']            = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('video')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload/v_upload_video', $error);
        } else {

            $data['id_video']           = '';
            $data['kd_video']           = $this->input->post('kd_video');
            $data['no_video']           = $this->input->post('no_video');
            $data['judul_video']        = $this->input->post('judul_video');
            $data['nm_video']           = $this->upload->data("file_name");
            $data['keterangan_video']   = $this->input->post('keterangan_video');
            $data['tipe_video']         = $this->upload->data('file_ext');
            $data['ukuran_video']       = round($this->upload->data('file_size'));
            $this->db->insert('videoedukasi', $data);

            //contoh panggil helper log
            helper_log("upload", "Upload Video Edukasi");

            //load ke halaman tampilan keseluruhan data yang di upload
            redirect('viewDataVideo');
        }
    }


    //metode untuk download video yg tadi di upload berdasarkan id video 
    function downloadVIDEO($id)
    {
        $data = $this->db->get_where('videoedukasi', ['id_video' => $id])->row();

        //contoh panggil helper log
        helper_log("download", "Download Video Edukasi LK3");


        force_download('video/f_videdukasi/' . $data->nm_video, NULL);
    }

    //metode delete video by id
    public function deleteVideoById()
    {
        $id = $this->uri->segment(3);
        $this->load->model('m_upload');
        $this->m_upload->hapusVideoById($id);
    }


    //============================================================= MENU DOWNLOAD VIDEO SI ================================================================
    //metode untuk download video safety induction
    public function getVideoSI()
    {
        //load view
        $this->load->view('templates/header');
        // $this->load->view('upload/v_berkas');
        $this->load->view('templates/footer');


        $data = file_get_contents(base_url() . 'video/video_si_ptcbi.mp4');
        $name = "video_safety_induction.mp4";

        force_download($name, $data);
    }
}