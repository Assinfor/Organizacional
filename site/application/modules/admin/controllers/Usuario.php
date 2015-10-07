<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
	}
	public function index(){
		$this->load->model('cidade_model');
		$this->data['template']="usuario";
		$this->data['usuarios']=$this->usuario_model->listar();
		$this->data['cidades']=$this->cidade_model->listar();
		$this->view->show_view($this->data);
	}
	public function salvar_usuario(){
		$pessoa = array(
			'nome' => $this->input->post('nome')	
		);
		if($pessoa_id=$this->usuario_model->salvar_pessoa($pessoa)){
			$this->load->model('endereco_model');
			$endereco = array(
					'pessoa_id' => $pessoa_id,
					'logradouro' => $this->input->post('logradouro'),
					'numero' => $this->input->post('numero'),
					'bairro' => $this->input->post('bairro'),
					'cidade_id' => $this->input->post('cidade')
			);
			if($this->endereco_model->salvar($endereco)){
				$pessoa_fisica = array(
					'pessoa_id' => $pessoa_id,
					'cpf' => $this->input->post('cpf'),
					'rg' => $this->input->post('rg')
				);
				if($this->usuario_model->salvar_pessoa_fisica($pessoa_fisica)){
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
						$this->view->set_message("Usuário adicionado com sucesso", "alert alert-success");
						redirect('admin/usuario', 'refresh');
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
		
	}
}