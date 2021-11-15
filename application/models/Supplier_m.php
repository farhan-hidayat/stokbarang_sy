<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model {
    
    public function get($id = null)
    {
        $this->db->from('suplier');
        if($id != null) {
            $this->db->where('id_suplier', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'nama_suplier' => $post['nama_suplier']
        ];
        $this->db->insert('suplier', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_suplier' => $post['nama_suplier']
        ];
        $this->db->where('id_suplier', $post['id']);
        $this->db->update('suplier', $params);
    }

    public function del($id)
	{
		$this->db->where('id_suplier', $id);
		$this->db->delete('suplier');
    }
}