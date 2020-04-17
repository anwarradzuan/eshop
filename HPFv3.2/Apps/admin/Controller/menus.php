<?php
switch (input::post('type')){
	
	case "add":
		if(a_menus::insertInto(
		[
			"m_name"	    => input::POST('name'),
			"m_url"	        => input::POST('url'),
			"m_route"	    => input::POST('m_route'),
			"m_main"	    => input::POST('main'),
			"m_order"	    => input::POST('order'),
			"m_status"	    => input::POST('status'),
			"m_icon"	    => input::POST('icon'),
			"m_date"        => F::GetDate(),
			"m_time"        => F::GetTime(),
			"m_user"        => $_SESSION ['user_id'],
			"m_position"    => (!empty(Input::post("position")) ? implode(",", Input::post("position")) : ""),
			"m_role"        => (!empty(Input::post("role")) ? implode(",", Input::post("role")) : "")
		]
		)){
		    new Alert("success", "Record Added");
		}else{
		    new Alert("error","Error");
		}
	break;

	case "edit":
		a_menus::updateBy(
			["m_id" => input::get('id')], 
			[
				"m_name"	    => input::POST('name'),
				"m_url"	        => input::POST('url'),
				"m_route"	    => input::POST('m_route'),
				"m_main"	    => input::POST('main'),
				"m_order"	    => input::POST('order'),
				"m_status"	    => input::POST('status'),
				"m_date"        => F::GetDate(),
				"m_time"        => F::GetTime(),
				"m_user"        => $_SESSION ['user_id'],
				"m_icon"	    => input::POST('icon'),
    			"m_position"    => (!empty(Input::post("position")) ? implode(",", Input::post("position")) : ""),
    			"m_role"        => (!empty(Input::post("role")) ? implode(",", Input::post("role")) : "")
			]
		);
		new Alert("success", "Data Saved");
	
	break;
	
	case "delete":
		a_menus::deleteBy(
		    ["m_id"=> input::get('id')]
		);
		new Alert("success", "Record Deleted");
	break;
}
?>