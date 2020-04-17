<?php
switch (input::post('action')){
	
	case "add":
		
		$key = F::UniqKey("ITEM_");
		
		$cl = clients::getBy(["cl_id" => $_SESSION['cl_id']]);
		
		if(count($cl) > 0 ){
			$cl = $cl[0];
			
			$companny_key = company::getBy(["c_id" => $cl->cl_company]);
		
			if(count($companny_key) > 0){
				$companny_key =$companny_key[0];
				$code = $companny_key->c_key;
			}else{
				$code = "No company";
			}
			
			if(items::insertInto(
			[
				"i_name"		=> input::POST('name'),
				"i_price"		=> str_replace(",", "", input::POST('price')),
				"i_status"		=> input::POST('status'),
				"i_code"		=> $code,
				"i_weight"  	=> input::POST('weight'),
				"i_height" 		=> input::post("height"),
				"i_length" 		=> input::post("length"),
				"i_width" 		=> input::post("width"),
				"i_sku" 		=> input::post("sku"),
				"i_category" 	=> input::post("category"),
				"i_company"		=> input::post("company"),
				"i_key"    		=> $key,
				"i_date"    	=> F::GetDate(),
				"i_time"    	=> F::GetTime(),
				"i_client"    	=> $_SESSION ['cl_id']
			]
			)){
				$b = items::getBy(["i_key" => $key]);
				
				if(count($b) > 0){
					$b = $b[0];
					
					$data3=[
		                "ic_item"	    => $b->i_id,
					    "ic_category"	=> Input::post("category")
	                ];
					
					$f = item_category::insertInto($data3);
					
					
		            if($f){
					   echo '<script> window.location="'.PORTAL_BUSINESS.'items/all-item/edit/'. $key .'"; </script> ';
		    		}else{
		    			new Alert("error", "Fail to saved data.");
		    		}
				}else{
					new Alert("error","Data not Saved");
				}
			}else{
			    new Alert("error","Data not Saved");
			}
			
		}else{
			new Alert("error","Client Not Found");
		}

	break;

	case "edit":
		if(items::updateBy(
			["i_key" => url::get('3')], 
			[
				"i_name"		=> input::POST('name'),
				"i_price"		=> input::POST('price'),
				"i_description"	=> input::POST('i_description'),
				"i_status"		=> input::POST('status'),
				"i_code"		=> input::POST('code'),
				"i_date"    	=> F::GetDate(),
				"i_time"    	=> F::GetTime(),
				"i_client"    	=> $_SESSION ['cl_id']
			]
		)){
			$b = items::getBy(["i_key" => url::get('3')]);
			
			if(count($b) > 0){
				$b = $b[0];
				
				$data3=[
				    "ic_category"	=> Input::post("category")
                ];
				
				$f = item_category::updateBy(["ic_item" => $b->i_id],$data3);
				
				
	            if($f){
	            	new Alert("success", "Data Saved.");
	    		}else{
	    			new Alert("error", "Fail to saved data.");
	    		}
			}else{
				new Alert("error","Data not Saved");
			}
		}else{
		    new Alert("Error", "Data Not Saved");
		};
		
	
	break;
	
	case "delete":
		
	    $item = items::getBy(["i_key" => url::get('3')]);
		
		if(count($item) > 0){
			$item = $item[0];
			if(items::deleteBy(
				["i_id"=> $item->i_id]
			)){
				item_category::deleteBy(["ic_item" => $item->i_id]);
				item_picture::deleteBy(["ip_item" => $item->i_id]);
				item_promotion::deleteBy(["ip_item" => $item->i_id]);
				item_fees::deleteBy(["if_item" => $item->i_id]);
				item_attribute::deleteBy(["ia_item" => $item->i_id]);
				item_detail::deleteBy(["id_item" => $item->i_id]);
				//item_option::deleteBy(["io_item" => $item->i_id]);
				
				$io = item_option::getBy(["io_item" => $item->i_id]);
				if(count($io) > 0){
					$io = $io[0];
					if($iov = item_option_value::deleteBy(["iov_option" => $io->io_id])){
						$io = item_option::deleteBy(["io_item" => $item->i_id]);
					}
					
				}
				
				new Alert("success", "Record Deleted");
			}else{
				new Alert("error", "Record Not Delete");
			}
				
			
		}else{}
		
	break;
	
	case "add_fee":
		
		$item = items::getBy(["i_key" => url::get('3')]);
		
		if(count($item) > 0){
			$item = $item[0];
			
			if(item_fees::insertInto(
			[
				"if_name"		=> input::POST('if_name'),
				"if_type"		=> input::POST('if_type'),
				"if_value"		=> input::POST('if_value'),
				"if_item"    	=> $item->i_id
			]
			)){
				new Alert("success","Data Saved");
			}else{
			    new Alert("error","Data not Saved");
			}
			
		}else{
			new Alert("error","Data not Saved");
		}
			
	break;
	
	case "edit_fee":
		
		$item = items::getBy(["i_key" => url::get('3')]);
		
		if(count($item) > 0){
			$item = $item[0];
			
			if(item_fees::updateBy(["if_id" => url::get('5')],
			[
				"if_name"		=> input::POST('if_name'),
				"if_type"		=> input::POST('if_type'),
				"if_value"		=> input::POST('if_value'),
				"if_item"    	=> $item->i_id
			]
			)){
				new Alert("success","Data Saved");
			}else{
			    new Alert("error","Data not Saved");
			}
			
		}else{
			new Alert("error","Data not Saved");
		}
			
	break;
	
	case "delete_fee":
		
		$item = items::getBy(["i_key" => url::get('3')]);
		
		if(count($item) > 0){
			$item = $item[0];
			if(item_fees::deleteBy(
				["if_id"=> url::get('5')]
			)){
				echo '<script> window.location="'.PORTAL.'items/all-item/edit/'. url::get('3') .'"; </script> ';
				//new Alert("success","Data Removed");
			}else{
				new Alert("error", "Record Not Delete");
			}
				
			
		}else{}
			
	break;
	
	case "add_promotion":
		
		$item = items::getBy(["i_key" => url::get('3')]);
		
		if(count($item) > 0){
			$item = $item[0];
			
			if(item_promotion::insertInto(
			[
				"ip_name"		=> input::POST('ip_name'),
				"ip_type"		=> input::POST('ip_type'),
				"ip_value"		=> input::POST('ip_value'),
				"ip_expired"	=> input::POST('ip_expired'),
				"ip_date"		=> F::GetDate(),
				"ip_time"		=> F::GetTime(),
				"ip_item"    	=> $item->i_id
			]
			)){
				new Alert("success","Data Saved");
			}else{
			    new Alert("error","Data not Saved");
			}
			
		}else{
			new Alert("error","Data not Saved");
		}
			
	break;
	
	case "edit_promotion":
		
		$item = items::getBy(["i_key" => url::get('3')]);
		
		if(count($item) > 0){
			$item = $item[0];
			
			if(item_promotion::updateBy(["ip_id" => url::get('5')],
			[
				"ip_name"		=> input::POST('ip_name'),
				"ip_type"		=> input::POST('ip_type'),
				"ip_value"		=> input::POST('ip_value'),
				"ip_expired"	=> input::POST('ip_expired'),
				"ip_date"		=> F::GetDate(),
				"ip_time"		=> F::GetTime(),
				"ip_item"    	=> $item->i_id
			]
			)){
				new Alert("success","Data Saved");
			}else{
			    new Alert("error","Data not Saved");
			}
			
		}else{
			new Alert("error","Data not Saved");
		}
			
	break;
	
	case "delete_promotion":
		
		$item = items::getBy(["i_key" => url::get('3')]);
		
		if(count($item) > 0){
			$item = $item[0];
			if(item_promotion::deleteBy(
				["ip_id"=> url::get('5')]
			)){
				echo '<script> window.location="'.PORTAL.'items/all-item/edit/'. url::get('3') .'"; </script> ';
			}else{
				new Alert("error", "Record Not Delete");
			}
				
			
		}else{}
			
	break;
	
	case "add_image":
		
		$item = items::getBy(["i_key" => url::get('3')]);
		
		if(count($item) > 0){
			$item = $item[0];
			$x = $item->i_id;
			
			items::updateBy(["i_id" => $x], ["i_vidUrl" => Input::POST('i_vidUrl')]);
			
			if(isset($_POST["submit"])){
	            if($_FILES["file"]["name"][0] != ""){
					for($i = 0 ; $i < count($_FILES["file"]["name"]); $i++){
					    $size = $_FILES["file"]["size"][$i] / 1000000;
					    if($size < 2){
		   					$fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file"]["name"][$i]);
							$temp = $_FILES["file"]["tmp_name"][$i];
				            
							$pt = pathinfo($fname);
				            $ext = $pt["extension"];
							
				            $u = F::UploadImage($temp, ASSET . "medias/iecommerce/img/shop/products/" . $fname, $ext, 555, 440);
							
							if($u){
							    
								$data = array(
									
									"ip_item"		=> $x,
									"ip_order"		=> 1,
									"ip_date"   	=> F::GetDate(),
									"ip_time"    	=> F::GetTime(),
									"ip_file"		=> $fname
								);
								
								item_picture::insertInto($data);
								
							}
	                    }else{
	                    	
	                        new Alert("error", "Cannot upload image " . $_FILES["file"]["name"] . " because too big. Please select image less than 2MB.");
	                    }
					}
				}
	        }
				new Alert("success", "Photo has been saved successfully.");
			
		}else{
			new Alert("error", "Photo not saved.");
		}
	break;
	
	case "add_detail":
		
		$item = items::getBy(["i_key" => url::get('3')]);
		
		if(count($item) > 0){
			$item = $item[0];
			
			$detail = item_detail::getBy(["id_item" => $item->i_id]);
			
			if(count($detail) > 0){
				
				if(item_detail::UpdateBy(["id_item" => $item->i_id],
					[
						"id_detail"		=> input::POST('content', 0),
						"id_date"   	=> F::GetDate(),
						"id_time"    	=> F::GetTime()
					]
				)){
					new Alert("success","Data Saved");
				}else{
				    new Alert("error","Data not Saved");
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
					new Alert("success","Data Saved");
				}else{
				    new Alert("error","Data not Saved");
				}
			}
			
		}else{
			new Alert("error","Data not Saved. Item not found");
		}
		
	break;
	
	case "add_att":
		
		if(attributes::insertInto(
			[
				"a_name"		=> input::POST('a_name'),
				"a_client"   	=> $_SESSION["cl_id"],
				"a_date"   		=> F::GetDate(),
				"a_time"    	=> F::GetTime()
			]
		)){
			new Alert("success","Data Saved");
		}else{
		    new Alert("error","Data not Saved");
		}
		
	break;
	
}
?>