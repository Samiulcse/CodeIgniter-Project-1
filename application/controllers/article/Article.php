<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article/ArticleModel', 'mdl_article', true);
    }

    public function index()
    {
        $this->load->view('article/header');
        $this->load->view('common/nav');
        
        $this->load->library('pagination');

            $config['base_url'] = base_url('article/index/');
            $config['total_rows'] = $this->mdl_article->count_article();
            $config['per_page'] = 2;
            $config['uri_segment'] = 3;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['attributes'] = array('class' => 'page-link');
            $config['first_link'] = 'First';
            $config['last_link'] = 'Last';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['articles'] = $this->mdl_article->get_all_article($config["per_page"], $page);

        $this->load->view('article/article',$data);
        $this->load->view('template/footer');
    }

    public function add_new_article()
    {
        $this->load->view('article/header');
        $this->load->view('common/nav');
        $this->load->view('article/add_new_article');
        $this->load->view('template/footer');
    }
    public function save()
    {
        if (isset($this->session->userdata['user_email'])) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('in_val[article_title]', 'Article title', 'required');
            $this->form_validation->set_rules('in_val[article_event_dt]', 'Publisah date ', 'required');
            $this->form_validation->set_rules('in_val[article_text]', 'Article', 'required');

            if ($this->form_validation->run()) {
                $input_data = $this->input->post('in_val');
                $input_data['article_created_dt'] = date('Y-m-d H:i:s');

                if($this->mdl_article->save_article_data($input_data)){
                    redirect(base_url('article'));

                }

            } else {
                $this->add_new_article();
            }
        } else {
            redirect(base_url());
        }

    }
}
