<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('pessoa_model');
		$this->load->model('pessoa_juridica_model');
		$this->load->model('regime_tributario_model');
	}
	public function index(){
		$this->data['template']="empresa";
		$this->data['empresas']=$this->pessoa_juridica_model->listar();
		$this->data['regimes']=$this->regime_tributario_model->listar();
		$this->view->show_view($this->data);
	}
	public function salvar_empresa(){
		$pessoa['nome']=$this->input->post('nome');
		if($pessoa_id=$this->pessoa_model->salvar($pessoa)){
			$pessoa_juridica=$this->input->post('pessoa_juridica');
			$pessoa_juridica['pessoa_id']=$pessoa_id;
			if($this->input->post('pessoa_juridica[matriz_id]')==""){
				$pessoa_juridica['matriz_id']=null;
			}
			if($this->pessoa_juridica_model->salvar($pessoa_juridica)){
				$this->view->set_message("Empresa adicionada com sucesso", "alert alert-success");
				redirect('admin/empresa', 'refresh');
			}else{
				$this->view->set_message("Erro ao salvar pessoa juridica", "alert alert-error");
				redirect('admin/empresa', 'refresh');
			}
		}else{
			$this->view->set_message("Erro ao salvar pessoa", "alert alert-error");
			redirect('admin/empresa', 'refresh');
		}
	}
}