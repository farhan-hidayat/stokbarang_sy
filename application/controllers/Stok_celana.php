<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_celana extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('celana_m');
	}

	function get_ajax() {
        $list = $this->celana_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $celana) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $celana->kode_barang.'<br><a href="'.site_url('barang/barcode_qrcode/'.$celana->id_barang).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $celana->nama_barang;
            $row[] = $celana->nama_suplier;
			$row[] = $celana->s;
			$row[] = $celana->m;
			$row[] = $celana->l;
			$row[] = $celana->xl;
			$row[] = $celana->xxl;
			$row[] = $celana->xxxl;
			$row[] = $celana->xxxxl;
			$row[] = $celana->xxxxxl;
			$row[] = $celana->s+$celana->m+$celana->l+$celana->xl+$celana->xxl+$celana->xxxl+$celana->xxxxl+$celana->xxxxxl;
            $row[] = $celana->foto != null ? '<img src="'.base_url('uploads/barang/'.$celana->foto).'" class="img" style="width:100px">' : null;
            
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->celana_m->count_all(),
                    "recordsFiltered" => $this->celana_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    function get_ajax2() {
        $list = $this->celana_m->get_datatables2();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $celana) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $celana->kode_barang.'<br><a href="'.site_url('barang/barcode_qrcode/'.$celana->id_barang).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $celana->nama_barang;
            $row[] = $celana->nama_suplier;
			$row[] = $celana->s;
			$row[] = $celana->m;
			$row[] = $celana->l;
			$row[] = $celana->xl;
			$row[] = $celana->xxl;
			$row[] = $celana->xxxl;
			$row[] = $celana->xxxxl;
			$row[] = $celana->xxxxxl;
			$row[] = $celana->s+$celana->m+$celana->l+$celana->xl+$celana->xxl+$celana->xxxl+$celana->xxxxl+$celana->xxxxxl;
            $row[] = $celana->foto != null ? '<img src="'.base_url('uploads/barang/'.$celana->foto).'" class="img" style="width:100px">' : null;
            
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->celana_m->count_all2(),
                    "recordsFiltered" => $this->celana_m->count_filtered2(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

	public function index()
	{
		$data['row'] = $this->celana_m->get();
		$this->template->load('template', 'stok/stok_celana_data', $data);
    }
}