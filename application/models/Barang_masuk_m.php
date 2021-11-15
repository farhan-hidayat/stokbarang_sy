<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk_m extends CI_Model {
    
    public function get()
    {
        $this->db->select('barang_masuk.*, user.nama, barang.nama_barang, barang.kode_barang');
        $this->db->from('barang_masuk');
        $this->db->join('barang', 'barang.id_barang = barang_masuk.id_barang');
        $this->db->join('user', 'user.user_id = barang_masuk.user_id');
        $this->db->order_by('barang_masuk.tanggal_masuk', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'user_id' => $post['user_id'],
            'id_barang' => $post['id_barang'],
            's_m' => $post['s_m'],
            'm_m' => $post['m_m'],
            'l_m' => $post['l_m'],
            'xl_m' => $post['xl_m'],
            'xxl_m' => $post['xxl_m'],
            'xxxl_m' => $post['xxxl_m'],
            'xxxxl_m' => $post['xxxxl_m'],
            'xxxxxl_m' => $post['xxxxxl_m'],
            'tanggal_masuk' => $post['tanggal_masuk']
        ];
        $this->db->insert('barang_masuk', $params);
    }

    public function edit($post)
    {
        $params = [
            'id_barang' => $post['id_barang'],
            's_m' => $post['s_m'],
            'm_m' => $post['m_m'],
            'l_m' => $post['l_m'],
            'xl_m' => $post['xl_m'],
            'xxl_m' => $post['xxl_m'],
            'xxxl_m' => $post['xxxl_m'],
            'xxxxl_m' => $post['xxxxl_m'],
            'xxxxxl_m' => $post['xxxxxl_m'],
            'tanggal_masuk' => $post['tanggal_masuk']
        ];
        $this->db->where('id_barang_masuk', $post['id']);
        $this->db->update('barang_masuk', $params);
    }

    public function del($id)
	{
		$this->db->where('id_barang_masuk', $id);
		$this->db->delete('barang_masuk');
    }
}