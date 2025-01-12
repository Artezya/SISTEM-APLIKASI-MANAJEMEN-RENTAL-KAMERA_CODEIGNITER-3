<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->model('Kamera_model');
        $this->load->model('Pelanggan_model');
    }
    public function index() {
        $data['transaksi'] = $this->Transaksi_model->get_all_transaksi();
        $data['content'] = 'transaksi/index';
        $this->load->view('layouts/main', $data);
    }
    public function tambah() {
        $data['kamera'] = $this->Kamera_model->get_all_kamera();
        $data['pelanggan'] = $this->Pelanggan_model->get_all_pelanggan();
        $data['content'] = 'transaksi/tambah';
        $this->load->view('layouts/main', $data);
    }

    public function simpan() {
        $data = [
            'id_kamera' => $this->input->post('id_kamera'),
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'tanggal_sewa' => $this->input->post('tanggal_sewa'),
            'tanggal_kembali' => $this->input->post('tanggal_kembali'),
            'total_harga' => $this->input->post('total_harga'),
            'status' => $this->input->post('status')
        ];

        $this->Transaksi_model->insert_transaksi($data);
        redirect('transaksi');
    }

    public function edit($id) {
        $data['transaksi'] = $this->Transaksi_model->get_transaksi_by_id($id);
        $data['kamera'] = $this->Kamera_model->get_all_kamera();
        $data['pelanggan'] = $this->Pelanggan_model->get_all_pelanggan();
        $data['content'] = 'transaksi/edit';
        $this->load->view('layouts/main', $data);
    }

    public function update($id) {
        $data = [
            'id_kamera' => $this->input->post('id_kamera'),
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'tanggal_sewa' => $this->input->post('tanggal_sewa'),
            'tanggal_kembali' => $this->input->post('tanggal_kembali'),
            'total_harga' => $this->input->post('total_harga'),
            'status' => $this->input->post('status')
        ];

        $this->Transaksi_model->update_transaksi($id, $data);
        $this->session->set_flashdata('message', 'Transaksi berhasil diperbarui.');
        redirect('transaksi');
    }

    public function hapus($id) {
        $this->Transaksi_model->delete_transaksi($id);
        redirect('transaksi');
    }
    
// Laporan dengan filter
public function laporan() {
    // Mengambil filter dari parameter GET
    $id_pelanggan = $this->input->get('id_pelanggan');
    $status = $this->input->get('status');

    // Menyaring transaksi berdasarkan filter
    $filter = [
        'id_pelanggan' => $id_pelanggan,
        'status' => $status
    ];

    $data['transaksi'] = $this->Transaksi_model->get_filtered_transaksi($filter);
    $data['pelanggan'] = $this->Pelanggan_model->get_all_pelanggan(); // Untuk filter pelanggan

    // Menampilkan tampilan laporan transaksi
    $data['content'] = 'transaksi/laporan_transaksi';
    $this->load->view('layouts/main', $data);
}
}
