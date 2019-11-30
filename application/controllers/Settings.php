<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function index()
    {
        $data = ['title' => 'Admin'];
        $this->load->view('layout/header',$data);
        $this->load->view('settings/index');
        $this->load->view('layout/footer');
    }

    public function banner_setting()
    {
        $banners = $this->db->get('banners')->result_array();
        $data = [
            'title'     => 'Banner Setting',
            'banners'   => $banners
        ];
        $this->load->view('layout/header',$data);
        $this->load->view('settings/banner');
        $this->load->view('layout/footer');
    }

    public function katalog_setting()
    {
        $katalogs = $this->db->get('katalogs')->result_array();
        $data = [
            'title'     => 'Katalog Setting',
            'katalogs'   => $katalogs
        ];
        $this->load->view('layout/header',$data);
        $this->load->view('settings/katalog');
        $this->load->view('layout/footer');
    }

    public function manfaat_setting()
    {
        $manfaat = $this->db->get('manfaat')->result_array();
        $data = [
            'title'     => 'Manfaat Setting',
            'manfaat'   => $manfaat,
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('settings/manfaat');
        $this->load->view('layout/footer');
    }

    public function testimonial_setting()
    {
        $testi = $this->db->get('testimonials')->result_array();
        $data = [
            'title' => 'Testimonial Setting',
            'testi' => $testi
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('settings/testimonial');
        $this->load->view('layout/footer');
    }

    public function whatsapp_setting()
    {
        $whatsapp = $this->db->get('whatsapp')->result_array();
        $data = [
            'title'     => 'Whatsapp Setting',
            'whatsapp'  => $whatsapp
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('settings/whatsapp');
        $this->load->view('layout/footer');
    }

    // Add katalog
    public function katalog_add()
    {
        $valid = $this->form_validation;
        $valid->set_rules('name', 'Name', 'required');
        $valid->set_rules('price', 'Number', 'required');
        $valid->set_rules('description', 'Description', 'required');
        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Set Katalog',
            ];
            $this->load->view('layout/header', $data);
            $this->load->view('settings/katalog_add', $data);
            $this->load->view('layout/footer', $data);
        }else{
            $config['upload_path']   = './assets/upload/katalog';
			$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
			$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')){
                $data = [
                    'title'     => 'Set Katalog',
                    'error'	    => $this->upload->display_errors()
                ];
                $this->load->view('layout/header', $data);
                $this->load->view('settings/katalog_add', $data);
                $this->load->view('layout/footer', $data);
            }else{
                $upload_data        		= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']  	= 'gd2';
				$config['source_image']   	= './assets/upload/katalog/'.$upload_data['uploads']['file_name']; 
				$config['new_image']     	= './assets/upload/katalog/thumbs/';
				$config['create_thumb']   	= TRUE;
				$config['quality']       	= "100%";
				$config['maintain_ratio']   = TRUE; 
				$config['width']       		= 360; // Pixel
				$config['height']       	= 360; // Pixel
				$config['x_axis']       	= 0;
				$config['y_axis']       	= 0;
				$config['thumb_marker']   	= '';
				$this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $data = [
                    'image'         => $upload_data['uploads']['file_name'],
                    'name'          => $this->input->post('name'),
                    'price'         => $this->input->post('price'),
                    'description'   => $this->input->post('description'),
                    'created_at'    => time()
                ];
                $query = $this->db->insert('katalogs', $data);
                $query = $this->db->affected_rows();
    
                if($query === 0){
                    $this->session->set_flashdata('msg', 'Data tidak berhasil disimpan');
                    redirect(base_url('settings/katalog_setting'), 'refresh');
                }else{
                    $this->session->set_flashdata('msg', 'Data berhasil disimpan');
                    redirect(base_url('settings/katalog_setting'), 'refresh');
                }
            }
        }
    }
    // end add katalog

    // delete katalog
    public function katalog_delete($id)
    {
        $katalog = $this->db->get_where('katalogs', ['id'=>$id])->row_array();
		if ($katalog['image'] != "") {
			unlink('assets/upload/katalog/'.$katalog['image']);
			unlink('assets/upload/katalog/thumbs/'.$katalog['image']);
		}
        $query = $this->db->delete('katalogs',['id'=>$id]);
        $query = $this->db->affected_rows();
        if($query){
            $this->session->set_flashdata('msg', 'Data berhasil dihapus');
            redirect(base_url('settings/katalog_setting'), 'refresh');
        }
    }
    // end delete katalog

    // Banner edit
    public function banner_edit($id)
    {
        $valid = $this->form_validation;
        $valid->set_rules('description', 'Description', 'required');
        // $valid->set_rules('banner', 'Banner', 'required');
        $banner = $this->db->get_where('banners', ['id'=>$id])->row_array();
        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Banner Edit',
                'banner'   => $banner
            ];
            $this->load->view('layout/header', $data);
            $this->load->view('settings/banner_edit', $data);
            $this->load->view('layout/footer', $data);
        }else{
            $config['upload_path']   = './assets/upload/banner/';
			$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
			$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('banner')) {
                if ($banner['banner'] != '') {
                    unlink('assets/upload/banner/'.$banner['banner']);
                    unlink('assets/upload/banner/thumbs/'.$banner['banner']);
                }
                $data = [
                    'title'    => 'Edit Banner',
                    'banner'   => $banner
                ];
                //$this->load->view('layout/wrapper', $data);
                $upload_data        		= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']  	= 'gd2';
				$config['source_image']   	= './assets/upload/banner/'.$upload_data['uploads']['file_name']; 
				$config['new_image']     	= './assets/upload/banner/thumbs/';
				$config['create_thumb']   	= TRUE;
				$config['quality']       	= "100%";
				$config['maintain_ratio']   = TRUE; 
				$config['width']       		= 360; // Pixel
				$config['height']       	= 360; // Pixel
				$config['x_axis']       	= 0;
				$config['y_axis']       	= 0;
				$config['thumb_marker']   	= '';
				$this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $img = $upload_data['uploads']['file_name'];
            }else{
                $img = $banner['image'];
            }
            $data = [
                'id'            => $id,
                'description'   => $this->input->post('description'),
                'banner'        => $img
            ];
            $this->db->where('id', $id);
            $query = $this->db->update('banners', $data);
            $query = $this->db->affected_rows();
            if($query === 0){
                $this->session->set_flashdata('msg', 'Tidak berhasil');
                redirect(base_url('settings/banner_setting'), 'refresh');
            }else{
                $this->session->set_flashdata('msg', 'Berhasil');
                redirect(base_url('settings/banner_setting'), 'refresh');
            }
        }
    }
    // end banner edit

    // manfaat add
    public function manfaat_add()
    {
        $valid = $this->form_validation;
        $valid->set_rules('title', 'Title', 'required');
        $valid->set_rules('description', 'Description', 'required');
        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Add Manfaat',
            ];
            $this->load->view('layout/header', $data);
            $this->load->view('settings/manfaat_add', $data);
            $this->load->view('layout/footer', $data);
        }else{
            $data = [
                'title'         => $this->input->post('title'),
                'description'   => $this->input->post('description'),
            ];
            $query = $this->db->insert('manfaat', $data);
            $query = $this->db->affected_rows();

            if($query === 0){
                $this->session->set_flashdata('msg', 'Data tidak berhasil disimpan');
                redirect(base_url('settings/manfaat_setting'), 'refresh');
            }else{
                $this->session->set_flashdata('msg', 'Data berhasil disimpan');
                redirect(base_url('settings/manfaat_setting'), 'refresh');
            }
        }
    }
    // end manfaat add

    // manfaat delete
    public function manfaat_delete($id)
    {
        $query = $this->db->delete('manfaat',['id'=>$id]);
        $query = $this->db->affected_rows();
        if($query){
            $this->session->set_flashdata('msg', 'Data berhasil dihapus');
            redirect(base_url('settings/manfaat_setting'), 'refresh');
        }
    }
    // end manfaat delete

    // testi add
    public function testimonial_add()
    {
        $valid = $this->form_validation;
        // $valid->set_rules('image', 'Image', 'required');
        $valid->set_rules('name', 'name', 'required');
        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Add Testimonial',
            ];
            $this->load->view('layout/header', $data);
            $this->load->view('settings/testimonial_add', $data);
            $this->load->view('layout/footer', $data);
        }else{
            $config['upload_path']   = './assets/upload/testimonial';
			$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
			$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')){
                $data = [
                    'title'     => 'Add Testimonial',
                    'error'	    => $this->upload->display_errors()
                ];
                $this->load->view('layout/header', $data);
                $this->load->view('settings/testimonial_add', $data);
                $this->load->view('layout/footer', $data);
            }else{
                $upload_data        		= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']  	= 'gd2';
				$config['source_image']   	= './assets/upload/testimonial/'.$upload_data['uploads']['file_name']; 
				$config['new_image']     	= './assets/upload/testimonial/thumbs/';
				$config['create_thumb']   	= TRUE;
				$config['quality']       	= "100%";
				$config['maintain_ratio']   = TRUE; 
				$config['width']       		= 360; // Pixel
				$config['height']       	= 360; // Pixel
				$config['x_axis']       	= 0;
				$config['y_axis']       	= 0;
				$config['thumb_marker']   	= '';
				$this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $data = [
                    'image'         => $upload_data['uploads']['file_name'],
                    'name'          => $this->input->post('name'),
                ];
                $query = $this->db->insert('testimonials', $data);
                $query = $this->db->affected_rows();
    
                if($query === 0){
                    $this->session->set_flashdata('msg', 'Data tidak berhasil disimpan');
                    redirect(base_url('settings/testimonial_setting'), 'refresh');
                }else{
                    $this->session->set_flashdata('msg', 'Data berhasil disimpan');
                    redirect(base_url('settings/testimonial_setting'), 'refresh');
                }
            }
        }
    }
    // end testi

    // testi delete
    public function testimonial_delete($id)
    {
        $testi = $this->db->get_where('testimonials', ['id'=>$id])->row_array();
		if ($testi['image'] != "") {
			unlink('assets/upload/testimonial/'.$testi['image']);
			unlink('assets/upload/testimonial/thumbs/'.$testi['image']);
		}
        $query = $this->db->delete('testimonials',['id'=>$id]);
        $query = $this->db->affected_rows();
        if($query){
            $this->session->set_flashdata('msg', 'Data berhasil dihapus');
            redirect(base_url('settings/testimonial_setting'), 'refresh');
        }
    }
    // end testi delete

    public function whatsapp_edit($id)
    {
        $valid = $this->form_validation;
        $valid->set_rules('contact', 'Contact', 'required');
        $valid->set_rules('message', 'Message', 'required');
        $whatsapp = $this->db->get_where('whatsapp', ['id'=>$id])->row_array();
        if ($valid->run() === FALSE) {
            $data = [
                'title'      => 'Whatsapp Edit',
                'whatsapp'   => $whatsapp
            ];
            $this->load->view('layout/header', $data);
            $this->load->view('settings/whatsapp_edit', $data);
            $this->load->view('layout/footer', $data);
        }else{
            $data = [
                'id'            => $id,
                'contact'       => $this->input->post('contact'),
                'message'        => $this->input->post('message')
            ];
            $this->db->where('id', $id);
            $query = $this->db->update('whatsapp', $data);
            $query = $this->db->affected_rows();
            if($query === 0){
                $this->session->set_flashdata('msg', 'Tidak berhasil');
                redirect(base_url('settings/whatsapp_setting'), 'refresh');
            }else{
                $this->session->set_flashdata('msg', 'Berhasil');
                redirect(base_url('settings/whatsapp_setting'), 'refresh');
            }
        }
    }

    

    

}

/* End of file Controllername.php */
