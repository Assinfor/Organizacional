<?php
class Tarefa_model extends CI_Model{
	function listar(){
		$this->db
		->select('*')
		->from('tarefa');
		$query = $this->db->get_where();
		return $query->result();
	}
	
	function salvar($tarefa){
		if($this->db->insert('tarefa', $tarefa)){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
	
	function salvar_mensal($mensal){
		$this->db->insert('mensal', $mensal);
	}
	
	function salvar_quinzenal($quinzenal, $dia_quinzenal, $dia_quinzenal2){
		$this->db->insert('quinzenal', $quinzenal);
		$this->db->insert('dia_quinzenal', $dia_quinzenal);
		$this->db->insert('dia_quinzenal', $dia_quinzenal2);
	}
	
	function salvar_semestral($semestral, $mes_semestral, $mes_semestral2){
		$this->db->insert('semestral', $semestral);
		$this->db->insert('mes_semestral', $mes_semestral);
		$this->db->insert('mes_semestral', $mes_semestral2);
	}
	function salvar_anual($anual){
		$this->db->insert('anual', $anual);
	}
}