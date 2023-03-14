<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
 
    class Unggah extends CI_Controller {
            function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('logged_in') == FALSE){
                redirect('login');
            }
            $this->load->model('m_login');
            $this->load->model('m_upload');
        }

        //================================================================ Upload Manual =====================================================
        //metode untuk buka form upload dokumen
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
        function proses(){
            $config['upload_path']          = './documents/file_manual';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|pdf|doc|docx|xlsx';
            $config['max_size']             = 20480;
            $config['max_width']            = 10240;
            $config['max_height']           = 10240;
            $config['encrypt_name']			= FALSE;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('berkas'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload/v_upload', $error);
            }else{
                $data['kd_manual'] = $this->input->post('kd_manual');
                $data['no_manual'] = $this->input->post('no_manual');
                $data['judul_manual'] = $this->input->post('judul_manual');
                $data['nm_manual'] = $this->upload->data("file_name");
                $data['keterangan_manual'] = $this->input->post('keterangan_manual');
                $data['tipe_manual'] = $this->upload->data('file_ext');
                $data['ukuran_manual'] = $this->upload->data('file_size');
                $this->db->insert('manual', $data);
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
            $data = $this->db->get_where('manual',['id_manual'=>$id])->row();
            force_download('documents/file_manual/'.$data->nm_manual,NULL);
        }

        //metode untuk download file video
        // public function getVideo()
        // {
        //     //load view
        //     $this->load->view('templates/header');
        //     // $this->load->view('upload/v_berkas');
        //     $this->load->view('templates/footer');


        //     $data = file_get_contents(base_url().'video/video_si_ptcbi.mp4');
        //     $name = "video_safety_induction.mp4";

        //     force_download($name, $data);
        // }

        //metode untuk download file pdf ke 1
        // public function getDoc1()
        // {
        //     //load view
        //     $this->load->view('templates/header');
        //     // $this->load->view('upload/v_berkas');
        //     $this->load->view('templates/footer');


        //     $data = file_get_contents(base_url().'documents/IKS_System_-_POV_PIC_PT_CBI.pdf');
        //     $name = "iks_system_pov_cbi.pdf";

        //     force_download($name, $data);
        // }

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

        //metode untuk buka form upload dokumen
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
        function prosesSOP(){
            // var_dump($_POST);die;
            $config['upload_path']          = './documents/file_sop';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|pdf|doc|docx|xlsx|xls';
            $config['max_size']             = 20480;
            $config['max_width']            = 10240;
            $config['max_height']           = 10240;
            $config['encrypt_name']			= FALSE;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('berkas'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload/v_upload_sop', $error);
            }else{
                $data['kd_sop'] = $this->input->post('kd_sop');
                $data['no_sop'] = $this->input->post('no_sop');
                $data['judul_sop'] = $this->input->post('judul_sop');
                $data['nm_sop'] = $this->upload->data("file_name");
                $data['keterangan_sop'] = $this->input->post('keterangan_sop');
                $data['tipe_sop'] = $this->upload->data('file_ext');
                $data['ukuran_sop'] = $this->upload->data('file_size');
                $this->db->insert('berkas', $data);
                redirect('viewDataSOP');
            }
        }

        //metode untuk download berkas yg tadi di upload berdasarkan id berkas 
        function downloadSOP($id)
        { 
            $data = $this->db->get_where('berkas',['id_sop'=>$id])->row();
            force_download('documents/file_sop/'.$data->nm_sop,NULL);
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
        function prosesMSDS(){
            // var_dump($_POST);die;
            $config['upload_path']          = './documents/file_msds';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|pdf|doc|docx|xlsx|xls';
            $config['max_size']             = 20480;
            $config['max_width']            = 10240;
            $config['max_height']           = 10240;
            $config['encrypt_name']			= FALSE;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('berkas_msds'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload/v_upload_msds', $error);
            }else{
                $data['kd_berkas_msds'] = $this->input->post('kd_berkas_msds');
                $data['no_berkas_msds'] = $this->input->post('no_berkas_msds');
                $data['judul_berkas_msds'] = $this->input->post('judul_berkas_msds');
                $data['nm_berkas_msds'] = $this->upload->data("file_name");
                $data['keterangan_berkas_msds'] = $this->input->post('keterangan_berkas_msds');
                $data['tipe_berkas_msds'] = $this->upload->data('file_ext');
                $data['ukuran_berkas_msds'] = $this->upload->data('file_size');
                $this->db->insert('berkas_msds', $data);
                redirect('viewDataMSDS');
            }
        }

        //metode untuk download berkas yg tadi di upload berdasarkan id berkas 
        function downloadMSDS($id)
        { 
            $data = $this->db->get_where('berkas_msds',['id_msds'=>$id])->row();
            force_download('documents/file_msds/'.$data->nm_berkas_msds,NULL);
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
        function prosesIK(){
            // var_dump($_POST);die;
            $config['upload_path']          = './documents/file_ik';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|pdf|doc|docx|xlsx|xls';
            $config['max_size']             = 20480;
            $config['max_width']            = 10240;
            $config['max_height']           = 10240;
            $config['encrypt_name']			= FALSE;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('ik'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload/v_upload_ik', $error);
            }else{
                $data['kd_ik'] = $this->input->post('kd_ik');
                $data['no_ik'] = $this->input->post('no_ik');
                $data['judul_ik'] = $this->input->post('judul_ik');
                $data['nm_ik'] = $this->upload->data("file_name");
                $data['keterangan_ik'] = $this->input->post('keterangan_ik');
                $data['tipe_ik'] = $this->upload->data('file_ext');
                $data['ukuran_ik'] = $this->upload->data('file_size');
                $this->db->insert('ik', $data);
                redirect('viewDataIK');
            }
        }

        //metode untuk download berkas yg tadi di upload berdasarkan id berkas 
        function downloadIK($id)
        { 
            $data = $this->db->get_where('ik',['id_ik'=>$id])->row();
            force_download('documents/file_ik/'.$data->nm_ik,NULL);
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
        function prosesIAD(){
            // var_dump($_POST);die;
            $config['upload_path']          = './documents/file_iad';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|pdf|doc|docx|xlsx|xls';
            $config['max_size']             = 20480;
            $config['max_width']            = 10240;
            $config['max_height']           = 10240;
            $config['encrypt_name']			= FALSE;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('berkas_iad'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload/v_upload_iad', $error);
            }else{
                $data['kd_berkas_iad'] = $this->input->post('kd_berkas_iad');
                $data['no_berkas_iad'] = $this->input->post('no_berkas_iad');
                $data['judul_berkas_iad'] = $this->input->post('judul_berkas_iad');
                $data['nm_berkas_iad'] = $this->upload->data("file_name");
                $data['keterangan_berkas_iad'] = $this->input->post('keterangan_berkas_iad');
                $data['tipe_berkas_iad'] = $this->upload->data('file_ext');
                $data['ukuran_berkas_iad'] = $this->upload->data('file_size');
                $this->db->insert('berkas_iad', $data);
                redirect('viewDataIAD');
            }
        }

        //metode untuk download berkas yg tadi di upload berdasarkan id berkas 
        function downloadIAD($id)
        { 
            $data = $this->db->get_where('berkas_iad',['id_iad'=>$id])->row();
            force_download('documents/file_iad/'.$data->nm_berkas_iad,NULL);
        }

        //=============================================================UPLOAD FORM ================================================================
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
        function prosesFORM(){
            // var_dump($_POST);die;
            $config['upload_path']          = './documents/file_form';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|pdf|doc|docx|xlsx|xls';
            $config['max_size']             = 20480;
            $config['max_width']            = 10240;
            $config['max_height']           = 10240;
            $config['encrypt_name']			= FALSE;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('form'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload/v_upload_form', $error);
            }else{
                $data['kd_form'] = $this->input->post('kd_form');
                $data['no_form'] = $this->input->post('no_form');
                $data['judul_form'] = $this->input->post('judul_form');
                $data['nm_form'] = $this->upload->data("file_name");
                $data['keterangan_form'] = $this->input->post('keterangan_form');
                $data['tipe_form'] = $this->upload->data('file_ext');
                $data['ukuran_form'] = $this->upload->data('file_size');
                $this->db->insert('form', $data);
                redirect('viewDataForm');
            }
        }

        //metode untuk download berkas yg tadi di upload berdasarkan id berkas 
        function downloadFORM($id)
        { 
            $data = $this->db->get_where('form',['id_form'=>$id])->row();
            force_download('documents/file_form/'.$data->nm_form,NULL);
        }



    }
?>