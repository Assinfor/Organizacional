<?php
class Email_model extends CI_Model{
	function salvar($email){
		if($this->db->insert('email', $email)){
			return true;
		}else{
			return false;
		}
	}
	function listar(){
		$this->db
		->select('*')
		->from('email');
		$query = $this->db->get_where();
		return $query->result();
	}
}