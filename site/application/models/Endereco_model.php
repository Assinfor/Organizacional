<?php
class Endereco_model extends CI_Model{
	function salvar($endereco, $id=null){
		if($id==null){
			if($this->db->insert('endereco', $endereco)){
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
			if($this->db->where('pessoa_id=',$pessoa_id->id)
					->update('endereco', $endereco)){
				return true;
			}else{
				return false;
			}
		}
	}
	function editar($endereco, $id){
		if($this->db->where('pessoa_id=',$id)
				->update('endereco', $endereco)){
					return true;
		}else{
			return false;
		}
	}
}