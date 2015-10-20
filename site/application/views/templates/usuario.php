
<div class="main-content">
<div class="content-fluid padding">
<div class="box">
	<div class="box-header">
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li id="ver" class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					Usuários
                    	</a></li>
			<li id="editar">
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					Adicionar usuário
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
	</div>
	<div class="box-content padded">
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active" id="list">
				<center>
				<div class="action-nav-normal">
                        <div class=" action-nav-button" style="width:300px;">
                          <a href="#" title="Users">
                            <img src="<?php echo base_url();?>public/template/images/icons/user.png" />
                            <span>Total <?php echo count($usuarios);?> usuários</span>
                          </a>
                        </div>
                    </div>
                </center>
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div>Nome</div></th>
                    		<th><div>Setor</div></th>
                    		<th><div>Rua</div></th>
                    		<th><div>Número</div></th>
                    		<th><div>Cidade</div></th>
                    		<th><div>Opções</div></th>
						</tr>
					</thead>
					<tbody>
                    	<?php $count = 1;foreach($usuarios as $usuario):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $usuario->nome;?></td>
							<td><?php echo $usuario->setor;?></td>
							<td><?php echo $usuario->logradouro;?></td>
							<td><?php echo $usuario->numero;?></td>
							<td><?php echo $usuario->cidade;?></td>
							<td align="center">
                            	<a data-toggle="modal" href="#modal-form" onclick="editar_usuario(<?php echo $usuario->usuario_id; ?>)" class="btn btn-gray btn-small">
                                		<i class="icon-wrench"></i>
                                </a>
                            	<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>usuario/deletar_usuario/<?php echo $usuario->usuario_id;?>')" class="btn btn-red btn-small">
                                		<i class="icon-trash"></i> 
                                </a>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            <!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open('usuario/salvar_usuario' , array('id' => 'form', 'class' => 'form-horizontal validatable','target'=>'_top'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label" >Nome:</label>
                                <div class="controls">
                                	<input type="text" style="display:none">
                                    <input type="text" name="nome" maxlength="60" required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Rua:</label>
                                <div class="controls">
                                     <input type="text" name="endereco[logradouro]" maxlength="60" required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Número:</label>
                                <div class="controls">
                                     <input type="text" name="endereco[numero]" maxlength='10' required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Bairro:</label>
                                <div class="controls">
                                     <input type="text" name="endereco[bairro]" maxlength=40' required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Cidade:</label>
                                <div class="controls">
                                     <select name='endereco[cidade_id]' id="cidade-select">
                                     <option value=''>Selecione uma Cidade</option>
                                     <?php foreach($cidades as $cidade):?>
									  <option value='<?php echo $cidade->id ?>'><?php echo $cidade->nome ?></option>
									 <?php endforeach;?>
									</select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">CPF:</label>
                                <div class="controls">
                                     <input type="text" name="pessoa_fisica[cpf]" class="cpf"  placeholder="000.000.000-00" required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">RG:</label>
                                <div class="controls">
                                     <input type="text" name="pessoa_fisica[rg]" maxlength='12' required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Carteira de trabalho:</label>
                                <div class="controls">
                                     <input type="text" name="funcionario[clt]" maxlength='15' required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Setor:</label>
                                <div class="controls">
                                     <select name='funcionario[setor_id]' id='setor-select'>
                                     <option value=''>Selecione um Setor</option>
                                     <?php foreach($setores as $setor):?>
									  <option value='<?php echo $setor->id ?>'><?php echo $setor->nome ?></option>
									 <?php endforeach;?>
									</select>
                                </div>
                            </div>
                            <label class="control-label">Telefone:</label>
                            <div id="telefones">
                            <div id="telefone-form-0" class="control-group">
                                <div class="controls">
                                	<input id="ddd" type="text" name="ddd[]" class="ddd-form" maxlength='3' required/>
                                     <input type="text" name="telefone[]" class="tel-form" maxlength='10' required/>
                                     <select name='tipo[]' required/>
	                                     <option value=''>Selecione o Tipo de Telefone</option>
	                                     <option value='comercial'>Comercial</option>
	                                     <option value='residencial'>Residencial</option>
										 <option value='celular'>Celular</option>
									</select>
                                </div>
                            </div>
                            </div>
                            <a id="adicionar-telefone" onclick="return false;">Adicionar outro telefone</a>
                            <br/>
                            <label class="control-label">E-mail:</label>
                            <div id="emails">
                            <div id="email-form-0" class="control-group">
                                <div class="controls">
                                     <input type="email" name="email[]" maxlength='90' class='email' required/>
                                </div>
                            </div>
                            </div>
                            <a id="adicionar-email" onclick="return false;">Adicionar outro e-mail</a>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-blue">Adicionar Novo Usuário</button>
                        </div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
		</div>
	</div>
</div
</div>
</div>
<?php 
if(isset($_SESSION['editar'])){
	?>
	<script>
		$("#ver").removeClass('active');
		$("#list").removeClass('active');
		$("#editar").addClass('active');
		$("#add").addClass('active');
		$('html, body').animate({scrollTop: 0},'fast');
	</script>
	<?php 
	unset($_SESSION['editar']);
}
?>