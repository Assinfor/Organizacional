<?php
class Mes_model extends CI_Model{
	function listar(){
		$this->db
		->select('*')
		->from('mes');
		$query = $this->db->get_where();
		return $query->result();
	}
}