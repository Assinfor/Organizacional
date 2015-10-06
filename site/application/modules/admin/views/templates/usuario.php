<div class="main-content">
<div class="content-fluid padded">
<div class="box">
	<div class="box-header">
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					Usu�rios
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					Adicionar usu�rio
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div>Nome</div></th>
                    		<th><div>Rua</div></th>
                    		<th><div>N�mero</div></th>
                    		<th><div>Op��es</div></th>
						</tr>
					</thead>
					<tbody>
                    	<?php $count = 1;foreach($usuarios as $usuario):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $usuario->nome;?></td>
							<td><?php echo $usuario->logradouro;?></td>
							<td><?php echo $usuario->numero;?></td>
							<td align="center">
                            	<a href="<?php echo base_url()?>admin/usuario/editar_usuario/<?php echo $usuario->id ?>" data-toggle="modal" href="#modal-form" class="btn btn-gray btn-small">
                                		<i class="icon-wrench"></i>
                                </a>
                            	<a href="<?php echo base_url()?>admin/usuario/deletar_usuario/<?php echo $usuario->id ?>" data-toggle="modal" href="#modal-delete" class="btn btn-red btn-small">
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
                	<?php echo form_open('admin/noticia/salvar_noticia' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label">Nome:</label>
                                <div class="controls">
                                    <input type="text" name="nome" required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Rua:</label>
                                <div class="controls">
                                     <input type="text" name="nome" required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Numero:</label>
                                <div class="controls">
                                     <input type="text" name="numero" required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Bairro:</label>
                                <div class="controls">
                                     <input type="text" name="bairro" required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Cidade:</label>
                                <div class="controls">
                                     <select name='cidade'>
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
                                     <input type="text" name="cpf" required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">RG:</label>
                                <div class="controls">
                                     <input type="text" name="rg" required/>
                                </div>
                            </div>
                            <label class="control-label">Telefone:</label>
                            <div id="telefone-form" class="control-group">
                                <div class="controls">
                                	<input id="ddd" type="text" name="ddd" class="ddd-form" required/>
                                     <input type="text" name="telefone" class="tel-form" required/>
                                     <select name='cidade'>
	                                     <option value=''>Selecione o Tipo de Telefone</option>
	                                     <option value='comercial'>Comercial</option>
	                                     <option value='residencial'>Residencial</option>
										 <option value='celular'>Celular</option>
									</select>
                                </div>
                            </div>
                            <a onclick="cloneTel();return false;">Adicionar outro telefone</a>
                            <div class="control-group">
                                <label class="control-label">E-mail:</label>
                                <div class="controls">
                                     <input type="email" name="email" required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-blue">Adicionar Novo Usu�rio</button>
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