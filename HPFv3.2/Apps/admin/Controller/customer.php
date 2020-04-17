<?php
defined("HFA") or die();

switch(Input::post("type")){
    case "add":
		
		$data = [
			"c_name"		=> input::POST('c_name'),
			"c_phone"		=> input::POST('c_phone'),
			"c_city"		=> input::POST('c_city'),
			"c_state"		=> input::POST('c_state'),
			"c_email"		=> input::POST('c_email'),
			"c_address"		=> input::POST('c_address'),
			"c_postcode"	=> input::POST('c_postcode'),
			"c_country"		=> input::POST('c_country'),
			"c_gender"		=> input::POST('c_gender'),
			"c_login"		=> input::POST('c_login'),
			"c_password"	=> F::Encrypt(input::POST('c_password')),
			"c_date"    	=> F::GetDate(),
			"c_time"    	=> F::GetTime(),
			"c_user"    	=> $_SESSION ['user_id']
		];
		
		if(file_exists($_FILES["file"]["tmp_name"])){
                $fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file"]["name"]);
                $temp = $_FILES["file"]["tmp_name"];
                
                $pt = pathinfo($fname);
                $ext = $pt["extension"];
                
                $u = F::UploadImage($temp, Turbo::app("customer")->Asset() . "medias/iecommerce/img/account/" . $fname, $ext, 220,220);
    			
    			if($u){
    				$data["c_picture"] = $fname;
    			}	
        }
		//print_r($data);
		$a = customers::insertInto($data);
		
		if($a){
			 new Alert("success", "Data Saved");
		}else{
			 new Alert("error", "Sorry, Data Not Saved. Please try again or contact IT support team.");
		}
		
    break;
        
    case "edit":
		
		if(!empty(input::POST("c_password"))){
			
			$data = [
				"c_name"		=> input::POST('c_name'),
				"c_phone"		=> input::POST('c_phone'),
				"c_city"		=> input::POST('c_city'),
				"c_state"		=> input::POST('c_state'),
				"c_email"		=> input::POST('c_email'),
				"c_address"		=> input::POST('c_address'),
				"c_postcode"	=> input::POST('c_postcode'),
				"c_country"		=> input::POST('c_country'),
				"c_gender"		=> input::POST('c_gender'),
				"c_login"		=> input::POST('c_login'),
				"c_password"	=> F::Encrypt(input::POST('c_password')),
				"c_user"    	=> $_SESSION ['user_id']
			];
		
		}else{
			
			$data = [
				"c_name"		=> input::POST('c_name'),
				"c_phone"		=> input::POST('c_phone'),
				"c_city"		=> input::POST('c_city'),
				"c_state"		=> input::POST('c_state'),
				"c_email"		=> input::POST('c_email'),
				"c_address"		=> input::POST('c_address'),
				"c_postcode"	=> input::POST('c_postcode'),
				"c_country"		=> input::POST('c_country'),
				"c_gender"		=> input::POST('c_gender'),
				"c_login"		=> input::POST('c_login'),
				"c_user"    	=> $_SESSION ['user_id']
			];
		}
		
		
		if(file_exists($_FILES["file"]["tmp_name"])){
			
                $fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file"]["name"]);
                $temp = $_FILES["file"]["tmp_name"];
                
                $pt = pathinfo($fname);
                $ext = $pt["extension"];
                
                $u = F::UploadImage($temp, Turbo::app("customer")->Asset() . "medias/iecommerce/img/account/" . $fname, $ext, 220,220);
    			
    			if($u){
    				$data["c_picture"] = $fname;
    			}	
        }
        
		$a = customers::updateBy(["c_id" => url::get(2)],$data);
		
		if($a){
			 new Alert("success", "Customer information deleted successfully.");
		}else{
			 new Alert("error", "Sorry, fail updating client information. Please try again or contact your IT support team.");
		}
		
		
    break;
    
    case "delete":
        
        if(customers::deleteBy(["c_id" => url::get(2)])){
            new Alert("success", "Client information deleted successfully.");
        }else{
            new Alert("error", "Sorry, fail updating client information. Please try again or contact your IT support team.");
        }
    break;
}