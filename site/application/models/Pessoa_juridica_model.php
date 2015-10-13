<?php
class Pessoa_juridica_model extends CI_Model{
	function listar(){
		$this->db
			->select('p.*, pj.*, rt.nome as regime')
			->from('pessoa_juridica pj')
			->join('pessoa p', 'pj.pessoa_id=p.id')
			->join('regime_tributario rt', 'rt.id=pj.regime_tributario_id');
		$query = $this->db->get_where();
		return $query->result();
	}
	function salvar($pessoa_juridica){
		if($this->db->insert('pessoa_juridica', $pessoa_juridica)){
			return true;
		}else{
			return false;
		}
	}
}