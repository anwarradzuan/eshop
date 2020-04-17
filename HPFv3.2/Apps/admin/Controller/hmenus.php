<?php
switch (input::post('type')){
	
	case "add":
		if(cm_menus::insertInto(
		[
			"cm_name"	    => input::POST('name'),
			"cm_url"	        => input::POST('url'),
			"cm_route"	    => input::POST('m_route'),
			"cm_main"	    => input::POST('main'),
			"cm_order"	    => input::POST('order'),
			"cm_status"	    => input::POST('status'),
			"cm_icon"	    => input::POST('icon'),
			"cm_date"        => F::GetDate(),
			"cm_time"        => F::GetTime(),
			"cm_user"        => $_SESSION ['user_id'],
			"cm_position"    => (!empty(Input::post("position")) ? implode(",", Input::post("position")) : "")
		]
		)){
		    new Alert("success", "Record Added");
		}else{
		    new Alert("error","Error");
		}
	break;

	case "edit":
		cm_menus::updateBy(
			["cm_id" => input::get('id')], 
			[
				"cm_name"	    => input::POST('name'),
				"cm_url"	    => input::POST('url'),
				"cm_route"	    => input::POST('m_route'),
				"cm_main"	    => input::POST('main'),
				"cm_order"	    => input::POST('order'),
				"cm_status"	    => input::POST('status'),
				"cm_date"        => F::GetDate(),
				"cm_time"        => F::GetTime(),
				"cm_user"        => $_SESSION ['user_id'],
				"cm_icon"	    => input::POST('icon'),
    			"cm_position"    => (!empty(Input::post("position")) ? implode(",", Input::post("position")) : "")
			]
		);
		new Alert("success", "Data Saved");
	
	break;
	
	case "delete":
		cm_menus::deleteBy(
		    ["cm_id"=> input::get('id')]
		);
		new Alert("success", "Record Deleted");
	break;
}
?>