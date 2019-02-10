<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('Employee_model','emp_model',TRUE);
    }

    public function index()
    {
        $this->load->view('template/header');
        $data['employees']= $this->emp_model->get_all_employee_query();
        $this->load->view('home_employee',$data);
        $this->load->view('template/footer');
    }

    public function add_new_employee()
    {
        $this->load->view('template/header');
        $this->load->view('add_new_employee');
        $this->load->view('template/footer');
    }

    public function save(){
        if($this->input->post('btn_save')){
            // var_dump($this->input->post('input_val'));
            $input_data= $this->input->post('input_val');
            $input_data['emp_pass']=md5($this->input->post('emp_pass'));

            $is_inserted= $this->emp_model->new_employee_query($input_data);

            if($is_inserted)
                $this->session->set_flashdata("success","New employee has been inserted successfully!");
            else
                $this->session->set_flashdata("error", "Data error!");
        }else{
            echo "No request !";
        }

        redirect(base_url('employee/add_new_employee'));
    }
}
