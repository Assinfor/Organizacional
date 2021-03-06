<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('pessoa_model');
		$this->load->model('pessoafisica_model');
		$this->load->model('funcionario_model');
		$this->load->model('cidade_model');
		$this->load->model('endereco_model');
		$this->load->model('telefone_model');
		$this->load->model('email_model');
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
				$emailregistrado=0;
				$emails = $this->input->post('email');
				$regemails=$this->email_model->listar();
				foreach($regemails as $regemail){
					foreach($emails as $email){
						if($regemail->email==$email){
							$emailregistrado++;
						}
					}
				}
				if($emailregistrado==0){
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
									$email = array(
											'pessoa_id' => $pessoa_id,
											'email' => $email
									);
									$this->email_model->salvar($email);
								}
								$funcionario = $this->input->post('funcionario');
								$funcionario['pessoa_fisica_id']=$pessoa_id;
								if($this->funcionario_model->salvar($funcionario)){
									$this->view->set_message("Usuário adicionado com sucesso", "alert alert-success");
									redirect('usuario', 'refresh');
								}else{
									$this->view->set_message("Erro ao salvar funcionário", "alert alert-error");
									redirect('usuario', 'refresh');
								}
							}else{
								$this->view->set_message("Erro ao salvar pessoa física", "alert alert-error");
								redirect('usuario', 'refresh');
							}
						}else{
							$this->view->set_message("Erro ao salvar endereço", "alert alert-error");
							redirect('usuario', 'refresh');
						}
					}else{
						$this->view->set_message("Erro ao salvar pessoa", "alert alert-error");
						redirect('usuario', 'refresh');
					}
				}else{
					$_SESSION['editar']=1;
					if($emailregistrado==1){
						$this->view->set_message("Um e-mail digitado já está no banco de dados", "alert alert-error");
					}else{
						$this->view->set_message($emailregistrado." e-mails digitados já estão no banco de dados", "alert alert-error");
					}
					echo '<script language="javascript">history.go(-1);</script>';
				}
		}else{
			if(isset($_POST['email'])){
				$emailregistrado=0;
				$emails = $this->input->post('email');
				$regemails=$this->email_model->listar();
				foreach($regemails as $regemail){
					foreach($emails as $email){
						if($regemail->email==$email){
							$emailregistrado++;
						}
					}
				}
				if($emailregistrado>0){
					if($emailregistrado==1){
						$this->view->set_message("Um e-mail digitado já está no banco de dados", "alert alert-error");
					}else{
						$this->view->set_message($emailregistrado." e-mails digitados já estão no banco de dados", "alert alert-error");
					}
					redirect('usuario', 'refresh');
				}
			}
			$pessoa['nome']=$this->input->post('nome');
			$pessoa_id=$this->input->post('pessoa_id');
			if($this->pessoa_model->salvar($pessoa, $pessoa_id)){
				$endereco = $this->input->post('endereco');
				if($this->endereco_model->salvar($endereco, $id)){
					$pessoa_fisica=$this->input->post('pessoa_fisica');
					if($this->pessoafisica_model->salvar($pessoa_fisica, $id)){
						$funcionario = $this->input->post('funcionario');
						if($this->funcionario_model->salvar($funcionario, $id)){
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
												'pessoa_id' => $pessoa_id,
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
												'pessoa_id' => $pessoa_id,
												'email' => $email
										);
										$this->email_model->salvar($email);
									}
								}
							}
							$this->view->set_message("Mudanças salvas com sucesso", "alert alert-success");
							redirect('usuario', 'refresh');
						}else{
							$this->view->set_message("Erro ao salvar funcionário", "alert alert-error");
							redirect('usuario', 'refresh');
						}
					}else{
						$this->view->set_message("Erro ao salvar pessoa física", "alert alert-error");
						redirect('usuario', 'refresh');
					}
				}else{
					$this->view->set_message("Erro ao salvar endereço", "alert alert-error");
					redirect('usuario', 'refresh');
				}
		}else{
			$this->view->set_message("Erro ao salvar pessoa", "alert alert-error");
			redirect('empresa', 'refresh');
		}
	}
	}
	
	public function deletar_usuario($id){
		if($this->usuario_model->deletar_usuario($id)){
			$this->view->set_message("Usuário deletado com sucesso", "alert alert-success");
			redirect('usuario', 'refresh');
		}else{
			$this->view->set_message("Erro ao deletar usuário", "alert alert-error");
			redirect('usuario', 'refresh');
		}
	}
	public function buscar_usuario($id){
		if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) ){
			$resultado=$this->usuario_model->listar($id);
			echo json_encode($resultado);
		}else{
			redirect('usuario', 'refresh');
		}
	}
	
	public function buscar_telefones($id){
		if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) ){
			$resultado=$this->telefone_model->buscar($id);
			echo json_encode($resultado);
		}else{
			redirect('usuario', 'refresh');
		}
	}
	
	public function buscar_emails($id){
		if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) ){
			$resultado=$this->email_model->buscar($id);
			echo json_encode($resultado);
		}else{
			redirect('usuario', 'refresh');
		}
	}
}