<?php
    class Pengumuman_model extends CI_Model{
        function Pengumuman_model(){
            parent::__construct();
            $this->CI = get_instance();
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
        function updatePengumuman($id, $data){
           $this->db->where('id_pengumuman', $id);
           $this->db->update('pengumuman', $data);
        }
        function select($jenis){
            $this->db->select('
                ID_PENGUMUMAN,
                JUDUL_PENGUMUMAN,
                DESKRIPSI_PENGUMUMAN,
				MULAI_TAYANG_PENGUMUMAN,
				SELESAI_TAYANG_PENGUMUMAN,
                MINUTE(MULAI_TAYANG_PENGUMUMAN) as MENIT_MULAI,
                HOUR(MULAI_TAYANG_PENGUMUMAN) as JAM_MULAI,
                DATE(MULAI_TAYANG_PENGUMUMAN) as TANGGAL_MULAI,
                HOUR(SELESAI_TAYANG_PENGUMUMAN) as JAM_SELESAI,
				DATE(SELESAI_TAYANG_PENGUMUMAN) as TANGGAL_SELESAI,
                LOKASI_FILE_PENGUMUMAN,
				USER_ID,
                USER_NAME,
                ID_STATUS_PENGUMUMAN,
                TIMESTAMP_PENGUMUMAN
                ');
            $this->db->from('pengumuman');
            $this->db->join('user', 'ID_PENGISI_PENGUMUMAN = USER_ID', 'left');
            $this->db->join('jenis_pengumuman', 'ID_JENIS_PENGUMUMAN = ID_JENIS', 'left');
			$this->db->where('ID_JENIS_PENGUMUMAN', $jenis);
            $this->CI->flexigrid->build_query();
            $result['records'] = $this->db->get();
            
            $this->db->select('
                ID_PENGUMUMAN,
                JUDUL_PENGUMUMAN,
                DESKRIPSI_PENGUMUMAN,
				MULAI_TAYANG_PENGUMUMAN,
				SELESAI_TAYANG_PENGUMUMAN,
                MINUTE(MULAI_TAYANG_PENGUMUMAN) as MENIT_MULAI,
                TIME(MULAI_TAYANG_PENGUMUMAN) as JAM_MULAI,
                DATE(MULAI_TAYANG_PENGUMUMAN) as TANGGAL_MULAI,
                MINUTE(SELESAI_TAYANG_PENGUMUMAN) as MENIT_SELESAI,
                HOUR(SELESAI_TAYANG_PENGUMUMAN) as JAM_SELESAI,
				DATE(SELESAI_TAYANG_PENGUMUMAN) as TANGGAL_SELESAI,
                LOKASI_FILE_PENGUMUMAN,
                USER_ID,
                USER_NAME,
                ID_STATUS_PENGUMUMAN,
                TIMESTAMP_PENGUMUMAN
                ');
            $this->db->from('pengumuman');
            $this->db->join('user', 'ID_PENGISI_PENGUMUMAN = USER_ID', 'left');
            $this->db->join('jenis_pengumuman', 'ID_JENIS_PENGUMUMAN = ID_JENIS', 'left');
			$this->db->where('ID_JENIS_PENGUMUMAN', $jenis);
            $this->CI->flexigrid->build_query(FALSE);
            $result['record_count'] = $this->db->count_all_results();
            
            return $result;
        }
		
		function is_approved($id){
			$this->db->select('ID_STATUS_PENGUMUMAN');
			$this->db->from('pengumuman');
			$this->db->where('id_pengumuman', $id);
			$query = $this->db->get();
			$res = $query->row_array();
			
			if($res['ID_STATUS_PENGUMUMAN'] == '1'){
				return true;
			}
			else {
				return false;
			}
		}
		
		function set_approved($id){
			$this->db->where('id_pengumuman', $id);
			$data['id_status_pengumuman'] = '1';
			$this->db->update('pengumuman', $data);
		}
		
		function is_rejected($id){
			$this->db->select('ID_STATUS_PENGUMUMAN');
			$this->db->from('pengumuman');
			$this->db->where('id_pengumuman', $id);
			$query = $this->db->get();
			$res = $query->row_array();
			
			if($res['ID_STATUS_PENGUMUMAN'] == '2'){
				return true;
			}
			else {
				return false;
			}
		}
		
		function set_rejected($id){
			$this->db->where('id_pengumuman', $id);
			$data['id_status_pengumuman'] = '2';
			$this->db->update('pengumuman', $data);
		}
		
		function get_filename($id){
			$this->db->select('LOKASI_FILE_PENGUMUMAN');
			$this->db->from('pengumuman');
			$this->db->where('ID_PENGUMUMAN', $id);
			$result = $this->db->get();
			
			foreach($result->result() as $row){
				return $row->LOKASI_FILE_PENGUMUMAN;
			}
		}
    }
?>
