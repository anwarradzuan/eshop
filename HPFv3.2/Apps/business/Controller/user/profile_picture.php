<?php


switch(Input::post("action")){
    case "edit":
		if(file_exists($_FILES["picture"]["tmp_name"])){
            $fname = F::GetTime() . "-" . F::URLSlugEncode($_FILES["picture"]["name"]);
            $temp = $_FILES["picture"]["tmp_name"];
            
            $pt = pathinfo($fname);
            $ext = $pt["extension"];
            
            $u = F::UploadImage($temp, ASSET . "medias/profiles/" . $fname, $ext, 200, 200);
			
			if($u){
				clients::updateBy(["cl_id" => $_SESSION["cl_id"]], ["cl_picture" => $fname]);	
				new Alert("success", "Profile picture has been updated!");
			}else{
				new Alert("error", "Fail uploading picture. Please try again or contact our IT support team.");
			}
        }
		
    break;
}