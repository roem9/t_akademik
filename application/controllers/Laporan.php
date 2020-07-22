<?php

class Laporan extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model("Akademik_model");
        $this->load->model("Main_model");
        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
		}
    }

    public function rekap(){
        if($this->input->post("bulan")){
            $data['bulan'] = $this->input->post("bulan");
            $data['tahun'] = $this->input->post("tahun");
        } else {
            $data['bulan'] = date("n");
            $data['tahun'] = date("Y");
        }

        $month = ["1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli","8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
        
        $data['title'] = "Rekap KBM {$month[$data['bulan']]} {$data['tahun']}";

        $kpq = $this->Akademik_model->get_all_kpq_aktif();
        foreach ($kpq as $i => $kpq) {
            $data['kbm'][$i]['kpq'] = $kpq['nama_kpq'];
            $data['kbm'][$i]['nip'] = $kpq['nip'];
            $data['kbm'][$i]['kbm'] = COUNT($this->Akademik_model->get_kbm_kpq_by_periode($data['bulan'], $data['tahun'], $kpq['nip']));
            $data['kbm'][$i]['badal'] = COUNT($this->Akademik_model->get_badal_kpq_by_periode($data['bulan'], $data['tahun'], $kpq['nip']));
            $data['kbm'][$i]['dibadal'] = COUNT($this->Akademik_model->get_dibadal_kpq_by_periode($data['bulan'], $data['tahun'], $kpq['nip']));
            $data['kbm'][$i]['kelas'] = COUNT($this->Akademik_model->get_all_kelas_aktif_kpq($kpq['nip']));
            $data['kbm'][$i]['jadwal'] = COUNT($this->Akademik_model->get_all_jadwal_aktif_kpq($kpq['nip']));
            $data['kbm'][$i]['no_rekap'] = COUNT($this->Akademik_model->get_badal_no_rekap_by_nip($kpq['nip']));
        }
        
        
        // ini_set('xdebug.var_display_max_depth', '10');
        // ini_set('xdebug.var_display_max_children', '256');
        // ini_set('xdebug.var_display_max_data', '1024');
        // var_dump($data);
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("laporan/rekap", $data);
        $this->load->view("templates/footer", $data);
    }
    
    public function index(){
        $data['month'] = ["0" => "-", "1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli","8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
        $data['title'] = "Download Laporan";

        $tahun = $this->Akademik_model->get_tahun_laporan();
        foreach ($tahun as $i => $tahun) {
            $data['laporan'][$i]['tahun'] = $tahun['tahun'];
            $bulan = $this->Akademik_model->get_bulan_laporan_by_tahun($tahun['tahun']);
            foreach ($bulan as $j => $bulan) {
                $data['laporan'][$i]['bulan'][$j] = $bulan;
            }
        }
        
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();

        // ini_set('xdebug.var_display_max_depth', '10');
        // ini_set('xdebug.var_display_max_children', '256');
        // ini_set('xdebug.var_display_max_data', '1024');

        // var_dump($data);
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        // $this->load->view("laporan/laporan", $data);
        $this->load->view("laporan/form-laporan", $data);
        $this->load->view("templates/footer", $data);
    }

    public function kelasNonaktif(){
        $data['title'] = "Laporan Kelas Nonaktif";
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();
        $data['history'] = $this->Main_model->get_all("history_kelas","", "tgl_history", "DESC");

        
        // ini_set('xdebug.var_display_max_depth', '10');
        // ini_set('xdebug.var_display_max_children', '256');
        // ini_set('xdebug.var_display_max_data', '1024');

        // var_dump($data['history']);
        
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("laporan/kelas-nonaktif", $data);
        $this->load->view("templates/footer", $data);
    }
    
    public function pesertaNonaktif(){
        $data['title'] = "Laporan Peserta Nonaktif";
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();
        $data['history'] = $this->Main_model->get_all("history_peserta","", "tgl_history", "DESC");

        
        // ini_set('xdebug.var_display_max_depth', '10');
        // ini_set('xdebug.var_display_max_children', '256');
        // ini_set('xdebug.var_display_max_data', '1024');

        // var_dump($data['history']);
        
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("laporan/peserta-nonaktif", $data);
        $this->load->view("templates/footer", $data);
    }

    public function rekapKpq($nip, $bulan, $tahun){
        $month = ["1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli","8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
        
        $kpq = $this->Akademik_model->get_kpq_by_nip($nip);
        
        $data['title'] = "Rekap KBM {$kpq['nama_kpq']} {$month[$bulan]} {$tahun}";
        $data["pengajar"] = [];
        
        $data['pengajar'] = [];

        $kelas = $this->Akademik_model->get_kelas_kpq_by_periode($bulan, $tahun, $nip);

        foreach ($kelas as $i => $kelas) {
            $data['pengajar']['kelas'][$i] = $kelas;
            $data['pengajar']['kelas'][$i]['jum_peserta'] = COUNT($this->Akademik_model->get_all_peserta_hadir_by_periode($bulan, $tahun, $kelas['id_kelas']));
            $kbm = $this->Akademik_model->get_tgl_kbm_by_periode($bulan, $tahun, $nip, $kelas['id_jadwal']);
            foreach ($kbm as $j => $kbm) {
                $data['pengajar']['kelas'][$i]['kbm'][$j] = $kbm;
                $peserta_hadir = $this->Akademik_model->get_peserta_kbm($kbm['id_kbm']);
                $data['pengajar']['kelas'][$i]['kbm'][$j]['peserta'] = $peserta_hadir['peserta_hadir'];
            }
        }
        
        $badal = $this->Akademik_model->get_kbm_badal($bulan, $tahun, $nip);
        foreach ($badal as $k => $badal) {
            $data['pengajar']['kbm_badal'][$k] = $badal;
        }
        
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("laporan/rekap-bulanan-kpq", $data);
        $this->load->view("templates/footer", $data);
    }
    
    public function export_rekap_kbm($bulan, $tahun){
        // export excel
        $filename = "Rekap KBM {$bulan}-{$tahun}";

        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment;filename="'.$filename.'.xls"');

        $month = ["1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli","8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
        $data['title'] = "Rekap KBM {$month[$bulan]} {$tahun}";
        $data["pengajar"] = [];
        
        $nip = $this->Akademik_model->get_all_kpq();
        $data['pengajar'] = [];

        foreach ($nip as $key => $nip) {
            $data['pengajar'][$key] = $nip;
            $kelas = $this->Akademik_model->get_kelas_kpq_by_periode($bulan, $tahun, $nip['nip']);
            foreach ($kelas as $i => $kelas) {
                $data['pengajar'][$key]['kelas'][$i] = $kelas;
                $data['pengajar'][$key]['kelas'][$i]['jum_peserta'] = COUNT($this->Akademik_model->get_all_peserta_hadir_by_periode($bulan, $tahun, $kelas['id_kelas']));
                $kbm = $this->Akademik_model->get_tgl_kbm_by_periode($bulan, $tahun, $nip['nip'], $kelas['id_jadwal']);
                foreach ($kbm as $j => $kbm) {
                    $data['pengajar'][$key]['kelas'][$i]['kbm'][$j] = $kbm;
                    $peserta_hadir = $this->Akademik_model->get_peserta_kbm($kbm['id_kbm']);
                    $data['pengajar'][$key]['kelas'][$i]['kbm'][$j]['peserta'] = $peserta_hadir['peserta_hadir'];
                }
            }
            
            $badal = $this->Akademik_model->get_kbm_badal($bulan, $tahun, $nip['nip']);
            foreach ($badal as $k => $badal) {
                $data['pengajar'][$key]['kbm_badal'][$k] = $badal;
            }
        }

        // ini_set('xdebug.var_display_max_depth', '10');
        // ini_set('xdebug.var_display_max_children', '256');
        // ini_set('xdebug.var_display_max_data', '1024');

        // var_dump($data);
        $this->load->view("laporan/rekap-bulanan", $data);
    }

    public function exportrekappeserta($bulan, $tahun){
        
        $filename = "Rekap Peserta {$bulan}-{$tahun}";

        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment;filename="'.$filename.'.xls"');

        $month = ["1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli","8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
        $data['title'] = "Periode {$month[$bulan]} {$tahun}";

        $kpq = $this->Akademik_model->get_all_kpq();
        $i = 1;

        foreach ($kpq as $kpq) {
            $kelas = $this->Akademik_model->get_kelas_kpq_by_periode($bulan, $tahun, $kpq['nip']);
            
            if(COUNT($kelas) != 0){
                $data['laporan'][$i]['kpq'] = $kpq;

                foreach ($kelas as $j => $kelas) {
                    $data['laporan'][$i]['kelas'][$j] = $kelas;
                    $data['laporan'][$i]['kelas'][$j]['peserta_kbm'] = $this->Akademik_model->get_all_peserta_hadir_by_periode($bulan, $tahun, $kelas['id_kelas']);
                }
                $i++;
            }
        }
        
        // ini_set('xdebug.var_display_max_depth', '10');
        // ini_set('xdebug.var_display_max_children', '256');
        // ini_set('xdebug.var_display_max_data', '1024');
        // var_dump($data);

        $this->load->view("laporan/rekap-peserta", $data);
    }
    
    public function exportrekappengajaran($bulan, $tahun){
        
        $filename = "Rekap Pengajaran {$bulan}-{$tahun}";

        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment;filename="'.$filename.'.xls"');

        $month = ["1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli","8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
        $data['title'] = "Periode {$month[$bulan]} {$tahun}";

        $kpq = $this->Akademik_model->get_all_kpq();
        $i = 1;

        foreach ($kpq as $kpq) {
            $kelas = $this->Akademik_model->get_kelas_kpq_by_periode($bulan, $tahun, $kpq['nip']);
            
            if(COUNT($kelas) != 0){
                $data['laporan'][$i]['kpq'] = $kpq;

                foreach ($kelas as $j => $kelas) {
                    $data['laporan'][$i]['kelas'][$j] = $kelas;
                    $data['laporan'][$i]['kelas'][$j]['peserta_kbm'] = $this->Akademik_model->get_all_peserta_hadir_by_periode($bulan, $tahun, $kelas['id_kelas']);
                }
                $i++;
            }
        }
        
        // ini_set('xdebug.var_display_max_depth', '10');
        // ini_set('xdebug.var_display_max_children', '256');
        // ini_set('xdebug.var_display_max_data', '1024');
        // var_dump($data);

        $this->load->view("laporan/rekap-pengajaran", $data);
    }

    public function cetak_laporan(){
        $laporan = $this->input->post("laporan");
        $bulan = $this->input->post("bulan");
        $tahun = $this->input->post("tahun");

        if($laporan == "Rekap KBM"){
            // export excel
            $filename = "Rekap KBM {$bulan}-{$tahun}";
    
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
    
            $month = ["1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli","8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
            $data['title'] = "Rekap KBM {$month[$bulan]} {$tahun}";
            $data["pengajar"] = [];
            
            $nip = $this->Akademik_model->get_all_kpq();
            $data['pengajar'] = [];
    
            foreach ($nip as $key => $nip) {
                $data['pengajar'][$key] = $nip;
                $kelas = $this->Akademik_model->get_kelas_kpq_by_periode($bulan, $tahun, $nip['nip']);
                foreach ($kelas as $i => $kelas) {
                    $data['pengajar'][$key]['kelas'][$i] = $kelas;
                    $data['pengajar'][$key]['kelas'][$i]['jum_peserta'] = COUNT($this->Akademik_model->get_all_peserta_hadir_by_periode($bulan, $tahun, $kelas['id_kelas']));
                    $kbm = $this->Akademik_model->get_tgl_kbm_by_periode($bulan, $tahun, $nip['nip'], $kelas['id_jadwal']);
                    foreach ($kbm as $j => $kbm) {
                        $data['pengajar'][$key]['kelas'][$i]['kbm'][$j] = $kbm;
                        $peserta_hadir = $this->Akademik_model->get_peserta_kbm($kbm['id_kbm']);
                        $data['pengajar'][$key]['kelas'][$i]['kbm'][$j]['peserta'] = $peserta_hadir['peserta_hadir'];
                    }
                }
                
                $badal = $this->Akademik_model->get_kbm_badal($bulan, $tahun, $nip['nip']);
                foreach ($badal as $k => $badal) {
                    $data['pengajar'][$key]['kbm_badal'][$k] = $badal;
                }
            }
            $this->load->view("laporan/rekap-bulanan", $data);

        } else if($laporan == "Rekap Peserta"){
            $filename = "Rekap Peserta {$bulan}-{$tahun}";

            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header('Content-Disposition: attachment;filename="'.$filename.'.xls"');

            $month = ["1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli","8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
            $data['title'] = "Periode {$month[$bulan]} {$tahun}";

            $kpq = $this->Akademik_model->get_all_kpq();
            $i = 1;

            foreach ($kpq as $kpq) {
                $kelas = $this->Akademik_model->get_kelas_kpq_by_periode($bulan, $tahun, $kpq['nip']);
                
                if(COUNT($kelas) != 0){
                    $data['laporan'][$i]['kpq'] = $kpq;

                    foreach ($kelas as $j => $kelas) {
                        $data['laporan'][$i]['kelas'][$j] = $kelas;
                        $data['laporan'][$i]['kelas'][$j]['peserta_kbm'] = $this->Akademik_model->get_all_peserta_hadir_by_periode($bulan, $tahun, $kelas['id_kelas']);
                    }
                    $i++;
                }
            }
            
            // ini_set('xdebug.var_display_max_depth', '10');
            // ini_set('xdebug.var_display_max_children', '256');
            // ini_set('xdebug.var_display_max_data', '1024');
            // var_dump($data);

            $this->load->view("laporan/rekap-peserta", $data);
        } else if($laporan == "Rekap Pengajaran"){
            $filename = "Rekap Pengajaran {$bulan}-{$tahun}";

            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header('Content-Disposition: attachment;filename="'.$filename.'.xls"');

            $month = ["1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli","8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
            $data['title'] = "Periode {$month[$bulan]} {$tahun}";

            $kpq = $this->Akademik_model->get_all_kpq();
            $i = 1;

            foreach ($kpq as $kpq) {
                $kelas = $this->Akademik_model->get_kelas_kpq_by_periode($bulan, $tahun, $kpq['nip']);
                
                if(COUNT($kelas) != 0){
                    $data['laporan'][$i]['kpq'] = $kpq;

                    foreach ($kelas as $j => $kelas) {
                        $data['laporan'][$i]['kelas'][$j] = $kelas;
                        $data['laporan'][$i]['kelas'][$j]['peserta_kbm'] = $this->Akademik_model->get_all_peserta_hadir_by_periode($bulan, $tahun, $kelas['id_kelas']);
                    }
                    $i++;
                }
            }
            
            // ini_set('xdebug.var_display_max_depth', '10');
            // ini_set('xdebug.var_display_max_children', '256');
            // ini_set('xdebug.var_display_max_data', '1024');
            // var_dump($data);

            $this->load->view("laporan/rekap-pengajaran", $data);
        } else if($laporan == "Kelas Nonaktif"){
            $filename = "Kelas PV Nonaktif {$bulan}-{$tahun}";
            
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
            
            $month = ["1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli","8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
            $data['title'] = "Periode {$month[$bulan]} {$tahun}";

            $data['laporan'] = $this->Main_model->get_all("history_kelas", "MONTH(tgl_history) = $bulan AND YEAR(tgl_history) = $tahun", "nama_kpq", "ASC");
            
            // ini_set('xdebug.var_display_max_depth', '10');
            // ini_set('xdebug.var_display_max_children', '256');
            // ini_set('xdebug.var_display_max_data', '1024');
            // var_dump($data);

            $this->load->view("laporan/rekap-kelas-nonaktif", $data);
        } else if($laporan == "Peserta Nonaktif"){
            $filename = "Peserta Reguler Nonaktif {$bulan}-{$tahun}";
            
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
            
            $month = ["1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli","8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
            $data['title'] = "Periode {$month[$bulan]} {$tahun}";

            $data['laporan'] = $this->Main_model->get_all("history_peserta", "MONTH(tgl_history) = $bulan AND YEAR(tgl_history) = $tahun", "nama_kpq", "ASC");
            
            // ini_set('xdebug.var_display_max_depth', '10');
            // ini_set('xdebug.var_display_max_children', '256');
            // ini_set('xdebug.var_display_max_data', '1024');
            // var_dump($data);

            $this->load->view("laporan/rekap-peserta-nonaktif", $data);

        }
    }

    public function kesediaan(){
        $data['title'] = "Kesediaan Pengajar";

        $kesediaan = $this->Akademik_model->get_all_kesediaan_waktu_kpq();
        foreach ($kesediaan as $i => $kesediaan) {
            $data['kesediaan'][$i]['waktu'] = $kesediaan['waktu'];
            $data['kesediaan'][$i]['pria'] = COUNT($this->Akademik_model->get_kpq_by_kesediaan($kesediaan['waktu'], 'Pria'));
            $data['kesediaan'][$i]['wanita'] = COUNT($this->Akademik_model->get_kpq_by_kesediaan($kesediaan['waktu'], 'Wanita'));
        }
        
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("laporan/kesediaan");
        $this->load->view("templates/footer");
        // var_dump($data);
    }

    // get
    public function get_kesediaan(){
        $data = explode("|", $this->input->post("id"));
        $waktu = $data[0];
        $jk = $data[1];

        $data = $this->Akademik_model->get_kpq_by_kesediaan($waktu, $jk);
        echo json_encode($data);
    }

    public function get_history(){
        $id = $this->input->post("id");
        $data = $this->Main_model->get_one("history_kelas", ["id" => $id]);
        echo json_encode($data);
    }

    public function history_peserta(){
        $id = $this->input->post("id");
        $data = $this->Main_model->get_one("history_peserta", ["id" => $id]);
        echo json_encode($data);
    }

    // edit
    public function edit_history(){
        $id = $this->input->post("id");
        $data = [
            "tgl_history" => $this->input->post("tgl_history")
        ];

        // hapus / edit
        if(isset($_POST['hapus'])){
            $this->Main_model->delete_data("history_kelas", ["id" => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i> Berhasil menghapus data history<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else if(isset($_POST['edit'])){
            $this->Main_model->edit_data("history_kelas", ["id" => $id], $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i> Berhasil mengubah data history<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function edit_history_peserta(){
        $id = $this->input->post("id");
        $data = [
            "tgl_history" => $this->input->post("tgl_history")
        ];

        // hapus / edit
        if(isset($_POST['hapus'])){
            $this->Main_model->delete_data("history_peserta", ["id" => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i> Berhasil menghapus data history<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else if(isset($_POST['edit'])){
            $this->Main_model->edit_data("history_peserta", ["id" => $id], $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i> Berhasil mengubah data history<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}