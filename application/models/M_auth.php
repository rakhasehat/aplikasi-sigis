<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function cek_login($username)
	{
		$this->db->where('username', $username);
		$result = $this->db->get('users')->row();
		return $result;
	}

}

/* End of file M_auth.php */
