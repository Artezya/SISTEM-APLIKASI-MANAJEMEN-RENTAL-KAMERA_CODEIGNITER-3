<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Transaksi_model');
    }

    public function transaksi() {
        $data['transaksi'] = $this->Transaksi_model->get_all_transaksi();
        $this->load->view('laporan/transaksi', $data);
    }

    
}
