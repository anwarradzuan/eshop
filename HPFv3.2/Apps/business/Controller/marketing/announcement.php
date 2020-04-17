<?php
switch (input::post('type')){
		
	case "add";
		if(announcements::insertInto(
			[
			"a_name"		=> input::POST('name'),
			"a_description"	=> input::POST('description'),
			"a_content"		=> input::POST('content'),
			"a_start"		=> input::POST('start'),
			"a_expired"		=> input::POST('expired'),
			"a_status"		=> input::POST('status'),
			"a_date"    	=> F::GetDate(),
			"a_time"		=> F::GetTime(),
			"a_user"    	=> $_SESSION ['user_login']
			]
		)){
			new Alert("success", "Added");
		}else{
			new Alert("error","Error");
		}
	break;
		
	case "edit";
										//where	//new data
		$p = announcements::updateBy(["a_id"=>url::get(3)],["a_name" => input::POST('name'), "a_description" => input::POST('description'), "a_content" => input::POST('content'), "a_start" => input::POST('start'),"a_expired" => input::POST('expired'), "a_status" => input::POST('status'),	"a_date" => F::GetDate(), "a_time" => F::GetTime(),	"a_user" => $_SESSION ['user_login'] ]);
		
		if($p){
			new Alert("success", "Edited");
		}else{
			new Alert("Error", "Error");
		}
	break;	
	
	case "delete":
		announcements::deleteBy(
		["a_id"=> url::get(3)]	);
	
		new Alert("success", "Deleted");
	break;
	
}
?>