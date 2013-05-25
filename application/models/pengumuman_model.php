<?php
    class Pengumuman_model extends CI_Model{
        function Pengumuman_model(){
            parent::__construct();
        }
        function insertPengumuman($data){
            $this->db->insert('pengumuman', $data);
        }
        function selectAll(){
            $this->db->select('
                *,
                MINUTE(MULAI_TAYANG_PENGUMUMAN) as MENIT_MULAI,
                HOUR(MULAI_TAYANG_PENGUMUMAN) as JAM_MULAI,
                DAY(MULAI_TAYANG_PENGUMUMAN) as TANGGAL_MULAI,
		MONTH(MULAI_TAYANG_PENGUMUMAN) as BULAN_MULAI,
		YEAR(MULAI_TAYANG_PENGUMUMAN) as TAHUN_MULAI,
                MINUTE(SELESAI_TAYANG_PENGUMUMAN) as MENIT_SELESAI,
                HOUR(SELESAI_TAYANG_PENGUMUMAN) as JAM_SELESAI,
		DAY(SELESAI_TAYANG_PENGUMUMAN) as TANGGAL_SELESAI,
		MONTH(SELESAI_TAYANG_PENGUMUMAN) as BULAN_SELESAI,
		YEAR(SELESAI_TAYANG_PENGUMUMAN) as TAHUN_SELESAI
                ');
            $this->db->from('pengumuman');
            $result = $this->db->get();
            return $result;
        }
        function selectPengumuman($id){
            $this->db->select('*,
                    DATE(MULAI_TAYANG_PENGUMUMAN) as TANGGAL_MULAI,
                    MINUTE(MULAI_TAYANG_PENGUMUMAN) as MENIT_MULAI,
                    HOUR(MULAI_TAYANG_PENGUMUMAN) as JAM_MULAI,
                    DATE(SELESAI_TAYANG_PENGUMUMAN) as TANGGAL_SELESAI,
                    MINUTE(SELESAI_TAYANG_PENGUMUMAN) as MENIT_SELESAI,
                    HOUR(SELESAI_TAYANG_PENGUMUMAN) as JAM_SELESAI
                    '
                    );
            $this->db->from('pengumuman');
            $this->db->where('ID_PENGUMUMAN', $id);
            $result = $this->db->get();
            return $result;
        }
    }
?>
