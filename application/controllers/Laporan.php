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

    public function jadwalNonaktif(){
        $data['title'] = "Laporan Jadwal Nonaktif";
        $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        $data['program'] = $this->Akademik_model->get_all_program();
        $data['history'] = $this->Main_model->get_all("history_jadwal","", "tgl_history", "DESC");

        
        // ini_set('xdebug.var_display_max_depth', '10');
        // ini_set('xdebug.var_display_max_children', '256');
        // ini_set('xdebug.var_display_max_data', '1024');

        // var_dump($data['history']);
        
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("laporan/jadwal-nonaktif", $data);
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
    
                // kelas 
                    $kbm = $this->Main_model->get_all("kbm", ["MONTH(tgl)" => $bulan, "YEAR(tgl)" => $tahun, "nip" => $nip['nip']]);
                    $id_jadwal = [];
                    foreach ($kbm as $i => $kbm) {
                        $id_jadwal[] = $kbm['id_jadwal'];
                    }
                    $id_jadwal = array_unique($id_jadwal);
                    $i = 0;
                    foreach ($id_jadwal as $id_jadwal) {
                        $jadwal = $this->Main_model->get_one("jadwal", ["id_jadwal" => $id_jadwal]);
                        $kelas = $this->Main_model->get_one("kelas", ["id_kelas" => $jadwal['id_kelas']]);
                        $kbm_kelas = $this->Main_model->get_all("kbm", ["MONTH(tgl)" => $bulan, "YEAR(tgl)" => $tahun, "nip" => $nip['nip'], "id_kelas" => $jadwal['id_kelas'], "id_jadwal" => $jadwal['id_jadwal']]);
                        
                        $jum_peserta = [];

                        foreach ($kbm_kelas as $j => $kbm) {
                            $peserta = COUNT($this->Main_model->get_all("presensi_peserta", ["id_kbm" => $kbm['id_kbm'], "hadir" => 1]));
                            $kbm_kelas[$j]['pj'] = $kbm['peserta'];
                            $kbm_kelas[$j]['peserta'] = $peserta;
                            
                            $jum_peserta[] = $kbm['jum_peserta'];
                        }
    
                        $data['pengajar'][$key]['kelas'][$i] = [
                            'id_kelas' => $kelas['id_kelas'],
                            'nip' => $kelas['nip'],
                            // 'periode' => string '5 2020' (length=6)
                            'peserta' => $kbm_kelas[0]['pj'],
                            'jum_peserta' => max($jum_peserta),
                            'program_kbm' => $kbm_kelas[0]['program_kbm'],
                            'id_jadwal' => $jadwal['id_jadwal'],
                            'hari' => $jadwal['hari'],
                            'jam' => $jadwal['jam'],
                            'tempat' => $jadwal['tempat'],
                            'tipe_kelas' => $kelas['tipe_kelas'],
                            'ot' => $jadwal['ot'],
                            'kbm' => $kbm_kelas
                        ];
                        $i++;
                    }
                    
                    // pembinaan 
                    $kbm = $this->Main_model->get_all("kbm_pembinaan", ["MONTH(tgl)" => $bulan, "YEAR(tgl)" => $tahun, "nip" => $nip['nip']]);
                    $id_kelas = [];
                    foreach ($kbm as $kbm) {
                        $id_kelas[] = $kbm['id_kelas'];
                    }
                    $id_kelas = array_unique($id_kelas);
                    // $i = 0;
                    foreach ($id_kelas as $id_kelas) {
                        $kelas = $this->Main_model->get_one("kelas_pembinaan", ["id_kelas" => $id_kelas]);
                        $kelas['tipe_kelas'] = "Pembinaan";
                        
                        $kbm_kelas = $this->Main_model->get_all("kbm_pembinaan", ["MONTH(tgl)" => $bulan, "YEAR(tgl)" => $tahun, "nip" => $nip['nip'], "id_kelas" => $id_kelas]);
                        
                        $jum_peserta = [];
                        
                        foreach ($kbm_kelas as $j => $kbm) {
                            $peserta = COUNT($this->Main_model->get_all("presensi_kpq", ["id_kbm" => $kbm['id_kbm'], "hadir" => 1]));
                            $kbm_kelas[$j]['pj'] = $kbm['peserta'];
                            $kbm_kelas[$j]['peserta'] = $peserta;
                            
                            $jum_peserta[] = $kbm['jum_peserta'];
                        }
    
                        $data['pengajar'][$key]['kelas'][$i] = [
                            'id_kelas' => $kelas['id_kelas'],
                            'nip' => $kelas['nip'],
                            // 'periode' => string '5 2020' (length=6)
                            'peserta' => $kbm_kelas[0]['pj'],
                            'jum_peserta' => max($jum_peserta),
                            'program_kbm' => $kbm_kelas[0]['program_kbm'],
                            // 'id_jadwal' => $jadwal['id_jadwal'],
                            'hari' => $kelas['hari'],
                            'jam' => $kelas['jam'],
                            'tempat' => $kelas['tempat'],
                            'tipe_kelas' => $kelas['tipe_kelas'],
                            'ot' => "0",
                            'kbm' => $kbm_kelas
                        ];
                        $i++;
                    }
    
                    $id_badal = $this->Main_model->get_all("kbm_badal", ["nip_badal" => $nip['nip']]);
                    $k = 0;
                    foreach ($id_badal as $badal) {
                        $kbm = $this->Main_model->get_one("kbm", ["id_kbm" => $badal['id_kbm'], "MONTH(tgl)" => $bulan, "YEAR(tgl)" => $tahun]);
                        if($kbm){
                            $kpq = $this->Main_model->get_one("kpq", ["nip" => $kbm['nip']]);
                            $kelas = $this->Main_model->get_one("kelas", ["id_kelas" => $kbm['id_kelas']]);
                            $jadwal = $this->Main_model->get_one("jadwal", ["id_jadwal" => $kbm['id_jadwal']]);
            
                            $data['pengajar'][$key]['kbm_badal'][$k] = [
                                'id_kbm' => $badal['id_kbm'],
                                'peserta' => $kbm['peserta'],
                                'tgl' => $kbm['tgl'],
                                'hari' => $kbm['hari'],
                                'jam' => $kbm['jam'],
                                'biaya' => $kbm['biaya'],
                                'ot' => $kbm['ot'],
                                'nama_kpq' => $kpq['nama_kpq'],
                                'program_kbm' => $kbm['program_kbm'],
                                'tipe_kelas' => $kelas['tipe_kelas'],
                                'oot' => $jadwal['ot']
                            ];
                            $k++;
                        }
                    }
                    
                    // pembinaan 
                    $id_badal = $this->Main_model->get_all("kbm_badal_pembinaan", ["nip_badal" => $nip['nip']]);
                    foreach ($id_badal as $badal) {
                        $kbm = $this->Main_model->get_one("kbm_pembinaan", ["id_kbm" => $badal['id_kbm'], "MONTH(tgl)" => $bulan, "YEAR(tgl)" => $tahun]);
                        if($kbm){
                            $kpq = $this->Main_model->get_one("kpq", ["nip" => $kbm['nip']]);
                            $kelas = $this->Main_model->get_one("kelas", ["id_kelas" => $kbm['id_kelas']]);
                            $kelas['tipe_kelas'] = "Pembinaan";
            
                            $data['pengajar'][$key]['kbm_badal'][$k] = [
                                'id_kbm' => $badal['id_kbm'],
                                'peserta' => $kbm['peserta'],
                                'tgl' => $kbm['tgl'],
                                'hari' => $kbm['hari'],
                                'jam' => $kbm['jam'],
                                'biaya' => $kbm['biaya'],
                                'ot' => $kbm['ot'],
                                'nama_kpq' => $kpq['nama_kpq'],
                                'program_kbm' => $kbm['program_kbm'],
                                'tipe_kelas' => $kelas['tipe_kelas'],
                                'oot' => "0"
                            ];
                            $k++;
                        }
                    }
                // kelas 
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
        } else if($laporan == "Jadwal Nonaktif"){
            $filename = "Jadwal PV Nonaktif {$bulan}-{$tahun}";
            
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
            
            $month = ["1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli","8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
            $data['title'] = "Periode {$month[$bulan]} {$tahun}";

            $data['laporan'] = $this->Main_model->get_all("history_jadwal", "MONTH(tgl_history) = $bulan AND YEAR(tgl_history) = $tahun", "nama_kpq", "ASC");
            
            // ini_set('xdebug.var_display_max_depth', '10');
            // ini_set('xdebug.var_display_max_children', '256');
            // ini_set('xdebug.var_display_max_data', '1024');
            // var_dump($data);

            $this->load->view("laporan/rekap-jadwal-nonaktif", $data);
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

    public function tahsin($id_kelas){        
        $data['title'] = "Laporan Kelas Tahsin";
        $kelas = $this->Main_model->get_one("kelas", ["md5(id_kelas)" => $id_kelas]);
        $kpq = $this->Main_model->get_one("kpq", ["nip" => $kelas['nip']]);
        $jadwal = $this->Main_model->get_all("jadwal", ["id_kelas" => $kelas['id_kelas'], "status" => "aktif"]);

        $data['kelas'] = $kelas;
        $data['kpq'] = $kpq;
        $data['jadwal'] = $jadwal;
        $data['peserta'] = [];
        $peserta = $this->Main_model->get_all("peserta", ["md5(id_kelas)" => $id_kelas]);

        foreach ($peserta as $i => $peserta) {
            $data_peserta = $this->Main_model->get_one("peserta", ["no_peserta" => $peserta['no_peserta']]);
            $data['peserta'][$i] = $data_peserta;
            $data['peserta'][$i]['laporan'] = $this->Main_model->get_all("laporan_tahsin", ["id_kelas" => $kelas['id_kelas'], "no_peserta" => $peserta['no_peserta'], "hapus" => 0]);
            // $data['peserta'][$i]['laporan'] = $this->Main_model->get_all("laporan_tahsin", ["no_peserta" => $peserta['no_peserta'], "hapus" => 0]);
        }

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("laporan/laporan-tahsin");
        $this->load->view("templates/footer");
    }

    public function b_arab($id_kelas){        
        $data['title'] = "Laporan Kelas Bahasa Arab";
        $kelas = $this->Main_model->get_one("kelas", ["md5(id_kelas)" => $id_kelas]);
        $kpq = $this->Main_model->get_one("kpq", ["nip" => $kelas['nip']]);
        $jadwal = $this->Main_model->get_all("jadwal", ["id_kelas" => $kelas['id_kelas'], "status" => "aktif"]);

        $data['kelas'] = $kelas;
        $data['kpq'] = $kpq;
        $data['jadwal'] = $jadwal;
        $data['peserta'] = [];
        $peserta = $this->Main_model->get_all("peserta", ["md5(id_kelas)" => $id_kelas]);

        foreach ($peserta as $i => $peserta) {
            $data_peserta = $this->Main_model->get_one("peserta", ["no_peserta" => $peserta['no_peserta']]);
            $data['peserta'][$i] = $data_peserta;
            $data['peserta'][$i]['laporan'] = $this->Main_model->get_all("laporan_arab", ["id_kelas" => $kelas['id_kelas'], "no_peserta" => $peserta['no_peserta'], "hapus" => 0]);
            // $data['peserta'][$i]['laporan'] = $this->Main_model->get_all("laporan_tahsin", ["no_peserta" => $peserta['no_peserta'], "hapus" => 0]);
        }

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("laporan/laporan-arab");
        $this->load->view("templates/footer");
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
        $data = $this->Main_model->get_one("history_jadwal", ["id" => $id]);
        echo json_encode($data);
    }
    
    public function get_history_kelas(){
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
            $this->Main_model->delete_data("history_jadwal", ["id" => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i> Berhasil menghapus data history<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else if(isset($_POST['edit'])){
            $this->Main_model->edit_data("history_jadwal", ["id" => $id], $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i> Berhasil mengubah data history<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function edit_history_kelas(){
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