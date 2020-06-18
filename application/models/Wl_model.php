<?php
class Wl_model extends CI_MODEL{
    public function get_kategori_wl_reguler_takhosus(){
        $this->db->select("kategori");
        $this->db->from("peserta_reguler");
        $this->db->where("status", "takhosus");
        $this->db->group_by("kategori");
        return $this->db->get()->result_array();
    }

    public function get_peserta_wl_reguler_takhosus_by_kategori($kategori, $jk){
        $this->db->select("*, DATE_FORMAT(tgl_masuk, '%d-%m-%Y') as tgl, DATE_FORMAT(tgl_lahir, '%d-%m-%Y') as tgl_lahir");
        $this->db->from("peserta_reguler");
        $this->db->where("kategori", $kategori);
        $this->db->where("jk", $jk);
        $this->db->where("status", "takhosus");
        $this->db->order_by("tgl_masuk", "ASC");
        return $this->db->get()->result_array();
    }
}