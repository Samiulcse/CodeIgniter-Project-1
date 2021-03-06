<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel', 'auth_model', true);
    }

    public function index()
    {
        if (!isset($this->session->userdata['user_email'])) {
            $this->load->view('auth/header');
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        } else {
            redirect(base_url());
        }
    }

    public function login_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

            if ($this->auth_model->can_login($email, $password)) {
                $session_data = array(
                    'user_email' => $email,
                    'id' => $this->auth_model->can_login($email, $password)
                );
                $this->session->set_userdata($session_data);

                redirect(base_url() . 'employee');
            } else {
                $this->session->set_flashdata('error', 'Invalid Email or Password');
                redirect(base_url() . 'login');
            }

        } else {
            $this->index();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_email');
        return redirect(base_url());
    }
}
