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

    public function save_article_data($input_data)
    {
        $this->db->insert('article', $input_data);

        return true;
    }

    public function get_article_by_id($article_id)
    {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->where('article_id', $article_id);
        $query = $this->db->get();

        return $query->result();
    }

    public function update_article_data($input_data, $article_id)
    {
        $this->db->where('article_id', $article_id);
        return $this->db->update('article', $input_data);
    }

    public function delete_data($id)
    {
        $this->db->where("article_id", $id);
        $this->db->delete("article");
        return true;
    }
}
