<?php
class Pessoa_model extends CI_Model{
	function salvar($pessoa){
		if($this->db->insert('pessoa', $pessoa)){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
}