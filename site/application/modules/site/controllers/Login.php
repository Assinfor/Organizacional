<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller{
	public function index(){
		if(empty($this->user_data)){
			$this->data['title']="Assinfor";
			$this->data['template']="login_view";
			$this->load->view('login_view',$this->data);
		}else{
				print_r($this->user_data);
			}
	}
	function autenticar(){
		$this->load->model('login_model');
		$email = $this->input->post('email');
		$senha = md5($this->input->post('senha'));
		$query=$this->login_model->autenticar($email,$senha);
		if($query['pessoa'] > 0){
			$_SESSION['user_data'] = $query;
			$_SESSION['user_data']['permissoes'][]="pessoa";
			if($query['admin']>0){
				$_SESSION['user_data']['permissoes'][]="admin";
			}
			redirect('', 'refresh');
		}else{
			$this->view->set_message("Login inválido", "alert alert-error");
			redirect('', 'refresh');
		}
	}
	function logout(){
		unset($_SESSION['user_data']);
		redirect('', 'refresh');
	}
}