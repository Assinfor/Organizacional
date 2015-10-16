<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regime_Tributario extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('regime_tributario_model');
	}
	public function index(){
		$this->data['template']="regime_tributario";
		$this->data['regimes']=$this->regime_tributario_model->listar();
		$this->view->show_view($this->data);
	}
	public function salvar_regime($id=null){
		if($id==null){
			$regime=$this->input->post('regime');
			if($this->regime_tributario_model->salvar($regime)){
				$this->view->set_message("Regime tributário adicionado com sucesso", "alert alert-success");
				redirect('regime_tributario', 'refresh');
			}else{
				$this->view->set_message("Erro ao salvar regime tributario", "alert alert-error");
				redirect('regime_tributario', 'refresh');
			}
		}else{
			$regime=$this->input->post('regime');
			if($this->regime_tributario_model->salvar($regime, $id)){
				$this->view->set_message("Mudanças salvas com sucesso", "alert alert-success");
				redirect('regime_tributario', 'refresh');
			}else{
				$this->view->set_message("Erro ao salvar regime tributario", "alert alert-error");
				redirect('regime_tributario', 'refresh');
			}
		}
	}
	
	public function buscar_regime($id){
		if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) ){
			$resultado=$this->regime_tributario_model->buscar_regime($id);
			echo json_encode($resultado);
		}else{
			redirect('regime_tributario', 'refresh');
		}
	}
}