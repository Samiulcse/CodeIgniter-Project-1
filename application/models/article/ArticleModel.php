<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ArticleModel extends CI_Model
{
    public function count_article()
    {
        $this->db->select('COUNT(*) as num_row');
        $this->db->from('article');
        $query = $this->db->get();
        $result = $query->result();

        return $result['0']->num_row;
    }

    public function get_all_article($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->limit($limit, $start);
        $this->db->order_by('article_id', 'DESC');
        $query = $this->db->get();

        return $result = $query->result();
    }

    public function save_article_data($input_data){
        $this->db->insert('article',$input_data);

        return true;
    }
}