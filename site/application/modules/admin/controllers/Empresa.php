<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends MX_Controller {
	public function index(){
		$this->data['template']="empresa";
		$this->view->show_view($this->data);
	}
}