function cloneTel(){
	var $counter = 0;
        var $clone = $("#telefone-form").clone();
        if($counter==0){
        	$clone.insertAfter("#telefone-form");
        	$counter++;
        }

}