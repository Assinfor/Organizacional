emailTotal=0;
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

$("#tarefa-select").change(function(){
	if($(this).val()=="global"){
		$("#regime-tarefa").css("display", "block");
	}else{
		$("#regime-tarefa").css("display", "none");
	}
})

$("#tarefa-radio").change(function(){
	if($('#radio-mensal').is(':checked')){
		$(".control-tarefas").css("display", "none");
		$("#dia-tarefa").css("display", "block");
	}else if($('#radio-quinzenal').is(':checked')){
		$(".control-tarefas").css("display", "none");
		$("#dia-tarefa").css("display", "block");
	}else if($('#radio-semestral').is(':checked')){
		$(".control-tarefas").css("display", "none");
		$("#mes-tarefa").css("display", "block");
		$("#dia-tarefa").css("display", "block");
	}else if($('#radio-anual').is(':checked')){
		$(".control-tarefas").css("display", "none");
		$("#mes-tarefa").css("display", "block");
		$("#dia-tarefa").css("display", "block");
	}else{
		$(".control-tarefas").css("display", "none");
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

function deletarTelefoneEdit(valor, ddd, numero){
	$("#ddd-"+valor).hide();
	$("#telefone-"+valor).hide();
	$("#excluir-link-"+valor).hide();
	$("<p id='mensagem-"+valor+"'>Numero "+ddd+"-"+numero+" será deletado</p><a id='restaurar-link-"+valor+"' onclick='desfazerDeletarTel("+valor+");return false;'>Desfazer</a>").insertAfter("#telefone-"+valor);
	$("#id-tel-"+valor).attr('name','tel-del[]');
}

function deletarEmailEdit(valor, email){
	emailTotal--;
	console.log(emailTotal);
	if(emailTotal==1){
			$(".link-excluir-email").hide();
		}
	if(email!=null){
		$("#email-"+valor).hide();
		$("#excluir-link-email-"+valor).remove();
		$("<p id='mensagem-email-"+valor+"'>E-mail "+email+" será deletado</p><a id='restaurar-link-email-"+valor+"' onclick='desfazerDeletarEmail("+valor+","+email+");return false;'>Desfazer</a>").insertAfter("#email-"+valor);
		$("#id-email-"+valor).attr('name','email-del[]');
	}else{
		$("#email-"+valor).remove();
		$("#excluir-link-email-"+valor).remove();
	}
}

function desfazerDeletarEmail(valor, email){
	emailTotal++;
	$(".link-excluir-email").show();
	$("#email-"+valor).show();
	$("<a id='excluir-link-email-"+valor+"' class='link-excluir-email' onclick='deletarEmailEdit("+valor+","+email+");return false;'>Excluir</a>").insertAfter('#email-'+valor);
	$("#mensagem-email-"+valor).remove();
	$("#restaurar-link-email-"+valor).remove();
}

function desfazerDeletarTel(valor){
	$("#ddd-"+valor).show();
	$("#telefone-"+valor).show();
	$("#excluir-link-"+valor).show();
	$("#mensagem-"+valor).remove();
	$("#restaurar-link-"+valor).remove();
	$("#id-tel-"+valor).attr('name','id-tel[]');
}

function adicionarEdit(countTel){
    $("<div id='telefone-mark-"+(countTel+1)+"'>"+
    		"<div id='telefone-form-"+countTel+"' class='control-group'>"+
	    "<div class='controls'>"+
	    	"<input id='ddd' type='text' name='ddd[]' class='ddd-form ddd-margin' maxlength='3' required/>"+
	         "<input type='text' name='telefone[]' class='tel-form tel-margin' maxlength='10' required/>"+
	         "<select name='tipo[]'>"+
	             "<option value=''>Selecione o Tipo de Telefone</option>"+
	             "<option value='comercial'>Comercial</option>"+
	             "<option value='residencial'>Residencial</option>"+
				 "<option value='celular'>Celular</option>"+
			"</select>"+
			"<a onclick='deletarTelefone("+countTel+");return false;'>Excluir</div>"+
	    "</div>"+
	"</div>"+
	"</div>").insertAfter('#telefone-mark-'+countTel);
    countTel++;
    $("#add-telefone").remove();
    $("#adicionar-telefone").remove();
    $("<a id='adicionar-telefone' onclick='adicionarEdit("+countTel+");return false;'>Adicionar outro telefone</a>").insertAfter('#telefone-mark-'+countTel)
}

function adicionarEmailEdit(counterEmail){
	emailTotal++;
	$(".link-excluir-email").show();
    $("<div id='email-mark-"+(counterEmail+1)+"'>"+
    		"<div class='controls'>"+
            "<input id='email-"+counterEmail+"' type='email' name='email[]' maxlength='90' class='email' required/>"+
            "<a id='excluir-link-email-"+counterEmail+"' class='link-excluir-email' onclick='deletarEmailEdit("+counterEmail+");return false;'>Excluir</a>"+
            "</div>"+
 		    "</div>"+
	"</div>").insertAfter('#email-mark-'+counterEmail);
    counterEmail++;
    $("#add-email").remove();
    $("#adicionar-email").remove();
    $("<a id='adicionar-email' onclick='adicionarEmailEdit("+counterEmail+");return false;'>Adicionar outro e-mail</a>").insertAfter('#email-mark-'+counterEmail)
}

function editar_usuario(id){
	emailTotal=0;
	var counterTel=0;
	var counterEmail=0;
	var $cidade = $('#cidade-select').clone();
	var $setor = $('#setor-select').clone();
	var base_url='http://localhost/Organizacional/site/';
	$.ajax({
        url: base_url+"usuario/buscar_usuario/"+id,
        dataType: 'json',
        type: "post",
        success: function(data){
        	var pessoa=data[0].id;
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
			            "<div class='control-group' id='telefone-label-mark'>"+
			                "<label class='control-label'>Setor:</label>"+
			                "<div class='controls' id='setor-mark'>"+
			                "</div>"+
			            "</div>"+
			            "</div>"+
				        "<div id=telefone-edit>"+
				        "</div>"+
				        "<div id='email-edit'>"+
				        "</div>"+
			            "<div class='form-actions'>"+
				            "<button type='submit' class='btn btn-blue'>Salvar Alterações</button>"+
				    "</form>");
		        	 $.ajax({
		                 url: base_url+"usuario/buscar_telefones/"+pessoa,
		                 dataType: 'json',
		                 type: "post",
		                 success: function(data){
		                	 $("<label id='telefone-mark-0'>Telefones:</label>").appendTo('#telefone-edit');
		                 	$.each(data,function(index, element){
		                 		$("<div id='telefone-mark-"+(counterTel+1)+"'>"+
		                 				"<div id='telefone-form-"+counterTel+"' class='control-group'>"+
		                 			    "<div class='controls'>"+
		                 			    "<input id='id-tel-"+counterTel+"' name='id-tel[]' type='hidden' value='"+element.id+"'>"+
		                 		    	"<input id='ddd-"+counterTel+"' type='text' name='ddd[]' class='ddd-form ddd-margin' value='"+element.ddd+"' maxlength='3' disabled/>"+
		                 		         "<input id='telefone-"+counterTel+"'type='text' name='telefone[]' class='tel-form tel-margin' maxlength='10' value='"+element.numero+"' disabled/>"+
		                 				"<a id='excluir-link-"+counterTel+"' onclick='deletarTelefoneEdit("+counterTel+","+element.ddd+","+element.numero+");return false;'>Excluir</a>"+
		                 		    "</div>"+
		                 		"</div>").insertAfter('#telefone-mark-'+counterTel);
		                 		counterTel++;
		                 		
		                 	});
		                 	$("<a id='add-telefone' onclick='adicionarEdit("+counterTel+");return false;'>Adicionar outro telefone</a>").insertAfter('#telefone-mark-'+counterTel);
		                 	}
		             });
		        	 $.ajax({
		                 url: base_url+"usuario/buscar_emails/"+pessoa,
		                 dataType: 'json',
		                 type: "post",
		                 success: function(data){
		                	 $("<label id='email-mark-0'>E-mails:</label>").insertAfter('#telefone-label-mark');
		                	 $.each(data,function(index, element){
		                		 $("<div id='email-mark-"+(counterEmail+1)+"'>"+
		                				"<div class='controls'>"+
		                				"<input id='id-email-"+counterEmail+"' name='id-email[]' type='hidden' value='"+element.id+"'>"+
		                                "<input id='email-"+counterEmail+"' type='email' name='email[]' maxlength='90' class='email' value='"+element.email+"' disabled/>"+
		                                "<a id='excluir-link-email-"+counterEmail+"' class='link-excluir-email' onclick='deletarEmailEdit("+counterEmail+","+element.id+");return false;'>Excluir</a>"+
		                                "</div>"+
			                 		    "</div>"+
			                 		"</div>").insertAfter('#email-mark-'+counterEmail);
			                 		counterEmail++;
			                 		emailTotal++;
		                	 });
		                	 if(counterEmail==1){
		                 			$('.link-excluir-email').hide();
		                 		}
		                	 $("<a id='add-email' onclick='adicionarEmailEdit("+counterEmail+");return false;'>Adicionar outro e-mail</a>").insertAfter('#email-mark-'+counterEmail);
		                 }
		        	 });
        	$setor.val(data[0].setor_id);
        	$setor.insertAfter('#setor-mark');
        	$cidade.val(data[0].cidade_id);
        	$cidade.insertAfter('#cidade-mark');
        	$('.cpf').mask("999.999.999-99", {placeholder:"0"});
        }
});
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
			                            "<textarea name='descricao' id='ttt' rows='5'>"+data[0].descricao+"</textarea>"+
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
				                            "<textarea name='regime[descricao]' id='ttt' rows='5'>"+data[0].descricao+"</textarea>"+
				                        "</div>"+
				                    "</div>"+
				                "<div class='form-actions'>"+
				                    "<button type='submit' class='btn btn-blue'>Salvar Mudanças</button>"+
				                "</div>"+
	        				"</form>");
	        }
	})
}