<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setor extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('setor_model');
	}
	public function index(){
		$this->load->model('usuario_model');
		$this->data['template']="setor";
		$this->data['setores']=$this->setor_model->listar();
		$this->data['usuarios']=$this->usuario_model->listar();
		$this->view->show_view($this->data);
	}
	public function salvar_setor(){
		$setor = array(
				'nome' => $this->input->post('nome'),
				'descricao' => $this->input->post('descricao')
		);
		if($this->setor_model->salvar($setor)){
			$this->view->set_message("Setor adicionado com sucesso", "alert alert-success");
			redirect('setor', 'refresh');
		}else{
			$this->view->set_message("Erro ao adicionar", "alert alert-error");
			redirect('setor', 'refresh');
		}
	}
	
	public function deletar_setor($id){
		if($this->setor_model->deletar_setor($id)){
			$this->view->set_message("Setor deletado com sucesso", "alert alert-success");
			redirect('setor', 'refresh');
		}else{
			$this->view->set_message("Erro ao deletar setor", "alert alert-error");
			redirect('setor', 'refresh');
		}
	}
	
	public function buscar_setor($id){
		if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) ){
			$resultado=$this->setor_model->buscar_setor($id);
			echo json_encode($resultado);
		}else{
			redirect('setor', 'refresh');
		}
	}
	
	public function editar_setor($id){
		$setor = array(
			'nome' => $this->input->post('nome'),
			'descricao' => $this->input->post('descricao')
		);
		if($this->setor_model->editar($setor, $id)){
			$this->view->set_message("Mudanças salvas com sucesso", "alert alert-success");
			redirect('setor', 'refresh');
		}else{
			$this->view->set_message("Ocorreu um erro ao salvar mudanças", "alert alert-error");
			redirect('setor', 'refresh');
		}
		
	}
}