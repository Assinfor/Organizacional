<?php
class Usuario_model extends CI_Model{
	function listar($id=null){
		$this->db
			->select('p.*, u.id as usuario_id, u.status, e.logradouro, e.bairro, e.numero, e.cidade_id, c.uf, c.nome as cidade, s.id as setor_id, s.nome as setor, pf.*, f.*')
			->from('pessoa p')
			->join('usuario u', 'u.pessoa_id = p.id')
			->join('endereco e', 'p.id=e.pessoa_id')
			->join('cidade c', 'c.id=e.cidade_id')
			->join('pessoa_fisica pf','pf.pessoa_id=p.id')
			->join('funcionario f','f.pessoa_fisica_id=p.id')
			->join('setor s', 'f.setor_id=s.id');
			if($id!=null){
				$this->db->where('u.id =', $id);
			}
			$this->db->where('u.status =','ativo');
		$query = $this->db->get_where();
		return $query->result();
	}
	function salvar_usuario($usuario){
		if($this->db->insert('usuario', $usuario)){
			return true;
		}else{
			return false;
		}
	}
	function deletar_usuario($id){
		if($this->db->set('status', 'inativo')
                    ->where('id =', $id)
                    ->update('usuario')){
			return true;
		}else{
			return false;
		}
	}
}