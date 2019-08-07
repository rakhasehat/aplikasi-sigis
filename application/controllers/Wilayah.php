<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_wilayah', 'wilayah');
	}

	public function index()
	{
		if( !$this->session->userdata('authenticated')){
			redirect('login');
		}else{
			$data['wilayah'] = $this->wilayah->get_data();
			$this->load->view('layout/v_header');
			$this->load->view('layout/v_top');
			$this->load->view('datawilayah/v_dashboard', $data);
			$this->load->view('layout/v_footer');
		}
	}

	public function tambah_data()
	{
		$data['trotoar'] = $this->wilayah->get_data();
		$this->load->view('layout/v_header');
		$this->load->view('layout/v_top');
		$this->load->view('datawilayah/v_add', $data);
		$this->load->view('layout/v_footer');
	}

	public function proses_tambah()
	{
		$this->wilayah->tambah_data();
		redirect('wilayah');
	}

	public function edit($id)
	{
		$where = array('id_trotoar' => $id);
		$data['wilayah'] = $this->wilayah->get_by_id($where)->result();
		$data['trotoar'] = $this->wilayah->get_data();
		$this->load->view('layout/v_header');
		$this->load->view('layout/v_top');
		$this->load->view('datawilayah/v_update', $data);
		$this->load->view('layout/v_footer');
	}

	public function proses_update()
	{
		
	}

	public function hapus($id)
	{
		$this->wilayah->delete_by_id($id);
		redirect('wilayah');
	}
}

/* End of file Wilayah.php */
