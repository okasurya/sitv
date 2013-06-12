<?php
    class Manajemen_teks extends CI_Controller{
        function Manajemen_teks(){
            parent::__construct();
            if(!$this->session->userdata('logged_in')) redirect('auth/login');
            $this->load->helper('flexigrid');
            $this->load->library('flexigrid');
            $this->load->helper('download');
            $this->load->model('pengumuman_model');
        }
        
        function index(){
            $this->panel();
        }
        
        function panel(){
			$colModel['id_pengumuman'] = array('ID',20,TRUE,'left',0);
			$colModel['edit'] = array('Edit',20, false, 'center', 0);
			$colModel['judul_pengumuman'] = array('Judul Pengumuman',150,TRUE,'center',1);
			$colModel['deskripsi_pengumuman'] = array('Isi Pengumuman',150,TRUE,'center',0);
			$colModel['user_name'] = array('Uploader',80, TRUE, 'center',2);
			//		if($this->session->userdata('role') == 1){
			//			$colModel['edit_indeks'] = array('Ubah Indeks',60,FALSE,'center',0);
			//		}
			$colModel['mulai_tayang_pengumuman'] = array('Mulai Tayang',90,TRUE,'center',1);
			$colModel['selesai_tayang_pengumuman'] = array('Selesai Tayang',90,TRUE,'center',1);
			$colModel['id_status_pengumuman'] = array('Status',30, TRUE, 'center',1);		
			$colModel['timestamp_pengumuman'] = array('Timestamp',90, TRUE, 'center',1);		
			
			/*
			 * Aditional Parameters
			 */
			$gridParams = array(
						'width' => 900,
						'height' => 400,
						'rp' => 100,
						'rpOptions' => '[10,15,20,25,40, 100]',
						'pagestat' => 'Displaying: {from} to {to} of {total} items.',
						'blockOpacity' => 0.5,
						'title' => '',
						'usepager'=> true,
						'useRp' => true,
						'showTableToggleBtn' => true,
						'nowrap' => false
			);
			
			$buttons[] = array('Select All','tick','menu1');
			$buttons[] = array('Select None','cross','menu1');
			$buttons[] = array('separator');
			$buttons[] = array('Approve','add','menu1');
			$buttons[] = array('Reject','delete','menu1');
			$buttons[] = array('separator');
			$buttons[] = array('Copy to Clipboard', 'copy', 'menu1');
					
			//Build js
			//View helpers/flexigrid_helper.php for more information about the params on this function
			$grid_js = build_grid_js('flex',site_url("pengumuman/manajemen_teks/grid_panel"),$colModel,'id pengumuman','asc',$gridParams,$buttons);
			
			$data['js_grid'] = $grid_js;
			//rendering view
			$data['title'] = 'Pengumuman Teks';
			$this->load->view('pengumuman/panel',$data);
			
        }
        
        function grid_panel(){
            $valid_fields = array('judul_pengumuman', 'deskripsi_pengumuman', 'user_name', 'tanggal_mulai', 'tanggal_selesai', 'timestamp_pengumuman');
            $this->flexigrid->validate_post('id_pengumuman', 'asc', $valid_fields);
            $records = $this->pengumuman_model->select(2);
            $this->output->set_header($this->config->item('json_header'));
            $no = 1;
            foreach ($records['records']->result() as $row) {
                $link_edit = "<a href='".site_url('pengumuman/pengumuman/edit_pengumuman').'/'.$row->ID_PENGUMUMAN."'><img src='".base_url('public/images/icons/edit.png')."'/></a>";
                $new='<img src="'.base_url('public/images/icons/new.png').'" title="New"/>';
                $approved='<img src="'.base_url('public/images/icons/approve.png').'" title="Approved" class="app'.$row->ID_PENGUMUMAN.'"/>';
                $rejected='<img src="'.base_url('public/images/icons/reject.png').'" title="Rejected"/>';
				$desc = '';
				$desc1 = '';
                if($row->ID_STATUS_PENGUMUMAN == 0){
                    $status = $new;
					$desc = '';
					$desc1 = '';
                } else if($row->ID_STATUS_PENGUMUMAN == 1){
                    $status = $approved;
					$desc ='<span id="aprd'.$row->ID_PENGUMUMAN.'" class="aprd">';
					$desc1 = '</div>';
                } else if($row->ID_STATUS_PENGUMUMAN == 2){
                    $status = $rejected;
					$desc = '';
					$desc1 = '';
                }
				$record_items[] = array(
					$row->ID_PENGUMUMAN,
					$no++,
					$link_edit,
					$row->JUDUL_PENGUMUMAN,
					$desc.$row->DESKRIPSI_PENGUMUMAN.$desc1,
					$row->USER_NAME,
					//$ubah_indeks,
					$row->TANGGAL_MULAI,
					$row->TANGGAL_SELESAI,
					$status,
					$row->TIMESTAMP_PENGUMUMAN
				);
            }

            if (isset($record_items))
                $this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
            else $this->output->set_output('{"page":"1","total":"0","rows":[]}');
        }
        
		function useforce(){
$data = 'apa ya';
$data .= 
'
tambah enter';
$data .=
'	tambah tab';
            $name = 'mytext.txt';
            force_download($name, $data);
            $this->load->view('home');
        }
        
		function search(){
            
        }
		
		function setuju(){
			$id_disetujui = explode(",", $this->input->post('ids'));
			foreach ($id_disetujui as $index => $id) {
				if(!$this->pengumuman_model->is_approved($id)){
					$this->pengumuman_model->set_approved($id);
				}
			}
		}
		
		function tolak(){
			$id_ditolak = explode(",", $this->input->post('ids'));
			foreach ($id_ditolak as $index => $id) {
				if(!$this->pengumuman_model->is_rejected($id)){
					$this->pengumuman_model->set_rejected($id);
				}
			}
		}
    }
?>