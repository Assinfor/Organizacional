<?php
class Dia_model extends CI_Model{
	function listar(){
		$this->db
		->select('*')
		->from('dia');
		$query = $this->db->get_where();
		return $query->result();
	}
}