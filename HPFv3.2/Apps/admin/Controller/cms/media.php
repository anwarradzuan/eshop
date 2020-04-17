<?php
switch (input::post('type')){
	case "add":
		
		$data = [
					"m_name"		=> input::POST('name'),
					"m_date"    	=> F::GetDate(),
					"m_time"		=> F::GetTime(),
				];
		
		if(file_exists($_FILES["image"]["tmp_name"])){
                $fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["image"]["name"]);
                $temp = $_FILES["image"]["tmp_name"];
                
                $pt = pathinfo($fname);
                $ext = $pt["extension"];
                
                $u = F::UploadImage($temp, ASSET . "medias/iecommerce/img/medias/" . $fname, $ext);
    			
    			if($u){
    				$data["m_file"] = $fname;
    			}	
     	}
		$a = medias::insertInto($data);
		
		if($a){
		    new Alert("success", "Image Saved");
		}else{
			new Alert("error", "Image saved failed.");
		}
	break;
	
	
	case "delete":
		medias::deleteBy(
			["m_id"=> url::get(3)]	
		);
	
		new Alert("success", "Media image deleted successfully.");
	break;
}
?>