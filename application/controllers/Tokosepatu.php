<?php
defined('BASEPATH') or exit ('no direct script access allowed');

Class Tokosepatu extends CI_Controller{

	public function index()
	
	{
		$this->load->view('tokosepatu/v_input');
	}
	
	public function cetak()
	{
		$this->form_validation->set_rules('nama', 'Nama Pembeli', 'required|min_length[3]',
			array(
				'required' => '%s Harus diisi',
				'min_length' => '%s terlalu pendek')
	);
			$this->form_validation->set_rules('nohp', 'Nomor HP', 'required|min_length[3]',
			array(
				'required' => '%s Harus diisi',
				'min_length' => '%s terlalu pendek')
	);
			$this->form_validation->set_rules('merek', 'Merek Sepatu', 'required|min_length[3]',
			array(
				'required' => '%s Harus diisi',
				'min_length' => '%s terlalu pendek')
	);
			$this->form_validation->set_rules('ukuran', 'Ukuran Sepatu', 'required|min_length[2]',
			array(
				'required' => '%s Harus diisi',
				'min_length' => '%s terlalu pendek')
	);
	
	if ($this->form_validation->run() == FALSE)
	{
		$this->load->view('tokosepatu/v_input');
	} else {
		$data = [
			'nama' => $this->input->post('nama'),
			'nohp' => $this->input->post('nohp'),
			'merek' => $this->input->post('merek'),
			'ukuran' => $this->input->post('ukuran'),
			'harga' => $this->input->post('harga'),
		];
	
	if ($this->input->post('merek')  == "Nike"){
		$data['harga'] = 375000;
	}elseif($this->input->post('merek') == "Adidas"){
		$data['harga'] = 300000;
	}elseif($this->input->post('merek') == "Kicker"){
		$data['harga'] = 250000;
	}elseif($this->input->post('merek') == "Eiger"){
		$data['harga'] = 275000;
	}else{
		$data['harga'] = 400000;
	}
		$this->load->view('tokosepatu/v_output', $data);
	}
	} 
}