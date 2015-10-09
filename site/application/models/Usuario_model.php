<?php
class Usuario_model extends CI_Model{
	function listar(){
		$this->db
			->select('p.*, u.id as usuario_id, u.status, e.*, c.uf, c.nome as cidade')
			->from('pessoa p')
			->join('usuario u', 'u.pessoa_id = p.id', 'left')
			->join('endereco e', 'p.id=e.pessoa_id', 'left')
			->join('cidade c', 'c.id=e.cidade_id', 'left')
			->where('u.status =','ativo');
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