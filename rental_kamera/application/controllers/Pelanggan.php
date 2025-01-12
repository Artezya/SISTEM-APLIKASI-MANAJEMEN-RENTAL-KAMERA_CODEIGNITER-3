<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model pelanggan
        $this->load->model('Pelanggan_model');
    }
    // Menampilkan daftar pelanggan
    public function index() {
        $data['pelanggan'] = $this->Pelanggan_model->get_all_pelanggan();
        $data['content'] = 'pelanggan/index';  // Menetapkan tampilan untuk pelanggan
        $this->load->view('layouts/main', $data);
    }
    // Menampilkan form tambah pelanggan
    public function tambah() {
        $this->load->view('pelanggan/tambah');
    }

    // Menyimpan data pelanggan
    public function simpan() {
        $data = array(
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'email' => $this->input->post('email'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
            'alamat' => $this->input->post('alamat')
        );
        $this->Pelanggan_model->tambah_pelanggan($data);
        redirect('pelanggan');
    }

    // Menampilkan form edit pelanggan
    public function edit($id) {
        $data['pelanggan'] = $this->Pelanggan_model->get_pelanggan_by_id($id);
        $this->load->view('pelanggan/edit', $data);
    }

    // Mengupdate data pelanggan
    public function update($id) {
        $data = array(
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'email' => $this->input->post('email'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
            'alamat' => $this->input->post('alamat')
        );
        $this->Pelanggan_model->update_pelanggan($id, $data);
        redirect('pelanggan');
    }

    // Menghapus data pelanggan
    public function hapus($id) {
        $this->Pelanggan_model->hapus_pelanggan($id);
        redirect('pelanggan');
    }
}
