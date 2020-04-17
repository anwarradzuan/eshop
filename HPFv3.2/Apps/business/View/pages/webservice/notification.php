<?php

    switch(Input::post("action")){
    	
		case F::Encrypt(Input::post("_token") . "notification"):
			
			$noti = order_item::getBy(["oi_client"] => ){
				
			}else{
				
			}
			
			echo json_encode([
                "status"    => "success",
                "code"      => "DATA_SAVED",
                "message"   => "Data saved",
                "data"		=> $item
            ]);
			
          
        break;
		
    }

