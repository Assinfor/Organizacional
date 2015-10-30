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
	function buscar_empresa($id){
		$this->db
		->select('p.*, pj.*, rt.nome as regime, rt.id as regime_id, e.*, c.uf, c.nome as cidade')
		->from('pessoa_juridica pj')
		->join('pessoa p', 'p.id=pj.pessoa_id', 'left')
		->join('regime_tributario rt', 'rt.id=pj.regime_tributario_id', 'left')
		->join('endereco e', 'p.id=e.pessoa_id', 'left')
		->join('cidade c', 'c.id=e.cidade_id','left')
		->where('p.id =', $id);
		$query = $this->db->get_where();
		return $query->result();
	}
	function salvar($pessoa_juridica, $id=null){
		if($id==null){
			if($this->db->insert('pessoa_juridica', $pessoa_juridica)){
				return true;
			}else{
				return false;
			}
		}else{
			if($this->db->where('pessoa_id=',$id)
					->update('pessoa_juridica', $pessoa_juridica)){
						return true;
			}else{
				return false;
			}
		}
	}
}