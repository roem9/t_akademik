<?php
class Home extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model("Akademik_model");
        $this->load->model("Home_model");

        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
		}
    }

    public function index(){
        $bln = ["0" => "-", "1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli", "8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
        
        $data['judul'] = $bln[date('n')] . " " . date('Y');
        
        $data['reguler'] = COUNT($this->Akademik_model->get_peserta_reguler_aktif());
        // kelas
        $data['pk'] = COUNT($this->Akademik_model->get_kelas_pv_khusus_aktif());
        $data['pl'] = COUNT($this->Akademik_model->get_kelas_pv_luar_aktif());
        
        // jadwal
        // $data['jadwal_pv_khusus'] = COUNT($this->Akademik_model->get_jadwal_pv_khusus_aktif());
        // $data['jadwal_pv_luar'] = COUNT($this->Akademik_model->get_jadwal_pv_luar_aktif());

        $tahun = $this->Akademik_model->get_tahun_kbm();

        $x = 0;

        foreach ($tahun as $i => $tahun) {
            if($tahun['tahun'] == date('Y')){
                $bulan = $this->Akademik_model->get_bulan_kbm_by_tahun($tahun['tahun']);
                foreach ($bulan as $j => $bulan) {
                    $data['kbm'][$x]['periode'] = $bln[$bulan['bulan']] . " " . $tahun['tahun'];
                    $data['kbm'][$x]['peserta_reguler'] = COUNT($this->Akademik_model->get_kbm_peserta_reguler_by_periode($tahun['tahun'], $bulan['bulan']));
                    $data['kbm'][$x]['kelas_reguler'] = COUNT($this->Akademik_model->get_kbm_kelas_reguler_by_periode($tahun['tahun'], $bulan['bulan']));
                    // kelas
                    $data['kbm'][$x]['kelas_pv_khusus'] = COUNT($this->Akademik_model->get_kelas_pv_khusus_by_periode($tahun['tahun'], $bulan['bulan']));
                    $data['kbm'][$x]['kelas_pv_luar'] = COUNT($this->Akademik_model->get_kelas_pv_luar_by_periode($tahun['tahun'], $bulan['bulan']));
                    // jadwal
                    // $data['kbm'][$x]['kelas_pv_khusus'] = COUNT($this->Akademik_model->get_kbm_kelas_pv_khusus_by_periode($tahun['tahun'], $bulan['bulan']));
                    // $data['kbm'][$x]['kelas_pv_luar'] = COUNT($this->Akademik_model->get_kbm_kelas_pv_luar_by_periode($tahun['tahun'], $bulan['bulan']));
                    $x++;
                }
            }
        }

        $data['title'] = "Beranda";
        $data['periode'] = $bln[date('n')] . " " . date('Y');

        // $this->load->view("templates/header", $data);
        // $this->load->view("templates/sidebar");
        // $this->load->view("home/index");
        // $this->load->view("templates/footer");

        $data['sidebar'] = "home";
        $data['sidebarDropdown'] = "";

        $this->load->view("layout/header", $data);
        $this->load->view("layout/navbar", $data);
        $this->load->view("home/index", $data);
    }

    public function getDataHomeAkademik(){
        header('Content-Type: application/json');
        $output = $this->Home_model->getDataHomeAkademik();
        echo $output;
    }
}