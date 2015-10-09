<?php
class Pessoafisica_model extends CI_Model{
	function salvar($pessoa_fisica){
		if($this->db->insert('pessoa_fisica', $pessoa_fisica)){
			return true;
		}else{
			return false;
		}
	}
}