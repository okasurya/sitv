<?php
    class Login extends CI_Controller{
        function Login(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->database();
            $this->load->model('user_model');
        }
        
        function index(){
            $sitedata['title'] = 'Login';
            $this->load->view('login_view', $sitedata);
        }
        
        function masuk(){
            $sitedata['title'] = 'Login';
            if($this->session->userdata('logged_in') == TRUE){
                redirect('home');
            }
            else if($this->cekForm() == TRUE){
                $name = $this->input->post('emailfield');
                $pass = md5($this->input->post('passfield'));
                $result = $this->user_model->cekLogin($name, $pass);
                
                if($result->num_rows > 0){
                    foreach ($result->result() as $row){
                        $userdata = array(
                                    'user_id' => $row->USER_ID,
                                    'logged_in' => TRUE,
                                    'username' => $row->USER_NAME,
                                    'email' => $row->EMAIL,
                                    'role' => $row->USER_ROLE
                                    );
                    }
                    $this->session->set_userdata($userdata);
                    redirect('home');
                }
                else{
                    redirect('auth/login', $sitedata);
                }
            }
            else{
                $this->load->view('login_view', $sitedata);
            }
        }
        
        function keluar(){
            $this->session->sess_destroy();
            redirect('auth/login', $sitedata);
        }
        
        function cekForm(){
            $this->form_validation->set_rules('emailfield', 'email', 'required');
            $this->form_validation->set_rules('passfield', 'password', 'required');
            
            $this->form_validation->set_message('required', 'Kolom %s harus diisi!');
            $this->form_validation->set_error_delimiters('<li class="error">', '</li>');
            
            return $this->form_validation->run();
        }
    }
?>
