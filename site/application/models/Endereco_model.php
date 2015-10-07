<?php
class Endereco_model extends CI_Model{
	function salvar($endereco){
		if($this->db->insert('endereco', $endereco)){
			return true;
		}else{
			return false;
		}
	}
}