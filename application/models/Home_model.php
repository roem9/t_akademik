<?php
class Home_Model extends CI_MODEL{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('Datatables', 'datatables');
    }
    
    function getDataHomeAkademik() { 
        $query = "
            DROP TEMPORARY TABLE IF EXISTS temp_tahun_kbm;
            DROP TEMPORARY TABLE IF EXISTS temp_kelas;
            DROP TEMPORARY TABLE IF EXISTS temp_peserta_reguler;
            DROP TEMPORARY TABLE IF EXISTS rekap_full;
            
            CREATE TEMPORARY TABLE temp_tahun_kbm (
                bulan INT,
                tahun INT,
                tgl_kbm DATE
            );
            
            CREATE TEMPORARY TABLE temp_peserta_reguler (
                bulan INT,
                tahun INT,
                peserta INT
            );
            
            CREATE TEMPORARY TABLE temp_kelas (
                bulan INT,
                tahun INT,
                reguler INT,
                pv_khusus INT,
                pv_luar INT
            );
            
            INSERT INTO temp_tahun_kbm
            SELECT 
                MONTH(tgl) as month
                , YEAR(tgl) as year
                , MAX(tgl) as tgl
            FROM kbm
            group by YEAR(tgl), MONTH(tgl);
            
            
            select * from temp_tahun_kbm;
            
            
            INSERT INTO temp_peserta_reguler 
            SELECT 
                MONTH(tgl)
                , YEAR(tgl)
                , COUNT(distinct c.id_peserta)
            FROM kelas_reguler AS a
            JOIN kbm as b ON a.id_kelas = b.id_kelas
            JOIN presensi_peserta as c ON b.id_kbm = c.id_kbm
            group by YEAR(tgl), MONTH(tgl);
            
            
            INSERT INTO temp_kelas 
            SELECT 
                MONTH(tgl) AS bulan,
                YEAR(tgl) AS tahun,
                COUNT(DISTINCT CASE WHEN tipe_kelas = 'reguler' THEN a.id_kelas END) AS jumlah_reguler,
                COUNT(DISTINCT CASE WHEN tipe_kelas = 'pv khusus' THEN a.id_kelas END) AS jumlah_pv_khusus,
                COUNT(DISTINCT CASE WHEN tipe_kelas IN ('pv luar', 'pv luar kota') THEN a.id_kelas END) AS jumlah_lainnya
            FROM kelas AS a
            JOIN kbm AS b ON a.id_kelas = b.id_kelas
            WHERE a.tipe_kelas IN ('reguler', 'pv khusus', 'pv luar', 'pv luar kota')
            GROUP BY YEAR(tgl), MONTH(tgl);

            CREATE TEMPORARY TABLE rekap_full AS
            SELECT 
                CONCAT(
                    CASE 
                        WHEN MONTH(tgl_kbm) = 1 THEN 'Januari'
                        WHEN MONTH(tgl_kbm) = 2 THEN 'Februari'
                        WHEN MONTH(tgl_kbm) = 3 THEN 'Maret'
                        WHEN MONTH(tgl_kbm) = 4 THEN 'April'
                        WHEN MONTH(tgl_kbm) = 5 THEN 'Mei'
                        WHEN MONTH(tgl_kbm) = 6 THEN 'Juni'
                        WHEN MONTH(tgl_kbm) = 7 THEN 'Juli'
                        WHEN MONTH(tgl_kbm) = 8 THEN 'Agustus'
                        WHEN MONTH(tgl_kbm) = 9 THEN 'September'
                        WHEN MONTH(tgl_kbm) = 10 THEN 'Oktober'
                        WHEN MONTH(tgl_kbm) = 11 THEN 'November'
                        WHEN MONTH(tgl_kbm) = 12 THEN 'Desember'
                    END,
                    ' ',
                    YEAR(tgl_kbm)
                ) AS periode
                , CONCAT(COALESCE(b.reguler, 0), '(', COALESCE(c.peserta, 0), ')') as reguler
                , COALESCE(b.pv_khusus, 0) AS pv_khusus
                , COALESCE(b.pv_luar, 0) AS pv_luar
            FROM temp_tahun_kbm as a
            left join temp_kelas as b ON a.bulan = b.bulan AND a.tahun = b.tahun
            left join temp_peserta_reguler as c ON a.bulan = c.bulan AND a.tahun = c.tahun
            ORDER BY a.tgl_kbm DESC;
        ";

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if(trim($query) != ""){
                $this->db->query($query);
            }
        }

        $this->datatables->select('
            periode
            , reguler
            , pv_khusus
            , pv_luar
        ');

        $this->datatables->from('rekap_full');
        return $this->datatables->generate();
    }
}