<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['barang_masuk_m', 'barang_m']);
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['row'] = $this->barang_masuk_m->get();
		$this->template->load('template', 'barang_masuk/barang_masuk_data', $data);
	}

	public function add()
	{
		$barang = $this->barang_m->get()->result();

		$barang_masuk = new stdClass();
		$barang_masuk->id_barang_masuk = null;
        $barang_masuk->s_m = null;
        $barang_masuk->m_m = null;
        $barang_masuk->l_m = null;
        $barang_masuk->xl_m = null;
        $barang_masuk->xxl_m = null;
		$barang_masuk->xxxl_m = null;
		$barang_masuk->xxxxl_m = null;
		$barang_masuk->xxxxxl_m = null;
        $barang_masuk->tanggal_masuk = null;

		$data = array(
			'page' => 'add',
            'row' => $barang_masuk,
            'barang' => $barang
		);
		$this->template->load('template', 'barang_masuk/barang_masuk_form', $data);
	}

	public function edit($id)
	{
		$barang = $this->barang_m->get()->result();
		
		$query = $this->barang_masuk_m->get($id);
		if($query->num_rows() > 0) {
			$barang_masuk = $query->row();
			
            $data = array(
                'page' => 'edit',
                'row' => $barang_masuk,
                'barang' => $barang
            );
			$this->template->load('template', 'barang_masuk/barang_masuk_form', $data);
		} else {
			echo "<script>
					alert('Data tidak ditemukan');";

			echo "
				window.location='".site_url('barang_masuk')."';
			</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->barang_masuk_m->add($post);
		} else 
			if(isset($_POST['edit'])) {
				$this->barang_masuk_m->edit($post);
			}
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data Berhasil disimpan');
		}
		redirect('barang_masuk');
	}

	public function del($id)
	{
		
		$this->barang_masuk_m->del($id);

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data Berhasil dihapus');
		}
		redirect('barang_masuk');
	}
}
