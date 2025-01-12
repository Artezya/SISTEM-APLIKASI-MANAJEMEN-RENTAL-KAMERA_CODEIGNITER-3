<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamera_model extends CI_Model {

    public function get_all_kamera() {
        return $this->db->get('kamera')->result();  // Mengambil semua data kamera sebagai objek
    }

    public function get_kamera_by_id($id) {
        return $this->db->get_where('kamera', ['id_kamera' => $id])->row();  // Mengambil data kamera berdasarkan ID
    }

    public function insert_kamera($data) {
        $this->db->insert('kamera', $data);  // Menyimpan data kamera
    }

    public function update_kamera($id, $data) {
        $this->db->where('id_kamera', $id);
        $this->db->update('kamera', $data);  // Memperbarui data kamera
    }

    public function delete_kamera($id) {
        $this->db->delete('kamera', ['id_kamera' => $id]);  // Menghapus data kamera berdasarkan ID
    }
}
