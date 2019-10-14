<?php 

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Backend extends CI_Model
{

	public $table = 'user';
	public $id = 'id';
	public $order = 'DESC';

	function __construct()
	{
		$this->load->model('User_model');
		parent::__construct();
	}

	// get total rows
	function total_rows($q = NULL) {
		$this->db->like('id', $q);
		$this->db->or_like('nama_klien', $q);
		$this->db->or_like('detais', $q);
		$this->db->or_like('status', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


}
?>