<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(isset($this->user_data)){
			if(!in_array('pessoa', $this->user_data['permissoes'])){
				redirect('login', 'refresh');
			}
		}else{
			redirect('login', 'refresh');
		}
	}
	public function index(){
		$this->data['title']="Assinfor";
		$this->data['template']="inicio";
		$this->view->show_view($this->data);
	}
}