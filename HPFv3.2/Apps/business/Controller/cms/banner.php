<?php
switch (input::post('type')){
		
	case "add";
		$data = [
		    "b_name"	        => Input::post("b_name"),
			"b_content"	        => Input::post("b_content", 0),
			"b_status"			=> Input::post("b_status"),
			"b_position"		=> Input::post("b_position"),
 			"b_date"			=> F::GetDate(),
 			"b_time"			=> F::GetTime(),
 			"b_user"			=> $_SESSION['user_login']
		];
		
		
		
		if(file_exists($_FILES["file"]["tmp_name"])){
                $fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file"]["name"]);
                $temp = $_FILES["file"]["tmp_name"];
                
                $pt = pathinfo($fname);
                $ext = $pt["extension"];
                
                $u = F::UploadImage($temp, ASSET . "medias/iecommerce/img/banners/" . $fname, $ext);
    			
    			if($u){
    				$data["b_file"] = $fname;
    			}	
        }
		
		$a = banners::insertInto($data);
		
		if($a){
			    new Alert("success", "Data Saved");
    		}else{
    			new Alert("error", "Fail to saved data.");
    		}
		
	break;
	
	case "edit";
	
		$data = [
		    "b_name"	        => Input::post("b_name"),
			"b_content"	        => Input::post("b_content", 0),
			"b_status"			=> Input::post("b_status"),
			"b_position"		=> Input::post("b_position"),
 			"b_date"			=> F::GetDate(),
 			"b_time"			=> F::GetTime(),
 			"b_user"			=> $_SESSION['user_login']
		];
		
		if(file_exists($_FILES["file"]["tmp_name"])){
                $fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["file"]["name"]);
                $temp = $_FILES["file"]["tmp_name"];
                
                $pt = pathinfo($fname);
                $ext = $pt["extension"];
                
                $u = F::UploadImage($temp, ASSET . "medias/iecommerce/img/banners/" . $fname, $ext);
    			
    			if($u){
    				$data["b_file"] = $fname;
    			}	
        }
		
		$p = banners::updateBy(["b_id"=>url::get(3)], $data );
		
		if($p){
			new Alert("success", "Edited");
		}else{
			new Alert("Error", "Error");
		}														
	break;	
	
	case "delete":
		banners::deleteBy(
		["b_id"=> url::get(3)]	);
	
		new Alert("success", "Deleted");
	break;
	
}
?>