<?php
switch (input::post('type')){
	
	case "add":
			
			if(types::insertInto(
			[
				"t_name"	        => input::POST('name'),
				"t_description"	    => input::POST('description'),
				"t_status"	        => input::POST('status'),
				"t_date"            => F::GetDate(),
				"t_time"            => F::GetTime(),
				"t_user"            => $_SESSION ['user_id']
			]
			)){
			    new Alert("success", "Record Added");
			}else{
			    new Alert("error","Error");
			}

	break;

	case "edit":
		types::updateBy(
			["t_id" => input::get('id')], 
			[
				"t_name"	        => input::POST('name'),
				"t_description"	    => input::POST('description'),
				"t_status"	        => input::POST('status'),
				"t_date"            => F::GetDate(),
				"t_time"            => F::GetTime(),
				"t_user"            => $_SESSION ['user_id']
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