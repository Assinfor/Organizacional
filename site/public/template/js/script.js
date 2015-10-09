$(document).ready(function(){
	var $countTel = 0;
	var $countEmail = 0;
$("#adicionar-telefone").click(function(){
	$countTel++;
    $("<div id='telefone-form-"+$countTel+"' class='control-group'>"+
	    "<div class='controls'>"+
	    	"<input id='ddd' type='text' name='ddd[]' class='ddd-form' placeholder='XX' required/>"+
	         "<input type='text' name='telefone[]' class='tel-form' required/>"+
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