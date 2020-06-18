<?php
class Akademik_model extends CI_MODEL{
    // get by
        public function get_kpq_by_nip($nip){
            $this->db->from("kpq");
            $this->db->where("nip", $nip);
            return $this->db->get()->row_array();
        }

        public function get_catatan_badal_by_id($id){
            $this->db->from("kbm_badal");
            $this->db->where("id_kbm", $id);
            return $this->db->get()->row_array();
        }
        
        public function get_kpq_by_kesediaan($waktu, $jk){
            $this->db->from("kesediaan as a");
            $this->db->join("kpq as b", "a.nip = b.nip");
            $this->db->where("CONCAT(a.hari, ' ', a.jam) = ", $waktu);
            $this->db->where("jk", $jk);
            return $this->db->get()->result_array();
        }
    // get by
    
    // get some
        public function get_all_kesediaan_waktu_kpq(){
            $this->db->select("CONCAT(hari, ' ', jam) AS waktu");
            $this->db->from("kesediaan");
            $this->db->group_by("waktu");
            return $this->db->get()->result_array();
        }

    // get some
    
    // get all
        public function get_all_peserta_hadir_by_periode($bulan, $tahun, $id_kelas){
            $periode = $bulan . " " . $tahun;

            $this->db->select("b.id_peserta, c.nama_peserta, max(b.hadir) as hadir, no_hp");
            $this->db->from("kbm as a");
            $this->db->join("presensi_peserta as b", "a.id_kbm = b.id_kbm");
            $this->db->join("peserta as c", "b.id_peserta = c.id_peserta");
            $this->db->where("concat(month(tgl),' ',year(tgl)) = ", $periode);
            $this->db->where("a.id_kelas", $id_kelas);
            $this->db->group_by(array("concat(month(`a`.`tgl`),' ',year(`a`.`tgl`))" ,"`b`.`id_peserta`"));
            // $this->db->from("presensi_kbm_peserta");
            // $this->db->where("hadir", 1);
            return $this->db->get()->result_array();
        }

        public function get_all_kpq_aktif(){
            $this->db->from("kpq");
            $this->db->where("status", "aktif");
            $this->db->order_by("nama_kpq", "ASC");
            return $this->db->get()->result_array();
        }
        
        public function get_all_kpq(){
            $this->db->from("kpq");
            $this->db->order_by("nama_kpq", "ASC");
            return $this->db->get()->result_array();
        }

        // public function get_kelas_kpq_by_periode($bulan, $tahun, $nip){
        //     $this->db->select("peserta, a.id_kelas, b.hari, b.jam, tipe_kelas, program_kbm, b.tempat, b.id_jadwal, b.ot, COUNT(id_kbm) AS tot_kbm");
        //     $this->db->from("kelas as a");
        //     $this->db->join("jadwal as b", "a.id_kelas = b.id_kelas");
        //     $this->db->join("kbm as c", "a.id_kelas = c.id_kelas");
        //     $this->db->where("MONTH(tgl)", $bulan);
        //     $this->db->where("YEAR(tgl)", $tahun);
        //     $this->db->where("c.nip", $nip);
        //     $this->db->where("b.status", "aktif");
        //     $this->db->order_by("tipe_kelas", "DESC");
        //     $this->db->group_by("b.id_jadwal");
        //     return $this->db->get()->result_array();
        // }

        // public function get_kelas_kpq_by_periode($bulan, $tahun, $nip){
        //     $periode = $bulan . " " . $tahun;
        //     $this->db->select("a.id_kelas, a.nip, periode, a.peserta, a.jum_peserta, a.program_kbm, a.id_jadwal, a.hari, a.jam, a.tempat, tipe_kelas");
        //     $this->db->from("rekap_kbm as a");
        //     $this->db->join("kelas as b", "a.id_kelas = b.id_kelas");
        //     $this->db->where("periode", $periode);
        //     $this->db->where("a.nip", $nip);
        //     return $this->db->get()->result_array();
        // }

        public function get_kelas_kpq_by_periode($bulan, $tahun, $nip){
            $periode = $bulan . " " . $tahun;
            $this->db->select("a.id_kelas, a.nip, concat(MONTH(tgl), ' ', YEAR(tgl)) as periode, a.peserta, max(a.jum_peserta) as jum_peserta, a.program_kbm, a.id_jadwal, b.hari, b.jam, b.tempat, tipe_kelas");
            $this->db->from("kbm as a");
            $this->db->join("jadwal as b", "a.id_jadwal = b.id_jadwal");
            $this->db->join("kelas as c", "a.id_kelas = c.id_kelas");
            $this->db->where("concat(MONTH(tgl), ' ', YEAR(tgl)) = ", $periode);
            $this->db->where("a.nip", $nip);
            $this->db->group_by(array("a.id_jadwal", "concat(MONTH(tgl), ' ', YEAR(tgl))"));
            return $this->db->get()->result_array();
        }

        public function get_jumlah_peserta_kelas_by_periode($bulan, $tahun, $id_jadwal){
            $this->db->select("jum_peserta");
            $this->db->from("kbm");
            $this->db->where("id_jadwal", $id_jadwal);
            $this->db->where("MONTH(tgl)", $bulan);
            $this->db->where("YEAR(tgl)", $tahun);
            $this->db->order_by("jum_peserta", "DESC");
            return $this->db->get()->row_array();
        }

        public function get_tgl_kbm_by_periode($bulan, $tahun, $nip, $id_jadwal){
            $this->db->select("tgl, id_kbm, biaya, ot, keterangan");
            $this->db->from("kbm");
            $this->db->where("id_jadwal", $id_jadwal);
            $this->db->where("MONTH(tgl)", $bulan);
            $this->db->where("YEAR(tgl)", $tahun);
            $this->db->where("nip", $nip);
            return $this->db->get()->result_array();
        }

        public function get_peserta_kbm($id_kbm){
            $this->db->select("count(id_peserta) as peserta_hadir");
            $this->db->from("presensi_peserta");
            $this->db->where("id_kbm", $id_kbm);
            $this->db->where("hadir", 1);
            return $this->db->get()->row_array();
        }
        
        public function get_kbm_badal($bulan, $tahun, $nip){
            // $this->db->from("kbm as a");
            $this->db->select("a.id_kbm, peserta, tgl, a.hari, a.jam, biaya, a.ot, nama_kpq, program_kbm, tipe_kelas, e.ot as oot");
            $this->db->from("kbm as a");
            $this->db->join("kbm_badal as b", "a.id_kbm = b.id_kbm");
            $this->db->join("kpq as c", "a.nip = c.nip");
            $this->db->join("kelas as d", "a.id_kelas = d.id_kelas");
            $this->db->join("jadwal as e", "a.id_jadwal = e.id_jadwal");
            $this->db->where("MONTH(tgl)", $bulan);
            $this->db->where("YEAR(tgl)", $tahun);
            $this->db->where("nip_badal", $nip);
            return $this->db->get()->result_array();
        }

        public function get_all_ruangan(){
            $this->db->from("ruangan");
            $this->db->order_by("id_ruangan", "ASC");
            return $this->db->get()->result_array();
        }

        public function get_all_program(){
            $this->db->from("program");
            $this->db->order_by("id_program", "ASC");
            return $this->db->get()->result_array();
        }

        public function get_data_kelas_reguler(){
            $id = $this->input->post("id");
            $this->db->from("kelas_reguler");
            $this->db->where("id_kelas", $id);
            return $this->db->get()->row_array();
        }
        
        public function get_data_kelas_privat(){
            $id = $this->input->post("id");
            $this->db->from("kelas as a");
            $this->db->join("kelas_koor as b", "a.id_kelas = b.id_kelas");
            $this->db->where("a.id_kelas", $id);
            return $this->db->get()->row_array();
        }

        public function get_kelas_reguler_aktif(){
            $this->db->from("kelas_reguler");
            $this->db->where("status", "aktif");
            $this->db->order_by("program", "asc");
            return $this->db->get()->result_array();
        }

        public function get_data_jadwal_aktif_by_kelas($id){
            $this->db->from("jadwal");
            $this->db->where("status", "aktif");
            $this->db->where("id_kelas", $id);
            return $this->db->get()->result_array();
        }

        public function get_all_peserta_reguler(){
            $this->db->from("peserta_reguler");
            $this->db->order_by("nama_peserta");
            return $this->db->get()->result_array();
        }

        public function get_kategori_wl_reguler(){
            $this->db->select("kategori");
            $this->db->from("peserta_reguler");
            $this->db->where("status", "wl");
            $this->db->group_by("kategori");
            return $this->db->get()->result_array();
        }

        public function get_peserta_wl_reguler_by_kategori($kategori, $jk){
            $this->db->select("*, DATE_FORMAT(tgl_masuk, '%d-%m-%Y') as tgl, DATE_FORMAT(tgl_lahir, '%d-%m-%Y') as tgl_lahir");
            $this->db->from("peserta_reguler");
            $this->db->where("kategori", $kategori);
            $this->db->where("jk", $jk);
            $this->db->where("status", "wl");
            $this->db->order_by("tgl_masuk", "ASC");
            return $this->db->get()->result_array();
        }
        
        public function get_peserta_reguler_aktif(){
            $this->db->from("peserta_reguler");
            $this->db->where("status", "aktif");
            return $this->db->get()->result_array();
        }

        public function get_all_peserta_pv_khusus(){
            $this->db->from("peserta_pv_khusus");
            $this->db->order_by("nama_peserta");
            return $this->db->get()->result_array();
        }
        
        public function get_all_peserta_pv_luar(){
            $this->db->from("peserta_pv_luar");
            $this->db->order_by("nama_peserta");
            return $this->db->get()->result_array();
        }

        public function get_detail_peserta(){
            $id = $this->input->post("id");
            $this->db->from("peserta as a");
            $this->db->join("alamat as b", "a.id_peserta = b.id_peserta");
            $this->db->where("a.id_peserta", $id);
            return $this->db->get()->row_array();
        }

        public function get_all_kelas_wl(){
            $this->db->from("kelas_wl");
            $this->db->where("status", "wl");
            $this->db->or_where("status", "konfirm");
            $this->db->order_by("status", "ASC");
            return $this->db->get()->result_array();
        }

        public function get_kbm_kpq_by_periode($bulan, $tahun, $nip){
            $this->db->from("kbm");
            $this->db->where("nip", $nip);
            $this->db->where("MONTH(tgl) = ", $bulan);
            $this->db->where("YEAR(tgl) = ", $tahun);
            return $this->db->get()->result_array();
        }
        
        public function get_badal_kpq_by_periode($bulan, $tahun, $nip){
            $this->db->from("kbm as a");
            $this->db->join("kbm_badal as b", "a.id_kbm = b.id_kbm");
            $this->db->where("nip_badal", $nip);
            $this->db->where("MONTH(tgl) = ", $bulan);
            $this->db->where("YEAR(tgl) = ", $tahun);
            return $this->db->get()->result_array();
        }
        
        public function get_dibadal_kpq_by_periode($bulan, $tahun, $nip){
            $this->db->from("kbm as a");
            $this->db->join("kbm_badal as b", "a.id_kbm = b.id_kbm");
            $this->db->where("nip", $nip);

            $where = "b.id_kbm IN (SELECT b.id_kbm FROM kbm_badal)";
            $this->db->where($where);
            $this->db->where("MONTH(tgl) = ", $bulan);
            $this->db->where("YEAR(tgl) = ", $tahun);
            return $this->db->get()->result_array();
        }

        public function get_all_kelas_aktif_kpq($nip){
            $this->db->from("kelas");
            $this->db->where("nip", $nip);
            $this->db->where("status", "aktif");
            return $this->db->get()->result_array();
        }
        
        public function get_all_jadwal_aktif_kpq($nip){
            $this->db->from("kelas as a");
            $this->db->join("jadwal as b", "a.id_kelas = b.id_kelas");
            $this->db->where("nip", $nip);
            $this->db->where("a.status", "aktif");
            $this->db->where("b.status", "aktif");
            return $this->db->get()->result_array();
        }

        public function get_tahun_laporan(){
            $this->db->select("YEAR(tgl) as tahun");
            $this->db->from("kbm");
            $this->db->where("tgl >= ", "2020-05-01");
            $this->db->group_by("tahun");
            $this->db->order_by("tahun", "DESC");
            return $this->db->get()->result_array();
        }

        public function get_bulan_laporan_by_tahun($tahun){
            $this->db->select("MONTH(tgl) as bulan");
            $this->db->from("kbm");
            $this->db->where("tgl >= ", "2020-05-01");
            $this->db->where("YEAR(tgl)", $tahun);
            $this->db->group_by("bulan");
            $this->db->order_by("bulan", "DESC");
            return $this->db->get()->result_array();
        }

        public function get_kpq_aktif_by_periode($bulan, $tahun){
            $this->db->select("a.nip, nama_kpq");
            $this->db->from("kbm as a");
            $this->db->join("kpq as b", "a.nip = b.nip");
            $this->db->where("MONTH(tgl)", $bulan);
            $this->db->where("YEAR(tgl)", $tahun);
            $this->db->group_by("a.nip");
            $this->db->order_by("nama_kpq", "ASC");
            return $this->db->get()->result_array();
        }

        public function get_kelas_kpq_reguler_aktif_by_periode($bulan, $tahun, $nip){
            $this->db->select("a.id_kelas");
            $this->db->from("kbm as a");
            $this->db->join("kelas_reguler as b", "a.id_kelas = b.id_kelas");
            $this->db->where("b.nip", $nip);
            $this->db->where("MONTH(tgl)", $bulan);
            $this->db->where("YEAR(tgl)", $tahun);
            $this->db->group_by("a.id_kelas");
            return $this->db->get()->result_array();
        }

        public function get_all_jadwal_badal_month_now(){
            $bulan = date("m");
            $tahun = date("Y");

            $this->db->from("kbm_badal as a");
            $this->db->join("kbm as b", "a.id_kbm = b.id_kbm");
            $this->db->where("MONTH(tgl)", $bulan);
            $this->db->where("YEAR(tgl)", $tahun);
            $this->db->where("status", "on");
            $this->db->group_by("tgl");
            $this->db->order_by("tgl", "DESC");
            return $this->db->get()->result_array();
        }

        public function get_jadwal_badal_kelas_reguler_by_tgl($tgl){
            $this->db->from("jadwal_badal");
            $this->db->where("tipe_kelas", "reguler");
            $this->db->where("tgl", $tgl);
            $this->db->where("status", "on");
            $this->db->order_by("jam", "asc");
            return $this->db->get()->result_array();
        }
        
        public function get_jadwal_badal_kelas_pv_khusus_by_tgl($tgl){
            $this->db->from("jadwal_badal");
            $this->db->where("tipe_kelas", "pv khusus");
            $this->db->where("tgl", $tgl);
            $this->db->where("status", "on");
            $this->db->order_by("jam", "asc");
            return $this->db->get()->result_array();
        }
        
        public function get_jadwal_badal_kelas_pv_luar_by_tgl($tgl){
            $this->db->from("jadwal_badal");
            $where = "(tipe_kelas = 'pv luar' OR tipe_kelas = 'pv luar kota')";
            $this->db->where($where);
            $this->db->where("tgl", $tgl);
            $this->db->where("status", "on");
            $this->db->order_by("jam", "asc");
            return $this->db->get()->result_array();
        }

        public function get_konfirmasi_badal(){
            $this->db->from("jadwal_badal");
            $this->db->where("status <>", "on");
            return $this->db->get()->result_array();
        }
        
        public function get_badal_no_rekap(){
            $this->db->from("jadwal_badal");
            $this->db->where("rekap =", "0");
            $this->db->where("MONTH(tgl)", date("m"));
            $this->db->where("YEAR(tgl)", date("Y"));
            return $this->db->get()->result_array();
        }

        public function get_badal_no_rekap_by_nip($nip){
            $this->db->from("jadwal_badal");
            $this->db->where("rekap =", "0");
            $this->db->where("MONTH(tgl)", date("m"));
            $this->db->where("YEAR(tgl)", date("Y"));
            $this->db->where("nip", $nip);
            return $this->db->get()->result_array();
        }

        public function get_peserta_nonaktif_by_kelas($id_kelas){
            $this->db->from("peserta");
            $this->db->where("id_kelas", $id_kelas);
            $this->db->where("status", "nonaktif");
            $this->db->order_by("nama_peserta", "asc");
            return $this->db->get()->result_array();
        }
            
        public function get_kelas_pv_khusus_aktif(){
            $this->db->from("kelas");
            $this->db->where("status", "aktif");
            $this->db->where("tipe_kelas", 'pv khusus');
            return $this->db->get()->result_array();
        }
        
        public function get_kelas_pv_luar_aktif(){
            $this->db->from("kelas");
            $this->db->where("status", "aktif");
            $where = "(tipe_kelas = 'pv luar' OR tipe_kelas = 'pv luar kota')";
            $this->db->where($where);
            return $this->db->get()->result_array();
        }
        
        public function get_jadwal_pv_khusus_aktif(){
            $this->db->from("kelas_pv_khusus as a");
            $this->db->join("jadwal as b", "a.id_kelas = b.id_kelas");
            $this->db->where("a.status", "aktif");
            $this->db->where("b.status", "aktif");
            return $this->db->get()->result_array();
        }
        
        public function get_jadwal_pv_luar_aktif(){
            $this->db->from("kelas_pv_luar as a");
            $this->db->join("jadwal as b", "a.id_kelas = b.id_kelas");
            $this->db->where("a.status", "aktif");
            $this->db->where("b.status", "aktif");
            return $this->db->get()->result_array();
        }

        public function get_tahun_kbm(){
            $this->db->select("YEAR(tgl) as tahun");
            $this->db->from("kbm");
            $this->db->group_by("tahun");
            $this->db->order_by("tahun", "DESC");
            return $this->db->get()->result_array();
        }

        public function get_bulan_kbm_by_tahun($tahun){
            $bulan = date("m");

            $this->db->select("MONTH(tgl) as bulan");
            $this->db->from("kbm");
            $this->db->where("YEAR(tgl) = ", $tahun);
            $this->db->where("MONTH(tgl) !=", $bulan);
            $this->db->group_by("bulan");
            $this->db->order_by("bulan", "DESC");
            return $this->db->get()->result_array();
        }

        public function get_kbm_peserta_reguler_by_periode($tahun, $bulan){
            $this->db->from("presensi_peserta as a");
            $this->db->join("peserta_reguler as b", "a.id_peserta = b.id_peserta");
            $this->db->join("kbm as c", "a.id_kbm = c.id_kbm");
            $this->db->where("YEAR(tgl) = ", $tahun);
            $this->db->where("MONTH(tgl) = ", $bulan);
            $this->db->group_by("a.id_peserta");
            return $this->db->get()->result_array();
        }

        public function get_kbm_kelas_reguler_by_periode($tahun, $bulan){
            $this->db->from("kelas_reguler as a");
            $this->db->join("kbm as b", "a.id_kelas = b.id_kelas");
            $this->db->where("YEAR(tgl) = ", $tahun);
            $this->db->where("MONTH(tgl) = ", $bulan);
            $this->db->group_by("b.id_jadwal");
            return $this->db->get()->result_array();
        }
        
        public function get_kbm_kelas_pv_khusus_by_periode($tahun, $bulan){
            $this->db->from("kelas_pv_khusus as a");
            $this->db->join("kbm as b", "a.id_kelas = b.id_kelas");
            $this->db->where("YEAR(tgl) = ", $tahun);
            $this->db->where("MONTH(tgl) = ", $bulan);
            $this->db->group_by("id_jadwal");
            return $this->db->get()->result_array();
        }

        public function get_kbm_kelas_pv_luar_by_periode($tahun, $bulan){
            $this->db->from("kelas_pv_luar as a");
            $this->db->join("kbm as b", "a.id_kelas = b.id_kelas");
            $this->db->where("YEAR(tgl) = ", $tahun);
            $this->db->where("MONTH(tgl) = ", $bulan);
            $this->db->group_by("id_jadwal");
            return $this->db->get()->result_array();
        }
        
        public function get_kelas_pv_khusus_by_periode($tahun, $bulan){
            $this->db->from("kelas as a");
            $this->db->join("kbm as b", "a.id_kelas = b.id_kelas");
            $this->db->where("YEAR(tgl) = ", $tahun);
            $this->db->where("MONTH(tgl) = ", $bulan);
            $this->db->where("tipe_kelas", "pv khusus");
            $this->db->group_by("a.id_kelas");
            return $this->db->get()->result_array();
        }

        public function get_kelas_pv_luar_by_periode($tahun, $bulan){
            $this->db->from("kelas as a");
            $this->db->join("kbm as b", "a.id_kelas = b.id_kelas");
            $this->db->where("YEAR(tgl) = ", $tahun);
            $this->db->where("MONTH(tgl) = ", $bulan);
            $where = "(tipe_kelas = 'pv luar' OR tipe_kelas = 'pv luar kota')";
            $this->db->where($where);
            $this->db->group_by("a.id_kelas");
            return $this->db->get()->result_array();
        }

        public function get_all_kelas_reguler(){
            $this->db->from("kelas_reguler");
            return $this->db->get()->result_array();
        }

        public function get_all_kelas_pv_khusus(){
            $this->db->from("kelas_pv_khusus");
            $this->db->order_by("nama_peserta");
            return $this->db->get()->result_array();
        }
        
        public function get_all_kelas_pv_luar(){
            $this->db->from("kelas_pv_luar");
            $this->db->order_by("nama_peserta");
            return $this->db->get()->result_array();
        }
        
        public function get_peserta_aktif_by_kelas($id_kelas){
            $this->db->from("peserta");
            $this->db->where("id_kelas", $id_kelas);
            $this->db->where("status", "aktif");
            $this->db->order_by("nama_peserta", "asc");
            return $this->db->get()->result_array();
        }
    // get all

    // edit data
        // fungsi untuk mengubah data kelas dan jadwal kelas reguler
        public function edit_kelas_reguler(){
            $id = $this->input->post("id", TRUE);
            
            // edit data kelas
            $data = [
                // "status" => $this->input->post("status", TRUE),
                "nip" => $this->input->post("nip", TRUE),
                "pengajar" => $this->input->post("pengajar", TRUE),
                "program" => $this->input->post("program", TRUE),
            ];

            $this->db->where("id_kelas", $id);
            $this->db->update("kelas", $data);

            // edit jadwal kelas
            $data['jadwal'] = [
                "tempat" => $this->input->post("tempat", TRUE),
                "hari" => $this->input->post("hari", TRUE),
                "jam" => $this->input->post("jam", TRUE)
            ];
            
            $this->db->where("id_kelas", $id);
            $this->db->update("jadwal", $data['jadwal']);
        }
        
        // fungsi untuk mengubah data kelas privat
        public function edit_kelas_privat(){
            $id = $this->input->post("id", TRUE);
            if($this->input->post("nip")){
                $nip = $this->input->post("nip");
            } else {
                $nip = NULL;
            }
            
            $data = [
                "status" => $this->input->post("status", TRUE),
                "nip" => $nip,
                "pengajar" => $this->input->post("pengajar", TRUE),
                "program" => $this->input->post("program", TRUE),
                "catatan" => $this->input->post("catatan", TRUE)
            ];

            $this->db->where("id_kelas", $id);
            $this->db->update("kelas", $data);

            if($this->input->post("id_peserta")){
                $id_peserta = $this->input->post("id_peserta", TRUE);
                $this->db->where("id_kelas", $id);
                $this->db->update("kelas_koor", ["id_peserta" => $id_peserta]);
            }

        }

        // fungsi untuk memindahkan peserta kelas reguler ke kelas
        public function pindah_kelas_reguler($id, $id_kelas){
            $this->db->where("id_peserta", $id);
            $this->db->update("peserta", ["id_kelas" => $id_kelas, "status" => "aktif"]);
        }

        // fungsi untuk menonaktifkan peserta
        public function nonaktif_peserta($id_peserta){
            $this->db->where("id_peserta", $id_peserta);
            $this->db->update("peserta", ["status" => "nonaktif"]);
        }

        // fungsi untuk mengaktifkan peserta
        public function aktifkan_peserta($id_peserta){
            $this->db->where("id_peserta", $id_peserta);
            $this->db->update("peserta", ["status" => "aktif"]);
        }
        
        // fungsi untuk menonaktifkan jadwal
        public function nonaktif_jadwal($id_jadwal){
            $this->db->where("id_jadwal", $id_jadwal);
            $this->db->update("jadwal", ["status" => "nonaktif"]);
        }

        // fungsi untuk mengedit data peserta reguler
        public function edit_data_peserta_reguler(){
            // var_dump($_POST);
            $id = $this->input->post("id_peserta", TRUE);

            $data = [
                "status" => $this->input->post("status", TRUE),
                "program" => $this->input->post("program", TRUE),
                "hari" => $this->input->post("hari", TRUE),
                "jam" => $this->input->post("jam", TRUE),
                "nama_peserta" => $this->input->post("nama", TRUE),
                "no_hp" => $this->input->post("no_hp", TRUE),
                "jk" => $this->input->post("jk", TRUE),
                "tgl_lahir" => $this->input->post("tgl_lahir", TRUE)
            ];
            $this->db->where("id_peserta", $id);
            $this->db->update("peserta", $data);

            $this->db->where("id_peserta", $id);
            $this->db->update("alamat", ["alamat" => $this->input->post("alamat", TRUE)]);
        }
        
        // fungsi edit data peserta privat
        public function edit_data_peserta_privat(){
            $id = $this->input->post("id_peserta", TRUE);

            $data = [
                "status" => $this->input->post("status", TRUE),
                "nama_peserta" => $this->input->post("nama", TRUE),
                "no_hp" => $this->input->post("no_hp", TRUE),
                "jk" => $this->input->post("jk", TRUE),
                "tgl_lahir" => $this->input->post("tgl_lahir", TRUE)
            ];

            $this->db->where("id_peserta", $id);
            $this->db->update("peserta", $data);

            $this->db->where("id_peserta", $id);
            $this->db->update("alamat", ["alamat" => $this->input->post("alamat", TRUE)]);
        }

        // fungsi untuk memindahkan peserta reguler ke waiting list
        public function pindah_peserta_reguler_wl(){
            $id_peserta = $this->input->post("id_peserta", TRUE);
            foreach ($id_peserta as $id_peserta) {
                $data = [
                    "program" => $this->input->post("program", TRUE),
                    "hari" => $this->input->post("hari", TRUE),
                    "jam" => $this->input->post("jam", TRUE),
                    "status" => 'wl'
                ];

                $this->db->where("id_peserta", $id_peserta);
                $this->db->update("peserta", $data);
            }
        }

        // fungsi untuk mengkonfirmasi kelas waiting list
        public function konfirm_wl($id_kelas){
            $this->db->where("id_kelas", $id_kelas);
            $this->db->update("kelas", ["status" => "aktif"]);

            $this->db->from("kelas as a");
            $this->db->join("kelas_koor as b", "a.id_kelas = b.id_kelas");
            $this->db->join("peserta as c", "b.id_peserta = c.id_peserta");
            $this->db->where("a.id_kelas", $id_kelas);
            $kelas = $this->db->get()->row_array();

            $inbox = "Kelas waiting list Anda telah dikonfirmasi. Silahkan mengajar kelas {$kelas['nama_peserta']}. Lihat jadwal KBM <a href='kelas'>disini</a>";

            $this->add_inbox($kelas['nip'], "Waiting List", $inbox);
        }

        // fungsi untuk mengkonfirmasi kbm badal
        public function konfirm_badal($id){
            $this->db->from("kbm");
            $this->db->where("id_kbm", $id);
            $badal = $this->db->get()->row_array();

            $this->db->from("jadwal_badal");
            $this->db->where("id_kbm", $id);
            $data = $this->db->get()->row_array();
            
            $inbox = "Pengajuan badal Anda disetujui. Kelas {$data['peserta']} pada {$data['hari']} " .date('d-M-Y', strtotime($data['tgl']))." Pukul {$data['jam']} akan dibadal oleh {$data['kpq_badal']}";
            $this->add_inbox($badal['nip'], "Badal", $inbox);
            
            $this->db->from("kbm_badal");
            $this->db->where("id_kbm", $id);
            $badal = $this->db->get()->row_array();

            $inbox = "Silahkan membadal {$data['kpq']} untuk kelas {$data['peserta']} pada {$data['hari']} " .date('d-M-Y', strtotime($data['tgl']))." Pukul {$data['jam']}. Lihat jadwal badal <a href='kelas/badal'>disini</a>";
            
            $this->add_inbox($badal['nip_badal'], "Badal", $inbox);

            $this->db->where("id_kbm", $id);
            $this->db->update("kbm_badal", ["status" => "on"]);
        }

        // fungsi untuk membatalkan waiting list
        public function batal_wl($id_kelas){
            $this->db->from("kelas as a");
            $this->db->join("kelas_koor as b", "a.id_kelas = b.id_kelas");
            $this->db->join("peserta as c", "b.id_peserta = c.id_peserta");
            $this->db->where("a.id_kelas", $id_kelas);
            $kelas = $this->db->get()->row_array();

            $inbox = "Pengajuan waiting list Anda untuk kelas {$kelas['nama_peserta']} tidak diterima. Lihat waiting list yang lain <a href='kelas/wl'>disini</a>";

            $this->add_inbox($kelas['nip'], "Waiting List", $inbox);

            $this->db->where("id_kelas", $id_kelas);
            $this->db->update("kelas", ["status" => "wl", "nip" => null]);
        }

    // edit data

    // add
        // fungsi untuk menambahkan jadwal
        public function add_jadwal(){

            // $_POST['jadwal'] = 07.00-08.30|2
            
            $jam = explode('|', $_POST['jam']);
            
            $data = [
                "hari" => $this->input->post("hari"),
                "jam" => $jam[0],
                "ot" => $jam[1],
                "tempat" => $this->input->post("tempat", TRUE),
                "status" => "aktif",
                "id_kelas" => $this->input->post("id")
            ];

            $this->db->insert("jadwal", $data);
        }

        // fungsi untuk mennambahkan kelas reguler
        public function add_kelas_reguler(){
            $this->db->from("kelas");
            $this->db->order_by("id_kelas", "DESC");
            $id = $this->db->get()->row_array();
            $id_kelas = $id['id_kelas'] + 1;

            // data kelas
            $data = [
                "id_kelas" => $id_kelas,
                "tgl_mulai" => date('Y-m-d'),
                "program" => $this->input->post("program", TRUE),
                "status" => 'aktif',
                "tipe_kelas" => 'reguler',
                "ket" => 'reguler',
                "pengajar" => $this->input->post("pengajar", TRUE),
                "tempat" => "LKP TAR-Q",
                "nip" => $this->input->post("nip", TRUE)
            ];

            $this->db->insert("kelas", $data);

            // data jadwal
            $data = [
                "hari" => $this->input->post("hari", TRUE),
                "jam" => $this->input->post("jam", TRUE),
                "ot" => '0',
                "tempat" => $this->input->post("tempat", TRUE),
                "status" => "aktif",
                "id_kelas" => $id_kelas
            ];

            $this->db->insert("jadwal", $data);
        }

        // fungsi untuk menambahkan program
        public function add_program(){
            $this->db->insert("program", ["nama_program" => $this->input->post("program")]);
        }

        // fungsi untuk menambahkan inbox
        public function add_inbox($nip, $judul, $inbox){
            $note = [
                "judul" => $judul,
                "inbox" => $inbox,
                "status" => "off",
                "tgl_inbox" => date("Y-m-d H:i:s"),
                "nip" => $nip
            ];
            
            $this->db->insert("inbox", $note);
        }
    // add

    // delete
        // fungsi untuk menghapus program
        public function delete_program_by_id_program($id){
            $this->db->where("id_program", $id);
            $this->db->delete("program");
        }

        // fungsi untuk menghapus kbm ketika akademik membatalkan kelas badal
        public function delete_badal_by_id_kbm($id){
            $this->db->from("kbm");
            $this->db->where("id_kbm", $id);
            $badal = $this->db->get()->row_array();

            $inbox = "Pengajuan badal Anda untuk kelas {$badal['peserta']} pada {$badal['hari']} " .date('d-M-Y', strtotime($badal['tgl']))." Pukul {$badal['jam']} tidak disetujui. Silahkan menghubungi bagian akademik";
            
            $this->add_inbox($badal['nip'], "Badal", $inbox);

            $this->db->where("id_kbm", $id);
            $this->db->delete("kbm");
        }
    // delete
}