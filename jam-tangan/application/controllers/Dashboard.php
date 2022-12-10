<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('level') != '2') {
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['title'] = 'Dashboard User';
		$data['product'] = $this->model_pembayaran->get('product')->result();
		$this->load->view('layout/user/header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('layout/user/footer');
	}

	public function cart($id)
	{
		$product = $this->model_pembayaran->find($id);

		$data = array(
			'id'      => $product->id_brg,
			'qty'     => 1,
			'price'   => $product->harga,
			'name'    => $product->nama_brg,
			'options' => array(
				'keterangan' => $product->keterangan,
				'kategori' => $product->kategori,
				'gambar' => $product->gambar
			)
		);

		$this->cart->insert($data);
		$_SESSION["sukses"] = 'Pesanan telah disimpan di keranjang';
		redirect('dashboard');
	}
	
	public function detail($id_brg)
    {
		$data['title'] = 'Detail Barang';
        $data['product'] = $this->model_pembayaran->detail_brg($id_brg);
        $this->load->view('layout/user/header', $data);
        $this->load->view('detail_barang', $data);
        $this->load->view('layout/user/footer');
    }

	public function detail_cart()
	{
		$data['title'] = 'Detail Cart';
		$this->load->view('layout/user/header', $data);
		$this->load->view('cart', $data);
		$this->load->view('layout/user/footer');
	}

	public function checkout()
	{
		$data['title'] = 'Checkout Product';
		$this->load->view('layout/user/header', $data);
		$this->load->view('checkout', $data);
		$this->load->view('layout/user/footer');
	}

	public function checkout_proccess()
	{
		$data['title'] = 'Payment Notification';
		$is_processed = $this->model_invoice->index();
		if ($is_processed) {
			$this->cart->destroy();
			$this->load->view('layout/user/header', $data);
			$this->load->view('success_pay', $data);
			$this->load->view('layout/user/footer');
		} else {
			echo "Maaf, Pesanan Anda Gagal Di Proses!";
		}
	}

	public function clear()
	{
		$this->cart->destroy();
		$_SESSION["sukses"] = 'Pesanan berhasil di hapus';
		redirect('dashboard');
	}

	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		$_SESSION["sukses"] = 'Pesanan berhasil di hapus';
		redirect('dashboard/detail_cart');
	}

	public function search(){
		$kata_kunci = $this->input->post('kata_kunci');
		$data['product'] = $this->model_pembayaran->get_keyword($kata_kunci);
		$this->load->view('layout/user/header');
        $this->load->view('dashboard', $data);
        $this->load->view('layout/user/footer');

	}

}