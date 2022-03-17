<?php
class Adminbackend extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('backend');
		$this->load->model('m_login');
		$this->load->model('User_model');
		$this->load->library('session');
	}

	public function index()
	{
		
		$data['page'] = 'Login';
		$this->load->view('backend/loginbackend', $data);
	}

	public function report()
	{	
		$data['agenda'] = $this->_getAgenda();
		$data['ticket'] = $this->_getTicket();
		$data['spk'] = $this->_getSpk();

		$this->load->view('backend/adminbackend', $data);
	}

	public function profil($id){
		$row = $this->User_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('adminbackend/profil_process'),
				'id' => set_value('id', $row->id),
				'username' => set_value('username', $row->username),
				'password' => set_value('password', $row->password),
				'user_mail' => set_value('user_mail', $row->user_mail),
				'user_fullname' => set_value('user_fullname', $row->user_fullname),
				'user_level' => set_value('user_level', $row->user_level),
				);
			$this->load->view('backend/profil' , $data);

		}
	}
	public function profil_process(){
		$this->_rules();
		$data = array(
			'user_fullname' => $this->input->post('user_fullname',TRUE),
			'user_mail' => $this->input->post('user_mail',TRUE),
			'password' => $this->input->post('password',TRUE) ,
			);

		$this->User_model->update($this->input->post('id', TRUE), $data);
		$this->session->set_flashdata('message', 'Update Record Success');
		redirect(site_url('user'));
	}
	public function _rules() 
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('user_mail', 'user mail', 'trim|required');
		$this->form_validation->set_rules('user_fullname', 'user fullname', 'trim|required');
		$this->form_validation->set_rules('user_level', 'user level', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	function change_status($status=null, $id = null)
	{
		if(($status != null) and ($id != null))
		{
			$data_update = array(
				'last_update_by' => $this->session->userdata('nama_lengkap'),
				'last_update_time' => date('Y-m-d H:i:s'),
				'status' => ucfirst($status)
				);
			$this->db->where('no_spk', $id);
			$this->db->update('spk',$data_update);

			$this->session->set_flashdata('message','<div class="alert alert-success">Status telah diupdate</div>');
		}

		redirect('adminbackend/report');

	}

	function change_status_t($status=null, $id = null)
	{
		if(($status != null) and ($id != null))
		{
			$data_update = array(
				'status' => ucfirst($status)
				);
			$this->db->where('no_spk', $id);
			$this->db->update('ticket',$data_update);

			$this->session->set_flashdata('message','<div class="alert alert-success">Status telah diupdate</div>');
		}

		redirect('adminbackend/report');

	}

	function change_status_a($status=null, $id = null)
	{
		if(($status != null) and ($id != null))
		{
			$data_update = array(
				'status' => ucfirst($status)
				);
			$this->db->where('no_agenda', $id);
			$this->db->update('agenda',$data_update);

			$this->session->set_flashdata('message','<div class="alert alert-success">Status telah diupdate</div>');
		}

		redirect('adminbackend/report');

	}

	public function laporan(){	
		$data['spk'] = $this->_getSpk();
		$data['ticket'] = $this->_getTicket();
		$this->load->view('backend/report.php' ,$data);
	}

	private function _getSpk(){
		$this->db->where('status !=', 'Done');
		$q = $this->db->get('spk');
		return $q->result_array();
	}

	private function _getTicket(){
		$this->db->where('status !=', 'Done');
		$this->db->order_by('level', 'ASC');
		$q = $this->db->get('ticket');
		return $q->result_array();
	}

	private function _getAgenda(){
		$this->db->where('status !=', 'Done');
		$q = $this->db->get('agenda');
		return $q->result_array();
	}

	private function _getUser(){
		$q = $this->db->get('user');
		return $q->result_array();
	}

}

?>