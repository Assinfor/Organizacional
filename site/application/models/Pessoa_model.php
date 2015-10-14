<?php
class Pessoa_model extends CI_Model{
	function salvar($pessoa, $id=null){
		if($id==null){
			if($this->db->insert('pessoa', $pessoa)){
				return $this->db->insert_id();
			}else{
				return false;
			}
		}else{
			if($this->db->where('id=',$id)
					->update('pessoa', $pessoa)){
						return true;
			}else{
				return false;
			}
		}
	}
}