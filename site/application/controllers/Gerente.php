<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gerente extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('gerente_model');
	}
	public function index(){
		$this->data['template']="gerente";
		$this->data['gerentes_ativos']=$this->gerente_model->listar('ativo');
		$this->data['gerentes_inativos']=$this->gerente_model->listar('inativo');
		$this->view->show_view($this->data);
	}
	public function retirar_gerente($pessoa_id){
		$gerente= array (
				"data_final" => date("Y-m-d"),
				"status" => "inativo"
		);
		if($this->gerente_model->retirar($pessoa_id, $gerente)){
			$this->view->set_message("Gerente retirado com sucesso", "alert alert-success");
			redirect('gerente', 'refresh');
		}else{
			$this->view->set_message("Erro ao executar ação", "alert alert-error");
			redirect('gerente', 'refresh');
		}
	}
	
	public function buscar_gerentes($id){
		if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) ){
			$funcionarios=$this->gerente_model->buscar_gerentes($id);
			echo json_encode($funcionarios);
		}else{
			redirect('gerente', 'refresh');
		}
	}
	
	public function definir_gerente($id){
		$gerente=$this->input->post('gerente');
		$gerente['setor_id']=$id;
		$gerente['data_inicio']=date("Y-m-d");
		if($this->gerente_model->definir($gerente)){
			$this->view->set_message("Gerente definido com sucesso", "alert alert-success");
			redirect('gerente', 'refresh');
		}else{
			$this->view->set_message("Erro ao executar ação", "alert alert-error");
			redirect('gerente', 'refresh');
		}
	}
	
}