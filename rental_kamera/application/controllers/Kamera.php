<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamera extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kamera_model');
        // Memuat library untuk upload
        $this->load->library('upload');
    }

    // Menampilkan daftar kamera
    public function index() {
        $data['kamera'] = $this->Kamera_model->get_all_kamera();
        $data['content'] = 'kamera/index';
        $this->load->view('layouts/main', $data);
    }

    // Menampilkan form untuk tambah kamera
    public function tambah() {
        $this->load->view('kamera/tambah');
    }

    // Menyimpan data kamera
    public function simpan() {
        // Set konfigurasi untuk upload gambar
        $config['upload_path'] = './uploads/kamera/';  // Pastikan folder ini ada dan dapat diakses
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;  // Maksimum ukuran file 2MB
        $config['file_name'] = time() . $_FILES['gambar']['name'];  // Nama file unik berdasarkan timestamp

        
        $this->upload->initialize($config);

        // Melakukan upload gambar
        if ($this->upload->do_upload('gambar')) {
            // Ambil data file yang diupload
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name']; // Nama file gambar yang diupload
        } else {
            // Jika gagal, set gambar sebagai null
            $gambar = null;
        }

        // Ambil data dari form
        $data = [
            'nama_kamera' => $this->input->post('nama_kamera'),
            'kategori' => $this->input->post('kategori'),
            'harga_sewa_per_hari' => $this->input->post('harga_sewa_per_hari'),
            'stok' => $this->input->post('stok'),
            'deskripsi' => $this->input->post('deskripsi'),
            'gambar' => $gambar // Menyimpan nama gambar ke database
        ];

        // Simpan data kamera melalui model
        $this->Kamera_model->insert_kamera($data);
        redirect('kamera');
    }

    // Menampilkan form edit kamera
    public function edit($id) {
        // Ambil data kamera berdasarkan id
        $data['kamera'] = $this->Kamera_model->get_kamera_by_id($id);
        $this->load->view('kamera/edit', $data);
    }

    // Update data kamera
    public function update($id) {
        // Set konfigurasi untuk upload gambar
        $config['upload_path'] = './uploads/kamera/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;
        $config['file_name'] = time() . $_FILES['gambar']['name'];

        $this->upload->initialize($config);

        // Jika ada gambar yang diupload
        if ($this->upload->do_upload('gambar')) {
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name']; // Nama file gambar yang diupload
        } else {
            // Jika tidak ada gambar baru, ambil gambar lama
            $gambar = $this->input->post('gambar_lama');
        }

        // Ambil data yang telah diubah dari form
        $data = [
            'nama_kamera' => $this->input->post('nama_kamera'),
            'kategori' => $this->input->post('kategori'),
            'harga_sewa_per_hari' => $this->input->post('harga_sewa_per_hari'),
            'stok' => $this->input->post('stok'),
            'deskripsi' => $this->input->post('deskripsi'),
            'gambar' => $gambar // Update gambar
        ];

        // Update data kamera menggunakan model
        $this->Kamera_model->update_kamera($id, $data);
        redirect('kamera');
    }

    // Hapus data kamera
    public function hapus($id) {
        $this->Kamera_model->delete_kamera($id);
        redirect('kamera');
    }
}
