<?php
switch (input::post('type')){
	
	case "add":
			$key = F::UniqKey("CATEGORY_");
			if(category::insertInto(
			[
				"c_name"	        => input::POST('c_name'),
				"c_main"	    	=> input::POST('c_main'),
				"c_key"	    		=> $key,
				"c_date"            => F::GetDate(),
				"c_time"            => F::GetTime(),
				"c_user"            => $_SESSION ['user_login']
			]
			)){
			    new Alert("success", "Record Added");
			}else{
			    new Alert("error","Error");
			}

	break;

	case "edit":
		category::updateBy(
			["c_id" => input::get('id')], 
			[
				"c_name"	        => input::POST('c_name'),
				"c_main"	    	=> input::POST('c_main'),
				"c_date"            => F::GetDate(),
				"c_time"            => F::GetTime(),
				"c_user"            => $_SESSION ['user_login']
			]
		);
		new Alert("success", "Data Saved");
	
	break;
	
	case "delete":
		types::deleteBy(
		["t_id"=> input::get('id')]
		);
		new Alert("success", "Record Deleted");
	break;
}
?>