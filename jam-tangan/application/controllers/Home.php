<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Jam Tangan';
		$data['product'] = $this->model_pembayaran->get('product')->result();
		$this->load->view('layout/home/header', $data);
		$this->load->view('home', $data);
		$this->load->view('layout/home/footer');
	}
	public function detail($id_brg)
    {
		$data['title'] = 'Detail Barang';
        $data['product'] = $this->model_pembayaran->detail_brg($id_brg);
        $this->load->view('layout/home/header', $data);
        $this->load->view('detail_barang', $data);
        $this->load->view('layout/home/footer');
    }
}
