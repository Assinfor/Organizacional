<?php
class Usuario_model extends CI_Model{
	function listar(){
		$this->db
			->select('*')
			->from('pessoa')
			->join('usuario', 'usuario.pessoa_id = pessoa.id', 'left')
			->join('endereco', 'pessoa.id=endereco.pessoa_id', 'left')
			->where('usuario.status =','ativo');
		$query = $this->db->get_where();
		return $query->result();
	}
	function salvar_pessoa($pessoa){
		if($this->db->insert('pessoa', $pessoa)){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
	function salvar_pessoa_fisica($pessoa_fisica){
		if($this->db->insert('pessoa_fisica', $pessoa_fisica)){
			return true;
		}else{
			return false;
		}
	}
	function salvar_usuario($usuario){
		if($this->db->insert('usuario', $usuario)){
			return true;
		}else{
			return false;
		}
	}
}