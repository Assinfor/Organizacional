<?php
class Email_model extends CI_Model{
	function salvar($email){
		if($this->db->insert('email', $email)){
			return true;
		}else{
			return false;
		}
	}
}