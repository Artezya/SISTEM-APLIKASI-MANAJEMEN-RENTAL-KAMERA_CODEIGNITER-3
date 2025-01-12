<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaksi_model extends CI_Model {
    /**
     * Mengambil semua transaksi dengan informasi kamera dan pelanggan.
     */
    public function get_all_transaksi() {
        $this->db->select('transaksi.*, kamera.nama_kamera, pelanggan.nama_pelanggan');
        $this->db->from('transaksi');
        $this->db->join('kamera', 'kamera.id_kamera = transaksi.id_kamera');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan');
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * Menambahkan transaksi baru ke database.
     */
    public function insert_transaksi($data) {
        $this->db->insert('transaksi', $data);
        return $this->db->insert_id();
    }
    /**
     * Mengambil data transaksi berdasarkan ID dengan informasi kamera dan pelanggan.
     */
    public function get_transaksi_by_id($id) {
        $this->db->select('transaksi.*, kamera.nama_kamera, pelanggan.nama_pelanggan');
        $this->db->from('transaksi');
        $this->db->join('kamera', 'kamera.id_kamera = transaksi.id_kamera', 'left');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $this->db->where('transaksi.id_transaksi', $id);
        $query = $this->db->get();
        return $query->row(); // Mengembalikan satu objek transaksi
    }

    /**
     * Memperbarui transaksi berdasarkan ID.
     */
    public function update_transaksi($id, $data) {
        $this->db->where('id_transaksi', $id);
        return $this->db->update('transaksi', $data);
    }
    /**
     * Menghapus transaksi berdasarkan ID.
     */
    public function delete_transaksi($id) {
        $this->db->where('id_transaksi', $id);
        return $this->db->delete('transaksi');
    }
    /**
     * Mengambil transaksi berdasarkan filter.
     * Menyesuaikan filter dengan parameter GET seperti id_pelanggan, status.
     */
    public function get_filtered_transaksi($filter) {
        // Memulai query dasar
        $this->db->select('transaksi.*, kamera.nama_kamera, pelanggan.nama_pelanggan');
        $this->db->from('transaksi');
        $this->db->join('kamera', 'transaksi.id_kamera = kamera.id_kamera');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan');

        // Memeriksa apakah ada filter untuk pelanggan
        if (!empty($filter['id_pelanggan'])) {
            $this->db->where('transaksi.id_pelanggan', $filter['id_pelanggan']);
        }
        // Memeriksa apakah ada filter untuk status
        if (!empty($filter['status'])) {
            $this->db->where('transaksi.status', $filter['status']);
        }

        // Menjalankan query dan mengembalikan hasilnya
        return $this->db->get()->result();
    }

    /**
     * Mengambil semua data pelanggan.
     */
    public function get_all_pelanggan() {
        return $this->db->get('pelanggan')->result();
    }
}
