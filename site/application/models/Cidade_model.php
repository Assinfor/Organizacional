<?php
class Cidade_model extends CI_Model{
	function listar(){
		$this->db
			->select('*')
			->from('cidade');
		$query = $this->db->get_where();
		return $query->result();
	}
	function buscar_cidades(){
		$this->db
			->select('c.cidade_id, c.cidade_nome')
			->from('cidade c');
		$query = $this->db->get_where();
		return $query->result();
	}
}