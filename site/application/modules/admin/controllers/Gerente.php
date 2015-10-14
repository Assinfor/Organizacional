<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gerente extends MX_Controller {
	public function index(){
		$this->data['template']="gerente";
		$this->view->show_view($this->data);
	}
	
}