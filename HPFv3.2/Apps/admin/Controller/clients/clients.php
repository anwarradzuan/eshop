<?php
defined("HFA") or die();

switch(Input::post("type")){
    case "add":
        ///*
		
		$data2 = [
			"cl_name"       => Input::post("cl_name"),
            "cl_phone"      => Input::post("cl_phone"),
            "cl_email"      => Input::post("cl_email"),
            "cl_address"    => Input::post("cl_address"),
            "cl_postal"     => Input::post("cl_postal"),
            "cl_city"       => Input::post("cl_city"),
            "cl_state"      => Input::post("cl_state"),
            "cl_country"    => Input::post("cl_country"),
            "cl_company"    => Input::post("cl_company"),
            "cl_bankName" 	=> Input::post("cl_bankName"),
            "cl_bankbranch" => Input::post("cl_bankbranch"),
            "cl_accno"    	=> Input::post("cl_accno"),
            "cl_password"   => F::Encrypt(Input::post("cl_password")),
            "cl_login"      => Input::post("cl_login"),
            "cl_date"       => F::GetDate(),
            "cl_time"       => f::GetTime()
		];
		
		if(file_exists($_FILES["file"]["tmp_name"])){
                $fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file"]["name"]);
                $temp = $_FILES["file"]["tmp_name"];
                
                $pt = pathinfo($fname);
                $ext = $pt["extension"];
                
                $u = F::UploadImage($temp, Turbo::app("business")->Asset() . "medias/profiles/" . $fname, $ext, 250, 250);
    			
    			if($u){
    				$data2["cl_picture"] = $fname;
    			}	
        }
		
		if(clients::insertInto($data2)){
            new Alert("success", "Client information saved successfully.");
        }else{
            new Alert("error", "Sorry, fail updating client information. Please try again or contact your IT support team.");
        }
    break;
        
    case "edit":
		
		if(!empty(Input::post("cl_password"))){
			$data2 = [
				"cl_password"   => F::Encrypt(Input::post("cl_password")),
				"cl_name"       => Input::post("cl_name"),
	            "cl_phone"      => Input::post("cl_phone"),
	            "cl_email"      => Input::post("cl_email"),
	            "cl_address"    => Input::post("cl_address"),
	            "cl_postal"     => Input::post("cl_postal"),
	            "cl_city"       => Input::post("cl_city"),
	            "cl_state"      => Input::post("cl_state"),
	            "cl_company"    => Input::post("cl_company"),
	            "cl_country"    => Input::post("cl_country"),
	            "cl_login"      => Input::post("cl_login"),
	            "cl_bankName" 	=> Input::post("cl_bankName"),
	            "cl_bankbranch" => Input::post("cl_bankbranch"),
	            "cl_accno"    	=> Input::post("cl_accno"),
	            "cl_user"    	=> $_SESSION ['user_id']
			];
		}else{
			$data2 = [
				"cl_name"       => Input::post("cl_name"),
	            "cl_phone"      => Input::post("cl_phone"),
	            "cl_email"      => Input::post("cl_email"),
	            "cl_address"    => Input::post("cl_address"),
	            "cl_postal"     => Input::post("cl_postal"),
	            "cl_city"       => Input::post("cl_city"),
	            "cl_state"      => Input::post("cl_state"),
	            "cl_company"    => Input::post("cl_company"),
	            "cl_country"    => Input::post("cl_country"),
	            "cl_login"      => Input::post("cl_login"),
	            "cl_bankName" 	=> Input::post("cl_bankName"),
	            "cl_bankbranch" => Input::post("cl_bankbranch"),
	            "cl_accno"    	=> Input::post("cl_accno"),
	            "cl_user"    	=> $_SESSION ['user_id']
			];
		}
		
		if(file_exists($_FILES["file"]["tmp_name"])){
			
                $fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file"]["name"]);
                $temp = $_FILES["file"]["tmp_name"];
                
                $pt = pathinfo($fname);
                $ext = $pt["extension"];
                
                $u = F::UploadImage($temp, Turbo::app("business")->Asset() . "medias/profiles/" . $fname, $ext, 250, 250);
    			
    			if($u){
    				$data2["cl_picture"] = $fname;
    			}	
        }
        
		$a = clients::updateBy(["cl_id" => url::get(3)],$data2);
		
		if($a){
			
			 new Alert("success", "Client information deleted successfully.");
		}else{
			 new Alert("error", "Sorry, fail updating client information. Please try again or contact your IT support team.");
		}
		
		
    break;
    
    case "delete":
        
        if(clients::deleteBy(["cl_id" => url::get(3)])){
			
            new Alert("success", "Client information deleted successfully.");
        }else{
            new Alert("error", "Sorry, fail updating client information. Please try again or contact your IT support team.");
        }
    break;
}