<?php
class Setor_model extends CI_Model{
	function listar(){
		$this->db
		->select('*')
		->from('setor');
		$query = $this->db->get_where();
		return $query->result();
	}
	function buscar_setor($id){
		$this->db
		->select('*')
		->from('setor')
		->where('id =', $id);
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
	function editar($setor, $id){
		if($this->db->where('id', $id)
				->update('setor', $setor)){
			return true;
		}else{
			return false;
		}
	}
}