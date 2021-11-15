<?php

Class Fungsi {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
    }

    function user_login() {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }

    public function count_barang() {
        $this->ci->load->model('barang_m');
        return $this->ci->barang_m->get()->num_rows();
    }
    
    public function count_supplier() {
        $this->ci->load->model('supplier_m');
        return $this->ci->supplier_m->get()->num_rows();
    }

    public function count_penjualan() {
        $this->ci->load->model('barang_keluar_m');
        return $this->ci->barang_keluar_m->get()->num_rows();
    }

    public function count_user() {
        $this->ci->load->model('user_m');
        return $this->ci->user_m->get()->num_rows();
    }

    public function count_baju() {
        $this->ci->load->model('baju_m');
        return $this->ci->baju_m->count()->num_rows();
    }

    public function count_celana() {
        $this->ci->load->model('celana_m');
        return $this->ci->celana_m->count()->num_rows();
    }

    public function count_tas() {
        $this->ci->load->model('tas_m');
        return $this->ci->tas_m->count()->num_rows();
    }

    public function count_topi() {
        $this->ci->load->model('topi_m');
        return $this->ci->topi_m->count()->num_rows();
    }
}