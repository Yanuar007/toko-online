<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

	public function Danielwellington()
	{
		$data['title'] = 'Danielwellington Categories';
		$data['danielwellington'] = $this->model_kategori->danielwellington()->result();
		$this->load->view('layout/user/header', $data);
		$this->load->view('danielwellington', $data);
		$this->load->view('layout/user/footer');
	}

	public function Chanel()
	{
		$data['title'] = 'Chanel Categories';
		$data['chanel'] = $this->model_kategori->chanel()->result();
		$this->load->view('layout/user/header', $data);
		$this->load->view('chanel', $data);
		$this->load->view('layout/user/footer');
	}

	public function Gshock()
	{
		$data['title'] = 'Gshock Categories';
		$data['gshock'] = $this->model_kategori->gshock()->result();
		$this->load->view('layout/user/header', $data);
		$this->load->view('gshock', $data);
		$this->load->view('layout/user/footer');
	}
}