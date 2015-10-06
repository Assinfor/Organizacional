<?php
class Login_model extends CI_Model{
	function autenticar($email, $senha){
		$query=$this->db
				->select('*, count(admin.pessoa_id) as admin')
				->from('pessoa')
				->join('usuario', 'usuario.pessoa_id = pessoa.id', 'left')
				->join('email', 'pessoa.id = email.pessoa_id','left')
				->join('telefone', 'pessoa.id=telefone.pessoa_id', 'left')
				->join('endereco', 'pessoa.id=endereco.pessoa_id', 'left')
				->join('admin', 'pessoa.id=admin.pessoa_id', 'left')
				->where('usuario.senha =',$senha)
				->where('email.email =',$email)
				->where('usuario.status =','ativo');;
		$query = $this->db->get_where();
		return $query;
	}
}