<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileModel extends CI_Model
{
    public function users($email)
    {
        $this->db->select('*');
        $this->db->where('user_email', $email);
        $this->db->from('users');
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function update_password($user_id, $current_pass,$data){
        $this->db->where('user_id', $user_id);
        $this->db->where('user_pass', $current_pass);
        return $this->db->update('users', $data);
    }
    public function profile_image_update($data, $user_id){
        $this->db->where('user_id', $user_id);
        $this->db->where('user_pass', $current_pass);
        return $this->db->update('users', $data);
    }
}
