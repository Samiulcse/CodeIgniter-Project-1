<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileModel', 'profile_model', true);
    }

    public function index()
    {
        if (isset($this->session->userdata['user_email'])) {
            $this->load->view('template/header');

            $data['profile'] = $this->profile_model->users($this->session->userdata['user_email']);

            $this->load->view('profile/profile', $data);
            $this->load->view('template/footer');
        } else {
            redirect(base_url());
        }
    }
    public function passwordUpdate()
    {
        if (isset($this->session->userdata['user_email'])) {
            if ($this->input->post('btn_update_pass')) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('current_pass', 'Password', 'required');
                $this->form_validation->set_rules('new_pass', 'Password', 'required');

                if ($this->form_validation->run()) {
                    $current_pass = md5($this->input->post('current_pass'));
                    $new_pass = md5($this->input->post('new_pass'));
                    $user_id = $this->input->post('user_id');

                    $data = array(
                        'user_pass' => $new_pass,
                    );

                    $is_password_updated = $this->profile_model->update_password($user_id, $current_pass, $data);

                    if ($is_password_updated) {
                        $this->session->set_flashdata("success", "User Password Updated!");
                    } else {
                        $this->session->set_flashdata("error", "Error occured");
                    }
                } else {
                    redirect(base_url() . 'profile');
                }

            } else {
                redirect(base_url() . 'profile');
            }

            redirect(base_url('profile'));

        } else {
            redirect(base_url());
        }
    }

    public function do_upload()
    {
        if (isset($this->session->userdata['user_email'])) {
            if (isset($_FILES["image_file"]["name"])) {
                $config['upload_path'] = './upload/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = true;
                $config['remove_spaces'] = false;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image_file')) {
                    echo $this->upload->display_errors();
                } else {
                    $data = $this->upload->data();
                    $user_id = $this->uri->segment(3);
                    $is_profile_image_updated = $this->profile_model->profile_image_update($data['file_name'], $user_id);
                }
            }

        } else {
            redirect(base_url());
        }

    }
}
