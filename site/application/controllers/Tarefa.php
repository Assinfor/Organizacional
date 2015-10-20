<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarefa extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('tarefa_model');
		$this->load->model('regime_tributario_model');
		$this->load->model('dia_model');
		$this->load->model('mes_model');
	}
	public function index(){
		$this->data['template']="tarefa";
		$this->data['tarefas']=$this->tarefa_model->listar();
		$this->data['regimes']=$this->regime_tributario_model->listar();
		$this->data['dias']=$this->dia_model->listar();
		$this->data['meses']=$this->mes_model->listar();
		$this->view->show_view($this->data);
	}
	public function salvar(){
		$tarefa=$this->input->post('tarefa');
		if(!empty($_POST['regime_tributario_id'])){
			$tarefa['regime_tributario_id']=$_POST['regime_tributario_id'];
		}
		if($tarefa_id=$this->tarefa_model->salvar($tarefa)){
			if($_POST['periodo']=="mensal"){
				$dia=$this->input->post('dia-tarefa');
				$mensal= array(
						'dia_id'=>$this->input->post('dia-tarefa'),
						'tarefa_id'=>$tarefa_id
				);
				$this->tarefa_model->salvar_mensal($mensal);
			}else if($_POST['periodo']=="quinzenal"){
				$quinzenal= array(
						'tarefa_id'=>$tarefa_id
				);
				$dia_quinzenal = array(
						'dia_id' => $dia=$this->input->post('dia-tarefa'),
						'quinzenal_tarefa_id'=>$tarefa_id
				);
				$dia_quinzenal2 = array(
						'dia_id' => $dia=$this->input->post('dia-tarefa')+15,
						'quinzenal_tarefa_id'=>$tarefa_id
				);
				$this->tarefa_model->salvar_quinzenal($quinzenal, $dia_quinzenal, $dia_quinzenal2);
			}else if($_POST['periodo']=="semestral"){
				$semestral= array(
						'tarefa_id'=>$tarefa_id
				);
				$mes_semestral = array(
						'mes_id'=> $mes=$this->input->post('mes-tarefa'),
						'semestral_tarefa_id'=> $tarefa_id,
						'dia_id' => $dia=$this->input->post('dia-tarefa')
				);
				$mes_semestral2 = array(
						'mes_id'=> $mes=$this->input->post('mes-tarefa')+6,
						'semestral_tarefa_id'=> $tarefa_id,
						'dia_id' => $dia=$this->input->post('dia-tarefa')
				);
				$this->tarefa_model->salvar_semestral($semestral, $mes_semestral, $mes_semestral2);
			}else if($_POST['periodo']=="anual"){
				$anual = array(
						'tarefa_id' => $tarefa_id,
						'dia_id' => $dia=$this->input->post('dia-tarefa'),
						'mes_id' => $mes=$this->input->post('mes-tarefa')
				);
				$this->tarefa_model->salvar_anual($anual);
			}
			$this->view->set_message("Tarefa salva com sucesso", "alert alert-success");
			redirect('tarefa', 'refresh');
		}else{
			$this->view->set_message("Erro ao salvar tarefa", "alert alert-error");
			redirect('tarefa', 'refresh');
		}
	}
}