$(document).ready(function(){
	var $countTel = 0;
	var $countEmail = 0;
$("#adicionar-telefone").click(function(){
	$countTel++;
    $("<div id='telefone-form-"+$countTel+"' class='control-group'>"+
	    "<div class='controls'>"+
	    	"<input id='ddd' type='text' name='ddd[]' class='ddd-form' required/>"+
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
                 "<input type='email' name='email' required/>"+
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