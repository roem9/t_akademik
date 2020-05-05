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

        $data['program'] = $this->Akademik_model->get_all_program();

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("other/program", $data);
        $this->load->view("templates/footer", $data);
    }

    // delete
        public function delete_program_by_id_program($id){
            $this->Akademik_model->delete_program_by_id_program($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil menghapus program<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
    // delete

    // add
        public function add_program(){
            $this->Akademik_model->add_program();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil menambahkan program<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('other/program');
        }
    // add
}