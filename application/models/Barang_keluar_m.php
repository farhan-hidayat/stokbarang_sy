<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_keluar_m extends CI_Model {
    
    public function get()
    {
        $this->db->select('barang_keluar.*, user.nama, barang.nama_barang, barang.kode_barang');
        $this->db->from('barang_keluar');
        $this->db->join('barang', 'barang.id_barang = barang_keluar.id_barang');
        $this->db->join('user', 'user.user_id = barang_keluar.user_id');
        $this->db->order_by('barang_keluar.tanggal_keluar', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'user_id' => $post['user_id'],
            'id_barang' => $post['id_barang'],
            's_k' => $post['s_k'],
            'm_k' => $post['m_k'],
            'l_k' => $post['l_k'],
            'xl_k' => $post['xl_k'],
            'xxl_k' => $post['xxl_k'],
            'xxxl_k' => $post['xxxl_k'],
            'xxxxl_k' => $post['xxxxl_k'],
            'xxxxxl_k' => $post['xxxxxl_k'],
            'ket' => $post['ket'],
            'tanggal_keluar' => $post['tanggal_keluar']
        ];
        $this->db->insert('barang_keluar', $params);
    }

    public function edit($post)
    {
        $params = [
            'id_barang' => $post['id_barang'],
            's_k' => $post['s_k'],
            'm_k' => $post['m_k'],
            'l_k' => $post['l_k'],
            'xl_k' => $post['xl_k'],
            'xxl_k' => $post['xxl_k'],
            'xxxl_k' => $post['xxxl_k'],
            'xxxxl_k' => $post['xxxxl_k'],
            'xxxxxl_k' => $post['xxxxxl_k'],
            'ket' => $post['ket'],
            'tanggal_keluar' => $post['tanggal_keluar']
        ];
        $this->db->where('id_barang_keluar', $post['id']);
        $this->db->update('barang_keluar', $params);
    }

    public function del($id)
	{
		$this->db->where('id_barang_keluar', $id);
		$this->db->delete('barang_keluar');
    }
}