<div class="main-content">
<div class="content-fluid padding">
<div class="box">
	<div class="box-header">
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					Empresas
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					Adicionar empresa
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
                            <span>Total <?php echo count($empresas);?> empresas</span>
                          </a>
                        </div>
                    </div>
                </center>
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div>Nome</div></th>
                    		<th><div>CNPJ</div></th>
                    		<th><div>IE</div></th>
                    		<th><div>Regime Tributário</div></th>
                    		<th><div>Opções</div></th>
						</tr>
					</thead>
					<tbody>
                    	<?php $count = 1;foreach($empresas as $empresa):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $empresa->nome;?></td>
							<td><?php echo $empresa->cnpj;?></td>
							<td><?php echo $empresa->ie;?></td>
							<td><?php echo $empresa->regime; ?></td>
							<td align="center">
                            	<a data-toggle="modal" href="#modal-form" onclick="editar_empresa(<?php echo $empresa->id; ?>)" class="btn btn-gray btn-small">
                                		<i class="icon-wrench"></i>
                                </a>
                            	<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>empresa/deletar_empresa/<?php echo $empresa->id;?>')" class="btn btn-red btn-small">
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
                	<?php echo form_open('empresa/salvar_empresa' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label" >Nome:</label>
                                <div class="controls">
                                	<input type="text" style="display:none">
                                    <input type="text" name="nome" maxlength='60' required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">CNPJ:</label>
                                <div class="controls">
                                    <input type="text" name="pessoa_juridica[cnpj]" class="cnpj" placeholder='00.000.000/000-00' required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">IE:</label>
                                <div class="controls">
                                     <input type="text" name="pessoa_juridica[ie]" class="ie" placeholder='00000000' required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Regime Tributário:</label>
                                <div class="controls">
                                     <select name='pessoa_juridica[regime_tributario_id]' id='regime-select' required/>
                                     <option value=''>Selecione um Regime</option>
                                     <?php foreach($regimes as $regime):?>
									  <option value='<?php echo $regime->id ?>'><?php echo $regime->nome ?></option>
									 <?php endforeach;?>
									</select>
                                </div>
                            </div>
                  			<div class="control-group">
                                <div class="controls">
                                     <input type="checkbox" id="checkbox-matriz" name="filial"><p>Filial</p>
                                </div>
                            </div>
                            <div class="control-group" id='matriz-select'>
                                <label class="control-label">Matriz:</label>
                                <div class="controls">
                                     <select id="matriz-value" name='pessoa_juridica[matriz_id]'>
                                     <option value="">Selecione uma Empresa</option>
                                     <?php foreach($empresas as $empresa):?>
									  <option value='<?php echo $empresa->id ?>'><?php echo $empresa->nome ?></option>
									 <?php endforeach;?>
									</select>
                                </div>
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
</div>