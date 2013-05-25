<?php
class Home extends CI_controller{
    function Home(){
        parent::__construct();
        if(!$this->session->userdata('logged_in')) redirect('auth/login');
        $this->load->model('pengumuman_model');
    }
    
    function index(){
        $nama =  $this->session->userdata('username');
        $sitedata['heading'] = 'Selamat datang '.$nama.', di website SI TV';
        $sitedata['title']  = 'SISTEM INFORMASI TELEVISI';
        $sitedata['jadwal'] = $this->pengumuman_model->selectAll();
        $this->load->view('home_view', $sitedata);
    }
}
?>