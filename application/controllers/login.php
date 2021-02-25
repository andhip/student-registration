<?php 
 
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('M_login');
 
	}
 
	function index(){
		$this->load->view('V_login');
	}
 
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => ($password)
			);
		$cek = $this->M_login->cek_login("admin",$where)->num_rows();
		
		if($cek > 0){
 
			$data_session = array(
				'status' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
 
		}else{
			echo "<script>
			alert('Maaf Id atau password yang Anda masukan salah! Silahkan ulangi kembali');
			window.location.href='index/V_login';
			</script>";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
