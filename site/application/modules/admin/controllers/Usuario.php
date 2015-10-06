<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MX_Controller {
	public function index(){
		$this->load->model('usuario_model');
		$this->load->model('cidade_model');
		$this->data['title']="Assinfor";
		$this->data['template']="usuario";
		$this->data['usuarios']=$this->usuario_model->listar();
		$this->data['cidades']=$this->cidade_model->listar();
		$this->view->show_view($this->data);
	}
}