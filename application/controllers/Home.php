<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $banner         = $this->db->get('banners')->row_array();
        $katalog        = $this->db->get('katalogs')->result_array();
        $manfaat        = $this->db->get('manfaat')->result_array();
        $testimonial    = $this->db->get('testimonials')->result_array();
        $whatsapp       = $this->db->get('whatsapp')->row_array();
        $data = [
            'title'         => 'SkincareID',
            'banner'        => $banner,
            'katalog'       => $katalog,
            'manfaat'       => $manfaat,
            'testimonial'   => $testimonial,
            'whatsapp'      => $whatsapp
        ];
        $this->load->view('frontend/layout/header', $data);
        $this->load->view('frontend/layout/banner');
        $this->load->view('frontend/layout/content');
        $this->load->view('frontend/layout/footer');
    }

    public function contact_us()
    {
        $valid = $this->form_validation;
        $valid->set_rules('firstname', 'Firstname', 'required');
        $valid->set_rules('lastname', 'Lastname', 'required');
        $valid->set_rules('subject', 'Subject', 'required');
        $valid->set_rules('email', 'Email', 'required|valid_email');
        $valid->set_rules('message', 'Message', 'required');
        if ($valid->run() === FALSE) {
            $banner         = $this->db->get('banners')->row_array();
            $katalog        = $this->db->get('katalogs')->result_array();
            $manfaat        = $this->db->get('manfaat')->result_array();
            $testimonial    = $this->db->get('testimonials')->result_array();
            $whatsapp       = $this->db->get('whatsapp')->row_array();
            $data = [
                'title'     => 'SkincareID',
                'banner'        => $banner,
                'katalog'       => $katalog,
                'manfaat'       => $manfaat,
                'testimonial'   => $testimonial,
                'whatsapp'      => $whatsapp
            ];
            $this->load->view('frontend/layout/header', $data);
            $this->load->view('frontend/layout/banner');
            $this->load->view('frontend/layout/content');
            $this->load->view('frontend/layout/footer');
        }else{
            $data = [
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'subject' => $this->input->post('subject'),
                'email' => $this->input->post('email'),
                'message' => $this->input->post('message'),
            ];
            $query = $this->db->insert('contact_us',$data);
            $query = $this->db->affected_rows();
            if($query === 0){
                redirect(base_url('/'), 'refresh');
            }else{
                redirect(base_url('/'), 'refresh');
            }
        }
    }

    public function subcribe()
    {
        $valid = $this->form_validation;
        $valid->set_rules('email', 'Email', 'required|valid_email');
        if ($valid->run() === FALSE) {
            $banner         = $this->db->get('banners')->row_array();
            $katalog        = $this->db->get('katalogs')->result_array();
            $manfaat        = $this->db->get('manfaat')->result_array();
            $testimonial    = $this->db->get('testimonials')->result_array();
            $whatsapp       = $this->db->get('whatsapp')->row_array();
            $data = [
                'title'     => 'SkincareID',
                'banner'        => $banner,
                'katalog'       => $katalog,
                'manfaat'       => $manfaat,
                'testimonial'   => $testimonial,
                'whatsapp'      => $whatsapp
            ];
            $this->load->view('frontend/layout/header', $data);
            $this->load->view('frontend/layout/banner');
            $this->load->view('frontend/layout/content');
            $this->load->view('frontend/layout/footer');
        }else{
            $data = [
                'email' => $this->input->post('email')
            ];
            $to = $this->input->post('email');
            // $this->send_email($to,'SkincareID', 'Hai '.$to);
            $query = $this->db->insert('subcribe',$data);
            $query = $this->db->affected_rows();
            if($query === 0){
                redirect(base_url('/'), 'refresh');
            }else{
                redirect(base_url('/'), 'refresh');
            }
        }
    }

    public function send_email($to, $subject, $msg)
    {
        $this->load->library('email');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_user'] = 'alkhaminaz@gmail.com';
        $config['smtp_pass'] = 'sahabatnoah';
        $config['smtp_port'] = 465;
        $config['smtp_crypto'] = 'ssl';
        $config['mailtype'] = 'html';
        $this->email->initialize($config);

        $this->email->from($config['smtp_user'], "Skincare");
        $this->email->to($to);

        $this->email->subject($subject);
        $this->email->message($msg);

        $this->email->send();
    }

}

/* End of file Controllername.php */
