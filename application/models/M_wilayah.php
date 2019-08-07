<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_wilayah extends CI_Model {

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from('trotoar');
		$this->db->join('jalan', 'jalan.id_jalan=trotoar.id_jalan', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah_data()
	{
		$data = array(
			'kode_trotoar' => $this->input->post('kode_trotoar'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
		);

		$insert = $this->db->insert($this->table, $data);
		return $insert;
	}

	public function get_by_id($where)
	{
		return $this->db->get_where('trotoar', $where);
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_trotoar', $id);
		$this->db->delete('trotoar');
	}

}

/* End of file M_wilayah.php */
