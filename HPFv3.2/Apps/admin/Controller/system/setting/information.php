<?php
switch (input::post('type')){
	
	case "add";
	
		$data = [
			"i_name"				=> input::POST('name'),
			"i_portal"				=> input::POST('portal'),
			"i_status"				=> input::POST('status'),
			"i_title"				=> input::POST('title'),
			"i_author"				=> input::POST('author'),
			"i_url"					=> input::POST('url'),
			"i_keyword"				=> input::POST('keyword'),
			"i_regno"				=> input::POST('regNo'),
			"i_address"				=> input::POST('address'),
			"i_email"				=> input::POST('email'),
			"i_phone"				=> input::POST('phone'),
			"i_description"			=> input::POST('description'),
			"i_fax"					=> input::POST('fax'),
			"i_contact_email"		=> input::POST('contact_email'),
			"i_bcc"					=> input::POST('bcc'),
			"i_date"    			=> F::GetDate(),
			"i_time"				=> F::GetTime(),
			"i_user"    			=> $_SESSION ['user_id']
		];
		
		if(file_exists($_FILES["file"]["tmp_name"])){
                $fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file"]["name"]);
                $temp = $_FILES["file"]["tmp_name"];
                
                $pt = pathinfo($fname);
                $ext = $pt["extension"];
                
                $u = F::UploadImage($temp, ASSET . "medias/iecommerce/img/logo/" . $fname, $ext);
    			
    			if($u){
    				$data["i_logo"] = $fname;
    			}	
        }
		
		if(file_exists($_FILES["file2"]["tmp_name"])){
                $fname2 = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file2"]["name"]);
                $temp2 = $_FILES["file2"]["tmp_name"];
                
                $pt2 = pathinfo($fname2);
                $ext2 = $pt2["extension"];
                
                $u2 = F::UploadImage($temp2, ASSET . "medias/iecommerce/img/logo/" . $fname2, $ext2, 100, 100);
    			
    			if($u2){
    				$data["i_mobileLogo"] = $fname2;
    			}	
        }
		
		if(file_exists($_FILES["file3"]["tmp_name"])){
                $fname3 = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file3"]["name"]);
                $temp3 = $_FILES["file3"]["tmp_name"];
                
                $pt3 = pathinfo($fname3);
                $ext3 = $pt3["extension"];
                
                $u3 = F::UploadImage($temp3, ASSET . "medias/iecommerce/img/logo/" . $fname3, $ext3);
    			
    			if($u3){
    				$data["i_invoiceLogo"] = $fname3;
    			}	
        }
		
		if(infos::insertInto($data)){
			new Alert("success", "Added");
		}else{
			new Alert("error","Error");
		}
		
	 break;

		
	case "edit";
	
		$data = [
			"i_name"				=> input::POST('name'),
			"i_portal"				=> input::POST('portal'),
			"i_status"				=> input::POST('status'),
			"i_title"				=> input::POST('title'),
			"i_author"				=> input::POST('author'),
			"i_url"					=> input::POST('url'),
			"i_keyword"				=> input::POST('keyword'),
			"i_regno"				=> input::POST('regNo'),
			"i_address"				=> input::POST('address'),
			"i_email"				=> input::POST('email'),
			"i_phone"				=> input::POST('phone'),
			"i_description"			=> input::POST('description'),
			"i_fax"					=> input::POST('fax'),
			"i_contact_email"		=> input::POST('contact_email'),
			"i_bcc"					=> input::POST('bcc'),
			"i_date"    			=> F::GetDate(),
			"i_time"				=> F::GetTime(),
			"i_user"    			=> $_SESSION ['user_id']
		];
		
		if(file_exists($_FILES["file"]["tmp_name"])){
                $fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file"]["name"]);
                $temp = $_FILES["file"]["tmp_name"];
                
                $pt = pathinfo($fname);
                $ext = $pt["extension"];
                
                $u = F::UploadImage($temp, ASSET . "medias/iecommerce/img/logo/" . $fname, $ext);
    			
    			if($u){
    				$data["i_logo"] = $fname;
    			}	
        }
		
		if(file_exists($_FILES["file2"]["tmp_name"])){
                $fname2 = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file2"]["name"]);
                $temp2 = $_FILES["file2"]["tmp_name"];
                
                $pt2 = pathinfo($fname2);
                $ext2 = $pt2["extension"];
                
                $u2 = F::UploadImage($temp2, ASSET . "medias/iecommerce/img/logo/" . $fname2, $ext2, 100, 100);
    			
    			if($u2){
    				$data["i_mobileLogo"] = $fname2;
    			}	
        }
		
		if(file_exists($_FILES["file3"]["tmp_name"])){
                $fname3 = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file3"]["name"]);
                $temp3 = $_FILES["file3"]["tmp_name"];
                
                $pt3 = pathinfo($fname3);
                $ext3 = $pt3["extension"];
                
                $u3 = F::UploadImage($temp3, ASSET . "medias/iecommerce/img/logo/" . $fname3, $ext3);
    			
    			if($u3){
    				$data["i_invoiceLogo"] = $fname3;
    			}	
        }
		
		if(infos::updateBy(["I_ID" => url::get(4)],$data)){
			new Alert("success", "Added");
		}else{
			new Alert("error","Error");
		}
		
	break;	
	
	case "delete":
		infos::deleteBy(
		["i_id"=> url::get(4)]	);
	
		new Alert("success", "Deleted");

	break;
}
?>