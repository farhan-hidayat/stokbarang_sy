<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['topi_m', 'supplier_m']);
	}

	function get_ajax() {
        $list = $this->topi_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $barang) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $barang->kode_barang.'<br><a href="'.site_url('barang/barcode_qrcode/'.$barang->id_barang).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
			$row[] = $barang->nama_barang;
			$row[] = $barang->nama_suplier;
			$row[] = 'Rp '.number_format ($barang->harga);
            $row[] = $barang->foto != null ? '<img src="'.base_url('uploads/barang/'.$barang->foto).'" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="'.site_url('topi/edit/'.$barang->id_barang).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                   <a href="'.site_url('topi/del/'.$barang->id_barang).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->topi_m->count_all(),
                    "recordsFiltered" => $this->topi_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
	}
	
	function get_ajax2() {
        $list = $this->topi_m->get_datatables2();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $barang) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $barang->kode_barang.'<br><a href="'.site_url('barang/barcode_qrcode/'.$barang->id_barang).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
			$row[] = $barang->nama_barang;
			$row[] = $barang->nama_suplier;
			$row[] = 'Rp '.number_format ($barang->harga);
            $row[] = $barang->foto != null ? '<img src="'.base_url('uploads/barang/'.$barang->foto).'" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="'.site_url('topi/edit/'.$barang->id_barang).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                   <a href="'.site_url('topi/del/'.$barang->id_barang).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output2 = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->topi_m->count_all2(),
                    "recordsFiltered" => $this->topi_m->count_filtered2(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output2);
    }

	public function index()
	{
		$data['row'] = $this->topi_m->get();
		$this->template->load('template', 'topi/topi_data', $data);
	}

	public function add()
	{
        $barang = new stdClass();
        $barang->kode_barang = null;
		$barang->id_barang = null;
		$barang->nama_barang = null;
		$barang->kategori = null;
        $barang->harga = null;
        $barang->foto = null;

        $query_supplier = $this->supplier_m->get();
        $supplier[null] = '- Pilih -';
        foreach($query_supplier->result() as $spl) {
            $supplier[$spl->id_suplier] = $spl->nama_suplier;
        }
		$data = array(
			'page' => 'add',
            'row' => $barang,
            'supplier' => $supplier, 'selectedsupplier' => null
		);
		$this->template->load('template', 'topi/topi_form', $data);
	}

	public function edit($id)
	{
		$query = $this->topi_m->get($id);
		if($query->num_rows() > 0) {
			$barang = $query->row();
			$query_supplier = $this->supplier_m->get();
            $suplier[null] = '- Pilih -';
            foreach($query_supplier->result() as $spl) {
                $suplier[$spl->id_suplier] = $spl->nama_suplier;
            }
            $data = array(
                'page' => 'edit',
                'row' => $barang,
                'supplier' => $suplier, 'selectedsupplier' => $barang->id_suplier
            );
			$this->template->load('template', 'topi/topi_form', $data);
		} else {
			echo "<script>
					alert('Data tidak ditemukan');";

			echo "
				window.location='".site_url('topi')."';
			</script>";
		}
	}

	public function process()
	{
		$config['upload_path']		= './uploads/barang/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']			= 10240;
		$config['file_name']		= 'barang-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			if($this->topi_m->check_kode_barang($post['kode_barang'])->num_rows() > 0) {
				$this->session->set_flashdata('error', "Kode barang $post[kode_barang] Sudah Terdaftar");
				redirect('topi/add');
			} else {
				if(@$_FILES['foto']['name'] != null) {
					if($this->upload->do_upload('foto')) {
						$post['foto'] = $this->upload->data('file_name');
						$this->topi_m->add($post);
						if($this->db->affected_rows() > 0){
							$this->session->set_flashdata('success', 'Data Berhasil disimpan');
						}
						redirect('topi');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('topi/add');
					}
				} else {
					$post['foto'] = null;
					$this->topi_m->add($post);
					if($this->db->affected_rows() > 0){
						$this->session->set_flashdata('success', 'Data Berhasil disimpan');
					}
					redirect('topi');
				}
			}
		} else 
			if(isset($_POST['edit'])) {
				if($this->topi_m->check_kode_barang($post['kode_barang'], $post['id'])->num_rows() > 0) {
					$this->session->set_flashdata('error', "Kode barang $post[kode_barang] Sudah Terdaftar");
					redirect('topi/edit/'.$post['id']);
				} else {
					if(@$_FILES['foto']['name'] != null) {
						
						$barang = $this->topi_m->get($post['$id'])->row();
						if($barang->foto != null ) {
							$target_file = './uploads/barang/'.$barang->foto;
							unlink($target_file);
						}
						if($this->upload->do_upload('foto')) {
							$post['foto'] = $this->upload->data('file_name');
							$this->topi_m->edit($post);
							if($this->db->affected_rows() > 0){
								$this->session->set_flashdata('success', 'Data Berhasil disimpan');
							}
							redirect('topi');
						} else {
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('error', $error);
							redirect('topi/add');
						}
					} else {
						$post['foto'] = null;
						$this->topi_m->edit($post);
						if($this->db->affected_rows() > 0){
							$this->session->set_flashdata('success', 'Data Berhasil disimpan');
						}
						redirect('topi');
					}
				}
			}
		
		
	}

	public function del($id)
	{
		$barang = $this->topi_m->get($id)->row();
		if($barang->foto != null ) {
			$target_file = './uploads/barang/'.$barang->foto;
			unlink($target_file);
		}

		$this->topi_m->del($id);

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data Berhasil dihapus');
		}
		redirect('topi');
	}

	function barcode_qrcode($id) {
		$data['row'] = $this->topi_m->get($id)->row();
		$this->template->load('template', 'barang/barcode_qrcode', $data);
	}
}