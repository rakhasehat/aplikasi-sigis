<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jalan extends CI_Model {

	var $table = 'jalan';
	public function get_data()
	{
		$hasil = $this->db->get($this->table);
		return $hasil->result();
	}

	public function tambah_data()
	{
		$data = array(
			'kode_jalan' => $this->input->post('kode_jalan'),
			'nama_jalan' => $this->input->post('nama_jalan'),
			'kode_pos' => $this->input->post('kode_pos'),
			'nama_kelurahan' => $this->input->post('nama_kelurahan'),
		);

		$insert = $this->db->insert($this->table, $data);
		return $insert;
	}

	public function get_by_id($where)
	{
		return $this->db->get_where($this->table, $where);
	}

	public function update_data($where, $data)
	{
		$this->db->where($where);
		$this->db->update($this->table, $data);
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_jalan', $id);
		$this->db->delete($this->table);
	}
}

/* End of file M_admin.php */
