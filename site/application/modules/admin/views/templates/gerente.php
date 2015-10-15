<div class="main-content">
<div class="content-fluid padding">
<div class="box">
	<div class="box-header">
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					Gerentes Ativos
                    	</a></li>
              <li>
            	<a href="#list-inativos" data-toggle="tab"><i class="icon-align-justify"></i> 
					Gerentes Passados
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
                    		<th><div>Setor</div></th>
                    		<th><div>Nome</div></th>
                    		<th><div>Data de Entrada</div></th>
                    		<th><div>Opções</div></th>
						</tr>
					</thead>
					<tbody>
                    	<?php $count = 1;foreach($gerentes_ativos as $gerente):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $gerente->setor;?></td>
							<td><?php if(empty($gerente->pessoa))echo "Sem gerente"; else echo $gerente->pessoa;?></td>
							<td><?php echo $gerente->data_inicio;?></td>
							<td>
							<?php 
							if(empty($gerente->pessoa)){
								?>
								<a data-toggle='modal' href='#modal-form' class='btn btn-default' onclick="modal_gerente('<?php echo $gerente->id;?>')">Adicionar gerente</a>
								<?php 
							}
							else {
								?>
								<a class='btn btn-danger' data-toggle='modal' href='#modal-delete' onclick="modal_delete('<?php echo base_url();?>admin/gerente/retirar_gerente/<?php echo $gerente->pessoa_id;?>')">Retirar gerente</a><br/>
								<?php 
							}
								?>
							</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
			<!----TABLE LISTING ENDS--->
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box" id="list-inativos">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
					<center>
					<div class="action-nav-normal">
	                        <div class=" action-nav-button" style="width:300px;">
	                          <a href="#" title="Users">
	                            <img src="<?php echo base_url();?>public/template/images/icons/user.png" />
	                            <span>Total <?php echo count($gerentes_inativos);?> gerentes</span>
	                          </a>
	                        </div>
	                    </div>
	                </center>
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div>Nome</div></th>
                    		<th><div>Setor</div></th>
                    		<th><div>Data de Entrada</div></th>
                    		<th><div>Data de Saída</div></th>
						</tr>
					</thead>
					<tbody>
                    	<?php $count = 1;foreach($gerentes_inativos as $gerente):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $gerente->pessoa;?></td>
							<td><?php echo $gerente->setor;?></td>
							<td><?php echo $gerente->data_inicio;?></td>
							<td><?php echo $gerente->data_final;?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
			<!----TABLE LISTING ENDS--->
		</div>
	</div>
</div
</div>
</div>
</div>