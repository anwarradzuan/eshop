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
			"c_client"    	=> input::POST('c_client'),
			// "c_commission"  => input::POST('c_commission'),
			"c_user"    	=> $_SESSION['user_id'],
			"c_key"			=> $key,
			"c_date"    	=> F::GetDate(),
			"c_time"    	=> F::GetTime()
			
		];
		
		if(file_exists($_FILES["file"]["tmp_name"])){
                $fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file"]["name"]);
                $temp = $_FILES["file"]["tmp_name"];
                
                $pt = pathinfo($fname);
                $ext = $pt["extension"];
                
                $u = F::UploadImage($temp, Turbo::app("business")->Asset() . "medias/company/" . $fname, $ext, 250, 250);
    			
    			if($u){
    				$data["c_logo"] = $fname;
    			}	
        }
		
		$a = company::insertInto($data);
		
		if($a){
			 echo '<script> window.location="'.PORTAL.'clients/all-company/edit/'. $key .'"; </script> ';
		}else{
			new Alert("error", "Fail to saved data.");
		}
		
	break;
	
	case "edit":
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
			"c_client"    	=> input::POST('c_client'),
			// "c_commission"  => input::POST('c_commission'),
			"c_status"  	=> input::POST('c_status'),
			"c_user"    	=> $_SESSION['user_id'],
			"c_date"    	=> F::GetDate(),
			"c_time"    	=> F::GetTime()
			
		];
		
		if(file_exists($_FILES["file"]["tmp_name"])){
                $fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file"]["name"]);
                $temp = $_FILES["file"]["tmp_name"];
                
                $pt = pathinfo($fname);
                $ext = $pt["extension"];
                
                $u = F::UploadImage($temp, Turbo::app("business")->Asset() . "medias/company/" . $fname, $ext, 250, 250);
    			
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
	
	case "delete":
		
		$id= url::get('3');
		
		$comp = company::getBy(["c_key" => $id]);
		if(count($comp) > 0){
			$comp = $comp[0];
			$com_id = $comp->c_id;
			
			items::deleteBy(["i_company" => $com_id]);
			clients::deleteBy(["cl_company" => $com_id]);
			company_cms::deleteBy(["cc_company" => $com_id]);
			
			$a = company::deleteBy(["c_id" => $com_id]);
			if($a){
			    new Alert("success", "Record succesfully removed");
			}else{
				new Alert("error", "Fail to remove data.");
			}
		}else{
			new Alert("error", "Company Not Found");
		}
		
		
	break;
	
}
?>