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
}