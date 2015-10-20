<div class="main-content">
<div class="content-fluid padding">
<div class="box">
	<div class="box-header">
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					Tarefas
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					Adicionar tarefa
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
                            <span>Total <?php echo count($tarefas);?> tarefas</span>
                          </a>
                        </div>
                    </div>
                </center>
                <div  id="table-responsive">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div>Título</div></th>
                    		<th><div>Descrição</div></th>
                    		<th><div>Tipo</div></th>
                    		<th><div>Opções</div></th>
						</tr>
					</thead>
					<tbody>
                    	<?php $count = 1;foreach($tarefas as $tarefa):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $tarefa->titulo;?></td>
							<td><?php echo $tarefa->descricao;?></td>
							<td><?php echo $tarefa->tipo;?></td>
							<td align="center">
                            	<a data-toggle="modal" href="#modal-form" onclick="editar_setor(<?php echo $tarefa->id; ?>)" class="btn btn-gray btn-small">
                                		<i class="icon-wrench"></i>
                                </a>
                            	<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>setor/deletar_setor/<?php echo $tarefa->id;?>')" class="btn btn-red btn-small">
                                		<i class="icon-trash"></i> 
                                </a>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                </div>
			</div>
            <!----TABLE LISTING ENDS--->
            <!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open('tarefa/salvar' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label">Título:</label>
                                <div class="controls">
                                    <input type="text" name="tarefa[titulo]" maxlength='60' required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Descrição:</label>
                                <div class="controls">
                                    <textarea name="tarefa[descricao]" id="ttt" rows="5" cols="10"></textarea>
                                </div>
                            </div>
                            <div class="control-group" id="tipo-tarefa">
                                <label class="control-label">Tipo:</label>
                                <div class="controls">
                                     <select name='tarefa[tipo]' id="tarefa-select">
                                     <option value=''>Selecione um Tipo</option>
									  <option value='global'>Global</option>
									  <option value='pessoal'>Pessoal</option>
									</select>
                                </div>
                            </div>
                            <div class="control-group" id="regime-tarefa">
                                <label class="control-label">Regime Tributário:</label>
                                <div class="controls">
                                     <select name='regime_tributario_id'>
                                     <option value=''>Selecione um Regime Tributário</option>
                                     <?php foreach($regimes as $regime):?>
									  <option value='<?php echo $regime->id ?>'><?php echo $regime->nome ?></option>
									 <?php endforeach;?>
									</select>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls" id="tarefa-radio">
                                     <input type="radio" name="periodo" id="radio-diaria" value="diaria">Diaria
                                     <input type="radio" name="periodo" id="radio-mensal" value="mensal">Mensal
                                     <input type="radio" name="periodo" id="radio-quinzenal" value="quinzenal">Quinzenal
                                     <input type="radio" name="periodo" id="radio-semestral" value="semestral">Semestral
                                     <input type="radio" name="periodo" id="radio-anual" value="anual">Anual
                                </div>
                            </div>
                            <div class="control-tarefas" id="mes-tarefa">
                                <label class="control-label">Mês:</label>
                                <div class="controls">
                                     <select name='mes-tarefa'>
                                     <option value=''>Selecione o mês</option>
                                     <?php foreach($meses as $mes):?>
									  <option value='<?php echo $mes->id ?>'><?php echo $mes->mes ?></option>
									 <?php endforeach;?>
									</select>
                                </div>
                            </div>
                            <div class="control-tarefas" id="dia-tarefa">
                                <label class="control-label">Dia:</label>
                                <div class="controls">
                                     <select name='dia-tarefa'>
                                     <option value=''>Selecione o dia</option>
                                     <?php foreach($dias as $dia):?>
									  <option value='<?php echo $dia->id ?>'><?php echo $dia->dia ?></option>
									 <?php endforeach;?>
									</select>
                                </div>
                            </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-blue">Adicionar Nova Tarefa</button>
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