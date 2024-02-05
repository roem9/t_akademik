<?php 

class Other extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model("Akademik_model");
        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
		}
    }

    public function program(){
        $data['title'] = "Data Program";
        $data['sidebar'] = "program";
        $data['sidebarDropdown'] = "program";

        $data['program'] = $this->Akademik_model->get_all_program();
        
        // $data['kpq'] = $this->Akademik_model->get_all_kpq_aktif();
        // $data['ruangan'] = $this->Akademik_model->get_all_ruangan();
        // $data['program'] = $this->Akademik_model->get_all_program();

        // $this->load->view("templates/header", $data);
        // $this->load->view("templates/sidebar");
        $this->load->view("layout/header", $data);
        $this->load->view("layout/navbar", $data);
        $this->load->view("other/program", $data);
        // $this->load->view("templates/footer", $data);
    }

    // delete
        public function delete_program_by_id_program($id){
            $this->Akademik_model->delete_program_by_id_program($id);
            $this->session->set_flashdata('pesan', 'Berhasil menghapus program');
            redirect($_SERVER['HTTP_REFERER']);
        }
    // delete

    // add
        public function add_program(){
            $this->Akademik_model->add_program();
            $this->session->set_flashdata('pesan', 'Berhasil menambahkan program');
            redirect('other/program');
        }
    // add
}