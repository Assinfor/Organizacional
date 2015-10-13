<?php
class Regime_tributario_model extends CI_Model{
	function listar(){
		$this->db
			->select('*')
			->from('regime_tributario');
		$query = $this->db->get_where();
		return $query->result();
	}
}