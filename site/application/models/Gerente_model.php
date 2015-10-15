<?php
class Gerente_model extends CI_Model{
	function listar($param){
		if($param=="inativo"){
			$this->db
				->select('s.nome as setor, pf.pessoa_id, p.nome as pessoa')
				->select("DATE_FORMAT(g.data_inicio, '%d/%m/%Y') as data_inicio", FALSE)
				->select("DATE_FORMAT(g.data_final, '%d/%m/%Y') as data_final", FALSE)
				->from('gerente g')
				->join('setor s', 'g.setor_id=s.id')
				->join('funcionario f', 'f.pessoa_fisica_id=g.funcionario_id')
				->join('pessoa_fisica pf', 'pf.pessoa_id=f.pessoa_fisica_id')
				->join('pessoa p', 'pf.pessoa_id=p.id')
				->where('g.status =', $param);
			$query = $this->db->get_where();
			return $query->result();
		}else{
			$query = $this->db->query("SELECT s.id, s.nome as setor, pf.pessoa_id, p.nome as pessoa,
										DATE_FORMAT(g.data_inicio, '%d/%m/%Y') as data_inicio,
										DATE_FORMAT(g.data_final, '%d/%m/%Y') as data_final FROM setor s
										LEFT JOIN gerente g ON g.setor_id=s.id AND g.status='ativo'
										LEFT JOIN funcionario f ON f.pessoa_fisica_id=g.funcionario_id
										LEFT JOIN pessoa_fisica pf ON pf.pessoa_id=f.pessoa_fisica_id
										LEFT JOIN pessoa p ON p.id=pf.pessoa_id");
			return $query->result();
		}
	}
	
	function buscar_gerentes($id){
		$this->db
			->select('p.id, p.nome')
			->from('pessoa p')
			->join('funcionario f', 'f.pessoa_fisica_id=p.id')
			->join('setor s', 'f.setor_id=s.id')
			->where('s.id', $id);
			$query=$this->db->get_where();
		return $query->result();
	}
	function retirar($pessoa_id, $gerente){
		if($this->db->where('funcionario_id', $pessoa_id)
				->where('status', 'ativo')
				->update('gerente', $gerente)){
					return true;
		}else{
			return false;
		}
	}
	function definir($gerente){
		if($this->db->insert('gerente', $gerente)){
			return true;
		}else{
			return false;
		}
	}
}