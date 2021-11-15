<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_keluar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['barang_keluar_m', 'barang_m']);
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['row'] = $this->barang_keluar_m->get();
		$this->template->load('template', 'barang_keluar/barang_keluar_data', $data);
	}

	public function add()
	{
		$barang = $this->barang_m->get()->result();

		$barang_keluar = new stdClass();
		$barang_keluar->id_barang_keluar = null;
        $barang_keluar->s_k = null;
        $barang_keluar->m_k = null;
        $barang_keluar->l_k = null;
        $barang_keluar->xl_k = null;
        $barang_keluar->xxl_k = null;
		$barang_keluar->xxxl_k = null;
		$barang_keluar->xxxxl_k = null;
		$barang_keluar->xxxxxl_k = null;
		$barang_keluar->ket = null;
        $barang_keluar->tanggal_keluar = null;

		$data = array(
			'page' => 'add',
            'row' => $barang_keluar,
            'barang' => $barang
		);
		$this->template->load('template', 'barang_keluar/barang_keluar_form', $data);
	}

	public function edit($id)
	{
		$query = $this->barang_keluar_m->get($id);
		if($query->num_rows() > 0) {
			$barang_keluar = $query->row();
			$barang = $this->barang_m->get()->result();
			
            $data = array(
                'page' => 'edit',
                'row' => $barang_keluar,
                'barang' => $barang
            );
			$this->template->load('template', 'barang_keluar/barang_keluar_form', $data);
		} else {
			echo "<script>
					alert('Data tidak ditemukan');";

			echo "
				window.location='".site_url('barang_keluar')."';
			</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->barang_keluar_m->add($post);
		} else 
			if(isset($_POST['edit'])) {
				$this->barang_keluar_m->edit($post);
			}
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data Berhasil disimpan');
		}
		redirect('barang_keluar');
	}

	public function del($id)
	{
		
		$this->barang_keluar_m->del($id);

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data Berhasil dihapus');
		}
		redirect('barang_keluar');
	}
}
