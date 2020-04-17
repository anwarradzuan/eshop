<?php
switch (input::post('action')){
	
	case "add":
		
		$key = F::UniqKey("ITEM_");
		
		$comp = company::getBy(["c_id" => input::POST("company")]);
		if(count($comp) > 0){
			$comp = $comp[0];
			$comp_key = $comp->c_key;
		}else{
			$comp_key = "No Company";
		}
		$cl = clients::getBy(["cl_company" => input::POST("company")]);
		if(count($cl) > 0){
			$cl = $cl[0];
			$cl_id = $cl->cl_id;
		}else{
			$cl_id = "No Client Found";
		}
		
		if(items::insertInto(
		[
			"i_name"		=> input::POST('name'),
			"i_price"		=> str_replace(",", "",input::POST('price')),
			"i_status"		=> input::POST('status'),
			"i_code"		=> $comp_key,
			"i_weight"		=> input::POST('weight'),
			"i_height"		=> input::POST('height'),
			"i_width"		=> input::POST('width'),
			"i_length"		=> input::POST('length'),
			"i_sku"			=> input::POST('sku'),
			"i_client"		=> $cl_id,
			"i_company"		=> input::POST('company'),
			"i_category" 	=> Input::post("category"),
			"i_user"		=> $_SESSION['user_id'],
			"i_key"    		=> $key,
			"i_date"    	=> F::GetDate(),
			"i_time"    	=> F::GetTime()
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
				   echo '<script> window.location="'.PORTAL_ADMIN.'items/all-item/edit/'. $key .'"; </script> ';
	    		}else{
	    			new Alert("error", "Fail to saved data.");
	    		}
			}else{
				new Alert("error","Data not Saved");
			}
		}else{
		    new Alert("error","Data not Saved");
		}

	break;

	case "edit":
		if(items::updateBy(
			["i_key" => url::get('3')], 
			[
				"i_name"		=> input::POST('name'),
				"i_price"		=> input::POST('price'),
				"i_description"	=> input::POST('i_description'),
				"i_status"		=> input::POST('i_status'),
				"i_order"		=> input::POST('i_order'),
				"i_date"    	=> F::GetDate(),
				"i_time"    	=> F::GetTime(),
				"i_user"    	=> $_SESSION ['user_id']
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
							
							
							
				            $u = F::UploadImage($temp, Turbo::app("business")->Asset() . "medias/iecommerce/img/shop/products/" . $fname, $ext, 555, 440);
							
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
}
?>