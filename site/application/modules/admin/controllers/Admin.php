<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {
	public function index(){
		$this->data['title']="Assinfor";
		$this->data['template']="inicio";
		$this->view->show_view($this->data);
	}
}