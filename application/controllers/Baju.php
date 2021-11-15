<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baju extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['baju_m', 'supplier_m']);
	}

	function get_ajax() {
        $list = $this->baju_m->get_datatables();
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
            $row[] = $barang->jenis;
            $row[] = $barang->foto != null ? '<img src="'.base_url('uploads/barang/'.$barang->foto).'" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="'.site_url('baju/edit/'.$barang->id_barang).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                   <a href="'.site_url('baju/del/'.$barang->id_barang).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->baju_m->count_all(),
                    "recordsFiltered" => $this->baju_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

	public function index()
	{
		$data['row'] = $this->baju_m->get();
		$this->template->load('template', 'baju/baju_data', $data);
	}

	public function add()
	{
        $barang = new stdClass();
        $barang->kode_barang = null;
		$barang->id_barang = null;
		$barang->nama_barang = null;
		$barang->kategori = null;
        $barang->harga = null;
        $barang->jenis = null;
        $barang->foto = null;
        $barang->s = null;
        $barang->m = null;
        $barang->l = null;
        $barang->xl = null;
        $barang->xxl = null;
        $barang->xxxl = null;
        $barang->xxxxl = null;
        $barang->xxxxxl = null;

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
		$this->template->load('template', 'baju/baju_form', $data);
	}

	public function edit($id)
	{
		$query = $this->baju_m->get($id);
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
			$this->template->load('template', 'baju/baju_form', $data);
		} else {
			echo "<script>
					alert('Data tidak ditemukan');";

			echo "
				window.location='".site_url('baju')."';
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
			if($this->baju_m->check_kode_barang($post['kode_barang'])->num_rows() > 0) {
				$this->session->set_flashdata('error', "Kode barang $post[kode_barang] Sudah Terdaftar");
				redirect('baju/add');
			} else {
				if(@$_FILES['foto']['name'] != null) {
					if($this->upload->do_upload('foto')) {
						$post['foto'] = $this->upload->data('file_name');
						$this->baju_m->add($post);
						if($this->db->affected_rows() > 0){
							$this->session->set_flashdata('success', 'Data Berhasil disimpan');
						}
						redirect('baju');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('baju/add');
					}
				} else {
					$post['foto'] = null;
					$this->baju_m->add($post);
					if($this->db->affected_rows() > 0){
						$this->session->set_flashdata('success', 'Data Berhasil disimpan');
					}
					redirect('baju');
				}
			}
		} else 
			if(isset($_POST['edit'])) {
				if($this->baju_m->check_kode_barang($post['kode_barang'], $post['id'])->num_rows() > 0) {
					$this->session->set_flashdata('error', "Kode barang $post[kode_barang] Sudah Terdaftar");
					redirect('baju/edit/'.$post['id']);
				} else {
					if(@$_FILES['foto']['name'] != null) {
						
						$barang = $this->baju_m->get($post['$id'])->row();
						if($barang->foto != null ) {
							$target_file = './uploads/barang/'.$barang->foto;
							unlink($target_file);
						}
						if($this->upload->do_upload('foto')) {
							$post['foto'] = $this->upload->data('file_name');
							$this->baju_m->edit($post);
							if($this->db->affected_rows() > 0){
								$this->session->set_flashdata('success', 'Data Berhasil disimpan');
							}
							redirect('baju');
						} else {
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('error', $error);
							redirect('baju/add');
						}
					} else {
						$post['foto'] = null;
						$this->baju_m->edit($post);
						if($this->db->affected_rows() > 0){
							$this->session->set_flashdata('success', 'Data Berhasil disimpan');
						}
						redirect('baju');
					}
				}
			}
		
		
	}

	public function del($id)
	{
		$barang = $this->baju_m->get($id)->row();
		if($barang->foto != null ) {
			$target_file = './uploads/barang/'.$barang->foto;
			unlink($target_file);
		}

		$this->baju_m->del($id);

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data Berhasil dihapus');
		}
		redirect('baju');
	}

	function barcode_qrcode($id) {
		$data['row'] = $this->baju_m->get($id)->row();
		$this->template->load('template', 'barang/barcode_qrcode', $data);
	}
}