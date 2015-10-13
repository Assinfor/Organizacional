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
	    	"<input id='ddd' type='text' name='ddd[]' class='ddd-form ddd-margin' placeholder='XX' required/>"+
	         "<input type='text' name='telefone[]' class='tel-form tel-margin' required/>"+
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
$("#adicionar-email").click(function(){
	$countEmail++
	$("<div id='email-form-"+$countEmail+"' class='control-group'>"+
            "<div class='controls'>"+
                 "<input type='email' name='email'  required/>"+
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
        url: base_url+"admin/usuario/buscar_usuario/"+id,
        dataType: 'json',
        type: "post",
        success: function(data){
        	$('#modal-body').html('');
        	$('#modal-body').append("<form action='"+base_url+"admin/usuario/salvar_usuario/"+id+"' method='post'>"+
        			"<div class='padded'>"+
			            "<div class='control-group'>"+
			                "<label class='control-label' >Nome:</label>"+
			                "<div class='controls'>"+
			                	"<input type='text' style='display:none'>"+
			                    "<input type='text' name='nome' value='"+data[0].nome+"' required/>"+
			                "</div>"+
			            "</div>"+
			            "<div class='control-group'>"+
			                "<label class='control-label'>Rua:</label>"+
			                "<div class='controls'>"+
			                     "<input type='text' name='endereco[logradouro]' value='"+data[0].logradouro+"' required/>"+
			                "</div>"+
			            "</div>"+
			            "<div class='control-group'>"+
			                "<label class='control-label'>Número:</label>"+
			                "<div class='controls'>"+
			                     "<input type='text' name='endereco[numero]' value='"+data[0].numero+"' required/>"+
			                "</div>"+
			            "</div>"+
			            "<div class='control-group'>"+
			                "<label class='control-label'>Bairro:</label>"+
			                "<div class='controls'>"+
			                     "<input type='text' name='endereco[bairro]' value='"+data[0].bairro+"' required/>"+
			                "</div>"+
		                "<div class='control-group'>"+ 
                            "<label class='control-label'>Cidade:</label>"+
                            "<div class='controls' id='cidade-mark'>"+
                            "</div>"+
                            "</div>"+
                            "<div class='control-group'>"+
			                "<label class='control-label'>CPF:</label>"+
			                "<div class='controls'>"+
			                     "<input type='text' name='pessoa_fisica[cpf]' class='cpf' value='"+data[0].cpf+"' required/>"+
			                "</div>"+
			            "</div>"+
			            "<div class='control-group'>"+
			                "<label class='control-label'>RG:</label>"+
			                "<div class='controls'>"+
			                     "<input type='text' name='pessoa_fisica[rg]' value='"+data[0].rg+"' required/>"+
			                "</div>"+
			            "</div>"+
			            "<div class='control-group'>"+
			                "<label class='control-label'>Carteira de trabalho:</label>"+
			                "<div class='controls'>"+
			                     "<input type='text' name='funcionario[clt]' value='"+data[0].clt+"' required/>"+
			                "</div>"+
			           "</div>"+
			            "<div class='control-group'>"+
			                "<label class='control-label'>PIS:</label>"+
			                "<div class='controls'>"+
			                     "<input type='text' name='funcionario[pis]' value='"+data[0].pis+"' required/>"+
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
        url: base_url+"admin/setor/buscar_setor/"+id,
        dataType: 'json',
        type: "post",
        success: function(data){
        			$('#modal-body').html('');
        			$('#modal-body').append("<form action='"+base_url+"admin/setor/editar_setor/"+id+"' method='post'>"+
        					"<div class='padded'>"+
        						"<div class='control-group'>"+
			                        "<label class='control-label'>Nome:</label>"+
			                        "<div class='controls'>"+
			                            "<input type='text' name='nome' value='"+data[0].nome+"' required/>"+
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