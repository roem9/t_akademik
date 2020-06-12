<?php

class Kelas extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model('Akademik_model');
        $this->load->model('Akademik_model');
        ini_set('xdebug.var_display_max_depth', '10');
        ini_set('xdebug.var_display_max_children', '256');
        ini_set('xdebug.var_display_max_data', '1024');
        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
		}
    }

    public function reguler(){
        $data['title'] = 'Kelas Reguler';
        $data['tabs'] = 'reguler';
        $kelas = $this->Akademik_model->get_all_kelas_reguler();
        foreach ($kelas as $i => $kelas) {
            $data['kelas'][$i]['data'] = $kelas;
            $data['kelas'][$i]['peserta'] = COUNT($this->Akademik_model->get_peserta_aktif_by_kelas($kelas['id_kelas']));
        }
        
        $kelas = $this->Akademik_model->get_kelas_reguler_aktif();
        foreach ($kelas as $i => $kelas) {
            $data['kelas_reg'][$i]['data'] = $kelas;
            $data['kelas_reg'][$i]['peserta'] = COUNT($this->Akademik_model->get_peserta_aktif_by_kelas($kelas['id_kelas']));
        }
        
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();
        // ini_set('xdebug.var_display_max_depth', '10');
        // ini_set('xdebug.var_display_max_children', '256');
        // ini_set('xdebug.var_display_max_data', '1024');
        // var_dump($data);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        // $this->load->view('modal/modal_kelas_reguler', $data);
        $this->load->view('kelas/kelas_reguler', $data);
        $this->load->view('templates/footer');
    }

    public function pvkhusus(){
        $data['title'] = 'Kelas Pv Khusus';
        $data['tabs'] = 'pv khusus';
        $kelas = $this->Akademik_model->get_all_kelas_pv_khusus();
        foreach ($kelas as $i => $kelas) {
            $data['kelas'][$i]['data'] = $kelas;
            $data['kelas'][$i]['peserta'] = COUNT($this->Akademik_model->get_peserta_aktif_by_kelas($kelas['id_kelas']));
        }
        
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();
        // ini_set('xdebug.var_display_max_depth', '10');
        // ini_set('xdebug.var_display_max_children', '256');
        // ini_set('xdebug.var_display_max_data', '1024');
        // var_dump($data);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('kelas/kelas_privat', $data);
        $this->load->view('templates/footer');
    }
    
    public function pvluar(){
        $data['title'] = 'Kelas Pv Luar';
        $data['tabs'] = 'pv luar';
        $kelas = $this->Akademik_model->get_all_kelas_pv_luar();
        foreach ($kelas as $i => $kelas) {
            $data['kelas'][$i]['data'] = $kelas;
            $data['kelas'][$i]['peserta'] = COUNT($this->Akademik_model->get_peserta_aktif_by_kelas($kelas['id_kelas']));
        }
        
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();
        // ini_set('xdebug.var_display_max_depth', '10');
        // ini_set('xdebug.var_display_max_children', '256');
        // ini_set('xdebug.var_display_max_data', '1024');
        // var_dump($data);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('kelas/kelas_privat', $data);
        $this->load->view('templates/footer');
    }

    // get data
        public function get_data_kelas_reguler(){
            $data = $this->Akademik_model->get_data_kelas_reguler();
            echo json_encode($data);
        }
        
        public function get_data_kelas_privat(){
            $data = $this->Akademik_model->get_data_kelas_privat();
            echo json_encode($data);
        }

        public function get_data_jadwal_aktif_by_kelas(){
            $id = $this->input->post("id");
            $data = $this->Akademik_model->get_data_jadwal_aktif_by_kelas($id);
            echo json_encode($data);
        }

        public function get_peserta_aktif_by_kelas(){
            $id = $this->input->post("id");
            $data = $this->Akademik_model->get_peserta_aktif_by_kelas($id);
            echo json_encode($data);
        }
        
        public function get_peserta_nonaktif_by_kelas(){
            $id = $this->input->post("id");
            $data = $this->Akademik_model->get_peserta_nonaktif_by_kelas($id);
            echo json_encode($data);
        }
        
    // get data

    // edit data
        public function edit_kelas_reguler(){
            $this->Akademik_model->edit_kelas_reguler();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i>Berhasil mengubah data kelas<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        public function edit_kelas_privat(){
            $this->Akademik_model->edit_kelas_privat();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i>Berhasil mengubah data kelas<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function pindah_kelas_reguler(){
            // var_dump($_POST);
            
            $id = $this->input->post("id_peserta", TRUE);
            $id_kelas = $this->input->post("id", TRUE);

            $peserta = COUNT($this->Akademik_model->get_peserta_aktif_by_kelas($id_kelas));
            if($id){
                if($peserta + sizeof($id) <= 10){
                    foreach ($id as $id) {
                        $this->Akademik_model->pindah_kelas_reguler($id, $id_kelas);
                    }
    
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i>Berhasil memindahkan peserta<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-times-circle text-danger mr-1"></i> Kelas penuh, gagal memindahkan peserta<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-times-circle text-danger mr-1"></i> Gagal memindahkan peserta, karena tidak ada peserta yang dipilih<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
            
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function pindah_peserta_reguler_wl(){
            $id_peserta = $this->input->post("id_peserta", TRUE);
            if($id_peserta){
                $this->Akademik_model->pindah_peserta_reguler_wl();
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i>Berhasil memindahkan peserta ke waiting list<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');        
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-times-circle text-danger mr-1"></i> Gagal memindahkan peserta ke waiting list, karena tidak ada peserta yang dipilih<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function nonaktif_peserta(){
            $id_peserta = $this->input->post("id_peserta", TRUE);
            if($id_peserta){
                foreach ($id_peserta as $id_peserta) {
                    $this->Akademik_model->nonaktif_peserta($id_peserta);
                }
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i>Berhasil menonaktifkan peserta<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-times-circle text-danger mr-1"></i> Gagal menonaktifkan peserta, karena tidak ada peserta yang dipilih<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        public function aktifkan_peserta(){
            $id_peserta = $this->input->post("id_peserta", TRUE);
            if($id_peserta){
                foreach ($id_peserta as $id_peserta) {
                    $this->Akademik_model->aktifkan_peserta($id_peserta);
                }
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i>Berhasil mengaktifkan kembali peserta<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-times-circle text-danger mr-1"></i> Gagal mengaktifkan peserta, karena tidak ada peserta yang dipilih<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function nonaktif_jadwal(){
            $id_jadwal = $this->input->post("id_jadwal", TRUE);
            if($id_jadwal){
                foreach ($id_jadwal as $id_jadwal) {
                    $this->Akademik_model->nonaktif_jadwal($id_jadwal);
                }
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i>Berhasil menonaktifkan jadwal<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-times-circle text-danger mr-1"></i> Gagal menonaktifkan jadwal, karena tidak ada jadwal yang dipilih<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    // edit data

    // add data
        public function add_jadwal(){
            $this->Akademik_model->add_jadwal();
            
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i>Berhasil menambahkan jadwal<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function add_kelas_reguler(){
            $this->Akademik_model->add_kelas_reguler();
            
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i>Berhasil menambahkan kelas reguler<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect('kelas/reguler');
        }
    // add data
}