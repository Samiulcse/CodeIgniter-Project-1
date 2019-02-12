<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    public function can_login($email, $password)
    {
        $this->db->where('user_email', $email);
        $this->db->where('user_pass', $password);

        $query = $this->db->get('users');

        $result = $query->result();
        return $result[0]->user_id;
        // if ($query->num_rows() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    }
}
