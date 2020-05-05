<?php

class Peserta extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model('Akademik_model');
        
        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
		}
    }

    public function reguler(){
        $data['title'] = 'Peserta Reguler';
        $data['tabs'] = 'reguler';
        $data['peserta'] = $this->Akademik_model->get_all_peserta_reguler();
        
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('peserta/peserta_reguler', $data);
        $this->load->view('templates/footer');
    }

    public function pvkhusus(){
        $data['title'] = 'Peserta Pv Khusus';
        $data['tabs'] = 'pv khusus';
        $data['peserta'] = $this->Akademik_model->get_all_peserta_pv_khusus();
        
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('peserta/peserta_privat', $data);
        $this->load->view('templates/footer');
    }
    
    public function pvluar(){
        $data['title'] = 'Peserta Pv Luar';
        $data['tabs'] = 'pv luar';
        $data['peserta'] = $this->Akademik_model->get_all_peserta_pv_luar();
        
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('peserta/peserta_privat', $data);
        $this->load->view('templates/footer');
    }

    // get
        public function get_detail_peserta(){
            $data = $this->Akademik_model->get_detail_peserta();
            echo json_encode($data);
        }
    // get

    // edit
        public function edit_data_peserta_reguler(){
            $data = $this->Akademik_model->edit_data_peserta_reguler();
            
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil mengubah data peserta<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function edit_data_peserta_privat(){
            $data = $this->Akademik_model->edit_data_peserta_privat();
            
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil mengubah data peserta<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
    // edit
}