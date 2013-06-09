<?php
    class Playlist extends CI_Controller{
        function Playlist(){
            parent::__construct();
            if(!$this->session->userdata('logged_in')) redirect('auth/login');
            $this->load->helper('download');
			$this->load->helper('file');
            $this->load->model('pengumuman_model');
        }

		function index(){
		
		}
		
		function generate_multimedia(){
$filepath = 'C:\\xampp\\htdocs\\sitv\\uploads\\';
$req= 
'	0	-1';
$enter=
'
';
$text='';
			$idpl = explode(",", $this->input->post('ids'));
			foreach($idpl as $index => $id){
				if(!$this->pengumuman_model->get_filename($id) == ''){
				$text .=$filepath.$this->pengumuman_model->get_filename($id).$req.$enter;}
			}	
			$text;
			$name = 'jadwal.txt';
			delete_files('./playlist/'.$name);
			write_file('./playlist/'.$name, $text);
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
		
		function download(){
			$data = file_get_contents("./playlist/jadwal.txt");
			$name = "jadwal.txt";
			force_download($name, $data);	
		}
	}
?>