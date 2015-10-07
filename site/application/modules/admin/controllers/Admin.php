<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {
	public function __construct(){
		parent::__construct();
		if(isset($this->user_data)){
			if(!in_array('admin', $this->user_data['permissoes'])){
				redirect('', 'refresh');
			}
		}else{
			redirect('', 'refresh');
		}
	}
	public function index(){
		$this->data['title']="Assinfor";
		$this->data['template']="inicio";
		$this->view->show_view($this->data);
	}
}