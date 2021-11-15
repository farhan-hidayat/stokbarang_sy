<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_topi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('topi_m');
	}

	function get_ajax() {
        $list = $this->topi_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $topi) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $topi->kode_barang.'<br><a href="'.site_url('barang/barcode_qrcode/'.$topi->id_barang).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $topi->nama_barang;
            $row[] = $topi->nama_suplier;
			$row[] = $topi->s;
            $row[] = $topi->foto != null ? '<img src="'.base_url('uploads/barang/'.$topi->foto).'" class="img" style="width:100px">' : null;
            
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
        foreach ($list as $topi) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $topi->kode_barang.'<br><a href="'.site_url('barang/barcode_qrcode/'.$topi->id_barang).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $topi->nama_barang;
            $row[] = $topi->nama_suplier;
			$row[] = $topi->s;
            $row[] = $topi->foto != null ? '<img src="'.base_url('uploads/barang/'.$topi->foto).'" class="img" style="width:100px">' : null;
            
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->topi_m->count_all2(),
                    "recordsFiltered" => $this->topi_m->count_filtered2(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

	public function index()
	{
		$data['row'] = $this->topi_m->get();
		$this->template->load('template', 'stok/stok_topi_data', $data);
    }
}