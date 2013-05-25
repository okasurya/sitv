<?php
class Pengumuman extends CI_Controller{
    function Pengumuman(){
        parent::__construct();
        if(!$this->session->userdata('logged_in')) redirect('auth/login');
        $this->load->library('form_validation');
        $this->load->model('pengumuman_model');
    }
    
    function index(){
        $this->tambah_pengumuman();
    }
    
    function tambah_pengumuman(){
        $sitedata['title'] = 'Tambah Pengumuman';
        //rules
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('mulai', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('selesai', 'Waktu Selesai', 'required');
        
        $this->form_validation->set_message('required', '%s harus diisi');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        //upload configuration
        $config['upload_path'] = './uploads/';
        $config['max_size']	= '0';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $filepath = 'userfile';
        
        //upload file
        if($this->form_validation->run() == TRUE){
            if( !$this->upload->do_upload($filepath) == TRUE){
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('pengumuman/upload_error', $error);
            }
            else{
                $judul = $this->input->post('judul');
                $deskripsi = $this->input->post('deskripsi');
                $mulai = (string)$this->input->post('mulai')." ".(string)$this->input->post('jammulai').":".(string)$this->input->post('menitmulai');
                $selesai = (string)$this->input->post('selesai')." ".(string)$this->input->post('jamselesai').':'.(string)$this->input->post('menitselesai');
                $id_jenis = $this->input->post('jenis');
                $id_pengisi = $this->session->userdata('user_id');
                $id_status = '0';
                date_default_timezone_set('Asia/Jakarta');
                $timestamp = date('Y-m-d H:i:s');
                
                $uploaddata = $this->upload->data();
                $namafile = $uploaddata['file_name'];
                
                $data = array(
                    'JUDUL_PENGUMUMAN' => $judul,
                    'DESKRIPSI_PENGUMUMAN' => $deskripsi,
                    'MULAI_TAYANG_PENGUMUMAN' => $mulai,
                    'SELESAI_TAYANG_PENGUMUMAN' => $selesai,
                    'ID_JENIS_PENGUMUMAN' => $id_jenis,
                    'LOKASI_FILE_PENGUMUMAN' => $namafile,
                    'ID_PENGISI_PENGUMUMAN' => $id_pengisi,
                    'ID_STATUS_PENGUMUMAN' => $id_status,
                    'TIMESTAMP_PENGUMUMAN' => $timestamp
                );
                //insert into database
                $this->pengumuman_model->insertPengumuman($data);
                $sitedata['status'] = "Penambahan pengumuman berhasil !";
                //after all chaos end
                $this->load->view('pengumuman/form_tambah_pengumuman', $sitedata);

                
            }
        }
        else{
            $sitedata['status'] ='';
            $this->load->view('pengumuman/form_tambah_pengumuman', $sitedata);
        }
    }
    function detail_pengumuman($id){
        $sitedata['detail'] = $this->pengumuman_model->selectPengumuman($id);
        $this->load->view('pengumuman/detail_pengumuman', $sitedata);
    }
    function edit_pengumuman($id){
            $query = $this->pengumuman_model->selectPengumuman($id);
            foreach ($query->result() as $row){
                $sitedata['title'] = $row->JUDUL_PENGUMUMAN;
                $sitedata['desc'] = $row->DESKRIPSI_PENGUMUMAN;
                $sitedata['tanggalmulai'] = $row->TANGGAL_MULAI;
                $sitedata['menitmulai'] = $row->MENIT_MULAI;
                $sitedata['jammulai'] = $row->JAM_MULAI;
                $sitedata['tanggalselesai'] = $row->TANGGAL_SELESAI;
                $sitedata['menitselesai'] = $row->MENIT_SELESAI;
                $sitedata['jamselesai'] = $row->JAM_SELESAI;
                $sitedata['idjenis'] = $row->ID_JENIS_PENGUMUMAN;
                $sitedata['file'] = $row->LOKASI_FILE_PENGUMUMAN;
                $sitedata['status'] = $row->ID_STATUS_PENGUMUMAN;
                $idpengisi = $row->ID_PENGISI_PENGUMUMAN;
            }
            
            if(($this->session->userdata('role') == 1) or ($this->session->userdata('user_id') == $idpengisi)){
                $sitedata['idpengisi'] = $idpengisi;
                $sitedata['id'] = $id;
                $this->load->view('pengumuman/edit_pengumuman', $sitedata);
            }
            else{
                $sitedata['title'] = 'Error';
                $sitedata['content'] = 'Anda tidak diijinkan mengakses halaman ini';
                $this->load->view('error', $sitedata);
            }
    }
    
    function update(){
        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');
        $mulai = (string)$this->input->post('mulai')." ".(string)$this->input->post('jammulai').":".(string)$this->input->post('menitmulai');
        $selesai = (string)$this->input->post('selesai')." ".(string)$this->input->post('jamselesai').':'.(string)$this->input->post('menitselesai');
        $id_jenis = $this->input->post('jenis');
        $id_pengisi = $this->session->userdata('user_id');
        $id_status = '0';
    }
    
    function delete_file($file){
        unlink('uploads/'.$file);
    }
}
?>