<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('pessoa_model');
		$this->load->model('pessoa_juridica_model');
		$this->load->model('regime_tributario_model');
		$this->load->model('cidade_model');
		$this->load->model('endereco_model');
		$this->load->model('telefone_model');
		$this->load->model('email_model');
	}
	public function index(){
		$this->data['template']="empresa";
		$this->data['empresas']=$this->pessoa_juridica_model->listar();
		$this->data['regimes']=$this->regime_tributario_model->listar();
		$this->data['cidades']=$this->cidade_model->listar();
		$this->view->show_view($this->data);
	}
	public function salvar_empresa($id=null){
		if($id==null){
			$pessoa['nome']=$this->input->post('nome');
			if($pessoa_id=$this->pessoa_model->salvar($pessoa)){
				$endereco = $this->input->post('endereco');
				$endereco['pessoa_id']=$pessoa_id;
				if($this->endereco_model->salvar($endereco)){
					$pessoa_juridica=$this->input->post('pessoa_juridica');
					$pessoa_juridica['pessoa_id']=$pessoa_id;
					if($this->input->post('pessoa_juridica[matriz_id]')==""){
						$pessoa_juridica['matriz_id']=null;
					}
					if($this->pessoa_juridica_model->salvar($pessoa_juridica)){
							$ddd = $this->input->post('ddd');
							$numero = $this->input->post('telefone');
							$tipo = $this->input->post('tipo');
							foreach($ddd as $key=>$v){
								if(!empty($v) and !empty($numero[$key]) and !empty($tipo[$key])){
									$telefone = array(
											'pessoa_id' => $pessoa_id,
											'ddd' => $v,
											'numero' => $numero[$key],
											'tipo'	=> $tipo[$key]
									);
									$this->telefone_model->salvar($telefone);
								}
							}
							$emails = $this->input->post('email');
							foreach($emails as $email){
								if(!empty($email)){
									$email = array(
											'pessoa_id' => $pessoa_id,
											'email' => $email
									);
									$this->email_model->salvar($email);
								}
							}
						$this->view->set_message("Empresa adicionada com sucesso", "alert alert-success");
						redirect('empresa', 'refresh');
					}else{
						$this->view->set_message("Erro ao salvar pessoa juridica", "alert alert-error");
						redirect('empresa', 'refresh');
					}
				}else{
					$this->view->set_message("Erro ao salvar endereço", "alert alert-error");
					redirect('empresa', 'refresh');
				}
			}else{
				$this->view->set_message("Erro ao salvar pessoa", "alert alert-error");
				redirect('empresa', 'refresh');
			}
			}else{
				$pessoa['nome']=$this->input->post('nome');
				if($this->pessoa_model->salvar($pessoa, $id)){
					$endereco = $this->input->post('endereco');
					if($this->endereco_model->editar($endereco, $id)){
						$pessoa_juridica=$this->input->post('pessoa_juridica');
						if($this->pessoa_juridica_model->salvar($pessoa_juridica, $id)){
							if(isset($_POST['tel-del'])){
								$telefones=$this->input->post('tel-del[]');
								foreach($telefones as $telefone){
									$this->telefone_model->deletar($telefone);
								}
							}
							if(isset($_POST['ddd'])){
								$ddd = $this->input->post('ddd');
								$numero = $this->input->post('telefone');
								$tipo = $this->input->post('tipo');
								foreach($ddd as $key=>$v){
									if(!empty($ddd) and !empty($numero) and !empty($tipo)){
										$telefone = array(
												'pessoa_id' => $id,
												'ddd' => $v,
												'numero' => $numero[$key],
												'tipo'	=> $tipo[$key]
										);
										$this->telefone_model->salvar($telefone);
									}
								}
							}
							if(isset($_POST['email-del'])){
								$emails=$this->input->post('email-del[]');
								foreach($emails as $email){
									$this->email_model->deletar($email);
								}
							}
							if(isset($_POST['email'])){
								$emails = $this->input->post('email');
								foreach($emails as $email){
									if(!empty($email)){
										$email = array(
												'pessoa_id' => $id,
												'email' => $email
										);
										$this->email_model->salvar($email);
									}
								}
							}
							$this->view->set_message("Mudanças salvas com sucesso", "alert alert-success");
							redirect('empresa', 'refresh');
						}else{
							$this->view->set_message("Erro ao salvar pessoa juridica", "alert alert-error");
							redirect('empresa', 'refresh');
						}
					}else{
						$this->view->set_message("Erro ao salvar endereço", "alert alert-error");
						redirect('empresa', 'refresh');
					}
				}else{
					$this->view->set_message("Erro ao salvar pessoa", "alert alert-error");
					redirect('empresa', 'refresh');
				}
			}
	}
	public function buscar_empresa($id){
		if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) ){
			$resultado=$this->pessoa_juridica_model->buscar_empresa($id);
			echo json_encode($resultado);
		}else{
			redirect('empresa', 'refresh');
		}
	}
}