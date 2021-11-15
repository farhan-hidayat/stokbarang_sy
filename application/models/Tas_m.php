<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tas_m extends CI_Model {

    var $column_order = array(null, 'kode_barang', 'nama_barang', 'nama_suplier', 'harga', 'jenis', 's'); //set column field database for datatable orderable
    var $column_search = array('kode_barang', 'nama_barang', 'harga', 'nama_suplier'); //set column field database for datatable searchable
    var $order = array('id_barang' => 'asc'); // default order
 
    private function _get_datatables_query() {
        $this->db->from('barang');
        $this->db->join('suplier', 'suplier.id_suplier = barang.id_suplier');
        $this->db->where('kategori = "Tas"');
        $i = 0;
        foreach ($this->column_search as $barang) { // loop column
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($barang, $_POST['search']['value']);
                } else {
                    $this->db->or_like($barang, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    private function _get_datatables_query2() {
        $this->db->from('barang');
        $this->db->join('suplier', 'suplier.id_suplier = barang.id_suplier');
        $this->db->where('kategori = "Handuk"');
        $i = 0;
        foreach ($this->column_search as $barang) { // loop column
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($barang, $_POST['search']['value']);
                } else {
                    $this->db->or_like($barang, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function get_datatables2() {
        $this->_get_datatables_query2();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_filtered2() {
        $this->_get_datatables_query2();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('barang');
        $this->db->where('kategori = "Tas"');
        return $this->db->count_all_results();
    }
    function count_all2() {
        $this->db->from('barang');
        $this->db->where('kategori = "Handuk"');
        return $this->db->count_all_results();
    }
    
    public function get($id = null)
    {
        $this->db->from('barang');
        $this->db->join('suplier', 'suplier.id_suplier = barang.id_suplier');
        if($id != null) {
            $this->db->where('id_barang', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function count()
    {
        $this->db->from('barang');
        $this->db->join('suplier', 'suplier.id_suplier = barang.id_suplier');
        $this->db->where('kategori = "Tas" OR kategori = "Handuk"');
        $query = $this->db->get();
        return $query;
    }

    public function stok()
    {
        $this->db->from('v_barang');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'kode_barang' => $post['kode_barang'],
            'nama_barang' => $post['nama_barang'],
            'kategori' => $post['kategori'],
            'id_suplier' => $post['supplier'],
            'harga' => $post['harga'],
            'foto' => $post['foto']
        ];
        $this->db->insert('barang', $params);
    }

    public function edit($post)
    {
        $params = [
            'kode_barang' => $post['kode_barang'],
            'nama_barang' => $post['nama_barang'],
            'kategori' => $post['kategori'],
            'id_suplier' => $post['supplier'],
            'harga' => $post['harga'],
            'foto' => $post['foto']
        ];
        if($post['foto'] != null ) {
            $params['foto'] = $post['foto'];
        }
        $this->db->where('id_barang', $post['id']);
        $this->db->update('barang', $params);
    }

    function check_kode_barang($code, $id = null) {
        $this->db->from('barang');
        $this->db->where('kode_barang', $code);
        if($id !=null) {
            $this->db->where('id_barang != ', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
	{
		$this->db->where('id_barang', $id);
		$this->db->delete('barang');
    }
}