<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    // Cek login berdasarkan username dan password
    public function check_login($username, $password) {
        return $this->db->get_where('users', [
            'username' => $username,
            'password' => $password
        ])->row();
    }
}
