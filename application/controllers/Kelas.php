<?php

class Kelas extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model('Akademik_model');
        $this->load->model('Main_model');
        ini_set('xdebug.var_display_max_depth', '10');
        ini_set('xdebug.var_display_max_children', '256');
        ini_set('xdebug.var_display_max_data', '1024');
        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
		}
    }

    public function reguler($status){
        $data['tabs'] = 'reguler';
        if($status == "nonaktif"){
            $data['title'] = 'Kelas Reguler Nonaktif';
            // $kelas = $this->Akademik_model->get_all_kelas_reguler();
            $kelas = $this->Main_model->get_all("kelas_reguler", ["status" => "nonaktif"]);
        } else {
            $data['title'] = 'Kelas Reguler Aktif';
            // $kelas = $this->Akademik_model->get_all_kelas_reguler();
            $kelas = $this->Main_model->get_all("kelas_reguler", ["status" => "aktif"]);
        }

        // $data['reg_aktif'] = COUNT($this->Main_model->get_all("kelas_reguler", ["status" => "aktif"]));

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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('kelas/kelas_reguler', $data);
        $this->load->view('templates/footer');
    }

    public function pvkhusus($status){
        if($status == "nonaktif"){
            $data['title'] = 'Kelas PV Khusus Nonaktif';
            $kelas = $this->Main_model->get_all("kelas_pv_khusus", ["status" => "nonaktif"], "nama_peserta");
        } else {
            $data['title'] = 'Kelas PV Khusus Aktif';
            $kelas = $this->Main_model->get_all("kelas_pv_khusus", ["status" => "aktif"], "nama_peserta");
        }
        $data['tabs'] = 'pv khusus';
        foreach ($kelas as $i => $kelas) {
            $data['kelas'][$i]['data'] = $kelas;
            $data['kelas'][$i]['peserta'] = COUNT($this->Akademik_model->get_peserta_aktif_by_kelas($kelas['id_kelas']));
        }
        
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('kelas/kelas_privat', $data);
        $this->load->view('templates/footer');
    }
    
    public function pvluar($status){
        if($status == "nonaktif"){
            $data['title'] = 'Kelas PV Luar Nonaktif';
            $kelas = $this->Main_model->get_all("kelas_pv_luar", ["status" => "nonaktif"], "nama_peserta");
        } else {
            $data['title'] = 'Kelas PV Luar Aktif';
            $kelas = $this->Main_model->get_all("kelas_pv_luar", ["status" => "aktif"], "nama_peserta");
        }
        $data['tabs'] = 'pv luar';
        foreach ($kelas as $i => $kelas) {
            $data['kelas'][$i]['data'] = $kelas;
            $data['kelas'][$i]['peserta'] = COUNT($this->Akademik_model->get_peserta_aktif_by_kelas($kelas['id_kelas']));
        }
        
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('kelas/kelas_privat', $data);
        $this->load->view('templates/footer');
    }

    public function kbm($tipe){
        if($tipe == "pvkhusus"){
            $data['title'] = "KBM Pv Khusus";
            $tipe = "pv khusus";
        } else if($tipe == "pvluar"){
            $data['title'] = "KBM Pv Luar";
            $tipe = "pv luar";
        } else if($tipe == "reguler"){
            $data['title'] = "KBM Reguler";
            $tipe = "reguler";
        }
        
        $jadwal = $this->Main_model->get_join_two("*, a.tempat as tempat", "jadwal as a", "kelas as b", ["a.id_kelas = b.id_kelas"], ["a.status" => "aktif", "tipe_kelas" => $tipe, "b.status" => "aktif"]);
        foreach ($jadwal as $i => $jadwal) {
            $data['kbm'][$i]['kbm'] = $this->Main_model->get_all("kbm", ["id_jadwal" => $jadwal['id_jadwal'], "MONTH(tgl)" => date('m'), "YEAR(tgl)" => date('Y')]);
            $data['kbm'][$i]['jadwal'] = $jadwal;
            $data['kbm'][$i]['kpq'] = $this->Main_model->get_one("kpq", ["nip" => $jadwal['nip']]);
            $id_peserta = $this->Main_model->get_one("kelas_koor", ["id_kelas" => $jadwal['id_kelas']]);
            if($id_peserta){
                $peserta = $this->Main_model->get_one("peserta", ["id_peserta" => $id_peserta['id_peserta']]);
                $data['kbm'][$i]['koor'] = $peserta['nama_peserta'];
            } else {
                $data['kbm'][$i]['koor'] = "LKP TAR-Q";
            }
        }

        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('kelas/kbm', $data);
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

        public function get_koor_kelas(){
            $tipe = $this->input->post("tipe");
            $kelas = $this->Main_model->get_all_join_table("kelas", "kelas_koor", "id_kelas", ["tipe_kelas" => $tipe, "status" => "aktif"]);
            foreach ($kelas as $i => $kelas) {
                $data['kelas'][$i] = $kelas;
                $peserta = $this->Main_model->get_one("peserta", ["id_peserta" => $kelas['id_peserta']]);
                $data['kelas'][$i]['peserta'] = $peserta['nama_peserta'];
            }

            usort($data['kelas'], function($a, $b) {
                return $a['peserta'] <=> $b['peserta'];
            });

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
        
        public function pindah_takhosus(){
            $id_peserta = $this->input->post("id_peserta", TRUE);
            if($id_peserta){
                // $this->Akademik_model->pindah_peserta_reguler_wl();
                // $id_peserta = $this->input->post("id_peserta", TRUE);
                foreach ($id_peserta as $id_peserta) {
                    $data = [
                        "program" => $this->input->post("program", TRUE),
                        "hari" => $this->input->post("hari", TRUE),
                        "jam" => $this->input->post("jam", TRUE),
                        "status" => 'takhosus'
                    ];

                    $this->Main_model->edit_data("peserta", ["id_peserta" => $id_peserta], $data);
                }
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i>Berhasil memindahkan peserta ke takhosus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');        
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-times-circle text-danger mr-1"></i> Gagal memindahkan peserta ke takhosus, karena tidak ada peserta yang dipilih<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function pindah_peserta_privat(){
            // var_dump($_POST);
            $id_peserta = $this->input->post("id_peserta", TRUE);
            $id_kelas = $this->input->post("id_kelas_pindah", TRUE);
            if(!empty($id_peserta) && !empty($id_kelas)){
                foreach ($id_peserta as $peserta) {
                    $cek = $this->Main_model->get_one("kelas_koor", ["id_peserta" => $peserta]);
                    if($cek){
                        break;
                    }
                }

                if($cek){
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-times-circle text-danger mr-1"></i> Gagal memindahkan peserta ke kelas lain, ganti koordinator kelas terlebih dahulu<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                } else {
                    foreach ($id_peserta as $id_peserta) {
                        $this->Main_model->edit_data("peserta", ["id_peserta" => $id_peserta], ["id_kelas" => $id_kelas]);
                    }
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i> Berhasil memindahkan peserta<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-times-circle text-danger mr-1"></i> Gagal memindahkan peserta ke kelas lain, data yang diinputkan tidak lengkap<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function nonaktif_peserta(){
            $id_peserta = $this->input->post("id_peserta", TRUE);
            if($id_peserta){
                foreach ($id_peserta as $id_peserta) {
                    $this->Akademik_model->nonaktif_peserta($id_peserta);

                    // input history
                    // tampilkan data peserta
                    $peserta = $this->Main_model->get_one("peserta", ["id_peserta" => $id_peserta]);
                    if($peserta['tipe_peserta'] == "reguler"){
                        // tampilkan kelas
                        $kelas = $this->Main_model->get_one("kelas", ["id_kelas" => $peserta['id_kelas']]);
                        // tampilkan jadwal
                        $jadwal = $this->Main_model->get_one("jadwal", ["id_kelas" => $kelas['id_kelas'], "status" => "aktif"]);
                        // tampilkan kpq
                        $kpq = $this->Main_model->get_one("kpq", ["nip" => $kelas['nip']]);
                        $data = [
                            "id_peserta" => $id_peserta,
                            "nama_kpq" => $kpq['nama_kpq'],
                            "hari" => $jadwal['hari'],
                            "jam" => $jadwal['jam'],
                            "tipe" => $kelas['tipe_kelas'],
                            "program" => $kelas['program'],
                            "nama_peserta" => $peserta['nama_peserta'],
                            "tempat" => $jadwal['tempat'],
                            "status" => "nonaktif",
                            "tgl_history" => $this->input->post("tgl_history", TRUE)
                        ];
    
                        $this->Main_model->add_data("history_peserta", $data);
                    }
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
            $id_kelas = $this->input->post("id_kelas", TRUE);
            $kelas = $this->Main_model->get_one("kelas", ["id_kelas" => $id_kelas]);
            $id_koor = $this->Main_model->get_one("kelas_koor", ["id_kelas" => $id_kelas]);
            $peserta = $this->Main_model->get_one("peserta", ["id_peserta" => $id_koor['id_peserta']]);
            $kpq = $this->Main_model->get_one("kpq", ["nip" => $kelas['nip']]);
            
            $id_jadwal = $this->input->post("id_jadwal", TRUE);
            if($id_jadwal){
                foreach ($id_jadwal as $id_jadwal) {
                    $this->Akademik_model->nonaktif_jadwal($id_jadwal);
                    $jadwal = $this->Main_model->get_one("jadwal", ["id_jadwal" => $id_jadwal]);

                    if($id_kelas){
                        // input ke history
                            $data = [
                                "id_kelas" => $id_kelas,
                                "nama_kpq" => $kpq['nama_kpq'],
                                "hari" => $jadwal['hari'],
                                "jam" => $jadwal['jam'],
                                "tipe" => $kelas['tipe_kelas'],
                                "program" => $kelas['program'],
                                "koordinator" => $peserta['nama_peserta'],
                                "alamat" => $jadwal['tempat'],
                                "status" => "nonaktif",
                                "tgl_history" => $this->input->post("tgl_history", TRUE)
                            ];
                            $this->Main_model->add_data("history_jadwal", $data);
                    }
                }
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i>Berhasil menonaktifkan jadwal<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-times-circle text-danger mr-1"></i> Gagal menonaktifkan jadwal, karena tidak ada jadwal yang dipilih<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function editstatus($id_kelas, $status){
            $data = [
                "status" => $status
            ];
            $result = $this->Main_model->edit_data("kelas", ["id_kelas" => $id_kelas], $data);
            if($result){
                if($status == "aktif")
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i> Berhasil mengaktifkan kelas<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                elseif($status == "nonaktif")
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i> Berhasil menonaktifkan kelas<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-times-circle text-danger mr-1"></i> Gagal metubah status kelas<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function nonaktif_kelas_privat(){
            $id_kelas = $this->input->post("id_kelas", TRUE);
            $kelas = $this->Main_model->get_one("kelas", ["id_kelas" => $id_kelas]);
            $id_koor = $this->Main_model->get_one("kelas_koor", ["id_kelas" => $id_kelas]);
            $kpq = $this->Main_model->get_one("kpq", ["nip" => $kelas['nip']]);

            $data = [
                "id_kelas" => $id_kelas,
                "nama_kpq" => $kpq['nama_kpq'],
                "tipe" => $kelas['tipe_kelas'],
                "program" => $kelas['program'],
                "koordinator" => $this->input->post("koor", TRUE),
                "alamat" => $kelas['tempat'],
                "status" => "nonaktif",
                "tgl_history" => $this->input->post("tgl_history", TRUE)
            ];

            $this->Main_model->add_data("history_kelas", $data);

            $this->Main_model->edit_data("kelas", ["id_kelas" => $id_kelas], ["status" => "nonaktif"]);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i> Berhasil menonaktifkan kelas<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function pindah_wl(){
            $id_kelas = $this->input->post("id_kelas", TRUE);

            $data = [
                "catatan" => $this->input->post("catatan", TRUE),
                "tempat" => $this->input->post("tempat", TRUE),
                "status" => "wl",
                "nip" => NULL
            ];
            $this->Main_model->edit_data("kelas", ["id_kelas" => $id_kelas], $data);

            $this->Main_model->edit_data("jadwal", ["id_kelas" => $id_kelas], ["status" => "nonaktif"]);
            
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i> Berhasil memindahkan ke waiting list<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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
            
            redirect('kelas/reguler/aktif');
        }

        public function add_badal(){
            $tgl = $this->input->post("tgl");
            $id = $this->session->userdata("id");
            $id_jadwal = $this->session->userdata("id_jadwal");
            $data = $this->Main_model->get_one("kbm", ["tgl" => $tgl, "nip" => $id, "id_jadwal" => $id_jadwal]);
            if($data){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-times-circle text-danger mr-1"></i> Gagal menginputkan badal<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            } else {
                $result = $this->Akademik_model->add_badal();
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i> Berhasil menginputkan badal<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    // add data

    
    public function konfirm_badal($id){
        $this->Akademik_model->konfirm_badal($id);
        
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil mengkonfirmasi badal<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}