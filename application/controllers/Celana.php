<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Celana extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['celana_m', 'supplier_m']);
	}

	function get_ajax() {
        $list = $this->celana_m->get_datatables3();
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
			$row[] = $barang->jenis2;
            $row[] = $barang->foto != null ? '<img src="'.base_url('uploads/barang/'.$barang->foto).'" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="'.site_url('celana/edit/'.$barang->id_barang).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                   <a href="'.site_url('celana/del/'.$barang->id_barang).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->celana_m->count_all3(),
                    "recordsFiltered" => $this->celana_m->count_filtered3(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

	public function index()
	{
		$data['row'] = $this->celana_m->get();
		$this->template->load('template', 'celana/celana_data', $data);
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
		$barang->jenis2 = null;
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
		$this->template->load('template', 'celana/celana_form', $data);
	}

	public function edit($id)
	{
		$query = $this->celana_m->get($id);
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
			$this->template->load('template', 'celana/celana_form', $data);
		} else {
			echo "<script>
					alert('Data tidak ditemukan');";

			echo "
				window.location='".site_url('celana')."';
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
			if($this->celana_m->check_kode_barang($post['kode_barang'])->num_rows() > 0) {
				$this->session->set_flashdata('error', "Kode barang $post[kode_barang] Sudah Terdaftar");
				redirect('celana/add');
			} else {
				if(@$_FILES['foto']['name'] != null) {
					if($this->upload->do_upload('foto')) {
						$post['foto'] = $this->upload->data('file_name');
						$this->celana_m->add($post);
						if($this->db->affected_rows() > 0){
							$this->session->set_flashdata('success', 'Data Berhasil disimpan');
						}
						redirect('celana');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('celana/add');
					}
				} else {
					$post['foto'] = null;
					$this->celana_m->add($post);
					if($this->db->affected_rows() > 0){
						$this->session->set_flashdata('success', 'Data Berhasil disimpan');
					}
					redirect('celana');
				}
			}
		} else 
			if(isset($_POST['edit'])) {
				if($this->celana_m->check_kode_barang($post['kode_barang'], $post['id'])->num_rows() > 0) {
					$this->session->set_flashdata('error', "Kode barang $post[kode_barang] Sudah Terdaftar");
					redirect('celana/edit/'.$post['id']);
				} else {
					if(@$_FILES['foto']['name'] != null) {
						
						$barang = $this->celana_m->get($post['$id'])->row();
						if($barang->foto != null ) {
							$target_file = './uploads/barang/'.$barang->foto;
							unlink($target_file);
						}
						if($this->upload->do_upload('foto')) {
							$post['foto'] = $this->upload->data('file_name');
							$this->celana_m->edit($post);
							if($this->db->affected_rows() > 0){
								$this->session->set_flashdata('success', 'Data Berhasil disimpan');
							}
							redirect('celana');
						} else {
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('error', $error);
							redirect('celana/add');
						}
					} else {
						$post['foto'] = null;
						$this->celana_m->edit($post);
						if($this->db->affected_rows() > 0){
							$this->session->set_flashdata('success', 'Data Berhasil disimpan');
						}
						redirect('celana');
					}
				}
			}
		
		
	}

	public function del($id)
	{
		$barang = $this->celana_m->get($id)->row();
		if($barang->foto != null ) {
			$target_file = './uploads/barang/'.$barang->foto;
			unlink($target_file);
		}

		$this->celana_m->del($id);

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data Berhasil dihapus');
		}
		redirect('celana');
	}

	function barcode_qrcode($id) {
		$data['row'] = $this->celana_m->get($id)->row();
		$this->template->load('template', 'barang/barcode_qrcode', $data);
	}
}