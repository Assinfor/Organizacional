<?php
class Funcionario_model extends CI_Model{
	function salvar($funcionario, $id=null){
		if($id==null){
			if($this->db->insert('funcionario', $funcionario)){
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->select('p.id')
				->from('pessoa p')
				->join('usuario u', 'u.pessoa_id=p.id')
				->where('u.id=',$id);
			$query = $this->db->get_where();
			$pessoa_id=$query->row();
			if($this->db->where('pessoa_fisica_pessoa_id=',$pessoa_id->id)
					->update('funcionario', $funcionario)){
						return true;
			}else{
				return false;
			}
		}
	}
}