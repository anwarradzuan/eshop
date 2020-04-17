<?php

    switch(Input::post("action")){
			
		case F::Encrypt(Input::post("_token") . "updateOrderBanner"):
            $item_pict = company_cms::getBy(["cc_company" => Input::post("companyId")]);
    
            if(count($item_pict) > 0){
                $item_pict = $item_pict[0];
                
                $x = company_cms::getBy([
                    "cc_id"     => Input::post("bannerId")
                ]);
                
                if(count($x) > 0){
                    $x = $x[0];
					company_cms::updateBy(["cc_id" => $x->cc_id], ["cc_order" => Input::post("picOrder")]);
					
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
		
		case F::Encrypt(Input::post("_token") . "deleteBanner"):
            $item_pict = company_cms::getBy(["cc_id" => Input::post("bannerId")]);
            if(count($item_pict) > 0){
                $item_pict = $item_pict[0];
                
				if(file_exists(ASSET . "medias/iecommerce/img/shop/products/" . $item_pict->cc_file)){
					@unlink(ASSET . "medias/iecommerce/img/shop/products/" . $item_pict->cc_file);
				}
				
                company_cms::deleteBy([
                    "cc_id"     => Input::post("bannerId")
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

