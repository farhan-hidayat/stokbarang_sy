<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['barang_keluar_m', 'barang_m']);
	}

	public function index()
	{		
		$data['row'] = $this->barang_keluar_m->get()->num_rows();
		$this->template->load('template', 'dashboard', $data);
	}
}
