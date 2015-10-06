<?php
class Cidade_model extends CI_Model{
	function listar(){
		$this->db
			->select('*')
			->from('cidade');
		$query = $this->db->get_where();
		return $query->result();
	}
}