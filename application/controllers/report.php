<?php 
class Report extends CI_Controller{

	public function __contstruct()
	{
		parent:: __contstruct();
	}

	public function index()
	{
		$data['spk'] = $this->_getSpk();
		$data['m_board'] = $this->_getBoard();
		$this->load->view('laporan/index', $data);
	}

	public function index2()
	{
		$data['ticket'] = $this->_getTicket();
		$data['agenda'] = $this->_getAgenda();
		$data['m_board'] = $this->_getBoard();
		$this->load->view('laporan/index2', $data);
	}

	public function index3()
	{
		$data['ticket'] = $this->_getTicket();
		$data['m_board'] = $this->_getBoard();
		$this->load->view('laporan/index3', $data);
	}

	private function _getBoard(){
		$q = $this->db->get('m_board');
		return $q->result_array();
	}

	private function _getSpk(){
		$this->db->where('status !=', 'Done');
		$q = $this->db->get('spk');
		return $q->result_array();
	}

	private function _getTicket(){
		$this->db->where('status !=', 'Done');
		$q = $this->db->get('ticket');
		return $q->result_array();
	}

	private function _getAgenda(){
		$q = $this->db->get('agenda');
		return $q->result_array();
	}

}

?>