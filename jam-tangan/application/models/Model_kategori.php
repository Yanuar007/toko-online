<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kategori extends CI_Model
{
	public function danielwellington()
	{
		return $this->db->get_where('product', array('kategori' => 'Danielwellington'));
	}

	public function chanel()
	{
		return $this->db->get_where('product', array('kategori' => 'Chanel'));
	}


	public function gshock()
	{
		return $this->db->get_where('product', array('kategori' => 'Gshock'));
	}
}
