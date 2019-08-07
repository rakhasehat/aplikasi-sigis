<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jalan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_jalan', 'jalan');
	}

	public function index()
	{
		if( !$this->session->userdata('authenticated')){
			redirect('login');
		}else{
			$data['jalan'] = $this->jalan->get_data();
			$this->load->view('layout/v_header');
			$this->load->view('layout/v_top');
			$this->load->view('datakelurahan/v_dashboard', $data);
			$this->load->view('layout/v_footer');
		}
	}

	public function tambah()
	{ 
		$this->load->view('layout/v_header');
		$this->load->view('layout/v_top');
		$this->load->view('datakelurahan/v_add');
		$this->load->view('layout/v_footer');
	}

	public function proses_tambah()
	{
		$this->jalan->tambah_data();
		redirect('jalan');
	}

	public function edit($id)
	{
		$where = array('id_jalan' => $id);
		$data['jalan'] = $this->jalan->get_by_id($where)->result();
		$this->load->view('layout/v_header');
		$this->load->view('layout/v_top');
		$this->load->view('datakelurahan/v_update', $data);
		$this->load->view('layout/v_footer');

	}

	public function proses_update()
	{
		$id = $this->input->post('id_jalan');
		$kode_jalan = $this->input->post('kode_jalan');
		$nama_jalan = $this->input->post('nama_jalan');
		$kode_pos = $this->input->post('kode_pos');
		$nama_kelurahan = $this->input->post('nama_kelurahan');

		$where = array('id_jalan' => $id);

		$data = array(
			'kode_jalan' => $kode_jalan,
			'nama_jalan' => $nama_jalan,
			'kode_pos' => $kode_pos,
			'nama_kelurahan' => $nama_kelurahan,
		);

		$this->jalan->update_data($where, $data);
		redirect('jalan');
	}

	public function hapus($id)
	{
		$this->jalan->delete_by_id($id);
		redirect('jalan');
	}

/* End of file Admin.php */
}
