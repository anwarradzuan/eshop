<?php

switch(Input::post("type")){
    case "add":
        
        if(taxes::insertInto(
			[
				"t_name"	=> input::POST('name'),
				"t_rate"	=> input::POST('rate'),
				"t_code"	=> input::POST('code'),
				"t_regid"	=> input::POST('reg_id'),
				"t_status"	=> input::POST('status'),
				"t_date"    => F::GetDate(),
				"t_time"    => F::GetTime(),
				"t_user"    => $_SESSION ['user_id']
			]
			)){
			    new Alert("success", "Record Added");
			}else{
			    new Alert("error","Error");
			}
        
    break;
    
    case "edit":
        
        taxes::updateBy(
			["t_id" => input::get('id')], 
			[
				"t_name"	=> input::POST('name'),
				"t_rate"	=> input::POST('rate'),
				"t_code"	=> input::POST('code'),
				"t_regid"	=> input::POST('reg_id'),
				"t_status"	=> input::POST('status'),
				"t_date"    => F::GetDate(),
				"t_time"    => F::GetTime(),
				"t_user"    => $_SESSION ['user_id']
			]
		);
		new Alert("success", "Data Saved");
        
    break;
    
    case "delete":
        
        taxes::deleteBy(
		["t_id"=> input::get('id')]
		);
		new Alert("success", "Record Deleted");
        
    break;
}