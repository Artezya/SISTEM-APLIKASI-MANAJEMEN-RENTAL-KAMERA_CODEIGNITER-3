<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('User_model');
    }
    // Halaman login
    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('kamera'); // Redirect jika sudah login
        }
        $this->load->view('auth/login');
    }
    // Proses login
    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->User_model->check_login($username, md5($password));
        if ($user) {
            $session_data = [
                'user_id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
                'logged_in' => TRUE
            ];
            $this->session->set_userdata($session_data);
            redirect('kamera'); // Ganti dengan halaman dashboard utama Anda
        } else {
            $this->session->set_flashdata('error', 'Username atau Password salah!');
            redirect('auth');
        }
    }

    // Logout
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
