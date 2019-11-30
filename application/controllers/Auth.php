<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
    {
        $data = [
            'title' => 'Halaman Login'
        ];
        $this->load->view('auth/login', $data);   
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $query = $this->db->get_where('users', ['username'=>$username])->row_array();
        
        if ($query) {
            if ($password === $query['password']) {
                $this->session->set_userdata('username', $username);
                redirect(base_url('settings'), 'refresh');      
            }else{
                $this->session->set_flashdata('msg', 'Password tidak sesuai');
                redirect(base_url('auth'), 'refresh');
            }
        }else{
            $this->session->set_flashdata('msg', 'Username tidak terdaftar');
            redirect(base_url('auth'), 'refresh');
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        redirect(base_url('auth'), 'refresh');
    }

}

/* End of file Controllername.php */
