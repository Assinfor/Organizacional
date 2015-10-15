<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('pessoa_model');
		$this->load->model('pessoafisica_model');
		$this->load->model('funcionario_model');
		$this->load->model('cidade_model');
		$this->load->model('endereco_model');
	}
	public function index(){
		$this->load->model('setor_model');
		$this->data['template']="usuario";
		$this->data['usuarios']=$this->usuario_model->listar();
		$this->data['cidades']=$this->cidade_model->listar();
		$this->data['setores']=$this->setor_model->listar();
		$this->view->show_view($this->data);
	}
	public function salvar_usuario($id=null){
		if($id==null){
		$pessoa = array(
			'nome' => $this->input->post('nome')	
		);
		if($pessoa_id=$this->pessoa_model->salvar($pessoa)){
			$endereco = $this->input->post('endereco');
			$endereco['pessoa_id']=$pessoa_id;
			if($this->endereco_model->salvar($endereco)){
				$pessoa_fisica=$this->input->post('pessoa_fisica');
				$pessoa_fisica['pessoa_id']=$pessoa_id;
				if($this->pessoafisica_model->salvar($pessoa_fisica)){
					$this->load->model('telefone_model');
					$this->load->model('email_model');
					$ddd = $this->input->post('ddd');
					$numero = $this->input->post('telefone');
					$tipo = $this->input->post('tipo');
					foreach($ddd as $key=>$v){
						$telefone = array(
							'pessoa_id' => $pessoa_id,
							'ddd' => $v,
							'numero' => $numero[$key],
							'tipo'	=> $tipo[$key]
						);
						$this->telefone_model->salvar($telefone);
					}
					$emails = $this->input->post('email');
					foreach($emails as $email){
						$email = array(
								'pessoa_id' => $pessoa_id,
								'email' => $email
						);
						$this->email_model->salvar($email);
					}
					$usuario = array(
						'senha' => md5($this->input->post('senha')),
						'pessoa_id' => $pessoa_id
					);
					if($this->usuario_model->salvar_usuario($usuario)){
						$funcionario = $this->input->post('funcionario');
						$funcionario['pessoa_fisica_id']=$pessoa_id;
						if($this->funcionario_model->salvar($funcionario)){
							$this->view->set_message("Usuário adicionado com sucesso", "alert alert-success");
							redirect('admin/usuario', 'refresh');
						}else{
							$this->view->set_message("Erro ao salvar funcionário", "alert alert-error");
							redirect('admin/usuario', 'refresh');
						}
					}else{
						$this->view->set_message("Erro ao salvar usuário", "alert alert-error");
						redirect('admin/usuario', 'refresh');
					}
				}else{
					$this->view->set_message("Erro ao salvar pessoa física", "alert alert-error");
					redirect('admin/usuario', 'refresh');
				}
			}else{
				$this->view->set_message("Erro ao salvar endereço", "alert alert-error");
				redirect('admin/usuario', 'refresh');
			}
		}else{
			$this->view->set_message("Erro ao salvar pessoa", "alert alert-error");
			redirect('admin/usuario', 'refresh');
		}
		}else{
			$pessoa['nome']=$this->input->post('nome');
			$pessoa_id=$this->input->post('pessoa_id');
			if($this->pessoa_model->salvar($pessoa, $pessoa_id)){
				$endereco = $this->input->post('endereco');
				if($this->endereco_model->salvar($endereco, $id)){
					$pessoa_fisica=$this->input->post('pessoa_fisica');
					if($this->pessoafisica_model->salvar($pessoa_fisica, $id)){
						$funcionario = $this->input->post('funcionario');
						if($this->funcionario_model->salvar($funcionario, $id)){
							$this->view->set_message("Mudanças salvas com sucesso", "alert alert-success");
							redirect('admin/usuario', 'refresh');
						}else{
							$this->view->set_message("Erro ao salvar funcionário", "alert alert-error");
							redirect('admin/usuario', 'refresh');
						}
					}else{
						$this->view->set_message("Erro ao salvar pessoa física", "alert alert-error");
						redirect('admin/usuario', 'refresh');
					}
				}else{
					$this->view->set_message("Erro ao salvar endereço", "alert alert-error");
					redirect('admin/usuario', 'refresh');
				}
		}else{
			$this->view->set_message("Erro ao salvar pessoa", "alert alert-error");
			redirect('admin/empresa', 'refresh');
		}
	}
	}
	
	public function deletar_usuario($id){
		if($this->usuario_model->deletar_usuario($id)){
			$this->view->set_message("Usuário deletado com sucesso", "alert alert-success");
			redirect('admin/usuario', 'refresh');
		}else{
			$this->view->set_message("Erro ao deletar usuário", "alert alert-error");
			redirect('admin/usuario', 'refresh');
		}
	}
	public function buscar_usuario($id){
		if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) ){
			$resultado=$this->usuario_model->listar($id);
			echo json_encode($resultado);
		}else{
			redirect('admin/usuario', 'refresh');
		}
	}
}