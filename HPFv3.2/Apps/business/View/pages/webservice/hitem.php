<?php

    switch(Input::post("action")){
    	
		case F::Encrypt(Input::post("_token") . "editItem"):
			
            $item = items::getBy(["i_key" => Input::post("itemId")]);
    
            if(count($item) > 0){
                $item = $item[0];
				
				$comp = company::getBy(["c_id" => $_SESSION['cl_company']]);
				if(count($comp) > 0){
					$comp =$comp[0];
					$code = $comp->c_key;
				}else{
					$code = "No company";
				}
				
				$data=[
					"i_name" 		=> Input::post("i_name"),
					"i_status" 		=> Input::post("i_status"),
					"i_price" 		=> Input::post("i_price"),
					"i_code" 		=> $code,
					"i_weight" 		=> Input::post("i_weight"),
					"i_height" 		=> Input::post("i_height"),
					"i_width" 		=> Input::post("i_width"),
					"i_length" 		=> Input::post("i_length"),
					"i_company" 		=> Input::post("i_company"),
					"i_sku"	 		=> Input::post("i_sku"),
					"i_category" 	=> Input::post("i_category")
				];
				
				if(items::updateBy(["i_id" => $item->i_id], $data)){
					
					item_category::updateBy(["ic_item" => $item->i_id],["ic_category" => Input::post("i_category")]);
					
					echo json_encode([
	                    "status"    => "success",
	                    "code"      => "DATA_SAVED",
	                    "message"   => "Data saved",
	                    "data"		=> $item
	                ]);
					
				}else{
					
					echo json_encode([
	                    "status"    => "success",
	                    "code"      => "DATA_SAVED",
	                    "message"   => "Data saved",
	                    "data"		=> $item
	                ]);
				}
				
            }else{
                echo json_encode([
                    "status"    => "error",
                    "code"      => "DATA_NOT_SAVE",
                    "message"   => "Item not found."
                ]);
            }
        break;
			
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
		
		case F::Encrypt(Input::post("_token") . "addFee"):
			
			if(!empty(input::POST('if_value')) && !empty(input::POST('if_name'))){
				
				$key = F::UniqKey("FEE_");
			
				if(item_fees::InsertInto(
					[
						"if_item"		=> input::POST('itemId'),
						"if_name"		=> input::POST('if_name'),
						"if_type"   	=> input::POST('if_type'),
						"if_value"    	=> input::POST('if_value'),
						"if_key"		=> $key
					]
				)){
					
					$list = item_fees::getBy(["if_key" => $key]);
					if(count($list) > 0){
						$list = $list[0];
						
						echo json_encode([
	                    "status"    => "success",
	                    "code"      => "DATA_SAVED",
	                    "message"   => "Data saved",
	                    "data"		=> $list
	                ]);
					
					}else{
						echo json_encode([
	                    "status"    => "error",
	                    "code"      => "DATA_NOT_SAVE",
	                    "message"   => "Data Not Saved."
	                ]);
					}
					
				}else{
				    echo json_encode([
	                    "status"    => "error",
	                    "code"      => "DATA_NOT_SAVE",
	                    "message"   => "Data Not Saved."
	                ]);
				}
				
			}else{
				echo json_encode([
                    "status"    => "error",
                    "code"      => "DATA_NOT_SAVE",
                    "message"   => "Please fill in all the information."
                ]);
			}
			
        break;
		
		case F::Encrypt(Input::post("_token") . "editFee"):
			
			if(!empty(input::POST('if_value')) && !empty(input::POST('if_name'))){
				
				if(item_fees::updateBy(["if_id"=> input::POST('fee_id')],
					[
						"if_name"		=> input::POST('if_name'),
						"if_type"   	=> input::POST('if_type'),
						"if_value"    	=> input::POST('if_value')
					]
				)){
					
					echo json_encode([
	                    "status"    => "success",
	                    "code"      => "DATA_SAVED",
	                    "message"   => "Data saved"
	                ]);
					
				}else{
				    echo json_encode([
	                    "status"    => "error",
	                    "code"      => "DATA_NOT_SAVE",
	                    "message"   => "Data Not Saved."
	                ]);
				}
				
			}else{
				echo json_encode([
                    "status"    => "error",
                    "code"      => "DATA_NOT_SAVE",
                    "message"   => "Please fill in all the information."
                ]);
			}
    
        break;
		
		case F::Encrypt(Input::post("_token") . "deleteFee"):
            
            $check = item_fees::getBy(["if_id" => Input::post("fee_id")]);
			
            if(count($check) > 0){
                $check = $check[0];
				
                item_fees::deleteBy([
                    "if_id"     => $check->if_id
                ]);
                echo json_encode([
                    "status"    => "success",
                    "code"      => "FEE_DELETED",
                    "message"   => "fee removed."
                ]);
            }else{
                echo json_encode([
                    "status"    => "error",
                    "code"      => "DATA_NOT_FOUND",
                    "message"   => "Fee Not Found."
                ]);
            }
			
        break;
		
		case F::Encrypt(Input::post("_token") . "addPromotion"):
		
			if(!empty(input::POST('ip_name')) && !empty(input::POST('ip_value'))){
				
				$key = F::UniqKey("PROMOTION_");
			
				if(item_promotion::InsertInto(
					[
						"ip_item"		=> input::POST('itemId'),
						"ip_name"		=> input::POST('ip_name'),
						"ip_type"   	=> input::POST('ip_type'),
						"ip_value"    	=> input::POST('ip_value'),
						"ip_expired"    => input::POST('ip_expired'),
						"ip_key"		=> $key
					]
				)){
					
					$list = item_promotion::getBy(["ip_key" => $key]);
					if(count($list) > 0){
						$list = $list[0];
						
						echo json_encode([
	                    "status"    => "success",
	                    "code"      => "DATA_SAVED",
	                    "message"   => "Data saved",
	                    "data"		=> $list
	                ]);
					
					}else{
						echo json_encode([
	                    "status"    => "error",
	                    "code"      => "DATA_NOT_SAVE",
	                    "message"   => "Data Not Saved."
	                ]);
					}
					
				}else{
				    echo json_encode([
	                    "status"    => "error",
	                    "code"      => "DATA_NOT_SAVE",
	                    "message"   => "Data Not Saved."
	                ]);
				}
				
			}else{
				echo json_encode([
                    "status"    => "error",
                    "code"      => "DATA_NOT_SAVE",
                    "message"   => "Please fill in all the information."
                ]);
			}
    
        break;
	
		case F::Encrypt(Input::post("_token") . "editPromotion"):
			
			if(!empty(input::POST('ip_name')) && !empty(input::POST('ip_value'))){
				
				if(item_promotion::updateBy(["ip_id"=> input::POST('ip_id')],
					[
						"ip_name"		=> input::POST('ip_name'),
						"ip_type"   	=> input::POST('ip_type'),
						"ip_value"    	=> input::POST('ip_value'),
						"ip_expired"    => input::POST('ip_expired')
					]
				)){
					
					echo json_encode([
	                    "status"    => "success",
	                    "code"      => "DATA_SAVED",
	                    "message"   => "Data saved"
	                ]);
					
				}else{
				    echo json_encode([
	                    "status"    => "error",
	                    "code"      => "DATA_NOT_SAVE",
	                    "message"   => "Data Not Saved."
	                ]);
				}
				
			}else{
				echo json_encode([
                    "status"    => "error",
                    "code"      => "DATA_NOT_SAVE",
                    "message"   => "Please fill in all the information."
                ]);
			}
    
        break;
		
		case F::Encrypt(Input::post("_token") . "deletePromotion"):
            
            $check = item_promotion::getBy(["ip_id" => Input::post("ip_id")]);
			
            if(count($check) > 0){
                $check = $check[0];
				
                item_promotion::deleteBy([
                    "ip_id"     => $check->ip_id
                ]);
                echo json_encode([
                    "status"    => "success",
                    "code"      => "FEE_DELETED",
                    "message"   => "Promotion removed."
                ]);
            }else{
                echo json_encode([
                    "status"    => "error",
                    "code"      => "DATA_NOT_FOUND",
                    "message"   => "Promotion Not Found."
                ]);
            }
			
        break;
		
		case F::Encrypt(Input::post("_token") . "addAttribute"):
            
            if(!empty(input::POST('ia_name')) && !empty(input::POST('ia_value'))){
				
				$key = F::UniqKey("ATTRIBUTE_");
			
				if(item_attribute::InsertInto(
					[
						"ia_item"		=> input::POST('itemId'),
						"ia_name"		=> input::POST('ia_name'),
						"ia_value"   	=> input::POST('ia_value'),
						"ia_time"    	=> F::GetTime(),
						"ia_date"    	=> F::GetDate(),
						"ia_key"		=> $key
					]
				)){
					
					$list = item_attribute::getBy(["ia_key" => $key]);
					if(count($list) > 0){
						$list = $list[0];
						
						echo json_encode([
	                    "status"    => "success",
	                    "code"      => "DATA_SAVED",
	                    "message"   => "Data saved",
	                    "data"		=> $list
	                ]);
					
					}else{
						echo json_encode([
	                    "status"    => "error",
	                    "code"      => "DATA_NOT_SAVE",
	                    "message"   => "Data Not Saved."
	                ]);
					}
					
				}else{
				    echo json_encode([
	                    "status"    => "error",
	                    "code"      => "DATA_NOT_SAVE",
	                    "message"   => "Data Not Saved."
	                ]);
				}
				
			}else{
				echo json_encode([
                    "status"    => "error",
                    "code"      => "DATA_NOT_SAVE",
                    "message"   => "Please fill in all the information."
                ]);
			}
			
        break;
		
		case F::Encrypt(Input::post("_token") . "editAttribute"):
			
			if(!empty(input::POST('ia_name')) && !empty(input::POST('ia_value'))){
				
				if(item_attribute::updateBy(["ia_id"=> input::POST('ia_id')],
					[
						"ia_name"		=> input::POST('ia_name'),
						"ia_value"   	=> input::POST('ia_value'),
						"ia_time"    	=> F::GetTime(),
						"ia_date"    	=> F::GetDate()
					]
				)){
					
					echo json_encode([
	                    "status"    => "success",
	                    "code"      => "DATA_SAVED",
	                    "message"   => "Data saved"
	                ]);
					
				}else{
				    echo json_encode([
	                    "status"    => "error",
	                    "code"      => "DATA_NOT_SAVE",
	                    "message"   => "Data Not Saved."
	                ]);
				}
				
			}else{
				echo json_encode([
                    "status"    => "error",
                    "code"      => "DATA_NOT_SAVE",
                    "message"   => "Please fill in all the information."
                ]);
			}
    
        break;
		
		case F::Encrypt(Input::post("_token") . "deleteAttribute"):
            
            $check = item_attribute::getBy(["ia_id" => Input::post("ia_id")]);
			
            if(count($check) > 0){
                $check = $check[0];
				
                item_attribute::deleteBy([
                    "ia_id"     => $check->ia_id
                ]);
                echo json_encode([
                    "status"    => "success",
                    "code"      => "ATTRIBUTE_DELETED",
                    "message"   => "Attribute removed."
                ]);
            }else{
                echo json_encode([
                    "status"    => "error",
                    "code"      => "ATTRIBUTE_NOT_FOUND",
                    "message"   => "Attribute Not Found."
                ]);
            }
			
        break;
		
		
		
		case F::Encrypt(Input::post("_token") . "updateDetail"):
			
			$item = items::getBy(["i_id" => input::POST('itemId')]);
		
			if(count($item) > 0){
				$item = $item[0];
				
				$detail = item_detail::getBy(["id_item" => $item->i_id]);
				
				if(count($detail) > 0){
					
					if(item_detail::UpdateBy(["id_item" => $item->i_id],
						[
							"id_detail"		=> input::POST('details', 0),
							"id_date"   	=> F::GetDate(),
							"id_time"    	=> F::GetTime()
						]
					)){
						echo json_encode([
		                    "status"    => "success",
		                    "code"      => "DATA_SAVED",
		                    "message"   => "Data saved",
		                    "data"   	=> input::POST('details')
		                ]);
					}else{
					   	echo json_encode([
		                    "status"    => "error",
		                    "code"      => "DATA_NOT_SAVE1",
		                    "message"   => "Data Not Saved.",
		                   // "data"   	=> input::POST('details')
		                ]);
					}
					
				}else{
					
					if(item_detail::insertInto(
						[
							"id_item"		=> $item->i_id,
							"id_detail"		=> input::POST('content', 0),
							"id_date"   	=> F::GetDate(),
							"id_time"    	=> F::GetTime()
						]
					)){
						echo json_encode([
		                    "status"    => "success",
		                    "code"      => "DATA_SAVED",
		                    "message"   => "Data saved"
		                ]);
					}else{
					    echo json_encode([
		                    "status"    => "error",
		                    "code"      => "DATA_NOT_SAVE2",
		                    "message"   => "Data Not Saved.",
		                    //"data"   => input::POST('itemId')
		                ]);
					}
				}
				
			}else{
				echo json_encode([
                    "status"    => "error",
                    "code"      => "DATA_NOT_SAVE3",
                    "message"   => "Data Not Found.",
                    //"data"   	=> input::POST('itemId')
                ]);
		}
    
        break;
		
		case F::Encrypt(Input::post("_token") . "addOption"):
			
			$list = JSON_decode(base64_decode(input::POST('data')));
			
			if(!empty($list->io_name) && !empty($list->io_type) && !empty($list->values[0])){
				$key = F::UniqKey("ITEM_OPTION_");
				$data =[
					"io_item" => input::POST('io_item'),
					"io_name" => $list->io_name,
					"io_type" => $list->io_type,
					"io_key" => $key
				];
				
				item_option::insertInto($data);
				
				$op = item_option::getBy(["io_key" => $key]);
				
				if(count($op) > 0){
					$op = $op[0];
					
					foreach($list->values as $va){
						
						$check = item_option_value::getBy(["iov_option" => $op->io_id, "iov_value" => $va->io_value]);
						
						if(count($check) < 1){
							$data2=[
								"iov_option" => $op->io_id,
								"iov_value" => $va->io_value,
								"iov_price" => $va->io_price
							];
							
							item_option_value::insertInto($data2);	
							
						}
					}
					
					echo json_encode([
		                "status"    => "success",
		                "code"      => "DATA_SAVED",
		                "message"   => "Data Saved"
		            ]);
					
				}else{
					echo json_encode([
		                "status"    => "error",
		                "code"      => "DATA_NOT_SAVED",
		                "message"   => "Item Option Not Found"
		            ]);
				}
				
			}else{
				echo json_encode([
	                "status"    => "error",
	                "code"      => "DATA_NOT_SAVED",
	                "message"   => "Please Fill in all the information"
	            ]);
			}
			
        break;
		
		case F::Encrypt(Input::post("_token") . "editOption"):
			
			$list = JSON_decode(base64_decode(input::POST('data')));
			
			
			if(!empty($list->io_name) && !empty($list->io_type)){
				
				$data =[
					"io_name" => $list->io_name,
					"io_type" => $list->io_type
				];
				
				item_option::updateBy(["io_id"=> input::POST('data_ioid')],$data);
				
				foreach($list->values as $va){
					
					// $check = item_option_value::getBy(["iov_option" => input::POST('data_ioid'), "iov_value" => $va->io_value]);
					// if(count($check) > 0){
						// echo json_encode([
							// "status"    => "error",
							// "code"      => "OPTION_NAME_EXIST",
							// "message"   => "Option name exist. Please use another name"
						// ]);
						// break;
					// }else{
						$iov = item_option_value::getBy(["iov_id" => $va->iv_id]);
						if(count($iov) > 0){
							item_option_value::updateBy(["iov_id"=> $va->iv_id],["iov_value" => $va->io_value, "iov_price" => $va->io_price]);
						}else{
				
							item_option_value::insertInto([
								"iov_option" => input::POST('data_ioid'),
								"iov_price" => $va->io_price,
								"iov_value" => $va->io_value
								
							]);
						}
					// }
				}
				echo json_encode([
	                "status"    => "success",
	                "code"      => "DATA_SAVED",
	                "message"   => "Data Saved",
	                "data"		=> $list
	            ]);
			}else{
				echo json_encode([
	                "status"    => "error",
	                "code"      => "DATA_NOT_SAVED",
	                "message"   => "Please Fill in all thge information",
	                "data"		=> $list
	            ]);
			}
			
    
        break;
        
		case F::Encrypt(Input::post("_token") . "deleteValue"):
			
			//$list = JSON_decode(base64_decode(input::POST('data')));
			
			item_option_value::deleteBy([
                    "iov_id"     => input::POST('data_ivid')
                ]);
                echo json_encode([
                    "status"    => "success",
                    "code"      => "DATA_DELETED",
                    "message"   => "Data removed."
                ]);
			
    
        break;
		
		case F::Encrypt(Input::post("_token") . "deleteOption"):
			
			item_option::deleteBy(["io_id" => input::POST("data_ioid")]);
			
			item_option_value::deleteBy(["iov_option" => input::POST('data_ioid')]);
			
            echo json_encode([
                "status"    => "success",
                "code"      => "DATA_DELETED",
                "message"   => "Data removed."
            ]);
			
    
        break;
		
		case F::Encrypt(Input::post("_token") . "updateShipping"):
			
			$item = items::getBy(["i_key" => input::POST('iov_item')]);
			echo input::POST('iov_item');
			if(count($item) > 0){
				$item = $item[0];
				
				$list = json_decode(base64_decode(input::POST('data')));
			
				foreach($list->values as $va){
					if(!empty($va->iov_id)){
						if(!empty($va->iov_name)){
							$data = [
								"iov_value" => $va->iov_name,
								"iov_price" => $va->iov_price,
								"iov_description" => $va->iov_description
							];
							$u = item_option_value::updateBy(["iov_id" => $item->i_id] , $data);
						}
					}else{
						if(!empty($va->iov_name)){
							$data=[
								"iov_shipping" => $item->i_id,
								"iov_value" => $va->iov_name,
								"iov_price" => $va->iov_price,
								"iov_description" => $va->iov_description
							];
							item_option_value::insertInto($data);
						}
					}
				}
			}else{
				echo json_encode([
	                "status"    => "error",
	                "code"      => "ITEM_NOT_FOUND",
	                "message"   => "Item Not found in database."
	            ]);
			}
			
			
        break;
		
		case F::Encrypt(Input::post("_token") . "deleteShipping"):
			
			$iovid = input::POST('data_iovid');
			
			if(!empty($iovid)){
				item_option_value::deleteBy(["iov_id" => $iovid]);
				echo json_encode([
                "status"    => "success",
                "code"      => "DATA_DELETED",
                "message"   => "Data removed."
            ]);
			}else{
				echo json_encode([
	                "status"    => "success",
	                "code"      => "SHIPPING_DATA_DELETED",
	                "message"   => "Shipping data removed."
	            ]);
			}
			
        break;
    }

