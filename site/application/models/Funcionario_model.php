<?php
class Funcionario_model extends CI_Model{
	function salvar($funcionario){
		if($this->db->insert('funcionario', $funcionario)){
			return true;
		}else{
			return false;
		}
	}
}