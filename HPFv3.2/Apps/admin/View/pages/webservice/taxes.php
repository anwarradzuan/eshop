<?php
switch (input::POST('action')){

    case F::Encrypt(Input::post("_token") . "getTaxes"):
        
        //$t = Input::post("tax_id");
	    
	    $x = DB::conn()->q("SELECT t_id, t_rate FROM `taxes`") -> results();
	    
	    if(count($x) > 0){
	        //$x = $x[0];
	        $taxes = [];
	        
	        foreach($x as $t){
	            $taxes[$t->t_id] = $t->t_rate;
	        } 
	        
	        echo json_encode([
                "status"    => "success",
                "message"   => "Tax Information Loaded.",
                "code"      => "DATA_FOUND",
                "data"      => $taxes
            ]); 
	    }else{
	        echo json_encode([
                "status"    => "error",
                "message"   => "Tax Information Not Load.",
                "code"      => "DATA_NOT_FOUND"
            ]); 
	    }
	    
	break;
}
?>