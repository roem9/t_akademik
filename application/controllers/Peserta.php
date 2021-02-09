<?php

class Peserta extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model('Akademik_model');
        $this->load->model('Main_model');
        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
		}
    }

    public function reguler($status){
        if($status == "nonaktif"){
            $data['title'] = 'Peserta Reguler Nonaktif';
            $data['peserta'] = $this->Main_model->get_all("peserta_reguler", ["status" => "nonaktif"], "nama_peserta", "ASC");
        } else {
            $data['title'] = 'Peserta Reguler Aktif';
            $data['peserta'] = $this->Main_model->get_all("peserta_reguler", ["status" => "aktif"], "nama_peserta", "ASC");
        }
        $data['tabs'] = 'reguler';

        $data['status'] = $status;
        
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('peserta/peserta_reguler', $data);
        $this->load->view('templates/footer');
    }

    public function pvkhusus($status){
        if($status == "nonaktif"){
            $data['title'] = 'Peserta Pv Khusus Nonaktif';
            $data['peserta'] = $this->Main_model->get_all("peserta_pv_khusus", ["status" => "nonaktif"], "nama_peserta", "ASC");
        } else {
            $data['title'] = 'Peserta Pv Khusus Aktif';
            $data['peserta'] = $this->Main_model->get_all("peserta_pv_khusus", ["status" => "aktif"], "nama_peserta", "ASC");
        }
        $data['tabs'] = 'pv khusus';

        $data['status'] = $status;
        
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('peserta/peserta_privat', $data);
        $this->load->view('templates/footer');
    }
    
    public function pvluar($status){
        if($status == "nonaktif"){
            $data['title'] = 'Peserta Pv Luar Nonaktif';
            $data['tabs'] = 'pv luar';
            // $data['peserta'] = $this->Akademik_model->get_all_peserta_pv_luar();
            $data['peserta'] = $this->Main_model->get_all("peserta_pv_luar", ["status" => "nonaktif"], "nama_peserta", "ASC");
        } else {
            $data['title'] = 'Peserta Pv Luar Aktif';
            $data['tabs'] = 'pv luar';
            // $data['peserta'] = $this->Akademik_model->get_all_peserta_pv_luar();
            $data['peserta'] = $this->Main_model->get_all("peserta_pv_luar", ["status" => "aktif"], "nama_peserta", "ASC");
        }
        
        $data['status'] = $status;

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
            
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle mr-1 text-success"></i>Berhasil mengubah data peserta<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function edit_data_peserta_privat(){
            $data = $this->Akademik_model->edit_data_peserta_privat();
            
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle mr-1 text-success"></i>Berhasil mengubah data peserta<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function pindah_peserta_reguler_wl(){
            $id_peserta = $this->input->post("id_peserta", TRUE);
            $data = [
                "program" => $this->input->post("program", TRUE),
                "hari" => $this->input->post("hari", TRUE),
                "jam" => $this->input->post("jam", TRUE),
                "status" => 'wl'
            ];
            
            // edit_data($table, $where, $data)
            $this->Main_model->edit_data("peserta", ["id_peserta" => $id_peserta], $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i>Berhasil memindahkan peserta ke waiting list<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function edit_status_peserta($id, $status){
            $this->Main_model->edit_data("peserta", ["id_peserta" => $id], ["status" => $status]);
            if($status == "aktif"){
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i>Berhasil mengaktifkan peserta<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            } else if($status == "nonaktif"){
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i>Berhasil menonaktifkan peserta<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    // edit
}