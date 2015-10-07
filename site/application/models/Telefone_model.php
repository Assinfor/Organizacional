<?php
class Telefone_model extends CI_Model{
	function salvar($telefone){
		if($this->db->insert('telefone', $telefone)){
			return true;
		}else{
			return false;
		}
	}
}