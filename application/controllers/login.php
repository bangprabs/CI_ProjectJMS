<?php 

class Login extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}


	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->m_login->cek_login("user",$where)->num_rows();
		$cek2 = $this->m_login->cek_login("user",$where)->row_array();
		if($cek > 0){

			$data_session = array(
				'id' => $cek2['id'], 
				'nama' => $username,
				'nama_lengkap' => $cek2['user_fullname'],
				'level' => $cek2['user_level'],
				'status' => "login"
				);
			$this->session->set_userdata($data_session);

			redirect(base_url("adminbackend/report"));

		}else{ 
			echo "<script>
			alert('Password Dan Username Anda Salah');
			window.location = 'http://localhost/jms_project/adminbackend';
		</script>";
	}
}

function logout(){
	$this->session->sess_destroy();
	redirect(base_url('adminbackend'));
}
}
?>