<?php

    switch(Input::post("action")){
			
		case F::Encrypt(Input::post("_token") . "updateOrder"):
            $item_pict = item_picture::getBy(["ip_item" => Input::post("itemId")]);
    
            if(count($item_pict) > 0){
                $item_pict = $item_pict[0];
                
                $x = item_picture::getBy([
                    "ip_id"     => Input::post("picId")
                ]);
                
                if(count($x) > 0){
                    $x = $x[0];
					item_picture::updateBy(["ip_id" => $x->ip_id], ["ip_order" => Input::post("picOrder")]);
					
					echo json_encode([
	                    "status"    => "success",
	                    "code"      => "DATA_SAVED",
	                    "message"   => "Data saved"
	                ]);
					
               	}else{
					echo json_encode([
                    "status"    => "error",
                    "code"      => "DATA_NOT_SAVE",
                    "message"   => "Photo not found."
                ]);
                }
				
            }else{
                echo json_encode([
                    "status"    => "error",
                    "code"      => "DATA_NOT_SAVE",
                    "message"   => "Photo not found."
                ]);
            }
        break;
		
		case F::Encrypt(Input::post("_token") . "deletePic"):
            $item_pict = item_picture::getBy(["ip_id" => Input::post("picId")]);
            if(count($item_pict) > 0){
                $item_pict = $item_pict[0];
                
				if(file_exists(ASSET . "medias/iecommerce/img/shop/products/" . $item_pict->ip_file)){
					@unlink(ASSET . "medias/iecommerce/img/shop/products/" . $item_pict->ip_file);
				}
				
                item_picture::deleteBy([
                    "ip_id"     => Input::post("picId")
                ]);
                echo json_encode([
                    "status"    => "success",
                    "code"      => "PHOTO_DELETED",
                    "message"   => "data removed."
                ]);
            }else{
                echo json_encode([
                    "status"    => "error",
                    "code"      => "PHOTO_NOT_AVAILABLE",
                    "message"   => "photo not found."
                ]);
            }
        break;
		
		
    
    }

