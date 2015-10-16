<div class="main-content">
<div class="content-fluid padding">
<div class="box">
	<div class="box-header">
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					Regime Tributário
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					Adicionar Regime Tributário
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
                            <span>Total <?php echo count($regimes);?> regimes tributários</span>
                          </a>
                        </div>
                    </div>
                </center>
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div>Nome</div></th>
                    		<th><div>Descrição</div></th>
                    		<th><div>Opções</div></th>
						</tr>
					</thead>
					<tbody>
                    	<?php $count = 1;foreach($regimes as $regime):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $regime->nome;?></td>
							<td><?php echo $regime->descricao;?></td>
							<td align="center">
								<a data-toggle="modal" href="#modal-form" onclick="editar_regime(<?php echo $regime->id; ?>)" class="btn btn-gray btn-small">
                                		<i class="icon-wrench"></i>
                                </a>
                            	<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>regime_tributario/deletar_regime/<?php echo $regime->id;?>')" class="btn btn-red btn-small">
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
                	<?php echo form_open('regime_tributario/salvar_regime' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label">Nome:</label>
                                <div class="controls">
                                    <input type="text" name="regime[nome]" maxlength='40' required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Descrição:</label>
                                <div class="controls">
                                    <div class="box closable-chat-box"> 
                                        <div class="chat-message-box">
                                                <textarea name="regime[descricao]" id="ttt" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-blue">Adicionar Novo Regime Tributário</button>
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