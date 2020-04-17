<?php
switch (input::post('action')){
	
	case "add":
		$key = F::UniqKey("COMPANY_");
		$data = [
			"c_name"		=> input::POST('c_name'),
			"c_reg"			=> input::POST('c_reg'),
			"c_phone"		=> input::POST('c_phone'),
			"c_fax"			=> input::POST('c_fax'),
			"c_email"		=> input::POST('c_email'),
			"c_details"		=> input::POST('c_details'),
			"c_address"		=> input::POST('c_address'),
			"c_postalCode"	=> input::POST('c_postalCode'),
			"c_city"		=> input::POST('c_city'),
			"c_state"		=> input::POST('c_state'),
			"c_country"		=> input::POST('c_country'),
			"c_bankName"	=> input::POST('c_bankName'),
			"c_accNo"		=> input::POST('c_accNo'),
			"c_bankBranch"	=> input::POST('c_bankBranch'),
			"c_key"			=> $key,
			"c_date"    	=> F::GetDate(),
			"c_time"    	=> F::GetTime(),
			"c_client"    	=> $_SESSION ['cl_id']
		];
		
		if(file_exists($_FILES["file"]["tmp_name"])){
                $fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file"]["name"]);
                $temp = $_FILES["file"]["tmp_name"];
                
                $pt = pathinfo($fname);
                $ext = $pt["extension"];
                
                $u = F::UploadImage($temp, ASSET . "medias/company/" . $fname, $ext, 250, 250);
    			
    			if($u){
    				$data["c_logo"] = $fname;
    			}	
        }
		
		$a = company::insertInto($data);
		
		if($a){
			 echo '<script> window.location="'.PORTAL_BUSINESS.'my-business/edit/'. $key .'"; </script> ';
		}else{
			new Alert("error", "Fail to saved data.");
		}
		
	break;
	
	case "update":
		$data = [
			"c_name"		=> input::POST('c_name'),
			"c_reg"			=> input::POST('c_reg'),
			"c_phone"		=> input::POST('c_phone'),
			"c_fax"			=> input::POST('c_fax'),
			"c_email"		=> input::POST('c_email'),
			"c_details"		=> input::POST('c_details'),
			"c_address"		=> input::POST('c_address'),
			"c_postalCode"	=> input::POST('c_postalCode'),
			"c_city"		=> input::POST('c_city'),
			"c_state"		=> input::POST('c_state'),
			"c_country"		=> input::POST('c_country'),
			"c_bankName"	=> input::POST('c_bankName'),
			"c_accNo"		=> input::POST('c_accNo'),
			"c_bankBranch"	=> input::POST('c_bankBranch'),
			"c_date"    	=> F::GetDate(),
			"c_time"    	=> F::GetTime(),
			"c_client"    	=> $_SESSION ['cl_id']
		];
		
		if(file_exists($_FILES["file"]["tmp_name"])){
                $fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file"]["name"]);
                $temp = $_FILES["file"]["tmp_name"];
                
                $pt = pathinfo($fname);
                $ext = $pt["extension"];
                
                $u = F::UploadImage($temp, ASSET . "medias/company/" . $fname, $ext, 250, 250);
    			
    			if($u){
    				$data["c_logo"] = $fname;
    			}	
        }
		
		$a = company::updateBy(["c_id" => input::POST("c_id")], $data);
		
		if($a){
		    new Alert("success", "Data Saved");
		}else{
			new Alert("error", "Fail to saved data.");
		}
		
	break;
	
	case "banner":
		
		$company = company::getBy(["c_key" => url::get('2')]);
		
		if(count($company) > 0){
			$company = $company[0];
			
			if(isset($_POST["submit"])){
	            if($_FILES["file"]["name"][0] != ""){
					for($i = 0 ; $i < count($_FILES["file"]["name"]); $i++){
					    $size = $_FILES["file"]["size"][$i] / 1000000;
					    if($size < 2){
		   					$fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file"]["name"][$i]);
							$temp = $_FILES["file"]["tmp_name"][$i];
				            
							$pt = pathinfo($fname);
				            $ext = $pt["extension"];
							
				            $u = F::UploadImage($temp, ASSET . "medias/company/banner/" . $fname, $ext, 800, 290);
							
							if($u){
							    
								$data = array(
									
									"cc_company"	=> $company->c_id,
									"cc_order"		=> 1,
									"cc_date"   	=> F::GetDate(),
									"cc_time"    	=> F::GetTime(),
									"cc_file"		=> $fname
								);
								
								company_cms::insertInto($data);
								
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