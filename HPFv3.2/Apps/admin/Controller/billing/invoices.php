<?php
//$_POST
switch (input::post('type')){
	
	case "add":
	    if(Input::post("client") == "__ADD__"){
	        
	    }else{
	        $data = [
    		    "i_client"      => Input::post("client")   ,
    		    "i_date"        => F::GetDate(),
    		    "i_time"        => F::GetTime(),
    		    "i_no"    => Invoice::getProformaNumber()
    		];
	    }
		
	break;
}
?>