<?php
class Regime_tributario_model extends CI_Model{
	function listar(){
		$this->db
			->select('*')
			->from('regime_tributario');
		$query = $this->db->get_where();
		return $query->result();
	}
	function salvar($regime, $id=null){
		if($id==null){
			if($this->db->insert('regime_tributario', $regime)){
				return true;
			}else{
				return false;
			}
		}else{
			if($this->db->where('id=',$id)
					->update('regime_tributario', $regime)){
				return true;
			}else{
				return false;
			}
		}
	}
	function buscar_regime($id){
		$this->db
		->select('*')
		->from('regime_tributario')
		->where('id =', $id);
		$query = $this->db->get_where();
		return $query->result();
	}
}