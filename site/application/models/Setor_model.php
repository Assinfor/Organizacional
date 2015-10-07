<?php
class Setor_model extends CI_Model{
	function listar(){
		$this->db
		->select('*')
		->from('setor')
		->join('pessoa', 'pessoa.id = setor.gerente_id', 'left');
		$query = $this->db->get_where();
		return $query->result();
	}
	function salvar($setor){
		if($this->db->insert('setor', $setor)){
			return true;
		}else{
			return false;
		}
	}
}