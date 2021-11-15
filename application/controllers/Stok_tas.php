<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_tas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('tas_m');
	}

	function get_ajax() {
        $list = $this->tas_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $tas) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $tas->kode_barang.'<br><a href="'.site_url('barang/barcode_qrcode/'.$tas->id_barang).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $tas->nama_barang;
            $row[] = $tas->nama_suplier;
			$row[] = $tas->s;
            $row[] = $tas->foto != null ? '<img src="'.base_url('uploads/barang/'.$tas->foto).'" class="img" style="width:100px">' : null;
            
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->tas_m->count_all(),
                    "recordsFiltered" => $this->tas_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    function get_ajax2() {
        $list = $this->tas_m->get_datatables2();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $tas) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $tas->kode_barang.'<br><a href="'.site_url('barang/barcode_qrcode/'.$tas->id_barang).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $tas->nama_barang;
            $row[] = $tas->nama_suplier;
			$row[] = $tas->s;
            $row[] = $tas->foto != null ? '<img src="'.base_url('uploads/barang/'.$tas->foto).'" class="img" style="width:100px">' : null;
            
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->tas_m->count_all2(),
                    "recordsFiltered" => $this->tas_m->count_filtered2(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

	public function index()
	{
		$data['row'] = $this->tas_m->get();
		$this->template->load('template', 'stok/stok_tas_data', $data);
    }
}