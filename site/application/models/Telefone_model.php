<?php
class Telefone_model extends CI_Model{
	function salvar($telefone){
		if($this->db->insert('telefone', $telefone)){
			return true;
		}else{
			return false;
		}
	}
	
	function buscar($id){
		$this->db
		->select('*')
		->from('telefone')
		->where('pessoa_id =', $id);
		$query = $this->db->get_where();
		return $query->result();
	}
	
	function deletar($id){
		$this->db->delete('telefone', array('id' => $id));
	}
}