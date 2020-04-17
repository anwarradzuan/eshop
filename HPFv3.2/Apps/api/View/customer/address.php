<?php

switch(Input::post("action")){
	case "get":
		$ca = customer_address::getBy(["ca_id" => Input::post("address")]);
		
		if(count($ca)){
			$ca = $ca[0];
			
			echo json_encode([
				"status"	=> "success",
				"code"		=> "ADDRESS_FOUND",
				"message"	=> "Address found in current request.",
				"data"		=> $ca
			]);
		}else{
			echo json_encode([
				"status"	=> "error",
				"code"		=> "ADDRESS_NOT_FOUND",
				"message"	=> "Requested address ID not found in current request."
			]);
		}
	break;
}