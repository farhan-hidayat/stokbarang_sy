<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_baju extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('baju_m');
	}

	function get_ajax() {
        $list = $this->baju_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $baju) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $baju->kode_barang.
            '<br>
            <a href="'.site_url('baju/edit/'.$baju->id_barang).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <br><a href="'.site_url('barang/barcode_qrcode/'.$baju->id_barang).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $baju->status == "Up to date" ? '<span class="bg-green">Up to date</span>' : '<span class="bg-red">Selisih</span>';
            $row[] = $baju->nama_barang;
            $row[] = $baju->nama_suplier;
			$row[] = $baju->s;
			$row[] = $baju->m;
			$row[] = $baju->l;
			$row[] = $baju->xl;
			$row[] = $baju->xxl;
			$row[] = $baju->xxxl;
			$row[] = $baju->xxxxl;
			$row[] = $baju->xxxxxl;
			$row[] = $baju->s+$baju->m+$baju->l+$baju->xl+$baju->xxl+$baju->xxxl+$baju->xxxxl+$baju->xxxxxl;
            $row[] = $baju->foto != null ? '<img src="'.base_url('uploads/barang/'.$baju->foto).'" class="img" style="width:100px">' : null;
            
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
		$this->template->load('template', 'stok/stok_baju_data', $data);
    }
}