$(document).ready(function(){
	var $countTel = 0;
	var $countEmail = 0;
$("#checkbox-matriz").click(function(){
	if ($("#checkbox-matriz").prop("checked")){
		   $("#matriz-select").css("display", "block");
		}else{
			$("#matriz-value").val(null);
		   $("#matriz-select").css("display", "none");
		}
})

$("#adicionar-telefone").click(function(){
	$countTel++;
    $("<div id='telefone-form-"+$countTel+"' class='control-group'>"+
	    "<div class='controls'>"+
	    	"<input id='ddd' type='text' name='ddd[]' class='ddd-form ddd-margin' maxlength='3' required/>"+
	         "<input type='text' name='telefone[]' class='tel-form tel-margin' maxlength='10' required/>"+
	         "<select name='tipo[]'>"+
	             "<option value=''>Selecione o Tipo de Telefone</option>"+
	             "<option value='comercial'>Comercial</option>"+
	             "<option value='residencial'>Residencial</option>"+
				 "<option value='celular'>Celular</option>"+
			"</select>"+
			"<a onclick='deletarTelefone("+$countTel+");return false;'>Excluir</div>"+
	    "</div>"+
	"</div>").appendTo("#telefones");
})

/*$("#form").submit(function(e){
                e.preventDefault();
            });*/

$("#adicionar-email").click(function(){
	$countEmail++
	$("<div id='email-form-"+$countEmail+"' class='control-group'>"+
            "<div class='controls'>"+
                 "<input type='email' name='email[]' maxlength='90' class='email' required/>"+
                 "<a onclick='deletarEmail("+$countEmail+");return false;'>Excluir</div>"+
            "</div>"+
        "</div>").appendTo("#emails");
})

})

function deletarTelefone(valor){
	$("#telefone-form-"+valor).remove();
}

function deletarEmail(valor){
	$("#email-form-"+valor).remove();
}

function modal_delete(param1)
{
	document.getElementById('delete_link').href = param1;
}

function editar_usuario(id){
	var $cidade = $('#cidade-select').clone();
	var $setor = $('#setor-select').clone();
	var base_url='http://localhost/Organizacional/site/';
	$.ajax({
        url: base_url+"usuario/buscar_usuario/"+id,
        dataType: 'json',
        type: "post",
        success: function(data){
        	$('#modal-body').html('');
        	$('#modal-body').append("<form action='"+base_url+"usuario/salvar_usuario/"+id+"' method='post'>"+
        			"<div class='padded'>"+
			            "<div class='control-group'>"+
			                "<label class='control-label' >Nome:</label>"+
			                "<div class='controls'>"+
			                	"<input type='text' name='pessoa_id' value='"+data[0].id+"' style='display:none'>"+
			                    "<input type='text' name='nome' value='"+data[0].nome+"' maxlength='60' required/>"+
			                "</div>"+
			            "</div>"+
			            "<div class='control-group'>"+
			                "<label class='control-label'>Rua:</label>"+
			                "<div class='controls'>"+
			                     "<input type='text' name='endereco[logradouro]' value='"+data[0].logradouro+"' maxlength='60' required/>"+
			                "</div>"+
			            "</div>"+
			            "<div class='control-group'>"+
			                "<label class='control-label'>Número:</label>"+
			                "<div class='controls'>"+
			                     "<input type='text' name='endereco[numero]' value='"+data[0].numero+"' maxlength='10' required/>"+
			                "</div>"+
			            "</div>"+
			            "<div class='control-group'>"+
			                "<label class='control-label'>Bairro:</label>"+
			                "<div class='controls'>"+
			                     "<input type='text' name='endereco[bairro]' value='"+data[0].bairro+"' maxlength='40' required/>"+
			                "</div>"+
		                "<div class='control-group'>"+ 
                            "<label class='control-label'>Cidade:</label>"+
                            "<div class='controls' id='cidade-mark'>"+
                            "</div>"+
                            "</div>"+
                            "<div class='control-group'>"+
			                "<label class='control-label'>CPF:</label>"+
			                "<div class='controls'>"+
			                     "<input type='text' name='pessoa_fisica[cpf]' class='cpf' value='"+data[0].cpf+"'  required/>"+
			                "</div>"+
			            "</div>"+
			            "<div class='control-group'>"+
			                "<label class='control-label'>RG:</label>"+
			                "<div class='controls'>"+
			                     "<input type='text' name='pessoa_fisica[rg]' value='"+data[0].rg+"' maxlength='12' required/>"+
			                "</div>"+
			            "</div>"+
			            "<div class='control-group'>"+
			                "<label class='control-label'>Carteira de trabalho:</label>"+
			                "<div class='controls'>"+
			                     "<input type='text' name='funcionario[clt]' value='"+data[0].clt+"' maxlength='15' required/>"+
			                "</div>"+
			           "</div>"+
			            "<div class='control-group'>"+
			                "<label class='control-label'>Setor:</label>"+
			                "<div class='controls' id='setor-mark'>"+
			                "</div>"+
			            "</div>"+
			            "<div class='form-actions'>"+
				            "<button type='submit' class='btn btn-blue'>Salvar Alterações</button>"+
				        "</div>"+
				    "</form>");
        	$setor.val(data[0].setor_id);
        	$setor.insertAfter('#setor-mark');
        	$cidade.val(data[0].cidade_id);
        	$cidade.insertAfter('#cidade-mark');
        	$('.cpf').mask("999.999.999-99", {placeholder:"0"});
        }
})
}

function editar_setor(id){
	var base_url='http://localhost/Organizacional/site/';
	$.ajax({
        url: base_url+"setor/buscar_setor/"+id,
        dataType: 'json',
        type: "post",
        success: function(data){
        	$.getScript(base_url+"public/template/js/ekattor.js");
        			$('#modal-body').html('');
        			$('#modal-body').append("<form action='"+base_url+"setor/editar_setor/"+id+"' method='post'>"+
        					"<div class='padded'>"+
        						"<div class='control-group'>"+
			                        "<label class='control-label'>Nome:</label>"+
			                        "<div class='controls'>"+
			                            "<input type='text' name='nome' value='"+data[0].nome+"' maxlength='60' required/>"+
			                        "</div>"+
			                    "</div>"+
			                    "<div class='control-group'>"+
			                        "<label class='control-label'>Descrição:</label>"+
			                        "<div class='controls'>"+
			                            "<div class='box closable-chat-box'>"+ 
			                                "<div class='chat-message-box'>"+
			                                        "<textarea name='descricao' id='ttt' rows='5'>"+data[0].descricao+"</textarea>"+
			                                "</div>"+
			                            "</div>"+
			                        "</div>"+
			                    "</div>"+
			                "<div class='form-actions'>"+
			                    "<button type='submit' class='btn btn-blue'>Salvar Mudanças</button>"+
			                "</div>"+
        				"</form>");
        }
})
}

function editar_empresa(id){
	var $regime = $('#regime-select').clone();
	var base_url='http://localhost/Organizacional/site/';
	$.ajax({
        url: base_url+"empresa/buscar_empresa/"+id,
        dataType: 'json',
        type: "post",
        success: function(data){
        			$('#modal-body').html('');
        			$('#modal-body').append("<form action='"+base_url+"empresa/salvar_empresa/"+id+"' method='post'>"+
        					"<div class='padded'>"+
        						"<div class='control-group'>"+
			                        "<label class='control-label'>Nome:</label>"+
			                        "<div class='controls'>"+
			                            "<input type='text' name='nome' value='"+data[0].nome+"' maxlength='60' required/>"+
			                        "</div>"+
			                    "</div>"+
			                    "<div class='control-group'>"+
	                                "<label class='control-label'>CNPJ:</label>"+
	                                "<div class='controls'>"+
	                                    "<input type='text' name='pessoa_juridica[cnpj]' class='cnpj' value='"+data[0].cnpj+"' required/>"+
	                                "</div>"+
	                            "</div>"+
	                            "<div class='control-group'>"+
	                                "<label class='control-label'>IE:</label>"+
	                                "<div class='controls'>"+
	                                     "<input type='text' name='pessoa_juridica[ie]' class='ie' value='"+data[0].ie+"' required/>"+
	                                "</div>"+
	                            "</div>"+
	                            "<div class='control-group'>"+
	                                "<label class='control-label'>Regime Tributário:</label>"+
	                                "<div class='controls' id='regime-mark'>"+
	                                "</div>"+
	                            "</div>"+
			                "<div class='form-actions'>"+
			                    "<button type='submit' class='btn btn-blue'>Salvar Mudanças</button>"+
			                "</div>"+
        				"</form>");
        			$regime.val(data[0].regime_id);
                	$regime.insertAfter('#regime-mark');
                	$('.cnpj').mask("99.999.999/999-99", {placeholder:"0"});
                	$('.ie').mask("99999999", {placeholder:"0"});
        }
})
}

function modal_gerente(id){
	var base_url='http://localhost/Organizacional/site/';
	$('#modal-body').html('');
	$('#modal-body').append("<form action='"+base_url+"gerente/definir_gerente/"+id+"' method='post'>"+
			"<div class='padded'>"+
			"<div class='control-group'>"+
        	"<label class='control-label'>Selecione o gerente:</label>"+
            "<div class='controls'>"+
            "<select name='gerente[funcionario_id]'>"+
            "<option value='' id='mark-select'>Selecione um gerente</option>"+
			"</select>"+
					"</div>"+
    			"</div>"+
    			"</div>"+
    			"<div class='form-actions'>"+
                "<button type='submit' class='btn btn-blue'>Salvar Gerente</button>"+
            "</div>"+
    			"</form>");
	$.ajax({
        url: base_url+"gerente/buscar_gerentes/"+id,
        dataType: 'json',
        type: "post",
        success: function(data){
			$.each(data,function(index, element){
				$('#mark-select').after(
						"<option value='"+element.id+"'>"+element.nome+"</option>"
						);
					})
		        	}
		        })
}

function editar_regime(id){
		var base_url='http://localhost/Organizacional/site/';
		$.ajax({
	        url: base_url+"regime_tributario/buscar_regime/"+id,
	        dataType: 'json',
	        type: "post",
	        success: function(data){
	        			$('#modal-body').html('');
	        			$('#modal-body').append("<form action='"+base_url+"regime_tributario/salvar_regime/"+id+"' method='post'>"+
	        					"<div class='padded'>"+
	        						"<div class='control-group'>"+
				                        "<label class='control-label'>Nome:</label>"+
				                        "<div class='controls'>"+
				                            "<input type='text' name='regime[nome]' maxlength='40' value='"+data[0].nome+"' required/>"+
				                        "</div>"+
				                    "</div>"+
				                    "<div class='control-group'>"+
				                        "<label class='control-label'>Descrição:</label>"+
				                        "<div class='controls'>"+
				                            "<div class='box closable-chat-box'>"+ 
				                                "<div class='chat-message-box'>"+
				                                        "<textarea name='regime[descricao]' id='ttt' rows='5'>"+data[0].descricao+"</textarea>"+
				                                "</div>"+
				                            "</div>"+
				                        "</div>"+
				                    "</div>"+
				                "<div class='form-actions'>"+
				                    "<button type='submit' class='btn btn-blue'>Salvar Mudanças</button>"+
				                "</div>"+
	        				"</form>");
	        }
	})
}