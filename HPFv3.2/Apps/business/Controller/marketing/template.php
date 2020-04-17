<?php
switch (input::post('type')){
		
	case "add";
		if(templates::insertInto(
			[
			"t_title"		=> input::POST('title'),
			"t_content"		=> F::encode64(input::POST('content')),
			"t_date"    	=> F::GetDate(),
			"t_time"		=> F::GetTime(),
			"t_user"    	=> $_SESSION ['user_login']
			]
		)){
			new Alert("success", "Added");
		}else{
			new Alert("error","Error");
		}
	break;
		
	case "edit";						//where	//new data
	$p = templates::updateBy(["t_id"=>url::get(4)],[ "t_title" => input::POST('title'), "t_content" => F::encode64(input::POST('content')),"t_date" => F::GetDate(),"t_time" => F::GetTime(), "t_user" => $_SESSION ['user_login'] ]);
		
		if($p){
			new Alert("success", "Edited");
		}else{
			new Alert("Error", "Error");
		}
	break;	
	
	case "delete":
		templates::deleteBy(
		["t_id"=> url::get(4)]	);
	
		new Alert("success", "Deleted");
	break;
}
?>